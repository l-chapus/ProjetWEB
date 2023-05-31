-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           10.11.2-MariaDB - mariadb.org binary distribution
-- SE du serveur:                Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour esirem_galactique
CREATE DATABASE IF NOT EXISTS `esirem_galactique` /*!40100 DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci */;
USE `esirem_galactique`;

-- Listage de la structure de la table esirem_galactique. defense
CREATE TABLE IF NOT EXISTS `defense` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idRecherche` int(11) DEFAULT NULL,
  `niveauRecherche` int(11) DEFAULT NULL,
  `nom` varchar(50) NOT NULL DEFAULT '',
  `metal` int(11) NOT NULL DEFAULT 0,
  `energie` int(11) NOT NULL DEFAULT 0,
  `deuterium` int(11) NOT NULL DEFAULT 0,
  `tempsConstruction` int(11) NOT NULL,
  `pointAttaque` int(11) NOT NULL DEFAULT 0,
  `pointDéfense` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Listage des données de la table esirem_galactique.defense : ~3 rows (environ)
/*!40000 ALTER TABLE `defense` DISABLE KEYS */;
INSERT IGNORE INTO `defense` (`id`, `idRecherche`, `niveauRecherche`, `nom`, `metal`, `energie`, `deuterium`, `tempsConstruction`, `pointAttaque`, `pointDéfense`) VALUES
	(1, 3, 1, 'artillerie_laser', 1500, 0, 300, 10, 100, 25),
	(2, 4, 1, 'canon_ions', 5000, 0, 1000, 40, 250, 200),
	(3, 5, 1, 'bouclier', 10000, 1000, 5000, 60, 0, 2000);
/*!40000 ALTER TABLE `defense` ENABLE KEYS */;

-- Listage de la structure de la table esirem_galactique. galaxie
CREATE TABLE IF NOT EXISTS `galaxie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUnivers` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_galaxie_univers` (`idUnivers`),
  CONSTRAINT `FK_galaxie_univers` FOREIGN KEY (`idUnivers`) REFERENCES `univers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Listage de la structure de la table esirem_galactique. infrastructure
CREATE TABLE IF NOT EXISTS `infrastructure` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idPlanete` int(11) NOT NULL,
  `idInstallations` int(11) DEFAULT NULL,
  `idMinier` int(11) DEFAULT NULL,
  `idDefense` int(11) DEFAULT NULL,
  `niveau` int(11) NOT NULL DEFAULT 0,
  `dateFin` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_infractructure_planete` (`idPlanete`),
  KEY `FK_infractructure_installations` (`idInstallations`),
  KEY `FK_infractructure_minier` (`idMinier`),
  KEY `FK_infractructure_defense` (`idDefense`),
  CONSTRAINT `FK_infractructure_defense` FOREIGN KEY (`idDefense`) REFERENCES `defense` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_infractructure_installations` FOREIGN KEY (`idInstallations`) REFERENCES `installations` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_infractructure_minier` FOREIGN KEY (`idMinier`) REFERENCES `minier` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_infractructure_planete` FOREIGN KEY (`idPlanete`) REFERENCES `planete` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


-- Listage de la structure de la table esirem_galactique. installations
CREATE TABLE IF NOT EXISTS `installations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idRecherche` int(11) DEFAULT NULL,
  `niveauRecherche` int(11) DEFAULT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `metal` int(11) DEFAULT NULL,
  `energie` int(11) DEFAULT NULL,
  `tempsConstruction` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Listage des données de la table esirem_galactique.installations : ~3 rows (environ)
/*!40000 ALTER TABLE `installations` DISABLE KEYS */;
INSERT IGNORE INTO `installations` (`id`, `idRecherche`, `niveauRecherche`, `nom`, `metal`, `energie`, `tempsConstruction`) VALUES
	(1, NULL, NULL, 'laboratoire_recheche', 1000, 500, 50),
	(2, NULL, NULL, 'chantier_spatial', 500, 500, 50),
	(3, 2, 5, 'usine_nanite', 10000, 5000, 600);
