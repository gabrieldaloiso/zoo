-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : mar. 19 nov. 2024 à 18:07
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
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'testuser', 'test@example.com', 'password'),
(2, 'gaby', 'gaby@example.com', 'password');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `animaux`
--
ALTER TABLE `animaux`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT pour la table `biomes`
--
ALTER TABLE `biomes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
-- Contraintes pour la table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_ibfk_1` FOREIGN KEY (`id_biome`) REFERENCES `biomes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
