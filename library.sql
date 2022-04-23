-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2022 at 01:14 PM
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
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `book_id` int(7) NOT NULL,
  `book_title` varchar(63) NOT NULL,
  `category_id` varchar(11) NOT NULL,
  `author` text NOT NULL,
  `book_copies` int(11) NOT NULL,
  `book_pub` varchar(30) NOT NULL,
  `publisher_name` varchar(55) NOT NULL,
  `isbn` varchar(17) NOT NULL,
  `copyright_year` year(4) NOT NULL,
  `date_receive` date NOT NULL,
  `date_added` datetime NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `book_title`, `category_id`, `author`, `book_copies`, `book_pub`, `publisher_name`, `isbn`, `copyright_year`, `date_receive`, `date_added`, `status`) VALUES
(15, 'Natural Resources', '8', 'Robin Kerrod', 15, 'Marshall Cavendish Corporation', 'Marshall', '1-85435-628-3', 2022, '2013-01-04', '2013-12-11 06:34:00', 'New'),
(16, 'Encyclopedia Americana', '5', 'Grolier', 20, 'Connecticut', 'Grolier Incorporation', '0-7172-0119-8', 1988, '2011-09-30', '2013-12-11 06:36:00', 'Archive'),
(17, 'Algebra 1', '3', 'Carolyn Bradshaw, Michael Seals', 35, 'Pearson Education, Inc', 'Prentice Hall, New Jersey', '0-13-125087-6', 2004, '2013-04-04', '2013-12-11 06:39:00', 'Damage'),
(18, 'The Philippine Daily Inquirer', '7', 'Rudyard Arbolado', 3, 'Pasay City', 'Raul Pangalanan', '9789718935002', 2013, '2013-04-14', '2013-12-11 06:41:00', 'New'),
(19, 'Science in our World', '4', 'Brian Knapp', 25, 'Regency Publishing Group', 'Prentice Hall, Inc', '0-13-050841-1', 1996, '2013-03-12', '2013-12-11 06:44:00', 'Lost'),
(20, 'Literature', '9', 'Greg Glowka', 20, 'Regency Publishing Group', 'Prentice Hall, Inc', '0-13-050841-1', 2001, '2013-01-02', '2013-12-11 06:47:00', 'Old'),
(21, 'Lexicon Universal Encyclopedia', '5', 'Lexicon', 10, 'Lexicon Publication', 'Pulication Inc., Lexicon', '0-7172-2043-5', 1993, '2013-06-20', '2013-12-11 06:49:00', 'Old'),
(22, 'Science and Invention Encyclopedia', '5', 'Clarke Donald, Dartford Mark', 16, 'H.S. Stuttman inc. Publishing', 'Publisher , Westport Connecticut', '0-87475-450-x', 1992, '2013-10-08', '2013-12-11 06:52:00', 'New'),
(23, 'Integrated Science Textbook ', '4', 'Merde C. Tan', 15, 'Vibal Publishing House Inc.', '12536. Araneta Avenue Corner Ma. Clara St., Quezon City', '971-570-124-8', 2009, '2013-09-14', '2013-12-11 06:55:00', 'New'),
(24, 'Algebra 2', '3', 'Glencoe McGraw Hill', 15, 'The McGrawHill Companies Inc.', 'McGrawhill', '978-0-07-873830-2', 2008, '2013-11-10', '2013-12-11 06:57:00', 'New'),
(25, 'Wiki at Panitikan ', '7', 'Lorenza P. Avera', 28, 'JGM & S Corporation', 'JGM & S Corporation', '971-07-1574-7', 2000, '2013-10-20', '2013-12-11 06:59:00', 'Damage'),
(26, 'English Expressways TextBook for 4th year', '9', 'Virginia Bermudez Ed. O. et al', 23, 'SD Publications, Inc.', 'Gregorio Araneta Avenue, Quezon City', '978-971-0315-33-8', 2007, '2013-08-10', '2013-12-11 07:01:00', 'New'),
(27, 'Asya Pag-usbong Ng Kabihasnan ', '8', 'Ricardo T. Jose, Ph . D.', 21, 'Vibal Publishing House Inc.', 'Araneta Avenue . Cor. Maria Clara St., Quezon City', '971-07-2324-3', 2008, '2013-11-05', '2013-12-11 07:02:00', 'New'),
(28, 'Literature (the readers choice)', '9', 'Glencoe McGraw Hill', 20, 'McGraw-Hill/Glencoe', 'the McGrawHill Companies Inc', '0-02-817934-x', 2001, '2013-03-15', '2013-12-11 07:05:00', 'Damage'),
(29, 'Beloved a Novel', '9', 'Toni Morrison', 13, 'Alfred A. Knopf Inc', 'Alfred A. Knoff, Inc', '0-394-53597-9', 1987, '2013-09-19', '2013-12-11 07:07:00', 'Old'),
(30, 'Silver Burdett Engish', '2', 'Judy Brim', 12, 'Silver Burdett Company', 'Silver', '0-382-03575-5', 1985, '2013-10-31', '2013-12-11 09:22:00', 'Old'),
(31, 'The Corporate Warriors (Six Classic Cases in American Business)', '8', 'Douglas K. Ramsey', 8, 'Houghton Miffin Company', 'HarperCollins', '0-395-35487-0', 1987, '2018-03-03', '2013-12-11 09:25:00', 'Old'),
(32, 'Introduction to Information System', '9', 'Cristine Redoblo', 10, 'CHMSC', 'Brian INC', '123-132', 2013, '2014-01-09', '2014-01-17 19:00:00', 'New');

