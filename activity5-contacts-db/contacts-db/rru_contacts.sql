-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 25, 2020 at 07:59 PM
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
-- Table structure for table `rru_contacts`
--

CREATE TABLE `rru_contacts` (
  `rru_bizname` varchar(255) NOT NULL,
  `rru_name` varchar(255) NOT NULL,
  `rru_email` varchar(255) NOT NULL,
  `rru_website` varchar(255) NOT NULL,
  `rru_phone` varchar(255) NOT NULL,
  `rru_address` varchar(255) NOT NULL,
  `rru_city` varchar(255) NOT NULL,
  `rru_province` varchar(255) NOT NULL,
  `rru_description` text NOT NULL,
  `rru_resume` tinyint(1) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rru_contacts`
--

INSERT INTO `rru_contacts` (`rru_bizname`, `rru_name`, `rru_email`, `rru_website`, `rru_phone`, `rru_address`, `rru_city`, `rru_province`, `rru_description`, `rru_resume`, `id`) VALUES
('IronSight', 'Adam Jessome', 'adam@ironsight.ca', 'https://ironsight.ca/', '000-000-0000', '', '', '', 'IronSight is the vac truck turned software company. We initially built IronSight as tool to dispatch our field team more efficiently, and allow our oil & gas clients to send us job requests and track our trucks.', 0, 6),
('Drivewyze', 'Brian Heath', 'support@drivewyze.com', 'https://drivewyze.com/', '888-988-1590', '6325 Gateway Blvd NW, Suite 170', 'Edmonton', 'AB', 'Drivewyze is an intelligent transportation system service that provides bypasses to commercial vehicles as they approach participating state highway weigh stations. The participating vehicles\' safety record, credentials and weight are verified automatically, and if they comply with that state\'s screening rules for automated bypass, the vehicles are authorized to bypass these facilities rather than pull in for manual inspection. This results in time and fuel savings for the truck and less vehicle congestion at the weigh station.', 1, 7),
('Spontivly', '', 'contact@spontivly.com', 'https://www.spontivly.ca/', '000-000-0000', '', '', '', 'Finding something to do can easily become overwhelming. Imagine instead of scrolling through dozens of Facebook and Meetup events, your phone could filter through the noise for you?\\r\\n\\r\\nThatâ€™s Spontivly â€” a personal event assistant that uses geo-fencing, static algorithms and calendar integration to curate experiences based on a userâ€™s interests, availability and location in realtime. The app, which is available for download on Android and iOS, connects users to their communities in a more meaningful way.', 0, 9),
('Beamdog', 'Trent Oster', 'beamdog@gmail.com', 'https://www.beamdog.com/', '780-757-1520', '10508 82 Ave NW', 'Edmonton', 'AB', 'In 2009, Beamdog â€” now the largest independent game studio in Edmonton â€” was struggling to distinguish itself in an ever-crowded online gaming market. Firm believers in direct sales, Oster and his co-founder Cam Tofer set up a digital distribution platform similar to online PC-games retailer Steam. Despite more than 300 unique titles on offer, Beamdog barely had any sales. This was the same year the iPad launched.', 1, 10),
('Stash', '', 'stashpass@gmail.com', 'https://stashpass.co/', '000-000-0000', '', '', '', 'Stash offers a unique system of password management: itâ€™s a physical card that uses patent-pending technology to keep all your passwords safe, by storing them offline and thus far from any potential internet hacks. Powered by NFC technology â€” the same tech that powers tap payments for credit cards â€” in conjunction with a phone app, it allows your phone (and only your phone) to deliver passwords from the card when itâ€™s activated by the press a button.', 0, 11),
('Gabbi', 'Roberto Moreno', 'roberto@gabbi.ai', 'https://www.gabbi.ai/', '855-224-2575', '', 'Edmonton', 'AB', 'Touted as a central hub for all communications between an agent and a client, Gabbi aims to step in to help convert leads and move sales forward. â€œStatistics show that if realtor doesnâ€™t respond to a potential customer within a few minutes, that customer has already gone elsewhere,â€ says Moreno. â€œThe consumer wants information much quicker. Itâ€™s important for agents to be able to respond in a timely matter with accurate information, and thatâ€™s really where Gabbi can come in and help.â€', 1, 12),
('Undo', 'Tim Mallett', 'info@undo.ca', 'https://www.undo.ca/', '833-879-8636', '', '', '', 'Divorce made simpler\r\nInteractive software helps you make financial decisions and generates your court documents, which are reviewed by a lawyer. We send someone to you to sign and file your documents at court. Get divorced without leaving home.', 0, 13),
('dealcloser', 'Amir Reshef', 'hello@dealcloser.com', 'https://www.dealcloser.com/', '800-930-6715', '', '', '', 'dealcloser helps corporate lawyers become more efficient by modernizing the largely paper-based process of completing a transaction. The cloud-based platform eliminates many non-value-added administrative tasks, such as collecting signatures, filing, and manually tracking document versions, that not only drive up the legal bill, but can lead to costly mistakes.', 0, 14),
('Jobber', 'Elana Ziluk', 'hello@getjobber.com', 'https://getjobber.com/', '888-721-1115', '10130 103 Street NW', 'Edmonton', 'AB', 'Jobberâ€™s award-winning software helps small home service businesses organize their entire operations, from scheduling jobs and managing their crews, to invoicing customers and collecting payments.', 1, 15),
('Alberta Health Services', '', 'ahsinfo@albertahealthservices.ca', 'https://albertahealthservices.ca/', '780-342-2000', 'Seventh Street Plaza 14th Floor, North Tower 10030 â€“ 107 Street NW', 'Edmonton', 'AB', 'Alberta Health Services delivers medical care on behalf of the Government of Alberta\'s Ministry of Health through 850 facilities throughout the province, including hospitals, clinics, continuing care facilities, mental health facilities and community health sites, while providing a variety of programs and services.', 1, 16);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rru_contacts`
--
ALTER TABLE `rru_contacts`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `rru_contacts` ADD FULLTEXT KEY `rru_bizname` (`rru_bizname`);
ALTER TABLE `rru_contacts` ADD FULLTEXT KEY `rru_name` (`rru_name`);
ALTER TABLE `rru_contacts` ADD FULLTEXT KEY `rru_email` (`rru_email`);
ALTER TABLE `rru_contacts` ADD FULLTEXT KEY `rru_website` (`rru_website`);
ALTER TABLE `rru_contacts` ADD FULLTEXT KEY `rru_description` (`rru_description`);
ALTER TABLE `rru_contacts` ADD FULLTEXT KEY `rru_phone` (`rru_phone`);
ALTER TABLE `rru_contacts` ADD FULLTEXT KEY `rru_address` (`rru_address`);
ALTER TABLE `rru_contacts` ADD FULLTEXT KEY `rru_city` (`rru_city`);
ALTER TABLE `rru_contacts` ADD FULLTEXT KEY `rru_province` (`rru_province`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rru_contacts`
--
ALTER TABLE `rru_contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
