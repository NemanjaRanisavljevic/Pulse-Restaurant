-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2019 at 11:40 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restoranlaravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `aktivnost`
--

CREATE TABLE `aktivnost` (
  `idAktivnost` int(11) NOT NULL,
  `poruka` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `datum` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `korisnikId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `aktivnost`
--

INSERT INTO `aktivnost` (`idAktivnost`, `poruka`, `datum`, `korisnikId`) VALUES
(2, 'Logovanje', '2019-03-10 11:02:40', 4),
(3, 'Logout', '2019-03-10 11:06:49', 4),
(4, 'Logovanje', '2019-03-10 11:07:02', 4),
(5, 'Korisnik uneo utisak', '2019-03-10 11:14:38', 4),
(6, 'Logout', '2019-03-10 11:46:27', 4),
(7, 'Logovanje', '2019-03-10 11:46:32', 4),
(8, 'Logout', '2019-03-10 11:46:35', 4),
(9, 'Logovanje', '2019-03-12 16:44:46', 4),
(10, 'Logout', '2019-03-12 16:45:46', 4),
(12, 'Korisnik uneo utisak', '2019-03-12 17:41:30', 4),
(13, 'Logovanje', '2019-03-12 20:41:40', 4),
(14, 'Logout', '2019-03-12 20:55:48', 4),
(15, 'Logovanje', '2019-03-12 20:55:52', 4),
(16, 'Logovanje', '2019-03-13 14:08:37', 4),
(17, 'Logout', '2019-03-13 15:29:22', 4),
(18, 'Logovanje', '2019-03-13 15:31:58', 4),
(19, 'Logout', '2019-03-13 15:32:01', 4),
(20, 'Logovanje', '2019-03-13 15:32:11', 4),
(21, 'Logout', '2019-03-13 15:32:17', 4),
(22, 'Registracija', '2019-03-13 15:32:39', 6),
(23, 'Logovanje', '2019-03-13 15:46:59', 4),
(24, 'Logout', '2019-03-13 15:49:51', 4),
(27, 'Registracija', '2019-03-13 16:16:50', 11),
(28, 'Logovanje', '2019-03-13 16:17:35', 11),
(29, 'Logout', '2019-03-13 16:50:44', 11),
(30, 'Logovanje', '2019-03-13 16:50:53', 4),
(31, 'Logovanje', '2019-03-13 18:33:10', 4);

-- --------------------------------------------------------

--
-- Table structure for table `citat`
--

CREATE TABLE `citat` (
  `idCitat` int(11) NOT NULL,
  `sadrzaj` text COLLATE utf8_unicode_ci NOT NULL,
  `korisnikId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `citat`
--

INSERT INTO `citat` (`idCitat`, `sadrzaj`, `korisnikId`) VALUES
(5, 'Juce sam posetio vas resotran i mogu reci da vam je usluga izvrsna. A hrana preukusna.', 4),
(9, 'Preporucujem rebarca u BBQ sosu. Izvrsno spremljeno. Sve pohvale.', 4),
(10, 'Izvrsna jela i preukusna. Slobno uzmite pola porcije obilne su.', 4);

-- --------------------------------------------------------

--
-- Table structure for table `jelovnik`
--

CREATE TABLE `jelovnik` (
  `idJelovnik` int(11) NOT NULL,
  `imeJela` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sastojci` text COLLATE utf8_unicode_ci NOT NULL,
  `cena` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `obrokId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `jelovnik`
--

INSERT INTO `jelovnik` (`idJelovnik`, `imeJela`, `sastojci`, `cena`, `obrokId`) VALUES
(1, 'Scrambled Eggs with ham', 'jaja, sunka, kobaja', '9', 3),
(2, 'Peceno pile', 'pile sunka', '10', 4),
(3, 'Pecenje', 'prase', '20', 4),
(4, 'Skampi', 'Plodovi mora, svezi skampi', '500', 6),
(5, 'Teleca corba', 'Junetina, povrce, zacini', '250', 6),
(7, 'Pecenje', 'prase', '20', 4),
(8, 'Pecenje', 'prase', '200', 4);

-- --------------------------------------------------------

--
-- Table structure for table `kategorijaposta`
--

CREATE TABLE `kategorijaposta` (
  `idKategorija` int(11) NOT NULL,
  `naziv` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kategorijaposta`
--

INSERT INTO `kategorijaposta` (`idKategorija`, `naziv`) VALUES
(1, 'Vegansko'),
(2, 'Meso & BBQ'),
(5, 'Specijaliteti Kuce');

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `idKorisnik` int(11) NOT NULL,
  `ime` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prezime` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sifra` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `datum_registracije` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `aktivan` bit(1) NOT NULL DEFAULT b'0',
  `ulogaId` int(11) NOT NULL,
  `polId` int(11) NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`idKorisnik`, `ime`, `prezime`, `email`, `sifra`, `datum_registracije`, `aktivan`, `ulogaId`, `polId`, `token`) VALUES
(4, 'Nemanja', 'Ranisavljevic', 'beka9977@gmail.com', '7a6ac7cbfcd01b3c5dc63b35bfd57ea4', '2019-03-04 13:20:17', b'1', 2, 1, NULL),
(6, 'Nenad', 'Ranisavljevic', 'nenad@gmail.com', '1081114d15d634b5785540809ea0c98c', '2019-03-13 15:32:39', b'0', 1, 1, '4a486445d4c74a442f7697df8c68c8d2'),
(11, 'Verica', 'Ranisavljevic', 'nemanjabeka97@gmail.com', '4b72e1d9039f10e3d56bf7d89991a047', '2019-03-13 16:16:48', b'1', 1, 2, '980facfb6cbcdf037bd24a0c67109a46');

-- --------------------------------------------------------

--
-- Table structure for table `meni`
--

CREATE TABLE `meni` (
  `idMeni` int(11) NOT NULL,
  `naslov` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `putanja` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `roditelj` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `obrok`
--

CREATE TABLE `obrok` (
  `idObrok` int(11) NOT NULL,
  `naziv` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `opis` text COLLATE utf8_unicode_ci NOT NULL,
  `pocetak` int(11) NOT NULL,
  `kraj` int(11) NOT NULL,
  `ikonica` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `obrok`
--

INSERT INTO `obrok` (`idObrok`, `naziv`, `opis`, `pocetak`, `kraj`, `ikonica`) VALUES
(3, 'Dorucak', 'Ako želite zdravo da se hranite, pre svega morate da imate zdrav doručak, jer je to svakako najvažniji obrok u svakodnevnoj ishrani.', 7, 10, 'flaticon-005-coffee-1'),
(4, 'Brunch', 'Preskočili ste doručak, ali je još rano za ručak, a ne biste ni da užinate..hmm, a možda ste za brunch?', 10, 14, 'flaticon-013-salad'),
(5, 'Rucak', 'Zelite ukusan visoko kalorican obrok da vam pruzi energiju za preostali deo dana? ', 14, 17, 'flaticon-008-soup'),
(6, 'Vecera', 'Zelite laganu romanticnu veceru sa voljenom osobom uz lagane melodije akusticne muzike.', 17, 23, 'flaticon-018-lobster');

-- --------------------------------------------------------

--
-- Table structure for table `pice`
--

CREATE TABLE `pice` (
  `idPice` int(11) NOT NULL,
  `nazivPica` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cena` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sastojci` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pice`
--

INSERT INTO `pice` (`idPice`, `nazivPica`, `cena`, `sastojci`) VALUES
(1, 'Coca-cola', '220', 'voda, secer, boja'),
(2, 'Scrambled Eggs with ham', '110', 'Voce povrce'),
(3, 'Pepsi', '100', 'Secer susam'),
(4, 'Limunda', '140', 'limun, nana, voda, secer'),
(5, 'Cedjena Narandja', '220', 'narandja, voda'),
(6, 'Sardone', '300', 'vino');

-- --------------------------------------------------------

--
-- Table structure for table `pol`
--

CREATE TABLE `pol` (
  `idPol` int(11) NOT NULL,
  `naziv` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pol`
--

INSERT INTO `pol` (`idPol`, `naziv`) VALUES
(1, 'Muski'),
(2, 'Zenski');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `idPost` int(11) NOT NULL,
  `naslov` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `opis` text COLLATE utf8_unicode_ci NOT NULL,
  `vreme` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `kategorijaId` int(11) NOT NULL,
  `korisnikId` int(11) NOT NULL,
  `slikaId` int(11) NOT NULL,
  `komentarId` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`idPost`, `naslov`, `opis`, `vreme`, `kategorijaId`, `korisnikId`, `slikaId`, `komentarId`) VALUES
(4, 'Pubg sada mozete igrati i na Pc', 'Uskono je vrh vrh vr sads d', '2019-03-08 15:09:29', 2, 4, 9, 0),
(5, 'Jedi ovo brallleeee', 'Mnogo zdravo brallleeee', '2019-03-08 15:19:30', 1, 4, 10, 0),
(6, 'Jedi salate braleeee', 'Brale samo salate brale', '2019-03-08 17:43:25', 1, 4, 11, 0),
(8, 'Jedi ovo brallleeee', 'Jedi ovo brallleeee', '2019-03-09 15:54:34', 1, 4, 13, 0),
(9, 'Naslov je ovo', 'Planine su to', '2019-03-12 20:48:42', 1, 4, 14, 0);

-- --------------------------------------------------------

--
-- Table structure for table `rezervacija`
--

CREATE TABLE `rezervacija` (
  `idRezervacija` int(11) NOT NULL,
  `datum_rezervacije` date NOT NULL,
  `brojOsoba` int(11) NOT NULL,
  `korisnikId` int(11) NOT NULL,
  `vremeId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `slikaposta`
--

CREATE TABLE `slikaposta` (
  `idSlika` int(11) NOT NULL,
  `putanja` text COLLATE utf8_unicode_ci NOT NULL,
  `alt` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `slikaposta`
--

INSERT INTO `slikaposta` (`idSlika`, `putanja`, `alt`) VALUES
(8, 'img/1552053465_1552053465_2.jpg', 'Pubg sada mozete igrati i na Pc'),
(9, '1552054169_2.jpg', 'Pubg sada mozete igrati i na Pc'),
(10, '1552054770_3.jpg', 'Jedi ovo brallleeee'),
(11, '1552063405_3.jpg', 'Jedi salate braleeee'),
(12, '1552137625_Penguins.jpg', 'Radi kao satic'),
(13, '1552143274_Tulips.jpg', 'Jedi ovo brallleeee'),
(14, '1552420122_Desert.jpg', 'Naslov je ovo');

-- --------------------------------------------------------

--
-- Table structure for table `uloga`
--

CREATE TABLE `uloga` (
  `idUloga` int(11) NOT NULL,
  `naziv` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `uloga`
--

INSERT INTO `uloga` (`idUloga`, `naziv`) VALUES
(1, 'Korisnik'),
(2, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `vremerezervacije`
--

CREATE TABLE `vremerezervacije` (
  `idVreme` int(11) NOT NULL,
  `vreme` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `vremerezervacije`
--

INSERT INTO `vremerezervacije` (`idVreme`, `vreme`) VALUES
(45, '7:00'),
(46, '7:30'),
(47, '8:00'),
(48, '8:30'),
(49, '9:00'),
(50, '9:30'),
(51, '10:00'),
(52, '10:30'),
(53, '11:00'),
(54, '11:30'),
(55, '12:00'),
(56, '12:30'),
(57, '13:00'),
(58, '13:30'),
(59, '14:00'),
(60, '14:30'),
(61, '15:00'),
(62, '15:30'),
(63, '16:00'),
(64, '16:30'),
(65, '17:00'),
(66, '17:30'),
(67, '18:00'),
(68, '18:30'),
(69, '19:00'),
(70, '19:30'),
(71, '20:00'),
(72, '20:30'),
(73, '21:00'),
(74, '21:30'),
(75, '22:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aktivnost`
--
ALTER TABLE `aktivnost`
  ADD PRIMARY KEY (`idAktivnost`),
  ADD KEY `korisnikId` (`korisnikId`);

--
-- Indexes for table `citat`
--
ALTER TABLE `citat`
  ADD PRIMARY KEY (`idCitat`),
  ADD KEY `korisnikId` (`korisnikId`);

--
-- Indexes for table `jelovnik`
--
ALTER TABLE `jelovnik`
  ADD PRIMARY KEY (`idJelovnik`),
  ADD KEY `obrokId` (`obrokId`);

--
-- Indexes for table `kategorijaposta`
--
ALTER TABLE `kategorijaposta`
  ADD PRIMARY KEY (`idKategorija`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`idKorisnik`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `ulogaId` (`ulogaId`),
  ADD KEY `polId` (`polId`);

--
-- Indexes for table `meni`
--
ALTER TABLE `meni`
  ADD PRIMARY KEY (`idMeni`);

--
-- Indexes for table `obrok`
--
ALTER TABLE `obrok`
  ADD PRIMARY KEY (`idObrok`);

--
-- Indexes for table `pice`
--
ALTER TABLE `pice`
  ADD PRIMARY KEY (`idPice`);

--
-- Indexes for table `pol`
--
ALTER TABLE `pol`
  ADD PRIMARY KEY (`idPol`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`idPost`),
  ADD KEY `kategorijaId` (`kategorijaId`),
  ADD KEY `korisnikId` (`korisnikId`),
  ADD KEY `slikaId` (`slikaId`),
  ADD KEY `komentarId` (`komentarId`);

--
-- Indexes for table `rezervacija`
--
ALTER TABLE `rezervacija`
  ADD PRIMARY KEY (`idRezervacija`),
  ADD KEY `korisnikId` (`korisnikId`),
  ADD KEY `vremeId` (`vremeId`);

--
-- Indexes for table `slikaposta`
--
ALTER TABLE `slikaposta`
  ADD PRIMARY KEY (`idSlika`);

--
-- Indexes for table `uloga`
--
ALTER TABLE `uloga`
  ADD PRIMARY KEY (`idUloga`);

--
-- Indexes for table `vremerezervacije`
--
ALTER TABLE `vremerezervacije`
  ADD PRIMARY KEY (`idVreme`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aktivnost`
--
ALTER TABLE `aktivnost`
  MODIFY `idAktivnost` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `citat`
--
ALTER TABLE `citat`
  MODIFY `idCitat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `jelovnik`
--
ALTER TABLE `jelovnik`
  MODIFY `idJelovnik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kategorijaposta`
--
ALTER TABLE `kategorijaposta`
  MODIFY `idKategorija` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `idKorisnik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `meni`
--
ALTER TABLE `meni`
  MODIFY `idMeni` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `obrok`
--
ALTER TABLE `obrok`
  MODIFY `idObrok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pice`
--
ALTER TABLE `pice`
  MODIFY `idPice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pol`
--
ALTER TABLE `pol`
  MODIFY `idPol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `idPost` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `rezervacija`
--
ALTER TABLE `rezervacija`
  MODIFY `idRezervacija` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `slikaposta`
--
ALTER TABLE `slikaposta`
  MODIFY `idSlika` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `uloga`
--
ALTER TABLE `uloga`
  MODIFY `idUloga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vremerezervacije`
--
ALTER TABLE `vremerezervacije`
  MODIFY `idVreme` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aktivnost`
--
ALTER TABLE `aktivnost`
  ADD CONSTRAINT `aktivnost_ibfk_1` FOREIGN KEY (`korisnikId`) REFERENCES `korisnik` (`idKorisnik`);

--
-- Constraints for table `citat`
--
ALTER TABLE `citat`
  ADD CONSTRAINT `citat_ibfk_1` FOREIGN KEY (`korisnikId`) REFERENCES `korisnik` (`idKorisnik`);

--
-- Constraints for table `jelovnik`
--
ALTER TABLE `jelovnik`
  ADD CONSTRAINT `jelovnik_ibfk_1` FOREIGN KEY (`obrokId`) REFERENCES `obrok` (`idObrok`);

--
-- Constraints for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD CONSTRAINT `korisnik_ibfk_1` FOREIGN KEY (`polId`) REFERENCES `pol` (`idPol`),
  ADD CONSTRAINT `korisnik_ibfk_2` FOREIGN KEY (`ulogaId`) REFERENCES `uloga` (`idUloga`);

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`slikaId`) REFERENCES `slikaposta` (`idSlika`),
  ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`kategorijaId`) REFERENCES `kategorijaposta` (`idKategorija`),
  ADD CONSTRAINT `post_ibfk_3` FOREIGN KEY (`korisnikId`) REFERENCES `korisnik` (`idKorisnik`);

--
-- Constraints for table `rezervacija`
--
ALTER TABLE `rezervacija`
  ADD CONSTRAINT `rezervacija_ibfk_1` FOREIGN KEY (`vremeId`) REFERENCES `vremerezervacije` (`idVreme`),
  ADD CONSTRAINT `rezervacija_ibfk_2` FOREIGN KEY (`korisnikId`) REFERENCES `korisnik` (`idKorisnik`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
