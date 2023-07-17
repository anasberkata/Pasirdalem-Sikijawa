-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 17, 2023 at 08:51 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sikijawa`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `id_alternatif` int(11) NOT NULL,
  `pegawai_id` int(11) NOT NULL,
  `periode_id` int(11) NOT NULL,
  `nilai_alternatif` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`id_alternatif`, `pegawai_id`, `periode_id`, `nilai_alternatif`) VALUES
(3, 2, 1, 5.8),
(4, 1, 1, 19);

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `jabatan`, `deskripsi`) VALUES
(1, 'BPD', ''),
(2, 'Kepala Desa / Kepala Dusun / Lurah', '<p>Di Desa Pasirdalem, terdapat pembagian wilayah kecil yang disebut dusun atau kelurahan. Setiap dusun atau kelurahan biasanya dipimpin oleh seorang Kepala Dusun atau Lurah yang bertanggung jawab atas pengelolaan wilayah tersebut.</p>\r\n'),
(3, 'Penilai', ''),
(4, 'Sekretaris Desa', '<p>Bertanggung jawab untuk membantu Kepala Desa dalam mengelola administrasi Desa, menyimpan dokumen dan arsip desa, serta memberikan pelayanan administrasi kepada masyarakat.</p>\r\n'),
(5, 'Kepala Urusan (Kaur)', '<p>Di Desa Pasirdalem, terdapat pembagian wilayah kecil yang disebut dusun atau kelurahan. Setiap dusun atau kelurahan biasanya dipimpin oleh seorang Kepala Dusun atau Lurah yang bertanggung jawab atas pengelolaan wilayah tersebut.</p>\r\n'),
(6, 'Staff Desa', '<p>Terdapat beberapa staf desa yang mendukung tugas-tugas pemerintahan desa, seperti :</p>\r\n\r\n<ol>\r\n	<li>Staf Administrasi</li>\r\n	<li>Staf Keuangan</li>\r\n	<li>Staf Kesejahteraan</li>\r\n	<li>Staf Pembangunan</li>\r\n</ol>\r\n'),
(7, 'Rukun Warga (RW)', '<p>Jabatan tingkat lingkungan di desa. Mereka bertugas dalam mengkoordinasikan kegiatan masyarakat di tingkat RT dan RW, menjaga keamanan lingkungan, serta mengatasi masalah sosial di wilayahnya</p>\r\n'),
(8, 'Ketua Rukun Tetangga (RT) ', '<p>Jabatan tingkat lingkungan di desa. Mereka bertugas dalam mengkoordinasikan kegiatan masyarakat di tingkat RT dan RW, menjaga keamanan lingkungan, serta mengatasi masalah sosial di wilayahnya.</p>\r\n'),
(9, 'Linmas (Lindungan Masyarakat)', '<p>Linmas merupakan sebuah lembaga yang bertanggung jawab dalam menjaga ketertiban, keamanan, dan ketentraman di tingkat masyarakat atau lingkungan. Mereka berperan sebagai mata dan telinga pemerintah setempat dalam melaporkan adanya potensi gangguan keamanan atau masalah sosial di wilayah mereka.</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `kriteria` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `bobot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `kriteria`, `deskripsi`, `bobot`) VALUES
(1, 'Tujuan dan Sasaran Kerja', '<ul>\r\n	<li>Mencapai sasaran kerja sesuai dengan tujuan.</li>\r\n</ul>\r\n', 4),
(2, 'Kualitas dan Kuantitas Kerja', '<ul>\r\n	<li>Kehadiran tepat waktu di tempat kerja</li>\r\n	<li>Frekuensi keterlambatan atau absensi tanpa alasan yang sah</li>\r\n	<li>Kepatuhan terhadap jadwal kerja dan aturan absensi perusahaan</li>\r\n	<li>Mematuhi peraturan dan kebijakan internal perusahaan</li>\r\n	<li>Mematuhi kode etik dan standar perilaku yang ditetapkan</li>\r\n	<li>Menghindari pelanggaran kebijakan seperti penggunaan internet yang tidak semestinya, penggunaan telepon seluler pribadi selama jam kerja, dll.</li>\r\n	<li>Menggunakan sumber daya perusahaan secara efisien dan efektif</li>\r\n	<li>Tidak menyalahgunakan atau mengambil keuntungan pribadi dari aset perusahaan</li>\r\n	<li>Mematuhi kebijakan penggunaan peralatan dan fasilitas perusahaan</li>\r\n</ul>\r\n', 5),
(3, 'Keterampilan dan Kompetensi', '<ul>\r\n	<li>Mampu bekerja sesuai dengan kompetensi masing-masing</li>\r\n	<li>memiliki keterampilan yang sepadan dengan pekerjaan masing-masing</li>\r\n</ul>\r\n', 3),
(4, 'Kedisiplinan dan Etika Kerja', '<ul>\r\n	<li>Memenuhi tenggat waktu pekerjaan yang ditetapkan</li>\r\n	<li>Mengikuti prosedur kerja dan instruksi yang diberikan</li>\r\n	<li>Menghindari penundaan atau penangguhan tugas yang dapat mempengaruhi produktivitas tim</li>\r\n	<li>Menunjukkan sikap dan perilaku profesional di tempat kerja</li>\r\n	<li>Menghormati hak dan privasi rekan kerja</li>\r\n	<li>Tidak melakukan perilaku diskriminatif, pelecehan, atau perilaku yang merugikan rekan kerja</li>\r\n</ul>\r\n', 5),
(5, 'Kerjasama dan Kolaborasi', '<ul>\r\n	<li>Bertanggung jawab atas pekerjaan yang dilakukan</li>\r\n	<li>Menerima konsekuensi dari kesalahan dan melakukan perbaikan yang diperlukan</li>\r\n	<li>Memiliki tingkat kepercayaan dan integritas yang tinggi dalam menjalankan tugas</li>\r\n	<li>Menunjukkan minat dan semangat dalam pekerjaan</li>\r\n	<li>Mengambil inisiatif untuk meningkatkan proses kerja atau memberikan kontribusi yang lebih besar</li>\r\n	<li>Berpartisipasi aktif dalam kegiatan atau proyek yang diberikan</li>\r\n</ul>\r\n', 5);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(11) NOT NULL,
  `pegawai_id` int(11) NOT NULL,
  `kriteria_id` int(11) NOT NULL,
  `nilai_input` int(11) NOT NULL,
  `nilai_skor` float NOT NULL,
  `nilai_preferensi` float NOT NULL,
  `periode_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `pegawai_id`, `kriteria_id`, `nilai_input`, `nilai_skor`, `nilai_preferensi`, `periode_id`) VALUES
(36, 2, 1, 2, 0.4, 1.6, 1),
(37, 2, 2, 1, 0.2, 1, 1),
(38, 2, 3, 2, 0.4, 1.2, 1),
(39, 2, 4, 1, 0.2, 1, 1),
(40, 2, 5, 1, 0.2, 1, 1),
(41, 1, 1, 5, 1, 4, 1),
(42, 1, 2, 4, 0.8, 4, 1),
(43, 1, 3, 5, 1, 3, 1),
(44, 1, 4, 4, 0.8, 4, 1),
(45, 1, 5, 4, 0.8, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nip` varchar(100) NOT NULL,
  `nama_pegawai` varchar(255) NOT NULL,
  `jk` varchar(50) NOT NULL,
  `jabatan_id` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nip`, `nama_pegawai`, `jk`, `jabatan_id`, `status`) VALUES
(1, '199202152022211012', 'Eka Anas Jatnika, S. Ds', 'Laki-laki', 6, 'Aktif'),
(2, '1999707072022211011', 'Dian Ardiansyah', 'Laki-laki', 6, 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `periode`
--

CREATE TABLE `periode` (
  `id_periode` int(11) NOT NULL,
  `periode` varchar(30) NOT NULL,
  `label` varchar(30) NOT NULL,
  `tahun` int(11) NOT NULL,
  `bulan` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `periode`
--

INSERT INTO `periode` (`id_periode`, `periode`, `label`, `tahun`, `bulan`) VALUES
(1, '2023-Juli', '2023 Juli', 2023, 'Juli');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `jabatan_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `date_created` date NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama`, `username`, `password`, `jabatan_id`, `role_id`, `date_created`, `is_active`) VALUES
(1, 'Dian Ardiansyah', 'admin', 'admin', 3, 1, '2023-07-13', 1),
(2, 'Kepala Desa', 'kepaladesa', 'kepaladesa', 3, 2, '2023-07-15', 1),
(3, 'BPD', 'bpd', 'bpd', 3, 2, '2023-07-15', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_role`
--

CREATE TABLE `users_role` (
  `id_role` int(11) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_role`
--

INSERT INTO `users_role` (`id_role`, `role`) VALUES
(1, 'Admin'),
(2, 'Tim Penilai');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `periode`
--
ALTER TABLE `periode`
  ADD PRIMARY KEY (`id_periode`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `users_role`
--
ALTER TABLE `users_role`
  ADD PRIMARY KEY (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id_alternatif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `periode`
--
ALTER TABLE `periode`
  MODIFY `id_periode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users_role`
--
ALTER TABLE `users_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
