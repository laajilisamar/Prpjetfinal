-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 16 nov. 2023 à 20:52
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `scolaritè`
--

-- --------------------------------------------------------

--
-- Structure de la table `classe`
--

CREATE TABLE `classe` (
  `CodClasse` char(9) NOT NULL,
  `IntClasse` char(60) DEFAULT NULL,
  `Departement` char(55) DEFAULT NULL,
  `Optionn` char(55) DEFAULT NULL,
  `Niveau` char(12) DEFAULT NULL,
  `IntCalsseArabB` char(60) DEFAULT NULL,
  `OptionAaraB` char(55) DEFAULT NULL,
  `DepartementAaraB` char(55) DEFAULT NULL,
  `NiveauAaraB` char(10) DEFAULT NULL,
  `CodeEtape` varchar(8) DEFAULT NULL,
  `CodeSalima` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `classe`
--

INSERT INTO `classe` (`CodClasse`, `IntClasse`, `Departement`, `Optionn`, `Niveau`, `IntCalsseArabB`, `OptionAaraB`, `DepartementAaraB`, `NiveauAaraB`, `CodeEtape`, `CodeSalima`) VALUES
('123', 'sdi', 'info', 'qse', '02', 'dsi', 'sdr', 'dvsdg', '0123', '856', '2002'),
('745', 'sdi', 'info', 'qse', '02', 'dsi', 'sdr', 'dvsdg', '0123', '856', '2002'),
('777', 'dsi3.2', 'informatique', 'info', 'permeor', 'aaaaa', 'kioe', 'ddddd', 'ccccc', '256', '8645'),
('78945', 'dsi3.3', 'informatiqyee', 'info', 'permeor', 'aaaaa', 'bbbb', 'ddddd', 'cccc', '856', '864'),
('888', 'dsi3.2', 'informatique', 'info', '55', 'aaaaa', 'bbbb', 'ddddd', 'ccccc', '856', '0005');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `classe`
--
ALTER TABLE `classe`
  ADD PRIMARY KEY (`CodClasse`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
