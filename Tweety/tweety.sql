-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 24 fév. 2021 à 15:57
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 7.4.14

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
(0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `tweets`
--

CREATE TABLE `tweets` (
  `tid` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `post` varchar(140) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `nomutilisateur` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `tweets`
--

INSERT INTO `tweets` (`tid`, `uid`, `post`, `date`, `nomutilisateur`) VALUES
(63, 1, 'Ceci est un test de Tweet après le changement de la requête SQL permettant l\'auto insertion du pseudonyme dans le tweet', '2021-02-15 09:16:58', 'Tilodry'),
(64, 1, 'Ceci est un test de Tweet après le changement de la requête SQL permettant l\'auto insertion du pseudonyme dans le tweet', '2021-02-15 09:22:02', 'Tilodry'),
(65, 1, 'Ceci est un test de Tweet après le changement de la requête SQL permettant l\'auto insertion du pseudonyme dans le tweet', '2021-02-15 09:23:33', 'Tilodry'),
(66, 26, 'Ceci est un tweet', '2021-02-15 12:59:32', 'Lucas'),
(67, 47, 'Hey', '2021-02-24 15:40:19', 'yannroubeaupor');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `uid` int(11) NOT NULL,
  `biographie` varchar(255) DEFAULT NULL,
  `nomutilisateur` varchar(255) DEFAULT NULL,
  `motdepasse` varchar(255) DEFAULT NULL,
  `estadmin` tinyint(1) NOT NULL DEFAULT 0,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`uid`, `biographie`, `nomutilisateur`, `motdepasse`, `estadmin`, `email`) VALUES
(1, 'Ceci est ma biographie, je suis Yann Roubeau aka Tilodry', 'Tilodry', '', 0, ''),
(26, 'Biographie par défaut', 'Lucas', '', 0, ''),
(33, 'Bio de Yann', 'Yann', '', 0, ''),
(34, 'YOHANNNNNNNNNNNNNNNNNNNNNNNN', 'Yohann', '', 0, ''),
(35, 'Ceci est la biographie de Thomas', 'Thomas', '$2y$10$X6pAgLJf0xmkljTFYc7sl.VZvMgGM9r2Jluezx4u./3fUxnqIA4iG', 0, ''),
(38, NULL, 'Bob', '$2y$10$cfMZKC4ma5.XcJhH0ntD7.tE7plAgq8f9O21gfKYiX6eFzrwH/yJW', 1, ''),
(44, NULL, 'zvragg', '$2y$10$fADjur6MLA0ZQafqS.5zEe51P6Jf/iTbHeDnPPtg6i6G2rESC3dPa', 0, 'zvragg@gmail.com'),
(47, 'hey', 'yannroubeaupor', '$2y$10$XLIp6A4xcSgKgfh.s9iDjejo9iqUOJ1YCwBM7pg1Q8rsj9EO3X5eW', 0, 'yannroubeaupro@gmail.com');

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
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
