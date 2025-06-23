-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2025 at 12:20 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `man9ousdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `activite_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `event_date` date NOT NULL,
  `activity_status` varchar(50) NOT NULL,
  `activity_photo` varchar(255) NOT NULL,
  `activity_location_` varchar(255) NOT NULL,
  `activity_category` varchar(255) NOT NULL,
  `commune_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`activite_id`, `title`, `description`, `event_date`, `activity_status`, `activity_photo`, `activity_location_`, `activity_category`, `commune_id`, `user_id`, `admin_id`) VALUES
(3, 'askjdcal', 'asòljkfeqòkfjeuiw', '2025-06-12', 'pending', 'uploads/1750154279_Screenshot 2025-01-22 162643.png', 'kieqfjohe3', 'community', 1, 3, NULL),
(4, 'wqiodjqweiod', 'hhhhhhhhhhhhhhhhhhhhhhhhhhh', '2025-06-27', 'accepter', 'uploads/1750154327_Screenshot 2025-04-09 151846.png', 'agadir', 'community', 4, 3, NULL),
(5, 'id=hjfhweuifyhweiu', 'jhfhweuifiuwrfyweif', '2025-06-19', 'pending', 'uploads/1750155234_Screenshot 2025-01-22 152906.png', 'jfjhehfewhfiu', 'environnement', 2, 3, NULL),
(6, 'id=òsakkcjs', 'bbddbdbdbdbd', '2025-06-18', 'pending', 'uploads/1750155335_Screenshot 2025-01-22 152659.png', 'agadir', 'environnement', 2, 3, NULL),
(7, 'id=sejfwehfkwe', 'oqiwjfquhriuqe', '2025-06-18', 'pending', 'uploads/1750157567_Screenshot 2025-04-09 201822.png', 'agadir', 'sport', 3, 3, NULL),
(8, 'id=sejfwehfkwe', 'oqiwjfquhriuqe', '2025-06-18', 'pending', 'uploads/1750157618_Screenshot 2025-04-09 201822.png', 'agadir', 'sport', 3, 3, NULL),
(9, 'ahfadfad', 'oqiwjfquhriuqe', '2025-06-06', 'pending', 'uploads/1750157811_Screenshot 2025-04-30 213811.png', 'agadir', 'environnement', 1, 3, NULL),
(10, 'hadagffav', 'ejvflkewjfnnnnnnnnnnnnjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', '2025-06-03', 'pending', 'uploads/1750157931_Screenshot 2025-05-03 235030.png', 'agadir', 'sport', 2, 3, NULL),
(11, 'hadad', 'eoiufiew rfewfuweiof ewrfuyweriufy', '2023-01-19', 'pending', 'uploads/1750158328_Screenshot 2025-06-05 172521.png', 'marrakech', 'sport', 1, 3, NULL),
(12, 'hadad', 'eoiufiew rfewfuweiof ewrfuyweriufy', '2023-01-19', 'pending', 'uploads/1750158377_Screenshot 2025-01-22 162643.png', 'marrakech', 'sport', 1, 3, NULL),
(13, 'lksdfjkjwelhfy', 'òkadmjfvklsdj', '2025-05-27', 'pending', 'uploads/1750158419_Screenshot 2025-04-09 201926 - Copy.png', 'peèfkpoweritfgoprw', 'environnement', 3, 3, NULL),
(14, 'hadak free', 'he44ruy4r7348 ry34yr3487 r43867ry7834ry 8437r y4378ry 43r743yr7834 r4378ry3487ry 347ry4387r 34r734yr8743 r347ry43u8 r4ryuyid3 2d 43r23487y23 3  e72y3te23ye 23yey23 e238ey23e 23uyeg23yue 23e83y2 e23ye 23 er32 r 3ereygde dedewydr eduhd 32h23iueh 23e239ue 32', '2025-06-26', 'pending', 'uploads/1750163088_Screenshot 2025-05-21 151938.png', 'touama tighdouin', 'environnement', 2, 3, NULL),
(15, 'tighdouin', 'sbghit nsawb rogar', '2025-06-26', 'pending', 'uploads/1750239990_Screenshot 2025-05-27 115951.png', 'marrakech azhar', 'sport', 3, 4, NULL),
(16, 'hafra f chanert', 'hafra f chanter', '2025-06-26', 'accepter', 'uploads/1750240425_Screenshot 2025-06-16 161418.png', 'bni makada', 'culture', 2, 4, NULL),
(17, 'njam3o zbaaaakl', 'wfdfsdfvsdvxdvxdv', '2025-07-02', 'refuser', 'uploads/1750254310_Screenshot 2025-06-14 190059.png', 'agadir', 'environnement', 1, 4, NULL),
(18, 'njam3o zbaaaakl', 'wfdfsdfvsdvxdvxdv', '2025-07-02', 'en attente', 'uploads/1750254419_Screenshot 2025-02-04 000418.png', 'agadir', 'environnement', 4, 4, NULL),
(19, 'Campagne de nettoyage de la plage de Rabat', 'Initiative de nettoyage de la plage de Rabat et de collecte des déchets plastiques', '2025-06-28', 'accepter', 'uploads/1750294211_raport.png', 'agadir Plage', 'environnement', 3, 5, 1),
(20, 'jjdedf e', 'kjewfheufyew8ru8ry 4ry4r8y348ry 4387ry3487 r3487ry8347ry 4387ry 4387ry', '2025-07-06', 'accepter', 'uploads/1750294363_Business mission-amico.png', 'marrakech', 'sport', 2, 5, 1),
(21, 'lkspiew09duewuew9r8u r', 'kjfur398ry2487ry8724yrf', '2025-06-27', 'en attente', 'uploads/1750294495_raport.png', 'agadir hhddhdhdhdhhdh', 'sport', 1, 5, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email_` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `CNI_number` varchar(50) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `commune_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `first_name`, `last_name`, `email_`, `password`, `CNI_number`, `phone_number`, `commune_id`) VALUES
(1, 'Mohammad', 'Elcadi', 'mohammad.elcadi.dev@gmail.com', '$2y$10$76xr5BXT3X3Qty4eYa4GDeNW7212PDcO9hymPDe2Rom31N2mOP60S', 'VA458766', '0769159613', 1),
(2, 'khaòlid', 'ahmed', 'cadi@gmail.com', '$2y$10$SsXJg8EueRpALNBOBIqup.R29HytD.WNXJW50qZJD1xixaDO5eR4u', 'vr5675544', '0769159613', 2);

-- --------------------------------------------------------

--
-- Table structure for table `commune`
--

CREATE TABLE `commune` (
  `commune_id` int(11) NOT NULL,
  `commune_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `commune`
