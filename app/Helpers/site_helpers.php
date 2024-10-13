<?php
function pesan_sukses($str)
{
   return "<script type='text/javascript'>
               setTimeout(function () { 
                  swal({
                     position: 'top-end',
                     icon: 'success',
                     title: '$str',
                     timer: 1500
                  });
               },2000); 
            </script>";
}

function pesan_gagal($str)
{
   return "<script type='text/javascript'>
               setTimeout(function () { 
                  swal({
                     position: 'top-end',
                     icon: 'error',
                     title: '$str',
                     timer: 5000
                  });
               },2000); 
            </script>";
}

function cek_login()
{
   if(!session('id_user'))
   {
      return redirect()->to(base_url('auth/login'));
   }
}

function show_404()
{
   throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
}

function cetak($str)
{
   return strip_tags(htmlentities($str, ENT_QUOTES, 'UTF-8'));
}

function tgl_simpan_sekarang()
{
   date_default_timezone_set('Asia/Jakarta');
   return date('Y-m-d');
}

function tgl_jam_simpan_sekarang()
{
   date_default_timezone_set('Asia/Jakarta');
   return date('Y-m-d H:i:s');
}

function is_email($str)
{
   return filter_var($str, FILTER_VALIDATE_EMAIL);
}

function is_url($str)
{
   return preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$str);
}

function profil_web()
{
   $db = \Config\Database::connect();
   return $db->table('tb_profil')->getWhere(['id' => 1])->getRow();
}

function title()
{
   $db = \Config\Database::connect();
   $q = $db->table('tb_profil')->select('nama_web')->getWhere(['id' => 1])->getRow();
   return $q->nama_web;
}

function favicon()
{
   $db = \Config\Database::connect();
   $q = $db->table('tb_profil')->select('favicon')->getWhere(['id' => 1])->getRow();
   return $q->favicon;
}

function logo_admin()
{
   $db = \Config\Database::connect();
   $q = $db->table('tb_profil')->select('logo_admin')->getWhere(['id' => 1])->getRow();
   return $q->logo_admin;
}

function logo_web()
{
   $db = \Config\Database::connect();
   $q = $db->table('tb_profil')->select('logo_web')->getWhere(['id' => 1])->getRow();
   return $q->logo_web;
}

function jenjang()
{
   $db = \Config\Database::connect();
   $q = $db->table('tb_profil')->select('jenjang')->getWhere(['id' => 1])->getRow();
   return $q->jenjang;
}

function tahun($id_tahun)
{
   $db = \Config\Database::connect();
   $q = $db->table('tb_tahun')->select('tahun')->getWhere(['id_tahun' => $id_tahun])->getRow();
   return $q->tahun;
}

function nama_user($id_user)
{
   $db = \Config\Database::connect();
   $q = $db->table('tb_user')->select('nama')->getWhere(['id_user' => $id_user])->getRow();
   return $q->nama;
}

function level_user($id_user)
{
   $db = \Config\Database::connect();
   $q = $db->table('tb_user')->select('level')->getWhere(['id_user' => $id_user])->getRow();
   return $q->level;
}

function meta_description()
{
   $db = \Config\Database::connect();
   $q = $db->table('tb_profil')->select('meta_description')->getWhere(['id' => 1])->getRow();
   return $q->meta_description;
}

function meta_keyword()
{
   $db = \Config\Database::connect();
   $q = $db->table('tb_profil')->select('meta_keyword')->getWhere(['id' => 1])->getRow();
   return $q->meta_keyword;
}

function link_aktif()
{
   $db = \Config\Database::connect();
   return $db->table('tb_link')->select('*')->where('is_active',1)->orderBy('nama','asc')->get()->getResult();
}

function facebook()
{
   $db = \Config\Database::connect();
   $q = $db->table('tb_profil')->select('facebook')->getWhere(['id' => 1])->getRow();
   return $q->facebook;
}

function twitter()
{
   $db = \Config\Database::connect();
   $q = $db->table('tb_profil')->select('twitter')->getWhere(['id' => 1])->getRow();
   return $q->twitter;
}

function instagram()
{
   $db = \Config\Database::connect();
   $q = $db->table('tb_profil')->select('instagram')->getWhere(['id' => 1])->getRow();
   return $q->instagram;
}

function youtube()
{
   $db = \Config\Database::connect();
   $q = $db->table('tb_profil')->select('youtube')->getWhere(['id' => 1])->getRow();
   return $q->youtube;
}

function alamat()
{
   $db = \Config\Database::connect();
   $q = $db->table('tb_profil')->select('alamat')->getWhere(['id' => 1])->getRow();
   return $q->alamat;
}

