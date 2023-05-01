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

-- Listage des données de la table esirem_galactique.galaxie : ~0 rows (environ)
/*!40000 ALTER TABLE `galaxie` DISABLE KEYS */;
/*!40000 ALTER TABLE `galaxie` ENABLE KEYS */;

-- Listage des données de la table esirem_galactique.planete : ~0 rows (environ)
/*!40000 ALTER TABLE `planete` DISABLE KEYS */;
/*!40000 ALTER TABLE `planete` ENABLE KEYS */;

-- Listage des données de la table esirem_galactique.posistion : ~8 rows (environ)
/*!40000 ALTER TABLE `posistion` DISABLE KEYS */;
INSERT INTO `posistion` (`id`, `taille`, `bonusSolaire`, `bonusMetal`, `bonusDeuterium`) VALUES
	(1, 90, 30, 0, -15),
	(2, 100, 20, 5, -10),
	(3, 110, 10, 10, -5),
	(4, 120, 5, 15, 0),
	(5, 130, 0, 20, 0),
	(6, 130, 0, 15, 10),
	(7, 120, -10, 10, 15),
	(8, 110, -20, 5, 20),
	(9, 100, -30, 0, 25),
	(10, 90, -40, -5, 30);
/*!40000 ALTER TABLE `posistion` ENABLE KEYS */;

-- Listage des données de la table esirem_galactique.pseudo : ~220 rows (environ)
/*!40000 ALTER TABLE `pseudo` DISABLE KEYS */;
INSERT INTO `pseudo` (`id`, `nom`) VALUES
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
	(75, 'Nightshade Nightingale'),
	(76, 'Galactic Gladiator'),
	(77, 'Firebrand Furyhawk'),
	(78, 'Tempest Templar'),
	(79, 'Emerald Enchanter'),
	(80, 'Ruby Raptor'),
	(81, 'Frostbite Fury'),
	(82, 'Shadow Shogun'),
	(83, 'Thunderous Tempest'),
	(84, 'Phoenix Paladin'),
	(85, 'Venomous Viper'),
	(86, 'Crimson Crusader'),
	(87, 'Mystic Mercenary'),
	(88, 'Cosmic Commander'),
	(89, 'Galactic Gladiator'),
	(90, 'Iron Invincible'),
	(91, 'Sentinel Samurai'),
	(92, 'Thunderbolt Thunderbird'),
	(93, 'Nightshade Ninja'),
	(94, 'Serpent Slayer'),
	(95, 'Dragon Defender'),
	(96, 'Saber Sentinel'),
	(97, 'Titan Tornado'),
	(98, 'Inferno Inquisitor'),
	(99, 'Cyclone Champion'),
	(100, 'Mystic Maverick'),
	(101, 'Frost Fang'),
	(102, 'Shadow Sage'),
	(103, 'Thunder Thief'),
	(104, 'Phoenix Fury'),
	(105, 'Venom Vixen'),
	(106, 'Crimson Claw'),
	(107, 'Mystic Mind'),
	(108, 'Cosmic Crusader'),
	(109, 'Galactic Guardian'),
	(110, 'Iron Illusionist'),
	(111, 'Sentinel Sabre'),
	(112, 'Thunderbird Titan'),
	(113, 'Nightshade Ninja'),
	(114, 'Serpent Savior'),
	(115, 'Dragon Defender'),
	(116, 'Saber Sentinel'),
	(117, 'Titan Tactician'),
	(118, 'Inferno Igniter'),
	(119, 'Cyclone Conqueror'),
	(120, 'Mystic Marshal'),
	(121, 'Shadow Sentinel'),
	(122, 'Crimson Crusader'),
	(123, 'Dark Destroyer'),
	(124, 'Arcane Avenger'),
	(125, 'Frost Fury'),
	(126, 'Thunderbolt Titan'),
	(127, 'Mystic Marauder'),
	(128, 'Emerald Enforcer'),
	(129, 'Steel Storm'),
	(130, 'Golden Gladiator'),
	(131, 'Silver Sentinel'),
	(132, 'Cosmic Crusader'),
	(133, 'Inferno Invader'),
	(134, 'Jade Juggernaut'),
	(135, 'Phoenix Fury'),
	(136, 'Shadow Saber'),
	(137, 'Cosmic Champion'),
	(138, 'Diamond Defender'),
	(139, 'Neon Nihilist'),
	(140, 'Obsidian Overlord'),
	(141, 'Quantum Quicksilver'),
	(142, 'Sapphire Samurai'),
	(143, 'Void Vindicator'),
	(144, 'Arctic Avenger'),
	(145, 'Blaze Battler'),
	(146, 'Cosmic Corsair'),
	(147, 'Diamond Dynamo'),
	(148, 'Electric Enigma'),
	(149, 'Flame Fighter'),
	(150, 'Ghostly Guardian'),
	(151, 'Hurricane Hunter'),
	(152, 'Iron Idol'),
	(153, 'Jade Jaguar'),
	(154, 'Knightly Knight'),
	(155, 'Lunar Lancer'),
	(156, 'Mystic Mastermind'),
	(157, 'Neon Ninja'),
	(158, 'Omega Oppressor'),
	(159, 'Platinum Paladin'),
	(160, 'Quantum Queen'),
	(161, 'Ruby Ranger'),
	(162, 'Shadow Shogun'),
	(163, 'Thunderous Titan'),
	(164, 'Ultraviolet Utopian'),
	(165, 'Vicious Vandal'),
	(166, 'Winter Warrior'),
	(167, 'X-treme X-ecutioner'),
	(168, 'Yellow Yaksha'),
	(169, 'Zombie Zapper'),
	(170, 'Abyssal Assassin'),
	(171, 'Black Blade'),
	(172, 'Celestial Crusader'),
	(173, 'Dark Druid'),
	(174, 'Electric Eagle'),
	(175, 'Frozen Fury'),
	(176, 'Ghostly Ghoul'),
	(177, 'Holy Hunter'),
	(178, 'Icy Idol'),
	(179, 'Jade Jester'),
	(180, 'Karmic Knight'),
	(181, 'Lunar Lion'),
	(182, 'Mystic Mage'),
	(183, 'Night Nihilist'),
	(184, 'Onyx Oracle'),
	(185, 'Phoenix Phenom'),
	(186, 'Quantum Quasar'),
	(187, 'Ruby Reaper'),
	(188, 'Silver Serpent'),
	(189, 'Thunderous Thunderbird'),
	(190, 'Urban Unicorn'),
	(191, 'Vampire Vixen'),
	(192, 'White Witch'),
	(193, 'X-treme Xenophile'),
	(194, 'Yellow Yeti'),
	(195, 'Zombie Zealot'),
	(196, 'Alpha Assassin'),
	(197, 'Bloodthirsty Butcher'),
	(198, 'Cosmic Conqueror'),
	(199, 'Dark Demon'),
	(200, 'Electric Executioner'),
	(201, 'Fire Fury'),
	(202, 'Galactic Gladiator'),
	(203, 'Hurricane Hellion'),
	(204, 'Iron Incarnate'),
	(205, 'Jade Jet'),
	(206, 'Karmic King'),
	(207, 'Lunar Lady'),
	(208, 'Mystic Monk'),
	(209, 'Night Ninja'),
	(210, 'Onyx Ogre'),
	(211, 'Phoenix Paladin'),
	(212, 'Quantum Quick'),
	(213, 'Ruby Raptor'),
	(214, 'Silver Sphinx'),
	(215, 'Thunderous Thunderbolt'),
	(216, 'Urban Utopian'),
	(217, 'Vicious Vampire'),
	(218, 'White Warrior'),
	(219, 'X-treme X-man'),
	(220, 'Yellow Yakuza');
