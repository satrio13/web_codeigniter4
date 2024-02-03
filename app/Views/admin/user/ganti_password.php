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
                    if(session()->getFlashdata('error'))
                    {
                        echo pesan_gagal(session()->getFlashdata('error'));
                    }
                    ?>
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">FORM <?= strtoupper($title); ?></h3>
                        </div>
                        <?php echo form_open("backend/update-password","id='form-user'"); ?>
                        <?= csrf_field(); ?>
                        <input type="hidden" name="_method" value="PUT">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">USERNAME <span class="text-danger">*</span></label>
                                    <div class="col-sm-5">
                                        <input type="text" name="username" minlength="5" maxlength="30" readonly class="form-control sepasi required" value="<?= $username; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">PASSWORD BARU <span class="text-danger">*</span></label>
                                    <div class="col-sm-5">
                                        <input type="password" name="password1" id="password1" value="<?= set_value('password1'); ?>" minlength="5" maxlength="30" placeholder="Password Baru" class="form-control sepasi required required">
                                        <small class="text-danger">
                                            <?= (session()->has('validation')) ? session('validation')->getError('password1') : '' ?>
                                        </small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">ULANG PASSWORD BARU <span class="text-danger">*</span></label>
                                    <div class="col-sm-5">
                                        <input type="password" name="password2" id="password2" value="<?= set_value('password2'); ?>" minlength="5" maxlength="30" placeholder="Ketik Ulang Password Baru" class="form-control sepasi required">
                                        <small class="text-danger">
                                            <?= (session()->has('validation')) ? session('validation')->getError('password2') : '' ?>
                                        </small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">PASSWORD LAMA <span class="text-danger">*</span></label>
                                    <div class="col-sm-5">
                                        <input type="password" name="password3" id="password3" value="<?= set_value('password3'); ?>" minlength="5" maxlength="30" placeholder="Password Lama" id="sepasi3" class="form-control required">
                                        <small class="text-danger">
                                            <?= (session()->has('validation')) ? session('validation')->getError('password3') : '' ?>
                                        </small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-3 col-sm-9">
                                        <label class="form-check-label" for="exampleCheck2"><span class="text-danger">*</span>) Field Wajib Diisi</label>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" name="submit" value="Submit" class="btn btn-primary btn-sm"><i class="fa fa-check"></i> SIMPAN</button>
                                <button type="button" class='btn btn-danger btn-sm float-right' onclick='self.history.back()'><i class="fa fa-arrow-left"></i> BATAL</button>
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
            handle_validate_user();
            handle_sepasi();
        });

        function handle_validate_user()
        {
            $('#form-user').validate({
                rules: 
                {
                    password2:
                    {
                        equalTo: "#password1"
                    }
                },
                messages:
                {
                    password2:
                    {
                        equalTo: "Password tidak sama"
                    }
                }
            });
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