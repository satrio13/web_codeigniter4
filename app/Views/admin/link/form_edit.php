<?php
$is_active = old('is_active') ?? $data->is_active;
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
                            <li class="breadcrumb-item"><a href="<?= base_url('backend/link-terkait'); ?>">Link Terkait</a></li>
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
                        <?php echo form_open("backend/update-link/$data->id", "id='form'"); ?>
                        <?= csrf_field(); ?>
                        <input type="hidden" name="_method" value="PUT">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">NAMA HALAMAN <span class="text-danger">*</span></label>
                                    <div class="col-sm-5">
                                        <input type="text" name="nama" maxlength="100" value="<?= old('nama', $data->nama); ?>" class="form-control" placeholder="NAMA HALAMAN" required>
                                        <small class="text-danger">
                                            <?= (session()->has('validation')) ? session('validation')->getError('nama') : '' ?>
                                        </small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">LINK URL <span class="text-danger">*</span></label>
                                    <div class="col-sm-5">
                                        <input type="url" name="link" value="<?= old('link', $data->link); ?>" class="form-control" placeholder="LINK URL" required>
                                        <small class="text-danger">
                                            <?= (session()->has('validation')) ? session('validation')->getError('link') : '' ?>
                                        </small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">STATUS AKTIF <span class="text-danger">*</span></label>
                                    <div class="col-sm-5">
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" name="is_active" value="1" id="radioPrimary1" <?= ($is_active == 1) ? 'checked' : ''; ?> required> 
                                            <label for="radioPrimary1">Aktif</label> 
                                            &nbsp;&nbsp;&nbsp; 
                                        </div>
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" name="is_active" value="0" id="radioPrimary2" <?= ($is_active == 0) ? 'checked' : ''; ?> required> 
                                            <label for="radioPrimary2">Non Aktif</label>
                                        </div>
                                        <br><label for="is_active" class="error"></label>
                                        <small class="text-danger">
                                            <?= (session()->has('validation')) ? session('validation')->getError('is_active') : '' ?>
                                        </small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <span class="text-danger"><b>*</b></span>) Field Wajib Diisi
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" name="submit" value="Submit" class="btn btn-primary btn-sm"><i class="fa fa-check"></i> SIMPAN</button>
                                <a href="<?= base_url('backend/link-terkait'); ?>" class="btn btn-danger btn-sm float-right"><i class="fa fa-arrow-left"></i> BATAL</a>
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