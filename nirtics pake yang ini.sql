-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2023 at 04:57 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nirtics`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id_banner` int(5) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id_banner`, `nama`) VALUES
(1, 'gb1.jpg'),
(2, 'gb2.jpg'),
(3, 'gb3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_detail` int(5) NOT NULL,
  `id_tiket` int(5) DEFAULT NULL,
  `id_transaksi` int(5) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `subtotal` decimal(12,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_detail`, `id_tiket`, `id_transaksi`, `qty`, `subtotal`) VALUES
(1, 26, 1, 1, '500000'),
(2, 27, 1, 1, '600000'),
(3, 28, 1, 1, '700000'),
(4, 32, 2, 1, '700000'),
(5, 33, 2, 1, '800000'),
(6, 34, 2, 1, '900000'),
(7, 26, 3, 1, '500000'),
(8, 27, 3, 1, '600000'),
(9, 28, 3, 1, '700000');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id_event` int(5) NOT NULL,
  `id_kategori` int(5) DEFAULT NULL,
  `nama` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  `status` enum('ready','closed') NOT NULL,
  `provinsi` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id_event`, `id_kategori`, `nama`, `deskripsi`, `tanggal`, `jam`, `lokasi`, `gambar`, `status`, `provinsi`) VALUES
(1, 2, 'Ghostival by MoT', 'Leave the drabness of the mundane world behind as Ghostival whisks you away to a realm overflowing with creativity and joy. It\'s a place where problems are overshadowed by boundless exploration and where every color of the rainbow comes to life in a breathtaking display of imagination.\r\n\r\nIn this fantastical world, you’ll encounter a cast of endearing GOWS, brought to life by WD Willy\'s extraordinary imagination. These playful and lovable apparitions shed their spooky reputation and invite you into their vibrant world of fun and joy to take a break from the often dark real world. Experience art like never before in this enchanting world, brought to life by Indonesian illustrator WD Willy and Museum of Toys.', '2023-07-31', '15:00:00', 'Senayan City', 'g1.jpg', 'ready', 'Jakarta'),
(2, 6, 'Playoff IBL Tokopedia 2023', 'Playoff IBL Tokopedia 2023 Bima Perkasa Jogjakarta VS Pelita Jaya Bakrie', '2023-07-30', '19:00:00', 'GOR Pancasila UGM', 'g2.jpg', 'ready', 'Yogyakarta'),
(3, 1, 'Projek-D Vol. 2', 'PROJEK-D merupakan sebutan singkat dari Projek Dynamic (Dyandra Music & Collaborations), melalui Projek-D, Dyandra Promosindo ingin mempersembahkan festival musik yang dapat dinikmati oleh seluruh kalangan. Sejalan dengan gairah tersebut demi menciptakan ekosistem dan pengalaman baru bagi para pegiat hingga penikmat musik, khususnya yang berada di luar Kota Jakarta.\r\n\r\nSolo yang dijuluki sebagai kota penuh nuansa sejarah dan kental dengan warisan budaya, dipilih karena memiliki berbagai macam kesenian bertaraf nasional dan internasional. Serta lokasi strategis dan berkelas yang masih mudah dijangkau oleh seluruh masyarkat Joglosemar dan sekitarnya yang kini telah direvitalisasikan menjadi tempat wisata yaitu De Tjolomadoe, yang menjadi wadah kami untuk tetap mempertahankan nilai kekayaan historikal yang ada.\r\n\r\nMelalui slogan #SehidupSeparty Projek-D ingin menyampaikan kebahagiaan bisa diciptakan melalui suguhan karya musik dengan beragam aksi eksentrik dari para musisi pilihan tanah air. Hadirnya Projek-D vol. 1 membuktikan bahwa pengalaman baru dari festival musik yang menyajikan lebih dari satu panggung, memberikan dampak positif bagi generasi muda dalam menyaksikan gelaran musik yang berkualitas.\r\n\r\nProjek-D vol.2 kembali hadir dengan konsep yang lebih segar, mengusung tema “Pop of Circus” selain memberikan pengalaman baru dalam menikmati festival musik dihari penyelenggaraan, tentunya Projek-D membayar kesetiaan pengunjung Projek-D dengan berbagai kejutan di dalamnya. Deretan program seperti CEKSON dan KELAS MUSIK kami suguhkan dalam rangkaian pre-event guna menjadi wadah edukasi untuk para musisi baru. Inilah usaha kami dalam memberikan “nuansa baru” dalam suguhan festival musik.', '2023-08-05', '14:00:00', 'De Tjolomadu', 'g3.png', 'ready', 'Jawa Tengah'),
(4, 1, 'We The Fest', 'WE THE FEST 2023', '2023-08-23', '15:00:00', 'GBK - Sport Complex', 'g4.jpg', 'ready', 'Jakarta'),
(5, 4, 'What\'s My Age Again? - Purwokerto', '\'\'What\'s My Age Again?\'\' merupakan pertunjukan stand-up comedy spesial Awwe yang kedua. Show kali ini akan dilaksanakan sebagai tour di 6 kota, di antaranya: Jakarta, Bandung, Yogyakarta, Purwokerto, Surabaya dan Bali.\r\n\r\nDalam pertunjukan ini, Awwe akan menceritakan mengenai banyak sikapnya yang dianggap masih belum dewasa dan tidak sesuai dengan usianya. Judul ini diambil dari lagu band favoritnya: Blink 182, dengan judul dan tema yang sama. Menyesuaikan dengan konsep dari Blink 182, show ini akan dilaksanakan sebagai pertunjukan komedi yang dibungkus ala konser band pop punk.', '2023-08-02', '20:00:00', 'Gedung Roedhiro Unsoed', 'g5.jpg', 'ready', 'Jawa Tengah'),
(6, 4, 'What\'s My Age Again? - Jakarta', '\'\'What\'s My Age Again?\'\' merupakan pertunjukan stand-up comedy spesial Awwe yang kedua. Show kali ini akan dilaksanakan sebagai tour di 6 kota, di antaranya: Jakarta, Bandung, Yogyakarta, Purwokerto, Surabaya dan Bali.\r\n\r\nDalam pertunjukan ini, Awwe akan menceritakan mengenai banyak sikapnya yang dianggap masih belum dewasa dan tidak sesuai dengan usianya. Judul ini diambil dari lagu band favoritnya: Blink 182, dengan judul dan tema yang sama. Menyesuaikan dengan konsep dari Blink 182, show ini akan dilaksanakan sebagai pertunjukan komedi yang dibungkus ala konser band pop punk.', '2023-08-27', '19:30:00', 'Theater Besar Taman Ismail Marzuki', 'g6.jpg', 'ready', 'Jakarta'),
(7, 4, 'STANDUPFEST', 'StandUpFest Sebuah event tahunan dari Standupindo, yang sempat tertunda karena pandemi, kini kami kembali hadir. Acara diselenggarakan selama 3 hari, dimana puluhan komika akan tampil di panggung indoor dan outdoor. Selain nonton standup, kalian juga bisa jumpa dengan komika-komika dari seluruh Indonesia. Jadi mari berjumpa.', '2023-08-04', '14:00:00', 'Tennis Indoor Senayan', 'g7.jpg', 'ready', 'Jakarta'),
(8, 4, 'Stand Up Comedy Special by Yudha Keling', '\'\'Tulang Punggung\'\' adalah sebuah pertunjukan stand-up comedy special kedua dari Yudha Keling. Berbeda dari pertunjukan sebelumnya yang berfokus menceritakan pengalaman sial dalam hidup dan berinvestasi, di pertujukan kali ini, fokus utama bahasan ialah keresahan seputar dunia investasi, keuangan dan juga ekonomi.\r\n\r\nTak hanya itu, di sini Yudha Keling juga akan bercerita tentang keluh kesahnya dan ketakutan-ketakutannya sebagai seorang tulang punggung keluarga.', '2023-07-08', '19:00:00', 'Titan Center', 'g8.jpg', 'closed', 'Banten'),
(9, 6, 'Playoff IBL Tokopedia 2023 Pelita Jaya Bakrie VS Bima Perkasa Jogjakarta', 'Playoff IBL Tokopedia 2023 Pelita Jaya Bakrie VS Bima Perkasa Jogjakarta', '2023-07-02', '20:00:00', 'BRITAMA Arena', 'g9.jpg', 'ready', 'Jakarta'),
(10, 6, 'Playoff IBL Tokopedia 2023 Bali United Basketball VS Satria Muda Pertamina Jakarta', 'Playoff IBL Tokopedia 2023 Bali United Basketball VS Satria Muda Pertamina Jakarta', '2023-07-06', '17:00:00', 'GOR Merpati Bali', 'g10.jpg', 'ready', 'Bali'),
(11, 6, 'Playoff IBL Tokopedia 2023 Bumi Borneo Pontianak VS Prawira Harum Bandung', 'Playoff IBL Tokopedia 2023 Bumi Borneo Pontianak VS Prawira Harum Bandung', '2023-07-06', '20:00:00', 'Britama Arena', 'g11.png', 'ready', 'Jakarta'),
(12, 1, 'Dewa 19 All Star - Jakarta', 'DEWA 19 ALL STAR - JAKARTA', '2023-08-12', '19:00:00', 'Gelora Bung Karno', 'g12.png', 'ready', 'Jakarta'),
(13, 1, 'Dewa 19 All Start - Solo', 'DEWA 19 ALL STAR - SOLO', '2023-07-29', '19:00:00', 'Stadion Manahan', 'g13.png', 'ready', 'Jawa Tengah'),
(14, 1, 'JOYLAND JAKARTA 2023', '-Music and arts festival held outdoors in open green space\r\n\r\n-Three days of live music, comedy, film, workshops, and marketplace across different areas of the venue\r\n\r\n-A multisensory festival that collaborates with artists in various creative fields', '2023-11-24', '15:00:00', 'Ecopark Ancol', 'g14.jpg', 'ready', 'Jakarta'),
(15, 1, 'Bebaskan Energimu Konser - Sidoarjo', 'Persembahan Konser musik kolaboratif dari Kratingdaeng Indonesia untuk Sahabat NOAH yang berada di kota Sidoarjo.\r\n\r\nBebaskan Energi, tuk Jalani Mimpi!', '2023-07-08', '16:00:00', 'Parkir Timur Stadion Gelora Delta Sidoarjo', 'g15.jpg', 'ready', 'Jawa Timur');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(5) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama`) VALUES
(1, 'Musik'),
(2, 'Seni'),
(3, 'Webinar'),
(4, 'Stand-up Comedy'),
(5, 'Seminar'),
(6, 'Olahraga');

