-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3307
-- Généré le :  jeu. 07 jan. 2021 à 16:56
-- Version du serveur :  10.2.14-MariaDB
-- Version de PHP :  7.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `miams`
--

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

DROP TABLE IF EXISTS `commandes`;
CREATE TABLE IF NOT EXISTS `commandes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_utilisateur` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `heure_souhaitee` varchar(255) NOT NULL,
  `montant` int(11) NOT NULL,
  `id_plat` int(11) NOT NULL,
  `reference` varchar(255) DEFAULT NULL,
  `date_commande` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commandes`
--

INSERT INTO `commandes` (`id`, `id_utilisateur`, `quantite`, `heure_souhaitee`, `montant`, `id_plat`, `reference`, `date_commande`) VALUES
(1, 1, 5, '20:00', 0, 1, NULL, '2020-12-31 15:54:12'),
(2, 1, 1, '19:00', 0, 1, NULL, '2021-01-04 11:55:58'),
(3, 1, 1, '19:00', 0, 1, NULL, '2021-01-04 11:56:15'),
(4, 1, 8, '17:30', 0, 7, NULL, '2021-01-04 11:57:45'),
(5, 1, 1, '18:00', 0, 2, NULL, '2021-01-06 15:11:19'),
(6, 1, 1, '19:00', 0, 1, 'U1620210106', '2021-01-06 15:16:30'),
(7, 1, 2, '20:30', 0, 1, 'Q5720210106', '2021-01-06 15:19:00'),
(8, 1, 8, '19:00', 96, 3, 'B5820210106', '2021-01-06 15:23:47'),
(9, 1, 1, '18:00', 17, 2, 'G3920210106', '2021-01-06 16:42:19');

-- --------------------------------------------------------

--
-- Structure de la table `plats`
--

DROP TABLE IF EXISTS `plats`;
CREATE TABLE IF NOT EXISTS `plats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `type_plat` int(11) NOT NULL,
  `prix` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `heure_debut` varchar(5) NOT NULL,
  `heure_fin` varchar(5) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `code_postal` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `informations_supplementaires` text DEFAULT NULL,
  `photo_plat` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `date_publication` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `plats`
--

