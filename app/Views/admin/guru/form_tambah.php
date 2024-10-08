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
                        <?php echo form_open_multipart('backend/simpan-guru','id="form"'); ?>
                        <?= csrf_field(); ?>
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">NAMA LENGKAP <span class="text-danger">*</span></label>
                                <div class="col-sm-5">
                                    <input type="text" name="nama" maxlength="100" value="<?= set_value('nama'); ?>" class="form-control required" placeholder="NAMA LENGKAP">
                                    <small class="text-danger">
                                        <?= (session()->has('validation')) ? session('validation')->getError('nama') : '' ?>
                                    </small> 
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">NIP BARU</label>
                                <div class="col-sm-5">
                                    <input type="text" name="nip" maxlength="25" value="<?= set_value('nip'); ?>" class="form-control" placeholder="NIP">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">DUK</label>
                                <div class="col-sm-5">
                                    <input type="text" name="duk" maxlength="20" value="<?= set_value('duk'); ?>" class="form-control" placeholder="DUK">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">NIP LAMA</label>
                                <div class="col-sm-5">
                                    <input type="text" name="niplama" maxlength="25" value="<?= set_value('niplama'); ?>" class="form-control" placeholder="NIP LAMA">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">NUPTK</label>
                                <div class="col-sm-5">
                                    <input type="text" name="nuptk" maxlength="25" value="<?= set_value('nuptk'); ?>" class="form-control" placeholder="NUPTK">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">NO KARPEG</label>
                                <div class="col-sm-5">
                                    <input type="text" name="nokarpeg" maxlength="12" value="<?= set_value('nokarpeg'); ?>" class="form-control" placeholder="NO KARPEG">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">TEMPAT LAHIR <span class="text-danger">*</span></label>
                                <div class="col-sm-5">
                                    <input type="text" name="tmp_lahir" maxlength="50" value="<?= set_value('tmp_lahir'); ?>" class="form-control required" placeholder="TEMPAT LAHIR">
                                    <small class="text-danger">
                                        <?= (session()->has('validation')) ? session('validation')->getError('tmp_lahir') : '' ?>
                                    </small> 
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">TANGGAL LAHIR <span class="text-danger">*</span></label>
                                <div class="col-sm-5">
                                    <input type="date" name="tgl_lahir" value="<?= set_value('tgl_lahir'); ?>" class="form-control required" placeholder="dd/mm/yyyy">
                                    <small class="text-danger">
                                        <?= (session()->has('validation')) ? session('validation')->getError('tgl_lahir') : '' ?>
                                    </small> 
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">STATUS PEGAWAI <span class="text-danger">*</span></label>
                                <div class="col-sm-5">
                                    <div class="icheck-primary d-inline">
                                        <input type="radio" name="statuspeg" value="PNS" id="radioPrimary1" <?= set_radio('statuspeg','PNS'); ?> required> 
                                        <label for="radioPrimary1">PNS</label> 
                                        &nbsp;&nbsp;&nbsp; 
                                    </div>
                                    <div class="icheck-primary d-inline">
                                        <input type="radio" name="statuspeg" value="CPNS" id="radioPrimary2" <?= set_radio('statuspeg','CPNS'); ?> required> 
                                        <label for="radioPrimary2">CPNS</label> 
                                        &nbsp;&nbsp;&nbsp; 
                                    </div>
                                    <div class="icheck-primary d-inline">
                                        <input type="radio" name="statuspeg" value="GTT" id="radioPrimary3" <?= set_radio('statuspeg','GTT'); ?> required> 
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
                                        <option value="-" <?= set_select('golruang','-'); ?> >-</option>
                                        <option value="I/a" <?= set_select('golruang','I/a'); ?> >I/a</option>
                                        <option value="I/b" <?= set_select('golruang','I/b'); ?> >I/b</option>
                                        <option value="I/c" <?= set_select('golruang','I/c'); ?> >I/c</option>
                                        <option value="I/d" <?= set_select('golruang','I/d'); ?> >I/d</option>
                                        <option value="II/a" <?= set_select('golruang','II/a'); ?> >II/a</option>
                                        <option value="II/b" <?= set_select('golruang','II/b'); ?> >II/b</option>
                                        <option value="II/c" <?= set_select('golruang','II/c'); ?> >II/c</option>
                                        <option value="II/d" <?= set_select('golruang','II/d'); ?> >II/d</option>
                                        <option value="III/a" <?= set_select('golruang','III/a'); ?> >III/a</option>
                                        <option value="III/b" <?= set_select('golruang','III/b'); ?> >III/b</option>
                                        <option value="III/c" <?= set_select('golruang','III/c'); ?> >III/c</option>
                                        <option value="III/d" <?= set_select('golruang','III/d'); ?> >III/d</option>
                                        <option value="IV/a" <?= set_select('golruang','IV/a'); ?> >IV/a</option>
                                        <option value="IV/b" <?= set_select('golruang','IV/b'); ?> >IV/b</option>
                                        <option value="IV/c" <?= set_select('golruang','IV/c'); ?> >IV/c</option>
                                        <option value="IV/d" <?= set_select('golruang','IV/d'); ?> >IV/d</option>   
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">TANGGAL TMT CPNS</label>
                                <div class="col-sm-5">
                                    <input type="date" name="tmt_cpns" value="<?= set_value('tmt_cpns'); ?>" class="form-control" placeholder="dd/mm/yyyy">
                                </div>
                                <div class="col-sm-4">
                                    <small class="text-danger">tidak perlu diisi jika status masih GTT</small>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">TANGGAL TMT PNS</label>
                                <div class="col-sm-5">
                                    <input type="date" name="tmt_pns" value="<?= set_value('tmt_pns'); ?>" class="form-control" placeholder="dd/mm/yyyy">
                                </div>
                                <div class="col-sm-4">
                                    <small class="text-danger">tidak perlu diisi jika status masih GTT atau CPNS</small>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">JENIS KELAMIN <span class="text-danger">*</span></label>
                                <div class="col-sm-5">
                                    <div class="icheck-primary d-inline">
                                        <input type="radio" name="jk" value="1" id="radioPrimary4" <?= set_radio('jk',1); ?> required> 
                                        <label for="radioPrimary4">Laki-Laki</label> 
                                        &nbsp;&nbsp;&nbsp; 
                                    </div>
                                    <div class="icheck-primary d-inline">
                                        <input type="radio" name="jk" value="2" id="radioPrimary5" <?= set_radio('jk',2); ?> required> 
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
                                        <option value="1" <?= set_select('agama',1); ?> >Islam</option>
                                        <option value="2" <?= set_select('agama',2); ?> >Kristen Katolik</option>
                                        <option value="3" <?= set_select('agama',3); ?> >Kristen Protestan</option>
                                        <option value="4" <?= set_select('agama',4); ?> >Hindu</option>
                                        <option value="5" <?= set_select('agama',5); ?> >Budha</option>
                                        <option value="6" <?= set_select('agama',6); ?> >Konghuchu</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">ALAMAT</label>
                                <div class="col-sm-5">
                                    <input type="text" name="alamat" maxlength="100" value="<?= set_value('alamat'); ?>" class="form-control" placeholder="ALAMAT">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">TINGKAT PENDIDIKAN TERAKHIR</label>
                                <div class="col-sm-5">
                                    <input type="text" name="tingkat_pt" maxlength="20" value="<?= set_value('tingkat_pt'); ?>" class="form-control" placeholder="PENDIDIKAN TERAKHIR">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">PRODI</label>
                                <div class="col-sm-5">
                                    <input type="text" name="prodi" maxlength="50" value="<?= set_value('prodi'); ?>" class="form-control" placeholder="PRODI">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">TAHUN LULUS</label>
                                <div class="col-sm-5">
                                    <input type="text" name="th_lulus" minlength="4" maxlength="4" value="<?= set_value('th_lulus'); ?>" onkeypress="return hanyaAngka(event)" class="form-control" placeholder="TAHUN LULUS">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">STATUS AKTIF <span class="text-danger">*</span></label>
                                <div class="col-sm-5">
                                    <div class="icheck-primary d-inline">
                                        <input type="radio" name="status" value="Aktif" id="radioPrimary6" <?= set_radio('status','Aktif'); ?> required> 
                                        <label for="radioPrimary6">Aktif</label> 
                                        &nbsp;&nbsp;&nbsp; 
                                    </div>
                                    <div class="icheck-primary d-inline">
                                        <input type="radio" name="status" value="Mutasi" id="radioPrimary7" <?= set_radio('status','Mutasi'); ?> required> 
                                        <label for="radioPrimary7">Mutasi</label> 
                                        &nbsp;&nbsp;&nbsp; 
                                    </div>
                                    <div class="icheck-primary d-inline">
                                        <input type="radio" name="status" value="Pensiun" id="radioPrimary8" <?= set_radio('status','Pensiun'); ?> required> 
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
                                        <input type="radio" name="statusguru" value="Mapel" id="radioPrimary9" <?= set_radio('statusguru','Mapel'); ?> required> 
                                        <label for="radioPrimary9">Mapel</label> 
                                        &nbsp;&nbsp;&nbsp; 
                                    </div>
                                    <div class="icheck-primary d-inline">
                                        <input type="radio" name="statusguru" value="BP/BK" id="radioPrimary10" <?= set_radio('statusguru','BP/BK'); ?> required> 
                                        <label for="radioPrimary10">BP/BK</label> 
                                        &nbsp;&nbsp;&nbsp; 
                                    </div>
                                    <div class="icheck-primary d-inline">
                                        <input type="radio" name="statusguru" value="Kurikulum" id="radioPrimary11" <?= set_radio('statusguru','Kurikulum'); ?> required> 
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
                                    <input type="email" name="email" maxlength="100" value="<?= set_value('email'); ?>" class="form-control" placeholder="EMAIL">
                                    <small class="text-danger">
                                        <?= (session()->has('validation')) ? session('validation')->getError('email') : '' ?>
                                    </small> 
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">FOTO</label>
                                <div class="col-sm-5">
                                    <img class='img-responsive' id='preview_gambar' width='150px'>
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
            if(input.files && input.files[0])
            {
                var reader = new FileReader();
                reader.onload = function (e)
                {
                    $("#preview_gambar").attr("src", e.target.result);
                    //.width(300); // Menentukan lebar gambar preview (dalam pixel)
                    //.height(200); // // Menentukan tinggi gambar preview (dalam pixel)
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
