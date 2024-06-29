-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 16. April 2023 jam 11:21
-- Versi Server: 5.1.41
-- Versi PHP: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `holip`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `id_user` int(5) NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `foto` text NOT NULL,
  `level` int(10) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `admins`
--

INSERT INTO `admins` (`id_user`, `nama_lengkap`, `username`, `password`, `foto`, `level`) VALUES
(2, 'Administrator', 'admin', 'admin', 'foto_user/27B.jpg', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE IF NOT EXISTS `dosen` (
  `id_dosen` int(10) NOT NULL AUTO_INCREMENT,
  `nama_dosen` varchar(100) NOT NULL,
  `tempat_lahir_dosen` varchar(100) NOT NULL,
  `tanggal_lahir_dosen` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_hp` varchar(100) NOT NULL,
  `id_fakultas` varchar(100) NOT NULL,
  `username_dosen` varchar(100) NOT NULL,
  `password_dosen` varchar(100) NOT NULL,
  `foto_dosen` varchar(100) NOT NULL,
  PRIMARY KEY (`id_dosen`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `nama_dosen`, `tempat_lahir_dosen`, `tanggal_lahir_dosen`, `alamat`, `no_hp`, `id_fakultas`, `username_dosen`, `password_dosen`, `foto_dosen`) VALUES
(1, 'Bakir', 'Pamekasan', '1996-11-29', 'Desa Pasean', '0823567567673', '3', 'bakir', 'bakir', 'foto_user/ustadz2.jpg'),
(2, 'anwari', 'Pamekasan', '1983-11-30', 'Jl. Jokotole, RW.06, Rw. 06, Barurambat Kota, Kec. Pamekasan, Kabupaten Pamekasan, Jawa Timur 69317', '08867674565', '3', 'anwari', 'anwari', 'foto_user/ustadz6.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fakultas`
--

CREATE TABLE IF NOT EXISTS `fakultas` (
  `id_fakultas` int(10) NOT NULL AUTO_INCREMENT,
  `nama_fakultas` varchar(100) NOT NULL,
  PRIMARY KEY (`id_fakultas`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `fakultas`
--

INSERT INTO `fakultas` (`id_fakultas`, `nama_fakultas`) VALUES
(3, 'Fakultas Agama Islam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE IF NOT EXISTS `jurusan` (
  `id_jurusan` int(10) NOT NULL AUTO_INCREMENT,
  `id_fakultas` varchar(100) NOT NULL,
  `nama_jurusan` varchar(100) NOT NULL,
  PRIMARY KEY (`id_jurusan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `id_fakultas`, `nama_jurusan`) VALUES
(3, '3', 'Syariah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE IF NOT EXISTS `mahasiswa` (
  `id_mahasiswa` int(10) NOT NULL AUTO_INCREMENT,
  `nama_mahasiswa` varchar(100) NOT NULL,
  `npm` varchar(100) NOT NULL,
  `tempat_lahir_mahasiswa` varchar(100) NOT NULL,
  `tanggal_lahir_mahasiswa` varchar(100) NOT NULL,
  `alamat_mahasiswa` varchar(100) NOT NULL,
  `no_hp_mahasiswa` varchar(100) NOT NULL,
  `id_fakultas_mahasiswa` varchar(100) NOT NULL,
  `id_jurusan_mahasiswa` varchar(100) NOT NULL,
  `username_mahasiswa` varchar(100) NOT NULL,
  `password_mahasiswa` varchar(100) NOT NULL,
  `foto_mahasiswa` varchar(100) NOT NULL,
  PRIMARY KEY (`id_mahasiswa`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mahasiswa`, `nama_mahasiswa`, `npm`, `tempat_lahir_mahasiswa`, `tanggal_lahir_mahasiswa`, `alamat_mahasiswa`, `no_hp_mahasiswa`, `id_fakultas_mahasiswa`, `id_jurusan_mahasiswa`, `username_mahasiswa`, `password_mahasiswa`, `foto_mahasiswa`) VALUES
(1, 'putri Sanjaya', '87787879', 'Pamekasan', '2004-05-25', 'desa pamoroh', '0878678556', '3', '3', 'ku', 'ku', 'foto_user/hijab9.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `profil`
--

CREATE TABLE IF NOT EXISTS `profil` (
  `id_profil` int(10) NOT NULL AUTO_INCREMENT,
  `profil` text NOT NULL,
  PRIMARY KEY (`id_profil`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `profil`
--

INSERT INTO `profil` (`id_profil`, `profil`) VALUES
(1, '<p style="text-align:justify">Saat ini Skripsi atau Tugas Akhir yang ada di Universitas Islam Madura (UIM) masih belum terdata dengan lengkap.&nbsp;Hal ini menyulitkan bagi mahasiswa atau pihak yang membutuhkan informasi yang berhubungan dengan Skripsi yang dibutuhkan.&nbsp;Selain itu, hal ini dapat membantu mahasiswa yang akan mengajukan Skripsi dapat terhindar dari Skripsi yang sama.&nbsp;Pendataan Skripsi berbasis web ini akan memudahkan dalam proses pencarian dan pertanggungjawaban yang diperlukan.&nbsp;Mahasiswa tidak perlu repot mencari Skripsi secara manual di perpustakaan, karena proses pencarian dapat dilakukan dengan cepat dan tepat. Dosen dapat memberikan pembandingan dan referensi terhadap Skripsi yang sudah ada.</p>\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `skripsi`
--

CREATE TABLE IF NOT EXISTS `skripsi` (
  `id_skripsi` int(10) NOT NULL AUTO_INCREMENT,
  `id_penulis` varchar(100) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `pembimbing1` varchar(100) NOT NULL,
  `pembimbing2` varchar(100) NOT NULL,
  `kata_kunci1` varchar(100) NOT NULL,
  `kata_kunci2` varchar(100) NOT NULL,
  `kata_kunci3` varchar(100) NOT NULL,
  `kata_kunci4` varchar(100) NOT NULL,
  `tahun_lulus` varchar(100) NOT NULL,
  `file_skripsi` varchar(100) NOT NULL,
  `level` int(10) NOT NULL,
  PRIMARY KEY (`id_skripsi`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `skripsi`
--

INSERT INTO `skripsi` (`id_skripsi`, `id_penulis`, `judul`, `pembimbing1`, `pembimbing2`, `kata_kunci1`, `kata_kunci2`, `kata_kunci3`, `kata_kunci4`, `tahun_lulus`, `file_skripsi`, `level`) VALUES
(1, '1', 'apa saja boleh', '1', '2', 'a', 'b', 'c', 'd', '2020', 'skripsi/Pengumuman-Hasil-Seleksi-Administrasi-Rekruitmen-BLUD-Puskesmas-2023.pdf', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
