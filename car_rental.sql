-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2024 at 03:15 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car_rental`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE `admin_user` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `name` text NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `mileage` int(11) DEFAULT NULL,
  `transmission` varchar(50) DEFAULT NULL,
  `seats` int(11) DEFAULT NULL,
  `luggage` int(11) DEFAULT NULL,
  `fuel` varchar(50) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `hourly_price` decimal(10,2) DEFAULT NULL,
  `daily_price` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `name`, `brand`, `mileage`, `transmission`, `seats`, `luggage`, `fuel`, `image`, `description`, `hourly_price`, `daily_price`, `created_at`, `updated_at`) VALUES
(1, 'S-Cross', 'Suzuki', 18, 'Manual', 4, 4, 'Petrol', 'images/S_Cross.jpg', 'Maruti S-Cross is a 5 seater SUV with a mileage of 18.55 Kmpl depending upon its transmission and fuel type. S-Crosss 4 cylinder, 1462 cc, K15B Smart Hybrid 104 PS @ 6000 rpm can generate power and 138 Nm @ 4400 rpm torque. It has a fuel tank capacity of 48 Litres.', 25.00, 150.00, '2024-02-23 15:47:46', '2024-03-10 05:35:12'),
(2, 'City', 'Honda', 20, 'Automatic', 5, 3, 'Petrol', 'images/Honda_City.jpg', 'The Honda City is a popular sedan known for its reliability and comfort. With a spacious interior and smooth ride, it is perfect for city driving as well as long trips. The City features a powerful engine and advanced safety features.', 30.00, 180.00, '2024-02-23 15:47:46', '2024-02-23 15:48:05'),
(3, 'Astor', 'MG', 15, 'Automatic', 5, 5, 'Diesel', 'images/Astor_Mg.jpg', 'The MG Astor is a stylish and compact SUV designed to offer both comfort and performance. With its sleek design and advanced features, the Astor is perfect for urban driving and long road trips. Equipped with a powerful engine and smooth automatic transmission, the Astor delivers a seamless driving experience. Its spacious interior provides ample room for passengers and luggage, making it ideal for families and travel enthusiasts. Whether you\'re navigating city streets or exploring the countryside, the MG Astor ensures a comfortable and enjoyable ride.', 50.00, 300.00, '2024-02-23 15:47:46', '2024-02-23 16:04:44'),
(4, 'Civic', 'Honda', 22, 'Automatic', 5, 3, 'Petrol', 'images/Civic.jpg', 'The Honda Civic is a stylish and reliable compact car. With its sporty design and advanced features, it offers a fun and comfortable driving experience.', 28.00, 160.00, '2024-02-23 15:47:46', '2024-02-23 15:47:46'),
(5, 'Audi A4', 'Audi', 25, 'Automatic', 5, 4, 'Petrol', 'images/Audi_a4.avif', 'The Audi A4 is a luxury sedan known for its elegant design and powerful performance. It combines comfort, technology, and driving dynamics to deliver an exceptional driving experience.', 40.00, 250.00, '2024-02-23 15:47:46', '2024-02-23 16:45:45'),
(6, 'Toyota Camry', 'Toyota', 23, 'Automatic', 5, 4, 'Hybrid', 'images/Toyota_Camry.jpg', 'The Toyota Camry is a midsize sedan known for its reliability and fuel efficiency. With its spacious interior and smooth ride, it is perfect for daily commuting and long trips.', 35.00, 200.00, '2024-02-23 15:47:46', '2024-02-23 15:47:46'),
(7, 'BMW X5', 'BMW', 17, 'Automatic', 5, 5, 'Petrol', 'images/BMW_X5.jpg', 'The BMW X5 is a luxury SUV known for its powerful engine and agile handling. It offers a comfortable and luxurious ride, with advanced features and premium materials throughout the cabin.', 55.00, 350.00, '2024-02-23 15:47:46', '2024-02-23 15:47:46'),
(8, 'Mercedes-Benz E-Class', 'Mercedes-Benz', 21, 'Automatic', 5, 4, 'Diesel', 'images/Mercedes_E_Class.jpg', 'The Mercedes-Benz E-Class is a luxury sedan known for its elegant design and advanced technology. It offers a smooth and refined driving experience, with a spacious and luxurious interior.', 45.00, 280.00, '2024-02-23 15:47:46', '2024-02-23 15:47:46'),
(9, 'Endeavor Ford', 'Ford', 15, 'Automatic', 7, 5, 'Diesel', 'images/ford-endeavour.jpg', 'The Ford Endeavor is a rugged and powerful SUV built for adventure. With its robust design and capable performance, the Endeavor is ready to tackle any terrain with confidence. Equipped with a reliable diesel engine and smooth automatic transmission, it delivers impressive power and efficiency. The spacious interior offers comfortable seating for up to seven passengers, along with ample cargo space for all your gear. Whether you\'re exploring off-road trails or cruising on the highway, the Ford Endeavor ensures a comfortable and enjoyable ride.', 20.00, 150.00, '2024-02-23 15:47:46', '2024-02-23 16:08:43');

-- --------------------------------------------------------

--
-- Table structure for table `car_bookings`
--

CREATE TABLE `car_bookings` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `pickup_location` varchar(255) DEFAULT NULL,
  `dropoff_location` varchar(255) DEFAULT NULL,
  `pickup_date` date DEFAULT NULL,
  `dropoff_date` date DEFAULT NULL,
  `pickup_time` time DEFAULT NULL,
  `car_id` int(11) DEFAULT NULL,
  `driver_choice` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `car_bookings`
--

INSERT INTO `car_bookings` (`id`, `name`, `phone`, `pickup_location`, `dropoff_location`, `pickup_date`, `dropoff_date`, `pickup_time`, `car_id`, `driver_choice`, `created_at`, `updated_at`) VALUES
(22, 'HJHJFJF', '8200874537', 'Gandhidham', 'pune', '2024-03-28', '2024-03-29', '01:30:00', 4, 'with_driver', '2024-03-11 08:15:00', '2024-03-11 08:15:00'),
(23, 'Sufiya', '8200874537', 'Surat', 'Anjar', '2024-03-14', '2024-03-15', '00:30:00', 3, 'without_driver', '2024-03-11 12:57:23', '2024-03-11 12:57:23'),
(24, 'Shub', '8794561231', 'Gandhidham', 'Anjar', '2024-03-22', '2024-03-23', '01:00:00', 8, 'without_driver', '2024-03-11 13:41:18', '2024-03-11 13:41:18');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(13, 'HJHJFJF', 'riddhi4skriplani@gmail.com', 'nnknkknk', 'hghgghgh', '2024-03-10 07:59:17', '2024-03-10 07:59:17'),
(14, 'soumya das', 'riddhi4skriplani@gmail.com', 'Hello World', 'bbnmbknbnkb', '2024-03-10 18:30:00', '2024-03-10 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` int(11) NOT NULL,
  `car_id` int(11) DEFAULT NULL,
  `feature_name` varchar(255) DEFAULT NULL,
  `has_feature` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `car_id`, `feature_name`, `has_feature`, `created_at`, `updated_at`) VALUES
