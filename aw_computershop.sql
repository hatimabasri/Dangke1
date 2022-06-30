-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 18 Des 2019 pada 07.26
-- Versi Server: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;


--
-- Database: `aw_computershop`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(13) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_lengkap`) VALUES
(1, 'admin', 'admin', 'admin'),
(2, 'abdi', 'abdi', 'abdi gunawan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(10) NOT NULL,
  `email_pelanggan` varchar(100) NOT NULL,
  `password_pelanggan` varchar(50) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `telepon_pelanggan` varchar(25) NOT NULL,
  `alamat_pelanggan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `email_pelanggan`, `password_pelanggan`, `nama_pelanggan`, `telepon_pelanggan`, `alamat_pelanggan`) VALUES
(1, 'abdygunawan023@gmail.com', 'Ndatauka', 'Abdi Gunawan', '082293204972', 'Jalan Perintis Kemerdekaan 7 '),
(4, 'kurniawan@gmail.com', '12345', 'Moh Kurniawan', '081421134567', 'ANTANG KOTA'),
(5, 'hasna3640@gmail.com', 'hasna', 'Hasnawati', '082349892411', 'Jl. Perintis Kemerdekaan KM VII');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `status_pembelian` enum('Tidak Disetujui','Disetujui') NOT NULL,
  `total_pembelian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_pelanggan`, `tanggal_pembelian`, `status_pembelian`, `total_pembelian`) VALUES
(46, 5, '2019-12-03', 'Disetujui', 8000000),
(47, 5, '2019-12-03', 'Tidak Disetujui', 8000000),
(48, 5, '2019-12-11', 'Tidak Disetujui', 24000000),
(49, 5, '2019-12-11', 'Tidak Disetujui', 48000000),
(50, 5, '2019-12-11', 'Tidak Disetujui', 48000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian_produk`
--

CREATE TABLE `pembelian_produk` (
  `id_pembelian_produk` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembelian_produk`
--

INSERT INTO `pembelian_produk` (`id_pembelian_produk`, `id_pembelian`, `id_produk`, `jumlah`) VALUES
(1, 1, 1, 1),
(2, 2, 2, 3),
(3, 0, 26, 4),
(4, 0, 27, 1),
(5, 0, 26, 4),
(6, 0, 27, 1),
(7, 9, 26, 4),
(8, 9, 27, 1),
(9, 10, 26, 4),
(10, 10, 27, 1),
(11, 11, 26, 4),
(12, 11, 27, 1),
(13, 12, 26, 4),
(14, 12, 27, 1),
(15, 13, 26, 4),
(16, 13, 27, 1),
(17, 14, 26, 4),
(18, 14, 27, 2),
(19, 15, 26, 1),
(20, 16, 26, 1),
(21, 17, 27, 1),
(22, 18, 26, 1),
(23, 18, 27, 1),
(24, 19, 26, 1),
(25, 19, 27, 17),
(26, 20, 27, 1),
(27, 21, 27, 1),
(28, 22, 27, 1),
(29, 23, 26, 1),
(30, 24, 26, 1),
(31, 25, 27, 1),
(32, 26, 29, 1),
(33, 27, 30, 1),
(34, 27, 29, 7),
(35, 28, 29, 1),
(36, 28, 30, 1),
(37, 29, 29, 1),
(38, 30, 29, 1),
(39, 31, 30, 1),
(40, 31, 29, 17),
(41, 32, 29, 1),
(42, 32, 30, 8),
(43, 33, 31, 3),
(44, 33, 32, 1),
(45, 34, 30, 1),
(46, 34, 32, 1),
(47, 34, 33, 1),
(48, 35, 30, 2),
(49, 35, 33, 1),
(50, 36, 30, 1),
(51, 37, 30, 1),
(52, 38, 30, 1),
(53, 38, 33, 1),
(54, 39, 30, 1),
(55, 40, 30, 1),
(56, 40, 32, 1),
(57, 40, 34, 1),
(58, 41, 32, 1),
(59, 42, 30, 1),
(60, 42, 32, 2),
(61, 42, 34, 1),
(62, 43, 30, 1),
(63, 44, 32, 1),
(64, 45, 33, 1),
(65, 45, 34, 1),
(66, 46, 32, 1),
(67, 47, 32, 1),
(68, 48, 30, 1),
(69, 49, 30, 2),
(70, 50, 30, 2),
(71, 51, 33, 2),
(72, 51, 34, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga_produk` int(20) NOT NULL,
  `berat_produk` int(11) NOT NULL,
  `foto_produk` varchar(100) NOT NULL,
  `deskripsi_produk` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga_produk`, `berat_produk`, `foto_produk`, `deskripsi_produk`) VALUES
(30, 'ASUS ROG STRIX HERO 2', 24000000, 4000, 'asusrog.jpg', '        Mantap gan      '),
(32, 'ACER SWIFT 3', 8000000, 4000, 'download (1).jpg', 'INTEL CORE I7 GEN 9\r\nRAM 8GB\r\nSSD 500GB\r\n'),
(33, 'ACER SWIFT 2', 5000000, 3000, 'download (4).jpg', 'Intel Core I5 6225\r\nRam 4GB  '),
(34, 'ASUS GL11X', 11000000, 3000, 'download (3).jpg', 'Intel Core I7 GEN 8\r\nRAM 8GB DDR4\r\nSSD 128GB\r\nHDD 1TB');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD PRIMARY KEY (`id_pembelian_produk`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  MODIFY `id_pembelian_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
