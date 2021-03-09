-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3307
-- Généré le :  mar. 09 mars 2021 à 17:33
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
  `etat` int(11) NOT NULL DEFAULT 0,
  `date_commande` datetime NOT NULL,
  `date_recuperation` datetime DEFAULT NULL,
  `annule` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commandes`
--

INSERT INTO `commandes` (`id`, `id_utilisateur`, `quantite`, `heure_souhaitee`, `montant`, `id_plat`, `reference`, `etat`, `date_commande`, `date_recuperation`, `annule`) VALUES
(1, 1, 5, '20:00', 0, 1, NULL, 0, '2020-12-31 15:54:12', NULL, 1),
(2, 1, 1, '19:00', 0, 1, NULL, 0, '2021-01-04 11:55:58', NULL, 1),
(3, 1, 1, '19:00', 0, 1, NULL, 0, '2021-01-04 11:56:15', NULL, 1),
(4, 1, 8, '17:30', 0, 7, NULL, 0, '2021-01-04 11:57:45', NULL, 1),
(5, 1, 1, '18:00', 0, 2, NULL, 0, '2021-01-06 15:11:19', NULL, 1),
(6, 1, 1, '19:00', 0, 1, 'U1620210106', 1, '2021-01-06 15:16:30', '2021-01-06 19:09:10', 0),
(7, 1, 2, '20:30', 0, 1, 'Q5720210106', 0, '2021-01-06 15:19:00', NULL, 0),
(8, 1, 8, '19:00', 96, 3, 'B5820210106', 0, '2021-01-06 15:23:47', NULL, 0),
(9, 1, 1, '18:00', 17, 2, 'G3920210106', 0, '2021-01-06 16:42:19', NULL, 0),
(10, 1, 1, '20:00', 10, 6, 'R51020210108', 0, '2021-01-08 15:25:19', NULL, 1),
(11, 1, 2, '19:00', 30, 1, 'J21120210108', 0, '2021-01-08 16:51:06', NULL, 0),
(12, 1, 4, '18:00', 56, 10, 'B71220210129', 0, '2021-01-29 17:04:13', NULL, 0),
(13, 1, 4, '18:00', 56, 10, 'L81320210129', 0, '2021-01-29 17:04:27', NULL, 0);

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_envoi` int(11) NOT NULL,
  `id_reception` int(11) DEFAULT NULL,
  `contenu` text DEFAULT NULL,
  `lu` int(11) NOT NULL DEFAULT 0,
  `date_message` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `id_envoi`, `id_reception`, `contenu`, `lu`, `date_message`) VALUES
(2, 1, 1, 'Bonjour, ceci est mon tout premier message sur le site !', 0, '2021-02-19 15:01:22'),
(3, 1, 1, 'Bonjour, je me permets de vous contacter car j\'aurais une question concernant ce plat, vendez-vous cela à l\'unité ou s\'agit-il d\'une casserole complète ?', 0, '2021-02-25 23:08:52'),
(4, 1, 1, 'Bonjour, ceci est un test', 0, '2021-02-25 23:22:09'),
(5, 1, 1, 'Bonjour, ceci est un nouveau test', 0, '2021-02-25 23:24:06'),
(6, 1, 1, 'Bonjour, ceci est encore un test', 0, '2021-02-25 23:25:32'),
(7, 1, 1, '                                      ', 0, '2021-02-25 23:31:33'),
(8, 1, 1, 'Je reteste en regardant si ça vide bien le textarea', 0, '2021-02-25 23:33:29');

-- --------------------------------------------------------

