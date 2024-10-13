<?= $this->extend('layout/default'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-white">
                <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?= $title; ?></li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-md-12"><h3><b>PRESTASI SISWA</b></h3><hr></div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="table table-responsive">
                <table class="table table-bordered table-striped table-sm">
                    <thead class="bg-theme text-white text-center">
                        <tr>
                            <th colspan="7"></th>
                            <th colspan="5">TINGKAT</th>
                            <th colspan="2"></th>
                        </tr>
                        <tr>
                            <th width="5%">NO</th>
                            <th>TP</th>
                            <th>NAMA LOMBA</th>
                            <th>JENIS</th>
                            <th>PRESTASI</th>
                            <th>NAMA SISWA</th>
                            <th>KELAS</th>
                            <th>KAB</th>
                            <th>KRSDN</th>
                            <th>PROV</th>
                            <th>NAS</th>
                            <th>INT</th>
                            <th>KETERANGAN</th>
                            <th>GAMBAR</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    if($data)
                    {   
                        $no = 1;
                        foreach($data as $r):
                            $jenis = ($r->jenis == '1') ? 'Akademik' : 'Non Akademik';
                            $kab = ($r->tingkat == '1') ? '<i class="fa fa-check"></i>' : '';
                            $kar = ($r->tingkat == '2') ? '<i class="fa fa-check"></i>' : '';
                            $prov = ($r->tingkat == '3') ? '<i class="fa fa-check"></i>' : '';
                            $nas = ($r->tingkat == '4') ? '<i class="fa fa-check"></i>' : '';
                            $int = ($r->tingkat == '5') ? '<i class="fa fa-check"></i>' : '';
                
                            $target = "uploads/img/prestasi/siswa/$r->gambar";
                            if($r->gambar != '' AND file_exists($target))
                            {
                                $img = '<a href="'.base_url("uploads/img/prestasi/siswa/$r->gambar").'" class="image-link">
                                            <img src="'.base_url("uploads/img/prestasi/siswa/$r->gambar").'" class="img img-fluid">
                                        </a>'; 
                            }else
                            {
                                $img = '';
                            }

                            echo'<tr>
                                    <td class="text-center">'.$no++.'.</td>
                                    <td>'.$r->tahun.'</td>
                                    <td>'.$r->nama.'</td>
                                    <td>'.$jenis.'</td>
                                    <td>Juara '.$r->prestasi.'</td>
                                    <td>'.$r->nama_siswa.'</td>
                                    <td>'.$r->kelas.'</td>
                                    <td class="text-center">'.$kab.'</td>
                                    <td class="text-center">'.$kar.'</td>
                                    <td class="text-center">'.$prov.'</td>
                                    <td class="text-center">'.$nas.'</td>
                                    <td class="text-center">'.$int.'</td>
                                    <td>'.$r->keterangan.'</td>
                                    <td class="text-center">'.$img.'</td>
                                </tr>';
                        endforeach;
                    }else
                    {
                        echo'<tr>
                                <td class="text-center" colspan="14">DATA KOSONG</td>
                            </tr>';
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<br><br>
<?= $this->endSection(); ?>
<?= $this->section('script'); ?>

<?= $this->endSection(); ?>