-- --------------------------------------------------------

--
-- Table structure for table `metode_pembayaran`
--

CREATE TABLE `metode_pembayaran` (
  `id_metode` int(5) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `biaya` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `metode_pembayaran`
--

INSERT INTO `metode_pembayaran` (`id_metode`, `nama`, `biaya`) VALUES
(1, 'GOPAY', '2500'),
(2, 'SHOPEEPAY', '2500'),
(3, 'DANA', '2500'),
(4, 'TRANSFER', '6500'),
(5, 'OVO', '2500'),
(6, 'LINKAJA', '2500');

-- --------------------------------------------------------

--
-- Stand-in structure for view `mytiket`
-- (See below for the actual view)
--
CREATE TABLE `mytiket` (
`id_transaksi` int(5)
,`id_user` int(5)
,`id_metode` int(5)
,`id_detail` int(5)
,`id_tiket` int(5)
,`id_event` int(5)
,`tanggal_transaksi` datetime
,`total` decimal(12,0)
,`status` enum('SUKSES','MENUNGGU','GAGAL')
,`fullname` varchar(100)
,`metode` varchar(100)
,`biaya` decimal(10,0)
,`qty` int(11)
,`subtotal` decimal(12,0)
,`tiket` varchar(100)
,`harga` decimal(10,0)
,`event` varchar(100)
,`deskripsi` text
,`tanggal` date
,`jam` time
,`lokasi` varchar(100)
,`gambar` varchar(100)
,`provinsi` varchar(100)
);

-- --------------------------------------------------------

--
-- Table structure for table `tiket`
--

CREATE TABLE `tiket` (
  `id_tiket` int(5) NOT NULL,
  `id_event` int(5) DEFAULT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` decimal(10,0) NOT NULL,
  `stok` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tiket`
--

INSERT INTO `tiket` (`id_tiket`, `id_event`, `nama`, `harga`, `stok`) VALUES
(1, 1, 'Festival', '150000', 2000),
(2, 2, 'Tribun', '40000', 500),
(3, 3, 'Early Bird', '200000', 1000),
(4, 3, 'Presale 1', '250000', 2000),
(5, 3, 'Presale 2', '300000', 2000),
(6, 3, 'Regular', '350000', 3000),
(7, 4, 'Early Bird', '1000000', 1000),
(8, 4, 'Presale 1', '1250000', 2000),
(9, 4, 'Presale 2', '1500000', 3000),
(10, 4, 'Regular', '1750000', 4000),
(11, 5, 'Belakang', '300000', 300),
(12, 5, 'Tengah', '400000', 250),
(13, 5, 'Depan', '450000', 250),
(14, 6, 'Belakang', '400000', 400),
(15, 6, 'Tengah', '500000', 400),
(16, 6, 'Depan', '600000', 400),
(17, 7, 'Early Bird', '650000', 500),
(18, 7, 'Presale 1', '800000', 1000),
(19, 7, 'Presale 2', '1000000', 1500),
(20, 8, 'Nyangkuter', '150000', 200),
(21, 8, 'Ritel', '250000', 300),
(22, 8, 'Bandar', '350000', 300),
(23, 9, 'Tribun', '40000', 1500),
(24, 10, 'Tribun', '40000', 1500),
(25, 11, 'Tribun', '40000', 1500),
(26, 12, 'Presale 1', '500000', 5000),
(27, 12, 'Presale 2', '600000', 7500),
(28, 12, 'Regular', '700000', 7500),
(29, 13, 'Presale 1', '500000', 5000),
(30, 13, 'Presale 2', '600000', 7500),
(31, 13, 'Regular', '700000', 7500),
(32, 14, 'Presale 1', '700000', 3000),
(33, 14, 'Presale 2', '800000', 3000),
(34, 14, 'Presale 3', '900000', 4000),
(35, 15, 'Festival', '70000', 5000);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(5) NOT NULL,
  `id_user` int(5) DEFAULT NULL,
  `id_metode` int(5) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `total` decimal(12,0) DEFAULT NULL,
  `status` enum('SUKSES','MENUNGGU','GAGAL') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `id_metode`, `tanggal`, `total`, `status`) VALUES
(1, 2, 2, '2023-07-11 17:28:11', '1800000', 'SUKSES'),
(2, 2, NULL, NULL, NULL, 'MENUNGGU'),
(3, 2, NULL, NULL, NULL, 'MENUNGGU');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(5) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `date_join` datetime DEFAULT NULL,
  `level` enum('admin','user') DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `fullname`, `username`, `email`, `password`, `date_join`, `level`, `no_hp`) VALUES