--
-- Structure de la table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_utilisateur` int(11) NOT NULL,
  `contenu` text NOT NULL,
  `lu` int(11) NOT NULL DEFAULT 0,
  `date_notification` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `notifications`
--

INSERT INTO `notifications` (`id`, `id_utilisateur`, `contenu`, `lu`, `date_notification`) VALUES
(1, 1, '<p>Vous avez une nouvelle réservation de commande</p>', 1, '2021-01-18 16:02:17'),
(2, 1, '<p>Second test de notification</p>', 1, '2021-01-18 16:03:24');

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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `plats`
--

INSERT INTO `plats` (`id`, `nom`, `type_plat`, `prix`, `quantite`, `heure_debut`, `heure_fin`, `adresse`, `code_postal`, `ville`, `informations_supplementaires`, `photo_plat`, `slug`, `id_utilisateur`, `date_publication`) VALUES
(1, 'Boeuf Bourguignon', 2, 15, 4, '19:00', '21:30', '53A rue d\'Oberhergheim', '68127', 'NIEDERHERGHEIM', '\r\nSoudain, David eut une idée. Florence jouait un rôle fondamental dans cette histoire, mais elle ne pouvait pas connaître les conséquences de ses actes. Prélude avait dû lui raconter n’importe quoi pour l’amener à faire ce qu’il voulait. Il fallait prévenir Florence avant qu’il ne soit trop tard.\r\n<br/>\r\nIl a recommencé et recommencé. Pratiquement tous les ordinateurs existants furent sous son contrôle. Il ne laissait pas de trace, ne se montrait pas. Et puis, il a découvert les dialogues en direct via Internet, le téléphone, la visio-conférence, la domotique...\r\n<br/>\r\nNe t’inquiète pas, elle n’a rien pour l’instant. Par contre, dès que je serais relié au réseau, Florence ne sera plus. Tu comprends, je ne peux pas laisser Florence me gêner dans ma tâche. Et puis, elle en sait beaucoup trop sur moi.', 'assets/img/boeuf.jpg', 'boeuf-bourguignon', 1, '2020-12-18 08:30:38'),
(2, 'Crêpes', 3, 17, 2, '18:00', '19:30', '1 rue de la gare', '68000', 'COLMAR', NULL, 'assets/img/crepes.jpg', 'crepes', 1, '2020-12-18 11:42:43'),
(3, 'Escalope à la crème', 2, 12, 2, '19:00', '21:00', '12 Impasse Montgolfier', '68127', 'Sainte Croix en Plaine', NULL, 'assets/img/escalope.jpg', 'escalope-a-la-creme', 1, '2020-12-18 16:47:17'),
(4, 'Pizza aux champignons', 2, 12, -5, '19:00', '21:00', '12 Impasse Montgolfier', '68127', 'Niederhergheim', NULL, 'assets/img/bg-login.jpg', 'pizza-aux-champignons', 1, '2020-12-30 14:58:18'),
(5, 'Mousse au chocolat', 3, 5, 4, '17:00', '21:00', '12 Impasse Montgolfier', '68127', 'Niederhergheim', NULL, 'assets/img/bg-login.jpg', 'mousse-au-chocolat', 1, '2020-12-30 15:01:22'),
(6, 'Quiche lorraine', 2, 10, 3, '19:30', '20:00', '12 rue du test', '68127', 'Niederhergheim', NULL, 'assets/img/bg-login.jpg', 'quiche-lorraine', 2, '2020-12-30 16:49:48'),
(7, 'Hamburger maison', 2, 14, 2, '17:00', '19:00', '12 rue des fleurs', '68127', 'Niederhergheim', 'Voilà des informations supplémentaires qui pourront être utiles aux potentiels intéressés.', 'assets/img/bg-login.jpg', 'hamburger-maison', 1, '2020-12-31 09:43:03'),
(8, 'Tarte au citron meringué', 3, 10, 5, '11:00', '13:30', '14 Rue fantôme', '68127', 'Niederhergheim', '', 'assets/img/bg-login.jpg', 'tarte-au-citron-meringue', 1, '2020-12-31 09:59:05'),
(9, 'Oeufs Mimosa', 1, 15, 15, '05:30', '08:00', '1rue du formulaire', '68127', 'Niederhergheim', '', 'assets/img/bg-login.jpg', 'oeufs-mimosa', 1, '2021-01-05 16:38:42'),
(10, 'Choux à la crème', 3, 14, 57, '18:00', '22:30', '53a rue d\'oberhergheim', '68127', 'Niederhergheim', 'Bonjour à tous,<br />\r\n<br />\r\nje vous propose aujourd\'hui des choux à la crème maison, confectionnés par moi même selon une recette de ma grand mère. J\'espère qu\'ils vous plairont !', 'assets/img/bg-login.jpg', 'choux-a-la-creme', 1, '2021-01-06 10:59:12'),
(11, 'Gratin Dauphinois', 2, 10, 2, '11:30', '15:00', '12 Impasse Montgolfier', '68127', 'Niederhergheim', '', 'assets/plats/UzIaHjAb4.jpeg', 'gratin-dauphinois', 1, '2021-01-18 11:55:44'),
(12, 'Quiche Lorraine', 2, 12, 5, '09:30', '16:00', '53a rue d\'oberhergheim', '68127', 'Niederhergheim', 'Bonjour,<br />\r\n<br />\r\nje vous propose aujourd\'hui ma quiche lorraine personnelle, transmise par ma grand-mère,<br />\r\n<br />\r\nj\'espère qu\'elle vous plaira', 'assets/plats/pugHtpaM6.jpeg', 'quichelorraine', 1, '2021-02-12 15:08:39'),
(14, 'Hamburger', 2, 8, 5, '19:00', '21:30', '12 Impasse Montgolfier', '68127', 'Niederhergheim', '', 'assets/plats/IGu2W1DEp.jpeg', 'hamburger', 1, '2021-02-12 15:11:11'),
(15, 'Riz au lait', 3, 3, 10, '13:30', '15:30', '12 rue des fleurs', '68127', 'Niederhergheim', '', 'assets/plats/lFtqhuucE.jpeg', 'rizaulait', 4, '2021-02-12 15:40:42'),
(16, 'Bouchées à la reine', 2, 11, 3, '17:00', '22:30', '10 rue de la liberté', '68127', 'Niederhergheim', 'Bonjour, <br />\r\n<br />\r\nÇa ne servira à rien, repris Prélude. J’ai en effet coupé toutes les communications vers l’extérieur. Les portes sont bloquées. Ce blocaus est complètement hermétique. Et je le suis autant, pas la peine de gaspiller vos salives. Pensez plutôt à vous installer confortablement, vous êtes ici pour un bon moment.<br />\r\n<br />\r\nOui et non. Ce n\'est pas une blague, mais David y est pour quelque chose. Il a créé un programme sans le savoir. Ce programme se nomme Prélude. Il vit sur Internet à travers tout le réseau. Chaque ordinateur connecté connait Prélude. Chaque ordinateur est une partie de Prélude. Le réseau est Prélude.<br />\r\n<br />\r\nDans le plancher pour savoir si quelqu\'un marchait et quel poids il faisait. Le cœur pouvait alors déterminer de quelle personne il s\'agissait. Dans les murs, des cellules photosensibles, des micro-caméras et tout un réseau de détecteurs divers (magnétique, pression, infrarouge...) permettait de déterminer la position exacte de chaque personne et objet dans la maison, de ventiler ou chauffer en conséquence, d\'allumer ou d\'éteindre la lumière...<br />\r\n<br />\r\nMais ils étaient beaucoup plus rapides et plus grands. Le peu de voitures qui circulaient encore étaient ultra sécurisées. C\'est pourquoi la vitesse maximum autorisée avait été portée à 230km/h. Les gens pouvaient commencer à travailler à l’aide de leur ordinateur portables relié au réseau par leur téléphone mobile. Ils auraient pu travailler de chez eux, mais le contact humain restait une priorité. Voir les collègues, prendre un café ensemble à midi et ce dire ‘À demain’. Telle était la vie de l’homme \"moderne\".<br />\r\n<br />\r\nIl a recommencé et recommencé. Pratiquement tous les ordinateurs existants furent sous son contrôle. Il ne laissait pas de trace, ne se montrait pas. Et puis, il a découvert les dialogues en direct via Internet, le téléphone, la visio-conférence, la domotique...<br />\r\n<br />\r\nLes deux gardes du corps personnels de David le prirent par le bras et suivirent le général. Les militaires s‘étaient mis au « garde à vous » sur les côtés du couloir. Celui-ci menait à un ascenseur. Le général inséra à nouveau son badge et la porte s’ouvrit. Il y montèrent tous les quatre. Il n’y avait pas de niveau d’indiqué.<br />\r\n<br />\r\nL’ascenseur démarra tout seul après que la porte se soit fermée. Il descendait. Il n’arrêtait pas de descendre. Puis, il s’arrêta enfin. La porte s’ouvrit. Et David eut la stupeur de sa vie. Devant lui se déployait un complexe informatique. Une vingtaine de personnes se déplaçaient d’un poste à l’autre regardant au passage les écrans géants muraux situés au fond de la salle. Il y avait bien une cinquantaine d’ordinateurs, cinq écrans géants et, situé entre les écrans géants et les ordinateurs, une machinerie impressionnante.<br />\r\n<br />\r\nMais l\'Intelligence Artificielle n\'apportait pas le résultat tant recherché : donner une conscience aux ordinateurs. Alors l\'homme oublia l\'Intelligence Artificielle, et comme pour se prouver qu\'il était bien le seul à avoir une conscience, se mit aux Arts. Les belles promesses sur l\'intelligence des ordinateurs et des robots étaient oubliées. Le \"complexe de Frankenstein\" avec. De nouveaux ordinateurs plus puissants, mais dépourvus d\'intelligence, virent le jour. C\'était en 2004, un an après l\'ouverture au grand public d\'Internet 3.<br />\r\n<br />\r\nFlorence avait l’esprit un peu mélangé entre ce Prélude qui ne lui apportait que des questions sans réponse et « son » David. Prélude avait réveillé brusquement un sentiment que Florence avait au plus profond d’elle. Désormais, elle voulait savoir. Connaître la vérité. Et seulement alors, cette boule de nerf coincée dans l’estomac pourrait s’en aller.<br />\r\n<br />\r\nTu vas le prendre avec toi. Tu brancheras ton téléphone mobile dessus afin que je puisse rester en contact avec toi. Il te faudra aussi un câble de liaison pour brancher ton ordinateur sur le réseau militaire.', 'assets/plats/cAZzpae7q.jpeg', 'boucheesalareine', 1, '2021-02-12 16:02:07');

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
(1, 'Schifferle', 'Quentin', 'quentin.schifferle@gmail.com', '$2y$10$3zv.jFqPkRXrxNm2yLIYGOC1hUBkVFQ8meVm/8DQfNioVsydbsf4y', 'utilisateurs/compte_test.jpeg', 0, 1, '2020-12-14 15:56:16'),
(2, 'Couchot', 'Emilie', 'emilie.couchot@gmail.com', '$2y$10$i/3qcu0rJN2inBlQ4BhM9ObB8AgNhMhw5.BaCudU6GTy3eq7yaZMO', 'utilisateurs/grogu_pink.png', 0, 1, '2020-12-30 16:49:04'),
(3, 'TEST', 'Code', 'code.test@gmail.com', '$2y$10$8SYb35jSiku67fhZMIgfKOo2MmAL3DeoRFkp99RHCmE2VIVLOp/ky', 'utilisateurs/grogu_yellow.png', 1702, 0, '2021-01-06 08:56:22'),
(4, 'Djarin', 'Din', 'the.mandalorian@gmail.com', '$2y$10$b1rKyp2cdAXx9xY98ZSJYujmJ5moCdhMF9igvBETpb.ybRC1t7UFG', 'utilisateurs/grogu_pink.png', 1431, 0, '2021-01-06 09:09:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
