-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2023 at 10:56 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `furnitree`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `logo` varchar(50) NOT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `fb` varchar(100) DEFAULT NULL,
  `twitter` varchar(100) DEFAULT NULL,
  `instagram` varchar(100) DEFAULT NULL,
  `yt` varchar(100) DEFAULT NULL,
  `official` varchar(100) DEFAULT NULL,
  `account` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `name`, `logo`, `description`, `fb`, `twitter`, `instagram`, `yt`, `official`, `account`) VALUES
(2, 'Apt2B', '20230705115654.jpg', 'Apt2B started in 2010 by two guys who saw a need for furniture that was better quality than the Scandinavian superstore we all know, but more affordable and less precious than a luxury boutique. The furniture industry has changed a lot since then, but our mission to sell beautiful furniture that’s built to last and at real-life prices remains the same.\r\n\r\nWe are based in sunny Los Angeles and managed by a friendly team located across the country. We build and curate a variety of stylish products, from furniture to decor, sized for your downtown apartment or sprawling ranch home—don’t let the “Apt” in our name fool you (oh, in case you were wondering, it’s pronounced “apartment-two-be”)! You can spot our signature mid-century modern designs throughout our site, but we carry transitional, glam, industrial and Scandifornian-style pieces, too.                                             ', 'https://www.facebook.com/Apt2B', 'https://twitter.com/Apt2B', 'https://www.instagram.com/apt2b/', 'https://www.youtube.com/channel/UCgsr57gvYVS6z-2ZaIcwvWA', 'https://www.apt2b.com', 6),
(3, 'Burrow', 'burrow.png', 'Normal was never good enough. Frustrated by compromises between quality, affordability, and convenience, our founders started Burrow with a new approach to furniture.\r\n\r\nWe knew that if we wanted to make a meaningful difference, it wouldn’t be as simple as putting a couch in a box and selling it online. To set a new standard, we had to focus on three fundamental changes: a modular platform, a focus on function and fashion, and an investment in community and experience.\r\n\r\nWe started Burrow because it felt like no one in the furniture industry was listening. Legacy retailers churned out one trendy, flimsy product after another, and the second they had your cash, you were on your own. But like we said, we’re not a normal furniture company. We’re committed to designing a different experience, something completely new that’s not just created for you, but with you.', 'https://www.facebook.com/burrow', 'https://www.twitter.com/hiburrow', 'https://www.instagram.com/burrow', '', 'https://burrow.com/', 7),
(10, 'IKEA', '20230706163200.png', 'We’ve come a long way since Ingvar Kamprad founded IKEA in 1943. From being a tiny Swedish business, selling through a mail-order catalogue, IKEA has become one of the most well-known home furnishing brands in the world. Today, there are hundreds of IKEA stores around the globe, and more are coming.\r\n\r\nWe have a passion for life at home. Our culture is built upon enthusiasm, togetherness and a “get-it-done” attitude. We’re optimists, constantly looking for new and better ways to do things, from how to design a rocking chair that fits into a flat-pack, to creating LED light bulbs that are affordable to everyone. Our vision is to create a better everyday life for the many people – for customers, but also for our co-workers and the people who work at our suppliers.\r\n\r\nBy sharing what we do, and speaking up for what we believe in, we can be part of a positive change in society.', 'https://www.facebook.com/IKEAMalaysia/', '', 'https://www.instagram.com/ikeamalaysia/', 'https://www.youtube.com/channel/UCumArKJpboQZNPwfs5c3F7w', 'https://www.ikea.com/my/en/', 8);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `image` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `image`) VALUES
(1, 'Kerusi', 'chair.webp'),
(2, 'Meja', 'table.png'),
(3, 'Rak Buku', 'shelf.png'),
(4, 'Katil', 'bed.png'),
(5, 'Sofa', 'sofa.webp'),
(6, 'Kabinet', 'cabinet.png'),
(7, 'Kaunter', 'countertop.png'),
(8, 'Rak kot', 'coat rack.png'),
(9, 'Laci', 'drawer.webp'),
(10, 'Lain-lain', 'misc.png');

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `id` int(11) NOT NULL,
  `name` varchar(11) NOT NULL,
  `code` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`id`, `name`, `code`) VALUES
(1, 'Merah', '#FF0000'),
(2, 'Jingga', '#FFA500'),
(3, 'Kuning', '#FFFF00'),
(4, 'Hijau', '#00FF00'),
(5, 'Biru', '#0000FF'),
(6, 'Merah Jambu', '#FFC0CB'),
(7, 'Ungu', '#9400D3'),
(8, 'Hitam', '#000000'),
(9, 'Putih', '#FFFFFF'),
(10, 'Kelabu', '#808080'),
(11, 'Coklat', '#964B00'),
(12, 'Oak', '#806517');

-- --------------------------------------------------------

--
-- Table structure for table `furniture`
--

