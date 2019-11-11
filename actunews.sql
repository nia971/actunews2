-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 31 oct. 2019 à 19:07
-- Version du serveur :  10.4.6-MariaDB
-- Version de PHP :  7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `actunews`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `titre` varchar(256) NOT NULL,
  `contenu` text NOT NULL,
  `image` varchar(256) NOT NULL,
  `date_creation` timestamp NOT NULL DEFAULT current_timestamp(),
  `categorie_id` int(11) NOT NULL,
  `auteur_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `titre`, `contenu`, `image`, `date_creation`, `categorie_id`, `auteur_id`) VALUES
(1, 'Journée de garde à vue pour Chalus et Penchard', 'Véritable coup de tonnerre dans la sphère politique. Hier matin, dès leur arrivée dans les locaux de la DIPJ, le président de Région et sa 2e vice-présidente qui est également maire de Basse-Terre, se sont vus signifier leur placement en garde à vue dans l\'affaire « Averne ».\r\n\r\nDu faste républicain, le week-end dernier à l\'occasion de la visite du Premier ministre, au régime « plats réchauffés », hier, lors d\'un placement en garde à vue dans un dossier ouvert en préliminaire pour « détournement de fonds publics et concussion », il n\'y a décidément qu\'un tout petit pas que vient d\'effectuer le président de Région Ary Chalus. Et ce n\'est pas le malaise passager de Marie-Luce Penchard, tout à la fois 2e vice-présidente au conseil régional et maire de Basse-Terre,...\r\n\r\n', 'tribunal.jpeg', '2019-10-23 18:26:45', 1, 4),
(30, 'France : le Sénat vote l\'interdiction du port du voile en sortie scolaire\r\n\r\n', 'Les sénateurs français ont adopté, mardi, une proposition de loi interdisant le port de signes religieux, dont le voile, aux parents accompagnant des sorties scolaires. Elle avait été déposée par le groupe Les Républicains, majoritaire au Sénat.\r\n\r\nLe débat a duré près de cinq heures. Après des échanges passionnés, les sénateurs ont adopté, mardi 29 octobre, une proposition de loi visant à interdire le port de signes religieux aux parents accompagnant des sorties scolaires en France. Le texte étend \"aux personnes qui participent, y compris lors des sorties scolaires, aux activités liées à l\'enseignement dans ou en dehors des établissements\" l\'interdiction des signes religieux ostensibles imposée par la loi de 2004.\r\n\r\n', 'femme-voilee-paris-m_0.jpeg', '2019-10-30 18:55:50', 1, 29),
(31, 'La France se lance à son tour dans le cannabis thérapeutique', 'L’Assemblée nationale a voté vendredi en faveur de l’expérimentation du cannabis thérapeutique, déjà menée dans une trentaine de pays, à partir de l’an prochain. En s’appuyant sur le retour des patients, elle visera à trouver la formule française.\r\n\r\nLa mesure était attendue et a été votée, vendredi 25 octobre, à l’Assemblée nationale : la France va expérimenter durant deux ans l’usage du cannabis thérapeutique à partir du premier semestre 2020. Une décision qui devrait soulager de nombreux patients atteints de certaines pathologies et pour lesquels les antidouleurs classiques n’agissent pas ou plus.', 'sante-cannabis-therapeutique.jpg', '2019-10-30 18:55:50', 5, 29);

-- --------------------------------------------------------

--
-- Structure de la table `auteur`
--

CREATE TABLE `auteur` (
  `id` int(11) NOT NULL,
  `prenom` varchar(80) NOT NULL,
  `nom` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `auteur`
--

INSERT INTO `auteur` (`id`, `prenom`, `nom`, `email`, `password`) VALUES
(1, 'Hugo', 'LIEGEARD', 'hugo@actu.news', 'actunews'),
(2, 'tanely', 'nely', 'tanely@actu.news', 'tanely'),
(4, 'tanely', 'nely', 'tanely@actu.news', 'tanely'),
(5, 'tanely', 'nely', 'tanely@actu.news', 'tanely'),
(6, 'tanely', 'nely', 'tanely@actu.news', 'tanely'),
(7, 'tanely', 'nely', 'tanely@actu.news', 'tanely'),
(8, 'tanely', 'nely', 'tanely@actu.news', 'tanely'),
(9, 'tanely', 'nely', 'tanely@actu.news', 'tanely'),
(10, 'tanely', 'nely', 'tanely@actu.news', 'tanely'),
(11, 'tanely', 'nely', 'tanely@actu.news', 'tanely'),
(12, 'tanely', 'nely', 'tanely@actu.news', 'tanely'),
(13, 'tanely', 'nely', 'tanely@actu.news', 'tanely'),
(14, 'tanely', 'nely', 'tanely@actu.news', 'tanely'),
(15, 'tanely', 'nely', 'tanely@actu.news', 'tanely'),
(16, 'tanely', 'nely', 'tanely@actu.news', 'tanely'),
(17, 'tanely', 'nely', 'tanely@actu.news', 'tanely'),
(18, 'tanely', 'nely', 'tanely@actu.news', 'tanely'),
(19, 'tanely', 'nely', 'tanely@actu.news', 'tanely'),
(20, 'tanely', 'nely', 'tanely@actu.news', 'tanely'),
(21, 'tanely', 'nely', 'tanely@actu.news', 'tanely'),
(22, 'tanely', 'nely', 'tanely@actu.news', 'tanely'),
(23, 'tanely', 'nely', 'tanely@actu.news', 'tanely'),
(24, 'tanely', 'nely', 'tanely@actu.news', 'tanely'),
(25, 'tanely', 'nely', 'tanely@actu.news', 'tanely'),
(26, 'tanely', 'nely', 'tanely@actu.news', 'tanely'),
(27, 'tanely', 'nely', 'tanely@actu.news', 'tanely'),
(28, 'tanely', 'nely', 'tanely@actu.news', 'tanely'),
(29, 'Nia', 'VITALIS', 'nia@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `nom`) VALUES
(1, 'Politique'),
(2, 'Economie'),
(3, 'Sports'),
(4, 'Culture'),
(5, 'Sciences');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categorie_id` (`categorie_id`),
  ADD KEY `auteur_id` (`auteur_id`);

--
-- Index pour la table `auteur`
--
ALTER TABLE `auteur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT pour la table `auteur`
--
ALTER TABLE `auteur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`categorie_id`) REFERENCES `categorie` (`id`),
  ADD CONSTRAINT `article_ibfk_2` FOREIGN KEY (`auteur_id`) REFERENCES `auteur` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
