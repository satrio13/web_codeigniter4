
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
                            <li class="breadcrumb-item"><a href="<?= base_url('backend/siswa'); ?>">Peserta Didik</a></li>
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
                        <?php echo form_open("backend/update-siswa/$data->id","id='form'"); ?>
                        <?= csrf_field(); ?>
                        <input type="hidden" name="_method" value="PUT">
                        <div class="card-body">
                            <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">TAHUN PELAJARAN <span class="text-danger">*</span></label>
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
                                    <label class="col-sm-2 col-form-label"><?php if($profil->jenjang == 1 OR $profil->jenjang == 3){ echo'KELAS VII'; }else{ echo'KELAS X'; } ?> <span class="text-danger">*</span></label>
                                    <div class="col-sm-3">
                                        <input type="number" name="jml1pa" min="0" value="<?= old('jml1pa', $data->jml1pa); ?>" class="form-control required" placeholder="JUMLAH SISWA PUTRA">
                                        <small class="text-danger">
                                            <?= (session()->has('validation')) ? session('validation')->getError('jml1pa') : '' ?>
                                        </small>
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="number" name="jml1pi" min="0" value="<?= old('jml1pi', $data->jml1pi); ?>" class="form-control required" placeholder="JUMLAH SISWA PUTRI">
                                        <small class="text-danger">
                                            <?= (session()->has('validation')) ? session('validation')->getError('jml1pi') : '' ?>
                                        </small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label"><?php if($profil->jenjang == 1 OR $profil->jenjang == 3){ echo'KELAS VIII'; }else{ echo'KELAS XI'; } ?> <span class="text-danger">*</span></label>
                                    <div class="col-sm-3">
                                        <input type="number" name="jml2pa" min="0" value="<?= old('jml2pa', $data->jml2pa); ?>" class="form-control required" placeholder="JUMLAH SISWA PUTRA">
                                        <small class="text-danger">
                                            <?= (session()->has('validation')) ? session('validation')->getError('jml2pa') : '' ?>
                                        </small>
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="number" name="jml2pi" min="0" value="<?= old('jml2pi', $data->jml2pi); ?>" class="form-control required" placeholder="JUMLAH SISWA PUTRI">
                                        <small class="text-danger">
                                            <?= (session()->has('validation')) ? session('validation')->getError('jml2pi') : '' ?>
                                        </small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label"><?php if($profil->jenjang == 1 OR $profil->jenjang == 3){ echo'KELAS IX'; }else{ echo'KELAS XII'; } ?> <span class="text-danger">*</span></label>
                                    <div class="col-sm-3">
                                        <input type="number" name="jml3pa" min="0" value="<?= old('jml3pa', $data->jml3pa); ?>" class="form-control required" placeholder="JUMLAH SISWA PUTRA">
                                        <small class="text-danger">
                                            <?= (session()->has('validation')) ? session('validation')->getError('jml3pa') : '' ?>
                                        </small>
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="number" name="jml3pi" min="0" value="<?= old('jml3pi', $data->jml3pi); ?>" class="form-control required" placeholder="JUMLAH SISWA PUTRI">
                                        <small class="text-danger">
                                            <?= (session()->has('validation')) ? session('validation')->getError('jml3pi') : '' ?>
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
                                <a href="<?= base_url('backend/siswa'); ?>" class="btn btn-danger btn-sm float-right"><i class="fa fa-arrow-left"></i> BATAL</a>
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