CREATE TABLE `furniture` (
  `id` int(11) NOT NULL,
  `color` int(11) NOT NULL,
  `image` varchar(50) NOT NULL,
  `info` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `furniture`
--

INSERT INTO `furniture` (`id`, `color`, `image`, `info`) VALUES
(3, 9, 'PASEO-OFFICE-CHAIR.png', 2),
(5, 10, 'PASEO-OFFICE-CHAIR-GRAY.png', 2),
(6, 12, '20230702122753.png', 3),
(11, 11, '20230702122926.png', 3),
(15, 5, '20230705125507.webp', 7),
(16, 9, '20230707084706.webp', 8),
(17, 8, '20230707084727.webp', 8),
(18, 8, '20230707104008.webp', 9),
(19, 9, '20230707104033.webp', 9),
(20, 10, '20230707104100.webp', 9),
(21, 5, '20230707110718.webp', 10),
(22, 8, '20230707110736.webp', 10),
(23, 10, '20230707110751.webp', 10),
(40, 12, '20230708120303.webp', 27),
(41, 11, '20230708120315.webp', 27);

-- --------------------------------------------------------

--
-- Table structure for table `furniture_info`
--

CREATE TABLE `furniture_info` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `brand` int(11) DEFAULT NULL,
  `price` float NOT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `category` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `furniture_info`
--

INSERT INTO `furniture_info` (`id`, `name`, `brand`, `price`, `description`, `category`) VALUES
(2, 'Paseo Office Chair', 2, 49.9, '', 1),
(3, 'Index Triple Bookcase', 3, 353.7, '', 3),
(7, 'BLÅHAJ', 10, 59, 'Big and safe to have by your side if you want to discover the world below the surface of the ocean. The blue shark can swim very far, dive really deep and hear noises from almost 250 metres away.', 10),
(8, 'BLÅLIDEN', 10, 299, 'Storage can be just as much about reflecting who you are as organising all of your things. In this modern version of a classic glass-door cabinet, you can display the things you love the most.', 6),
(9, 'LAGKAPTEN / ALEX', 10, 448, 'Limited space doesn’t mean you have to say no to studying or working from home. This desk takes up little floor space yet still has a drawer unit where you can store papers and other important things.', 2),
(10, 'FRIHETEN', 10, 3495, 'After a good night’s sleep, you can effortlessly convert your bedroom or guest room into a living room again. The built-in storage is easy to access and spacious enough to stow bedding, books and PJs.', 5),
(27, 'Chorus Bed', 3, 1679, 'Our Chorus Bed does the one thing every single bed should do well: provide a quiet, stable platform for sleep, because a creaky, wobbly, or otherwise distracting bed should be the last thing keeping you up at night. The clean lines, color-matched finishes, and essentially unfussy aesthetic fit with almost any design scheme, and live beautifully alongside the rest of our bedroom collection. We created Chorus to change the way you look at the bedroom, from the very first night. Keep scrolling to discover how.', 4);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nomhp` int(11) NOT NULL,
  `aras` varchar(3) NOT NULL,
  `email` varchar(40) NOT NULL,
  `picture` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `name`, `password`, `nomhp`, `aras`, `email`, `picture`) VALUES
(1, 'yeoh', 'yeoh1234', 137779999, '1', 'yeoh1234@gmail.com', 'stickman.png'),
(2, 'admin', 'password', 111111111, '3', 'admin@admin.com', '20230702121228.png'),
(3, 'apple', 'a', 2147483647, '1', 'apple@apple.com', '20230706164656.jpg'),
(6, 'Apt2B', 'apt2b', 234547568, '2', 'apt2b@apt2b.com', '20230704171108.jpg'),
(7, 'Burrow', 'burrow', 1276348963, '2', 'burrow@burrow.com', 'burrow.png'),
(8, 'IKEA', 'ikea', 379527575, '2', 'customerservice.ikeamy@ikano.asia', '20230705125720.png'),
(9, 'Cat', 'meow', 2147483647, '1', 'OoO@nyanmail.com', '20230706170454.jpg'),
(22, 'test1', 'test1', 1111111111, '2', 'test1@test.com', '20230709091919jpg'),
(23, 'test2', 'test2', 2147483647, '2', 'test2@test.com', '20230709091940jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pilihan`
--

CREATE TABLE `pilihan` (
  `id` int(11) NOT NULL,
  `pengguna` int(11) NOT NULL,
  `produk` int(11) NOT NULL,
  `bilangan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pilihan`
--

INSERT INTO `pilihan` (`id`, `pengguna`, `produk`, `bilangan`) VALUES
(9, 1, 5, 3),
(11, 9, 15, 50);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`),
  ADD KEY `account` (`account`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `furniture`
--
ALTER TABLE `furniture`
  ADD PRIMARY KEY (`id`),
  ADD KEY `color` (`color`),
  ADD KEY `info` (`info`);

--
-- Indexes for table `furniture_info`
--
ALTER TABLE `furniture_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category`),
  ADD KEY `company` (`brand`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pilihan`
--
ALTER TABLE `pilihan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `furniture` (`produk`),
  ADD KEY `pengguna` (`pengguna`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `furniture`
--
ALTER TABLE `furniture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `furniture_info`
--
ALTER TABLE `furniture_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `pilihan`
--
ALTER TABLE `pilihan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `brand`
--
ALTER TABLE `brand`
  ADD CONSTRAINT `account` FOREIGN KEY (`account`) REFERENCES `pengguna` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `furniture`
--
ALTER TABLE `furniture`
  ADD CONSTRAINT `color` FOREIGN KEY (`color`) REFERENCES `color` (`id`),
  ADD CONSTRAINT `info` FOREIGN KEY (`info`) REFERENCES `furniture_info` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `furniture_info`
--
ALTER TABLE `furniture_info`
  ADD CONSTRAINT `category` FOREIGN KEY (`category`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `company` FOREIGN KEY (`brand`) REFERENCES `brand` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pilihan`
--
ALTER TABLE `pilihan`
  ADD CONSTRAINT `furniture` FOREIGN KEY (`produk`) REFERENCES `furniture` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pengguna` FOREIGN KEY (`pengguna`) REFERENCES `pengguna` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
