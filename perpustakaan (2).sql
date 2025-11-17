-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Nov 2025 pada 14.13
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `penulis` varchar(255) DEFAULT NULL,
  `penerbit` varchar(255) DEFAULT NULL,
  `tahun_terbit` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id_buku`, `id_kategori`, `judul`, `penulis`, `penerbit`, `tahun_terbit`, `deskripsi`) VALUES
(3, 11, 'Laut Bercerita', 'Leila S. Chudori', 'KPG (Kepustakaan Populer Gramedia)', '2017', 'Kisah cinta dan perjuangan Biru Laut, aktivis mahasiswa di masa Orde Baru, yang terpisah dari kekasih dan keluarganya akibat kekerasan politik. Di balik latar sejarah kelam, tersimpan romansa yang lembut dan menyayat.'),
(4, 12, 'Jejak di Tanah Merdeka', 'Ahmad Fadli', 'Bentang Pustaka', '2022', 'Buku sejarah naratif yang menelusuri kisah para tokoh tak dikenal di balik perjuangan kemerdekaan Indonesia, menyoroti sisi kemanusiaan dan pengorbanan mereka.'),
(5, 11, 'Algoritma Cinta di Dunia Virtual', 'Naufal Rizki', 'Bukune', '2023', 'Kisah fiksi romantis antara dua programmer muda yang bertemu lewat proyek startup, di mana cinta dan logika saling bertabrakan dalam dunia virtual.'),
(6, 13, 'Matematika SMA/MA Kelas X (Kurikulum Merdeka)', 'Tim Penulis Pusat Kurikulum dan Perbukuan', 'Kementerian Pendidikan, Kebudayaan, Riset, dan Teknologi (Kemendikbudristek)', '2023', 'Buku teks resmi Kurikulum Merdeka untuk siswa SMA kelas X. Membahas konsep dasar aljabar, fungsi, geometri, dan statistika dengan konteks kehidupan sehari-hari.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`) VALUES
(11, 'Romansa'),
(12, 'Sejarah'),
(13, 'Pendidikan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_buku` int(11) DEFAULT NULL,
  `tanggal_peminjaman` varchar(255) DEFAULT NULL,
  `tanggal_pengembalian` varchar(255) DEFAULT NULL,
  `status_peminjaman` enum('dipinjam','dikebalikan','','') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `id_user`, `id_buku`, `tanggal_peminjaman`, `tanggal_pengembalian`, `status_peminjaman`) VALUES
(1, 6, 3, '2025-11-11', '2025-11-11', 'dikebalikan'),
(3, 3, 3, '2025-11-15', '2025-11-14', 'dikebalikan'),
(4, 3, 3, '2025-11-15', '2025-11-14', 'dikebalikan'),
(5, 3, 4, '2025-11-13', '2025-11-14', 'dikebalikan'),
(6, 3, 3, '2025-11-19', '2025-11-28', 'dikebalikan');

-- --------------------------------------------------------

--

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `no_telepon` varchar(255) DEFAULT NULL,
  `level` enum('admin','petugas','peminjam','') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `email`, `alamat`, `no_telepon`, `level`) VALUES
(1, 'administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail.com', 'bss', '08123123', 'admin'),
(2, 'petugas 1', 'petugas', 'afb91ef692fd08c445e8cb1bab2ccf9c', 'petugas@gmail.com', 'tugusari', '08321321', 'petugas'),
(3, 'm.reffan', 'reffan', '00ba332d7b30756e2e9b2e61dc8d972d', 'reffan@gmail.com', 'stasiun', '081222222', 'peminjam'),
(4, 'peminjam2', 'peminjam2', '202cb962ac59075b964b07152d234b70', 'peminjam2@gmail.com', 'langkap', '0843222', 'peminjam'),
(5, 'muhammad irsyadul ibad', 'irsyad', '1ea3baae32353b614c132c2eebdfe2ed', 'ibad@gmail.com', 'sadengan raceway', '0987655', 'peminjam'),
(6, 'muhammad reffan', 'reffan2', 'abdc2349071d883e46a61baba751f7c2', 'reffannn@gmail.com', 'bangsalsari', '0813352870', 'peminjam');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_buku` (`id_buku`);

--
-- Indeks untuk tabel `ulasan`
--
ALTER TABLE `ulasan`
  ADD PRIMARY KEY (`id_ulasan`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_buku` (`id_buku`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `ulasan`
--
ALTER TABLE `ulasan`
  MODIFY `id_ulasan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);

--
-- Ketidakleluasaan untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`);

--
-- Ketidakleluasaan untuk tabel `ulasan`
--
ALTER TABLE `ulasan`
  ADD CONSTRAINT `ulasan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `ulasan_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
