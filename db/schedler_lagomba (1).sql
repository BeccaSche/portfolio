-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Erstellungszeit: 31. Jan 2021 um 22:10
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
-- Datenbank: `schedler_lagomba`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `harvest`
--

CREATE TABLE `harvest` (
  `harvest_id` int(6) UNSIGNED NOT NULL,
  `name` varchar(55) NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `harvest`
--

INSERT INTO `harvest` (`harvest_id`, `name`, `date_from`, `date_to`) VALUES
(4, 'Oyster Mushrooms', '2020-09-10', '2020-09-20'),
(5, 'Oyster Mushrooms', '2020-09-10', '2020-09-20'),
(7, 'Lions Mean', '2020-11-22', '2020-11-22'),
(8, 'Oyster Mushrooms', '2021-01-03', '2021-01-11');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(10) NOT NULL,
  `amount` int(11) NOT NULL,
  `txn_id` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment_gross` float(10,2) DEFAULT NULL,
  `currency_code` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payer_id` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payer_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payer_email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payer_country` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment_status` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `payments`
--

INSERT INTO `payments` (`id`, `user_id`, `product_id`, `amount`, `txn_id`, `payment_gross`, `currency_code`, `payer_id`, `payer_name`, `payer_email`, `payer_country`, `payment_status`, `created`) VALUES
(4, 3, 23, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-08-20 10:30:23'),
(5, 1, 23, 1, 'PAYID-L47DJ4I4DE45135H49250040', 19.00, 'EUR', 'MNJXUM59MNB2N', 'John Doe', 'sb-q8mvf2952764@personal.example.com', 'US', 'approved', '2020-08-20 10:32:07'),
(8, 1, 23, 2, 'PAYID-L47EIJY8H486416B66319702', 38.00, 'EUR', 'MNJXUM59MNB2N', 'John Doe', 'sb-q8mvf2952764@personal.example.com', 'US', 'approved', '2020-08-20 11:37:21'),
(9, 3, 24, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-08-20 11:39:42'),
(10, 3, 23, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-09-17 15:21:19');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(500) NOT NULL,
  `description` varchar(500) NOT NULL,
  `price` float NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date DEFAULT NULL,
  `amount` double NOT NULL,
  `unit` enum('g','kg') NOT NULL DEFAULT 'g',
  `quality` varchar(50) NOT NULL,
  `quality_description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `products`
--

INSERT INTO `products` (`product_id`, `name`, `image`, `description`, `price`, `date_from`, `date_to`, `amount`, `unit`, `quality`, `quality_description`) VALUES
(23, 'Oyster mushrooms', 'upload/IMG_9122.JPG', 'Oyster mushrooms are a type of edible fungi. They are one of the most widely consumed mushrooms in the world. They get their name from their oyster-shaped cap and very short (or completely absent) stem. When cooked, oyster mushrooms have a smooth oyster-like texture and a some say a slight hint of seafood flavor. This may also contribute to their name.', 19, '2020-08-20', '2020-08-31', 12, 'kg', 'A', 'You only get the tender tops of the mushrooms'),
(24, 'Oyster Mushrooms', 'upload/IMG_9115.JPG', 'Oyster mushrooms are a type of edible fungi. They are one of the most widely consumed mushrooms in the world. They get their name from their oyster-shaped cap and very short (or completely absent) stem. When cooked, oyster mushrooms have a smooth oyster-like texture and a some say a slight hint of seafood flavor. This may also contribute to their name.', 16, '2020-08-23', '2020-09-24', 12, 'kg', 'B', 'You get the entire cluster of mushrooms');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `recipes`
--

CREATE TABLE `recipes` (
  `recipe_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `time` varchar(100) NOT NULL,
  `difficulty` varchar(100) NOT NULL,
  `image` varchar(500) NOT NULL,
  `dish` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `recipes`
--

INSERT INTO `recipes` (`recipe_id`, `name`, `description`, `time`, `difficulty`, `image`, `dish`) VALUES
(23, 'Cauliflower & Mushroom', 'The vegetarian version of the Hungarian layered Cauliflower', '1 hour 20 mins', 'hard', 'upload/coverCaulifilower.png', 3),
(24, 'Grilled Oyster Mushrooms', 'Quick, easy and delicious - the perfect light lunch! ', '20 min', 'easy', 'upload/grilledCover.png', 4),
(25, 'Mushroom Jerky', 'The vegetarian version of the ultimate crispy-chewy chocolate jerky', '8 hours', 'medium', 'upload/jerkyCover.png', 8),
(26, 'Oyster mushrooms', 'New recipe', '1 hour 20 mins', 'hard', 'upload/grilledCover.png', 4);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `recipe_ingredients`
--

CREATE TABLE `recipe_ingredients` (
  `recipe_ingredients_id` int(11) NOT NULL,
  `recipe_id` int(11) NOT NULL,
  `amount` float NOT NULL,
  `unit` varchar(50) NOT NULL,
  `description` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `recipe_ingredients`
--

INSERT INTO `recipe_ingredients` (`recipe_ingredients_id`, `recipe_id`, `amount`, `unit`, `description`) VALUES
(19, 23, 400, 'g', 'Cauliflower'),
(20, 23, 300, 'g', 'Oyster Mushroom'),
(21, 23, 5, 'g', 'Paprika'),
(22, 23, 1, 'cup', 'Sour Cream'),
(23, 23, 200, 'g', 'Mild Cheese'),
(24, 23, 1, 'big', 'Onion'),
(25, 24, 300, 'g', 'Oyster Mushrooms'),
(26, 24, 2, 'TS', 'Olive oil'),
(27, 24, 2, 'TL', 'Spice mix or sauce'),
(28, 25, 1, 'kg', 'Oyster Mushrooms'),
(29, 25, 2, 'Tbs', 'mixed spices'),
(30, 25, 150, 'g', 'Meltable chocolate'),
(33, 26, 20, 'g', 'Minced Mushroom');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `recipe_steps`
--

CREATE TABLE `recipe_steps` (
  `step_id` int(11) NOT NULL,
  `recipe_id` int(11) NOT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `recipe_steps`
--

INSERT INTO `recipe_steps` (`step_id`, `recipe_id`, `description`) VALUES
(25, 23, 'Boil or steam cauliflower until soft'),
(26, 23, 'Cook the rice (eg. Basmati) or use leftovers'),
(27, 23, 'Cut the Oyster Mushrooms with a mincer'),
(28, 23, 'Fry the chopped onions together with the minced mushrooms and spices'),
(29, 23, 'In a casserole add a layer of cauliflower then the mushrooms and finally the rice '),
(30, 23, 'Top it of with one cup of (vegan) sour cream and cheese.'),
(31, 23, 'Bake in oven 25 minutes with 180 Â°C until the surface is golden brown'),
(32, 24, 'Take the mushroom flowers off the stam and put them in some kind of marinade (Teriyaki, BBQ or just spices and olive oil)'),
(33, 24, 'Fry the mushrooms on middle heat for 2  minutes or until nicely browned'),
(34, 24, 'Add some salat or bread and enjoy!'),
(35, 25, 'For 20 minutes boil as many shredded Oyster Mushroom as possible'),
(36, 25, 'Make the Marinade Sauce  of your dreams!  The style and taste is up to you'),
(37, 25, 'Both of you should rest a bit'),
(38, 25, 'Whisk the marinade in gently and put it in the fridge for 24 hours'),
(39, 25, 'Place them in a fruit dryer or oven '),
(40, 25, 'Dry them on around 50Â°C for 7-8 hours'),
(41, 25, 'Occasionally open the oven door to let the steam out'),
(42, 25, 'When dry, dip them in melted chocolate '),
(45, 26, 'Test steps 1'),
(46, 26, 'Test steps 2'),
(47, 26, 'Test steps 3');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `userEmail` varchar(60) NOT NULL,
  `userPass` varchar(500) NOT NULL,
  `status` enum('user','admin') NOT NULL DEFAULT 'user',
  `address` varchar(300) NOT NULL,
  `phone` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`user_id`, `userName`, `userEmail`, `userPass`, `status`, `address`, `phone`) VALUES
(1, 'admir', 'admir@gmail.com', '2689582899dc26924a320d7200cdc0aadc7409c3e41ab9600963a0e4bc7ffb34', 'user', 'Vienna, 1030 Landstrasse', '12340321'),
(2, 'test', 'test@gmail.com', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', 'user', 'Vienna, 1050 Margaretenstrasse', '12347896'),
(3, 'Nora', 'admin@gmail.com', '1718c24b10aeb8099e3fc44960ab6949ab76a267352459f203ea1036bec382c2', 'admin', 'Vienna, 1060 Mariahilfer Strasse', '12347833'),
(4, 'Test', 'test@test.com', 'f660ab912ec121d1b1e928a0bb4bc61b15f5ad44d5efdc4e1c92a25e99b8e44a', 'user', 'fdfdfd', '2334343'),
(6, 'Becca', 'becca@gmail.com', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', 'user', 'Studa 58', '0762343672'),
(7, 'nodsfg', 'rr.noar@gmail.com', 'bcd8af9004d8b5d24647b3f3cd5759fc8d3dc72a5c3fe932d97be2960d57b0e2', 'user', 'sghsdfh', '014254'),
(8, 'Max Mustermann', 'test@mustermann.com', '5cb2df28d6003f304b43125f9f34c5b9a4d8c8c712c1f8d1eb5bcba2954b5609', 'user', '', ''),
(9, 'test', 'test@teset.com', '37268335dd6931045bdcdf92623ff819a64244b53d0e746d438797349d4da578', 'user', '', ''),
(10, 'Dom', 'Vorbild94@gmail.com', '9084be28685e24859486eb5d10d38f4945c32f909efe739c48a2e6aa6f10aa44', 'user', '', ''),
(11, 'Becca', 'rebecca@gmail.com', '472bbe83616e93d3c09a79103ae47d8f71e3d35a966d6e8b22f743218d04171d', 'user', 'Studa 58', '0762343672'),
(12, 'Claudia', 'cobarde@web.de', '1718c24b10aeb8099e3fc44960ab6949ab76a267352459f203ea1036bec382c2', 'user', 'Hernalser HauptstraÃŸe 112/5', '06803047338'),
(13, 'Christoph Barton', 'ChristophBarton@gmx.at', 'cf506e905d06d7cd1078de6a35b69c7911215781dfec89da27a017d2192a5235', 'user', 'WehlistraÃŸe 16-22', '+4369910214300');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `harvest`
--
ALTER TABLE `harvest`
  ADD PRIMARY KEY (`harvest_id`);

--
-- Indizes für die Tabelle `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indizes für die Tabelle `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`recipe_id`);

--
-- Indizes für die Tabelle `recipe_ingredients`
--
ALTER TABLE `recipe_ingredients`
  ADD PRIMARY KEY (`recipe_ingredients_id`);

--
-- Indizes für die Tabelle `recipe_steps`
--
ALTER TABLE `recipe_steps`
  ADD PRIMARY KEY (`step_id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `harvest`
--
ALTER TABLE `harvest`
  MODIFY `harvest_id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT für Tabelle `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT für Tabelle `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT für Tabelle `recipes`
--
ALTER TABLE `recipes`
  MODIFY `recipe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT für Tabelle `recipe_ingredients`
--
ALTER TABLE `recipe_ingredients`
  MODIFY `recipe_ingredients_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT für Tabelle `recipe_steps`
--
ALTER TABLE `recipe_steps`
  MODIFY `step_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
