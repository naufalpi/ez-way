-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2021 at 07:34 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbezway`
--

-- --------------------------------------------------------

--
-- Table structure for table `tugas`
--

CREATE TABLE `tugas` (
  `id_tugas` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `judul_tugas` varchar(100) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `isi_tugas` text NOT NULL,
  `harga` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  `id_tutor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tugas`
--

INSERT INTO `tugas` (`id_tugas`, `id_user`, `tanggal`, `judul_tugas`, `kategori`, `isi_tugas`, `harga`, `status`, `id_tutor`) VALUES
(2, 5, '2021-07-04', 'PR Matematika', 'SMP', 'sdasdaads', 70000, 'DONE', 6),
(3, 5, '2021-07-04', 'Tubes Membuat Website', 'S1', 'adsadadadahdlijkasdasd', 150000, '', 0),
(4, 6, '2021-07-04', 'Soal HOTS CPNS', 'SMA', 'asdasd\r\nadasd\r\nadawd', 60000, 'DONE', 6),
(9, 5, '2021-07-04', 'Tubes Membuat Website', 'SD', 'asdadas', 32434, 'DONE', 6),
(17, 5, '2021-07-05', 'Membuat Paper', 'SMA', 'adwasdwad', 30000, '', 0),
(18, 5, '2021-07-05', 'Mengerjakan Soal Integral', 'SD', 'gdfgesf', 40000, '', 0),
(19, 5, '2021-07-05', 'Membuat Puisi', 'S1', 'fdgdfgre', 20000, '', 0),
(20, 5, '2021-07-05', 'Matematika Dasar', 'SD', 'asdwda', 4000, 'DONE', 7),
(21, 5, '2021-07-05', 'Mengerjakan Soal Kimia', 'SD', 'adedas', 50000, 'DONE', 7),
(22, 5, '2021-07-05', 'Menyelesaikan Soal Fisika', 'SMA', 'sdfefse', 75000, '', 0),
(23, 5, '2021-07-05', 'Membuat Pidato Bahasa Inggris', 'SMP', 'asedadsa', 4000, 'DONE', 6),
(24, 5, '2021-07-05', 'PR Matematika Peminatan', 'SMA', 'sdasdf', 10000, '', 0),
(25, 6, '2021-07-06', 'Membuat Karya Ilmiah', 'SD', 'wq2eaasd', 12000, 'DONE', 5),
(26, 6, '2021-07-06', 'Soal HOTS UTBK', 'SMA', '2qeqeads', 40000, '', 0),
(27, 6, '2021-07-06', 'Membuat Aplikasi ', 'S1', 'sfesdfesdf', 400000, 'DONE', 5),
(28, 5, '2021-07-06', 'Soal HOTS', 'S1', 'adawdasd', 20000, '', 0),
(29, 5, '2021-01-10', 'dasdwasd', 'SD', 'asdwasdwasd', 10000, '', 0),
(30, 5, '2021-01-19', 'dfdgtfhd', 'SMP', 'asdadswda', 30000, 'DONE', 6),
(31, 5, '2021-01-28', 'htrrfesfr', 'SMA', 'sadwaghdff', 14000, '', 0),
(32, 5, '2021-02-20', 'hasdfefesfr', 'SMP', 'sadwghghff', 34000, 'DONE', 6),
(33, 5, '2021-02-27', 'adfdgfd', 'SMA', 'dfgrdg', 20000, 'DONE', 6),
(34, 5, '2021-03-01', 'sadffgd', 'SD', 'ghjjg', 10000, 'DONE', 7),
(35, 5, '2021-03-18', 'adhyjgf', 'SMP', 'sefefsdfds', 30000, 'DONE', 6),
(36, 5, '2021-03-25', 'afgddgjgf', 'S1', 'hhgfgfdds', 40000, 'DONE', 6),
(37, 5, '2021-04-10', 'dgffgdfg', 'SMA', 'tfdhrtgdg', 20000, 'DONE', 6),
(38, 5, '2021-04-19', 'djjjgefg', 'SMP', 'tnbnbvggdg', 24000, 'DONE', 6),
(39, 5, '2021-04-24', 'fghgjghjh', 'SD', 'gfhgfjhtfht', 10000, 'DONE', 6),
(40, 5, '2021-05-08', 'fdgdfgsefeshjh', 'S1', 'dfgdfgx dfdtfht', 45000, 'DONE', 6),
(41, 5, '2021-05-20', 'ghjhgjtdhfghgf fgd', 'SMA', 'dfgtrdhfggfhg dfgd', 20000, '', 0),
(42, 5, '2021-05-24', 'ghjhdsfdsff fgd', 'SMA', 'dfghgjghjhg dfgd', 29000, '', 0),
(43, 5, '2021-06-07', 'sdfgdsf szf', 'SD', 'thtdf s fersfs', 35000, 'DONE', 6),
(44, 5, '2021-06-14', 'sdfjhgjjf szf', 'SMA', 'thtgdgd sdfdf s fersfs', 50000, 'DONE', 6),
(45, 5, '2021-06-17', 'fghfhd', 'SMA', 'drgdr gdhf', 16000, 'DONE', 7),
(46, 5, '2021-06-23', 'fgdfxdgds d', 'S1', 'drdadsdf dsfr gdhf', 60000, '', 0),
(47, 5, '2021-06-28', 'fgzsgdfgdf jkljkl', 'SD', 'jklmnopqrstu', 25000, '', 0),
(48, 5, '2021-06-30', 'fabc ddsf gdf jkljkl', 'SMP', 'jklhijkl rstu', 44000, 'DONE', 7),
(49, 5, '2021-04-15', 'dsfszf', 'SMA', 'dsfsfsfdsdf', 50000, 'DONE', 6),
(50, 5, '2021-04-29', 'dshgjf', 'S1', 'kkkdsdf', 40000, 'DONE', 6),
(51, 5, '2021-04-16', 'sdaesgtfsfds', 'S1', 'kjhasndjoj jisadjoia aisdash asidad', 150000, 'DONE', 7),
(52, 7, '2021-07-08', 'adad', 'S1', 'sdfsefsdf', 50000, 'DONE', 5),
(53, 7, '2021-07-08', 'fhfgdfgsd', 'SMP', 'sdfsdfdsfd', 6000, '', 0),
(54, 7, '2021-07-08', 'PR Matematika', 'SMA', 'sdzfzxfx', 30000, 'DONE', 5),
(55, 7, '2021-07-08', 'sdfsdfs', 'SMP', 'sfsdfsfdf', 56456, 'DONE', 5),
(56, 7, '2021-07-08', 'dfgsdfsfs', 'SMA', 'sdzfcfvzffd', 50000, '', 0),
(57, 5, '2021-07-09', 'Matematika', 'SD', 'Kerjakan soal berikut ini:\r\n\r\nLuas segitiga ABC adalah 24 cm2, sisi AC = 8 cm, dan AB = 12 cm. Nilai cos <A = ...', 15000, 'DONE', 6),
(58, 6, '2021-07-09', 'Membuat Puisi', 'SMP', 'Buatlah puisi dengan tema pria yang sedang patah hati', 20000, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `password`) VALUES
(5, 'Anggit Selaw', '123abc@gmail.com', '$2y$10$LeKuKA4ep9w47hi.9i0vJOdi5.voo7jTwULtpdxcufH.1voaMUvtK'),
(6, 'Ratno', 'ratno123@gmail.com', '$2y$10$WY5LWAPaCb6Ntz.H0Rn7sOufQfEIXHC7g0g/SfxMxbEyYRdP9EvNW'),
(7, 'Edi', 'joni123@gmail.com', '$2y$10$BvUvkQx9M6i/ejPLXyrytOrOlqQfRs86SbYXI0oIDrAVlhStj38ei');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`id_tugas`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id_tugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tugas`
--
ALTER TABLE `tugas`
  ADD CONSTRAINT `tugas_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
