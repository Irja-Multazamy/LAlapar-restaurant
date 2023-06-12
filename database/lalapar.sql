-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Jun 2023 pada 11.45
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lalapar`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `category`
--

INSERT INTO `category` (`id`, `category`) VALUES
(1, 'makanan'),
(2, 'minuman');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `nm_menu` varchar(250) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `img` varchar(250) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id`, `id_category`, `nm_menu`, `price`, `img`, `status`) VALUES
(1, 1, 'Ayam Geprek', '12000', 'ayam geprek.jpg', 'active'),
(2, 1, 'Bebek Goreng', '20000', 'bebek goreng.jpg', 'active'),
(3, 1, 'Gurame Goreng', '30000', 'gurame goreng.jpg', 'active'),
(4, 1, 'Lele Goreng', '15000', 'lele goreng.jpg', 'active'),
(6, 2, 'Kopi Hitam', '5000', 'kopi.jpg', 'active'),
(7, 2, 'Lemon Tea', '10000', 'lemon tea.jpg', 'active'),
(8, 2, 'Cappucino Latte', '8000', 'cappucino.jpg', 'active'),
(10, 1, 'Cah Kangkung', '10000', 'kangkung.jpg', 'nonactive'),
(11, 2, 'Jus Buah', '12000', 'jus.jpg', 'nonactive'),
(12, 1, 'Nasi Putih', '6000', 'nasi.jpg', 'active');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengunjung`
--

CREATE TABLE `pengunjung` (
  `id` int(15) NOT NULL,
  `pengunjung` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengunjung`
--

INSERT INTO `pengunjung` (`id`, `pengunjung`) VALUES
(1, 'Multazamy'),
(2, 'user'),
(3, 'Indah'),
(4, 'Multazamy'),
(5, 'Xenia'),
(6, 'Multazamy'),
(7, 'Kurnia'),
(8, 'Kurnia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(11) NOT NULL,
  `id_pengunjung` int(11) NOT NULL,
  `menu` varchar(250) NOT NULL,
  `harga` decimal(10,0) NOT NULL,
  `jumlah` char(250) NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id`, `id_pengunjung`, `menu`, `harga`, `jumlah`, `total`, `tanggal`) VALUES
(6, 1, 'Ayam Geprek', '12000', '2', '24000', '2023-06-12'),
(7, 2, 'Ayam Geprek', '12000', '2', '24000', '2023-06-12'),
(8, 3, 'Kopi Hitam', '5000', '1', '5000', '2023-06-12'),
(9, 4, 'Gurame Goreng', '30000', '1', '30000', '2023-06-12'),
(10, 4, 'Lemon Tea', '10000', '1', '10000', '2023-06-12'),
(11, 4, 'Kopi Hitam', '5000', '2', '10000', '2023-06-12'),
(12, 5, 'Kopi Hitam', '5000', '2', '10000', '2023-06-12'),
(13, 5, 'Gurame Goreng', '30000', '2', '60000', '2023-06-12'),
(14, 8, 'Nasi Putih', '6000', '2', '12000', '2023-06-12'),
(15, 8, 'Kopi Hitam', '5000', '1', '5000', '2023-06-12'),
(16, 8, 'Cappucino Latte', '8000', '1', '8000', '2023-06-12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id`, `role`) VALUES
(1, 'admin'),
(2, 'staff'),
(3, 'user');

-- --------------------------------------------------------

--
-- Struktur dari tabel `slide`
--

CREATE TABLE `slide` (
  `id` int(11) NOT NULL,
  `caption` varchar(250) NOT NULL,
  `img` varchar(250) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `slide`
--

INSERT INTO `slide` (`id`, `caption`, `img`, `status`) VALUES
(1, 'Diambil dari bahan-bahan pilihan', 'slide1.jpg', 'active'),
(5, 'Makanan selalu baru dan fresh', 'slide2.jpg', 'active'),
(6, 'Masakan mewah dengan harga murah', 'slide3.jpg', 'active'),
(7, 'Dimasak oleh koki profesional', 'slide4.jpg', 'nonactive');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ulasan`
--

CREATE TABLE `ulasan` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `ulasan` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ulasan`
--

INSERT INTO `ulasan` (`id`, `name`, `ulasan`) VALUES
(1, 'Xenia', 'Saya sangat merekomendasikan restoran ini, karna pelayanannya yang baik dan sangat ramah kepada pengunjung'),
(2, 'Multazamy', 'Masakannya sangat lezat, harga juga bersahabat... ga rugi deh :)');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `id_role`, `email`, `name`, `password`) VALUES
(1, 1, 'admin@gmail.com', 'admin', 'admin'),
(2, 2, 'staff@gmail.com', 'staff', 'staff'),
(3, 3, 'user@gmail.com', 'user', 'user'),
(6, 3, 'multazamy@gmail.com', 'Multazamy', 'multazamy'),
(8, 2, 'lathifa@gmail.com', 'Lathifa', 'lathifa'),
(9, 3, 'indah@gmail.com', 'Indah', 'indah'),
(10, 3, 'xenia@gmail.com', 'Xenia', 'xenia'),
(11, 3, 'kurnia@gmail.com', 'Kurnia', 'kurnia');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_category` (`id_category`);

--
-- Indeks untuk tabel `pengunjung`
--
ALTER TABLE `pengunjung`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pengunjung` (`id_pengunjung`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ulasan`
--
ALTER TABLE `ulasan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_role` (`id_role`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `pengunjung`
--
ALTER TABLE `pengunjung`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `ulasan`
--
ALTER TABLE `ulasan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `category` (`id`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`id_pengunjung`) REFERENCES `pengunjung` (`id`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
