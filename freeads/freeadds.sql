-- phpMyAdmin SQL Dump
-- version 4.2.8
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Dim 21 Septembre 2014 à 14:28
-- Version du serveur :  5.6.20
-- Version de PHP :  5.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `freeadds`
--

-- --------------------------------------------------------

--
-- Structure de la table `annonces`
--

CREATE TABLE IF NOT EXISTS `annonces` (
`id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `tags` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ville` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prix` int(11) NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `annonces`
--

INSERT INTO `annonces` (`id`, `title`, `description`, `tags`, `ville`, `prix`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 'Tablette Samsung NOTE Pro 12.2" ', 'Vends, cause double emploi, une Tablette Samsung NOTE Pro 12.2 " avec le stylet,, NEUVE juste déballée pour la charger et faire quelques tests.\r\nPremier contact par courriel pour éviter les SMS "bidons" genre: je suis en déplacement et vous donne de 25 à 35 euro(s) pour l''expédition...\r\nFacture ORANGE de 538,26 euro(s) fournie', 'informatique', 'Lyon', 430, 1, '2014-09-18 12:57:57', '2014-09-18 12:57:57'),
(4, 'MERCEDES Classe B 200 Cdi Pack sport CVT', 'Jante alu, toit panoramique, intérieur cuir noir, vitres électriques avant arrière, régulateur de vitesse, boite automatique, radio, gps, siège avant électriques et chauffants, faible kilométrage, radar recul avant et arrière? révision effectué, 4 pneus Pirelli monté en décembre 2013, contrôle technique à jour.', 'voiture', 'Marzy', 12000, 1, '2014-09-18 14:04:45', '2014-09-18 14:04:45'),
(6, 'Robots', 'Je vend les robots officiels de star wars et de wall-e', 'robots', 'Lyon', 2500, 5, '2014-09-18 14:42:17', '2014-09-21 11:08:09'),
(8, 'Studio agencé 31m² tout confort', 'Studio agencé de 31m² utiles + combles de 21m² offrant rangement, cumulus, lave linge, couchage d''appoint.\r\nSitué au calme dans un grand parc arboré bien entretenu au pied des monts d''Or.\r\nLe studio est entièrement équipé: canapé convertible haut de gamme, TV LED 101 cm, lave-linge séchant récent, frigo et congélateur, four multifonctions,table 2 feux induction, deux tables et chaises, rangements, etc.\r\nSitué à coté du collège / lycée Jean Perrin, il est desservi par trois lignes de bus (2, 20, 71), il se trouve à 10 mn à pieds du cinéma Pathé Vaise et 20 mn à pieds de la gare de Vaise. Il est également situé à 10 mn à pieds du centre commercial de St Rambert.', 'location', 'Lyon', 550, 5, '2014-09-21 13:37:14', '2014-09-21 13:37:14'),
(9, 'Massage chinois Lyon Relaxation Chinoise Lyon', '118 Rue Bugeaud 69006 LYON cabines climatisés ouverture 7/7 de 10h00 à 20h00\r\n\r\nTél : 0426009441 / 0619886862 avec ou sans rendez-vous\r\n\r\nà proximité métro Brotteaux et Masséna\r\n\r\nParking Brotteaux à 100m\r\n\r\nINSTITUT DE RELAXATION CHINOISE ET DE MASSAGE CHINOIS\r\n\r\nLe vrai massage de relaxation du corps et de l''esprit,il invite à la détente du corps et permet la relaxation de l''esprit en aidant le massé a prendre conscience de son corps dans son volume. Ce massage associe des techniques de massage chinoises et massage tonique.\r\n\r\nTARIFS: \r\n- massage relaxation : 60 minutes : 50€\r\n\r\n- massage chinois : 60 minutes : 50€\r\n\r\n- massage tonique : 60 minutes : 60€\r\n\r\n- massage sur futon : 60 minutes : 70€\r\n\r\n- massage aux huiles essentielles chaudes 60 minutes :60 €\r\n\r\n- massage 4 mains : 60 minutes :100 €\r\n\r\n- massage des pieds : 40 minutes : 40 €\r\n\r\n- massage de la tête : 30 minutes: 30 €', 'massage', 'Lyon', 30, 5, '2014-09-21 13:41:00', '2014-09-21 13:41:00'),
(10, 'CHATONS PERSANS CHINCHILLAS ET BLEU GOLDEN', '4 adorables chatons persans Chinchilla, Silver shaded et Bleu Golden sont disponibles : \r\n1 femelle Silver shaded née le 16 avril : 950€ \r\nMère puce : 250269500283763\r\n3 males nés le 16 mai : 1 Chinchilla et 1 Silver (750€ pour compagnie, 950€ pour reproduction) 1 Bleu Golden (750€ pour compagnie)\r\nMère puce : 250269500589460\r\nIls peuvent rejoindre leur nouveau foyer. \r\nLes chatons partent tatoués (pucés), traités contre les puces, vermifugés, vaccinés Typhus Coryza (primo vaccination) , et inscrits au LOOF (possibilité non LOOF pour les males à 650€). Certificat de bonne santé établi par vétérinaire. \r\nIls sont élevés en famille avec beaucoup de soins et d''attention , ils sont habitués à la vie quotidienne de famille, et auront besoin de tendresse et d un toilettage simple mais régulier. \r\nChatons issus de lignées prestigieuses de champions. Les parents sont testés négatifs pour les maladies PKD FIV FeLV .\r\nVisibles sur Montpellier.\r\nLivraison possible moyennant supplément', 'annimaux', 'marseille', 650, 5, '2014-09-21 13:43:16', '2014-09-21 13:43:16'),
(11, 'Volvo V60 SUMMUM D3', '5 portes Volvo V60 SUMMUM D3 année 2013\r\nDiesel boîte de vitesse automatique, 27 471 km. \r\nMise en circulation : 01/03/2013.\r\nCouleur : blanc verni, intérieur cuir noir. \r\nInfo technique : 8 CV fiscaux, 5 places.\r\nEquipements et options : accoudoir central, allumage automatique des feux, fermeture centralisée, GPS couleur, ordinateur de bord, sièges électriques, vitres électriques, vitres surteintées, volant multifonctions, sièges électriques à mémoire, technologie de réseau local sans fil, appuie-reins passager, appuie-reins passager électrique, système antiblocage des freins : évite le blocage des roues pendant le freinage afin de garder le contrôle directionnel du véhicule, airbags frontaux, airbags latéraux, contrôle de stabilité ou Contrôle dynamique de trajectoire, radar arrière de détection d''obstacles, fixations ISOFIX, non fumeur, régulateur de vitesse, limiteur de vitesse, volant cuir, climatisation multi zone, direction assistée oui, réglages disponibles pour le volant hauteur et profondeur, jantes alliage\r\nInfo service : garantie 12 mois.\r\nPrix 28 900 €. \r\nContact : FELIX FAURE AUTOMOBILES VAISE.', 'voiture', 'lyon', 28000, 5, '2014-09-21 13:46:11', '2014-09-21 13:46:11');

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
`id` int(10) unsigned NOT NULL,
  `sender_id` int(10) unsigned NOT NULL,
  `dest_id` int(10) unsigned NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `messages`
--

INSERT INTO `messages` (`id`, `sender_id`, `dest_id`, `body`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'salut', 1, '0000-00-00 00:00:00', '2014-09-21 13:31:00'),
(2, 5, 1, 'fdsfd f sdf', 1, '2014-09-19 12:38:51', '2014-09-21 13:31:00'),
(3, 5, 1, 'salut', 1, '2014-09-19 12:39:45', '2014-09-21 13:31:00'),
(5, 5, 5, 'Salut moi', 1, '2014-09-19 13:25:09', '2014-09-21 14:07:01'),
(6, 5, 5, 'Salut', 1, '2014-09-19 13:30:28', '2014-09-21 14:07:01'),
(8, 5, 5, 'Le passage de Lorem Ipsum standard, utilisé depuis 1500\r\n\r\n"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."\r\n\r\nSection 1.10.32 du "De Finibus Bonorum et Malorum" de Ciceron (45 av. J.-C.)\r\n\r\n"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"\r\n\r\nTraduction de H. Rackham (1914)\r\n\r\n"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?"\r\n\r\nSection 1.10.33 du "De Finibus Bonorum et Malorum" de Ciceron (45 av. J.-C.)\r\n\r\n"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat."\r\n\r\nTraduction de H. Rackham (1914)\r\n\r\n"On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains."', 1, '2014-09-19 13:32:22', '2014-09-21 14:07:01');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_09_15_081041_create_utilisateur_table', 1),
('2014_09_16_102957_create_annonce_table', 1),
('2014_09_17_105508_create_uploads_table', 1),
('2014_09_19_092410_create_messages_table', 2),
('2014_09_19_095011_create_messages_table', 3);

-- --------------------------------------------------------

--
-- Structure de la table `uploads`
--

CREATE TABLE IF NOT EXISTS `uploads` (
`id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `annonce_id` int(10) unsigned NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `uploads`
--

INSERT INTO `uploads` (`id`, `user_id`, `annonce_id`, `nom`, `created_at`, `updated_at`) VALUES
(4, 1, 2, 'samsung1.jpg', '2014-09-18 12:57:57', '2014-09-18 12:57:57'),
(5, 1, 2, 'samsung2.jpg', '2014-09-18 12:57:57', '2014-09-18 12:57:57'),
(6, 1, 2, 'samsung3.jpg', '2014-09-18 12:57:57', '2014-09-18 12:57:57'),
(7, 1, 4, 'mercedes1.jpg', '2014-09-18 14:04:45', '2014-09-18 14:04:45'),
(8, 1, 4, 'mercedes2.jpg', '2014-09-18 14:04:45', '2014-09-18 14:04:45'),
(9, 1, 4, 'mercedes3.jpg', '2014-09-18 14:04:45', '2014-09-18 14:04:45'),
(17, 1, 6, '2012-02-04 01.21.25.jpg', '2014-09-18 14:42:17', '2014-09-18 14:42:17'),
(18, 1, 6, '2012-02-04 01.36.29.jpg', '2014-09-18 14:42:17', '2014-09-18 14:42:17'),
(20, 1, 6, '2012-02-04 02.18.04.jpg', '2014-09-18 14:42:17', '2014-09-18 14:42:17'),
(21, 1, 6, '2012-02-04 01.21.25.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 5, 8, 'maison1.jpg', '2014-09-21 13:37:14', '2014-09-21 13:37:14'),
(23, 5, 8, 'maison2.jpg', '2014-09-21 13:37:14', '2014-09-21 13:37:14'),
(24, 5, 8, 'maison3.jpg', '2014-09-21 13:37:14', '2014-09-21 13:37:14'),
(25, 5, 8, 'maison4.jpg', '2014-09-21 13:37:14', '2014-09-21 13:37:14'),
(26, 5, 9, 'massage1.jpg', '2014-09-21 13:41:00', '2014-09-21 13:41:00'),
(27, 5, 9, 'massage2.jpg', '2014-09-21 13:41:00', '2014-09-21 13:41:00'),
(28, 5, 9, 'massage3.jpg', '2014-09-21 13:41:00', '2014-09-21 13:41:00'),
(29, 5, 10, 'chat1.jpg', '2014-09-21 13:43:16', '2014-09-21 13:43:16'),
(30, 5, 10, 'chat2.jpg', '2014-09-21 13:43:16', '2014-09-21 13:43:16'),
(31, 5, 10, 'chat3.jpg', '2014-09-21 13:43:16', '2014-09-21 13:43:16'),
(32, 5, 11, 'volvo1.jpg', '2014-09-21 13:46:11', '2014-09-21 13:46:11'),
(33, 5, 11, 'volvo2.jpg', '2014-09-21 13:46:11', '2014-09-21 13:46:11'),
(34, 5, 11, 'volvo3.jpg', '2014-09-21 13:46:11', '2014-09-21 13:46:11');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(10) unsigned NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `confirmation_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `confirmed`, `confirmation_code`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$TZz8Bak/7QLgKyjacVrV7.NRFX4aHbD7tqQEHdEdt5C44uD8OV4Lu', 'admin@admin.fr', 1, NULL, 'ElDzS2zfuNT5zZrg75t7nTgELEDZu1Ksqsy3xe7tsytUQXHXwAJR1d6C9ROP', '2014-09-18 12:01:55', '2014-09-21 13:32:20'),
(5, 'users', '$2y$10$ypKcUyz6xfoVSC20ixXEJORd3vf3Ql6KbQ4rwDve88X5OnL/H4/L2', 'users@users.fr', 1, NULL, 'srWHaVHNYt91D1QOoWIfLn0rGHYLVKeXcNaw5FEP5hY5yEqmJgPH5yru5lVM', '2014-09-19 12:22:13', '2014-09-21 13:29:54');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `annonces`
--
ALTER TABLE `annonces`
 ADD PRIMARY KEY (`id`), ADD KEY `annonces_user_id_foreign` (`user_id`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
 ADD PRIMARY KEY (`id`), ADD KEY `messages_sender_id_foreign` (`sender_id`), ADD KEY `messages_dest_id_foreign` (`dest_id`);

--
-- Index pour la table `uploads`
--
ALTER TABLE `uploads`
 ADD PRIMARY KEY (`id`), ADD KEY `uploads_user_id_foreign` (`user_id`), ADD KEY `uploads_annonce_id_foreign` (`annonce_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `annonces`
--
ALTER TABLE `annonces`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `uploads`
--
ALTER TABLE `uploads`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `annonces`
--
ALTER TABLE `annonces`
ADD CONSTRAINT `annonces_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `messages`
--
ALTER TABLE `messages`
ADD CONSTRAINT `messages_dest_id_foreign` FOREIGN KEY (`dest_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `messages_sender_id_foreign` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `uploads`
--
ALTER TABLE `uploads`
ADD CONSTRAINT `uploads_annonce_id_foreign` FOREIGN KEY (`annonce_id`) REFERENCES `annonces` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `uploads_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
