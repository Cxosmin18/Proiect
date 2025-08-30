-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1
-- Timp de generare: aug. 30, 2025 la 06:53 PM
-- Versiune server: 10.4.32-MariaDB
-- Versiune PHP: 8.2.12

-- Acest fisier poate fi folosit pentru a importa baza de date pe alt server.

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `restaurant`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `mesaje_contact`
--

CREATE TABLE `mesaje_contact` (
  `id` int(11) NOT NULL,
  `nume` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subiect` varchar(150) NOT NULL,
  `mesaj` text NOT NULL,
  `data_trimitere` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Eliminarea datelor din tabel `mesaje_contact`
--

INSERT INTO `mesaje_contact` (`id`, `nume`, `email`, `subiect`, `mesaj`, `data_trimitere`) VALUES
(1, 'Cosmin', 'c123@yahoo.com', 'Bun', 'Foarte bun si rapid.', '2025-06-24 19:04:18'),
(2, 'Adina', 'adina.321@outlook.com', '10/10', 'Recomand restaurantul Monte Carlo, mancare buna la pret bun.', '2025-06-24 19:05:52'),
(3, 'Constantin', 'con321stan123tin@gmail.com', 'Se putea mai mult', 'Ma asteptam la ospatari prietenosi in rest mancarea foarte buna, poate putin pare sarat dar foarte bun recomand.', '2025-06-24 19:08:28'),
(4, 'Sofia', 'sophii@gmail.com', 'Gustos', 'Pret bun, mancare destula si delicioasa, mai venim! :)', '2025-06-24 19:11:00');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `programari`
--

CREATE TABLE `programari` (
  `id` int(11) NOT NULL,
  `masa` int(11) NOT NULL,
  `data_programare` date NOT NULL,
  `ora_programare` time NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'ocupat'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Eliminarea datelor din tabel `programari`
--

INSERT INTO `programari` (`id`, `masa`, `data_programare`, `ora_programare`, `status`) VALUES
(1, 3, '2025-06-25', '21:00:00', 'ocupat'),
(4, 2, '2025-06-26', '18:00:00', 'ocupat'),
(6, 10, '2025-06-27', '01:10:00', 'ocupat'),
(7, 1, '2025-07-09', '22:00:00', 'ocupat'),
(8, 6, '2025-06-29', '13:00:00', 'ocupat');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `utilizatori`
--

CREATE TABLE `utilizatori` (
  `id` int(11) NOT NULL,
  `nume` varchar(50) NOT NULL,
  `parola` varchar(100) NOT NULL,
  `ultima_autentificare` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Eliminarea datelor din tabel `utilizatori`
--

INSERT INTO `utilizatori` (`id`, `nume`, `parola`, `ultima_autentificare`) VALUES
(1, 'admin', 'admin123', '2025-06-25 22:52:38'),
(2, 'Cosmin', 'cosmin123', '2025-08-30 19:40:16');

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `mesaje_contact`
--
ALTER TABLE `mesaje_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `programari`
--
ALTER TABLE `programari`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unq_masa_data_ora` (`masa`,`data_programare`,`ora_programare`);

--
-- Indexuri pentru tabele `utilizatori`
--
ALTER TABLE `utilizatori`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `mesaje_contact`
--
ALTER TABLE `mesaje_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pentru tabele `programari`
--
ALTER TABLE `programari`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pentru tabele `utilizatori`
--
ALTER TABLE `utilizatori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
