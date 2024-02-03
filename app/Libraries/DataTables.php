<?php
/**
 *
 * @link       https://www.codekop.com/
 * @version    1.0.2
 * @copyright  Codekop Datatables Library (c) 2022
 *
 * File      : Datatables.php
 * author    : Fauzan Falah
 * E-mail    : fauzancodekop@gmail.com / fauzan1892@codekop.com
 *
 *
**/

namespace App\Libraries;

class DataTables
{
    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function BuildDatatables($query, $where, $isWhere, $cari)
    {
        $search = htmlspecialchars($_POST['search']['value']);
        // get data limit per page
        $limit = preg_replace("/[^a-zA-Z0-9.]/", '', "{$_POST['length']}");
        // get data start
        $start = preg_replace("/[^a-zA-Z0-9.]/", '', "{$_POST['start']}");

        $cari = implode(" LIKE '%".$search."%' OR ", $cari)." LIKE '%".$search."%'";
        $order_field = $_POST['order'][0]['column'];
        $order_ascdesc = $_POST['order'][0]['dir'];
        $order = " ORDER BY ".$_POST['columns'][$order_field]['data']." ".$order_ascdesc;

        // where is not null
        if ($where != null) {
            $setWhere = array();
            foreach ($where as $key => $value) {
                $setWhere[] = $key."='".$value."'";
            }
            $fwhere = implode(' AND ', $setWhere);

            if (!empty($isWhere)) {
                $sql = $this->db->query($query." WHERE  $isWhere AND ".$fwhere);
            } else {
                $sql = $this->db->query($query." WHERE ".$fwhere);
            }

            $sql_count = count($sql->getResultArray());

            if (!empty($isWhere)) {
                $sql_data = $this->db->query($query." WHERE $isWhere AND ".$fwhere." AND (".$cari.")".$order." LIMIT ".$limit." OFFSET ".$start);
            } else {
                $sql_data = $this->db->query($query." WHERE ".$fwhere." AND (".$cari.")".$order." LIMIT ".$limit." OFFSET ".$start);
            }

            if (isset($search)) {
                if (!empty($isWhere)) {
                    $sql_cari =  $this->db->query($query." WHERE $isWhere AND ".$fwhere." AND (".$cari.")");
                } else {
                    $sql_cari =  $this->db->query($query." WHERE ".$fwhere." AND (".$cari.")");
                }
                $sql_filter_count = count($sql_cari->getResultArray());
            } else {
                if (!empty($isWhere)) {
                    $sql_filter = $this->db->query($query." WHERE $isWhere AND ".$fwhere);
                } else {
                    $sql_filter = $this->db->query($query." WHERE ".$fwhere);
                }
                $sql_filter_count = count($sql_filter->getResultArray());
            }

            $data = $sql_data->getResultArray();
        } else {
            if (!empty($isWhere)) {
                $sql = $this->db->query($query." WHERE $isWhere");
            } else {
                $sql = $this->db->query($query);
            }

            $sql_count = count($sql->getResultArray());

            if (!empty($isWhere)) {
                $sql_data = $this->db->query($query." WHERE $isWhere AND (".$cari.")".$order." LIMIT ".$limit." OFFSET ".$start);
            } else {
                $sql_data = $this->db->query($query." WHERE (".$cari.")".$order." LIMIT ".$limit." OFFSET ".$start);
            }

            if (isset($search)) {
                if (!empty($isWhere)) {
                    $sql_cari =  $this->db->query($query." WHERE $isWhere AND (".$cari.")");
                } else {
                    $sql_cari =  $this->db->query($query." WHERE (".$cari.")");
                }
                $sql_filter_count = count($sql_cari->getResultArray());
            } else {
                if (!empty($isWhere)) {
                    $sql_filter =  $this->db->query($query." WHERE $isWhere");
                } else {
                    $sql_filter = $this->db->query($query);
                }

                $sql_filter_count = count($sql_filter->getResultArray());
            }

            $data = $sql_data->getResultArray();
        }

        $callback = array(
            'draw' => $_POST['draw'],
            'recordsTotal' => $sql_count,
            'recordsFiltered'=> $sql_filter_count,
            'data'=> $data
        );
        // $csrf_name = csrf_token();
        // $csrf_hash = csrf_hash();
        // $callback[$csrf_name] = $csrf_hash;
        echo json_encode($callback); // Convert array $callback ke json
    }
}