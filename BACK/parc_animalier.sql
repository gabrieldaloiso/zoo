-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : ven. 22 nov. 2024 à 08:14
-- Version du serveur : 8.0.35
-- Version de PHP : 8.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `parc_animalier`
--

-- --------------------------------------------------------

--
-- Structure de la table `animaux`
--

CREATE TABLE `animaux` (
  `id` int NOT NULL,
  `nom` varchar(255) NOT NULL,
  `nombre` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `animaux`
--

INSERT INTO `animaux` (`id`, `nom`, `nombre`) VALUES
(1, 'Iguane', 4),
(2, 'Python', 2),
(3, 'Tortue', 20),
(4, 'Ara', 4),
(5, 'Grand Hocco', 2),
(6, 'Panthère', 3),
(7, 'Rhinocéros', 1),
(8, 'Oryx Beisa', 2),
(9, 'Gnou', 1),
(10, 'Suricate', 8),
(11, 'Fennec', 5),
(12, 'Coati', 3),
(13, 'Saïmiri', 10),
(14, 'Tapir', 3),
(15, 'Autruche', 3),
(16, 'Gazelle', 3),
(17, 'Guépard', 2),
(18, 'Casoar', 1),
(19, 'Crocodile nain', 2),
(20, 'Tamarin', 10),
(21, 'Ouistiti', 8),
(22, 'Grivet', 6),
(23, 'Varan de Komodo', 4),
(24, 'Élephant', 2),
(25, 'Girafe', 2),
(26, 'Hyène', 4),
(27, 'Zèbre', 3),
(28, 'Hippopotame', 2),
(29, 'Lion', 2),
(30, 'Loup à crinière', 2),
(31, 'Panda roux', 2),
(32, 'Lémurien', 7),
(33, 'Chèvre naine', 12),
(34, 'Mouflon', 4),
(35, 'Binturong', 4),
(36, 'Loutre', 4),
(37, 'Cigogne', 3),
(38, 'Marabout', 3),
(39, 'Oryx algazelle', 4),
(40, 'Watusi', 2),
(41, 'Ane de Somalie', 4),
(42, 'Yack', 2),
(43, 'Mouton noir', 4),
(44, 'Ibis', 2),
(45, 'Pécari', 4),
(46, 'Tamanoir', 2),
(47, 'Flamand rose', 5),
(48, 'Nandou', 3),
(49, 'Émeu', 3),
(50, 'Wallaby', 4),
(51, 'Porc-épic', 6),
(52, 'Bison', 5),
(53, 'Ane de provence', 3),
(54, 'Dromadaire', 4),
(55, 'Lynx', 4),
(56, 'Serval', 4),
(57, 'Chien des buissons', 4),
(58, 'Tigre', 1),
(59, 'Antilope', 5),
(60, 'Nigault', 2),
(61, 'Daim', 4),
(62, 'Loup européen', 3),
(63, 'Macaque', 6),
(64, 'Cerf', 4),
(65, 'Vautour', 6),
(66, 'Capucin', 9),
(67, 'Gibbon', 7),
(68, 'Perroquet', 3),
(69, 'Cercopithèque', 6),
(70, 'Crabier', 4);

-- --------------------------------------------------------

--
-- Structure de la table `avis`
--

CREATE TABLE `avis` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `enclos_id` int NOT NULL,
  `note` tinyint NOT NULL,
  `commentaire` text,
  `date_creation` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ;

--
-- Déchargement des données de la table `avis`
--

INSERT INTO `avis` (`id`, `user_id`, `enclos_id`, `note`, `commentaire`, `date_creation`) VALUES
(1, 1, 2, 5, 'Super expérience, enclos bien entretenu !', '2024-11-22 07:14:05');

-- --------------------------------------------------------

--
-- Structure de la table `biomes`
--

CREATE TABLE `biomes` (
  `id` int NOT NULL,
  `couleur` varchar(7) NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `biomes`
--

INSERT INTO `biomes` (`id`, `couleur`, `nom`) VALUES
(1, '#808080', 'Le Belvedere'),
(2, '#228B22', 'Le Bois des Pins'),
(3, '#FF0000', 'Le Plateau'),
(4, '#0000FF', 'Le Vallon des Cascades'),
(5, '#FFFF00', 'Les Clairières'),
(6, '#40E0D0', 'La Bergerie des Reptiles');

-- --------------------------------------------------------

--
-- Structure de la table `enclos`
--

CREATE TABLE `enclos` (
  `id` int NOT NULL,
  `id_biome` int NOT NULL,
  `enclos_en_repos` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `enclos`
--

INSERT INTO `enclos` (`id`, `id_biome`, `enclos_en_repos`) VALUES
(1, 6, 0),
(2, 1, 0),
(3, 1, 0),
(4, 1, 0),
(5, 1, 0),
(6, 1, 0),
(7, 1, 0),
(8, 1, 0),
(9, 1, 0),
(10, 1, 0),
(11, 4, 0),
(12, 4, 0),
(13, 4, 0),
(14, 4, 0),
(15, 4, 0),
(16, 4, 0),
(17, 4, 0),
(18, 4, 0),
(19, 4, 0),
(20, 3, 0),
(21, 3, 0),
(22, 3, 0),
(23, 3, 0),
(24, 3, 0),
(25, 3, 0),
(26, 3, 0),
(27, 3, 0),
(28, 3, 0),
(29, 3, 0),
(30, 3, 0),
(31, 5, 0),
(32, 5, 0),
(33, 5, 0),
(34, 5, 0),
(35, 5, 0),
(36, 5, 0),
(37, 5, 0),
(38, 5, 0),
(39, 5, 0),
(40, 5, 0),
(41, 5, 0),
(42, 5, 0),
(43, 5, 0),
(44, 5, 0),
(45, 5, 1),
(46, 2, 0),
(47, 2, 0),
(48, 2, 0),
(49, 2, 0),
(50, 2, 0);

-- --------------------------------------------------------

--
-- Structure de la table `enclos_animaux`
--

CREATE TABLE `enclos_animaux` (
  `id_enclos` int NOT NULL,
  `id_animal` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `enclos_animaux`
--

INSERT INTO `enclos_animaux` (`id_enclos`, `id_animal`) VALUES
(1, 1),
(1, 2),
(1, 3),
(17, 3),
(34, 3),
(11, 4),
(12, 5),
(13, 6),
(2, 7),
(2, 8),
(2, 9),
(3, 10),
(4, 11),
(5, 12),
(5, 13),
(6, 14),
(7, 15),
(7, 16),
(8, 17),
(9, 18),
(10, 19),
(20, 20),
(22, 21),
(24, 22),
(24, 23),
(24, 24),
(25, 25),
(26, 26),
(28, 27),
(30, 28),
(29, 29),
(27, 30),
(14, 31),
(16, 32),
(15, 33),
(17, 33),
(18, 34),
(19, 35),
(19, 36),
(31, 37),
(31, 38),
(32, 39),
(32, 40),
(32, 41),
(33, 42),
(33, 43),
(34, 44),
(35, 45),
(36, 46),
(36, 47),
(36, 48),
(37, 49),
(37, 50),
(38, 51),
(39, 52),
(40, 53),
(40, 54),
(41, 55),
(42, 56),
(43, 57),
(44, 58),
(45, 59),
(48, 59),
(48, 60),
(48, 61),
(49, 62),
(46, 63),
(46, 64),
(47, 65),
(21, 66),
(23, 67),
(11, 68),
(24, 69),
(46, 70);

-- --------------------------------------------------------

--
-- Structure de la table `horaires_repas`
--

CREATE TABLE `horaires_repas` (
  `id` int NOT NULL,
  `animal_id` int NOT NULL,
  `heure_repas` time NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `horaires_repas`
--

INSERT INTO `horaires_repas` (`id`, `animal_id`, `heure_repas`, `description`) VALUES
(1, 1, '17:14:00', 'Repas de Iguane'),
(2, 2, '10:46:00', 'Repas de Python'),
(3, 3, '08:43:00', 'Repas de Tortue'),
(4, 4, '13:45:00', 'Repas de Ara'),
(5, 5, '08:57:00', 'Repas de Grand Hocco'),
(6, 6, '14:14:00', 'Repas de Panthère'),
(7, 7, '11:03:00', 'Repas de Rhinocéros'),
(8, 8, '10:57:00', 'Repas de Oryx Beisa'),
(9, 9, '08:34:00', 'Repas de Gnou'),
(10, 10, '14:27:00', 'Repas de Suricate'),
(11, 11, '11:25:00', 'Repas de Fennec'),
(12, 12, '08:58:00', 'Repas de Coati'),
(13, 13, '15:48:00', 'Repas de Saïmiri'),
(14, 14, '15:26:00', 'Repas de Tapir'),
(15, 15, '17:12:00', 'Repas de Autruche'),
(16, 16, '11:58:00', 'Repas de Gazelle'),
(17, 17, '17:40:00', 'Repas de Guépard'),
(18, 18, '14:59:00', 'Repas de Casoar'),
(19, 19, '09:50:00', 'Repas de Crocodile nain'),
(20, 20, '15:08:00', 'Repas de Tamarin'),
(21, 21, '12:58:00', 'Repas de Ouistiti'),
(22, 22, '12:17:00', 'Repas de Grivet'),
(23, 23, '09:51:00', 'Repas de Varan de Komodo'),
(24, 24, '16:32:00', 'Repas de Élephant'),
(25, 25, '10:42:00', 'Repas de Girafe'),
(26, 26, '15:29:00', 'Repas de Hyène'),
(27, 27, '10:50:00', 'Repas de Zèbre'),
(28, 28, '12:39:00', 'Repas de Hippopotame'),
(29, 29, '17:46:00', 'Repas de Lion'),
(30, 30, '08:01:00', 'Repas de Loup à crinière'),
(31, 31, '16:23:00', 'Repas de Panda roux'),
(32, 32, '11:19:00', 'Repas de Lémurien'),
(33, 33, '15:36:00', 'Repas de Chèvre naine'),
(34, 34, '17:41:00', 'Repas de Mouflon'),
(35, 35, '15:32:00', 'Repas de Binturong'),
(36, 36, '13:04:00', 'Repas de Loutre'),
(37, 37, '15:41:00', 'Repas de Cigogne'),
(38, 38, '09:31:00', 'Repas de Marabout'),
(39, 39, '10:41:00', 'Repas de Oryx algazelle'),
(40, 40, '14:17:00', 'Repas de Watusi'),
(41, 41, '12:19:00', 'Repas de Ane de Somalie'),
(42, 42, '11:34:00', 'Repas de Yack'),
(43, 43, '17:02:00', 'Repas de Mouton noir'),
(44, 44, '11:29:00', 'Repas de Ibis'),
(45, 45, '12:53:00', 'Repas de Pécari'),
(46, 46, '08:37:00', 'Repas de Tamanoir'),
(47, 47, '17:51:00', 'Repas de Flamand rose'),
(48, 48, '12:40:00', 'Repas de Nandou'),
(49, 49, '08:09:00', 'Repas de Émeu'),
(50, 50, '14:58:00', 'Repas de Wallaby'),
(51, 51, '15:55:00', 'Repas de Porc-épic'),
(52, 52, '10:43:00', 'Repas de Bison'),
(53, 53, '15:22:00', 'Repas de Ane de provence'),
(54, 54, '15:38:00', 'Repas de Dromadaire'),
(55, 55, '17:57:00', 'Repas de Lynx'),
(56, 56, '16:30:00', 'Repas de Serval'),
(57, 57, '16:49:00', 'Repas de Chien des buissons'),
(58, 58, '13:18:00', 'Repas de Tigre'),
(59, 59, '16:28:00', 'Repas de Antilope'),
(60, 60, '15:17:00', 'Repas de Nigault'),
(61, 61, '10:20:00', 'Repas de Daim'),
(62, 62, '17:53:00', 'Repas de Loup européen'),
(63, 63, '12:46:00', 'Repas de Macaque'),
(64, 64, '12:43:00', 'Repas de Cerf'),
(65, 65, '11:48:00', 'Repas de Vautour'),
(66, 66, '16:40:00', 'Repas de Capucin'),
(67, 67, '17:41:00', 'Repas de Gibbon'),
(68, 68, '14:03:00', 'Repas de Perroquet'),
(69, 69, '11:44:00', 'Repas de Cercopithèque'),
(70, 70, '13:28:00', 'Repas de Crabier');

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

CREATE TABLE `services` (
  `id` int NOT NULL,
  `nom` varchar(255) NOT NULL,
  `id_biome` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `services`
--

INSERT INTO `services` (`id`, `nom`, `id_biome`) VALUES
(1, 'Point de vue', 1),
(2, 'Point de vue', 1),
(3, 'Point de vue', 1),
(4, 'Toilettes', 3),
(5, 'Point eau', 3),
(6, 'Point eau', 3),
(7, 'Paillote', 3),
(8, 'Espace pique-nique', 3),
(9, 'Espace pique-nique', 3),
(10, 'Espace pique-nique', 3),
(11, 'Lodge', 3),
(12, 'Point de vue', 3),
(13, 'Tente pédagogique', 3),
(14, 'Gare', 3),
(15, 'Trajet train', 3),
(16, 'Plateau des jeux', 3),
(17, 'Gare', 4),
(18, 'Trajet train', 4),
(19, 'Café nomade', 4),
(20, 'Point eau', 4),
(21, 'Espace pique-nique', 4),
(22, 'Espace pique-nique', 4),
(23, 'Espace pique-nique', 4),
(24, 'Toilettes', 5),
(25, 'Espace pique-nique', 5),
(26, 'Point eau', 5),
(27, 'Point eau', 5),
(28, 'Point eau', 5),
(29, 'Toilettes', NULL),
(30, 'Petit café', NULL),
(31, 'Boutique', NULL),
(32, 'Restaurant', NULL),
(33, 'Poste de secours', NULL),
(34, 'Parking', NULL),
(35, 'Parking', NULL),
(36, 'Parking', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `tickets`
--

CREATE TABLE `tickets` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `adult_quantity` int NOT NULL,
  `child_quantity` int NOT NULL,
  `total_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `tickets`
--

INSERT INTO `tickets` (`id`, `name`, `email`, `adult_quantity`, `child_quantity`, `total_price`) VALUES
(1, 'Théo', 'theo@example.com', 1, 0, 15.00),
(2, 'gabriel', 'gabriel@example.com', 1, 0, 15.00);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `is_admin`) VALUES
(1, 'testuser', 'test@example.com', 'password', 1),
(2, 'gaby', 'gaby@example.com', 'password', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `animaux`
--
ALTER TABLE `animaux`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `avis`
--
ALTER TABLE `avis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `enclos_id` (`enclos_id`);

--
-- Index pour la table `biomes`
--
ALTER TABLE `biomes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `enclos`
--
ALTER TABLE `enclos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_enclos` (`id`),
  ADD KEY `fk_biome` (`id_biome`);

--
-- Index pour la table `enclos_animaux`
--
ALTER TABLE `enclos_animaux`
  ADD PRIMARY KEY (`id_enclos`,`id_animal`),
  ADD KEY `fk_animal` (`id_animal`);

--
-- Index pour la table `horaires_repas`
--
ALTER TABLE `horaires_repas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `animal_id` (`animal_id`);

--
-- Index pour la table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_biome` (`id_biome`);

--
-- Index pour la table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `animaux`
--
ALTER TABLE `animaux`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT pour la table `avis`
--
ALTER TABLE `avis`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `biomes`
--
ALTER TABLE `biomes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `horaires_repas`
--
ALTER TABLE `horaires_repas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT pour la table `services`
--
ALTER TABLE `services`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT pour la table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `avis`
--
ALTER TABLE `avis`
  ADD CONSTRAINT `avis_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `avis_ibfk_2` FOREIGN KEY (`enclos_id`) REFERENCES `enclos` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `enclos`
--
ALTER TABLE `enclos`
  ADD CONSTRAINT `fk_biome` FOREIGN KEY (`id_biome`) REFERENCES `biomes` (`id`);

--
-- Contraintes pour la table `enclos_animaux`
--
ALTER TABLE `enclos_animaux`
  ADD CONSTRAINT `fk_animal` FOREIGN KEY (`id_animal`) REFERENCES `animaux` (`id`),
  ADD CONSTRAINT `fk_enclos` FOREIGN KEY (`id_enclos`) REFERENCES `enclos` (`id`);

--
-- Contraintes pour la table `horaires_repas`
--
ALTER TABLE `horaires_repas`
  ADD CONSTRAINT `horaires_repas_ibfk_1` FOREIGN KEY (`animal_id`) REFERENCES `animaux` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_ibfk_1` FOREIGN KEY (`id_biome`) REFERENCES `biomes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
