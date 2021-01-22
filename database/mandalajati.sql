-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2020 at 08:53 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mandalajati`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `tanggal_update` date NOT NULL,
  `isi` text NOT NULL,
  `penulis` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `anggota_keluarga`
--

CREATE TABLE `anggota_keluarga` (
  `id` int(11) NOT NULL,
  `input_by` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `Agama` varchar(50) NOT NULL,
  `jenis_pekerjaan` varchar(100) NOT NULL,
  `status_perkawinan` varchar(50) NOT NULL,
  `status_hub_keluarga` varchar(50) NOT NULL,
  `kewarganegaraan` varchar(50) NOT NULL,
  `no_passpor` varchar(50) NOT NULL,
  `no_kitap` varchar(50) NOT NULL,
  `nama_ayah` varchar(100) NOT NULL,
  `nama_ibu` varchar(100) NOT NULL,
  `pendidikan` varchar(50) NOT NULL,
  `id_data` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anggota_keluarga`
--

INSERT INTO `anggota_keluarga` (`id`, `input_by`, `nama`, `nik`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `Agama`, `jenis_pekerjaan`, `status_perkawinan`, `status_hub_keluarga`, `kewarganegaraan`, `no_passpor`, `no_kitap`, `nama_ayah`, `nama_ibu`, `pendidikan`, `id_data`) VALUES
(24, 'yufia', 'AAAAA', 'AAAAA', 'AAAA', '2021-11-11', 'Laki-laki', 'AAAAAA', 'AAAA', 'Tidak/Belum Kawin', 'Kepala Keluarga', 'WNI', '', '', 'AAAA', 'AAAA', 'Tidak/Blm Sekolah', 'IDKK1314262220'),
(25, 'yufia', 'BBBB', 'BBBB', 'BBBBB', '2020-11-11', 'Laki-laki', 'BBB', 'BBBB', 'Tidak/Belum Kawin', 'Anak', 'WNI', '', '', 'BBBBBBBB', 'BBBB', 'Tidak/Blm Sekolah', 'IDKK1314262220'),
(26, 'yufia', 'Yufia rusmalina', '3213012309', 'nganjuk', '1998-01-06', 'Perempuan', 'islam', 'Mahasiswa', 'Kawin', 'Istri', 'WNI', '', '', 'Bambang Suryadi', 'Sumiyati', 'Strata I', 'IDKK9129726220'),
(27, 'yufia', 'Saepul Anwar', '3202281311960003', 'sukabumi', '1996-12-11', 'Laki-laki', 'islam', 'Swasta', 'Kawin', 'Kepala Keluarga', 'WNI', '', '', 'Kartobi', 'Ebah', 'Strata I', 'IDKK9129726220'),
(46, 'sanwar', 'as', 'as', 'as', '1994-11-11', 'Laki-laki', 'asd', 'asd', 'Tidak/Belum Kawin', 'Kepala Keluarga', 'WNI', '', '', 'asd', 'asd', 'Tidak/Blm Sekolah', 'IDKK2731785975'),
(47, 'sanwar', 'asd', '12312', 'asd', '1994-12-12', 'Laki-laki', 'asd', 'asd', 'Tidak/Belum Kawin', 'Kepala Keluarga', 'WNI', '', '', 'asd', 'asd', 'Tidak/Blm Sekolah', 'IDKK2731785975');

-- --------------------------------------------------------

--
-- Table structure for table `buat_ektp`
--

CREATE TABLE `buat_ektp` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `nokk` varchar(20) NOT NULL,
  `tpt_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jns_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `pekerjaan` varchar(100) NOT NULL,
  `agama` varchar(100) NOT NULL,
  `status_kawin` enum('Kawin','Belum Kawin') NOT NULL,
  `alamat` varchar(500) NOT NULL,
  `kelurahan` varchar(50) NOT NULL,
  `pengantar_rt` varchar(1000) NOT NULL,
  `fc_kk` varchar(1000) NOT NULL,
  `pass_photo` varchar(1000) NOT NULL,
  `tanggal_input` datetime NOT NULL DEFAULT current_timestamp(),
  `status` enum('Baru','Diproses','Ditolak','Diterima') NOT NULL,
  `input_by` varchar(20) NOT NULL,
  `id_data` varchar(50) NOT NULL,
  `keterangan` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buat_ektp`
