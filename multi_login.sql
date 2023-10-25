-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2022 at 11:37 AM
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
-- Database: `multi_login`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_id` varchar(255) NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `pub_date` date NOT NULL,
  `date_added` date NOT NULL DEFAULT current_timestamp(),
  `category` varchar(255) NOT NULL,
  `counts` int(255) NOT NULL,
  `price` int(255) NOT NULL,
  `status` varchar(100) NOT NULL,
  `username` varchar(255) NOT NULL,
  `author` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `book_name`, `pub_date`, `date_added`, `category`, `counts`, `price`, `status`, `username`, `author`) VALUES
('Am24Jun2001Nov0012', 'American Gods', '2001-06-19', '2022-11-24', 'Novel', 12, 100, 'Available', '', 'Neil Gaiman'),
('Ap24Jun2005Rom0005', 'April Lady', '2005-06-02', '2022-11-24', 'Romance', 5, 300, 'Available', '', 'Georgette Heyer'),
('Co24Jul2002Hor0011', 'Coraline', '2002-07-02', '2022-11-24', 'Horror', 11, 254, 'Available', '', 'Neil Gaiman'),
('Da24May2009Thr0044', 'Dark Places', '2009-05-05', '2022-11-24', 'Thriller', 44, 390, 'Available', '', 'Gillian Flynn'),
('Dr24Apr2006Sel0037', 'Dream Lover -- Until Then', '2006-04-01', '2022-11-24', 'Self-help', 37, 330, 'Available', '', 'Robert Greene'),
('Fa24Mar2001Fic0028', 'Fantastic Beasts and Where to Find Them', '2001-03-11', '2022-11-24', 'Fiction', 28, 520, 'Available', '', 'J. K. Rowling'),
('Fl24Dec1838Fic0046', 'Florante at Laura', '1838-12-25', '2022-11-24', 'Fiction', 46, 2000, 'Available', '', 'Francisco Balagtas'),
('Go24Jun2012Thr0042', 'Gone Girl', '2012-06-24', '2022-11-24', 'Thriller', 42, 180, 'Available', '', 'Gillian Flynn'),
('Go24May1990Sci0013', 'Good Omens', '1990-05-31', '2022-11-24', 'Science Fiction', 13, 350, 'Available', '', 'Neil Gaiman'),
('Ha24Jun2003Sci0026', 'Harry Potter and the Order of the Phoenix', '2003-06-21', '2022-11-24', 'Science Fiction', 26, 500, 'Available', '', 'J. K. Rowling'),
('Ha24Jun2016Non0025', 'Harry Potter and the Cursed Child', '2016-06-30', '2022-11-24', 'Non-Fiction', 25, 250, 'Available', '', 'J. K. Rowling'),
('He24Jul2019Nov0021', 'Heartstopper 1', '2019-07-02', '2022-11-24', 'Novel', 21, 290, 'Available', '', 'Alice Oseman'),
('Ho24Feb1996Com0039', 'Hogfather', '1996-02-14', '2022-11-24', 'Comedy', 39, 350, 'Available', '', 'Terry Pratchett'),
('Ho24Feb2006Non0020', 'How To Talk To Girls At Parties', '2006-02-02', '2022-11-24', 'Non-Fiction', 20, 260, 'Available', '', 'Neil Gaiman'),
('Hu04Nov2022Sci0003', 'Hunger Games', '2015-02-02', '2022-11-04', 'Science Fiction', 3, 350, 'Available', '', 'Suzanne Collins'),
('IT24Sep1986Hor0047', 'IT', '1986-09-15', '2022-11-24', 'Horror', 47, 550, 'Available', '', 'Stephen King'),
('Lo24Jun2020Fic0024', 'Loveless', '2020-06-09', '2022-11-24', 'Fiction', 24, 420, 'Available', '', 'Alice Oseman'),
('Ma24Nov2012Sel0032', 'Mastery', '2012-11-13', '2022-11-24', 'Self-help', 32, 280, 'Available', '', 'Robert Greene'),
('Mi24Jun1987Thr0050', 'Misery', '1987-06-08', '2022-11-24', 'Thriller', 50, 950, 'Available', '', 'Stephen King'),
('Mo04Nov2022Sci0001', 'Mockingjay', '2010-07-24', '2022-11-04', 'Science Fiction', 1, 360, 'Available', '', 'Suzanne Collins'),
('Ne24Dec1996Nov0017', 'Neverwhere', '1996-12-09', '2022-11-24', 'Novel', 17, 280, 'Available', '', 'Neil Gaiman'),
('Ni24Dec2015Rom0022', 'Nick and Charlie (A Heartstopper Novella)', '2015-12-06', '2022-11-24', 'Romance', 22, 360, 'Available', '', 'Alice Oseman'),
('Ni24Jan2002Com0041', 'Night Watch', '2002-01-11', '2022-11-24', 'Comedy', 41, 270, 'Available', '', 'Terry Pratchett'),
('No24Feb2017Fic0010', 'Norse Mythology', '2017-02-07', '2022-11-24', 'Fiction', 10, 250, 'Available', '', 'Neil Gaiman'),
('No24Jul2017Non0016', 'Norse Mythology', '2017-07-02', '2022-11-24', 'Non-Fiction', 16, 250, 'Available', '', 'Neil Gaiman'),
('Oc24Oct1995Fic0008', 'October Moon', '1995-10-05', '2022-11-24', 'Fiction', 8, 190, 'Available', '', 'Michael Scott Rohan'),
('Ou24Dec1991Nov0004', 'Outlander', '1991-12-01', '2022-11-10', 'Novel', 4, 370, 'Available', '', 'Diana Gabaldon'),
('Qu24Mar2001Fic0027', 'Quidditch Through the Ages', '2001-03-21', '2022-11-24', 'Fiction', 27, 350, 'Available', '', 'J. K. Rowling'),
('Sa24Mar2002Nov0009', 'Saturday Night and Sunday Morning', '2002-03-02', '2022-11-24', 'Novel', 9, 210, 'Available', '', 'Alan Sillitoe'),
('Sh24Sep2006Thr0043', 'Sharp Objects', '2006-09-26', '2022-11-24', 'Thriller', 43, 290, 'Available', '', 'Gillian Flynn'),
('So24Mar2014Rom0023', 'Solitaire', '2014-03-25', '2022-11-24', 'Romance', 23, 340, 'Available', '', 'Alice Oseman'),
('St24Mar1997Nov0014', 'Stardust', '1997-03-12', '2022-11-24', 'Novel', 14, 450, 'Available', '', 'Neil Gaiman'),
('Th24Apr1978Nov0048', 'The Stand', '1978-04-18', '2022-11-24', 'Novel', 48, 650, 'Available', '', 'Stephen King'),
('Th24Apr2001Sel0030', 'The Art of Seduction', '2001-04-15', '2022-11-24', 'Self-help', 30, 250, 'Available', '', 'Robert Greene'),
('Th24Aug2004Non0006', 'The Guns of August', '2004-08-03', '2022-11-24', 'Non-Fiction', 6, 200, 'Available', '', 'Barbara W. Tuchman'),
('Th24Dec1989Non0018', 'The Sandman Vol. 1: Preludes & Nocturnes', '1989-12-01', '2022-11-24', 'Non-Fiction', 18, 290, 'Available', '', 'Neil Gaiman'),
('Th24Dec1998Sel0029', 'The 48 Laws of Power', '1998-12-03', '2022-11-24', 'Self-help', 29, 250, 'Available', '', 'Robert Greene'),
('Th24Dec1999Sel0035', 'The Concise 48 Laws of Power', '1999-12-06', '2022-11-24', 'Self-help', 35, 320, 'Available', '', 'Robert Greene'),
('Th24Dec2013Nov0019', 'The Ocean at the End of the Lane', '2013-12-06', '2022-11-24', 'Novel', 19, 320, 'Available', '', 'Neil Gaiman'),
('Th24Dec2014Sel0036', 'The Concise Mastery', '2014-12-04', '2022-11-24', 'Self-help', 36, 310, 'Available', '', 'Robert Greene'),
('Th24Feb2006Psy0002', 'The Happiness Hypothesis', '2006-02-15', '2022-11-04', 'Psychological', 2, 200, 'Available', '', 'Jonathan Haidt\r\n'),
('Th24Jan1977Thr0049', 'The Shining', '1977-01-28', '2022-11-24', 'Thriller', 49, 1010, 'Available', '', 'Stephen King'),
('Th24Jan2006Sel0033', 'The 33 Strategies of War', '2006-01-17', '2022-11-24', 'Self-help', 33, 290, 'Available', '', 'Robert Greene'),
('Th24Mar2008Nov0015', 'The Graveyard Book', '2008-03-09', '2022-11-24', 'Novel', 15, 300, 'Available', '', 'Neil Gaiman'),
('Th24May2002Nov0007', 'Three Junes', '2002-05-07', '2022-11-24', 'Novel', 7, 110, 'Available', '', 'Julia Glass'),
('Th24Nov1983Com0038', 'The Colour of Magic', '1983-11-24', '2022-11-24', 'Comedy', 38, 260, 'Available', '', 'Terry Pratchett'),
('Th24Nov2015Thr0045', 'The Grownup', '2015-11-03', '2022-11-24', 'Thriller', 45, 10000, 'Available', '', 'Gillian Flynn'),
('Th24Oct2009Sel0034', 'The 50th Law', '2009-10-08', '2022-11-24', 'Self-help', 34, 350, 'Available', '', 'Robert Greene'),
('Th24Oct2018Sel0031', 'The Laws of Human Nature', '2018-10-16', '2022-11-24', 'Self-help', 31, 260, 'Available', '', 'Robert Greene'),
('Wy24Nov1988Com0040', 'Wyrd Sisters', '1988-11-10', '2022-11-24', 'Comedy', 40, 310, 'Available', '', 'Terry Pratchett');

-- --------------------------------------------------------

--
-- Table structure for table `borrow`
--

CREATE TABLE `borrow` (
  `id` int(11) NOT NULL,
  `borrower` varchar(255) NOT NULL,
  `brw_book` varchar(255) NOT NULL,
  `date_brw` date NOT NULL,
  `brw_due` date NOT NULL,
  `fine` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `user_type` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `user_type`, `password`, `fname`, `lname`, `image`) VALUES
(24, 'admin', 'adminlibrary@gmail.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admin', '66409d98cdee7f4d65451155b3cdc9d9.jpg'),
(25, 'new', 'newuser@gmail.com', 'user', '22af645d1859cb5ca6da0c484f1f37ea', 'new', 'new', 'user_profile.png'),
(26, 'joserizal', 'joserizal@gmail.com', 'user', 'ed6b202e937c3e83cfc9f9ea1aedbe0e', 'jose', 'rizal', ''),
(30, 'test', 'testuser@gmail.com', 'user', '098f6bcd4621d373cade4e832627b4f6', 'test', 'test', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `borrow`
--
ALTER TABLE `borrow`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `borrow`
--
ALTER TABLE `borrow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
