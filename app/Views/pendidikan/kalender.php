<?= $this->extend('layout/default'); ?>
<?= $this->section('content'); ?>
<section id="isi">
    <div class="container">
        <div class="row">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-white">
                    <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Pendidikan</li>
                    <li class="breadcrumb-item active" aria-current="page"><?= $title; ?></li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-md-12"><h3><b>KALENDER AKADEMIK</b></h3><hr></div>
        </div>
        <div class="row">
            <div class="col-md-12 embed-responsive embed-responsive-16by9">
                <?php 
                if($data->kalender != '' AND file_exists("uploads/file/$data->kalender")){ ?>
                    <embed src="<?= base_url("uploads/file/$data->kalender"); ?>" class="embed-responsive-item col-md-12" allowfullscreen></embed>   
                <?php } ?>
            </div> 
        </div>
    </div>
</section>
<br><br>
<?= $this->endSection(); ?>
<?= $this->section('script'); ?>

<?= $this->endSection(); ?>