-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 09 dec 2021 om 00:59
-- Serverversie: 10.4.21-MariaDB
-- PHP-versie: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zuzu`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `costumers`
--

CREATE TABLE `costumers` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `adress` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `costumers`
--

INSERT INTO `costumers` (`id`, `fname`, `lname`, `email`, `password`, `city`, `adress`, `zipcode`) VALUES
(1, 'Michel', 'De geus', '', '', 'Den haag', 'adress 1', '2666DV'),
(2, 'Michel', 'De geus', 'parisensuki2@gmail.com', '$2y$10$OxJPeu2LhKnpsIjlnp3g5.1409qarXs1h48ahlyhx3HXE0cOaAa.S', 'Den haag', 'mauwlaan 1', '2666DV');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `totalprice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `orders`
--

INSERT INTO `orders` (`id`, `user`, `totalprice`) VALUES
(1, 1, 2),
(2, 1, 2),
(3, 1, 2),
(4, 1, 2),
(5, 1, 2),
(6, 2, 2),
(7, 2, 2),
(8, 2, 2),
(9, 2, 2),
(10, 2, 2),
(11, 2, 2);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `order_rule`
--

CREATE TABLE `order_rule` (
  `order_id` int(255) NOT NULL,
  `product_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `order_rule`
--

INSERT INTO `order_rule` (`order_id`, `product_id`) VALUES
(1, 1),
(1, 1),
(1, 1),
(1, 1),
(1, 1),
(1, 1),
(1, 1),
(1, 1),
(1, 1),
(1, 1),
(2, 1),
(2, 1),
(2, 1),
(2, 1),
(2, 1),
(2, 1),
(2, 1),
(2, 1),
(2, 1),
(2, 1),
(3, 4),
(3, 4),
(4, 4),
(4, 4),
(4, 4),
(4, 4),
(4, 4),
(4, 4),
(4, 4),
(4, 4),
(5, 4),
(5, 4),
(6, 4),
(6, 4),
(6, 4),
(6, 4),
(6, 4),
(6, 4),
(6, 4),
(6, 4),
(7, 1),
(7, 2),
(7, 2),
(7, 4),
(7, 4),
(8, 4),
(8, 4),
(8, 4),
(9, 4),
(9, 3),
(9, 2),
(10, 4),
(10, 3),
(11, 2),
(11, 4),
(11, 4),
(11, 4),
(11, 4),
(11, 4),
(11, 4),
(11, 4),
(11, 4),
(11, 4),
(11, 4),
(11, 4),
(11, 4),
(11, 4),
(11, 4),
(11, 4),
(11, 4),
(11, 4),
(11, 4),
(11, 4),
(11, 4),
(11, 4),
(11, 4),
(11, 4),
(11, 4),
(11, 4),
(11, 4),
(11, 4),
(11, 4),
(11, 4),
(11, 4),
(11, 4),
(11, 4),
(11, 4),
(11, 4),
(11, 4),
(11, 4),
(11, 4),
(11, 4),
(11, 4),
(11, 4),
(11, 4),
(11, 4),
(11, 4);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `products`
--

CREATE TABLE `products` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` float(100,2) NOT NULL,
  `amount` int(255) NOT NULL,
  `stock` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `description`, `price`, `amount`, `stock`) VALUES
(1, 'Uramaki California', '/public/img/productImages/sushipoint_uramaki_california.png', '', 1.18, 1, 59),
(2, 'Uramaki sesam tuna salad', '/public/img/productImages/sushipoint_sesam_tuna_salad.png', '', 1.18, 1, 66),
(3, 'Uramaki salmon', '/public/img/productImages/sushipoint_uramaki_salmon_rolls.png', '', 1.18, 1, 68),
(4, 'Kroepoek', '/public/img/productImages/kroepoek.png', '1 piece weights 56gram', 2.25, 3, 0),
(5, 'Nigiri Ebi', '/public/img/productImages/25-nigiriebi.png', '', 1.95, 1, 44),
(6, 'Nigiri Avocado', '/public/img/productImages/24-nigiriavocado.png', '', 1.75, 1, 44),
(7, 'Futomaki Akihito', '/public/img/productImages/152-futomaki-akihito.png', '', 11.50, 8, 36);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `costumers`
--
ALTER TABLE `costumers`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`);

--
-- Indexen voor tabel `order_rule`
--
ALTER TABLE `order_rule`
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexen voor tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `costumers`
--
ALTER TABLE `costumers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT voor een tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT voor een tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user`) REFERENCES `costumers` (`id`);

--
-- Beperkingen voor tabel `order_rule`
--
ALTER TABLE `order_rule`
  ADD CONSTRAINT `order_rule_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `order_rule_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
