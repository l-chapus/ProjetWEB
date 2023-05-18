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
INSERT INTO `defense` (`idRecherche`, `niveauRecherche`, `nom`, `metal`, `energie`, `deuterium`, `tempsConstruction`, `pointAttaque`, `pointDéfense`) VALUES
	(NULL, 1, 'Artillerie laser', 1500, 0, 300, 10, 100, 25),
	(NULL, 1, 'Canon à ions', 5000, 0, 1000, 40, 250, 200),
	(NULL, 1, 'Bouclier', 10000, 1000, 5000, 60, 0, 2000);
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

-- Listage des données de la table esirem_galactique.infrastructure : ~0 rows (environ)
/*!40000 ALTER TABLE `infrastructure` DISABLE KEYS */;
/*!40000 ALTER TABLE `infrastructure` ENABLE KEYS */;

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
INSERT INTO `installations` (`idRecherche`, `niveauRecherche`, `nom`, `metal`, `energie`, `tempsConstruction`) VALUES
	(NULL, NULL, 'Laboratoire de recherche', 1000, 500, 50),
	(NULL, NULL, 'Chantier spatial', 500, 500, 50),
	(NULL, 5, 'Usine de nanites', 10000, 5000, 600);
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
INSERT INTO `minier` (`idRecherche`, `niveauRecherche`, `nom`, `metal`, `energie`, `deuterium`, `tempsConstruction`, `production`) VALUES
	(NULL, NULL, 'Mine de métal', 100, 10, 0, 10, 3),
	(NULL, NULL, 'Synthétiseur de deutérium', 200, 50, 0, 25, 1),
	(NULL, NULL, 'Centrale solaire', 150, 0, 20, 10, 20),
	(NULL, 10, 'Centrale à fusion', 5000, 0, 2000, 120, 50);
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
  CONSTRAINT `FK_planete_position` FOREIGN KEY (`idPosition`) REFERENCES `posistion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_planete_systemSolaire` FOREIGN KEY (`idSystemSolaire`) REFERENCES `systemsolaire` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_planete_univers` FOREIGN KEY (`idUnivers`) REFERENCES `univers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_planete_utilisateurs` FOREIGN KEY (`idUtilisateurs`) REFERENCES `utilisateurs` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;



-- Listage de la structure de la table esirem_galactique. posistion
CREATE TABLE IF NOT EXISTS `posistion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `taille` int(11) DEFAULT NULL,
  `bonusSolaire` int(11) DEFAULT NULL,
  `bonusMetal` int(11) DEFAULT NULL,
  `bonusDeuterium` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Listage des données de la table esirem_galactique.posistion : ~10 rows (environ)
/*!40000 ALTER TABLE `posistion` DISABLE KEYS */;
INSERT INTO `posistion` (`taille`, `bonusSolaire`, `bonusMetal`, `bonusDeuterium`) VALUES
	(90, 30, 0, -15),
	(100, 20, 5, -10),
	(110, 10, 10, -5),
	(120, 5, 15, 0),
	(130, 0, 20, 0),
	(130, 0, 15, 10),
	(120, -10, 10, 15),
	(110, -20, 5, 20),
	(100, -30, 0, 25),
	(90, -40, -5, 30);
/*!40000 ALTER TABLE `posistion` ENABLE KEYS */;

