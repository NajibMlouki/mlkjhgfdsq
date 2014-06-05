-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le : Lun 07 Avril 2014 à 09:46
-- Version du serveur: 5.5.20
-- Version de PHP: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `doctunisie`
--

-- --------------------------------------------------------

--
-- Structure de la table `activites`
--

CREATE TABLE IF NOT EXISTS `activites` (
  `id_activ` int(11) NOT NULL AUTO_INCREMENT,
  `idMedecin` int(11) DEFAULT NULL,
  `type_activ` varchar(254) COLLATE utf8_unicode_ci DEFAULT NULL,
  `titre` varchar(254) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(254) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `dateInsert` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dateUpdate` datetime DEFAULT NULL,
  PRIMARY KEY (`id_activ`),
  KEY `idMedecin` (`idMedecin`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Contenu de la table `activites`
--

INSERT INTO `activites` (`id_activ`, `idMedecin`, `type_activ`, `titre`, `description`, `date`, `dateInsert`, `dateUpdate`) VALUES
(1, 52, 'Article de Presse', 'How to prevent Allergy''s Causes', 'Dr Harun, Times', '2013-04-15', '2014-04-02 18:55:22', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `certification`
--

CREATE TABLE IF NOT EXISTS `certification` (
  `id_certificat` int(11) NOT NULL AUTO_INCREMENT,
  `idMedecin` int(11) NOT NULL,
  `certificat` varchar(254) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ville` varchar(254) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` year(4) DEFAULT NULL,
  `dateInsert` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `dateUpdate` datetime DEFAULT NULL,
  PRIMARY KEY (`id_certificat`),
  KEY `idMedecin` (`idMedecin`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Contenu de la table `certification`
--

INSERT INTO `certification` (`id_certificat`, `idMedecin`, `certificat`, `ville`, `date`, `dateInsert`, `dateUpdate`) VALUES
(1, 52, 'licence de travail medecin', 'tunis, TN', 2009, '2014-04-02 18:10:42', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `idRelation` int(11) DEFAULT NULL,
  `dateInvitation` datetime DEFAULT NULL,
  `dateAjout` datetime DEFAULT NULL,
  `statut` varchar(254) CHARACTER SET latin1 DEFAULT NULL,
  `textInvitation` varchar(254) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `conversation`
--

CREATE TABLE IF NOT EXISTS `conversation` (
  `idConverse` int(11) DEFAULT NULL,
  `description` varchar(254) CHARACTER SET latin1 DEFAULT NULL,
  `dateConverse` datetime DEFAULT NULL,
  `dateLastEdit` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `doclangues`
--

CREATE TABLE IF NOT EXISTS `doclangues` (
  `idMedecin` int(11) NOT NULL,
  `id_langue` int(11) NOT NULL,
  `description` varchar(254) COLLATE utf8_unicode_ci DEFAULT NULL,
  KEY `id_langue` (`id_langue`),
  KEY `idMedecin` (`idMedecin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `doclangues`
--

INSERT INTO `doclangues` (`idMedecin`, `id_langue`, `description`) VALUES
(52, 1, NULL),
(52, 3, NULL),
(52, 2, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `experience`
--

CREATE TABLE IF NOT EXISTS `experience` (
  `idExperience` int(11) NOT NULL AUTO_INCREMENT,
  `idMedecin` int(11) NOT NULL,
  `id_institut` int(11) NOT NULL,
  `titre` varchar(254) CHARACTER SET latin1 DEFAULT NULL,
  `departement` varchar(254) COLLATE utf8_swedish_ci DEFAULT NULL,
  `dateDebut` date DEFAULT NULL,
  `dateFin` date DEFAULT NULL,
  `description` varchar(5000) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `dateInsert` datetime DEFAULT NULL,
  `dateUpdate` datetime DEFAULT NULL,
  PRIMARY KEY (`idExperience`),
  KEY `id_medecin` (`idMedecin`),
  KEY `id_institut` (`id_institut`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AUTO_INCREMENT=2 ;

--
-- Contenu de la table `experience`
--

INSERT INTO `experience` (`idExperience`, `idMedecin`, `id_institut`, `titre`, `departement`, `dateDebut`, `dateFin`, `description`, `dateInsert`, `dateUpdate`) VALUES
(1, 52, 5, 'Prof Assistant', 'health departement\n', '2008-03-10', '2014-03-01', 'description', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `fileupload`
--

CREATE TABLE IF NOT EXISTS `fileupload` (
  `idFile` int(11) DEFAULT NULL,
  `type` varchar(254) CHARACTER SET latin1 DEFAULT NULL,
  `location` varchar(254) CHARACTER SET latin1 DEFAULT NULL,
  `dateUpload` datetime DEFAULT NULL,
  `nom` varchar(254) CHARACTER SET latin1 DEFAULT NULL,
  `extension` varchar(254) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `follow`
--

CREATE TABLE IF NOT EXISTS `follow` (
  `idFollow` int(11) DEFAULT NULL,
  `description` varchar(254) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

CREATE TABLE IF NOT EXISTS `formation` (
  `id_formation` int(11) NOT NULL AUTO_INCREMENT,
  `idMedecin` int(11) DEFAULT NULL,
  `formation` varchar(254) COLLATE utf8_unicode_ci DEFAULT NULL,
  `institution` int(11) DEFAULT NULL,
  `typeProgram` varchar(254) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dateDeb` date DEFAULT NULL,
  `dateFin` date DEFAULT NULL,
  `dateInsert` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `dateUpdate` datetime DEFAULT NULL,
  PRIMARY KEY (`id_formation`),
  KEY `institution` (`institution`),
  KEY `idMedecin` (`idMedecin`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Contenu de la table `formation`
--

INSERT INTO `formation` (`id_formation`, `idMedecin`, `formation`, `institution`, `typeProgram`, `dateDeb`, `dateFin`, `dateInsert`, `dateUpdate`) VALUES
(1, 52, 'chef resident', 6, 'cardiologie', '2011-03-01', '2012-09-12', '2014-03-31 20:42:13', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `gouvernorat`
--

CREATE TABLE IF NOT EXISTS `gouvernorat` (
  `id_gouv` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  PRIMARY KEY (`id_gouv`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AUTO_INCREMENT=25 ;

--
-- Contenu de la table `gouvernorat`
--

INSERT INTO `gouvernorat` (`id_gouv`, `label`) VALUES
(1, 'Tunis'),
(2, 'Ariana'),
(3, 'Ben Arous'),
(4, 'Manouba'),
(5, 'Bizerte'),
(6, 'Béja'),
(7, 'Jendouba'),
(8, 'Kef'),
(9, 'Siliana'),
(10, 'Nabeul'),
(11, 'Zaghouan'),
(12, 'Sousse'),
(13, 'Monastir'),
(14, 'Mahdia'),
(15, 'Sfax'),
(16, 'Kairouan'),
(17, 'Kasserine'),
(18, 'Gafsa'),
(19, 'Gabès'),
(20, 'Sidi Bouzid'),
(21, 'Tozeur'),
(22, 'Médenine'),
(23, 'Kébili'),
(24, 'Tataouine');

-- --------------------------------------------------------

--
-- Structure de la table `groupe`
--

CREATE TABLE IF NOT EXISTS `groupe` (
  `idGroupe` int(11) DEFAULT NULL,
  `titre` varchar(254) CHARACTER SET latin1 DEFAULT NULL,
  `description` varchar(254) CHARACTER SET latin1 DEFAULT NULL,
  `dateCreation` datetime DEFAULT NULL,
  `visibilite` varchar(254) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `institution`
--

CREATE TABLE IF NOT EXISTS `institution` (
  `id_institut` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) DEFAULT NULL,
  `nom` varchar(254) COLLATE utf8_swedish_ci DEFAULT NULL,
  `pays` int(11) DEFAULT NULL,
  `adresse` varchar(254) COLLATE utf8_swedish_ci DEFAULT NULL,
  `gouvernorat` int(11) DEFAULT NULL,
  `codepostal` int(11) DEFAULT NULL,
  `tel` varchar(254) COLLATE utf8_swedish_ci DEFAULT NULL,
  `fax` varchar(254) COLLATE utf8_swedish_ci DEFAULT NULL,
  `tel_urgence` varchar(254) COLLATE utf8_swedish_ci DEFAULT NULL,
  `DG` varchar(255) COLLATE utf8_swedish_ci DEFAULT NULL,
  `SG` varchar(254) COLLATE utf8_swedish_ci DEFAULT NULL,
  `email` varchar(254) COLLATE utf8_swedish_ci DEFAULT NULL,
  `site_web` varchar(255) COLLATE utf8_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`id_institut`),
  KEY `idType` (`type`),
  KEY `gouvernorat` (`gouvernorat`),
  KEY `pays` (`pays`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AUTO_INCREMENT=12 ;

--
-- Contenu de la table `institution`
--

INSERT INTO `institution` (`id_institut`, `type`, `nom`, `pays`, `adresse`, `gouvernorat`, `codepostal`, `tel`, `fax`, `tel_urgence`, `DG`, `SG`, `email`, `site_web`) VALUES
(1, 1, ' Facultés de Médecine de Tunis', 1, '15, Rue Djebel Akhdhar - La Rabta - 1007 Bab Saâdoun - Tunis', 1, 1007, '71562762 / 71563715', '71569427 / 71563715', NULL, 'Ahmed Meherzi ', 'Fayçal Sdiri', NULL, 'www.fmt.rnu.tn'),
(2, 1, 'Faculté de Médecine de Sousse', 1, ' Avenue Mohamed Karoui - 4002 Sousse', 12, 4002, '73226611 / 73222600', '73224899', NULL, ' Ali Mtiraoui', 'Moufida chebbi', NULL, 'www.medecinesousse.org'),
(3, 1, 'Faculté de Médecine de Monastir', 1, ' Avenue Avicenne - Monastir - 5000', 13, 5000, '73460350 / 73460302', '73460737', NULL, 'Ali Chadli', 'Faiçal Ben Khedher', NULL, 'www.fmm.rnu.tn'),
(4, 1, 'Faculté de Médecine de Sfax', 1, 'Avenue Majida Bou Leila - 3029 Sfax', 15, 3029, '74241538 / 74240213', '74246217 / 74240213', NULL, ' Khaled Mounir Zeghal ', 'Mohamed El Hedi Yahia', NULL, 'www.fmsf.rnu.tn'),
(5, 2, 'Faculté de Médecine  Dentaire de Monastir', 1, 'Avenue Avicenne  - Monastir - 5000', 13, 5000, '73460832 / 73463200', '73461150', NULL, 'Ali Ben Rahma', 'Fethi Bougrine', NULL, 'www.fmdm.rnu.tn'),
(6, 3, 'HÔPITAL SAHLOUL', 1, 'Hammam sousse - 4011 ', 12, 4011, '73 241 411', '73 241 411', '73 369 411 / 73 369 425', NULL, NULL, NULL, NULL),
(7, 3, 'HÔPITAL MONGI SLIM', 1, 'Sidi Daoud, la Marsa, 2070', 1, 2070, '71 764 325', '71 765 118', '71 764 845 / 71 764 033 / 71 764 066', NULL, NULL, NULL, NULL),
(8, 3, 'HÔPITAL AZIZA OTHMANA', 1, 'Place du Gouvernement la Kasba, Tunis-1008', 1, 1008, '71 560 763', '71 560 763', '71 570 777', NULL, NULL, NULL, NULL),
(9, 4, 'CLINIQUE ENNASR', 1, '50, Avenue de l''Ere Nouvelle - Ennasr II - 2037 Ariana, Tunisie', 2, 2037, '70 831 000', '71 827 166 ', NULL, NULL, NULL, 'info@clinique-ennasr.com.tn', 'http://www.clinique-ennasr.com/'),
(10, 5, 'Croissant Rouge Tunisien', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 6, 'CNAM', 1, 'SIEGE SOCIAL :12 rue abou hamed el ghazeli-MONTPLAISIR-1073 Tunis', 1, 1073, '71104200', '71104385', '80100295', NULL, NULL, 'info@cnam.nat.tn', 'http://www.cnam.nat.tn/');

-- --------------------------------------------------------

--
-- Structure de la table `langues`
--

CREATE TABLE IF NOT EXISTS `langues` (
  `id_langue` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(254) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_langue`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

--
-- Contenu de la table `langues`
--

INSERT INTO `langues` (`id_langue`, `label`) VALUES
(1, 'Arabe'),
(2, 'Anglais'),
(3, 'Français'),
(4, 'Allemand'),
(5, 'Espagnol'),
(6, 'Portugais'),
(7, 'Italien'),
(8, 'Russe'),
(9, 'Chinois'),
(10, 'Japonais'),
(11, 'Coréen'),
(12, 'Ukrainien'),
(13, 'Hindi-ourdou');

-- --------------------------------------------------------

--
-- Structure de la table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id_login` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(254) CHARACTER SET latin1 DEFAULT NULL,
  `password` varchar(254) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id_login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `medecin`
--

CREATE TABLE IF NOT EXISTS `medecin` (
  `idMedecin` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(254) CHARACTER SET latin1 DEFAULT NULL,
  `prenom` varchar(254) CHARACTER SET latin1 DEFAULT NULL,
  `genre` varchar(254) CHARACTER SET latin1 DEFAULT NULL,
  `fonction` int(11) DEFAULT NULL,
  `specialite` int(11) DEFAULT NULL,
  `subSpecialite` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `dateNaiss` date DEFAULT NULL,
  `anneeDiplome` date DEFAULT NULL,
  `adresse` varchar(254) CHARACTER SET latin1 DEFAULT NULL,
  `gouvernorat` int(11) DEFAULT NULL,
  `codePostale` int(11) DEFAULT NULL,
  `telbureau` varchar(254) CHARACTER SET utf8 COLLATE utf8_swedish_ci DEFAULT NULL,
  `telportable` varchar(254) CHARACTER SET utf8 COLLATE utf8_swedish_ci DEFAULT NULL,
  `fax` varchar(254) CHARACTER SET utf8 COLLATE utf8_swedish_ci DEFAULT NULL,
  `email` varchar(254) CHARACTER SET latin1 DEFAULT NULL,
  `password` varchar(254) CHARACTER SET utf8 COLLATE utf8_swedish_ci DEFAULT NULL,
  `faculte` int(11) DEFAULT NULL,
  `pays_fac` int(11) DEFAULT NULL,
  `gouv_fac` int(11) DEFAULT NULL,
  `imgProfile` varchar(254) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`idMedecin`),
  KEY `pays_fac` (`pays_fac`),
  KEY `gouv_fac` (`gouv_fac`),
  KEY `faculté` (`faculte`),
  KEY `fonction` (`fonction`),
  KEY `specialite` (`specialite`),
  KEY `gouvernorat` (`gouvernorat`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=69 ;

--
-- Contenu de la table `medecin`
--

INSERT INTO `medecin` (`idMedecin`, `nom`, `prenom`, `genre`, `fonction`, `specialite`, `subSpecialite`, `dateNaiss`, `anneeDiplome`, `adresse`, `gouvernorat`, `codePostale`, `telbureau`, `telportable`, `fax`, `email`, `password`, `faculte`, `pays_fac`, `gouv_fac`, `imgProfile`) VALUES
(49, 'ben ali', 'asma', 'Femme', 2, 18, '', '2012-07-12', '2014-03-07', 'rue etat unis', 1, 111, '1311', '', '', 'asma@yahoo.fr', 'asma0123', 1, 1, 1, NULL),
(50, 'Harun', 'ahmed', 'Homme', 1, 1, '', '2014-03-13', '2014-03-13', '', 3, 0, '', '', '', 'ahmed@gmail.com', 'ahmed123', 1, 1, 1, NULL),
(51, 'massoudi', 'mahdi', 'Homme', 1, 2, 'chirugien', '0000-00-00', '0000-00-00', '7ay ettadhamen', 1, 1235, '12131315', '25478935', '4949494949', 'mloukiwael@yahoo.fr', 'mahdi', 1, 1, 1, NULL),
(52, 'Nour', 'noureddine', 'Homme', 1, 4, 'chirugien', '1972-05-26', '2008-12-31', 'rue de bizerte', 2, 1254, '12131315', '1515646', '16646464', 'nour@hotmail.com', 'like', 5, 1, 13, NULL),
(54, 'ben ali', 'amir', 'Homme', 1, 1, 'chirugien', '2014-03-12', '2014-12-31', 'rue de bizerte', 1, 1254, '12131315', '', '4949494949', 'amirbenali@hotmail.fr', 'amir', 1, 1, 1, NULL),
(55, 'antri', 'hassen', 'Homme', 1, 1, 'chirugien', '2012-11-30', '2012-11-28', 'rue de bizerte', 1, 1254, '12131315', '1464', '4949494949', 'leadertechnologie@hotmail.fr', 'hassen', 2, 1, 12, NULL),
(67, 'Mallouki', 'Salem', 'Homme', 1, NULL, '', '1975-02-01', '2005-06-01', 'rue niger Hawariya', 10, 2500, '', '', '', 'salem@yahoo.fr', 'salem', 2, 1, 12, NULL),
(68, 'mlouki', 'fethi', 'Homme', 2, 11, '', '1980-04-02', '2005-05-12', 'bardou', 1, 2011, '71458126', '27566263', '71458127', 'fethimlouki@gmail.com', '123456', 1, 1, 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `medinstitut`
--

CREATE TABLE IF NOT EXISTS `medinstitut` (
  `id_medinstitut` int(11) NOT NULL AUTO_INCREMENT,
  `id_institut` int(11) NOT NULL,
  `idMedecin` int(11) NOT NULL,
  `occupation` int(11) DEFAULT NULL,
  `fonction` varchar(254) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dateDebut` date DEFAULT NULL,
  `dateFin` date DEFAULT NULL,
  `dateInsert` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dateUpdate` datetime DEFAULT NULL,
  PRIMARY KEY (`id_medinstitut`),
  KEY `id_institut` (`id_institut`),
  KEY `idMedecin` (`idMedecin`),
  KEY `occupation` (`occupation`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Contenu de la table `medinstitut`
--

INSERT INTO `medinstitut` (`id_medinstitut`, `id_institut`, `idMedecin`, `occupation`, `fonction`, `dateDebut`, `dateFin`, `dateInsert`, `dateUpdate`) VALUES
(1, 7, 52, 1, NULL, '2010-03-01', NULL, '2014-04-02 19:47:48', NULL),
(2, 7, 54, 2, NULL, '2012-03-21', NULL, '2014-04-02 19:47:48', NULL),
(3, 8, 52, 1, NULL, '2013-09-17', NULL, '2014-04-02 19:47:48', NULL),
(4, 9, 52, 1, NULL, '2013-12-17', NULL, '2014-04-02 19:47:48', NULL),
(7, 10, 52, 1, 'Membre', '2010-04-01', NULL, '2014-04-02 19:53:51', NULL),
(8, 11, 52, 1, NULL, '2010-04-05', NULL, '2014-04-03 19:05:26', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `idMessage` int(11) DEFAULT NULL,
  `objet` varchar(254) CHARACTER SET latin1 DEFAULT NULL,
  `date` varchar(254) CHARACTER SET latin1 DEFAULT NULL,
  `origine` int(11) DEFAULT NULL,
  `destination` int(11) DEFAULT NULL,
  `vue` int(11) DEFAULT NULL,
  `contenu` int(11) DEFAULT NULL,
  `idMsgParent` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `occupation`
--

CREATE TABLE IF NOT EXISTS `occupation` (
  `id_occup` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  PRIMARY KEY (`id_occup`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AUTO_INCREMENT=8 ;

--
-- Contenu de la table `occupation`
--

INSERT INTO `occupation` (`id_occup`, `label`) VALUES
(1, 'Médecin Généraliste'),
(2, 'Médecin Spécialiste'),
(3, 'Dentiste'),
(4, 'Etudiant en Médecine'),
(5, 'Internat'),
(6, 'Résidanat '),
(7, 'Autres');

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

CREATE TABLE IF NOT EXISTS `pays` (
  `id_pays` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(254) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  PRIMARY KEY (`id_pays`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=193 ;

--
-- Contenu de la table `pays`
--

INSERT INTO `pays` (`id_pays`, `label`) VALUES
(1, 'Tunisie'),
(2, 'Afghanistan'),
(3, 'Afrique du Sud'),
(4, 'Albanie'),
(5, 'Algérie'),
(6, 'Allemagne'),
(7, 'Andorre'),
(8, 'Angola'),
(9, 'Antigua-et-Barbuda'),
(10, 'Arabie Saoudite'),
(11, 'Argentine'),
(12, 'Arménie'),
(13, 'Australie'),
(14, 'Autriche'),
(15, 'Azerbaïdjan'),
(16, 'Bahamas'),
(17, 'Bahreïn'),
(18, 'Bangladesh'),
(19, 'Barbade'),
(20, 'Belarus'),
(21, 'Belgique'),
(22, 'Belize'),
(23, 'Bénin'),
(24, 'Bhoutan'),
(25, 'Birmanie'),
(26, 'Bolivie'),
(27, 'Bosnie-Herzégovine'),
(28, 'Botswana'),
(29, 'Brésil'),
(30, 'Brunei'),
(31, 'Bulgarie'),
(32, 'Burkina Faso'),
(33, 'Burundi'),
(34, 'Cambodge'),
(35, 'Cameroun'),
(36, 'Canada'),
(37, 'Cap-Vert'),
(38, 'Chili'),
(39, 'Chine'),
(40, 'Chypre'),
(41, 'Colombie'),
(42, 'Comores'),
(43, 'Corée du Nord'),
(44, 'Corée du Sud'),
(45, 'Costa Rica'),
(46, 'Côte-d''Ivoire'),
(47, 'Croatie'),
(48, 'Cuba'),
(49, 'Danemark'),
(50, 'Djibouti'),
(51, 'Dominique'),
(52, 'Egypte'),
(53, 'El Salvador'),
(54, 'Émirats Arabes Unis'),
(55, 'Equateur'),
(56, 'Érythrée'),
(57, 'Espagne'),
(58, 'Estonie'),
(59, 'États Fédérés de Micronésie'),
(60, 'États-Unis d''Amérique'),
(61, 'Ethiopie'),
(62, 'Fidji'),
(63, 'Finlande'),
(64, 'France'),
(65, 'Gabon'),
(66, 'Gambie'),
(67, 'Géorgie'),
(68, 'Ghana'),
(69, 'Grèce'),
(70, 'Grenade'),
(71, 'Guatemala'),
(72, 'Guinée'),
(73, 'Guinée Équatoriale'),
(74, 'Guinée-Bissau'),
(75, 'Guyana'),
(76, 'Haïti'),
(77, 'Honduras'),
(78, 'Hongrie'),
(79, 'Ile Maurice'),
(80, 'Îles Marshall'),
(81, 'Iles Salomon'),
(82, 'Inde'),
(83, 'Indonésie'),
(84, 'Irak'),
(85, 'Iran'),
(86, 'Irlande'),
(87, 'Islande'),
(88, 'Italie'),
(89, 'Jamaïque'),
(90, 'Japon'),
(91, 'Jordan'),
(92, 'Kazakhstan'),
(93, 'Kenya'),
(94, 'Kirghizistan'),
(95, 'Kiribati'),
(96, 'Koweït'),
(97, 'Laos'),
(98, 'Lesotho'),
(99, 'Lettonie'),
(100, 'Liban'),
(101, 'Liberia'),
(102, 'Libye'),
(103, 'Liechtenstein'),
(104, 'Lituanie'),
(105, 'Luxembourg'),
(106, 'Macédoine'),
(107, 'Madagascar'),
(108, 'Malaisie'),
(109, 'Malawi'),
(110, 'Maldives'),
(111, 'Mali'),
(112, 'Malte'),
(113, 'Maroc'),
(114, 'Mauritanie'),
(115, 'Mexique'),
(116, 'Moldova'),
(117, 'Monaco'),
(118, 'Mongolie'),
(119, 'Monténégro'),
(120, 'Mozambique'),
(121, 'Namibie'),
(122, 'Nauru'),
(123, 'Népal'),
(124, 'Nicaragua'),
(125, 'Niger'),
(126, 'Nigeria'),
(127, 'Norvège'),
(128, 'Nouvelle-Zélande'),
(129, 'Oman'),
(130, 'Ouganda'),
(131, 'Ouzbékistan'),
(132, 'Pakistan'),
(133, 'Palastine'),
(134, 'Panama'),
(135, 'Papouasie-Nouvelle-Guinée'),
(136, 'Paraguay'),
(137, 'Pays-Bas'),
(138, 'Pérou'),
(139, 'Philippines'),
(140, 'Pologne'),
(141, 'Portugal'),
(142, 'Qatar'),
(143, 'République Centrafricaine'),
(144, 'République Démocratique du Congo'),
(145, 'République Dominicaine'),
(146, 'République du Congo'),
(147, 'République Tchèque'),
(148, 'Roumanie'),
(149, 'Royaume-Uni'),
(150, 'Russie'),
(151, 'Rwanda'),
(152, 'Saint-Kitts-et-Nevis'),
(153, 'Saint-Marin'),
(154, 'Saint-Vincent-et-les Grenadines'),
(155, 'Sainte-Lucie'),
(156, 'Samoa'),
(157, 'Sao Tomé et Principe'),
(158, 'Sénégal'),
(159, 'Serbie'),
(160, 'Seychelles'),
(161, 'Sierra Leone'),
(162, 'Singapour'),
(163, 'Slovaquie'),
(164, 'Slovénie'),
(165, 'Somalie'),
(166, 'Soudan'),
(167, 'Sri Lanka'),
(168, 'Suède'),
(169, 'Suisse'),
(170, 'Suriname'),
(171, 'Swaziland'),
(172, 'Syrie'),
(173, 'Tadjikistan'),
(174, 'Taiwan'),
(175, 'Tanzanie'),
(176, 'Tchad'),
(177, 'Thaïlande'),
(178, 'Timor Oriental'),
(179, 'Togo'),
(180, 'Tonga'),
(181, 'Trinité-et-Tobago'),
(182, 'Turkménistan'),
(183, 'Turquie'),
(184, 'Tuvalu'),
(185, 'Ukraine'),
(186, 'Uruguay'),
(187, 'Vanuatu'),
(188, 'Venezuela'),
(189, 'Vietnam'),
(190, 'Yémen'),
(191, 'Zambie'),
(192, 'Zimbabwe');

-- --------------------------------------------------------

--
-- Structure de la table `publication`
--

CREATE TABLE IF NOT EXISTS `publication` (
  `idPub` int(11) DEFAULT NULL,
  `titre` varchar(254) CHARACTER SET latin1 DEFAULT NULL,
  `contenu` varchar(254) CHARACTER SET latin1 DEFAULT NULL,
  `visibilite` varchar(254) CHARACTER SET latin1 DEFAULT NULL,
  `type` varchar(254) CHARACTER SET latin1 DEFAULT NULL,
  `datePub` datetime DEFAULT NULL,
  `dateLastEdit` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `recompenses`
--

CREATE TABLE IF NOT EXISTS `recompenses` (
  `id_recomp` int(11) NOT NULL AUTO_INCREMENT,
  `idMedecin` int(11) DEFAULT NULL,
  `titre` varchar(254) CHARACTER SET latin1 DEFAULT NULL,
  `organisation` varchar(254) CHARACTER SET latin1 DEFAULT NULL,
  `description` varchar(300) CHARACTER SET latin1 DEFAULT NULL,
  `date` date DEFAULT NULL,
  `dateInsert` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `dateUpdate` datetime DEFAULT NULL,
  PRIMARY KEY (`id_recomp`),
  KEY `idMedecin` (`idMedecin`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Contenu de la table `recompenses`
--

INSERT INTO `recompenses` (`id_recomp`, `idMedecin`, `titre`, `organisation`, `description`, `date`, `dateInsert`, `dateUpdate`) VALUES
(1, 52, 'chef membre', 'Croissant Rouge Tunisien', 'récompense les meilleurs A l’occasion du Congrès national du Centre des Jeunes Dirigeants', '2014-01-15', '2014-04-02 18:32:28', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `specialites`
--

CREATE TABLE IF NOT EXISTS `specialites` (
  `id_spec` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_spec`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AUTO_INCREMENT=52 ;

--
-- Contenu de la table `specialites`
--

INSERT INTO `specialites` (`id_spec`, `label`) VALUES
(1, 'Chirurgie générale'),
(2, 'Chirurgie pédiatrique'),
(3, 'Chirurgie carcinologique'),
(4, 'Chirurgie cardio-vasculaire'),
(5, 'Chirurgie vasculaire périphérique'),
(6, 'Chirurgie neurologique'),
(7, 'Chirurgie orthopédique et traumatologique'),
(8, 'Chirurgie plastique, réparatrice et esthétique'),
(9, 'Chirurgie urologique'),
(10, 'Gynéco-obstétrique'),
(11, 'ORL'),
(12, 'Stomatologie et chirurgie maxillo-faciale'),
(13, 'Ophtalmologie'),
(14, 'Chirurgie thoracique'),
(15, 'Anesthésie réanimation'),
(16, 'Psychiatrie'),
(17, 'Pédo-psychiatrie'),
(18, 'Imagerie médicale'),
(19, 'Anatomie'),
(20, 'Anatomie et cytologie pathologiques'),
(21, 'Carcinologie médicale'),
(22, 'Cardiologie'),
(23, 'Dermatologie'),
(24, 'Endocrinologie'),
(25, 'Gastro-entérologie'),
(26, 'Hématologie clinique'),
(27, 'Maladies infectieuses'),
(28, 'Médecine d’urgence'),
(29, 'Médecine de travail'),
(30, 'Médecine interne'),
(31, 'Médecine légale'),
(32, 'Médecine physique, rééducation et réadaptation fonctionnelle'),
(33, 'Médecine préventive et communautaire'),
(34, 'Néphrologie'),
(35, 'Neurologie'),
(36, 'Nutrition et maladies nutritionnelles'),
(37, 'Pédiatrie'),
(38, 'Pneumologie'),
(39, 'Radiothérapie carcinologique'),
(40, 'Réanimation médicale'),
(41, 'Rhumatologie'),
(42, 'Biophysique et médecine nucléaire'),
(43, 'Génétique'),
(44, 'Biologie médicale option biochimie'),
(45, 'Biologie médicale option hématologie'),
(46, 'Biologie médicale option parasitologie'),
(47, 'Biologie médicale option microbiologie'),
(48, 'Biologie médicale option immunologie'),
(49, 'Histo-embryologie'),
(50, 'Pharmacologie'),
(51, 'Physiologie et explorations fonctionnelles');

-- --------------------------------------------------------

--
-- Structure de la table `typeinstitut`
--

CREATE TABLE IF NOT EXISTS `typeinstitut` (
  `idType` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(254) CHARACTER SET latin1 DEFAULT NULL,
  `description` varchar(254) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`idType`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AUTO_INCREMENT=7 ;

--
-- Contenu de la table `typeinstitut`
--

INSERT INTO `typeinstitut` (`idType`, `nom`, `description`) VALUES
(1, ' Facultés de Médecine', NULL),
(2, 'Facultés de Médecine  Dentaire', NULL),
(3, 'Hopital', 'Etablissement Publics de santé'),
(4, 'Clinique', 'Etablissement Privé de santé'),
(5, 'Association', 'Non Gouvernementale'),
(6, 'Assurance', 'Etablissement Public');

-- --------------------------------------------------------

--
-- Structure de la table `typerelation`
--

CREATE TABLE IF NOT EXISTS `typerelation` (
  `idTypeR` int(11) DEFAULT NULL,
  `nom` varchar(254) CHARACTER SET latin1 DEFAULT NULL,
  `description` varchar(254) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `activites`
--
ALTER TABLE `activites`
  ADD CONSTRAINT `activites_ibfk_1` FOREIGN KEY (`idMedecin`) REFERENCES `medecin` (`idMedecin`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `certification`
--
ALTER TABLE `certification`
  ADD CONSTRAINT `certification_ibfk_1` FOREIGN KEY (`idMedecin`) REFERENCES `medecin` (`idMedecin`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `doclangues`
--
ALTER TABLE `doclangues`
  ADD CONSTRAINT `doclangues_ibfk_1` FOREIGN KEY (`idMedecin`) REFERENCES `medecin` (`idMedecin`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `doclangues_ibfk_2` FOREIGN KEY (`id_langue`) REFERENCES `langues` (`id_langue`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `experience`
--
ALTER TABLE `experience`
  ADD CONSTRAINT `experience_ibfk_1` FOREIGN KEY (`idMedecin`) REFERENCES `medecin` (`idMedecin`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `experience_ibfk_2` FOREIGN KEY (`id_institut`) REFERENCES `institution` (`id_institut`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `formation`
--
ALTER TABLE `formation`
  ADD CONSTRAINT `formation_ibfk_1` FOREIGN KEY (`idMedecin`) REFERENCES `medecin` (`idMedecin`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `formation_ibfk_2` FOREIGN KEY (`institution`) REFERENCES `institution` (`id_institut`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `institution`
--
ALTER TABLE `institution`
  ADD CONSTRAINT `institution_ibfk_2` FOREIGN KEY (`gouvernorat`) REFERENCES `gouvernorat` (`id_gouv`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `institution_ibfk_3` FOREIGN KEY (`type`) REFERENCES `typeinstitut` (`idType`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `institution_ibfk_4` FOREIGN KEY (`pays`) REFERENCES `pays` (`id_pays`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `medecin`
--
ALTER TABLE `medecin`
  ADD CONSTRAINT `medecin_ibfk_2` FOREIGN KEY (`pays_fac`) REFERENCES `institution` (`pays`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `medecin_ibfk_3` FOREIGN KEY (`gouv_fac`) REFERENCES `institution` (`gouvernorat`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `medecin_ibfk_4` FOREIGN KEY (`faculte`) REFERENCES `institution` (`id_institut`),
  ADD CONSTRAINT `medecin_ibfk_5` FOREIGN KEY (`fonction`) REFERENCES `occupation` (`id_occup`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `medecin_ibfk_6` FOREIGN KEY (`specialite`) REFERENCES `specialites` (`id_spec`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `medecin_ibfk_7` FOREIGN KEY (`gouvernorat`) REFERENCES `gouvernorat` (`id_gouv`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `medinstitut`
--
ALTER TABLE `medinstitut`
  ADD CONSTRAINT `medinstitut_ibfk_1` FOREIGN KEY (`id_institut`) REFERENCES `institution` (`id_institut`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `medinstitut_ibfk_2` FOREIGN KEY (`idMedecin`) REFERENCES `medecin` (`idMedecin`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `medinstitut_ibfk_3` FOREIGN KEY (`occupation`) REFERENCES `occupation` (`id_occup`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `recompenses`
--
ALTER TABLE `recompenses`
  ADD CONSTRAINT `recompenses_ibfk_1` FOREIGN KEY (`idMedecin`) REFERENCES `medecin` (`idMedecin`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