-- --------------------------------------------------------

--
-- Table structure for table `borrow`
--

CREATE TABLE `borrow` (
  `borrow_id` int(9) NOT NULL,
  `member_id` int(9) NOT NULL,
  `date_borrow` datetime NOT NULL,
  `due_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `borrow`
--

INSERT INTO `borrow` (`borrow_id`, `member_id`, `date_borrow`, `due_date`) VALUES
(482, 52, '2021-03-17 06:28:15', '2021-03-31'),
(483, 55, '2014-03-15 19:50:51', '2014-03-31'),
(484, 55, '2021-04-23 12:14:13', '2021-05-07');

-- --------------------------------------------------------

--
-- Table structure for table `borrowdetails`
--

CREATE TABLE `borrowdetails` (
  `borrow_details_id` int(17) NOT NULL,
  `book_id` int(7) NOT NULL,
  `borrow_id` int(9) NOT NULL,
  `borrow_status` text NOT NULL,
  `date_return` varchar(19) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `borrowdetails`
--

INSERT INTO `borrowdetails` (`borrow_details_id`, `book_id`, `borrow_id`, `borrow_status`, `date_return`) VALUES
(162, 15, 482, 'pending', ''),
(163, 15, 483, 'returned', '2014-03-21 00:30:51'),
(164, 16, 484, 'pending', '');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` varchar(11) NOT NULL,
  `classname` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `classname`) VALUES
('1', 'Periodical'),
('2', 'English'),
('3', 'Math'),
('4', 'Science'),
('5', 'Encyclopedia'),
('6', 'Filipiniana'),
('7', 'Newspaper'),
('8', 'General'),
('9', 'References');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_id` int(9) NOT NULL,
  `firstname` varchar(12) NOT NULL,
  `lastname` varchar(9) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `address` varchar(13) NOT NULL,
  `contact` int(8) NOT NULL,
  `type_id` int(2) NOT NULL,
  `year_level` varchar(11) NOT NULL,
  `status` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `firstname`, `lastname`, `gender`, `address`, `contact`, `type_id`, `year_level`, `status`) VALUES
(52, 'Mark', 'Sanchez', 'Male', 'Talisay', 212010, 2, 'Faculty', 'Active'),
(53, 'April Joy', 'Aguilar', 'Female', 'E.B. Magalona', 23712330, 22, 'Second year', 'Banned'),
(54, 'Alfonso', 'Pancho', 'Male', 'E.B. Magalona', 66637130, 22, 'First Year', 'Active'),
(55, 'Jonathan ', 'Antanilla', 'Male', 'E.B. Magalona', 99408517, 22, 'Fourth Year', 'Active'),
(56, 'Renzo Bryan', 'Pedroso', 'Male', 'Silay City', 97273703, 22, 'Third Year', 'Active'),
(57, 'Eleazar', 'Duterte', 'Male', 'E.B. Magalona', 31529712, 22, 'Second Year', 'Active'),
(58, 'Ellen Mae', 'Espino', 'Female', 'E.B. Magalona', 40841267, 22, 'First Year', 'Active'),
(59, 'Ruth', 'Magbanua', 'Female', 'E.B. Magalona', 25384659, 22, 'Second Year', 'Active'),
(60, 'Shaina Marie', 'Gabino', 'Female', 'Silay City', 28496109, 22, 'Second Year', 'Active'),
(61, 'Chairty Joy', 'Punzalan', 'Female', 'E.B. Magalona', 45848857, 2, 'Faculty', 'Active'),
(62, 'Kristine May', 'Dela Rosa', 'Female', 'Silay City', 18111118, 22, 'Second Year', 'Active'),
(63, 'Chinie marie', 'Laborosa', 'Female', 'E.B. Magalona', 18883331, 22, 'Second Year', 'Active'),
(64, 'Ruby', 'Morante', 'Female', 'E.B. Magalona', 18008001, 2, 'Faculty', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `type_id` int(2) NOT NULL,
  `borrowertype` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`type_id`, `borrowertype`) VALUES
(2, 'Teacher'),
(20, 'Employee'),
(21, 'Non-Teaching'),
(22, 'Student'),
(32, 'Contruction');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(7) NOT NULL,
  `username` varchar(8) DEFAULT NULL,
  `password` varchar(8) DEFAULT NULL,
  `firstname` varchar(9) DEFAULT NULL,
  `lastname` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `firstname`, `lastname`) VALUES
(2, 'admin', 'admin', 'john', 'smith');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `borrow`
--
ALTER TABLE `borrow`
  ADD PRIMARY KEY (`borrow_id`),
  ADD KEY `borrow_fk1` (`member_id`);

--
-- Indexes for table `borrowdetails`
--
ALTER TABLE `borrowdetails`
  ADD PRIMARY KEY (`borrow_details_id`),
  ADD KEY `book_id` (`book_id`),
  ADD KEY `borrow_id` (`borrow_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`),
  ADD KEY `typeid_fk1` (`type_id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `member`
--
ALTER TABLE `member`
  ADD CONSTRAINT `typeid_fk1` FOREIGN KEY (`type_id`) REFERENCES `type` (`type_id`) ON DELETE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
