-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 17 fév. 2024 à 17:30
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `id22011427_marineh`
--

-- --------------------------------------------------------

--
-- Structure de la table `collection`
--

CREATE TABLE `collection` (
  `id_collection` int(11) NOT NULL,
  `nom_collection` varchar(50) NOT NULL,
  `description_collection` text NOT NULL,
  `style` varchar(200) NOT NULL,
  `id_defile` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `collection`
--

INSERT INTO `collection` (`id_collection`, `nom_collection`, `description_collection`, `style`, `id_defile`) VALUES
(1, 'Renaissance Moderne', 'Cette collection combine des éléments de la Renaissance italienne avec une touche moderne, en utilisant des motifs floraux audacieux, des brocarts luxueux et des accessoires opulents. Elle met en avant une fusion entre le passé et le présent, caractérisée par des superpositions complexes et des couleurs riches.', 'Eclectique et romantique, avec une forte influence historique.', 2),
(2, 'Voyage Urbain', 'Inspirée par l exploration urbaine, cette collection présente des silhouettes structurées mélangées à des éléments de mode de rue. Elle utilise des matières techniques et des imprimés innovants pour créer des looks à la fois pratiques et sophistiqués.', 'Luxe moderne avec une touche d aventure urbaine.', 5),
(3, 'Élégance Intemporelle', 'Cette collection rend hommage à l élégance classique de Chanel avec une série de pièces en tweed, des robes en soie et des ensembles embellis de perles. Les silhouettes sont à la fois classiques et modernisées, avec un accent sur le raffinement et la féminité.', 'Classique et sophistiqué, avec une attention méticuleuse aux détails.', 1),
(4, 'Féminité Réinventée', 'Dior explore les nuances de la féminité avec cette collection qui mélange des textures douces, des motifs délicats et des coupes audacieuses. Les looks varient entre force et douceur, avec une palette de couleurs allant des teintes pastel aux noirs profonds.', 'Romantique et puissant, avec un équilibre entre tradition et innovation.', 3),
(5, 'Gucci x Adidas : Fusion Iconique', 'La collection “Fusion Iconique” de Gucci x Adidas réinvente le sportswear avec une touche de luxe, en mêlant les célèbres bandes Adidas aux motifs et textiles luxueux de Gucci. Cette collaboration célèbre l’union des mondes du sport et de la haute couture à travers des pièces qui allient confort et élégance. La gamme propose des vêtements, des chaussures et des accessoires conçus pour un public audacieux qui apprécie à la fois le raffinement et la fonctionnalité.', 'Une alliance parfaite entre l’élégance haute couture de Gucci et l’esprit sportif d’Adidas, caractérisée par une esthétique audacieuse et innovante.\r\n', 4);

-- --------------------------------------------------------

--
-- Structure de la table `confectionne`
--

CREATE TABLE `confectionne` (
  `id_maison` int(11) NOT NULL,
  `id_piece` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `confectionne`
--

INSERT INTO `confectionne` (`id_maison`, `id_piece`) VALUES
(1, 1),
(1, 2),
(2, 3),
(2, 4),
(3, 5),
(3, 6),
(4, 7),
(4, 8);

-- --------------------------------------------------------

--
-- Structure de la table `createur`
--

CREATE TABLE `createur` (
  `id_createur` int(11) NOT NULL,
  `nom_createur` varchar(50) NOT NULL,
  `pays_createur` varchar(100) NOT NULL,
  `bio` text NOT NULL,
  `poste` varchar(50) NOT NULL,
  `id_maison` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `createur`
--

INSERT INTO `createur` (`id_createur`, `nom_createur`, `pays_createur`, `bio`, `poste`, `id_maison`) VALUES
(1, 'Alessandro Michele', 'Italie', ' Alessandro Michele a rejoint Gucci en 2002 et a été nommé directeur créatif en 2015. Il est connu pour son approche éclectique et romantique de la mode, qui a revitalisé la marque.', 'Directeur Créatif', 1),
(2, 'Nicolas Ghesquière', 'France', 'Nicolas Ghesquière est le directeur artistique des collections femme de Louis Vuitton depuis 2013. Avant cela, il a été acclamé pour son travail chez Balenciaga. Il est connu pour ses designs futuristes et son approche innovante de la mode.', 'Directeur Artistique des Collections Femme', 2),
(3, 'Virginie Viard', 'France', 'Virginie Viard a succédé à Karl Lagerfeld en tant que directrice artistique de Chanel après son décès en 2019. Elle a travaillé étroitement avec Lagerfeld pendant plus de 30 ans et continue de perpétuer l héritage de la marque tout en y apportant sa propre touche.', 'Directrice Artistique', 3),
(4, 'Maria Grazia Chiuri', 'Italie', 'Maria Grazia Chiuri a rejoint Dior en 2016 en tant que première femme directrice artistique de la marque. Avant cela, elle a co-dirigé Valentino. Elle est reconnue pour son engagement envers le féminisme et l empowerment des femmes à travers ses collections.', ' Directrice Artistique', 4);

-- --------------------------------------------------------

--
-- Structure de la table `creer`
--

CREATE TABLE `creer` (
  `id_maison` int(11) NOT NULL,
  `id_collection` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `creer`
--

INSERT INTO `creer` (`id_maison`, `id_collection`) VALUES
(1, 1),
(1, 5),
(2, 2),
(3, 3),
(4, 4);

-- --------------------------------------------------------

--
-- Structure de la table `defile`
--

CREATE TABLE `defile` (
  `id_defile` int(11) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `ville` varchar(100) NOT NULL,
  `annee_defile` year(4) NOT NULL,
  `saison_defile` varchar(100) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `defile`
--

INSERT INTO `defile` (`id_defile`, `titre`, `ville`, `annee_defile`, `saison_defile`, `date_debut`, `date_fin`) VALUES
(1, 'Paris Fashion Week - Haute Couture Automne/Hiver', 'Paris', '2018', 'Automne/Hiver', '2018-07-01', '2018-07-05'),
(2, 'Milan Fashion Week - Prêt-à-Porter Printemps/Été', 'Milan', '2019', 'Printemps/Été', '2019-09-18', '2019-09-24'),
(3, 'New York Fashion Week - Prêt-à-Porter Automne/Hiver', 'New York', '2023', 'Automne/Hiver', '2023-02-10', '2023-02-17'),
(4, 'London Fashion Week - Prêt-à-Porter Printemps/Été', 'Londres', '2023', 'Printemps/Été', '2023-09-16', '2023-09-20'),
(5, 'Paris Fashion Week - Prêt-à-Porter Printemps/Été', 'Paris', '2024', 'Printemps/Été', '2024-09-29', '2024-10-06'),
(6, 'Milan Fashion Week - Haute Couture Printemps/Été', 'Milan', '2024', 'Printemps/Été', '2024-07-20', '2024-07-27');

-- --------------------------------------------------------

--
-- Structure de la table `devoile`
--

CREATE TABLE `devoile` (
  `id_defile` int(11) NOT NULL,
  `id_photo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `devoile`
--

INSERT INTO `devoile` (`id_defile`, `id_photo`) VALUES
(1, 11),
(2, 13),
(3, 12),
(5, 14);

-- --------------------------------------------------------

--
-- Structure de la table `maison`
--

CREATE TABLE `maison` (
  `id_maison` int(11) NOT NULL,
  `nom_maison` varchar(20) NOT NULL,
  `pays_maison` varchar(100) NOT NULL,
  `description_maison` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `maison`
--

INSERT INTO `maison` (`id_maison`, `nom_maison`, `pays_maison`, `description_maison`) VALUES
(1, 'Gucci', 'Italie', 'La maison Gucci est une marque de luxe italienne fondée à Florence en 1921 par Guccio Gucci. À l’origine, Gucci était connue pour ses produits en cuir de haute qualité et son savoir-faire dans la maroquinerie. Au fil des années, Gucci s’est développée pour inclure une large gamme de produits de luxe, y compris des vêtements pour hommes et femmes, des chaussures, des accessoires, des bijoux, des parfums et des articles pour la maison. La marque est célèbre pour ses designs innovants et souvent audacieux, ainsi que pour son utilisation emblématique du motif GG et du bandeau vert-rouge-vert. Gucci est devenue l’une des marques de mode les plus prestigieuses et reconnues mondialement, symbolisant le glamour, le prestige et le style italien.'),
(2, 'Louis Vuitton', 'Française', 'Louis Vuitton est une maison de luxe française fondée en 1854 par Louis Vuitton. Initialement spécialisée dans la fabrication de malles de voyage haut de gamme, la marque s’est rapidement distinguée par l’innovation et la qualité de ses produits, notamment grâce à l’introduction du motif monogramme LV emblématique. Au fil des années, Louis Vuitton a élargi sa gamme pour inclure de la maroquinerie, des accessoires, des vêtements pour hommes et femmes, des chaussures, des montres, des bijoux et des parfums. Reconnue mondialement pour son savoir-faire artisanal et son héritage riche, Louis Vuitton symbolise le luxe, l’élégance et le style, et reste une des marques les plus prestigieuses et convoitées au monde. Avec ses boutiques situées dans les lieux les plus exclusifs à travers le globe, Louis Vuitton continue d’incarner l’excellence dans le domaine de la mode et du luxe.'),
(3, 'Chanel', 'Française', 'Chanel est une maison de haute couture française fondée à Paris en 1910 par Gabrielle « Coco » Chanel. La marque est célèbre pour révolutionner la garde-robe féminine en remplaçant la silhouette corsetée alors en vogue par des vêtements plus confortables et pratiques, tout en conservant une élégance indéniable. Chanel est renommée pour plusieurs innovations iconiques, telles que le tailleur en tweed, la petite robe noire, et le parfum Chanel N°5, l’un des parfums les plus vendus au monde. Au fil des ans, Chanel s’est diversifiée pour inclure non seulement des vêtements de haute couture, mais aussi du prêt-à-porter, des bijoux, des accessoires, des lunettes, et des produits de beauté. Dirigée par des figures emblématiques de la mode comme Karl Lagerfeld jusqu’à sa mort en 2019, Chanel continue de symboliser le luxe, le raffinement et l’innovation, en restant fidèle à son héritage de briser les conventions et de redéfinir les standards de la mode et de la beauté.'),
(4, 'Dior', 'Française', 'Christian Dior, fondée en 1946 par le couturier éponyme, est une prestigieuse maison de couture française qui a révolutionné la mode féminine avec la collection « New Look » en 1947. Cette collection emblématique a introduit une silhouette féminine marquée par une taille cintrée et des jupes volumineuses, redéfinissant l’élégance et le glamour de l’après-guerre. Dior symbolise le luxe et l’innovation, avec des collections qui incluent non seulement la haute couture et le prêt-à-porter, mais aussi des accessoires, des bijoux, des parfums et des cosmétiques. La marque a été guidée par des directeurs artistiques légendaires, tels que Yves Saint Laurent, John Galliano, et Maria Grazia Chiuri, qui ont tous contribué à son héritage riche et diversifié. Dior continue d’être une force influente dans l’industrie de la mode, en incarnant une sophistication intemporelle tout en repoussant les limites de la créativité.');

-- --------------------------------------------------------

--
-- Structure de la table `montre`
--

CREATE TABLE `montre` (
  `id_piece` int(11) NOT NULL,
  `id_photo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `montre`
--

INSERT INTO `montre` (`id_piece`, `id_photo`) VALUES
(1, 18),
(2, 17),
(4, 19),
(5, 15),
(7, 16);

-- --------------------------------------------------------

--
-- Structure de la table `participer`
--

CREATE TABLE `participer` (
  `id_maison` int(11) NOT NULL,
  `id_defile` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `participer`
--

INSERT INTO `participer` (`id_maison`, `id_defile`) VALUES
(1, 2),
(2, 5),
(3, 1),
(4, 3);

-- --------------------------------------------------------

--
-- Structure de la table `photo`
--

CREATE TABLE `photo` (
  `id_photo` int(11) NOT NULL,
  `nom_photo` varchar(50) NOT NULL,
  `description_photo` text NOT NULL,
  `url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `photo`
--

INSERT INTO `photo` (`id_photo`, `nom_photo`, `description_photo`, `url`) VALUES
(3, 'logo Chanel', 'logo Chanel', 'image_site/logo/chanel.png'),
(4, 'logo Gucci', 'logo Gucci', 'image_site/logo/gucci.png'),
(6, 'logo Louis Vuitton', 'logo Louis Vuitton', 'image_site/logo/LV.svg'),
(8, 'collection Gucci', 'Renaissance moderne', 'image_site/collection/gucci.jpg'),
(9, 'collection Gucci', 'Renaissance moderne', 'image_site/collection/gucci_collection.png'),
(10, 'collection Louis Vuitton', 'Voyage urbain', 'image_site/collection/lv_collectionvoyage.jpg'),
(11, 'défilé Chanel', 'Défilé 2018', 'image_site/defile/chanel_show.jpg'),
(12, 'défilé Dior', 'Défilé 2023', 'image_site/defile/dior_defilePFW_2018.jpg'),
(13, 'défilé Gucci', 'Défilé 2023', 'image_site/defile/gucci_renaissancemoderne_automnehiver.jpg'),
(14, 'défilé Louis Vuitton', 'Défilé 2024', 'image_site/defile/lv_defile.jpg'),
(15, 'tenue Chanel', 'Tailleur \"Tweed Signature\"', 'image_site/piece/chanel_tweedsignature.jpg'),
(16, 'jupe Dior', 'Jupe \"Jardin Secret\"', 'image_site/piece/dior_jupe.jpg'),
(17, 'manteau Gucci', 'Manteau \"Ducal Splendeur\" ', 'image_site/piece/gucci_manteau.jpg'),
(18, 'robe Gucci', 'Robe \"Jardin de Minuit\"', 'image_site/piece/gucci_robejardinminuit.jpg'),
(19, 'veste Louis Vuitton', 'Veste \"Horizon Métropolitain\"', 'image_site/piece/lv_vestehorizon.jpg'),
(56, 'test 11 bic', 'test 11 bis', 'image_site/collection/9ed8f53a3196479e3d2bc6abe860e6cf.png');

-- --------------------------------------------------------

--
-- Structure de la table `piece`
--

CREATE TABLE `piece` (
  `id_piece` int(11) NOT NULL,
  `nom_piece` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `id_collection` int(11) NOT NULL,
  `description_piece` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `piece`
--

INSERT INTO `piece` (`id_piece`, `nom_piece`, `type`, `id_collection`, `description_piece`) VALUES
(1, ' Robe Jardin de Minuit', ' Robe longue', 1, 'Une robe longue en soie noire, ornée de motifs floraux colorés brodés à la main et de détails en dentelle dorée, inspirée des jardins italiens à la Renaissance sous le clair de lune.'),
(2, 'Manteau Ducal Splendeur', 'Manteau', 1, 'Manteau en brocart avec des motifs complexes, rappelant les tapisseries de l époque de la Renaissance, rehaussé de boutons en forme de gemmes et d un col en fourrure synthétique.'),
(3, 'Sac à dos Explorer Urbain', 'Accessoire', 2, 'Un sac à dos pratique mais élégant, fabriqué en toile Monogram innovante et résistante à leau, avec des détails en cuir et des fermetures éclair sécurisées, parfait pour l aventurier urbain.'),
(4, 'Veste Horizon Métropolitain', 'Veste', 2, 'Veste en matière technique légère, dotée d un imprimé abstrait représentant le skyline d une métropole futuriste, conçue pour la mobilité et l élégance urbaine.'),
(5, 'Tailleur Tweed Signature', 'Ensemble', 3, 'Un tailleur classique en tweed, réinterprété avec une coupe moderne et des détails subtils en perles, incarnant l élégance intemporelle de Chanel.'),
(6, 'Robe Perle de Soirée', 'Robe', 3, 'Une robe en soie noire, délicatement drapée, avec un collier de perles intégré qui apporte une touche de sophistication et de glamour.'),
(7, 'Jupe Jardin Secret', 'Jupe', 4, 'Une jupe midi plissée, en tulle doux, avec des broderies florales appliquées à la main, évoquant la délicatesse et la profondeur des jardins secrets.'),
(8, 'Manteau Force d Élégance', 'Manteau', 4, 'Un manteau en laine structuré, avec une ceinture accentuant la taille et des boutons contrastants, représentant la force et l élégance de la femme moderne.');

-- --------------------------------------------------------

--
-- Structure de la table `represente`
--

CREATE TABLE `represente` (
  `id_collection` int(11) NOT NULL,
  `id_photo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `represente`
--

INSERT INTO `represente` (`id_collection`, `id_photo`) VALUES
(1, 8),
(1, 9),
(1, 56),
(2, 10);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `collection`
--
ALTER TABLE `collection`
  ADD PRIMARY KEY (`id_collection`),
  ADD KEY `id_defile` (`id_defile`);

--
-- Index pour la table `confectionne`
--
ALTER TABLE `confectionne`
  ADD PRIMARY KEY (`id_maison`,`id_piece`),
  ADD KEY `id_maison` (`id_maison`,`id_piece`),
  ADD KEY `confectionne_ibfk_2` (`id_piece`);

--
-- Index pour la table `createur`
--
ALTER TABLE `createur`
  ADD PRIMARY KEY (`id_createur`),
  ADD KEY `id_maison` (`id_maison`);

--
-- Index pour la table `creer`
--
ALTER TABLE `creer`
  ADD PRIMARY KEY (`id_maison`,`id_collection`),
  ADD KEY `id_maison` (`id_maison`,`id_collection`),
  ADD KEY `id_collection` (`id_collection`);

--
-- Index pour la table `defile`
--
ALTER TABLE `defile`
  ADD PRIMARY KEY (`id_defile`);

--
-- Index pour la table `devoile`
--
ALTER TABLE `devoile`
  ADD PRIMARY KEY (`id_defile`,`id_photo`),
  ADD KEY `id_defile` (`id_defile`,`id_photo`),
  ADD KEY `id_photo` (`id_photo`);

--
-- Index pour la table `maison`
--
ALTER TABLE `maison`
  ADD PRIMARY KEY (`id_maison`);

--
-- Index pour la table `montre`
--
ALTER TABLE `montre`
  ADD PRIMARY KEY (`id_piece`,`id_photo`),
  ADD KEY `id_piece` (`id_piece`,`id_photo`),
  ADD KEY `id_photo` (`id_photo`);

--
-- Index pour la table `participer`
--
ALTER TABLE `participer`
  ADD PRIMARY KEY (`id_maison`,`id_defile`),
  ADD KEY `id_maison` (`id_maison`),
  ADD KEY `id_defile` (`id_defile`);

--
-- Index pour la table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`id_photo`);

--
-- Index pour la table `piece`
--
ALTER TABLE `piece`
  ADD PRIMARY KEY (`id_piece`),
  ADD KEY `id_collection` (`id_collection`);

--
-- Index pour la table `represente`
--
ALTER TABLE `represente`
  ADD PRIMARY KEY (`id_collection`,`id_photo`),
  ADD KEY `id_collection` (`id_collection`,`id_photo`),
  ADD KEY `id_photo` (`id_photo`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `collection`
--
ALTER TABLE `collection`
  MODIFY `id_collection` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `createur`
--
ALTER TABLE `createur`
  MODIFY `id_createur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `defile`
--
ALTER TABLE `defile`
  MODIFY `id_defile` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `maison`
--
ALTER TABLE `maison`
  MODIFY `id_maison` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `photo`
--
ALTER TABLE `photo`
  MODIFY `id_photo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT pour la table `piece`
--
ALTER TABLE `piece`
  MODIFY `id_piece` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `collection`
--
ALTER TABLE `collection`
  ADD CONSTRAINT `collection_ibfk_1` FOREIGN KEY (`id_defile`) REFERENCES `defile` (`id_defile`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `confectionne`
--
ALTER TABLE `confectionne`
  ADD CONSTRAINT `confectionne_ibfk_1` FOREIGN KEY (`id_maison`) REFERENCES `maison` (`id_maison`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `confectionne_ibfk_2` FOREIGN KEY (`id_piece`) REFERENCES `piece` (`id_piece`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `createur`
--
ALTER TABLE `createur`
  ADD CONSTRAINT `createur_ibfk_1` FOREIGN KEY (`id_maison`) REFERENCES `maison` (`id_maison`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `creer`
--
ALTER TABLE `creer`
  ADD CONSTRAINT `creer_ibfk_1` FOREIGN KEY (`id_maison`) REFERENCES `maison` (`id_maison`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `creer_ibfk_2` FOREIGN KEY (`id_collection`) REFERENCES `collection` (`id_collection`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `devoile`
--
ALTER TABLE `devoile`
  ADD CONSTRAINT `devoile_ibfk_1` FOREIGN KEY (`id_photo`) REFERENCES `photo` (`id_photo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `devoile_ibfk_2` FOREIGN KEY (`id_defile`) REFERENCES `defile` (`id_defile`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `montre`
--
ALTER TABLE `montre`
  ADD CONSTRAINT `montre_ibfk_1` FOREIGN KEY (`id_photo`) REFERENCES `photo` (`id_photo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `montre_ibfk_2` FOREIGN KEY (`id_piece`) REFERENCES `piece` (`id_piece`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `participer`
--
ALTER TABLE `participer`
  ADD CONSTRAINT `participer_ibfk_1` FOREIGN KEY (`id_maison`) REFERENCES `maison` (`id_maison`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `participer_ibfk_2` FOREIGN KEY (`id_defile`) REFERENCES `defile` (`id_defile`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `piece`
--
ALTER TABLE `piece`
  ADD CONSTRAINT `piece_ibfk_1` FOREIGN KEY (`id_collection`) REFERENCES `collection` (`id_collection`);

--
-- Contraintes pour la table `represente`
--
ALTER TABLE `represente`
  ADD CONSTRAINT `represente_ibfk_1` FOREIGN KEY (`id_collection`) REFERENCES `collection` (`id_collection`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `represente_ibfk_2` FOREIGN KEY (`id_photo`) REFERENCES `photo` (`id_photo`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
