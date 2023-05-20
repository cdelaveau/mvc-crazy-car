-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 11 juin 2022 à 02:37
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mvc`
--
CREATE DATABASE IF NOT EXISTS `mvc` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `mvc`;

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id_article` int(11) NOT NULL AUTO_INCREMENT,
  `article_categorie` int(11) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `contenu` text NOT NULL,
  `slug` varchar(40) NOT NULL,
  PRIMARY KEY (`id_article`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id_article`, `article_categorie`, `titre`, `contenu`, `slug`) VALUES
(1, 2, 'Les statistiques sur les performances des plus belles voitures viennent de tomber aujourd\'hui ! ', '1) La Bugatti chiron.<br/>\r\n2) La Mustang.<br/>\r\n3) La Ford ranger.<br/>\r\n4) La Lamborghini aventador.<br/>', 'voitures_et_performances'),
(2, 1, 'La Bugatti Chiron, l\'alliance ultime entre performance et beauté. ', 'Ça fait très mal au portefeuille par contre !', 'bugatti_chiron'),
(3, 1, 'Quel couleur et finition choisir ?', 'Rose paillette ? Non merci, proposition suivante.<br/>\r\nRouge avec bandes noires ? Encore trop simple !<br/>\r\nNoir et blanc avec finition en carbone spécial course ? Voilà, ça c\'est cool !!!! <br/>', 'quel_couleur_et_finition_choisir');

-- --------------------------------------------------------

--
-- Structure de la table `bousers`
--

DROP TABLE IF EXISTS `bousers`;
CREATE TABLE IF NOT EXISTS `bousers` (
  `Id_users` int(11) NOT NULL AUTO_INCREMENT,
  `Login` varchar(30) NOT NULL,
  `MDP` varchar(255) NOT NULL,
  PRIMARY KEY (`Id_users`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `bousers`
--

INSERT INTO `bousers` (`Id_users`, `Login`, `MDP`) VALUES
(1, 'JP', '0b9c2625dc21ef05f6ad4ddf47c5f203837aa32c');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id_categories` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) NOT NULL,
  `slug` varchar(50) NOT NULL,
  PRIMARY KEY (`id_categories`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id_categories`, `titre`, `slug`) VALUES
(1, 'Paul Itique', 'paul_itique'),
(2, 'Aime Otion', 'aime_otion');

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

DROP TABLE IF EXISTS `image`;
CREATE TABLE IF NOT EXISTS `image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `chemin` varchar(150) NOT NULL,
  `alt` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `image`
--

INSERT INTO `image` (`id`, `chemin`, `alt`) VALUES
(1, '/media/Chevrolet Cyan.jpg', 'Une Chevrolet cyan sous un ciel bleu.  '),
(2, '/media/Lamborghini cyan.jpg', 'Une Lamborghini cyan sur une route pendant un coucher de soleil. '),
(3, '/media/Ford bleu.jpg', 'Une Ford bleu garée à côté d\'une haie sous un ciel bleu. '),
(4, '/media/Lamborghini jaune.jpg', 'Une Lamborghini jaune avec portière gauche ouverte dans une pièce avec des ombres et rayon de soleil. '),
(5, '/media/Muscle-car blanche.jpg', 'Une Muscle-car blanche sous un lampadaire au pied d\'un immeuble en pleine nuit. '),
(6, '/media/Moto et avion.jpg', 'Une moto noir garée à côté d\'une épave d\'avion sous un ciel nuageux pendant un coucher de soleil. '),
(7, '/media/Mustang jaune.jpg', 'Une Mustang jaune garée à côté d\'un mur. '),
(8, '/media/Corvette orange.jpg', 'Une Corvette orange garée au pied d\'un immeuble en pleine journée. '),
(9, '/media/Volkswagen orange.jpg', 'Un van Volkswagen orange garé sur de la terre en pleine journée. '),
(10, '/media/Toyota gris.jpg', 'Une Toyota grise avec équipement de camping garée sur la terre sous un ciel nuageux pendant un coucher de soleil. '),
(11, '/media/Moto noir.jpg', 'Une Moto noir avec des écritures grises garée sur la terre au pied d\'une colline. '),
(12, '/media/bugatti chiron noir.jpg', 'Une bugatti noir garée devant un vieux bâtiment.');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
