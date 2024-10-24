<!DOCTYPE html>
<html lang="id-ID">
  <head>
    <meta charset="utf-8">
    <title><?= $titleweb; ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="robots" content="index, follow">
    <meta name="description" content="<?= meta_description(); ?>">
    <meta name="keywords" content="<?= meta_keyword(); ?>">
    <meta name="author" content="<?= title(); ?>">
    <meta name="language" content="Indonesia">
    <link rel="icon" href="<?= base_url(); ?>uploads/img/logo/<?= favicon(); ?>" type="image/x-icon">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/bootstrap-4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/font-awesome-4.3.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito&display=swap">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/owl-carousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/owl-carousel/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/AdminLTE-3.0.2/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/magnific-popup.css">
  </head>
  <?php kunjungan(); ?>
  <body>
<div class="preloader d-flex align-items-center justify-content-center">
  <div class="lds-ellipsis">
    <div></div>
    <div></div>
    <div></div>
    <div></div>
  </div>
</div>
<section class="sticky-top bg-white">
  <nav class="container navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand" href="<?= base_url(); ?>"><img src="<?= base_url(); ?>uploads/img/logo/<?= logo_web(); ?>" class="img img-fluid" style="object-fit:contain; max-height:45px;"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto" style="font-size: 11pt">
        <li class="nav-item">
          <a class="nav-link text-dark" href="<?= base_url(); ?>"><b>Home</b></a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <b>Berita</b>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="<?= base_url(); ?>berita">Berita</a>
            <a class="dropdown-item" href="<?= base_url(); ?>agenda">Agenda</a>
            <a class="dropdown-item" href="<?= base_url(); ?>pengumuman">Pengumuman</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <b>Profil</b>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="<?= base_url(); ?>profil">Profil</a>
            <a class="dropdown-item" href="<?= base_url(); ?>profil/sejarah">Sejarah</a>
            <a class="dropdown-item" href="<?= base_url(); ?>profil/visi-misi">Visi & Misi</a>
            <a class="dropdown-item" href="<?= base_url(); ?>profil/struktur-organisasi">Struktur Organisasi</a>
            <a class="dropdown-item" href="<?= base_url(); ?>guru">Tenaga Edukatif</a>
            <a class="dropdown-item" href="<?= base_url(); ?>karyawan">Tenaga Non Edukatif</a>
            <a class="dropdown-item" href="<?= base_url(); ?>profil/sarpras">Sarana Prasarana</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <b>Pendidikan</b>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="<?= base_url(); ?>pendidikan/kurikulum">Struktur Kurikulum</a>
            <a class="dropdown-item" href="<?= base_url(); ?>pendidikan/kalender">Kalender Akademik</a>
            <a class="dropdown-item" href="<?= base_url(); ?>pendidikan/rekap-us">
              <?php
              if(jenjang() == 1 OR jenjang() == 2)
              {
                echo'Rekap Ujian Sekolah';
              }elseif(jenjang() == 3 OR jenjang() == 4)
              {
                echo'Rekap Ujian Madrasah';
              }
              ?>
            </a>
            <a class="dropdown-item" href="<?= base_url(); ?>ekstrakurikuler">Ekstrakurikuler</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="<?= base_url(); ?>peserta-didik"><b>Peserta Didik</b></a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <b>Prestasi</b>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <?php 
            if(jenjang() == 1 OR jenjang() == 2)
            { 
              echo'<a class="dropdown-item" href="'.base_url('prestasi/prestasi-sekolah').'"> Prestasi Sekolah</a>';
            }else
            {
              echo'<a class="dropdown-item" href="'.base_url('prestasi/prestasi-madrasah').'"> Prestasi Madrasah</a>';
            }
            ?>
            <a class="dropdown-item" href="<?= base_url(); ?>prestasi/prestasi-siswa">Prestasi Siswa</a>
            <a class="dropdown-item" href="<?= base_url(); ?>prestasi/prestasi-guru">Prestasi Guru</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <b>Alumni</b>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="<?= base_url(); ?>alumni">Data Alumni</a>
            <a class="dropdown-item" href="<?= base_url(); ?>alumni/penelusuran-alumni">Penelusuran Alumni</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <b>Galeri</b>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="<?= base_url(); ?>galeri/foto">Foto</a>
            <a class="dropdown-item" href="<?= base_url(); ?>galeri/video">Video</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <b>SIM</b>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <?php foreach(link_aktif() as $r_link): ?>
              <?php if(is_url($r_link->link)){ ?>          
                <a class="dropdown-item" href="<?= $r_link->link; ?>" target="_blank"><?= $r_link->nama; ?></a>
              <?php } ?>
            <?php endforeach; ?>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="<?= base_url(); ?>download"><b>Download</b></a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="<?= base_url(); ?>pengaduan"><b>Pengaduan</b></a>
        </li>
      </ul>
    </div>
  </nav>
