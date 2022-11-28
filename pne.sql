-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Sep 2022 pada 09.13
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pne`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `backup`
--

CREATE TABLE `backup` (
  `id` int(11) NOT NULL,
  `file` varchar(128) COLLATE utf8_bin NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Struktur dari tabel `customers`
--

CREATE TABLE `customers` (
  `id` int(3) NOT NULL,
  `cust_name` varchar(64) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(32) NOT NULL,
  `country` varchar(28) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Struktur dari tabel `gbr`
--

CREATE TABLE `gbr` (
  `id` tinyint(4) NOT NULL,
  `file` varchar(128) COLLATE utf8_bin NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Struktur dari tabel `makers`
--

CREATE TABLE `makers` (
  `id` int(3) NOT NULL,
  `maker_name` varchar(64) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(32) NOT NULL,
  `country` varchar(28) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mgrade`
--

CREATE TABLE `mgrade` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `descript` varchar(64) NOT NULL,
  `status` varchar(2) NOT NULL,
  `standard` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- --------------------------------------------------------

--
-- Struktur dari tabel `process`
--

CREATE TABLE `process` (
  `pro_id` int(11) NOT NULL,
  `pro_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `pro_line` varchar(32) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data untuk tabel `process`
--

INSERT INTO `process` (`pro_id`, `pro_name`, `pro_line`) VALUES
(1, 'Shearing', 'Coil Spring'),
(2, 'Tapering', 'Coil Spring'),
(3, 'Heating Furnace', 'Coil Spring'),
(4, 'Coiling', 'Coil Spring'),
(5, 'Pigtailing', 'Coil Spring'),
(6, 'Quenching', 'Coil Spring'),
(7, 'Tempering', 'Coil Spring'),
(8, 'End Grinding', 'Coil Spring'),
(9, 'Hot Setting', 'Coil Spring'),
(10, 'Shot Peening', 'Coil Spring'),
(11, 'Pretreatment', 'Coil Spring'),
(12, 'Powder Coating', 'Coil Spring'),
(13, 'Marking', 'Coil Spring'),
(14, 'Presetting', 'Coil Spring'),
(15, 'Load Testing', 'Coil Spring'),
(16, 'Marking', 'Coil Spring'),
(17, 'Shearing-UB', 'U-Bolt'),
(18, 'CNC', 'U-Bolt'),
(19, 'Heating Furnace-UB', 'U-Bolt'),
(20, 'Hot Forging', 'U-Bolt'),
(21, 'Hot Bending', 'U-Bolt'),
(22, 'Quenching-UB', 'U-Bolt'),
(23, 'Tempering-UB', 'U-Bolt'),
(24, 'Width Correction', 'U-Bolt'),
(25, 'Grit Blasting', 'U-Bolt'),
(26, 'Painting', 'U-Bolt'),
(27, 'Printing', 'U-Bolt'),
(28, 'Labeling', 'U-Bolt'),
(29, 'Nut Assy', 'U-Bolt');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rev_record`
--

CREATE TABLE `rev_record` (
  `doc_id` int(11) NOT NULL,
  `rev_no` int(8) NOT NULL,
  `reason` varchar(128) COLLATE utf8_bin NOT NULL,
  `user_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `rev_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Struktur dari tabel `shapes`
--

CREATE TABLE `shapes` (
  `id` int(11) NOT NULL,
  `init` varchar(16) NOT NULL,
  `name` varchar(32) NOT NULL,
  `dwg_file` varchar(128) NOT NULL,
  `appli` varchar(12) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `shapes`
--

INSERT INTO `shapes` (`id`, `init`, `name`, `dwg_file`, `appli`, `status`) VALUES
(1, 'CYL', 'Mandrel Cylindrical', '', 'Coil Spring', 1),
(2, 'PTL', 'Mandrel Pigtail', '', 'Coil Spring', 1),
(3, 'CON', 'Mandrel Conical', '', 'Coil Spring', 1),
(4, 'SCN', 'Mandrel SemiConical', '', 'Coil Spring', 1),
(5, 'APT', 'Double Pigtail Block', '', 'Coil Spring', 1),
(7, 'GRR', 'Guide Roller', '', 'Coil Spring', 1),
(8, 'SUP-GRR', 'Support Guide Roller', '8615.pdf', 'Coil Spring', 1),
(9, 'DFP', 'Disc Face Plate', '', 'Coil Spring', 1),
(10, 'END-ROL', 'End Roller', '', 'Coil Spring', 1),
(11, 'END-ROL-TAPER', 'End Roller TAPER', '', 'Coil Spring', 1),
(12, 'SEAT', 'Coil Seat', '', 'Coil Spring', 1),
(13, 'STRIPPER PLATE', 'Stripper Plate', '', 'Coil Spring', 1),
(14, 'SHEARING DIE', 'Shearing Dies', '', 'Coil Spring', 1),
(15, 'SHEARING DIE-UB', 'Shearing Dies Ubolt', '', 'U-Bolt', 1),
(16, 'HUF', 'Hot Upper Forging Die', '', 'U-Bolt', 1),
(17, 'HLF', 'Hot Lower Forging Die', '', 'U-Bolt', 1),
(18, 'BENDING', 'End roller', '', 'U-Bolt', 1),
(19, 'Chuck', 'Chuck Coiling', '', 'Coil Spring', 1),
(20, 'GRIP', 'Grip Pigtailing', '', 'Coil Spring', 2),
(21, 'JIG', 'Pigtail profile JIG', '', 'Coil Spring', 1),
(22, 'ADAPTER', 'Adapter fr pigtail APT L1 to L2', '', 'Coil Spring', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `share_tool`
--

CREATE TABLE `share_tool` (
  `id` int(12) NOT NULL,
  `built_pn` varchar(64) COLLATE utf8_bin NOT NULL,
  `tool_id` int(12) NOT NULL,
  `product` varchar(32) COLLATE utf8_bin NOT NULL,
  `share_pn` varchar(64) COLLATE utf8_bin NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_log`
--

CREATE TABLE `tabel_log` (
  `log_id` int(11) NOT NULL,
  `log_time` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `log_user` varchar(32) DEFAULT NULL,
  `log_tipe` tinyint(2) DEFAULT NULL,
  `log_desc` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tool_cs`
--

CREATE TABLE `tool_cs` (
  `id` int(11) NOT NULL,
  `product` varchar(16) COLLATE utf8_bin NOT NULL,
  `shape` text COLLATE utf8_bin DEFAULT NULL,
  `dia_A` decimal(5,2) NOT NULL,
  `dia_B` decimal(5,2) NOT NULL,
  `La` decimal(4,2) DEFAULT NULL,
  `Lb` decimal(4,2) DEFAULT NULL,
  `full_length` decimal(6,1) NOT NULL,
  `coil_A` decimal(4,2) NOT NULL,
  `coil_B` decimal(4,2) NOT NULL,
  `material` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `process` text COLLATE utf8_bin DEFAULT NULL,
  `loc` varchar(16) COLLATE utf8_bin NOT NULL,
  `line` tinyint(2) NOT NULL,
  `zone` varchar(4) COLLATE utf8_bin NOT NULL,
  `remark` varchar(128) COLLATE utf8_bin NOT NULL,
  `cust` varchar(128) COLLATE utf8_bin NOT NULL,
  `built_pn` varchar(128) COLLATE utf8_bin NOT NULL,
  `maker` varchar(128) COLLATE utf8_bin NOT NULL,
  `status` text COLLATE utf8_bin NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `qty` tinyint(4) NOT NULL,
  `rev` tinyint(4) NOT NULL DEFAULT 0,
  `rev_date` date NOT NULL,
  `bin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(24) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(32) NOT NULL,
  `lastname` varchar(32) NOT NULL,
  `last_login` datetime NOT NULL DEFAULT current_timestamp(),
  `foto` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indeks untuk tabel `backup`
--
ALTER TABLE `backup`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `gbr`
--
ALTER TABLE `gbr`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `makers`
--
ALTER TABLE `makers`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mgrade`
--
ALTER TABLE `mgrade`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `process`
--
ALTER TABLE `process`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indeks untuk tabel `shapes`
--
ALTER TABLE `shapes`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `share_tool`
--
ALTER TABLE `share_tool`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tabel_log`
--
ALTER TABLE `tabel_log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indeks untuk tabel `tool_cs`
--
ALTER TABLE `tool_cs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `backup`
--
ALTER TABLE `backup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT untuk tabel `gbr`
--
ALTER TABLE `gbr`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `makers`
--
ALTER TABLE `makers`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `mgrade`
--
ALTER TABLE `mgrade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `process`
--
ALTER TABLE `process`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `shapes`
--
ALTER TABLE `shapes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `share_tool`
--
ALTER TABLE `share_tool`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1359;

--
-- AUTO_INCREMENT untuk tabel `tabel_log`
--
ALTER TABLE `tabel_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tool_cs`
--
ALTER TABLE `tool_cs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1113;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
