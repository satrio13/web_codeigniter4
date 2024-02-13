<?php
$id_tahun = old('id_tahun') ?? $data->id_tahun;
?>
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
                    <?php 
                    if(session()->getFlashdata('error'))
                    {
                        echo pesan_gagal(session()->getFlashdata('error'));
                    }
                    ?>
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">FORM <?= strtoupper($title); ?></h3>
                        </div>
                        <?php echo form_open("backend/update-alumni/$data->id","id='form'"); ?>
                        <?= csrf_field(); ?>
                        <input type="hidden" name="_method" value="PUT">
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">TAHUN PELAJARAN <span class="text-danger">*</span></label>
                                <div class="col-sm-5">
                                    <select name="id_tahun" class="form-control required">
                                        <?php foreach($tahun as $r): ?>    
                                            <option value="<?= $r->id_tahun; ?>" <?= ($id_tahun == $r->id_tahun) ? 'selected' : ''; ?> ><?= $r->tahun; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <small class="text-danger">
                                        <?= (session()->has('validation')) ? session('validation')->getError('id_tahun') : '' ?>
                                    </small> 
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">JUMLAH LAKI-LAKI <span class="text-danger">*</span></label>
                                <div class="col-sm-2">
                                    <input type="number" name="jml_l" min="0" value="<?= old('jml_l', $data->jml_l); ?>" class="form-control required">
                                    <small class="text-danger">
                                        <?= (session()->has('validation')) ? session('validation')->getError('jml_l') : '' ?>
                                    </small> 
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">JUMLAH PEREMPUAN <span class="text-danger">*</span></label>
                                <div class="col-sm-2">
                                    <input type="number" name="jml_p" min="0" value="<?= old('jml_p', $data->jml_p); ?>" class="form-control required">
                                    <small class="text-danger">
                                        <?= (session()->has('validation')) ? session('validation')->getError('jml_p') : '' ?>
                                    </small> 
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="offset-sm-3 col-sm-9">
                                    <span class="text-danger"><b>*</b></span>) Field Wajib Diisi
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" name="submit" value="Submit" class="btn btn-primary btn-sm"><i class="fa fa-check"></i> SIMPAN</button>
                            <a href="<?= base_url('backend/alumni'); ?>" class="btn btn-danger btn-sm float-right"><i class="fa fa-arrow-left"></i> BATAL</a>
                        </div>  
                        <?php echo form_close() ?>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
            </section>
            <!-- /.content -->
    </div>
<?= $this->endSection(); ?>
<?= $this->section('script'); ?>
    <script>
        $(document).ready(function () {
            handle_validate();
        });

        function handle_validate()
        {
            $("#form").validate();
        }
    </script>
<?= $this->endSection(); ?>