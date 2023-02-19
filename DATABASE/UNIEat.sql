-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 16 Nov 2022 pada 16.39
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `UNIEat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `Admin`
--

CREATE TABLE `Admin` (
  `AdminID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Gender` varchar(255) NOT NULL,
  `ProfilePicture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `Admin`
--

INSERT INTO `Admin` (`AdminID`, `UserID`, `Gender`, `ProfilePicture`) VALUES
(1, 11, 'Male', 'img/admin.jpg'),
(2, 12, 'Female', 'img/admin.jpg'),
(3, 13, 'Female', 'img/admin.jpg'),
(4, 14, 'Female', 'img/admin.jpg'),
(5, 15, 'Female', 'img/admin.jpg'),
(6, 16, 'Female', 'img/admin.jpg'),
(7, 17, 'Female', 'img/admin.jpg'),
(8, 18, 'Male', 'img/admin.jpg'),
(9, 19, 'Male', 'img/admin.jpg'),
(10, 20, 'Male', 'img/admin.jpg'),
(11, 32, 'Male', 'img/admin.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `Cart`
--

CREATE TABLE `Cart` (
  `CartID` int(11) NOT NULL,
  `CustomerID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `Categories`
--

CREATE TABLE `Categories` (
  `CategoriesID` int(11) NOT NULL,
  `CategoryName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `Categories`
--

INSERT INTO `Categories` (`CategoriesID`, `CategoryName`) VALUES
(1, 'Food'),
(2, 'Drinks'),
(3, 'Snack');

-- --------------------------------------------------------

--
-- Struktur dari tabel `Customer`
--

CREATE TABLE `Customer` (
  `CustomerID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `ProfilePicture` varchar(255) NOT NULL,
  `VerifyEmail` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `Customer`
--

INSERT INTO `Customer` (`CustomerID`, `UserID`, `Username`, `ProfilePicture`, `VerifyEmail`) VALUES
(1, 1, 'Rico', 'img/default.jpg', 0),
(2, 2, 'Lia', 'img/default.jpg', 0),
(3, 3, 'Stanley', 'img/default.jpg', 0),
(4, 4, 'Adel', 'img/default.jpg', 0),
(5, 5, 'Nai', 'img/default.jpg', 0),
(6, 6, 'Nai', 'img/default.jpg', 0),
(7, 7, 'Nai', 'img/default.jpg', 0),
(8, 8, 'Rico', 'img/default.jpg', 0),
(9, 9, 'Nai', 'img/default.jpg', 0),
(10, 10, 'Adel', 'img/default.jpg', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `Order`
--

CREATE TABLE `Order` (
  `OrderID` int(11) NOT NULL,
  `CustomerID` int(11) NOT NULL,
  `TenantID` int(11) NOT NULL,
  `TotalPrice` int(11) NOT NULL,
  `Location` text NOT NULL,
  `Status` varchar(255) NOT NULL,
  `OrderTime` datetime NOT NULL,
  `CompletedTIme` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `Order`
--

INSERT INTO `Order` (`OrderID`, `CustomerID`, `TenantID`, `TotalPrice`, `Location`, `Status`, `OrderTime`, `CompletedTIme`) VALUES
(1, 7, 6, 50000, 'Stanley', 'Pending', '2022-01-19 03:39:48', NULL),
(2, 2, 7, 95000, 'Jamal', 'Pending', '2022-03-31 09:28:45', NULL),
(3, 1, 5, 45000, 'Stanley', 'Pending', '2022-02-02 15:15:11', NULL),
(4, 8, 5, 95000, 'Lynn', 'Pending', '2022-10-21 00:59:52', NULL),
(5, 5, 10, 40000, 'Radit', 'Pending', '2022-01-13 16:07:20', NULL),
(6, 8, 7, 40000, 'Ken', 'Pending', '2022-02-20 03:21:29', NULL),
(7, 3, 4, 90000, 'Adel', 'Pending', '2022-06-13 10:54:11', NULL),
(8, 1, 2, 35000, 'Ken', 'Pending', '2022-11-13 07:52:38', NULL),
(9, 9, 5, 55000, 'Jamal', 'Pending', '2022-06-06 10:20:05', NULL),
(10, 3, 1, 75000, 'Nai', 'Pending', '2022-06-22 22:55:37', NULL),
(11, 2, 5, 60000, 'Adel', 'Pending', '2022-05-06 05:43:56', NULL),
(12, 3, 3, 45000, 'Jamal', 'Pending', '2022-08-23 20:34:38', NULL),
(13, 8, 5, 40000, 'Nai', 'Pending', '2022-08-23 23:52:36', NULL),
(14, 3, 5, 75000, 'Mia', 'Pending', '2022-08-19 01:29:23', NULL),
(15, 3, 1, 35000, 'Stanley', 'Pending', '2022-10-02 14:26:04', NULL),
(16, 1, 1, 35000, 'Lia', 'Pending', '2022-06-16 15:49:20', NULL),
(17, 8, 5, 60000, 'Mia', 'Pending', '2022-07-14 17:54:17', NULL),
(18, 1, 3, 100000, 'Ken', 'Pending', '2022-08-11 16:56:41', NULL),
(19, 4, 1, 45000, 'Jamal', 'Pending', '2022-06-29 17:08:31', NULL),
(20, 10, 4, 25000, 'Rico', 'Pending', '2022-03-27 04:01:11', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `OrderDetails`
--

CREATE TABLE `OrderDetails` (
  `OrderDetailsID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `OrderID` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Note` text NOT NULL,
  `ProductPrice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `Product`
--

CREATE TABLE `Product` (
  `ProductID` int(11) NOT NULL,
  `TenantID` int(11) NOT NULL,
  `ProductName` varchar(255) NOT NULL,
  `Price` int(11) NOT NULL,
  `ProductPicture` varchar(255) NOT NULL,
  `Description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `Product`
--

INSERT INTO `Product` (`ProductID`, `TenantID`, `ProductName`, `Price`, `ProductPicture`, `Description`) VALUES
(1, 4, 'bacon', 12000, 'img/items.jpg', 'ini enak'),
(2, 10, 'es teh', 20000, 'img/items.jpg', 'ini enak'),
(3, 1, 'nasi goreng', 19000, 'img/items.jpg', 'dibuat dengan bahan premium'),
(4, 6, 'daging', 23000, 'img/items.jpg', 'ini enak'),
(5, 10, 'susu', 11000, 'img/items.jpg', 'ini juga enak'),
(6, 10, 'pepperoni', 17000, 'img/items.jpg', 'dibuat dengan bahan premium'),
(7, 5, 'ayam bakar', 15000, 'img/items.jpg', 'dibuat dengan bahan premium'),
(8, 9, 'pepperoni', 13000, 'img/items.jpg', 'ini enak'),
(9, 7, 'mie', 18000, 'img/items.jpg', 'ini enak'),
(10, 5, 'salad', 10000, 'img/items.jpg', 'ini enak'),
(11, 7, 'mie', 10000, 'img/items.jpg', 'sehat dan enak'),
(12, 6, 'salad', 14000, 'img/items.jpg', 'ini enak'),
(13, 8, 'nasi', 21000, 'img/items.jpg', 'mengandung vitamin dan mineral yang tinggi'),
(14, 8, 'bacon', 22000, 'img/items.jpg', 'ini juga enak'),
(15, 7, 'kopi', 14000, 'img/items.jpg', 'ini enak'),
(16, 2, 'mie', 17000, 'img/items.jpg', 'dibuat dengan bahan premium'),
(17, 2, 'pepperoni', 24000, 'img/items.jpg', 'pokoknya enak'),
(18, 1, 'pepperoni', 24000, 'img/items.jpg', 'pokoknya enak'),
(19, 1, 'nasi goreng', 24000, 'img/items.jpg', 'ini enak'),
(20, 7, 'ayam bakar', 20000, 'img/items.jpg', 'ini juga enak'),
(21, 1, 'susu', 22000, 'img/items.jpg', 'pokoknya enak'),
(22, 1, 'ayam bakar', 21000, 'img/items.jpg', 'sehat dan enak'),
(23, 10, 'pepperoni', 11000, 'img/items.jpg', 'mengandung vitamin dan mineral yang tinggi'),
(24, 9, 'pepperoni', 25000, 'img/items.jpg', 'ini enak'),
(25, 1, 'daging', 11000, 'img/items.jpg', 'sehat dan enak'),
(26, 5, 'susu', 20000, 'img/items.jpg', 'ini enak'),
(27, 8, 'salad', 20000, 'img/items.jpg', 'ini enak'),
(28, 3, 'mie', 18000, 'img/items.jpg', 'mengandung vitamin dan mineral yang tinggi'),
(29, 5, 'nasi goreng', 15000, 'img/items.jpg', 'ini enak'),
(30, 7, 'ayam bakar', 20000, 'img/items.jpg', 'dibuat dengan bahan premium'),
(31, 1, 'mie', 12000, 'img/items.jpg', 'sehat dan enak'),
(32, 1, 'es teh', 10000, 'img/items.jpg', 'mengandung vitamin dan mineral yang tinggi'),
(33, 8, 'jamur', 23000, 'img/items.jpg', 'sehat dan enak'),
(34, 3, 'daging', 13000, 'img/items.jpg', 'sehat dan enak'),
(35, 3, 'ayam goreng', 19000, 'img/items.jpg', 'dibuat dengan bahan premium'),
(36, 1, 'nasi', 17000, 'img/items.jpg', 'dibuat dengan bahan premium'),
(37, 1, 'nasi goreng', 14000, 'img/items.jpg', 'mengandung vitamin dan mineral yang tinggi'),
(38, 10, 'pepperoni', 20000, 'img/items.jpg', 'sehat dan enak'),
(39, 4, 'es teh', 10000, 'img/items.jpg', 'dibuat dengan bahan premium'),
(40, 1, 'pepperoni', 14000, 'img/items.jpg', 'ini enak'),
(41, 6, 'nasi', 13000, 'img/items.jpg', 'sehat dan enak'),
(42, 6, 'daging', 10000, 'img/items.jpg', 'mengandung vitamin dan mineral yang tinggi'),
(43, 10, 'pepperoni', 10000, 'img/items.jpg', 'sehat dan enak'),
(44, 10, 'nasi', 21000, 'img/items.jpg', 'ini juga enak'),
(45, 1, 'daging', 12000, 'img/items.jpg', 'ini enak'),
(46, 3, 'ayam bakar', 23000, 'img/items.jpg', 'dibuat dengan bahan premium'),
(47, 8, 'jamur', 16000, 'img/items.jpg', 'sehat dan enak'),
(48, 6, 'ayam bakar', 10000, 'img/items.jpg', 'mengandung vitamin dan mineral yang tinggi'),
(49, 8, 'ayam bakar', 17000, 'img/items.jpg', 'sehat dan enak'),
(50, 5, 'salad', 21000, 'img/items.jpg', 'ini juga enak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `RatingAndReview`
--

CREATE TABLE `RatingAndReview` (
  `ReviewID` int(11) NOT NULL,
  `CustomerID` int(11) NOT NULL,
  `TenantID` int(11) NOT NULL,
  `Rating` int(11) NOT NULL,
  `Review` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `RatingAndReview`
--

INSERT INTO `RatingAndReview` (`ReviewID`, `CustomerID`, `TenantID`, `Rating`, `Review`) VALUES
(1, 6, 1, 4, 'debess'),
(2, 5, 2, 2, 'murah meriahhh'),
(3, 9, 3, 5, 'makanan paling enak'),
(4, 10, 4, 4, 'nyam'),
(5, 6, 5, 3, 'nyam'),
(6, 4, 6, 2, 'makanan paling enak'),
(7, 8, 7, 4, 'nyam'),
(8, 2, 8, 4, 'enak'),
(9, 10, 9, 5, 'bersih'),
(10, 7, 10, 4, 'enak'),
(11, 7, 1, 4, 'debess'),
(12, 10, 2, 5, 'porsinya gede'),
(13, 8, 3, 3, 'porsinya gede'),
(14, 9, 4, 3, 'bersih'),
(15, 7, 5, 2, 'porsinya gede'),
(16, 10, 6, 4, 'bersih'),
(17, 5, 7, 2, 'murah meriahhh'),
(18, 7, 8, 4, 'makanan paling enak'),
(19, 3, 9, 4, 'murah meriahhh'),
(20, 1, 10, 2, 'nyam'),
(21, 9, 1, 5, 'nyam'),
(22, 8, 2, 4, 'murah meriahhh'),
(23, 5, 3, 3, 'makanan paling enak'),
(24, 4, 4, 3, 'bersih'),
(25, 7, 5, 5, 'murah meriahhh'),
(26, 8, 6, 4, 'enak'),
(27, 5, 7, 4, 'enak'),
(28, 8, 8, 3, 'debess'),
(29, 3, 9, 3, 'gada lawan'),
(30, 1, 10, 3, 'makanan paling enak'),
(31, 4, 1, 4, 'nyam'),
(32, 6, 2, 5, 'porsinya gede'),
(33, 2, 3, 5, 'debess'),
(34, 8, 4, 2, 'gada lawan'),
(35, 7, 5, 4, 'gada lawan'),
(36, 8, 6, 2, 'bersih'),
(37, 8, 7, 3, 'gada lawan'),
(38, 10, 8, 5, 'gada lawan'),
(39, 6, 9, 4, 'enak'),
(40, 10, 10, 3, 'gada lawan'),
(41, 8, 1, 2, 'bersih'),
(42, 6, 2, 5, 'nyam'),
(43, 4, 3, 4, 'makanan paling enak'),
(44, 5, 4, 4, 'makanan paling enak'),
(45, 6, 5, 3, 'debess'),
(46, 6, 6, 2, 'makanan paling enak'),
(47, 9, 7, 2, 'murah meriahhh'),
(48, 1, 8, 3, 'murah meriahhh'),
(49, 6, 9, 4, 'bersih'),
(50, 8, 10, 5, 'makanan paling enak'),
(51, 5, 1, 5, 'porsinya gede'),
(52, 1, 2, 2, 'debess'),
(53, 8, 3, 3, 'debess'),
(54, 2, 4, 4, 'porsinya gede'),
(55, 2, 5, 3, 'gada lawan'),
(56, 4, 6, 4, 'makanan paling enak'),
(57, 5, 7, 5, 'gada lawan'),
(58, 2, 8, 5, 'nyam'),
(59, 7, 9, 2, 'nyam'),
(60, 2, 10, 5, 'nyam'),
(61, 2, 1, 5, 'makanan paling enak'),
(62, 3, 2, 2, 'bersih'),
(63, 7, 3, 2, 'makanan paling enak'),
(64, 6, 4, 5, 'makanan paling enak'),
(65, 6, 5, 5, 'nyam'),
(66, 3, 6, 4, 'debess'),
(67, 9, 7, 2, 'bersih'),
(68, 10, 8, 3, 'nyam'),
(69, 2, 9, 4, 'debess'),
(70, 5, 10, 2, 'bersih'),
(71, 3, 1, 5, 'murah meriahhh'),
(72, 3, 2, 4, 'debess'),
(73, 8, 3, 4, 'murah meriahhh'),
(74, 9, 4, 5, 'gada lawan'),
(75, 6, 5, 5, 'gada lawan'),
(76, 2, 6, 5, 'nyam'),
(77, 4, 7, 2, 'enak'),
(78, 2, 8, 5, 'makanan paling enak'),
(79, 9, 9, 5, 'enak'),
(80, 8, 10, 2, 'bersih'),
(81, 9, 1, 4, 'gada lawan'),
(82, 5, 2, 5, 'murah meriahhh'),
(83, 10, 3, 3, 'nyam'),
(84, 2, 4, 5, 'debess'),
(85, 3, 5, 3, 'debess'),
(86, 3, 6, 3, 'debess'),
(87, 2, 7, 3, 'bersih'),
(88, 8, 8, 5, 'gada lawan'),
(89, 7, 9, 5, 'nyam'),
(90, 10, 10, 3, 'enak'),
(91, 8, 1, 2, 'bersih'),
(92, 10, 2, 5, 'bersih'),
(93, 7, 3, 5, 'enak'),
(94, 7, 4, 3, 'debess'),
(95, 2, 5, 3, 'nyam'),
(96, 9, 6, 5, 'gada lawan'),
(97, 6, 7, 5, 'nyam'),
(98, 4, 8, 2, 'gada lawan'),
(99, 3, 9, 3, 'murah meriahhh'),
(100, 8, 10, 5, 'murah meriahhh'),
(101, 5, 1, 3, 'murah meriahhh'),
(102, 1, 2, 5, 'enak'),
(103, 7, 3, 4, 'makanan paling enak'),
(104, 10, 4, 4, 'nyam'),
(105, 2, 5, 2, 'gada lawan'),
(106, 8, 6, 2, 'gada lawan'),
(107, 4, 7, 4, 'gada lawan'),
(108, 3, 8, 4, 'debess'),
(109, 5, 9, 2, 'debess'),
(110, 2, 10, 4, 'makanan paling enak'),
(111, 5, 1, 5, 'gada lawan'),
(112, 2, 2, 4, 'gada lawan'),
(113, 10, 3, 5, 'nyam'),
(114, 5, 4, 5, 'murah meriahhh'),
(115, 3, 5, 4, 'nyam'),
(116, 1, 6, 3, 'porsinya gede'),
(117, 5, 7, 3, 'makanan paling enak'),
(118, 3, 8, 2, 'bersih'),
(119, 6, 9, 2, 'enak'),
(120, 1, 10, 3, 'debess');

-- --------------------------------------------------------

--
-- Struktur dari tabel `Tenant`
--

CREATE TABLE `Tenant` (
  `TenantID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `Tenant`
--

INSERT INTO `Tenant` (`TenantID`, `UserID`, `Picture`) VALUES
(1, 21, 'img/tenant.jpg'),
(2, 22, 'img/tenant.jpg'),
(3, 23, 'img/tenant.jpg'),
(4, 24, 'img/tenant.jpg'),
(5, 25, 'img/tenant.jpg'),
(6, 26, 'img/tenant.jpg'),
(7, 27, 'img/tenant.jpg'),
(8, 28, 'img/tenant.jpg'),
(9, 29, 'img/tenant.jpg'),
(10, 30, 'img/tenant.jpg'),
(11, 31, 'img/tenant.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `TenantCategories`
--

CREATE TABLE `TenantCategories` (
  `TenantID` int(11) NOT NULL,
  `CategoriesID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `TenantCategories`
--

INSERT INTO `TenantCategories` (`TenantID`, `CategoriesID`) VALUES
(1, 1),
(2, 1),
(2, 3),
(2, 2),
(3, 3),
(4, 2),
(5, 2),
(5, 3),
(6, 2),
(6, 3),
(6, 1),
(7, 3),
(7, 2),
(7, 1),
(8, 3),
(8, 2),
(9, 1),
(10, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `User`
--

CREATE TABLE `User` (
  `UserID` int(11) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `PhoneNumber` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `User`
--

INSERT INTO `User` (`UserID`, `Email`, `Name`, `Password`, `PhoneNumber`) VALUES
(1, 'rico143@gmail.com', 'Rico', '$2y$10$Y1Qt5gGxS8zCn0ZGuc5bN.ezpfNb7EsrGOp6YX/6Iw/zpz9igO3wK', '+6285967115'),
(2, 'lia27@yahoo.com', 'Lia', '$2y$10$Y1Qt5gGxS8zCn0ZGuc5bN.ezpfNb7EsrGOp6YX/6Iw/zpz9igO3wK', '+6281744811'),
(3, 'stanley341@gmail.com', 'Stanley', '$2y$10$Y1Qt5gGxS8zCn0ZGuc5bN.ezpfNb7EsrGOp6YX/6Iw/zpz9igO3wK', '+6286792405'),
(4, 'adel431@yahoo.com', 'Adel', '$2y$10$Y1Qt5gGxS8zCn0ZGuc5bN.ezpfNb7EsrGOp6YX/6Iw/zpz9igO3wK', '+6285246555'),
(5, 'nai515@outlook.com', 'Nai', '$2y$10$Y1Qt5gGxS8zCn0ZGuc5bN.ezpfNb7EsrGOp6YX/6Iw/zpz9igO3wK', '+6280548922'),
(6, 'nai629@gmail.com', 'Nai', '$2y$10$Y1Qt5gGxS8zCn0ZGuc5bN.ezpfNb7EsrGOp6YX/6Iw/zpz9igO3wK', '+6289034465'),
(7, 'nai784@yahoo.com', 'Nai', '$2y$10$Y1Qt5gGxS8zCn0ZGuc5bN.ezpfNb7EsrGOp6YX/6Iw/zpz9igO3wK', '+6281265732'),
(8, 'rico866@outlook.com', 'Rico', '$2y$10$Y1Qt5gGxS8zCn0ZGuc5bN.ezpfNb7EsrGOp6YX/6Iw/zpz9igO3wK', '+6284606719'),
(9, 'nai929@outlook.com', 'Nai', '$2y$10$Y1Qt5gGxS8zCn0ZGuc5bN.ezpfNb7EsrGOp6YX/6Iw/zpz9igO3wK', '+6283064687'),
(10, 'adel1019@outlook.com', 'Adel', '$2y$10$Y1Qt5gGxS8zCn0ZGuc5bN.ezpfNb7EsrGOp6YX/6Iw/zpz9igO3wK', '+6288417903'),
(11, 'rico1128@yahoo.com', 'Rico', '$2y$10$Y1Qt5gGxS8zCn0ZGuc5bN.ezpfNb7EsrGOp6YX/6Iw/zpz9igO3wK', '+6288896491'),
(12, 'adel1276@yahoo.com', 'Adel', '$2y$10$Y1Qt5gGxS8zCn0ZGuc5bN.ezpfNb7EsrGOp6YX/6Iw/zpz9igO3wK', '+6280816735'),
(13, 'radit1358@outlook.com', 'Radit', '$2y$10$Y1Qt5gGxS8zCn0ZGuc5bN.ezpfNb7EsrGOp6YX/6Iw/zpz9igO3wK', '+6284061702'),
(14, 'radit146@gmail.com', 'Radit', '$2y$10$Y1Qt5gGxS8zCn0ZGuc5bN.ezpfNb7EsrGOp6YX/6Iw/zpz9igO3wK', '+6285249976'),
(15, 'stanley1538@yahoo.com', 'Stanley', '$2y$10$Y1Qt5gGxS8zCn0ZGuc5bN.ezpfNb7EsrGOp6YX/6Iw/zpz9igO3wK', '+6285358968'),
(16, 'mia1631@outlook.com', 'Mia', '$2y$10$Y1Qt5gGxS8zCn0ZGuc5bN.ezpfNb7EsrGOp6YX/6Iw/zpz9igO3wK', '+6283171872'),
(17, 'lynn1753@gmail.com', 'Lynn', '$2y$10$Y1Qt5gGxS8zCn0ZGuc5bN.ezpfNb7EsrGOp6YX/6Iw/zpz9igO3wK', '+6289919956'),
(18, 'adel1852@outlook.com', 'Adel', '$2y$10$Y1Qt5gGxS8zCn0ZGuc5bN.ezpfNb7EsrGOp6YX/6Iw/zpz9igO3wK', '+6283134105'),
(19, 'radit1988@gmail.com', 'Radit', '$2y$10$Y1Qt5gGxS8zCn0ZGuc5bN.ezpfNb7EsrGOp6YX/6Iw/zpz9igO3wK', '+6280511664'),
(20, 'adel205@gmail.com', 'Adel', '$2y$10$Y1Qt5gGxS8zCn0ZGuc5bN.ezpfNb7EsrGOp6YX/6Iw/zpz9igO3wK', '+6282522321'),
(21, 'lia2165@outlook.com', 'Lia', '$2y$10$Y1Qt5gGxS8zCn0ZGuc5bN.ezpfNb7EsrGOp6YX/6Iw/zpz9igO3wK', '+6285968461'),
(22, 'ken2212@outlook.com', 'Ken', '$2y$10$Y1Qt5gGxS8zCn0ZGuc5bN.ezpfNb7EsrGOp6YX/6Iw/zpz9igO3wK', '+6288577243'),
(23, 'rico2355@yahoo.com', 'Rico', '$2y$10$Y1Qt5gGxS8zCn0ZGuc5bN.ezpfNb7EsrGOp6YX/6Iw/zpz9igO3wK', '+6283755759'),
(24, 'stanley2414@outlook.com', 'Stanley', '$2y$10$Y1Qt5gGxS8zCn0ZGuc5bN.ezpfNb7EsrGOp6YX/6Iw/zpz9igO3wK', '+6286750210'),
(25, 'adel25100@yahoo.com', 'Adel', '$2y$10$Y1Qt5gGxS8zCn0ZGuc5bN.ezpfNb7EsrGOp6YX/6Iw/zpz9igO3wK', '+6288123177'),
(26, 'rico2679@outlook.com', 'Rico', '$2y$10$Y1Qt5gGxS8zCn0ZGuc5bN.ezpfNb7EsrGOp6YX/6Iw/zpz9igO3wK', '+6281079997'),
(27, 'ken2721@yahoo.com', 'Ken', '$2y$10$Y1Qt5gGxS8zCn0ZGuc5bN.ezpfNb7EsrGOp6YX/6Iw/zpz9igO3wK', '+6285529108'),
(28, 'ken2899@yahoo.com', 'Ken', '$2y$10$Y1Qt5gGxS8zCn0ZGuc5bN.ezpfNb7EsrGOp6YX/6Iw/zpz9igO3wK', '+6283431091'),
(29, 'adel2994@yahoo.com', 'Adel', '$2y$10$Y1Qt5gGxS8zCn0ZGuc5bN.ezpfNb7EsrGOp6YX/6Iw/zpz9igO3wK', '+6286162239'),
(30, 'mia3025@yahoo.com', 'Mia', '$2y$10$Y1Qt5gGxS8zCn0ZGuc5bN.ezpfNb7EsrGOp6YX/6Iw/zpz9igO3wK', '+6286145595'),
(31, 'tenant@tenant.com', 'Tenant', '$2y$10$Gzoy4eZp/19OlizrhJFLJe25jwQC8LqDmGlVfmlAi.o89xK2HOeEu', '0812345678'),
(32, 'admin@admin.com', 'Admin', '$2y$10$VJKIz0518ifezmIqIw7Dhu9AxykdYtA/f5eOBXUSa.5I7OTzUj0Gm', '+6287351628321');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `Admin`
--
ALTER TABLE `Admin`
  ADD PRIMARY KEY (`AdminID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indeks untuk tabel `Cart`
--
ALTER TABLE `Cart`
  ADD PRIMARY KEY (`CartID`),
  ADD KEY `CustomerID` (`CustomerID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Indeks untuk tabel `Categories`
--
ALTER TABLE `Categories`
  ADD PRIMARY KEY (`CategoriesID`);

--
-- Indeks untuk tabel `Customer`
--
ALTER TABLE `Customer`
  ADD PRIMARY KEY (`CustomerID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indeks untuk tabel `Order`
--
ALTER TABLE `Order`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `CustomerID` (`CustomerID`),
  ADD KEY `TenantID` (`TenantID`);

--
-- Indeks untuk tabel `OrderDetails`
--
ALTER TABLE `OrderDetails`
  ADD PRIMARY KEY (`OrderDetailsID`),
  ADD KEY `ProductID` (`ProductID`),
  ADD KEY `OrderID` (`OrderID`);

--
-- Indeks untuk tabel `Product`
--
ALTER TABLE `Product`
  ADD PRIMARY KEY (`ProductID`),
  ADD KEY `TenantID` (`TenantID`);

--
-- Indeks untuk tabel `RatingAndReview`
--
ALTER TABLE `RatingAndReview`
  ADD PRIMARY KEY (`ReviewID`),
  ADD KEY `TenantID` (`TenantID`),
  ADD KEY `CustomerID` (`CustomerID`);

--
-- Indeks untuk tabel `Tenant`
--
ALTER TABLE `Tenant`
  ADD PRIMARY KEY (`TenantID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indeks untuk tabel `TenantCategories`
--
ALTER TABLE `TenantCategories`
  ADD KEY `TenantID` (`TenantID`),
  ADD KEY `CategoriesID` (`CategoriesID`);

--
-- Indeks untuk tabel `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `Admin`
--
ALTER TABLE `Admin`
  MODIFY `AdminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `Cart`
--
ALTER TABLE `Cart`
  MODIFY `CartID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `Categories`
--
ALTER TABLE `Categories`
  MODIFY `CategoriesID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `Customer`
--
ALTER TABLE `Customer`
  MODIFY `CustomerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `Order`
--
ALTER TABLE `Order`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `OrderDetails`
--
ALTER TABLE `OrderDetails`
  MODIFY `OrderDetailsID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `Product`
--
ALTER TABLE `Product`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT untuk tabel `RatingAndReview`
--
ALTER TABLE `RatingAndReview`
  MODIFY `ReviewID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT untuk tabel `Tenant`
--
ALTER TABLE `Tenant`
  MODIFY `TenantID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `User`
--
ALTER TABLE `User`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `Admin`
--
ALTER TABLE `Admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `User` (`UserID`);

--
-- Ketidakleluasaan untuk tabel `Cart`
--
ALTER TABLE `Cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `Customer` (`CustomerID`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `Product` (`ProductID`);

--
-- Ketidakleluasaan untuk tabel `Customer`
--
ALTER TABLE `Customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `User` (`UserID`);

--
-- Ketidakleluasaan untuk tabel `Order`
--
ALTER TABLE `Order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `Customer` (`CustomerID`),
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`TenantID`) REFERENCES `Tenant` (`TenantID`);

--
-- Ketidakleluasaan untuk tabel `OrderDetails`
--
ALTER TABLE `OrderDetails`
  ADD CONSTRAINT `orderdetails_ibfk_1` FOREIGN KEY (`ProductID`) REFERENCES `Product` (`ProductID`),
  ADD CONSTRAINT `orderdetails_ibfk_2` FOREIGN KEY (`OrderID`) REFERENCES `Order` (`OrderID`);

--
-- Ketidakleluasaan untuk tabel `Product`
--
ALTER TABLE `Product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`TenantID`) REFERENCES `Tenant` (`TenantID`);

--
-- Ketidakleluasaan untuk tabel `RatingAndReview`
--
ALTER TABLE `RatingAndReview`
  ADD CONSTRAINT `ratingandreview_ibfk_1` FOREIGN KEY (`TenantID`) REFERENCES `Tenant` (`TenantID`),
  ADD CONSTRAINT `ratingandreview_ibfk_2` FOREIGN KEY (`CustomerID`) REFERENCES `Customer` (`CustomerID`);

--
-- Ketidakleluasaan untuk tabel `Tenant`
--
ALTER TABLE `Tenant`
  ADD CONSTRAINT `tenant_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `User` (`UserID`);

--
-- Ketidakleluasaan untuk tabel `TenantCategories`
--
ALTER TABLE `TenantCategories`
  ADD CONSTRAINT `tenantcategories_ibfk_1` FOREIGN KEY (`TenantID`) REFERENCES `Tenant` (`TenantID`),
  ADD CONSTRAINT `tenantcategories_ibfk_2` FOREIGN KEY (`CategoriesID`) REFERENCES `Categories` (`CategoriesID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