/*!40000 ALTER TABLE `pseudo` ENABLE KEYS */;

-- Listage des données de la table esirem_galactique.recherche : ~0 rows (environ)
/*!40000 ALTER TABLE `recherche` DISABLE KEYS */;
/*!40000 ALTER TABLE `recherche` ENABLE KEYS */;

-- Listage des données de la table esirem_galactique.ressources : ~0 rows (environ)
/*!40000 ALTER TABLE `ressources` DISABLE KEYS */;
/*!40000 ALTER TABLE `ressources` ENABLE KEYS */;

-- Listage des données de la table esirem_galactique.systemsolaire : ~0 rows (environ)
/*!40000 ALTER TABLE `systemsolaire` DISABLE KEYS */;
/*!40000 ALTER TABLE `systemsolaire` ENABLE KEYS */;

-- Listage des données de la table esirem_galactique.univers : ~0 rows (environ)
/*!40000 ALTER TABLE `univers` DISABLE KEYS */;
/*!40000 ALTER TABLE `univers` ENABLE KEYS */;

-- Listage des données de la table esirem_galactique.utilisateurs : ~2 rows (environ)
/*!40000 ALTER TABLE `utilisateurs` DISABLE KEYS */;
INSERT INTO `utilisateurs` (`id`, `email`, `password`) VALUES
	(36, 'diabolodu30@gmail.com', '$2y$10$.sgFgA8fK.APMW73haaux.MT20bxJmSG86GHgVrtreOsOYx.lnFwy');
/*!40000 ALTER TABLE `utilisateurs` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
