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
        <div class="col-md-12"><h3><b>
                                    <?php 
                                    if(jenjang() == 1 OR jenjang() == 2)
                                    {
                                        echo'PROFIL SEKOLAH';
                                    }else
                                    {
                                        echo'PROFIL MADRASAH';
                                    }
                                    ?>
                                </b></h3><hr>
        </div>
    </div>
    <?php if($data->gambar != '' AND file_exists("uploads/img/profil/$data->gambar")){ ?>
        <div class="row">
            <div class="col-md-12 text-center">
                <img src="<?= base_url("uploads/img/profil/$data->gambar"); ?>" class="img img-fluid"><br><br>
            </div>
        </div>
    <?php } ?>
    <div class="row">
        <div class="col-md-3"><b>
                                <?php 
                                if(jenjang() == 1 OR jenjang() == 2)
                                {
                                    echo'NAMA SEKOLAH';
                                }else
                                {
                                    echo'NAMA MADRASAH';
                                }
                                ?>
                            </b>
        </div>
        <div class="col-md-9"><b>:</b> <?= $data->nama_web; ?></div>
    </div>
    <div class="row">
        <div class="col-md-3"><b>ALAMAT</b></div>
        <div class="col-md-9"><b>:</b> <?= $data->alamat; ?></div>
    </div>
    <div class="row">
        <div class="col-md-3"><b>EMAIL</b></div>
        <div class="col-md-9"><b>:</b> <?= $data->email; ?></div>
    </div>
    <div class="row">
        <div class="col-md-3"><b>TELP</b></div>
        <div class="col-md-9"><b>:</b> <?= $data->telp; ?></div>
    </div>
    <div class="row">
        <div class="col-md-3"><b>FAX</b></div>
        <div class="col-md-9"><b>:</b> <?= $data->fax; ?></div>
    </div>
    <div class="row">
        <div class="col-md-3"><b>WHATSAPP</b></div>
        <div class="col-md-9"><b>:</b> <?= $data->whatsapp; ?></div>
    </div>
    <div class="row">
        <div class="col-md-3"><b>AKREDITASI</b></div>
        <div class="col-md-9"><b>:</b> <?= $data->akreditasi; ?></div>
    </div>
    <div class="row">
        <div class="col-md-3"><b>KURIKULUM</b></div>
        <div class="col-md-9"><b>:</b> <?= $data->kurikulum; ?></div>
    </div>
    <div class="row">
        <div class="col-md-3"><b>
                            <?php 
                            if(jenjang() == 1 OR jenjang() == 2)
                            {
                                echo'NAMA KEPALA SEKOLAH';
                            }else
                            {
                                echo'NAMA KEPALA MADRASAH';
                            }
                            ?>
                            </b>
        </div>
        <div class="col-md-9"><b>:</b> <?= $data->nama_kepsek; ?></div>
    </div>
    <div class="row">
        <div class="col-md-3"><b>NAMA OPERATOR</b></div>
        <div class="col-md-9"><b>:</b> <?= $data->nama_operator; ?></div>
    </div>
    <div class="row">
        <div class="col-md-3"><b>FILE</b></div>
        <div class="col-md-9"><b>:</b>
            <?php 
            if($data->file != '' AND file_exists("uploads/file/$data->file"))
            { 
                echo'<a href="'.base_url("download/file/$data->file").'" class="btn bg-theme btn-sm text-white"><b><i class="fa fa-download"></i> DOWNLOAD</b></a>';
            } 
            ?>  
        </div>
    </div>
    <?php if($data->profil != ''){ ?>
        <hr>
        <div class="row">
            <div class="col-md-3"><b>PROFIL</b></div>
            <div class="col-md-9"><b>:</b> <?= $data->profil; ?></div>
        </div>
    <?php } ?>
</div>
<br><br>
<?= $this->endSection(); ?>
<?= $this->section('script'); ?>

<?= $this->endSection(); ?>