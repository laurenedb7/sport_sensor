-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : lun. 01 fév. 2021 à 12:51
-- Version du serveur :  10.4.16-MariaDB
-- Version de PHP : 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sport_sensor`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE `administrateur` (
  `idAdmin` int(11) NOT NULL DEFAULT 0,
  `sexeAdmin` varchar(255) NOT NULL,
  `nomAdmin` varchar(255) NOT NULL,
  `prenomAdmin` varchar(255) NOT NULL,
  `motDePasseAdmin` varchar(255) NOT NULL,
  `mailAdmin` varchar(255) NOT NULL,
  `telephoneAdmin` int(10) NOT NULL,
  `codeAdmin` int(11) NOT NULL,
  `photoAdmin` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `batterie_test`
--

CREATE TABLE `batterie_test` (
  `dateHeureBat` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `qteBat` int(3) NOT NULL,
  `typeBat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id_categorie` int(11) NOT NULL,
  `nomCategorie` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `coach`
--

CREATE TABLE `coach` (
  `idCoach` int(11) NOT NULL DEFAULT 0,
  `sexeCoach` varchar(255) NOT NULL,
  `nomCoach` varchar(255) NOT NULL,
  `prenomCoach` varchar(255) NOT NULL,
  `anniversaireCoach` date NOT NULL,
  `photoCoach` longblob NOT NULL,
  `mailCoach` varchar(255) NOT NULL,
  `motDePasseCoach` varchar(255) NOT NULL,
  `telephoneCoach` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `equipe`
--

CREATE TABLE `equipe` (
  `idEquipe` int(11) NOT NULL DEFAULT 0,
  `nomEquipe` varchar(255) NOT NULL,
  `sportEquipe` varchar(255) NOT NULL,
  `id_user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `joueur`
--

CREATE TABLE `joueur` (
  `idJoueur` int(11) NOT NULL DEFAULT 0,
  `sexeJoueur` varchar(255) NOT NULL,
  `nomJoueur` varchar(255) NOT NULL,
  `prenomJoueur` varchar(255) NOT NULL,
  `photoJoueur` longblob NOT NULL,
  `mailJoueur` varchar(255) NOT NULL,
  `telephoneJoueur` int(10) NOT NULL,
  `motDePasseJoueur` varchar(255) NOT NULL,
  `anniversaireJoueur` date NOT NULL,
  `poidsJoueur` float NOT NULL,
  `tailleJoueur` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `idMessage` int(11) NOT NULL,
  `dateHeureMessage` datetime NOT NULL DEFAULT current_timestamp(),
  `contenuMessage` longtext NOT NULL,
  `id_sujet` int(11) NOT NULL DEFAULT 0,
  `id_user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `sujet`
--

CREATE TABLE `sujet` (
  `idSujet` int(11) NOT NULL,
  `titreSujet` varchar(60) NOT NULL,
  `contenuSujet` text NOT NULL,
  `dateHeureSujet` datetime NOT NULL DEFAULT current_timestamp(),
  `id_categorie` int(11) NOT NULL,
  `id_user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `test`
--

CREATE TABLE `test` (
  `idTest` int(11) NOT NULL,
  `capteurTest` varchar(255) NOT NULL,
  `resultatTest` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Index pour la table `batterie_test`
--
ALTER TABLE `batterie_test`
  ADD PRIMARY KEY (`dateHeureBat`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Index pour la table `coach`
--
ALTER TABLE `coach`
  ADD PRIMARY KEY (`idCoach`);

--
-- Index pour la table `joueur`
--
ALTER TABLE `joueur`
  ADD PRIMARY KEY (`idJoueur`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`idMessage`);

--
-- Index pour la table `sujet`
--
ALTER TABLE `sujet`
  ADD PRIMARY KEY (`idSujet`);

--
-- Index pour la table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`idTest`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_categorie` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `idMessage` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sujet`
--
ALTER TABLE `sujet`
  MODIFY `idSujet` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
