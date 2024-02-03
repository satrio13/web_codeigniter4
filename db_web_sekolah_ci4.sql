-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 03, 2024 at 11:34 AM
-- Server version: 8.0.30
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_web_sekolah_ci4`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int NOT NULL,
  `batch` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2024-01-10-072824', 'App\\Database\\Migrations\\User', 'default', 'App', 1706863514, 1),
(2, '2024-01-10-080417', 'App\\Database\\Migrations\\Profil', 'default', 'App', 1706863514, 1),
(3, '2024-01-11-014226', 'App\\Database\\Migrations\\Link', 'default', 'App', 1706863514, 1),
(4, '2024-01-12-041923', 'App\\Database\\Migrations\\Agenda', 'default', 'App', 1706863514, 1),
(5, '2024-01-18-032903', 'App\\Database\\Migrations\\Pengumuman', 'default', 'App', 1706863514, 1),
(6, '2024-01-18-054816', 'App\\Database\\Migrations\\Berita', 'default', 'App', 1706863514, 1),
(7, '2024-01-18-075833', 'App\\Database\\Migrations\\Download', 'default', 'App', 1706863514, 1),
(8, '2024-01-18-105927', 'App\\Database\\Migrations\\Siswa', 'default', 'App', 1706863514, 1),
(9, '2024-01-18-122126', 'App\\Database\\Migrations\\Tahun', 'default', 'App', 1706863514, 1),
(10, '2024-01-19-010941', 'App\\Database\\Migrations\\PrestasiSiswa', 'default', 'App', 1706863514, 1),
(11, '2024-01-19-011621', 'App\\Database\\Migrations\\PrestasiGuru', 'default', 'App', 1706863514, 1),
(12, '2024-01-19-011627', 'App\\Database\\Migrations\\PrestasiSekolah', 'default', 'App', 1706863514, 1),
(13, '2024-01-20-041519', 'App\\Database\\Migrations\\Banner', 'default', 'App', 1706863514, 1),
(14, '2024-01-20-062539', 'App\\Database\\Migrations\\Sejarah', 'default', 'App', 1706863514, 1),
(15, '2024-01-20-080843', 'App\\Database\\Migrations\\VisiMisi', 'default', 'App', 1706863514, 1),
(16, '2024-01-20-083247', 'App\\Database\\Migrations\\StrukturOrganisasi', 'default', 'App', 1706863514, 1),
(17, '2024-01-20-094320', 'App\\Database\\Migrations\\Ekstrakurikuler', 'default', 'App', 1706863514, 1),
(18, '2024-01-21-014217', 'App\\Database\\Migrations\\Sarpras', 'default', 'App', 1706863514, 1),
(19, '2024-01-21-025021', 'App\\Database\\Migrations\\Guru', 'default', 'App', 1706863514, 1),
(20, '2024-01-21-025025', 'App\\Database\\Migrations\\Karyawan', 'default', 'App', 1706863514, 1),
(21, '2024-01-22-022234', 'App\\Database\\Migrations\\Alumni', 'default', 'App', 1706863514, 1),
(22, '2024-01-22-080855', 'App\\Database\\Migrations\\Pengaduan', 'default', 'App', 1706863514, 1),
(23, '2024-01-22-083353', 'App\\Database\\Migrations\\Isialumni', 'default', 'App', 1706863514, 1),
(24, '2024-01-22-122058', 'App\\Database\\Migrations\\Album', 'default', 'App', 1706863514, 1),
(25, '2024-01-22-123158', 'App\\Database\\Migrations\\Foto', 'default', 'App', 1706863514, 1),
(26, '2024-01-22-130351', 'App\\Database\\Migrations\\Video', 'default', 'App', 1706863514, 1),
(27, '2024-01-23-092711', 'App\\Database\\Migrations\\Kurikulum', 'default', 'App', 1706863514, 1),
(28, '2024-01-24-020753', 'App\\Database\\Migrations\\Kalender', 'default', 'App', 1706863514, 1),
(29, '2024-01-24-023033', 'App\\Database\\Migrations\\RekapUN', 'default', 'App', 1706863514, 1),
(30, '2024-01-24-023035', 'App\\Database\\Migrations\\RekapUS', 'default', 'App', 1706863514, 1),
(31, '2024-01-30-075246', 'App\\Database\\Migrations\\Statistik', 'default', 'App', 1706863514, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_agenda`
--

