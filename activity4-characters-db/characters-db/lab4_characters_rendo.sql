-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 14, 2020 at 04:43 PM
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
-- Table structure for table `lab4_characters_rendo`
--

CREATE TABLE `lab4_characters_rendo` (
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lab4_characters_rendo`
--

INSERT INTO `lab4_characters_rendo` (`first_name`, `last_name`, `description`, `id`) VALUES
('SpongeBob', 'SquarePants', 'SpongeBob is a childish and joyful sea sponge who lives in a pineapple with his pet snail Gary in the underwater city of Bikini Bottom. He works as a fry cook at the Krusty Krab, a job which he is exceptionally skilled at and enjoys thoroughly. He attends Mrs. Puff\'s Boating School, and his greatest dream in life is to receive his boating license. Unfortunately, he tenses up whenever he has to drive a boatmobile, and he drives recklessly. SpongeBob is very good-natured and loves to hang out with his best friend Patrick. His teacher is Mrs. Puff and his boss is Mr. Krabs.', 1),
('Squidward', 'Tentacles', 'Squidward is an octopus, not a squid, as confirmed in many interviews and episodes. He has the traits of an octopusâ€”a round bulbous head and rectangular pupilsâ€”while a squid has a long triangular head and circular eyes, unlike Squidward. Squids have ten limbs, many more than Squidward. The series\' animators believed that giving him eight limbs would be too burdensome and difficult to animate, which is why he is usually depicted with six limbs. Notable exceptions are brief scenes in \"Pressure\" and \"Sold!,\" in which he has a full set of eight legs. In \"Feral Friends,\" his exact species is identified: a giant Pacific octopus.', 2),
('Patrick', 'Star', 'Patrick Star is one of the ten main characters in the SpongeBob SquarePants franchise. He is SpongeBob\'s best friend as well as one of his two neighbors.\r\n\r\nHe is a naive and overweight pink sea star. He is voiced by Bill Fagerbakke and first appears in the pilot episode, \"Help Wanted.\"\r\n\r\nHe lives under a rock in the underwater city of Bikini Bottom. SpongeBob and Squidward are his two neighbors, and, when viewed on the front side, are to the right of his residence.', 3),
('Mr.', 'Krabs', 'Eugene Harold Krabs, more commonly known as Mr. Krabs, is one of the ten main characters in the SpongeBob SquarePants franchise. He is a red crab who lives in an anchor with his daughter, Pearl, who is a young whale. He is the owner and founder of the Krusty Krab restaurant as well as the employer of both SpongeBob and Squidward. Mr. Krabs\' most prominent trait is his obsession with money, meaning he\'s also obsessed with wealth, to the point where he occasionally treats money and wealth better than his daughter and employees. Mr. Krabs\' only business competition comes from the Chum Bucket, a failing restaurant run by Sheldon Plankton and his wife Karen. Plankton and Karen are constantly scheming to steal the Krabby Patty secret formula that makes the Krusty Krab so successful.', 4),
('Sandy', 'Cheeks', 'Sandra Jennifer \"Sandy\" Cheeks is one of the ten main characters in the SpongeBob SquarePants franchise. She is an American squirrel from the surface who wears a diving suit and lives in an air-filled glass treedome to survive underwater.\r\n\r\nSandy is a thrill seeker who loves extreme sports and karate. Having come from the state of Texas, she has a Southern drawl and a love for rodeos. She works as a scientist and built both her treedome and air suit herself. She is also a member of the Gal Pals along with Karen, Mrs. Puff, and Pearl.', 5),
('Sheldon', 'Plankton', 'Sheldon J. Plankton, more commonly known as Plankton, is one of the ten main characters as well as the former main antagonist of the SpongeBob SquarePants franchise. He is a planktonic copepod who runs the Chum Bucket restaurant alongside Karen, a waterproof computer who is his sidekick and wife. The Chum Bucket is highly unpopular in Bikini Bottom because it serves chum, a type of bait made from fish meat.\r\n\r\nBoth Plankton and Karen are the two main villains of the franchise. Plankton despises his rival, Mr. Krabs, for running a successful restaurant because his own business rarely gets any customers. He is incredibly jealous of Mr. Krabs and his success. His main goal is to steal Krabs\' secret formula for Krabby Patties and running Mr. Krabs out of business. Karen gives him a variety of plans to steal it, but their efforts always end up failing in the process.', 6),
('Gary', 'the Snail', 'Garold \"Gary\" Wilson, Jr. is SpongeBob SquarePants\'s pet sea snail and the most seen pet in the series. He lives with SpongeBob in his pineapple house on 124 Conch Street. Gary is voiced by Tom Kenny and first appears in the pilot episode, \"Help Wanted.\"\r\n\r\nHe is a domesticated house pet with similar mannerisms to a cat, most notably his \"meow\" sound, as snails are the underwater equivalent to cats in the show. It has been suggested that SpongeBob has had Gary ever since he was a young boy. The episode \"Treats!\" reveals that Gary was adopted by SpongeBob. In \"Plankton\'s Pet\" SpongeBob reveals to have bought Gary at the animal shelter.', 7),
('Mrs.', 'Puff', 'Mrs. Poppy Puff is one of the ten main characters in the SpongeBob SquarePants franchise. She is SpongeBob\'s teacher at Boating School, where she teaches students how to drive boats like underwater cars. She is a paranoid pufferfish who wears a sailor uniform.\r\n\r\nTeaching and driving are her passions in life. She is talented at both, having successfully taught every student other than SpongeBob how to drive. She and SpongeBob are always on an \"endless quest\" to get him a driver\'s license, but due to his reckless boating skills, they never succeed. Her boating school is the only one in the ocean and is very popular. Mrs. Puff\'s school is attached to a submerged lighthouse and surrounded by a stunt-driving course.', 8),
('Pearl', 'Krabs', 'Pearl Krabs is one of the ten main characters in the SpongeBob SquarePants franchise. She is a young whale who lives in a hollow anchor with her father Mr. Krabs. When Pearl grows up, Mr. Krabs wants her to continue the family business by inheriting the Krusty Krab and becoming its owner.', 9),
('Karen', 'Plankton', 'Karen Plankton is one of the ten main characters in the SpongeBob SquarePants franchise. She is a waterproof supercomputer who lives in the Chum Bucket laboratory. She is Plankton\'s wife and sidekick who supplies him with evil plans to steal the Krabby Patty formula. Along with Plankton, she is one of the two main villains of the show. Both Karen and Plankton first appear in the episode \"Plankton!\"\r\n\r\nAs a computer, Karen is the smartest resident of Bikini Bottom and has a clever, analytical personality. She has two main forms: a big monitor on the wall or a portable wheeled computer. Along with her role as co-owner of the Chum Bucket, she works as the chef and cashier. She rarely has to fulfill these jobs due to the restaurant\'s unpopularity.', 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lab4_characters_rendo`
--
ALTER TABLE `lab4_characters_rendo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lab4_characters_rendo`
--
ALTER TABLE `lab4_characters_rendo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
