-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Des 2023 pada 06.10
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_shop`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart`
--

CREATE TABLE `cart` (
  `id_produk` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `status` enum('disimpan','selesai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `cart`
--

INSERT INTO `cart` (`id_produk`, `id_user`, `price`, `qty`, `subtotal`, `status`) VALUES
(2, 1, 150000, 1, 150000, 'disimpan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `category products`
--

CREATE TABLE `category products` (
  `id_category` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `category products`
--

INSERT INTO `category products` (`id_category`, `name`) VALUES
(1, 'T-shirt'),
(2, 'pants'),
(3, 'shirt'),
(4, 'sepatu'),
(5, 'shorts pants'),
(6, 'hat'),
(7, 'accessories');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `nomor_transaksi` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `tangal_transaksi` datetime NOT NULL DEFAULT current_timestamp(),
  `status_pembayaran` enum('menunggu pembayaran','selesai') NOT NULL,
  `metode_pengririman` varchar(100) NOT NULL,
  `alamat_pengriman` varchar(200) NOT NULL,
  `nama_penerima` varchar(200) NOT NULL,
  `status_pengriman` enum('dikemas','dalam pengriman','selesai dikirim') NOT NULL,
  `lnk` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`nomor_transaksi`, `id_transaksi`, `total`, `tangal_transaksi`, `status_pembayaran`, `metode_pengririman`, `alamat_pengriman`, `nama_penerima`, `status_pengriman`, `lnk`) VALUES
(4258137, 835855280, 500000, '2023-12-05 13:45:42', 'menunggu pembayaran', 'tiki', '19,Kepulauan Aru,,testing', 'agus', 'dikemas', '02d96045-d854-45bb-bcb9-a7fd237603ae'),
(946061622, 542753799, 450000, '2023-12-05 11:32:21', 'menunggu pembayaran', 'jne', '15,Kutai Barat,,ndndndndn', 'agus', 'dikemas', 'b8371ed8-92b1-4147-aa5a-8dea82d9d61b');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product`
--

CREATE TABLE `product` (
  `id_product` int(11) NOT NULL,
  `name_product` varchar(50) NOT NULL,
  `description` varchar(250) NOT NULL,
  `stok` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `photo_prd` varchar(256) NOT NULL,
  `product_category` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `product`
--

INSERT INTO `product` (`id_product`, `name_product`, `description`, `stok`, `price`, `photo_prd`, `product_category`, `created_at`) VALUES
(1, 'sabu', 'nsnsnsnsnsn', 11, 100000, 'sjssjsn', 1, '2023-11-17 15:39:25'),
(2, 'Consina  Grey Wolves', 'Outer yang sempurna untuk dikenakan kala cuaca panas\r\nSoft shell', 20, 150000, 'https://img.id.my-best.com/product_images/ebd820b0ca5ab1fcb2e6ba3747c7da0f.jpg?ixlib=rails-4.3.1&q=70&lossless=0&w=640&h=640&fit=clip&s=531b548404014a6ab86a46a31b92851b', 1, '2023-11-28 07:12:50'),
(3, 'Consina  Moscva', 'Dilengkapi banyak saku berukuran besar yang mampu menyimpan aneka barang\r\nBerbeda dengan jaket Consina pada umumnya, Consina Moscva memiliki model parka yang kasual plus stylish. Jaket ini tidak cocok digunakan untuk naik gunung karena kurang mampu m', 20, 20000, 'https://img.id.my-best.com/product_images/7057f9c5225b0691b66d84631681fc03.jpg?ixlib=rails-4.3.1&q=70&lossless=0&w=240&h=240&fit=fill&fill=solid&fill-color=FFFFFF&s=674dcaeabeba7cfc19345633b0573abe', 1, '2023-11-28 07:15:36'),
(4, 'Mountain Pro', '', 100, 100000, 'https://shop.consina-adventure.com/image/cache/data/product/APPAREL/JACKET/WATERPROOF%20SHELL/TECHNICAL/Mountain%20Pro/Mountain-Pro-YL-3-800x800.jpg', 1, '2023-11-29 04:45:08'),
(5, 'The North Face 1996 Jacket Mountain', 'Jaket Boombers The North Face (Mountain Jacket), Jaket Gunung membuat hangat tubuh ', 50, 1000000, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRjwa2-Tl1WPV3oZvWCsceOIDNRT5DdEvsNDg&usqp=CAU,https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSeGFZrbcbifDQ1W4CFogH5BLejaKzOfMoEww&usqp=CAU', 1, '2023-11-29 04:47:28'),
(6, 'MEN\'S EASY T-SHIRT', 'Standard fit: This garment is true to size for an easy, comfortable fit.The Easy T-Shirt, made from 100% cotton,', 120, 12000, 'https://images.thenorthface.com/is/image/TheNorthFaceEU/2TX3_FN4_hero?$262x306$', 1, '2023-11-29 04:51:11'),
(7, 'GAZELLE HI LUMUT', 'The original silhouette of Compass that started it all in 1998. Combining its vintage roots with modern details, the Gazelle Hi is classic with an attitude. \r\nOur new seasonal color, Moss, highlights the natural green of nature.', 50, 20000, 'https://compass-ecom-bucket.s3-ap-southeast-1.amazonaws.com/images/productdetail/d39810afbbe13242dd6c94f37fc50fd73ac4df3d.png,\r\nhttps://compass-ecom-bucket.s3-ap-southeast-1.amazonaws.com/images/productdetail/d8a457adf8675b3f035e1affd967f5d1d2561a3a.png', 4, '2023-11-29 04:53:48'),
(8, 'EIGER SHIKRA SHOES WOMAN', 'Sepatu Shikra memiliki desain low-cut yang dirancang khusus untuk menunjang performa berlari Anda di luar ruang, terutama di area dengan permukaan yang tidak rata.', 40, 5000, 'https://thumbor.sirclocdn.com/unsafe/640x640/filters:format(webp)/magento.eigeradventure.com/media/catalog/product/cache/cd1064cf96e0921aa13324f8e3f8fe30/0/0/000000000910007709_1.jpg', 4, '2023-11-29 04:55:29'),
(9, 'EIGER X-MENS CAMP EXPLORE PANTS', 'Kenakan X-Mens Camp Explore Pants dan tempuh track dengan keleluasaan bergerak berkat desain articulated knees dan gusset di bagian belakang.\r\n', 20, 200000, 'https://thumbor.sirclocdn.com/unsafe/640x640/filters:format(webp)/magento.eigeradventure.com/media/catalog/product/cache/cd1064cf96e0921aa13324f8e3f8fe30/9/1/910007697.oli1.jpg', 2, '2023-11-29 04:56:45'),
(10, 'Alpha Pant Gen 2 Men\'s | Arc\'teryx LEAF', 'Durable waterproof/breathable shell pant for inclement conditions. Accommodates cold weather and seasonal layering, or functions as full weather protection over combat uniforms. Abrasion resistant and durable in rugged environments.\r\nProduct Certific', 20, 50000, 'https://images.arcteryx.com/F21/1350x1710/Alpha-Pant-Gen-2-Crocodile.jpg', 2, '2023-11-29 05:02:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(18) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `id_produk`, `price`, `qty`, `subtotal`) VALUES
(542753799, 1, 2, 150000, 3, 450000),
(835855280, 1, 4, 100000, 5, 500000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `password` varchar(250) NOT NULL,
  `email` varchar(40) NOT NULL,
  `no_phone` varchar(14) NOT NULL,
  `addres` varchar(200) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `role` enum('admin','users','merchant','owner') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `name`, `password`, `email`, `no_phone`, `addres`, `photo`, `role`) VALUES
(1, 'agus ganteng', '$2y$10$RZhgIn9igWrD3EssV8Dl.OKVK8QV7LN1/8AmTaYDuoKCMZ5YPH9Oy', 'zaldyramlan24@gmail.com', '081290870803', '', 'https://lh3.googleusercontent.com/a/ACg8ocKupcum5NJ3vwVqQpg6EcBi3IfE92XdPts5YxzGVb2c=s96-c', 'users'),
(2, '', '495535207', '41522010284@student.mercubuana.ac.id', '', '', 'https://lh3.googleusercontent.com/a/ACg8ocI8fMDkiLerDdB7IBSa_Ofy3hVH-d5Q7UJChJ-UQRRz=s96-c', 'users');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD KEY `id_produk` (`id_produk`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `category products`
--
ALTER TABLE `category products`
  ADD PRIMARY KEY (`id_category`);

--
-- Indeks untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`nomor_transaksi`),
  ADD KEY `id_transaksi` (`id_transaksi`);

--
-- Indeks untuk tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `product category` (`product_category`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `category products`
--
ALTER TABLE `category products`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `nomor_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1819547522;

--
-- AUTO_INCREMENT untuk tabel `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `product` (`id_product`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `detail_transaksi_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`);

--
-- Ketidakleluasaan untuk tabel `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`product_category`) REFERENCES `category products` (`id_category`);

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `product` (`id_product`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
