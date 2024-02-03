<?= $this->extend('layout/default'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-white">
                <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Profil</li>
                <li class="breadcrumb-item active" aria-current="page"><?= $title; ?></li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-md-12"><h3><b>STRUKTUR ORGANISASI</b></h3><hr></div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?php 
            if($data->isi != '' AND file_exists("assets/img/struktur/$data->isi"))
            {
                echo'<a href="'.base_url("assets/img/struktur/$data->isi").'" class="image-link">
                        <img src="'.base_url("assets/img/struktur/$data->isi").'" class="img img-fluid">
                    </a>';
            }
            ?>
        </div>
    </div>
</div>
<br><br><br>
<?= $this->endSection(); ?>
<?= $this->section('script'); ?>

<?= $this->endSection(); ?>