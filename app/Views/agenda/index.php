<?= $this->extend('layout/default'); ?>
<?= $this->section('content'); ?>
<section id="agenda" class="pt-3 pb-5">
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
            <div class="col-md-12"><h3><b>AGENDA<hr></b></h3></div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <form method="GET" action="<?= base_url('agenda'); ?>">
                    <div class="input-group">
                        <input type="text" name="q" value="<?= esc($cari); ?>" class="form-control" placeholder="cari agenda" required>
                        <div class="input-group-append">
                            <button type="submit" class="btn bg-theme text-white"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php if(!empty($cari)){ ?>
        <div class="row mt-3">
            <div class="col-md-12">
                Hasil pencarian menggunakan keyword: <?= esc($cari); ?>
            </div>
        </div>
        <?php } ?>
        <div class="row">
            <?php 
            if($data)
            {
                foreach($data as $r):
                    if($r->gambar != '' AND file_exists("uploads/img/agenda/$r->gambar"))
                    {
                        $img = $r->gambar;
                    }else
                    {
                        $img = 'no-image.png';
                    }

                    $tgl_sekarang = date('Y-m-d');
                    if($r->berapa_hari == 2 AND $r->tgl_mulai != '0000-00-00' AND $r->tgl_selesai != '0000-00-00')
                    {
                        $tgl = date('d-m-Y', strtotime($r->tgl_mulai)).' s.d. '.date('d-m-Y', strtotime($r->tgl_selesai));
                        if($tgl_sekarang == $r->tgl_mulai)
                        {
                            $status = '<span class="bg-primary"><h4><b>TODAY</b></h4></span>';
                        }elseif($tgl_sekarang > $r->tgl_mulai)
                        {
                            $status = '<span class="bg-danger"><h4><b>DONE</b></h4></span>';
                        }elseif($tgl_sekarang < $r->tgl_mulai)
                        {
                            $status = '<span class="bg-success"><h4><b>SOON</b></h4></span>';

                        }else
                        {
                            $status = '';
                        }
                    }elseif($r->berapa_hari == 1 AND $r->tgl != '0000-00-00')
                    {
                        $tgl = date('d-m-Y', strtotime($r->tgl));
                        if($tgl_sekarang == $r->tgl)
                        {
                            $status = '<span class="bg-primary"><h4><b>TODAY</b></h4></span>';
                        }elseif($tgl_sekarang > $r->tgl)
                        {
                            $status = '<span class="bg-danger"><h4><b>DONE</b></h4></span>';
                        }elseif($tgl_sekarang < $r->tgl)
                        {
                            $status = '<span class="bg-success"><h4><b>SOON</b></h4></span>';
                        }else
                        {
                            $status = '';
                        }
                    }else
                    {
                        $status = '';
                    } 

                    if($r->jam_mulai != '' AND $r->jam_selesai != '')
                    {
                        $jam = date('H:i', strtotime($r->jam_mulai)).' s.d. '.date('H:i', strtotime($r->jam_selesai));
                    }else
                    {
                        $jam = '';
                    }
                    echo'<div class="col-md-4 text-break mt-4">
                            <div class="card h-100">
                                <div class="card-body p-1">
                                    <div class="card-img">
                                        <a href="'.base_url("agenda/detail/$r->slug").'">
                                            <img src="'.base_url("uploads/img/agenda/$img").'" class="img img-fluid mt-2" style="height: 150px; object-fit: contain;">
                                            '.$status.'
                                        </a>
                                    </div>
                                    <div class="card-desc">
                                        <h5>
                                            <a href="'.base_url("agenda/detail/$r->slug").'" class="text-decoration-none judul_link"><b>'.$r->nama_agenda.'</b></a>
                                        </h5>
                                        <table width="100%">
                                            <tr>
                                                <td width="25%" valign="top"><i class="fa fa-calendar"></i> Tgl</td>
                                                <td valign="top">:</td>
                                                <td>'.$tgl.'</td>
                                            </tr>
                                            <tr>
                                                <td width="25%" valign="top"><i class="fa fa-clock-o"></i> Jam</td>
                                                <td valign="top">:</td>
                                                <td>'.$jam.'</td>
                                            </tr>
                                            <tr>
                                                <td width="25%" valign="top"><i class="fa fa-map-marker"></i> Tempat</td>
                                                <td valign="top">:</td>
                                                <td>'.$r->tempat.'</td>
                                            </tr>
                                        </table>
                                        <div class="text-right">
                                            <a href="'.base_url("agenda/detail/$r->slug").'" class="btn btn-dark btn-sm">Lihat Detail <i class="fa fa-arrow-right"></i></a>  
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        </div>';
                endforeach;
            }else
            {
                echo'<div class="col-md-12 text-center text-danger">
                        <b>BELUM ADA AGENDA</b>
                        <br><br><br><br><br>
                    </div>';
            }
            ?>
        </div>
        <div class="row">
            <div class="col-md-12 mt-4 d-flex justify-content-center">
                <?= $pager->links('default', 'custom_pager'); ?>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>
<?= $this->section('script'); ?>

<?= $this->endSection(); ?>