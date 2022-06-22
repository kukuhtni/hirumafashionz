-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2022 at 11:53 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_hirumafashionz`
--

-- --------------------------------------------------------

--
-- Table structure for table `business`
--

CREATE TABLE `business` (
  `id` int(11) NOT NULL,
  `business_name` varchar(300) NOT NULL,
  `address` text NOT NULL,
  `product` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `business`
--

INSERT INTO `business` (`id`, `business_name`, `address`, `product`) VALUES
(1, 'Fog Harbor Fish House', 'Fisherman\'s Wharf, North Beach/Telegraph Hill\r\nPier 39\r\nSan Francisco, CA 94133\r\nPhone number (415) 421-2442', 'Seafood, Bars'),
(2, 'The House', 'North Beach/Telegraph Hill\r\n1230 Grant Ave\r\nSan Francisco, CA 94133\r\nPhone number (415) 986-8612', 'Asian Fusion'),
(3, 'Barnzu', 'Tenderloin\r\n711 Geary St\r\nSan Francisco, CA 94109\r\nPhone number (415) 525-4985', 'Korean, Tapas Bars'),
(4, 'Brenda French Soul Food', 'Tenderloin\r\n652 Polk St\r\nSan Francisco, CA 94102\r\nPhone number (415) 345-8100', 'Breakfast & Brunch, French, Soul Food'),
(5, 'The Salzburg', 'Russian Hill, North Beach/Telegraph Hill\r\n663 Union St\r\nSan Francisco, CA 94133', 'Austrian'),
(6, 'Marufuku Ramen', 'Lower Pacific Heights, Japantown\r\n1581 Webster St\r\nSan Francisco, CA 94115\r\nPhone number (415) 872-9786', 'Seafood, Seafood Markets, Live/Raw Food');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `rating_id` int(11) NOT NULL,
  `business_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`rating_id`, `business_id`, `rating`) VALUES
