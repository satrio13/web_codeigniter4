<?= $this->extend('layout/default'); ?>
<?= $this->section('content'); ?>
<section id="isi" class="pt-3 pb-3 text-dark">
    <div class="container">
        <div class="row">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-white">
                    <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= $title; ?></li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-md-12"><h3><b>LAYANAN PENGADUAN</b></h3><hr></div>
        <div>
    </div>
    <div class="container">
         <div class="row">
            <div class="col-md-12 bg-light">
                <div class="alert alert-danger mt-2"><b>Identitas Pengadu Dirahasiakan</b></div>
                <?php 
                if(session()->getFlashdata('success'))
                {
                    echo pesan_sukses(session()->getFlashdata('success'));
                }elseif(session()->getFlashdata('error'))
                {
                    echo pesan_gagal(session()->getFlashdata('error'));
                }
                
                echo form_open_multipart('pengaduan','id="form"');
                csrf_field(); 
                ?>
                <div class="row p-2">
                    <div class="col-md-3"><label for="nama">NAMA</label> <span class="text-danger">*</span></div>
                    <div class="col-md-5">
                        <input type="text" name="nama" id="nama" maxlength="50" value="<?= set_value('nama'); ?>" placeholder="Masukan Nama" class="form-control required">
                        <small class="text-danger">
                            <?= (session()->has('validation')) ? session('validation')->getError('nama') : '' ?>
                        </small>
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col-md-3"><label for="status">STATUS</label> <span class="text-danger">*</span></div>
                    <div class="col-md-5">
                        <select name="status" id="status" class="form-control required digits">
                            <option value="1" <?= set_select('status', 1); ?> >Peserta Didik</option>
                            <option value="2" <?= set_select('status', 2); ?> >Wali Murid</option>
                            <option value="3" <?= set_select('status', 3); ?> >Masyarakat</option>
                        </select>
                        <small class="text-danger">
                            <?= (session()->has('validation')) ? session('validation')->getError('status') : '' ?>
                        </small>
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col-md-3"><label for="isi">URAIAN PENGADUAN</label> <span class="text-danger">*</span></div>
                    <div class="col-md-5">
                        <textarea class="form-control required" name="isi" id="isi"><?= set_value('isi'); ?></textarea>
                        <small class="text-danger">
                            <?= (session()->has('validation')) ? session('validation')->getError('isi') : '' ?>
                        </small>
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col-md-3"></div>
                    <div class="col-md-5">
                        <button type="submit" class="btn bg-theme text-white"><i class="fa fa-send"></i> KIRIM</button>
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col-md-12"><?php echo form_close(); ?></div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>
<?= $this->section('script'); ?>
    
<?= $this->endSection(); ?>