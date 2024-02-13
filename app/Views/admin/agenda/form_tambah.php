<?php
$berapa_hari = old('berapa_hari');
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
                            <li class="breadcrumb-item"><a href="<?= base_url('backend/agenda'); ?>">Agenda</a></li>
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
                        <?php echo form_open_multipart('backend/simpan-agenda','id="form"'); ?>
                        <?= csrf_field(); ?>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">NAMA AGENDA <span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" name="nama_agenda" maxlength="100" value="<?= set_value('nama_agenda'); ?>" class="form-control" placeholder="NAMA AGENDA" required>
                                        <small class="text-danger">
                                            <?= (session()->has('validation')) ? session('validation')->getError('nama_agenda') : '' ?>
                                        </small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">BERAPA HARI <span class="text-danger">*</span></label>
                                    <div class="col-sm-2">
                                        <select name="berapa_hari" class="form-control" id="berapa_hari" required>
                                            <option value="1" <?= set_select('berapa_hari',1); ?> >1 Hari</option>
                                            <option value="2" <?= set_select('berapa_hari',2); ?> >Lebih dari 1 hari</option>
                                        </select>
                                        <small class="text-danger">
                                            <?= (session()->has('validation')) ? session('validation')->getError('berapa_hari') : '' ?>
                                        </small>
                                    </div>
                                </div>
                                <div class="form-group row" id="tgl1" <?php if($berapa_hari == 2){ ?> style="display:none" <?php }else{ } ?> >
                                    <label class="col-sm-2 col-form-label">TANGGAL <span class="text-danger">*</span></label>
                                    <div class="col-sm-2">
                                        <input type='date' name='tgl' class='form-control' value="<?= set_value('tgl'); ?>" required>
                                        <small class="text-danger">
                                            <?= (session()->has('validation')) ? session('validation')->getError('tgl') : '' ?>
                                        </small>
                                    </div>
                                </div>
                                <div class="form-group row" id="tgl_mulai" <?php if($berapa_hari == 2){ }else{ ?> style="display:none" <?php } ?> >
                                    <label class="col-sm-2 col-form-label">TANGGAL MULAI <span class="text-danger">*</span></label>
                                    <div class="col-sm-2">
                                        <input type='date' name='tgl_mulai' class='form-control' value="<?= set_value('tgl_mulai'); ?>" required>
                                        <small class="text-danger">
                                            <?= (session()->has('validation')) ? session('validation')->getError('tgl_mulai') : '' ?>
                                        </small>
                                    </div>
                                </div>
                                <div class="form-group row" id="tgl_selesai" <?php if($berapa_hari == 2){ }else{ ?> style="display:none" <?php } ?> >
                                    <label class="col-sm-2 col-form-label">TANGGAL SELESAI <span class="text-danger">*</span></label>
                                    <div class="col-sm-2">
                                        <input type='date' name='tgl_selesai' class='form-control' value="<?= set_value('tgl_selesai'); ?>" required>
                                        <small class="text-danger">
                                            <?= (session()->has('validation')) ? session('validation')->getError('tgl_selesai') : '' ?>
                                        </small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">JAM <span class="text-danger">*</span></label>
                                    <div class="col-sm-2">
                                        <input type='time' name='jam_mulai' class='form-control' value="<?= set_value('jam_mulai'); ?>" required>
                                        <small class="text-danger">
                                            <?= (session()->has('validation')) ? session('validation')->getError('jam_mulai') : '' ?>
                                        </small>
                                    </div>s.d.
                                    <div class="col-sm-2">
                                        <input type='time' name='jam_selesai' class='form-control' value="<?= set_value('jam_selesai'); ?>" required>
                                        <small class="text-danger">
                                            <?= (session()->has('validation')) ? session('validation')->getError('jam_selesai') : '' ?>
                                        </small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">TEMPAT <span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" name="tempat" maxlength="100" value="<?= set_value('tempat'); ?>" class="form-control" placeholder="NAMA TEMPAT" required>
                                        <small class="text-danger">
                                            <?= (session()->has('validation')) ? session('validation')->getError('tempat') : '' ?>
                                        </small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">KETERANGAN</label>
                                    <div class="col-sm-8">
                                        <textarea class="textarea" name="keterangan"><?= set_value('keterangan'); ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">GAMBAR</label>
                                    <div class="col-sm-5">
                                        <img class='img-responsive' id='preview_gambar' width='150px'>
                                        <input type='file' name='gambar' accept='image/png, image/jpeg' id="file-upload" class='form-control' onchange='readURL(this);'>
                                        <small style="color: red"> *) format file JPG/PNG ukuran maksimal 1 MB</small>
                                        <br>
                                        <small class="text-danger">
                                            <?= (session()->has('validation')) ? session('validation')->getError('gambar') : '' ?>
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
                                <button type="submit" name="submit" value="Submit" class="btn btn-primary btn-sm" onclick="return VerifyUploadSizeIsOK()"><i class="fa fa-check"></i> SIMPAN</button>
                                <a href="<?= base_url('backend/agenda'); ?>" class="btn btn-danger btn-sm float-right"><i class="fa fa-arrow-left"></i> BATAL</a>
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
            handle_summernote();
            handle_berapa_hari();
        });

        function handle_validate()
        {
            $("#form").validate();
        }

        function handle_summernote()
        {
            $(".textarea").summernote();
        }

        function handle_berapa_hari()
        {
            $("#berapa_hari").change(function () {
                var id = $(this).val();
                if(id == "1")
                {
                    $("#tgl1").fadeIn(500);
                    $("#tgl_mulai").hide();
                    $("#tgl_selesai").hide();
                }else if(id == "2")
                {
                    $("#tgl1").hide();
                    $("#tgl_mulai").fadeIn(500);
                    $("#tgl_selesai").fadeIn(500);
                }
            });
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