-- Listage de la structure de la table esirem_galactique. pseudo
CREATE TABLE IF NOT EXISTS `pseudo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Listage des données de la table esirem_galactique.pseudo : ~197 rows (environ)
/*!40000 ALTER TABLE `pseudo` DISABLE KEYS */;
INSERT INTO `pseudo` (`nom`) VALUES
	('Nova Frost'),
	('Crimson Blaze'),
	('Shadow Hunter'),
	('Iron Phoenix'),
	('Mystic Storm'),
	('Blaze Runner'),
	('Phantom Assassin'),
	('Arctic Wolf'),
	('Cyber Knight'),
	('Comet Crusader'),
	('Neon Ninja'),
	('Eclipse Fury'),
	('Thunderbolt Titan'),
	('Starlight Sentinel'),
	('Solar Samurai'),
	('Nightshade Ninja'),
	('Galactic Guardian'),
	('Firebrand Fury'),
	('Tempest Tamer'),
	('Emerald Enigma'),
	('Captain Falcon'),
	('Commander Hawk'),
	('General Falconer'),
	('Winged Warrior'),
	('Sky Sentinel'),
	('Soaring Eagle'),
	('High-Flying Hero'),
	('Flight Commander'),
	('Airborne Ace'),
	('Sky Captain'),
	('Wing Commander'),
	('Sky Hunter'),
	('Aerial Avenger'),
	('Flying Fury'),
	('Sky Guardian'),
	('Winged Avenger'),
	('Sky Soldier'),
	('Air Force Angel'),
	('Winged Wonder'),
	('Cloud Crusader'),
	('Iron Bear'),
	('Steel Saber'),
	('Shadow Stalker'),
	('Mystic Mage'),
	('Blaze Bolt'),
	('Phantom Fury'),
	('Arctic Archer'),
	('Cyber Crusader'),
	('Comet Challenger'),
	('Neon Knight'),
	('Eclipse Enigma'),
	('Thunder Tiger'),
	('Starlight Savior'),
	('Solar Sentinel'),
	('Nightshade Ninja'),
	('Galactic Guardian'),
	('Firebrand Falcon'),
	('Tempest Titan'),
	('Emerald Eagle'),
	('Ruby Raven'),
	('Dark Dragon'),
	('Ice Inferno'),
	('Storm Sentinel'),
	('Mystic Master'),
	('Blaze Blaze'),
	('Phantom Phoenix'),
	('Frozen Falcon'),
	('Cyber Crusade'),
	('Comet Conqueror'),
	('Neon Nighthawk'),
	('Eclipse Elixir'),
	('Thunder Titan'),
	('Starlight Savior'),
	('Solar Spearhead'),
	('Galactic Gladiator'),
	('Firebrand Furyhawk'),
	('Tempest Templar'),
	('Emerald Enchanter'),
	('Ruby Raptor'),
	('Frostbite Fury'),
	('Shadow Shogun'),
	('Thunderous Tempest'),
	('Phoenix Paladin'),
	('Venomous Viper'),
	('Crimson Crusader'),
	('Mystic Mercenary'),
	('Cosmic Commander'),
	('Galactic Gladiator'),
	('Iron Invincible'),
	('Sentinel Samurai'),
	('Nightshade Ninja'),
	('Serpent Slayer'),
	('Dragon Defender'),
	('Saber Sentinel'),
	('Titan Tornado'),
	('Inferno Inquisitor'),
	('Cyclone Champion'),
	('Mystic Maverick'),
	('Frost Fang'),
	('Shadow Sage'),
	('Thunder Thief'),
	('Phoenix Fury'),
	('Venom Vixen'),
	('Crimson Claw'),
	('Mystic Mind'),
	('Cosmic Crusader'),
	('Galactic Guardian'),
	('Iron Illusionist'),
	('Sentinel Sabre'),
	('Thunderbird Titan'),
	('Nightshade Ninja'),
	('Serpent Savior'),
	('Dragon Defender'),
	('Saber Sentinel'),
	('Titan Tactician'),
	('Inferno Igniter'),
	('Cyclone Conqueror'),
	('Mystic Marshal'),
	('Shadow Sentinel'),
	('Crimson Crusader'),
	('Dark Destroyer'),
	('Arcane Avenger'),
	('Frost Fury'),
	('Thunderbolt Titan'),
	('Mystic Marauder'),
	('Emerald Enforcer'),
	('Steel Storm'),
	('Golden Gladiator'),
	('Silver Sentinel'),
	('Cosmic Crusader'),
	('Inferno Invader'),
	('Jade Juggernaut'),
	('Phoenix Fury'),
	('Shadow Saber'),
	('Cosmic Champion'),
	('Diamond Defender'),
	('Neon Nihilist'),
	('Obsidian Overlord'),
	('Quantum Quicksilver'),
	('Sapphire Samurai'),
	('Void Vindicator'),
	('Arctic Avenger'),
	('Blaze Battler'),
	('Cosmic Corsair'),
	('Diamond Dynamo'),
	('Electric Enigma'),
	('Flame Fighter'),
	('Ghostly Guardian'),
	('Hurricane Hunter'),
	('Iron Idol'),
	('Jade Jaguar'),
	('Knightly Knight'),
	('Lunar Lancer'),
	('Mystic Mastermind'),
	('Neon Ninja'),
	('Omega Oppressor'),
	('Platinum Paladin'),
	('Quantum Queen'),
	('Ruby Ranger'),
	('Shadow Shogun'),
	('Thunderous Titan'),
	('Ultraviolet Utopian'),
	('Vicious Vandal'),
	('Winter Warrior'),
	('X-treme X-ecutioner'),
	('Yellow Yaksha'),
	('Zombie Zapper'),
	('Abyssal Assassin'),
	('Black Blade'),
	('Celestial Crusader'),
	('Dark Druid'),
	('Electric Eagle'),
	('Frozen Fury'),
	('Ghostly Ghoul'),
	('Holy Hunter'),
	('Icy Idol'),
	('Jade Jester'),
	('Karmic Knight'),
	('Lunar Lion'),
	('Mystic Mage'),
	('Night Nihilist'),
	('Onyx Oracle'),
	('Phoenix Phenom'),
	('Quantum Quasar'),
	('Ruby Reaper'),
	('Silver Serpent'),
	('Urban Unicorn'),
	('Vampire Vixen'),
	('White Witch'),
	('X-treme Xenophile'),
	('Yellow Yeti'),
	('Zombie Zealot'),
	('Alpha Assassin'),
	('Bloodthirsty Butcher'),
	('Cosmic Conqueror'),
	('Dark Demon'),
	('Electric Executioner');
/*!40000 ALTER TABLE `pseudo` ENABLE KEYS */;

-- Listage de la structure de la table esirem_galactique. recherche
CREATE TABLE IF NOT EXISTS `recherche` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idRechercheMere` int(11) DEFAULT NULL,
  `NiveauRechercheMere` int(11) DEFAULT NULL,
  `idUtilisateur` int(11) NOT NULL,
  `idPlanete` int(11) DEFAULT NULL,
  `nom` varchar(50) NOT NULL,
  `coutDeuterium` int(11) NOT NULL,
  `coutTemps` int(11) NOT NULL,
  `niveau` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_recherche_recherche` (`idRechercheMere`),
  KEY `FK_recherche_univers` (`idUtilisateur`) USING BTREE,
  KEY `FK_recherche_planete` (`idPlanete`),
  CONSTRAINT `FK_recherche_planete` FOREIGN KEY (`idPlanete`) REFERENCES `planete` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_recherche_recherche` FOREIGN KEY (`idRechercheMere`) REFERENCES `recherche` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

