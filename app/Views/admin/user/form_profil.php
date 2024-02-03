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
                    if(session()->getFlashdata('success'))
                    {
                        echo pesan_sukses(session()->getFlashdata('success'));
                    }elseif(session()->getFlashdata('error'))
                    {
                        echo pesan_gagal(session()->getFlashdata('error'));
                    }
                    ?>
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">FORM <?= strtoupper($title); ?></h3>
                        </div>
                        <?php echo form_open("backend/update-profil","id='form'"); ?>
                        <?= csrf_field(); ?>
                        <input type="hidden" name="_method" value="PUT">
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">NAMA <span class="text-danger">*</span></label>
                                <div class="col-sm-5">
                                    <input type='text' name='nama' maxlength="100" class='form-control required' placeholder='Nama' value="<?= old('nama', $data->nama); ?>">
                                    <small class="text-danger">
                                        <?= (session()->has('validation')) ? session('validation')->getError('nama') : '' ?>
                                    </small>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">USERNAME <span class="text-danger">*</span></label>
                                <div class="col-sm-5">
                                    <input type='text' name='username' class='form-control sepasi required' minlength="5" maxlength="30" placeholder='Username' value="<?= old('username', $data->username); ?>" autocomplete="off">
                                    <small class="text-danger">
                                        <?= (session()->has('validation')) ? session('validation')->getError('username') : '' ?>
                                    </small>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">EMAIL <span class="text-danger">*</span></label>
                                <div class="col-sm-5">
                                    <input type='email' name='email' class='form-control sepasi required' placeholder='Email' value="<?= old('email', $data->email); ?>">
                                    <small class="text-danger">
                                        <?= (session()->has('validation')) ? session('validation')->getError('email') : '' ?>
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
                            <button type="button" class='btn btn-danger float-right btn sm' onclick='self.history.back()'><i class="fa fa-arrow-left"></i> BATAL</button>
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
            handle_sepasi();
        });

        function handle_validate()
        {
            $('#form').validate();
        }

        function handle_sepasi()
        {
            $(".sepasi").on({
                keydown: function(e) {
                    if (e.which === 32)
                    return false;
                },
                change: function() {
                    this.value = this.value.replace(/\s/g, "");  
                }
            });
        }
    </script>
<?= $this->endSection(); ?>