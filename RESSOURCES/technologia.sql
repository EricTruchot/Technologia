-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 13, 2022 at 11:15 AM
-- Server version: 8.0.29-0ubuntu0.20.04.3
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `technologia`
--

-- --------------------------------------------------------

--
-- Table structure for table `Article`
--

CREATE TABLE `Article` (
  `id` int UNSIGNED NOT NULL,
  `titre` varchar(150) DEFAULT NULL,
  `description` longtext,
  `date` timestamp NULL DEFAULT NULL,
  `Entreprise_id` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Article`
--

INSERT INTO `Article` (`id`, `titre`, `description`, `date`, `Entreprise_id`) VALUES
(28, 'Starship', 'Le Starship (propulsé par le premier étage « Super Heavy »), anciennement appelé Big Falcon Rocket ou BFR, est un lanceur spatial super-lourd en cours de développement par SpaceX, visant une capacité à placer une charge utile de plus de 100 tonnes (150 plus tard selon Elon Musk) en orbite basse1. Ce nouveau lanceur aura la particularité d\'être entièrement réutilisable et pourrait jouer un rôle central dans les ambitions de la compagnie pour la colonisation de Mars. Il vise également à lancer des satellites vers l\'orbite basse ou géostationnaire, et pourrait à terme remplacer les fusées Falcon 9 et Falcon Heavy pour devenir le lanceur principal de SpaceX2. Les deux étages sont propulsés par des moteurs Raptor et brulent un mélange de dioxygène liquide et méthane liquide.\r\n\r\nLe vaisseau Starship est sélectionné par la NASA le 16 avril 2021 pour constituer l\'atterrisseur lunaire du programme américain Artemis, qui doit permettre un retour de l\'Homme sur la Lune à l\'horizon 20253. Par ailleurs, l\'usage du lanceur comme moyen de transport intercontinental est également envisagé4.\r\n\r\nLe Starship est annoncé en septembre 2017 à l\'occasion du Congrès international d\'astronautique5. Un premier prototype de vol, le Starhopper, est construit en 2019, et le premier vol d\'essai à haute altitude est effectué par le prototype SN8 en décembre 2020. Elon Musk, le PDG de l\'entreprise, espère pouvoir effectuer un premier lancement orbital en 2022, et un atterrissage inhabité sur Mars en 20246.\r\n\r\nLe Starship a pour particularité d\'être construit essentiellement à ciel ouvert, ce qui permet au public de suivre le développement du projet en détail, par exemple par l\'intermédiaire d\'observateurs enthousiastes qui filment et retransmettent en direct la construction et les tests des prototypes.', '2022-07-12 19:53:45', 7),
(29, 'Station spatiale internationale', 'La Station spatiale internationale, en abrégé SSI (surtout au Canada francophone) ou ISS (d\'après le nom anglais : International Space Station), est une station spatiale placée en orbite terrestre basse, occupée en permanence par un équipage international qui se consacre à la recherche scientifique dans l\'environnement spatial. Ce programme, lancé et piloté par la NASA, est développé conjointement avec l\'agence spatiale fédérale russe, avec la participation des agences spatiales européenne, japonaise et canadienne.', '2022-07-12 19:57:31', 8),
(30, 'Tianhe-2', 'Le Tianhe-2 est un supercalculateur situé à Canton, province de Guandong, en Chine, à l\'université nationale de technologie de défense (国防科技大学). Il est le successeur du Tianhe-IA, premier au classement du TOP500. C\'est un assemblage de 32 000 processeurs Intel Ivy Bridge et de 48 000 Intel Xeon Phi pour un total de 3 120 000 cœurs1.\r\n\r\nSa puissance atteignant les 33,86 pétaflops le classe premier au classement du TOP500 (juin 2013)2. Il conserve la première place du classement en novembre 2015, devant le second qui atteint 17 590 téraflops. Tianhe-2 a également produit des pics de 54 902,4 téraflops3.\r\n\r\nEn 2016, le gouvernement chinois a décidé d\'investir l\'équivalent de 500 millions de dollars américains (ÉUA), dans le développement des processeurs Phytium Mars d\'architecture ARMv8 et d\'une nouvelle génération de processeurs ShenWei (ou Sunway) d\'architecture inspirée du DEC Alpha, pour ce supercalculateur, à la suite de l\'interdiction par le gouvernement des États-Unis d\'exporter des processeurs Intel et AMD pour supercalculateur à destination de la République populaire de Chine. Le but initial était de doubler la capacité de TianHe-2 pour atteindre des pics de 100 TFlops4. Il devrait finalement comporter en plus des processeur 32 000 Xeons initiaux, 32 000 ShenWei et 96 000 Phytium ce qui devrait porter sa puissance de calcul à 300 PFLOPS5.', '2022-07-12 20:06:31', 9),
(31, 'T-800', 'Le T-800 est un Cyborg pour CYBernétique ORGanisme. Il a officiellement été créé par l\'ordinateur Skynet en 2029 pour lutter contre la résistance humaine croissante. Sa déclinaison dans le Cyberdyne Systems est série T-800 / T-850. Prototype à l\'origine créé par l’intelligence artificielle militaire Skynet (l\'ordinateur central du réseau de défense des États-Unis, qui crée et contrôle les machines après la guerre nucléaire), il est utilisé en 2029 dans un monde futuriste post-apocalyptique dans les missions d\'infiltration et d\'élimination de la résistance humaine en lutte contre Skynet.', '2022-07-12 20:11:20', 10),
(32, 'Batmobile', 'La Batmobile est le véhicule du personnage de bande dessinée Batman. Au fil des années, les artistes ayant travaillé sur la série ont souvent modifié son aspect et ses caractéristiques. La Batmobile figure dans les comics, les dessins animés, les jeux vidéo et les films mettant en scène le personnage de Batman.\r\n\r\n', '2022-07-12 20:21:16', 11),
(33, 'Réacteur arc', 'Le réacteur arc est une source d\'énergie conçue par Howard Stark et Anton Vanko dans le but de reproduire l\'énergie du Tesseract. Il y a deux versions principales du réacteur arc : la version industrielle originale à grande échelle et la version miniaturisée &quot;plastron&quot; qui a été perfectionnée par Tony Stark.', '2022-07-12 20:24:26', 12),
(34, 'Prothèse rétinienne Eye-Know', 'La prothèse rétinienne Eye-Know est le châssis de base de toutes les augmentations optiques : elle doit être implantée dans les deux yeux avant toute installation de dispositifs plus spécialisés. \r\nElle projette un ATH qui fournit à l\'utilisateur des données sur son état de santé et son équipement disponible. Elle assure également à l\'utilisateur l\'accès sans fil au stockage de ses données personnelles et lui permet d\'effectuer des télécommunications audiovisuelles directes.\r\n\r\nLa prothèse rétinienne Eye-Know comprend un système rétinien optoélectronique d\'affichage tête haute permettant d\'apposer des informations numériques directement dans le champ de vision de l\'utilisateur. L\'utilisateur expérimenté de la prothèse Eye-Know peut profiter de ses capacités inhérentes d\'autoprotection comme par exemple le suppresseur de flashs, qui évite les cécités temporaires ou permanentes provoquées par les lumières violentes, notamment les interférences visuelles des grenades à surpression et des mines.', '2022-07-12 20:29:19', 13),
(35, 'Citadel', 'Prévues pour être construites dans l\'ensemble de New Eden sous quelques conditions, les citadelles se veulent plus ou moins puissantes -- en lien avec le coût -- pour permettre à toutes les corporations d\'ambitionner de bâtir sa propre structure. L\'Astrahus se veut ainsi accessible au plus grand nombre, avant de monter en gamme avec la Fortizar pour atteindre une somme conséquente avec la Keepstar capable d\'accueillir les vaisseaux les plus imposants. La fourchette de prix se situe entre 700 millions et 120 milliards d\'ISK. On comptera une seule exception avec la citadelle Palatine Keepstar qui sera unique dans son genre, du moins si une alliance se voit capable de réunir environ 200 billions soit 15% de l\'économie de New Eden. Vu les sommes avancées, il fallait bien que ces forteresses spatiales soient dotées d\'un arsenal conséquent -- et personnalisable -- pour assurer sa défense, à moins de voir ses efforts s\'éparpiller dans l\'espace.', '2022-07-12 20:39:46', 14),
(36, 'Spot', 'Il s’agit d’un robot quadrupède à l’allure d’un chien qui peut exécuter différentes tâches et se déplacer dans des endroits où d’autres robots ont du mal à accéder. Jusqu’ici, la société a développé deux modèles de ce robot : le Spot Explorer et le Sport Enterprise.', '2022-07-12 20:53:10', 15);

-- --------------------------------------------------------

--
-- Table structure for table `Entreprise`
--

CREATE TABLE `Entreprise` (
  `id` int UNSIGNED NOT NULL,
  `nom` varchar(75) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Entreprise`
--

INSERT INTO `Entreprise` (`id`, `nom`) VALUES
(7, 'SpaceX'),
(8, 'NASA'),
(9, 'Chine'),
(10, 'Skynet'),
(11, 'Wayne Enterprises'),
(12, 'Stark Industries'),
(13, 'Sarif Industries'),
(14, 'CCP'),
(15, 'Boston Dynamics');

-- --------------------------------------------------------

--
-- Table structure for table `Media`
--

CREATE TABLE `Media` (
  `id` int UNSIGNED NOT NULL,
  `lien` varchar(255) DEFAULT NULL,
  `Article_id` int UNSIGNED DEFAULT NULL,
  `Entreprise_id` int UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Media`
--

INSERT INTO `Media` (`id`, `lien`, `Article_id`, `Entreprise_id`) VALUES
(25, './uploads/wallhaven-g8jy63.jpg', 28, NULL),
(26, './uploads/wallhaven-p88r5e.png', 28, NULL),
(27, './uploads/wallhaven-rd617j.jpg', 28, NULL),
(28, './uploads/wallhaven-3k9zld.jpg', 29, NULL),
(29, './uploads/wallhaven-nmw7pk.jpg', 29, NULL),
(30, './uploads/wallhaven-nmwe6y.jpg', 29, NULL),
(31, './uploads/Tianhe-2.jpg', 30, NULL),
(32, './uploads/8de9926d-fd96-4326-a361-75e9c4adfa82.jpg', 31, NULL),
(33, './uploads/3573138414_bba6c374c5_b.jpg', 31, NULL),
(34, './uploads/t-800-2.jpg', 31, NULL),
(35, './uploads/wallhaven-4yjgyk.jpg', 32, NULL),
(36, './uploads/wallhaven-nkr970.jpg', 32, NULL),
(37, './uploads/wallhaven-yj5y2l.jpg', 32, NULL),
(38, './uploads/51EPdvVQGzL._AC_.jpg', 33, NULL),
(39, './uploads/47678c73a92b5f9deaf376dd4261f51e.jpg', 33, NULL),
(40, './uploads/wallhaven-01xgrv.jpg', 34, NULL),
(42, './uploads/wallhaven-ne55vk.jpg', 34, NULL),
(43, './uploads/wallhaven-4yj6jg.jpg', 34, NULL),
(44, './uploads/citadel_11.png', 35, NULL),
(45, './uploads/12-124288_m.jpg', 35, NULL),
(46, './uploads/c19025dcc98b409cbcec2f1298255d14.jpg', 35, NULL),
(47, './uploads/raw.jpeg', 36, NULL),
(48, './uploads/bfarsace_190919_3680_0038.jpg', 36, NULL),
(49, './uploads/boston-dynamics-spot.jpg', 36, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Utilisateur`
--

CREATE TABLE `Utilisateur` (
  `id` int UNSIGNED NOT NULL,
  `email` varchar(75) DEFAULT NULL,
  `mdp` varchar(255) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Utilisateur`
--

INSERT INTO `Utilisateur` (`id`, `email`, `mdp`, `type`) VALUES
(1, 'admin@admin.com', '$2y$10$kuX4jHFpptxlsiy4Eou/auhQc1DNN4USZ4Ap8Z288hUfv0gGZPZBK', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Article`
--
ALTER TABLE `Article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Article_Entreprise_idx` (`Entreprise_id`);

--
-- Indexes for table `Entreprise`
--
ALTER TABLE `Entreprise`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Media`
--
ALTER TABLE `Media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Media_Article1_idx` (`Article_id`),
  ADD KEY `fk_Media_Entreprise1_idx` (`Entreprise_id`);

--
-- Indexes for table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Article`
--
ALTER TABLE `Article`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `Entreprise`
--
ALTER TABLE `Entreprise`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `Media`
--
ALTER TABLE `Media`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Article`
--
ALTER TABLE `Article`
  ADD CONSTRAINT `fk_Article_Entreprise` FOREIGN KEY (`Entreprise_id`) REFERENCES `Entreprise` (`id`);

--
-- Constraints for table `Media`
--
ALTER TABLE `Media`
  ADD CONSTRAINT `fk_Media_Article1` FOREIGN KEY (`Article_id`) REFERENCES `Article` (`id`),
  ADD CONSTRAINT `fk_Media_Entreprise1` FOREIGN KEY (`Entreprise_id`) REFERENCES `Entreprise` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