INSERT INTO `plats` (`id`, `nom`, `type_plat`, `prix`, `quantite`, `heure_debut`, `heure_fin`, `adresse`, `code_postal`, `ville`, `informations_supplementaires`, `photo_plat`, `slug`, `id_utilisateur`, `date_publication`) VALUES
(1, 'Boeuf Bourguignon', 2, 15, 6, '19:00', '21:30', '53A rue d\'Oberhergheim', '68127', 'NIEDERHERGHEIM', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eu luctus dui. In hac habitasse platea dictumst. Sed quis quam vulputate, vestibulum risus vitae, vestibulum lorem. Nam ultricies libero massa, scelerisque posuere ipsum aliquam sed. Donec ullamcorper velit semper metus porta, eget venenatis dolor dictum. Praesent id urna et neque finibus volutpat. Vestibulum quam massa, faucibus gravida accumsan nec, dapibus eget sapien. Pellentesque bibendum tellus vel nisi tristique, et vestibulum libero consequat. Morbi rutrum ut mi in ultricies. Aenean lacinia blandit elit at hendrerit. In quis urna eu arcu rutrum pulvinar.\r\n\r\nMorbi ex dolor, ultrices eget quam a, pellentesque ullamcorper enim. Donec at nunc ac lacus rhoncus volutpat. Mauris tempor ipsum nunc, et vehicula tellus dapibus eu. Donec dictum nulla porttitor erat pellentesque tristique. Aliquam non libero aliquam, molestie elit ac, porttitor justo. Ut a nibh euismod, efficitur nulla nec, commodo diam. Duis efficitur ex tincidunt purus ultricies iaculis.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse potenti. Nam id rhoncus sapien. Ut id neque vitae dui molestie pulvinar. Donec accumsan dolor sit amet arcu dignissim, nec ullamcorper ante dignissim. Aenean ac rutrum magna, sollicitudin pulvinar nulla. Suspendisse vel est vehicula, fermentum tortor id, pellentesque magna. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sollicitudin tempor est, et dapibus arcu porta ut. Pellentesque nec malesuada nisl, id tincidunt urna. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. ', 'boeuf.jpg', 'boeuf-bourguignon', 1, '2020-12-18 08:30:38'),
(2, 'Crêpes', 3, 17, 2, '18:00', '19:30', '1 rue de la gare', '68000', 'COLMAR', NULL, 'crepes.jpg', 'crepes', 1, '2020-12-18 11:42:43'),
(3, 'Escalope à la crème', 2, 12, 2, '19:00', '21:00', '12 Impasse Montgolfier', '68127', 'Sainte Croix en Plaine', NULL, 'escalope.jpg', 'escalope-a-la-creme', 1, '2020-12-18 16:47:17'),
(4, 'Pizza aux champignons', 2, 12, 15, '19:00', '21:00', '12 Impasse Montgolfier', '68127', 'Niederhergheim', NULL, 'bg-login.jpg', 'pizza-aux-champignons', 1, '2020-12-30 14:58:18'),
(5, 'Mousse au chocolat', 3, 5, 4, '17:00', '21:00', '12 Impasse Montgolfier', '68127', 'Niederhergheim', NULL, 'bg-login.jpg', 'mousse-au-chocolat', 1, '2020-12-30 15:01:22'),
(6, 'Quiche lorraine', 2, 10, 4, '19:30', '20:00', '12 rue du test', '68127', 'Niederhergheim', NULL, 'bg-login.jpg', 'quiche-lorraine', 2, '2020-12-30 16:49:48'),
(7, 'Hamburger maison', 2, 14, 2, '17:00', '19:00', '12 rue des fleurs', '68127', 'Niederhergheim', 'Voilà des informations supplémentaires qui pourront être utiles aux potentiels intéressés.', 'bg-login.jpg', 'hamburger-maison', 1, '2020-12-31 09:43:03'),
(8, 'Tarte au citron meringué', 3, 10, 5, '11:00', '13:30', '14 Rue fantôme', '68127', 'Niederhergheim', '', 'bg-login.jpg', 'tarte-au-citron-meringue', 1, '2020-12-31 09:59:05'),
(9, 'Oeufs Mimosa', 1, 15, 15, '05:30', '08:00', '1rue du formulaire', '68127', 'Niederhergheim', '', 'bg-login.jpg', 'oeufs-mimosa', 1, '2021-01-05 16:38:42'),
(10, 'Choux à la crème', 3, 14, 57, '18:00', '22:30', '53a rue d\'oberhergheim', '68127', 'Niederhergheim', 'Bonjour à tous,<br />\r\n<br />\r\nje vous propose aujourd\'hui des choux à la crème maison, confectionnés par moi même selon une recette de ma grand mère. J\'espère qu\'ils vous plairont !', 'bg-login.jpg', 'choux-a-la-creme', 1, '2021-01-06 10:59:12');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `pass` text NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `code_confirmation` int(11) NOT NULL,
  `confirm` int(11) NOT NULL DEFAULT 0,
  `date_inscription` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `prenom`, `mail`, `pass`, `avatar`, `code_confirmation`, `confirm`, `date_inscription`) VALUES
(1, 'Schifferle', 'Quentin', 'quentin.schifferle@gmail.com', '$2y$10$3zv.jFqPkRXrxNm2yLIYGOC1hUBkVFQ8meVm/8DQfNioVsydbsf4y', 'utilisateurs/grogu_blue.png', 0, 1, '2020-12-14 15:56:16'),
(2, 'Couchot', 'Emilie', 'emilie.couchot@gmail.com', '$2y$10$i/3qcu0rJN2inBlQ4BhM9ObB8AgNhMhw5.BaCudU6GTy3eq7yaZMO', 'utilisateurs/grogu_pink.png', 0, 1, '2020-12-30 16:49:04'),
(3, 'TEST', 'Code', 'code.test@gmail.com', '$2y$10$8SYb35jSiku67fhZMIgfKOo2MmAL3DeoRFkp99RHCmE2VIVLOp/ky', 'utilisateurs/grogu_yellow.png', 1702, 0, '2021-01-06 08:56:22'),
(4, 'Djarin', 'Din', 'the.mandalorian@gmail.com', '$2y$10$b1rKyp2cdAXx9xY98ZSJYujmJ5moCdhMF9igvBETpb.ybRC1t7UFG', 'utilisateurs/grogu_pink.png', 1431, 0, '2021-01-06 09:09:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
