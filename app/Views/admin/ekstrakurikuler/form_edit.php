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
                            <li class="breadcrumb-item"><a href="<?= base_url('backend/ekstrakurikuler'); ?>">Ekstrakurikuler</a></li>
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
                        <?php echo form_open_multipart("backend/update-ekstrakurikuler/$data->id", "id='form'"); ?>
                        <?= csrf_field(); ?>
                        <input type="hidden" name="_method" value="PUT">
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">NAMA EKSTRAKURIKULER <span class="text-danger">*</span></label>
                                <div class="col-sm-8">
                                    <input type="text" name="nama_ekstrakurikuler" maxlength="100" value="<?= old('nama_ekstrakurikuler', $data->nama_ekstrakurikuler); ?>" class="form-control required" placeholder="NAMA EKSTRAKURIKULER">
                                    <small class="text-danger">
                                        <?= (session()->has('validation')) ? session('validation')->getError('nama_ekstrakurikuler') : '' ?>
                                    </small>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">KETERANGAN</label>
                                <div class="col-sm-8">
                                    <textarea class="textarea" name="keterangan"><?= old('keterangan', $data->keterangan); ?></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">GAMBAR</label>
                                <div class="col-sm-5">
                                    <?php if(empty($data->gambar)){ ?>
                                        <img class='img-responsive' id='preview_gambar' width='150px'>
                                    <?php }else{ ?>
                                        <img class='img-responsive' id='preview_gambar' width='150px' src="<?= base_url(); ?>uploads/img/ekstrakurikuler/<?= $data->gambar; ?>">
                                    <?php } ?>
                                    <input type='file' name='gambar' id="file-upload" accept='image/png, image/jpeg' class='form-control' onchange='readURL(this);'>
                                    <small style="color: red"> *) format file JPG/PNG ukuran maksimal 1 MB</small>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                    <label class="form-check-label" for="exampleCheck2">*) Field Wajib Diisi</label>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" name="submit" value="Submit" class="btn btn-primary btn-sm" onclick="return VerifyUploadSizeIsOK()"><i class="fa fa-check"></i> SIMPAN</button>
                            <a href="<?= base_url('backend/ekstrakurikuler'); ?>" class="btn btn-danger btn-sm float-right"><i class="fa fa-arrow-left"></i> BATAL</a>
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
        });

        function handle_validate()
        {
            $("#form").validate();
        }

        function handle_summernote()
        {
            $(".textarea").summernote();
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