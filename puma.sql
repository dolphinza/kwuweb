-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2021 at 11:28 AM
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
-- Database: `puma`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `nama` varchar(255) NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `email` varchar(255) NOT NULL,
  `notelp` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `saldo` int(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`nama`, `jenis_kelamin`, `email`, `notelp`, `alamat`, `password`, `avatar`, `saldo`, `description`) VALUES
('hello', 'Laki-Laki', 'h@g.com', '088777388748', 'jl jalan', 'e10adc3949ba59abbe56e057f20f883e', '', 20000, ''),
('Kevin Febrian', 'Laki-Laki', 'k@gmail.com', '089501046244', 'Ini alamatnya oke', '827ccb0eea8a706c4c34a16891f84e7b', '', 15000, 'test ea');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` varchar(12) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `harga` int(255) NOT NULL,
  `diskon` int(11) NOT NULL,
  `tipe` varchar(255) NOT NULL,
  `merk` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `keterangan`, `harga`, `diskon`, `tipe`, `merk`, `jumlah`, `path`) VALUES
('P1', 'Suede Classic+ Sneakers', 'Ini Sepatu', 5000000, 50, 'Sepatu', 'Puma', 10, 'produk_puma/1.jpg'),
('P10', 'PUMA x FIRST MILE H.ST.20 Camo Men\'s Training Shoes', 'Ini Sepatu', 500000, 0, 'Sepatu', 'Puma', 10, 'produk_puma/10.jpg'),
('P11', 'PUMA x FIRST MILE LQDCELL Method Xtreme Men\'s Training Shoes', 'Ini Sepatu', 500000, 0, 'Sepatu', 'Puma', 10, 'produk_puma/11.jpg'),
('P12', 'Rapido II FG Men\'s Socces Cleats', 'Ini Sepatu', 500000, 0, 'Sepatu', 'Puma', 10, 'produk_puma/12.jpg'),
('P13', 'Rapido II FG Men\'s Socces Cleats', 'Ini Sepatu', 500000, 0, 'Sepatu', 'Puma', 10, 'produk_puma/13.jpg'),
('P14', 'Rapido II FG Men\'s Socces Cleats', 'Ini Sepatu', 500000, 0, 'Sepatu', 'Puma', 10, 'produk_puma/14.jpg'),
('P15', 'Rapido II FG Men\'s Socces Cleats', 'Ini Sepatu', 500000, 0, 'Sepatu', 'Puma', 10, 'produk_puma/15.jpg'),
('P16', 'Rapido II FG Men\'s Socces Cleats', 'Ini Sepatu', 500000, 0, 'Sepatu', 'Puma', 10, 'produk_puma/16.jpg'),
('P17', 'Rapido II FG Men\'s Socces Cleats', 'Ini Sepatu', 500000, 0, 'Sepatu', 'Puma', 10, 'produk_puma/17.jpg'),
('P18', 'Rapido II FG Men\'s Socces Cleats', 'Ini Sepatu', 500000, 0, 'Sepatu', 'Puma', 10, 'produk_puma/18.jpg'),
('P19', 'Rapido II FG Men\'s Socces Cleats', 'Ini Sepatu', 500000, 0, 'Sepatu', 'Puma', 10, 'produk_puma/19.jpg'),
('P2', 'GV Special+ RWB Men\'s Snekaers', 'Ini Sepatu', 500000, 10, 'Sepatu', 'Puma', 10, 'produk_puma/2.jpg'),
('P20', 'Rapido II FG Men\'s Socces Cleats', 'Ini Sepatu', 500000, 0, 'Sepatu', 'Puma', 10, 'produk_puma/20.jpg'),
('P21', 'Rapido II FG Men\'s Socces Cleats', 'Ini Sepatu', 500000, 0, 'Sepatu', 'Puma', 10, 'produk_puma/21.jpg'),
('P3', 'Cool Cat Block Men\'s Slides', 'Ini Sendal', 500000, 0, 'Sendal', 'Puma', 10, 'produk_puma/3.jpg'),
('P4', 'Puma X MR DOODLE Leadcat 20', 'Ini Sendal', 500000, 0, 'Sendal', 'Puma', 10, 'produk_puma/4.jpg'),
('P5', 'Rapido II IT Men\'s Soccer Shoes', 'Ini Sepatu', 500000, 0, 'Sepatu', 'Puma', 10, 'produk_puma/5.jpg'),
('P6', 'Rapido II FG Men\'s Soccer Cleats', 'Ini Sepatu', 500000, 0, 'Sepatu', 'Puma', 10, 'produk_puma/6.jpg'),
('P7', 'ULTRA 3.1 TT Men\'s Soccer Shoes (Orange)', 'Ini Sepatu', 500000, 0, 'Sepatu', 'Puma', 10, 'produk_puma/7.jpg'),
('P8', 'ULTRA 3.1 TT Men\'s Soccer Shoes (Black)', 'Ini Sepatu', 500000, 0, 'Sepatu', 'Puma', 10, 'produk_puma/8.jpg'),
('P9', 'ULTRA 1.1 FG/AG Soccer Cleats', 'Ini Sepatu', 500000, 0, 'Sepatu', 'Puma', 10, 'produk_puma/9.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` varchar(200) NOT NULL,
  `id_barang` varchar(200) NOT NULL,
  `email` varchar(255) NOT NULL,
  `ukuran_sepatu` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `harga` int(11) NOT NULL,
  `waktu_pembayaran` datetime NOT NULL,
  `alamat` text NOT NULL,
  `jasa_pengiriman` text NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `trolly`
--

CREATE TABLE `trolly` (
  `email` varchar(255) NOT NULL,
  `id_barang` varchar(12) NOT NULL,
  `qty` int(11) NOT NULL,
  `ukuranSepatu` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trolly`
--

INSERT INTO `trolly` (`email`, `id_barang`, `qty`, `ukuranSepatu`) VALUES
('h@g.com', 'P1', 1, '6'),
('h@g.com', 'P2', 1, '6.5'),
('h@g.com', 'P3', 1, '5.5');

-- --------------------------------------------------------

--
-- Table structure for table `ulasan`
--

CREATE TABLE `ulasan` (
  `id_diskusi` int(11) NOT NULL,
  `id_barang` varchar(12) NOT NULL,
  `email` varchar(255) NOT NULL,
  `ulasan` text NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `email` varchar(255) NOT NULL,
  `id_barang` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`email`, `id_barang`) VALUES
('h@g.com', 'P1'),
('h@g.com', 'P3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `trolly`
--
ALTER TABLE `trolly`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `ulasan`
--
ALTER TABLE `ulasan`
  ADD PRIMARY KEY (`id_diskusi`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id_barang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ulasan`
--
ALTER TABLE `ulasan`
  MODIFY `id_diskusi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