(1, 'muhammad sidiq firmansyah', 'sidiq', 'sidiq.firman48@gmail.com', '123', '2023-06-30 15:40:19', 'admin', '085740031048'),
(2, 'user', 'user', 'user.tester@example.com', '123', '2023-06-30 15:42:28', 'user', '082138876452'),
(3, 'ahmad nur fauzi', 'ahmadnur', 'ahmadnur@gmail.com', 'ahmad', '2023-07-02 06:00:52', 'user', '085640002000');

-- --------------------------------------------------------

--
-- Structure for view `mytiket`
--
DROP TABLE IF EXISTS `mytiket`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `mytiket`  AS SELECT `transaksi`.`id_transaksi` AS `id_transaksi`, `transaksi`.`id_user` AS `id_user`, `transaksi`.`id_metode` AS `id_metode`, `dt`.`id_detail` AS `id_detail`, `dt`.`id_tiket` AS `id_tiket`, `tiket`.`id_event` AS `id_event`, `transaksi`.`tanggal` AS `tanggal_transaksi`, `transaksi`.`total` AS `total`, `transaksi`.`status` AS `status`, `user`.`fullname` AS `fullname`, `mp`.`nama` AS `metode`, `mp`.`biaya` AS `biaya`, `dt`.`qty` AS `qty`, `dt`.`subtotal` AS `subtotal`, `tiket`.`nama` AS `tiket`, `tiket`.`harga` AS `harga`, `event`.`nama` AS `event`, `event`.`deskripsi` AS `deskripsi`, `event`.`tanggal` AS `tanggal`, `event`.`jam` AS `jam`, `event`.`lokasi` AS `lokasi`, `event`.`gambar` AS `gambar`, `event`.`provinsi` AS `provinsi` FROM (((((`transaksi` left join `detail_transaksi` `dt` on(`transaksi`.`id_transaksi` = `dt`.`id_transaksi`)) left join `tiket` on(`dt`.`id_tiket` = `tiket`.`id_tiket`)) left join `event` on(`tiket`.`id_event` = `event`.`id_event`)) left join `metode_pembayaran` `mp` on(`transaksi`.`id_metode` = `mp`.`id_metode`)) left join `user` on(`transaksi`.`id_user` = `user`.`id_user`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id_banner`);

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `fk_transaksi` (`id_transaksi`),
  ADD KEY `fk_tiket` (`id_tiket`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id_event`),
  ADD KEY `fk_kategori` (`id_kategori`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `metode_pembayaran`
--
ALTER TABLE `metode_pembayaran`
  ADD PRIMARY KEY (`id_metode`);

--
-- Indexes for table `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`id_tiket`),
  ADD KEY `fk_event` (`id_event`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `fk_metode` (`id_metode`),
  ADD KEY `fk_user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id_banner` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id_detail` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id_event` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `metode_pembayaran`
--
ALTER TABLE `metode_pembayaran`
  MODIFY `id_metode` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tiket`
--
ALTER TABLE `tiket`
  MODIFY `id_tiket` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `fk_tiket` FOREIGN KEY (`id_tiket`) REFERENCES `tiket` (`id_tiket`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_transaksi` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `fk_kategori` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `tiket`
--
ALTER TABLE `tiket`
  ADD CONSTRAINT `fk_event` FOREIGN KEY (`id_event`) REFERENCES `event` (`id_event`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `fk_metode` FOREIGN KEY (`id_metode`) REFERENCES `metode_pembayaran` (`id_metode`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
