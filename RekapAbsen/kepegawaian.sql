-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Nov 2019 pada 18.00
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kepegawaian`
--

DELIMITER $$
--
-- Prosedur
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `absen` (IN `id` VARCHAR(255), IN `bulan` VARCHAR(255), IN `tahun` VARCHAR(255))  select karyawan.id_kyn,karyawan.nama_kyn,absen.tgl
from karyawan,absen
where karyawan.id_kyn=bulan and absen.month(tgl) = bulan and absen.year(tgl) = tahun$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `daf_absen` (IN `id` VARCHAR(255), IN `bulan` VARCHAR(255), IN `tahun` VARCHAR(255))  select karyawan.id_kyn,karyawan.nama_kyn,absen.tgl
from karyawan,absen
where karyawan.id_kyn=bulan and absen.month(tgl) = bulan and absen.year(tgl) = tahun$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `daf_absen2` (IN `id` VARCHAR(255), IN `bulan` VARCHAR(255), IN `tahun` VARCHAR(255))  select karyawan.id_kyn,karyawan.nama_kyn,absen.tgl
from karyawan,absen
where karyawan.id_kyn=id and karyawan.id_kyn = absen.id_kyn  and month(absen.tgl) = bulan and year(absen.tgl) = tahun$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `daf_absen3` (IN `id` VARCHAR(255), IN `bulan` VARCHAR(255), IN `tahun` VARCHAR(255))  begin
select COUNT(absen.ket)
from karyawan,absen
where karyawan.id_kyn=id and absen.ket="HTW" and karyawan.id_kyn = absen.id_kyn  and month(absen.tgl) = bulan and year(absen.tgl) = tahun;

select COUNT(absen.ket)
from karyawan,absen
where karyawan.id_kyn=id and absen.ket="TM" and karyawan.id_kyn = absen.id_kyn  and month(absen.tgl) = bulan and year(absen.tgl) = tahun;

select COUNT(absen.ket)
from karyawan,absen
where karyawan.id_kyn=id and absen.ket="PSW" and karyawan.id_kyn = absen.id_kyn  and month(absen.tgl) = bulan and year(absen.tgl) = tahun;

select COUNT(absen.ket)
from karyawan,absen
where karyawan.id_kyn=id and absen.ket="TK" and karyawan.id_kyn = absen.id_kyn  and month(absen.tgl) = bulan and year(absen.tgl) = tahun;

select karyawan.id_kyn,karyawan.nama_kyn
from karyawan,absen
where karyawan.id_kyn=id and karyawan.id_kyn = absen.id_kyn  and month(absen.tgl) = bulan and year(absen.tgl) = tahun;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertData1` (IN `tahun` VARCHAR(255), IN `bulan` VARCHAR(2), IN `tgl` INT)  begin 
declare absen1 varchar(50);
if tgl>="2019-11-01" then set absen1 = ket;
end if;
insert into absen values (tahun, bulan, tgl, absen1);
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertData12` (IN `tgl` DATE)  begin 
declare absen1 varchar(255);
if tgl='2019-11-01' then set absen1 = 'hah';
end if;
insert into absen values (tgl, absen1);
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `jumket` (IN `id` VARCHAR(255), IN `ket` VARCHAR(255), IN `bulan` VARCHAR(255), IN `tahun` VARCHAR(255))  select COUNT(absen.ket)
from karyawan,absen
where karyawan.id_kyn=id and absen.ket=ket and karyawan.id_kyn = absen.id_kyn  and month(absen.tgl) = bulan and year(absen.tgl) = tahun$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `jumket1` (IN `id` VARCHAR(255), IN `ket` VARCHAR(255), IN `bulan` VARCHAR(255), IN `tahun` VARCHAR(255))  select COUNT(absen.ket) as jumket
from karyawan,absen
where karyawan.id_kyn=id and absen.ket=ket and karyawan.id_kyn = absen.id_kyn  and month(absen.tgl) = bulan and year(absen.tgl) = tahun$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ket` (IN `tanggal` VARCHAR(50))  select id_kyn,ket,tgl from absen where tgl=tanggal$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ket1` (IN `tanggal` VARCHAR(50))  select id_kyn,ket,tgl from absen where tgl=tanggal GROUP BY id_kyn$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ket10` (IN `tanggal` VARCHAR(50))  select id_kyn,ket,tgl from absen where tgl=tanggal GROUP BY id_kyn$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ket11` (IN `tanggal` VARCHAR(50))  select id_kyn,ket,tgl from absen where tgl=tanggal GROUP BY id_kyn$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ket12` (IN `tanggal` VARCHAR(50))  select id_kyn,ket,tgl from absen where tgl=tanggal GROUP BY id_kyn$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ket13` (IN `tanggal` VARCHAR(50))  select id_kyn,ket,tgl from absen where tgl=tanggal GROUP BY id_kyn$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ket14` (IN `tanggal` VARCHAR(50))  select id_kyn,ket,tgl from absen where tgl=tanggal GROUP BY id_kyn$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ket15` (IN `tanggal` VARCHAR(50))  select id_kyn,ket,tgl from absen where tgl=tanggal GROUP BY id_kyn$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ket16` (IN `tanggal` VARCHAR(50))  select id_kyn,ket,tgl from absen where tgl=tanggal GROUP BY id_kyn$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ket17` (IN `tanggal` VARCHAR(50))  select id_kyn,ket,tgl from absen where tgl=tanggal GROUP BY id_kyn$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ket18` (IN `tanggal` VARCHAR(50))  select id_kyn,ket,tgl from absen where tgl=tanggal GROUP BY id_kyn$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ket19` (IN `tanggal` VARCHAR(50))  select id_kyn,ket,tgl from absen where tgl=tanggal GROUP BY id_kyn$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ket2` (IN `tanggal` VARCHAR(50))  select id_kyn,ket,tgl from absen where tgl=tanggal GROUP BY id_kyn$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ket20` (IN `tanggal` VARCHAR(50))  select id_kyn,ket,tgl from absen where tgl=tanggal GROUP BY id_kyn$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ket21` (IN `tanggal` VARCHAR(50))  select id_kyn,ket,tgl from absen where tgl=tanggal GROUP BY id_kyn$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ket22` (IN `tanggal` VARCHAR(50))  select id_kyn,ket,tgl from absen where tgl=tanggal GROUP BY id_kyn$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ket23` (IN `tanggal` VARCHAR(50))  select id_kyn,ket,tgl from absen where tgl=tanggal GROUP BY id_kyn$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ket24` (IN `tanggal` VARCHAR(50))  select id_kyn,ket,tgl from absen where tgl=tanggal GROUP BY id_kyn$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ket25` (IN `tanggal` VARCHAR(50))  select id_kyn,ket,tgl from absen where tgl=tanggal GROUP BY id_kyn$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ket26` (IN `tanggal` VARCHAR(50))  select id_kyn,ket,tgl from absen where tgl=tanggal GROUP BY id_kyn$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ket27` (IN `tanggal` VARCHAR(50))  select id_kyn,ket,tgl from absen where tgl=tanggal GROUP BY id_kyn$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ket28` (IN `tanggal` VARCHAR(50))  select id_kyn,ket,tgl from absen where tgl=tanggal GROUP BY id_kyn$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ket29` (IN `tanggal` VARCHAR(50))  select id_kyn,ket,tgl from absen where tgl=tanggal GROUP BY id_kyn$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ket3` (IN `tanggal` VARCHAR(50))  select id_kyn,ket,tgl from absen where tgl=tanggal GROUP BY id_kyn$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ket30` (IN `tanggal` VARCHAR(50))  select id_kyn,ket,tgl from absen where tgl=tanggal GROUP BY id_kyn$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ket31` (IN `tanggal` VARCHAR(50))  select id_kyn,ket,tgl from absen where tgl=tanggal GROUP BY id_kyn$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ket4` (IN `tanggal` VARCHAR(50))  select id_kyn,ket,tgl from absen where tgl=tanggal GROUP BY id_kyn$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ket5` (IN `tanggal` VARCHAR(50))  select id_kyn,ket,tgl from absen where tgl=tanggal GROUP BY id_kyn$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ket6` (IN `tanggal` VARCHAR(50))  select id_kyn,ket,tgl from absen where tgl=tanggal GROUP BY id_kyn$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ket7` (IN `tanggal` VARCHAR(50))  select id_kyn,ket,tgl from absen where tgl=tanggal GROUP BY id_kyn$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ket8` (IN `tanggal` VARCHAR(50))  select id_kyn,ket,tgl from absen where tgl=tanggal GROUP BY id_kyn$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ket9` (IN `tanggal` VARCHAR(50))  select id_kyn,ket,tgl from absen where tgl=tanggal GROUP BY id_kyn$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `nama` (IN `tahun` VARCHAR(50), IN `bulan` VARCHAR(50))  select karyawan.id_kyn,karyawan.nama_kyn FROM karyawan,absen
where karyawan.id_kyn=absen.id_kyn and year(absen.tgl)=tahun and month(absen.tgl)=bulan
group by karyawan.id_kyn$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `absen`
--

CREATE TABLE `absen` (
  `id_absen` int(11) NOT NULL,
  `id_kyn` varchar(20) DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  `ket` enum('HTW','TM','PSW','TK') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `absen`
--

INSERT INTO `absen` (`id_absen`, `id_kyn`, `tgl`, `ket`) VALUES
(611, '13020170096', '2019-11-01', 'HTW'),
(612, '13020170096', '2019-11-02', 'TM'),
(613, '13020170096', '2019-11-03', 'PSW'),
(614, '13020170096', '2019-11-04', 'TK'),
(615, '13020170096', '2019-11-05', 'HTW'),
(616, '13020170096', '2019-11-06', 'HTW'),
(617, '13020170096', '2019-11-07', 'HTW'),
(618, '13020170096', '2019-11-08', 'HTW'),
(619, '13020170096', '2019-11-09', 'HTW'),
(620, '13020170096', '2019-11-10', 'HTW'),
(621, '13020170096', '2019-11-11', 'HTW'),
(622, '13020170096', '2019-11-12', 'HTW'),
(623, '13020170096', '2019-11-13', 'HTW'),
(624, '13020170096', '2019-11-14', 'HTW'),
(625, '13020170096', '2019-11-15', 'HTW'),
(626, '13020170096', '2019-11-16', 'HTW'),
(627, '13020170096', '2019-11-17', 'HTW'),
(628, '13020170096', '2019-11-18', 'HTW'),
(629, '13020170096', '2019-11-19', 'HTW'),
(630, '13020170096', '2019-11-20', 'HTW'),
(631, '13020170096', '2019-11-21', 'HTW'),
(632, '13020170096', '2019-11-22', 'HTW'),
(633, '13020170096', '2019-11-23', 'HTW'),
(634, '13020170096', '2019-11-24', 'HTW'),
(635, '13020170096', '2019-11-25', 'HTW'),
(636, '13020170096', '2019-11-26', 'HTW'),
(637, '13020170096', '2019-11-27', 'HTW'),
(638, '13020170096', '2019-11-28', 'HTW'),
(639, '13020170096', '2019-11-29', 'HTW'),
(640, '13020170096', '2019-11-30', 'HTW'),
(641, '13020170096', '2018-11-01', 'HTW'),
(642, '13020170096', '2018-11-02', 'HTW'),
(643, '13020170096', '2018-11-03', 'HTW'),
(644, '13020170096', '2018-11-04', 'HTW'),
(645, '13020170096', '2018-11-05', 'HTW'),
(646, '13020170096', '2018-11-06', 'HTW'),
(647, '13020170096', '2018-11-07', 'HTW'),
(648, '13020170096', '2018-11-08', 'HTW'),
(649, '13020170096', '2018-11-09', 'HTW'),
(650, '13020170096', '2018-11-10', 'HTW'),
(651, '13020170096', '2018-11-11', 'HTW'),
(652, '13020170096', '2018-11-12', 'HTW'),
(653, '13020170096', '2018-11-13', 'HTW'),
(654, '13020170096', '2018-11-14', 'HTW'),
(655, '13020170096', '2018-11-15', 'HTW'),
(656, '13020170096', '2018-11-16', 'HTW'),
(657, '13020170096', '2018-11-17', 'HTW'),
(658, '13020170096', '2018-11-18', 'HTW'),
(659, '13020170096', '2018-11-19', 'HTW'),
(660, '13020170096', '2018-11-20', 'HTW'),
(661, '13020170096', '2018-11-21', 'HTW'),
(662, '13020170096', '2018-11-22', 'HTW'),
(663, '13020170096', '2018-11-23', 'HTW'),
(664, '13020170096', '2018-11-24', 'HTW'),
(665, '13020170096', '2018-11-25', 'TK'),
(666, '13020170096', '2018-11-26', 'TK'),
(667, '13020170096', '2018-11-27', 'PSW'),
(668, '13020170096', '2018-11-28', 'PSW'),
(669, '13020170096', '2018-11-29', 'TM'),
(670, '13020170096', '2018-11-30', 'TM'),
(762, '13020170096', '2019-01-01', 'HTW'),
(763, '13020170096', '2019-01-02', 'TK'),
(764, '13020170096', '2019-01-03', 'PSW'),
(765, '13020170096', '2019-01-04', 'TM'),
(766, '13020170096', '2019-01-05', 'TM'),
(767, '13020170096', '2019-01-06', 'HTW'),
(768, '13020170096', '2019-01-07', 'HTW'),
(769, '13020170096', '2019-01-08', 'HTW'),
(770, '13020170096', '2019-01-09', 'HTW'),
(771, '13020170096', '2019-01-10', 'HTW'),
(772, '13020170096', '2019-01-11', 'HTW'),
(773, '13020170096', '2019-01-12', 'HTW'),
(774, '13020170096', '2019-01-13', 'HTW'),
(775, '13020170096', '2019-01-14', 'HTW'),
(776, '13020170096', '2019-01-15', 'HTW'),
(777, '13020170096', '2019-01-16', 'HTW'),
(778, '13020170096', '2019-01-17', 'HTW'),
(779, '13020170096', '2019-01-18', 'HTW'),
(780, '13020170096', '2019-01-19', 'HTW'),
(781, '13020170096', '2019-01-20', 'HTW'),
(782, '13020170096', '2019-01-21', 'HTW'),
(783, '13020170096', '2019-01-22', 'HTW'),
(784, '13020170096', '2019-01-23', 'HTW'),
(785, '13020170096', '2019-01-24', 'HTW'),
(786, '13020170096', '2019-01-25', 'HTW'),
(787, '13020170096', '2019-01-26', 'HTW'),
(788, '13020170096', '2019-01-27', 'HTW'),
(789, '13020170096', '2019-01-28', 'HTW'),
(790, '13020170096', '2019-01-29', 'HTW'),
(791, '13020170096', '2019-01-30', 'HTW'),
(792, '13020170096', '2019-01-31', 'HTW'),
(793, '13020170096', '2019-02-01', 'TM'),
(794, '13020170096', '2019-02-02', 'TM'),
(795, '13020170096', '2019-02-03', 'HTW'),
(796, '13020170096', '2019-02-04', 'HTW'),
(797, '13020170096', '2019-02-05', 'HTW'),
(798, '13020170096', '2019-02-06', 'HTW'),
(799, '13020170096', '2019-02-07', 'HTW'),
(800, '13020170096', '2019-02-08', 'PSW'),
(801, '13020170096', '2019-02-09', 'HTW'),
(802, '13020170096', '2019-02-10', 'HTW'),
(803, '13020170096', '2019-02-11', 'HTW'),
(804, '13020170096', '2019-02-12', 'HTW'),
(805, '13020170096', '2019-02-13', 'HTW'),
(806, '13020170096', '2019-02-14', 'HTW'),
(807, '13020170096', '2019-02-15', 'TM'),
(808, '13020170096', '2019-02-16', 'HTW'),
(809, '13020170096', '2019-02-17', 'HTW'),
(810, '13020170096', '2019-02-18', 'HTW'),
(811, '13020170096', '2019-02-19', 'HTW'),
(812, '13020170096', '2019-02-20', 'HTW'),
(813, '13020170096', '2019-02-21', 'HTW'),
(814, '13020170096', '2019-02-22', 'TK'),
(815, '13020170096', '2019-02-23', 'HTW'),
(816, '13020170096', '2019-02-24', 'HTW'),
(817, '13020170096', '2019-02-25', 'HTW'),
(818, '13020170096', '2019-02-26', 'HTW'),
(819, '13020170096', '2019-02-27', 'HTW'),
(820, '13020170096', '2019-02-28', 'HTW'),
(821, '13020170096', '2019-03-01', 'HTW'),
(822, '13020170096', '2019-03-02', 'HTW'),
(823, '13020170096', '2019-03-03', 'HTW'),
(824, '13020170096', '2019-03-04', 'HTW'),
(825, '13020170096', '2019-03-05', 'PSW'),
(826, '13020170096', '2019-03-06', 'HTW'),
(827, '13020170096', '2019-03-07', 'HTW'),
(828, '13020170096', '2019-03-08', 'HTW'),
(829, '13020170096', '2019-03-09', 'HTW'),
(830, '13020170096', '2019-03-10', 'HTW'),
(831, '13020170096', '2019-03-11', 'HTW'),
(832, '13020170096', '2019-03-12', 'HTW'),
(833, '13020170096', '2019-03-13', 'HTW'),
(834, '13020170096', '2019-03-14', 'HTW'),
(835, '13020170096', '2019-03-15', 'HTW'),
(836, '13020170096', '2019-03-16', 'HTW'),
(837, '13020170096', '2019-03-17', 'HTW'),
(838, '13020170096', '2019-03-18', 'HTW'),
(839, '13020170096', '2019-03-19', 'TM'),
(840, '13020170096', '2019-03-20', 'HTW'),
(841, '13020170096', '2019-03-21', 'HTW'),
(842, '13020170096', '2019-03-22', 'HTW'),
(843, '13020170096', '2019-03-23', 'HTW'),
(844, '13020170096', '2019-03-24', 'HTW'),
(845, '13020170096', '2019-03-25', 'HTW'),
(846, '13020170096', '2019-03-26', 'HTW'),
(847, '13020170096', '2019-03-27', 'HTW'),
(848, '13020170096', '2019-03-28', 'HTW'),
(849, '13020170096', '2019-03-29', 'HTW'),
(850, '13020170096', '2019-03-30', 'HTW'),
(851, '13020170096', '2019-03-31', 'HTW'),
(852, '13020170101', '2019-04-01', 'HTW'),
(853, '13020170101', '2019-04-02', 'HTW'),
(854, '13020170101', '2019-04-03', 'HTW'),
(855, '13020170101', '2019-04-04', 'HTW'),
(856, '13020170101', '2019-04-05', 'HTW'),
(857, '13020170101', '2019-04-06', 'HTW'),
(858, '13020170101', '2019-04-07', 'HTW'),
(859, '13020170101', '2019-04-08', 'HTW'),
(860, '13020170101', '2019-04-09', 'HTW'),
(861, '13020170101', '2019-04-10', 'HTW'),
(862, '13020170101', '2019-04-11', 'HTW'),
(863, '13020170101', '2019-04-12', 'HTW'),
(864, '13020170101', '2019-04-13', 'HTW'),
(865, '13020170101', '2019-04-14', 'HTW'),
(866, '13020170101', '2019-04-15', 'PSW'),
(867, '13020170101', '2019-04-16', 'TK'),
(868, '13020170101', '2019-04-17', 'HTW'),
(869, '13020170101', '2019-04-18', 'HTW'),
(870, '13020170101', '2019-04-19', 'HTW'),
(871, '13020170101', '2019-04-20', 'HTW'),
(872, '13020170101', '2019-04-21', 'HTW'),
(873, '13020170101', '2019-04-22', 'PSW'),
(874, '13020170101', '2019-04-23', 'HTW'),
(875, '13020170101', '2019-04-24', 'HTW'),
(876, '13020170101', '2019-04-25', 'HTW'),
(877, '13020170101', '2019-04-26', 'HTW'),
(878, '13020170101', '2019-04-27', 'HTW'),
(879, '13020170101', '2019-04-28', 'HTW'),
(880, '13020170101', '2019-04-29', 'TM'),
(881, '13020170101', '2019-04-30', 'TM'),
(882, '13020170002', '2019-10-01', 'TM'),
(883, '13020170002', '2019-10-02', 'TM'),
(884, '13020170002', '2019-10-03', 'HTW'),
(885, '13020170002', '2019-10-04', 'HTW'),
(886, '13020170002', '2019-10-05', 'HTW'),
(887, '13020170002', '2019-10-06', 'HTW'),
(888, '13020170002', '2019-10-07', 'HTW'),
(889, '13020170002', '2019-10-08', 'HTW'),
(890, '13020170002', '2019-10-09', 'HTW'),
(891, '13020170002', '2019-10-10', 'HTW'),
(892, '13020170002', '2019-10-11', 'HTW'),
(893, '13020170002', '2019-10-12', 'HTW'),
(894, '13020170002', '2019-10-13', 'HTW'),
(895, '13020170002', '2019-10-14', 'HTW'),
(896, '13020170002', '2019-10-15', 'HTW'),
(897, '13020170002', '2019-10-16', 'HTW'),
(898, '13020170002', '2019-10-17', 'HTW'),
(899, '13020170002', '2019-10-18', 'HTW'),
(900, '13020170002', '2019-10-19', 'HTW'),
(901, '13020170002', '2019-10-20', 'HTW'),
(902, '13020170002', '2019-10-21', 'HTW'),
(903, '13020170002', '2019-10-22', 'TK'),
(904, '13020170002', '2019-10-23', 'PSW'),
(905, '13020170002', '2019-10-24', 'HTW'),
(906, '13020170002', '2019-10-25', 'HTW'),
(907, '13020170002', '2019-10-26', 'HTW'),
(908, '13020170002', '2019-10-27', 'HTW'),
(909, '13020170002', '2019-10-28', 'HTW'),
(910, '13020170002', '2019-10-29', 'HTW'),
(911, '13020170002', '2019-10-30', 'HTW'),
(912, '13020170002', '2019-10-31', 'TM'),
(2141, '13020170002', '2019-11-01', 'TM'),
(2142, '13020170002', '2019-11-02', 'HTW'),
(2143, '13020170002', '2019-11-03', 'HTW'),
(2144, '13020170002', '2019-11-04', 'HTW'),
(2145, '13020170002', '2019-11-05', 'HTW'),
(2146, '13020170002', '2019-11-06', 'HTW'),
(2147, '13020170002', '2019-11-07', 'HTW'),
(2148, '13020170002', '2019-11-08', 'HTW'),
(2149, '13020170002', '2019-11-09', 'HTW'),
(2150, '13020170002', '2019-11-10', 'HTW'),
(2151, '13020170002', '2019-11-11', 'HTW'),
(2152, '13020170002', '2019-11-12', 'HTW'),
(2153, '13020170002', '2019-11-13', 'HTW'),
(2154, '13020170002', '2019-11-14', 'HTW'),
(2155, '13020170002', '2019-11-15', 'HTW'),
(2156, '13020170002', '2019-11-16', 'HTW'),
(2157, '13020170002', '2019-11-17', 'HTW'),
(2158, '13020170002', '2019-11-18', 'HTW'),
(2159, '13020170002', '2019-11-19', 'HTW'),
(2160, '13020170002', '2019-11-20', 'HTW'),
(2161, '13020170002', '2019-11-21', 'HTW'),
(2162, '13020170002', '2019-11-22', 'HTW'),
(2163, '13020170002', '2019-11-23', 'HTW'),
(2164, '13020170002', '2019-11-24', 'HTW'),
(2165, '13020170002', '2019-11-25', 'HTW'),
(2166, '13020170002', '2019-11-26', 'HTW'),
(2167, '13020170002', '2019-11-27', 'HTW'),
(2168, '13020170002', '2019-11-28', 'HTW'),
(2169, '13020170002', '2019-11-29', 'HTW'),
(2170, '13020170002', '2019-11-30', 'HTW'),
(2201, '13020170202', '2019-11-01', 'TM'),
(2202, '13020170202', '2019-11-02', 'TM'),
(2203, '13020170202', '2019-11-03', 'TM'),
(2204, '13020170202', '2019-11-04', 'TM'),
(2205, '13020170202', '2019-11-05', 'TM'),
(2206, '13020170202', '2019-11-06', 'TM'),
(2207, '13020170202', '2019-11-07', 'TM'),
(2208, '13020170202', '2019-11-08', 'TM'),
(2209, '13020170202', '2019-11-09', 'TM'),
(2210, '13020170202', '2019-11-10', 'HTW'),
(2211, '13020170202', '2019-11-11', 'HTW'),
(2212, '13020170202', '2019-11-12', 'HTW'),
(2213, '13020170202', '2019-11-13', 'HTW'),
(2214, '13020170202', '2019-11-14', 'HTW'),
(2215, '13020170202', '2019-11-15', 'HTW'),
(2216, '13020170202', '2019-11-16', 'HTW'),
(2217, '13020170202', '2019-11-17', 'HTW'),
(2218, '13020170202', '2019-11-18', 'HTW'),
(2219, '13020170202', '2019-11-19', 'HTW'),
(2220, '13020170202', '2019-11-20', 'HTW'),
(2221, '13020170202', '2019-11-21', 'HTW'),
(2222, '13020170202', '2019-11-22', 'HTW'),
(2223, '13020170202', '2019-11-23', 'PSW'),
(2224, '13020170202', '2019-11-24', 'HTW'),
(2225, '13020170202', '2019-11-25', 'HTW'),
(2226, '13020170202', '2019-11-26', 'HTW'),
(2227, '13020170202', '2019-11-27', 'HTW'),
(2228, '13020170202', '2019-11-28', 'HTW'),
(2229, '13020170202', '2019-11-29', 'TK'),
(2230, '13020170202', '2019-11-30', 'HTW');

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `username` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `level` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`username`, `nama`, `level`, `password`) VALUES
('lasaiman', 'La Saiman', '1', '12345');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hedule`
--

