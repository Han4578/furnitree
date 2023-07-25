-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2023 at 12:21 PM
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
(7, 'Pasu', 'pot.webp'),
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
(15, 5, '20230717125343.webp', 7),
(16, 9, '20230707084706.webp', 8),
(17, 8, '20230707084727.webp', 8),
(18, 8, '20230707104008.webp', 9),
(19, 9, '20230707104033.webp', 9),
(20, 10, '20230707104100.webp', 9),
(21, 5, '20230718125057.webp', 10),
(22, 8, '20230707110736.webp', 10),
(23, 10, '20230707110751.webp', 10),
(40, 12, '20230708120303.webp', 27),
(41, 11, '20230708120315.webp', 27),
(54, 11, '20230711125550.webp', 36),
(55, 12, '20230711125606.webp', 36),
(56, 1, '20230711131656.webp', 37),
(57, 3, '20230711132216.webp', 37),
(58, 4, '20230711132226.webp', 37),
(59, 5, '20230711132234.webp', 37),
(60, 9, '20230711132246.webp', 37),
(61, 8, '20230711132259.webp', 37),
(62, 10, '20230715114323.png', 37),
(64, 8, '20230722125515.webp', 39),
(65, 3, '20230722125538.webp', 39),
(66, 9, '20230722132040.webp', 40),
(67, 8, '20230722132108.webp', 40),
(68, 6, '20230722140813.webp', 41),
(69, 9, '20230722141321.webp', 41);

-- --------------------------------------------------------

--
-- Table structure for table `furniture_info`
--

CREATE TABLE `furniture_info` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `brand` int(11) DEFAULT NULL,
  `price` decimal(12,2) NOT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `category` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `furniture_info`
--

INSERT INTO `furniture_info` (`id`, `name`, `brand`, `price`, `description`, `category`) VALUES
(2, 'Paseo Office Chair', 2, '50.00', '', 1),
(3, 'Index Triple Bookcase', 3, '354.00', '', 3),
(7, 'BLÅHAJ', 10, '59.00', 'Big and safe to have by your side if you want to discover the world below the surface of the ocean. The blue shark can swim very far, dive really deep and hear noises from almost 250 metres away.', 10),
(8, 'BLÅLIDEN', 10, '299.00', 'Storage can be just as much about reflecting who you are as organising all of your things. In this modern version of a classic glass-door cabinet, you can display the things you love the most.', 6),
(9, 'LAGKAPTEN / ALEX', 10, '448.00', 'Limited space doesn’t mean you have to say no to studying or working from home. This desk takes up little floor space yet still has a drawer unit where you can store papers and other important things.', 2),
(10, 'FRIHETEN', 10, '3495.00', 'After a good night’s sleep, you can effortlessly convert your bedroom or guest room into a living room again. The built-in storage is easy to access and spacious enough to stow bedding, books and PJs.', 5),
(27, 'Chorus Bed', 3, '1679.00', 'Our Chorus Bed does the one thing every single bed should do well: provide a quiet, stable platform for sleep, because a creaky, wobbly, or otherwise distracting bed should be the last thing keeping you up at night. The clean lines, color-matched finishes, and essentially unfussy aesthetic fit with almost any design scheme, and live beautifully alongside the rest of our bedroom collection. We created Chorus to change the way you look at the bedroom, from the very first night. Keep scrolling to discover how.', 4),
(36, 'Carta Credenza', 3, '1195.00', 'No matter what you call it — credenza, media console, sideboard — this versatile continuation of our Carta Collection rises to the occasion for any living room. The reversible sliding doors conceal a storage compartment with adjustable shelves and plenty of convenient cord management slots, and the sturdy, solid hardwood construction is built to last. Choose between two finishes and two leg options to customize your perfect living room storage cabinet.', 9),
(37, 'Soto Queen Size Sleeper Sofa B', 2, '2688.00', '', 4),
(39, 'BONDSKÄRET', 10, '149.00', 'The tree-like shape of BONDSKÄR hat/coat stand was created by Rutger Andersson already in 1978. Back then with the name SMED. An example of IKEA icons given new colours in the Nytillverkad collection.', 8),
(40, 'SKRUVBY', 10, '415.00', 'The SKRUVBY series has a traditional look with solitaire storage units that can be coordinated. This TV bench’s top panel has an oak expression and profiled edges that add a warm, natural feel to the room.', 9),
(41, 'FÖRENLIG', 10, '20.00', 'Soft and inviting shapes make FÖRENLIG plant pots easy to like and use in many homes, both indoors and outdoors.', 7);

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
(2, 'admin', 'password', 222222222, '3', 'admin@admin.com', '20230702121228.png'),
(3, 'apple', 'a', 2147483647, '1', 'apple@apple.com', '20230706164656.jpg'),
(6, 'Apt2B', 'apt2b', 234547568, '2', 'apt2b@apt2b.com', '20230718130224.jpg'),
(7, 'Burrow', 'burrow', 1276348963, '2', 'a', 'burrow.png'),
(8, 'IKEA', 'ikea', 379527575, '2', 'customerservice.ikeamy@ikano.asia', '20230705125720.png'),
(9, 'Cat', 'meow', 2147483646, '1', 'OoO@nyanmail.com', '20230706170454.jpg'),
(22, 'test1', 'test1', 1111111111, '2', 'test1@test.com', '20230715111740.png'),
(23, 'test2', 'test2', 2147483647, '2', 'test2@test.com', '20230715111746.png'),
(26, 'user', 'user', 111111111, '2', 'user@user.com', '20230716095746.jpg');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for dumped tables
--

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `furniture_info`
--
ALTER TABLE `furniture_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `furniture`
--
ALTER TABLE `furniture`
  ADD CONSTRAINT `color` FOREIGN KEY (`color`) REFERENCES `color` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `info` FOREIGN KEY (`info`) REFERENCES `furniture_info` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `furniture_info`
--
ALTER TABLE `furniture_info`
  ADD CONSTRAINT `category` FOREIGN KEY (`category`) REFERENCES `category` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `company` FOREIGN KEY (`brand`) REFERENCES `brand` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
