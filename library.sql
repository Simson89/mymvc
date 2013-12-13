-- phpMyAdmin SQL Dump
-- version 3.5.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Czas wygenerowania: 13 Gru 2013, 19:12
-- Wersja serwera: 5.5.28
-- Wersja PHP: 5.3.18

SET AUTOCOMMIT=0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza danych: `library`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `login` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) TYPE=InnoDB  AUTO_INCREMENT=2 ;

--
-- Zrzut danych tabeli `admin`
--

INSERT INTO `admin` (`id`, `login`, `password`, `email`) VALUES
(1, 'simson', '1373e693d5b3b77dd21faa477fe5152b', 'admin@mail.com');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `authors`
--

CREATE TABLE IF NOT EXISTS `authors` (
  `author_id` int(111) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(55) NOT NULL,
  `last_name` varchar(128) NOT NULL,
  PRIMARY KEY (`author_id`)
) TYPE=InnoDB  AUTO_INCREMENT=3 ;

--
-- Zrzut danych tabeli `authors`
--

INSERT INTO `authors` (`author_id`, `first_name`, `last_name`) VALUES
(1, 'Jan', 'Nowak'),
(2, 'Paweł', 'Skóra');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `authorships`
--

CREATE TABLE IF NOT EXISTS `authorships` (
  `authorship_id` int(111) NOT NULL AUTO_INCREMENT,
  `book_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  PRIMARY KEY (`authorship_id`)
) TYPE=InnoDB  AUTO_INCREMENT=4 ;

--
-- Zrzut danych tabeli `authorships`
--

INSERT INTO `authorships` (`authorship_id`, `book_id`, `author_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 1, 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `book_id` int(111) NOT NULL AUTO_INCREMENT,
  `title` varchar(512) NOT NULL,
  `description` text NOT NULL,
  `borrowed` tinyint(1) NOT NULL,
  PRIMARY KEY (`book_id`)
) TYPE=InnoDB  AUTO_INCREMENT=4 ;

--
-- Zrzut danych tabeli `books`
--

INSERT INTO `books` (`book_id`, `title`, `description`, `borrowed`) VALUES
(1, 'Książka', 'kPierwsza książka', 1),
(2, 'Ksiazka2', 'Ksiazka numero duo bijacz@!', 1),
(3, 'Tańczący z wilkami', 'EEee', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `borrowings`
--

CREATE TABLE IF NOT EXISTS `borrowings` (
  `borrowing_id` int(111) NOT NULL AUTO_INCREMENT,
  `book_id` int(111) NOT NULL,
  `user_id` int(111) NOT NULL,
  `borrow_date` date NOT NULL,
  `return_date` date NOT NULL,
  PRIMARY KEY (`borrowing_id`)
) TYPE=InnoDB  AUTO_INCREMENT=11 ;

--
-- Zrzut danych tabeli `borrowings`
--

INSERT INTO `borrowings` (`borrowing_id`, `book_id`, `user_id`, `borrow_date`, `return_date`) VALUES
(1, 1, 1, '2013-11-27', '2013-12-27'),
(2, 2, 1, '2013-11-27', '1970-02-01'),
(3, 1, 1, '2013-11-27', '1970-02-01'),
(4, 1, 1, '2013-11-27', '1970-02-01'),
(5, 1, 1, '2013-11-27', '1970-02-01'),
(6, 1, 1, '2013-12-12', '1970-02-01'),
(7, 1, 1, '2013-12-12', '1970-02-01'),
(8, 1, 1, '2013-12-12', '1970-02-01'),
(9, 1, 1, '2013-12-12', '1970-02-01'),
(10, 1, 1, '2013-12-12', '1970-02-01');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `notes`
--

CREATE TABLE IF NOT EXISTS `notes` (
  `note_id` int(11) NOT NULL AUTO_INCREMENT,
  `note` text,
  PRIMARY KEY (`note_id`)
) TYPE=InnoDB  AUTO_INCREMENT=3 ;

--
-- Zrzut danych tabeli `notes`
--

INSERT INTO `notes` (`note_id`, `note`) VALUES
(1, 'Zloooo'),
(2, 'Mrook');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (`user_id`)
) TYPE=InnoDB  AUTO_INCREMENT=4 ;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`user_id`, `login`, `password`) VALUES
(1, 'lukasz', 'd7559b8c502dea1b5323af444e81e014'),
(3, 'lukasz1', 'c109c5d9b901d678336e440e14e3f21d');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
