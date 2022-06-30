-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Jun 2022 pada 16.40
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbstartup`
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
(1, 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bukti`
--

CREATE TABLE `bukti` (
  `id` int(3) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `bukti_bayar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(6, 'hatimabasri@gmail.com', 'hatima', 'Khusnul Hatima Basri', '081243128757', 'Kompleks Daya Indah Persada Blok C no 9'),
(7, 'fadiafadillamutil@gmail.com', 'fadia', 'Fadyha Fadhilha', '08970296846', 'Graha intan sudiang A no. 10'),
(8, 'fitrah@gmail.com', 'fitrah', 'fitrah', '081243128757', 'antang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `status_pembelian` varchar(50) NOT NULL,
  `total_pembelian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_pelanggan`, `tanggal_pembelian`, `status_pembelian`, `total_pembelian`) VALUES
(54, 6, '2022-05-23', 'Diterima', 10000),
(55, 6, '2022-05-23', 'Belum Disetujui', 25000),
(56, 6, '2022-05-27', 'Belum Disetujui', 12000),
(57, 6, '2022-05-27', 'Belum Disetujui', 12000),
(58, 6, '2022-05-27', 'Belum Disetujui', 154000),
(59, 8, '2022-06-08', 'Belum Disetujui', 12000),
(60, 6, '2022-06-30', 'Belum Disetujui', 24000),
(61, 6, '2022-06-30', 'Belum Disetujui', 37000);

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
(72, 51, 34, 1),
(73, 51, 35, 2),
(74, 51, 36, 1),
(75, 52, 35, 1),
(76, 53, 35, 1),
(77, 54, 36, 1),
(78, 55, 35, 1),
(79, 56, 42, 1),
(80, 57, 36, 1),
(81, 58, 36, 2),
(82, 58, 35, 1),
(83, 58, 40, 3),
(84, 59, 36, 1),
(85, 60, 42, 2),
(86, 61, 35, 1),
(87, 61, 42, 1);

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
  `deskripsi_produk` text NOT NULL,
  `stok` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga_produk`, `berat_produk`, `foto_produk`, `deskripsi_produk`, `stok`) VALUES
(35, 'Dangke Sapi', 25000, 250, '2.jpg', '                        Dangke merupakan makanan khas enrekang yang terbuat dari susu. Dangke memiliki tekstur seperti tahu dan cita rasa yang mirip seperti keju.                  ', 9),
(36, 'Keripik Dangke', 12000, 100, 'krupuk.jpeg', '                                                                                                              Keripik Dangke adalah oleh oleh khas enrekang yang terbuat dari campuran susu, dangke dan juga tepung beras. Biasanya memiliki berbagai rasa seperti balado, jagung manis, dan coklat.                         ', 7),
(37, 'Kacang Sembunyi', 30000, 500, 'WhatsApp Image 2022-01-11 at 03.37.20.jpeg', '        Terbuat dari susu sapi murni      ', 20),
(38, 'Kacang Telur Susu', 15000, 200, 'WhatsApp Image 2022-01-11 at 03.37.22 (1).jpeg', 'mantap', 12),
(39, 'Stik Susu', 15000, 200, 'WhatsApp Image 2022-01-11 at 03.37.22.jpeg', 'enak', 20),
(40, 'Kue Bangke', 35000, 500, 'WhatsApp Image 2022-01-11 at 03.37.21.jpeg', '        Enak dimakan dengan teh hangat      ', 11),
(41, 'Stik Buah Naga', 15000, 200, 'stik.jpeg', '        Terbuat dari buah naga asli      ', 15),
(42, 'Krupuk Dangke Coklat', 12000, 100, 'kripik.jpeg', 'Cemilan Khas Enrekang terbuat dari susu sapi asli', 16);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `bukti`
--
ALTER TABLE `bukti`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indeks untuk tabel `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD PRIMARY KEY (`id_pembelian_produk`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT untuk tabel `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  MODIFY `id_pembelian_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
