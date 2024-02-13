<?php
$kelompok = old('kelompok') ?? $data->kelompok;
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
                            <li class="breadcrumb-item"><a href="<?= base_url('backend/kurikulum'); ?>">Kurikulum</a></li>
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
                        <?php echo form_open("backend/update-kurikulum/$data->id_kurikulum", 'id="form"'); ?>
                        <?= csrf_field(); ?>
                        <input type="hidden" name="_method" value="PUT">
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">MATA PELAJARAN <span class="text-danger">*</span></label>
                                <div class="col-sm-5">
                                    <input type="text" name="mapel" maxlength="50" value="<?= old('mapel', $data->mapel); ?>" class="form-control required" placeholder="NAMA MATA PELAJARAN">
                                    <small class="text-danger">
                                        <?= (session()->has('validation')) ? session('validation')->getError('mapel') : '' ?>
                                    </small>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">KELOMPOK <span class="text-danger">*</span></label>
                                <div class="col-sm-3">
                                    <select name="kelompok" class="form-control required">
                                        <option value="A" <?= ($kelompok == 'A') ? 'selected' : ''; ?> >A</option>
                                        <option value="B" <?= ($kelompok == 'B') ? 'selected' : ''; ?> >B</option>
                                        <option value="C" <?= ($kelompok == 'C') ? 'selected' : ''; ?> >C</option>
                                    </select>
                                    <small class="text-danger">
                                        <?= (session()->has('validation')) ? session('validation')->getError('kelompok') : '' ?>
                                    </small>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">NO URUT <span class="text-danger">*</span></label>
                                <div class="col-sm-3">
                                    <input type="number" name="no_urut" value="<?= old('no_urut', $data->no_urut); ?>" min="0" onkeypress="return hanyaAngka(event)" class="form-control required" placeholder="NO URUT">
                                    <small class="text-danger">
                                        <?= (session()->has('validation')) ? session('validation')->getError('no_urut') : '' ?>
                                    </small>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">ALOKASI WAKTU <span class="text-danger">*</span></label>
                                <div class="col-sm-3">
                                    <input type="number" name="alokasi" value="<?= old('alokasi', $data->alokasi); ?>" min="0" onkeypress="return hanyaAngka(event)" class="form-control required" placeholder="ALOKASI WAKTU">
                                    <small class="text-danger">
                                        <?= (session()->has('validation')) ? session('validation')->getError('alokasi') : '' ?>
                                    </small>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">STATUS AKTIF <span class="text-danger">*</span></label>
                                <div class="col-sm-5">
                                    <div class="icheck-primary d-inline">
                                        <input type="radio" name="is_active" value="1" id="radioPrimary1" <?= ($is_active == '1') ? 'checked' : ''; ?> required> 
                                        <label for="radioPrimary1">Aktif</label> 
                                        &nbsp;&nbsp;&nbsp; 
                                    </div>
                                    <div class="icheck-primary d-inline">
                                        <input type="radio" name="is_active" value="0" id="radioPrimary2" <?= ($is_active == '0') ? 'checked' : ''; ?> required> 
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
                            <a href="<?= base_url('backend/kurikulum'); ?>" class="btn btn-danger btn-sm float-right"><i class="fa fa-arrow-left"></i> BATAL</a>
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

        function hanyaAngka(evt)
        {
            var charCode = evt.which ? evt.which : event.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) return false;
            return true;
        }
    </script>
<?= $this->endSection(); ?>