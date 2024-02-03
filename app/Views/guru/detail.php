<?= $this->extend('layout/default'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-white">
                <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url('guru'); ?>">Tenaga Edukatif</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?= $title; ?></li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-md-12"><h3><b>DETAIL GURU</b></h3><hr></div>
    </div>
    <?php if($data->gambar != '' AND file_exists("uploads/img/guru/$data->gambar")){ ?> 
        <div class="row">
            <div class="col-md-12 d-flex justify-content-center">
                <a href="<?= base_url("uploads/img/guru/$data->gambar"); ?>" class="image-link">
                    <img src="<?= base_url("uploads/img/guru/$data->gambar"); ?>" class="img img-fluid" width="150px">
                </a>
            </div>
        </div>
    <?php } ?>
    <div class="row mt-3">
        <div class="col-md-3"><b>NAMA</b></div>
        <div class="col-md-9"><b>:</b> <?= $data->nama; ?></div>
    </div>
    <div class="row">
        <div class="col-md-3"><b>JENIS KELAMIN</b></div>
        <div class="col-md-9"><b>:</b> <?php if($data->jk == 1){ echo'Laki-Laki'; }elseif($data->jk == 2){ echo'Perempuan'; } ?></div>
    </div>
    <div class="row">
        <div class="col-md-3"><b>TEMPAT, TGL LAHIR</b></div>
        <div class="col-md-9"><b>:</b> <?= $data->tmp_lahir; ?>, <?php if($data->tgl_lahir != '0000-00-00'){ echo tgl_indo($data->tgl_lahir); } ?></div>
    </div>
    <div class="row">
        <div class="col-md-3"><b>NIP</b></div>
        <div class="col-md-9"><b>:</b> <?= $data->nip; ?></div>
    </div>
    <div class="row">
        <div class="col-md-3"><b>NUPTK</b></div>
        <div class="col-md-9"><b>:</b> <?= $data->nuptk; ?></div>
    </div>
    <div class="row">
        <div class="col-md-3"><b>NO KARPEG</b></div>
        <div class="col-md-9"><b>:</b> <?= $data->nokarpeg; ?></div>
    </div>
    <div class="row">
        <div class="col-md-3"><b>STATUS PEGAWAI</b></div>
        <div class="col-md-9"><b>:</b> <?= $data->statuspeg; ?></div>
    </div>
    <div class="row">
        <div class="col-md-3"><b>STATUS GURU</b></div>
        <div class="col-md-9"><b>:</b> <?= $data->statusguru; ?></div>
    </div>
    <div class="row">
        <div class="col-md-3"><b>GOLONGAN RUANG</b></div>
        <div class="col-md-9"><b>:</b> <?= $data->golruang; ?></div>
    </div>
    <div class="row">
        <div class="col-md-3"><b>TMT CPNS</b></div>
        <div class="col-md-9"><b>:</b> <?php if($data->tmt_cpns != '0000-00-00'){ echo tgl_indo($data->tmt_cpns); } ?></div>
    </div>
    <div class="row">
        <div class="col-md-3"><b>TMT PNS</b></div>
        <div class="col-md-9"><b>:</b> <?php if($data->tmt_pns != '0000-00-00'){ echo tgl_indo($data->tmt_pns); } ?></div>
    </div>
    <div class="row">
        <div class="col-md-3"><b>AGAMA</b></div>
        <div class="col-md-9"><b>:</b> 
            <?php 
            if($data->agama == '1')
            { 
                echo'Islam'; 
            }elseif($data->agama == '2')
            { 
                echo'Kristen Katolik'; 
            }elseif($data->agama == '3')
            { 
                echo'Kristen Protestan'; 
            }elseif($data->agama == '4')
            { 
                echo'Hindu'; 
            }elseif($data->agama == '5')
            { 
                echo'Budha'; 
            }elseif($data->agama == '6')
            { 
                echo'Konghuchu'; 
            }
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3"><b>PENDIDIKAN TERAKHIR</b></div>
        <div class="col-md-9"><b>:</b> <?= $data->tingkat_pt; ?></div>
    </div>
    <div class="row">
        <div class="col-md-3"><b>PROGRAM STUDI</b></div>
        <div class="col-md-9"><b>:</b> <?= $data->prodi; ?></div>
    </div>
    <div class="row">
        <div class="col-md-3"><b>PERGURUAN TINGGI</b></div>
        <div class="col-md-9"><b>:</b> <?= $data->pt; ?></div>
    </div>
    <div class="row">
        <div class="col-md-3"><b>TAHUN LULUS</b></div>
        <div class="col-md-9"><b>:</b> <?= $data->th_lulus; ?></div>
    </div>
    <div class="row">
        <div class="col-md-3"><b>ALAMAT</b></div>
        <div class="col-md-9"><b>:</b> <?= $data->alamat; ?></div>
    </div>
</div>
<br><br>
<?= $this->endSection(); ?>
<?= $this->section('script'); ?>
 
<?= $this->endSection(); ?>