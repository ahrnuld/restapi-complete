-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Gegenereerd op: 25 jan 2022 om 13:39
-- Serverversie: 10.6.4-MariaDB-1:10.6.4+maria~focal
-- PHP-versie: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `developmentdb`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `user` (`id`, `username`, `password`, `email`) VALUES
(1, 'username', '$2y$10$DQlV0u9mFmtOWsOdxXX9H.4kgzEB3E8o97s.S.Pdy4klUAdBvtVh.', 'username@password.com');


ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `category`
--



CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'bread'),
(3, 'vegetables');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` varchar(8000) NOT NULL,
  `image` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `description`, `image`, `category_id`) VALUES
(1, 'Ciabatta', '2.50', 'Ciabatta (which translates to slipper!) is an Italian bread made with wheat flour, salt, yeast, and water. Though it\'s texture and crust vary slightly throughout Italy, the essential ingredients remain the same. Ciabatta is best for sandwiches and paninis, naturally.', 'https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/957759184-1529703875.jpg?crop=1.00xw:0.645xh;0,0.104xh&resize=980:*', 1),
(2, 'Whole Wheat Bread', '2.00', 'Unlike white bread, whole-wheat bread is made from flour that uses almost the entire wheat grain—with the bran and germ in tact. This means more nutrients and fiber per slice! ', 'https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/whole-wheat-bread-horizontal-1-jpg-1590195849.jpg?crop=0.735xw:0.735xh;0.187xw,0.128xh&resize=980:*', 1),
(3, 'Artichoke', '1.50', 'Artichokes contain an unusual organic acid called cynarin which affects taste and may be the reason why water appears to taste sweet after eating artichokes. The flavour of wine is similarly altered and many wine experts believe that wine shouldn’t accompany artichokes.', 'https://www.vegetables.co.nz/assets/vegetables/_resampled/FillWyI0MDAiLCIzMDAiXQ/artichokes-globe.png', 3),
(4, 'Asparagus ', '3.00', 'Asparagus originated in the Eastern Mediterranean and was a favourite of the Greeks and Romans who used it as a medicine. Varieties of asparagus grow wild in parts of Europe, Turkey, Africa, Middle East and Asia.', 'https://www.vegetables.co.nz/assets/vegetables/_resampled/FillWyI0MDAiLCIzMDAiXQ/asparagus.png', 3),
(5, 'Sourdough Bread', '3.5', 'Sourdough uses natural fermentation.', 'https://placehold.co/300x300', 1),
(6, 'Baguette', '2.75', 'A long, thin French bread with a crispy crust.', 'https://placehold.co/300x300', 1),
(7, 'Pita Bread', '2.0', 'Soft, slightly leavened flatbread.', 'https://placehold.co/300x300', 1),
(8, 'Rye Bread', '3.25', 'Dark bread made with rye flour.', 'https://placehold.co/300x300', 1),
(9, 'Carrots', '1.2', 'Orange root vegetables with a crisp texture.', 'https://placehold.co/300x300', 3),
(10, 'Tomatoes', '2.5', 'Juicy red fruit often used as a vegetable.', 'https://placehold.co/300x300', 3),
(11, 'Broccoli', '2.75', 'Green vegetable high in fiber.', 'https://placehold.co/300x300', 3),
(12, 'Spinach', '1.8', 'Leafy green rich in iron.', 'https://placehold.co/300x300', 3),
(13, 'Apples', '2.25', 'Crisp, sweet fruit.', 'https://placehold.co/300x300', 2),
(14, 'Bananas', '1.5', 'Tropical fruit rich in potassium.', 'https://placehold.co/300x300', 2),
(15, 'Oranges', '2.0', 'Citrus fruit with tangy flavor.', 'https://placehold.co/300x300', 2),
(16, 'Strawberries', '3.0', 'Sweet red berries.', 'https://placehold.co/300x300', 2),
(17, 'Pineapple', '3.5', 'Tropical fruit with tangy sweetness.', 'https://placehold.co/300x300', 2),
(18, 'Peach', '2.75', 'Juicy stone fruit.', 'https://placehold.co/300x300', 2),
(19, 'Blueberries', '4.0', 'Small antioxidant-rich berries.', 'https://placehold.co/300x300', 2),
(20, 'Watermelon', '5.0', 'Refreshing summer fruit.', 'https://placehold.co/300x300', 2),
(21, 'Eggplant', '1.9', 'Versatile purple vegetable.', 'https://placehold.co/300x300', 3),
(22, 'Zucchini', '2.3', 'Summer squash used in many dishes.', 'https://placehold.co/300x300', 3),
(23, 'Cucumber', '1.75', 'Cool and crisp, great for salads.', 'https://placehold.co/300x300', 3),
(24, 'Potatoes', '2.1', 'Starchy root vegetable.', 'https://placehold.co/300x300', 3),
(25, 'Grapes', '3.2', 'Juicy snack and wine fruit.', 'https://placehold.co/300x300', 2),
(26, 'Mango', '3.75', 'Tropical, sweet fruit.', 'https://placehold.co/300x300', 2),
(27, 'Lettuce', '1.5', 'Leafy green for salads.', 'https://placehold.co/300x300', 3),
(28, 'Cherries', '4.5', 'Sweet and tart red fruit.', 'https://placehold.co/300x300', 2),
(29, 'Pear', '2.2', 'Soft, sweet fruit.', 'https://placehold.co/300x300', 2),
(30, 'Plum', '2.4', 'Small, juicy stone fruit.', 'https://placehold.co/300x300', 2),
(31, 'Cabbage', '1.9', 'Leafy vegetable used in many cuisines.', 'https://placehold.co/300x300', 3),
(32, 'Bell Pepper', '2.6', 'Colorful and sweet peppers.', 'https://placehold.co/300x300', 3),
(33, 'Onion', '1.5', 'Common aromatic vegetable.', 'https://placehold.co/300x300', 3),
(34, 'Garlic', '1.2', 'Pungent bulb used as seasoning.', 'https://placehold.co/300x300', 3),
(35, 'Radish', '1.3', 'Crunchy, peppery root.', 'https://placehold.co/300x300', 3),
(36, 'Peas', '2.1', 'Sweet green pods.', 'https://placehold.co/300x300', 3),
(37, 'Kale', '2.4', 'Leafy green superfood.', 'https://placehold.co/300x300', 3),
(38, 'Pumpkin', '3.2', 'Large orange squash.', 'https://placehold.co/300x300', 3),
(39, 'Celery', '1.6', 'Crunchy green stalks.', 'https://placehold.co/300x300', 3),
(40, 'Beetroot', '2.3', 'Sweet, earthy root.', 'https://placehold.co/300x300', 3);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_category` (`category_id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT voor een tabel `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
