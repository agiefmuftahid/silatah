-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 11 Des 2017 pada 07.55
-- Versi Server: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laporantahunan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alamatweb`
--

CREATE TABLE `alamatweb` (
  `idWeb` int(11) NOT NULL,
  `unit` varchar(20) NOT NULL,
  `alamat` varchar(35) NOT NULL,
  `keterangan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `alokasidana`
--

CREATE TABLE `alokasidana` (
  `idAlokasi` int(11) NOT NULL,
  `alokasi` varchar(30) NOT NULL,
  `tahun` year(4) NOT NULL,
  `jumlahDana` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `alokasidana`
--

INSERT INTO `alokasidana` (`idAlokasi`, `alokasi`, `tahun`, `jumlahDana`) VALUES
(1, 'Prodi Teknik Informatika', 2016, 2000000),
(2, 'Prodi Teknik Sipil', 2017, 4000000),
(3, 'Prodi Teknik Mesin', 2015, 5000000),
(4, 'Prodi Teknik Elektro', 2016, 4000000),
(5, 'Lab. TS dan Arsitektur', 2014, 2000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggarankeluar`
--

CREATE TABLE `anggarankeluar` (
  `idKeluar` int(11) NOT NULL,
  `jenisPenggunaan` varchar(35) NOT NULL,
  `tahun` varchar(10) NOT NULL,
  `jumlahDana` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `anggarankeluar`
--

INSERT INTO `anggarankeluar` (`idKeluar`, `jenisPenggunaan`, `tahun`, `jumlahDana`) VALUES
(1, 'Pendidikan', '2017', 20000000),
(2, 'Penelitian', '2016', 4000000),
(3, 'Penelitian', '2017', 2000000),
(4, 'Pendidikan', '2017', 1000000),
(5, 'Pengabdian Pada Masyarakat', '2014', 1000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggaranmasuk`
--

CREATE TABLE `anggaranmasuk` (
  `idMasuk` int(11) NOT NULL,
  `sumberDana` varchar(35) NOT NULL,
  `jenisDana` varchar(20) NOT NULL,
  `tahun` varchar(20) NOT NULL,
  `jumlahDana` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `anggaranmasuk`
--

INSERT INTO `anggaranmasuk` (`idMasuk`, `sumberDana`, `jenisDana`, `tahun`, `jumlahDana`) VALUES
(1, 'PT. Sendiri', 'PNPB', '2016', 200000000),
(10, 'Kemendiknas', 'APBN', '2016', 2000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bangunan`
--

CREATE TABLE `bangunan` (
  `idBangunan` int(11) NOT NULL,
  `jenis` varchar(35) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `luas` varchar(10) NOT NULL,
  `kondisi` varchar(15) NOT NULL,
  `statusPemilik` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `bantubuku`
--

CREATE TABLE `bantubuku` (
  `tahun` varchar(4) NOT NULL,
  `tij` int(11) NOT NULL,
  `tie` int(11) NOT NULL,
  `taj` int(11) NOT NULL,
  `tae` int(11) NOT NULL,
  `rij` int(11) NOT NULL,
  `rie` int(11) NOT NULL,
  `raj` int(11) NOT NULL,
  `rae` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bantubuku`
--

INSERT INTO `bantubuku` (`tahun`, `tij`, `tie`, `taj`, `tae`, `rij`, `rie`, `raj`, `rae`) VALUES
('2017', 2, 0, 1, 0, 1, 0, 1, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bantudosen`
--

CREATE TABLE `bantudosen` (
  `tahun` varchar(4) NOT NULL,
  `til` int(11) NOT NULL,
  `tip` int(11) NOT NULL,
  `tsl` int(11) NOT NULL,
  `tsp` int(11) NOT NULL,
  `tml` int(11) NOT NULL,
  `tmp` int(11) NOT NULL,
  `tel` int(11) NOT NULL,
  `tep` int(11) NOT NULL,
  `arl` int(11) NOT NULL,
  `arp` int(11) NOT NULL,
  `sil` int(11) NOT NULL,
  `sip` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bantudosen`
--

INSERT INTO `bantudosen` (`tahun`, `til`, `tip`, `tsl`, `tsp`, `tml`, `tmp`, `tel`, `tep`, `arl`, `arp`, `sil`, `sip`) VALUES
('2017', 1, 1, 1, 0, 0, 0, 0, 1, 0, 1, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bantupendaftarjeniskelamin`
--

CREATE TABLE `bantupendaftarjeniskelamin` (
  `tahun` varchar(4) NOT NULL,
  `til` int(11) NOT NULL,
  `tip` int(11) NOT NULL,
  `tsl` int(11) NOT NULL,
  `tsp` int(11) NOT NULL,
  `tml` int(11) NOT NULL,
  `tmp` int(11) NOT NULL,
  `tel` int(11) NOT NULL,
  `tep` int(11) NOT NULL,
  `arl` int(11) NOT NULL,
  `arp` int(11) NOT NULL,
  `sil` int(11) NOT NULL,
  `sip` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bantupendaftarjeniskelamin`
--

INSERT INTO `bantupendaftarjeniskelamin` (`tahun`, `til`, `tip`, `tsl`, `tsp`, `tml`, `tmp`, `tel`, `tep`, `arl`, `arp`, `sil`, `sip`) VALUES
('2017', 1, 0, 0, 1, 1, 0, 0, 0, 0, 1, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `beasiswa`
--

CREATE TABLE `beasiswa` (
  `idBeasiswa` int(11) NOT NULL,
  `NPM` varchar(9) NOT NULL,
  `idProdi` int(11) NOT NULL,
  `jenisBeasiswa` varchar(35) NOT NULL,
  `tahun` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `beasiswa`
--

INSERT INTO `beasiswa` (`idBeasiswa`, `NPM`, `idProdi`, `jenisBeasiswa`, `tahun`) VALUES
(8, 'G1A015022', 1, 'PPA', 2016),
(9, 'G1A015024', 1, 'PPA', 2017),
(10, 'G1B015016', 1, 'Bidik Misi', 2015);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bukupertahun`
--

CREATE TABLE `bukupertahun` (
  `idBuku` int(11) NOT NULL,
  `idKoleksi` int(11) NOT NULL,
  `tahun` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `idDosen` int(11) NOT NULL,
  `NIP` varchar(20) NOT NULL,
  `NIDN` varchar(15) NOT NULL,
  `namaDosen` varchar(35) NOT NULL,
  `jenisKelamin` varchar(10) NOT NULL,
  `idProdi` int(11) NOT NULL,
  `jabatan` varchar(15) NOT NULL,
  `jenjangPendidikan` varchar(2) NOT NULL,
  `golongan` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`idDosen`, `NIP`, `NIDN`, `namaDosen`, `jenisKelamin`, `idProdi`, `jabatan`, `jenjangPendidikan`, `golongan`) VALUES
(1, '19890903201504', '123456', 'Dodi Setiawan', 'Laki-laki', 1, 'Asisten Ahli', 'S2', 'IIIC'),
(2, '1234561213', '126794', 'Kunto Aji', 'Laki-laki', 2, 'Lektor', 'S2', 'IIIB'),
(3, '09887482368', '475693', 'Sari', 'Perempuan', 5, 'Guru Besar', 'S3', 'IVA'),
(4, '3456789', '12234355', 'Novi', 'Perempuan', 1, 'Lektor', 'S3', 'IIID'),
(5, '23455677', '334532', 'Agus', 'Perempuan', 4, 'Asisten Ahli', 'S2', 'IVA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `inventaris`
--

CREATE TABLE `inventaris` (
  `idInventaris` int(11) NOT NULL,
  `namaBarang` varchar(35) NOT NULL,
  `asalBarang` varchar(35) NOT NULL,
  `jumlah` varchar(10) NOT NULL,
  `lokasi` varchar(20) NOT NULL,
  `kondisi` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurnal`
--

CREATE TABLE `jurnal` (
  `idJurnal` int(11) NOT NULL,
  `namaPenulis` varchar(50) NOT NULL,
  `bidangIlmu` varchar(20) NOT NULL,
  `judul` varchar(80) NOT NULL,
  `namaJurnal` varchar(35) NOT NULL,
  `volume` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jurnal`
--

INSERT INTO `jurnal` (`idJurnal`, `namaPenulis`, `bidangIlmu`, `judul`, `namaJurnal`, `volume`) VALUES
(1, 'Desi, Ani', 'Teknik Informatika', 'Adada', 'Pesudocode', 'IIV/a'),
(3, 'aaa', 'Teknik Informatika', 'a', 'a', 'a'),
(4, 'Agief, Aji', 'Teknik Sipil', 'Ilmiah', 'Teknisia', 'IVA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatanmhs`
--

CREATE TABLE `kegiatanmhs` (
  `idKegiatan` int(11) NOT NULL,
  `namaOrmawa` int(11) NOT NULL,
  `tingkat` varchar(15) DEFAULT NULL,
  `kegiatan` varchar(50) NOT NULL,
  `tempat` varchar(20) NOT NULL,
  `waktu` date NOT NULL,
  `dana` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kegiatanmhs`
--

INSERT INTO `kegiatanmhs` (`idKegiatan`, `namaOrmawa`, `tingkat`, `kegiatan`, `tempat`, `waktu`, `dana`) VALUES
(24, 2, 'Fakultas', 'Muswil', 'Padang', '2017-12-14', 2000000),
(25, 3, 'Fakultas', 'Kompetisi Mobil Hemat Energi', 'Pekan Baru', '2017-12-26', 5000000),
(26, 1, 'Nasional', 'Musyawarah Nasional', 'Jakarta', '2017-12-25', 4000000),
(27, 1, 'Fakultas', 'Pelatihan Manajemen Organisasi', 'GSG Universitas Beng', '2016-10-12', 40000000),
(28, 3, 'Fakultas', 'a', 'a', '2017-12-11', 3000000),
(29, 4, 'Universitas', 'e', 'e', '2015-08-13', 2000),
(30, 5, 'Fakultas', 'u', 'u', '2014-07-16', 3000000),
(31, 6, 'Fakultas', 'f', 'f', '2015-11-19', 27000000),
(32, 7, 'Internasional', 'v', 'v', '2014-06-24', 1000000),
(33, 8, 'Fakultas', 'n', 'n', '2015-03-25', 7000000),
(34, 5, 'Fakultas', 'f', 'f', '2014-08-28', 5000000),
(57, 1, 'Fakultas', 'IT Goes To School', 'Kepahyang', '2013-05-09', 5000000),
(63, 1, 'Fakultas', 'abi', 'abi', '2017-12-19', 3000000),
(64, 4, 'Fakultas', 'adi', 'adi', '2017-12-14', 2000000),
(65, 2, 'Fakultas', 'afi', 'afi', '2017-12-05', 2000000),
(66, 3, 'Nasional', 'Pameran Mesin', 'Gedung C Universitas', '2013-07-24', 3000000),
(67, 7, 'Nasional', 'Lomba Fotografi', 'Bandung', '2017-12-19', 1000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kerjasama`
--

CREATE TABLE `kerjasama` (
  `idKerjasama` int(11) NOT NULL,
  `idProdi` int(11) NOT NULL,
  `lembagaPartner` varchar(35) NOT NULL,
  `kegiatan` varchar(50) NOT NULL,
  `tahun` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `koleksibuku`
--

CREATE TABLE `koleksibuku` (
  `idKoleksi` int(11) NOT NULL,
  `namaBuku` varchar(50) NOT NULL,
  `jenisBuku` varchar(20) NOT NULL,
  `bahasaBuku` varchar(20) NOT NULL,
  `tahun` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `koleksibuku`
--

INSERT INTO `koleksibuku` (`idKoleksi`, `namaBuku`, `jenisBuku`, `bahasaBuku`, `tahun`) VALUES
(2, 'agief', 'teks', 'indo', 2013),
(3, 'jiji', 'referensi', 'indo', 2014),
(4, 'huhu', 'teks', 'indo', 2014),
(5, 'koko', 'referensi', 'asing', 2015),
(6, 'gugu', 'teks', 'asing', 2013);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `NPM` varchar(9) NOT NULL,
  `namaMahasiswa` varchar(50) NOT NULL,
  `jenisKelamin` varchar(10) NOT NULL,
  `jalurMasuk` varchar(15) NOT NULL,
  `idProdi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`NPM`, `namaMahasiswa`, `jenisKelamin`, `jalurMasuk`, `idProdi`) VALUES
('G1A015020', 'Ilyos Abdi Sudrajat', 'L', 'SBMPTN', 1),
('G1A015022', 'Agief Muftahid', 'L', 'SBMPTN', 1),
('G1A015024', 'Nadine Dwi Pratiwi', 'P', 'SBMPTN', 1),
('G1B015016', 'Aji Dwi Herza Novariadi', 'P', 'SNMPTN', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ormawa`
--

CREATE TABLE `ormawa` (
  `idOrmawa` int(11) NOT NULL,
  `namaOrmawa` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ormawa`
--

INSERT INTO `ormawa` (`idOrmawa`, `namaOrmawa`) VALUES
(1, 'Himatif'),
(2, 'HMTS'),
(3, 'HMM'),
(4, 'Himatro'),
(5, 'Mostaneer'),
(6, 'Pulkanik'),
(7, 'Fotik'),
(8, 'Ercom');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `idPegawai` int(11) NOT NULL,
  `NIP` varchar(20) NOT NULL,
  `namaPegawai` varchar(35) NOT NULL,
  `jenisKelamin` varchar(10) NOT NULL,
  `unitKerja` varchar(50) NOT NULL,
  `golongan` varchar(8) NOT NULL,
  `status` varchar(10) NOT NULL,
  `jenjangPendidikan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`idPegawai`, `NIP`, `namaPegawai`, `jenisKelamin`, `unitKerja`, `golongan`, `status`, `jenjangPendidikan`) VALUES
(1, '7657875675', 'Aji', 'Laki-laki', 'Prodi Teknik Informastika', 'IC', 'Tetap', 'S1'),
(2, '2345567', 'Ilyos', 'Perempuan', 'Bidang Administrasi Umum & Keuangan', 'IIID', 'Tidak Teta', 'S3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftar`
--

CREATE TABLE `pendaftar` (
  `idPendaftar` int(11) NOT NULL,
  `namaPendaftar` varchar(50) NOT NULL,
  `idProdi` int(11) NOT NULL,
  `jalur` varchar(10) NOT NULL,
  `tahun` year(4) NOT NULL,
  `jenisKelamin` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pendaftar`
--

INSERT INTO `pendaftar` (`idPendaftar`, `namaPendaftar`, `idProdi`, `jalur`, `tahun`, `jenisKelamin`) VALUES
(1, 'Udin', 1, 'SNMPTN', 2015, 'Laki-laki'),
(2, 'Andi', 2, 'SBMPTN', 2013, 'Perempuan'),
(3, 'Bejo', 3, 'SNMPTN', 2014, 'Laki-laki'),
(4, 'Riska', 5, 'SPMU', 2016, 'Perempuan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penelitian`
--

CREATE TABLE `penelitian` (
  `idPenelitian` int(11) NOT NULL,
  `jenis` varchar(35) NOT NULL,
  `idProdi` int(11) NOT NULL,
  `tahun` year(4) NOT NULL,
  `acc` varchar(5) NOT NULL,
  `dana` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `prestasi`
--

CREATE TABLE `prestasi` (
  `idPrestasi` int(11) NOT NULL,
  `NPM` varchar(9) NOT NULL,
  `idProdi` int(11) NOT NULL,
  `prestasi` varchar(35) NOT NULL,
  `tingkat` varchar(15) NOT NULL,
  `tahun` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `prestasi`
--

INSERT INTO `prestasi` (`idPrestasi`, `NPM`, `idProdi`, `prestasi`, `tingkat`, `tahun`) VALUES
(9, 'G1A015022', 1, 'Juara 1 LCT IT ITB', 'Nasional', 2014),
(10, 'G1A015020', 1, 'Juara 3 Programming Contest UGM', 'Nasional', 2015),
(11, 'G1A015022', 1, 'Juara 1 Programming Contest IT EXPO', 'Fakultas', 2016),
(12, 'G1A015024', 2, 'Juara', 'Universitas', 2015),
(13, 'G1B015016', 4, 'Juara 1 Robotic', 'Regional', 2016),
(14, 'G1B015016', 5, 'Lomba Maket', 'Nasional', 2017),
(15, 'G1A015022', 5, 'Lomba Maket Rumah Idaman', 'Regional', 2016);

-- --------------------------------------------------------

--
-- Struktur dari tabel `prodi`
--

CREATE TABLE `prodi` (
  `idProdi` int(11) NOT NULL,
  `namaProdi` varchar(30) NOT NULL,
  `skAkreditasi` varchar(50) NOT NULL,
  `akreditasi` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `prodi`
--

INSERT INTO `prodi` (`idProdi`, `namaProdi`, `skAkreditasi`, `akreditasi`) VALUES
(1, 'Teknik Informatika', 'A//IIV/JKL/2016', 'B'),
(2, 'Teknik Sipil', 'B/IV/MNO/2016', 'B'),
(3, 'Teknik Mesin', 'C//IV/JKL/2016', 'B'),
(4, 'Teknik Elektro', 'D//IIV/JKL/2016', 'D'),
(5, 'Arsitektur', 'E//IIV/JKL/2016', '-'),
(6, 'Sistem Informasi', 'F//IIV/JKL/2016', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `idUser` int(11) NOT NULL,
  `username` varchar(12) NOT NULL,
  `password` varchar(12) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`idUser`, `username`, `password`, `level`) VALUES
(1, 'kms', 'kms123', 1),
(2, 'adk', 'adk123', 2),
(3, 'sdu', 'sdu123', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alamatweb`
--
ALTER TABLE `alamatweb`
  ADD PRIMARY KEY (`idWeb`);

--
-- Indexes for table `alokasidana`
--
ALTER TABLE `alokasidana`
  ADD PRIMARY KEY (`idAlokasi`);

--
-- Indexes for table `anggarankeluar`
--
ALTER TABLE `anggarankeluar`
  ADD PRIMARY KEY (`idKeluar`);

--
-- Indexes for table `anggaranmasuk`
--
ALTER TABLE `anggaranmasuk`
  ADD PRIMARY KEY (`idMasuk`);

--
-- Indexes for table `bangunan`
--
ALTER TABLE `bangunan`
  ADD PRIMARY KEY (`idBangunan`);

--
-- Indexes for table `bantupendaftarjeniskelamin`
--
ALTER TABLE `bantupendaftarjeniskelamin`
  ADD KEY `idProdi` (`tahun`);

--
-- Indexes for table `beasiswa`
--
ALTER TABLE `beasiswa`
  ADD PRIMARY KEY (`idBeasiswa`),
  ADD KEY `NPM` (`NPM`),
  ADD KEY `idProdi` (`idProdi`);

--
-- Indexes for table `bukupertahun`
--
ALTER TABLE `bukupertahun`
  ADD PRIMARY KEY (`idBuku`),
  ADD KEY `idKoleksi` (`idKoleksi`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`idDosen`),
  ADD KEY `idProdi` (`idProdi`);

--
-- Indexes for table `inventaris`
--
ALTER TABLE `inventaris`
  ADD PRIMARY KEY (`idInventaris`);

--
-- Indexes for table `jurnal`
--
ALTER TABLE `jurnal`
  ADD PRIMARY KEY (`idJurnal`);

--
-- Indexes for table `kegiatanmhs`
--
ALTER TABLE `kegiatanmhs`
  ADD PRIMARY KEY (`idKegiatan`),
  ADD KEY `namaOrmawa` (`namaOrmawa`);

--
-- Indexes for table `kerjasama`
--
ALTER TABLE `kerjasama`
  ADD PRIMARY KEY (`idKerjasama`),
  ADD KEY `idProdi` (`idProdi`);

--
-- Indexes for table `koleksibuku`
--
ALTER TABLE `koleksibuku`
  ADD PRIMARY KEY (`idKoleksi`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`NPM`),
  ADD KEY `idProdi` (`idProdi`);

--
-- Indexes for table `ormawa`
--
ALTER TABLE `ormawa`
  ADD PRIMARY KEY (`idOrmawa`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`idPegawai`);

--
-- Indexes for table `pendaftar`
--
ALTER TABLE `pendaftar`
  ADD PRIMARY KEY (`idPendaftar`),
  ADD KEY `idProdi` (`idProdi`);

--
-- Indexes for table `penelitian`
--
ALTER TABLE `penelitian`
  ADD PRIMARY KEY (`idPenelitian`),
  ADD KEY `idProdi` (`idProdi`);

--
-- Indexes for table `prestasi`
--
ALTER TABLE `prestasi`
  ADD PRIMARY KEY (`idPrestasi`),
  ADD KEY `NPM` (`NPM`),
  ADD KEY `idProdi` (`idProdi`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`idProdi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alamatweb`
--
ALTER TABLE `alamatweb`
  MODIFY `idWeb` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `alokasidana`
--
ALTER TABLE `alokasidana`
  MODIFY `idAlokasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `anggarankeluar`
--
ALTER TABLE `anggarankeluar`
  MODIFY `idKeluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `anggaranmasuk`
--
ALTER TABLE `anggaranmasuk`
  MODIFY `idMasuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `bangunan`
--
ALTER TABLE `bangunan`
  MODIFY `idBangunan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `beasiswa`
--
ALTER TABLE `beasiswa`
  MODIFY `idBeasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `bukupertahun`
--
ALTER TABLE `bukupertahun`
  MODIFY `idBuku` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `idDosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `inventaris`
--
ALTER TABLE `inventaris`
  MODIFY `idInventaris` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jurnal`
--
ALTER TABLE `jurnal`
  MODIFY `idJurnal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `kegiatanmhs`
--
ALTER TABLE `kegiatanmhs`
  MODIFY `idKegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT for table `kerjasama`
--
ALTER TABLE `kerjasama`
  MODIFY `idKerjasama` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `koleksibuku`
--
ALTER TABLE `koleksibuku`
  MODIFY `idKoleksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `ormawa`
--
ALTER TABLE `ormawa`
  MODIFY `idOrmawa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `idPegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pendaftar`
--
ALTER TABLE `pendaftar`
  MODIFY `idPendaftar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `penelitian`
--
ALTER TABLE `penelitian`
  MODIFY `idPenelitian` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `prestasi`
--
ALTER TABLE `prestasi`
  MODIFY `idPrestasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `idProdi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `beasiswa`
--
ALTER TABLE `beasiswa`
  ADD CONSTRAINT `beasiswa_ibfk_1` FOREIGN KEY (`NPM`) REFERENCES `mahasiswa` (`NPM`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `beasiswa_ibfk_2` FOREIGN KEY (`idProdi`) REFERENCES `prodi` (`idProdi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `bukupertahun`
--
ALTER TABLE `bukupertahun`
  ADD CONSTRAINT `bukupertahun_ibfk_1` FOREIGN KEY (`idKoleksi`) REFERENCES `koleksibuku` (`idKoleksi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD CONSTRAINT `dosen_ibfk_1` FOREIGN KEY (`idProdi`) REFERENCES `prodi` (`idProdi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kegiatanmhs`
--
ALTER TABLE `kegiatanmhs`
  ADD CONSTRAINT `kegiatanmhs_ibfk_1` FOREIGN KEY (`namaOrmawa`) REFERENCES `ormawa` (`idOrmawa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kerjasama`
--
ALTER TABLE `kerjasama`
  ADD CONSTRAINT `kerjasama_ibfk_1` FOREIGN KEY (`idProdi`) REFERENCES `prodi` (`idProdi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`idProdi`) REFERENCES `prodi` (`idProdi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pendaftar`
--
ALTER TABLE `pendaftar`
  ADD CONSTRAINT `pendaftar_ibfk_1` FOREIGN KEY (`idProdi`) REFERENCES `prodi` (`idProdi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `penelitian`
--
ALTER TABLE `penelitian`
  ADD CONSTRAINT `penelitian_ibfk_1` FOREIGN KEY (`idProdi`) REFERENCES `prodi` (`idProdi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `prestasi`
--
ALTER TABLE `prestasi`
  ADD CONSTRAINT `prestasi_ibfk_1` FOREIGN KEY (`idProdi`) REFERENCES `prodi` (`idProdi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prestasi_ibfk_2` FOREIGN KEY (`NPM`) REFERENCES `mahasiswa` (`NPM`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