--

INSERT INTO `commune` (`commune_id`, `commune_name`) VALUES
(1, 'Rabat'),
(2, 'Salé'),
(3, 'Témara'),
(4, 'Fès'),
(11, 'Tanger'),
(12, 'Asilah'),
(13, 'Gzenaya'),
(14, 'Hjar Ennhal'),
(15, 'Dar Chaoui'),
(16, 'Al Manzla'),
(17, 'Laâouama'),
(18, 'Sebt Azzinate'),
(19, 'Akouass Briech'),
(20, 'Had El Gharbia'),
(21, 'Sahel Chamali'),
(22, 'Sidi Lyamani');

-- --------------------------------------------------------

--
-- Table structure for table `management`
--

CREATE TABLE `management` (
  `management_id` int(11) NOT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `problem_id` int(11) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `operation_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL,
  `news_title_` varchar(255) NOT NULL,
  `news_img` varchar(255) NOT NULL,
  `news_description` varchar(255) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `municipality_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `news_title_`, `news_img`, `news_description`, `admin_id`, `municipality_id`) VALUES
(1, 'harb', 'news_6852f120c2bd6.png', 'harb 3la ikhra2il', 1, 1),
(2, 'Amélioration des routes et de l’éclairage', 'news_68531bb776b09.png', 'Le conseil municipal a annoncé un nouveau projet pour améliorer les routes et l’éclairage public au centre-ville. Les travaux devraient commencer bientôt.', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `participates`
--

CREATE TABLE `participates` (
  `participates_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `activite_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `participates`
--

INSERT INTO `participates` (`participates_id`, `user_id`, `activite_id`) VALUES
(3, 5, 4),
(5, 5, 16),
(6, 5, 19);

-- --------------------------------------------------------

--
-- Table structure for table `problem`
--

CREATE TABLE `problem` (
  `problem_id` int(11) NOT NULL,
  `problem_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `photo_url` varchar(255) NOT NULL,
  `problem_date` date NOT NULL,
  `problem_status` varchar(255) NOT NULL,
  `location_map` varchar(255) NOT NULL,
  `commune_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `problem_category`
--

CREATE TABLE `problem_category` (
  `category_id` int(11) NOT NULL,
  `category_name_` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `problem_category`
--

INSERT INTO `problem_category` (`category_id`, `category_name_`) VALUES
(1, 'Voirie et éclairage'),
(2, 'Propreté'),
(3, 'Eaux usées'),
(4, 'Sécurité'),
(5, 'Transport public'),
(6, 'Espaces verts'),
(7, 'Infrastructure'),
(8, 'Déchets sauvages'),
(9, 'Stationnement'),
(10, 'Animaux errants');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL,
  `CNI_number` varchar(50) NOT NULL,
  `address_` varchar(255) NOT NULL,
  `commune_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `phone_number`, `password`, `CNI_number`, `address_`, `commune_id`) VALUES
(2, 'Mohammad', 'Elcadi', 'elcadim5@gmail.com', '0769159613', '$2y$10$7x3FgtY/XldojL0gGAe/k.xaoVmzi.9ZVpYnMpJ8eXnwV4JexfHLG', 'VA458766', 'morocco', 2),
(3, 'Mohammad', 'Elcadi', 'mohammadelcadi09@gmail.com', '0769159613', '$2y$10$nukxb8oX9eaLhed0AmOTsOo.ixIMgf/egVDJFj5Zc42hNIEqAq3U6', 'VA458766', 'morocco', 2),
(4, 'Mohammad', 'Elcadi', 'hafid5@gmail.com', '0769159613', '$2y$10$81KXQFBbGR30S.o7bXdnPuQqYmufnjS02LCAz8VlcRWzIAdLTcjYa', 'et76774', 'morocco', 1),
(5, 'Mohammad', 'Elcadi', 'mohammadelcadi1@gmail.com', '0769159613', '$2y$10$bRMhiio1SXhgUo838KIBquyYnaKCoQ8rkdUOK.plyOsIdt8j41WPa', 'VA0090898', 'morocco', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`activite_id`),
  ADD KEY `commune_id` (`commune_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD KEY `commune_id` (`commune_id`);

--
-- Indexes for table `commune`
--
ALTER TABLE `commune`
  ADD PRIMARY KEY (`commune_id`);

--
-- Indexes for table `management`
--
ALTER TABLE `management`
  ADD PRIMARY KEY (`management_id`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `problem_id` (`problem_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `fk_news_municipality` (`municipality_id`);

--
-- Indexes for table `participates`
--
ALTER TABLE `participates`
  ADD PRIMARY KEY (`participates_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `activite_id` (`activite_id`);

--
-- Indexes for table `problem`
--
ALTER TABLE `problem`
  ADD PRIMARY KEY (`problem_id`),
  ADD KEY `commune_id` (`commune_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `problem_category`
--
ALTER TABLE `problem_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `commune_id` (`commune_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `activite_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `commune`
--
ALTER TABLE `commune`
  MODIFY `commune_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `management`
--
ALTER TABLE `management`
  MODIFY `management_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `participates`
--
ALTER TABLE `participates`
  MODIFY `participates_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `problem`
--
ALTER TABLE `problem`
  MODIFY `problem_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `problem_category`
--
ALTER TABLE `problem_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity`
--
ALTER TABLE `activity`
  ADD CONSTRAINT `activity_ibfk_1` FOREIGN KEY (`commune_id`) REFERENCES `commune` (`commune_id`),
  ADD CONSTRAINT `activity_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `activity_ibfk_3` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`);

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`commune_id`) REFERENCES `commune` (`commune_id`);

--
-- Constraints for table `management`
--
ALTER TABLE `management`
  ADD CONSTRAINT `management_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`),
  ADD CONSTRAINT `management_ibfk_2` FOREIGN KEY (`problem_id`) REFERENCES `problem` (`problem_id`);

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `fk_news_municipality` FOREIGN KEY (`municipality_id`) REFERENCES `commune` (`commune_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`);

--
-- Constraints for table `participates`
--
ALTER TABLE `participates`
  ADD CONSTRAINT `participates_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `participates_ibfk_2` FOREIGN KEY (`activite_id`) REFERENCES `activity` (`activite_id`);

--
-- Constraints for table `problem`
--
ALTER TABLE `problem`
  ADD CONSTRAINT `problem_ibfk_1` FOREIGN KEY (`commune_id`) REFERENCES `commune` (`commune_id`),
  ADD CONSTRAINT `problem_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `problem_ibfk_3` FOREIGN KEY (`category_id`) REFERENCES `problem_category` (`category_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`commune_id`) REFERENCES `commune` (`commune_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