/*!40000 ALTER TABLE `installations` ENABLE KEYS */;

-- Listage de la structure de la table esirem_galactique. minier
CREATE TABLE IF NOT EXISTS `minier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idRecherche` int(11) DEFAULT NULL,
  `niveauRecherche` int(11) DEFAULT NULL,
  `nom` varchar(50) NOT NULL,
  `metal` int(11) NOT NULL DEFAULT 0,
  `energie` int(11) NOT NULL DEFAULT 0,
  `deuterium` int(11) NOT NULL DEFAULT 0,
  `tempsConstruction` int(11) NOT NULL,
  `production` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Listage des données de la table esirem_galactique.minier : ~4 rows (environ)
/*!40000 ALTER TABLE `minier` DISABLE KEYS */;
INSERT IGNORE INTO `minier` (`id`, `idRecherche`, `niveauRecherche`, `nom`, `metal`, `energie`, `deuterium`, `tempsConstruction`, `production`) VALUES
	(1, NULL, NULL, 'mine_metal', 100, 10, 0, 10, 3),
	(2, NULL, NULL, 'synthe_deuterium', 200, 50, 0, 25, 1),
	(3, NULL, NULL, 'centrale_solaire', 150, 0, 20, 10, 20),
	(4, 1, 10, 'centrale_fusion', 5000, 0, 2000, 120, 50);
/*!40000 ALTER TABLE `minier` ENABLE KEYS */;

-- Listage de la structure de la table esirem_galactique. planete
CREATE TABLE IF NOT EXISTS `planete` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idPosition` int(11) NOT NULL,
  `idSystemSolaire` int(11) NOT NULL,
  `idUnivers` int(11) NOT NULL,
  `idUtilisateurs` int(11) DEFAULT NULL,
  `nom` varchar(50) NOT NULL,
  `NumImage` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_planete_position` (`idPosition`),
  KEY `FK_planete_systemeSolaire` (`idSystemSolaire`),
  KEY `FK_planete_univers` (`idUnivers`),
  KEY `FK_planete_utilisateurs` (`idUtilisateurs`),
  CONSTRAINT `FK_planete_position` FOREIGN KEY (`idPosition`) REFERENCES `position` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_planete_systemSolaire` FOREIGN KEY (`idSystemSolaire`) REFERENCES `systemsolaire` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_planete_univers` FOREIGN KEY (`idUnivers`) REFERENCES `univers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_planete_utilisateurs` FOREIGN KEY (`idUtilisateurs`) REFERENCES `utilisateurs` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


