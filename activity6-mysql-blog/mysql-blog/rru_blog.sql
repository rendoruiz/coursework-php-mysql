-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 30, 2020 at 11:13 AM
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
-- Table structure for table `rru_blog`
--

CREATE TABLE `rru_blog` (
  `rru_title` varchar(50) NOT NULL,
  `rru_message` text NOT NULL,
  `rru_timedate` timestamp NOT NULL DEFAULT current_timestamp(),
  `id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rru_blog`
--

INSERT INTO `rru_blog` (`rru_title`, `rru_message`, `rru_timedate`, `id`) VALUES
('Test Complete! + stripcslashes()', 'I am really glad that everything works as expected  :blobgrin: .\r\nThe blog is pretty barebones right now but I feel like it\'s just going to get better from this point onwards  :blobsmile: .\r\n\r\nThis new blog also introduces the usage of stripcslashes() PHP function that fixes my problem on displaying content in textareas, where things all get messed up whenever you submit an invalid form that turns all the newlines on the textarea to escape characters and not HTML newlines. :blobconfused: \r\n\r\nIt\'s also nice that I was able to convert most repetitive code to functions and convert some provided code to make it more efficient, maintainable, and readable.  :blobheart:\r\nLike how I made adding and displaying emojis/emoticons a whole lot easier than the default code.  :blobhand:  :blobgrin:', '2020-10-30 16:46:03', 27),
('Blog Test: Newlines, Links, and Emojis', 'This is a test containing all new features that I have added on this new blog.\r\nThis is a newline with an inline link and emoji: https://www.nait.ca/nait/home  :blobgrin: \r\n\r\nhttps://www.nait.ca/nait/home\r\nThis is a newline with a link above it and an emoji below\r\n :blobkiss:', '2020-10-30 16:43:24', 26),
('Blob Emojis', 'The emojis are taken from wikipedia blob emoji page:\r\nhttps://en.wikipedia.org/wiki/Blob_emoji', '2020-10-30 16:37:27', 24),
('Blog Test: Newlines and Emojis', 'This is a test on how newlines perform with emojis on it.\r\nThis is a newline with an inline emoji  :blobheart: \r\nThis is a newline with an emoji below it.\r\n :blobcry: \r\n\r\nThis is a newline with an empty line above and another empty line below then followed by a newline with emoji below it.\r\n\r\n :blobkiss:', '2020-10-30 16:39:23', 25),
('Blog Test: Emoji Bar', 'I have included emojis/emoticons based on Google\'s well-known and loved blob emojis.\r\n :blobsmile:  :blobgrin:  :blobheart:  :blobconfused:  :blobshocked:  :blobcry:  :blobhand:  :blobkiss:', '2020-10-30 16:36:36', 23),
('New Beginnings', 'My first blog post on this new and fresh blog.', '2020-10-30 16:30:40', 20),
('Old Blog', 'Here\'s my old blog link if anyone\'s interested: http://rendoruiz.server.com/phpmysql/lab2/simple-blog/', '2020-10-30 16:32:00', 21),
('Blog Test: Newlines', 'This is me testing out newlines (enter key).\r\nThis is a newline.\r\n\r\nThis is a new line with an empty line on top.\r\n\r\n\r\nThis is a new line with 2 empty lines on top', '2020-10-30 16:34:57', 22),
('Out of Stock, Everywhere!', 'It has been years (or at least a decade?) since I owned and played on a console. \r\nAt this point, it doesn\'t seem that I\'ll be able to procure one with how low the stock are on the 2 new consoles.\r\n :blobcry:', '2020-10-30 16:48:16', 28),
('10th Blog Post Mark', 'It\'s been long but I finally reached the 2 digit club... with no viewers, that is.  :blobshocked:', '2020-10-30 16:52:17', 29);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rru_blog`
--
ALTER TABLE `rru_blog`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rru_blog`
--
ALTER TABLE `rru_blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
