-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 04 avr. 2023 à 07:52
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ppe4`
--

-- --------------------------------------------------------

--
-- Structure de la table `animaux`
--

CREATE TABLE `animaux` (
  `id` int(11) NOT NULL,
  `date_de_naissance` date DEFAULT NULL,
  `nom_animal` varchar(50) NOT NULL,
  `commentaire` text DEFAULT NULL,
  `id_Especes` int(11) NOT NULL,
  `sexe` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `animaux`
--

INSERT INTO `animaux` (`id`, `date_de_naissance`, `nom_animal`, `commentaire`, `id_Especes`, `sexe`) VALUES
(1, '2001-01-28', 'Monkey-K', 'Amical', 5, 'F'),
(2, '1010-01-28', 'Rexou', 'Mange des gens', 2, 'H'),
(5, '0000-00-00', 'Fishomomo', '', 9, 'F'),
(8, '0000-00-00', 'Monkey-X', 'Gentil', 5, 'F');

-- --------------------------------------------------------

--
-- Structure de la table `enclos`
--

CREATE TABLE `enclos` (
  `id` varchar(50) NOT NULL,
  `nom_enclos` varchar(50) NOT NULL,
  `capacite_max` int(11) NOT NULL,
  `eau` tinyint(1) NOT NULL,
  `Taille` float NOT NULL,
  `id_Personnels` int(11) DEFAULT NULL,
  `id_Personnels_Concerner` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `especes`
--

CREATE TABLE `especes` (
  `id` int(11) NOT NULL,
  `nom_race` varchar(50) NOT NULL,
  `duree_vie_moyenne` int(4) NOT NULL,
  `aquatique` tinyint(1) NOT NULL,
  `type_nourriture` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `especes`
--

INSERT INTO `especes` (`id`, `nom_race`, `duree_vie_moyenne`, `aquatique`, `type_nourriture`) VALUES
(2, 'T-REX', 2031, 1, 'Carnivore'),
(4, 'Megalodon', 1980, 0, 'Carnivore'),
(5, 'Singe', 2011, 1, 'Carnivore'),
(7, 'Peroquet', 2004, 1, 'Herbivore'),
(9, 'Fishomere', 100000, 0, 'Herbivore');

-- --------------------------------------------------------

--
-- Structure de la table `fonctions`
--

CREATE TABLE `fonctions` (
  `fonction` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `fonctions`
--

INSERT INTO `fonctions` (`fonction`) VALUES
('Directeur'),
('Employé');

-- --------------------------------------------------------

--
-- Structure de la table `loc_animaux`
--

CREATE TABLE `loc_animaux` (
  `id` int(11) NOT NULL,
  `date_arrivee` date NOT NULL,
  `date_sortie` date NOT NULL,
  `id_Animaux` int(11) NOT NULL,
  `id_Enclos` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personnels`
--

CREATE TABLE `personnels` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `date_de_naissance` date NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `salaire` decimal(15,3) DEFAULT NULL,
  `sexe` varchar(50) NOT NULL,
  `fonction` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `personnels`
--

INSERT INTO `personnels` (`id`, `nom`, `prenom`, `date_de_naissance`, `login`, `password`, `salaire`, `sexe`, `fonction`) VALUES
(2, 'Rick', 'Prime', '1975-03-18', 'RickPRIME', 'riri', '2500.240', 'H', 'Directeur'),
(4, 'Rick', 'Prime', '1975-03-18', 'Michael', 'pass', '2500.240', 'H', 'Directeur'),
(5, 'Erwan', 'Yomana', '2001-01-28', 'Erwani', '12345', '0.000', 'F', 'Employé'),
(9, 'Erwan', 'Mondar', '2001-01-28', 'bb', 'azert', '0.000', 'H', 'Employé'),
(10, 'Joseph', 'Rouillez', '2002-08-14', 'aa', 'zz', '0.000', 'H', 'Directeur'),
(11, 'Léo', 'Salgado', '0000-00-00', 'leooooho', 'leomioro', '452.000', 'F', 'Employé'),
(12, 'Eric', 'Potron', '0000-00-00', 'Eric', 'pass', NULL, 'H', 'Directeur');

