<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

/* ADMIN */
$routes->get('auth/login', 'admin\Auth::login'); // start auth
$routes->post('auth/proses-login', 'admin\Auth::proses_login');
$routes->get('auth/logout', 'admin\Auth::logout'); // end auth
$routes->get('backend/dashboard', 'admin\Dashboard::index'); // dashboard
$routes->get('backend/pengaduan', 'admin\Pengaduan::index'); // start pengaduan
$routes->get('backend/detail-pengaduan/(:num)', 'admin\Pengaduan::detail_pengaduan/$1');
$routes->get('backend/lihat-pengaduan/(:num)', 'admin\Pengaduan::lihat_pengaduan/$1');
$routes->get('backend/hapus-pengaduan/(:num)', 'admin\Pengaduan::hapus_pengaduan/$1'); // end pengaduan
$routes->get('backend/link-terkait', 'admin\Link::index'); // start link
$routes->get('backend/tambah-link', 'admin\Link::tambah_link');
$routes->post('backend/simpan-link', 'admin\Link::simpan_link');
$routes->get('backend/edit-link/(:num)', 'admin\Link::edit_link/$1');
$routes->put('backend/update-link/(:num)', 'admin\Link::update_link/$1');
$routes->get('backend/hapus-link/(:num)', 'admin\Link::hapus_link/$1'); //end link
$routes->get('backend/agenda', 'admin\Agenda::index'); // start agenda
$routes->get('backend/tambah-agenda', 'admin\Agenda::tambah_agenda');
$routes->post('backend/simpan-agenda', 'admin\Agenda::simpan_agenda');
$routes->get('backend/edit-agenda/(:num)', 'admin\Agenda::edit_agenda/$1');
$routes->put('backend/update-agenda/(:num)', 'admin\Agenda::update_agenda/$1');
$routes->get('backend/hapus-agenda/(:num)', 'admin\Agenda::hapus_agenda/$1');
$routes->post('backend/get_data_agenda', 'admin\Agenda::get_data_agenda'); //end agenda
$routes->get('backend/pengumuman', 'admin\Pengumuman::index'); // start pengumuman
$routes->get('backend/tambah-pengumuman', 'admin\Pengumuman::tambah_pengumuman');
$routes->post('backend/simpan-pengumuman', 'admin\Pengumuman::simpan_pengumuman');
$routes->get('backend/edit-pengumuman/(:num)', 'admin\Pengumuman::edit_pengumuman/$1');
$routes->put('backend/update-pengumuman/(:num)', 'admin\Pengumuman::update_pengumuman/$1');
$routes->get('backend/hapus-pengumuman/(:num)', 'admin\Pengumuman::hapus_pengumuman/$1');
$routes->post('backend/get_data_pengumuman', 'admin\Pengumuman::get_data_pengumuman'); //end pengumuman
$routes->get('backend/berita', 'admin\Berita::index'); // start berita
$routes->get('backend/tambah-berita', 'admin\Berita::tambah_berita');
$routes->post('backend/simpan-berita', 'admin\Berita::simpan_berita');
$routes->get('backend/edit-berita/(:num)', 'admin\Berita::edit_berita/$1');
$routes->put('backend/update-berita/(:num)', 'admin\Berita::update_berita/$1');
$routes->get('backend/hapus-berita/(:num)', 'admin\Berita::hapus_berita/$1');
$routes->post('backend/get_data_berita', 'admin\Berita::get_data_berita'); //end berita
$routes->get('backend/download', 'admin\Download::index'); // start download
$routes->get('backend/tambah-download', 'admin\Download::tambah_download');
$routes->post('backend/simpan-download', 'admin\Download::simpan_download');
$routes->get('backend/edit-download/(:num)', 'admin\Download::edit_download/$1');
$routes->put('backend/update-download/(:num)', 'admin\Download::update_download/$1');
$routes->get('backend/hapus-download/(:num)', 'admin\Download::hapus_download/$1');
$routes->post('backend/get_data_download', 'admin\Download::get_data_download'); //end download
$routes->get('backend/siswa', 'admin\Siswa::index'); // start siswa
$routes->get('backend/tambah-siswa', 'admin\Siswa::tambah_siswa');
$routes->post('backend/simpan-siswa', 'admin\Siswa::simpan_siswa');
$routes->get('backend/edit-siswa/(:num)', 'admin\Siswa::edit_siswa/$1');
$routes->put('backend/update-siswa/(:num)', 'admin\Siswa::update_siswa/$1');
$routes->get('backend/hapus-siswa/(:num)', 'admin\Siswa::hapus_siswa/$1');
$routes->post('backend/get_data_siswa', 'admin\Siswa::get_data_siswa'); //end siswa
$routes->get('backend/prestasi-siswa', 'admin\PrestasiSiswa::index'); // start prestasi siswa
$routes->get('backend/tambah-prestasi-siswa', 'admin\PrestasiSiswa::tambah_prestasi_siswa');
$routes->post('backend/simpan-prestasi-siswa', 'admin\PrestasiSiswa::simpan_prestasi_siswa');
$routes->get('backend/edit-prestasi-siswa/(:num)', 'admin\PrestasiSiswa::edit_prestasi_siswa/$1');
$routes->put('backend/update-prestasi-siswa/(:num)', 'admin\PrestasiSiswa::update_prestasi_siswa/$1');
$routes->get('backend/hapus-prestasi-siswa/(:num)', 'admin\PrestasiSiswa::hapus_prestasi_siswa/$1');
$routes->post('backend/get_data_prestasi_siswa', 'admin\PrestasiSiswa::get_data_prestasi_siswa'); //end prestasi siswa
$routes->get('backend/prestasi-guru', 'admin\Prestasiguru::index'); // start prestasi guru
$routes->get('backend/tambah-prestasi-guru', 'admin\PrestasiGuru::tambah_prestasi_guru');
$routes->post('backend/simpan-prestasi-guru', 'admin\PrestasiGuru::simpan_prestasi_guru');
$routes->get('backend/edit-prestasi-guru/(:num)', 'admin\PrestasiGuru::edit_prestasi_guru/$1');
$routes->put('backend/update-prestasi-guru/(:num)', 'admin\PrestasiGuru::update_prestasi_guru/$1');
$routes->get('backend/hapus-prestasi-guru/(:num)', 'admin\PrestasiGuru::hapus_prestasi_guru/$1');
$routes->post('backend/get_data_prestasi_guru', 'admin\PrestasiGuru::get_data_prestasi_guru'); //end prestasi guru
$routes->get('backend/prestasi-sekolah', 'admin\PrestasiSekolah::index'); // start prestasi sekolah
$routes->get('backend/tambah-prestasi-sekolah', 'admin\PrestasiSekolah::tambah_prestasi_sekolah');
$routes->post('backend/simpan-prestasi-sekolah', 'admin\PrestasiSekolah::simpan_prestasi_sekolah');
$routes->get('backend/edit-prestasi-sekolah/(:num)', 'admin\PrestasiSekolah::edit_prestasi_sekolah/$1');
$routes->put('backend/update-prestasi-sekolah/(:num)', 'admin\PrestasiSekolah::update_prestasi_sekolah/$1');
$routes->get('backend/hapus-prestasi-sekolah/(:num)', 'admin\PrestasiSekolah::hapus_prestasi_sekolah/$1');
$routes->post('backend/get_data_prestasi_sekolah', 'admin\PrestasiSekolah::get_data_prestasi_sekolah'); //end prestasi sekolah
$routes->get('backend/profil-web', 'admin\Profil::index'); // start profil
$routes->get('backend/edit-profil-web', 'admin\Profil::edit_profil_web'); 
$routes->put('backend/update-profil-web', 'admin\Profil::update_profil_web'); 
$routes->get('backend/logo-web', 'admin\Profil::logo_web');
$routes->put('backend/update-logo-web', 'admin\Profil::update_logo_web'); 
$routes->get('backend/favicon', 'admin\Profil::favicon');
$routes->put('backend/update-favicon', 'admin\Profil::update_favicon'); 
$routes->get('backend/logo-admin', 'admin\Profil::logo_admin');
$routes->put('backend/update-logo-admin', 'admin\Profil::update_logo_admin'); 
$routes->get('backend/gambar-profil', 'admin\Profil::gambar_profil');
$routes->put('backend/update-gambar-profil', 'admin\Profil::update_gambar_profil'); 
$routes->get('backend/file', 'admin\Profil::file');
$routes->put('backend/update-file', 'admin\Profil::update_file');  //end profil
$routes->get('backend/banner', 'admin\Banner::index'); // start banner
$routes->get('backend/tambah-banner', 'admin\Banner::tambah_banner');
$routes->post('backend/simpan-banner', 'admin\Banner::simpan_banner');
$routes->get('backend/edit-banner/(:num)', 'admin\Banner::edit_banner/$1');
$routes->put('backend/update-banner/(:num)', 'admin\Banner::update_banner/$1');
$routes->get('backend/hapus-banner/(:num)', 'admin\Banner::hapus_banner/$1');
$routes->post('backend/get_data_banner', 'admin\Banner::get_data_banner'); //end banner
$routes->get('backend/sejarah', 'admin\Sejarah::index'); // start sejarah
$routes->get('backend/edit-sejarah', 'admin\Sejarah::edit_sejarah'); 
$routes->put('backend/update-sejarah', 'admin\Sejarah::update_sejarah'); //end sejarah
$routes->get('backend/visi-misi', 'admin\VisiMisi::index'); // start visi misi
$routes->get('backend/edit-visi-misi', 'admin\VisiMisi::edit_visi_misi'); 
$routes->put('backend/update-visi-misi', 'admin\VisiMisi::update_visi_misi'); //end visi misi
$routes->get('backend/struktur-organisasi', 'admin\StrukturOrganisasi::index'); // start struktur organisasi
$routes->get('backend/edit-struktur-organisasi', 'admin\StrukturOrganisasi::edit_struktur_organisasi'); 
$routes->put('backend/update-struktur-organisasi', 'admin\StrukturOrganisasi::update_struktur_organisasi'); //end struktur organisasi
$routes->get('backend/ekstrakurikuler', 'admin\Ekstrakurikuler::index'); // start ekstrakurikuler
$routes->get('backend/tambah-ekstrakurikuler', 'admin\Ekstrakurikuler::tambah_ekstrakurikuler');
$routes->post('backend/simpan-ekstrakurikuler', 'admin\Ekstrakurikuler::simpan_ekstrakurikuler');
$routes->get('backend/edit-ekstrakurikuler/(:num)', 'admin\Ekstrakurikuler::edit_ekstrakurikuler/$1');
$routes->put('backend/update-ekstrakurikuler/(:num)', 'admin\Ekstrakurikuler::update_ekstrakurikuler/$1');
$routes->get('backend/hapus-ekstrakurikuler/(:num)', 'admin\Ekstrakurikuler::hapus_ekstrakurikuler/$1');
$routes->post('backend/get_data_ekstrakurikuler', 'admin\Ekstrakurikuler::get_data_ekstrakurikuler'); //end ekstrakurikuler
$routes->get('backend/sarpras', 'admin\Sarpras::index'); // start sarpras
$routes->get('backend/edit-sarpras', 'admin\Sarpras::edit_sarpras'); 
$routes->put('backend/update-sarpras', 'admin\Sarpras::update_sarpras'); //end sarpras
$routes->get('backend/guru', 'admin\Guru::index'); // start guru
$routes->get('backend/tambah-guru', 'admin\Guru::tambah_guru');
$routes->post('backend/simpan-guru', 'admin\Guru::simpan_guru');
$routes->get('backend/edit-guru/(:num)', 'admin\Guru::edit_guru/$1');
$routes->put('backend/update-guru/(:num)', 'admin\Guru::update_guru/$1');
$routes->get('backend/hapus-guru/(:num)', 'admin\Guru::hapus_guru/$1');
$routes->post('backend/get_data_guru', 'admin\Guru::get_data_guru'); //end guru
$routes->get('backend/karyawan', 'admin\Karyawan::index'); // start karyawan
$routes->get('backend/tambah-karyawan', 'admin\Karyawan::tambah_karyawan');
$routes->post('backend/simpan-karyawan', 'admin\Karyawan::simpan_karyawan');
$routes->get('backend/edit-karyawan/(:num)', 'admin\Karyawan::edit_karyawan/$1');
$routes->put('backend/update-karyawan/(:num)', 'admin\Karyawan::update_karyawan/$1');
$routes->get('backend/hapus-karyawan/(:num)', 'admin\Karyawan::hapus_karyawan/$1');
$routes->post('backend/get_data_karyawan', 'admin\Karyawan::get_data_karyawan'); //end karyawan
$routes->get('backend/alumni', 'admin\Alumni::index'); // start alumni
$routes->get('backend/tambah-alumni', 'admin\Alumni::tambah_alumni');
$routes->post('backend/simpan-alumni', 'admin\Alumni::simpan_alumni');
$routes->get('backend/edit-alumni/(:num)', 'admin\Alumni::edit_alumni/$1');
$routes->put('backend/update-alumni/(:num)', 'admin\Alumni::update_alumni/$1');
$routes->get('backend/hapus-alumni/(:num)', 'admin\Alumni::hapus_alumni/$1');
$routes->post('backend/get_data_alumni', 'admin\Alumni::get_data_alumni'); 
$routes->get('backend/penelusuran-alumni', 'admin\Alumni::penelusuran_alumni');
$routes->get('backend/hapus-penelusuran-alumni/(:num)', 'admin\Alumni::hapus_penelusuran_alumni/$1');
$routes->get('backend/status/(:num)', 'admin\Alumni::status/$1');
$routes->get('backend/lihat-alumni/(:num)', 'admin\Alumni::lihat_alumni/$1');
$routes->post('backend/save-status', 'admin\Alumni::save_status'); //end alumni
$routes->get('backend/album', 'admin\Album::index'); // start album
$routes->get('backend/tambah-album', 'admin\Album::tambah_album');
$routes->post('backend/simpan-album', 'admin\Album::simpan_album');
$routes->get('backend/edit-album/(:num)', 'admin\Album::edit_album/$1');
$routes->put('backend/update-album/(:num)', 'admin\Album::update_album/$1');
$routes->get('backend/hapus-album/(:num)', 'admin\Album::hapus_album/$1');
$routes->post('backend/get_data_album', 'admin\Album::get_data_album'); //end album
$routes->get('backend/video', 'admin\Video::index'); // start video
$routes->get('backend/tambah-video', 'admin\Video::tambah_video');
$routes->post('backend/simpan-video', 'admin\Video::simpan_video');
$routes->get('backend/edit-video/(:num)', 'admin\Video::edit_video/$1');
$routes->put('backend/update-video/(:num)', 'admin\Video::update_video/$1');
$routes->get('backend/hapus-video/(:num)', 'admin\Video::hapus_video/$1');
$routes->post('backend/get_data_video', 'admin\Video::get_data_video'); //end video
$routes->get('backend/foto', 'admin\Foto::index'); // start foto
$routes->post('backend/simpan-foto', 'admin\Foto::simpan_foto');
$routes->get('backend/hapus-foto/(:num)', 'admin\Foto::hapus_foto/$1');
$routes->get('backend/tahun', 'admin\Tahun::index'); // start tahun
$routes->get('backend/tambah-tahun', 'admin\Tahun::tambah_tahun');
$routes->post('backend/simpan-tahun', 'admin\Tahun::simpan_tahun');
$routes->get('backend/edit-tahun/(:num)', 'admin\Tahun::edit_tahun/$1');
$routes->put('backend/update-tahun/(:num)', 'admin\Tahun::update_tahun/$1');
$routes->get('backend/hapus-tahun/(:num)', 'admin\Tahun::hapus_tahun/$1');
$routes->post('backend/get_data_tahun', 'admin\Tahun::get_data_tahun'); //end tahun
$routes->get('backend/kurikulum', 'admin\Kurikulum::index'); // start kurikulum
$routes->get('backend/tambah-kurikulum', 'admin\Kurikulum::tambah_kurikulum');
$routes->post('backend/simpan-kurikulum', 'admin\Kurikulum::simpan_kurikulum');
$routes->get('backend/edit-kurikulum/(:num)', 'admin\Kurikulum::edit_kurikulum/$1');
$routes->put('backend/update-kurikulum/(:num)', 'admin\Kurikulum::update_kurikulum/$1');
$routes->get('backend/hapus-kurikulum/(:num)', 'admin\Kurikulum::hapus_kurikulum/$1');
$routes->post('backend/get_data_kurikulum', 'admin\Kurikulum::get_data_kurikulum'); //end kurikulum
$routes->get('backend/kalender', 'admin\Kalender::index'); // start kalender
$routes->put('backend/update-kalender', 'admin\Kalender::update_kalender'); // end kalender
$routes->get('backend/rekap-un', 'admin\RekapUN::index'); // start rekap un
$routes->get('backend/tambah-rekap-un', 'admin\RekapUN::tambah_rekap_un');
$routes->post('backend/simpan-rekap-un', 'admin\RekapUN::simpan_rekap_un');
$routes->get('backend/edit-rekap-un/(:num)', 'admin\RekapUN::edit_rekap_un/$1');
$routes->put('backend/update-rekap-un/(:num)', 'admin\RekapUN::update_rekap_un/$1');
$routes->get('backend/hapus-rekap-un/(:num)', 'admin\RekapUN::hapus_rekap_un/$1');
$routes->post('backend/get_data_rekap_un', 'admin\RekapUS::get_data_rekap_un'); //end rekap un
$routes->get('backend/rekap-us', 'admin\RekapUS::index'); // start rekap us
$routes->get('backend/tambah-rekap-us', 'admin\RekapUS::tambah_rekap_us');
$routes->post('backend/simpan-rekap-us', 'admin\RekapUS::simpan_rekap_us');
$routes->get('backend/edit-rekap-us/(:num)', 'admin\RekapUS::edit_rekap_us/$1');
$routes->put('backend/update-rekap-us/(:num)', 'admin\RekapUS::update_rekap_us/$1');
$routes->get('backend/hapus-rekap-us/(:num)', 'admin\RekapUS::hapus_rekap_us/$1');
$routes->post('backend/get_data_rekap_us', 'admin\RekapUS::get_data_rekap_us'); //end rekap us
$routes->get('backend/users', 'admin\User::index'); // start user
$routes->get('backend/tambah-user', 'admin\User::tambah_user');
$routes->post('backend/simpan-user', 'admin\User::simpan_user');
$routes->get('backend/edit-user/(:num)', 'admin\User::edit_user/$1');
$routes->put('backend/update-user/(:num)', 'admin\User::update_user/$1');
$routes->get('backend/hapus-user/(:num)', 'admin\User::hapus_user/$1');
$routes->post('backend/get_data_user', 'admin\User::get_data_user'); 
$routes->get('backend/edit-profil', 'admin\User::edit_profil');
$routes->put('backend/update-profil', 'admin\User::update_profil');
$routes->get('backend/ganti-password', 'admin\User::ganti_password');
$routes->put('backend/update-password', 'admin\User::update_password'); //end user

