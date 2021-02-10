-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 08 fév. 2021 à 14:18
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `tweety`
--

-- --------------------------------------------------------

--
-- Structure de la table `follows`
--

CREATE TABLE `follows` (
  `uid` int(11) NOT NULL,
  `follower` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `follows`
--

INSERT INTO `follows` (`uid`, `follower`) VALUES
(0, 26),
(1, 1),
(1, 26);

-- --------------------------------------------------------

--
-- Structure de la table `tweets`
--

CREATE TABLE `tweets` (
  `tid` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `post` varchar(140) DEFAULT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `tweets`
--

INSERT INTO `tweets` (`tid`, `uid`, `post`, `date`) VALUES
(26, 26, 'ngrfgns', '2021-01-21 00:59:38'),
(27, 1, 'tester', '2021-01-22 15:21:36'),
(41, 1, 'Ceci est un test de tweet', '2021-02-03 14:27:25'),
(43, 1, 'Ceci est un nouveau tweet de la part de Yann', '2021-02-05 16:03:12'),
(44, 0, 'Salut (Je suis le premier tweet de Thomas)', '2021-02-05 11:14:54'),
(46, 1, 'Test de tweet', '2021-02-05 17:26:13'),
(47, 1, 'Nouveau tweet de Tilodry', '2021-02-05 11:36:44'),
(51, 34, 'segdrhdrb fhfh', '2021-02-08 13:51:28'),
(52, 1, 'segdrhdrb fhfh', '2021-02-08 13:52:14');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `uid` int(11) NOT NULL,
  `biographie` varchar(255) DEFAULT NULL,
  `pseudonyme` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`uid`, `biographie`, `pseudonyme`) VALUES
(0, 'Ceci est la biographie de Thomas', 'Thomas'),
(1, 'Ceci est ma biographie, je suis Yann Roubeau aka Tilodry', 'Tilodry'),
(26, 'Biographie par défaut', 'Lucas'),
(33, 'Bio de Yann', 'Yann'),
(34, 'YOHANNNNNNNNNNNNNNNNNNNNNNNN', 'Yohann');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `follows`
--
ALTER TABLE `follows`
  ADD PRIMARY KEY (`uid`,`follower`);

--
-- Index pour la table `tweets`
--
ALTER TABLE `tweets`
  ADD PRIMARY KEY (`tid`),
  ADD KEY `date` (`date`),
  ADD KEY `uid` (`uid`,`date`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `tweets`
--
ALTER TABLE `tweets`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
