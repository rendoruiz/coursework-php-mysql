-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 09, 2020 at 10:56 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rendoruiz_phpmysql`
--

-- --------------------------------------------------------

--
-- Table structure for table `rru_gallery`
--

CREATE TABLE `rru_gallery` (
  `rru_title` varchar(256) NOT NULL,
  `rru_description` text NOT NULL,
  `rru_filename` varchar(256) NOT NULL,
  `rru_timedate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `rru_exif_datetimeoriginal` datetime NOT NULL,
  `rru_exif_computedheight` int(11) NOT NULL,
  `rru_exif_computedwidth` int(11) NOT NULL,
  `rru_exif_filesize` int(11) NOT NULL,
  `rru_exif_make` varchar(255) NOT NULL,
  `rru_exif_model` varchar(255) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rru_gallery`
--

INSERT INTO `rru_gallery` (`rru_title`, `rru_description`, `rru_filename`, `rru_timedate`, `rru_exif_datetimeoriginal`, `rru_exif_computedheight`, `rru_exif_computedwidth`, `rru_exif_filesize`, `rru_exif_make`, `rru_exif_model`, `id`) VALUES
('Mammut', 'Children\'s stool, indoor/outdoor/orange\r\n\r\nhttps://www.ikea.com/ca/en/p/mammut-childrens-stool-indoor-outdoor-orange-50365361/', 'rimg_5fa97d8e78df4.jpeg', '2020-11-09 17:34:06', '2020-11-06 14:59:08', 1944, 2592, 1531922, 'SONY', 'DSC-HX200V', 2),
('Havsta', 'Glass-door cabinet, gray, 47 5/8x13 3/4x48 3/8 \" (121x35x123 cm)\r\n\r\nhttps://www.ikea.com/ca/en/p/havsta-glass-door-cabinet-gray-00415194/', 'rimg_5fa97d7fc6898.jpeg', '2020-11-09 17:33:52', '2020-11-06 15:00:09', 1944, 2592, 1352370, 'SONY', 'DSC-HX200V', 3),
('Pinnig', 'Coat rack with shoe storage bench, black, 76 \" (193 cm)\r\n\r\nhttps://www.ikea.com/ca/en/p/pinnig-coat-rack-with-shoe-storage-bench-black-20329789/', 'rimg_5fa97d6e8ec37.jpeg', '2020-11-09 17:33:34', '2020-11-06 14:55:30', 1944, 2592, 1850846, 'SONY', 'DSC-HX200V', 4),
('Stockholm', 'Sofa, Seglora natural\r\n\r\nhttps://www.ikea.com/ca/en/p/stockholm-sofa-seglora-natural-20245049/', 'rimg_5fa97d63d7239.jpeg', '2020-11-09 17:33:24', '2020-11-06 14:56:21', 1944, 2592, 1474860, 'SONY', 'DSC-HX200V', 5),
('Raskog', 'Utility cart, gray-green, 13 3/4x17 3/4x30 3/4 \" (35x45x78 cm)\r\n\r\nhttps://www.ikea.com/ca/en/p/raskog-utility-cart-gray-green-90443135/', 'rimg_5fa97d5759809.jpeg', '2020-11-09 17:33:11', '2020-11-06 15:00:54', 1944, 2592, 2117396, 'SONY', 'DSC-HX200V', 6),
('Brusali', 'Bookcase, brown, 26 3/8x74 3/4 \" (67x190 cm)\r\n\r\nhttps://www.ikea.com/ca/en/p/brusali-bookcase-brown-20439740/', 'rimg_5fa97d4a6d5e8.jpeg', '2020-11-09 17:32:58', '2020-11-06 14:59:51', 1944, 2592, 1088277, 'SONY', 'DSC-HX200V', 7),
('Billy', 'Bookcase, black-brown, 31 1/2x11x41 3/4 \" (80x28x106 cm)\r\n\r\nhttps://www.ikea.com/ca/en/p/billy-bookcase-black-brown-70263842/', 'rimg_5fa97cfec0d72.jpeg', '2020-11-09 17:31:43', '2020-11-06 14:59:38', 1944, 2592, 1223018, 'SONY', 'DSC-HX200V', 8),
('Markus', 'Office chair, Glose black\r\n\r\nhttps://www.ikea.com/ca/en/p/markus-office-chair-black-glose-robust-black-00103102/', 'rimg_5fa97d3ddc4c9.jpeg', '2020-11-09 17:32:46', '2020-11-06 15:05:46', 1944, 2592, 2146998, 'SONY', 'DSC-HX200V', 9),
('Flintan', 'Office chair, Vissle black\r\n\r\nhttps://www.ikea.com/ca/en/p/flintan-office-chair-vissle-black-60336844/', 'rimg_5fa97d336e523.jpeg', '2020-11-09 17:32:35', '2020-11-06 15:06:05', 1944, 2592, 2255192, 'SONY', 'DSC-HX200V', 10),
('Strala', 'Pendant lamp shade, lace white, 39\" (100 cm)\r\n\r\nhttps://www.ikea.com/ca/en/p/strala-pendant-lamp-shade-lace-white-30474078/', 'rimg_5fa97d261ee06.jpeg', '2020-11-09 17:32:22', '2020-11-06 14:54:42', 1944, 2592, 2225253, 'SONY', 'DSC-HX200V', 11),
('Knixhult', 'Pendant lamp, bamboo\r\n\r\nhttps://www.ikea.com/ca/en/p/knixhult-pendant-lamp-bamboo-60407134/', 'rimg_5fa97d1ad127a.jpeg', '2020-11-09 17:32:11', '2020-11-06 14:54:46', 1944, 2592, 2453622, 'SONY', 'DSC-HX200V', 12),
('Hilver', 'Table, bamboo55 1/8x25 5/8 \" (140x65 cm)\r\n\r\nhttps://www.ikea.com/ca/en/p/hilver-table-bamboo-s79046038/', 'rimg_5fa97ce5b41b8.jpeg', '2020-11-09 17:31:18', '2020-11-06 15:02:12', 1944, 2592, 1569437, 'SONY', 'DSC-HX200V', 13),
('Slakt', 'Bed frame w/pull-out bed + storage, white, Twin\r\n\r\nhttps://www.ikea.com/ca/en/p/slaekt-bed-frame-w-pull-out-bed-storage-white-s19239450/', 'rimg_5fa97cf0c652f.jpeg', '2020-11-09 17:31:29', '2020-11-06 15:08:32', 1944, 2592, 1847877, 'SONY', 'DSC-HX200V', 14),
('Uppland', 'Loveseat, Virestad red/white\r\n\r\nhttps://www.ikea.com/ca/en/p/uppland-loveseat-virestad-red-white-s29324933/', 'rimg_5fa97d090f85a.jpeg', '2020-11-09 17:31:53', '2020-11-06 14:56:51', 1944, 2592, 2860955, 'SONY', 'DSC-HX200V', 15),
('Hammarn', 'Futon, Knisa dark gray/black, 47 1/4 \" (120 cm)\r\n\r\nhttps://www.ikea.com/ca/en/p/hammarn-futon-knisa-dark-gray-black-40361491/', 'rimg_5fa97f2837ebc.jpeg', '2020-11-09 17:40:56', '2020-11-06 14:57:20', 1944, 2592, 1414738, 'SONY', 'DSC-HX200V', 17);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rru_gallery`
--
ALTER TABLE `rru_gallery`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rru_gallery`
--
ALTER TABLE `rru_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
