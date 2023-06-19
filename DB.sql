CREATE DATABASE IF NOT EXISTS `DB`;
USE `DB`;
  
CREATE TABLE IF NOT EXISTS `users` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_polish_ci NOT NULL,
  `haslo` varchar(255) COLLATE utf8mb4_polish_ci NOT NULL,
  PRIMARY KEY (`Id`),
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

INSERT INTO `users` (`Id`, `email`, `haslo`) VALUES
(1, '1@gmail.com', '$2a$12$lx14D/wilpdD9ffnbM3OJ.Cj7tP43i/p7SBI7nrLFgAq71P/KgAzS');

CREATE TABLE IF NOT EXISTS `posts` (
  `post_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tytul` varchar(255) COLLATE utf8mb4_polish_ci NOT NULL,
  `tresc` text COLLATE utf8mb4_polish_ci NOT NULL,
  `data_postu` date NOT NULL,
  PRIMARY KEY (`post_id`),
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

CREATE TABLE IF NOT EXISTS `wiadomosci` (
  `wiadomosc_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_polish_ci NOT NULL,
  `nr_telefonu` char(15) COLLATE utf8mb4_polish_ci NOT NULL,
  `wiadomosc` text COLLATE utf8mb4_polish_ci NOT NULL,
  `data_wiadomosci` date NOT NULL,
  PRIMARY KEY (`wiadomosc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;







email          haslo
1@gmail.com    1234
2@gmail.com    1111