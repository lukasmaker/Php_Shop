-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 10 Mar 2023, 15:40
-- Wersja serwera: 10.4.21-MariaDB
-- Wersja PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `sklep`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `languages`
--

CREATE TABLE `languages` (
  `id` int(10) NOT NULL,
  `key_id` varchar(20) DEFAULT NULL,
  `en` mediumtext DEFAULT NULL,
  `pl` mediumtext DEFAULT NULL,
  `de` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `languages`
--

INSERT INTO `languages` (`id`, `key_id`, `en`, `pl`, `de`) VALUES
(1, 'notFoundMsg', 'Not Found', 'Nie znaleziono', 'Nicht gefunden'),
(2, 'loginMsg', 'Login', 'Zaloguj się', 'Anmldung'),
(3, 'registerMsg', 'Register', 'Zarejestruj sie', 'Registrier'),
(4, 'logout', 'Logout', 'Wyloguj', 'Abmelden'),
(5, 'edit', 'Edit', 'Edytuj', 'Bearbeitung'),
(6, 'delete', 'Delete', 'Usuń', 'Löschen'),
(7, 'user', 'User', 'Użytkownik', 'Benutzer'),
(8, 'login', 'Username', 'Nazwa użytkownika', 'Benutzername'),
(9, 'password', 'Password', 'Hasło', 'Passwort'),
(10, 'name', 'Name', 'Imie', 'Vorname'),
(11, 'lname', 'Last name', 'Nazwisko', 'Name'),
(12, 'role', 'Role', 'Rola', 'Rolle'),
(13, 'age', 'Age', 'Wiek', 'Alter'),
(14, 'isAdmin', 'Is it admin?', 'Czy to admin?', 'Ist es Admin?'),
(15, 'pageForLoggedMsg', 'Page for logged in', 'Strona dla zalogowanych', 'Seite für eingeloggt'),
(16, 'saveChangeMsg', 'Save changes', 'Zapisz zmiany', 'Änderungen speichern'),
(17, 'exit_index', 'Return to main page', 'Powrót do strony głównej', 'Zurück zur Hauptseite'),
(18, 'exit_adminPage', 'Return to admin panel', 'Powrót do admin panelu', 'Zurück zur Admin-Panel'),
(19, 'editMsg', 'Editing data of user', 'Edycja danych użytkownika', 'Benutzerdaten bearbeiten'),
(20, 'done', 'The account has been created' , 'Konto zostało założone', 'Das Konto wurde erstellt'),
(21, 'done2', 'The changes have been approved', 'Zmiany zostały zatwierdzone', 'Die Änderungen wurden genehmigt'),
(22, 'loginTitle', 'Login', 'Logowanie', 'Anmeldung'),
(23, 'mainPageTitle', 'Main page', 'Strona główna', 'Hauptseite'),
(24, 'adminPageTitle', 'Admin page', 'Strona dla adminów', 'Admin seite'),
(25, 'registerTitle', 'Registration', 'Rejestracja', 'Anmeldung'),
(26, 'ChangeUserInfoTitle', 'Change of user data', 'Zmiana danych użytkownika', 'Änderung der Benutzerdaten');
;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `surname` varchar(100) DEFAULT NULL,
  `role` varchar(100) DEFAULT NULL,
  `age` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `name`, `surname`, `role`, `age`) VALUES
(1, 'login1@gmail.com', 'pass1', 'Wiktor', 'Górecki', 'admin', 17),
(2, 'login2@gmail.com', 'pass2', 'Witold', 'Kowalski', 'user', 16),
(3, 'login3@gmail.com', 'pass3', 'Andrzej', 'Kulczyk', 'admin', 17),
(4, 'login4@gmail.com', 'pass4', 'Ola', 'Bołądź', 'user', 16),
(5, 'login5@gmail.com', 'pass5', 'Ania', 'Karza', 'user', 17);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `key_id` (`key_id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `smallImage` varchar(50) NOT NULL,
  `bigImage` varchar(50) NOT NULL,
  `price` double NOT NULL,
  `avaliableCount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `smallImage`, `bigImage`, `price`, `avaliableCount`) VALUES
(1, 'HP Pavilion Aero Ryzen 5-5600/16GB/512/Win11 Silve', 'To koniec kompromisów. Nowy Xiaomi 13 256 GB Flora Green wchodzi z buta na rynek smartfonów. Co może Ci zaoferować? Przede wszystkim topowe podzespoły, które zagwarantują Ci maksimum satysfakcji z zakupu. Znajdziesz tu najnowocześniejszy procesor Qualcomm Snapdragon 8 gen 2, który zasila wytrzymała bateria z technologią bardzo szybkiego ładowania o mocy do 67 W.', 'https://cdn.x-kom.pl/i/setup/images/prod/big/produ', 'https://cdn.x-kom.pl/i/setup/images/prod/big/produ', 3000, 100),
(2, 'Xiaomi 13 8/256GB Flora Green', 'Elegancja do pary z wygodą użytkowania? To właśnie oferuje ultramobilny laptop HP Pavilion Aero , który świetnie sprawdzi się zarówno jako narzędzie do pracy, jak i multimedialne centrum rozrywki, na którym zobaczysz kolejne sezony swoich ulubionych seriali. Do dyspozycji masz również wiele inteligentnych rozwiązań. A smukła konstrukcja oraz niewielka waga pozwolą Ci zabrać go ze sobą wszędzie, gdzie zechcesz. Zaufaj mobilności bez kompromisów..', 'https://cdn.x-kom.pl/i/setup/images/prod/big/produ', 'https://cdn.x-kom.pl/i/setup/images/prod/big/produ', 4800, 100);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