--

INSERT INTO `buat_ektp` (`id`, `nama`, `nik`, `nokk`, `tpt_lahir`, `tgl_lahir`, `jns_kelamin`, `pekerjaan`, `agama`, `status_kawin`, `alamat`, `kelurahan`, `pengantar_rt`, `fc_kk`, `pass_photo`, `tanggal_input`, `status`, `input_by`, `id_data`, `keterangan`) VALUES
(45, 'anwarudin', '1212121', '1212', 'asduaksd', '1996-11-13', 'Laki-Laki', 'sad', 'as', 'Kawin', 'as', 'Jatihandap', 'foto.jpeg', 'pass_photo.jpg', 'foto.jpeg', '0000-00-00 00:00:00', 'Baru', 'sanwar', 'EKTP085793168161', ''),
(69, 'tes', '231231231', '', '', '0000-00-00', 'Laki-Laki', '', '', 'Belum Kawin', '', 'Jatihandap', 'PENG6779722540', 'KK1186218526', 'PASS9938325890', '2020-11-22 10:03:56', 'Baru', 'yufia', '', ''),
(70, 'tesn ', '123', '123', '123', '1997-11-11', 'Laki-Laki', '123123', '123', 'Belum Kawin', '123', 'Jatihandap', 'PENG7509218047', 'KK3624212487', 'PASS1081145696', '2020-11-26 18:16:42', 'Baru', 'yufia', '', ''),
(71, 'Saepul Anwar', '3202281311960003', '1702829272829977', 'Sukabumi', '1996-12-11', 'Laki-Laki', 'Swasta', 'Islam', 'Belum Kawin', 'Jl Bango II No 34 Pondok Labu, Jakarta Selatan', 'Jatihandap', 'PENG1354436488', 'KK4390591579', 'PASS6499551678', '2020-11-26 18:26:38', 'Ditolak', 'yufia', '', 'Dokumen persyaratan masih belum lengkap'),
(72, 'Yufia Rusmalina', '3202281311960003', '5366356256245566', 'Nganjuk', '1998-01-06', 'Perempuan', 'Mahasiswa', 'Islam', 'Belum Kawin', 'Komp. Sayana Terrace Housea Pasirimpun', 'Pasirimpun', 'PENG4221507143', 'KK3802624745', 'PASS6400171389', '2020-11-26 18:34:39', 'Diterima', 'yufia', '', ''),
(73, 'Saepul Anwar', '3201181311960003', '2312312312312312', 'Sukabumi', '1996-12-11', 'Laki-Laki', 'Swasta', 'Islam', '', 'Jl Bango II No 34 Pondok Labu', '', 'PENG4073977357', 'KK4065166682', 'PASS7439635587', '2020-11-26 19:49:14', 'Ditolak', 'yufia', '', ''),
(74, 'saepul anwar', '3202281311960003', '', '', '0000-00-00', '', 'pelajar', '', '', 'tidak ada', '', '', 'KK8127312322', '', '2020-12-04 22:06:30', 'Baru', 'sanwar', 'IDKTP0', ''),
(75, 'tes', '3202281213123', '213123131231', 'sukabumi', '1996-11-13', 'Laki-Laki', 'pelajar', 'islam', 'Belum Kawin', 'tidak ada', 'Jatihandap', 'PENG6733026386', 'KK7725252520', 'PASS7134580038', '2020-12-05 09:18:07', 'Baru', 'sanwar', 'IDKTP8656603754', '');

-- --------------------------------------------------------

--
-- Table structure for table `buat_kk`
--

