-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2022 at 12:14 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrators`
--

CREATE TABLE `administrators` (
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `UserID` int(8) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `administrators`
--

INSERT INTO `administrators` (`Username`, `Password`, `Email`, `UserID`, `FirstName`, `LastName`) VALUES
('seedy', '[value-2]', '[value-3]', 10125603, '[value-5]', '[value-6]'),
('carson22', '$2y$10$/gsp1mWoWWuqUOKPHs4IYOdwAa4dAGnS0PctCynGnRhCSJ1mi6JIi', 'cwj03503@uga.edu', 10125604, 'Carson', 'Jones'),
('aej13827', '$2y$10$UilXNmJUCdq.L4YBcVzbQewmOakz8OCCVJTPlpBfRH8a3Ee2WLHf6', 'aej13827@uga.edu', 10125605, 'Andrew', 'Jenkins');

-- --------------------------------------------------------

--
-- Table structure for table `bookreserve`
--

CREATE TABLE `bookreserve` (
  `BookID` decimal(13,0) NOT NULL,
  `UserID` int(9) NOT NULL,
  `ReservedDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookreserve`
--

INSERT INTO `bookreserve` (`BookID`, `UserID`, `ReservedDate`) VALUES
('1230000000000', 101256039, '2022-05-04'),
('1230000000000', 101256040, '2022-05-05'),
('1230057366338', 101256039, '2022-05-05'),
('1231238798231', 101256039, '2022-05-05'),
('1231296996080', 101256039, '2022-05-05'),
('1235008127455', 101256039, '2022-05-05'),
('1237582659510', 101256040, '2022-05-05');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `Title` varchar(255) NOT NULL,
  `Author` varchar(255) NOT NULL,
  `Publisher` varchar(255) NOT NULL,
  `Genre` varchar(255) NOT NULL,
  `YearPubbed` int(4) NOT NULL,
  `Description` text DEFAULT NULL,
  `BookID` decimal(13,0) NOT NULL,
  `CheckedOut` tinyint(1) NOT NULL DEFAULT 0,
  `ImageLocation` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`Title`, `Author`, `Publisher`, `Genre`, `YearPubbed`, `Description`, `BookID`, `CheckedOut`, `ImageLocation`) VALUES
('The Picture of Dorian Gray', 'Oscar Wilde', 'Ward Lock & Co.', 'Realistic Fiction', 1981, 'Enthralled by his own exquisite portrait, Dorian Gray makes a Faustian bargain to sell his soul in exchange for eternal youth and beauty. Under the influence of Lord Henry Wotton, he is drawn into a corrupt double life, where he is able to indulge his desires while remaining a gentleman in the eyes of polite society. Only Dorian\'s picture bears the traces of his decadence. ', '1230000000000', 0, 'The-Picture-Of-Dorian-Grey.jpg'),
('The Odyssey', 'Homer', '', 'Epic', 1614, 'After ten bloody years of fighting in the Trojan War, the intrepid Odysseus heads homeward, little imagining that it will take another ten years of desperate struggle to reclaim his kingdom and family. The wily hero circumvents the wrath of the sea god Poseidon and triumphs over an incredible array of obstacles, assisted by his patron goddess Athene and his own prodigious guile. From a literal descent into Hell to interrogate a dead prophet to a sojourn in the earthly paradise of the Lotus-eaters, the gripping narrative traverses the mythological world of ancient Greece to introduce an unforgettable cast of characters: one-eyed giants known as Cyclopses, the enchantress Circe, cannibals, sirens, the twin perils of Scylla and Charybdis, and a fantastic assortment of other creatures.', '1230057366338', 0, 'The-Odyssey.jpg'),
('Dune', 'Frank Herbert', 'Chilton Books', 'Scientific Fiction', 1965, 'Dune is set in the distant future amidst a feudal interstellar society in which various noble houses control planetary fiefs. It tells the story of young Paul Atreides, whose family accepts the stewardship of the planet Arrakis. While the planet is an inhospitable and sparsely populated desert wasteland, it is the only source of melange, or \"spice\", a drug that extends life and enhances mental abilities. Melange is also necessary for space navigation, which requires a kind of multidimensional awareness and foresight that only the drug provides. As melange can only be produced on Arrakis, control of the planet is a coveted and dangerous undertaking.', '1230517172530', 0, 'Dune.jpg'),
('Crying in H Mart: A Memoir', 'Michelle Zauner', 'Alfred A. Knopf', 'Biography', 2021, 'In this exquisite story of family, food, grief, and endurance, Michelle Zauner proves herself far more than a dazzling singer, songwriter, and guitarist. With humor and heart, she tells of growing up one of the few Asian American kids at her school in Eugene, Oregon; of struggling with her mother\'s particular, high expectations of her; of a painful adolescence; of treasured months spent in her grandmother\'s tiny apartment in Seoul, where she and her mother would bond, late at night, over heaping plates of food.', '1231238798231', 0, 'Crying-In-H-Mart.jpg'),
('Empire of Cotton: A Global History', 'Sven Beckert', 'Vintage Books', 'Nonfiction', 2015, '\"The epic story of the rise and fall of the empire of cotton, its centrality in the world economy, and its making and remaking of global capitalism. Sven Beckert\'s rich, fascinating book tells the story of how, in a remarkably brief period, European entrepreneurs and powerful statesmen recast the world\'s most significant manufacturing industry combining imperial expansion and slave labor with new machines and wage workers to change the world. Here is the story of how, beginning well before the advent of machine production in 1780, these men created a potent innovation (Beckert calls it war capitalism, capitalism based on unrestrained actions of private individuals; the domination of masters over slaves, of colonial capitalists over indigenous inhabitants), and crucially affected the disparate realms of cotton that had existed for millennia. We see how this thing called war capitalism shaped the rise of cotton, and then was used as a lever to transform the world. The empire of cotton was, from the beginning, a', '1231284893274', 0, 'Empire-Of-Cotton-A-Global-History.jpg'),
('The Little Prince', 'Antoine de Saint-Exupéry', 'Reynal & Hitchcock', 'Fantasy', 1943, 'The Sahara desert is the scenery of Little Prince\'s story. The narrator\'s plane has crashed there and he has scarcely some food and water to survive. Trying to comprehend what caused the crash, the Little Prince appears. The serious blonde little boy asks to draw him a sheep. The narrator consents to the strange fellow\'s request. They soon become friends and the Little Prince informs the pilot that he is from a small planet, the asteroid 325, talks to him about the baobabs, his planet volcanoes and the mysterious rose that grew on his planet. He also talks to him about their friendship and the lie that evoked his journey to other planets. Often puzzled by the grown-ups\' behavior, the little traveler becomes a total and eternal symbol of innocence and love, of responsibility and devotion. Through him we get to see how insightful children are and how grown-ups aren\'t. Children use their heart to feel what\'s really important, not the eyes.', '1231296996080', 0, 'The-Little-Prince.jpg'),
('Devil House: A Novel', 'John Darnielle', 'Farrar, Straus and Giroux', 'Realistic Fiction', 2022, 'Gage Chandler is descended from kings. That’s what his mother always told him. Years later, he is a true crime writer, with one grisly success—and a movie adaptation—to his name, along with a series of subsequent less notable efforts. But now he is being offered the chance for the big break: to move into the house where a pair of briefly notorious murders occurred, apparently the work of disaffected teens during the Satanic Panic of the 1980s. Chandler finds himself in Milpitas, California, a small town whose name rings a bell––his closest childhood friend lived there, once upon a time. He begins his research with diligence and enthusiasm, but soon the story leads him into a puzzle he never expected—back into his own work and what it means, back to the very core of what he does and who he is.', '1231623814238', 0, 'Devil-House-A-Novel.jpg'),
('Sophie\'s World', 'Jostein Gaarder', 'Aschehoug', 'Realistic Fiction', 1991, 'One day fourteen-year-old Sophie Amundsen comes home from school to find in her mailbox two notes, with one question on each: \"Who are you?\" and \"Where does the world come from?\" From that irresistible beginning, Sophie becomes obsessed with questions that take her far beyond what she knows of her Norwegian village. Through those letters, she enrolls in a kind of correspondence course, covering Socrates to Sartre, with a mysterious philosopher, while receiving letters addressed to another girl. Who is Hilde? And why does her mail keep turning up? To unravel this riddle, Sophie must use the philosophy she is learning—but the truth turns out to be far more complicated than she could have imagined.', '1231691608535', 0, 'Sophies-World.jpg'),
('The Exorcist', 'William Peter Blatty', 'Harper & Row', 'Horror', 1971, 'Inspired by an alleged real case of demonic possession in 1949, The Exorcist became an international phenomenon. A blockbusting adaptation of a best-selling novel, it was praised as \'deeply spiritual\' by some sections of the Catholic Church while being picketed by the Festival of Light and branded \'Satanic\' by the evangelist Billy Graham. Banned on video in the UK for nearly fifteen years, the film still retains and extraordinary power to shock and startle. ', '1231849746782', 0, 'The-Exorcist.jpg'),
('The Shining', 'Stephen King', 'Doubleday', 'Horror', 1977, 'Jack Torrance’s new job at the Overlook Hotel is the perfect chance for a fresh start. As the off-season caretaker at the atmospheric old hotel, he’ll have plenty of time to spend reconnecting with his family and working on his writing. But as the harsh winter weather sets in, the idyllic location feels ever more remote . . . and more sinister. And the only one to notice the strange and terrible forces gathering around the Overlook is Danny Torrance, a uniquely gifted five-year-old.', '1235008127455', 0, 'The-Shining.jpg'),
('A Beautiful Mind', 'Sylvia Nasar', 'Simon & Schuster', 'Biography', 1998, 'The powerful, dramatic biography of math genius John Nash, who overcame serious mental illness and schizophrenia to win the Nobel Prize. ', '1235048232108', 0, 'A-Beautiful-Mind.jpg'),
('The Fellowship Of The Ring', 'J.R.R. Tolkien', 'George Allen & Unwin', 'Fantasy', 1954, 'In a sleepy village in the Shire, young Frodo Baggins finds himself faced with an immense task, as his elderly cousin Bilbo entrusts the Ring to his care. Frodo must leave his home and make a perilous journey across Middle-earth to the Cracks of Doom, there to destroy the Ring and foil the Dark Lord in his evil purpose.', '1237211382148', 0, 'The-Fellowship-Of-The-Ring.jpg'),
('Alas, Babylon', 'Pat Frank', 'J. B. Lippincott', 'Scientific Fiction', 1959, '“Alas, Babylon.” Those fateful words heralded the end. When the unthinkable nightmare of nuclear holocaust ravaged the United States, it was instant death for tens of millions of people; for survivors, it was a nightmare of hunger, sickness, and brutality. Overnight, a thousand years of civilization were stripped away.  But for one small Florida town, miraculously spared against all the odds, the struggle was only just beginning, as the isolated survivors—men and women of all ages and races—found the courage to come together and confront the harrowing darkness.', '1237582659510', 0, 'Alas-Babylon.jpg'),
('Alan Turing: The Enigma', 'Andrew Hodges', 'Simon & Schuster', 'Biography', 1983, 'It is only a slight exaggeration to say that the British mathematician Alan Turing (1912-1954) saved the Allies from the Nazis, invented the computer and artificial intelligence, and anticipated gay liberation by decades--all before his suicide at age forty-one. This New York Times–bestselling biography of the founder of computer science, with a new preface by the author that addresses Turing\'s royal pardon in 2013, is the definitive account of an extraordinary mind and life.', '1238348070928', 0, 'Alan-Turing-The-Enigma.jpg'),
('The Catcher in The Rye', 'J.D. Salinger', 'Little, Brown and Company', 'Realistic Fiction', 1951, 'The hero-narrator of The Catcher in the Rye is an ancient child of sixteen, a native New Yorker named Holden Caulfield. Through circumstances that tend to preclude adult, secondhand description, he leaves his prep school in Pennsylvania and goes underground in New York City for three days. The boy himself is at once too simple and too complex for us to make any final comment about him or his story. Perhaps the safest thing we can say about Holden is that he was born in the world not just strongly attracted to beauty but, almost, hopelessly impaled on it. There are many voices in this novel: children\'s voices, adult voices, underground voices-but Holden\'s voice is the most eloquent of all. Transcending his own vernacular, yet remaining marvelously faithful to it, he issues a perfectly articulated cry of mixed pain and pleasure. However, like most lovers and clowns and poets of the higher orders, he keeps most of the pain to, and for, himself. The pleasure he gives away, or sets aside, with all his heart. It is there for the reader who can handle it to keep.', '1239539868877', 0, 'The-Catcher-In-The-Rye.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `UserID` int(9) NOT NULL,
  `BookId` decimal(13,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `UserID` int(9) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `ReserveOne` decimal(13,0) NOT NULL DEFAULT 0,
  `ReserveTwo` decimal(13,0) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Username`, `Password`, `Email`, `UserID`, `FirstName`, `LastName`, `ReserveOne`, `ReserveTwo`) VALUES
('seeding4NoHash', 'junk', 'goofy@disney.com', 101256037, 'pls', 'so much', '11', '0'),
('paige_turner', '$2y$10$IYe5XGZGEyu1qyWJzNebfezIsYLEEsqG/u92U/I1ZxLne.7dlPFnq', 'sharronbooks2022@gmail.com', 101256039, 'Paige', 'Turner', '0', '0'),
('bookfan1992', '$2y$10$9SrJMUuCuKgFFOmdfY9So.8ucOUmCXQDYFkeoUvIVwAMAqAc5RcN.', 'mdown123@uga.edu', 101256040, 'Mark', 'Down', '0', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrators`
--
ALTER TABLE `administrators`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- Indexes for table `bookreserve`
--
ALTER TABLE `bookreserve`
  ADD PRIMARY KEY (`BookID`,`UserID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`BookID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `Username` (`Username`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrators`
--
ALTER TABLE `administrators`
  MODIFY `UserID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10125606;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101256041;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookreserve`
--
ALTER TABLE `bookreserve`
  ADD CONSTRAINT `bookreserve_ibfk_1` FOREIGN KEY (`BookID`) REFERENCES `books` (`BookID`),
  ADD CONSTRAINT `bookreserve_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