function email()
{
   $db = \Config\Database::connect();
   $q = $db->table('tb_profil')->select('email')->getWhere(['id' => 1])->getRow();
   return $q->email;
}

function telp()
{
   $db = \Config\Database::connect();
   $q = $db->table('tb_profil')->select('telp')->getWhere(['id' => 1])->getRow();
   return $q->telp;
}

function whatsapp()
{
   $db = \Config\Database::connect();
   $q = $db->table('tb_profil')->select('whatsapp')->getWhere(['id' => 1])->getRow();
   return $q->whatsapp;
}

function get_foto($id_album)
{
   $db = \Config\Database::connect();
   $q = $db->table('tb_foto')->select('id_foto,id_album,foto')->getWhere(['id_album' => $id_album])->getRow();
   if($q)
   {
      return ['status' => true, 'foto' => $q->foto];
   }else
   {
      return ['status' => false];
   }
}

function jml_foto($id_album)
{
   $db = \Config\Database::connect();
   return $db->table('tb_foto')->select('id_foto,id_album')->where('id_album', $id_album)->countAllResults();
}

function kunjungan()
{
   $db = \Config\Database::connect();

   $ip      = $_SERVER['REMOTE_ADDR'];
   $tanggal = date("Y-m-d");
   $waktu   = time(); 
   $cekk = $db->query("SELECT * FROM tb_statistik WHERE ip='$ip' AND tanggal='$tanggal'");
   $rowh = $cekk->getRowArray();
   if(count($cekk->getResult()) == 0)
   {
      $datadb = array('ip'=>$ip, 'tanggal'=>$tanggal, 'hits'=>'1', 'online'=>$waktu);
      $db->table('tb_statistik')->insert($datadb);
   }else
   {
      $hitss = $rowh['hits'] + 1;
      $datadb = array('ip'=>$ip, 'tanggal'=>$tanggal, 'hits'=>$hitss, 'online'=>$waktu);
      $array = array('ip' => $ip, 'tanggal' => $tanggal);
      $db->table('tb_statistik')->set($datadb)->where($array)->update();
   }
}
   
function grafik_kunjungan()
{
   $db = \Config\Database::connect();
   return $db->query("SELECT count(*) as jumlah, tanggal FROM tb_statistik GROUP BY tanggal ORDER BY tanggal DESC LIMIT 10");
}

function pengunjung()
{
   $db = \Config\Database::connect();
   return $db->query("SELECT COUNT(ip) as total FROM tb_statistik WHERE tanggal='".date("Y-m-d")."' GROUP BY ip");
}

function totalpengunjung()
{
   $db = \Config\Database::connect();
   return $db->query("SELECT COUNT(hits) as total FROM tb_statistik");
}

function hits()
{
   $db = \Config\Database::connect();
   return $db->query("SELECT SUM(hits) as total FROM tb_statistik WHERE tanggal='".date("Y-m-d")."' GROUP BY tanggal");
}

function pengunjungonline()
{
   $db = \Config\Database::connect();
   $bataswaktu = time() - 300;
   return $db->query("SELECT * FROM tb_statistik WHERE online > '$bataswaktu'");
}

function totalhits()
{
   $db = \Config\Database::connect();
   return $db->query("SELECT SUM(hits) as total FROM tb_statistik");
}

function slug($text)
{
   // replace non letter or digits by -
   $text = preg_replace('~[^\\pL\d]+~u', '-', $text);

   // trim
   $text = trim($text, '-');

   // transliterate
   $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

   // lowercase
   $text = strtolower($text);

   // remove unwanted characters
   $text = preg_replace('~[^-\w]+~', '', $text);
   if (empty($text)){
      return 'n-a';
   }
   return $text;
}

function tgl_indo($tgl)
{
   $tanggal = substr($tgl,8,2);
   $bulan = getBulan(substr($tgl,5,2));
   $tahun = substr($tgl,0,4);
   return $tanggal.' '.$bulan.' '.$tahun;       
}

function hari_indo($hari)
{
   switch($hari)
   {
      case 'Sun':
         $hari_ini = "Minggu";
         break;
      case 'Mon':			
         $hari_ini = "Senin";
         break;
      case 'Tue':
         $hari_ini = "Selasa";
         break;
      case 'Wed':
         $hari_ini = "Rabu";
         break;
      case 'Thu':
         $hari_ini = "Kamis";
         break;
      case 'Fri':
         $hari_ini = "Jum'at";
         break;
      case 'Sat':
         $hari_ini = "Sabtu";
         break;
      default:
         $hari_ini = "Hari tidak diketahui";		
   }
   return $hari_ini;
}

