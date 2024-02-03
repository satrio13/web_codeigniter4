<?= $this->extend('admin/layout/default'); ?>
<?= $this->section('content'); ?>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark"><?= $title; ?></h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?= base_url('backend'); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url('backend/alumni'); ?>">Alumni</a></li>
                            <li class="breadcrumb-item active"><?= $title; ?></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    
  <section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="col-md-12">
                        <div class="row mt-2">
                            <div class="col-md-12 text-bold text-white bg-primary p-1">DETAIL PENGADUAN</div>
                        </div>
                    </div>
                    <div class="col-md-12 border border-secondary">
                        <div class="row mt-2">
                            <div class="col-md-2 text-bold">Nama</div>
                            <div class="col-md-10">: <?= $data->nama; ?></div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-2 text-bold">Status</div>
                            <div class="col-md-10">: <?php
                                                    if($data->status == 1)
                                                    {
                                                        echo'Peserta Didik';
                                                    }elseif($data->status == 2)
                                                    {
                                                        echo'Wali Murid';
                                                    }elseif($data->status == 3)
                                                    {
                                                        echo'Masyarakat';
                                                    }else
                                                    {
                                                        echo'';
                                                    }
                                                    ?>                 
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-2 text-bold">Uraian Pengaduan</div>
                            <div class="col-md-10">: <?= $data->isi; ?></div>
                        </div>
                        <div class="row mt-5 mb-2">
                            <div class="col-md-12">
                                <a href="<?= base_url('backend/pengaduan'); ?>" class="btn btn-danger btn-sm"><i class="fa fa-arrow-left"></i> KEMBALI</a>                  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
<?= $this->endSection(); ?>
<?= $this->section('script'); ?>
   
<?= $this->endSection(); ?>