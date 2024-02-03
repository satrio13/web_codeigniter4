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
            <div class="col-md-12"><h3><b>PENGUMUMAN<hr></b></h3></div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <form method="GET" action="<?= base_url('pengumuman'); ?>">
                    <div class="input-group">
                        <input type="text" name="q" value="<?= esc($cari); ?>" class="form-control" placeholder="cari pengumuman" required>
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
                    if($r->gambar != '' AND file_exists("uploads/img/pengumuman/$r->gambar"))
                    {
                        $img = $r->gambar;
                    }else
                    {
                        $img = 'no-image.png';
                    }

                    $j = strlen($r->isi);
                    if($j > 100)
                    {
                        $isi_pengumuman = $r->isi; 
                        $isi = substr($isi_pengumuman,0,100); 
                        $isi = substr($isi_pengumuman,0,strrpos($isi," "));
                        $isi = $isi.' ...';
                    }else
                    {
                        $isi = $r->isi;
                    }

                    echo'<div class="col-md-3 text-break mt-4">
                            <div class="card h-100">
                                <div class="card-body p-1">
                                    <div class="card-img">
                                        <a href="'.base_url("pengumuman/detail/$r->slug").'">
                                            <img src="'.base_url("uploads/img/pengumuman/$img").'" class="img img-fluid mt-2" style="height: 150px; object-fit: contain;">
                                        </a>
                                    </div>
                                    <div class="card-desc">
                                        <h5>
                                            <a href="'.base_url("pengumuman/detail/$r->slug").'" class="text-decoration-none judul_link"><b>'.$r->nama.'</b></a>
                                        </h5>
                                        <span class="badge badge-primary"><i class="fa fa-clock-o"></i> '.tgl_indo($r->updated_at).'</span>
                                        <span class="badge badge-danger"><i class="fa fa-clock-o"></i> '.date('H:i', strtotime($r->updated_at)).'</span> 
                                        <hr>
                                        <p>'.htmlspecialchars_decode($isi).'</p>
                                        <div class="text-right">
                                            <a href="'.base_url("pengumuman/detail/$r->slug").'" class="btn btn-dark btn-sm">Lihat Detail <i class="fa fa-arrow-right"></i></a>  
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        </div>';
                endforeach;
            }else
            {
                echo'<div class="col-md-12 text-center text-danger">
                        <b>BELUM ADA PENGUMUMAN</b>
                    </div>
                    <br><br><br><br><br>';
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