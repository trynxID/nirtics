-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2023 at 02:47 PM
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
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id_event` int(5) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  `id_organizer` int(5) NOT NULL,
  `status` enum('ready','closed') NOT NULL,
  `id_kategori` int(5) DEFAULT NULL,
  `provinsi` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id_event`, `nama`, `deskripsi`, `tanggal`, `jam`, `lokasi`, `gambar`, `id_organizer`, `status`, `id_kategori`, `provinsi`) VALUES
(1, 'Ghostival by MoT', 'Leave the drabness of the mundane world behind as Ghostival whisks you away to a realm overflowing with creativity and joy. It\'s a place where problems are overshadowed by boundless exploration and where every color of the rainbow comes to life in a breathtaking display of imagination.\r\n\r\nIn this fantastical world, you’ll encounter a cast of endearing GOWS, brought to life by WD Willy\'s extraordinary imagination. These playful and lovable apparitions shed their spooky reputation and invite you into their vibrant world of fun and joy to take a break from the often dark real world. Experience art like never before in this enchanting world, brought to life by Indonesian illustrator WD Willy and Museum of Toys.', '2023-07-31', '15:00:00', 'Senayan City', 'g1.jpg', 3, 'ready', 2, 'Jakarta'),
(2, 'Playoff IBL Tokopedia 2023', 'Playoff IBL Tokopedia 2023 Bima Perkasa Jogjakarta VS Pelita Jaya Bakrie', '2023-07-30', '19:00:00', 'GOR Pancasila UGM', 'g2.jpg', 4, 'ready', 6, 'Yogyakarta'),
(3, 'Projek-D Vol. 2', 'PROJEK-D merupakan sebutan singkat dari Projek Dynamic (Dyandra Music & Collaborations), melalui Projek-D, Dyandra Promosindo ingin mempersembahkan festival musik yang dapat dinikmati oleh seluruh kalangan. Sejalan dengan gairah tersebut demi menciptakan ekosistem dan pengalaman baru bagi para pegiat hingga penikmat musik, khususnya yang berada di luar Kota Jakarta.\r\n\r\nSolo yang dijuluki sebagai kota penuh nuansa sejarah dan kental dengan warisan budaya, dipilih karena memiliki berbagai macam kesenian bertaraf nasional dan internasional. Serta lokasi strategis dan berkelas yang masih mudah dijangkau oleh seluruh masyarkat Joglosemar dan sekitarnya yang kini telah direvitalisasikan menjadi tempat wisata yaitu De Tjolomadoe, yang menjadi wadah kami untuk tetap mempertahankan nilai kekayaan historikal yang ada.\r\n\r\nMelalui slogan #SehidupSeparty Projek-D ingin menyampaikan kebahagiaan bisa diciptakan melalui suguhan karya musik dengan beragam aksi eksentrik dari para musisi pilihan tanah air. Hadirnya Projek-D vol. 1 membuktikan bahwa pengalaman baru dari festival musik yang menyajikan lebih dari satu panggung, memberikan dampak positif bagi generasi muda dalam menyaksikan gelaran musik yang berkualitas.\r\n\r\nProjek-D vol.2 kembali hadir dengan konsep yang lebih segar, mengusung tema “Pop of Circus” selain memberikan pengalaman baru dalam menikmati festival musik dihari penyelenggaraan, tentunya Projek-D membayar kesetiaan pengunjung Projek-D dengan berbagai kejutan di dalamnya. Deretan program seperti CEKSON dan KELAS MUSIK kami suguhkan dalam rangkaian pre-event guna menjadi wadah edukasi untuk para musisi baru. Inilah usaha kami dalam memberikan “nuansa baru” dalam suguhan festival musik.', '2023-08-05', '14:00:00', 'De Tjolomadu', 'g3.png', 5, 'ready', 1, 'Jawa Tengah'),
(4, 'We The Fest', 'WE THE FEST 2023', '2023-08-23', '15:00:00', 'GBK - Sport Complex', 'g4.jpg', 6, 'ready', 1, 'Jakarta'),
(5, 'What\'s My Age Again? - Purwokerto', '\'\'What\'s My Age Again?\'\' merupakan pertunjukan stand-up comedy spesial Awwe yang kedua. Show kali ini akan dilaksanakan sebagai tour di 6 kota, di antaranya: Jakarta, Bandung, Yogyakarta, Purwokerto, Surabaya dan Bali.\r\n\r\nDalam pertunjukan ini, Awwe akan menceritakan mengenai banyak sikapnya yang dianggap masih belum dewasa dan tidak sesuai dengan usianya. Judul ini diambil dari lagu band favoritnya: Blink 182, dengan judul dan tema yang sama. Menyesuaikan dengan konsep dari Blink 182, show ini akan dilaksanakan sebagai pertunjukan komedi yang dibungkus ala konser band pop punk.', '2023-08-02', '20:00:00', 'Gedung Roedhiro Unsoed', 'g5.jpg', 7, 'ready', 4, 'Jawa Tengah'),
(6, 'What\'s My Age Again? - Jakarta', '\'\'What\'s My Age Again?\'\' merupakan pertunjukan stand-up comedy spesial Awwe yang kedua. Show kali ini akan dilaksanakan sebagai tour di 6 kota, di antaranya: Jakarta, Bandung, Yogyakarta, Purwokerto, Surabaya dan Bali.\r\n\r\nDalam pertunjukan ini, Awwe akan menceritakan mengenai banyak sikapnya yang dianggap masih belum dewasa dan tidak sesuai dengan usianya. Judul ini diambil dari lagu band favoritnya: Blink 182, dengan judul dan tema yang sama. Menyesuaikan dengan konsep dari Blink 182, show ini akan dilaksanakan sebagai pertunjukan komedi yang dibungkus ala konser band pop punk.', '2023-08-27', '19:30:00', 'Theater Besar Taman Ismail Marzuki', 'g6.jpg', 7, 'ready', 4, 'Jakarta'),
(7, 'STANDUPFEST', 'StandUpFest Sebuah event tahunan dari Standupindo, yang sempat tertunda karena pandemi, kini kami kembali hadir. Acara diselenggarakan selama 3 hari, dimana puluhan komika akan tampil di panggung indoor dan outdoor. Selain nonton standup, kalian juga bisa jumpa dengan komika-komika dari seluruh Indonesia. Jadi mari berjumpa.', '2023-08-04', '14:00:00', 'Tennis Indoor Senayan', 'g7.jpg', 8, 'ready', 4, 'Jakarta'),
(8, 'Stand Up Comedy Special by Yudha Keling', '\'\'Tulang Punggung\'\' adalah sebuah pertunjukan stand-up comedy special kedua dari Yudha Keling. Berbeda dari pertunjukan sebelumnya yang berfokus menceritakan pengalaman sial dalam hidup dan berinvestasi, di pertujukan kali ini, fokus utama bahasan ialah keresahan seputar dunia investasi, keuangan dan juga ekonomi.\r\n\r\nTak hanya itu, di sini Yudha Keling juga akan bercerita tentang keluh kesahnya dan ketakutan-ketakutannya sebagai seorang tulang punggung keluarga.', '2023-07-08', '19:00:00', 'Titan Center', 'g8.jpg', 7, 'closed', 4, 'Banten'),
(9, 'Playoff IBL Tokopedia 2023 Pelita Jaya Bakrie VS Bima Perkasa Jogjakarta', 'Playoff IBL Tokopedia 2023 Pelita Jaya Bakrie VS Bima Perkasa Jogjakarta', '2023-07-02', '20:00:00', 'BRITAMA Arena', 'g9.jpg', 4, 'ready', 6, 'Jakarta'),
(10, 'Playoff IBL Tokopedia 2023 Bali United Basketball VS Satria Muda Pertamina Jakarta', 'Playoff IBL Tokopedia 2023 Bali United Basketball VS Satria Muda Pertamina Jakarta', '2023-07-06', '17:00:00', 'GOR Merpati Bali', 'g10.jpg', 4, 'ready', 6, 'Bali'),
(11, 'Playoff IBL Tokopedia 2023 Bumi Borneo Pontianak VS Prawira Harum Bandung', 'Playoff IBL Tokopedia 2023 Bumi Borneo Pontianak VS Prawira Harum Bandung', '2023-07-06', '20:00:00', 'Britama Arena', 'g11.png', 4, 'ready', 6, 'Jakarta'),
(12, 'Dewa 19 All Star - Jakarta', 'DEWA 19 ALL STAR - JAKARTA', '2023-08-12', '19:00:00', 'Gelora Bung Karno', 'g12.png', 9, 'ready', 1, 'Jakarta'),
(13, 'Dewa 19 All Start - Solo', 'DEWA 19 ALL STAR - SOLO', '2023-07-29', '19:00:00', 'Stadion Manahan', 'g13.png', 9, 'ready', 1, 'Jawa Tengah'),
(14, 'JOYLAND JAKARTA 2023', '-Music and arts festival held outdoors in open green space\r\n\r\n-Three days of live music, comedy, film, workshops, and marketplace across different areas of the venue\r\n\r\n-A multisensory festival that collaborates with artists in various creative fields', '2023-11-24', '15:00:00', 'Ecopark Ancol', 'g14.jpg', 11, 'ready', 1, 'Jakarta'),
(15, 'Bebaskan Energimu Konser - Sidoarjo', 'Persembahan Konser musik kolaboratif dari Kratingdaeng Indonesia untuk Sahabat NOAH yang berada di kota Sidoarjo.\r\n\r\nBebaskan Energi, tuk Jalani Mimpi!', '2023-07-08', '16:00:00', 'Parkir Timur Stadion Gelora Delta Sidoarjo', 'g15.jpg', 10, 'ready', 1, 'Jawa Timur');

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
(1, 'musik'),
(2, 'seni'),
(3, 'webinar'),
(4, 'stand-up comedy'),
(5, 'seminar'),
(6, 'olahraga');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(5) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama`) VALUES
(1, 'Early Bird'),
(2, 'Presale 1'),
(3, 'Presale 2'),
(4, 'Reguler'),
(5, 'Flash Sale');

-- --------------------------------------------------------

--
-- Table structure for table `organizer`
--

CREATE TABLE `organizer` (
  `id_organizer` int(5) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tahun` year(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `organizer`
--

INSERT INTO `organizer` (`id_organizer`, `nama`, `tahun`) VALUES
(3, 'Museum of Toys', 2020),
(4, 'Indonesian Basketball league', 2022),
(5, 'Dyandra Promosindo', 2023),
(6, 'Ismaya Live', 2020),
(7, 'Comika Event', 2020),
(8, 'Standupindo', 2021),
(9, 'Redline Kreasindo', 2021),
(10, 'Kratingdaeng Indonesia', 2021),
(11, 'Plainsong Live', 2022);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(5) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `biaya` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tiket`
--

CREATE TABLE `tiket` (
  `id_tiket` int(5) NOT NULL,
  `id_event` int(5) NOT NULL,
  `harga` decimal(10,0) NOT NULL,
  `stok` int(5) NOT NULL,
  `id_kelas` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tiket`
--

INSERT INTO `tiket` (`id_tiket`, `id_event`, `harga`, `stok`, `id_kelas`) VALUES
(1, 1, '150000', 1000, 4),
(2, 3, '100000', 1000, 1),
(3, 3, '150000', 2000, 2),
(4, 3, '175000', 2000, 3),
(5, 3, '200000', 3000, 4);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(5) NOT NULL,
  `qty` int(5) NOT NULL,
  `sub_total` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `id_pembayaran` int(5) NOT NULL,
  `id_user` int(5) NOT NULL,
  `id_tiket` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id_banner`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id_event`),
  ADD KEY `fk_organizer` (`id_organizer`),
  ADD KEY `fk_kategori` (`id_kategori`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `organizer`
--
ALTER TABLE `organizer`
  ADD PRIMARY KEY (`id_organizer`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`id_tiket`),
  ADD KEY `fk_event` (`id_event`),
  ADD KEY `fk_kelas` (`id_kelas`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `fk_user` (`id_user`),
  ADD KEY `fk_tiket` (`id_tiket`),
  ADD KEY `fk_pembayaran` (`id_pembayaran`);

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
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `organizer`
--
ALTER TABLE `organizer`
  MODIFY `id_organizer` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tiket`
--
ALTER TABLE `tiket`
  MODIFY `id_tiket` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `fk_kategori` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_organizer` FOREIGN KEY (`id_organizer`) REFERENCES `organizer` (`id_organizer`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tiket`
--
ALTER TABLE `tiket`
  ADD CONSTRAINT `fk_event` FOREIGN KEY (`id_event`) REFERENCES `event` (`id_event`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_kelas` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `fk_pembayaran` FOREIGN KEY (`id_pembayaran`) REFERENCES `pembayaran` (`id_pembayaran`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tiket` FOREIGN KEY (`id_tiket`) REFERENCES `tiket` (`id_tiket`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
