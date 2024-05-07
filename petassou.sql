-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mar. 07 mai 2024 à 14:56
-- Version du serveur : 11.3.2-MariaDB
-- Version de PHP : 8.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `petassou`
--

-- --------------------------------------------------------

--
-- Structure de la table `bennes`
--

CREATE TABLE `bennes` (
  `benne` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `bennes`
--

INSERT INTO `bennes` (`benne`) VALUES
(''),
('bois'),
('chimique'),
('DEEE'),
('gravat'),
('grosElec'),
('maison'),
('metal'),
('sportLoisir'),
('thermique'),
('toutVenant');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `nom_categorie` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`nom_categorie`) VALUES
('Électroportatif');

-- --------------------------------------------------------

--
-- Structure de la table `dechets`
--

CREATE TABLE `dechets` (
  `dechet` varchar(255) NOT NULL,
  `benne` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `dechets`
--

INSERT INTO `dechets` (`dechet`, `benne`) VALUES
('boisSeul', 'bois'),
('ecran', 'DEEE'),
('equipement electrique', 'DEEE'),
('equipement electronique', 'DEEE'),
('ordi portable', 'DEEE'),
('TV', 'DEEE'),
('ardoise', 'gravat'),
('beton', 'gravat'),
('carrelage', 'gravat'),
('deblais', 'gravat'),
('parpaing', 'gravat'),
('pierre', 'gravat'),
('electro-menager\r\n', 'grosElec'),
('bricolage(+80cm)', 'maison'),
('jouet (+80cm)', 'maison'),
('literie', 'maison'),
('mobilier', 'maison'),
('metal(tout type)', 'metal'),
('ballon', 'sportLoisir'),
('peche', 'sportLoisir'),
('raquettes', 'sportLoisir'),
('rollers', 'sportLoisir'),
('ski', 'sportLoisir'),
('trotinette', 'sportLoisir'),
('velo', 'sportLoisir'),
('thermique', 'thermique'),
('isolant', 'toutVenant'),
('moquette', 'toutVenant'),
('plastiques', 'toutVenant'),
('plâtre', 'toutVenant'),
('PVC', 'toutVenant'),
('verre', 'toutVenant');

-- --------------------------------------------------------

--
-- Structure de la table `lieux`
--

CREATE TABLE `lieux` (
  `lieu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `id_produit` int(11) NOT NULL,
  `nom_produit` varchar(150) NOT NULL,
  `description` text DEFAULT NULL,
  `date_enregistrement` datetime NOT NULL DEFAULT current_timestamp(),
  `cout_reparation` float DEFAULT 0,
  `temps_passe` time DEFAULT NULL,
  `nom_sous_categorie` varchar(50) NOT NULL,
  `lieu` varchar(50) NOT NULL,
  `benne` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `produits_vendus`
--

CREATE TABLE `produits_vendus` (
  `id` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `id_vente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sous_categories`
--

CREATE TABLE `sous_categories` (
  `nom_sous_categorie` varchar(50) NOT NULL,
  `nom_categorie` varchar(50) NOT NULL,
  `poids` int(11) DEFAULT NULL COMMENT 'en gramme'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ventes`
--

CREATE TABLE `ventes` (
  `id_vente` int(11) NOT NULL,
  `date_vente` datetime NOT NULL DEFAULT current_timestamp(),
  `prix_libre` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `bennes`
--
ALTER TABLE `bennes`
  ADD PRIMARY KEY (`benne`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`nom_categorie`);

--
-- Index pour la table `dechets`
--
ALTER TABLE `dechets`
  ADD PRIMARY KEY (`dechet`),
  ADD KEY `benne` (`benne`);

--
-- Index pour la table `lieux`
--
ALTER TABLE `lieux`
  ADD PRIMARY KEY (`lieu`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id_produit`),
  ADD KEY `nom_sous_categorie` (`nom_sous_categorie`),
  ADD KEY `benne` (`benne`),
  ADD KEY `Lieudestockage` (`lieu`);

--
-- Index pour la table `produits_vendus`
--
ALTER TABLE `produits_vendus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pkproduits_vendus` (`id_produit`,`id_vente`),
  ADD KEY `fkventes` (`id_vente`);

--
-- Index pour la table `sous_categories`
--
ALTER TABLE `sous_categories`
  ADD PRIMARY KEY (`nom_sous_categorie`),
  ADD KEY `nom_categorie` (`nom_categorie`);

--
-- Index pour la table `ventes`
--
ALTER TABLE `ventes`
  ADD PRIMARY KEY (`id_vente`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `id_produit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=182;

--
-- AUTO_INCREMENT pour la table `produits_vendus`
--
ALTER TABLE `produits_vendus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `ventes`
--
ALTER TABLE `ventes`
  MODIFY `id_vente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `dechets`
--
ALTER TABLE `dechets`
  ADD CONSTRAINT `dechets_ibfk_1` FOREIGN KEY (`benne`) REFERENCES `bennes` (`benne`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `produits`
--
ALTER TABLE `produits`
  ADD CONSTRAINT `Lieudestockage` FOREIGN KEY (`lieu`) REFERENCES `lieux` (`lieu`),
  ADD CONSTRAINT `SousCat` FOREIGN KEY (`nom_sous_categorie`) REFERENCES `sous_categories` (`nom_sous_categorie`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `bennes` FOREIGN KEY (`benne`) REFERENCES `bennes` (`benne`);

--
-- Contraintes pour la table `produits_vendus`
--
ALTER TABLE `produits_vendus`
  ADD CONSTRAINT `fkproduits` FOREIGN KEY (`id_produit`) REFERENCES `produits` (`id_produit`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fkventes` FOREIGN KEY (`id_vente`) REFERENCES `ventes` (`id_vente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `sous_categories`
--
ALTER TABLE `sous_categories`
  ADD CONSTRAINT `Categorie` FOREIGN KEY (`nom_categorie`) REFERENCES `categories` (`nom_categorie`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
