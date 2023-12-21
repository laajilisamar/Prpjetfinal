-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 18 nov. 2023 à 13:41
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `scolarite`
--

-- --------------------------------------------------------

--
-- Structure de la table `matieres`
--

CREATE TABLE `matieres` (
  `Code Matière` char(10) NOT NULL,
  `Nom Matière` char(50) DEFAULT NULL,
  `Coef Matière` float DEFAULT NULL,
  `Département` char(55) DEFAULT NULL,
  `Semestre` char(12) DEFAULT NULL,
  `Option` char(55) DEFAULT NULL,
  `Nb Heure CI` double DEFAULT NULL,
  `Nb Heure TP` double DEFAULT NULL,
  `TypeLabo` char(13) DEFAULT NULL,
  `Bonus` double DEFAULT NULL,
  `Catègories` char(35) DEFAULT NULL,
  `SousCatégories` char(35) DEFAULT NULL,
  `DateDeb` datetime DEFAULT NULL,
  `DateFin` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `matieres`
--

INSERT INTO `matieres` (`Code Matière`, `Nom Matière`, `Coef Matière`, `Département`, `Semestre`, `Option`, `Nb Heure CI`, `Nb Heure TP`, `TypeLabo`, `Bonus`, `Catègories`, `SousCatégories`, `DateDeb`, `DateFin`) VALUES
('1', 'base de donnée', 4, 'info', '5', 'big date', 1.5, 3, 'l2.2', 2, 'base', 'base1', '2023-11-01 00:00:00', '2023-11-30 00:00:00'),
('2', 'power bi', 4, 'info', '5', 'data', 1.5, 3, 'l2.2', 2, 'base', 'base1', '2023-11-10 00:00:00', '2023-11-19 00:00:00'),
('3', 'physique', 3, 'info', '1', 'RC', 8, 5, 'L2.5', 5, 'mathsicence', 'math1', '2023-09-26 00:00:00', '2023-10-19 00:00:00'),
('4', 'flutter', 4, 'info', '5', 'flutter', 4, 5, 'lg2', 5, 'mobile', 'mobile', '2023-11-03 00:00:00', '2023-11-24 00:00:00'),
('5', 'soa', 3, 'info', '1', 'mdw', 4, 5, 'L2.5', 1, 'soa', 'soa1', '2023-09-27 00:00:00', '2023-09-29 00:00:00');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `matieres`
--
ALTER TABLE `matieres`
  ADD PRIMARY KEY (`Code Matière`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
