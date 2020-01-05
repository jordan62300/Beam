-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 05 jan. 2020 à 21:59
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projetbeam`
--

-- --------------------------------------------------------

--
-- Structure de la table `mangas`
--

DROP TABLE IF EXISTS `mangas`;
CREATE TABLE IF NOT EXISTS `mangas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `imgnom` varchar(50) NOT NULL,
  `imgtaille` varchar(25) NOT NULL,
  `imgtype` varchar(25) NOT NULL,
  `imgdescription` varchar(100) DEFAULT NULL,
  `images` blob NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `mangas`
--

INSERT INTO `mangas` (`id`, `imgnom`, `imgtaille`, `imgtype`, `imgdescription`, `images`, `user_id`) VALUES
(15, 'a-game-of-thrones-tome-1-bd-1037035.jpg', '64051', 'image/jpeg', '', 0x433a5c77616d7036345c746d705c706870353133322e746d70, 2),
(16, 'D-alMGJXoAQMLHf.jpg', '54951', 'image/jpeg', '', 0x433a5c77616d7036345c746d705c706870354645302e746d70, 3),
(17, '290px-emperor_penguin_manchot_empereur_copie.jpeg', '33410', 'image/jpeg', '', 0x433a5c77616d7036345c746d705c706870443734332e746d70, 3);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `telephone` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `utilisateur` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `telephone`, `email`, `utilisateur`, `password`) VALUES
(2, 'Fievet', 'Jordan', 781032110, 'jordanfievetpro@outlook.fr', 'jordan', '202cb962ac59075b964b07152d234b70'),
(3, 'Duchateau', 'Yann', 781032110, 'Yannduchateau@outlook.fr', 'yann', '81dc9bdb52d04dc20036dbd8313ed055');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `mangas`
--
ALTER TABLE `mangas`
  ADD CONSTRAINT `mangaid_userid` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
