-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 02 avr. 2024 à 07:53
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `iiactualite`
--
CREATE DATABASE IF NOT EXISTS `iiactualite` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `iiactualite`;

-- --------------------------------------------------------

--
-- Structure de la table `actualites`
--

CREATE TABLE `actualites` (
  `id` int(11) NOT NULL COMMENT 'id de l''actualité',
  `titre` varchar(255) NOT NULL COMMENT 'titre de l''actualité',
  `texte` text NOT NULL COMMENT 'texte de l''actualité',
  `lien_image` varchar(255) NOT NULL COMMENT 'Chemin de l''image de l''article',
  `date` date NOT NULL COMMENT 'date de création de  l''actualité',
  `date_revision` date NOT NULL COMMENT 'date de révision de l''actualité',
  `id_auteur` int(11) NOT NULL COMMENT 'id de l''auteur de l''actualité',
  `id_tags` varchar(255) NOT NULL COMMENT 'id des tags de l''actu',
  `sources` text NOT NULL COMMENT 'sources de l''actualité'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `actualites`
--

INSERT INTO `actualites` (`id`, `titre`, `texte`, `lien_image`, `date`, `date_revision`, `id_auteur`, `id_tags`, `sources`) VALUES
(1, 'Portes Ouvertes de l’Institut Informatique Appliquée', 'L\'Institut d\'Informatique Appliquée (IIA) de Saint-Nazaire ouvre ses portes pour présenter ses formations en Informatique et Numérique, du niveau Bac +2 au Bac +5, lors de prochaines Portes Ouvertes. L\'équipe pédagogique sera disponible pour discuter des programmes, échanger sur les ambitions professionnelles des visiteurs et offrir une orientation personnalisée. Une opportunité à ne pas manquer pour ceux qui aspirent à une carrière prometteuse dans le domaine en constante évolution de l\'informatique et du numérique.', 'JPO.png', '2024-02-28', '2024-02-28', 1, '1&2', 'AURELIEN'),
(2, 'CEREMONIE | Remise des diplômes - 2023 -', '\r\nLa cérémonie de remise des diplômes à l\'IIA Saint-Nazaire a été un moment empreint d\'émotion et de célébration, marquant la réussite exceptionnelle des diplômés. Les étudiants, arborant fièrement leur toge académique, ont été honorés pour leurs accomplissements et leur dévouement au cours de leur parcours éducatif. Les enseignants et le personnel administratif ont partagé ce moment de fierté, félicitant les diplômés pour leur persévérance et leur excellence académique. Cette cérémonie a symbolisé non seulement la fin d\'une étape, mais aussi le début de nouvelles opportunités pour ces professionnels en herbe, prêts à faire leur marque dans le monde de l\'informatique et du numérique.', 'remise_diplome.jpg', '2023-10-18', '2023-10-18', 1, '1&3', 'IIA MAYENNE'),
(3, 'Les Nuits de l\'Orientation', 'Lancée avec succès début 2007 par la CCI de Paris, la NUIT DE L’ORIENTATION est désormais une manifestation nationale organisée par le réseau des CCI. Plus de 30 Chambres de commerce et d’industrie organiseront 2023 dans leur ville respective leur NUIT DE L’ORIENTATION. Durant ces soirées dédiées aux questions d’orientation scolaire et professionnelle, les jeunes et leurs parents peuvent rencontrer et interroger de nombreux professionnels et des spécialistes de l’orientation dans un environnement convivial.', 'orientation.png', '2023-11-29', '2023-11-29', 1, '1&3&4', 'ORIENT’EXPRESS'),
(4, 'JOB DATING Mardi 30 mai de 18h à 20h', 'Le Mardi 30 mai, de 18h à 20h, l\'IIA Saint-Nazaire vous convie à un événement incontournable : notre Job Dating annuel. C\'est l\'opportunité parfaite pour les étudiants en informatique et numérique de rencontrer directement des entreprises à la recherche de talents. Que vous soyez en quête d\'un stage, d\'une alternance ou d\'un emploi, ce rendez-vous vous permettra d\'échanger avec des recruteurs de renom, de découvrir les opportunités professionnelles du moment, et de présenter vos compétences aux acteurs majeurs de l\'industrie. Ne manquez pas cette chance de connecter votre avenir professionnel lors de ce Job Dating dynamique et prometteur.', 'job_dating.png', '2023-05-30', '2023-05-30', 1, '1&3&5', 'Centre de renconctre job'),
(5, 'Salon techalternance Nantes', 'Rejoignez-nous le Jeudi 13 avril de 9h à 17h au salon TechAlternance, l\'événement phare du recrutement pour l\'alternance dans l\'Industrie. L\'IIA Saint-Nazaire sera présente pour rencontrer les talents de demain passionnés par l\'informatique et le numérique. Profitez de cette occasion pour échanger avec notre équipe pédagogique, découvrir nos formations en alternance et discuter des opportunités professionnelles qui s\'offrent à vous. Venez nous rencontrer et explorez les voies passionnantes de l\'industrie numérique lors de cet événement unique !', 'techalternance.png', '2023-04-13', '2023-04-13', 1, '1&3', 'TECHALTERNANCE Aurelien Martineau');

-- --------------------------------------------------------

--
-- Structure de la table `auteurs`
--

CREATE TABLE `auteurs` (
  `id` int(11) NOT NULL COMMENT 'id de l''auteur',
  `nom` varchar(50) NOT NULL COMMENT 'nom de l''auteur',
  `prenom` varchar(50) NOT NULL COMMENT 'prenom de l''auteur',
  `mail` varchar(100) NOT NULL COMMENT 'mail de l''auteur'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `auteurs`
--

INSERT INTO `auteurs` (`id`, `nom`, `prenom`, `mail`) VALUES
(1, 'Martineau', 'Aurelien', 'aurelien.martineau@cci-formation.fr');

-- --------------------------------------------------------

--
-- Structure de la table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL COMMENT 'id du contact',
  `nom` varchar(50) NOT NULL COMMENT 'nom de celui qui contact',
  `prenom` varchar(50) NOT NULL COMMENT 'prenom de celui qui contact',
  `mail` varchar(100) NOT NULL COMMENT 'mail de celui qui contact',
  `titre` varchar(255) NOT NULL COMMENT 'titre du message',
  `message` text NOT NULL COMMENT 'contenu du message'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `is_categorie` tinyint(1) NOT NULL,
  `priorite` int(11) NOT NULL,
  `lien` varchar(255) NOT NULL DEFAULT '#'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `menu`
--

INSERT INTO `menu` (`id`, `nom`, `id_categorie`, `is_categorie`, `priorite`, `lien`) VALUES
(14, 'catégorie 1', 0, 1, 1, '#'),
(15, 'catégorie 2', 0, 1, 2, '#'),
(16, 'catégorie 3', 0, 1, 3, '#'),
(17, 'sous categorie 1.1', 14, 0, 1, '#'),
(18, 'sous categorie 1.2', 14, 0, 2, '#'),
(19, 'sous categorie 2.1', 15, 0, 3, '#'),
(20, 'sous categorie 3.1', 16, 0, 4, '#');

-- --------------------------------------------------------

--
-- Structure de la table `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `nom` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tags`
--

INSERT INTO `tags` (`id`, `nom`) VALUES
(1, 'IIA'),
(2, 'JPO'),
(3, 'vie_étudiante'),
(4, 'Orientation'),
(5, 'Avenir');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `actualites`
--
ALTER TABLE `actualites`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `auteurs`
--
ALTER TABLE `auteurs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `actualites`
--
ALTER TABLE `actualites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id de l''actualité', AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `auteurs`
--
ALTER TABLE `auteurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id de l''auteur', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id du contact', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
