

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour esirem_galactique
CREATE DATABASE IF NOT EXISTS `esirem_galactique` /*!40100 DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci */;
USE `esirem_galactique`;

-- Listage de la structure de la table esirem_galactique. galaxie
CREATE TABLE IF NOT EXISTS `galaxie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUnivers` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_galaxie_univers` (`idUnivers`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Listage des données de la table esirem_galactique.galaxie : ~0 rows (environ)
/*!40000 ALTER TABLE `galaxie` DISABLE KEYS */;
/*!40000 ALTER TABLE `galaxie` ENABLE KEYS */;

-- Listage de la structure de la table esirem_galactique. planete
CREATE TABLE IF NOT EXISTS `planete` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idPosition` int(11) NOT NULL,
  `idSystemSolaire` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_planete_position` (`idPosition`),
  KEY `FK_planete_systemeSolaire` (`idSystemSolaire`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Listage des données de la table esirem_galactique.planete : ~0 rows (environ)
/*!40000 ALTER TABLE `planete` DISABLE KEYS */;
/*!40000 ALTER TABLE `planete` ENABLE KEYS */;

-- Listage de la structure de la table esirem_galactique. posistion
CREATE TABLE IF NOT EXISTS `posistion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `taille` int(11) DEFAULT NULL,
  `bonusSolaire` int(11) DEFAULT NULL,
  `bonusMetal` int(11) DEFAULT NULL,
  `bonusDeuterium` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Listage des données de la table esirem_galactique.posistion : ~8 rows (environ)
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
) ENGINE=InnoDB AUTO_INCREMENT=221 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Listage des données de la table esirem_galactique.pseudo : ~220 rows (environ)
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
	('Electric Executioner'),
	('Fire Fury'),
	('Galactic Gladiator'),
	('Hurricane Hellion'),
	('Iron Incarnate'),
	('Jade Jet'),
	('Karmic King'),
	('Lunar Lady'),
	('Mystic Monk'),
	('Night Ninja'),
	('Onyx Ogre'),
	('Phoenix Paladin'),
	('Quantum Quick'),
	('Ruby Raptor'),
	('Silver Sphinx'),
	('Urban Utopian'),
	('Vicious Vampire'),
	('White Warrior'),
	('X-treme X-man'),
	('Yellow Yakuza');
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
  CONSTRAINT `FK_recherche_recherche` FOREIGN KEY (`idRechercheMere`) REFERENCES `recherche` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
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
  KEY `FK_ressources_univers` (`idUnivers`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Listage des données de la table esirem_galactique.ressources : ~0 rows (environ)
/*!40000 ALTER TABLE `ressources` DISABLE KEYS */;
/*!40000 ALTER TABLE `ressources` ENABLE KEYS */;

-- Listage de la structure de la table esirem_galactique. systemsolaire
CREATE TABLE IF NOT EXISTS `systemsolaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idGalaxie` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_systemeSolaire_galaxie` (`idGalaxie`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Listage des données de la table esirem_galactique.systemsolaire : ~0 rows (environ)
/*!40000 ALTER TABLE `systemsolaire` DISABLE KEYS */;
/*!40000 ALTER TABLE `systemsolaire` ENABLE KEYS */;

-- Listage de la structure de la table esirem_galactique. univers
CREATE TABLE IF NOT EXISTS `univers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Listage des données de la table esirem_galactique.univers : ~0 rows (environ)
/*!40000 ALTER TABLE `univers` DISABLE KEYS */;
/*!40000 ALTER TABLE `univers` ENABLE KEYS */;

-- Listage de la structure de la table esirem_galactique. utilisateurs
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` text NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Listage des données de la table esirem_galactique.utilisateurs : ~0 rows (environ)
/*!40000 ALTER TABLE `utilisateurs` DISABLE KEYS */;
/*!40000 ALTER TABLE `utilisateurs` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