</section>
<div class="bg-theme p-1"></div>
<?= $this->renderSection('content'); ?>
<section>
  <div class="bg-theme p-1"></div>
  <footer class="pt-3 footer mt-auto py-3" id="contact">
    <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-6 col-sm-6 mb-3"> 
            <img src="<?= base_url(); ?>uploads/img/logo/<?= logo_web(); ?>" class="img img-fluid" style="object-fit:contain; max-height:70px;"><hr>
            <h5><b>SOSIAL MEDIA KAMI</b></h5>
            <?php 
            if(is_url(facebook()))
            {
              echo'<a href="'.facebook().'" title="facebook" class="btn bg-primary text-white btn-radius mr-2" target="_blank"><i class="fa fa-facebook-square"></i></a>';
            }else
            {
              echo'<a href="javascript:void(0)" title="facebook" class="btn bg-primary text-white btn-radius mr-2"><i class="fa fa-facebook-square"></i></a>';
            } 

            if(is_url(twitter()))
            { 
              echo'<a href="'.twitter().'" title="twitter" class="btn bg-info text-white btn-radius mr-2" target="_blank"><i class="fa fa-twitter"></i></a>';
            }else
            {
              echo'<a href="javascript:void(0)" title="twitter" class="btn bg-info text-white btn-radius mr-2"><i class="fa fa-twitter"></i></a>';
            }

            if(is_url(instagram()))
            {
              echo'<a href="'.instagram().'" title="instagram" class="btn bg-secondary text-white btn-radius mr-2" target="_blank"><i class="fa fa-instagram"></i></a>';
            }else
            { 
              echo'<a href="javascript:void(0)" title="instagram" class="btn bg-secondary text-white btn-radius mr-2"><i class="fa fa-instagram"></i></a>';
            }

            if(is_url(youtube()))
            {
              echo'<a href="'.youtube().'" title="youtube" class="btn bg-danger text-white btn-radius mr-2" target="_blank"><i class="fa fa-youtube"></i></a>';
            }else
            {
              echo'<a href="javascript:void(0)" title="youtube" class="btn bg-danger text-white btn-radius mr-2"><i class="fa fa-youtube"></i></a>';
            }
            ?>
          </div>

            <div class="col-lg-5 col-md-6 col-sm-6 mb-3">
              <h5 class="footer-title p-1"><b>HUBUNGI KAMI</b></h5>
                <div>
                  <?= alamat(); ?>
                </div>
                <div class="mt-2">
                  <i class="fa fa-envelope"></i> <?php 
                                                  if(is_email(email()))
                                                  {
                                                    echo'<a href="mailto:'.email().'" class="text-dark">'.email().'</a>';
                                                  }else
                                                  {
                                                    echo'<a href="javascript:void(0)" class="text-dark">'.email().'</a>';
                                                  }
                                                  ?>
                </div>
                <div class="mt-2">
                  <i class="fa fa-phone"></i> <?= telp(); ?>
                </div>
                <div class="mt-2">
                  <i class="fa fa-whatsapp"></i> <?= whatsapp(); ?>
                </div>
            </div>
          
            <div class="col-lg-3 col-md-6 col-sm-6 text-dark mb-3">
              <ul class="list-group border">
                <?php 
                $pengunjungonlineResult = pengunjungonline()->getResult();
                $pengunjungonlineCount = count($pengunjungonlineResult);

                $pengunjungResult = pengunjung()->getResult();
                $pengunjungCount = count($pengunjungResult);

                $hitsResult = hits()->getRow();
                $hitsTotal = isset($hitsResult->total) ? $hitsResult->total : 0;

                $totalpengunjungResult = totalpengunjung()->getRow();
                $totalpengunjungTotal = isset($totalpengunjungResult->total) ? $totalpengunjungResult->total : 0;
                ?>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  Pengunjung Online
                  <span class="badge badge-primary badge-pill"><?= $pengunjungonlineCount; ?></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  Pengunjung Hari Ini
                  <span class="badge badge-primary badge-pill"><?= $pengunjungCount; ?></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  Hits Hari Ini
                  <span class="badge badge-primary badge-pill"><?= $hitsTotal; ?></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  <i class="fa fa-users"></i> Total Pengunjung
                  <span class="badge badge-primary badge-pill"><?= $totalpengunjungTotal; ?></span>
                </li>
              </ul>
            </div>
          </div>      
        </div>
  </footer>
  <div class="bg-theme" style="margin-top:-20px">
    <div class="container pt-2 pb-2">
      <div class="col-md-12 text-white text-center">
        <b><?php 
          $tahun = '2019';
          $tahun_sekarang = date('Y');
          if($tahun_sekarang > $tahun){ ?>
            Copyright &copy; <?= $tahun; ?> - <?= $tahun_sekarang; ?> <a href="javascript:void(0)" class="text-decoration-none text-white"><?= title(); ?></a>
          <?php }else{ ?>
            Copyright &copy; <?= $tahun_sekarang; ?> <a href="javascript:void(0)" class="text-decoration-none text-white"><?= title(); ?></a>
          <?php } ?>
        </b>
      </div>
    </div>
  </div>
</section>
<script src="<?= base_url(); ?>assets/js/jquery-3.4.1.min.js"></script>
<script src="<?= base_url(); ?>assets/js/custom.js"></script>
<script src="<?= base_url(); ?>assets/bootstrap-4.4.1/js/bootstrap.min.js"></script>
<script src="<?= base_url(); ?>assets/AdminLTE-3.0.2/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url(); ?>assets/AdminLTE-3.0.2/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="<?= base_url(); ?>assets/owl-carousel/js/owl.carousel.min.js"></script>
<script src="<?= base_url(); ?>assets/sweetalert/sweetalert.min.js"></script>
<script src="<?= base_url(); ?>assets/js/jquery.magnific-popup.js"></script>
<script>var base_url = '<?= base_url() ?>';</script>
<script src="<?= base_url(); ?>assets/js/jquery.validate.js"></script>
<script src="<?= base_url(); ?>assets/js/preloader.js"></script>
<script src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5df617ef992cd008"></script>