(1, 1, 'John jam', 0, '2024-02-23 15:59:57', '2024-03-10 10:01:30'),
(2, 1, 'Child Seat', 1, '2024-02-23 16:01:32', '2024-02-23 16:01:32'),
(3, 1, 'GPS', 1, '2024-02-23 16:01:32', '2024-02-23 16:01:32'),
(4, 1, 'Music System', 1, '2024-02-23 16:01:32', '2024-02-23 16:01:32'),
(5, 1, 'Seat Belt', 1, '2024-02-23 16:01:32', '2024-02-23 16:01:32'),
(6, 1, 'Luggage', 1, '2024-02-23 16:01:32', '2024-02-23 16:01:32'),
(7, 1, 'Sleeping Bed', 0, '2024-02-23 16:01:32', '2024-02-23 16:01:32'),
(8, 1, 'Water', 1, '2024-02-23 16:01:32', '2024-02-23 16:01:32'),
(9, 1, 'Bluetooth', 1, '2024-02-23 16:01:32', '2024-02-23 16:01:32'),
(10, 1, 'Onboard computer', 0, '2024-02-23 16:01:32', '2024-02-23 16:01:32'),
(11, 1, 'Audio input', 1, '2024-02-23 16:01:32', '2024-02-23 16:01:32'),
(12, 1, 'Long Term Trips', 1, '2024-02-23 16:01:32', '2024-02-23 16:01:32'),
(13, 1, 'Car Kit', 1, '2024-02-23 16:01:32', '2024-02-23 16:01:32'),
(14, 1, 'Remote central locking', 1, '2024-02-23 16:01:32', '2024-02-23 16:01:32'),
(15, 1, 'Climate control', 1, '2024-02-23 16:01:32', '2024-02-23 16:01:32'),
(16, 2, 'Air Conditioning', 1, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(17, 2, 'Child Seat', 1, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(18, 2, 'GPS', 1, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(19, 2, 'Music System', 1, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(20, 2, 'Seat Belt', 1, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(21, 2, 'Luggage', 1, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(22, 2, 'Sleeping Bed', 0, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(23, 2, 'Water', 1, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(24, 2, 'Bluetooth', 1, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(25, 2, 'Onboard computer', 0, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(26, 2, 'Audio input', 1, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(27, 2, 'Long Term Trips', 1, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(28, 2, 'Car Kit', 1, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(29, 2, 'Remote central locking', 1, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(30, 2, 'Climate control', 1, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(31, 3, 'Air Conditioning', 1, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(32, 3, 'Child Seat', 1, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(33, 3, 'GPS', 1, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(34, 3, 'Music System', 1, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(35, 3, 'Seat Belt', 1, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(36, 3, 'Luggage', 1, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(37, 3, 'Sleeping Bed', 0, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(38, 3, 'Water', 1, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(39, 3, 'Bluetooth', 1, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(40, 3, 'Onboard computer', 0, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(41, 3, 'Audio input', 1, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(42, 3, 'Long Term Trips', 1, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(43, 3, 'Car Kit', 1, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(44, 3, 'Remote central locking', 1, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(45, 3, 'Climate control', 1, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(46, 4, 'Air Conditioning', 1, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(47, 4, 'Child Seat', 1, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(48, 4, 'GPS', 1, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(49, 4, 'Music System', 1, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(50, 4, 'Seat Belt', 1, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(51, 4, 'Luggage', 1, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(52, 4, 'Sleeping Bed', 0, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(53, 4, 'Water', 1, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(54, 4, 'Bluetooth', 1, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(55, 4, 'Onboard computer', 0, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(56, 4, 'Audio input', 1, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(57, 4, 'Long Term Trips', 1, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(58, 4, 'Car Kit', 1, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(59, 4, 'Remote central locking', 1, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(60, 4, 'Climate control', 1, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(61, 5, 'Air Conditioning', 1, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(62, 5, 'Child Seat', 1, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(63, 5, 'GPS', 1, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(64, 5, 'Music System', 1, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(65, 5, 'Seat Belt', 1, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(66, 5, 'Luggage', 1, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(67, 5, 'Sleeping Bed', 0, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(68, 5, 'Water', 1, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(69, 5, 'Bluetooth', 1, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(70, 5, 'Onboard computer', 0, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(71, 5, 'Audio input', 1, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(72, 5, 'Long Term Trips', 1, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(73, 5, 'Car Kit', 1, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(74, 5, 'Remote central locking', 1, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(75, 5, 'Climate control', 1, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(76, 6, 'Air Conditioning', 1, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(77, 6, 'Child Seat', 1, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(78, 6, 'GPS', 1, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(79, 6, 'Music System', 1, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(80, 6, 'Seat Belt', 1, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(81, 6, 'Luggage', 1, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(82, 6, 'Sleeping Bed', 0, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(83, 6, 'Water', 1, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(84, 6, 'Bluetooth', 1, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(85, 6, 'Onboard computer', 0, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(86, 6, 'Audio input', 1, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(87, 6, 'Long Term Trips', 1, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(88, 6, 'Car Kit', 1, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(89, 6, 'Remote central locking', 1, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(90, 6, 'Climate control', 1, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(91, 7, 'Air Conditioning', 1, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(92, 7, 'Child Seat', 1, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(93, 7, 'GPS', 1, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(94, 7, 'Music System', 1, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(95, 7, 'Seat Belt', 1, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(96, 7, 'Luggage', 1, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(97, 7, 'Sleeping Bed', 0, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(98, 7, 'Water', 1, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(99, 7, 'Bluetooth', 1, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(100, 7, 'Onboard computer', 0, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(101, 7, 'Audio input', 1, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(102, 7, 'Long Term Trips', 1, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(103, 7, 'Car Kit', 1, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(104, 7, 'Remote central locking', 1, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(105, 7, 'Climate control', 1, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(106, 8, 'Air Conditioning', 1, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(107, 8, 'Child Seat', 1, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(108, 8, 'GPS', 1, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(109, 8, 'Music System', 1, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(110, 8, 'Seat Belt', 1, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(111, 8, 'Luggage', 1, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(112, 8, 'Sleeping Bed', 0, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(113, 8, 'Water', 1, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(114, 8, 'Bluetooth', 1, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(115, 8, 'Onboard computer', 0, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(116, 8, 'Audio input', 1, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(117, 8, 'Long Term Trips', 1, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(118, 8, 'Car Kit', 1, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(119, 8, 'Remote central locking', 1, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(120, 8, 'Climate control', 1, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(121, 9, 'Air Conditioning', 1, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(122, 9, 'Child Seat', 1, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(123, 9, 'GPS', 1, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(124, 9, 'Music System', 1, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(125, 9, 'Seat Belt', 1, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(126, 9, 'Luggage', 1, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(127, 9, 'Sleeping Bed', 0, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(128, 9, 'Water', 1, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(129, 9, 'Bluetooth', 1, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(130, 9, 'Onboard computer', 0, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(131, 9, 'Audio input', 1, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(132, 9, 'Long Term Trips', 1, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(133, 9, 'Car Kit', 1, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(134, 9, 'Remote central locking', 1, '2024-02-23 16:02:06', '2024-02-23 16:02:06'),
(135, 9, 'Climate control', 1, '2024-02-23 16:02:06', '2024-02-23 16:02:06');

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `id` int(1) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` varchar(50) NOT NULL,
  `license` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`id`, `name`, `email`, `message`, `license`) VALUES
(6, 'bdjadj', 'duttapankajk@gmail.com', '3', '423123');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `car_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `feedback` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `car_id`, `name`, `rating`, `feedback`, `created_at`, `updated_at`) VALUES
(1, 1, 'John Doe', 4, 'Great car, spacious and comfortable for long trips.', '2024-02-23 16:49:33', '2024-02-23 16:49:33'),
(2, 1, 'Jane Smith', 5, 'The S-Cross is fuel-efficient and easy to drive.', '2024-02-23 16:49:33', '2024-02-23 16:49:33'),
(3, 2, 'Alice Johnson', 5, 'I love the City! Smooth ride and stylish design.', '2024-02-23 16:49:33', '2024-02-23 16:49:33'),
(4, 2, 'Bob Williams', 4, 'Comfortable seating and ample legroom in the back.', '2024-02-23 16:49:33', '2024-02-23 16:49:33'),
(5, 3, 'Charlie Brown', 4, 'The Range Rover is a beast on and off the road.', '2024-02-23 16:49:33', '2024-02-23 16:49:33'),
(6, 3, 'Eva Davis', 5, 'Luxurious interior and advanced technology features.', '2024-02-23 16:49:33', '2024-02-23 16:49:33'),
(7, 4, 'Grace Wilson', 4, 'The Civic handles well and has great fuel economy.', '2024-02-23 16:49:33', '2024-02-23 16:49:33'),
(8, 4, 'Harry Taylor', 3, 'Could use more storage space in the trunk.', '2024-02-23 16:49:33', '2024-02-23 16:49:33'),
(9, 5, 'Olivia Martinez', 5, 'The Audi A4 is a dream to drive, smooth and powerful.', '2024-02-23 16:49:33', '2024-02-23 16:49:33'),
(10, 5, 'Sam Robinson', 5, 'Excellent build quality and attention to detail.', '2024-02-23 16:49:33', '2024-02-23 16:49:33'),
(11, 6, 'Sophia Anderson', 4, 'The Toyota Camry is reliable and comfortable.', '2024-02-23 16:49:33', '2024-02-23 16:49:33'),
(12, 6, 'Thomas Clark', 4, 'Good fuel economy for a car of its size.', '2024-02-23 16:49:33', '2024-02-23 16:49:33'),
(13, 7, 'William White', 5, 'The BMW X5 is a perfect blend of luxury and performance.', '2024-02-23 16:49:33', '2024-02-23 16:49:33'),
(14, 7, 'Zoe Hall', 5, 'Spacious interior with plenty of legroom.', '2024-02-23 16:49:33', '2024-02-23 16:49:33'),
(15, 8, 'Aaron Garcia', 4, 'The Mercedes-Benz E-Class is elegant and refined.', '2024-02-23 16:49:33', '2024-02-23 16:49:33'),
(16, 8, 'Bella Lee', 4, 'Smooth ride and advanced safety features.', '2024-02-23 16:49:33', '2024-02-23 16:49:33'),
(17, 9, 'Chris Lopez', 5, 'The Ford Mustang is a true American classic.', '2024-02-23 16:49:33', '2024-02-23 16:49:33'),
(18, 9, 'Diana Nguyen', 4, 'Powerful engine and responsive handling.', '2024-02-23 16:49:33', '2024-02-23 16:49:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` text NOT NULL,
  `contact_number` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `car_bookings`
--
ALTER TABLE `car_bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `car_id` (`car_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`),
  ADD KEY `car_id` (`car_id`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
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
-- AUTO_INCREMENT for table `admin_user`
--
ALTER TABLE `admin_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `car_bookings`
--
ALTER TABLE `car_bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `car_bookings`
--
ALTER TABLE `car_bookings`
  ADD CONSTRAINT `car_bookings_ibfk_1` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`);

--
-- Constraints for table `features`
--
ALTER TABLE `features`
  ADD CONSTRAINT `car_id` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
