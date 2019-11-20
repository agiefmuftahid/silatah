-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 21 Des 2017 pada 17.47
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
(1, 'Prodi Teknik Informatika', 2012, 8),
(2, 'Prodi Teknik Informatika', 2013, 8),
(3, 'Prodi Teknik Informatika', 2014, 10),
(4, 'Prodi Teknik Informatika', 2015, 10),
(5, 'Prodi Teknik Sipil', 2012, 8),
(6, 'Prodi Teknik Sipil', 2013, 8),
(7, 'Prodi Teknik Sipil', 2014, 10),
(8, 'Prodi Teknik Sipil', 2015, 10),
(9, 'Prodi Teknik Mesin', 2012, 8),
(10, 'Prodi Teknik Mesin', 2013, 8),
(11, 'Prodi Teknik Mesin', 2014, 10),
(12, 'Prodi Teknik Mesin', 2015, 10),
(13, 'Prodi Teknik Elektro', 2012, 8),
(14, 'Prodi Teknik Elektro', 2013, 8),
(15, 'Prodi Teknik Elektro', 2014, 10),
(16, 'Prodi Teknik Elektro', 2015, 10),
(17, 'Lab. TI dan SI', 2012, 8),
(18, 'Lab. TI dan SI', 2013, 8),
(19, 'Lab. TI dan SI', 2014, 8),
(20, 'Lab. TI dan SI', 2015, 8),
(21, 'Lab. TS dan Arsitektur', 2012, 8),
(22, 'Lab. TS dan Arsitektur', 2013, 8),
(23, 'Lab. TS dan Arsitektur', 2014, 8),
(24, 'Lab. TS dan Arsitektur', 2015, 8),
(25, 'Lab. Teknik Mesin', 2012, 8),
(26, 'Lab. Teknik Mesin', 2013, 8),
(27, 'Lab. Teknik Mesin', 2014, 8),
(28, 'Lab. Teknik Mesin', 2015, 8),
(29, 'Lab. Teknik Elektro', 2012, 8),
(30, 'Lab. Teknik Elektro', 2013, 8),
(31, 'Lab. Teknik Elektro', 2014, 8),
(32, 'Lab. Teknik Elektro', 2015, 8);

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
(1, 'Pendidikan', '2012', 784),
(2, 'Pendidikan', '2013', 947),
(3, 'Pendidikan', '2014', 861),
(4, 'Pendidikan', '2015', 774),
(5, 'Pendidikan', '2016', 802),
(6, 'Penelitian', '2012', 32),
(7, 'Penelitian', '2013', 30),
(10, 'Penelitian', '2014', 7),
(11, 'Penelitian', '2015', 150),
(12, 'Penelitian', '2016', 20),
(13, 'Pengabdian Pada Masyarakat', '2012', 156),
(14, 'Pengabdian Pada Masyarakat', '2014', 71),
(15, 'Pengabdian Pada Masyarakat', '2015', 16),
(16, 'Pengabdian Pada Masyarakat', '2016', 30),
(17, 'Investasi Prasarana', '2012', 156),
(18, 'Investasi Prasarana', '2013', 305),
(19, 'Investasi Prasarana', '2014', 108),
(20, 'Investasi Prasarana', '2015', 84),
(21, 'Investasi Prasarana', '2016', 382),
(22, 'Investasi Prasarana', '2016', 382),
(23, 'Investasi Sarana', '2012', 280),
(24, 'Investasi Sarana', '2013', 281),
(25, 'Investasi Sarana', '2014', 104),
(26, 'Investasi Sarana', '2015', 397),
(27, 'Investasi Sarana', '2016', 90),
(28, 'Investasi SDM', '2012', 250),
(29, 'Investasi SDM', '2013', 312),
(30, 'Investasi SDM', '2014', 21),
(31, 'Investasi SDM', '2015', 49),
(32, 'Investasi SDM', '2016', 36),
(33, 'Manajemen', '2012', 200),
(34, 'Manajemen', '2013', 200),
(35, 'Manajemen', '2014', 707),
(36, 'Manajemen', '2015', 994),
(37, 'Manajemen', '2016', 793);

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
(1, 'PT. Sendiri', 'PNPB', '2012', 250),
(10, 'Kemendiknas', 'APBN', '2012', 1949),
(11, 'PT. Sendiri', 'PNPB', '2013', 206),
(12, 'Kemendiknas', 'APBN', '2013', 2339),
(13, 'PT. Sendiri', 'PNPB', '2014', 2417),
(14, 'Kemendiknas', 'APBN', '2014', 2567),
(15, 'PT. Sendiri', 'PNPB', '2015', 2451),
(16, 'Kemendiknas', 'APBN', '2015', 2189),
(17, 'PT. Sendiri', 'PNPB', '2016', 1958);

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
('2017', 3, 0, 1, 0, 3, 0, 1, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bantudosen`
--

CREATE TABLE `bantudosen` (
  `idBantudosen` int(11) NOT NULL,
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

INSERT INTO `bantudosen` (`idBantudosen`, `tahun`, `til`, `tip`, `tsl`, `tsp`, `tml`, `tmp`, `tel`, `tep`, `arl`, `arp`, `sil`, `sip`) VALUES
(4, '2012', 6, 6, 12, 4, 15, 0, 8, 5, 0, 0, 0, 0),
(5, '2013', 5, 7, 12, 4, 15, 0, 8, 5, 0, 0, 0, 0),
(6, '2014', 5, 6, 12, 4, 15, 0, 9, 5, 0, 0, 0, 0),
(7, '2015', 7, 7, 13, 5, 15, 0, 9, 5, 0, 0, 0, 0),
(8, '2016', 4, 2, 13, 5, 15, 0, 9, 5, 3, 3, 4, 3),
(9, '2017', 9, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bantumahasiswa`
--

CREATE TABLE `bantumahasiswa` (
  `idBantumahasiswa` int(11) NOT NULL,
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
-- Dumping data untuk tabel `bantumahasiswa`
--

INSERT INTO `bantumahasiswa` (`idBantumahasiswa`, `tahun`, `til`, `tip`, `tsl`, `tsp`, `tml`, `tmp`, `tel`, `tep`, `arl`, `arp`, `sil`, `sip`) VALUES
(1, '2017', 7, 6, 2, 2, 4, 0, 1, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `beasiswa`
--

CREATE TABLE `beasiswa` (
  `idBeasiswa` int(11) NOT NULL,
  `NPM` varchar(9) NOT NULL,
  `idProdi` int(11) NOT NULL,
  `jenisKelamin` varchar(10) NOT NULL,
  `jenisBeasiswa` varchar(35) NOT NULL,
  `tahun` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `beasiswa`
--

INSERT INTO `beasiswa` (`idBeasiswa`, `NPM`, `idProdi`, `jenisKelamin`, `jenisBeasiswa`, `tahun`) VALUES
(8, 'G1A015022', 1, 'Laki-laki', 'PPA', 2016),
(9, 'G1A016024', 1, 'Perempuan', 'PPA', 2017),
(11, 'G1A013002', 1, 'Laki-laki', 'PPA', 2017),
(12, 'G1A015030', 1, 'Perempuan', 'PPA', 2017),
(13, 'G1A013029', 1, 'Laki-laki', 'PPA', 2017),
(15, 'G1D013015', 4, 'Laki-laki', 'PPA', 2017),
(16, 'G1B013005', 2, 'Laki-laki', 'PPA', 2017);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `idDosen` int(11) NOT NULL,
  `NIP` varchar(20) NOT NULL,
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

INSERT INTO `dosen` (`idDosen`, `NIP`, `namaDosen`, `jenisKelamin`, `idProdi`, `jabatan`, `jenjangPendidikan`, `golongan`) VALUES
(1, '195803051986031007', 'Drs. Asahar Johar, M.Si', 'Laki-laki', 1, 'Asisten Ahli', 'S2', 'IIIC'),
(2, '195904241986021002', 'Drs. Boko Susilo, M.Kom', 'Laki-laki', 1, 'Lektor', 'S2', 'IIIB'),
(4, '197308142006042001', 'Ernawati, ST, M.Cs', 'Perempuan', 1, 'Lektor', 'S2', 'IIID'),
(5, '197610052005012002', 'Dr. Diyah Puspitaningrum, S.T.', 'Perempuan', 1, 'Asisten Ahli', 'S3', 'IVA'),
(6, '197812072005012001', 'Desi Andreswari, S.T., M.Cs', 'Perempuan', 1, 'Lektor', 'S2', 'IIID'),
(7, '198101122005011002', 'Rusdi Effendi, S.T.,M.Kom', 'Laki-laki', 1, 'Lektor', 'S2', 'IVA'),
(8, '198112222008011011', 'Aan Erlansari,ST.M.Eng', 'Laki-Laki', 1, 'Lektor Kepala', 'S2', 'IVB'),
(9, '198205172008121004', 'Funny Farady Coastera, S.Kom.,', 'Laki-Laki', 1, 'Lektor', 'S2', 'IVA'),
(10, '198701272012122001', 'Endina Putri Purwandari, ', 'Perempuan', 1, 'Lektor', 'S2', 'IVC'),
(11, '198901182015042004', 'Kurnia Anggriani, S.T, M.T', 'Perempuan', 1, 'Asisten Ahli', 'S2', 'IIID'),
(12, '198909032015041004', 'Yudi Setiawan, ST.M.Eng', 'Laki-laki', 1, 'Asisten Ahli', 'S2', 'IIIC'),
(13, '-', 'Andang Wijanarko,S.Kom,M.Kom', 'Laki-laki', 1, '-', 'S2', '-'),
(14, '-', 'Ferzha Putra Utama, S.T, M.Eng', 'Laki-laki', 1, '-', 'S2', '-'),
(15, '-', 'Nadiza Lediwara, S.T., M.Eng', 'Perempuan', 1, '-', 'S2', '-');

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

--
-- Dumping data untuk tabel `inventaris`
--

INSERT INTO `inventaris` (`idInventaris`, `namaBarang`, `asalBarang`, `jumlah`, `lokasi`, `kondisi`) VALUES
(1, 'AC Split 1 PK', 'DIPA TEKNIK 2010', '1 unit', 'Dekan', 'Baik, Terawat'),
(2, 'Kipas Angin', 'DIPA BLU 2015', '1 bh', 'Dekan', 'Baik, Terawat'),
(3, 'Kursi biro/pimpinan', 'DIPA TEKNIK 2009', '1 bh', 'Dekan', 'Baik, Terawat'),
(5, 'Kursi hadap besi', 'DIPA TEKNIK 2013', '2 bh', 'Dekan', 'Baik, Terawat'),
(6, 'Meja Kerja', 'DIPA TEKNIK 2013', '1 bh', 'Dekan', 'Baik, Terawat'),
(7, 'Dispenser', 'DIPA TEKNIK 2009', '1 bh', 'Staf Dekan', 'Baik, Terawat'),
(8, 'Komputer', 'DIPA TEKNIK 2009', '1 unit', 'Staf Dekan', 'Baik, Terawat'),
(9, 'Kursi Besi', 'DIPA TEKNIK 2003', '2 bh', 'Staf Dekan', 'Baik, Terawat'),
(10, 'Kursi Kerja Putar', 'DIPA TEKNIK 2003', '1 bh', 'Staf Dekan', 'Baik, Terawat'),
(11, 'Lemari Kayu Kaca', 'DIPA TEKNIK 2003', '1 bh', 'Staf Dekan', 'Baik, Terawat'),
(12, 'Meja Kerja', 'DIPA TEKNIK 2003', '1 bh', 'Staf Dekan', 'Baik, Terawat'),
(13, 'Telepon', 'DIPA TEKNIK 2003', '1 bh', 'Staf Dekan', 'Baik, Terawat'),
(14, 'Whiteboard Kecil', 'DIPA TEKNIK 2003', '1 bh', 'Staf Dekan', 'Baik, Terawat'),
(15, 'Kursi kerja putar kecil', 'DIPA TEKNIK 2009', '1 unit', 'WD 1', 'Baik, Terawat');

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
(5, 'Endina Putri Purwandari, Desi Andreswari', 'Teknik Informatika', 'Peningkatan Keterampilan Guru IPS SMP dalam Penggunaan Sistem Informasi Geografi', 'Pseudocode', 'Vol. III No. 1, Februari 2016'),
(6, 'Irham MA, Rusdi Effendi, Boko Susilo', 'Teknik Informatika', 'Penerapan Algoritma Kriptografi Kunci Simetris dengan Modifikasi Vigenere Chiper', 'Pseudocode', 'Vol. III No.1, Februari 2016'),
(7, 'Lindung Z, Mase.', 'Teknik Sipil', 'An Application of Soil Behaviour Method in Determining The Value of Shear Modulu', 'Teknosia', 'Vol. 1 No. 16, Tahun X, Maret 2016'),
(8, 'Angky Puspawan, Nurul Iman, Agus Suandi', 'Teknik Mesin', 'Analysis of Fuel Heating Value of Fibers and Shell Palm Oil (Elaeis Guineensis J', 'Teknosia', 'Vol. 1, No. 16, Tahun X, Maret 2016'),
(9, 'Mawardi, Olandry W.', 'Teknik Sipil', 'The Effects of Mixed Addition of Cement and Rice Husk Ash Against Land Stabiliza', 'Teknosia', 'Vol.1, No. 16, Tahun X, Maret 2016');

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
(67, 9, 'Nasional', 'Robotika', 'Padang', '2014-03-06', 13500000),
(73, 3, 'Nasional', 'Futsal', 'UNIB', '2014-12-11', 200000),
(74, 9, 'Nasional', 'Robotika', 'UNIB', '2015-02-20', 6000000),
(75, 1, 'Universitas', 'Bola Kaki', 'UNIB', '2014-04-24', 200000),
(76, 2, 'Universitas', 'Bola Kaki', 'UNIB', '2014-04-24', 200000),
(77, 3, 'Universitas', 'Bola Kaki', 'UNIB', '2014-04-24', 200000),
(78, 4, 'Universitas', 'Bola Kaki', 'UNIB', '2014-04-24', 200000),
(79, 9, 'Nasional', 'Robotika', 'Surabaya', '2016-11-04', 1000000),
(80, 3, 'Nasional', 'Mobil Hemat Energi', 'Universitas', '2014-08-20', 19940000),
(81, 3, 'Nasional', 'Catur', 'Padang', '2016-12-06', 1000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `koleksibuku`
--

CREATE TABLE `koleksibuku` (
  `idKoleksi` int(11) NOT NULL,
  `namaBuku` varchar(50) NOT NULL,
  `penerbit` varchar(30) NOT NULL,
  `pengarang` varchar(50) NOT NULL,
  `jenisBuku` varchar(20) NOT NULL,
  `bahasaBuku` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `koleksibuku`
--

INSERT INTO `koleksibuku` (`idKoleksi`, `namaBuku`, `penerbit`, `pengarang`, `jenisBuku`, `bahasaBuku`) VALUES
(3, 'Analisis Fourien', 'Erlangga', 'Murray R Spiegel', 'teks', 'indo'),
(4, 'Advancesin Materials Processing', 'Institut of Material Malaysia', 'Che Husna Azhari', 'referensi', 'asing'),
(5, 'Aljabar Linear Elementer', 'Erlangga', 'Howar Anton', 'teks', 'asing'),
(6, 'Aneka Hobi Elektronika', 'Pioner Jaya', 'Dedy Rusmadi', 'referensi', 'indo'),
(7, 'Belajar Mudah Merangkai Elektronika', 'Kata Pena', 'Toni Supriatna', 'referensi', 'indo'),
(8, 'Analisa Struktur', 'Erlangga', 'Joseph E Baules PE SE', 'teks', 'indo'),
(9, 'Adobe Firework CS6', 'Andi Offset Bandung', 'Cristianus Sigit Sulistyo', 'referensi', 'indo');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `NPM` varchar(9) NOT NULL,
  `namaMahasiswa` varchar(50) NOT NULL,
  `jenisKelamin` varchar(10) NOT NULL,
  `jalurMasuk` varchar(15) NOT NULL,
  `idProdi` int(11) NOT NULL,
  `tahunMasuk` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`NPM`, `namaMahasiswa`, `jenisKelamin`, `jalurMasuk`, `idProdi`, `tahunMasuk`) VALUES
('G1A013002', 'M. S. Okriyanto', 'Laki-laki', 'SBMPTN', 1, 2013),
('G1A013005', 'Nina Retno Anggraheni', 'Perempuan', 'SNMPTN', 1, 2013),
('G1A013006', 'Rifki Meilianda', 'Laki-laki', 'SNMPTN', 3, 2013),
('G1A013023', 'Triya Yuliana', 'Perempuan', 'SBMPTN', 2, 2013),
('G1A013025', 'Sumitra Jaya Firdaus', 'Laki-laki', 'SBMPTN', 1, 2013),
('G1A013029', 'Kemas Abdulrahman FA', 'Laki-laki', 'SBMPTN', 1, 2013),
('G1A014004', 'Dita Retnowati', 'Perempuan', 'SNMPTN', 1, 2014),
('G1A014005', 'Rizka Yulia Ningsih', 'Perempuan', 'SNMPTN', 1, 2016),
('G1A015010', 'Tommy Alexander T', 'Laki-laki', 'SNMPTN', 1, 2015),
('G1A015013', 'Widia Oktarianti', 'Perempuan', 'SNMPTN', 1, 2015),
('G1A015020', 'Ilyos Abdi Sudrajat', 'Laki-laki', 'SBMPTN', 1, 2015),
('G1A015022', 'Agief Muftahid', 'Laki-laki', 'SBMPTN', 1, 2015),
('G1A015030', 'Sonia Rosalin Sihite', 'Perempuan', 'SBMPTN', 1, 2013),
('G1A016024', 'Nadine Dwi Pratiwi', 'Perempuan', 'SBMPTN', 1, 2016),
('G1A016082', 'Safroni Aziz Suprianto', 'Laki-laki', 'SPMU', 1, 2016),
('G1B013005', 'Teuh Rienaldi Rahman', 'Laki-laki', 'SNMPTN', 2, 2013),
('G1B014018', 'Rizki Junanda', 'Laki-laki', 'SNMPTN', 2, 2014),
('G1B014029', 'Tasia Asa Pratiwi', 'Perempuan', 'SBMPTN', 2, 2014),
('G1B015052', 'Okky Kurniawan', 'Laki-laki', 'SBMPTN', 3, 2015),
('G1C015011', 'Rahmat Supartian', 'Laki-laki', 'SNMPTN', 3, 2015),
('G1C016018', 'Severus Dian S', 'Laki-laki', 'SNMPTN', 3, 2016),
('G1D013015', 'Sandy Anggara', 'Laki-laki', 'SNMPTN', 4, 2013);

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
(8, 'Ercom'),
(9, 'Club Robotica');

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
  `status` varchar(15) NOT NULL,
  `jenjangPendidikan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`idPegawai`, `NIP`, `namaPegawai`, `jenisKelamin`, `unitKerja`, `golongan`, `status`, `jenjangPendidikan`) VALUES
(1, '7657875675', 'Aji', 'Laki-laki', 'Prodi Teknik Informatika', 'IIC', 'Tetap', 'S1'),
(2, '2345567', 'Ilyos', 'Perempuan', 'Bidang Administrasi Umum & Keuangan', 'IIID', 'Tidak Tetap', 'S3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjam`
--

CREATE TABLE `peminjam` (
  `idPeminjam` int(11) NOT NULL,
  `namaPeminjam` varchar(50) NOT NULL,
  `idProdi` int(11) NOT NULL,
  `idKoleksi` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `peminjam`
--

INSERT INTO `peminjam` (`idPeminjam`, `namaPeminjam`, `idProdi`, `idKoleksi`, `tanggal`) VALUES
(8, 'Agief Muftahid', 1, 3, '2017-12-04'),
(11, 'Ilyos Abdi Sudrajat', 2, 8, '2016-07-06'),
(12, 'Nadine Dwi Pratiwi', 2, 8, '2015-08-17');

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
(1, 'Reona Anjelina', 5, 'SNMPTN', 2017, 'Perempuan'),
(2, 'Angeline Yuhasnita', 2, 'SBMPTN', 2017, 'Perempuan'),
(3, 'Ilyos Abdi Sudrajat', 3, 'SBMPTN', 2015, 'Laki-laki'),
(4, 'Evan Fathoni', 4, 'SBMPTN', 2017, 'Laki-laki'),
(5, 'Yopi Kerin', 3, 'SBMPTN', 2017, 'Laki-laki'),
(6, 'Yunasti', 1, 'SNMPTN', 2017, 'Perempuan'),
(7, 'Gina Laxmi Yolanda', 1, 'SNMPTN', 2017, 'Perempuan'),
(8, 'Selvania', 2, 'SPMU', 2016, 'Perempuan'),
(9, 'Rahmat Hidayat', 1, 'SPMU', 2016, 'Laki-laki');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengunjung`
--

CREATE TABLE `pengunjung` (
  `idPengunjung` int(11) NOT NULL,
  `namaPengunjung` varchar(50) NOT NULL,
  `idProdi` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengunjung`
--

INSERT INTO `pengunjung` (`idPengunjung`, `namaPengunjung`, `idProdi`, `tanggal`) VALUES
(5, 'Ilyos Abdi Sudrajat', 1, '2017-12-08'),
(6, 'Agief Muftahid', 1, '2016-10-06');

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
(1, 'G1A014005', 1, 'Juara 1 Lomba Essay Sriwiaya Islami', 'Nasional', 2017),
(2, 'G1A014005', 1, 'Juara 1 Debat Kritis MIPA Expo 2017', 'Universitas', 2017),
(3, 'G1A014005', 1, 'Finalis Debat Kebangsaan Nusantara', 'Nasional', 2017),
(4, 'G1B014018', 2, 'Juara 3 Lomba Menulis Inspirasi Kat', 'Universitas', 2017),
(5, 'G1C016018', 3, 'Juara 1 Lomba Catur Physics Champio', 'Universitas', 2017);

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
(1, 'Teknik Informatika', 'SK BAN PT No.0326/SK/BAN-PT/Akred/IV2015', 'B'),
(2, 'Teknik Sipil', 'SK BAN PT No.1448/SK/BAN-PT/Akred/IV2016', 'B'),
(3, 'Teknik Mesin', 'SK BAN PT No.502/SK/BAN-PT/Akred/IV2015', 'B'),
(4, 'Teknik Elektro', 'SK BAN PT No.251/SK/BAN-PT/Akred/IV2015', 'B'),
(5, 'Arsitektur', '-', 'C'),
(6, 'Sistem Informasi', '-', 'C');

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
-- Indexes for table `bantudosen`
--
ALTER TABLE `bantudosen`
  ADD PRIMARY KEY (`idBantudosen`);

--
-- Indexes for table `bantumahasiswa`
--
ALTER TABLE `bantumahasiswa`
  ADD PRIMARY KEY (`idBantumahasiswa`);

--
-- Indexes for table `beasiswa`
--
ALTER TABLE `beasiswa`
  ADD PRIMARY KEY (`idBeasiswa`),
  ADD KEY `NPM` (`NPM`),
  ADD KEY `idProdi` (`idProdi`);

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
-- Indexes for table `peminjam`
--
ALTER TABLE `peminjam`
  ADD PRIMARY KEY (`idPeminjam`),
  ADD KEY `idProdi` (`idProdi`),
  ADD KEY `idKoleksi` (`idKoleksi`);

--
-- Indexes for table `pendaftar`
--
ALTER TABLE `pendaftar`
  ADD PRIMARY KEY (`idPendaftar`),
  ADD KEY `idProdi` (`idProdi`);

--
-- Indexes for table `pengunjung`
--
ALTER TABLE `pengunjung`
  ADD PRIMARY KEY (`idPengunjung`),
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
-- AUTO_INCREMENT for table `alokasidana`
--
ALTER TABLE `alokasidana`
  MODIFY `idAlokasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `anggarankeluar`
--
ALTER TABLE `anggarankeluar`
  MODIFY `idKeluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `anggaranmasuk`
--
ALTER TABLE `anggaranmasuk`
  MODIFY `idMasuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `bantudosen`
--
ALTER TABLE `bantudosen`
  MODIFY `idBantudosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `bantumahasiswa`
--
ALTER TABLE `bantumahasiswa`
  MODIFY `idBantumahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `beasiswa`
--
ALTER TABLE `beasiswa`
  MODIFY `idBeasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `idDosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `inventaris`
--
ALTER TABLE `inventaris`
  MODIFY `idInventaris` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `jurnal`
--
ALTER TABLE `jurnal`
  MODIFY `idJurnal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `kegiatanmhs`
--
ALTER TABLE `kegiatanmhs`
  MODIFY `idKegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
--
-- AUTO_INCREMENT for table `koleksibuku`
--
ALTER TABLE `koleksibuku`
  MODIFY `idKoleksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `ormawa`
--
ALTER TABLE `ormawa`
  MODIFY `idOrmawa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `idPegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `peminjam`
--
ALTER TABLE `peminjam`
  MODIFY `idPeminjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `pendaftar`
--
ALTER TABLE `pendaftar`
  MODIFY `idPendaftar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `pengunjung`
--
ALTER TABLE `pengunjung`
  MODIFY `idPengunjung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `prestasi`
--
ALTER TABLE `prestasi`
  MODIFY `idPrestasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
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
-- Ketidakleluasaan untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`idProdi`) REFERENCES `prodi` (`idProdi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `peminjam`
--
ALTER TABLE `peminjam`
  ADD CONSTRAINT `peminjam_ibfk_1` FOREIGN KEY (`idKoleksi`) REFERENCES `koleksibuku` (`idKoleksi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `peminjam_ibfk_2` FOREIGN KEY (`idProdi`) REFERENCES `prodi` (`idProdi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pendaftar`
--
ALTER TABLE `pendaftar`
  ADD CONSTRAINT `pendaftar_ibfk_1` FOREIGN KEY (`idProdi`) REFERENCES `prodi` (`idProdi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pengunjung`
--
ALTER TABLE `pengunjung`
  ADD CONSTRAINT `pengunjung_ibfk_1` FOREIGN KEY (`idProdi`) REFERENCES `prodi` (`idProdi`) ON DELETE CASCADE ON UPDATE CASCADE;

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
