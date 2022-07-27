-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2022 at 01:01 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_simona`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggaran`
--

CREATE TABLE `anggaran` (
  `id` int(11) NOT NULL,
  `nama_kegiatan` varchar(125) NOT NULL,
  `jumlah_anggaran` int(255) NOT NULL,
  `sis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anggaran`
--

INSERT INTO `anggaran` (`id`, `nama_kegiatan`, `jumlah_anggaran`, `sis`) VALUES
(1, 'Terserap', 2500000, 0),
(2, 'Belum terserap', 5000000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `data_dukung`
--

CREATE TABLE `data_dukung` (
  `id` int(11) NOT NULL,
  `kode_subkomponen` varchar(125) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `nama_kegiatan` varchar(125) NOT NULL,
  `dokumen` varchar(255) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_dukung`
--

INSERT INTO `data_dukung` (`id`, `kode_subkomponen`, `kode`, `nama_kegiatan`, `dokumen`, `keterangan`, `status`) VALUES
(15, '', '002', 'kegiatan b', 'd29ada41483354e489d850bc6895369a.jpg', 'jjj', 'yes'),
(17, '', '521811', 'Belanja ATK', 'b54607aa715259e285ad30e6e433dd16.jpeg', 'test', 'yes'),
(18, '5211151', '5211151', 'Olahraga', 'bdfec1312ba9923a2fde9866be11e311.jpg', 'test', 'yes'),
(19, '5211152', '5211152', 'Pitnes', '3d190c6ff6a91c588cee8e2d53f355b1.jpg', '121212', 'yes'),
(21, 'K06', 'K06', 'kegiatan b', '964c64c1be1fe9122902d1cc621c41a4.jpg', 'lkl', 'yes'),
(22, '5231111', '5231111', 'Kegiatan  Lomba Antar Jurusan', '4d94860fb57a8d41a24c9b0c3b712fca.jpg', 'test', 'yes'),
(23, '5211151', '5211151', 'Olahraga', '91c0f5bbfd6d8c0168b084cb9223c596.jpg', 'test', 'yes'),
(24, '511125', '511125', 'Belanja Tunj. PPh PNS', '79f2f2be15e08f9876349ed0449fd456.jpeg', 'kuitansi', 'yes'),
(25, '51234', '51234', 'Belanja test', 'be6703d67a8bdee89cc2f5b3d7df1047.jpg', 'test', 'yes'),
(26, '5213345', '5213345', 'Workshop Kepegawaian', '246afea5db67b120c3eece616c5e1f6b.png', 'test', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `data_pengajuan`
--

CREATE TABLE `data_pengajuan` (
  `id` int(10) NOT NULL,
  `id_unit` varchar(12) NOT NULL,
  `kode_komponen` varchar(125) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `nama_kegiatan` varchar(100) NOT NULL,
  `penanggungjawab` varchar(100) NOT NULL,
  `tgl_kegiatan` varchar(25) NOT NULL,
  `status` varchar(25) NOT NULL,
  `tahun` varchar(24) NOT NULL,
  `status_lpj` int(11) NOT NULL,
  `terima_uang` int(11) NOT NULL,
  `id_tor` varchar(125) NOT NULL,
  `id_rab` varchar(125) NOT NULL,
  `id_pengajuan` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_pengajuan`
--

INSERT INTO `data_pengajuan` (`id`, `id_unit`, `kode_komponen`, `kode`, `nama_kegiatan`, `penanggungjawab`, `tgl_kegiatan`, `status`, `tahun`, `status_lpj`, `terima_uang`, `id_tor`, `id_rab`, `id_pengajuan`) VALUES
(0, '11', '', 'U001', 'Disnatalis', 'Pak didi', '22 Februari 2022', '3', '2020', 0, 0, '', '', ''),
(5, '13', '', 'P001', 'Perpanjang siakad', 'pak ayo', '22 Februari 2022', 'no', '2022', 0, 0, '', '', ''),
(6, '20', '', 'Z001', 'Test', 'Jeni', '22 April 2022', 'no', '2022', 0, 0, '', '', ''),
(9, '20', '', 'Z0012', 'Test2', 'Jeni', '22 April 2022', 'sp2d', '2022', 0, 0, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `data_pengajuan_thn`
--

CREATE TABLE `data_pengajuan_thn` (
  `id` int(11) NOT NULL,
  `id_unit` varchar(25) NOT NULL,
  `kode` varchar(25) NOT NULL,
  `komponen` varchar(255) NOT NULL,
  `nama_kegiatan` varchar(255) NOT NULL,
  `status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `data_pengajuan_validasi`
--

CREATE TABLE `data_pengajuan_validasi` (
  `id` int(11) NOT NULL,
  `id_unit` varchar(10) NOT NULL,
  `status_spp` varchar(25) NOT NULL,
  `status_spm` varchar(25) NOT NULL,
  `status_sp2d` varchar(25) NOT NULL,
  `kode` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `data_rka`
--

CREATE TABLE `data_rka` (
  `id` int(11) NOT NULL,
  `keterangan` varchar(125) NOT NULL,
  `dokumen` varchar(255) NOT NULL,
  `tahun` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_rka`
--

INSERT INTO `data_rka` (`id`, `keterangan`, `dokumen`, `tahun`, `status`) VALUES
(1, 'RKA 2022', '083cbc09c428d0007e6355a50fcd1594.pdf', '2022-07-19', 0),
(2, 'test', '278fb6c22e63f104089fbdec094205ac.pdf', '2022-07-15', 0),
(3, '2022', '764ec7daeca8f715dd38a1c447be770d.pdf', '2022-07-20', 0),
(4, 'PERIODE BARU COBA', 'ccc493730efebaa316f60d3f51dc1c83.pdf', '2022-07-22', 0),
(5, 'Januari', 'df13eab3250825dcaa87aed133928039.pdf', '2022-07-06', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dateline`
--

CREATE TABLE `dateline` (
  `id` int(11) NOT NULL,
  `kode` varchar(50) DEFAULT NULL,
  `periode` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='test';

--
-- Dumping data for table `dateline`
--

INSERT INTO `dateline` (`id`, `kode`, `periode`, `status`) VALUES
(6, 'PRD001', 'januari 2022', '1'),
(7, 'PRD002', 'pebruary 2022', '0');

-- --------------------------------------------------------

--
-- Table structure for table `disposisi`
--

CREATE TABLE `disposisi` (
  `id` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `perihal` varchar(255) NOT NULL,
  `kepada` varchar(125) NOT NULL,
  `intruksi` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `disposisi`
--

INSERT INTO `disposisi` (`id`, `tgl`, `perihal`, `kepada`, `intruksi`, `status`) VALUES
(2, '2022-06-30', 'Belanja ATK\r\n', 'Bagian Keuangan', 'segeraaa bro', 1),
(3, '2022-07-07', 'Pitnes', 'Bagian Keuangan', 'segera', 1),
(4, '2022-07-14', 'tese', 'Bagian Keuangan', 'segera', 1),
(5, '2022-07-24', 'Belanja Tunj. PPh PNS', 'Bagian Perencanaan', 'Segeraaa diproses', 1);

-- --------------------------------------------------------

--
-- Table structure for table `durasiotp`
--

CREATE TABLE `durasiotp` (
  `id` int(11) NOT NULL,
  `durasi` int(255) NOT NULL,
  `create_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `durasiotp`
--

INSERT INTO `durasiotp` (`id`, `durasi`, `create_at`) VALUES
(1, 120, '2022-06-04');

-- --------------------------------------------------------

--
-- Table structure for table `d_lpj`
--

CREATE TABLE `d_lpj` (
  `id` int(11) NOT NULL,
  `id_unit` varchar(25) NOT NULL,
  `kode` varchar(25) NOT NULL,
  `penggunaan_anggaran` varchar(125) NOT NULL,
  `biaya` varchar(125) NOT NULL,
  `status` varchar(25) NOT NULL,
  `bukti` varchar(125) NOT NULL,
  `komentar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `is_otp`
--

CREATE TABLE `is_otp` (
  `id` int(11) NOT NULL,
  `otp` varchar(4) NOT NULL,
  `kadaluarsa` date NOT NULL,
  `created_at` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `is_otp`
--

INSERT INTO `is_otp` (`id`, `otp`, `kadaluarsa`, `created_at`) VALUES
(1, '3497', '2022-07-30', '2022-07-08 08:24:45');

-- --------------------------------------------------------

--
-- Table structure for table `is_sp2d`
--

CREATE TABLE `is_sp2d` (
  `id` int(11) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `nama_kegiatan` varchar(125) NOT NULL,
  `dokumen` varchar(255) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `is_sp2d`
--

INSERT INTO `is_sp2d` (`id`, `kode`, `nama_kegiatan`, `dokumen`, `status`) VALUES
(1, 'P001', 'Perpanjang siakad', 'bfab4c8539eaf4b97a75951ddff962ba.pdf', 'yes'),
(2, 'U001', 'Disnatalis', '1d5694fc673bca960cc4ad39cda3ab62.pdf', 'yes'),
(3, 'P001', 'Perpanjang siakad', '13649c58e4605ffa9ee56c460e88d3b2.pdf', 'yes'),
(4, 'P001', 'Perpanjang siakad', '6dd09eaa37f5e58ec7c53a99ffa30943.pdf', 'yes'),
(5, 'Z001', 'Test', 'bc4e22f591aa46d021bbe483612dc8c3.pdf', 'yes'),
(6, 'P001', 'Perpanjang siakad', '98effc0ef78ac09cf82c09c1a0ad1332.pdf', 'yes'),
(7, 'U001', 'Disnatalis', 'bdfd1976aa550762c29f314cf4f16756.pdf', 'yes'),
(8, 'P001', 'Perpanjang siakad', 'a5e901ba3b00ed8ab801c93b58c68a80.pdf', 'yes'),
(9, 'U001', 'Disnatalis', 'c643486355a50655c78398b038877d49.pdf', 'yes'),
(10, 'U001', 'Disnatalis', '1b5529271f356d2d814631259d56ee32.pdf', 'yes'),
(11, 'U001', 'Disnatalis', 'b2a8694b5abc048a89a9401661db14fb.pdf', 'yes'),
(12, 'U001', 'Disnatalis', '88246718bb650c4cc74ae50e35a9d37f.pdf', 'yes'),
(13, 'U001', 'Disnatalis', '7608d7314610f65b366a83a458e586b4.pdf', 'yes'),
(14, 'U001', 'Disnatalis', 'e29a68ad755a2a360b935070f0f400fc.pdf', 'yes'),
(15, 'U001', 'Disnatalis', '6a4068eddce9a4bda4ecd56116b73533.pdf', 'yes'),
(16, 'U001', 'Disnatalis', 'fbc300f95a4897beb0eab102adea54a7.pdf', 'yes'),
(17, 'U001', 'Disnatalis', 'e9f859e36ccdbafa8d2997bdb24acbee.pdf', 'yes'),
(18, 'U001', 'Disnatalis', '22449ea970d2064ec8ec123011ab3aa2.pdf', 'yes'),
(19, 'U001', 'Disnatalis', '3c807ef6f1c10371c7e8df24a0451ed7.pdf', 'yes'),
(20, 'U001', 'Disnatalis', '964eb3692c7170c701654371c76382ff.pdf', 'yes'),
(21, 'U001', 'Disnatalis', '9a18127aee1f334e83d86eeaeb6c2d62.pdf', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `is_spm`
--

CREATE TABLE `is_spm` (
  `id` int(11) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `nama_kegiatan` varchar(125) NOT NULL,
  `dokumen` varchar(255) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `is_spm`
--

INSERT INTO `is_spm` (`id`, `kode`, `nama_kegiatan`, `dokumen`, `status`) VALUES
(7, 'P001', 'Perpanjang siakad', '1aa14003b08b41aa94b0ef4f286505d5.pdf', 'yes'),
(8, 'U001', 'Disnatalis', 'ebb14afc12702e237a6e0fe50f98da97.pdf', 'yes'),
(9, 'P001', 'Perpanjang siakad', '982ad614faae25c2bb587fe45114f42a.pdf', 'yes'),
(10, 'P001', 'Perpanjang siakad', '6bfdac22147fafd771c75e8130cbfa1b.pdf', 'yes'),
(11, 'Z001', 'Test', 'd8008ab7063bdaf8ac22a5f1d6463a76.pdf', 'yes'),
(12, 'P001', 'Perpanjang siakad', 'c7e13f9a5d88face0eaf80a3f06f90c3.pdf', 'yes'),
(13, 'U001', 'Disnatalis', '595511aa938d59ba3318e032ab81cd90.pdf', 'yes'),
(14, 'P001', 'Perpanjang siakad', 'c2fcc0dc28d7c81bd689ae9f808e8068.pdf', 'yes'),
(15, 'U001', 'Disnatalis', 'd6fece4f81d48514321712d73b15e16c.pdf', 'yes'),
(16, 'U001', 'Disnatalis', '28116362beb8ce0fc6e42fb198dfc23f.pdf', 'yes'),
(17, 'U001', 'Disnatalis', '0e12f34db10b20b87a757ae31a6bb097.pdf', 'yes'),
(18, 'U001', 'Disnatalis', '6458c4421ae016c804379a30c5028c48.pdf', 'yes'),
(19, 'U001', 'Disnatalis', '6f7f03c14de03eea6bf00c4dbbb69977.pdf', 'yes'),
(20, 'U001', 'Disnatalis', '1260db1a01232ea4341ef772c97dc989.pdf', 'yes'),
(21, 'U001', 'Disnatalis', 'f23fffb3937ebb718c243d576b58f928.jpg', 'yes'),
(22, 'U001', 'Disnatalis', 'a3426ed2d8b90e8ee6124b1648326623.pdf', 'yes'),
(23, 'U001', 'Disnatalis', 'b47f7b26d29b4558c45a5af420555cae.pdf', 'yes'),
(24, 'U001', 'Disnatalis', 'dc8f19ced4c2a43a719e11129fdeb0db.pdf', 'yes'),
(25, 'U001', 'Disnatalis', '5c09eb249d1cf424c7f3c8b735dfb21e.pdf', 'yes'),
(26, 'U001', 'Disnatalis', '7b38d9a7794b621b68f9100c67d7b0e6.pdf', 'yes'),
(27, 'U001', 'Disnatalis', '437a60fe69a45352d19dcc44961e4e25.pdf', 'yes'),
(28, 'U001', 'Disnatalis', 'cbb500dbf9f91a598c343bb08cc588d0.pdf', 'yes'),
(29, 'U001', 'Disnatalis', 'a1f6deb1ef8112e2ae279f055daa686f.pdf', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `is_spp`
--

CREATE TABLE `is_spp` (
  `id` int(11) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `nama_kegiatan` varchar(125) NOT NULL,
  `dokumen` varchar(255) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `is_spp`
--

INSERT INTO `is_spp` (`id`, `kode`, `nama_kegiatan`, `dokumen`, `status`) VALUES
(38, 'U001', 'Disnatalis', 'dc86600c8295b1318819c124dbca8e02.pdf', 'yes'),
(39, 'U001', 'Disnatalis', 'ae2fa253637335d1565926a4eeb08edf.pdf', 'yes'),
(40, 'U001', 'Disnatalis', 'e7472d20b9e83096b6c77010f3710cc9.pdf', 'yes'),
(41, 'P001', 'Perpanjang siakad', 'c87e1889f79a7f02128eeec7fb6140da.pdf', 'yes'),
(42, 'Z001', 'Test', 'e457097bcb753dc885931de036fb8d7d.pdf', 'yes'),
(43, 'U001', 'Disnatalis', 'c16c5edf76981b42ec5a445855e0c69c.pdf', 'yes'),
(44, 'P001', 'Perpanjang siakad', '1c428557fc98c8aa10a4ce80fd8dc151.pdf', 'yes'),
(45, 'U001', 'Disnatalis', '4e94d512dcbc74ccab80adab0504b66b.pdf', 'yes'),
(46, 'P001', 'Perpanjang siakad', 'ab4208ed052aa7e09ac62e2ebc1c8f06.pdf', 'yes'),
(47, 'U001', 'Disnatalis', '439cf028303972f31fcd0ca22ea435a6.pdf', 'yes'),
(48, 'U001', 'Disnatalis', 'c0e7b305cc2a3b38d5c873e0a75d36e8.pdf', 'yes'),
(49, 'U001', 'Disnatalis', 'aa633344f67dc84eee40dfb2f7f10190.pdf', 'yes'),
(50, 'U001', 'Disnatalis', '0175ba7d547d722e40b92705a0619e3a.pdf', 'yes'),
(51, 'U001', 'Disnatalis', '8f51f7fd22e23203f1741c3288ea4a11.pdf', 'yes'),
(52, 'U001', 'Disnatalis', '3e7611867ffad778b58ae2c233c05ee6.pdf', 'yes'),
(53, 'U001', 'Disnatalis', 'c4bbcf6f1e1c433ce26c74a6b7a7a081.pdf', 'yes'),
(54, 'U001', 'Disnatalis', '5cd6488affb4d61460301dcbaf6c9c72.pdf', 'yes'),
(55, 'U001', 'Disnatalis', 'eafdbe4fd573e4030c79d484c2493250.pdf', 'yes'),
(56, 'U001', 'Disnatalis', 'aec24b6bdf4972af1c99e701e2404b55.pdf', 'yes'),
(57, 'U001', 'Disnatalis', '2a4edd1a34e74f71a2470e44370281a6.pdf', 'yes'),
(58, 'U001', 'Disnatalis', '33dd04dbdec51db95749b36808f0aaa0.pdf', 'yes'),
(59, 'U001', 'Disnatalis', 'def997b77a5bba728d36ac15b1c0c4c7.pdf', 'yes'),
(60, 'U001', 'Disnatalis', '733065e529699401176982a7f04a6dd0.pdf', 'yes'),
(61, 'U001', 'Disnatalis', 'd170bb9d368c1268d1ccae352cecdb56.pdf', 'yes'),
(62, 'U001', 'Disnatalis', '8848ce00cf7a81cf9989f0d5f7e27036.pdf', 'yes'),
(63, 'U001', 'Disnatalis', 'f117630219d15a14cea4f4e099442a66.pdf', 'yes'),
(64, 'U001', 'Disnatalis', 'e21e53df4221bc089d73c8db4695eb52.pdf', 'yes'),
(65, 'U001', 'Disnatalis', '75fc315da23542858354cfda353716cf.pdf', 'yes'),
(66, 'U001', 'Disnatalis', '0c699b1f492483ecbfc0be61ec990d87.pdf', 'yes'),
(67, 'U001', 'Disnatalis', '89de1402e3e8780ec292e88ffd90c430.pdf', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id` int(11) NOT NULL,
  `id_unit` varchar(125) NOT NULL,
  `kode` varchar(125) NOT NULL,
  `kode_subkomponen` varchar(125) NOT NULL,
  `nama_kegiatan` varchar(125) NOT NULL,
  `volume` varchar(125) NOT NULL,
  `harga_satuan` varchar(125) NOT NULL,
  `jml_biaya` varchar(125) NOT NULL,
  `tgl` date DEFAULT NULL,
  `status` int(15) NOT NULL,
  `jenis_kegiatan` varchar(25) NOT NULL,
  `submit` int(11) NOT NULL,
  `status_pengajuan` int(11) NOT NULL,
  `peringatan_ppk` int(11) NOT NULL,
  `peringatan_ppspm` int(11) NOT NULL,
  `direktur` int(11) NOT NULL,
  `wadir1` int(11) NOT NULL,
  `wadir2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id`, `id_unit`, `kode`, `kode_subkomponen`, `nama_kegiatan`, `volume`, `harga_satuan`, `jml_biaya`, `tgl`, `status`, `jenis_kegiatan`, `submit`, `status_pengajuan`, `peringatan_ppk`, `peringatan_ppspm`, `direktur`, `wadir1`, `wadir2`) VALUES
(14, '11', '522111', 'K010', 'Pembayaran Listrik', '12', '2000000', '24000000', '2022-07-18', 2, '', 0, 0, 0, 0, 1, 0, 1),
(17, '11', '521115', '5211151', 'Olahraga', '1', '2000', '2000', '2022-10-21', 2, '', 1, 0, 0, 0, 1, 1, 1),
(18, '11', '521115', '5211152', 'Pitnes', '2', '9000', '18000', '2022-12-07', 2, '', 1, 0, 0, 0, 1, 1, 1),
(19, '11', '002', '5211159', 'Kegiatan A', '0', '0', '0', '2022-07-24', 1, '', 1, 0, 1, 0, 1, 1, 1),
(35, '11', '002', 'KG006', 'Olahraga', '', '', '0', '0000-00-00', 2, '', 0, 0, 0, 0, 0, 0, 0),
(40, '11', '521111', 'KG007', 'Belanja keperluan perkantoran', '1', '1530000', '1530000', '0000-00-00', 2, '', 0, 0, 0, 0, 0, 0, 0),
(45, '11', '1066.EBA.994001', '511125', 'Belanja Tunj. PPh PNS', '', '', '0', '0000-00-00', 2, '', 1, 0, 0, 0, 1, 1, 1),
(46, '11', '1066.EBA.994001', '511126', 'Belanja Tunj. Beras PNS', '', '', '0', '0000-00-00', 2, '', 0, 0, 0, 0, 0, 0, 0),
(47, '11', '1066.EBA.994001', '511151', 'Belanja Tunjangan Umum PNS\r\n', '', '', '0', '0000-00-00', 2, '', 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan_baru`
--

CREATE TABLE `kegiatan_baru` (
  `id` int(11) NOT NULL,
  `id_unit` varchar(125) NOT NULL,
  `kode` varchar(125) NOT NULL,
  `kode_subkomponen` varchar(125) NOT NULL,
  `nama_kegiatan` varchar(125) NOT NULL,
  `volume` varchar(125) NOT NULL,
  `harga_satuan` varchar(125) NOT NULL,
  `jml_biaya` varchar(125) NOT NULL,
  `tgl` date DEFAULT NULL,
  `status` int(15) NOT NULL,
  `jenis_kegiatan` varchar(25) NOT NULL,
  `submit` int(11) NOT NULL,
  `status_pengajuan` int(11) NOT NULL,
  `peringatan_ppk` int(11) NOT NULL,
  `peringatan_ppspm` int(11) NOT NULL,
  `direktur` int(11) NOT NULL,
  `wadir1` int(11) NOT NULL,
  `wadir2` int(11) NOT NULL,
  `pengumpulan` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kegiatan_baru`
--

INSERT INTO `kegiatan_baru` (`id`, `id_unit`, `kode`, `kode_subkomponen`, `nama_kegiatan`, `volume`, `harga_satuan`, `jml_biaya`, `tgl`, `status`, `jenis_kegiatan`, `submit`, `status_pengajuan`, `peringatan_ppk`, `peringatan_ppspm`, `direktur`, `wadir1`, `wadir2`, `pengumpulan`) VALUES
(21, '11', '523111', '5231111', 'Kegiatan  Lomba Antar Jurusan', '2', '1000000', '2000000', '2022-07-14', 2, 'akademik', 1, 1, 0, 0, 1, 1, 1, 'KG01'),
(22, '11', '522112', '5221121', 'Telepon speedy', '1', '1000000', '1000000', '0000-00-00', 2, 'non-akademik', 1, 1, 0, 0, 1, 0, 1, '002'),
(34, '11', '523111', 'KGB112', 'Olahraga', '', '', '0', '0000-00-00', 2, 'akademik', 0, 0, 0, 0, 0, 0, 0, ''),
(36, '11', '523111', 'KGB113', 'kegiatan b', '', '', '0', '0000-00-00', 2, 'akademik', 0, 0, 0, 0, 0, 0, 0, ''),
(37, '11', '523111', 'KGB114', 'dd', '', '', '0', '0000-00-00', 2, 'akademik', 0, 0, 0, 0, 0, 0, 0, ''),
(38, '11', '1066.EBA.994001', '51234', 'Belanja test', '', '', '0', '0000-00-00', 2, 'akademik', 1, 1, 0, 0, 1, 1, 1, 'PRD001'),
(39, '11', '1066.EBA.994001', '5213345', 'Workshop Kepegawaian', '', '', '0', '0000-00-00', 2, 'non-akademik', 1, 1, 0, 0, 1, 0, 1, 'PRD001');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan_baru_ajuan`
--

CREATE TABLE `kegiatan_baru_ajuan` (
  `id` int(11) NOT NULL,
  `kode_subkomponen` varchar(50) DEFAULT NULL,
  `nama_kegiatan` varchar(50) DEFAULT NULL,
  `tanggal` varchar(50) DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `id_unit` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kode_komponen`
--

CREATE TABLE `kode_komponen` (
  `id` int(11) NOT NULL,
  `kode_komponen` varchar(255) NOT NULL,
  `kegiatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kode_komponen`
--

INSERT INTO `kode_komponen` (`id`, `kode_komponen`, `kegiatan`) VALUES
(13, '1066.EBA.994001', 'Layanan Perkantoran (Gaji dan Tunjangan)');

-- --------------------------------------------------------

--
-- Table structure for table `kode_subkomponen`
--

CREATE TABLE `kode_subkomponen` (
  `id` int(11) NOT NULL,
  `kode_komponen` varchar(255) NOT NULL,
  `kegiatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kode_subkomponen`
--

INSERT INTO `kode_subkomponen` (`id`, `kode_komponen`, `kegiatan`) VALUES
(1, '511125', 'Belanja Tunj. PPh PNS'),
(2, '511126', 'Belanja Tunj. Beras PNS'),
(3, '511129', 'Belanja Uang Makan PNS'),
(4, '511151', 'Belanja Tunjangan Umum PNS\r\n'),
(5, '521111', 'Belanja Keperluan Perkantoran'),
(6, '523111', 'Belanja Pemeliharaan Gedung dan Bangunan'),
(7, '521114', 'Belanja Pengiriman Surat Dinas Pos Pusat'),
(8, '522111', 'Belanja Langganan Listrik '),
(9, '522112', 'Belanja Langganan Telepon '),
(10, '522113', 'Langganan Air'),
(14, '521117', 'Belanja zone'),
(15, '52111533', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `komponen`
--

CREATE TABLE `komponen` (
  `id` int(11) NOT NULL,
  `id_unit` varchar(25) NOT NULL,
  `kode_kom` varchar(255) NOT NULL,
  `komponen` varchar(255) NOT NULL,
  `volume` int(255) NOT NULL,
  `hargasatuan` int(255) NOT NULL,
  `jumlahbiaya` int(255) NOT NULL,
  `sd_cp` varchar(5) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `komponen`
--

INSERT INTO `komponen` (`id`, `id_unit`, `kode_kom`, `komponen`, `volume`, `hargasatuan`, `jumlahbiaya`, `sd_cp`, `status`) VALUES
(62, '11', '1066.EBA.994001', 'Layanan Perkantoran (Gaji dan Tunjangan)', 0, 0, 0, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `komponen_keg_baru`
--

CREATE TABLE `komponen_keg_baru` (
  `id` int(11) NOT NULL,
  `id_unit` varchar(25) NOT NULL,
  `kode_kom` varchar(255) NOT NULL,
  `komponen` varchar(255) NOT NULL,
  `volume` int(255) NOT NULL,
  `hargasatuan` int(255) NOT NULL,
  `jumlahbiaya` int(255) NOT NULL,
  `sd_cp` varchar(5) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `komponen_keg_baru`
--

INSERT INTO `komponen_keg_baru` (`id`, `id_unit`, `kode_kom`, `komponen`, `volume`, `hargasatuan`, `jumlahbiaya`, `sd_cp`, `status`) VALUES
(63, '11', '1066.EBA.994001', 'Layanan Perkantoran (Gaji dan Tunjangan)', 0, 0, 0, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `otp`
--

CREATE TABLE `otp` (
  `id` int(11) NOT NULL,
  `id_unit` varchar(25) NOT NULL,
  `kode` int(25) NOT NULL,
  `otp` int(25) NOT NULL,
  `tanggal_kadaluarsa` varchar(100) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `otp`
--

INSERT INTO `otp` (`id`, `id_unit`, `kode`, `otp`, `tanggal_kadaluarsa`, `status`) VALUES
(12, '1', 2, 2357, '2022-04-14 23:08:30', 'Y'),
(13, '3', 4, 2800, '2022-04-14 06:10:03', 'Y'),
(14, '2', 2, 1875, '2022-04-14 06:09:49', 'Y'),
(15, '1', 4, 5145, '2022-04-14 11:13:33', 'Y'),
(16, '1', 2, 3038, '2022-04-14 12:14:25', 'Y'),
(17, '1', 4, 1935, '2022-04-14 12:08:29', 'Y'),
(18, '1', 2, 7333, '2022-04-14 12:10:49', 'Y'),
(19, '2', 2, 2495, '2022-04-14 12:11:42', 'Y'),
(20, '2', 4, 4830, '2022-04-14 18:23:33', 'Y'),
(21, '2', 2, 3714, '2022-04-14 03:06:02', 'Y'),
(22, '2', 4, 2410, '2022-04-14 03:06:57', 'Y'),
(23, '555', 55, 7272, '2022-04-14 03:08:14', 'Y'),
(24, '2', 4, 3327, '2022-04-14 03:10:17', 'Y'),
(25, '2', 2, 4871, '2022-04-14 02:12:16', 'Y'),
(26, '1', 2, 2957, '2022-04-14 14:15:30', 'Y'),
(27, '3', 2, 5596, '2022-04-14 15:16:13', 'Y'),
(28, '1', 4, 1831, '2022-04-25 17:32:05', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `rab`
--

CREATE TABLE `rab` (
  `id` int(11) NOT NULL,
  `kode` varchar(125) NOT NULL,
  `rincian` varchar(125) NOT NULL,
  `volume` varchar(125) NOT NULL,
  `satuan` varchar(125) NOT NULL,
  `jumlah` varchar(125) NOT NULL,
  `satuan_jml` varchar(125) NOT NULL,
  `total` varchar(125) NOT NULL,
  `satuan_ukur` varchar(125) NOT NULL,
  `biaya_satuan` varchar(125) NOT NULL,
  `jumlah_tot` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rab`
--

INSERT INTO `rab` (`id`, `kode`, `rincian`, `volume`, `satuan`, `jumlah`, `satuan_jml`, `total`, `satuan_ukur`, `biaya_satuan`, `jumlah_tot`) VALUES
(1, '002\r\n', 'Biaya pelatihan', '2', 'keg', '1', 'paket', '2', 'keg', '3500000', '7000000'),
(2, 'A001', 'Uang harian', '1', 'orang', '2', 'orang', '2', 'orang', '1000000', '2000000'),
(3, 'A001', 'Uang harian', '2', 'orang', '5', 'orang', '10', 'orang', '500', '5000'),
(5, 'A001', 'Uang bulanan', '1', 'orang', '36', 'orang', '36', 'orang', '1000000', '36000000'),
(6, 'A001', 'Uang harianss', '1', 'orang', '50', 'orang', '50', 'orang', '1000000', '50000000'),
(7, 'A001', 'Uang harian', '1', 'orang', '100', 'orang', '100', 'orang', '1000000', '100000000'),
(11, '002', 'Uang harian aja', '8', 'orang', '100', 'pcs', '800', 'orang', '1000000', '800000000'),
(14, '002', 'Uang harian', '1', 'orang', '50', 'orang', '50', 'orang', '1000000', '50000000'),
(16, '002', 'Uang bulanan', '1', 'orang', '107', 'orang', '107', 'orang', '1000000', '107000000'),
(17, '002', 'Test', '6', 'orang', '10000', 'pcs', '60000', 'orang', '1000', '60000000'),
(18, '522111', 'Uang harian', '2', 'orang', '16', 'pcs', '32', 'orang', '500', '16000'),
(19, '522111', 'Biaya bensin', '1', 'orang', '100', 'orang', '100', 'orang', '1000000', '100000000'),
(20, '521115', 'Uang harian', '1', 'orang', '16', 'orang', '16', 'orang', '500', '8000'),
(21, '5211151', 'Uang harian 2', '2', 'orang', '16', 'orang', '32', 'orang', '1000', '32000'),
(22, '5211152', 'Uang harian jeni', '2', 'orang', '100', 'orang', '200', 'orang', '1000000', '200000000'),
(23, '5211152', 'Uang harian', '1', 'orang', '16', 'orang', '16', 'orang', '1000', '16000'),
(24, '5211151', 'Uang harian888', '2', 'orang', '16', 'orang', '32', 'orang', '1000000', '32000000'),
(26, 'K06', 'Uang harian', '2', 'orang', '16', 'orang', '32', 'orang', '500', '16000'),
(28, '5231111', 'Uang harian j', '1', 'orang', '16', 'orang', '16', 'orang', '1000000', '16000000'),
(29, '181818', 'Uang harian', '2', 'orang', '16', 'orang', '32', 'orang', '500', '16000'),
(30, '999999', 'Uang harian tes', '1', '', '', '', '0', '', '', '0'),
(31, '511125', 'Belanja tunjangan PPH PNS', '1', 'tahun', '12', 'tahun', '12', 'tahun', '139306', '1671672'),
(32, '511125', 'Tunjangan PPH gaji ke 13', '1', 'bulan', '4', 'bulan', '4', 'bulan', '116200000', '464800000'),
(33, '511125', 'Tunjangan PPH gaji ke 14', '1', 'bulan', '5', 'bulan', '5', 'bulan', '1000000', '5000000'),
(34, '51234', 'Uang harian', '2', 'orang', '16', 'orang', '32', 'orang', '139306', '4457792'),
(35, '51234', 'Belanja kopi', '2', 'orang', '16', 'orang', '32', 'orang', '1000', '32000'),
(36, '51234', 'Belanja HVS', '2', 'orang', '100', 'orang', '200', 'orang', '1000000', '200000000'),
(37, '51234', 'Belanja lagi', '2', 'orang', '100', 'orang', '200', 'orang', '139306', '27861200'),
(38, '5213345', 'Uang harian', '2', 'orang', '16', 'orang', '32', 'orang', '139306', '4457792');

-- --------------------------------------------------------

--
-- Table structure for table `rencana_tahunan`
--

CREATE TABLE `rencana_tahunan` (
  `id` int(11) NOT NULL,
  `kode` varchar(25) NOT NULL,
  `nama_kegiatan` varchar(125) NOT NULL,
  `file_rab` varchar(125) NOT NULL,
  `file_tor` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `revisi`
--

CREATE TABLE `revisi` (
  `id` int(11) NOT NULL,
  `id_unit` varchar(255) NOT NULL,
  `kode` varchar(100) NOT NULL,
  `komentar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `revisi`
--

INSERT INTO `revisi` (`id`, `id_unit`, `kode`, `komentar`) VALUES
(4, '11', '521115', 'test'),
(5, '11', '521115', 'adsa'),
(6, '11', '521115', 'adaaa'),
(7, '11', '5211152', 'asa'),
(8, '11', '5211152', 'tset'),
(9, '11', '523111', 'tt'),
(10, '11', '5231111', 'ii'),
(11, '11', '5221121', 'kk');

-- --------------------------------------------------------

--
-- Table structure for table `rka`
--

CREATE TABLE `rka` (
  `id` int(11) NOT NULL,
  `komponen` varchar(125) NOT NULL,
  `subkomponen` varchar(125) NOT NULL,
  `volume` int(255) NOT NULL,
  `hargasatuan` int(255) NOT NULL,
  `jumlahbiaya` int(255) NOT NULL,
  `sd_cp` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `subkomponen`
--

CREATE TABLE `subkomponen` (
  `id` int(11) NOT NULL,
  `kode` varchar(255) NOT NULL,
  `subkomponen` varchar(255) NOT NULL,
  `volume` int(255) NOT NULL,
  `hargasatuan` int(255) NOT NULL,
  `jumlahbiaya` int(255) NOT NULL,
  `sd_cp` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subkomponen`
--

INSERT INTO `subkomponen` (`id`, `kode`, `subkomponen`, `volume`, `hargasatuan`, `jumlahbiaya`, `sd_cp`) VALUES
(1, '001', 'Biaya gaji pokok pns', 1, 4000000, 4000000, 'RM');

-- --------------------------------------------------------

--
-- Table structure for table `sub_pengajuan`
--

CREATE TABLE `sub_pengajuan` (
  `id_sub` int(11) NOT NULL,
  `nama_pengajuan` varchar(40) NOT NULL,
  `sub_pengajuan` int(40) NOT NULL,
  `biaya` int(20) NOT NULL,
  `jenis_pengajuan` enum('akademik','non-akademik','','') NOT NULL,
  `tgl` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `target`
--

CREATE TABLE `target` (
  `id` int(11) NOT NULL,
  `target` varchar(125) NOT NULL,
  `tahun` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `target`
--

INSERT INTO `target` (`id`, `target`, `tahun`) VALUES
(1, '99', 2022);

-- --------------------------------------------------------

--
-- Table structure for table `tb_anggaran_proposal`
--

CREATE TABLE `tb_anggaran_proposal` (
  `id` int(11) NOT NULL,
  `biaya` varchar(128) NOT NULL,
  `satuan` varchar(128) NOT NULL,
  `nominal` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_anggaran_proposal`
--

INSERT INTO `tb_anggaran_proposal` (`id`, `biaya`, `satuan`, `nominal`) VALUES
(1, 'ee', 'ee', 'ee'),
(2, 'yang 1', 'hjk', 'jki'),
(3, 'nmj', 'mmm', 'mmm'),
(4, 'mm', 'ml', 'nkj'),
(5, 'kn', 'ouo', 'oiuy'),
(6, 'mmm', 'iioo', 'lkoj'),
(7, 'b', 'b', 'nkj'),
(8, 'mnc', 'bjh', 'klji'),
(9, 'as', 'as', 'as'),
(10, 'dd', 'ddd', 'dd'),
(11, 'dd', 'ddd', 'dd');

-- --------------------------------------------------------

--
-- Table structure for table `tb_approval`
--

CREATE TABLE `tb_approval` (
  `id` int(11) NOT NULL,
  `id_pengajuan` int(11) NOT NULL,
  `nama_unit` varchar(128) NOT NULL,
  `kajur` varchar(128) DEFAULT NULL,
  `status_kajur` varchar(128) DEFAULT NULL,
  `kemahasiswaan` varchar(128) DEFAULT NULL,
  `status_kemahasiswaan` varchar(128) DEFAULT NULL,
  `ppspm` varchar(128) DEFAULT NULL,
  `status_ppspm` varchar(128) NOT NULL,
  `ppk` varchar(128) DEFAULT NULL,
  `status_ppk` varchar(128) DEFAULT NULL,
  `status_validasi` enum('disetujui','revisi','ditolak') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_approval`
--

INSERT INTO `tb_approval` (`id`, `id_pengajuan`, `nama_unit`, `kajur`, `status_kajur`, `kemahasiswaan`, `status_kemahasiswaan`, `ppspm`, `status_ppspm`, `ppk`, `status_ppk`, `status_validasi`) VALUES
(1, 1, 'MI', 'Nunu Nugraha', 'disetujui', NULL, '0', NULL, '', NULL, '0', NULL),
(2, 3, 'MI', 'Nunu Nugraha', '0', NULL, '0', NULL, '', NULL, '0', NULL),
(3, 4, 'MI', 'Nunu Nugraha', '0', NULL, '0', NULL, '', NULL, '0', NULL),
(7, 6, 'MI', 'hkh', '0', NULL, '0', 'sadf', '', 'ppp', '0', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kegiatan`
--

CREATE TABLE `tb_kegiatan` (
  `kode` varchar(128) NOT NULL,
  `komponen_kegiatan` varchar(128) NOT NULL,
  `jumlah_biaya` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kegiatan`
--

INSERT INTO `tb_kegiatan` (`kode`, `komponen_kegiatan`, `jumlah_biaya`) VALUES
('521119', 'Belanja Barang Operasional Lainnya', 216128000),
('521213', 'Belanja Honor Output Kegiatan', 29400000),
('521811', 'Belanja Barang Persediaan Barang Konsumsi', 200000000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengajuan`
--

CREATE TABLE `tb_pengajuan` (
  `id_pengajuan` int(11) NOT NULL,
  `jenis_pengajuan` varchar(128) NOT NULL,
  `nama_unit` varchar(20) NOT NULL,
  `nama_pengajuan` varchar(50) NOT NULL,
  `status` enum('diajukan','ditolak','revisi','') NOT NULL DEFAULT 'diajukan'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pengajuan`
--

INSERT INTO `tb_pengajuan` (`id_pengajuan`, `jenis_pengajuan`, `nama_unit`, `nama_pengajuan`, `status`) VALUES
(1, '', 'MI', 'ATK', 'diajukan'),
(2, '', 'TPPM', 'Jurusan', 'diajukan'),
(3, 'akademik', 'MI', 'TES', 'diajukan'),
(4, 'non-akademik', 'MI', 'nodojdos', 'diajukan'),
(5, 'yyy', 'hh', 'jhk', 'diajukan'),
(6, 'akademik', 'MI', 'dda', 'diajukan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_proposal`
--

CREATE TABLE `tb_proposal` (
  `id_proposal` int(11) NOT NULL,
  `file_proposal` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_proposal`
--

INSERT INTO `tb_proposal` (`id_proposal`, `file_proposal`) VALUES
(6, 'tes26.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rab`
--

CREATE TABLE `tb_rab` (
  `id_rab` int(11) NOT NULL,
  `id_pengajuan` int(11) NOT NULL,
  `kode` varchar(125) NOT NULL,
  `rincianbiaya` varchar(125) NOT NULL,
  `volume` int(11) NOT NULL,
  `satuan` text NOT NULL,
  `jumlah` text NOT NULL,
  `satuandua` varchar(11) NOT NULL,
  `total` text NOT NULL,
  `satukur` varchar(128) NOT NULL,
  `biaya_satuan` varchar(128) NOT NULL,
  `total_biaya` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_rab`
--

INSERT INTO `tb_rab` (`id_rab`, `id_pengajuan`, `kode`, `rincianbiaya`, `volume`, `satuan`, `jumlah`, `satuandua`, `total`, `satukur`, `biaya_satuan`, `total_biaya`) VALUES
(3, 4, 'U001', 'Biaya belanja bahan', 19999, 'ORG', '6654', 'PCS', '1234455', 'PCS', '100000', '12121212');

-- --------------------------------------------------------

--
-- Table structure for table `tb_satuan`
--

CREATE TABLE `tb_satuan` (
  `id_satuan` int(11) NOT NULL,
  `nama_satuan` varchar(128) NOT NULL,
  `singkatan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_satuan`
--

INSERT INTO `tb_satuan` (`id_satuan`, `nama_satuan`, `singkatan`) VALUES
(1, 'Orang / Jam', 'OJ'),
(2, 'Orang / Hari', 'OH'),
(3, 'Orang / Bulan', 'OB'),
(4, 'Orang / Tahun', 'OT'),
(5, 'Orang / Paket', 'OP'),
(6, 'Orang / Kegiatan', 'OK'),
(7, 'Orang / Responden', 'OR'),
(8, 'Orang / Terbitan', 'Oter'),
(9, 'Orang / Jam Pelajaran', 'OJP');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sbm`
--

CREATE TABLE `tb_sbm` (
  `id_SBM` int(11) NOT NULL,
  `kode_sbm` varchar(20) NOT NULL,
  `kategori` varchar(128) NOT NULL,
  `sub_kategori` varchar(128) NOT NULL,
  `nama_sbm` varchar(128) NOT NULL,
  `satuan` varchar(128) NOT NULL,
  `nominal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_sbm`
--

INSERT INTO `tb_sbm` (`id_SBM`, `kode_sbm`, `kategori`, `sub_kategori`, `nama_sbm`, `satuan`, `nominal`) VALUES
(1, '132', 'Honorarium Dosen Penyelenggaraan kegiatan Akademik dan Kemahasiswaan', 'Program Diploma, Sarjana dan Profesi', 'Penguji Proposal / Tugas Akhir', 'SKS / Hadir', 200000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_tor`
--

CREATE TABLE `tb_tor` (
  `id` int(11) NOT NULL,
  `kementrian` text NOT NULL,
  `uniteselon` varchar(128) NOT NULL,
  `hasil` int(11) NOT NULL,
  `kegiatan_tor` text NOT NULL,
  `indikator` text NOT NULL,
  `keluaran` text NOT NULL,
  `volume` int(11) NOT NULL,
  `kegiatanpembelajaran` text NOT NULL,
  `latarbelakang_tor` text NOT NULL,
  `dasarhukum` text NOT NULL,
  `gambaranumum` varchar(128) NOT NULL,
  `penerimamanfaat` varchar(128) NOT NULL,
  `pencapaian` text NOT NULL,
  `tahapan` varchar(128) NOT NULL,
  `waktu_tor` varchar(128) NOT NULL,
  `tempat_pelaksanaan` text NOT NULL,
  `biayator` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_tor`
--

INSERT INTO `tb_tor` (`id`, `kementrian`, `uniteselon`, `hasil`, `kegiatan_tor`, `indikator`, `keluaran`, `volume`, `kegiatanpembelajaran`, `latarbelakang_tor`, `dasarhukum`, `gambaranumum`, `penerimamanfaat`, `pencapaian`, `tahapan`, `waktu_tor`, `tempat_pelaksanaan`, `biayator`) VALUES
(4, 'adaf', 'asfwq', 0, 'dda', 'das', 'fwf', 0, 'mm', 'ssss', 'mmm', 'mmm', 'mmm', 'mm', 'mmmm', 'mmmm', 'ssnns', 'nsnsn');

-- --------------------------------------------------------

--
-- Table structure for table `tb_usulan`
--

CREATE TABLE `tb_usulan` (
  `id_usulan` int(11) NOT NULL,
  `kode` varchar(128) NOT NULL,
  `program_kegiatan` varchar(128) NOT NULL,
  `volume` int(11) NOT NULL,
  `satuan` varchar(128) NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `jenis_kegiatan` enum('Akademik','Non-Akademik','','') NOT NULL,
  `tanggal` varchar(20) NOT NULL,
  `status_usulan` varchar(40) NOT NULL,
  `fileusulan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_usulan`
--

INSERT INTO `tb_usulan` (`id_usulan`, `kode`, `program_kegiatan`, `volume`, `satuan`, `harga_satuan`, `total`, `jenis_kegiatan`, `tanggal`, `status_usulan`, `fileusulan`) VALUES
(1, '521119', 'Wisuda', 2, 'ORG', 20000, 40000, 'Akademik', '06/30/2022', 'Tes', ''),
(2, '521119', 'tess', 1, 'ORG', 100000, 100000, 'Akademik', '06/30/2022', '', ''),
(3, '521213', 'kdjadk', 0, '', 0, 0, 'Akademik', '08/10/2022', 'Diusulkan', ''),
(4, '521811', 'tess', 0, '', 0, 0, 'Non-Akademik', '06/25/2022', 'Diusulkan', ''),
(5, '521811', 'asadad', 0, '', 0, 0, 'Non-Akademik', '06/16/2022', 'Diusulkan', ''),
(6, '13312', 'adf', 11, 'OG', 40000, 440000, 'Akademik', '06/12/2022', '', 'tes8.pdf'),
(7, '521115', 'test', 2, 'orang', 9000, 18000, 'Non-Akademik', '07/16/2022', '', 'CV-JENILUTFIFAUZI.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `timeout`
--

CREATE TABLE `timeout` (
  `id` int(11) NOT NULL,
  `time` varchar(125) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `timeout`
--

INSERT INTO `timeout` (`id`, `time`, `create_at`) VALUES
(1, '5400000', '2022-07-13 22:56:59');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role` varchar(100) NOT NULL,
  `no_hp` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `role`, `no_hp`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$10$jw9q39/BMNoPXAYQHiWFlOg3WBgdA3U1iDuxVokoJqZVzyrD.v4e6', 'admin', '0'),
(11, 'Manajemen Informatika', 'unit@gmail.com', '$2y$10$Kw8TZR81oqb1sLfEHgUP0.f5XCP5GDLHnTWrCOfUS4Rv7GzlXuoqe', 'unit', '089671342876'),
(14, 'Bagian Keuangan', 'bagiankeuangan@gmail.com', '$2y$10$39QS.RBjZyL251yAFRUY/.ThVYuV3.RcAPmdT8Riiv4bJLkXqX5AG', 'bagiankeuangan', '0'),
(15, 'bagian perencanaan', 'bagianperencanaan@gmail.com', '$2y$10$4FWip558rCJjdlTLX4a2Uub1RSzEl0INKqBEFN4M/pGwvt3uMu2OC', 'bagianperencanaan', '0'),
(16, 'wadir 1 ppspm', 'ppspm@gmail.com', '$2y$10$5R6c6FA1M4PlijL1XjvbJul0PpbtALlWLHIp8C6JnhLxlVBoRHx3y', 'ppspm', '0'),
(17, 'ppk', 'ppk@gmail.com', '$2y$10$QUzj2moV/oHeK5q6krr.UeW8z/SPV28Na.NYXPMyXQ5aBZcDaEeni', 'ppk', '0'),
(20, 'Nama Unit 2', 'unit2@gmail.com', '$2y$10$zS3t2S0l9cidWYJu.mXXzeofZJUMhXYpneWMRG2AtcGvNJnI6CK3u', 'unit', '0'),
(21, 'wadir1', 'wadir1@gmail.com', '$2y$10$a80XSu3R/nUMG90RSxJX0u.m3Khpk6r9bBIIvYxl2gpy5nQOPpOAa', 'wadir1', '0'),
(22, 'wadir 2', 'wadir2@gmail.com', '$2y$10$21ZQMPFbCSvjd0bkCg4bSuDidVxqfdpiAKx7pxltbkWweYYsN7VJe', 'wadir2', '0'),
(23, 'direktur', 'direktur@gmail.com', '$2y$10$L1jHKz.Tko7Qt5FyWyF13.lxaDEEwn0ZnUi/drNRCZB4jL8wwARmG', 'direktur', '0'),
(27, 'kpa', 'kpa@gmail.com', '$2y$10$uAg4xLNdVgiGnW3HQ42GMuFw4fxMT7lVU/oMHrxW4ai9KuESAVeEK', 'kpa', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggaran`
--
ALTER TABLE `anggaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_dukung`
--
ALTER TABLE `data_dukung`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_pengajuan`
--
ALTER TABLE `data_pengajuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_pengajuan_thn`
--
ALTER TABLE `data_pengajuan_thn`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_pengajuan_validasi`
--
ALTER TABLE `data_pengajuan_validasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_rka`
--
ALTER TABLE `data_rka`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dateline`
--
ALTER TABLE `dateline`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `disposisi`
--
ALTER TABLE `disposisi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `durasiotp`
--
ALTER TABLE `durasiotp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `d_lpj`
--
ALTER TABLE `d_lpj`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `is_otp`
--
ALTER TABLE `is_otp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `is_sp2d`
--
ALTER TABLE `is_sp2d`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `is_spm`
--
ALTER TABLE `is_spm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `is_spp`
--
ALTER TABLE `is_spp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kegiatan_baru`
--
ALTER TABLE `kegiatan_baru`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `kegiatan_baru_ajuan`
--
ALTER TABLE `kegiatan_baru_ajuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kode_komponen`
--
ALTER TABLE `kode_komponen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kode_subkomponen`
--
ALTER TABLE `kode_subkomponen`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `komponen`
--
ALTER TABLE `komponen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komponen_keg_baru`
--
ALTER TABLE `komponen_keg_baru`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `otp`
--
ALTER TABLE `otp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rab`
--
ALTER TABLE `rab`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rencana_tahunan`
--
ALTER TABLE `rencana_tahunan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `revisi`
--
ALTER TABLE `revisi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rka`
--
ALTER TABLE `rka`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subkomponen`
--
ALTER TABLE `subkomponen`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode` (`kode`);

--
-- Indexes for table `sub_pengajuan`
--
ALTER TABLE `sub_pengajuan`
  ADD PRIMARY KEY (`id_sub`);

--
-- Indexes for table `target`
--
ALTER TABLE `target`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_anggaran_proposal`
--
ALTER TABLE `tb_anggaran_proposal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_approval`
--
ALTER TABLE `tb_approval`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kegiatan`
--
ALTER TABLE `tb_kegiatan`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `tb_pengajuan`
--
ALTER TABLE `tb_pengajuan`
  ADD PRIMARY KEY (`id_pengajuan`);

--
-- Indexes for table `tb_proposal`
--
ALTER TABLE `tb_proposal`
  ADD PRIMARY KEY (`id_proposal`);

--
-- Indexes for table `tb_rab`
--
ALTER TABLE `tb_rab`
  ADD PRIMARY KEY (`id_rab`);

--
-- Indexes for table `tb_satuan`
--
ALTER TABLE `tb_satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indexes for table `tb_sbm`
--
ALTER TABLE `tb_sbm`
  ADD PRIMARY KEY (`id_SBM`);

--
-- Indexes for table `tb_tor`
--
ALTER TABLE `tb_tor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_usulan`
--
ALTER TABLE `tb_usulan`
  ADD PRIMARY KEY (`id_usulan`);

--
-- Indexes for table `timeout`
--
ALTER TABLE `timeout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggaran`
--
ALTER TABLE `anggaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `data_dukung`
--
ALTER TABLE `data_dukung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `data_pengajuan_thn`
--
ALTER TABLE `data_pengajuan_thn`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_pengajuan_validasi`
--
ALTER TABLE `data_pengajuan_validasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_rka`
--
ALTER TABLE `data_rka`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `dateline`
--
ALTER TABLE `dateline`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `disposisi`
--
ALTER TABLE `disposisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `durasiotp`
--
ALTER TABLE `durasiotp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `d_lpj`
--
ALTER TABLE `d_lpj`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `is_otp`
--
ALTER TABLE `is_otp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `is_sp2d`
--
ALTER TABLE `is_sp2d`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `is_spm`
--
ALTER TABLE `is_spm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `is_spp`
--
ALTER TABLE `is_spp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `kegiatan_baru`
--
ALTER TABLE `kegiatan_baru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `kegiatan_baru_ajuan`
--
ALTER TABLE `kegiatan_baru_ajuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kode_komponen`
--
ALTER TABLE `kode_komponen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `kode_subkomponen`
--
ALTER TABLE `kode_subkomponen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `komponen`
--
ALTER TABLE `komponen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `komponen_keg_baru`
--
ALTER TABLE `komponen_keg_baru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `otp`
--
ALTER TABLE `otp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `rab`
--
ALTER TABLE `rab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `rencana_tahunan`
--
ALTER TABLE `rencana_tahunan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `revisi`
--
ALTER TABLE `revisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `rka`
--
ALTER TABLE `rka`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subkomponen`
--
ALTER TABLE `subkomponen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sub_pengajuan`
--
ALTER TABLE `sub_pengajuan`
  MODIFY `id_sub` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `target`
--
ALTER TABLE `target`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_anggaran_proposal`
--
ALTER TABLE `tb_anggaran_proposal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_approval`
--
ALTER TABLE `tb_approval`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_pengajuan`
--
ALTER TABLE `tb_pengajuan`
  MODIFY `id_pengajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_proposal`
--
ALTER TABLE `tb_proposal`
  MODIFY `id_proposal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_rab`
--
ALTER TABLE `tb_rab`
  MODIFY `id_rab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_satuan`
--
ALTER TABLE `tb_satuan`
  MODIFY `id_satuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_sbm`
--
ALTER TABLE `tb_sbm`
  MODIFY `id_SBM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `tb_tor`
--
ALTER TABLE `tb_tor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_usulan`
--
ALTER TABLE `tb_usulan`
  MODIFY `id_usulan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `timeout`
--
ALTER TABLE `timeout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
