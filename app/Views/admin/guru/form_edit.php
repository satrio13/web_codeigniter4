<?php
$statuspeg = old('statusgeg') ?? $data->statuspeg;
$golruang = old('golruang') ?? $data->golruang;
$jk = old('jk') ?? $data->jk;
$agama = old('agama') ?? $data->agama;
$status = old('status') ?? $data->status;
$statusguru = old('statusguru') ?? $data->statusguru;
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
                            <li class="breadcrumb-item"><a href="<?= base_url('backend/guru'); ?>">Guru</a></li>
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
                        <?php echo form_open_multipart("backend/update-guru/$data->id",'id="form"'); ?>
                        <?= csrf_field(); ?>
                        <input type="hidden" name="_method" value="PUT">
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">NAMA LENGKAP <span class="text-danger">*</span></label>
                                <div class="col-sm-5">
                                    <input type="text" name="nama" maxlength="100" value="<?= old('nama', $data->nama); ?>" class="form-control required" placeholder="NAMA LENGKAP">
                                    <small class="text-danger">
                                        <?= (session()->has('validation')) ? session('validation')->getError('nama') : '' ?>
                                    </small> 
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">NIP BARU</label>
                                <div class="col-sm-5">
                                    <input type="text" name="nip" maxlength="25" value="<?= old('nip', $data->nip); ?>" class="form-control" placeholder="NIP">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">DUK</label>
                                <div class="col-sm-5">
                                    <input type="text" name="duk" maxlength="20" value="<?= old('duk', $data->duk); ?>" class="form-control" placeholder="DUK">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">NIP LAMA</label>
                                <div class="col-sm-5">
                                    <input type="text" name="niplama" maxlength="25" value="<?= old('niplama', $data->niplama); ?>" class="form-control" placeholder="NIP LAMA">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">NUPTK</label>
                                <div class="col-sm-5">
                                    <input type="text" name="nuptk" maxlength="25" value="<?= old('nuptk', $data->nuptk); ?>" class="form-control" placeholder="NUPTK">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">NO KARPEG</label>
                                <div class="col-sm-5">
                                    <input type="text" name="nokarpeg" maxlength="12" value="<?= old('nokarpeg', $data->nokarpeg); ?>" class="form-control" placeholder="NO KARPEG">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">TEMPAT LAHIR <span class="text-danger">*</span></label>
                                <div class="col-sm-5">
                                    <input type="text" name="tmp_lahir" maxlength="50" value="<?= old('tmp_lahir', $data->tmp_lahir); ?>" class="form-control required" placeholder="TEMPAT LAHIR">
                                    <small class="text-danger">
                                        <?= (session()->has('validation')) ? session('validation')->getError('tmp_lahir') : '' ?>
                                    </small> 
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">TANGGAL LAHIR <span class="text-danger">*</span></label>
                                <div class="col-sm-5">
                                    <input type="date" name="tgl_lahir" value="<?= old('tgl_lahir', $data->tgl_lahir); ?>" class="form-control required" placeholder="dd/mm/yyyy">
                                    <small class="text-danger">
                                        <?= (session()->has('validation')) ? session('validation')->getError('tgl_lahir') : '' ?>
                                    </small> 
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">STATUS PEGAWAI <span class="text-danger">*</span></label>
                                <div class="col-sm-5">
                                    <div class="icheck-primary d-inline">
                                        <input type="radio" name="statuspeg" value="PNS" id="radioPrimary1" <?= ($statuspeg == 'PNS') ? 'checked' : ''; ?> required> 
                                        <label for="radioPrimary1">PNS</label> 
                                        &nbsp;&nbsp;&nbsp; 
                                    </div>
                                    <div class="icheck-primary d-inline">
                                        <input type="radio" name="statuspeg" value="CPNS" id="radioPrimary2" <?= ($statuspeg == 'CPNS') ? 'checked' : ''; ?> required> 
                                        <label for="radioPrimary2">CPNS</label> 
                                        &nbsp;&nbsp;&nbsp; 
                                    </div>
                                    <div class="icheck-primary d-inline">
                                        <input type="radio" name="statuspeg" value="GTT" id="radioPrimary3" <?= ($statuspeg == 'GTT') ? 'checked' : ''; ?> required> 
                                        <label for="radioPrimary3">GTT</label> 
                                        &nbsp;&nbsp;&nbsp; 
                                    </div>
                                    <br><label for="statuspeg" class="error"></label>
                                    <small class="text-danger">
                                        <?= (session()->has('validation')) ? session('validation')->getError('statuspeg') : '' ?>
                                    </small> 
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">GOLONGAN RUANG</label>
                                <div class="col-sm-5">
                                    <select name="golruang" class="form-control">
                                        <option value="-" <?= ($golruang == '-') ? 'selected' : ''; ?> >-</option>
                                        <option value="I/a" <?= ($golruang == 'I/a') ? 'selected' : ''; ?> >I/a</option>
                                        <option value="I/b" <?= ($golruang == 'I/b') ? 'selected' : ''; ?> >I/b</option>
                                        <option value="I/c" <?= ($golruang == 'I/c') ? 'selected' : ''; ?> >I/c</option>
                                        <option value="I/d" <?= ($golruang == 'I/d') ? 'selected' : ''; ?> >I/d</option>
                                        <option value="II/a" <?= ($golruang == 'II/a') ? 'selected' : ''; ?> >II/a</option>
                                        <option value="II/b" <?= ($golruang == 'II/b') ? 'selected' : ''; ?> >II/b</option>
                                        <option value="II/c" <?= ($golruang == 'II/c') ? 'selected' : ''; ?> >II/c</option>
                                        <option value="II/d" <?= ($golruang == 'II/d') ? 'selected' : ''; ?> >II/d</option>
                                        <option value="III/a" <?= ($golruang == 'III/a') ? 'selected' : ''; ?> >III/a</option>
                                        <option value="III/b" <?= ($golruang == 'III/b') ? 'selected' : ''; ?> >III/b</option>
                                        <option value="III/c" <?= ($golruang == 'III/c') ? 'selected' : ''; ?> >III/c</option>
                                        <option value="III/d" <?= ($golruang == 'III/d') ? 'selected' : ''; ?> >III/d</option>
                                        <option value="IV/a" <?= ($golruang == 'IV/a') ? 'selected' : ''; ?>  >IV/a</option>
                                        <option value="IV/b" <?= ($golruang == 'IV/b') ? 'selected' : ''; ?> >IV/b</option>
                                        <option value="IV/c" <?= ($golruang == 'IV/c') ? 'selected' : ''; ?> >IV/c</option>
                                        <option value="IV/d" <?= ($golruang == 'IV/d') ? 'selected' : ''; ?> >IV/d</option>   
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">TANGGAL TMT CPNS</label>
                                <div class="col-sm-5">
                                    <input type="date" name="tmt_cpns" value="<?= old('tmt_cpns', $data->tmt_cpns); ?>" class="form-control" placeholder="dd/mm/yyyy">
                                </div>
                                <div class="col-sm-4">
                                    <small class="text-danger">tidak perlu diisi jika status masih GTT</small>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">TANGGAL TMT PNS</label>
                                <div class="col-sm-5">
                                    <input type="date" name="tmt_pns" value="<?= old('tmt_pns', $data->tmt_pns); ?>" class="form-control" placeholder="dd/mm/yyyy">
                                </div>
                                <div class="col-sm-4">
                                    <small class="text-danger">tidak perlu diisi jika status masih GTT atau CPNS</small>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">JENIS KELAMIN <span class="text-danger">*</span></label>
                                <div class="col-sm-5">
                                    <div class="icheck-primary d-inline">
                                        <input type="radio" name="jk" value="1" id="radioPrimary4" <?= ($jk == '1') ? 'checked' : ''; ?> required> 
                                        <label for="radioPrimary4">Laki-Laki</label> 
                                        &nbsp;&nbsp;&nbsp; 
                                    </div>
                                    <div class="icheck-primary d-inline">
                                        <input type="radio" name="jk" value="2" id="radioPrimary5" <?= ($jk == '2') ? 'checked' : ''; ?> required> 
                                        <label for="radioPrimary5">Perempuan</label> 
                                        &nbsp;&nbsp;&nbsp; 
                                    </div>
                                    <br><label for="jk" class="error"></label>
                                    <small class="text-danger">
                                        <?= (session()->has('validation')) ? session('validation')->getError('jk') : '' ?>
                                    </small> 
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">AGAMA</label>
                                <div class="col-sm-5">
                                    <select name="agama" class="form-control">
                                        <option value="1" <?= ($agama == '1') ? 'selected' : ''; ?> >Islam</option>
                                        <option value="2" <?= ($agama == '2') ? 'selected' : ''; ?> >Kristen Katolik</option>
                                        <option value="3" <?= ($agama == '3') ? 'selected' : ''; ?> >Kristen Protestan</option>
                                        <option value="4" <?= ($agama == '4') ? 'selected' : ''; ?> >Hindu</option>
                                        <option value="5" <?= ($agama == '5') ? 'selected' : ''; ?> >Budha</option>
                                        <option value="6" <?= ($agama == '6') ? 'selected' : ''; ?> >Konghuchu</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">ALAMAT</label>
                                <div class="col-sm-5">
                                    <input type="text" name="alamat" maxlength="100" value="<?= old('alamat', $data->alamat); ?>" class="form-control" placeholder="ALAMAT">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">TINGKAT PENDIDIKAN TERAKHIR</label>
                                <div class="col-sm-5">
                                    <input type="text" name="tingkat_pt" maxlength="20" value="<?= old('tingkat_pt', $data->tingkat_pt); ?>" class="form-control" placeholder="PENDIDIKAN TERAKHIR">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">PRODI</label>
                                <div class="col-sm-5">
                                    <input type="text" name="prodi" maxlength="50" value="<?= old('prodi', $data->prodi); ?>" class="form-control" placeholder="PRODI">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">TAHUN LULUS</label>
                                <div class="col-sm-5">
                                    <input type="text" name="th_lulus" minlength="4" maxlength="4" value="<?= old('th_lulus', $data->th_lulus); ?>" onkeypress="return hanyaAngka(event)" class="form-control" placeholder="TAHUN LULUS">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">STATUS AKTIF <span class="text-danger">*</span></label>
                                <div class="col-sm-5">
                                    <div class="icheck-primary d-inline">
                                        <input type="radio" name="status" value="Aktif" id="radioPrimary6" <?= ($status == 'Aktif') ? 'checked' : ''; ?> required> 
                                        <label for="radioPrimary6">Aktif</label> 
                                        &nbsp;&nbsp;&nbsp; 
                                    </div>
                                    <div class="icheck-primary d-inline">
                                        <input type="radio" name="status" value="Mutasi" id="radioPrimary7" <?= ($status == 'Mutasi') ? 'checked' : ''; ?> required> 
                                        <label for="radioPrimary7">Mutasi</label> 
                                        &nbsp;&nbsp;&nbsp; 
                                    </div>
                                    <div class="icheck-primary d-inline">
                                        <input type="radio" name="status" value="Pensiun" id="radioPrimary8" <?= ($status == 'Pensiun') ? 'checked' : ''; ?> required> 
                                        <label for="radioPrimary8">Pensiun</label> 
                                        &nbsp;&nbsp;&nbsp; 
                                    </div>
                                    <br><label for="status" class="error"></label>
                                    <small class="text-danger">
                                        <?= (session()->has('validation')) ? session('validation')->getError('status') : '' ?>
                                    </small> 
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">STATUS GURU <span class="text-danger">*</span></label>
                                <div class="col-sm-5">
                                    <div class="icheck-primary d-inline">
                                        <input type="radio" name="statusguru" value="Mapel" id="radioPrimary9" <?= ($statusguru == 'Mapel') ? 'checked' : ''; ?> required> 
                                        <label for="radioPrimary9">Mapel</label> 
                                        &nbsp;&nbsp;&nbsp; 
                                    </div>
                                    <div class="icheck-primary d-inline">
                                        <input type="radio" name="statusguru" value="BP/BK" id="radioPrimary10" <?= ($statusguru == 'BP/BK') ? 'checked' : ''; ?> required> 
                                        <label for="radioPrimary10">BP/BK</label> 
                                        &nbsp;&nbsp;&nbsp; 
                                    </div>
                                    <div class="icheck-primary d-inline">
                                        <input type="radio" name="statusguru" value="Kurikulum" id="radioPrimary11" <?= ($statusguru == 'Kurikulum') ? 'checked' : ''; ?> required> 
                                        <label for="radioPrimary11">Kurikulum</label> 
                                        &nbsp;&nbsp;&nbsp; 
                                    </div>
                                    <br><label for="statusguru" class="error"></label>
                                    <small class="text-danger">
                                        <?= (session()->has('validation')) ? session('validation')->getError('statusguru') : '' ?>
                                    </small> 
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">EMAIL</label>
                                <div class="col-sm-5">
                                    <input type="email" name="email" maxlength="100" value="<?= old('email', $data->email); ?>" class="form-control" placeholder="EMAIL">
                                    <small class="text-danger">
                                        <?= (session()->has('validation')) ? session('validation')->getError('email') : '' ?>
                                    </small> 
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">FOTO</label>
                                <div class="col-sm-5">
                                    <?php
                                    if(empty($data->gambar)){ ?>
                                        <img class='img-responsive' id='preview_gambar' width='150px'>
                                    <?php }else{ ?>
                                        <img class='img-responsive' id='preview_gambar' width='150px' src="<?= base_url(); ?>uploads/img/guru/<?= $data->gambar; ?>">
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
                            <a href="<?= base_url('backend/guru'); ?>" class="btn btn-danger btn-sm float-right"><i class="fa fa-arrow-left"></i> BATAL</a>
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