function hari_ini_indo()
{
   $hari = date('D');
   switch($hari)
   {
      case 'Sun':
         $hari_ini = "Minggu";
         break;
      case 'Mon':			
         $hari_ini = "Senin";
         break;
      case 'Tue':
         $hari_ini = "Selasa";
         break;
      case 'Wed':
         $hari_ini = "Rabu";
         break;
      case 'Thu':
         $hari_ini = "Kamis";
         break;
      case 'Fri':
         $hari_ini = "Jum'at";
         break;
      case 'Sat':
         $hari_ini = "Sabtu";
         break;
      default:
         $hari_ini = "Hari tidak diketahui";		
   }
   return $hari_ini;
}

function getTanggal($tgl)
{
   switch($tgl)
   {
      case '01':
         $tanggal = 'Satu';
         break;
      case '02':
         $tanggal = 'Dua';
         break;
      case '03':
         $tanggal = 'Tiga';
         break;
      case '04':
         $tanggal = 'Empat';
         break;
      case '05':
         $tanggal = 'Lima';
         break;
      case '06':
         $tanggal = 'Enam';
         break;
      case '07':
         $tanggal = 'Tujuh';
         break;
      case '08':
         $tanggal = 'Delapan';
         break;
      case '09':
         $tanggal = 'Sembilan';
         break;
      case '10':
         $tanggal = 'Sepuluh';
         break;
      case '11':
         $tanggal = 'Sebelas';
         break;
      case '12':
         $tanggal = 'Dua Belas';
         break;
      case '13':
         $tanggal = 'Tiga Belas';
         break;
      case '14':
         $tanggal = 'Empat Belas';
         break;
      case '15':
         $tanggal = 'Lima Belas';
         break;
      case '16':
         $tanggal = 'Enam Belas';
         break;
      case '17':
         $tanggal = 'Tujuh Belas';
         break;
      case '18':
         $tanggal = 'Delapan Belas';
         break;
      case '19':
         $tanggal = 'Sembilan Belas';
         break;
      case '20':
         $tanggal = 'Dua Puluh';
         break;
      case '21':
         $tanggal = 'Dua Puluh Satu';
         break;
      case '22':
         $tanggal = 'Dua Puluh Dua';
         break;
      case '23':
         $tanggal = 'Dua Puluh Tiga';
         break;
      case '24':
         $tanggal = 'Dua Puluh Empat';
         break;
      case '25':
         $tanggal = 'Dua Puluh Lima';
         break;
      case '26':
         $tanggal = 'Dua Puluh Enam';
         break;
      case '27':
         $tanggal = 'Dua Puluh Tujuh';
         break;
      case '28':
            $tanggal = 'Dua Puluh Delapan';
            break;
      case '29':
            $tanggal = 'Dua Puluh Sembilan';
            break;
      case '30':
            $tanggal = 'Tiga Puluh';
            break;
      case '31':
            $tanggal = 'Tiga Puluh Satu';
            break;
   } 
   return $tanggal;
}

function getBulan($bln)
{
   switch($bln)
   {
      case '01':
         $bulan = 'Januari';
         break;
      case '02':
         $bulan = 'Februari';
         break;
      case '03':
         $bulan = 'Maret';
         break;
      case '04':
         $bulan = 'April';
         break;
      case '05':
         $bulan = 'Mei';
         break;
      case '06':
         $bulan = 'Juni';
         break;
      case '07':
         $bulan = 'Juli';
         break;
      case '08':
         $bulan = 'Agustus';
         break;
      case '09':
         $bulan = 'September';
         break;
      case '10':
         $bulan = 'Oktober';
         break;
      case '11':
         $bulan = 'November';
         break;
      case '12':
         $bulan = 'Desember';
         break;
   } 
   return $bulan;
}
   
function getTahun($thn)
{
   switch($thn)
   {
      case '2018':
         $tahun = 'Dua Ribu Delapan Belas';
         break;
      case '2019':
         $tahun = 'Dua Ribu Sembilan Belas';
         break;
      case '2020':
         $tahun = 'Dua Ribu Dua Puluh';
         break;
      case '2021':
         $tahun = 'Dua Ribu Dua Puluh Satu';
         break;
      case '2022':
         $tahun = 'Dua Ribu Dua Puluh Dua';
         break;
      case '2023':
         $tahun = 'Dua Ribu Dua Puluh Tiga';
         break;
      case '2024':
         $tahun = 'Dua Ribu Dua Puluh Empat';
         break;
      case '2025':
         $tahun = 'Dua Ribu Dua Puluh Lima';
         break;
   }
   return $tahun;
}
