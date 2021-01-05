-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 05 jan. 2021 à 20:28
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sallesport`
--

-- --------------------------------------------------------

--
-- Structure de la table `abonner`
--

CREATE TABLE `abonner` (
  `id` int(11) NOT NULL,
  `nem` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `num` int(11) NOT NULL,
  `tarif` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `periode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `abonner`
--

INSERT INTO `abonner` (`id`, `nem`, `prenom`, `num`, `tarif`, `type`, `periode`) VALUES
(1, 'moatez', 'kamoun', 25953685, 50, 'musculation', 2),
(3, 'ahmed', 'hanchi', 26853962, 60, 'musculation', 3),
(4, 'taz', 'kam', 20147852, 60, 'cardio', 2),
(5, 'arbi', 'bough', 52963852, 60, 'cardio', 2),
(6, 'adel', 'hendou', 25963852, 51, 'cardio', 2);

-- --------------------------------------------------------

--
-- Structure de la table `activiter`
--

CREATE TABLE `activiter` (
  `id` int(11) NOT NULL,
  `jour` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `heure` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `activiter`
--

INSERT INTO `activiter` (`id`, `jour`, `nom`, `heure`) VALUES
(1, 'monday', 'karate', '10:00-12:00'),
(2, 'thuesday', 'kick boxing', '08:00-11:00'),
(4, 'friday', 'jujitsu', '15:00-18:00');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `roles` longtext NOT NULL COMMENT '(DC2Type:json_array)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `roles`) VALUES
(4, 'moatez@kam.com', '$2y$13$Nb3aACueJBu99is00bm.Ne1Hgv6Xp3gc0QZzuX9G7audQYA0Pnkri', '[\"ROLE_USER\"]'),
(5, 'arbi@gmail.com', '$2y$13$0M9r4Fco1FEkhV9UF7AE7eyAJN1fDngL8Ew834A/sNjVj1lo1IULO', '[\"ROLE_USER\"]');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `abonner`
--
ALTER TABLE `abonner`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `activiter`
--
ALTER TABLE `activiter`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `abonner`
--
ALTER TABLE `abonner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `activiter`
--
ALTER TABLE `activiter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
