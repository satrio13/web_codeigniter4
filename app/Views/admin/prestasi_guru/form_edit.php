<?php
$id_tahun = old('id_tahun') ?? $data->id_tahun;
$jenis = old('jenis') ?? $data->jenis;
$prestasi = old('prestasi') ?? $data->prestasi;
$tingkat = old('tingkat') ?? $data->tingkat;
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
                            <li class="breadcrumb-item"><a href="<?= base_url('backend/prestasi-guru'); ?>">Prestasi Guru</a></li>
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
                        <?php echo form_open_multipart("backend/update-prestasi-guru/$data->id","id='form'"); ?>
                        <?= csrf_field(); ?>
                        <input type="hidden" name="_method" value="PUT">
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">TAHUN PELAJARAN <span class="text-danger">*</span></label>
                                <div class="col-sm-4">
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
                                <label class="col-sm-2 col-form-label">JENIS <span class="text-danger">*</span></label>
                                <div class="col-sm-4">
                                    <select name="jenis" class="form-control required">
                                        <option value="1" <?= ($jenis == 1) ? 'selected' : ''; ?> >Akademik</option>
                                        <option value="2" <?= ($jenis == 0) ? 'selected' : ''; ?> >Non Akademik</option>
                                    </select>
                                    <small class="text-danger">
                                        <?= (session()->has('validation')) ? session('validation')->getError('jenis') : '' ?>
                                    </small> 
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">NAMA LOMBA <span class="text-danger">*</span></label>
                                <div class="col-sm-8">
                                    <input type="text" name="nama" maxlength="100" value="<?= old('nama', $data->nama); ?>" class="form-control required" placeholder="NAMA LOMBA">
                                    <small class="text-danger">
                                        <?= (session()->has('validation')) ? session('validation')->getError('nama') : '' ?>
                                    </small> 
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">PRESTASI <span class="text-danger">*</span></label>
                                <div class="col-sm-4">
                                    <select name="prestasi" class="form-control required">
                                        <option value="1" <?= ($prestasi == 1) ? 'selected' : ''; ?> >Juara 1</option>
                                        <option value="2" <?= ($prestasi == 2) ? 'selected' : ''; ?> >Juara 2</option>
                                        <option value="3" <?= ($prestasi == 3) ? 'selected' : ''; ?> >Juara 3</option>
                                    </select>
                                    <small class="text-danger">
                                        <?= (session()->has('validation')) ? session('validation')->getError('prestasi') : '' ?>
                                    </small> 
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">NAMA GURU</label>
                                <div class="col-sm-8">
                                    <input type="text" name="nama_siswa" maxlength="100" value="<?= old('nama_guru', $data->nama_guru); ?>" class="form-control" placeholder="NAMA GURU">
                                    <small class="text-danger">
                                        <?= (session()->has('validation')) ? session('validation')->getError('nama_guru') : '' ?>
                                    </small> 
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">TINGKAT <span class="text-danger">*</span></label>
                                <div class="col-sm-4">
                                    <select name="tingkat" class="form-control required">
                                        <option value="1" <?= ($tingkat == 1) ? 'selected' : ''; ?> >Kabupaten</option>
                                        <option value="2" <?= ($tingkat == 2) ? 'selected' : ''; ?> >Karesidenan</option>
                                        <option value="3" <?= ($tingkat == 3) ? 'selected' : ''; ?> >Provinsi</option>
                                        <option value="4" <?= ($tingkat == 4) ? 'selected' : ''; ?> >Nasional</option>
                                        <option value="5" <?= ($tingkat == 5) ? 'selected' : ''; ?> >Internasional</option>
                                    </select>
                                    <small class="text-danger">
                                        <?= (session()->has('validation')) ? session('validation')->getError('tingkat') : '' ?>
                                    </small> 
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">KETERANGAN</label>
                                <div class="col-sm-8">
                                    <input type="text" name="keterangan" maxlength="100" value="<?= old('keterangan', $data->keterangan); ?>" class="form-control" placeholder="KETERANGAN">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">GAMBAR</label>
                                <div class="col-sm-5">
                                    <?php
                                        if(empty($data->gambar)){ ?>
                                        <img class='img-responsive' id='preview_gambar' width='150px'>
                                    <?php }else{ ?>
                                        <img class='img-responsive' id='preview_gambar' width='150px' src="<?= base_url(); ?>uploads/img/prestasi/guru/<?= $data->gambar; ?>">
                                    <?php } ?>  
                                    <input type='file' name='gambar' id="file-upload" accept='image/png, image/jpeg' class='form-control' onchange='readURL(this);'>
                                    <small style="color: red"> *) format file JPG/PNG ukuran maksimal 1 MB</small>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                    <span class="text-danger"><b>*</b></span>) Field Wajib Diisi
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" name="submit" value="Submit" class="btn btn-primary btn-sm" onclick="return VerifyUploadSizeIsOK()"><i class="fa fa-check"></i> SIMPAN</button>
                            <a href="<?= base_url('backend/prestasi-guru'); ?>" class="btn btn-danger btn-sm float-right"><i class="fa fa-arrow-left"></i> BATAL</a>
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

        function readURL(input)
        {
            // Mulai membaca inputan gambar
            if (input.files && input.files[0]) {
                var reader = new FileReader(); // Membuat variabel reader untuk API FileReader

                reader.onload = function (e) {
                    // Mulai pembacaan file
                    $("#preview_gambar") // Tampilkan gambar yang dibaca ke area id #preview_gambar
                        .attr("src", e.target.result);
                    //.width(300); // Menentukan lebar gambar preview (dalam pixel)
                    //.height(200); // Jika ingin menentukan lebar gambar silahkan aktifkan perintah pada baris ini
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        function VerifyUploadSizeIsOK()
        {
            var UploadFieldID = "file-upload";
            var MaxSizeInBytes = 1048576;
            var fld = document.getElementById(UploadFieldID);
            if(fld.files && fld.files.length == 1 && fld.files[0].size > MaxSizeInBytes)
            {
                setTimeout(function () { 
                    swal({
                        position: 'top-end',
                        icon: 'error',
                        title: 'Ukuran gambar/foto terlalu besar!!',
                        showConfirmButton: false,
                        timer: 5000
                    });
                },2000); 
                return false;
            }
            return true;
        } 
    </script>
<?= $this->endSection(); ?>