CREATE TABLE `buat_kk` (
  `id` int(11) NOT NULL,
  `status_kependudukan` varchar(50) NOT NULL,
  `asal_kecamatan` varchar(100) NOT NULL,
  `alasan` varchar(50) NOT NULL,
  `kelurahan` varchar(50) NOT NULL,
  `surat_pindah` varchar(1000) NOT NULL,
  `surat_izin_menetap` varchar(1000) NOT NULL,
  `surat_kehilangan` varchar(1000) NOT NULL,
  `pass_photo` varchar(1000) NOT NULL,
  `tanggal_input` date NOT NULL DEFAULT current_timestamp(),
  `input_by` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `keterangan` varchar(500) NOT NULL,
  `id_data` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buat_kk`
--

INSERT INTO `buat_kk` (`id`, `status_kependudukan`, `asal_kecamatan`, `alasan`, `kelurahan`, `surat_pindah`, `surat_izin_menetap`, `surat_kehilangan`, `pass_photo`, `tanggal_input`, `input_by`, `status`, `keterangan`, `id_data`) VALUES
(24, '', '', '', 'Jatihandap', 'SURP2590042945', 'SIMB1226219490', 'PENG8574850539', 'PASSF6750093897', '2020-11-26', 'yufia', 'Baru', '', 'IDKK1314262220'),
(25, 'penduduk', 'Mandalajati', 'buat baru', 'Pasirimpun', '', '', '', 'PASSF8450762667', '2020-11-26', 'yufia', 'Diterima', '', 'IDKK9129726220'),
(35, 'penduduk', 'Mandalajati', 'buat baru', 'Jatihandap', '', '', '', 'PASSF4830210469', '2020-12-05', 'sanwar', 'Baru', '', 'IDKK2731785975');

-- --------------------------------------------------------

--
-- Table structure for table `buat_saw`
--

CREATE TABLE `buat_saw` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nik` varchar(25) NOT NULL,
  `pekerjaan` varchar(100) NOT NULL,
  `alamat_ahli_waris` varchar(100) NOT NULL,
  `nama_saksi` varchar(100) NOT NULL,
  `ktp_ahli_waris` varchar(1000) NOT NULL,
  `kk_ahli_waris` varchar(1000) NOT NULL,
  `surat_kematian` varchar(1000) NOT NULL,
  `ktp_saksi` varchar(1000) NOT NULL,
  `tanggal_input` datetime NOT NULL DEFAULT current_timestamp(),
  `input_by` varchar(100) NOT NULL,
  `id_data` varchar(50) NOT NULL,
  `status` enum('Baru','Diproses','Ditolak','Diterima') NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buat_saw`
--

INSERT INTO `buat_saw` (`id`, `nama`, `nik`, `pekerjaan`, `alamat_ahli_waris`, `nama_saksi`, `ktp_ahli_waris`, `kk_ahli_waris`, `surat_kematian`, `ktp_saksi`, `tanggal_input`, `input_by`, `id_data`, `status`, `keterangan`) VALUES
(1, 'Saepul Anwar2', '3202281311960003', 'pelajhar', 'tidak ada', 'tidaka d', 'KTPA3718604657', 'KKA2666374988', 'SUK4077194476', 'KTPS5721485765', '2020-12-04 22:08:14', 'sanwar', 'IDKTP0', 'Ditolak', 'tes lagi'),
(2, 'Saepul anwar4', '3202281311960003', 'peljar', 'tidak ada', 'taidak ada', 'KTPA8329216492', 'KKA3139283084', 'SUK2681769455', 'KTPS5970507229', '2020-12-04 22:11:12', 'sanwar', 'IDKTP8822204655', 'Baru', '');

-- --------------------------------------------------------

--
-- Table structure for table `buat_sim`
--

CREATE TABLE `buat_sim` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `pekerjaan` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `fc_ktp` varchar(1000) NOT NULL,
  `fc_kk` varchar(1000) NOT NULL,
  `surat_pindah` varchar(1000) NOT NULL,
  `surat_jaminan` varchar(1000) NOT NULL,
  `tanggal_input` datetime NOT NULL DEFAULT current_timestamp(),
  `input_by` varchar(100) NOT NULL,
  `status` enum('Baru','Diproses','Ditolak','Diterima') NOT NULL,
  `keterangan` text NOT NULL,
  `id_data` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buat_sim`
--

INSERT INTO `buat_sim` (`id`, `nama`, `nik`, `pekerjaan`, `alamat`, `fc_ktp`, `fc_kk`, `surat_pindah`, `surat_jaminan`, `tanggal_input`, `input_by`, `status`, `keterangan`, `id_data`) VALUES
(1, 'saepul anwar anjay', '3213123123123', 'tai', 'anjing', 'FKTP7369277565', 'FKK3761490244', 'SPKA3218958824', 'SJBT6283704237', '2020-12-09 09:41:23', 'sanwar', 'Ditolak', 'bodo amat', 'IDKTP2465469118');

-- --------------------------------------------------------

--
-- Table structure for table `buat_skck`
--

CREATE TABLE `buat_skck` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `nokk` varchar(20) NOT NULL,
  `tpt_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jns_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `pekerjaan` varchar(100) NOT NULL,
  `agama` varchar(100) NOT NULL,
  `alamat` varchar(500) NOT NULL,
  `keperluan` varchar(50) NOT NULL,
  `pengantar_rt` varchar(1000) NOT NULL,
  `fc_kk` varchar(1000) NOT NULL,
  `fc_ktp` varchar(1000) NOT NULL,
  `pass_photo` varchar(1000) NOT NULL,
  `tanggal_input` datetime NOT NULL DEFAULT current_timestamp(),
  `status` enum('Baru','Diproses','Ditolak','Diterima') NOT NULL,
  `input_by` varchar(20) NOT NULL,
  `keterangan` varchar(500) NOT NULL,
  `id_data` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buat_skck`
--

INSERT INTO `buat_skck` (`id`, `nama`, `nik`, `nokk`, `tpt_lahir`, `tgl_lahir`, `jns_kelamin`, `pekerjaan`, `agama`, `alamat`, `keperluan`, `pengantar_rt`, `fc_kk`, `fc_ktp`, `pass_photo`, `tanggal_input`, `status`, `input_by`, `keterangan`, `id_data`) VALUES
(1, 'Saepul Anwar2', '3202281311960003', '90909099090090909', 'sukabumi', '1996-11-13', 'Laki-Laki', 'swasta', 'islam', 'Jl Bango II No 34 Pondok Labu', 'Bekerja', 'PENG7229740675', 'KK4475126229', 'KTP2764263826', 'PASS9793703202', '2020-11-26 19:57:28', 'Diproses', 'yufia', '', ''),
(2, 'Saepul Anwar2', '3202281311960003', '312312312312783', 'sukabumi', '1996-11-13', 'Laki-Laki', 'swasta', 'islam', 'jl bangka 2', 'bekerja', 'PENG8742892470', 'KK6840532773', 'KTP7180300863', 'PASS2312147423', '2020-12-01 21:26:54', 'Baru', 'sanwar', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `buat_spk`
--

CREATE TABLE `buat_spk` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `pekerjaan` varchar(100) NOT NULL,
  `alamat_asal` varchar(100) NOT NULL,
  `alamat_tujuan` varchar(100) NOT NULL,
  `fc_kk` varchar(1000) NOT NULL,
  `fc_ktp` varchar(1000) NOT NULL,
  `surat_pengantar` varchar(1000) NOT NULL,
  `input_by` varchar(100) NOT NULL,
  `tanggal_input` datetime NOT NULL DEFAULT current_timestamp(),
  `id_data` varchar(100) NOT NULL,
  `status` enum('Baru','Diproses','Ditolak','Diterima') NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buat_spk`
--

INSERT INTO `buat_spk` (`id`, `nama`, `nik`, `pekerjaan`, `alamat_asal`, `alamat_tujuan`, `fc_kk`, `fc_ktp`, `surat_pengantar`, `input_by`, `tanggal_input`, `id_data`, `status`, `keterangan`) VALUES
(1, 'tai2', '8481', 'babi', 'tai', 'anjing', 'FKK8759466429', 'FKTP2910643249', 'SPKA1944755257', 'sanwar', '2020-12-09 10:12:39', 'IDKTP3601991913', 'Ditolak', 'bodo amat');

-- --------------------------------------------------------

--
-- Table structure for table `buat_surat_domisili`
--

CREATE TABLE `buat_surat_domisili` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nama_perusahaan` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `ktp_pemilik` varchar(1000) NOT NULL,
  `surat_izin_tetangga` varchar(1000) NOT NULL,
  `sertifikat_tempat_usaha` varchar(1000) NOT NULL,
  `akta_notaris` varchar(1000) NOT NULL,
  `bukti_lunas_pbb` varchar(1000) NOT NULL,
  `pernyataan_pemilik_bangunan` varchar(1000) NOT NULL,
  `pernyataan_sumur_resapan` varchar(1000) NOT NULL,
  `tanggal_input` datetime NOT NULL DEFAULT current_timestamp(),
  `input_by` varchar(100) NOT NULL,
  `status` enum('Baru','Diproses','Ditolak','Diterima') NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `id_data` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buat_surat_domisili`
--

INSERT INTO `buat_surat_domisili` (`id`, `nama`, `nama_perusahaan`, `alamat`, `ktp_pemilik`, `surat_izin_tetangga`, `sertifikat_tempat_usaha`, `akta_notaris`, `bukti_lunas_pbb`, `pernyataan_pemilik_bangunan`, `pernyataan_sumur_resapan`, `tanggal_input`, `input_by`, `status`, `keterangan`, `id_data`) VALUES
(3, 'ipul ipulan2', 'tidak ada', 'tidak ada', 'KTPA4171969356', 'SIT7522411891', 'STU8716740026', 'AKNO7218534886', 'BLP4436313835', 'PPB3991181164', 'PBMS4682812779', '2020-12-05 08:43:32', 'sanwar', 'Ditolak', '', 'IDDP1566001239');

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id_pengumuman` int(11) NOT NULL,
  `judul` varchar(500) NOT NULL,
  `isi` text NOT NULL,
  `penulis` varchar(100) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`id_pengumuman`, `judul`, `isi`, `penulis`, `tanggal`) VALUES
(3, 'Pemilu', '<p><strong>Pasangan calon presiden Prabowo Subianto-Sandiaga Uno menolak hasil penghitungan rekapitulasi KPU Pemilu 2019, sementara pasangan Joko Widodo-Ma&#39;ruf Amin mengucapkan terima kasih kepada rakyat Indonesia atas perhitungan rekapitulasi KPU.</strong></p>\r\n\r\n<p>Mereka mengutarakan hal itu di waktu hampir bersamaan, tetapi di lokasi yang berbeda di Jakarta, Selasa (21/05) siang.</p>\r\n\r\n<p>Di kediamannya, pasangan calon presiden Prabowo Subianto-Sandiaga Uno memutuskan untuk menempuh &quot;upaya hukum sesuai konstitusi&quot; setelah menolak hasil penghitungan rekapitulasi KPU terkait Pemilu 2019 karena dianggap dipenuhi kecurangan</p>\r\n\r\n<p>&quot;Kami tidak akan menerima hasil penghitungan suara yang dilakukan KPU selama penghitungan tersebut bersumber pada kecurangan,&quot; kata Prabowo Subianto dalam jumpa pers di kediamannya, Jakarta, Selasa (21/05).</p>\r\n\r\n<p>Pernyataan Prabowo ini disampaikan usai pihaknya menggelar rapat internal di kediamannya di Jalan Kertanegara, Jakarta Selatan, Selasa (21/05), menyikapi pengumuman KPU atashasil rekapitulasi nasional Pemilu 2019.</p>\r\n', 'Yufia Ndut', '2020-09-12'),
(4, 'Judul 2', '<p style=\"text-align:justify\">Di tempat terpisah, pasangan calon presiden dan calon wakil presiden nomor urut 01, Joko Widodo dan Ma&#39;ruf Amin, mengucapkan terima kasih kepada rakyat Indonesia atas hasil rekapitulasi pilpres yang menunjukkan keduanya menang atas paslon nomor urut 02, Prabowo Subianto-Sandiaga Uno.</p>\r\n\r\n<p style=\"text-align:justify\">Hal itu disampaikan Jokowi dalam jumpa pers di Kampung Deret, Tanah Tinggi, Johar Baru, Jakarta Pusat, Selasa (21/05).&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">&quot;Saya dan pak Kyai Haji Ma&#39;ruf Amin berterima kasih kepada rakyat Indonesia atas kepercayaan yang diberikan kepada kami berdua. Kepercayaan dan amanah yang diberikan kepada kami tersebut akan kami wujudkan dalam program pembangunan yang adil dan merata untuk seluruh golongan dan seluruh lapisan masyarakat di seluru pelosok tanah air Indonesia,&quot; kata Jokowi.</p>\r\n', 'Yufia Ndut', '2020-09-12'),
(5, 'Judul 3', '<p style=\"text-align:justify\">Di tempat terpisah, pasangan calon presiden dan calon wakil presiden nomor urut 01, Joko Widodo dan Ma&#39;ruf Amin, mengucapkan terima kasih kepada rakyat Indonesia atas hasil rekapitulasi pilpres yang menunjukkan keduanya menang atas paslon nomor urut 02, Prabowo Subianto-Sandiaga Uno.</p>\r\n\r\n<p style=\"text-align:justify\">Hal itu disampaikan Jokowi dalam jumpa pers di Kampung Deret, Tanah Tinggi, Johar Baru, Jakarta Pusat, Selasa (21/05).&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">&quot;Saya dan pak Kyai Haji Ma&#39;ruf Amin berterima kasih kepada rakyat Indonesia atas kepercayaan yang diberikan kepada kami berdua. Kepercayaan dan amanah yang diberikan kepada kami tersebut akan kami wujudkan dalam program pembangunan yang adil dan merata untuk seluruh golongan dan seluruh lapisan masyarakat di seluru pelosok tanah air Indonesia,&quot; kata Jokowi.</p>\r\n', 'Yufia Ndut', '2020-09-12'),
(10, '3 Penyebab Positif Covid-19 Kota Bandung Tinggi', '<p><strong>SUMUR BANDUNG, AYOBANDUNG.COM</strong>&nbsp;&ndash;&nbsp;<a href=\"https://ayobandung.com/tag/Wali%20Kota%20Bandung%20Oded%20M%20Danial\">Wali Kota Bandung Oded M Danial</a>&nbsp;menilai ada sejumlah hal yang menjadi penyebab kasus positif Covid-19 Kota Bandung tinggi.</p>\r\n\r\n<p>Pertama, penyebab kasus Covid-19 Kota Bandung tinggi adalah kepatuhan warga yang menurun dalam menjalankan protokol kesehatan.</p>\r\n\r\n<p>&quot;Faktor yang memengaruhi antara lain peningkatan kegiatan pelacakan dengan tes masif di berbagai tempat, juga pelaksanaan&nbsp;<em>tracing</em>&nbsp;dan&nbsp;<em>testing</em>,&quot; ungkap Oded di Balai Kota Bandung belum lama ini.</p>\r\n\r\n<p>&quot;Kepatuhan warga dalam menerapkan protokol kesehatan juga kian menurun,&quot; tuturnya.</p>\r\n\r\n<p>Kedua, menurutnya, libur panjang Maulid Nabi Muhammad SAW pada tiga pekan lalu ikut andil meningkatkan kasus positif Covid-19 di Kota Bandung. Saat itu banyak warga Bandung maupun wisatawan yang keluar-masuk wilayah kota.</p>\r\n\r\n<p>&quot;Dampak dari libur panjang menyebabkan banyak orang yang masuk dan keluar Kota Bandung. Aktivitas sosial dan ekonomi juga mulai dibuka sehingga menimbulkan tingginya interaksi dan pergerakan orang,&quot; ungkap Oded.</p>\r\n\r\n<p>Ketiga, Dia mengatakan, klaster keluarga adalah salah satu yang menyebabkan angka kasus positif Covid-19 di Kota Bandung terus bertambah. Klaster keluarga memiliki kaitan dengan tingginya aktivitas warga yang sudah kembali bekerja kantoran alih-alih WFH, dan pada gilirannya akan berdampak penularan Covid-19 pada orang serumah.</p>\r\n\r\n<p>&quot;Kasus dari klaster perkantoran dan tempat kerja meningkat, ini berdampak ada penularan di lingkungan keluarga,&quot; ungkapnya.</p>\r\n', 'admin', '2020-12-09');

-- --------------------------------------------------------

--
-- Table structure for table `petunjuk`
--

CREATE TABLE `petunjuk` (
  `tanggal_update` date NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `nokk` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `level` enum('user','admin') NOT NULL,
  `foto` varchar(1000) NOT NULL,
  `token` varchar(1000) NOT NULL,
  `aktif` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `nik`, `nokk`, `username`, `password`, `email`, `level`, `foto`, `token`, `aktif`) VALUES
(2, 'Yufia Ndut', '4537383738366', '4353453453434', 'yufia', '1234', 'rusmalinayufia@gmail.com', 'admin', 'pp.jfif', '', '1'),
(5, 'saepul anwar', '3202281311960003', '', 'sanwar', '1234', 'saepulanwar.ac@gmail.com', 'user', '2d38ccc2-f0d5-4c4c-90c8-b0f251d694ce.jfif', '', '1'),
(36, 'admin', '123456679', '', 'admin', '1234', 'saepulanwar.ac@gmail.com', 'admin', 'onvue.PNG', 'd5a9f0a1c6c1ab2b31bdd5b72832a7d1966cc9079f5f24910a61a860547c5947', '1'),
(38, 'satria', '123', '', 'satria', '123', 'satria@satria.com', 'user', 'Screenshot (1).png', '2076c3245ae22a7bf8d932cd7629cdc7c03daabb2fc3d7004b40ff0ea664cd4f', '1'),
(39, 'Nyoba', '415164161', '', 'sanwar1311', '1234', 'saepulanwar.ac@gmail.com', 'user', 'IMG_20201206_161629.jpg', '2076c3245ae22a7bf8d932cd7629cdc7c03daabb2fc3d7004b40ff0ea664cd4f', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota_keluarga`
--
ALTER TABLE `anggota_keluarga`
  ADD PRIMARY KEY (`id`),
  ADD KEY `input_by` (`input_by`),
  ADD KEY `id_data` (`id_data`);

--
-- Indexes for table `buat_ektp`
--
ALTER TABLE `buat_ektp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `input_by` (`input_by`),
  ADD KEY `input_by_2` (`input_by`);

--
-- Indexes for table `buat_kk`
--
ALTER TABLE `buat_kk`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_data` (`id_data`),
  ADD KEY `input_by` (`input_by`);

--
-- Indexes for table `buat_saw`
--
ALTER TABLE `buat_saw`
  ADD PRIMARY KEY (`id`),
  ADD KEY `input_by` (`input_by`);

--
-- Indexes for table `buat_sim`
--
ALTER TABLE `buat_sim`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buat_skck`
--
ALTER TABLE `buat_skck`
  ADD PRIMARY KEY (`id`),
  ADD KEY `input_by` (`input_by`);

--
-- Indexes for table `buat_spk`
--
ALTER TABLE `buat_spk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buat_surat_domisili`
--
ALTER TABLE `buat_surat_domisili`
  ADD PRIMARY KEY (`id`),
  ADD KEY `input_by` (`input_by`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id_pengumuman`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota_keluarga`
--
ALTER TABLE `anggota_keluarga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `buat_ektp`
--
ALTER TABLE `buat_ektp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `buat_kk`
--
ALTER TABLE `buat_kk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `buat_saw`
--
ALTER TABLE `buat_saw`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `buat_sim`
--
ALTER TABLE `buat_sim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `buat_skck`
--
ALTER TABLE `buat_skck`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `buat_spk`
--
ALTER TABLE `buat_spk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `buat_surat_domisili`
--
ALTER TABLE `buat_surat_domisili`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id_pengumuman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `anggota_keluarga`
--
ALTER TABLE `anggota_keluarga`
  ADD CONSTRAINT `anggota_keluarga_ibfk_1` FOREIGN KEY (`input_by`) REFERENCES `user` (`username`);

--
-- Constraints for table `buat_ektp`
--
ALTER TABLE `buat_ektp`
  ADD CONSTRAINT `buat_ektp_ibfk_1` FOREIGN KEY (`input_by`) REFERENCES `user` (`username`) ON DELETE CASCADE;

--
-- Constraints for table `buat_kk`
--
ALTER TABLE `buat_kk`
  ADD CONSTRAINT `buat_kk_ibfk_1` FOREIGN KEY (`input_by`) REFERENCES `user` (`username`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `buat_saw`
--
ALTER TABLE `buat_saw`
  ADD CONSTRAINT `buat_saw_ibfk_1` FOREIGN KEY (`input_by`) REFERENCES `user` (`username`);

--
-- Constraints for table `buat_skck`
--
ALTER TABLE `buat_skck`
  ADD CONSTRAINT `buat_skck_ibfk_1` FOREIGN KEY (`input_by`) REFERENCES `user` (`username`) ON DELETE CASCADE;

--
-- Constraints for table `buat_surat_domisili`
--
ALTER TABLE `buat_surat_domisili`
  ADD CONSTRAINT `buat_surat_domisili_ibfk_1` FOREIGN KEY (`input_by`) REFERENCES `user` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
