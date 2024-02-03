<?php

namespace App\Models;

use CodeIgniter\Model;

class DownloadModel extends Model
{
    protected $table            = 'tb_download';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = false;
    protected $allowedFields    = [];

    public function list_download()
    {
        return $this->where('is_active',1)->orderBy('updated_at','desc')->get()->getResult();
    }

    public function cek_download($file)
    {
        return $this->select('hits,file')->getWhere(['file' => $file])->getRow();
    }

    public function update_dibaca($data, $file)
    {
        $this->set($data)->where(['file' => $file])->update();
    }


}