-- Listage de la structure de la table esirem_galactique. pseudo
CREATE TABLE IF NOT EXISTS `pseudo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Listage des données de la table esirem_galactique.pseudo : ~197 rows (environ)
/*!40000 ALTER TABLE `pseudo` DISABLE KEYS */;
INSERT IGNORE INTO `pseudo` (`id`, `nom`) VALUES
	(1, 'Nova Frost'),
	(2, 'Crimson Blaze'),
	(3, 'Shadow Hunter'),
	(4, 'Iron Phoenix'),
	(5, 'Mystic Storm'),
	(6, 'Blaze Runner'),
	(7, 'Phantom Assassin'),
	(8, 'Arctic Wolf'),
	(9, 'Cyber Knight'),
	(10, 'Comet Crusader'),
	(11, 'Neon Ninja'),
	(12, 'Eclipse Fury'),
	(13, 'Thunderbolt Titan'),
	(14, 'Starlight Sentinel'),
	(15, 'Solar Samurai'),
	(16, 'Nightshade Ninja'),
	(17, 'Galactic Guardian'),
	(18, 'Firebrand Fury'),
	(19, 'Tempest Tamer'),
	(20, 'Emerald Enigma'),
	(21, 'Captain Falcon'),
	(22, 'Commander Hawk'),
	(23, 'General Falconer'),
	(24, 'Winged Warrior'),
	(25, 'Sky Sentinel'),
	(26, 'Soaring Eagle'),
	(27, 'High-Flying Hero'),
	(28, 'Flight Commander'),
	(29, 'Airborne Ace'),
	(30, 'Sky Captain'),
	(31, 'Wing Commander'),
	(32, 'Sky Hunter'),
	(33, 'Aerial Avenger'),
	(34, 'Flying Fury'),
	(35, 'Sky Guardian'),
	(36, 'Winged Avenger'),
	(37, 'Sky Soldier'),
	(38, 'Air Force Angel'),
	(39, 'Winged Wonder'),
	(40, 'Cloud Crusader'),
	(41, 'Iron Bear'),
	(42, 'Steel Saber'),
	(43, 'Shadow Stalker'),
	(44, 'Mystic Mage'),
	(45, 'Blaze Bolt'),
	(46, 'Phantom Fury'),
	(47, 'Arctic Archer'),
	(48, 'Cyber Crusader'),
	(49, 'Comet Challenger'),
	(50, 'Neon Knight'),
	(51, 'Eclipse Enigma'),
	(52, 'Thunder Tiger'),
	(53, 'Starlight Savior'),
	(54, 'Solar Sentinel'),
	(55, 'Nightshade Ninja'),
	(56, 'Galactic Guardian'),
	(57, 'Firebrand Falcon'),
	(58, 'Tempest Titan'),
	(59, 'Emerald Eagle'),
	(60, 'Ruby Raven'),
	(61, 'Dark Dragon'),
	(62, 'Ice Inferno'),
	(63, 'Storm Sentinel'),
	(64, 'Mystic Master'),
	(65, 'Blaze Blaze'),
	(66, 'Phantom Phoenix'),
	(67, 'Frozen Falcon'),
	(68, 'Cyber Crusade'),
	(69, 'Comet Conqueror'),
	(70, 'Neon Nighthawk'),
	(71, 'Eclipse Elixir'),
	(72, 'Thunder Titan'),
	(73, 'Starlight Savior'),
	(74, 'Solar Spearhead'),
	(75, 'Galactic Gladiator'),
	(76, 'Firebrand Furyhawk'),
	(77, 'Tempest Templar'),
	(78, 'Emerald Enchanter'),
	(79, 'Ruby Raptor'),
	(80, 'Frostbite Fury'),
	(81, 'Shadow Shogun'),
	(82, 'Thunderous Tempest'),
	(83, 'Phoenix Paladin'),
	(84, 'Venomous Viper'),
	(85, 'Crimson Crusader'),
	(86, 'Mystic Mercenary'),
	(87, 'Cosmic Commander'),
	(88, 'Galactic Gladiator'),
	(89, 'Iron Invincible'),
	(90, 'Sentinel Samurai'),
	(91, 'Nightshade Ninja'),
	(92, 'Serpent Slayer'),
	(93, 'Dragon Defender'),
	(94, 'Saber Sentinel'),
	(95, 'Titan Tornado'),
	(96, 'Inferno Inquisitor'),
	(97, 'Cyclone Champion'),
	(98, 'Mystic Maverick'),
	(99, 'Frost Fang'),
	(100, 'Shadow Sage'),
	(101, 'Thunder Thief'),
	(102, 'Phoenix Fury'),
	(103, 'Venom Vixen'),
	(104, 'Crimson Claw'),
	(105, 'Mystic Mind'),
	(106, 'Cosmic Crusader'),
	(107, 'Galactic Guardian'),
	(108, 'Iron Illusionist'),
	(109, 'Sentinel Sabre'),
	(110, 'Thunderbird Titan'),
	(111, 'Nightshade Ninja'),
	(112, 'Serpent Savior'),
	(113, 'Dragon Defender'),
	(114, 'Saber Sentinel'),
	(115, 'Titan Tactician'),
	(116, 'Inferno Igniter'),
	(117, 'Cyclone Conqueror'),
	(118, 'Mystic Marshal'),
	(119, 'Shadow Sentinel'),
	(120, 'Crimson Crusader'),
	(121, 'Dark Destroyer'),
	(122, 'Arcane Avenger'),
	(123, 'Frost Fury'),
	(124, 'Thunderbolt Titan'),
	(125, 'Mystic Marauder'),
	(126, 'Emerald Enforcer'),
	(127, 'Steel Storm'),
	(128, 'Golden Gladiator'),
	(129, 'Silver Sentinel'),
	(130, 'Cosmic Crusader'),
	(131, 'Inferno Invader'),
	(132, 'Jade Juggernaut'),
	(133, 'Phoenix Fury'),
	(134, 'Shadow Saber'),
	(135, 'Cosmic Champion'),
	(136, 'Diamond Defender'),
	(137, 'Neon Nihilist'),
	(138, 'Obsidian Overlord'),
	(139, 'Quantum Quicksilver'),
	(140, 'Sapphire Samurai'),
	(141, 'Void Vindicator'),
	(142, 'Arctic Avenger'),
	(143, 'Blaze Battler'),
	(144, 'Cosmic Corsair'),
	(145, 'Diamond Dynamo'),
	(146, 'Electric Enigma'),
	(147, 'Flame Fighter'),
	(148, 'Ghostly Guardian'),
	(149, 'Hurricane Hunter'),
	(150, 'Iron Idol'),
	(151, 'Jade Jaguar'),
	(152, 'Knightly Knight'),
	(153, 'Lunar Lancer'),
	(154, 'Mystic Mastermind'),
	(155, 'Neon Ninja'),
	(156, 'Omega Oppressor'),
	(157, 'Platinum Paladin'),
	(158, 'Quantum Queen'),
	(159, 'Ruby Ranger'),
	(160, 'Shadow Shogun'),
	(161, 'Thunderous Titan'),
	(162, 'Ultraviolet Utopian'),
	(163, 'Vicious Vandal'),
	(164, 'Winter Warrior'),
	(165, 'X-treme X-ecutioner'),
	(166, 'Yellow Yaksha'),
	(167, 'Zombie Zapper'),
	(168, 'Abyssal Assassin'),
	(169, 'Black Blade'),
	(170, 'Celestial Crusader'),
	(171, 'Dark Druid'),
	(172, 'Electric Eagle'),
	(173, 'Frozen Fury'),
	(174, 'Ghostly Ghoul'),
	(175, 'Holy Hunter'),
	(176, 'Icy Idol'),
	(177, 'Jade Jester'),
	(178, 'Karmic Knight'),
	(179, 'Lunar Lion'),
	(180, 'Mystic Mage'),
	(181, 'Night Nihilist'),
	(182, 'Onyx Oracle'),
	(183, 'Phoenix Phenom'),
	(184, 'Quantum Quasar'),
	(185, 'Ruby Reaper'),
	(186, 'Silver Serpent'),
	(187, 'Urban Unicorn'),
	(188, 'Vampire Vixen'),
	(189, 'White Witch'),
	(190, 'X-treme Xenophile'),
	(191, 'Yellow Yeti'),
	(192, 'Zombie Zealot'),
	(193, 'Alpha Assassin'),
	(194, 'Bloodthirsty Butcher'),
	(195, 'Cosmic Conqueror'),
	(196, 'Dark Demon'),
	(197, 'Electric Executioner');
/*!40000 ALTER TABLE `pseudo` ENABLE KEYS */;

-- Listage de la structure de la table esirem_galactique. recherche
CREATE TABLE IF NOT EXISTS `recherche` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUtilisateur` int(11) NOT NULL,
  `idPlanete` int(11) NOT NULL,
  `idTechnologie` int(11) NOT NULL,
  `niveau` int(11) DEFAULT 0,
  `detaFin` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_recherche_univers` (`idUtilisateur`) USING BTREE,
  KEY `FK_recherche_planete` (`idPlanete`),
  KEY `FK_recherche_Technologie` (`idTechnologie`),
  CONSTRAINT `FK_recherche_Technologie` FOREIGN KEY (`idTechnologie`) REFERENCES `technologie` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_recherche_planete` FOREIGN KEY (`idPlanete`) REFERENCES `planete` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_recherche_utilisateurs` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateurs` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Listage des données de la table esirem_galactique.recherche : ~0 rows (environ)
