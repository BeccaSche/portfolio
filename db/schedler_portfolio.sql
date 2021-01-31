-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Erstellungszeit: 31. Jan 2021 um 22:09
-- Server-Version: 5.7.33
-- PHP-Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `schedler_portfolio`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `projects`
--

CREATE TABLE `projects` (
  `id` int(11) UNSIGNED NOT NULL,
  `active` enum('yes','no') DEFAULT NULL,
  `title` varchar(55) NOT NULL,
  `description` varchar(555) DEFAULT NULL,
  `image` varchar(55) NOT NULL,
  `type` enum('FinalProject','CodeReview','OwnProject') DEFAULT NULL,
  `ends` enum('BackEnd','FrontEnd','FullStack') DEFAULT NULL,
  `tools` varchar(255) DEFAULT NULL,
  `link_page` varchar(55) DEFAULT NULL,
  `link_github` varchar(155) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `projects`
--

INSERT INTO `projects` (`id`, `active`, `title`, `description`, `image`, `type`, `ends`, `tools`, `link_page`, `link_github`) VALUES
(1, 'yes', 'BACK END & WEBSHOP \'LaGomba - Urban Mushrooms\'', 'The goal was to build a working webshop with Paypal or cash paying option and an admin area where our client could easily update or add content in certain areas (recipes, products and harvest calendar). We reconstructed the design, content and important features that the client previously chose and added the entiere backend. <br>We worked in a Team of 4 (again I was team leader) and were given 10 days to complete the task. \r\n', 'LaGomba_BE.jpg', 'FinalProject', 'FullStack', ' php, MySQL, JavaScript, CSS3, Bootstrap, HTML5', 'projects/La-gomba-BE/index.php', 'https://github.com/BeccaSche/LMSCF-Backend-team2'),
(2, 'yes', 'FRONT END \'LaGomba - Urban Mushrooms\'', 'After completing the front end part of our course we got the chance to use our new knowledge for a real client who needed a website for her mushroom growing start up. The goal was to create a design that would also appeal to hard core meat eaters, whilst sticking to the preexisting logo design, keeping a simple structure of the page and mobile friendly. Images and content were mostly provided by our client. Our team of 3, with me as team leader, chose to work with Angular and presented the webpage after 3 days.', 'LaGomba_FE.jpg', 'FinalProject', 'FrontEnd', 'Angular, TypeScript, JavaScript, CSS3, HTML5', 'projects/LaGomba/', 'https://github.com/CodeFactoryWien/LMSCF-FrontEnd-team6'),
(3, 'yes', 'Pet adoption site using PHP', 'Pet adoption site with a registration system for users/administrators, admin panel for creating, changing and deleting content and database back end. If you read this far and you want to check out the admin section: rebecca@pets.at pw:121234', 'php_adoptapet.jpg', 'CodeReview', 'BackEnd', 'PHP, MySQL, CSS3, Bootstrap,  HTML5', 'projects/codeReview11/index.php', 'https://github.com/BeccaSche/CFLMS-CodeReview11-Schedler'),
(4, 'yes', 'Travel agency web application using Angular', 'The task was to build a travel agency site with Angular, which includes a landing page, blog segment, travel offers and a shopping cart.', 'Angular_onlyIslands.jpg', 'CodeReview', 'FrontEnd', 'Angular, TypeScript, JavaScript, Sass, HTML5', 'projects/codeReview07/', 'https://github.com/BeccaSche/CFLMS-RebeccaSchedler-CodeReview-07'),
(5, 'yes', 'First Steps with JavaScript', 'Copying a given design for a car insurance with a little form and  fake coverage calculator and using classes to display data. Also first use in a project of Sass.', 'js_insurance.jpg', 'CodeReview', 'FrontEnd', 'JavaScript, Sass, HTML5', 'projects/codeReview03/index.html', 'https://github.com/BeccaSche/CFLMS-RebeccaSchedler-CodeReview-03'),
(6, 'yes', 'Learning jQuery by creating a Movie Fanpage', 'The task was to create a movie page with an adding \'likes-counter\' for each movie, taking the data from a JASON file. Also taking into account nice design and good movie taste.', 'jQuery_movies.jpg', 'CodeReview', 'FrontEnd', 'jQuery, JSON, Sass, HTML5', 'projects/codeReview05/index.html', 'https://github.com/BeccaSche/CFLMS-RebeccaSchedler-CodeReview-05'),
(7, 'yes', 'Introduction to Typescript & Bootstrap', 'Built a little city blog about my former hometown Zurich only using TypeScript/JavaScript and Bootstrap.', 'typescript_cityblog.jpg', 'CodeReview', 'FrontEnd', 'TypeScript, JavaScript, Bootstrap, HTML5', 'projects/codeReview06/index.html', 'https://github.com/BeccaSche/CFLMS-RebeccaSchedler-CodeReview-06');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