/* WEBSITE */
$routes->get('/', 'Main::index');
$routes->get('berita', 'Berita::index'); // start berita
$routes->get('berita/detail/(:any)', 'Berita::detail/$1'); //end berita
$routes->get('agenda', 'Agenda::index'); // start agenda
$routes->get('agenda/detail/(:any)', 'Agenda::detail/$1'); //end agenda
$routes->get('pengumuman', 'Pengumuman::index'); // start pengumuman
$routes->get('pengumuman/detail/(:any)', 'Pengumuman::detail/$1'); //end pengumuman
$routes->get('profil', 'Profil::index'); // start profil
$routes->get('profil/sejarah', 'Profil::sejarah');
$routes->get('profil/visi-misi', 'Profil::visimisi');
$routes->get('profil/struktur-organisasi', 'Profil::struktur_organisasi');
$routes->get('profil/sarpras', 'Profil::sarpras');
$routes->get('ekstrakurikuler', 'Profil::ekstrakurikuler');
$routes->get('ekstrakurikuler/detail/(:any)', 'Profil::detail_ekstrakurikuler/$1'); 
$routes->get('guru', 'Guru::index');
$routes->get('guru/detail/(:any)', 'Guru::detail/$1');
$routes->get('karyawan', 'Karyawan::index');
$routes->get('karyawan/detail/(:any)', 'Karyawan::detail/$1'); // end profil
$routes->get('pendidikan/kurikulum', 'Pendidikan::kurikulum'); // start pendidikan
$routes->get('pendidikan/kalender', 'Pendidikan::kalender'); 
$routes->get('pendidikan/rekap-us', 'Pendidikan::rekap_us'); 
$routes->post('pendidikan/rekap-us', 'Pendidikan::rekap_us'); // end pendidikan 
$routes->get('peserta-didik', 'Siswa::index'); // start peserta didik
$routes->get('prestasi/prestasi-siswa', 'Prestasi::prestasi_siswa'); // start prestasi
$routes->get('prestasi/prestasi-guru', 'Prestasi::prestasi_guru');
$routes->get('prestasi/prestasi-sekolah', 'Prestasi::prestasi_sekolah'); 
$routes->get('prestasi/prestasi-madrasah', 'Prestasi::prestasi_madrasah'); // end prestasi
$routes->get('alumni', 'Alumni::index'); // start alumni
$routes->get('alumni/penelusuran-alumni', 'Alumni::penelusuran_alumni'); 
$routes->post('alumni/penelusuran-alumni', 'Alumni::simpan_penelusuran_alumni'); // end alumni
$routes->get('galeri/foto', 'Galeri::foto'); // start galeri
$routes->get('galeri/album/(:any)', 'Galeri::album/$1');
$routes->get('galeri/video', 'Galeri::video'); // end galeri
$routes->get('download', 'Download::index'); // start download
$routes->get('download/hits/(:any)', 'Download::hits/$1'); //end download
$routes->get('pengaduan', 'Pengaduan::index'); // start pengaduan
$routes->post('pengaduan', 'Pengaduan::simpan_pengaduan'); // end pengaduan