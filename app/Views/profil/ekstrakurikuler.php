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
        <div class="col-md-12"><h3><b>DAFTAR EKSTRAKURIKULER</b></h3><hr></div>
    </div>
    <?php 
    $no = 1;
    foreach($data as $r):
        echo'<div class="row">
                <div class="col-md-12"><b>'.$no++.'. <a href="'.base_url("ekstrakurikuler/detail/$r->slug").'" class="text-dark" title="lihat detail">'.$r->nama_ekstrakurikuler.'</a></b></div>
            </div>';
    endforeach;
    ?>
</div>
<br><br>
<?= $this->endSection(); ?>
<?= $this->section('script'); ?>

<?= $this->endSection(); ?>