-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : ven. 10 juin 2022 à 13:05
-- Version du serveur :  5.7.24
-- Version de PHP : 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sae202_appli`
--

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `etudiant_id` int(11) NOT NULL,
  `etudiant_prenom` varchar(100) NOT NULL,
  `etudiant_nom` varchar(100) NOT NULL,
  `etudiant_td` varchar(20) NOT NULL,
  `_parrain_id` int(11) NOT NULL,
  `_groupe_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`etudiant_id`, `etudiant_prenom`, `etudiant_nom`, `etudiant_td`, `_parrain_id`, `_groupe_id`) VALUES
(1, 'Camélien', 'Tournu', 'D', 1, 1),
(2, 'Michel', 'Fabien', 'D', 2, 1),
(3, 'Lena', 'Zis', 'H', 3, 2);

-- --------------------------------------------------------

--
-- Structure de la table `groupe`
--

CREATE TABLE `groupe` (
  `groupe_id` int(11) NOT NULL,
  `groupe_nom` varchar(100) NOT NULL,
  `groupe_photo` varchar(300) NOT NULL,
  `groupe_temps` time NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `groupe`
--

INSERT INTO `groupe` (`groupe_id`, `groupe_nom`, `groupe_photo`, `groupe_temps`) VALUES
(1, 'Groupe1', 'https://thumbs.dreamstime.com/b/logo-de-personnes-race-noire-ic%C3%B4ne-groupe-ou-d-utilisateurs-131881673.jpg', '00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `parrain`
--

CREATE TABLE `parrain` (
  `parrain_id` int(11) NOT NULL,
  `parrain_prenom` varchar(100) NOT NULL,
  `parrain_nom` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `parrain`
--

INSERT INTO `parrain` (`parrain_id`, `parrain_prenom`, `parrain_nom`) VALUES
(1, 'Matthias', 'Petit');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`etudiant_id`);

--
-- Index pour la table `parrain`
--
ALTER TABLE `parrain`
  ADD PRIMARY KEY (`parrain_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `etudiant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `parrain`
--
ALTER TABLE `parrain`
  MODIFY `parrain_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
