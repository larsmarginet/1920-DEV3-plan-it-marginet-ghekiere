-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Gegenereerd op: 28 nov 2019 om 19:42
-- Serverversie: 5.7.23
-- PHP-versie: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `planit`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `activities`
--

CREATE TABLE `activities` (
  `id` int(11) NOT NULL,
  `title` varchar(140) NOT NULL,
  `description` text NOT NULL,
  `duration` time NOT NULL,
  `youtube` varchar(255) NOT NULL,
  `workout_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `activities`
--

INSERT INTO `activities` (`id`, `title`, `description`, `duration`, `youtube`, `workout_id`) VALUES
(1, 'Plank met afwisselende leg lifts', '', '00:01:00', '', 5),
(2, 'High Plank', '', '00:01:00', '', 5),
(3, 'Zijwaartse plank met knee drives (linkerzijde)', '', '00:00:30', '', 5),
(4, 'Zijwaartse plank met knee drives (rechterzijde)', '', '00:00:30', '', 5),
(5, 'Plank Saws', '', '00:00:30', '', 5),
(6, 'Plank wraps (linkerzijde)', '', '00:00:30', '', 5),
(7, 'Plank wraps (rechterzijde)', '', '00:00:30', '', 5),
(8, 'High Plank', '', '00:00:30', '', 5),
(9, 'Snelle squats richting bank', '', '00:00:30', '', 6),
(10, 'Roei beweging met één arm', '', '00:01:00', '', 6),
(11, 'Chest press met dead bugs ', '', '00:00:50', '', 6),
(12, 'Hip extension met knee tuck', '', '00:00:30', '', 6),
(13, 'Reverse fly\'s', '', '00:01:00', '', 6),
(14, 'Dips op bank', '', '00:00:30', '', 6),
(15, 'Bicep curl naar overhead press', '', '00:00:50', '', 6),
(16, 'Hamstring stretch, liggend', '', '00:00:15', '', 6),
(17, 'Geknielde hip en chest stretch', '', '00:00:20', '', 6),
(18, 'Airplanes (linkerbeen)', '', '00:00:30', '', 7),
(19, 'Airplanes (rechterbeen)', '', '00:00:30', '', 7),
(20, 'Deadlift met dumbbells', '', '00:00:50', '', 7),
(21, 'Zijwaartse lunges met dumbbells', '', '00:00:50', '', 7),
(22, 'Crossback Lunges', '', '00:00:50', '', 7),
(23, 'Split Jumps', '', '00:00:30', '', 7),
(24, 'Hip cradles', '', '00:00:30', '', 7),
(25, 'Zijwaartse duck walk', '', '00:01:00', '', 7),
(26, 'Hip Burner (linkerbeen)', '', '00:00:30', '', 7),
(27, 'Hip Burner (rechterbeen)', '', '00:00:30', '', 7),
(28, 'Hip lift march', '', '00:00:30', '', 7),
(29, 'Schoulder gators', '', '00:00:30', '', 1),
(30, 'Dynamische borst stretch', '', '00:00:20', '', 1),
(31, 'Hurdle steps', '', '00:00:40', '', 1),
(33, 'Runner touches (linkerbeen)', '', '00:00:40', '', 1),
(34, 'Runner touches (rechterbeen)', '', '00:00:40', '', 1),
(35, 'Zijwaartse hip openers', '', '00:00:30', '', 1),
(36, 'Knee hugs', '', '00:00:20', '', 1),
(37, 'Tin soldiers', '', '00:00:40', '', 1),
(38, 'Achterwaartse lunge reaches', '', '00:00:40', '', 1),
(39, 'Wall Sit', '', '00:00:40', '', 2),
(40, 'Zijwaartse hip openers', '', '00:00:30', '', 2),
(41, 'Shoulder Gators', '', '00:00:20', '', 2),
(42, 'Dynamische borst stretch', '', '00:00:30', '', 2),
(43, 'Down dog', '', '00:00:15', '', 2),
(44, 'Up dog', '', '00:00:15', '', 2),
(45, 'Butterfly stretch', '', '00:00:30', '', 2),
(46, 'Hip twister', '', '00:00:30', '', 2),
(47, 'Hip lifts', '', '00:00:20', '', 2),
(48, 'Leg raises met één been (linkerzijde)', '', '00:00:30', '', 2),
(49, 'Leg raises met één been (rechterzijde)', '', '00:00:30', '', 2),
(50, 'Onderrug stretch (linkerzijde)', '', '00:00:40', '', 2),
(51, 'Onderrug stretch (rechterzijde)', '', '00:00:40', '', 2),
(52, 'Cat cow', '', '00:00:40', '', 2),
(53, 'Quad stretch geknield (rechterzijde)', '', '00:00:30', '', 2),
(54, 'Quad stretch geknield (linkerzijde)', '', '00:00:30', '', 2),
(55, 'Push-ups', '', '00:00:20', '', 3),
(56, 'Burpees', '', '00:00:20', '', 3),
(57, 'Squat Jumps', '', '00:00:20', '', 3),
(58, 'Pull-ups', '', '00:00:30', '', 3),
(59, 'T Push-ups', '', '00:00:30', '', 3),
(60, 'Kindhouding', '', '00:00:20', '', 4),
(61, 'Kat-koe', '', '00:00:20', '', 4),
(62, 'Neerwaartse hond (trapbeweging)', '', '00:00:20', '', 4),
(63, 'Hoge plank', '', '00:00:20', '', 4),
(64, 'Opwaartse hond', '', '00:00:20', '', 4),
(65, 'Neerwaartse hond één been linkerzijde', '', '00:00:20', '', 4),
(66, 'Neerwaartse hond één been rechterzijde', '', '00:00:30', '', 4),
(67, 'rtjtr', 'rthtrh', '00:02:30', '', 9),
(68, 'rtjtr', 'rthtrh', '00:02:30', '', 9),
(71, 'Loopband', 'Loop op je gemak op de loopband', '00:05:00', 'Y0c2moLhfKw?start=28', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `workout`
--

CREATE TABLE `workout` (
  `id` int(11) NOT NULL,
  `title` varchar(140) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `workout`
--

INSERT INTO `workout` (`id`, `title`) VALUES
(1, 'conditie'),
(2, 'flexibiliteit'),
(3, 'kracht'),
(4, 'yoga'),
(5, 'buik en core'),
(6, 'armen en schouders'),
(7, 'billen en benen'),
(8, 'Shoulders'),
(9, 'jfj');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `workout`
--
ALTER TABLE `workout`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT voor een tabel `workout`
--
ALTER TABLE `workout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
