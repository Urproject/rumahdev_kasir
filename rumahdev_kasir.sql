-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Nov 2023 pada 10.23
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rumahdev_kasir`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `merchant`
--

CREATE TABLE `merchant` (
  `id_merchant` int(11) NOT NULL,
  `nama_usaha` varchar(255) NOT NULL,
  `jenis_usaha` varchar(50) NOT NULL,
  `no_telepon` varchar(13) NOT NULL,
  `alamat` text NOT NULL,
  `no_izin` varchar(50) NOT NULL,
  `file_izin` varchar(255) NOT NULL,
  `no_npwp` varchar(16) NOT NULL,
  `file_npwp` varchar(255) NOT NULL,
  `no_ktp` varchar(16) NOT NULL,
  `file_ktp` varchar(255) NOT NULL,
  `diskon` tinyint(1) NOT NULL,
  `pajak` tinyint(1) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `merchant`
--

INSERT INTO `merchant` (`id_merchant`, `nama_usaha`, `jenis_usaha`, `no_telepon`, `alamat`, `no_izin`, `file_izin`, `no_npwp`, `file_npwp`, `no_ktp`, `file_ktp`, `diskon`, `pajak`, `id_user`) VALUES
(1, 'Iqbal Cafe', 'Kafe', '0', 'Jl. Medan', '0', '0', '0', '0', '0', 'ktp.jpg', 1, 1, 1),
(2, 'Restoran Indah', 'Restoran', '0', 'Jl. Indah', '0', '0', '0', '0', '', '', 0, 0, 4),
(7, 'Cafe Olivia', 'Cafe', '081211113332', 'Amerika Serikat', '111122223333', 'file_izin-26112023-091705.pdf', '1111222233334444', 'file_npwp-26112023-091705.pdf', '5555666677778881', 'file_ktp-26112023-091705.jpg', 0, 0, 16);

-- --------------------------------------------------------

--
-- Struktur dari tabel `merchant_employee`
--

CREATE TABLE `merchant_employee` (
  `id_employee` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_merchant` int(11) NOT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `merchant_employee`
--

