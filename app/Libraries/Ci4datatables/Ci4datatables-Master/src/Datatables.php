<?php

namespace Kusmantopratama\Ci4datatables;

use \Config\Services;
use \Config\Database;

class Datatables
{
	private $builder;
	private $request;
	private $alias = [];
	private $whereFields = [];
	private $whereData;
	private $joins = [];
	private $data;
	private $add_columns = array();
	private $edit_columns = array();
	private $unset_columns = array();
	private $columns;
	public function __construct($table = false)
	{
		$this->request = Services::request();
		if ($table) {
			$this->table = $table;
			$db = Database::connect();
			$this->builder = $db->table($table);
			return $this;
		}
	}

	public function table($table)
	{
		$this->table = $table;
		$db = Database::connect();
		$this->builder = $db->table($table);
		return $this;
	}

	public function select(String $fields)
	{
		$this->builder->select($fields);
		$this->setAlias($fields);
		return $this;
	}

	public function where(array $data)
	{
		
		$this->builder->where($data);
		foreach ($data as $field => $value) {
			$this->whereFields[] = $field;
		}
		$this->whereData = $data;
		return $this;
	}

	public function join($table, $cond, $type = '')
	{
		$this->joins[] = ['table' => $table, 'cond' => $cond, 'type' => $type];
		$this->builder->join($table, $cond, $type);
		return $this;
	}



	public function draw()
	{
		$keyword = esc($this->request->getVar('search')['value']);
		if (!is_null($keyword)) $this->getFiltering($keyword);
		$this->getOrdering();
		$result = $this->getResult();
		$paging = $this->getPaging($keyword);
		$this->data = json_encode([
			'draw' => $this->request->getVar('draw'),
			'recordsTotal' => $paging['total'],
			'recordsFiltered' => $paging['filtered'],
			'data' => $result,
            csrf_token() => csrf_hash()
		]);

		return $this->data;
	}

	public function editColumn($column, $content, $match_replacement = "")
	{
		$this->edit_columns[$column][]    = array(
			'content'    => $content,
			'replacement'    => explode(',', $match_replacement)
		);
		return $this;
	}

	public function addColumn($column, $content, $match_replacement = null)
	{

		$this->add_columns[$column]  = array(
			'content'    => $content,
			'replacement'    => explode(',', $match_replacement)
		);
		return $this;
	}


	private function setAlias($data)
	{
		foreach (explode(',', $data) as $val) {
			if (stripos($val, 'as')) {
				$alias = trim(preg_replace('/(.*)\s+as\s+(\w*)/i', '$2', $val));
				$field = trim(preg_replace('/(.*)\s+as\s+(\w*)/i', '$1', $val));
				$this->alias[$alias] = $field;
			}
		}
	}

	private function doJoin()
	{
		foreach ($this->joins as $join) {
			$this->builder->join($join['table'], $join['cond'], $join['type']);
		}
	}

	private function getFiltering($keyword)
	{
		$fields = $this->request->getVar('columns');
		$this->builder->groupStart();
		for ($i = 0; $i < count($fields); $i++) {
			$where = false;
			$field = $fields[$i]['data'];

			foreach ($this->whereFields as $data) {
				$where = ($field == $data) ? true : false;
			}
			$searchable = $fields[$i]['searchable'] == 'true' ? true : false;
			if ($searchable) {
				if ($where) continue;
				if (array_key_exists($field, $this->alias)) {
					$field = $this->alias[$field];
					($i < 1) ? $this->builder->like($field, $keyword) : $this->builder->orLike($field, $keyword);
				} else {
					($i < 1) ? $this->builder->like($field, $keyword) : $this->builder->orLike($field, $keyword);
				}
			}
		}
		$this->builder->groupEnd();
	}

	private function getOrdering()
	{
		$orderField = esc($this->request->getVar('order')[0]['column']);
		$orderAD = esc($this->request->getVar('order')[0]['dir']);
		$orderColumn = esc($this->request->getVar('columns')[$orderField]['data']);
		$this->builder->orderBy($orderColumn, $orderAD);
	}

