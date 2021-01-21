-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 21 jan. 2021 à 02:57
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
-- Base de données : `poctwitterclone`
--

-- --------------------------------------------------------

--
-- Structure de la table `follows`
--

CREATE TABLE `follows` (
  `uid` int(11) NOT NULL,
  `follower` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(5, 0, 'azda', '2021-01-21 00:49:38'),
(14, 0, 'regregzerg', '2021-01-21 01:00:24'),
(15, 0, 'htrnbgfb', '2021-01-21 01:00:30'),
(16, 0, 'tyh\"nyth', '2021-01-21 01:04:23'),
(17, 0, 'egrter', '2021-01-21 01:04:30'),
(19, 0, 'zefzef', '2021-01-21 01:20:28'),
(20, 0, 'sdfds', '2021-01-21 01:20:33'),
(21, 0, 'zffezf', '2021-01-21 01:23:21'),
(22, 0, 'zer', '2021-01-21 01:24:34'),
(23, 0, 'erere', '2021-01-21 01:25:09'),
(24, 0, 'azeaz', '2021-01-21 01:26:36'),
(25, 26, 'ergtrhgrtgf', '2021-01-21 00:59:38'),
(26, 26, 'ngrfgns', '2021-01-21 00:59:38');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `uid` int(11) NOT NULL,
  `ip` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`uid`, `ip`) VALUES
(1, '127.0.0.1'),
(26, '127.0.0.2');

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
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `ip` (`ip`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `tweets`
--
ALTER TABLE `tweets`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
