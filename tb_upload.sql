-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 16 juin 2022 à 22:04
-- Version du serveur :  8.0.21
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `upload`
--

-- --------------------------------------------------------

--
-- Structure de la table `tb_upload`
--

DROP TABLE IF EXISTS `tb_upload`;
CREATE TABLE IF NOT EXISTS `tb_upload` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `adress` varchar(60) NOT NULL,
  `availablity` varchar(60) NOT NULL,
  `birthDate` varchar(60) NOT NULL,
  `description` varchar(100) NOT NULL,
  `image` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf16le;

--
-- Déchargement des données de la table `tb_upload`
--

INSERT INTO `tb_upload` (`id`, `name`, `adress`, `availablity`, `birthDate`, `description`, `image`) VALUES
(2, 'Liston', 'Paris', 'oui', '2022-04-01', 'Liston est un chat très mignon, aime les câlins', '62a5c87a52c38.jpg'),
(3, 'Naya', 'Lille', 'oui', '2022-01-01', 'Naya est très câline et aime jouée.', '62a5c89f8de40.jpg'),
(4, 'Kira', 'Toulouse', 'oui', '2022-04-13', 'Kira est un perroquet qui sait parler.', '62a5c8cb01188.jpg'),
(5, 'Charlie', 'Paris', 'oui', '2022-03-15', 'Charlie est un chien adorable, qui aime beaucoup les sorites aux parcs.', '62a5c8ebec477.jpg'),
(6, 'Hamtaru', 'Lille', 'oui', '2022-04-07', 'Hamtaru est un hamster qui aime beaucoup courir.', '62a5c90d90ecf.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
