-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 11 juin 2020 à 11:16
-- Version du serveur :  5.7.17
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `netcar`
--

-- --------------------------------------------------------

--
-- Structure de la table `agence`
--

CREATE TABLE `agence` (
  `ID` int(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `agence_prox` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `agence`
--

INSERT INTO `agence` (`ID`, `ville`, `agence_prox`) VALUES
(1, 'BREST', 'LANDERNEAU'),
(2, 'LANDERNEAU', 'BREST'),
(3, 'MORLAIX', 'LANDERNEAU'),
(4, 'QUIMPER', 'DOUARNENEZ'),
(5, 'DOUARNENEZ', 'QUIMPER');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `ID` int(255) NOT NULL,
  `fidelise` int(1) NOT NULL,
  `civilite` varchar(3) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `rue` varchar(255) DEFAULT NULL,
  `cp` int(255) DEFAULT NULL,
  `ville` varchar(255) DEFAULT NULL,
  `telephone` int(255) DEFAULT NULL,
  `mail` varchar(255) DEFAULT NULL,
  `naissance` date DEFAULT NULL,
  `delivrance_permis` date DEFAULT NULL,
  `cb_num` int(255) DEFAULT NULL,
  `cb_exp` date DEFAULT NULL,
  `points` int(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`ID`, `fidelise`, `civilite`, `nom`, `prenom`, `rue`, `cp`, `ville`, `telephone`, `mail`, `naissance`, `delivrance_permis`, `cb_num`, `cb_exp`, `points`) VALUES
(1, 1, 'M', 'CHORFI', 'Merwan', '62 RUE DE LYON', 29200, 'Brest', 602714681, 'merwan.c@outlook.com', '1998-07-27', '2018-04-25', 1111111111, '2022-06-01', 80),
(2, 0, 'Mme', 'Beugnot', 'Anaëlle', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `devis`
--

CREATE TABLE `devis` (
  `ID` int(255) NOT NULL,
  `civilite` varchar(3) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `rue` varchar(255) NOT NULL,
  `cp` int(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `telephone` int(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `payement` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `devis`
--

INSERT INTO `devis` (`ID`, `civilite`, `nom`, `prenom`, `rue`, `cp`, `ville`, `telephone`, `mail`, `payement`) VALUES
(1, 'M', 'CHORFI', 'Merwan', '62 RUE DE LYON', 29200, 'Brest', 602714681, 'merwan.c@outlook.com', 'Sur place'),
(2, 'M', 'CHORFI', 'Merwan', '62 RUE DE LYON', 29200, 'Brest', 602714681, 'merwan.c@outlook.com', 'Sur place'),
(3, 'M', 'CHORFI', 'Merwan', '62 RUE DE LYON', 29200, 'Brest', 602714681, 'merwan.c@outlook.com', 'Sur place');

-- --------------------------------------------------------

--
-- Structure de la table `horaire`
--

CREATE TABLE `horaire` (
  `ID_agence` int(11) NOT NULL,
  `lundi` varchar(255) NOT NULL,
  `mardi` varchar(255) NOT NULL,
  `mercredi` varchar(255) NOT NULL,
  `jeudi` varchar(255) NOT NULL,
  `vendredi` varchar(255) NOT NULL,
  `samedi` varchar(255) NOT NULL,
  `dimanche` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `horaire`
--

INSERT INTO `horaire` (`ID_agence`, `lundi`, `mardi`, `mercredi`, `jeudi`, `vendredi`, `samedi`, `dimanche`) VALUES
(1, '07:00 - 23:15', '07:00 - 23:15', '07:00 - 23:15', '07:00 - 23:15', '07:00 - 23:15', '08:00 - 20:30', '10:45 - 22:15'),
(2, '07:00 - 23:15', '07:00 - 23:15', '07:00 - 23:15', '07:00 - 23:15', '07:00 - 23:15', '10:45 - 20:30', '10:45 - 20:30'),
(3, '07:00 - 23:15', '07:00 - 23:15', '07:00 - 23:15', '07:00 - 23:15', '07:00 - 23:15', '08:00 - 20:30', '10:45 - 22:15'),
(4, '07:00 - 23:15', '07:00 - 23:15', '07:00 - 23:15', '07:00 - 23:15', '07:00 - 23:15', '08:00 - 20:30', '10:45 - 22:15'),
(5, '07:00 - 23:15', '07:00 - 23:15', '07:00 - 23:15', '07:00 - 23:15', '07:00 - 23:15', '08:00 - 20:30', '10:45 - 22:15');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `ID` int(255) NOT NULL,
  `agence_dep` int(255) NOT NULL,
  `agence_arriv` int(255) NOT NULL,
  `categ_vehicule` varchar(255) NOT NULL,
  `ID_vehicule` int(255) NOT NULL,
  `date_dep` datetime NOT NULL,
  `date_arriv` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`ID`, `agence_dep`, `agence_arriv`, `categ_vehicule`, `ID_vehicule`, `date_dep`, `date_arriv`) VALUES
(1, 1, 2, 'Tourisme', 1, '2020-06-08 15:00:00', '2020-06-12 15:00:00'),
(2, 3, 1, 'Tourisme', 2, '2020-06-08 15:00:00', '2020-06-12 15:00:00'),
(3, 1, 1, 'Tourisme', 1, '2020-06-08 15:00:00', '2020-06-12 15:00:00'),
(4, 1, 1, 'Tourisme', 1, '2020-06-08 15:00:00', '2020-06-12 15:00:00'),
(5, 1, 1, 'Tourisme', 1, '2020-06-08 15:00:00', '2020-06-12 15:00:00'),
(6, 1, 1, 'Tourisme', 1, '2020-06-08 15:00:00', '2020-06-12 15:00:00'),
(7, 1, 1, 'Tourisme', 1, '2020-06-08 15:00:00', '2020-06-12 15:00:00'),
(8, 1, 1, 'Tourisme', 1, '2020-06-08 15:00:00', '2020-06-12 15:00:00'),
(9, 2, 1, 'Tourisme', 1, '2020-06-08 15:00:00', '2020-06-12 15:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `vehicule_tourisme`
--

CREATE TABLE `vehicule_tourisme` (
  `ID` int(255) NOT NULL,
  `clim` int(1) NOT NULL,
  `porte` int(1) NOT NULL,
  `passager` int(1) NOT NULL,
  `coffre` int(255) NOT NULL,
  `prix` int(255) NOT NULL,
  `modele` varchar(255) NOT NULL,
  `marque` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `vehicule_tourisme`
--

INSERT INTO `vehicule_tourisme` (`ID`, `clim`, `porte`, `passager`, `coffre`, `prix`, `modele`, `marque`) VALUES
(1, 1, 5, 5, 200, 190, 'POLO 5', 'VW'),
(2, 0, 3, 5, 180, 110, '205', 'PEUGEOT');

-- --------------------------------------------------------

--
-- Structure de la table `vehicule_utilitaire`
--

CREATE TABLE `vehicule_utilitaire` (
  `ID` int(255) NOT NULL,
  `charge_utile` int(255) NOT NULL,
  `longueur` int(255) NOT NULL,
  `largeur` int(255) NOT NULL,
  `hauteur` int(255) NOT NULL,
  `prix` int(255) NOT NULL,
  `modele` varchar(255) NOT NULL,
  `marque` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `vehicule_utilitaire`
--

INSERT INTO `vehicule_utilitaire` (`ID`, `charge_utile`, `longueur`, `largeur`, `hauteur`, `prix`, `modele`, `marque`) VALUES
(1, 1300, 5, 2, 2, 250, 'VIVARO', 'OPEL'),
(2, 1500, 5, 2, 2, 290, 'EXPERT', 'PEUGEOT');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `agence`
--
ALTER TABLE `agence`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `devis`
--
ALTER TABLE `devis`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `horaire`
--
ALTER TABLE `horaire`
  ADD PRIMARY KEY (`ID_agence`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `vehicule_tourisme`
--
ALTER TABLE `vehicule_tourisme`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `vehicule_utilitaire`
--
ALTER TABLE `vehicule_utilitaire`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `agence`
--
ALTER TABLE `agence`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `devis`
--
ALTER TABLE `devis`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `horaire`
--
ALTER TABLE `horaire`
  MODIFY `ID_agence` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `vehicule_tourisme`
--
ALTER TABLE `vehicule_tourisme`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `vehicule_utilitaire`
--
ALTER TABLE `vehicule_utilitaire`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
