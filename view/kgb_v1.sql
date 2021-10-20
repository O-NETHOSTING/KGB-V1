-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: mariadb:3306
-- Generation Time: Oct 20, 2021 at 09:27 PM
-- Server version: 10.5.11-MariaDB-log
-- PHP Version: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `fname` text CHARACTER SET utf8 NOT NULL,
  `lname` text CHARACTER SET utf8 NOT NULL,
  `username` text CHARACTER SET utf8 NOT NULL,
  `password` text CHARACTER SET utf8 NOT NULL,
  `email` text CHARACTER SET utf8 NOT NULL,
  `status` text CHARACTER SET utf8 NOT NULL,
  `napomena` text CHARACTER SET utf8 NOT NULL,
  `lastactivity` text NOT NULL,
  `boja` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fname`, `lname`, `username`, `password`, `email`, `status`, `napomena`, `lastactivity`, `boja`) VALUES
(1, 'Admin', 'Hosting', 'admin', 'admin', 'info@hosting.com', 'admin', 'Tekst bla bla', '1634756059', 'red');

-- --------------------------------------------------------

--
-- Table structure for table `box`
--

CREATE TABLE `box` (
  `id` int(11) NOT NULL,
  `name` text CHARACTER SET utf8 NOT NULL,
  `ip` text CHARACTER SET utf8 NOT NULL,
  `username` text CHARACTER SET utf8 NOT NULL,
  `password` text CHARACTER SET utf8 NOT NULL,
  `ftp_port` int(11) NOT NULL,
  `ssh_port` int(11) NOT NULL,
  `location` text CHARACTER SET utf8 NOT NULL,
  `slobodan` text CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chat_messages`
--

CREATE TABLE `chat_messages` (
  `Text` text DEFAULT NULL,
  `Autor` text NOT NULL,
  `Datum` text NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `fname` text CHARACTER SET utf8 NOT NULL,
  `lname` text CHARACTER SET utf8 NOT NULL,
  `email` text CHARACTER SET utf8 NOT NULL,
  `password` text CHARACTER SET utf8 NOT NULL,
  `lastactivity` text COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `fname`, `lname`, `email`, `password`, `lastactivity`) VALUES
(2, 'KGB ', 'V1', 'demo', 'fe01ce2a7fbac8fafaed7c982a04e229', '1634757979');

-- --------------------------------------------------------

--
-- Table structure for table `ip`
--

CREATE TABLE `ip` (
  `id` int(11) NOT NULL,
  `box_id` int(11) NOT NULL,
  `ip` text CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ip_logs`
--

CREATE TABLE `ip_logs` (
  `id` int(11) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `hostname` varchar(255) NOT NULL,
  `vreme` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `logovi`
--

CREATE TABLE `logovi` (
  `id` int(11) NOT NULL,
  `clientid` int(11) DEFAULT NULL,
  `serverid` int(11) DEFAULT NULL,
  `boxid` int(11) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `vreme` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `modovi`
--

CREATE TABLE `modovi` (
  `id` int(11) NOT NULL,
  `putanja` text CHARACTER SET utf8 NOT NULL,
  `ime` text CHARACTER SET utf8 NOT NULL,
  `igra` text CHARACTER SET utf8 NOT NULL,
  `komanda` text CHARACTER SET utf8 NOT NULL,
  `hidden` int(11) NOT NULL DEFAULT 1,
  `mapa` text COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `modovi`
--

INSERT INTO `modovi` (`id`, `putanja`, `ime`, `igra`, `komanda`, `hidden`, `mapa`) VALUES
(1, '/home/gamefiles/publicc', 'Public Mod', 'Counter-Strike 1.6', './hlds_run -game cstrike +ip {$ip} +port {$port} +maxplayers {$slots} +sys_ticrate 100 +map {$map} +servercfgfile server.cfg', 0, 'de_dust2'),
(2, '/home/gamefiles/cs', 'Click Host Pub', 'CS', './hlds_run -game cstrike +ip {$ip} +port {$port} +maxplayers {$slots} +sys_ticrate 300 -pingboost 0 +map {$map} +servercfgfile server.cfg', 0, 'de_dust2');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` text CHARACTER SET utf8 NOT NULL,
  `date` date NOT NULL,
  `text` text CHARACTER SET utf8 NOT NULL,
  `hidden` int(11) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `date`, `text`, `hidden`) VALUES
(1, 'KGB V1', '2013-04-27', 'Dobro Dosli', 0);

-- --------------------------------------------------------

--
-- Table structure for table `online`
--

CREATE TABLE `online` (
  `online` varchar(2) DEFAULT NULL,
  `poruka` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `serveri`
--

CREATE TABLE `serveri` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `box_id` int(11) NOT NULL,
  `ip_id` int(11) NOT NULL,
  `name` text CHARACTER SET utf8 NOT NULL,
  `mod` text COLLATE latin1_general_ci NOT NULL,
  `map` text CHARACTER SET utf8 NOT NULL,
  `port` text COLLATE latin1_general_ci NOT NULL,
  `fps` int(11) NOT NULL DEFAULT 300,
  `slotovi` int(11) NOT NULL,
  `username` text CHARACTER SET utf8 NOT NULL,
  `password` text CHARACTER SET utf8 NOT NULL,
  `istice` date NOT NULL,
  `status` text CHARACTER SET utf8 NOT NULL,
  `startovan` int(11) NOT NULL DEFAULT 0,
  `free` text COLLATE latin1_general_ci DEFAULT NULL,
  `uplatnica` text COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tiketi`
--

CREATE TABLE `tiketi` (
  `id` int(11) NOT NULL,
  `server_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` text CHARACTER SET utf8 NOT NULL,
  `datum` text CHARACTER SET utf8 NOT NULL,
  `naslov` text CHARACTER SET utf8 NOT NULL,
  `zatvoren` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tiketi_odgovori`
--

CREATE TABLE `tiketi_odgovori` (
  `id` int(11) NOT NULL,
  `tiket_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `odgovor` text CHARACTER SET utf8 NOT NULL,
  `vrijeme_odgovora` text CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `box`
--
ALTER TABLE `box`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat_messages`
--
ALTER TABLE `chat_messages`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ip`
--
ALTER TABLE `ip`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ip_logs`
--
ALTER TABLE `ip_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logovi`
--
ALTER TABLE `logovi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modovi`
--
ALTER TABLE `modovi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `serveri`
--
ALTER TABLE `serveri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tiketi`
--
ALTER TABLE `tiketi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tiketi_odgovori`
--
ALTER TABLE `tiketi_odgovori`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `box`
--
ALTER TABLE `box`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chat_messages`
--
ALTER TABLE `chat_messages`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ip`
--
ALTER TABLE `ip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ip_logs`
--
ALTER TABLE `ip_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `logovi`
--
ALTER TABLE `logovi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `modovi`
--
ALTER TABLE `modovi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `serveri`
--
ALTER TABLE `serveri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tiketi`
--
ALTER TABLE `tiketi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tiketi_odgovori`
--
ALTER TABLE `tiketi_odgovori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