(1, 6, 3),
(2, 6, 5),
(3, 6, 3),
(4, 5, 3),
(5, 5, 2),
(6, 5, 5),
(7, 5, 5),
(8, 5, 5),
(9, 5, 1),
(10, 3, 5),
(11, 4, 3),
(12, 4, 5),
(13, 4, 3),
(14, 4, 5),
(15, 1, 3),
(16, 1, 1),
(17, 1, 2),
(18, 1, 5),
(19, 1, 5),
(20, 2, 4),
(21, 1, 4),
(22, 1, 5),
(23, 6, 4),
(24, 6, 5),
(25, 6, 5),
(26, 5, 2),
(27, 4, 1),
(28, 3, 2),
(29, 3, 4),
(30, 3, 4),
(31, 3, 5),
(32, 3, 5),
(33, 3, 5),
(34, 5, 5),
(35, 5, 4),
(36, 6, 3),
(37, 2, 5),
(38, 1, 5),
(39, 2, 3),
(40, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_berita`
--

CREATE TABLE `tb_berita` (
  `id_berita` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `jenis_berita` varchar(20) NOT NULL,
  `judul_berita` varchar(255) NOT NULL,
  `slug_berita` varchar(255) NOT NULL,
  `keywords` text,
  `status_berita` varchar(20) NOT NULL,
  `keterangan` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_gambar`
--

CREATE TABLE `tb_gambar` (
  `id_gambar` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `judul_gambar` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_gambar`
--

INSERT INTO `tb_gambar` (`id_gambar`, `id_produk`, `judul_gambar`, `gambar`, `tanggal_update`) VALUES
(6, 23, 'snk1', '954285_f2c20671-7192-4de4-8d55-85d28dd4357b_1280_1280.jpg', '2019-07-08 04:05:33'),
(7, 23, 'snk2', '954285_4bdb62c2-7df5-44dd-a6a5-a23b9d75f6c0_1108_1478.jpg', '2019-07-08 04:05:49'),
(8, 23, 'snk3', '954285_badbc707-233e-4396-bfc5-ec14d77bdbb8_1108_1478.jpg', '2019-07-08 04:06:00'),
(10, 23, 'snk4', '954285_9c4dc546-3343-491e-99cb-d978d1d5b262_1108_1478.jpg', '2019-07-08 15:12:28'),
(11, 18, 'op1', '954285_f3e06239-b559-4465-865a-49b09dc698fd_2048_2048.jpg', '2019-07-08 15:38:22'),
(12, 18, 'op2', '954285_5b2d06fc-33c6-4f27-9b41-d7e65c782f24_1536_2048.jpg', '2019-07-08 15:38:31'),
(13, 18, 'op3', '954285_a7233ea8-a555-4aa8-a1a0-9a77f6eaa741_1536_2048.jpg', '2019-07-08 15:38:47'),
(14, 18, 'op4', '213978952_53c1660e-533e-4841-a4c8-37f46713b64f_1480_1178.jpg', '2019-07-08 15:39:08'),
(16, 17, 'op1', '954285_3145e797-e86f-45d2-be0f-a40b7ffd01f2_2048_2730.jpg', '2019-07-08 15:41:46'),
(17, 17, 'op2', '954285_36d5a49c-cb68-4187-b696-6e415fe3359e_2048_2730.jpg', '2019-07-08 15:41:55'),
(18, 17, 'op3', '954285_7c2f2a7d-24be-4f18-80ab-358c7817dd4e_2048_2730.jpg', '2019-07-08 15:42:08'),
(19, 17, 'op4', '954285_4ca9b3db-9fa2-4111-b2df-ab780329314e_2048_2048.jpg', '2019-07-08 15:42:15'),
(22, 25, 'opm1', '127192190_3bbadbfa-762c-4943-bc42-2e2dc4434d51_1188_960.jpg', '2019-07-08 15:50:09'),
(23, 26, 'opm1', '954285_31d306fd-350c-4d27-94d1-d911ada8fa5e_1080_1080.jpg', '2019-07-08 15:52:10'),
(24, 15, 'sao1', '954285_4a3da0c4-3d10-4042-9ce5-2df23ba0f436_1000_1000.jpg', '2019-07-12 08:28:24'),
(25, 15, 'sao2', '954285_00b0ba5b-6c8a-495f-9680-25d0d2da7607_1000_1000.jpg', '2019-07-12 08:28:30'),
(26, 15, 'sao3', '954285_8c3eacf3-c6bc-41b4-a182-4565750ddae3_1200_1200.jpg', '2019-07-12 08:28:39'),
(27, 15, 'sao4', '954285_727999c6-f8e3-4c02-b37c-ed3210e2c2bc_1000_1000.jpg', '2019-07-12 08:28:50'),
(28, 14, 'sao1', '954285_4e4822f0-cf41-482d-a201-cc4cd4deeb68_2048_1536.jpg', '2019-07-12 08:30:23'),
(29, 14, 'sao2', '954285_a206c43c-5b7b-4111-bc8f-db64cb1fb738_2048_2730.jpg', '2019-07-12 08:30:36'),
(30, 14, 'sao3', '954285_df266caf-4b1b-443c-9d40-f1f9e9ad3a79_2048_1536.jpg', '2019-07-12 08:30:47'),
(31, 14, 'sao4', '954285_931c77f3-fee5-470f-9b2f-ed556b153e38_2048_1536.jpg', '2019-07-12 08:31:26'),
(32, 16, 'op1', '954285_49f05064-3f9f-4248-ac3c-071bf7012241_1000_1000.png', '2019-07-12 08:33:05'),
(33, 16, 'op2', '954285_ac89b363-caab-4d00-b71e-843cdfc4d7a4_716_716.png', '2019-07-12 08:33:19'),
(34, 16, 'op3', '954285_baa2cbcf-4ea0-45dc-a6e0-5bbb55033ad9_1200_1200.png', '2019-07-12 08:33:32'),
(35, 16, 'op4', '954285_d1b62352-d0db-43ae-b1ba-4a34dbc591b5_1000_1000.png', '2019-07-12 08:33:50'),
(36, 27, 'nt1', '54277314_280467289513347_6859126036771859485_n.jpg', '2019-07-12 08:36:24'),
(37, 27, 'nt2', '154756367900829_7e280c57-eb13-41a6-ba71-ae1c6ed1a751.jpg', '2019-07-12 08:36:54'),
(38, 27, 'nt3', '154756367900868_a493fadd-7cc0-4859-9828-23433cdad234.jpg', '2019-07-12 08:37:05'),
(39, 27, 'nt4', '154756367900887_35accda2-1957-4728-84a4-515ad23b398d.jpg', '2019-07-12 08:37:13'),
(40, 28, 'op1', '954285_2cfbbcd3-2b5c-4245-9f2c-a70e73802740_1200_1186.jpg', '2019-07-12 08:42:05'),
(41, 28, 'op2', '954285_2cfbbcd3-2b5c-4245-9f2c-a70e73802740_1200_11861.jpg', '2019-07-12 08:42:29'),
(42, 29, 'snk1', '954285_24ef3b75-af68-452f-8d70-0a3f27a6a326_1365_2048.jpg', '2019-07-12 08:46:06'),
(43, 29, 'snk2', '954285_5fe2b90f-573f-4f97-98e9-53945d6208d9_1365_2048.jpg', '2019-07-12 08:46:30'),
(44, 29, 'snk3', '954285_993c19f4-e8f8-4977-a358-6bd62b1d6224_2048_2048.jpg', '2019-07-12 08:47:04'),
(45, 30, 'bc1', '954285_37c124c2-5459-47f8-b039-6af12d213264_1024_1821.jpg', '2019-07-15 10:07:48'),
(46, 30, 'bc2', '954285_aa97984f-1266-4376-87d7-db02be4b372f_1019_1563.jpg', '2019-07-15 10:08:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_header_transaksi`
--

CREATE TABLE `tb_header_transaksi` (
  `id_header_transaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telephone` varchar(50) DEFAULT NULL,
  `alamat` varchar(300) DEFAULT NULL,
  `kode_transaksi` varchar(255) NOT NULL,
  `tanggal_transaksi` datetime NOT NULL,
  `jumlah_transaksi` int(11) NOT NULL,
  `status_bayar` varchar(20) NOT NULL,
  `jumlah_bayar` int(11) DEFAULT NULL,
  `rek_pembayaran` varchar(255) DEFAULT NULL,
  `rek_pelanggan` varchar(255) DEFAULT NULL,
  `bukti_bayar` varchar(255) NOT NULL,
  `id_rekening` int(11) DEFAULT NULL,
  `tanggal_bayar` varchar(255) DEFAULT NULL,
  `nama_bank` varchar(255) DEFAULT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_header_transaksi`
--

INSERT INTO `tb_header_transaksi` (`id_header_transaksi`, `id_user`, `id_pelanggan`, `nama_pelanggan`, `email`, `telephone`, `alamat`, `kode_transaksi`, `tanggal_transaksi`, `jumlah_transaksi`, `status_bayar`, `jumlah_bayar`, `rek_pembayaran`, `rek_pelanggan`, `bukti_bayar`, `id_rekening`, `tanggal_bayar`, `nama_bank`, `tanggal_post`, `tanggal_update`) VALUES
(1, 0, 1, 'kukuh', 'kukuh@gmail.com', '23234343', 'fefefef', '09072019A6GG8PKT', '2019-07-09 00:00:00', 270000, 'Belum', NULL, NULL, NULL, '', NULL, NULL, NULL, '2019-07-09 13:17:36', '2019-07-09 11:17:36'),
(2, 0, 1, 'kukuh', 'kukuh@gmail.com', '23234343', 'fefefef', '09072019CYPWVGNZ', '2019-07-09 00:00:00', 0, 'Belum', NULL, NULL, NULL, '', NULL, NULL, NULL, '2019-07-09 13:19:02', '2019-07-09 11:19:02'),
(3, 0, 1, 'kukuh', 'kukuh@gmail.com', '23234343', 'fefefef', '09072019HETCU5JF', '2019-07-09 00:00:00', 185000, 'Belum', NULL, NULL, NULL, '', NULL, NULL, NULL, '2019-07-09 13:35:21', '2019-07-09 11:35:21'),
(4, 0, 1, 'kukuh', 'kukuh@gmail.com', '23234343', 'fefefef', '09072019YWESDV7Z', '2019-07-09 00:00:00', 0, 'Belum', NULL, NULL, NULL, '', NULL, NULL, NULL, '2019-07-09 13:38:55', '2019-07-09 11:38:55'),
(5, 0, 1, 'kukuh', 'kukuh@gmail.com', '23234343', 'fefefef', '09072019OPTXDE4I', '2019-07-09 00:00:00', 105000, 'Belum', NULL, NULL, NULL, '', NULL, NULL, NULL, '2019-07-09 13:40:11', '2019-07-09 11:40:11'),
(6, 0, 1, 'kukuh', 'kukuh@gmail.com', '23234343', 'fefefef', '09072019FLA4IKCP', '2019-07-09 00:00:00', 0, 'Belum', NULL, NULL, NULL, '', NULL, NULL, NULL, '2019-07-09 13:40:26', '2019-07-09 11:40:26'),
(7, 0, 1, 'kukuh', 'kukuh@gmail.com', '23234343', 'fefefef', '09072019OZQCOQES', '2019-07-09 00:00:00', 150000, 'Belum', NULL, NULL, NULL, '', NULL, NULL, NULL, '2019-07-09 13:44:10', '2019-07-09 11:44:10'),
(8, 0, 1, 'kukuh', 'kukuh@gmail.com', '23234343', 'fefefef', '09072019YCZ7KPON', '2019-07-09 00:00:00', 185000, 'Belum', NULL, NULL, NULL, '', NULL, NULL, NULL, '2019-07-09 13:45:19', '2019-07-09 11:45:19'),
(9, 0, 1, 'kukuh', 'kukuh@gmail.com', '23234343', 'fefefef', '09072019F4SROYHR', '2019-07-09 00:00:00', 120000, 'Belum', NULL, NULL, NULL, '', NULL, NULL, NULL, '2019-07-09 13:47:53', '2019-07-09 11:47:53'),
(10, 0, 1, 'kukuh', 'kukuh@gmail.com', '23234343', 'fefefef', '09072019YQDOTD83', '2019-07-09 00:00:00', 300000, 'Belum', NULL, NULL, NULL, '', NULL, NULL, NULL, '2019-07-09 13:53:31', '2019-07-09 11:53:31'),
(11, 0, 1, 'kukuh', 'kukuh@gmail.com', '23234343', 'fefefef', '09072019ZQRNSYEY', '2019-07-09 00:00:00', 2000000, 'Belum', NULL, NULL, NULL, '', NULL, NULL, NULL, '2019-07-09 14:00:37', '2019-07-09 12:00:37'),
(12, 0, 4, 'Bayu Dwi Haryanto', 'bayu@gmail.com', '085200885669', 'Jln. Jalan Ke Taman ', '1007201984LREFQT', '2019-07-10 00:00:00', 375000, 'Belum', NULL, NULL, NULL, '', NULL, NULL, NULL, '2019-07-10 08:22:21', '2019-07-10 06:22:21'),
(13, 0, 3, 'Kukuh Tri Nur Iman', 'kukuhtni06@gmail.com', '081993697937', 'Jln. Taman Sri Rejeki Selatan VII No. 46, Kalibanteng Kidul. Semarang Barat. Kota Semarang', '10072019TVEKV4WT', '2019-07-10 00:00:00', 1340000, 'Belum', NULL, NULL, NULL, '', NULL, NULL, NULL, '2019-07-10 09:52:40', '2019-07-10 07:52:40'),
(14, 0, 3, 'Kukuh Tri Nur Iman', 'kukuhtni06@gmail.com', '081993697937', 'Jln. Taman Sri Rejeki Selatan VII No. 46, Kalibanteng Kidul. Semarang Barat. Kota Semarang', '10072019JBITU3XZ', '2019-07-10 00:00:00', 255000, 'Belum', NULL, NULL, NULL, '', NULL, NULL, NULL, '2019-07-10 11:26:44', '2019-07-10 09:26:44'),
(15, 0, 3, 'Kukuh Tri Nur Iman', 'kukuhtni06@gmail.com', '081993697937', 'Jln. Taman Sri Rejeki Selatan VII No. 46, Kalibanteng Kidul. Semarang Barat. Kota Semarang', '10072019GOINVHQM', '2019-07-10 00:00:00', 250000, 'Belum', NULL, NULL, NULL, '', NULL, NULL, NULL, '2019-07-10 16:20:43', '2019-07-10 14:20:43'),
(16, 0, 3, 'Kukuh Tri Nur Iman', 'kukuhtni06@gmail.com', '081993697777', 'Jln. Taman Sri Rejeki Selatan VII No. 46, Kalibanteng Kidul. Semarang Barat. Kota Semarang', '10072019VKBOJ1GL', '2019-07-10 00:00:00', 185000, 'Konfirmasi', 185000, '344343434', 'IMAN KUKUH', '954285_345bd95d-88fc-4b52-9055-6614394c3d66_1000_10001.jpg', 2, '11-07-2019', 'BRI', '2019-07-10 21:08:07', '2019-07-11 10:34:57'),
(17, 0, 3, 'Kukuh Tri Nur Iman', 'kukuhtni06@gmail.com', '081993697777', 'Jln. Taman Sri Rejeki Selatan VII No. 46, Kalibanteng Kidul. Semarang Barat. Kota Semarang', '10072019VM2QJFBU', '2019-07-10 00:00:00', 375000, 'Konfirmasi', 375000, '48512541', 'IMAN', 'hiruma2.jpg', 3, '11-07-2019', 'BANK BCA', '2019-07-10 23:21:39', '2019-07-11 10:34:32'),
(18, 0, 3, 'Kukuh Tri Nur Iman', 'kukuhtni06@gmail.com', '081993697777', 'Jln. Taman Sri Rejeki Selatan VII No. 46, Kalibanteng Kidul. Semarang Barat. Kota Semarang', '110720191MZAKKVT', '2019-07-11 00:00:00', 900000, 'Belum', NULL, NULL, NULL, '', NULL, NULL, NULL, '2019-07-11 22:06:03', '2019-07-11 20:06:03'),
(19, 0, 3, 'Kukuh Tri Nur Iman', 'kukuhtni06@gmail.com', '081993697777', 'Jln. Taman Sri Rejeki Selatan VII No. 46, Kalibanteng Kidul. Semarang Barat. Kota Semarang', '12072019WCTH489P', '2019-07-12 00:00:00', 545000, 'Konfirmasi', 545000, '435445454534', 'ALEX', '5852cd7658215f0354495f6a.png', 4, '12-07-2019', 'BANK BRI', '2019-07-12 10:48:15', '2019-07-12 11:04:42'),
(20, 0, 3, 'Kukuh Tri Nur Iman', 'kukuhtni06@gmail.com', '081993697777', 'Jln. Taman Sri Rejeki Selatan VII No. 46, Kalibanteng Kidul. Semarang Barat. Kota Semarang', '13072019A5XMFTIG', '2019-07-13 00:00:00', 180000, 'Konfirmasi', 180000, '5145415151', 'Afif', '5852cd7658215f0354495f6a2.png', 4, '15-07-2019', 'BANK BCA', '2019-07-13 18:44:26', '2019-07-15 11:38:00'),
(21, 0, 3, 'Kukuh Tri Nur Iman', 'kukuhtni06@gmail.com', '081993697777', 'Jln. Taman Sri Rejeki Selatan VII No. 46, Kalibanteng Kidul. Semarang Barat. Kota Semarang', '13072019BYVX4AEI', '2019-07-13 00:00:00', 115000, 'Konfirmasi', 115000, '48512541484843434', 'Budi ', '954285_345bd95d-88fc-4b52-9055-6614394c3d66_1000_10002.jpg', 4, '14-07-2019', 'BANK BCA', '2019-07-13 18:47:13', '2019-07-14 06:32:56'),
(22, 0, 3, 'Kukuh Tri Nur Iman', 'kukuhtni06@gmail.com', '081993697777', 'Jln. Taman Sri Rejeki Selatan VII No. 46, Kalibanteng Kidul. Semarang Barat. Kota Semarang', '14072019BJEYS2DX', '2019-07-14 00:00:00', 1605000, 'Konfirmasi', 1605000, '6621616415616', 'Asmananda Sabila', '954285_36d5a49c-cb68-4187-b696-6e415fe3359e_2048_27302.jpg', 4, '14-07-2019', 'BANK BCA', '2019-07-14 15:06:14', '2019-07-14 13:07:04'),
(23, 0, 5, 'Asmananda Sabila', 'aas@gmail.com', '081993697937', 'Ds. Randusari RT003/RW003, Kec. Losari Kab. Brebes Prov. Jawa Tengah', '15072019E1HFRVGC', '2019-07-15 00:00:00', 550000, 'Konfirmasi', 550000, '51551562162158418', 'Asmananda Sabila', '954285_5fe2b90f-573f-4f97-98e9-53945d6208d9_1365_20481.jpg', 4, '15-07-2019', 'BANK BRI', '2019-07-15 07:30:54', '2019-07-15 05:33:48'),
(24, 0, 5, 'Asmananda Sabila', 'aas@gmail.com', '081993697937', 'Ds. Randusari RT003/RW003, Kec. Losari Kab. Brebes Prov. Jawa Tengah', '15072019C9L42UAP', '2019-07-15 00:00:00', 250000, 'Belum', NULL, NULL, NULL, '', NULL, NULL, NULL, '2019-07-15 07:31:32', '2019-07-15 05:31:32'),
(25, 0, 7, 'Inza Maliana', 'inza@gmail.com', '085200558996', 'Jln. RA Kartini 90, Brebes', '15072019Y92KIVJQ', '2019-07-15 00:00:00', 545000, 'Belum', NULL, NULL, NULL, '', NULL, NULL, NULL, '2019-07-15 07:42:46', '2019-07-15 05:42:46'),
(26, 0, 8, 'Nadhiya Ghaida Utama', 'nadhiya@gmail.com', '085669663665', 'Jln. Kota Baru Raya, Brebes', '15072019L6O98BKL', '2019-07-15 00:00:00', 550000, 'Belum', NULL, NULL, NULL, '', NULL, NULL, NULL, '2019-07-15 07:44:31', '2019-07-15 05:44:31'),
(27, 0, 9, 'Anisa Bahar', 'bahar@gmail.com', '085996552663', 'Jln. Taman Sri Rejeki Selatan VII No. 46, Kalibanteng Kidul. Semarang Barat. Kota Semarang', '15072019I0U2GPEU', '2019-07-15 00:00:00', 250000, 'Belum', NULL, NULL, NULL, '', NULL, NULL, NULL, '2019-07-15 07:49:57', '2019-07-15 05:49:57'),
(28, 0, 10, 'Fithria Aushafa', 'fitri@gmail.com', '085200258699', 'Jln. Kembang Arung 56, Brebes', '15072019QBCYVGB3', '2019-07-15 00:00:00', 295000, 'Konfirmasi', 295000, '4353454545', 'Fithria', '954285_36d5a49c-cb68-4187-b696-6e415fe3359e_2048_27303.jpg', 4, '15-07-2019', 'BANK BRI', '2019-07-15 10:55:40', '2019-07-15 09:13:38'),
(29, 0, 10, 'Fithria Aushafa', 'fitri@gmail.com', '085200258699', 'Jln. Kembang Arung 56, Brebes', '150720199FQEA7Z8', '2019-07-15 00:00:00', 410000, 'Belum', NULL, NULL, NULL, '', NULL, NULL, NULL, '2019-07-15 10:56:43', '2019-07-15 08:56:43'),
(30, 0, 11, 'Tria Aulia Rosti', 'tria@gmail.com', '085244588588', 'Jln. Tri Lomba Juang 90, Brebes', '15072019J0OBWKSH', '2019-07-15 00:00:00', 115000, 'Konfirmasi', 115000, '23232434324', 'TRIA', '5852cd7658215f0354495f6a1.png', 4, '15-07-2019', 'BANK BCA', '2019-07-15 11:02:42', '2019-07-15 09:12:48'),
(32, 0, 10, 'Fithria Aushafa', 'fitri@gmail.com', '085200258699', 'Jln. Kembang Arung 56, Brebes', '15072019WGAPLCA9', '2019-07-15 00:00:00', 2580000, 'Konfirmasi', 2580000, '3434545454332', 'Fithria ', '954285_7806c361-df72-410a-ba2b-dbfb70ff77f8_1200_12001.png', 4, '15-07-2019', 'BANK BCA', '2019-07-15 11:14:59', '2019-07-15 09:15:37'),
(33, 0, 14, 'Tri Iman', 'tri@gmail.com', '085200865969', 'Jln. Randusari 90, Losari Brebes', '15072019NLOYYZGB', '2019-07-15 00:00:00', 115000, 'Belum', NULL, NULL, NULL, '', NULL, NULL, NULL, '2019-07-15 11:26:04', '2019-07-15 09:26:04'),
(34, 0, 16, 'Ade Putra', 'adeputra@gmail.com', '085226336336', 'Jln. Limbangan 87, Brebes', '15072019HU6TYG2B', '2019-07-15 00:00:00', 295000, 'Belum', NULL, NULL, NULL, '', NULL, NULL, NULL, '2019-07-15 11:33:22', '2019-07-15 09:33:22'),
(35, 0, 17, 'Andi Septian', 'andi@gmail.com', '087889009887', 'Jln. Terlangu Wetan 87, Brebes', '15072019EVJHD73C', '2019-07-15 00:00:00', 295000, 'Konfirmasi', 295000, '4343433', 'Andi', '954285_4bdb62c2-7df5-44dd-a6a5-a23b9d75f6c0_1108_14781.jpg', 4, '15-07-2019', 'BANK BCA', '2019-07-15 11:36:27', '2019-07-15 09:36:53'),
(36, 0, 18, 'Malik Nur Halilintar', 'malik@gmail.com', '085996558998', 'Jln. Terlangu Kidul 89, Brebes', '15072019L14DDGFN', '2019-07-15 00:00:00', 115000, 'Belum', NULL, NULL, NULL, '', NULL, NULL, NULL, '2019-07-15 11:40:38', '2019-07-15 09:40:38'),
(37, 0, 3, 'Kukuh Tri Nur Iman', 'kukuhtni06@gmail.com', '081993697777', 'Jln. Taman Sri Rejeki Selatan VII No. 46, Kalibanteng Kidul. Semarang Barat. Kota Semarang', '15072019S70UO6OM', '2019-07-15 00:00:00', 640000, 'Konfirmasi', 640000, '343434343', 'Kukuh', '134.jpg', 4, '15-07-2019', 'BANK BCA', '2019-07-15 12:02:25', '2019-07-15 10:02:56'),
(38, 0, 19, 'Bayu TNI', 'bayutni@gmail.com', '0852255886699', 'Jln. DI Panjaitan, Purwokerto', '150720190WJFH7VM', '2019-07-15 00:00:00', 475000, 'Belum', NULL, NULL, NULL, '', NULL, NULL, NULL, '2019-07-15 13:40:25', '2019-07-15 11:40:25'),
(39, 0, 3, 'Kukuh Tri Nur Iman', 'kukuhtni06@gmail.com', '081993697777', 'Jln. Taman Sri Rejeki Selatan VII No. 46, Kalibanteng Kidul. Semarang Barat. Kota Semarang', '15072019D4PXB3HV', '2019-07-15 00:00:00', 605000, 'Konfirmasi', 605000, '61854185185', 'Kukuh', '954285_5fe2b90f-573f-4f97-98e9-53945d6208d9_1365_20482.jpg', 4, '15-07-2019', 'BANK BCA', '2019-07-15 21:10:12', '2019-07-15 19:11:11');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) NOT NULL,
  `slug_kategori` varchar(255) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `urutan` int(11) DEFAULT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `slug_kategori`, `nama_kategori`, `urutan`, `tanggal_update`) VALUES
(5, 'kaos-anime', 'Kaos Anime', 1, '2019-07-05 12:14:12'),
(6, 'sweater-anime', 'Sweater Anime', 2, '2019-07-05 12:14:04'),
(7, 'ransel-anime', 'Ransel Anime', 3, '2019-07-05 12:20:11'),
(8, 'boneka-acc-anime', 'Boneka & Acc Anime', 4, '2019-07-06 20:57:39');

-- --------------------------------------------------------

--
-- Table structure for table `tb_konfigurasi`
--

CREATE TABLE `tb_konfigurasi` (
  `id_konfigurasi` int(11) NOT NULL,
  `namaweb` varchar(255) NOT NULL,
  `tagline` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `keyword` text,
  `metatext` text,
  `telephone` varchar(50) DEFAULT NULL,
  `alamat` varchar(300) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `deskripsi` text,
  `logo` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `rek_pembayaran` varchar(255) DEFAULT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_konfigurasi`
--

INSERT INTO `tb_konfigurasi` (`id_konfigurasi`, `namaweb`, `tagline`, `email`, `website`, `keyword`, `metatext`, `telephone`, `alamat`, `facebook`, `instagram`, `deskripsi`, `logo`, `icon`, `rek_pembayaran`, `tanggal_update`) VALUES
(1, 'HirumaFashionZ', 'Menjual Produk Fashion Anime', 'kukuhtni06@gmail.com', 'www.hirumafashionz.com', 'Toko Anime, Anime Store, Jaket Anime, Kaos Anime', 'OK', '085200863376', 'Jln. Taman Sri Rejeki Selatan VII No. 46, Kalibanteng Kidul, Semarang Barat,. Kota Semarang', 'https://www.facebook.com/kukuhtri.nuriman', 'https://www.instagram.com/kukuh_tni', 'HirumaFashionZ ⭐️ \r\nBerlokasi di kota Semarang - IG : kukuh_tni\r\nSemua barang premium quality original Tokyo Land - Ready stok siap kirim - Pengiriman hari yg sama - Semua produk bisa untuk laki dan perempuan - Bonus sticker2 anime setiap pembelian apapun ⭐️', 'eyeshield_21_31.png', 'eyeshield_21_311.png', 'OK', '2019-07-11 19:37:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pelanggan`
--

CREATE TABLE `tb_pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status_pelanggan` varchar(20) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(64) NOT NULL,
  `telephone` varchar(50) DEFAULT NULL,
  `alamat` varchar(300) DEFAULT NULL,
  `tanggal_daftar` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`id_pelanggan`, `id_user`, `status_pelanggan`, `nama_pelanggan`, `email`, `password`, `telephone`, `alamat`, `tanggal_daftar`, `tanggal_update`) VALUES
(1, 0, 'Pending', 'kukuh', 'kukuh@gmail.com', '9e9d73be9af817b0cf220b030dd71cb0e6c27cec', '23234343', 'fefefef', '2019-07-09 13:17:19', '2019-07-09 11:17:19'),
(2, 0, 'Pending', 'Budi Santoso', 'budisantoso@gmail.com', 'ccce42430fc054ee8199d4704e6c623aefb531e7', '085200863376', 'Jakarta Bandung Surabaya', '2019-07-10 06:08:34', '2019-07-10 04:08:34'),
(3, 0, 'Pending', 'Kukuh Tri Nur Iman', 'kukuhtni06@gmail.com', 'ebc8737d1cd2334a0f966f5832268ef9d3b48491', '081993697777', 'Jln. Taman Sri Rejeki Selatan VII No. 46, Kalibanteng Kidul. Semarang Barat. Kota Semarang', '2019-07-10 07:26:25', '2019-07-15 19:22:33'),
(4, 0, 'Pending', 'Bayu Dwi Haryanto', 'bayu@gmail.com', '9d3b5eed0b27f60c35bcff543f1b90d84a55d0bc', '085200885669', 'Jln. Jalan Ke Taman ', '2019-07-10 08:21:28', '2019-07-10 06:21:28'),
(5, 0, 'Pending', 'Asmananda Sabila', 'aas@gmail.com', 'ebc8737d1cd2334a0f966f5832268ef9d3b48491', '081993697937', 'Ds. Randusari RT003/RW003, Kec. Losari Kab. Brebes Prov. Jawa Tengah', '2019-07-15 07:30:44', '2019-07-15 05:30:44'),
(6, 0, 'Pending', 'Nadia Zulfa', 'zulfa@gmail.com', 'ebc8737d1cd2334a0f966f5832268ef9d3b48491', '085200256869', 'Jln. DI Panjaitan, Purwokerto', '2019-07-15 07:40:15', '2019-07-15 05:40:15'),
(7, 0, 'Pending', 'Inza Maliana', 'inza@gmail.com', 'ebc8737d1cd2334a0f966f5832268ef9d3b48491', '085200558996', 'Jln. RA Kartini 90, Brebes', '2019-07-15 07:41:42', '2019-07-15 05:41:42'),
(8, 0, 'Pending', 'Nadhiya Ghaida Utama', 'nadhiya@gmail.com', 'ebc8737d1cd2334a0f966f5832268ef9d3b48491', '085669663665', 'Jln. Kota Baru Raya, Brebes', '2019-07-15 07:44:24', '2019-07-15 05:44:24'),
(9, 0, 'Pending', 'Anisa Bahar', 'bahar@gmail.com', 'ebc8737d1cd2334a0f966f5832268ef9d3b48491', '085996552663', 'Jln. Taman Sri Rejeki Selatan VII No. 46, Kalibanteng Kidul. Semarang Barat. Kota Semarang', '2019-07-15 07:48:37', '2019-07-15 05:48:37'),
(10, 0, 'Pending', 'Fithria Aushafa', 'fitri@gmail.com', 'ebc8737d1cd2334a0f966f5832268ef9d3b48491', '085200258699', 'Jln. Kembang Arung 56, Brebes', '2019-07-15 10:55:27', '2019-07-15 08:55:27'),
(11, 0, 'Pending', 'Tria Aulia Rosti', 'tria@gmail.com', 'ebc8737d1cd2334a0f966f5832268ef9d3b48491', '085244588588', 'Jln. Tri Lomba Juang 90, Brebes', '2019-07-15 11:00:59', '2019-07-15 09:00:59'),
(12, 0, 'Pending', 'Ahmad', 'ahmad@gmail.com', 'ebc8737d1cd2334a0f966f5832268ef9d3b48491', '0852669669', 'Jln. Bulakamba 60, Brebes', '2019-07-15 11:23:08', '2019-07-15 09:23:08'),
(13, 0, 'Pending', 'Ahmad Budi', 'ahmadbudi@gmail.com', '1f212152cd21f846062dc6c532e8096b1faecac6', '0852669669', 'Jln. Bulakamba 60, Brebes', '2019-07-15 11:24:07', '2019-07-15 09:24:07'),
(14, 0, 'Pending', 'Tri Iman', 'tri@gmail.com', 'ebc8737d1cd2334a0f966f5832268ef9d3b48491', '085200865969', 'Jln. Randusari 90, Losari Brebes', '2019-07-15 11:25:44', '2019-07-15 09:25:44'),
(15, 0, 'Pending', 'Kukuh Iman', 'iman97@gmail.com', 'ebc8737d1cd2334a0f966f5832268ef9d3b48491', '085225669886', 'Jln. Abdulrahman Soleh 89, Brebes', '2019-07-15 11:29:36', '2019-07-15 09:29:36'),
(16, 0, 'Pending', 'Ade Putra', 'adeputra@gmail.com', 'ebc8737d1cd2334a0f966f5832268ef9d3b48491', '085226336336', 'Jln. Limbangan 87, Brebes', '2019-07-15 11:33:14', '2019-07-15 09:33:14'),
(17, 0, 'Pending', 'Andi Septian', 'andi@gmail.com', 'ebc8737d1cd2334a0f966f5832268ef9d3b48491', '087889009887', 'Jln. Terlangu Wetan 87, Brebes', '2019-07-15 11:36:03', '2019-07-15 09:36:03'),
(18, 0, 'Pending', 'Malik Nur Halilintar', 'malik@gmail.com', 'ebc8737d1cd2334a0f966f5832268ef9d3b48491', '085996558998', 'Jln. Terlangu Kidul 89, Brebes', '2019-07-15 11:39:54', '2019-07-15 09:39:54'),
(19, 0, 'Pending', 'Bayu TNI', 'bayutni@gmail.com', 'ebc8737d1cd2334a0f966f5832268ef9d3b48491', '0852255886699', 'Jln. DI Panjaitan, Purwokerto', '2019-07-15 13:40:15', '2019-07-15 11:40:15'),
(20, 0, 'Pending', 'dd', 'diendra@gmail.com', 'fa0fda0140679eb2cd40a2369ab5187aa57f7e90', '0', 'dad', '2019-07-28 06:47:20', '2019-07-28 04:47:20');

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id_produk` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `kode_produk` varchar(20) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `slug_produk` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `keyword` text,
  `harga` int(11) NOT NULL,
  `stok` int(11) DEFAULT NULL,
  `gambar` varchar(255) NOT NULL,
  `berat` float DEFAULT NULL,
  `ukuran` varchar(255) DEFAULT NULL,
  `status_produk` varchar(20) NOT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`id_produk`, `id_user`, `id_kategori`, `kode_produk`, `nama_produk`, `slug_produk`, `keterangan`, `keyword`, `harga`, `stok`, `gambar`, `berat`, `ukuran`, `status_produk`, `tanggal_post`, `tanggal_update`) VALUES
(14, 1, 7, 'SAO2', 'BAGPACK SAO NAVY', 'bagpack-sao-navysao2', '<p>Material : Cordura , Sablon Rubber<br />\r\nTersedia Tempat Laptop , bisa masuk laptop up to 16 Inch<br />\r\npanjang 32cm , lebar 15cm , tinggi 43cm</p>\r\n', 'BAGPACK SAO NAVY            ', 225000, 10, '954285_0ef5b90f-2eb9-4435-b21c-9e74606e87e2_2048_20481.jpg', 2, 'Panjang 32cm , Lebar 15cm , Tinggi 43cm', 'Publish', '2019-07-04 19:17:55', '2019-07-12 08:29:44'),
(15, 1, 7, 'SAO1', 'SAO Anti theft Bagpack', 'sao-anti-theft-bagpacksao1', '<p>Full Bordir - Full busa - Bahan Tebal - Super Premium Quality - Anti Maling<br />\r\n<br />\r\nTersedia Tempat Laptop , bisa masuk laptop up to 16 Inch<br />\r\npanjang 32cm , lebar 15cm , tinggi 43cm</p>\r\n', 'SAO Anti theft Bagpack                 ', 250000, 10, '954285_fb7e4388-5059-4be9-8c58-d2f0e5ff733f_1000_1000_(1).jpg', 2, 'Panjang 32cm , Lebar 15cm , Tinggi 43cm', 'Publish', '2019-07-04 19:18:40', '2019-07-12 08:27:45'),
(16, 1, 7, 'OP3', 'ONEPIECE Anti theft Bagpack', 'onepiece-anti-theft-bagpackop3', '<p>Full Bordir - Full busa - Bahan Tebal - Super Premium Quality - Anti Maling<br />\r\n<br />\r\nTersedia Tempat Laptop , bisa masuk laptop up to 16 Inch<br />\r\npanjang 32cm , lebar 15cm , tinggi 43cm</p>\r\n', 'ONEPIECE Anti theft Bagpack                ', 250000, 10, '954285_15c76641-d80f-452d-abc4-12b7267b6f7d_1000_1000.png', 2, 'Panjang 32cm , Lebar 15cm , Tinggi 43cm', 'Publish', '2019-07-04 22:41:50', '2019-07-12 08:27:13'),
(17, 1, 5, 'OP2', 'KAOS LUFFY CREW WHITE', 'kaos-luffy-crew-whiteop2', '<p>NOTE : Semua Produk kita bisa untuk Cewe Cowo, kita pakai model Cewe untuk katalog ^^<br />\r\nSpesifikasi KAOS&nbsp;<br />\r\nBAHAN : COTTON COMBED 24s,&nbsp;<br />\r\nPREMIUM QUALITY , ADEM NYAMAN DIJAMIN MANTAP&nbsp;<br />\r\nSIZE M : Panjang 72cm lebar 48cm&nbsp;<br />\r\nSIZE L : Panjang 74cm lebar 50cm&nbsp;<br />\r\nSIZE XL : Panjang 76cm lebar 54cm</p>\r\n', 'KAOS LUFFY CREW WHITE      ', 105000, 10, '954285_0071cc1f-b3f9-456a-b32d-0709bd888d0c_1219_1219.png', 1, 'XL', 'Publish', '2019-07-05 13:17:24', '2019-07-08 15:43:17'),
(18, 1, 5, 'OP1', 'KAOS OP WORLD BLACK', 'kaos-op-world-blackop1', '<p>NOTE : Semua Produk kita bisa untuk Cewe Cowo, kita pakai model Cewe untuk katalog ^^<br />\r\nSpesifikasi KAOS&nbsp;<br />\r\nBAHAN : COTTON COMBED 24s,&nbsp;<br />\r\nPREMIUM QUALITY , ADEM NYAMAN DIJAMIN MANTAP&nbsp;<br />\r\nSIZE M : Panjang 72cm lebar 48cm&nbsp;<br />\r\nSIZE L : Panjang 74cm lebar 50cm&nbsp;<br />\r\nSIZE XL : Panjang 76cm lebar 54cm</p>\r\n', 'kaos one piece world black                    ', 120000, 10, '954285_7806c361-df72-410a-ba2b-dbfb70ff77f8_1200_1200.png', 1, 'M', 'Publish', '2019-07-05 14:16:48', '2019-07-08 15:44:05'),
(19, 1, 6, 'SNK1', 'Sweater SNK Stripe Black', 'sweater-snk-stripe-blacksnk1', '<p>NOTE : Semua Produk kita bisa untuk Cewe Cowo, kita pakai model Cewe untuk katalog ^^<br />\r\nSpesifikasi SWEATER &amp; KAOS HOODIE<br />\r\nBAHAN : COTTON&nbsp;<br />\r\nPREMIUM QUALITY , ADEM NYAMAN DIJAMIN MANTAP&nbsp;<br />\r\nSIZE M : Panjang 72cm lebar 48cm&nbsp;<br />\r\nSIZE L : Panjang 74cm lebar 50cm&nbsp;<br />\r\nSIZE XL : Panjang 76cm lebar 54cm</p>\r\n', '    Sweater SNK Stripe Black    ', 225000, 10, '954285_fa41a193-ad91-4589-9b1c-7bc04aac6ec6_2048_2048.png', 1, 'L', 'Publish', '2019-07-05 14:33:21', '2019-07-12 08:26:21'),
(20, 1, 6, 'OPM1', 'SWEATER OPPAI RED', 'sweater-oppai-redopm1', '<p>NOTE : Semua Produk kita bisa untuk Cewe Cowo, kita pakai model Cewe untuk katalog ^^<br />\r\nSpesifikasi SWEATER &amp; KAOS HOODIE<br />\r\nBAHAN : COTTON&nbsp;<br />\r\nPREMIUM QUALITY , ADEM NYAMAN DIJAMIN MANTAP&nbsp;<br />\r\nSIZE M : Panjang 72cm lebar 48cm&nbsp;<br />\r\nSIZE L : Panjang 74cm lebar 50cm&nbsp;<br />\r\nSIZE XL : Panjang 76cm lebar 54cm</p>\r\n', '    SWEATER OPPAI RED    ', 185000, 10, '954285_8dae1979-b5ca-4a6d-98b2-20c3bff9b6aa_1219_1219.png', 1, 'XL', 'Publish', '2019-07-05 14:34:32', '2019-07-08 15:45:49'),
(23, 1, 5, 'SNK2', 'KAOS ANIME SHINGEKI NO KYOJIN SNK GOLD Edition', 'kaos-anime-shingeki-no-kyojin-snk-gold-editionsnk2', '<p>NOTE : Semua Produk kita bisa untuk Cewe Cowo, kita pakai model Cewe untuk katalog ^^<br />\r\nSpesifikasi KAOS<br />\r\nBAHAN : COTTON COMBED 24s,<br />\r\nPREMIUM QUALITY , ADEM NYAMAN DIJAMIN MANTAP<br />\r\nSIZE M : Panjang 72cm lebar 48cm<br />\r\nSIZE L : Panjang 74cm lebar 50cm<br />\r\nSIZE XL : Panjang 76cm lebar 54cm</p>\r\n', '    KAOS ANIME SHINGEKI NO KYOJIN SNK GOLD Edition                    ', 150000, 10, '954285_345bd95d-88fc-4b52-9055-6614394c3d66_1000_1000.jpg', 1, 'XL', 'Publish', '2019-07-06 22:53:22', '2019-07-08 05:00:49'),
(24, 1, 8, 'TG1', 'Boneka Kaneki', 'boneka-kanekitg1', '<p>Menjual Jaket , Kaos , Sweater , dan Blazer Anime<br />\r\n<br />\r\nEST&nbsp;<a href=\"https://tkp.me/r?url=http://2.0.1.2\" target=\"_blank\">2&bull;0&bull;1&bull;2</a>&nbsp;We Proud Of You<br />\r\n<br />\r\nStore : Komplek MMTC Pancing Blok D-72 Medan , Indonesia<br />\r\nBuka jam 9 Pagi - 7 Malam<br />\r\n<br />\r\nUntuk Bahan Jaket : Cotton Fleece , Adidas Poly<br />\r\nUntuk Bahan Kaos : Cotton Combed 20<br />\r\nuntuk bahan blazer : Baby canvas Drill</p>\r\n', '    Boneka Kaneki    ', 150000, 10, '954285_3d4ba898-2c65-45ef-aca9-12d11cd30fa0.jpg', 3, 'L', 'Publish', '2019-07-06 22:58:46', '2019-07-12 08:25:35'),
(25, 1, 6, 'ass1', 'Sweater Koro Sensei', 'sweater-koro-senseiass1', '<p>NOTE : Semua Produk kita bisa untuk Cewe Cowo, kita pakai model Cewe untuk katalog ^^<br />\r\nSpesifikasi SWEATER<br />\r\nBAHAN : COTTON COMBED 24s,&nbsp;<br />\r\nPREMIUM QUALITY , ADEM NYAMAN DIJAMIN MANTAP&nbsp;<br />\r\nSIZE M : Panjang 72cm lebar 48cm&nbsp;<br />\r\nSIZE L : Panjang 74cm lebar 50cm&nbsp;<br />\r\nSIZE XL : Panjang 76cm lebar 54cm</p>\r\n', '    Sweater Koro Sensei    ', 225000, 10, '954285_c9d10d9a-b16d-41d0-aa64-5cf9fbceb788_500_498.jpg', 2, 'XL', 'Publish', '2019-07-08 17:49:06', '2019-07-08 15:49:57'),
(26, 1, 8, 'OPM2', 'SWEATER OPPAI NEW', 'sweater-oppai-newopm2', '<p>NOTE : Semua Produk kita bisa untuk Cewe Cowo, kita pakai model Cewe untuk katalog ^^<br />\r\nSpesifikasi SWEATER &amp; KAOS HOODIE<br />\r\nBAHAN : COTTON&nbsp;<br />\r\nPREMIUM QUALITY , ADEM NYAMAN DIJAMIN MANTAP&nbsp;<br />\r\nSIZE M : Panjang 72cm lebar 48cm&nbsp;<br />\r\nSIZE L : Panjang 74cm lebar 50cm&nbsp;<br />\r\nSIZE XL : Panjang 76cm lebar 54cm</p>\r\n', 'SWEATER OPPAI NEW    ', 185000, 10, '954285_8037d0c8-118a-4a21-8d0c-c6cfb9f10c19_1000_1000.png', 2, 'L', 'Publish', '2019-07-08 17:51:59', '2019-07-08 15:51:59'),
(27, 1, 7, 'NT1', 'Bagpack anti theft Uchiha -Tas ransel anti maling uchiha clan Naruto', 'bagpack-anti-theft-uchiha-tas-ransel-anti-maling-uchiha-clan-narutont1', '<p>[ RARE ITEMS ] ANIME ANTI THEFT BAGPACK&nbsp;<br />\r\nBAGPACK ANTI THEFT UCHIHA&nbsp;<br />\r\nKurang lebih&nbsp;<br />\r\nDIMENSI TAS P x L x T ( 30 x 15 x 42 )&nbsp;<br />\r\n-Water Repellent<br />\r\n( Tidak langsung basah meresap air )<br />\r\n<br />\r\n-Adjustable Open Angle&nbsp;<br />\r\n( Cara Buka Ransel unik yang menghindari maling)<br />\r\nRansel di buka dari bagian dalam punggung !&nbsp;<br />\r\n<br />\r\n-Dilengkapi dengan USB Port&nbsp;<br />\r\n( untuk ngecas sambil main papji :p )&nbsp;<br />\r\n<br />\r\n-ANTI THEFT ANTI CUT !!&nbsp;<br />\r\n( Bahan Full busa super Tebal , menyusahkan si Maling )<br />\r\n<br />\r\n-Advanced storage Design&nbsp;<br />\r\n( Tempat penyimpanan yang sangat banyak ! Kamera , Laptop , ipad , Tablet , powerbank ! )&nbsp;<br />\r\n<br />\r\n-SHOCK PROFF !<br />\r\n( Dengan busa yang sangat banyak dan tebal , sangat aman untuk gadget2 agan2 sekalian loh )&nbsp;<br />\r\n<br />\r\n-Road Security<br />\r\n( Aman sekali untuk dipakai bepergian Jauh / Dekat )</p>\r\n', '    Bagpack anti theft Uchiha -Tas ransel anti maling uchiha clan Naruto        ', 250000, 10, 'oi.jpg', 5, 'Panjang 32cm , Lebar 15cm , Tinggi 43cm', 'Publish', '2019-07-12 10:36:11', '2019-07-12 08:38:53'),
(28, 1, 5, 'OP6', 'Kaos LUFFY GEAR4TH KING COBRA', 'kaos-luffy-gear4th-king-cobraop6', '<p>NOTE : Semua Produk kita bisa untuk Cewe Cowo, kita pakai model Cewe untuk katalog ^^<br />\r\nSpesifikasi KAOS&nbsp;<br />\r\nBAHAN : COTTON COMBED 24s,&nbsp;<br />\r\nPREMIUM QUALITY , ADEM NYAMAN DIJAMIN MANTAP&nbsp;<br />\r\nSIZE M : Panjang 72cm lebar 48cm&nbsp;<br />\r\nSIZE L : Panjang 74cm lebar 50cm&nbsp;<br />\r\nSIZE XL : Panjang 76cm lebar 54cm</p>\r\n', 'Kaos LUFFY GEAR4TH KING COBRA', 115000, 10, '954285_53b8b741-308f-4c51-a98d-0d6e83f0b829_1200_1200.png', 1, 'XL', 'Publish', '2019-07-12 10:41:41', '2019-07-12 08:41:41'),
(29, 1, 5, 'SNK3', 'LONGSLEEVE SNK KANJI GOLD NEW', 'longsleeve-snk-kanji-gold-newsnk3', '<p>NOTE : Semua Produk kita bisa untuk Cewe Cowo, kita pakai model Cewe untuk katalog ^^<br />\r\nSpesifikasi KAOS&nbsp;<br />\r\nBAHAN : COTTON COMBED 24s,&nbsp;<br />\r\nPREMIUM QUALITY , ADEM NYAMAN DIJAMIN MANTAP&nbsp;<br />\r\nSIZE M : Panjang 72cm lebar 48cm&nbsp;<br />\r\nSIZE L : Panjang 74cm lebar 50cm&nbsp;<br />\r\nSIZE XL : Panjang 76cm lebar 54cm</p>\r\n', '    LONGSLEEVE SNK KANJI GOLD NEW', 180000, 10, '954285_55b32cc9-1241-48bb-90b6-8da1892f67c4_2048_2048.jpg', 1, 'M', 'Publish', '2019-07-12 10:45:31', '2019-07-12 08:45:31'),
(30, 1, 5, 'BC1', 'LONGSLEEVE BLACKBULL GOLD NEW', 'longsleeve-blackbull-gold-newbc1', '<p>NOTE : Semua Produk kita bisa untuk Cewe Cowo, kita pakai model Cewe untuk katalog ^^<br />\r\nSpesifikasi KAOS&nbsp;<br />\r\nBAHAN : COTTON COMBED 24s,&nbsp;<br />\r\nPREMIUM QUALITY , ADEM NYAMAN DIJAMIN MANTAP&nbsp;<br />\r\nSIZE M : Panjang 72cm lebar 48cm&nbsp;<br />\r\nSIZE L : Panjang 74cm lebar 50cm&nbsp;<br />\r\nSIZE XL : Panjang 76cm lebar 54cm</p>\r\n', '    LONGSLEEVE BLACKBULL GOLD NEW        ', 180000, 10, '954285_9fbe3eac-35eb-4eae-8988-fdb9422b289a_1080_1080.jpg', 1, 'XL', 'Publish', '2019-07-15 12:06:42', '2019-07-15 10:09:11');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rekening`
--

CREATE TABLE `tb_rekening` (
  `id_rekening` int(11) NOT NULL,
  `nama_bank` varchar(255) NOT NULL,
  `nomor_rekening` varchar(20) NOT NULL,
  `nama_pemilik` varchar(255) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `tanggal_post` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_rekening`
--

INSERT INTO `tb_rekening` (`id_rekening`, `nama_bank`, `nomor_rekening`, `nama_pemilik`, `gambar`, `tanggal_post`) VALUES
(2, 'BRI', '181485151881818', 'Kukuh Tri Nur Iman', NULL, '2019-07-10 18:54:23'),
(3, 'BCA', '32323243434343', 'Iman', NULL, '2019-07-10 18:55:52'),
(4, 'BNI', '54512541861561', 'Kukuh TNI', NULL, '2019-07-11 20:05:32');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `kode_transaksi` varchar(255) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `tanggal_transaksi` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `id_user`, `id_pelanggan`, `kode_transaksi`, `id_produk`, `harga`, `jumlah`, `total_harga`, `tanggal_transaksi`, `tanggal_update`) VALUES
(1, 0, 1, '09072019A6GG8PKT', 18, 120000, 1, 120000, '2019-07-09 00:00:00', '2019-07-09 11:17:36'),
(2, 0, 1, '09072019A6GG8PKT', 24, 150000, 1, 150000, '2019-07-09 00:00:00', '2019-07-09 11:17:36'),
(3, 0, 1, '09072019HETCU5JF', 26, 185000, 1, 185000, '2019-07-09 00:00:00', '2019-07-09 11:35:21'),
(4, 0, 1, '09072019OPTXDE4I', 17, 105000, 1, 105000, '2019-07-09 00:00:00', '2019-07-09 11:40:11'),
(5, 0, 1, '09072019OZQCOQES', 23, 150000, 1, 150000, '2019-07-09 00:00:00', '2019-07-09 11:44:10'),
(6, 0, 1, '09072019YCZ7KPON', 26, 185000, 1, 185000, '2019-07-09 00:00:00', '2019-07-09 11:45:19'),
(7, 0, 1, '09072019F4SROYHR', 18, 120000, 1, 120000, '2019-07-09 00:00:00', '2019-07-09 11:47:53'),
(8, 0, 1, '09072019YQDOTD83', 23, 150000, 2, 300000, '2019-07-09 00:00:00', '2019-07-09 11:53:31'),
(9, 0, 1, '09072019ZQRNSYEY', 20, 185000, 10, 1850000, '2019-07-09 00:00:00', '2019-07-09 12:00:37'),
(10, 0, 1, '09072019ZQRNSYEY', 24, 150000, 1, 150000, '2019-07-09 00:00:00', '2019-07-09 12:00:37'),
(11, 0, 4, '1007201984LREFQT', 25, 225000, 1, 225000, '2019-07-10 00:00:00', '2019-07-10 06:22:21'),
(12, 0, 4, '1007201984LREFQT', 24, 150000, 1, 150000, '2019-07-10 00:00:00', '2019-07-10 06:22:21'),
(13, 0, 3, '10072019TVEKV4WT', 26, 185000, 1, 185000, '2019-07-10 00:00:00', '2019-07-10 07:52:40'),
(14, 0, 3, '10072019TVEKV4WT', 23, 150000, 7, 1050000, '2019-07-10 00:00:00', '2019-07-10 07:52:40'),
(15, 0, 3, '10072019TVEKV4WT', 17, 105000, 1, 105000, '2019-07-10 00:00:00', '2019-07-10 07:52:40'),
(16, 0, 3, '10072019JBITU3XZ', 23, 150000, 1, 150000, '2019-07-10 00:00:00', '2019-07-10 09:26:44'),
(17, 0, 3, '10072019JBITU3XZ', 17, 105000, 1, 105000, '2019-07-10 00:00:00', '2019-07-10 09:26:44'),
(18, 0, 3, '10072019GOINVHQM', 15, 250000, 1, 250000, '2019-07-10 00:00:00', '2019-07-10 14:20:43'),
(19, 0, 3, '10072019VKBOJ1GL', 20, 185000, 1, 185000, '2019-07-10 00:00:00', '2019-07-10 19:08:07'),
(20, 0, 3, '10072019VM2QJFBU', 24, 150000, 1, 150000, '2019-07-10 00:00:00', '2019-07-10 21:21:39'),
(21, 0, 3, '10072019VM2QJFBU', 19, 225000, 1, 225000, '2019-07-10 00:00:00', '2019-07-10 21:21:39'),
(22, 0, 3, '110720191MZAKKVT', 24, 150000, 5, 750000, '2019-07-11 00:00:00', '2019-07-11 20:06:03'),
(23, 0, 3, '110720191MZAKKVT', 23, 150000, 1, 150000, '2019-07-11 00:00:00', '2019-07-11 20:06:03'),
(24, 0, 3, '12072019WCTH489P', 27, 250000, 1, 250000, '2019-07-12 00:00:00', '2019-07-12 08:48:15'),
(25, 0, 3, '12072019WCTH489P', 28, 115000, 1, 115000, '2019-07-12 00:00:00', '2019-07-12 08:48:15'),
(26, 0, 3, '12072019WCTH489P', 29, 180000, 1, 180000, '2019-07-12 00:00:00', '2019-07-12 08:48:15'),
(27, 0, 3, '13072019A5XMFTIG', 29, 180000, 1, 180000, '2019-07-13 00:00:00', '2019-07-13 16:44:26'),
(28, 0, 3, '13072019BYVX4AEI', 28, 115000, 1, 115000, '2019-07-13 00:00:00', '2019-07-13 16:47:13'),
(29, 0, 3, '14072019BJEYS2DX', 27, 250000, 1, 250000, '2019-07-14 00:00:00', '2019-07-14 13:06:14'),
(30, 0, 3, '14072019BJEYS2DX', 16, 250000, 1, 250000, '2019-07-14 00:00:00', '2019-07-14 13:06:14'),
(31, 0, 3, '14072019BJEYS2DX', 15, 250000, 1, 250000, '2019-07-14 00:00:00', '2019-07-14 13:06:14'),
(32, 0, 3, '14072019BJEYS2DX', 14, 225000, 1, 225000, '2019-07-14 00:00:00', '2019-07-14 13:06:14'),
(33, 0, 3, '14072019BJEYS2DX', 20, 185000, 1, 185000, '2019-07-14 00:00:00', '2019-07-14 13:06:14'),
(34, 0, 3, '14072019BJEYS2DX', 29, 180000, 1, 180000, '2019-07-14 00:00:00', '2019-07-14 13:06:14'),
(35, 0, 3, '14072019BJEYS2DX', 28, 115000, 1, 115000, '2019-07-14 00:00:00', '2019-07-14 13:06:14'),
(36, 0, 3, '14072019BJEYS2DX', 23, 150000, 1, 150000, '2019-07-14 00:00:00', '2019-07-14 13:06:14'),
(37, 0, 5, '15072019E1HFRVGC', 27, 250000, 1, 250000, '2019-07-15 00:00:00', '2019-07-15 05:30:54'),
(38, 0, 5, '15072019E1HFRVGC', 26, 185000, 1, 185000, '2019-07-15 00:00:00', '2019-07-15 05:30:54'),
(39, 0, 5, '15072019E1HFRVGC', 28, 115000, 1, 115000, '2019-07-15 00:00:00', '2019-07-15 05:30:54'),
(40, 0, 5, '15072019C9L42UAP', 27, 250000, 1, 250000, '2019-07-15 00:00:00', '2019-07-15 05:31:32'),
(41, 0, 7, '15072019Y92KIVJQ', 29, 180000, 1, 180000, '2019-07-15 00:00:00', '2019-07-15 05:42:46'),
(42, 0, 7, '15072019Y92KIVJQ', 28, 115000, 1, 115000, '2019-07-15 00:00:00', '2019-07-15 05:42:46'),
(43, 0, 7, '15072019Y92KIVJQ', 27, 250000, 1, 250000, '2019-07-15 00:00:00', '2019-07-15 05:42:46'),
(44, 0, 8, '15072019L6O98BKL', 28, 115000, 1, 115000, '2019-07-15 00:00:00', '2019-07-15 05:44:31'),
(45, 0, 8, '15072019L6O98BKL', 27, 250000, 1, 250000, '2019-07-15 00:00:00', '2019-07-15 05:44:31'),
(46, 0, 8, '15072019L6O98BKL', 26, 185000, 1, 185000, '2019-07-15 00:00:00', '2019-07-15 05:44:31'),
(47, 0, 9, '15072019I0U2GPEU', 27, 250000, 1, 250000, '2019-07-15 00:00:00', '2019-07-15 05:49:57'),
(48, 0, 10, '15072019QBCYVGB3', 29, 180000, 1, 180000, '2019-07-15 00:00:00', '2019-07-15 08:55:40'),
(49, 0, 10, '15072019QBCYVGB3', 28, 115000, 1, 115000, '2019-07-15 00:00:00', '2019-07-15 08:55:40'),
(50, 0, 10, '150720199FQEA7Z8', 25, 225000, 1, 225000, '2019-07-15 00:00:00', '2019-07-15 08:56:43'),
(51, 0, 10, '150720199FQEA7Z8', 20, 185000, 1, 185000, '2019-07-15 00:00:00', '2019-07-15 08:56:43'),
(52, 0, 11, '15072019J0OBWKSH', 28, 115000, 1, 115000, '2019-07-15 00:00:00', '2019-07-15 09:02:42'),
(54, 0, 10, '15072019WGAPLCA9', 29, 180000, 2, 360000, '2019-07-15 00:00:00', '2019-07-15 09:14:59'),
(55, 0, 10, '15072019WGAPLCA9', 28, 115000, 4, 460000, '2019-07-15 00:00:00', '2019-07-15 09:14:59'),
(56, 0, 10, '15072019WGAPLCA9', 23, 150000, 4, 600000, '2019-07-15 00:00:00', '2019-07-15 09:14:59'),
(57, 0, 10, '15072019WGAPLCA9', 17, 105000, 4, 420000, '2019-07-15 00:00:00', '2019-07-15 09:14:59'),
(58, 0, 10, '15072019WGAPLCA9', 20, 185000, 4, 740000, '2019-07-15 00:00:00', '2019-07-15 09:14:59'),
(59, 0, 14, '15072019NLOYYZGB', 28, 115000, 1, 115000, '2019-07-15 00:00:00', '2019-07-15 09:26:05'),
(60, 0, 16, '15072019HU6TYG2B', 29, 180000, 1, 180000, '2019-07-15 00:00:00', '2019-07-15 09:33:22'),
(61, 0, 16, '15072019HU6TYG2B', 28, 115000, 1, 115000, '2019-07-15 00:00:00', '2019-07-15 09:33:22'),
(62, 0, 17, '15072019EVJHD73C', 29, 180000, 1, 180000, '2019-07-15 00:00:00', '2019-07-15 09:36:27'),
(63, 0, 17, '15072019EVJHD73C', 28, 115000, 1, 115000, '2019-07-15 00:00:00', '2019-07-15 09:36:27'),
(64, 0, 18, '15072019L14DDGFN', 28, 115000, 1, 115000, '2019-07-15 00:00:00', '2019-07-15 09:40:38'),
(65, 0, 3, '15072019S70UO6OM', 28, 115000, 2, 230000, '2019-07-15 00:00:00', '2019-07-15 10:02:25'),
(66, 0, 3, '15072019S70UO6OM', 26, 185000, 1, 185000, '2019-07-15 00:00:00', '2019-07-15 10:02:25'),
(67, 0, 3, '15072019S70UO6OM', 14, 225000, 1, 225000, '2019-07-15 00:00:00', '2019-07-15 10:02:25'),
(68, 0, 19, '150720190WJFH7VM', 30, 180000, 2, 360000, '2019-07-15 00:00:00', '2019-07-15 11:40:25'),
(69, 0, 19, '150720190WJFH7VM', 28, 115000, 1, 115000, '2019-07-15 00:00:00', '2019-07-15 11:40:25'),
(70, 0, 3, '15072019D4PXB3HV', 29, 180000, 1, 180000, '2019-07-15 00:00:00', '2019-07-15 19:10:12'),
(71, 0, 3, '15072019D4PXB3HV', 18, 120000, 2, 240000, '2019-07-15 00:00:00', '2019-07-15 19:10:12'),
(72, 0, 3, '15072019D4PXB3HV', 20, 185000, 1, 185000, '2019-07-15 00:00:00', '2019-07-15 19:10:12');

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `akses_level` varchar(20) NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`id_user`, `nama`, `email`, `username`, `password`, `akses_level`, `tanggal_update`) VALUES
(1, 'Kukuh Tri Nur Iman', 'pikachupikachu648@gmail.com', 'kukuh_tni', '0c746d9314d772e6a4f04323843f118b645397d3', 'Admin', '2019-07-02 06:53:39'),
(2, 'Sutrimo', 'sutrimo@gmail.com', 'sutrimo', 'Kukuh06041997', 'User', '2019-07-02 07:19:12'),
(5, 'Ade Izyudin', 'ade@gmail.com', 'adeadeade', 'adadehsdsds', 'Admin', '2019-07-02 11:38:25'),
(6, 'Yudhantlo Wibisono', 'kontloyudantlo@gmail.com', 'yudhantlo', 'b0399d2029f64d445bd131ffaa399a42d2f8e7dc', 'Admin', '2019-07-02 11:57:16'),
(7, 'Umi Palupi Margiani', 'palupi@gmail.com', 'palupiumi', 'cbcfa614eec7b809088a491f7eb9bee853d2ce52', 'Admin', '2019-07-03 17:20:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `business`
--
ALTER TABLE `business`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`rating_id`);

--
-- Indexes for table `tb_gambar`
--
ALTER TABLE `tb_gambar`
  ADD PRIMARY KEY (`id_gambar`);

--
-- Indexes for table `tb_header_transaksi`
--
ALTER TABLE `tb_header_transaksi`
  ADD PRIMARY KEY (`id_header_transaksi`),
  ADD UNIQUE KEY `kode_transaksi` (`kode_transaksi`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_konfigurasi`
--
ALTER TABLE `tb_konfigurasi`
  ADD PRIMARY KEY (`id_konfigurasi`);

--
-- Indexes for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD UNIQUE KEY `kode_produk` (`kode_produk`);

--
-- Indexes for table `tb_rekening`
--
ALTER TABLE `tb_rekening`
  ADD PRIMARY KEY (`id_rekening`),
  ADD UNIQUE KEY `nomor_rekening` (`nomor_rekening`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `business`
--
ALTER TABLE `business`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tb_gambar`
--
ALTER TABLE `tb_gambar`
  MODIFY `id_gambar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `tb_header_transaksi`
--
ALTER TABLE `tb_header_transaksi`
  MODIFY `id_header_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_konfigurasi`
--
ALTER TABLE `tb_konfigurasi`
  MODIFY `id_konfigurasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tb_rekening`
--
ALTER TABLE `tb_rekening`
  MODIFY `id_rekening` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