INSERT INTO `merchant_employee` (`id_employee`, `id_user`, `id_merchant`, `level`) VALUES
(1, 1, 1, 1),
(2, 3, 1, 2),
(3, 4, 2, 1),
(9, 16, 7, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `merchant_payment`
--

CREATE TABLE `merchant_payment` (
  `id_payment` int(11) NOT NULL,
  `id_merchant` int(11) NOT NULL,
  `id_method` int(11) NOT NULL,
  `data` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `payment_method`
--

CREATE TABLE `payment_method` (
  `id_method` int(11) NOT NULL,
  `payment_type` enum('cash','transfer','qris','va') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `payment_method`
--

INSERT INTO `payment_method` (`id_method`, `payment_type`) VALUES
(1, 'cash'),
(2, 'transfer'),
(3, 'qris'),
(4, 'va');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product`
--

CREATE TABLE `product` (
  `id_product` int(11) NOT NULL,
  `id_merchant` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `jenis_diskon` enum('price','percent') NOT NULL,
  `nilai_diskon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `product`
--

INSERT INTO `product` (`id_product`, `id_merchant`, `nama`, `harga`, `stok`, `kategori`, `deskripsi`, `gambar`, `jenis_diskon`, `nilai_diskon`) VALUES
(1, 1, 'Coffee Latte', 24000, 6, 'Kopi', 'Coffee latte atau kopi latte ini merupakan salah satu jenis minuman kopi susu yang populer di samping Cappucino. Sekilas, kedua jenis minuman ini memang mirip, tapi mereka punya takaran dan rasa yang berbeda.', 'latte.jpg', 'price', 0),
(2, 1, 'Coffee Americano', 22000, 3, 'Kopi', 'Caffee Americano atau Amerikano adalah minuman kopi yang dibuat dengan mencampurkan satu seloki espresso dengan air panas. Air panas yang digunakan dalam minuman ini adalah sebanyak 6 hingga 8 ons.', 'americano.jpg', 'price', 0),
(3, 1, 'Coffee Caramel Latte', 18000, 8, 'Kopi', 'Caramel latte adalah jenis minuman kopi yang banyak disukai. Kopi satu Ini memakai espresso, susu steam, serta tambahan sirop karamel. Caramel latte memiliki tekstur yang berbeda dengan caramel macchiato. Ini karena jenis kopi satu ini menggunakan lebih banyak susu.', 'caramel.jpg', 'price', 0),
(5, 1, 'Frappe', 30000, 9, 'Kopi', 'Frappé adalah minuman es kopi khas Yunani yang bersalut buih, terbuat dari kopi instan, gula, air dan es. Frappé pertama kali diciptakan pada September 1957. Kopi ini pertama kali dibuat oleh Dimitrios Vakondios secara tidak disengaja. Dimitrios pada waktu itu adalah seorang penjual dari produk Nestlé.', 'frappe.jpg', 'price', 5000),
(6, 1, 'Teh Manis Panas', 8000, 20, 'Teh', 'Teh manis adalah minuman yang terbuat dari larutan teh yang biasanya diberi gula tebu atau pemanis. Variasi rasa manis pada minuman yang khas ini sangat merakyat di Amerika Serikat dan Indonesia.', 'teh_manis.jpg', 'price', 0),
(7, 1, 'Teh Manis Dingin', 9000, 20, 'Teh', 'Teh manis adalah minuman yang terbuat dari larutan teh yang biasanya diberi gula tebu atau pemanis. Variasi rasa manis pada minuman yang khas ini sangat merakyat di Amerika Serikat dan Indonesia. Dalam budaya Indonesia, teh manis yang diberi es biasa disebut es teh.', 'teh_manis_dingin.jpg', 'price', 0),
(8, 1, 'Teh Melati', 8000, 5, 'Teh', 'Teh melati adalah minuman teh yang diramu dengan bunga melati. Minuman ini berasal dari zaman Dinasti Song. Biasanya teh melati dibuat dengan bahan dasar teh hijau atau teh putih.', 'teh_melati.jpg', 'percent', 50),
(9, 2, 'Coffee Latte Indah', 24000, 12, 'Kopi', 'Kopi latte indah', 'latte.jpg', 'price', 0),
(81, 1, 'Kopi Spesial 9', 12000, 0, 'Kopi', 'Percobaan ke 9 ', 'p-15112023-033001.jpg', 'price', 2000),
(82, 1, 'Teh Mawar Spesial', 12000, 0, 'Teh', 'Teh mawar spesial dari Iqbal Cafe', 'p-26112023-082438.jpg', 'price', 2000),
(83, 1, 'Teh Orchid', 13000, 0, 'Teh', 'Teh varian baru, Orchid.', 'p-26112023-082539.png', 'price', 1000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaction`
--

CREATE TABLE `transaction` (
  `id_transaction` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_merchant` int(11) NOT NULL,
  `id_method` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  `total_harga` int(11) NOT NULL,
  `total_diskon` int(11) NOT NULL,
  `no_meja` int(11) NOT NULL,
  `jenis_pesanan` enum('dine-in','take-away') NOT NULL,
  `status_pesanan` int(1) NOT NULL,
  `keterangan` text NOT NULL,
  `bukti_bayar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transaction`
--

INSERT INTO `transaction` (`id_transaction`, `id_user`, `id_merchant`, `id_method`, `tanggal`, `waktu`, `total_harga`, `total_diskon`, `no_meja`, `jenis_pesanan`, `status_pesanan`, `keterangan`, `bukti_bayar`) VALUES
(1, 1, 1, 1, '2023-10-17', '06:43:34', 40000, 0, 1, 'dine-in', 2, '-', '-'),
(2, 1, 1, 1, '2023-10-17', '06:49:34', 30000, 0, 1, 'dine-in', 2, '-', '-'),
(3, 1, 1, 1, '2023-11-01', '13:50:25', 25000, 0, 2, 'dine-in', 2, '-', '-'),
(4, 1, 1, 1, '2023-11-01', '13:35:08', 64000, 0, 2, 'dine-in', 2, '-', '-'),
(61, 1, 1, 1, '2023-11-12', '16:36:11', 42000, 0, 0, 'dine-in', 2, '', ''),
(62, 1, 1, 1, '2023-11-12', '16:37:48', 27000, 0, 0, 'dine-in', 2, '', ''),
(63, 1, 1, 1, '2023-11-12', '16:49:40', 66000, 0, 0, 'dine-in', 2, '', ''),
(64, 1, 1, 1, '2023-11-12', '17:00:16', 33000, 0, 0, 'dine-in', 2, '', ''),
(65, 1, 1, 1, '2023-11-12', '17:02:14', 48000, 0, 0, 'dine-in', 2, '', ''),
(66, 1, 1, 1, '2023-11-12', '17:05:44', 32000, 0, 0, 'dine-in', 2, '', ''),
(67, 1, 1, 1, '2023-11-13', '02:21:01', 33000, 0, 0, 'take-away', 2, '', ''),
(68, 1, 1, 1, '2023-11-13', '02:43:39', 33000, 0, 0, 'dine-in', 2, '', ''),
(69, 1, 1, 1, '2023-11-13', '02:44:05', 17000, 0, 0, 'dine-in', 2, '', ''),
(70, 1, 1, 1, '2023-11-13', '06:16:43', 17000, 0, 0, 'dine-in', 2, '', ''),
(71, 1, 1, 1, '2023-11-13', '07:08:50', 48000, 0, 0, 'dine-in', 2, '', ''),
(72, 1, 1, 1, '2023-11-13', '07:25:18', 24000, 0, 0, 'dine-in', 2, '', ''),
(73, 1, 1, 1, '2023-11-13', '09:21:06', 70000, 0, 0, 'take-away', 2, '', ''),
(74, 1, 1, 1, '2023-11-13', '09:21:41', 42000, 0, 0, 'dine-in', 2, '', ''),
(75, 1, 1, 1, '2023-11-13', '09:47:08', 38000, 0, 0, 'dine-in', 1, '', ''),
(76, 1, 1, 1, '2023-11-14', '18:43:42', 48000, 0, 0, 'dine-in', 1, '', ''),
(77, 1, 1, 1, '2023-11-15', '09:40:55', 48000, 0, 1, 'dine-in', 1, '', ''),
(78, 1, 1, 1, '2023-11-16', '02:46:43', 42000, 0, 0, 'dine-in', 1, '', ''),
(79, 1, 1, 1, '2023-11-16', '06:07:30', 42000, 0, 0, 'dine-in', 1, '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaction_sub`
--

CREATE TABLE `transaction_sub` (
  `id_sub` int(11) NOT NULL,
  `id_transaction` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `diskon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transaction_sub`
--

INSERT INTO `transaction_sub` (`id_sub`, `id_transaction`, `id_product`, `jumlah`, `subtotal`, `diskon`) VALUES
(1, 1, 2, 1, 22000, 0),
(2, 1, 3, 1, 18000, 0),
(3, 2, 5, 1, 30000, 0),
(4, 3, 7, 1, 15000, 0),
(5, 3, 6, 2, 30000, 0),
(6, 4, 1, 2, 48000, 0),
(7, 4, 8, 2, 16000, 0),
(18, 61, 3, 1, 18000, 0),
(19, 61, 1, 1, 24000, 0),
(20, 62, 3, 1, 18000, 0),
(21, 62, 7, 1, 9000, 0),
(22, 63, 5, 1, 30000, 0),
(23, 63, 3, 2, 36000, 0),
(24, 64, 1, 1, 24000, 0),
(25, 64, 7, 1, 9000, 0),
(26, 65, 3, 1, 18000, 0),
(27, 65, 5, 1, 30000, 0),
(28, 66, 1, 1, 24000, 0),
(29, 66, 6, 1, 8000, 0),
(30, 67, 7, 1, 9000, 0),
(31, 67, 1, 1, 24000, 0),
(32, 68, 7, 1, 9000, 0),
(33, 68, 1, 1, 24000, 0),
(34, 69, 7, 1, 9000, 0),
(35, 69, 6, 1, 8000, 0),
(36, 70, 7, 1, 9000, 0),
(37, 70, 6, 1, 8000, 0),
(38, 71, 5, 1, 30000, 0),
(39, 71, 3, 1, 18000, 0),
(40, 72, 1, 1, 24000, 0),
(41, 73, 2, 1, 22000, 0),
(42, 73, 1, 2, 48000, 0),
(43, 74, 3, 1, 18000, 0),
(44, 74, 1, 1, 24000, 0),
(45, 75, 5, 3, 30000, 0),
(46, 75, 8, 1, 8000, 0),
(47, 76, 5, 1, 30000, 0),
(48, 76, 3, 1, 18000, 0),
(49, 77, 9, 2, 48000, 0),
(50, 78, 5, 1, 30000, 0),
(51, 78, 81, 1, 12000, 0),
(52, 79, 1, 1, 24000, 0),
(53, 79, 3, 1, 18000, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` enum('pria','wanita') NOT NULL,
  `alamat` text NOT NULL,
  `foto` varchar(255) NOT NULL,
  `google_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `email`, `password`, `gender`, `alamat`, `foto`, `google_id`) VALUES
(1, 'Iqbal Ramadhan', 'iqbal123', 'iqbal123@gmail.com', 'iqbal123', 'pria', 'Jl. Medan', 'iqbal.jpg', '0'),
(3, 'Angga Yunanda', 'angga12', 'angga12@gmail.com', 'angga12', 'pria', 'Jl. Perkantoran', 'angga.jpg', '1'),
(4, 'Indah', 'indah123', 'indah@gmail.com', 'indah123', 'wanita', 'Gg. Indah', 'indah.jpg', ''),
(16, 'Olivia Rodrigo', 'oliviaa', 'oliviaa@gmail.com', 'oliviaa', 'wanita', 'Amerika Serikat', '', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `merchant`
--
ALTER TABLE `merchant`
  ADD PRIMARY KEY (`id_merchant`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `merchant_employee`
--
ALTER TABLE `merchant_employee`
  ADD PRIMARY KEY (`id_employee`),
  ADD KEY `id_merchant` (`id_merchant`),
  ADD KEY `id_user2` (`id_user`);

--
-- Indeks untuk tabel `merchant_payment`
--
ALTER TABLE `merchant_payment`
  ADD PRIMARY KEY (`id_payment`),
  ADD KEY `id_method` (`id_method`),
  ADD KEY `id_merchant2` (`id_merchant`);

--
-- Indeks untuk tabel `payment_method`
--
ALTER TABLE `payment_method`
  ADD PRIMARY KEY (`id_method`);

--
-- Indeks untuk tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `id_merchant4` (`id_merchant`);

--
-- Indeks untuk tabel `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id_transaction`),
  ADD KEY `id_user3` (`id_user`),
  ADD KEY `id_merchant3` (`id_merchant`),
  ADD KEY `id_method2` (`id_method`);

--
-- Indeks untuk tabel `transaction_sub`
--
ALTER TABLE `transaction_sub`
  ADD PRIMARY KEY (`id_sub`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_transaction` (`id_transaction`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `merchant`
--
ALTER TABLE `merchant`
  MODIFY `id_merchant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `merchant_employee`
--
ALTER TABLE `merchant_employee`
  MODIFY `id_employee` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `merchant_payment`
--
ALTER TABLE `merchant_payment`
  MODIFY `id_payment` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `payment_method`
--
ALTER TABLE `payment_method`
  MODIFY `id_method` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT untuk tabel `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id_transaction` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT untuk tabel `transaction_sub`
--
ALTER TABLE `transaction_sub`
  MODIFY `id_sub` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `merchant`
--
ALTER TABLE `merchant`
  ADD CONSTRAINT `id_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `merchant_employee`
--
ALTER TABLE `merchant_employee`
  ADD CONSTRAINT `id_merchant` FOREIGN KEY (`id_merchant`) REFERENCES `merchant` (`id_merchant`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_user2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `merchant_payment`
--
ALTER TABLE `merchant_payment`
  ADD CONSTRAINT `id_merchant2` FOREIGN KEY (`id_merchant`) REFERENCES `merchant` (`id_merchant`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_method` FOREIGN KEY (`id_method`) REFERENCES `payment_method` (`id_method`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `id_merchant4` FOREIGN KEY (`id_merchant`) REFERENCES `merchant` (`id_merchant`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `id_merchant3` FOREIGN KEY (`id_merchant`) REFERENCES `merchant` (`id_merchant`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_method2` FOREIGN KEY (`id_method`) REFERENCES `payment_method` (`id_method`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_user3` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaction_sub`
--
ALTER TABLE `transaction_sub`
  ADD CONSTRAINT `id_product` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_transaction` FOREIGN KEY (`id_transaction`) REFERENCES `transaction` (`id_transaction`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
