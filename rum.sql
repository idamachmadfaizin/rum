-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Apr 2019 pada 17.57
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rum`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `email_admin` varchar(255) NOT NULL,
  `password_admin` varchar(255) NOT NULL,
  `nama_admin` varchar(255) NOT NULL,
  `nomor_telp_admin` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart`
--

CREATE TABLE `cart` (
  `id_cart` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `qty_cart` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `cart`
--

INSERT INTO `cart` (`id_cart`, `id_customer`, `id_produk`, `qty_cart`) VALUES
(3, 3, 5, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cluster`
--

CREATE TABLE `cluster` (
  `id_cluster` int(11) NOT NULL,
  `group_cluster` varchar(2) NOT NULL,
  `id_detail_kmeans` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `cluster`
--

INSERT INTO `cluster` (`id_cluster`, `group_cluster`, `id_detail_kmeans`) VALUES
(1, '0', 3),
(2, '0', 6),
(3, '1', 9),
(4, '1', 12),
(5, '1', 15);

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `id_customer` int(11) NOT NULL,
  `email_customer` varchar(255) NOT NULL,
  `password_customer` varchar(255) NOT NULL,
  `nama_customer` varchar(255) DEFAULT NULL,
  `nomor_telp` varchar(13) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `jenis_kelamin` enum('Pria','Wanita') DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `url_img_customer` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `customer_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `customer_updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`id_customer`, `email_customer`, `password_customer`, `nama_customer`, `nomor_telp`, `address`, `jenis_kelamin`, `tanggal_lahir`, `url_img_customer`, `customer_created_at`, `customer_updated_at`) VALUES
(3, 'customer3@gmail.com', '033f7f6121501ae98285ad77f216d5e7', 'customer3', '08123456789', 'karangploso1', 'Pria', '2019-01-01', 'default.jpg', '2019-02-04 18:48:46', '2019-02-17 17:44:52'),
(4, 'customer4@gmail.com', '55feb130be438e686ad6a80d12dd8f44', NULL, '085123456789', NULL, NULL, NULL, '', '2019-02-04 19:43:28', '2019-02-04 19:43:28'),
(5, 'customer5@gmail.com', '9e8486cdd435beda9a60806dd334d964', NULL, '085123456789', NULL, NULL, NULL, '', '2019-02-04 19:44:39', '2019-02-04 19:44:39'),
(6, 'customer6@gmail.com', 'dbaa8bd25e06cc641f5406027c026e8b', NULL, '085123456789', NULL, NULL, NULL, '', '2019-02-04 19:49:03', '2019-02-04 19:49:03'),
(7, 'customer7@gmail.com', '81162e1ef3d93f96b36d3712ca52bca5', NULL, '085123456789', NULL, NULL, NULL, '', '2019-02-04 19:54:24', '2019-02-04 19:54:24'),
(8, 'customer8@gmail.com', '3079e3991f94d1b3b21b894f329d369d', NULL, '086123456789', NULL, NULL, NULL, '', '2019-02-04 19:55:20', '2019-02-04 19:55:20'),
(9, 'customer9@gmail.com', '2f72319caec5d639aead26fc77b5ef67', NULL, '08123456789', NULL, NULL, NULL, 'default.jpg', '2019-02-09 19:48:10', '2019-02-09 19:48:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_kmeans`
--

CREATE TABLE `detail_kmeans` (
  `id_detail_kmeans` int(11) NOT NULL,
  `id_kmeans` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_kmeans`
--

INSERT INTO `detail_kmeans` (`id_detail_kmeans`, `id_kmeans`, `id_produk`, `nilai`) VALUES
(1, 1, 1, 1),
(2, 2, 1, 1),
(3, 3, 1, 0),
(4, 1, 2, 2),
(5, 2, 2, 1),
(6, 3, 2, 0),
(7, 1, 3, 4),
(8, 2, 3, 3),
(9, 3, 3, 0),
(10, 1, 4, 5),
(11, 2, 4, 4),
(12, 3, 4, 0),
(13, 1, 5, 3),
(14, 2, 5, 4),
(15, 3, 5, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_order`
--

CREATE TABLE `detail_order` (
  `id_detail_order` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga_satuan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_order`
--

INSERT INTO `detail_order` (`id_detail_order`, `id_order`, `id_produk`, `jumlah`, `harga_satuan`) VALUES
(3, 61, 4, 1, 25000),
(4, 61, 5, 1, 89500),
(5, 62, 1, 1, 60000),
(6, 62, 3, 1, 7000),
(7, 63, 4, 2, 25000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `image`
--

CREATE TABLE `image` (
  `id_image` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `url_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `image`
--

INSERT INTO `image` (`id_image`, `id_produk`, `url_image`) VALUES
(1, 1, 'assets/img/produk/baby octopus 1.jpg'),
(2, 1, 'assets/img/produk/baby octopus 2.jpg'),
(3, 1, 'assets/img/produk/baby octopus 3.jpg'),
(4, 2, 'assets/img/produk/BATARI-Bandeng-Tanpa-Duri-RUM-1.jpg'),
(5, 2, 'assets/img/produk/BATARI-Bandeng-Tanpa-Duri-RUM-2.jpg'),
(6, 2, 'assets/img/produk/BATARI-Bandeng-Tanpa-Duri-RUM-3.jpg'),
(7, 3, 'assets/img/produk/Cumi Flower RUM 1.jpg'),
(8, 3, 'assets/img/produk/Cumi Flower RUM 2.jpg'),
(9, 3, 'assets/img/produk/Cumi Flower RUM 3.jpg'),
(10, 4, 'assets/img/produk/Cumi Kupas RUM.jpg'),
(11, 4, 'assets/img/produk/Cumi Kupas RUM.jpg'),
(12, 4, 'assets/img/produk/Cumi Kupas RUM.jpg'),
(13, 5, 'assets/img/produk/Cumi Ring RUM.jpg'),
(14, 5, 'assets/img/produk/Cumi Ring RUM.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `url_image_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `url_image_kategori`) VALUES
(1, 'Seafood', 'assets/img/kategori/kategori seafood.jpg'),
(2, 'Umpan Tuna', 'assets/img/kategori/kategori umpan tuna.jpg'),
(3, 'Dry Seafood', 'assets/img/kategori/dry-seafood.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfirmasi_pembayaran`
--

CREATE TABLE `konfirmasi_pembayaran` (
  `id_konfirmasi` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `tanggal_tf` date NOT NULL,
  `bukti_tf` varchar(255) NOT NULL,
  `nama_bank` varchar(255) NOT NULL,
  `bank_owner` varchar(255) NOT NULL,
  `note` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `konfirmasi_pembayaran`
--

INSERT INTO `konfirmasi_pembayaran` (`id_konfirmasi`, `id_order`, `tanggal_tf`, `bukti_tf`, `nama_bank`, `bank_owner`, `note`) VALUES
(9, 61, '2019-03-08', '61-2019-03-08.png', 'BCA', 'customer3', 'qwe');

-- --------------------------------------------------------

--
-- Struktur dari tabel `k_means`
--

CREATE TABLE `k_means` (
  `id_kmeans` int(11) NOT NULL,
  `nama_variable` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `k_means`
--

INSERT INTO `k_means` (`id_kmeans`, `nama_variable`) VALUES
(1, 'lokasi'),
(2, 'usia'),
(3, 'Pekerjaan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id_order` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `tgl_order` date NOT NULL,
  `total_harga` int(11) NOT NULL,
  `status` enum('Menunggu','Dibayar','Proses','Pengiriman') NOT NULL DEFAULT 'Menunggu'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`id_order`, `id_customer`, `tgl_order`, `total_harga`, `status`) VALUES
(61, 3, '2019-03-12', 114500, 'Dibayar'),
(62, 3, '2019-03-12', 67000, 'Menunggu'),
(63, 3, '2019-04-01', 50000, 'Menunggu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `url_produk` varchar(255) NOT NULL,
  `produk_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `produk_updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `nama_produk`, `harga_produk`, `deskripsi_produk`, `url_produk`, `produk_created_at`, `produk_updated_at`) VALUES
(1, 1, 'FILLET KRESI REDMULLED', 60000, 'ini deskripsi produk fillet kresi redmulled', 'fillet-kresi-redmulled', '2019-02-06 11:14:55', '2019-02-06 11:16:35'),
(2, 1, 'UDANG COOKED PND', 60000, 'ini deskripsi UDANG COOKED PND', 'udang-cooked pnd', '2019-02-06 11:16:22', '2019-02-06 11:16:25'),
(3, 1, 'KEPALA IKAN ODUL', 7000, 'ini deskripsi KEPALA IKAN ODUL', 'kepala-ikan-odol', '2019-02-06 11:17:04', '2019-02-06 11:17:06'),
(4, 2, 'BANDENG UTUH', 25000, 'ini deskripsi BANDENG UTUH', 'bandeng-utuh', '2019-02-06 11:18:26', '2019-02-06 11:18:29'),
(5, 3, 'CUMI KUPU-KUPU RUM', 89500, 'ini deskripsi CUMI KUPU-KUPU RUM', 'cumi-kupu-kupu-rum', '2019-02-06 11:19:05', '2019-02-06 11:19:07'),
(6, 2, 'Produk Baru', 100000, 'ini deskripsi produk baru', 'assets/img/produk/Produk-Baru.png', '2019-03-20 21:16:35', '2019-03-20 21:16:35');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `email` (`email_admin`);

--
-- Indeks untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`),
  ADD KEY `id_produk` (`id_produk`),
  ADD KEY `id_customer` (`id_customer`) USING BTREE;

--
-- Indeks untuk tabel `cluster`
--
ALTER TABLE `cluster`
  ADD PRIMARY KEY (`id_cluster`),
  ADD KEY `id_detail_kmeans` (`id_detail_kmeans`);

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`),
  ADD UNIQUE KEY `email` (`email_customer`);

--
-- Indeks untuk tabel `detail_kmeans`
--
ALTER TABLE `detail_kmeans`
  ADD PRIMARY KEY (`id_detail_kmeans`),
  ADD KEY `id_kmeans` (`id_kmeans`,`id_produk`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indeks untuk tabel `detail_order`
--
ALTER TABLE `detail_order`
  ADD PRIMARY KEY (`id_detail_order`),
  ADD KEY `id_order` (`id_order`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indeks untuk tabel `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id_image`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `konfirmasi_pembayaran`
--
ALTER TABLE `konfirmasi_pembayaran`
  ADD PRIMARY KEY (`id_konfirmasi`),
  ADD KEY `id_order` (`id_order`);

--
-- Indeks untuk tabel `k_means`
--
ALTER TABLE `k_means`
  ADD PRIMARY KEY (`id_kmeans`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_cutomer` (`id_customer`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `cluster`
--
ALTER TABLE `cluster`
  MODIFY `id_cluster` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `detail_kmeans`
--
ALTER TABLE `detail_kmeans`
  MODIFY `id_detail_kmeans` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `detail_order`
--
ALTER TABLE `detail_order`
  MODIFY `id_detail_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `image`
--
ALTER TABLE `image`
  MODIFY `id_image` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `konfirmasi_pembayaran`
--
ALTER TABLE `konfirmasi_pembayaran`
  MODIFY `id_konfirmasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `k_means`
--
ALTER TABLE `k_means`
  MODIFY `id_kmeans` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id_customer`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);

--
-- Ketidakleluasaan untuk tabel `cluster`
--
ALTER TABLE `cluster`
  ADD CONSTRAINT `cluster_ibfk_1` FOREIGN KEY (`id_detail_kmeans`) REFERENCES `detail_kmeans` (`id_detail_kmeans`);

--
-- Ketidakleluasaan untuk tabel `detail_kmeans`
--
ALTER TABLE `detail_kmeans`
  ADD CONSTRAINT `detail_kmeans_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`),
  ADD CONSTRAINT `detail_kmeans_ibfk_2` FOREIGN KEY (`id_kmeans`) REFERENCES `k_means` (`id_kmeans`);

--
-- Ketidakleluasaan untuk tabel `detail_order`
--
ALTER TABLE `detail_order`
  ADD CONSTRAINT `detail_order_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`),
  ADD CONSTRAINT `detail_order_ibfk_2` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id_order`);

--
-- Ketidakleluasaan untuk tabel `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `image_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);

--
-- Ketidakleluasaan untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id_customer`);

--
-- Ketidakleluasaan untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
