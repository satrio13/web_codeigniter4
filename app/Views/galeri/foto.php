<?= $this->extend('layout/default'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-white">
                <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Galeri</li>
                <li class="breadcrumb-item active" aria-current="page"><?= $title; ?></li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-md-12"><h3><b>GALERI FOTO</b></h3><hr></div>
    </div>
    <div class="row">
        <?php 
        if($data)
        {   
            foreach($data as $r):
                $get = get_foto($r->id_album);
                if($get['status'] == true)
                {
                    $img = $get['foto'];
                }else
                {
                    $img = 'no-image.png';
                }
                echo'<div class="col-md-3 mb-3 text-break">
                        <div class="card h-100">
                            <a href="'.base_url("galeri/album/$r->slug").'">
                                <img src="'.base_url("uploads/img/foto/$img").'" class="img img-fluid card-img mt-2" style="height: 150px; object-fit: contain;">
                            </a>
                            <div class="card-body">
                                <a href="'.base_url("galeri/album/$r->slug").'" class="card-text judul_link text-decoration-none"><b>'.$r->album.'</b></a>
                            </div>
                            <div class="card-footer">
                                <small><i class="fa fa-calendar"></i> '.tgl_indo($r->updated_at).' | <i class="fa fa-folder-open"></i>'. jml_foto($r->id_album).' Foto</small>
                            </div>
                        </div>
                    </div>';
            endforeach;
        }else
        {
            echo'<div class="col-md-12 text-center text-danger">
                    <b>BELUM ADA ALBUM</b>
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
<br>
<?= $this->endSection(); ?>
<?= $this->section('script'); ?>

<?= $this->endSection(); ?>