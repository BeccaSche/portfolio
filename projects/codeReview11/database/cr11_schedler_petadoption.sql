-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2020 at 04:45 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cr11_schedler_petadoption`
--
CREATE DATABASE IF NOT EXISTS `cr11_schedler_petadoption` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `cr11_schedler_petadoption`;

-- --------------------------------------------------------

--
-- Table structure for table `adoption`
--

CREATE TABLE `adoption` (
  `adoption_id` int(11) UNSIGNED NOT NULL,
  `adoption_intrest` varchar(5) NOT NULL,
  `fk_user_id` int(11) NOT NULL,
  `fk_pet_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `location_id` int(11) UNSIGNED NOT NULL,
  `street_name` varchar(55) DEFAULT NULL,
  `zip` int(11) DEFAULT NULL,
  `city_name` varchar(55) DEFAULT NULL,
  `country` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`location_id`, `street_name`, `zip`, `city_name`, `country`) VALUES
(1, 'Enzianstrasse', 6020, 'Innsbruck', 'Austria'),
(2, 'Kaiserstrasse', 1010, 'Vienna', 'Austria');

-- --------------------------------------------------------

--
-- Table structure for table `pets`
--

CREATE TABLE `pets` (
  `id` int(11) NOT NULL,
  `pet_name` varchar(55) NOT NULL,
  `pet_age` int(11) DEFAULT NULL,
  `pet_description` varchar(255) NOT NULL,
  `pet_care` varchar(255) NOT NULL,
  `pet_hobbies` varchar(55) NOT NULL,
  `pet_img` varchar(55) NOT NULL,
  `pet_size` enum('small','big') DEFAULT NULL,
  `pet_availability` enum('yes','no') DEFAULT 'yes',
  `pet_location` varchar(255) NOT NULL,
  `pet_public` enum('no','yes') NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pets`
--

INSERT INTO `pets` (`id`, `pet_name`, `pet_age`, `pet_description`, `pet_care`, `pet_hobbies`, `pet_img`, `pet_size`, `pet_availability`, `pet_location`, `pet_public`) VALUES
(5, 'Alpi', 6, 'Gentle Llama from Krems looking for a new home.', 'Likes to be outside', 'Modeling and eating', 'big_alpaca.jpg', 'big', 'yes', 'Am Wörthersee 5, 8490 Velden AUSTRIA', 'yes'),
(6, 'Ullrich', 3, 'Giant Anteater might be the most eccentric pet ever', 'Likes to be outside if not too cold, needs a lot of ants', 'Going for walks with Salvador Dali', 'big_anteater.jpg', 'big', 'yes', 'Schönbrunn 4, 1020 Vienna AUSTRIA', 'yes'),
(7, 'Fran', 9, 'Senior Capybara looking for a peaceful place with pool', 'Needs water and chill people around', 'Aqua aerobics', 'senior_capy.jpg', 'small', 'yes', 'zum Heurigen 10, 7020 Graz AUSTRIA', 'yes'),
(8, 'Lili', 2, 'Cute Guinea Pig looking for a group of friends.', 'Guinea Pig need friends and can not be alone', 'Socializing and partying', 'small_guineapig.jpg', 'small', 'yes', 'Anichstrasse 20, 6020 Innsbruck AUSTRIA', 'no'),
(14, 'Cutie-Pie', 10, 'The name fits this little follower very well! Calm senior lapdog. ', 'Takes heart medication', 'Talking about old times', 'senior_dog.jpg', 'small', 'yes', 'Studa 58 6708 Brand AUSTRIA', 'yes'),
(15, 'Chamy', 2, 'Pet Chameleon who likes to cuddle', 'Needs warm temperatur ', 'Changing colors and blending into his surroundings.', 'small_cham.jpg', 'small', 'yes', 'Kaiserstrasse 6, 1010 Vienna AUSTRIA', 'no'),
(17, 'Lisa', 7, 'Alpine Cow Lisa is a curious and generous lady. ', 'She is a big Pet, please make sure that you have enough space', 'Hiking and Travelling ', 'big_cow.jpg', 'big', 'yes', 'Kirchplatz 2, 6700 Schruns-Tschagguns AUSTRIA', 'yes'),
(18, 'Peter', 4, 'Peter the donkey is a nice warmhearted Dude, but can be a bit stubborn from time to time ', 'Not a city person, likes to be at the countryside', 'Game nights and watching Netflix', 'big_donkey.jpg', 'big', 'yes', 'Domweg 5, 7010 Salzburg AUSTRIA', 'no'),
(19, 'Christopheros ', 11, 'Sophisticated male cat could also be a bookworm. ', 'Needs a lot to read, having a home library is a plus', 'Reading and discussing about philosophy ', 'senior_cat.jpg', 'small', 'yes', 'Bibliotheksstrasse 5, 1050 Vienna AUSTRIA ', 'no'),
(20, 'Robert', 9, 'Highland-Cow Robert just wants to hang outside and be scratched from time to time', 'Likes cold weather', 'Looking at the landscape ', 'senior_cow.jpg', 'big', 'yes', 'Over the Hills 78, 84736 Garmisch GERMANY', 'yes'),
(21, 'Jack', 8, 'Don\'t like alarm clocks in the morning? Then Jacky will help you to solve the problem.', 'Needs some chicks otherwise gets annoying', 'Screaming and looking good', 'senior_rooster.jpg', 'small', 'yes', 'Weingasse 4, 3863 Eisenstadt AUSTRIA', ''),
(22, 'Birdy', 2, 'A very colorful bird looking for a open minded new owner ', 'Needs daily creative input', 'Design and architecture ', 'small_bird.jpg', 'small', 'yes', 'Papagenostrasse 68, 1102 Vienna AUSTRIA', 'no'),
(23, 'Carla', 4, 'Joyfull and friendly little house pig', 'Needs a body of water', 'Travelling and swimming ', 'small_pig.jpg', 'small', 'yes', 'Promenadenweg 3, 6800 Bregenz AUSTRIA', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `user_email` varchar(60) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_status` enum('user','admin','superadmin') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_pass`, `user_status`) VALUES
(1, 'Becca', 'becca@pets.at', '3de12449ebaa61deebf29e8c777932c36bb72ae255babf25da34491c6a227797', 'user'),
(2, 'Rebecca', 'rebecca@pets.at', '3de12449ebaa61deebf29e8c777932c36bb72ae255babf25da34491c6a227797', 'admin'),
(3, 'Peter', 'Peter@pets.at', '3de12449ebaa61deebf29e8c777932c36bb72ae255babf25da34491c6a227797', 'user'),
(4, 'Wolfi', 'wolfi@fritz.com', '3de12449ebaa61deebf29e8c777932c36bb72ae255babf25da34491c6a227797', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adoption`
--
ALTER TABLE `adoption`
  ADD PRIMARY KEY (`adoption_id`),
  ADD KEY `fk_pet_id` (`fk_pet_id`),
  ADD KEY `fk_user_id` (`fk_user_id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `pets`
--
ALTER TABLE `pets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adoption`
--
ALTER TABLE `adoption`
  MODIFY `adoption_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `location_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pets`
--
ALTER TABLE `pets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adoption`
--
ALTER TABLE `adoption`
  ADD CONSTRAINT `adoption_ibfk_1` FOREIGN KEY (`fk_pet_id`) REFERENCES `pets` (`id`),
  ADD CONSTRAINT `adoption_ibfk_2` FOREIGN KEY (`fk_user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