	private function getResult()
	{
		$this->getLimiting();
		$data = $this->builder->get()->getResultArray();
		$this->columns = $data;
		$i = $this->request->getVar('start', FILTER_SANITIZE_NUMBER_INT);
		$aaData = array();

		foreach ($data as $row_key => $row_val) {
			$aaData[$row_key] =  ($this->check_cType()) ? $row_val : array_values($row_val);

			foreach ($this->add_columns as $field => $val)
				if ($this->check_cType())
					$aaData[$row_key][$field] = $this->exec_replace($val, $aaData[$row_key]);
				else
					$aaData[$row_key][] = $this->exec_replace($val, $aaData[$row_key]);


			foreach ($this->edit_columns as $modkey => $modval) {
				foreach ($modval as $val) {
					$aaData[$row_key][($this->check_cType()) ? $modkey : array_search($modkey, $this->columns)] = $this->exec_replace($val, $aaData[$row_key]);
				}
			}
			$aaData[$row_key] = array_diff_key($aaData[$row_key], ($this->check_cType()) ? $this->unset_columns : array_intersect($this->columns, $this->unset_columns));

			if (!$this->check_cType())
				$aaData[$row_key] = array_values($aaData[$row_key]);
		}

		$datas = array();
		foreach ($aaData as $item) {
			$i++;
			$indexing = array('dtindex' => $i);
			$datas[] = array_merge($indexing, $item);
		}

		return $datas;
	}

	private function getLimiting()
	{
		$limit = $this->request->getVar('length', FILTER_SANITIZE_NUMBER_INT);
		$start = $this->request->getVar('start', FILTER_SANITIZE_NUMBER_INT);
		$this->builder->limit($limit, $start);
	}

	private function getPaging($keyword)
	{

		if (count($this->joins) > 0) $this->doJoin();
		if (!is_null($this->whereData)) $this->where($this->whereData);
		$total = $this->builder->countAllResults(false);
		if (!is_null($keyword)) $this->getFiltering($keyword);
		return [
			'total' => $total,
			'filtered' => $this->builder->get()->resultID->num_rows
		];
	}


	// edited
	private function exec_replace($custom_val, $row_data)
	{
		$replace_string = '';

		// Go through our array backwards, else $1 (foo) will replace $11, $12 etc with foo1, foo2 etc
		$custom_val['replacement'] = array_reverse($custom_val['replacement'], true);

		if (isset($custom_val['replacement']) && is_array($custom_val['replacement'])) {
			//Added this line because when the replacement has over 10 elements replaced the variable "$1" first by the "$10"
			$custom_val['replacement'] = array_reverse($custom_val['replacement'], true);
			foreach ($custom_val['replacement'] as $key => $val) {
				$sval = preg_replace("/(?<!\w)([\'\"])(.*)\\1(?!\w)/i", '$2', trim($val));

				if (preg_match('/(\w+::\w+|\w+)\((.*)\)/i', $val, $matches) && is_callable($matches[1])) {
					$func = $matches[1];
					$args = preg_split("/[\s,]*\\\"([^\\\"]+)\\\"[\s,]*|" . "[\s,]*'([^']+)'[\s,]*|" . "[,]+/", $matches[2], 0, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);

					foreach ($args as $args_key => $args_val) {
						$args_val = preg_replace("/(?<!\w)([\'\"])(.*)\\1(?!\w)/i", '$2', trim($args_val));
						$args[$args_key] = (in_array($args_val, $this->columns)) ? ($row_data[($this->check_cType()) ? $args_val : array_search($args_val, $this->columns)]) : $args_val;
					}

					$replace_string = call_user_func_array($func, $args);
				} elseif (in_array($sval, $this->columns))
					$replace_string = $row_data[($this->check_cType()) ? $sval : array_search($sval, $this->columns)];
				else {

					if (is_callable($custom_val["content"])) {
						$custom_val['content'] = call_user_func($custom_val["content"], $row_data);
					} else {
						$replace_string = $sval;
						$custom_val['content'] = str_ireplace('$' . ($key + 1), $row_data[$replace_string], $custom_val['content']);
					}
				}
			}
		}

		return $custom_val['content'];
	}

	private function check_cType()
	{
		$column = $this->request->getVar('columns');
		if (is_numeric($column[0]['data']))
			return FALSE;
		else
			return TRUE;
	}
}