/*!40000 ALTER TABLE `recherche` DISABLE KEYS */;
/*!40000 ALTER TABLE `recherche` ENABLE KEYS */;

-- Listage de la structure de la table esirem_galactique. ressources
CREATE TABLE IF NOT EXISTS `ressources` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUtilisateurs` int(11) DEFAULT NULL,
  `idUnivers` int(11) DEFAULT NULL,
  `metal` int(11) DEFAULT NULL,
  `deuterium` int(11) DEFAULT NULL,
  `energie` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_ressources_utilisateur` (`idUtilisateurs`),
  KEY `FK_ressources_univers` (`idUnivers`),
  CONSTRAINT `FK_ressource_univers` FOREIGN KEY (`idUnivers`) REFERENCES `univers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_ressource_utilisateur` FOREIGN KEY (`idUtilisateurs`) REFERENCES `utilisateurs` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Listage de la structure de la table esirem_galactique. systemsolaire
CREATE TABLE IF NOT EXISTS `systemsolaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idGalaxie` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_systemeSolaire_galaxie` (`idGalaxie`),
  CONSTRAINT `FK_systemesolaire_galaxie` FOREIGN KEY (`idGalaxie`) REFERENCES `galaxie` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


-- Listage de la structure de la table esirem_galactique. technologie
CREATE TABLE IF NOT EXISTS `technologie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idTechnologieMere1` int(11) DEFAULT NULL,
  `niveauTechnologieMere1` int(11) DEFAULT NULL,
  `idTechnologieMere2` int(11) DEFAULT NULL,
  `niveauTechnologieMere2` int(11) DEFAULT NULL,
  `nom` varchar(50) NOT NULL,
  `coutDeuterium` int(11) DEFAULT NULL,
  `coutMetal` int(11) DEFAULT NULL,
  `coutTemps` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_Technologie_Technologie` (`idTechnologieMere1`) USING BTREE,
  CONSTRAINT `FK_Technologie_Technologie` FOREIGN KEY (`idTechnologieMere1`) REFERENCES `technologie` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Listage des données de la table esirem_galactique.technologie : ~6 rows (environ)
/*!40000 ALTER TABLE `technologie` DISABLE KEYS */;
INSERT IGNORE INTO `technologie` (`id`, `idTechnologieMere1`, `niveauTechnologieMere1`, `idTechnologieMere2`, `niveauTechnologieMere2`, `nom`, `coutDeuterium`, `coutMetal`, `coutTemps`) VALUES
	(1, NULL, NULL, NULL, NULL, 'energie', 100, NULL, 4),
	(2, NULL, NULL, NULL, NULL, 'intelligence_artificielle', 200, NULL, 10),
	(3, 1, 5, NULL, NULL, 'laser', 300, NULL, 2),
	(4, 3, 5, NULL, NULL, 'ions', 300, NULL, 8),
	(5, 1, 8, 4, 2, 'bouclier', 1000, NULL, 5),
	(6, NULL, NULL, NULL, NULL, 'armement', 200, 500, 6);
/*!40000 ALTER TABLE `technologie` ENABLE KEYS */;

-- Listage de la structure de la table esirem_galactique. univers
CREATE TABLE IF NOT EXISTS `univers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


-- Listage de la structure de la table esirem_galactique. utilisateurs
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` text NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
