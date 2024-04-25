-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 25, 2024 at 02:46 PM
-- Server version: 11.3.2-MariaDB
-- PHP Version: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `petassou`
--

-- --------------------------------------------------------

--
-- Table structure for table `bennes`
--

CREATE TABLE `bennes` (
  `benne` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `nom_categorie` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`nom_categorie`) VALUES
('Vaisselle');

-- --------------------------------------------------------

--
-- Table structure for table `lieux`
--

CREATE TABLE `lieux` (
  `lieu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lieux`
--

INSERT INTO `lieux` (`lieu`) VALUES
('La Boissonade'),
('Temple de Gabriac');

-- --------------------------------------------------------

--
-- Table structure for table `produits`
--

CREATE TABLE `produits` (
  `id_produit` int(11) NOT NULL,
  `nom_produit` varchar(150) NOT NULL,
  `description` text DEFAULT NULL,
  `date_enregistrement` datetime NOT NULL DEFAULT current_timestamp(),
  `cout_reparation` float DEFAULT 0,
  `temps_passe` time DEFAULT NULL,
  `vendu` tinyint(4) NOT NULL DEFAULT 0,
  `nom_sous_categorie` varchar(50) NOT NULL,
  `lieu` varchar(50) NOT NULL,
  `benne` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sous_categories`
--

CREATE TABLE `sous_categories` (
  `nom_sous_categorie` varchar(50) NOT NULL,
  `nom_categorie` varchar(50) NOT NULL,
  `poids` int(11) DEFAULT NULL COMMENT 'en gramme'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sous_categories`
--

INSERT INTO `sous_categories` (`nom_sous_categorie`, `nom_categorie`, `poids`) VALUES
('Assiette', 'Vaisselle', 200);

-- --------------------------------------------------------

--
-- Table structure for table `ventes`
--

CREATE TABLE `ventes` (
  `id_vente` int(11) NOT NULL,
  `quantite` int(11) NOT NULL DEFAULT 1,
  `date_vente` datetime NOT NULL DEFAULT current_timestamp(),
  `prix_libre` float DEFAULT NULL,
  `id_produit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bennes`
--
ALTER TABLE `bennes`
  ADD PRIMARY KEY (`benne`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`nom_categorie`);

--
-- Indexes for table `lieux`
--
ALTER TABLE `lieux`
  ADD PRIMARY KEY (`lieu`);

--
-- Indexes for table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id_produit`),
  ADD KEY `nom_sous_categorie` (`nom_sous_categorie`),
  ADD KEY `benne` (`benne`),
  ADD KEY `Lieudestockage` (`lieu`);

--
-- Indexes for table `sous_categories`
--
ALTER TABLE `sous_categories`
  ADD PRIMARY KEY (`nom_sous_categorie`),
  ADD KEY `nom_categorie` (`nom_categorie`);

--
-- Indexes for table `ventes`
--
ALTER TABLE `ventes`
  ADD PRIMARY KEY (`id_vente`),
  ADD KEY `id_produit` (`id_produit`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `produits`
--
ALTER TABLE `produits`
  MODIFY `id_produit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT for table `ventes`
--
ALTER TABLE `ventes`
  MODIFY `id_vente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `produits`
--
ALTER TABLE `produits`
  ADD CONSTRAINT `Benne` FOREIGN KEY (`benne`) REFERENCES `bennes` (`benne`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `Lieudestockage` FOREIGN KEY (`lieu`) REFERENCES `lieux` (`lieu`),
  ADD CONSTRAINT `SousCat` FOREIGN KEY (`nom_sous_categorie`) REFERENCES `sous_categories` (`nom_sous_categorie`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sous_categories`
--
ALTER TABLE `sous_categories`
  ADD CONSTRAINT `Categorie` FOREIGN KEY (`nom_categorie`) REFERENCES `categories` (`nom_categorie`);

--
-- Constraints for table `ventes`
--
ALTER TABLE `ventes`
  ADD CONSTRAINT `ventes_ibfk_1` FOREIGN KEY (`id_produit`) REFERENCES `produits` (`id_produit`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
