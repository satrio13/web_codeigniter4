<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DownloadModel;

class Download extends BaseController
{
    function __construct()
    {   
        $this->m_download = new DownloadModel();
    }

    public function index()
    {
        $data['titleweb'] = 'Download - '.title();
		$data['title'] = 'Download';
        $data['data'] = $this->m_download->list_download();
        return view('download/index', $data);
    }

    public function hits($file)
    {
        $cek = $this->m_download->cek_download($file);
        if($cek)
        {
            $upd = [
                'hits' => $cek->hits + 1
            ];

            $this->m_download->update_dibaca($upd, $file);

            $file = "uploads/file/$cek->file";
            if (!file_exists($file))
            {
                die('File not found');
            }else
            {
                // Set the appropriate headers
                header('Content-Description: File Transfer');
                header('Content-Type: application/octet-stream');
                header('Content-Disposition: attachment; filename="' . basename($file) . '"');
                header('Expires: 0');
                header('Cache-Control: must-revalidate');
                header('Pragma: public');
                header('Content-Length: ' . filesize($file));

                // Read the file and output it to the browser
                readfile($file);
                exit;
            }
        }else
        {
            show_404();
        }
    }

}