-- --------------------------------------------------------

--
-- Structure de la table `sexe`
--

CREATE TABLE `sexe` (
  `sexe` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `sexe`
--

INSERT INTO `sexe` (`sexe`) VALUES
('F'),
('H');

-- --------------------------------------------------------

--
-- Structure de la table `type_nourritures`
--

CREATE TABLE `type_nourritures` (
  `type_nourriture` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `type_nourritures`
--

INSERT INTO `type_nourritures` (`type_nourriture`) VALUES
('Carnivore'),
('Herbivore'),
('Omnivore');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `animaux`
--
ALTER TABLE `animaux`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Animaux_Especes_FK` (`id_Especes`),
  ADD KEY `Animaux_Sexe0_FK` (`sexe`);

--
-- Index pour la table `enclos`
--
ALTER TABLE `enclos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Enclos_Personnels_FK` (`id_Personnels`),
  ADD KEY `Enclos_Personnels0_FK` (`id_Personnels_Concerner`);

--
-- Index pour la table `especes`
--
ALTER TABLE `especes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Especes_type_nourritures_FK` (`type_nourriture`);

--
-- Index pour la table `fonctions`
--
ALTER TABLE `fonctions`
  ADD PRIMARY KEY (`fonction`);

--
-- Index pour la table `loc_animaux`
--
ALTER TABLE `loc_animaux`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Loc_animaux_Animaux_FK` (`id_Animaux`),
  ADD KEY `Loc_animaux_Enclos0_FK` (`id_Enclos`);

--
-- Index pour la table `personnels`
--
ALTER TABLE `personnels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Personnels_Sexe_FK` (`sexe`),
  ADD KEY `Personnels_Fonctions0_FK` (`fonction`);

--
-- Index pour la table `sexe`
--
ALTER TABLE `sexe`
  ADD PRIMARY KEY (`sexe`);

--
-- Index pour la table `type_nourritures`
--
ALTER TABLE `type_nourritures`
  ADD PRIMARY KEY (`type_nourriture`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `animaux`
--
ALTER TABLE `animaux`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `especes`
--
ALTER TABLE `especes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `loc_animaux`
--
ALTER TABLE `loc_animaux`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `personnels`
--
ALTER TABLE `personnels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `animaux`
--
ALTER TABLE `animaux`
  ADD CONSTRAINT `Animaux_Especes_FK` FOREIGN KEY (`id_Especes`) REFERENCES `especes` (`id`),
  ADD CONSTRAINT `Animaux_Sexe0_FK` FOREIGN KEY (`sexe`) REFERENCES `sexe` (`sexe`);

--
-- Contraintes pour la table `enclos`
--
ALTER TABLE `enclos`
  ADD CONSTRAINT `Enclos_Personnels0_FK` FOREIGN KEY (`id_Personnels_Concerner`) REFERENCES `personnels` (`id`),
  ADD CONSTRAINT `Enclos_Personnels_FK` FOREIGN KEY (`id_Personnels`) REFERENCES `personnels` (`id`);

--
-- Contraintes pour la table `especes`
--
ALTER TABLE `especes`
  ADD CONSTRAINT `Especes_type_nourritures_FK` FOREIGN KEY (`type_nourriture`) REFERENCES `type_nourritures` (`type_nourriture`);

--
-- Contraintes pour la table `loc_animaux`
--
ALTER TABLE `loc_animaux`
  ADD CONSTRAINT `Loc_animaux_Animaux_FK` FOREIGN KEY (`id_Animaux`) REFERENCES `animaux` (`id`),
  ADD CONSTRAINT `Loc_animaux_Enclos0_FK` FOREIGN KEY (`id_Enclos`) REFERENCES `enclos` (`id`);

--
-- Contraintes pour la table `personnels`
--
ALTER TABLE `personnels`
  ADD CONSTRAINT `Personnels_Fonctions0_FK` FOREIGN KEY (`fonction`) REFERENCES `fonctions` (`fonction`),
  ADD CONSTRAINT `Personnels_Sexe_FK` FOREIGN KEY (`sexe`) REFERENCES `sexe` (`sexe`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
