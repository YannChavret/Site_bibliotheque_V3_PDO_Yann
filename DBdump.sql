-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : jeu. 16 fév. 2023 à 14:02
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `MyDB2`
--

-- --------------------------------------------------------

--
-- Structure de la table `Fournisseur`
--

CREATE TABLE `Fournisseur` (
  `Id_fournisseur` int(11) NOT NULL,
  `Code_fournisseur` varchar(50) NOT NULL,
  `Raison_sociale` varchar(50) NOT NULL,
  `Rue_fournisseur` varchar(100) NOT NULL,
  `Code_postal` varchar(50) NOT NULL,
  `Localite` varchar(100) NOT NULL,
  `Pays` varchar(100) NOT NULL,
  `Tel_fournisseur` varchar(50) NOT NULL,
  `Url_fournisseur` varchar(100) NOT NULL,
  `Email_fournisseur` varchar(100) NOT NULL,
  `Fax_fournisseur` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `Fournisseur`
--

INSERT INTO `Fournisseur` (`Id_fournisseur`, `Code_fournisseur`, `Raison_sociale`, `Rue_fournisseur`, `Code_postal`, `Localite`, `Pays`, `Tel_fournisseur`, `Url_fournisseur`, `Email_fournisseur`, `Fax_fournisseur`) VALUES
(1, 'F0001', 'HACHETTE DISTRIBUTION', '1 Av. Johannes Gutenberg  ', '78310', 'Maurepas', 'France', '0130662066', 'hachette.com', 'contact@hachette.fr', '0130662067'),
(2, 'F0002', 'SODIS', '128, Avenue Du Maréchal De Lattre De Tassigny', '77400', 'Lagny Sur Marne', 'France', '0102030405', 'sodis.fr', 'contact@sodis.fr', '0102030406'),
(4, 'F0003', 'DISTRILIVRES', '23, Rue De La Page', '13008', 'Bruxelles', 'Belgique', '0123232323', 'distrilivre.be', 'contact@distrilivre.com', '0123232324');

-- --------------------------------------------------------

--
-- Structure de la table `Livres`
--

CREATE TABLE `Livres` (
  `ID` int(11) NOT NULL,
  `Nom` varchar(100) NOT NULL,
  `Auteur` varchar(100) NOT NULL,
  `Editeur` varchar(100) NOT NULL,
  `Annee` int(4) NOT NULL,
  `NombreDePages` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `Livres`
--

INSERT INTO `Livres` (`ID`, `Nom`, `Auteur`, `Editeur`, `Annee`, `NombreDePages`) VALUES
(1, 'Harry Potter t.1 : Harry Potter à l\'école des sorciers', 'J. K. Rowling', 'Gallimard-jeunesse', 2017, 435),
(2, 'Voyage au bout de la nuit', 'Louis-Ferdinand Céline', 'Folio  ', 1972, 532),
(4, 'Cent ans de solitude', 'Gabriel García Márquez', 'Points', 1982, 287),
(5, '1984', 'George Orwell', 'Folio ', 1972, 345),
(6, 'L\'étranger', 'Albert Camus', 'Folio ', 1972, 178),
(7, 'Belle du seigneur', 'Albert Cohen', 'Folio ', 1998, 604),
(8, 'Les misérables', 'Victor Hugo\r\n', 'Ecole des loisirs', 1862, 1630),
(11, 'La promesse de l\'aube', 'Romain Gary', 'Folio', 1973, 845),
(13, 'Le meilleur des mondes', 'Aldous Huxley', 'Folio', 1945, 654),
(15, 'The Postman', 'Charles Bukowski', '10/18', 1998, 234),
(16, 'La Horde Du Contrevent', 'Alain Damasio', 'La Volte ', 2014, 666),
(17, 'Mémoires dHadrien', 'Marguerite Youcenar', 'Folio', 1940, 669),
(21, 'Orgueil Et Préjugés', 'Jane Austen', '10/18', 1956, 478),
(26, 'La Vie Devant Soi', 'Romain Gary', 'Folio', 1982, 907),
(27, 'Crime Et Châtiment T.1', 'Fiodor Dostoïevski', 'Actes Sud', 2002, 1503),
(28, 'Et On Tuera Tous Les Affreux', 'Vernon Sullivan', 'Le Livre De Poche', 1999, 221),
(49, 'La France Sous Nos Yeux', 'Jérôme Fourquet', 'Seuil', 2021, 567),
(50, 'La Plus Secrète Mémoire Des Hommes', 'Mohamed Mbougar Sarr', 'Jimsaan', 2021, 345),
(51, 'Serge', 'Yasmina Rez', 'Flammarion', 2021, 678),
(52, 'La Carte Postale', 'Anne Berest', 'Grasset', 2022, 766),
(53, 'Premier Sang', 'Amélie Nothomb', 'Albin Michel', 2020, 254),
(54, 'Le Fils De L Homme', 'Jean-baptiste Del Amo', 'Gallimard', 2021, 637),
(55, 'Des Diables Et Des Saints', 'Jean-baptiste Andrea', 'Iconoclaste', 2019, 587),
(56, 'Le Roman De Jim', 'Pierric Bailly', 'P.o.l', 2018, 529),
(57, 'Journal D Un Vieux Dégueulasse', 'Charles Bukowski', 'Babelio', 1972, 487),
(59, 'Contes De La Folie Ordinaire', 'Charles Bukowski', 'Le Sagitaire', 1977, 504),
(60, 'Au Sud De Nulle Part', 'Charles Bukowski', 'Grasset', 1982, 900),
(61, 'Hygiène De L Assassin', 'Amélie Nothomb', 'Albin Michel', 1992, 319),
(62, 'Stupeur Et Tremblements', 'Amélie Nothomb', 'Albin Michel', 1999, 719),
(63, 'La Peste', 'Albert Camus', 'Gallimard', 1947, 836),
(64, 'Le Petit Prince', 'Antoine De Saint Exupéry', 'Gallimard', 1946, 188),
(67, 'L Ecume Des Jours', 'Boris Vian', 'Le Livre De Poche', 1969, 379);

-- --------------------------------------------------------

--
-- Structure de la table `Users`
--

CREATE TABLE `Users` (
  `id` int(11) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `Prenom` varchar(50) NOT NULL,
  `Age` int(11) DEFAULT NULL,
  `Ville` varchar(50) DEFAULT NULL,
  `Login` varchar(20) NOT NULL,
  `Mdp` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `Users`
--

INSERT INTO `Users` (`id`, `Nom`, `Prenom`, `Age`, `Ville`, `Login`, `Mdp`) VALUES
(1, 'HILALA', 'Sami', 67, 'Marseille', 'Roiduppt', 'PHPboss'),
(2, 'CHAVRET', 'Yann', 40, 'Marseille', 'Sensei', 'Simplon13'),
(3, 'DI PALMA', 'Emilie', 31, 'Grenoble', 'emEmem', 'DIPAdipa'),
(4, 'GAUTHIER', 'Briac', 27, 'Brest', 'Deuze', 'Treize'),
(5, 'HASSANI', 'Mounia', 23, 'Marseille', 'Moumou', 'NianiA'),
(6, 'MERABET', 'Sofiane', 30, 'Marseille', 'Sousou', 'TEBarem'),
(7, 'FRAY', 'Lorisse', 21, 'Aubagne', 'Lolo', 'RirissE'),
(8, 'BOUZIT', 'Sofiane', 30, 'Marseille', 'SOF', 'ssHH88'),
(9, 'FRAY', 'Hugo', 29, 'Brest', 'Hugogol', 'FDPNice'),
(10, 'ZOUIT', 'Hicham', 20, 'Gardanne', 'HIchOU', 'TIzoU13'),
(11, 'Testeur', 'Testeur', 55, 'Testeur', 'Testeur', 'test'),
(12, 'ANGELINI', 'Alexis', 26, 'Marseille', 'alex', 'gigi'),
(26, 'TATA', 'Tutu', 44, 'Toto', 'jeannot', 'haha'),
(29, 'DIPALMA', 'Emilie', 31, 'Lyon', 'emi', 'dipa'),
(30, 'CHACHA', 'Yannou', 40, 'Marseille', 'Sensei13', 'Simplon13'),
(31, 'SYLVAIN', 'Conny', 33, 'Marseille', 'Syl', 'filsdediv'),
(32, 'MANSI', 'Mounir', 37, 'Marseille', 'Mou', 'mansi'),
(33, 'LADOUILLE', 'Jo', 37, 'Marseille', 'johny', 'azerty'),
(34, 'TEST', 'Test', 22, 'Test', 'test4', 'azerty'),
(35, 'CHAVRET', 'Jean-Louis', 79, 'Marseille', 'JLC', 'padre'),
(36, 'CHAVRET', 'Daniele', 83, 'Marseille', 'DAN', 'madre'),
(41, 'BLA', 'Bla', NULL, 'Bla', 'bla', 'blabla');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Fournisseur`
--
ALTER TABLE `Fournisseur`
  ADD PRIMARY KEY (`Id_fournisseur`) USING BTREE,
  ADD UNIQUE KEY `Code_fournisseur` (`Code_fournisseur`) USING BTREE,
  ADD UNIQUE KEY `Raison_sociale` (`Raison_sociale`) USING BTREE,
  ADD UNIQUE KEY `Code_postal` (`Code_postal`) USING BTREE,
  ADD UNIQUE KEY `Localite` (`Localite`) USING BTREE;

--
-- Index pour la table `Livres`
--
ALTER TABLE `Livres`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Auteur` (`Auteur`) USING BTREE,
  ADD KEY `Nom` (`Nom`(10)) USING BTREE,
  ADD KEY `Editeur` (`Editeur`(10)) USING BTREE;

--
-- Index pour la table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `Login` (`Login`),
  ADD KEY `Nom` (`Nom`(10)) USING BTREE,
  ADD KEY `Prenom` (`Prenom`(10)) USING BTREE,
  ADD KEY `Ville` (`Ville`(10)) USING BTREE;

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Fournisseur`
--
ALTER TABLE `Fournisseur`
  MODIFY `Id_fournisseur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `Livres`
--
ALTER TABLE `Livres`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT pour la table `Users`
--
ALTER TABLE `Users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