CREATE TABLE `hedule` (
  `kd_sch` varchar(20) NOT NULL,
  `s_in` time NOT NULL,
  `s_out` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id_kyn` varchar(20) NOT NULL,
  `nama_kyn` varchar(30) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_tlp` varchar(15) NOT NULL,
  `status` varchar(20) NOT NULL,
  `foto` varchar(255) NOT NULL DEFAULT 'default.svg',
  `gender` enum('Laki-laki','Perempuan') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id_kyn`, `nama_kyn`, `tgl_lahir`, `jabatan`, `alamat`, `no_tlp`, `status`, `foto`, `gender`) VALUES
('13020170002', 'nando', '2019-11-01', 'anggota', '', '', '', '0911201910141749900082_740013009688610_8865745305711149056_n - Copy.jpg', 'Laki-laki'),
('13020170096', 'La Saiman', '1998-10-13', 'anggota', '', '', '', '11112019065944WhatsApp Image 2019-10-21 at 03.10.02 (1).jpeg', 'Laki-laki'),
('13020170101', 'ahmad', '2019-11-08', 'anggota', '', '', '', '1111201917073949900082_740013009688610_8865745305711149056_n.jpg', 'Laki-laki'),
('13020170202', 'risal', '2019-11-14', 'anggota', '', '0990909', '', '2611201917505349900082_740013009688610_8865745305711149056_n - Copy - Copy.jpg', 'Laki-laki');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tlg`
--

CREATE TABLE `tlg` (
  `tglup` datetime DEFAULT NULL,
  `no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tlg`
--

INSERT INTO `tlg` (`tglup`, `no`) VALUES
('2019-11-27 00:47:27', 1),
('2019-11-27 01:49:43', 2),
('2019-11-27 01:51:57', 3);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`id_absen`),
  ADD KEY `id_kyn` (`id_kyn`);

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_kyn`);

--
-- Indeks untuk tabel `tlg`
--
ALTER TABLE `tlg`
  ADD PRIMARY KEY (`no`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absen`
--
ALTER TABLE `absen`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2231;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `absen`
--
ALTER TABLE `absen`
  ADD CONSTRAINT `absen_ibfk_1` FOREIGN KEY (`id_kyn`) REFERENCES `karyawan` (`id_kyn`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
