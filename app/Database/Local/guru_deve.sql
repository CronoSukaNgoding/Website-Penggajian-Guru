-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2023 at 08:56 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `guru_deve`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi_guru`
--

CREATE TABLE `absensi_guru` (
  `absen_id` int(100) NOT NULL,
  `guru` varchar(100) NOT NULL,
  `absen_hari` varchar(100) NOT NULL,
  `tanggal_absensi` varchar(100) NOT NULL,
  `jam_masuk_ngajar` varchar(100) NOT NULL,
  `jam_keluar_ngajar` varchar(100) NOT NULL,
  `total_jam` varchar(100) NOT NULL,
  `status` enum('Hadir','Tidak Hadir','Izin','Sakit') NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gaji_guru`
--

CREATE TABLE `gaji_guru` (
  `gaji_id` int(11) NOT NULL,
  `guru` varchar(100) DEFAULT NULL,
  `jam_kerja` varchar(100) DEFAULT NULL,
  `total_gaji` varchar(100) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gaji_guru`
--

INSERT INTO `gaji_guru` (`gaji_id`, `guru`, `jam_kerja`, `total_gaji`, `created_at`, `updated_at`) VALUES
(1, '4', '1', '0', '2023-02-26 07:53:21', '2023-02-26 07:53:21'),
(2, '3', '1', '0', '2023-02-26 07:55:06', '2023-02-26 07:55:52');

-- --------------------------------------------------------

--
-- Table structure for table `grouprole`
--

CREATE TABLE `grouprole` (
  `id` int(100) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grouprole`
--

INSERT INTO `grouprole` (`id`, `role`) VALUES
(1, 'admin'),
(2, 'guru');

-- --------------------------------------------------------

--
-- Table structure for table `group_ajar`
--

CREATE TABLE `group_ajar` (
  `ajar_id` int(100) NOT NULL,
  `kode_pelajaran` varchar(100) NOT NULL,
  `hari` varchar(100) NOT NULL,
  `waktu_mulai` varchar(100) NOT NULL,
  `waktu_selesai` varchar(100) NOT NULL,
  `jam_kerja` varchar(100) NOT NULL,
  `id_guru` varchar(100) NOT NULL,
  `idmapel` varchar(100) NOT NULL,
  `idkelas` int(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `group_ajar`
--

INSERT INTO `group_ajar` (`ajar_id`, `kode_pelajaran`, `hari`, `waktu_mulai`, `waktu_selesai`, `jam_kerja`, `id_guru`, `idmapel`, `idkelas`, `created_at`, `updated_at`) VALUES
(1, 'MPL-1677385619', 'Senin', '6', '8', '2', '3', '1', 1, '2023-02-26 04:27:11', '2023-02-26 04:27:11'),
(2, 'MPL-1677386961', 'Senin', '8', '10', '2', '4', '2', 1, '2023-02-26 04:49:35', '2023-02-26 04:49:35');

-- --------------------------------------------------------

--
-- Table structure for table `group_gaji`
--

CREATE TABLE `group_gaji` (
  `group_gaji_id` int(100) NOT NULL,
  `role` int(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `gaji_absen` int(100) NOT NULL,
  `gaji_perjam` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `group_gaji`
--

INSERT INTO `group_gaji` (`group_gaji_id`, `role`, `jabatan`, `gaji_absen`, `gaji_perjam`) VALUES
(1, 2, 'Guru Honorer', 20000, 55000);

-- --------------------------------------------------------

--
-- Table structure for table `group_mapel`
--

CREATE TABLE `group_mapel` (
  `mapel_id` int(11) NOT NULL,
  `kode_mapel` varchar(100) NOT NULL,
  `mapel` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `group_mapel`
--

INSERT INTO `group_mapel` (`mapel_id`, `kode_mapel`, `mapel`) VALUES
(1, 'MP-1677383035', 'Pendidikan Agama dan Budi Pekerti'),
(2, 'MP-1677383170', 'Pendidikan Pancasila'),
(3, 'MP-1677383184', 'Bahasa Indonesia'),
(4, 'MP-1677383194', 'Matematika'),
(5, 'MP-1677383201', 'Pendidikan Jasmani, Olahraga dan Kesehatan'),
(6, 'MP-1677383220', 'Seni dan Budaya'),
(7, 'MP-1677383230', 'Bahasa Inggris');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `kelas_id` int(100) NOT NULL,
  `kd_kelas` varchar(100) NOT NULL,
  `nama_kelas` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`kelas_id`, `kd_kelas`, `nama_kelas`, `created_at`, `updated_at`) VALUES
(1, 'KL-1677383253', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'KL-1677383263', '2', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'KL-1677383266', '3', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'KL-1677383271', '4', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'KL-1677383275', '5', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'KL-1677383280', '6', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int(100) NOT NULL,
  `userid` varchar(255) NOT NULL,
  `nuptk` varchar(100) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `nohp` varchar(15) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `pendidikan_akhir` varchar(100) DEFAULT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan','','') NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `userid`, `nuptk`, `tempat_lahir`, `alamat`, `nohp`, `tgl_lahir`, `pendidikan_akhir`, `jenis_kelamin`, `created_at`, `updated_at`) VALUES
(1, '1', '101010', 'Jakarta', 'Jl.Mampang Prapatan', '085895950113', '2002-03-01', '', 'Laki-Laki', '2023-02-26 03:17:20', '2023-02-26 03:17:20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(100) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `avatar` varchar(100) NOT NULL,
  `role_id` varchar(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fullname`, `username`, `email`, `password`, `avatar`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 'syahiid', 'syahiid', 'syahiid@gmail.com', '$2y$10$hxUtbkh/hX7VtkNWczChAO.CTGG0Om2PDSJgV7TbImY4v4AspDKke', 'default-avatar.jpg', '1', '2023-02-26 03:10:32', '2023-02-26 03:17:20'),
(3, 'guruojes', 'guruojes', 'guruojes@gmail.com', '$2y$10$0SPN88rTMNEuxXSe.LAhW.e7hxAocRZ4a4QBaYJ9GneIOT0VtfP9W', 'default-avatar.jpg', '2', '2023-02-26 04:26:04', '2023-02-26 04:26:04'),
(4, 'zaky', 'gurudzaky', 'zaky@gmail.com', '$2y$10$i8WpnqNnc6efAuLkMm6moeGiWhB2c6UwArwRSioQ2LOle/bU9BH86', 'default-avatar.jpg', '2', '2023-02-26 04:48:53', '2023-02-26 04:48:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi_guru`
--
ALTER TABLE `absensi_guru`
  ADD PRIMARY KEY (`absen_id`);

--
-- Indexes for table `gaji_guru`
--
ALTER TABLE `gaji_guru`
  ADD PRIMARY KEY (`gaji_id`);

--
-- Indexes for table `grouprole`
--
ALTER TABLE `grouprole`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_ajar`
--
ALTER TABLE `group_ajar`
  ADD PRIMARY KEY (`ajar_id`);

--
-- Indexes for table `group_gaji`
--
ALTER TABLE `group_gaji`
  ADD PRIMARY KEY (`group_gaji_id`);

--
-- Indexes for table `group_mapel`
--
ALTER TABLE `group_mapel`
  ADD PRIMARY KEY (`mapel_id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`kelas_id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi_guru`
--
ALTER TABLE `absensi_guru`
  MODIFY `absen_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gaji_guru`
--
ALTER TABLE `gaji_guru`
  MODIFY `gaji_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `grouprole`
--
ALTER TABLE `grouprole`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `group_ajar`
--
ALTER TABLE `group_ajar`
  MODIFY `ajar_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `group_gaji`
--
ALTER TABLE `group_gaji`
  MODIFY `group_gaji_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `group_mapel`
--
ALTER TABLE `group_mapel`
  MODIFY `mapel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `kelas_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
