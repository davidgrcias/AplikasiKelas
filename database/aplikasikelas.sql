-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2022 at 05:39 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aplikasikelas`
--

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `class` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `class`) VALUES
(0, 'XI MIPA'),
(28, 'XII RPL 1'),
(29, 'XII RPL 2'),
(30, 'XII OTKP'),
(31, 'XII AKL');

-- --------------------------------------------------------

--
-- Table structure for table `data_admin`
--

CREATE TABLE `data_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `notif` char(1) NOT NULL,
  `gallery` varchar(70) NOT NULL,
  `email` varchar(40) NOT NULL,
  `username` varchar(18) NOT NULL,
  `password` varchar(200) NOT NULL,
  `tanggal` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_admin`
--

INSERT INTO `data_admin` (`id`, `notif`, `gallery`, `email`, `username`, `password`, `tanggal`) VALUES
(0, 'y', 'noprofil.jpg', 'clay@gmail.com', 'clay', '$2y$10$vdR.xja0M1qrunDa7Goxquv3OMR4CitDkxuydMzawvXo1Hl0Qe/0q', '20 October 2022'),
(1, 'y', '6187405d5a6e0.jpg', 'david@gmail.com', 'davidgs', '$2y$10$u/udwf21hdwMhKAtlbC.HeROwTf8OZ5hh7zxD1OJEjFfz1Bj1M2Oa', '04 October 2021'),
(4, 'y', '6185fc75240b6.png', 'admin@gmail.com', 'admin', '$2y$10$Nfr9q9rMfb8nc0al/D6F.u4ylGr/OJj/y2uiqw53kMvmTJfezcBNW', '06 November 2021');

-- --------------------------------------------------------

--
-- Table structure for table `data_user`
--

CREATE TABLE `data_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `nisn` varchar(50) NOT NULL,
  `kelas` int(11) NOT NULL,
  `tanggallahir` varchar(50) NOT NULL,
  `studentimage` varchar(50) NOT NULL,
  `phonenumber` varchar(50) NOT NULL,
  `religion` varchar(50) NOT NULL,
  `age` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_user`
--

INSERT INTO `data_user` (`id`, `nama`, `email`, `nisn`, `kelas`, `tanggallahir`, `studentimage`, `phonenumber`, `religion`, `age`) VALUES
(1, 'Andrew', 'sd@gmail.com', '0051072410', 29, '2005-07-08', '634367188d70a.png', '12345678', 'Christian', 17),
(2, 'Arbian Kamil', 'jh@gmail.com', '0051030608', 29, '2005-03-19', '634367188d70a.png', '123456', 'Christian', 17),
(3, 'Ariel Susantio', '546@gmail.com', '0043652570', 29, '2005-10-27', '634367188d70a.png', '123456', 'Buddha', 16),
(4, 'Audrey Valencia Wijaya', '54wer6@gmail.com', '0052871391', 29, '2005-11-13', '634367188d70a.png', '12345634', 'Buddha', 16),
(5, 'Ayu Sutira', '54werws6@gmail.com', '0020737915', 29, '2002-03-06', '634367188d70a.png', '123456341', 'Islam', 20),
(6, 'Azerrin Putri Patricia', 'sdgh@gmail.com', '0057765542', 29, '2005-04-28', '634367188d70a.png', '34587654', 'Islam', 17),
(7, 'Chandra Wijaya', 'sdgh12@gmail.com', '0059734373', 29, '2005-05-24', '634367188d70a.png', '34587654876', 'Buddha', 17),
(8, 'Danniel', '133sdgh12@gmail.com', '0058381890', 29, '2005-01-22', '634367188d70a.png', '6543423456', 'Buddha', 17),
(9, 'Devon Audric Sutrisna', '123ergwe2@gmail.com', '0041613808', 29, '2004-07-31', '634367188d70a.png', '876521123', 'Christian', 18),
(10, 'Dicky Wibiansyah', '123ergvc@gmail.com', '0051853414', 29, '2005-05-29', '634367188d70a.png', '87652112768', 'Islam', 17),
(11, 'Hanson Villeneuve', '123ergv12345c@gmail.com', '0054156747', 29, '2005-02-06', '634367188d70a.png', '987654654', 'Christian', 17),
(12, 'Henry Salim', '123yuhgfdec@gmail.com', '0052814977', 29, '2005-01-20', '634367188d70a.png', '987654654', 'Buddha', 17),
(13, 'Ivan Kenedy', '1234566rd@gmail.com', '0024227478', 29, '2005-10-29', '634367188d70a.png', '876543345', 'Christian', 16),
(14, 'Iyan Rosyadi', '1234561sde6rd@gmail.com', '0044956208', 29, '2004-11-24', '634367188d70a.png', '092345623', 'Islam', 17),
(15, 'Jessica Wijaya', 'amel123@gmail.com', '0054429046', 29, '2005-10-18', '634367188d70a.png', '08325427312', 'Christian', 16),
(16, 'Jhezarie Polanda Damanis', 'amel123vfd@gmail.com', '0052495512', 29, '2005-10-18', '634367188d70a.png', '08325456', 'Christian', 16),
(17, 'Jonathan Antonius', 'amel123gfsfgvfd@gmail.com', '0051296217', 29, '2005-03-27', '634367188d70a.png', '08325456', 'Christian', 17),
(18, 'Julius Ferdinand', '123erg@gmail.com', '0053134417', 29, '2005-07-06', '634367188d70a.png', '08325456', 'Christian', 17),
(19, 'Koeserah Esmild', '123e23erg@gmail.com', '0052895302', 29, '2005-09-19', '634367188d70a.png', '0832545623', 'Christian', 17),
(20, 'Kerin Trivena', '123e232eerg@gmail.com', '0055616898', 29, '2005-06-03', '634367188d70a.png', '0832545623', 'Christian', 17),
(21, 'Maharani Aprilia', '123e25678rg@gmail.com', '0058297407', 29, '2005-04-20', '634367188d70a.png', '0832545623', 'Buddha', 17),
(22, 'Michael Pohan', 'asddf@gmail.com', '0057355225', 29, '2005-04-12', '634367188d70a.png', '0832545623', 'Buddha', 17),
(23, 'Nicholas Susanto', 'as12345ddf@gmail.com', '0052793655', 29, '2005-09-01', '634367188d70a.png', '0832545623', 'Christian', 17),
(24, 'Ryu Nathan Nicholas', 'jhgrewty4@gmail.com', '3053788954', 29, '2005-07-18', '634367188d70a.png', '0832545623', 'Buddha', 17),
(25, 'Steven Widjaja', 'jhgre3rwty4@gmail.com', '0046017901', 29, '2005-11-01', '634367188d70a.png', '0832545623', 'Buddha', 16),
(26, 'Tommy Yogia', '32j34r3k2we@gmail.com', '0057764021', 29, '2005-08-01', '634367188d70a.png', '0832545623', 'Buddha', 17),
(27, 'Yuliana', 'iorewqwdf@gmail.com', '0047810957', 29, '2004-04-23', '634367188d70a.png', '0832545623', 'Buddha', 18),
(28, 'Andi Hiangkidinata Mongkareng', 'andi@gmail.com', '0041710619', 28, '2004-09-14', '634367188d70a.png', '09876543489', 'Confucianism', 18),
(29, 'Ardelia Jocelyn', 'ardelia@gmail.com', '3057123359', 28, '2005-04-20', '634367188d70a.png', '8765456987643', 'Buddha', 17),
(30, 'Cecilya', 'cecilya@gmail.com', '0050875150', 28, '2005-10-02', '634367188d70a.png', '987656789', 'Buddha', 17),
(31, 'Charisse Evania Tansir', 'charisse@gmail.com', '0046512764', 28, '2004-12-02', '634367188d70a.png', '0976543456789', 'Buddha', 17),
(32, 'David Garcia Saragih', 'david@gmail.com', '0059822213', 28, '2005-09-13', '634367188d70a.png', '09976446789', 'Christian', 17),
(33, 'Ellisyia Stevanie', 'ellisyia@gmail.com', '0060134474', 28, '2006-01-08', '634367188d70a.png', '09876556789', 'Buddha', 16),
(34, 'Evangeline Audrey Kartawahyudi', 'eva@gmail.com', '0060074660', 28, '2006-01-18', '634367188d70a.png', '09876512345', 'Christian', 16),
(35, 'Felicia Natasha Pratama', 'felicia@gmail.com', '0051352517', 28, '2005-12-26', '634367188d70a.png', '98765445678', 'Buddha', 16),
(36, 'Fedinan', 'ferdinan@gmail.com', '0059268314', 28, '2005-08-18', '634367188d70a.png', '98765445678', 'Buddha', 17),
(37, 'Hendy Tandika', 'hendy@gmail.com', '0051296264', 28, '2005-10-25', '634367188d70a.png', '368900765', 'Christian', 16),
(38, 'James Wilson Lie', 'james@gmail.com', '0058610153', 28, '2005-01-11', '634367188d70a.png', '5678996556', 'Buddha', 17),
(39, 'Janssen Addison', 'janssen@gmail.com', '0052495452', 28, '2005-02-25', '634367188d70a.png', '5678900987654', 'Christian', 17),
(40, 'Jap Zavier Juvenilh', 'jap@gmail.com', '0054903768', 28, '2005-06-10', '634367188d70a.png', '456890987654', 'Christian', 17),
(41, 'Jessica Christianti', 'jessica@gmail.com', '0051794294', 28, '2005-06-21', '634367188d70a.png', '45678986', 'Christian', 17),
(42, 'Jonathan Benaya Suwilis', 'jonathan@gmail.com', '0059061784', 28, '2005-06-01', '634367188d70a.png', '45678986890', 'Christian', 17),
(43, 'Keila Marie Setiawan', 'keila@gmail.com', '0054767885', 28, '2005-05-31', '634367188d70a.png', '456789868909889', 'Christian', 17),
(44, 'Leonardo Setiawan', 'leo@gmail.com', '0055063702', 28, '2005-03-15', '634367188d70a.png', '786789090876', 'Christian', 17),
(45, 'Michelle Vanezya Lim', 'michelle@gmail.com', '0058172976', 28, '2005-12-07', '634367188d70a.png', '78678909087678', 'Buddha', 16),
(46, 'Neisha Falensya', 'neisha@gmail.com', '0057681487', 28, '2005-08-13', '634367188d70a.png', '7867890908767890', 'Buddha', 17),
(47, 'Nico Andreas', 'nico@gmail.com', '0058545089', 28, '2005-07-11', '634367188d70a.png', '5787980989', 'Christian', 17),
(48, 'Reynald Fedhericco', 'rey@gmail.com', '0045815176', 28, '2004-05-06', '634367188d70a.png', '9087980989', 'Christian', 18),
(49, 'Richard Lee', 'richard@gmail.com', '0051296224', 28, '2005-04-17', '634367188d70a.png', '908798098998', 'Buddha', 17),
(50, 'Richie Chuandrawinata', 'richie@gmail.com', '0052037188', 28, '2005-10-03', '634367188d70a.png', '809766678', 'Buddha', 17),
(51, 'Salim Raihan', 'salim@gmail.com', '0067174504', 28, '2005-06-15', '634367188d70a.png', '8097666789000', 'Islam', 17),
(52, 'Shela Tifa Pramono', 'shela@gmail.com', '0052834975', 28, '2005-01-10', '634367188d70a.png', '8097666789002', 'Islam', 17),
(53, 'Steaven', 'steaven@gmail.com', '0067095865', 28, '2006-01-17', '634367188d70a.png', '8097666789005', 'Buddha', 16),
(54, 'Steven Sebastian', 'steven@gmail.com', '0060050081', 28, '2006-01-22', '634367188d70a.png', '8097666789009', 'Buddha', 16),
(55, 'Timotius Avaro Andrelo Putra', 'timo@gmail.com', '0051296220', 28, '2005-04-01', '634367188d70a.png', '80976667893939', 'Christian', 17),
(56, 'Vincent Sutanto', 'vincent@gmail.com', '0050990023', 28, '2005-11-21', '634367188d70a.png', '8764578908767', 'Christian', 16),
(57, 'William', 'william@gmail.com', '0056207846', 28, '2005-11-19', '634367188d70a.png', '87645789087690', 'Christian', 16),
(58, 'Yehezkiel Natanael', 'yehezkiel@gmail.com', '0052895284', 28, '2005-06-25', '634367188d70a.png', '87645789087619', 'Christian', 17),
(59, 'Yoga Hose Tambunan', 'yoga@gmail.com', '0054693262', 28, '2005-08-08', '634367188d70a.png', '87645789087609876', 'Christian', 17),
(60, 'Kerin Trivena', 'kerintrivena@gmail.com', '0055616898', 31, '2005-06-03', '63475b2751bd8.jpeg', '081206678934', 'Christian', 17),
(61, 'Kevin Leo Dhammiko Saputra', 'kevin.lds@gmail.com', '0051758469', 31, '2005-08-12', '63475b2751bd8.jpeg', '088190653488', 'Buddha', 17),
(62, 'Kezia Juliana Devinca', 'keziajuliana.d@gmail.com', '0055015155', 31, '2005-06-10', '63475b2751bd8.jpeg', '089857782098', 'Christian', 17),
(63, 'Khessia Arteja', 'khessiaarteja@gmail.com', '0058753611', 31, '2005-01-09', '63475b2751bd8.jpeg', '087639906700', 'Christian', 17),
(64, 'Lorencia Meiliana Putra', 'lorenciameiliana.p@gmail.com', '0052589255', 31, '2005-05-07', '63475b2751bd8.jpeg', '081340050450', 'Buddha', 17),
(65, 'Marcellino', 'marcellino@gmail.com', '0055231517', 31, '2005-09-24', '63475b2751bd8.jpeg', '089704457722', 'Christian', 17),
(66, 'Marsela', 'marsela@gmail.com', '0046017929', 31, '2005-10-17', '63475b2751bd8.jpeg', '081467380967', 'Islam', 16),
(67, 'Marvin Luckianto', 'marvinluckianto@gmail.com', '0051291367', 31, '2005-09-26', '63475b2751bd8.jpeg', '081467380967', 'Buddha', 17),
(68, 'Nadia Aprilia', 'nadiaaprilia@gmail.com', '0052495468', 31, '2005-04-26', '63475b2751bd8.jpeg', '081467380967', 'Islam', 17),
(69, 'Nancy Angelina', 'nancyangelina@gmail.com', '0059855988', 31, '2005-05-27', '63475b2751bd8.jpeg', '081467380967', 'Buddha', 17),
(70, 'Riska Amelia', 'riskaamelia@gmail.com', '0046017940', 31, '2004-12-01', '63475b2751bd8.jpeg', '081467380967', 'Islam', 17),
(71, 'Ronald Ramlian', 'ronaldramlian@gmail.com', '3056726521', 31, '2005-12-18', '63475b2751bd8.jpeg', '081467380967', 'Buddha', 16),
(72, 'Sri Kusnaeni', 'srikusnaeni@gmail.com', '0046017899', 31, '2004-03-06', '63475b2751bd8.jpeg', '081467380967', 'Islam', 18),
(73, 'Stefanny', 'stefanny@gmail.com', '0051030616', 31, '2005-05-13', '63475b2751bd8.jpeg', '081467380967', 'Buddha', 17),
(74, 'Styven Edricsen', 'styvenedricsen@gmail.com', '0051030629', 31, '2005-09-25', '63475b2751bd8.jpeg', '081467380967', 'Buddha', 17),
(75, 'Tan Meyli', 'tanmeyli@gmail.com', '0052495453', 31, '2005-03-02', '63475b2751bd8.jpeg', '081467380967', 'Buddha', 17),
(76, 'Vinson Afin Herzavian', 'vinsonafin.h@gmail.com', '0052495481', 31, '2005-07-22', '63475b2751bd8.jpeg', '081467380967', 'Islam', 17),
(77, 'Alvin Predinata', 'alvin@gmail.com', '0046017922', 31, '2004-09-18', '63475c901d1b0.jpg', '0123456789', 'Buddha', 18),
(78, 'Angelanda', 'angelanda@gmail.com', '0044894787', 31, '2004-12-12', '63475c901d1b0.jpg', '0123456789', 'Islam', 17),
(79, 'Annisa Safitri', 'annisa@gmail.com', '0059662877', 31, '2005-05-02', '63475c901d1b0.jpg', '0123456789', 'Islam', 17),
(80, 'Arnold Rafael Tanamal', 'arnold@gmail.com', '0052495473', 31, '2005-05-24', '63475c901d1b0.jpg', '0123456789', 'Buddha', 17),
(81, 'Bella Tanara', 'bella@gmail.com', '0052495513', 31, '2005-10-26', '63475c901d1b0.jpg', '0123456789', 'Christian', 16),
(82, 'Caren Vidia Estevan', 'caren@gmail.com', '3055774428', 31, '2006-06-05', '63475c901d1b0.jpg', '0123456789', 'Christian', 16),
(83, 'Caroline Homan', 'caronline@gmail.com', '0051337657', 31, '2005-09-15', '63475c901d1b0.jpg', '0123456789', 'Christian', 17),
(84, 'Dennis Aaron', 'dennis@gmail.com', '3050353497', 31, '2005-02-14', '63475c901d1b0.jpg', '0123456789', 'Christian', 17),
(85, 'Dian Natasha', 'dian@gmail.com', '0050752563', 31, '2005-05-18', '63475c901d1b0.jpg', '0123456789', 'Christian', 17),
(86, 'Dimas Wiguna Saputra', 'dimas@gmail.com', '0041670663', 31, '2004-06-25', '63475c901d1b0.jpg', '0123456789', 'Islam', 18),
(87, 'Elysa Ummul Azizah', 'elysa@gmail.com', '0055808004', 31, '2005-04-15', '63475c901d1b0.jpg', '0123456789', 'Islam', 17),
(88, 'Evelyn Amanda', 'evelyn@gmail.com', '0054899448', 31, '2005-01-04', '63475c901d1b0.jpg', '0123456789', 'Christian', 17),
(89, 'Friska Aurelia', 'friska@gmail.com', '0042729906', 31, '2004-12-16', '63475c901d1b0.jpg', '0123456789', 'Christian', 17),
(90, 'Friskila Abelia Sitompul', 'friskila@gmail.com', '0058774844', 31, '2005-07-02', '63475c901d1b0.jpg', '0123456789', 'Islam', 17),
(91, 'Hayyallah Fajarrani Ramora', 'hayyallah@gmail.com', '0052495446', 31, '2005-01-27', '63475c901d1b0.jpg', '0123456789', 'Islam', 17),
(92, 'Jessica Siemen', 'jessica@gmail.com', '0052267180', 31, '2005-07-04', '63475c901d1b0.jpg', '0123456789', 'Buddha', 17),
(93, 'Jesslyn Ariella', 'jesslyn@gmail.com', '0052333008', 31, '2005-02-18', '63475c901d1b0.jpg', '0123456789', 'Buddha', 17),
(94, 'Alexa Vega Aurellya', 'alexa@gmail.com', '51385306', 30, '2005-09-10', '634367188d70a.png', '082571895504', 'Christian', 17),
(95, 'Amanda Yuliarti', 'amanda@gmail.com', '52495456', 30, '2005-03-20', '634367188d70a.png', '081375860485', 'Islam', 17),
(96, 'Amelia Putri Renita', 'amelia@gmail.com', '59207325', 30, '2005-06-10', '634367188d70a.png', '083898473822', 'Islam', 17),
(97, 'Bismillah Haidari', 'bismillah@gmail.com', '51937547', 30, '2003-01-01', '634367188d70a.png', '083898473822', 'Islam', 19),
(98, 'Cherika Permata Avi', 'cherika@gmail.com', '41791779', 30, '2004-03-23', '634367188d70a.png', '083898473822', 'Islam', 18),
(99, 'Della Safitri', 'della@gmail.com', '35697509', 30, '2003-12-02', '634367188d70a.png', '083898473822', 'Islam', 18),
(100, 'Devano Randhy Wijaya', 'devano@gmail.com', '46017946', 30, '2004-12-17', '634367188d70a.png', '083898473822', 'Islam', 17),
(101, 'Dewi Sartika', 'dewi@gmail.com', '3045333164', 30, '2004-05-24', '634367188d70a.png', '083898473822', 'Islam', 18),
(102, 'Devi Lestari', 'devi@gmail.com', '46017942', 30, '2004-12-11', '634367188d70a.png', '083898473822', 'Islam', 17),
(103, 'Endin Fahrudin', 'endin@gmail.com', '46017925', 30, '2004-01-26', '634367188d70a.png', '083898473822', 'Islam', 18),
(104, 'Firman Nurzaman', 'firman@gmail.com', '45374083', 30, '2004-04-12', '634367188d70a.png', '083898473822', 'Islam', 18),
(105, 'Gibran Ramadan', 'gibran@gmail.com', '46017936', 30, '2004-10-19', '634367188d70a.png', '083898473822', 'Islam', 17),
(106, 'Indra Wijaya', 'indra@gmail.com', '24716237', 30, '2002-09-07', '634367188d70a.png', '083898473822', 'Islam', 20),
(107, 'Innayahtun', 'innayahtun@gmail.com', '44082093', 30, '2004-09-07', '634367188d70a.png', '082327829185', 'Islam', 18),
(108, 'Islami Jibril Khadafi', 'islami@gmail.com', '51977562', 30, '2005-09-25', '634367188d70a.png', '082327829185', 'Islam', 17),
(109, 'Makbul Riyadi', 'makbul@gmail.com', '38206675', 30, '2003-09-22', '634367188d70a.png', '082327829185', 'Islam', 19),
(110, 'Maria Angelia', 'maria@gmail.com', '53306406', 30, '2004-03-25', '634367188d70a.png', '082327829185', 'Christian', 18),
(111, 'Mohammad Saiful Anwar', 'saiful@gmail.com', '30872586', 30, '2003-05-19', '634367188d70a.png', '082327829185', 'Islam', 19),
(112, 'Muammar Khadafi', 'muammar@gmail.com', '52495445', 30, '2005-01-23', '634367188d70a.png', '082327829185', 'Islam', 17),
(113, 'Muhamad Nazar', 'nazar@gmail.com', '30872592', 30, '2003-06-05', '634367188d70a.png', '082327829185', 'Islam', 19),
(114, 'Muhammad Kevin Al Ichsan', 'kevin@gmail.com', '46017926', 30, '2004-09-29', '634367188d70a.png', '082327829185', 'Islam', 18),
(115, 'Nasya Fatimatuz Zahra', 'nasya@gmail.com', '52495439', 30, '2005-01-01', '634367188d70a.png', '082327829185', 'Islam', 17),
(116, 'Pingkan Osellita Putri', 'pingkan@gmail.com', '52213319', 30, '2005-11-24', '634367188d70a.png', '082327829185', 'Christian', 16),
(118, 'Putri Salma', 'putri@gmail.com', '30872588', 30, '2003-05-25', '634367188d70a.png', '082327829185', 'Islam', 19),
(119, 'Rendhi Ardiansyah', 'rendhi@gmail.com', '51042278', 30, '2005-11-06', '634367188d70a.png', '082327829185', 'Islam', 16),
(120, 'Sari Patika', 'sari@gmail.com', '35697488', 30, '2003-09-13', '634367188d70a.png', '082327829185', 'Islam', 19),
(121, 'Selvie Dwiyanti', 'selvie@gmail.com', '57232904', 30, '2005-09-28', '634367188d70a.png', '082327829185', 'Islam', 17),
(122, 'Sherly Novie Liana', 'sherly@gmail.com', '42802261', 30, '2004-10-18', '634367188d70a.png', '082327829185', 'Islam', 17),
(123, 'Siti Amelia', 'siti@gmail.com', '3028042611', 30, '2002-05-17', '634367188d70a.png', '082327829185', 'Islam', 20),
(124, 'Siti Mardhiyah', 'dhiyah@gmail.com', '46017921', 30, '2004-09-16', '634367188d70a.png', '082327829185', 'Islam', 18),
(125, 'Tria Ananta', 'tria@gmail.com', '46017944', 30, '2004-12-13', '634367188d70a.png', '082327829185', 'Islam', 17),
(126, 'Zecika Fitriyani', 'zecika@gmail.com', '28475006', 30, '2002-10-30', '634367188d70a.png', '082327829185', 'Islam', 19);

-- --------------------------------------------------------

--
-- Table structure for table `lessonschedule`
--

CREATE TABLE `lessonschedule` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `day` varchar(50) NOT NULL,
  `timestart` varchar(100) NOT NULL,
  `timeend` varchar(100) NOT NULL,
  `class` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lessonschedule`
--

INSERT INTO `lessonschedule` (`id`, `name`, `day`, `timestart`, `timeend`, `class`) VALUES
(4, 'Baba', '3', '08:30', '09:00', 31),
(5, 'Bahasa Inggris', '1', '08:00', '08:30', 29);

-- --------------------------------------------------------

--
-- Table structure for table `utama`
--

CREATE TABLE `utama` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `logo2` varchar(30) NOT NULL,
  `copyright` varchar(130) NOT NULL,
  `studentimage` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `utama`
--

INSERT INTO `utama` (`id`, `nama`, `logo2`, `copyright`, `studentimage`) VALUES
(1, 'Aplikasi Kelas', '635213a6d4148.png', '2022 by SMK Cinta Kasih Tzu Chi', '63509dc2b4566.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `data_admin`
--
ALTER TABLE `data_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_user`
--
ALTER TABLE `data_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lessonschedule`
--
ALTER TABLE `lessonschedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utama`
--
ALTER TABLE `utama`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_user`
--
ALTER TABLE `data_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `lessonschedule`
--
ALTER TABLE `lessonschedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `utama`
--
ALTER TABLE `utama`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
