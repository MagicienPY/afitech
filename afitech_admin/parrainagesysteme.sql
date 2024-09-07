-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2024 at 05:27 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `parrainagesysteme`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrateurs`
--

CREATE TABLE `administrateurs` (
  `id_admin` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `ville` varchar(100) DEFAULT NULL,
  `tel` varchar(20) DEFAULT NULL,
  `sexe` char(1) DEFAULT NULL,
  `id_utilisateur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `administrateurs`
--

INSERT INTO `administrateurs` (`id_admin`, `nom`, `prenom`, `ville`, `tel`, `sexe`, `id_utilisateur`) VALUES
(1, 'Admin', 'NomAdmin', 'VilleAdmin', '123456789', 'M', 1);

-- --------------------------------------------------------

--
-- Table structure for table `affiliers`
--

CREATE TABLE `affiliers` (
  `id_affilier` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `ville` varchar(100) DEFAULT NULL,
  `tel` varchar(20) DEFAULT NULL,
  `sexe` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `affiliers`
--

INSERT INTO `affiliers` (`id_affilier`, `nom`, `prenom`, `ville`, `tel`, `sexe`) VALUES
(1, 'Affilier1', 'Nom1', 'Ville1', '123456789', 'M'),
(2, 'Affilier2', 'Nom2', 'Ville2', '234567890', 'F'),
(3, 'Affilier3', 'Nom3', 'Ville3', '345678901', 'M');

-- --------------------------------------------------------

--
-- Table structure for table `beneficiers`
--

CREATE TABLE `beneficiers` (
  `id_beneficier` int(11) NOT NULL,
  `id_commission` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `beneficiers`
--

INSERT INTO `beneficiers` (`id_beneficier`, `id_commission`) VALUES
(1, 1),
(2, 2),
(3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id_client` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `ville` varchar(100) DEFAULT NULL,
  `tel` varchar(20) DEFAULT NULL,
  `id_utilisateur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id_client`, `nom`, `prenom`, `ville`, `tel`, `id_utilisateur`) VALUES
(1, 'Client', 'Exemple', 'VilleClient', '987654321', 1),
(2, 'Client', 'Exemple', 'VilleClient', '987654321', 2),
(3, 'Marie', 'Curie', 'Paris', '5566778899', 3),
(4, 'Albert', 'Einstein', 'Berlin', '6677889900', 3),
(5, 'Client', 'Exemple', 'VilleClient', '987654321', 2),
(6, 'Marie', 'Curie', 'Paris', '5566778899', 3),
(7, 'Albert', 'Einstein', 'Berlin', '6677889900', 3);

-- --------------------------------------------------------

--
-- Table structure for table `commandes`
--

CREATE TABLE `commandes` (
  `id_commande` int(11) NOT NULL,
  `id_client` int(11) DEFAULT NULL,
  `nom_produit` varchar(100) DEFAULT NULL,
  `somme_commande` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `commandes`
--

INSERT INTO `commandes` (`id_commande`, `id_client`, `nom_produit`, `somme_commande`) VALUES
(1, 1, 'Produit A', 100.00),
(2, 1, 'Produit A', 100.00),
(3, 2, 'Produit z', 300.00),
(4, 3, 'Produit C', 300.00),
(5, 2, 'Produit 9', 100.00);

-- --------------------------------------------------------

--
-- Table structure for table `commerciaux`
--

CREATE TABLE `commerciaux` (
  `id_com` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `ville` varchar(100) DEFAULT NULL,
  `sexe` char(1) DEFAULT NULL,
  `tel` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `commerciaux`
--

INSERT INTO `commerciaux` (`id_com`, `nom`, `prenom`, `ville`, `sexe`, `tel`) VALUES
(1, 'Com1', 'NomCom1', 'VilleCom1', 'M', '456789012'),
(2, 'Com2', 'NomCom2', 'VilleCom2', 'F', '567890123'),
(3, 'Com3', 'NomCom3', 'VilleCom3', 'M', '678901234');

-- --------------------------------------------------------

--
-- Table structure for table `commissions`
--

CREATE TABLE `commissions` (
  `id_commission` int(11) NOT NULL,
  `id_commande` int(11) DEFAULT NULL,
  `nom_commission` varchar(100) DEFAULT NULL,
  `num_commission` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `commissions`
--

INSERT INTO `commissions` (`id_commission`, `id_commande`, `nom_commission`, `num_commission`) VALUES
(1, 1, 'Commission A', 'COMM001'),
(2, 2, 'Commission B', 'COMM002'),
(3, 3, 'Commission C', 'COMM003');

-- --------------------------------------------------------

--
-- Table structure for table `lignes_commande`
--

CREATE TABLE `lignes_commande` (
  `id_commande` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `quantite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id_location` int(11) NOT NULL,
  `nom_produit` varchar(100) DEFAULT NULL,
  `categorie_produit` varchar(100) DEFAULT NULL,
  `id_produit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id_location`, `nom_produit`, `categorie_produit`, `id_produit`) VALUES
(1, 'Produit A', 'Catégorie 1', 1),
(2, 'Produit B', 'Catégorie 2', 2),
(3, 'Produit C', 'Catégorie 3', 3);

-- --------------------------------------------------------

--
-- Table structure for table `prix`
--

CREATE TABLE `prix` (
  `id_prix` int(11) NOT NULL,
  `nom_article` varchar(100) NOT NULL,
  `montant_article` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prix`
--

INSERT INTO `prix` (`id_prix`, `nom_article`, `montant_article`) VALUES
(1, 'Produit A', 100.00),
(2, 'Produit B', 200.00),
(3, 'Produit C', 300.00);

-- --------------------------------------------------------

--
-- Table structure for table `produits`
--

CREATE TABLE `produits` (
  `id_produit` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `categorie` varchar(100) DEFAULT NULL,
  `cout` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produits`
--

INSERT INTO `produits` (`id_produit`, `nom`, `categorie`, `cout`) VALUES
(1, 'Produit A', 'Catégorie 1', 100.00),
(2, 'Produit B', 'Catégorie 2', 200.00),
(3, 'Produit A', 'Catégorie 1', 100.00),
(4, 'Produit B', 'Catégorie 2', 200.00),
(5, 'Produit C', 'Catégorie 3', 300.00),
(6, 'Produit A', 'Catégorie 1', 100.00),
(7, 'Produit B', 'Catégorie 2', 200.00),
(8, 'Produit C', 'Catégorie 3', 300.00);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id_role` int(11) NOT NULL,
  `nom_role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id_role`, `nom_role`) VALUES
(1, 'Admin'),
(2, 'Agent'),
(3, 'Client'),
(4, 'Admin'),
(5, 'Agent'),
(6, 'Client'),
(7, 'Commercial');

-- --------------------------------------------------------

--
-- Table structure for table `stations`
--

CREATE TABLE `stations` (
  `id_station` int(11) NOT NULL,
  `nom_station` varchar(255) NOT NULL,
  `adresse_station` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id_utilisateur` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `tel` varchar(20) DEFAULT NULL,
  `ville` varchar(100) DEFAULT NULL,
  `sexe` char(1) DEFAULT NULL,
  `id_role` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id_utilisateur`, `nom`, `prenom`, `email`, `mot_de_passe`, `tel`, `ville`, `sexe`, `id_role`) VALUES
(1, 'Admin2', 'Principal', 'admin@example.com', '$2y$10$C5W7eD7MNZrmGkj.SXplJ.fW7zXBbDABTthGfW9Fwn6qXaWyOGBae\n', '123456789', 'VilleAdmin', 'M', 1),
(2, 'NDEM', 'Leaticia', 'admin@afitech.com', '$2y$10$CHUOHPnEFXD25oMhrtKqyOrlxYhszHRaR3dT6L4fLPR4LmdadqIg.', '123456789', 'VilleAdmin', 'F', 1),
(3, 'Admin', 'Principal', 'admin@example.com', 'admin_password_hash', '123456789', 'VilleAdmin', 'M', 1),
(4, 'John', 'Doe', 'johndoe@example.com', 'hashed_password_1', '234567890', 'VilleJohn', 'M', 2),
(5, 'Jane', 'Doe', 'janedoe@example.com', 'hashed_password_2', '345678901', 'VilleJane', 'F', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrateurs`
--
ALTER TABLE `administrateurs`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `id_utilisateur` (`id_utilisateur`);

--
-- Indexes for table `affiliers`
--
ALTER TABLE `affiliers`
  ADD PRIMARY KEY (`id_affilier`);

--
-- Indexes for table `beneficiers`
--
ALTER TABLE `beneficiers`
  ADD PRIMARY KEY (`id_beneficier`),
  ADD KEY `id_commission` (`id_commission`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id_client`),
  ADD KEY `id_utilisateur` (`id_utilisateur`);

--
-- Indexes for table `commandes`
--
ALTER TABLE `commandes`
  ADD PRIMARY KEY (`id_commande`),
  ADD KEY `id_client` (`id_client`);

--
-- Indexes for table `commerciaux`
--
ALTER TABLE `commerciaux`
  ADD PRIMARY KEY (`id_com`);

--
-- Indexes for table `commissions`
--
ALTER TABLE `commissions`
  ADD PRIMARY KEY (`id_commission`),
  ADD KEY `id_commande` (`id_commande`);

--
-- Indexes for table `lignes_commande`
--
ALTER TABLE `lignes_commande`
  ADD PRIMARY KEY (`id_commande`,`id_produit`),
  ADD KEY `id_produit` (`id_produit`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id_location`),
  ADD KEY `id_produit` (`id_produit`);

--
-- Indexes for table `prix`
--
ALTER TABLE `prix`
  ADD PRIMARY KEY (`id_prix`);

--
-- Indexes for table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id_produit`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `stations`
--
ALTER TABLE `stations`
  ADD PRIMARY KEY (`id_station`);

--
-- Indexes for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id_utilisateur`),
  ADD KEY `id_role` (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrateurs`
--
ALTER TABLE `administrateurs`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `affiliers`
--
ALTER TABLE `affiliers`
  MODIFY `id_affilier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `beneficiers`
--
ALTER TABLE `beneficiers`
  MODIFY `id_beneficier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `commandes`
--
ALTER TABLE `commandes`
  MODIFY `id_commande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `commerciaux`
--
ALTER TABLE `commerciaux`
  MODIFY `id_com` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `commissions`
--
ALTER TABLE `commissions`
  MODIFY `id_commission` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id_location` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `prix`
--
ALTER TABLE `prix`
  MODIFY `id_prix` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `produits`
--
ALTER TABLE `produits`
  MODIFY `id_produit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `stations`
--
ALTER TABLE `stations`
  MODIFY `id_station` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `administrateurs`
--
ALTER TABLE `administrateurs`
  ADD CONSTRAINT `administrateurs_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs` (`id_utilisateur`);

--
-- Constraints for table `beneficiers`
--
ALTER TABLE `beneficiers`
  ADD CONSTRAINT `beneficiers_ibfk_1` FOREIGN KEY (`id_commission`) REFERENCES `commissions` (`id_commission`);

--
-- Constraints for table `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `clients_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs` (`id_utilisateur`);

--
-- Constraints for table `commandes`
--
ALTER TABLE `commandes`
  ADD CONSTRAINT `commandes_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `clients` (`id_client`);

--
-- Constraints for table `commissions`
--
ALTER TABLE `commissions`
  ADD CONSTRAINT `commissions_ibfk_1` FOREIGN KEY (`id_commande`) REFERENCES `commandes` (`id_commande`);

--
-- Constraints for table `lignes_commande`
--
ALTER TABLE `lignes_commande`
  ADD CONSTRAINT `lignes_commande_ibfk_1` FOREIGN KEY (`id_commande`) REFERENCES `commandes` (`id_commande`),
  ADD CONSTRAINT `lignes_commande_ibfk_2` FOREIGN KEY (`id_produit`) REFERENCES `produits` (`id_produit`);

--
-- Constraints for table `locations`
--
ALTER TABLE `locations`
  ADD CONSTRAINT `locations_ibfk_1` FOREIGN KEY (`id_produit`) REFERENCES `produits` (`id_produit`);

--
-- Constraints for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD CONSTRAINT `utilisateurs_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