CREATE TABLE `tb_agenda` (
  `id` int UNSIGNED NOT NULL,
  `nama_agenda` varchar(100) NOT NULL,
  `berapa_hari` int NOT NULL,
  `tgl` date NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `jam_mulai` varchar(20) NOT NULL,
  `jam_selesai` varchar(20) NOT NULL,
  `keterangan` text NOT NULL,
  `tempat` varchar(100) NOT NULL,
  `gambar` varchar(250) NOT NULL,
  `slug` varchar(150) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tb_agenda`
--

INSERT INTO `tb_agenda` (`id`, `nama_agenda`, `berapa_hari`, `tgl`, `tgl_mulai`, `tgl_selesai`, `jam_mulai`, `jam_selesai`, `keterangan`, `tempat`, `gambar`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Pengambilan Buku Panduan Belajar Semester Genap Tahun Pelajaran 2020/2021', 2, '0000-00-00', '2021-01-29', '2021-02-15', '07:30', '13:30', '&lt;p&gt;Assalamu&#039;alaikum Wr.Wb.&lt;/p&gt;&lt;p&gt;Diberitahukan kepada peserta didik \r\nkelas VII,VIII, dan IX MTsN 1 Kebumen, bahwa pengambilan Buku Panduan \r\nBelajar bisa dimulai hari Jum&#039;at, 29 Januari 2021 sesuai dengan jadwal \r\nyang telah di share oleh Wali Kelas.&lt;/p&gt;&lt;p&gt;Adapun ketentuan pengambilan&amp;nbsp;&lt;span&gt;Buku Panduan Belajar adalah :&lt;/span&gt;&lt;/p&gt;&lt;ol&gt;&lt;li&gt;&lt;span&gt;Diambil oleh Orang tua / Wali Siswa&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span&gt;Patuhi protokol kesehatan dengan jaga jarak dan memakai masker.&lt;/span&gt;&lt;/li&gt;&lt;/ol&gt;&lt;p&gt;&lt;span&gt;Wassalamu&#039;alaikum Wr.Wb&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;', 'Perpustakaan MTsN 1 Kebumen', '1706933576_29be83fc4f0f3fcc7bd7.jpg', 'pengambilan-buku-panduan-belajar-semester-genap-tahun-pelajaran-2020-2021', '2024-02-03 11:12:56', '2024-02-03 11:12:56'),
(3, 'Revisi Jadwal Pengambilan Buku (Kelas 8D, 8E, dan 9E)', 2, '0000-00-00', '2021-02-16', '2021-02-17', '08:00', '13:00', '&lt;p&gt;Assalamu&#039;alaikum Wr.Wb.&lt;/p&gt;&lt;p&gt;Diberitahukan kepada Bp/Ibu Wali Siswa berhubung dengan adanya &lt;b&gt;Program Jateng 2 Hari di Rumah Saja&lt;/b&gt; dan&lt;b&gt; libur tahun baru Imlek&lt;/b&gt;, maka jadwal pengambilan di Perpustakaan diubah sebagai berikut :&lt;/p&gt;&lt;p&gt;VIII D : Selasa, 16 Februari 2021 ( Jam 07.30-10.30 WIB)&lt;/p&gt;&lt;p&gt;VIII E : Selasa, 16 Februari 2021 (Jam 10.30-11.30 WIB)&lt;/p&gt;&lt;p&gt;IX E : Rabu, Februari 2021 (Jam 07.30 - 10.30 WIB)&lt;/p&gt;&lt;p&gt;Demikian pemberitahuan ini kami sampaikan, atas perhatiannya kami ucapkan terima kasih.&lt;/p&gt;&lt;p&gt;&lt;/p&gt;', 'Perpustakaan MTsN 1 Kebumen', '1706933901_0cb2860bea477bee9b31.jpg', 'revisi-jadwal-pengambilan-buku-kelas-8d-8e-dan-9e', '2024-02-03 11:18:21', '2024-02-03 11:18:21'),
(4, 'PTS/PAT Kelas VII, VIII, dan IX Semester Genap Tahun Pelajaran 2020/2021', 2, '0000-00-00', '2021-03-04', '2021-03-13', '19:30', '15:00', '&lt;ul&gt;&lt;li&gt;Metode Daring&lt;/li&gt;&lt;li&gt;Media E-Learning Madrasah dan Zoom untuk absensi dan pengawasan&lt;/li&gt;&lt;li&gt;Jenis Test Tertulis dan Penugasan untuk mapel Tahfidz, SBK, Prakarya/Informatika, dan KIR&lt;br&gt;&lt;/li&gt;&lt;/ul&gt;&lt;p&gt;&lt;/p&gt;', 'Rumah peserta didik (Test Secara Online)', '1706934006_8cffbd84196e226d2506.jpg', 'pts-pat-kelas-vii-viii-dan-ix-semester-genap-tahun-pelajaran-2020-2021', '2024-02-03 11:20:06', '2024-02-03 11:20:06'),
(5, 'Peringatan Isra Mi&#039;raj dan Serah Terima Jabatan Ketua OSIS yang Baru', 1, '2021-03-12', '0000-00-00', '0000-00-00', '07:30', '10:00', '&lt;ul&gt;&lt;li&gt;Kegiatan dilaksanakan secara Virtual&lt;/li&gt;&lt;li&gt;Di-ikuti oleh siswa-siswi kelas VII, VIII, IX (secara virtual)&lt;/li&gt;&lt;/ul&gt;&lt;p&gt;&lt;/p&gt;', 'Aula MTsN 1 Kebumen', '1706934264_d5d7ae3aefd58a5b676d.jpg', 'peringatan-isra-mi-039-raj-dan-serah-terima-jabatan-ketua-osis-yang-baru', '2024-02-03 11:24:24', '2024-02-03 11:24:24'),
(6, 'Pengambilan Raport PTS/PAS Semester Genap Tahun Pelajaran 2020/2021', 2, '0000-00-00', '2021-03-15', '2021-03-20', '08:00', '13:00', '&lt;p&gt;Assalamu&#039;alaikum Wr.Wb&lt;/p&gt;&lt;p&gt;Diberitahukan kepada Bapak/Ibu Wali \r\nSiswa Kelas VII,VIII, dan IX MTsN 1 Kebumen berkaitan dengan selesainya \r\nkegiatan PTS untuk kelas VII,VIII&amp;nbsp; dan PAT untuk kelas IX Semester Genap\r\n Tahun Pelajaran 2020/2021, maka pengambilan hasil PTS dan PAT \r\ndilaksanakan dengan ketentuan berikut :&lt;br&gt;a. Jadwal Kegiatan&amp;nbsp;&lt;br&gt;&amp;nbsp; &amp;nbsp;&lt;a href=&quot;https://mtsn1kebumen.sch.id/assets/file/Undangan_7.jpeg&quot; target=&quot;_blank&quot;&gt; Jadwal pengambilan PTS Kelas VII&lt;/a&gt;&lt;br&gt;&amp;nbsp; &amp;nbsp; Jadwal Pengambilan PTS Kelas VIII (Menyusul)&lt;br&gt;&amp;nbsp; &amp;nbsp; &lt;a href=&quot;https://mtsn1kebumen.sch.id/assets/file/Undangan_9.jpeg&quot; target=&quot;_blank&quot;&gt;Jadwal Pengambilan&amp;nbsp; PAT Kelas IX&lt;/a&gt;&lt;br&gt;&lt;span&gt;b. Peserta yang hadir adalah orang tua/wali peserta didik dan peserta didik&lt;br&gt;&lt;/span&gt;&lt;img alt=&quot;&quot;&gt;&lt;span&gt;c. Menerapkan Protokol Kesehatan guna mencegah Penyebaran Covid-19&lt;br&gt;&lt;/span&gt;d. Membawa alat tulis sendiri&lt;br&gt;&lt;span&gt;e.&amp;nbsp;&lt;/span&gt;&lt;span&gt;Membawa Foto kopi Ijazah, Kartu Keluarga (KK), Akte Kelahiran, KIP, PKH, KPS,KKS (bagi yang punya) dimasukkan ke dalam stopmap&lt;br&gt;f.&amp;nbsp;&lt;/span&gt;&lt;span&gt;Mohon hadir tepat waktu&lt;/span&gt;&lt;/p&gt;&lt;span&gt;Demikian undangan disampaikan, atas perhatiannya kami ucapkan terima kasih&lt;/span&gt;&lt;p&gt;&lt;/p&gt;', 'Aula MTsN 1 Kebumen', '1706934525_71330accd3b9872b144d.jpg', 'pengambilan-raport-pts-pas-semester-genap-tahun-pelajaran-2020-2021', '2024-02-03 11:28:45', '2024-02-03 11:28:45'),
(7, 'Ujian Madrasah Kelas IX Tahun Pelajaran 2020/2021', 2, '0000-00-00', '2021-03-22', '2021-04-05', '08:00', '10:00', '&lt;p&gt;Assalamu&#039;alaikum Wr.Wb.&lt;br&gt;Di-informasikan kepada peserta didik kelas\r\n IX bahwa pelaksanaan Ujian Madrasah (UM) akan dilaksanakan pada tanggal\r\n 22 Maret 2021 s.d 5 April 2021 dengan metode daring. Bagi siswa yang \r\nterkendala dengan jaringan atau sinyal, pengerjaan Ujian Madrasah bisa \r\ndilaksanakan di Lab.Komputer MTsN 1 Kebumen.&lt;/p&gt;&lt;p&gt;Terima kasih.&lt;/p&gt;&lt;p&gt;&lt;/p&gt;', 'Rumah peserta didik (Test Secara Online)', '1706934673_a8a2c49a816a4849c3a6.jpg', 'ujian-madrasah-kelas-ix-tahun-pelajaran-2020-2021', '2024-02-03 11:31:13', '2024-02-03 11:31:13'),
(8, 'Test Seleksi PPDB Program IBS Tahun Pelajaran 2021/2022', 2, '0000-00-00', '2021-04-19', '2021-04-20', '07:30', '15:30', '&lt;p&gt;Assalamu&#039;alaikum.&lt;br&gt;&lt;br&gt;Informasi kepada Calon Peserta Didik MTsN 1 \r\nKebumen bahwa pelaksanaan Test Seleksi Peserta Didik Baru Program IBS \r\nakan dilaksanakan pada Senin (19/4/2021) - Selasa (20/4/2021), dengan \r\nmenerapkan standard protokol kesehatan sebagai berikut :&lt;br&gt;&lt;/p&gt;Peserta didik wajib mematuhi protokol kesehatan :&lt;br&gt;1. Menggunakan masker&lt;br&gt;2. Mencuci tangan&lt;br&gt;3. Menjaga jarak&lt;br&gt;4. Membatasi mobilitas dan interaksi&lt;br&gt;5. Menjauhi kerumunan&lt;br&gt;6. Membawa handsanitiser&lt;br&gt;7. Pengantar maksimal 1 orang dan tidak menunggu di lingkungan madrasah&lt;br&gt;8. Setelah mengikuti test langsung pulang&lt;p&gt;&lt;/p&gt;', 'MTsN 1 Kebumen', '1706934907_833658cc3fd0ef539a92.jpg', 'test-seleksi-ppdb-program-ibs-tahun-pelajaran-2021-2022', '2024-02-03 11:35:07', '2024-02-03 11:35:07');

-- --------------------------------------------------------

--
-- Table structure for table `tb_album`
--

CREATE TABLE `tb_album` (
  `id_album` int UNSIGNED NOT NULL,
  `album` varchar(50) NOT NULL,
  `is_active` int NOT NULL,
  `slug` varchar(70) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tb_album`
--

INSERT INTO `tb_album` (`id_album`, `album`, `is_active`, `slug`, `created_at`, `updated_at`) VALUES
(3, 'OUTBOUND FOR FULL DAY SCHOOL PROGRAM', 1, 'outbound-for-full-day-school-program', '2024-02-03 16:23:28', '2024-02-03 16:23:28'),
(4, 'PERLOMBAAN DALAM RANGKA PERINGATAN HUT RI KE-77', 1, 'perlombaan-dalam-rangka-peringatan-hut-ri-ke-77', '2024-02-03 16:23:36', '2024-02-03 16:23:36'),
(5, 'UPACARA PERINGATAN HUT RI KE-77', 1, 'upacara-peringatan-hut-ri-ke-77', '2024-02-03 16:23:42', '2024-02-03 16:23:42'),
(6, 'SEMINAR MOTIVASI SANTRI IBS MATANSA', 1, 'seminar-motivasi-santri-ibs-matansa', '2024-02-03 16:23:48', '2024-02-03 16:23:48');

-- --------------------------------------------------------

--
-- Table structure for table `tb_alumni`
--

CREATE TABLE `tb_alumni` (
  `id` int UNSIGNED NOT NULL,
  `id_tahun` int NOT NULL,
  `jml_l` int NOT NULL,
  `jml_p` int NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `tb_banner`
--

CREATE TABLE `tb_banner` (
  `id` int UNSIGNED NOT NULL,
  `gambar` varchar(250) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `link` varchar(300) NOT NULL,
  `button` varchar(30) NOT NULL,
  `is_active` int NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tb_banner`
--

INSERT INTO `tb_banner` (`id`, `gambar`, `judul`, `keterangan`, `link`, `button`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'eb56f547ae5ea34e4bfdd2cf8f16ffc6.jpg', 'MTs NEGERI 1 KEBUMEN', 'Jl. Tentara Pelajar No 29 Kebumen 54312	', 'https://mtsn1kebumen.sch.id/profil', 'PROFIL SEKOLAH	', 1, '2024-02-03 15:53:14', '2024-02-03 15:53:14'),
(2, '4c8e077b53ea20b7df60b4697b47ef86.jpg', 'MTs NEGERI 1 KEBUMEN', 'Jl. Tentara Pelajar No 29 Kebumen 54312', 'https://mtsn1kebumen.sch.id/profil', 'PROFIL SEKOLAH', 1, '2024-02-03 15:54:09', '2024-02-03 15:54:09');

-- --------------------------------------------------------

--
-- Table structure for table `tb_berita`
--

CREATE TABLE `tb_berita` (
  `id` int UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(250) NOT NULL,
  `dibaca` int NOT NULL,
  `id_user` int NOT NULL,
  `is_active` int NOT NULL,
  `hari` varchar(10) NOT NULL,
  `tgl` date NOT NULL,
  `slug` varchar(150) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tb_berita`
--

INSERT INTO `tb_berita` (`id`, `nama`, `isi`, `gambar`, `dibaca`, `id_user`, `is_active`, `hari`, `tgl`, `slug`, `created_at`, `updated_at`) VALUES
(2, 'Siswa Matansa Raih Juara I di Kejuaraan Nasional Olahraga DBON Tahun 2022', '<p class=\"MsoNormal\">Kebumen_Atlet olah raga MTs\r\nNegeri 1 Kebumen turut berpartisipasi menyukseskan program pemerintah tentang\r\nDesain Besar Olahraga Nasional (DBON) dan perkembangan industri olahraga di\r\nIndonesia. </p><p class=\"MsoNormal\">Melalui ajang kejuaraan yang\r\ndiselenggarakan oleh Perkumpulan Mahasiswa Olahraga Prestasi (PMOP) bekerjasama\r\ndengan Fakultas Keolahragaan Universitas Sebelas Maret Surakarta (FKOR UNS) mengadakan\r\nkegiatan Kejuaraan Nasional Olahraga DBON antar SMP/MTs/Sederajat,\r\nSMA/MA/Sederajat dan Kelas Khusus Olahraga (KKO). &nbsp;</p><p class=\"MsoNormal\">Even\r\n yang &nbsp;dilaksanakan pada Rabu s.d Jumat (14 – 16/12/\r\n2022) tersebut bertempat di kompleks Universitas Sebelas Maret (UNS) \r\n&nbsp;Surakarta. Pada kejuaran &nbsp;tersebut duta MTs Negeri 1 Kebumen berhasi\r\nmeraih juara I &nbsp;cabang bulutangkis\r\ntunggal putra atas nama Alga Fauzi Harfani dan juara 3 lomba lompat jauh\r\n putri\r\natas nama Alya Ainul Azzura.</p><p>\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoNormal\">Selamat dan sukses untuk &nbsp;para juara, semoga makin berprestasi lagi di\r\nmasa selanjutnya.</p><p></p>', '1706936229_9cd2fe4a1e716ee538f4.jpeg', 0, 1, 1, 'Sabtu', '2024-02-03', 'siswa-matansa-raih-juara-i-di-kejuaraan-nasional-olahraga-dbon-tahun-2022', '2024-02-03 11:57:09', '2024-02-03 11:57:09'),
(3, 'Rakor Persiapan dan Pemantapan KBM Semester Genap Madrasah', '<p><span>Kebumen_Mengawali tahun baru 2023, Kanwil Kementerian Agama\r\nProvinsi Jawa Tengah menggelar kegiatan rapat koordinasi terkait kegiatan\r\nbelajar mengajar semester genap tahun pelajaran 2022/2023. Kegiatan ini\r\ndilaksanakan hari Kamis (12/1/23) dimulai pukul 08.00 WIB. Acara ini\r\nberlangsung secara virtual/online via zoom dari Kantor Kanwil Propinsi Jawa Tengah.</span></p><p><span>Kegiatan ini diikuti oleh seluruh madrasahyang ada di Jawa Tengah,\r\nmulai Madrasah Ibtidaiyah, Madrasah Tsanawiyah maupun Madrasah Aliyah dan\r\ninstansi pemangku kebijakan pendidikan madrasah di Jawa Tengah termasuk\r\nMadrasah Tsanawiyah Negeri 1 Kebumen juga turut menjadi peserta. Kegiatan di\r\nMTsN 1 Kebumen dipusatkan di Aula Madrasah diikuti oleh Kepala mdrasah, para\r\nWaka dan beberapa guru yang ditunjuk. &nbsp;</span></p><p><span>Dalam kesempatan tersebut, Kakanwil Jateng, Mustangin Ahmad,\r\nmenyambut baik keberhasilan yang telah diraih oleh madrasah selama ini, meski\r\nmasih dalam kondisi bernuansa pandemi, di mana segalanya masih dibatasi\r\nprotokol kesehatan tertentu. Menurutntnya, Program Indonesia Pintar yang\r\ndananya berjumlah 9 milyar sangat membantu keberlangsungan dalam pendidikan,\r\nkhususnya madrasah.</span></p><p>\r\n\r\n\r\n\r\n\r\n\r\n</p><p><span>Sementara itu, Menteri Agama RI, Yaqut Cholil, dalam sambutannya menyampaikan&nbsp; bahwa keberhasilan madrasah bisa diraih\r\ndengan program yang tepat dan terevaluasi. Di samping MAN IC dn MAN PK, kini\r\nMadrasah Aliyah Negeri Unggulan di seluruh Indonesia telah dibuka sebagai\r\nmadrasah lanjutan untuk mengembangkan potensi dan skill yang dimiliki oleh\r\nanak-anak bangsa. (Is/Sl)</span></p><p></p>', '1706936271_3c5fe0d5a053b45c72ab.jpg', 0, 1, 1, 'Sabtu', '2024-02-03', 'rakor-persiapan-dan-pemantapan-kbm-semester-genap-madrasah', '2024-02-03 11:57:51', '2024-02-03 11:57:51'),
(4, 'Sosialisasi dan Koordinasi Pendidikan Lanjutan ke Madrasah Unggulan Nasional', '<p><span>Kebumen_Dalam rangka menyukseskan program wajib belajar 12 tahun,\r\nMadrasah Tsanawiyah Negeri 1 Kebumen pada awal semester genap 2023\r\nmengadakan&nbsp;rapat koordinasi dengan orang tua peserta didik. Acara ini\r\ndilaksanakan pada hari Jumat (13/01/23) bertempat di Aula Madrasah.</span></p><p><span>Rapat koordinasi ini dalam rangka persiapan seleksi peserta didik\r\nMatansa untuk PPDB di madrasah unggulan nasional, khusunya MAN IC dan MAN PK.\r\nKegiatan ini diikuti oleh orang tua&nbsp;wali peserta didik sebanyak 68 orang, yang\r\nterdiri dari 45 calon siswa mendaftar ke MAN IC dan 23 siswa ke MAN PK. Hadir\r\npula para guru pendamping dari guru BK.</span></p><p><span>Seperti tahun-tahun sebelumnya, khusus bagi peserta didik kelas\r\nIX yang memenuhi syarat, pada kegiataan ini mengikuti kegiatan persiapan\r\nseleksi lanjutan ke sekolah atau madrasah unggulan. Kegiatan diawali </span><span>pemaparan dari Waka Kurikulum,\r\nSuyitman menyampaikan tahapan-tahapan proses seleksi dari awal hingga akhir, pengumuman\r\npenerimaan seleksi tahun ini di jadwalkan tanggal 16 Maret 2023.</span></p><p><span>Data peserta didik Matansa yang diterima tahun lalu di MAN IC dan\r\nMAN PK cukup menggembirakan. Tahun 2020 ada 11 peserta didik yang diterima di\r\nMAN IC, tahun 2021 ada 8 peserta didik dan 2022 ada 9 peserta didik. Untuk MAN\r\nPK yang diterima tahun 2020 sebanyak 2 peserta didik, tahun 2021 sebanyak 3\r\npeserta. Selain itu ada juga siswa yang diterima di Sekolah Unggulan CT Arsya Fondatioan,\r\ntahun lalu sebanyak 7 peserta didik.</span></p><p class=\"MsoNormal\"><span>Dalam\r\nkegiatan tersebut juga diberikan &nbsp;pembekalan, motivasi dan pengarahan yang\r\ndisampaikan oleh&nbsp; Kepala MTsN1 Kebumen, Fitriana Aenun. Dalam\r\npengarahannya Kepala Madrasah berharap agar peserta didik segera bersiap dan semangat\r\nuntuk meniti jenjang pendidikan berikutnya, bersaing dalam skala nasional\r\ndengan harapan &nbsp;menjadi insan cendekia\r\nyang unggul dan berkarakter kuat sebagai generasi muslim penerus bangsa.</span></p><p><span>Motivasi, koordinasi, dan pembekalan juga dilakukan dengan orang\r\ntua/ wali calon peserta didik. </span><span>Fitriana Aenun menyampaikan terimakasih kepada wali peserta didik\r\nyang telah &nbsp;andil memotivasi dan mendukung putra-putrinya dalam rangka\r\nmeniti jenjang pendidikan berikutnya. pada tahun ini diharapkan jumlah yang\r\nakan diterima lebih banyak dari tahun sebelumnya.&nbsp;</span></p><p><span>“</span><span>Pihak\r\nmadrasah menyadari bahwa peran orang tua sangat menentukan untuk mendukung dan\r\nmendampingi putra-putri mereka dalam proses tahapan seleksi masuk\r\nmadrasah-madrasah unggulan tersebut,” tegas Aenun.</span></p><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p><span>Selanjutnya, Fitriana Aenun juga menyampaikan bahwa untuk tahun\r\nini, ada lima calon peserta didik dari Matansa\r\nyang mendaftar di sekolah Unggulan SMA Taruna Nusantara di Magelang. (Is/Sl)</span></p><p></p>', '1706936302_4c5d64497d66aba9c2ba.jpeg', 0, 1, 1, 'Sabtu', '2024-02-03', 'sosialisasi-dan-koordinasi-pendidikan-lanjutan-ke-madrasah-unggulan-nasional', '2024-02-03 11:58:22', '2024-02-03 11:58:22'),
(5, 'Outing Class,  Kelas Bilingual Matansa Ngobrol dengan Turis Bule', '<p class=\"MsoNormal\">Kebumen_Program Khusus (PK) Kelas\r\nBilingual MTsN 1 Kebumen mengadakan Kegiatan di Luar Kelas (<i>Outing Class</i>). Kegiatan ini dilaksanakan\r\npada Sabtu (14/1/2023). Kegiatan yang diikuti oleh seluruh peserta didik PK\r\nBilingual, sebanyak 93 siswa dari kelas VII, VIII, dan IX ini didampingi oleh\r\nguru-guru bahasa pada kelas tersebut. </p><p class=\"MsoNormal\">Rombongan berangkat dari madrasah\r\nmenggunakan tiga bus pada pukul 07.00 dan kembali sekitar pukul&nbsp; 17.00 WIB. Lokasi yang dipilih adalah Kota Yogyakarta,\r\ntepatnya di Candi Prambanan dan Malioboro. Sesuai dengan tujuan kegiatan yaitu\r\nuntuk melatih dan membiasakan peserta didik agar mampu dan terbiasa berkomunikasi\r\nmenggunakan bahasa Inggris dengan penutur aslinya. Kedua tempat itu dipilih\r\nkarena dipastikan banyak turis asing (mancanegara) yang bisa diajak berbincang\r\ndan berkomunikasi dalam bahasa Inggris. </p><p class=\"MsoNormal\">Model kegiatan ini dibuat dalam kelompok-kelompok\r\nkecil, baik dalam praktik berkomunikasi di lapangan maupun dalam pembuatan\r\nlaporan. Suasana kegiatan dibuat secara santai untuk mempraktikkan materi yang\r\nsudah dipelajari di kelas.</p><p class=\"MsoNormal\">Dalam arahannya, Kepala MTsN 1\r\nKebumen, Fitriana Aenun menekankan pentingnya kemampuan lisan terutama dalam\r\nberbahasa asing, untuk menghadapi persaingan hidup global seperti era sekarang\r\ndan di masa mendatang. </p><p class=\"MsoNormal\">“Dengan kegiatan <i>Outing Class</i> &nbsp;ini kita berharap semoga dapat menjadi sarana dan\r\npengalaman nyata yang menambah keberanian dan keterampilan peserta didik dalam\r\nberbahasa Inggris sebagai bekal konkret ke masa depan,” tambahnya.</p><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoNormal\">Sementara itu, Ari Endah Miyosi,\r\nS.Pd selaku ketua panitia berharap agar peserta didik bisa memanfaatkan kesempatan\r\ntersebut secara maksimal, mempraktikkan kemampuan bahasa Inggris yang sudah\r\ndipelajari di kelas sambil menikmati suasana rileks dan mendapat ilmu di\r\nlingkungan yang nyata suasana keramaian di luar kelas. (Is/Sl)</p><p></p>', '1706936337_a3e39a331a58c106beb9.jpeg', 0, 1, 1, 'Sabtu', '2024-02-03', 'outing-class-kelas-bilingual-matansa-ngobrol-dengan-turis-bule', '2024-02-03 11:58:57', '2024-02-03 11:58:57'),
(6, 'Selamat atas Prestasi yang Diraih Peserta Didik Matansa', '<p class=\"MsoNormal\">Kebumen_Berbagai prestasi kembali ditorehkan oleh peserta\r\ndidik Matansa dalam berbagai lomba yang diikuti beberapa waktu lalu. </p><p class=\"MsoNormal\">Salah satunya adalah oleh Agida Nabila Farkhah Ramadhani.\r\nDia berhaasil meraih juara pertama Lomba Baca Puisi SMP/MTs Tingkat Nasional\r\nyang diselenggarakan oleh Pondok Pesantren Al-Aqobah Jombang, Jawa Timur yang\r\ndiselenggarakan pada 29 Desember 2022.</p><p class=\"MsoNormal\">Selanjutnya dalam ajang Kejuaraan Renang Antar Perkumpulan\r\nDaerah (KRAPDA) Bupati Cup 3 tahun 2023 tingkat Kabupaten Kebumen, 18 Desember 2022, dua peserta\r\ndidik berhasil memborong beberapa medali. Salah satunya aadalah Danar Syarif\r\nHidayatullah yang berhasil meraih 5 buah medali, yaitu juara 2 cabang 50 m gaya\r\ndada, 50 m gaya kupu-kupu, 100 m gaya kupu-kupu, dan juara tiga di cabang 50 m\r\ngaya bebasa dan 200 m gaya ganti perorangan.</p><p class=\"MsoNormal\">Satu lagi prestasi diraih oleh Sekar Widyaningsih daan ajang\r\nkejuaraan yang sama yakni Kejuaraan Renangb Antar Perkumpulan Daerah (KRAP)\r\nBupati Cup Tahun 2023. Sekar berhasil meraih tiga medali, masing-masing adalah:\r\njuara 2 cabang 200 m gaya bebas putri, juara 2 cabang 200 gaya dada, dan juara\r\n3 cabang 50 m gaya kupu-kupu.</p><p class=\"MsoNormal\">Selamat untuk para juara, semoga terus berprestasi di masa\r\ndan tingkat kejuaran berikutnya.</p><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoNormal\">&nbsp;</p><p></p>', '1706936372_373e9a71a8c2f024769a.jpeg', 0, 1, 1, 'Sabtu', '2024-02-03', 'selamat-atas-prestasi-yang-diraih-peserta-didik-matansa', '2024-02-03 11:59:32', '2024-02-03 11:59:32'),
(7, 'Harlah Matansa Ke-54,  Merawat Tradisi, Menebar Kreasi, dan Mencintai Negeri', '<p class=\"MsoNormal\">Kebumen_Milad Madrasah Tsanawiyah\r\nNegeri 1 Kebumen yang ke-54 diperingati secara meriah oleh seluruh warga\r\nmadarsah. Matansa mengadakan acara menyambut hari lahir pada bulan Januari,\r\ndari Selasa sampai dengan Jumat (24-27/01/2023). Pusat kegiatan berada di\r\npanggung halaman utama. </p><p class=\"MsoNormal\">Berbagai kegiatan dilakukan\r\nsecara maraton. Diawali dengan kegiatan jalan sehat warga Matansa mengambil\r\nrute jalan di Kota Kebumen pada Selasa pagi. Hari berikutnya dilanjutkan dengan\r\nlomba&nbsp; <i>solo song</i>, drama, melukis, <i>got\r\ntalent</i>, <i>best student</i> dan lomba literasi,\r\nyakni menulis resensi dan opini. Lomba diikuti oleh peserta didik mewakili\r\nkelas masing-masing. Untuk memeriahkan suasana digelar pula pameran karya\r\npeserta didik, dan bazar kuliner dari peserta didik kelas IX.&nbsp; </p><p class=\"MsoNormal\">Ketua Panitia, Muktamat, M.Si,\r\nmenyampaikan bahwa tema Harlah kali ini adalah <i>Merawat Tradisi, Menebar Kreasi dan Mencintai Negeri</i>. Peserta didik\r\ndiberi kebebasan untuk mengepresikan dan mengeksplorasi bakat melalui lagu,\r\ntari, budaya daerah, serta mementaskan cerita-cerita rakyat lokal Kebumen.</p><p class=\"MsoNormal\">“Kegiatan ini bertujuan untuk\r\nmenggali kreatifitas peserta didik, baik secara individu maupun kelompok.\r\nDisatukan dengan kegiatan pembelajaran Kurikulum Merdeka pada implementasi\r\nProyek Pelajar Pancasila bagi peserta didik kelas VII,” tambahnya.</p><p class=\"MsoNormal\">Sebagai hiburan disediakan undian\r\nberhadiah berbagai doorprize, sumbangan dari beberapa sponsor dan guru serta\r\nkaryawan Matansa. Undian dikhususkan hanya untuk peserta didik dengan hadiah\r\nutamanya adalah tabungan BRI senilai 1 juta, 2 juta, dan sebuah sepeda .</p><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoNormal\">Puncak acara dilaksanakan Jumat (27/1/2023),\r\ndiawali dengan doa mujahadah bersama yang dipimpin oleh Ketua MUI Kebumen, KH.\r\nNursodiq, setelah malamnya diisi dengan lantunan sholawat, dilanjutkan pemotongan\r\ntumpeng dan diakhiri pengumuman serta pembagian hadiah bagi para juara.</p><p></p>', '1706939062_d63cc3fc45ad73548a5a.jpeg', 0, 1, 1, 'Sabtu', '2024-02-03', 'harlah-matansa-ke-54-merawat-tradisi-menebar-kreasi-dan-mencintai-negeri', '2024-02-03 12:44:22', '2024-02-03 12:44:22'),
(8, 'Nasi Proposal Meriahkan Bazar Kuliner Milad Matansa', '<p class=\"MsoNormal\"><span>Kebumen_Peringatan\r\nMilad Matansa yang ke-54, Madrasah Tsanawiyah Negeri 1 Kebumen, salah satunya dimeriahkan\r\ndengan adanya bazar kuliner yang diikuti oleh peserta didik kelas 9. Bazar\r\nkuliner berlangsung dua hari Rabu dan Kamis (25 – 26/1/2023).</span></p><p class=\"MsoNormal\"><span>Salah\r\nsatu stan bazar kuliner yang cukup meriah adalah dari kelas 9B. Sekretaris Bazar\r\n9B, Asyam Putra Rayzan menyampaikan bahwa acara bazar kuliner ini sangat\r\ndisukai oleh para peserta didik. Menurut Asyam dengan adanya bazar kuliner ini mereka\r\nbisa berlatih usaha wiraswasta. Terlihat mana yang bakat dan bisa berjualan\r\ndengan baik dan mana yang tidak tertarik untuk berjualan. Mereka akan\r\nkelihatan, mana yang bisa dan biasa memasak dan mana yang cocok dalam hal\r\npemasaran. </span></p><p class=\"MsoNormal\"><span>Peserta\r\ndidik juaga belajar menjadi pengusaha kecil-kecilan. Usaha yang dilakukan para\r\npeserta didik kelas 9B untuk membuat kegiatan bazar kuliner ini sukses adalah\r\ndengan mencari cara untuk membuat tampilan dagangan yang terbaik, rasa, dan wadah\r\nyang menarik. Tidak ketinggalan yang peanting juga adalah promosi.</span></p><p class=\"MsoNormal\"><span>\"Kita\r\njuga membuat dekorasi yang tidak terlalu rumit, tapi cukup menarik. Kami\r\nberbagi tugas, ada yang bagian masak, ada yang teriak-teriak memasarkan,\r\nmengantarkan, dan ada juga yang bagian menerima pesanan&nbsp; dan menerim pembayaran,\" tambah Asyam.</span></p><p class=\"MsoNormal\"><span>Proses\r\ndan kerja keras yang dilakukan oleh 9B selama bazar kuliner dimulai pada Selasa\r\nsore dengan merapihkan meja dan kursi untuk stan dan Rabu pagi mulai mendekor\r\nstand mereka yang dimulai pukul setengah 7 sampai pukul 8 pagi. Dilanjut masak\r\ndan melayani pembeli. </span></p><p class=\"MsoNormal\"><span>Ada\r\nyang unik dari kelaas 9B, makanan ada yang dimasak di kelas, menu &nbsp;<i>Nasi Proposal</i>.\r\nSementara menu lainnya &nbsp;cukup dimasak langsung\r\ndi stan. Kasirnya menggunakan laptop supaya lebih cepat dan mudah, ada petugas\r\nyang khusus memasukkan data dan ada yang khusus bagian uang kembalian.</span></p><p class=\"MsoNormal\"><span>Bazar\r\nkuliner yang hanya dua hari ini ternyata membawa keuntungan lumayan. &nbsp;Keuntungan yang didapat oleh kelas 9B sekitar\r\nRp600 ribu dari pendapatan total sebanyak Rp2,6 juta dengan modal sebesar 2 juta\r\nberasal dari kas dan iuran siswa. <i>Nasi\r\nProposal</i> merupakan menu favorit dari sekian menu yang ada. &nbsp;Hanya dua hari, itu pun sekitar pukul 12.00\r\npasti sudah sold out, <i>Nasi Proposal</i>\r\nterjual hinga sebanyak 200 porsi.</span></p><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoNormal\"><i><span>Tim peliput: Kelas 8F</span></i></p><p></p>', '1706939093_1ffdc1acc25ac29cc36e.jpg', 0, 1, 1, 'Sabtu', '2024-02-03', 'nasi-proposal-meriahkan-bazar-kuliner-milad-matansa', '2024-02-03 12:44:53', '2024-02-03 12:44:53'),
(9, 'Jalan Sehat Meriahkan Milad Matansa Ke-54 ', '<p class=\"MsoNormal\"><span lang=\"IN\">Kebumen_ Pada peringatan Milad Matansa\r\nyang ke-54, MTsN 1 Kebumen menggelar acara jalan sehat yang dilaksanakan pada\r\nSelasa (24</span><span>/1/</span><span lang=\"IN\"> 2023</span><span>) mulai pukul 07.30 hingga pukul 09.45</span><span lang=\"IN\">. </span></p><p class=\"MsoNormal\"><span lang=\"IN\">Sebelum acara jalan sehat dimulai</span><span lang=\"IN\"> </span><span>sempat </span><span lang=\"IN\">diberikan pertanyaan oleh Kepala MTsN 1 Kebumen mengenai kapan\r\nhari lahir MTsN 1 Kebumen. </span><span>Namun, siswa yang menjawab &nbsp;semuanya\r\nsalah, rata-rata menjawab pada bulan&nbsp;\r\nJanuari dan Februari, ternyata yang betul adalah 1 Mei 1969.</span></p><p class=\"MsoNormal\"><span>Seluruh warga madrasah mengikuti\r\nacara jalan sehat ini, baik guru, siswa, maupun karyawan MTsN 1 Kebumen dengan\r\nsangat antusias.&nbsp; Tak lupa OSIS MTsN 1\r\nKebumen juga ikut membantu dalam acara jalan sehat berlangsung. Pada saat jalan\r\nsehat semua warga Matansa mengenakan pakaian&nbsp;\r\nbaju olahraga sekolah. Acara ini dilakukan dengan tujuan meramaikan dan\r\nmemeriahkan Milad Matansa yang ke-54 </span></p><p class=\"MsoNormal\"><span>Rute pada acara jalan sehat ini\r\nadalah dari MTsN 1 Kebumen ke arah utara,&nbsp;\r\nsepanjang Jl. Tentara Pelajar pada pertigaan PDAM belok ke-kiri ke Jl.\r\nArumbinang (stadion) lalu pada pertigaan pasar koplak belok ke-kiri ke Jl.\r\nKusuma dan di Tugu Lawet belok ke-kiri ke&nbsp;\r\nJl. Ahmad Yani sampai dengan pertigaan Taman Kota kebumen berbelok\r\nke-kiri ke sepanjang&nbsp; Jl. Indrakila dan\r\nperempatan Polres Kebumen belok ke kanan lalu lurus terus sampai dengan kembali\r\nke MTsN 1 Kebumen. Saat tiba di madrasah semua siswa diberi sebuah roti dan air\r\nminum dan juga sebuah kupon undian. Kupon undian diundi langsung pada Selasa (24/1)\r\nhingga Kamis, 26 Januari 2023. </span></p><p class=\"MsoNormal\"><span>Acara Jalan sehat ini dilakukan\r\ndengan tujuan meramaikan dan memeriahkan milad Matansa yang ke-54 yang setelah\r\nkurang lebih 2 tahun lamanya tidak ada acara jalan sehat ini dikarenakan\r\nCovid-19. </span></p><p class=\"MsoNormal\"><span>Menurut salah satu siswa Matansa, Agha\r\nSatya, merasa sangat senang atas diadakannya kembali jalan sehat ini dalam\r\nrangka Milad MTsN 1 Kebumen yang ke-54 karena tahun lalu pada milad yang ke-53\r\njalan sehat tidak jadi diadakan karena naiknya jumlah kasus Covid-19. &nbsp;</span></p><p class=\"MsoNormal\"><span>“Seru, ramai dan mengasyikkan bisa\r\nmelihat pemandangan Kota Kebumen daerah Tugu Lawet,” tambah Agha. </span></p><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoNormal\"><i><span>Peliput: Tim Jurnalistik Kelas VIII-E</span></i></p><p></p>', '1706939136_4d339018bd7daa8c2833.jpg', 0, 1, 1, 'Sabtu', '2024-02-03', 'jalan-sehat-meriahkan-milad-matansa-ke-54', '2024-02-03 12:45:36', '2024-02-03 12:45:36'),
(10, 'MTsN 1 Kebumen Kembali Juara Umum OMADA VIII Se-Jawa', '<p class=\"MsoNormal\"><span>Kebumen_Delegasi\r\nMadrasah Tsanawiyah Negeri 1 Kebumen berjumlah 23 siswa berlaga pada ajang\r\nOMADA (Olimpiade Malhikdua) VIII tingkat SMP/MTs se-Jawa. Pelaksanaan bertempat\r\ndi Pondok Pesantren Al Hikmah 2 Sirampog, Bumiayu, Jawa Tengah pada Sabtu, 28\r\nJanuari 2023. Secara keseluruhan jumlah peserta yang masuk babak semi final\r\nsebanyak 296 anak.</span></p><p><span>Dari 23 peserta\r\ndidik delegasi Matansa, akhirnya 13 siswa lolos ke babak final. Sedangkan yang berhasil\r\n&nbsp;sebagai juara sebanyak 6 siswa. Perolehan\r\nkejuaraan tersebut sekaligus menjadikan Matansa kembalai ditetapkan sebagai\r\njuara umum dan mendapat piala bergilir, setelah dua tahun sebelumnya, secara berturut-turut\r\njuga keluar sebagai juara umum.</span></p><p><span>Perolehan kejuaraan\r\nyang diraih delegasi MTsN 1 Kebumen adalah sebagai berikut: cabang mapel IPA\r\nmerebut juara 1 atas nama M. Wildan Al Farokhi bin Mashud, dan juara juara 2\r\natas nama Fara Nuri Hamidah binti Cahyadi Waskito.</span></p><p><span>Mapel Matematika mendapat juara 2 atas nama Azmi Zulfa\r\nHakim bin Bachtiar Achmad, Bahasa Inggris meraih &nbsp;juara 3 atas nama Rizky Alifian Ramadhan bin\r\nSunarto, dan mapel IPS mendapat juara 3 atas nama Khaira Malayka Lohjenawi\r\nbinti Ahmad Nurkholis dan Nadia Fadhilah Nova binti Cahyo Riyadi. </span></p><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p><span>“<em><span>Usaha, ikhtiyar dan berdoa merupakan </span></em><em>three in one</em><em><span> yang sangat penting dalam berlomba, saat berhasil tetap bersyukur dan\r\ntawadu, manakala belum berhasil tetap semangat. Esok masih ada harapan,”</span></em>\r\ndemikian ungkap Kepala MTsN 1 Kebumen, Fitriana Aenun saat menemui anak didik\r\ndan para pendamping lomba, Irham Basyir, Rini Aryanti, dan Siti Mastiah. <br></span></p><p></p>', '1706939160_24181eee2958677fcd9a.jpeg', 2, 1, 1, 'Sabtu', '2024-02-03', 'mtsn-1-kebumen-kembali-juara-umum-omada-viii-se-jawa', '2024-02-03 12:46:00', '2024-02-03 12:46:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_download`
--

CREATE TABLE `tb_download` (
  `id` int UNSIGNED NOT NULL,
  `nama_file` varchar(100) NOT NULL,
  `file` varchar(100) NOT NULL,
  `hits` int NOT NULL,
  `id_user` int NOT NULL,
  `is_active` int NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tb_download`
--

INSERT INTO `tb_download` (`id`, `nama_file`, `file`, `hits`, `id_user`, `is_active`, `created_at`, `updated_at`) VALUES
(2, 'Contoh Formulir PPDB Program FDS Tahun Pelajaran 2020-2021', '1706939880_2727d50d24b4fbd13832.docx', 2, 1, 1, '2024-02-03 12:58:00', '2024-02-03 12:58:00'),
(3, 'Contoh Surat Pernyataan Tidak Pernah Tinggal Kelas', '1706939959_5606572e44ad7b90ccd0.docx', 2, 1, 1, '2024-02-03 12:59:19', '2024-02-03 12:59:19');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ekstrakurikuler`
--

CREATE TABLE `tb_ekstrakurikuler` (
  `id` int UNSIGNED NOT NULL,
  `nama_ekstrakurikuler` varchar(100) NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `keterangan` text NOT NULL,
  `slug` varchar(120) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `tb_foto`
--

CREATE TABLE `tb_foto` (
  `id_foto` int UNSIGNED NOT NULL,
  `id_album` int NOT NULL,
  `foto` varchar(250) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tb_foto`
--

INSERT INTO `tb_foto` (`id_foto`, `id_album`, `foto`, `created_at`, `updated_at`) VALUES
(2, 6, '1706952295_cc4ca3a4a37c1ff09279.jpg', '2024-02-03 16:24:55', '2024-02-03 16:24:55'),
(3, 6, '1706952295_14ef1b1ed09e9b9a6257.jpg', '2024-02-03 16:24:55', '2024-02-03 16:24:55');

-- --------------------------------------------------------

--
-- Table structure for table `tb_guru`
--

CREATE TABLE `tb_guru` (
  `id` int UNSIGNED NOT NULL,
  `nip` varchar(25) NOT NULL,
  `duk` varchar(20) NOT NULL,
  `niplama` varchar(25) NOT NULL,
  `nuptk` varchar(25) NOT NULL,
  `nokarpeg` varchar(12) NOT NULL,
  `golruang` varchar(5) NOT NULL,
  `statuspeg` varchar(5) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tmp_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `tmt_cpns` date NOT NULL,
  `tmt_pns` date NOT NULL,
  `jk` char(1) NOT NULL,
  `agama` char(1) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `pt` varchar(60) DEFAULT NULL,
  `tingkat_pt` varchar(20) NOT NULL,
  `prodi` varchar(50) NOT NULL,
  `th_lulus` varchar(4) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `gambar` varchar(250) NOT NULL,
  `status` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `statusguru` varchar(12) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tb_guru`
--

INSERT INTO `tb_guru` (`id`, `nip`, `duk`, `niplama`, `nuptk`, `nokarpeg`, `golruang`, `statuspeg`, `nama`, `tmp_lahir`, `tgl_lahir`, `tmt_cpns`, `tmt_pns`, `jk`, `agama`, `alamat`, `pt`, `tingkat_pt`, `prodi`, `th_lulus`, `jabatan`, `gambar`, `status`, `email`, `statusguru`, `created_at`, `updated_at`) VALUES
(2, '', '', '', '', '', '-', 'GTT', 'Rini', 'Kebumen', '1989-01-03', '0000-00-00', '0000-00-00', '2', '1', 'Kebumen', NULL, '', '', '', '', '', 'Aktif', '', 'Mapel', '2024-02-03 16:11:18', '2024-02-03 16:11:18');

-- --------------------------------------------------------

--
-- Table structure for table `tb_isialumni`
--

CREATE TABLE `tb_isialumni` (
  `id` int UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL,
  `th_lulus` varchar(4) NOT NULL,
  `sma` varchar(100) DEFAULT NULL,
  `pt` varchar(100) NOT NULL,
  `instansi` varchar(100) NOT NULL,
  `alamatins` varchar(100) NOT NULL,
  `hp` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `kesan` text NOT NULL,
  `gambar` varchar(250) NOT NULL,
  `status` int NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tb_isialumni`
--

INSERT INTO `tb_isialumni` (`id`, `nama`, `th_lulus`, `sma`, `pt`, `instansi`, `alamatins`, `hp`, `email`, `alamat`, `kesan`, `gambar`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Dian', '2020', '', '', '', '', '', '', '', 'kesan', '1706952569_bced7c04673e3e81d6b1.png', 1, '2024-02-03 09:29:29', '2024-02-03 09:29:29'),
(2, 'Doni', '2020', '', '', '', '', '', '', '', 'kesan', '1706952619_16e75906e84647b25e87.png', 1, '2024-02-03 09:30:19', '2024-02-03 09:30:19'),
(3, 'Riyan', '2020', '', '', '', '', '', '', '', 'kesan', '', 1, '2024-02-03 09:30:30', '2024-02-03 09:30:30');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kalender`
--

CREATE TABLE `tb_kalender` (
  `id` int UNSIGNED NOT NULL,
  `kalender` varchar(250) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tb_kalender`
--

INSERT INTO `tb_kalender` (`id`, `kalender`, `created_at`, `updated_at`) VALUES
(1, '01_Kaldik_dan_Minggu_Efektif_-_Copy.pdf', '2024-02-02 08:53:56', '2024-02-02 08:53:56');

-- --------------------------------------------------------

--
-- Table structure for table `tb_karyawan`
--

CREATE TABLE `tb_karyawan` (
  `id` int UNSIGNED NOT NULL,
  `nip` varchar(25) NOT NULL,
  `duk` varchar(20) NOT NULL,
  `niplama` varchar(25) NOT NULL,
  `nuptk` varchar(25) NOT NULL,
  `nokarpeg` varchar(12) NOT NULL,
  `golruang` varchar(5) NOT NULL,
  `statuspeg` varchar(5) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tmp_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `tmt_cpns` date NOT NULL,
  `tmt_pns` date NOT NULL,
  `jk` char(1) NOT NULL,
  `agama` char(1) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `pt` varchar(60) DEFAULT NULL,
  `tingkat_pt` varchar(20) NOT NULL,
  `prodi` varchar(50) NOT NULL,
  `th_lulus` varchar(4) NOT NULL,
  `gambar` varchar(250) NOT NULL,
  `status` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tugas` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tb_karyawan`
--

INSERT INTO `tb_karyawan` (`id`, `nip`, `duk`, `niplama`, `nuptk`, `nokarpeg`, `golruang`, `statuspeg`, `nama`, `tmp_lahir`, `tgl_lahir`, `tmt_cpns`, `tmt_pns`, `jk`, `agama`, `alamat`, `pt`, `tingkat_pt`, `prodi`, `th_lulus`, `gambar`, `status`, `email`, `tugas`, `created_at`, `updated_at`) VALUES
(2, '', '', '', '', '', '-', 'GTT', 'Dani', 'Kebumen', '1990-10-10', '0000-00-00', '0000-00-00', '1', '1', '', NULL, '', '', '', '', 'Aktif', '', '', '2024-02-03 16:12:17', '2024-02-03 16:12:17');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kurikulum`
--

CREATE TABLE `tb_kurikulum` (
  `id_kurikulum` int UNSIGNED NOT NULL,
  `mapel` varchar(50) NOT NULL,
  `alokasi` int NOT NULL,
  `kelompok` varchar(5) NOT NULL,
  `no_urut` int NOT NULL,
  `is_active` int NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tb_kurikulum`
--

INSERT INTO `tb_kurikulum` (`id_kurikulum`, `mapel`, `alokasi`, `kelompok`, `no_urut`, `is_active`, `created_at`, `updated_at`) VALUES
(2, 'Al-qur&#039;an Hadist', 4, 'A', 1, 1, '2024-02-03 16:14:50', '2024-02-03 16:14:50'),
(3, 'Akidah Akhlak', 4, 'A', 2, 1, '2024-02-03 16:15:04', '2024-02-03 16:15:04'),
(4, 'Fiqih', 2, 'A', 3, 1, '2024-02-03 16:15:15', '2024-02-03 16:15:15'),
(5, 'Sejarah Kebudayaan Islam', 2, 'A', 4, 1, '2024-02-03 16:15:24', '2024-02-03 16:15:24'),
(6, 'Pendidikan Pancasila dan Kewarganegaraan', 2, 'A', 5, 1, '2024-02-03 16:15:41', '2024-02-03 16:15:41'),
(7, 'Bahasa Indonesia', 4, 'A', 6, 1, '2024-02-03 16:15:54', '2024-02-03 16:15:54'),
(8, 'Bahasa Arab', 4, 'A', 7, 1, '2024-02-03 16:16:06', '2024-02-03 16:16:06');

-- --------------------------------------------------------

--
-- Table structure for table `tb_link`
--

CREATE TABLE `tb_link` (
  `id` int UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL,
  `link` text NOT NULL,
  `is_active` int NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tb_link`
--

INSERT INTO `tb_link` (`id`, `nama`, `link`, `is_active`, `created_at`, `updated_at`) VALUES
(5, 'HALAMAN PPDB', 'https://ppdb.mtsn1kebumen.sch.id/home', 1, '2024-02-03 11:10:08', '2024-02-03 11:10:08'),
(6, 'E-Learning MTs N 1 Kebumen', 'http://elearning.mtsn1kebumen.sch.id/', 1, '2024-02-03 11:10:44', '2024-02-03 11:10:44'),
(7, 'Buku Digital Madrasah', 'https://madrasah2.kemenag.go.id/buku/', 1, '2024-02-03 11:10:59', '2024-02-03 11:10:59'),
(8, 'Perpustakaan Digital MTs N 1 Kebumen', 'http://pustaka.mtsn1kebumen.sch.id/', 1, '2024-02-03 11:11:10', '2024-02-03 11:11:10');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengaduan`
--

CREATE TABLE `tb_pengaduan` (
  `id` int UNSIGNED NOT NULL,
  `nama` varchar(50) NOT NULL,
  `status` int NOT NULL,
  `isi` text NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tb_pengaduan`
--

INSERT INTO `tb_pengaduan` (`id`, `nama`, `status`, `isi`, `created_at`, `updated_at`) VALUES
(1, 'Sarwan', 3, 'tes pengaduan', '2024-02-03 09:32:23', '2024-02-03 09:32:23');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengumuman`
--

CREATE TABLE `tb_pengumuman` (
  `id` int UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(250) NOT NULL,
  `dibaca` int NOT NULL,
  `id_user` int NOT NULL,
  `is_active` int NOT NULL,
  `hari` varchar(10) NOT NULL,
  `tgl` date NOT NULL,
  `slug` varchar(150) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tb_pengumuman`
--

INSERT INTO `tb_pengumuman` (`id`, `nama`, `isi`, `gambar`, `dibaca`, `id_user`, `is_active`, `hari`, `tgl`, `slug`, `created_at`, `updated_at`) VALUES
(3, 'INFO LOWONGAN KERJA PUSTAKAWAN DAN SATPAM (SECURITY)', '&lt;p&gt;Assalamu&#039;alaikum Wr. Wb.&lt;/p&gt;&lt;p&gt;Dibuka lowongan pekerjaan di Madrasah Tsanawiyah Negeri 1 Kebumen sebagai tenaga :&lt;/p&gt;&lt;ol&gt;&lt;li&gt;Satpam sebanyak 2 (dua) orang&lt;/li&gt;&lt;li&gt;Pustakawan sebanyak 2 (dua) orang&lt;/li&gt;&lt;/ol&gt;&lt;p&gt;A. PERSYARATAN UMUM&lt;/p&gt;&lt;ol&gt;&lt;li&gt;Beragama Islam&lt;/li&gt;&lt;li&gt;Warga Negara Indonesia&lt;/li&gt;&lt;li&gt;Tanggungjawab dan Berkelakuan Baik&lt;/li&gt;&lt;li&gt;Sehat Jasmani dan Rohani&lt;/li&gt;&lt;li&gt;Bisa Baca Al Qur&#039;an dengan baik&lt;/li&gt;&lt;li&gt;Menyertakan Daftar Riwayat Hidup&lt;/li&gt;&lt;li&gt;Menyertakan Lamaran Pekerjaan&lt;/li&gt;&lt;li&gt;Menyertakan Pengalaman Kerja&lt;/li&gt;&lt;li&gt;Menyertakan Pas Photo berwarna ukuran 3x4 atau 4x6 sebanyak 2 (dua) lembar&lt;/li&gt;&lt;li&gt;menyertakan KTP yang masih berlaku&lt;/li&gt;&lt;li&gt;Usia Maksimal 28 tahun pada 31 Desember 2021&lt;/li&gt;&lt;/ol&gt;&lt;p&gt;B. PERSYARATAN KHUSUS&lt;/p&gt;&lt;p&gt;&lt;span&gt;1. SATPAM&lt;/span&gt;&lt;/p&gt;&lt;ul&gt;&lt;li&gt;Jujur&lt;/li&gt;&lt;li&gt;Disiplin&lt;/li&gt;&lt;li&gt;Terampil&lt;/li&gt;&lt;li&gt;memiliki ijazah minimal SLTA&lt;/li&gt;&lt;li&gt;Dapat mengatur lalu lintas&lt;/li&gt;&lt;li&gt;Memiliki sertifikat pelatihan satpam&lt;/li&gt;&lt;/ul&gt;&lt;p&gt;2. TENAGA PUSTAKAWAN&lt;/p&gt;&lt;ul&gt;&lt;li&gt;Jujur&lt;/li&gt;&lt;li&gt;Disiplin&lt;/li&gt;&lt;li&gt;Terampil&lt;/li&gt;&lt;li&gt;Ijazah minimal S1 sesuai bidangnya&lt;/li&gt;&lt;li&gt;Kompeten&lt;/li&gt;&lt;li&gt;Profesional&lt;/li&gt;&lt;li&gt;Menguasai IT&lt;/li&gt;&lt;li&gt;menguasai di bidang OPAC&lt;/li&gt;&lt;/ul&gt;&lt;p&gt;C.\r\n Berkas Lamaran dikirim via POS ke MTsN 1 Kebumen yang beralamat di Jl. \r\nTentara Pelajar No. 29 Kebumen 54312 paling lambat Rabu, 22 Desember \r\n2021 stempel POS&lt;/p&gt;&lt;p&gt;D. Bagi yang lolos berkas, wajib mengikuti tes tertulis dan wawancara&lt;/p&gt;&lt;p&gt;E. Tes Seleksi Tertulis dan wawancara pada hari Selasa 28 Desember 2021&lt;/p&gt;&lt;p&gt;F. Pengumuman hasil seleksi pada hari Rabu 29 Desember 2021&lt;/p&gt;&lt;p&gt;G. Keputusan akhir tidak bisa dipengaruhi pihak manapun&lt;/p&gt;&lt;p&gt;Wassalamu&#039;alaikum Wr. Wb. &lt;br&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;', '', 0, 1, 1, 'Sabtu', '2024-02-03', 'info-lowongan-kerja-pustakawan-dan-satpam-security', '2024-02-03 11:38:06', '2024-02-03 11:38:06'),
(4, 'PENGUMUMAN HASIL TES ONLINE PPDB PROGRAM IBS TAHUN PELAJARAN 2022/2023', '&lt;p&gt;Berikut kami sampaikan Pengumuman Hasil Tes Online PPDB Program \r\nIslamic Boarding School (IBS) Tahun Pelajaran 2022/2023, bisa diunduh \r\nmelalui link berikut ini :&lt;/p&gt;&lt;p&gt;&lt;a href=&quot;https://mtsn1kebumen.sch.id/download/hits/SK_Hasil_Tes_Online_IBS_20221.pdf&quot; target=&quot;_blank&quot;&gt;Klik di sini&lt;/a&gt;&lt;br&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;', '', 0, 1, 1, 'Sabtu', '2024-02-03', 'pengumuman-hasil-tes-online-ppdb-program-ibs-tahun-pelajaran-2022-2023', '2024-02-03 11:38:41', '2024-02-03 11:38:41'),
(5, 'PENGUMUMAN HASIL SELEKSI ADMINISTRASI PPDB PROGRAM FDS MTSN 1 KEBUMEN TP. 2022/2023', '&lt;p&gt;Berikut kami sampaikan Pengumuman Hasil Seleksi Administrasi PPDB \r\nProgram Full Day School (FDS) Tahun pelajaran 2022/2023, bisa diunduh \r\nmelalui link berikut ini : silahkan klik&amp;nbsp;&lt;a href=&quot;https://mtsn1kebumen.sch.id/download/hits/PENGUMUMAN_LOLOS_ADMINISTRASI_FDS1.PDF&quot; target=&quot;_blank&quot;&gt;di sini&lt;/a&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;', '', 0, 1, 1, 'Sabtu', '2024-02-03', 'pengumuman-hasil-seleksi-administrasi-ppdb-program-fds-mtsn-1-kebumen-tp-2022-2023', '2024-02-03 11:39:54', '2024-02-03 11:39:54'),
(6, 'INFO LOWONGAN PEKERJAAN TENAGA PENDIDIK MAPEL INFORMATIKA', '&lt;p&gt;Assalamu&#039;alaikum Wr. Wb.&lt;br&gt;&lt;/p&gt;&lt;p&gt;Dibutuhkan 1 (satu) Sarjana \r\nPendidikan Komputer untuk menjadi Tenaga Pendidik pada mata pelajaran \r\nInformatika di Madrasah Tsanawiyah Negeri 1 Kebumen dengan ketentuan \r\nsebagai berikut :&lt;/p&gt;&lt;p&gt;Persyaratan Umum :&lt;/p&gt;&lt;ol&gt;&lt;li&gt;Beragama Islam&lt;/li&gt;&lt;li&gt;Berdedikasi Tinggi&lt;/li&gt;&lt;li&gt;Disiplin&lt;/li&gt;&lt;li&gt;Jujur&lt;/li&gt;&lt;/ol&gt;&lt;p&gt;Persyaratan Khusus :&lt;/p&gt;&lt;ol&gt;&lt;li&gt;Mengajukan surat lamaran pekerjaan bermaterai&lt;/li&gt;&lt;li&gt;Melampirkan Ijazah S1 Sarjana Pendidikan Komputer&lt;/li&gt;&lt;li&gt;Melampirkan Transkip Nilai&lt;/li&gt;&lt;li&gt;Melampirkan Akta IV (bagi yang memiliki)&lt;/li&gt;&lt;li&gt;Melampirkan Pas Foto berwarna ukuran 3x4 sebanyak 2 buah&lt;/li&gt;&lt;li&gt;Melampirkan fotokopi KTP&lt;/li&gt;&lt;li&gt;Melampirkan fotokopi KK&lt;/li&gt;&lt;li&gt;Melampirkan Surat Keterangan/Kartu telah vaksin covid-19&lt;/li&gt;&lt;li&gt;Melampirkan Surat Pengalaman Kerja (bagi yang memiliki)&lt;/li&gt;&lt;li&gt;Melampirkan Sertifikat Pelatihan (bagi yang memiliki)&lt;/li&gt;&lt;li&gt;Menguasai Microsoft Office serta memiliki kemampuan pada aplikasi olah gambar dan video&lt;/li&gt;&lt;li&gt;Memiliki pengetahuan pengembangan website&lt;/li&gt;&lt;/ol&gt;&lt;p&gt;Berkas\r\n lamaran dapat diantar langsung ke MTsN 1 Kebumen yang beralamat di \r\nJalan Tentara Pelajar Nomor 29 Kebumen paling lambat hari Kamis, 23 Juni\r\n 2022 pukul 14.30 WIB atau via pos paling lambat tanggal 23 Juni 2022 \r\nCap Pos.&lt;/p&gt;&lt;p&gt;Pengumuman seleksi berkas pada hari Jum&#039;at, 24 Juni 2022 yang dapat dilihat di &lt;a href=&quot;https://mtsn1kebumen.sch.id/&quot; target=&quot;_blank&quot;&gt;https://mtsn1kebumen.sch.id/&lt;/a&gt;.&lt;a href=&quot;https://mtsn1kebumen.sch.id/&quot; target=&quot;_blank&quot;&gt;&lt;/a&gt;&lt;/p&gt;&lt;p&gt;Tes\r\n seleksi berupa Tes Tertulis, Wawancara, Micro Teaching, dan Praktek \r\nKomputer yang akan dilaksanakan di MTsN 1 Kebumen pada hari Sabtu, 25 \r\nJuni 2022.&lt;/p&gt;&lt;p&gt;Pengumuman Hasil Seleksi pada hari Selasa, 28 Juni 2022.&lt;/p&gt;&lt;p&gt;Demikian Pengumuman ini disampaikan.&lt;/p&gt;&lt;p&gt;Wassalamu&#039;alaikum Wr. Wb.&lt;/p&gt;&lt;p&gt;&lt;/p&gt;', '', 0, 1, 1, 'Sabtu', '2024-02-03', 'info-lowongan-pekerjaan-tenaga-pendidik-mapel-informatika', '2024-02-03 11:40:16', '2024-02-03 11:40:16'),
(7, 'PENGUMUMAN LELANG', '&lt;p&gt;Berikut&amp;nbsp; kami sampaikan Pengumuman Lelang :&lt;/p&gt;&lt;p class=&quot;MsoNormal&quot; align=&quot;center&quot;&gt;&lt;span lang=&quot;IN&quot;&gt;&lt;b&gt;PENGUMUMAN LELANG&lt;/b&gt;&lt;/span&gt;&lt;/p&gt;&lt;p class=&quot;MsoNormal&quot; align=&quot;center&quot;&gt;&lt;span lang=&quot;IN&quot;&gt;Nomor : 2753/Mts.11.&lt;/span&gt;&lt;span&gt;05&lt;/span&gt;&lt;span lang=&quot;IN&quot;&gt;.01/K&lt;/span&gt;&lt;span&gt;S&lt;/span&gt;&lt;span lang=&quot;IN&quot;&gt;.01&lt;/span&gt;&lt;span&gt;.4&lt;/span&gt;&lt;span lang=&quot;IN&quot;&gt;/10&lt;/span&gt;&lt;span&gt;/&lt;/span&gt;&lt;span lang=&quot;IN&quot;&gt;20&lt;/span&gt;&lt;span&gt;22&lt;/span&gt;&lt;span lang=&quot;IN&quot;&gt;&lt;/span&gt;&lt;/p&gt;&lt;p class=&quot;MsoNormal&quot;&gt;&lt;span lang=&quot;IN&quot;&gt;&amp;nbsp;&lt;/span&gt;&lt;span lang=&quot;IN&quot;&gt;Panitia lelang Madrasah Tsanawiyah Negeri 1 &lt;/span&gt;&lt;span&gt;Kebumen &lt;/span&gt;&lt;span lang=&quot;IN&quot;&gt;melalui Kantor Pelayanan Kekayaan Negara dan Lelang (KPKNL) &lt;/span&gt;&lt;span&gt;Purwokerto&lt;/span&gt;&lt;span lang=&quot;IN&quot;&gt; akan melelang Barang Milik Negara (BMN) &lt;/span&gt;&lt;span&gt;Non TBK, &lt;/span&gt;&lt;span lang=&quot;IN&quot;&gt;berdasarkan Surat &lt;/span&gt;&lt;span&gt;Kantor\r\nWilayah Kementerian Agama Prov. Jawa Tengah Tentang Persetujuan &lt;/span&gt;&lt;span lang=&quot;IN&quot;&gt;Penghapusan &lt;/span&gt;&lt;span&gt;BMN\r\nSelain Tanah, Bangunan dan Kendaraan Dengan Tindak Lanjut Penjualan Secara\r\nLelang pada &lt;/span&gt;&lt;span lang=&quot;IN&quot;&gt;Madrasah Tsanawiyah Negeri 1 Kebumen&lt;/span&gt;&lt;span lang=&quot;IN&quot;&gt; &lt;/span&gt;&lt;span lang=&quot;IN&quot;&gt;Nomor : &lt;/span&gt;&lt;span&gt;0&lt;/span&gt;&lt;span lang=&quot;IN&quot;&gt;8&lt;/span&gt;&lt;span&gt;.0&lt;/span&gt;&lt;span lang=&quot;IN&quot;&gt;01&lt;/span&gt;&lt;span&gt;/Kw.11.1/2/K&lt;/span&gt;&lt;span lang=&quot;IN&quot;&gt;S.&lt;/span&gt;&lt;span&gt;0&lt;/span&gt;&lt;span lang=&quot;IN&quot;&gt;1.6&lt;/span&gt;&lt;span&gt;/&lt;/span&gt;&lt;span lang=&quot;IN&quot;&gt;08&lt;/span&gt;&lt;span&gt;/2002\r\ntanggal 0&lt;/span&gt;&lt;span lang=&quot;IN&quot;&gt;8&lt;/span&gt;&lt;span lang=&quot;IN&quot;&gt; &lt;/span&gt;&lt;span lang=&quot;IN&quot;&gt;Agustus&lt;/span&gt;&lt;span&gt; 2022&lt;/span&gt;&lt;span lang=&quot;IN&quot;&gt;, berupa:&lt;/span&gt;&lt;/p&gt;&lt;table class=&quot;MsoTableGrid&quot; border=&quot;1&quot; cellspacing=&quot;0&quot; cellpadding=&quot;0&quot; width=&quot;625&quot;&gt;\r\n &lt;tbody&gt;&lt;tr&gt;\r\n  &lt;td width=&quot;31&quot; valign=&quot;top&quot;&gt;\r\n  &lt;p class=&quot;MsoNormal&quot; align=&quot;center&quot;&gt;&lt;span lang=&quot;IN&quot;&gt;No&lt;/span&gt;&lt;/p&gt;\r\n  &lt;/td&gt;\r\n  &lt;td width=&quot;347&quot; valign=&quot;top&quot;&gt;\r\n  &lt;p class=&quot;MsoNormal&quot; align=&quot;center&quot;&gt;&lt;span lang=&quot;IN&quot;&gt;Nama Barang&lt;/span&gt;&lt;/p&gt;\r\n  &lt;/td&gt;\r\n  &lt;td width=&quot;108&quot; valign=&quot;top&quot;&gt;\r\n  &lt;p class=&quot;MsoNormal&quot; align=&quot;center&quot;&gt;&lt;span lang=&quot;IN&quot;&gt;Harga Limit&lt;/span&gt;&lt;/p&gt;\r\n  &lt;/td&gt;\r\n  &lt;td width=&quot;96&quot; valign=&quot;top&quot;&gt;\r\n  &lt;p class=&quot;MsoNormal&quot; align=&quot;center&quot;&gt;&lt;span lang=&quot;IN&quot;&gt;Jaminan&lt;/span&gt;&lt;/p&gt;\r\n  &lt;/td&gt;\r\n  &lt;td width=&quot;42&quot; valign=&quot;top&quot;&gt;\r\n  &lt;p class=&quot;MsoNormal&quot; align=&quot;center&quot;&gt;&lt;span lang=&quot;IN&quot;&gt;Ket.&lt;/span&gt;&lt;/p&gt;\r\n  &lt;/td&gt;\r\n &lt;/tr&gt;\r\n &lt;tr&gt;\r\n  &lt;td width=&quot;31&quot; valign=&quot;top&quot;&gt;\r\n  &lt;p class=&quot;MsoNormal&quot;&gt;&lt;span lang=&quot;IN&quot;&gt;1&lt;/span&gt;&lt;/p&gt;\r\n  &lt;/td&gt;\r\n  &lt;td width=&quot;347&quot; valign=&quot;top&quot;&gt;\r\n  &lt;p class=&quot;MsoNormal&quot;&gt;&lt;span&gt;1\r\n  (satu) paket barang inventaris yang berada di &lt;/span&gt;&lt;span lang=&quot;IN&quot;&gt;Madrasah Tsanawiyah Negeri 1 Kebumen&lt;/span&gt;&lt;span&gt; d.a Jalan &lt;/span&gt;&lt;span lang=&quot;IN&quot;&gt;Tentara Pelajar&lt;/span&gt;&lt;span&gt;\r\n  Nomor &lt;/span&gt;&lt;span lang=&quot;IN&quot;&gt;29&lt;/span&gt;&lt;span&gt; Kebumen Jawa Tengah.&lt;/span&gt;&lt;span&gt; &lt;span lang=&quot;IN&quot;&gt;&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;\r\n  &lt;/td&gt;\r\n  &lt;td width=&quot;108&quot;&gt;\r\n  &lt;p class=&quot;MsoNormal&quot; align=&quot;center&quot;&gt;&lt;span lang=&quot;IN&quot;&gt;Rp. &lt;/span&gt;&lt;span&gt;1.&lt;/span&gt;&lt;span lang=&quot;IN&quot;&gt;578&lt;/span&gt;&lt;span&gt;.&lt;/span&gt;&lt;span lang=&quot;IN&quot;&gt;75&lt;/span&gt;&lt;span&gt;0&lt;/span&gt;&lt;span lang=&quot;IN&quot;&gt;,-&lt;/span&gt;&lt;/p&gt;\r\n  &lt;/td&gt;\r\n  &lt;td width=&quot;96&quot;&gt;\r\n  &lt;p class=&quot;MsoNormal&quot; align=&quot;center&quot;&gt;&lt;span lang=&quot;IN&quot;&gt;Rp. 7&lt;/span&gt;&lt;span&gt;00.000&lt;/span&gt;&lt;span lang=&quot;IN&quot;&gt;,-&lt;/span&gt;&lt;/p&gt;\r\n  &lt;/td&gt;\r\n  &lt;td width=&quot;42&quot; valign=&quot;top&quot;&gt;\r\n  &lt;p class=&quot;MsoNormal&quot;&gt;&lt;span lang=&quot;IN&quot;&gt;&amp;nbsp;&lt;/span&gt;&lt;/p&gt;\r\n  &lt;/td&gt;\r\n &lt;/tr&gt;\r\n&lt;/tbody&gt;&lt;/table&gt;&lt;p class=&quot;MsoNormal&quot;&gt;&lt;b&gt;&lt;span lang=&quot;IN&quot;&gt;Pelaksanaan Lelang&lt;/span&gt;&lt;/b&gt;&lt;/p&gt;&lt;p class=&quot;MsoNormalCxSpMiddle&quot;&gt;&lt;span&gt;Waktu Pelaksanaan&lt;/span&gt;&lt;/p&gt;&lt;p class=&quot;MsoNormalCxSpMiddle&quot;&gt;&lt;span&gt;Hari/tanggal&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; :\r\nRabu, &lt;/span&gt;&lt;span lang=&quot;IN&quot;&gt;26&lt;/span&gt;&lt;span lang=&quot;IN&quot;&gt; &lt;/span&gt;&lt;span lang=&quot;IN&quot;&gt;Oktober&lt;/span&gt;&lt;span&gt; 2022&lt;/span&gt;&lt;/p&gt;&lt;p class=&quot;MsoNormalCxSpMiddle&quot;&gt;&lt;span&gt;Batas Akhir Penawaran&amp;nbsp; :\r\nPukul 1&lt;/span&gt;&lt;span lang=&quot;IN&quot;&gt;3&lt;/span&gt;&lt;span&gt;.&lt;/span&gt;&lt;span lang=&quot;IN&quot;&gt;3&lt;/span&gt;&lt;span&gt;0 waktu server lelang melalui internet\r\n(sesuai WIB)&lt;/span&gt;&lt;/p&gt;&lt;p class=&quot;MsoNormalCxSpMiddle&quot;&gt;&lt;span&gt;Alamat\r\nDomain&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; : https://&lt;/span&gt;&lt;a href=&quot;http://www.lelang.go.id/&quot;&gt;&lt;span&gt;www.lelang.go.id&lt;/span&gt;&lt;/a&gt;&lt;span&gt;&lt;/span&gt;&lt;/p&gt;&lt;p class=&quot;MsoNormalCxSpMiddle&quot;&gt;&lt;span&gt;Tempat\r\nLelang&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; : &lt;/span&gt;&lt;span lang=&quot;FI&quot;&gt;KPKNL Purwokerto, Jalan Pahlawan No. 876 Purwokerto&lt;/span&gt;&lt;span&gt;&lt;/span&gt;&lt;/p&gt;&lt;p class=&quot;MsoNormalCxSpMiddle&quot;&gt;&lt;span lang=&quot;FI&quot;&gt;Penetapan\r\nPemenang&amp;nbsp;&amp;nbsp;&amp;nbsp; : setelah batas akhir\r\npenawaran.&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;/span&gt;&lt;/p&gt;&lt;p class=&quot;MsoNormalCxSpMiddle&quot;&gt;&lt;span&gt;&lt;br&gt;&lt;/span&gt;&lt;/p&gt;&lt;p class=&quot;MsoNormalCxSpMiddle&quot;&gt;&lt;span&gt;Peserta\r\nlelang diharap menyesuaikan diri dengan penggunaan waktu &lt;/span&gt;&lt;i&gt;server&lt;/i&gt;&lt;span&gt; yang tertera pada alamat domain di atas.&lt;/span&gt;&lt;br&gt;&lt;/p&gt;&lt;p class=&quot;MsoNormalCxSpMiddle&quot;&gt;&lt;span lang=&quot;IN&quot;&gt;&amp;nbsp;&lt;/span&gt;&lt;b&gt;&lt;span lang=&quot;IN&quot;&gt;Persyaratan Lelang:&lt;/span&gt;&lt;/b&gt;&lt;/p&gt;&lt;p class=&quot;MsoNormal&quot;&gt;&lt;span&gt;1.&lt;span&gt;&amp;nbsp;&amp;nbsp;\r\n&lt;/span&gt;&lt;/span&gt;&lt;span&gt;Calon peserta lelang dapat melihat\r\nobyek lelang di lokasi sejak diumumkan.&lt;/span&gt;&lt;/p&gt;&lt;p class=&quot;MsoNormal&quot;&gt;&lt;i&gt;&lt;span&gt;2.&lt;span&gt;&amp;nbsp;&amp;nbsp;\r\n&lt;/span&gt;&lt;/span&gt;&lt;/i&gt;&lt;span&gt;Lelang\r\ndilaksanakan dengan penawaran melalui aplikasi lelang internet yang di akses\r\npada alamat domain : https://&lt;i&gt;www.lelang.go.id.&lt;u&gt;&lt;span&gt;&lt;/span&gt;&lt;/u&gt;&lt;/i&gt;&lt;/span&gt;&lt;/p&gt;&lt;p class=&quot;MsoNormal&quot;&gt;&lt;span&gt;3.&lt;span&gt;&amp;nbsp;&amp;nbsp; &lt;/span&gt;&lt;/span&gt;&lt;span&gt;Calon peserta lelang mendaftarkan diri&lt;/span&gt;&lt;span lang=&quot;IN&quot;&gt; pada &lt;/span&gt;&lt;span&gt;Aplikasi Lelang Internet alamat domain angka 2 &lt;/span&gt;&lt;span lang=&quot;IN&quot;&gt;di atas, kemudian&lt;/span&gt;&lt;span&gt; mengaktifkan akun &lt;/span&gt;&lt;span lang=&quot;IN&quot;&gt;dan &lt;/span&gt;&lt;span&gt;merekam (scan)\r\nKTP, NPWP (ekstensi file *.jpg,*.png), dan nomor rekening atas nama sendiri.&lt;/span&gt;&lt;/p&gt;&lt;p class=&quot;MsoNormal&quot;&gt;&lt;span&gt;Peserta\r\nyang bertindak sebagai kuasa badan usaha diwajibkan mengunggah surat kuasa\r\nnotariil, akta pendirian perusahaan dan perubahannya, NPWP perusahaan dalam\r\nsatu file.&lt;/span&gt;&lt;/p&gt;&lt;p class=&quot;MsoNormal&quot;&gt;&lt;span&gt;4.&lt;span&gt;&amp;nbsp;&amp;nbsp; &lt;/span&gt;&lt;/span&gt;&lt;span&gt;Jaminan\r\nPenawaran Lelang :&lt;/span&gt;&lt;/p&gt;&lt;p class=&quot;MsoNormal&quot;&gt;&lt;span&gt;a.&lt;span&gt;&amp;nbsp;&amp;nbsp;\r\n&lt;/span&gt;&lt;/span&gt;&lt;span&gt;Peserta Lelang diwajibkan menyetor uang\r\njaminan sesuai dengan pengumuman lelang disetor sekaligus (bukan dicicil) dan\r\nharus sudah efektif paling lambat 1 ( satu) hari sebelum pelaksanaan lelang;&lt;/span&gt;&lt;/p&gt;&lt;p class=&quot;MsoNormal&quot;&gt;&lt;span&gt;b.&lt;span&gt;&amp;nbsp;&amp;nbsp;\r\n&lt;/span&gt;&lt;/span&gt;&lt;span&gt;Uang&lt;span&gt; jaminan lelang disetorkan ke\r\nnomor Virtual Account (VA) peserta lelang, yang akan dikirimkan secara otomatis\r\ndari alamat domain di atas kepada akun peserta lelang.&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;&lt;p class=&quot;MsoNormal&quot;&gt;&lt;span&gt;5.&lt;span&gt;&amp;nbsp;&amp;nbsp;\r\n&lt;/span&gt;&lt;/span&gt;&lt;span lang=&quot;FI&quot;&gt;Penawaran&lt;/span&gt;&lt;span&gt;\r\nlelang dimulai dari nilai limit dan dapat diajukan berkali-kali sampai batas\r\nwaktu sebagaimana tersebut diatas.&lt;/span&gt;&lt;/p&gt;&lt;p class=&quot;MsoNormal&quot;&gt;&lt;span&gt;6.&lt;span&gt;&amp;nbsp;&amp;nbsp;\r\n&lt;/span&gt;&lt;/span&gt;&lt;span lang=&quot;FI&quot;&gt;Peserta lelang\r\nyang ditunjuk sebagai pemenang wajib melunasi pembayaran harga pokok lelang\r\nditambah bea lelang pembeli sebesar 2% paling lambat 5 (lima) hari kerja\r\nsetelah lelang, jika tidak maka pada hari kerja berikutnya pemenang dinyatakan\r\nwanprestasi, uang jaminan akan disetorkan seluruhnya ke Kas Negara&lt;/span&gt;&lt;span&gt;.&lt;/span&gt;&lt;/p&gt;&lt;p class=&quot;MsoNormal&quot;&gt;&lt;span&gt;7.&lt;span&gt;&amp;nbsp;&amp;nbsp;\r\n&lt;/span&gt;&lt;/span&gt;&lt;span&gt;Objek dilelang dalam kondisi apa adanya\r\ndengan segala konsekuensi biaya tertunggak atas objek lelang. Peserta lelang\r\ndianggap telah mengetahui kondisi objek lelang. Peserta &lt;/span&gt;&lt;span lang=&quot;FI&quot;&gt;lelang&lt;/span&gt;&lt;span&gt; tidak dapat menuntut ganti rugi\r\napabila lelang dibatalkan karena sesuatu hal sesuai peraturan perundangan yang berlaku.&lt;/span&gt;&lt;/p&gt;&lt;p class=&quot;MsoNormal&quot;&gt;&lt;span&gt;8.&lt;span&gt;&amp;nbsp;&amp;nbsp;\r\n&lt;/span&gt;&lt;/span&gt;&lt;span&gt;Informasi lebih lanjut tentang &lt;/span&gt;&lt;span lang=&quot;IN&quot;&gt;tata cara menawar/&lt;/span&gt;&lt;span&gt;persyaratan lelang, dapat\r\nmenghubungi &lt;/span&gt;&lt;span lang=&quot;IN&quot;&gt;Madrasah\r\nTsanawiyah Negeri 1 &lt;/span&gt;&lt;span lang=&quot;FI&quot;&gt;Kebumen &lt;/span&gt;&lt;span lang=&quot;IN&quot;&gt;(0287)381229 &lt;/span&gt;&lt;span&gt;atau KPKNL&lt;/span&gt;&lt;span lang=&quot;IN&quot;&gt; Purwokert&lt;/span&gt;&lt;span&gt;o &lt;/span&gt;&lt;span lang=&quot;FI&quot;&gt;Jln&lt;/span&gt;&lt;span&gt; Pahlawan Nomor 876 Purwokerto,\r\nTelepon (0281) 630454.&lt;/span&gt;&lt;/p&gt;&lt;p class=&quot;MsoNormal&quot;&gt;&lt;span lang=&quot;IN&quot;&gt;&amp;nbsp;&lt;/span&gt;&lt;/p&gt;&lt;p class=&quot;MsoNormal&quot;&gt;&lt;span lang=&quot;IN&quot;&gt;&amp;nbsp;&lt;/span&gt;&lt;/p&gt;&lt;table class=&quot;MsoTableGrid&quot; border=&quot;0&quot; cellspacing=&quot;0&quot; cellpadding=&quot;0&quot; align=&quot;left&quot;&gt;\r\n &lt;tbody&gt;&lt;tr&gt;\r\n  &lt;td width=&quot;284&quot; valign=&quot;top&quot;&gt;\r\n  &lt;p class=&quot;MsoNormal&quot; align=&quot;center&quot;&gt;&lt;span lang=&quot;IN&quot;&gt;&amp;nbsp;&lt;/span&gt;&lt;/p&gt;\r\n  &lt;/td&gt;\r\n  &lt;td width=&quot;328&quot; valign=&quot;top&quot;&gt;\r\n  &lt;p class=&quot;MsoNormal&quot; align=&quot;center&quot;&gt;&lt;span&gt;Kebumen,\r\n  &lt;/span&gt;&lt;span lang=&quot;IN&quot;&gt;19&lt;/span&gt;&lt;span lang=&quot;IN&quot;&gt; &lt;/span&gt;&lt;span lang=&quot;IN&quot;&gt;Oktober&lt;/span&gt;&lt;span&gt; 2022&lt;/span&gt;&lt;/p&gt;\r\n  &lt;p class=&quot;MsoNormal&quot; align=&quot;center&quot;&gt;&lt;span&gt;&amp;nbsp;&lt;/span&gt;&lt;/p&gt;\r\n  &lt;/td&gt;\r\n &lt;/tr&gt;\r\n &lt;tr&gt;\r\n  &lt;td width=&quot;284&quot; valign=&quot;top&quot;&gt;\r\n  &lt;p class=&quot;MsoNormal&quot; align=&quot;center&quot;&gt;&lt;span lang=&quot;IN&quot;&gt;Mengetahui,&lt;/span&gt;&lt;/p&gt;\r\n  &lt;p class=&quot;MsoNormal&quot; align=&quot;center&quot;&gt;&lt;span lang=&quot;IN&quot;&gt;Kepala MTsN 1\r\n  Kebumen&lt;/span&gt;&lt;span&gt;&lt;/span&gt;&lt;/p&gt;\r\n  &lt;p class=&quot;MsoNormal&quot;&gt;&lt;span lang=&quot;IN&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;ttd dan stempel&lt;/span&gt;&lt;/p&gt;\r\n  &lt;p class=&quot;MsoNormal&quot;&gt;&lt;span&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&amp;nbsp;&lt;/span&gt;&lt;span&gt;Fitriana Aenun&lt;/span&gt;&lt;/p&gt;\r\n  &lt;/td&gt;\r\n  &lt;td width=&quot;328&quot; valign=&quot;top&quot;&gt;\r\n  &lt;p class=&quot;MsoNormal&quot; align=&quot;center&quot;&gt;&lt;span lang=&quot;IN&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;Panitia Lelang&lt;/span&gt;&lt;/p&gt;\r\n  &lt;p class=&quot;MsoNormal&quot; align=&quot;center&quot;&gt;&lt;span&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;Ketua,&lt;/span&gt;&lt;/p&gt;\r\n  &lt;p class=&quot;MsoNormal&quot; align=&quot;center&quot;&gt;&lt;span lang=&quot;IN&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; ttd&lt;/span&gt;&lt;/p&gt;\r\n  &lt;p class=&quot;MsoNormal&quot; align=&quot;center&quot;&gt;&lt;span&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;Sigit Achmadi&lt;/span&gt;&lt;br&gt;&lt;/p&gt;\r\n  &lt;/td&gt;\r\n &lt;/tr&gt;\r\n&lt;/tbody&gt;&lt;/table&gt;&lt;p&gt;\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n&lt;/p&gt;&lt;p class=&quot;MsoNormal&quot;&gt;&lt;span&gt;&lt;br clear=&quot;all&quot;&gt;\r\n&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;img data-filename=&quot;Lelang.jpg&quot;&gt;&lt;br&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;', '1706935261_ab48ee37d6669b76ab4c.jpg', 0, 1, 1, 'Sabtu', '2024-02-03', 'pengumuman-lelang', '2024-02-03 11:41:01', '2024-02-03 11:41:01'),
(8, 'Pengumuman Cap Tiga Jari Ijazah', '&lt;p&gt;Undangan untuk melakukan cap tiga jari di ijazah bagi almuni&amp;nbsp; Matansa TP 2021/2022&lt;/p&gt;&lt;p&gt;&lt;/p&gt;', '1706935303_2a775c87b74d27c5e0ae.jpg', 0, 1, 1, 'Sabtu', '2024-02-03', 'pengumuman-cap-tiga-jari-ijazah', '2024-02-03 11:41:43', '2024-02-03 11:41:43'),
(9, 'Prestasi Kementerian Agama Tahun 2022', '&lt;p&gt;Prestasi Kementerian Agama Tahun 2022&lt;br&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;', '1706935465_dfd89211b3ff6738afe8.jpeg', 0, 1, 1, 'Sabtu', '2024-02-03', 'prestasi-kementerian-agama-tahun-2022', '2024-02-03 11:44:25', '2024-02-03 11:44:25'),
(10, 'Kementerian Agama Republik Indonesia', '&lt;p&gt;Kementerian Agama Republik Indonesia&lt;br&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;', '1706935506_40357483e5260c658371.jpeg', 0, 1, 1, 'Sabtu', '2024-02-03', 'kementerian-agama-republik-indonesia', '2024-02-03 11:45:06', '2024-02-03 11:45:06'),
(11, 'PENGUMUMAN LELANG KENDARAAN BERMOTOR RODA DUA', '&lt;p&gt;Lelang barang 1 unit kendaraan dinas roda dua yang berada di MTs \r\nNegeri 1 Kebumen d.a. Jalan Tentara Pelajar No. 29 Kebumen Jawa Tengah.&lt;/p&gt;&lt;p&gt;Waktu pelaksanaan, Rabu 7 Desember 2022.&lt;/p&gt;', '1706935601_2cdbff97f891c4dbe522.png', 2, 1, 1, 'Sabtu', '2024-02-03', 'pengumuman-lelang-kendaraan-bermotor-roda-dua', '2024-02-03 11:45:28', '2024-02-03 11:46:41');

-- --------------------------------------------------------

--
-- Table structure for table `tb_prestasi_guru`
--

CREATE TABLE `tb_prestasi_guru` (
  `id` int UNSIGNED NOT NULL,
  `id_tahun` int NOT NULL,
  `nama` varchar(100) NOT NULL,
  `prestasi` varchar(100) NOT NULL,
  `nama_guru` varchar(100) DEFAULT NULL,
  `tingkat` int NOT NULL,
  `jenis` int NOT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `gambar` varchar(250) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `tb_prestasi_sekolah`
--

CREATE TABLE `tb_prestasi_sekolah` (
  `id` int UNSIGNED NOT NULL,
  `id_tahun` int NOT NULL,
  `nama` varchar(100) NOT NULL,
  `prestasi` varchar(100) NOT NULL,
  `tingkat` int NOT NULL,
  `jenis` int NOT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `gambar` varchar(250) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `tb_prestasi_siswa`
--

CREATE TABLE `tb_prestasi_siswa` (
  `id` int UNSIGNED NOT NULL,
  `id_tahun` int NOT NULL,
  `nama` varchar(100) NOT NULL,
  `prestasi` varchar(100) NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `kelas` varchar(6) DEFAULT NULL,
  `tingkat` int NOT NULL,
  `jenis` int NOT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `gambar` varchar(250) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `tb_profil`
--

CREATE TABLE `tb_profil` (
  `id` int UNSIGNED NOT NULL,
  `nama_web` varchar(100) NOT NULL,
  `jenjang` int NOT NULL,
  `logo_web` varchar(50) NOT NULL,
  `logo_admin` varchar(50) NOT NULL,
  `favicon` varchar(50) NOT NULL,
  `meta_description` varchar(300) NOT NULL,
  `meta_keyword` varchar(200) NOT NULL,
  `profil` text NOT NULL,
  `alamat` varchar(300) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `fax` varchar(20) NOT NULL,
  `whatsapp` varchar(20) NOT NULL,
  `akreditasi` varchar(5) NOT NULL,
  `kurikulum` varchar(30) NOT NULL,
  `file` varchar(250) NOT NULL,
  `nama_kepsek` varchar(100) NOT NULL,
  `nama_operator` varchar(100) NOT NULL,
  `instagram` varchar(200) NOT NULL,
  `facebook` varchar(200) NOT NULL,
  `twitter` varchar(200) NOT NULL,
  `youtube` varchar(200) NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tb_profil`
--

INSERT INTO `tb_profil` (`id`, `nama_web`, `jenjang`, `logo_web`, `logo_admin`, `favicon`, `meta_description`, `meta_keyword`, `profil`, `alamat`, `email`, `telp`, `fax`, `whatsapp`, `akreditasi`, `kurikulum`, `file`, `nama_kepsek`, `nama_operator`, `instagram`, `facebook`, `twitter`, `youtube`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 'MTs NEGERI 1 KEBUMEN', 3, '2e56bd06ca17f19408f45939dc9e9953.jpg', 'logo.png', '3c6b8a648930e0e721baedc7d4a7c345.ico', 'Selamat datang di website MTs NEGERI 1 KEBUMEN', 'MTs NEGERI 1 KEBUMEN', '', 'Jl. Tentara Pelajar No 29 Kebumen 54312', 'mtsnkebumen1@kemenag.go.id', '(0287) 381229', '-', '', 'A', 'Kurikulum 2013', ' ', 'Sugeng Warjoko, M.Ed', 'Administrator', 'https://www.instagram.com/mtsn1kebumen', 'https://web.facebook.com/profile.php?id=100067035564396', 'https://mobile.twitter.com/kebumen_1', 'https://www.youtube.com/channel/UCp_1yWIfzQ1i-tEW06BHhrA', '', '2024-02-02 09:03:14', '2024-02-03 15:48:31');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rekap_un`
--

CREATE TABLE `tb_rekap_un` (
  `id_un` int UNSIGNED NOT NULL,
  `id_kurikulum` int NOT NULL,
  `tertinggi` int NOT NULL,
  `terendah` int NOT NULL,
  `rata` int NOT NULL,
  `id_tahun` int NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `tb_rekap_us`
--

CREATE TABLE `tb_rekap_us` (
  `id_us` int UNSIGNED NOT NULL,
  `id_kurikulum` int NOT NULL,
  `tertinggi` int NOT NULL,
  `terendah` int NOT NULL,
  `rata` int NOT NULL,
  `id_tahun` int NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `tb_sarpras`
--

CREATE TABLE `tb_sarpras` (
  `id` int UNSIGNED NOT NULL,
  `isi` text NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `tb_sejarah`
--

CREATE TABLE `tb_sejarah` (
  `id` int UNSIGNED NOT NULL,
  `isi` text NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tb_sejarah`
--

INSERT INTO `tb_sejarah` (`id`, `isi`, `created_at`, `updated_at`) VALUES
(1, '<p class=\"MsoNormal\"><span>Pada tahun 1964 \r\nbeberapa tokoh masyarakat Kebumen pada waktu itu bersepakat untuk \r\nmendirikan sekolah lanjutan tingkat pertama (SLTP) yang bercirikan khas \r\nAgama Islam, maka jadilah musyawarah mufakat untuk mendirikan sekolah \r\nlanjutan tingkat pertama (SLTP) yang diberi nama Pendidikan Guru Agama \r\nPertama (PGAP) 4 tahun setingkat SLTP, yang terletak di Jalan Pahlawan \r\n21 Kebumen/sebelah selatan Alun-alun Kebumen.Adapun tokoh pendiri pada \r\nwaktu itu adalah sebagai berikut :</span></p><ol start=\"1\" type=\"1\"><li class=\"MsoNormal\"><span>Bapak KH. Sururuddin (almarhum)</span></li><li class=\"MsoNormal\"><span>Bapak H. Abu Nawas (almarhum)</span></li><li class=\"MsoNormal\"><span>Bapak Mohammad Irfa’ie</span></li><li class=\"MsoNormal\"><span>Bapak H. Tholib, B.A.</span></li><li class=\"MsoNormal\"><span>Bapak H. Fadlun Haryanto, B.A.</span></li></ol><p class=\"MsoNormal\"><span>Kemudian\r\n kelima tokoh tersebut bersepakat untuk memilih bapak H. Tholib, B.A. \r\nsebagai kepala PGAP 4 tahun. Pada saat itu siswa yang pertama sejumlah \r\n40 orang siswa, yakni 1 (satu) kelas. Kemudian pada tahun 1969 PGAP 4 \r\ntahun berubah menjadi Madrasah Tsanawiyah Agama Islam Negeri (MTsAIN) \r\nKebumen, namun PGAP 4 tahun juga masih ada, jadi SLTP berciri khas Islam\r\n ada 2 yakni PGAIP 4 tahun dan MTsAIN Kebumen. Adapun \r\nsebagai&nbsp;Direktur&nbsp;MTsAIN adalah Bapak Mohammad Irfa’ie. Kedua-duanya \r\nberjalan lancar walaupun satu berstatus negeri dan yang satunya swasta.</span></p><p class=\"MsoNormal\"><span>Kemudian\r\n pada tahun 1970 PGAIP 4 tahun berubah status menjadi PGAN 4 tahun. Jadi\r\n kedua-duanya berstatus negeri dengan SK Menteri Agama Nomor: 148 tahun \r\n1970 tanggal 22 Juli 1970. Kemudian pada tahun 1978 MTsAIN menjadi MTsN \r\nKebumen 1 dan PGAN 4 tahun berubah menjadi MTsN Kebumen 2.</span></p><p class=\"MsoNormal\"><span>Sampai sekarang ini, MTsN 1 Kebumen &nbsp;telah mengalami sepuluh kali pergantian kepala dengan urutan sebagai berikut :</span></p><ol start=\"1\" type=\"1\"><li class=\"MsoNormal\"><span>Tahun 1964-1969 Bapak H. Abunawas (almarhum)</span></li><li class=\"MsoNormal\"><span>Tahun 1969-1981 Bapak Mohammad Irfa’ie (almarhum).</span></li><li class=\"MsoNormal\"><span>Tahun 1981-1988 Bapak H. Tholib, B.A</span></li><li class=\"MsoNormal\"><span>Tahun 1988-1992 Bapak Chalimi, B.A.&nbsp;(almarhum).</span></li><li class=\"MsoNormal\"><span>Tahun 1992-1998 Bapak Drs. Mudasir Mas’ud.</span></li><li class=\"MsoNormal\"><span>Tahun 1998-2004 Ibu Dra. Hj. Juwairiyah.</span></li><li class=\"MsoNormal\"><span>Tahun 2004-2010 Bapak Drs. H. Moh. Dawamudin, M.Ag.</span></li><li class=\"MsoNormal\"><span>Tahun 2010 Bapak H. Djabir, M.Ag. (almarhum).</span></li><li class=\"MsoNormal\"><span>Tahun 2011-2013 Bapak Drs.H. Khoironi Hadi, M.Ed.</span></li><li class=\"MsoNormal\"><span>Tahun 2013 - 2018 Bapak Drs. H. Moh. Iskandar</span></li><li class=\"MsoNormal\"><span>Tahun 2018&nbsp; - 2021 (19 Januari 2021 ) Bapak Muhamad Siswanto, M.Pd.I</span></li><li class=\"MsoNormal\"><span>Tahun 2021 ( 19 Januari 2021) sampai dengan sekarang Bapak Sugeng Warjoko, M.Ed</span></li></ol><p class=\"MsoNormal\"><span>Berdasarkan\r\n surat keputusan Direktorat Jenderal Pembinaan Kelembagaan Agama Islam \r\nDepartemen Agama Nomor: E/242.A/99 tertanggal 2 Agustus 1999 Madrasah \r\nTsanawiyah Negeri (MTsN) Kebumen 1 telah diputuskan sebagai Madrasah \r\nTsanawiyah Negeri (MTsN) Model Kebumen 1.Nomenklatur MTsN Kebumen 1 \r\nkembali berubah sesuai Keputusan Menteri Agama no 810 tahun 2017 \r\ntertanggal 3 Oktober 2017 menjadi MTs Negeri 1 Kebumen.</span></p><p class=\"MsoNormal\"><span>Dalam\r\n perjalanannya, MTs Negeri1 Kebumen &nbsp;tumbuh dan berkembang pesat. \r\nFaktanya dari tahun ke tahun MTs Negeri Kebumen 1 selalu menolak calon \r\npeserta didik baru yang tidak sedikit jumlahnya karena keterbatasan \r\nfasilitas atau prasarana yang ada. Dari dokumentasi madrasah disebutkan \r\nbahwa pada tahun pelajaran 2015/2016 calon peserta didik baru yang \r\nditolak mencapai lebih dari 50% lebih dari jumlah pendaftar peserta \r\ndidik baru yang diterima. Hal ini menggambarkan betapa tingginya animo \r\nmasyarakat terhadap MTs Negeri 1 Kebumen .</span></p><p class=\"MsoNormal\"><span>Animo\r\n masyarakat yang semakin tinggi terhadap MTsN1 Kebumen &nbsp;direspon dengan \r\nmenambah daya tampung peserta didik.&nbsp;&nbsp;Jika &nbsp;sejak tahun pelajaran \r\n2007/2008 hingga 2016/2017 peserta didik yang ditampung &nbsp;24 kelas \r\n(masing-masing tingkatan 8 kelas), maka pada tahun 2017/2018 bertambah \r\nmenjadi 25 kelas. Pertumbuhan dan perkembangan MTs Negeri Kebumen&nbsp; 1 ini\r\n seiring dengan semakin meningkatnya sarana dan prasarana yang dimiliki.\r\n Tahun 2018/2019 MTsN1 Kebumen&nbsp;&nbsp; menambah 1 kelas&nbsp; menjadi 26 kelas, dan\r\n tahun 2019/2020 berjumlah 27 kelas ( masing masing 9 kelas ).</span></p><p class=\"MsoNormal\"><span>Animo\r\n masyarakat yang semakin tinggi tidak hanya sekedar kuantitas, namun \r\nkualitas peserta didik yang masuk juga menunjukkan peningkatan. Data \r\nmenunjukkan pada tahun 2015/2016 rata-rata UN yang masuk rata rata \r\n149,3. Pada tahun2016/2017 rata-rata UN peserta didik baru 259.&nbsp;Pada \r\ntahun 2017/2018 rata –&nbsp;rata UN peserta didik baru yang diterima 244 dan \r\nrata –&nbsp;rata UN peserta didik baru pada tahun 2018/2019 sebesar 213,9. \r\nSedangkan pada tahun 2019/202020&nbsp;rata –&nbsp;rata UN peserta didik baru yang \r\nditerima&nbsp;199,7</span></p><p class=\"MsoNormal\"><span>Di\r\n sisi lain, prestasi akademik peserta didik dari tahun ke tahun selalu \r\nmeningkat. Faktanya. &nbsp;pada tahun 2014/2015 rata-rata nilai UN 8,57, \r\ntahun 2015/2016 rata rata nilai UN 86,08, dan tahun 2016/2017 nilai \r\nrata-rata UN 84,08 semuanya MTsN 1 Kebumen masuk pada peringkat 2 \r\nSMP/MTs se Kabupaten Kebumen. Prestasi yang membanggakan MTsN 1 Kebumen \r\nadalah meraih nilai rata-rata tertinggi SMP/MTs se Kabupaten Kebumen \r\npada Tahun 2018, dengan jumlah rata rata 329,51 dan nilai rata-rata&nbsp; \r\n82,38, mengalahkan SMPN favorit di Kabupaten Kebumen. Dan lebih \r\nmembanggakan lagi di Tahun 2019 meraih Jumlah &nbsp;nilai rata-rata UN \r\ntertinggi MTs Negeri se Indonesia, dan satu satunya MTs Negeri yang \r\nmasuk &nbsp;di&nbsp; 100 besar SMP/MTs peraih nilai rata-rata tertinggi di \r\nIndonesia.</span></p><p class=\"MsoNormal\"><span>Dari\r\n beberapa prestasi lain yang pernah diraih oleh MTs1 Negeri Kebumen \r\n&nbsp;meliputi kejuaraan bidang akademik dan non akademik. Data prestasi \r\nterakhir bidang akademik menunjukkan prestasi yang maksimal pada \r\nKompetisi Sains Madrasah tingkat Nasional bidang&nbsp;&nbsp;Fisika dan Biologi \r\nmeraih medali emas pada tahun 2011/2012. Dan MTs N 1 Kebumen telah \r\nmeraih juara kedua&nbsp;&nbsp;tingkat provinsi Jawa Tengah pada Kompetisi Sains \r\nMadrasah&nbsp;&nbsp;bidang matematika tahun 2011/2012 . Sedangkan tahun 2012/2013 \r\nMTs Negeri Kebumen 1 akan maju pada Kompetisi Sains Madrasah Bidang \r\nFisika pada tingkat Nasional.</span></p><p class=\"MsoNormal\"><span>Sampai\r\n dengan tahun pelajaran 2020/2021 ini MTs Negeri 1 Kebumen&nbsp; memiliki 55 \r\ntenaga pendidik dan 15 tenaga kependidikan. Dari seluruh tenaga pendidik\r\n tersebut yang sudah berkualifikasi S2 sebanyak&nbsp;5&nbsp;orang,&nbsp;&nbsp;berkualifikasi\r\n S1 sebanyak&nbsp;37&nbsp;orang, tenaga kependidikan S1 sebanyak 3 orang, \r\nberkualifikasi D3 2, lainya SLTA&nbsp;&nbsp;. Sementara ini tenaga pendidik yang \r\nsudah tersertifikasi sebagai pendidik profesional hampir 90%.</span></p><p></p>', '2024-02-02 08:48:01', '2024-02-03 15:55:41');

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `id` int UNSIGNED NOT NULL,
  `id_tahun` int NOT NULL,
  `jml1pa` int NOT NULL,
  `jml1pi` int NOT NULL,
  `jml2pa` int NOT NULL,
  `jml2pi` int NOT NULL,
  `jml3pa` int NOT NULL,
  `jml3pi` int NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tb_siswa`
--

INSERT INTO `tb_siswa` (`id`, `id_tahun`, `jml1pa`, `jml1pi`, `jml2pa`, `jml2pi`, `jml3pa`, `jml3pi`, `created_at`, `updated_at`) VALUES
(2, 3, 173, 173, 170, 170, 180, 180, '2024-02-03 13:35:38', '2024-02-03 13:37:47');

-- --------------------------------------------------------

--
-- Table structure for table `tb_statistik`
--

CREATE TABLE `tb_statistik` (
  `id` int NOT NULL,
  `ip` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `hits` int NOT NULL,
  `online` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tb_statistik`
--

INSERT INTO `tb_statistik` (`id`, `ip`, `tanggal`, `hits`, `online`) VALUES
(44618, '::1', '2024-02-03', 16, '1706960028');

-- --------------------------------------------------------

--
-- Table structure for table `tb_struktur_organisasi`
--

CREATE TABLE `tb_struktur_organisasi` (
  `id` int UNSIGNED NOT NULL,
  `isi` text NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tb_struktur_organisasi`
--

INSERT INTO `tb_struktur_organisasi` (`id`, `isi`, `created_at`, `updated_at`) VALUES
(1, '5bbd432ffbfb8798e5efb85e7703dc28.png', '2024-02-02 08:52:42', '2024-02-02 08:52:42');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tahun`
--

CREATE TABLE `tb_tahun` (
  `id_tahun` int UNSIGNED NOT NULL,
  `tahun` varchar(10) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tb_tahun`
--

INSERT INTO `tb_tahun` (`id_tahun`, `tahun`, `created_at`, `updated_at`) VALUES
(1, '2019/2020', '2024-02-03 13:34:03', '2024-02-03 13:34:03'),
(3, '2020/2021', '2024-02-03 13:34:24', '2024-02-03 13:36:33');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int UNSIGNED NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `level` varchar(10) NOT NULL,
  `is_active` int NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama`, `username`, `password`, `email`, `level`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', '$2y$10$zo/zQ1Z6HIKLLjcwBA0ueud/VdQpgT6JvAKLDxQNQBr5coPxBGqsW', 'admin@gmail.com', 'superadmin', 1, '2024-02-02 15:49:45', '2024-02-03 16:28:12');

-- --------------------------------------------------------

--
-- Table structure for table `tb_video`
--

CREATE TABLE `tb_video` (
  `id_video` int UNSIGNED NOT NULL,
  `judul` varchar(100) NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `link` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tb_video`
--

INSERT INTO `tb_video` (`id_video`, `judul`, `keterangan`, `link`, `created_at`, `updated_at`) VALUES
(2, 'PROFIL MADRASAH ADIWIYATA', '', '88etG3cM3PQ', '2024-02-03 16:26:02', '2024-02-03 16:26:02'),
(3, 'PROFIL PERPUSTAKAAN BAIT AL-ILMI MATANSA', '', 'ELRUH7Qi82w', '2024-02-03 18:24:13', '2024-02-03 18:24:13');

-- --------------------------------------------------------

--
-- Table structure for table `tb_visimisi`
--

CREATE TABLE `tb_visimisi` (
  `id` int UNSIGNED NOT NULL,
  `isi` text NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tb_visimisi`
--

INSERT INTO `tb_visimisi` (`id`, `isi`, `created_at`, `updated_at`) VALUES
(1, '<p><b><span>A.&nbsp;&nbsp;&nbsp;&nbsp;</span><span>Visi MTsN 1 Kebumen</span></b></p><p>&nbsp; &nbsp;<span>&nbsp;<span>Terwujudnya insan yang&nbsp;</span></span><span><b>Religius, Cerdas, Terampil, Unggul, dan Berwawasan Lingkungan (RESTU WALI)</b></span></p><p><span>&nbsp; &nbsp; Lingkungan belajar yang</span><span>&nbsp;<b>Asri, Indah, Kondusif, Bersih, Ramah, Sehat, dan Nyaman (ASIK BERSAMA)</b></span><br></p><p><b><span>B.&nbsp;&nbsp;&nbsp;&nbsp;</span><span>Misi MTsN 1 Kebumen</span></b></p><p>&nbsp;&nbsp;&nbsp;<span>&nbsp;<span>Misi MTsN 1 Kebumen adalah sebagai berikut :</span></span></p><ol><li><span>Menyiapkan\r\n generasi berakhlakul karimah, dan menguasai ilmu pengetahuan, \r\nteknologi, dan riset yang mampu mengaktualisasikan diri dalam \r\nbermasyarakat.</span></li><li><span>Membekali pengetahuan \r\nnilai-nilai ajaran islam sebagai pondasi untuk mengembangkan minat, \r\nbakat, dan potensi peserta didik agar menjadi pribadi yang tangguh dan \r\nmampu berkompetisi di tingkat lokal, nasional, maupun internasional.</span></li><li><span>Meningkatkan kompetensi dan profesionalitas pendidik dan tenaga kependidikan sesuai dengan tuntutan zaman.</span></li><li><span>Meningkatkan kualitas MTs Negeri 1 Kebumen sebagai madrasah unggulan dan agen perubahan (</span><i>agent of changes</i><span>)\r\n dalam pengembangan pembelajaran riset, sains, dan teknologi yang \r\nterintegrasi dengan nilai-nilai keislaman, serta berwawasan lingkungan.</span></li><li><span>Menjalin kemitraan yang harmonis dengan pemangku kepentingan (</span><i>stake holder</i><span>) untuk meningkatkan mutu madrasah.</span></li></ol><p></p>', '2024-02-02 08:51:11', '2024-02-03 15:56:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_agenda`
--
ALTER TABLE `tb_agenda`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_album`
--
ALTER TABLE `tb_album`
  ADD PRIMARY KEY (`id_album`);

--
-- Indexes for table `tb_alumni`
--
ALTER TABLE `tb_alumni`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_banner`
--
ALTER TABLE `tb_banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_berita`
--
ALTER TABLE `tb_berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_download`
--
ALTER TABLE `tb_download`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_ekstrakurikuler`
--
ALTER TABLE `tb_ekstrakurikuler`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_foto`
--
ALTER TABLE `tb_foto`
  ADD PRIMARY KEY (`id_foto`);

--
-- Indexes for table `tb_guru`
--
ALTER TABLE `tb_guru`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_isialumni`
--
ALTER TABLE `tb_isialumni`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kalender`
--
ALTER TABLE `tb_kalender`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kurikulum`
--
ALTER TABLE `tb_kurikulum`
  ADD PRIMARY KEY (`id_kurikulum`);

--
-- Indexes for table `tb_link`
--
ALTER TABLE `tb_link`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pengaduan`
--
ALTER TABLE `tb_pengaduan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pengumuman`
--
ALTER TABLE `tb_pengumuman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_prestasi_guru`
--
ALTER TABLE `tb_prestasi_guru`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_prestasi_sekolah`
--
ALTER TABLE `tb_prestasi_sekolah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_prestasi_siswa`
--
ALTER TABLE `tb_prestasi_siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_profil`
--
ALTER TABLE `tb_profil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_rekap_un`
--
ALTER TABLE `tb_rekap_un`
  ADD PRIMARY KEY (`id_un`);

--
-- Indexes for table `tb_rekap_us`
--
ALTER TABLE `tb_rekap_us`
  ADD PRIMARY KEY (`id_us`);

--
-- Indexes for table `tb_sarpras`
--
ALTER TABLE `tb_sarpras`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_sejarah`
--
ALTER TABLE `tb_sejarah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_statistik`
--
ALTER TABLE `tb_statistik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_struktur_organisasi`
--
ALTER TABLE `tb_struktur_organisasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_tahun`
--
ALTER TABLE `tb_tahun`
  ADD PRIMARY KEY (`id_tahun`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tb_video`
--
ALTER TABLE `tb_video`
  ADD PRIMARY KEY (`id_video`);

--
-- Indexes for table `tb_visimisi`
--
ALTER TABLE `tb_visimisi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tb_agenda`
--
ALTER TABLE `tb_agenda`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_album`
--
ALTER TABLE `tb_album`
  MODIFY `id_album` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_alumni`
--
ALTER TABLE `tb_alumni`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_banner`
--
ALTER TABLE `tb_banner`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_berita`
--
ALTER TABLE `tb_berita`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_download`
--
ALTER TABLE `tb_download`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_ekstrakurikuler`
--
ALTER TABLE `tb_ekstrakurikuler`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_foto`
--
ALTER TABLE `tb_foto`
  MODIFY `id_foto` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_guru`
--
ALTER TABLE `tb_guru`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_isialumni`
--
ALTER TABLE `tb_isialumni`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_kalender`
--
ALTER TABLE `tb_kalender`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_kurikulum`
--
ALTER TABLE `tb_kurikulum`
  MODIFY `id_kurikulum` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_link`
--
ALTER TABLE `tb_link`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_pengaduan`
--
ALTER TABLE `tb_pengaduan`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_pengumuman`
--
ALTER TABLE `tb_pengumuman`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_prestasi_guru`
--
ALTER TABLE `tb_prestasi_guru`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_prestasi_sekolah`
--
ALTER TABLE `tb_prestasi_sekolah`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_prestasi_siswa`
--
ALTER TABLE `tb_prestasi_siswa`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_profil`
--
ALTER TABLE `tb_profil`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_rekap_un`
--
ALTER TABLE `tb_rekap_un`
  MODIFY `id_un` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_rekap_us`
--
ALTER TABLE `tb_rekap_us`
  MODIFY `id_us` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_sarpras`
--
ALTER TABLE `tb_sarpras`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_sejarah`
--
ALTER TABLE `tb_sejarah`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_statistik`
--
ALTER TABLE `tb_statistik`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44619;

--
-- AUTO_INCREMENT for table `tb_struktur_organisasi`
--
ALTER TABLE `tb_struktur_organisasi`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_tahun`
--
ALTER TABLE `tb_tahun`
  MODIFY `id_tahun` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_video`
--
ALTER TABLE `tb_video`
  MODIFY `id_video` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_visimisi`
--
ALTER TABLE `tb_visimisi`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
