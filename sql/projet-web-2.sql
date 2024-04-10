-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2024 at 05:37 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projet-web-2`
--

-- --------------------------------------------------------

--
-- Table structure for table `annees`
--

CREATE TABLE `annees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `annee` smallint(5) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `annees`
--

INSERT INTO `annees` (`id`, `annee`, `created_at`, `updated_at`) VALUES
(1, 1900, NULL, NULL),
(2, 1901, NULL, NULL),
(3, 1902, NULL, NULL),
(4, 1903, NULL, NULL),
(5, 1904, NULL, NULL),
(6, 1905, NULL, NULL),
(7, 1906, NULL, NULL),
(8, 1907, NULL, NULL),
(9, 1908, NULL, NULL),
(10, 1909, NULL, NULL),
(11, 1910, NULL, NULL),
(12, 1911, NULL, NULL),
(13, 1912, NULL, NULL),
(14, 1913, NULL, NULL),
(15, 1914, NULL, NULL),
(16, 1915, NULL, NULL),
(17, 1916, NULL, NULL),
(18, 1917, NULL, NULL),
(19, 1918, NULL, NULL),
(20, 1919, NULL, NULL),
(21, 1920, NULL, NULL),
(22, 1921, NULL, NULL),
(23, 1922, NULL, NULL),
(24, 1923, NULL, NULL),
(25, 1924, NULL, NULL),
(26, 1925, NULL, NULL),
(27, 1926, NULL, NULL),
(28, 1927, NULL, NULL),
(29, 1928, NULL, NULL),
(30, 1929, NULL, NULL),
(31, 1930, NULL, NULL),
(32, 1931, NULL, NULL),
(33, 1932, NULL, NULL),
(34, 1933, NULL, NULL),
(35, 1934, NULL, NULL),
(36, 1935, NULL, NULL),
(37, 1936, NULL, NULL),
(38, 1937, NULL, NULL),
(39, 1938, NULL, NULL),
(40, 1939, NULL, NULL),
(41, 1940, NULL, NULL),
(42, 1941, NULL, NULL),
(43, 1942, NULL, NULL),
(44, 1943, NULL, NULL),
(45, 1944, NULL, NULL),
(46, 1945, NULL, NULL),
(47, 1946, NULL, NULL),
(48, 1947, NULL, NULL),
(49, 1948, NULL, NULL),
(50, 1949, NULL, NULL),
(51, 1950, NULL, NULL),
(52, 1951, NULL, NULL),
(53, 1952, NULL, NULL),
(54, 1953, NULL, NULL),
(55, 1954, NULL, NULL),
(56, 1955, NULL, NULL),
(57, 1956, NULL, NULL),
(58, 1957, NULL, NULL),
(59, 1958, NULL, NULL),
(60, 1959, NULL, NULL),
(61, 1960, NULL, NULL),
(62, 1961, NULL, NULL),
(63, 1962, NULL, NULL),
(64, 1963, NULL, NULL),
(65, 1964, NULL, NULL),
(66, 1965, NULL, NULL),
(67, 1966, NULL, NULL),
(68, 1967, NULL, NULL),
(69, 1968, NULL, NULL),
(70, 1969, NULL, NULL),
(71, 1970, NULL, NULL),
(72, 1971, NULL, NULL),
(73, 1972, NULL, NULL),
(74, 1973, NULL, NULL),
(75, 1974, NULL, NULL),
(76, 1975, NULL, NULL),
(77, 1976, NULL, NULL),
(78, 1977, NULL, NULL),
(79, 1978, NULL, NULL),
(80, 1979, NULL, NULL),
(81, 1980, NULL, NULL),
(82, 1981, NULL, NULL),
(83, 1982, NULL, NULL),
(84, 1983, NULL, NULL),
(85, 1984, NULL, NULL),
(86, 1985, NULL, NULL),
(87, 1986, NULL, NULL),
(88, 1987, NULL, NULL),
(89, 1988, NULL, NULL),
(90, 1989, NULL, NULL),
(91, 1990, NULL, NULL),
(92, 1991, NULL, NULL),
(93, 1992, NULL, NULL),
(94, 1993, NULL, NULL),
(95, 1994, NULL, NULL),
(96, 1995, NULL, NULL),
(97, 1996, NULL, NULL),
(98, 1997, NULL, NULL),
(99, 1998, NULL, NULL),
(100, 1999, NULL, NULL),
(101, 2000, NULL, NULL),
(102, 2001, NULL, NULL),
(103, 2002, NULL, NULL),
(104, 2003, NULL, NULL),
(105, 2004, NULL, NULL),
(106, 2005, NULL, NULL),
(107, 2006, NULL, NULL),
(108, 2007, NULL, NULL),
(109, 2008, NULL, NULL),
(110, 2009, NULL, NULL),
(111, 2010, NULL, NULL),
(112, 2011, NULL, NULL),
(113, 2012, NULL, NULL),
(114, 2013, NULL, NULL),
(115, 2014, NULL, NULL),
(116, 2015, NULL, NULL),
(117, 2016, NULL, NULL),
(118, 2017, NULL, NULL),
(119, 2018, NULL, NULL),
(120, 2019, NULL, NULL),
(121, 2020, NULL, NULL),
(122, 2021, NULL, NULL),
(123, 2022, NULL, NULL),
(124, 2023, NULL, NULL),
(125, 2024, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(191) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(191) NOT NULL,
  `owner` varchar(191) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carburants`
--

CREATE TABLE `carburants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`nom`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carburants`
--

INSERT INTO `carburants` (`id`, `nom`, `created_at`, `updated_at`) VALUES
(1, '{\"en\":\"Gas\",\"fr\":\"Essence\"}', NULL, NULL),
(2, '{\"en\":\"Diesel\",\"fr\":\"Diesel\"}', NULL, NULL),
(3, '{\"en\":\"Hybrid\",\"fr\":\"Hybride\"}', NULL, NULL),
(4, '{\"en\":\"Electric\",\"fr\":\"Électrique\"}', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `carrosseries`
--

CREATE TABLE `carrosseries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`nom`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carrosseries`
--

INSERT INTO `carrosseries` (`id`, `nom`, `created_at`, `updated_at`) VALUES
(1, '{\"en\":\"Sedan\",\"fr\":\"Berline\"}', NULL, NULL),
(2, '{\"en\":\"Coupe\",\"fr\":\"Coupé\"}', NULL, NULL),
(3, '{\"en\":\"Hatchback\",\"fr\":\"Compacte\"}', NULL, NULL),
(4, '{\"en\":\"SUV\",\"fr\":\"VUS\"}', NULL, NULL),
(5, '{\"en\":\"Pickup\",\"fr\":\"Camionnette\"}', NULL, NULL),
(6, '{\"en\":\"Convertible\",\"fr\":\"Cabriolet\"}', NULL, NULL),
(7, '{\"en\":\"Minivan\",\"fr\":\"Monospace\"}', NULL, NULL),
(8, '{\"en\":\"Crossover\",\"fr\":\"Crossover\"}', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `commandes`
--

CREATE TABLE `commandes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `voiture_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `payment_id` bigint(20) UNSIGNED NOT NULL,
  `statut_id` bigint(20) UNSIGNED NOT NULL,
  `expedition_id` bigint(20) UNSIGNED NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `quantite` int(11) NOT NULL,
  `prix` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `commande_taxes`
--

CREATE TABLE `commande_taxes` (
  `commande_id` bigint(20) UNSIGNED NOT NULL,
  `tax_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expeditions`
--

CREATE TABLE `expeditions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expeditions`
--

INSERT INTO `expeditions` (`id`, `nom`, `created_at`, `updated_at`) VALUES
(1, '{\"en\": \"Local Delivery with Fixed Price\", \"fr\": \"Livraison locale avec un prix fixe\"}', NULL, NULL),
(2, '{\"en\": \"Customer Pickup\", \"fr\": \"Ramassage du client\"}', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(191) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(191) NOT NULL,
  `name` varchar(191) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `journals`
--

CREATE TABLE `journals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ip` varchar(191) NOT NULL,
  `nom` varchar(191) NOT NULL,
  `page_visite` varchar(191) NOT NULL,
  `date_visite` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `marques`
--

CREATE TABLE `marques` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `marques`
--

INSERT INTO `marques` (`id`, `nom`, `created_at`, `updated_at`) VALUES
(1, 'Ford', NULL, NULL),
(2, 'Chevrolet', NULL, NULL),
(3, 'Toyota', NULL, NULL),
(4, 'Honda', NULL, NULL),
(5, 'Ram', NULL, NULL),
(6, 'GMC', NULL, NULL),
(7, 'Volkswagen', NULL, NULL),
(8, 'Hyundai', NULL, NULL),
(9, 'Nissan', NULL, NULL),
(10, 'Jeep', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000001_create_cache_table', 1),
(2, '0001_01_01_000002_create_jobs_table', 1),
(3, '2024_04_05_042247_create_pays_table', 1),
(4, '2024_04_05_042755_create_provences_table', 1),
(5, '2024_04_05_043016_create_villes_table', 1),
(6, '2024_04_05_043233_create_privileges_table', 1),
(7, '2024_04_05_043234_create_users_table', 1),
(8, '2024_04_05_045628_create_marques_table', 1),
(9, '2024_04_05_045821_create_annees_table', 1),
(10, '2024_04_05_050706_create_modeles_table', 1),
(11, '2024_04_05_051546_create_transmissions_table', 1),
(12, '2024_04_05_052419_create_tractions_table', 1),
(13, '2024_04_05_052518_create_carburants_table', 1),
(14, '2024_04_05_052633_create_carrosseries_table', 1),
(15, '2024_04_05_154158_create_statuts_table', 1),
(16, '2024_04_05_154646_create_voitures_table', 1),
(17, '2024_04_05_155626_create_payments_table', 1),
(18, '2024_04_05_160613_create_expeditions_table', 1),
(19, '2024_04_05_181054_create_photos_table', 1),
(20, '2024_04_07_193133_create_journals_table', 1),
(21, '2024_04_09_175028_create_taxes_table', 1),
(22, '2024_04_09_175231_create_commandes_table', 1),
(23, '2024_04_09_175232_create_commande_taxes_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `modeles`
--

CREATE TABLE `modeles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(191) NOT NULL,
  `marque_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `modeles`
--

INSERT INTO `modeles` (`id`, `nom`, `marque_id`, `created_at`, `updated_at`) VALUES
(1, 'F-150', 1, NULL, NULL),
(2, 'Mustang', 1, NULL, NULL),
(3, 'Explorer', 1, NULL, NULL),
(4, 'Escape', 1, NULL, NULL),
(5, 'Focus', 1, NULL, NULL),
(6, 'Fusion', 1, NULL, NULL),
(7, 'Ranger', 1, NULL, NULL),
(8, 'Edge', 1, NULL, NULL),
(9, 'Expedition', 1, NULL, NULL),
(10, 'Bronco', 1, NULL, NULL),
(11, 'Silverado', 2, NULL, NULL),
(12, 'Camaro', 2, NULL, NULL),
(13, 'Equinox', 2, NULL, NULL),
(14, 'Tahoe', 2, NULL, NULL),
(15, 'Malibu', 2, NULL, NULL),
(16, 'Traverse', 2, NULL, NULL),
(17, 'Colorado', 2, NULL, NULL),
(18, 'Suburban', 2, NULL, NULL),
(19, 'Impala', 2, NULL, NULL),
(20, 'Trailblazer', 2, NULL, NULL),
(21, 'Corolla', 3, NULL, NULL),
(22, 'Camry', 3, NULL, NULL),
(23, 'RAV4', 3, NULL, NULL),
(24, 'Tacoma', 3, NULL, NULL),
(25, 'Highlander', 3, NULL, NULL),
(26, 'Prius', 3, NULL, NULL),
(27, '4Runner', 3, NULL, NULL),
(28, 'Tundra', 3, NULL, NULL),
(29, 'Sienna', 3, NULL, NULL),
(30, 'Avalon', 3, NULL, NULL),
(31, 'Civic', 4, NULL, NULL),
(32, 'Accord', 4, NULL, NULL),
(33, 'CR-V', 4, NULL, NULL),
(34, 'Pilot', 4, NULL, NULL),
(35, 'Odyssey', 4, NULL, NULL),
(36, 'HR-V', 4, NULL, NULL),
(37, 'Fit', 4, NULL, NULL),
(38, 'Ridgeline', 4, NULL, NULL),
(39, 'Passport', 4, NULL, NULL),
(40, 'Insight', 4, NULL, NULL),
(41, '1500', 5, NULL, NULL),
(42, '2500', 5, NULL, NULL),
(43, '3500', 5, NULL, NULL),
(44, 'ProMaster', 5, NULL, NULL),
(45, 'ProMaster City', 5, NULL, NULL),
(46, 'Rebel', 5, NULL, NULL),
(47, 'Power Wagon', 5, NULL, NULL),
(48, 'Chassis Cab', 5, NULL, NULL),
(49, 'Tradesman', 5, NULL, NULL),
(50, 'Laramie', 5, NULL, NULL),
(51, 'Sierra', 6, NULL, NULL),
(52, 'Acadia', 6, NULL, NULL),
(53, 'Terrain', 6, NULL, NULL),
(54, 'Yukon', 6, NULL, NULL),
(55, 'Canyon', 6, NULL, NULL),
(56, 'Savana', 6, NULL, NULL),
(57, 'Envoy', 6, NULL, NULL),
(58, 'Jimmy', 6, NULL, NULL),
(59, 'Syclone', 6, NULL, NULL),
(60, 'TopKick', 6, NULL, NULL),
(61, 'Jetta', 7, NULL, NULL),
(62, 'Golf', 7, NULL, NULL),
(63, 'Passat', 7, NULL, NULL),
(64, 'Tiguan', 7, NULL, NULL),
(65, 'Atlas', 7, NULL, NULL),
(66, 'Arteon', 7, NULL, NULL),
(67, 'Touareg', 7, NULL, NULL),
(68, 'ID.4', 7, NULL, NULL),
(69, 'Beetle', 7, NULL, NULL),
(70, 'CC', 7, NULL, NULL),
(71, 'Elantra', 8, NULL, NULL),
(72, 'Sonata', 8, NULL, NULL),
(73, 'Tucson', 8, NULL, NULL),
(74, 'Santa Fe', 8, NULL, NULL),
(75, 'Accent', 8, NULL, NULL),
(76, 'Palisade', 8, NULL, NULL),
(77, 'Kona', 8, NULL, NULL),
(78, 'Venue', 8, NULL, NULL),
(79, 'Veloster', 8, NULL, NULL),
(80, 'IONIQ', 8, NULL, NULL),
(81, 'Altima', 9, NULL, NULL),
(82, 'Rogue', 9, NULL, NULL),
(83, 'Sentra', 9, NULL, NULL),
(84, 'Frontier', 9, NULL, NULL),
(85, 'Pathfinder', 9, NULL, NULL),
(86, 'Murano', 9, NULL, NULL),
(87, 'Maxima', 9, NULL, NULL),
(88, 'Titan', 9, NULL, NULL),
(89, 'Versa', 9, NULL, NULL),
(90, 'Armada', 9, NULL, NULL),
(91, 'Wrangler', 10, NULL, NULL),
(92, 'Grand Cherokee', 10, NULL, NULL),
(93, 'Cherokee', 10, NULL, NULL),
(94, 'Compass', 10, NULL, NULL),
(95, 'Renegade', 10, NULL, NULL),
(96, 'Gladiator', 10, NULL, NULL),
(97, 'Patriot', 10, NULL, NULL),
(98, 'Commander', 10, NULL, NULL),
(99, 'Liberty', 10, NULL, NULL),
(100, 'Wagoneer', 10, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `courriel` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`nom`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `nom`, `created_at`, `updated_at`) VALUES
(1, '{\"en\": \"Cash\", \"fr\": \"Argent comptant\"}', NULL, NULL),
(2, '{\"en\": \"Credit Card\", \"fr\": \"Carte de crédit\"}', NULL, NULL),
(3, '{\"en\": \"Debit Card\", \"fr\": \"Carte de débit\"}', NULL, NULL),
(4, '{\"en\": \"Bank Transfer\", \"fr\": \"Virement bancaire\"}', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pays`
--

CREATE TABLE `pays` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`nom`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pays`
--

INSERT INTO `pays` (`id`, `nom`, `created_at`, `updated_at`) VALUES
(1, '{\"en\": \"Canada\", \"fr\": \"Canada\"}', NULL, NULL),
(2, '{\"en\": \"United States\", \"fr\": \"États-Unis\"}', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(191) NOT NULL,
  `principal` tinyint(1) NOT NULL DEFAULT 1,
  `voiture_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `privileges`
--

CREATE TABLE `privileges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `privileges`
--

INSERT INTO `privileges` (`id`, `nom`, `created_at`, `updated_at`) VALUES
(1, 'client', NULL, NULL),
(2, 'employé', NULL, NULL),
(3, 'administrateur', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `provences`
--

CREATE TABLE `provences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`nom`)),
  `pays_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `provences`
--

INSERT INTO `provences` (`id`, `nom`, `pays_id`, `created_at`, `updated_at`) VALUES
(1, '{\"en\": \"Alberta\", \"fr\": \"Alberta\"}', 1, NULL, NULL),
(2, '{\"en\": \"British Columbia\", \"fr\": \"Colombie-Britannique\"}', 1, NULL, NULL),
(3, '{\"en\": \"Manitoba\", \"fr\": \"Manitoba\"}', 1, NULL, NULL),
(4, '{\"en\": \"New Brunswick\", \"fr\": \"Nouveau-Brunswick\"}', 1, NULL, NULL),
(5, '{\"en\": \"Newfoundland and Labrador\", \"fr\": \"Terre-Neuve-et-Labrador\"}', 1, NULL, NULL),
(6, '{\"en\": \"Nova Scotia\", \"fr\": \"Nouvelle-Écosse\"}', 1, NULL, NULL),
(7, '{\"en\": \"Ontario\", \"fr\": \"Ontario\"}', 1, NULL, NULL),
(8, '{\"en\": \"Prince Edward Island\", \"fr\": \"Île-du-Prince-Édouard\"}', 1, NULL, NULL),
(9, '{\"en\": \"Quebec\", \"fr\": \"Québec\"}', 1, NULL, NULL),
(10, '{\"en\": \"Saskatchewan\", \"fr\": \"Saskatchewan\"}', 1, NULL, NULL),
(11, '{\"en\": \"Northwest Territories\", \"fr\": \"Territoires du Nord-Ouest\"}', 1, NULL, NULL),
(12, '{\"en\": \"Nunavut\", \"fr\": \"Nunavut\"}', 1, NULL, NULL),
(13, '{\"en\": \"Yukon\", \"fr\": \"Yukon\"}', 1, NULL, NULL),
(14, '{\"en\": \"Alabama\", \"fr\": \"Alabama\"}', 2, NULL, NULL),
(15, '{\"en\": \"Alaska\", \"fr\": \"Alaska\"}', 2, NULL, NULL),
(16, '{\"en\": \"Arizona\", \"fr\": \"Arizona\"}', 2, NULL, NULL),
(17, '{\"en\": \"Arkansas\", \"fr\": \"Arkansas\"}', 2, NULL, NULL),
(18, '{\"en\": \"California\", \"fr\": \"Californie\"}', 2, NULL, NULL),
(19, '{\"en\": \"Colorado\", \"fr\": \"Colorado\"}', 2, NULL, NULL),
(20, '{\"en\": \"Connecticut\", \"fr\": \"Connecticut\"}', 2, NULL, NULL),
(21, '{\"en\": \"Delaware\", \"fr\": \"Delaware\"}', 2, NULL, NULL),
(22, '{\"en\": \"Florida\", \"fr\": \"Floride\"}', 2, NULL, NULL),
(23, '{\"en\": \"Georgia\", \"fr\": \"Géorgie\"}', 2, NULL, NULL),
(24, '{\"en\": \"Hawaii\", \"fr\": \"Hawaï\"}', 2, NULL, NULL),
(25, '{\"en\": \"Idaho\", \"fr\": \"Idaho\"}', 2, NULL, NULL),
(26, '{\"en\": \"Illinois\", \"fr\": \"Illinois\"}', 2, NULL, NULL),
(27, '{\"en\": \"Indiana\", \"fr\": \"Indiana\"}', 2, NULL, NULL),
(28, '{\"en\": \"Iowa\", \"fr\": \"Iowa\"}', 2, NULL, NULL),
(29, '{\"en\": \"Kansas\", \"fr\": \"Kansas\"}', 2, NULL, NULL),
(30, '{\"en\": \"Kentucky\", \"fr\": \"Kentucky\"}', 2, NULL, NULL),
(31, '{\"en\": \"Louisiana\", \"fr\": \"Louisiane\"}', 2, NULL, NULL),
(32, '{\"en\": \"Maine\", \"fr\": \"Maine\"}', 2, NULL, NULL),
(33, '{\"en\": \"Maryland\", \"fr\": \"Maryland\"}', 2, NULL, NULL),
(34, '{\"en\": \"Massachusetts\", \"fr\": \"Massachusetts\"}', 2, NULL, NULL),
(35, '{\"en\": \"Michigan\", \"fr\": \"Michigan\"}', 2, NULL, NULL),
(36, '{\"en\": \"Minnesota\", \"fr\": \"Minnesota\"}', 2, NULL, NULL),
(37, '{\"en\": \"Mississippi\", \"fr\": \"Mississippi\"}', 2, NULL, NULL),
(38, '{\"en\": \"Missouri\", \"fr\": \"Missouri\"}', 2, NULL, NULL),
(39, '{\"en\": \"Montana\", \"fr\": \"Montana\"}', 2, NULL, NULL),
(40, '{\"en\": \"Nebraska\", \"fr\": \"Nebraska\"}', 2, NULL, NULL),
(41, '{\"en\": \"Nevada\", \"fr\": \"Nevada\"}', 2, NULL, NULL),
(42, '{\"en\": \"New Hampshire\", \"fr\": \"New Hampshire\"}', 2, NULL, NULL),
(43, '{\"en\": \"New Jersey\", \"fr\": \"New Jersey\"}', 2, NULL, NULL),
(44, '{\"en\": \"New Mexico\", \"fr\": \"Nouveau-Mexique\"}', 2, NULL, NULL),
(45, '{\"en\": \"New York\", \"fr\": \"New York\"}', 2, NULL, NULL),
(46, '{\"en\": \"North Carolina\", \"fr\": \"Caroline du Nord\"}', 2, NULL, NULL),
(47, '{\"en\": \"North Dakota\", \"fr\": \"Dakota du Nord\"}', 2, NULL, NULL),
(48, '{\"en\": \"Ohio\", \"fr\": \"Ohio\"}', 2, NULL, NULL),
(49, '{\"en\": \"Oklahoma\", \"fr\": \"Oklahoma\"}', 2, NULL, NULL),
(50, '{\"en\": \"Oregon\", \"fr\": \"Oregon\"}', 2, NULL, NULL),
(51, '{\"en\": \"Pennsylvania\", \"fr\": \"Pennsylvanie\"}', 2, NULL, NULL),
(52, '{\"en\": \"Rhode Island\", \"fr\": \"Rhode Island\"}', 2, NULL, NULL),
(53, '{\"en\": \"South Carolina\", \"fr\": \"Caroline du Sud\"}', 2, NULL, NULL),
(54, '{\"en\": \"South Dakota\", \"fr\": \"Dakota du Sud\"}', 2, NULL, NULL),
(55, '{\"en\": \"Tennessee\", \"fr\": \"Tennessee\"}', 2, NULL, NULL),
(56, '{\"en\": \"Texas\", \"fr\": \"Texas\"}', 2, NULL, NULL),
(57, '{\"en\": \"Utah\", \"fr\": \"Utah\"}', 2, NULL, NULL),
(58, '{\"en\": \"Vermont\", \"fr\": \"Vermont\"}', 2, NULL, NULL),
(59, '{\"en\": \"Virginia\", \"fr\": \"Virginie\"}', 2, NULL, NULL),
(60, '{\"en\": \"Washington\", \"fr\": \"Washington\"}', 2, NULL, NULL),
(61, '{\"en\": \"West Virginia\", \"fr\": \"Virginie-Occidentale\"}', 2, NULL, NULL),
(62, '{\"en\": \"Wisconsin\", \"fr\": \"Wisconsin\"}', 2, NULL, NULL),
(63, '{\"en\": \"Wyoming\", \"fr\": \"Wyoming\"}', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(191) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `statuts`
--

CREATE TABLE `statuts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `statuts`
--

INSERT INTO `statuts` (`id`, `nom`, `created_at`, `updated_at`) VALUES
(1, '{\"en\": \"Pending\", \"fr\": \"En attente\"}', NULL, NULL),
(2, '{\"en\": \"Reserved\", \"fr\": \"Réservé\"}', NULL, NULL),
(3, '{\"en\": \"Invoiced\", \"fr\": \"Facturé\"}', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `taxes`
--

CREATE TABLE `taxes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(191) NOT NULL,
  `valeur` decimal(6,3) NOT NULL,
  `provence_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `taxes`
--

INSERT INTO `taxes` (`id`, `nom`, `valeur`, `provence_id`, `created_at`, `updated_at`) VALUES
(1, 'GST/HST', 5.000, 1, NULL, NULL),
(2, 'GST/HST', 5.000, 2, NULL, NULL),
(3, 'PST/RST/QST', 7.000, 2, NULL, NULL),
(4, 'GST/HST', 5.000, 3, NULL, NULL),
(5, 'PST/RST/QST', 7.000, 3, NULL, NULL),
(6, 'GST/HST', 15.000, 4, NULL, NULL),
(7, 'GST/HST', 15.000, 5, NULL, NULL),
(8, 'GST/HST', 15.000, 6, NULL, NULL),
(9, 'GST/HST', 13.000, 7, NULL, NULL),
(10, 'GST/HST', 15.000, 8, NULL, NULL),
(11, 'GST/HST', 5.000, 9, NULL, NULL),
(12, 'PST/RST/QST', 9.975, 9, NULL, NULL),
(13, 'GST/HST', 5.000, 10, NULL, NULL),
(14, 'PST/RST/QST', 6.000, 10, NULL, NULL),
(15, 'GST/HST', 5.000, 11, NULL, NULL),
(16, 'GST/HST', 5.000, 12, NULL, NULL),
(17, 'GST/HST', 5.000, 13, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tractions`
--

CREATE TABLE `tractions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`nom`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tractions`
--

INSERT INTO `tractions` (`id`, `nom`, `created_at`, `updated_at`) VALUES
(1, '{\"en\":\"Front-wheel drive\",\"fr\":\"Traction avant\"}', NULL, NULL),
(2, '{\"en\":\"Rear-wheel drive\",\"fr\":\"Propulsion arrière\"}', NULL, NULL),
(3, '{\"en\":\"All-wheel drive\",\"fr\":\"Traction intégrale\"}', NULL, NULL),
(4, '{\"en\":\"Four-wheel drive\",\"fr\":\"Quatre roues motrices\"}', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transmissions`
--

CREATE TABLE `transmissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`nom`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transmissions`
--

INSERT INTO `transmissions` (`id`, `nom`, `created_at`, `updated_at`) VALUES
(1, '{\"en\":\"Manual\",\"fr\":\"Manuelle\"}', NULL, NULL),
(2, '{\"en\":\"Automatic\",\"fr\":\"Automatique\"}', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(191) NOT NULL,
  `date_de_naissance` date NOT NULL,
  `code_postal` varchar(191) NOT NULL,
  `telephone` varchar(191) NOT NULL,
  `courriel` varchar(191) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `mot_de_passe` varchar(191) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `privilege_id` bigint(20) UNSIGNED NOT NULL,
  `ville_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `villes`
--

CREATE TABLE `villes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`nom`)),
  `provence_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `villes`
--

INSERT INTO `villes` (`id`, `nom`, `provence_id`, `created_at`, `updated_at`) VALUES
(1, '{\"en\": \"Calgary\", \"fr\": \"Calgary\"}', 1, NULL, NULL),
(2, '{\"en\": \"Edmonton\", \"fr\": \"Edmonton\"}', 1, NULL, NULL),
(3, '{\"en\": \"Red Deer\", \"fr\": \"Red Deer\"}', 1, NULL, NULL),
(4, '{\"en\": \"Lethbridge\", \"fr\": \"Lethbridge\"}', 1, NULL, NULL),
(5, '{\"en\": \"Medicine Hat\", \"fr\": \"Medicine Hat\"}', 1, NULL, NULL),
(6, '{\"en\": \"Airdrie\", \"fr\": \"Airdrie\"}', 1, NULL, NULL),
(7, '{\"en\": \"St. Albert\", \"fr\": \"St. Albert\"}', 1, NULL, NULL),
(8, '{\"en\": \"Grande Prairie\", \"fr\": \"Grande Prairie\"}', 1, NULL, NULL),
(9, '{\"en\": \"Fort McMurray\", \"fr\": \"Fort McMurray\"}', 1, NULL, NULL),
(10, '{\"en\": \"Chestermere\", \"fr\": \"Chestermere\"}', 1, NULL, NULL),
(11, '{\"en\": \"Vancouver\", \"fr\": \"Vancouver\"}', 2, NULL, NULL),
(12, '{\"en\": \"Surrey\", \"fr\": \"Surrey\"}', 2, NULL, NULL),
(13, '{\"en\": \"Burnaby\", \"fr\": \"Burnaby\"}', 2, NULL, NULL),
(14, '{\"en\": \"Richmond\", \"fr\": \"Richmond\"}', 2, NULL, NULL),
(15, '{\"en\": \"Kelowna\", \"fr\": \"Kelowna\"}', 2, NULL, NULL),
(16, '{\"en\": \"Victoria\", \"fr\": \"Victoria\"}', 2, NULL, NULL),
(17, '{\"en\": \"Abbotsford\", \"fr\": \"Abbotsford\"}', 2, NULL, NULL),
(18, '{\"en\": \"Nanaimo\", \"fr\": \"Nanaimo\"}', 2, NULL, NULL),
(19, '{\"en\": \"Kamloops\", \"fr\": \"Kamloops\"}', 2, NULL, NULL),
(20, '{\"en\": \"Langley\", \"fr\": \"Langley\"}', 2, NULL, NULL),
(21, '{\"en\": \"Winnipeg\", \"fr\": \"Winnipeg\"}', 3, NULL, NULL),
(22, '{\"en\": \"Brandon\", \"fr\": \"Brandon\"}', 3, NULL, NULL),
(23, '{\"en\": \"Steinbach\", \"fr\": \"Steinbach\"}', 3, NULL, NULL),
(24, '{\"en\": \"Portage la Prairie\", \"fr\": \"Portage la Prairie\"}', 3, NULL, NULL),
(25, '{\"en\": \"Thompson\", \"fr\": \"Thompson\"}', 3, NULL, NULL),
(26, '{\"en\": \"Selkirk\", \"fr\": \"Selkirk\"}', 3, NULL, NULL),
(27, '{\"en\": \"Dauphin\", \"fr\": \"Dauphin\"}', 3, NULL, NULL),
(28, '{\"en\": \"Morden\", \"fr\": \"Morden\"}', 3, NULL, NULL),
(29, '{\"en\": \"The Pas\", \"fr\": \"The Pas\"}', 3, NULL, NULL),
(30, '{\"en\": \"Flin Flon\", \"fr\": \"Flin Flon\"}', 3, NULL, NULL),
(31, '{\"en\": \"Saint John\", \"fr\": \"Saint John\"}', 4, NULL, NULL),
(32, '{\"en\": \"Moncton\", \"fr\": \"Moncton\"}', 4, NULL, NULL),
(33, '{\"en\": \"Fredericton\", \"fr\": \"Fredericton\"}', 4, NULL, NULL),
(34, '{\"en\": \"Dieppe\", \"fr\": \"Dieppe\"}', 4, NULL, NULL),
(35, '{\"en\": \"Miramichi\", \"fr\": \"Miramichi\"}', 4, NULL, NULL),
(36, '{\"en\": \"Edmundston\", \"fr\": \"Edmundston\"}', 4, NULL, NULL),
(37, '{\"en\": \"Bathurst\", \"fr\": \"Bathurst\"}', 4, NULL, NULL),
(38, '{\"en\": \"Campbellton\", \"fr\": \"Campbellton\"}', 4, NULL, NULL),
(39, '{\"en\": \"Oromocto\", \"fr\": \"Oromocto\"}', 4, NULL, NULL),
(40, '{\"en\": \"Grand Falls\", \"fr\": \"Grand Falls\"}', 4, NULL, NULL),
(41, '{\"en\": \"St. John\'s\", \"fr\": \"St. John\'s\"}', 5, NULL, NULL),
(42, '{\"en\": \"Mount Pearl\", \"fr\": \"Mount Pearl\"}', 5, NULL, NULL),
(43, '{\"en\": \"Corner Brook\", \"fr\": \"Corner Brook\"}', 5, NULL, NULL),
(44, '{\"en\": \"Grand Falls-Windsor\", \"fr\": \"Grand Falls-Windsor\"}', 5, NULL, NULL),
(45, '{\"en\": \"Labrador City\", \"fr\": \"Labrador City\"}', 5, NULL, NULL),
(46, '{\"en\": \"Halifax\", \"fr\": \"Halifax\"}', 6, NULL, NULL),
(47, '{\"en\": \"Dartmouth\", \"fr\": \"Dartmouth\"}', 6, NULL, NULL),
(48, '{\"en\": \"Sydney\", \"fr\": \"Sydney\"}', 6, NULL, NULL),
(49, '{\"en\": \"Truro\", \"fr\": \"Truro\"}', 6, NULL, NULL),
(50, '{\"en\": \"New Glasgow\", \"fr\": \"New Glasgow\"}', 6, NULL, NULL),
(51, '{\"en\": \"Bridgewater\", \"fr\": \"Bridgewater\"}', 6, NULL, NULL),
(52, '{\"en\": \"Kentville\", \"fr\": \"Kentville\"}', 6, NULL, NULL),
(53, '{\"en\": \"Amherst\", \"fr\": \"Amherst\"}', 6, NULL, NULL),
(54, '{\"en\": \"Yarmouth\", \"fr\": \"Yarmouth\"}', 6, NULL, NULL),
(55, '{\"en\": \"Antigonish\", \"fr\": \"Antigonish\"}', 6, NULL, NULL),
(56, '{\"en\": \"Toronto\", \"fr\": \"Toronto\"}', 7, NULL, NULL),
(57, '{\"en\": \"Ottawa\", \"fr\": \"Ottawa\"}', 7, NULL, NULL),
(58, '{\"en\": \"Mississauga\", \"fr\": \"Mississauga\"}', 7, NULL, NULL),
(59, '{\"en\": \"Brampton\", \"fr\": \"Brampton\"}', 7, NULL, NULL),
(60, '{\"en\": \"Hamilton\", \"fr\": \"Hamilton\"}', 7, NULL, NULL),
(61, '{\"en\": \"London\", \"fr\": \"London\"}', 7, NULL, NULL),
(62, '{\"en\": \"Markham\", \"fr\": \"Markham\"}', 7, NULL, NULL),
(63, '{\"en\": \"Vaughan\", \"fr\": \"Vaughan\"}', 7, NULL, NULL),
(64, '{\"en\": \"Kitchener\", \"fr\": \"Kitchener\"}', 7, NULL, NULL),
(65, '{\"en\": \"Windsor\", \"fr\": \"Windsor\"}', 7, NULL, NULL),
(66, '{\"en\": \"Charlottetown\", \"fr\": \"Charlottetown\"}', 8, NULL, NULL),
(67, '{\"en\": \"Summerside\", \"fr\": \"Summerside\"}', 8, NULL, NULL),
(68, '{\"en\": \"Stratford\", \"fr\": \"Stratford\"}', 8, NULL, NULL),
(69, '{\"en\": \"Cornwall\", \"fr\": \"Cornwall\"}', 8, NULL, NULL),
(70, '{\"en\": \"Montague\", \"fr\": \"Montague\"}', 8, NULL, NULL),
(71, '{\"en\": \"Kensington\", \"fr\": \"Kensington\"}', 8, NULL, NULL),
(72, '{\"en\": \"Souris\", \"fr\": \"Souris\"}', 8, NULL, NULL),
(73, '{\"en\": \"Alberton\", \"fr\": \"Alberton\"}', 8, NULL, NULL),
(74, '{\"en\": \"Tignish\", \"fr\": \"Tignish\"}', 8, NULL, NULL),
(75, '{\"en\": \"Georgetown\", \"fr\": \"Georgetown\"}', 8, NULL, NULL),
(76, '{\"en\": \"Montreal\", \"fr\": \"Montréal\"}', 9, NULL, NULL),
(77, '{\"en\": \"Quebec City\", \"fr\": \"Ville de Québec\"}', 9, NULL, NULL),
(78, '{\"en\": \"Laval\", \"fr\": \"Laval\"}', 9, NULL, NULL),
(79, '{\"en\": \"Gatineau\", \"fr\": \"Gatineau\"}', 9, NULL, NULL),
(80, '{\"en\": \"Longueuil\", \"fr\": \"Longueuil\"}', 9, NULL, NULL),
(81, '{\"en\": \"Sherbrooke\", \"fr\": \"Sherbrooke\"}', 9, NULL, NULL),
(82, '{\"en\": \"Saguenay\", \"fr\": \"Saguenay\"}', 9, NULL, NULL),
(83, '{\"en\": \"Levis\", \"fr\": \"Lévis\"}', 9, NULL, NULL),
(84, '{\"en\": \"Trois-Rivières\", \"fr\": \"Trois-Rivières\"}', 9, NULL, NULL),
(85, '{\"en\": \"Terrebonne\", \"fr\": \"Terrebonne\"}', 9, NULL, NULL),
(86, '{\"en\": \"Saint-Jean-sur-Richelieu\", \"fr\": \"Saint-Jean-sur-Richelieu\"}', 9, NULL, NULL),
(87, '{\"en\": \"Repentigny\", \"fr\": \"Repentigny\"}', 9, NULL, NULL),
(88, '{\"en\": \"Brossard\", \"fr\": \"Brossard\"}', 9, NULL, NULL),
(89, '{\"en\": \"Drummondville\", \"fr\": \"Drummondville\"}', 9, NULL, NULL),
(90, '{\"en\": \"Saint-Jérôme\", \"fr\": \"Saint-Jérôme\"}', 9, NULL, NULL),
(91, '{\"en\": \"Granby\", \"fr\": \"Granby\"}', 9, NULL, NULL),
(92, '{\"en\": \"Shawinigan\", \"fr\": \"Shawinigan\"}', 9, NULL, NULL),
(93, '{\"en\": \"Saint-Hyacinthe\", \"fr\": \"Saint-Hyacinthe\"}', 9, NULL, NULL),
(94, '{\"en\": \"Beloeil\", \"fr\": \"Beloeil\"}', 9, NULL, NULL),
(95, '{\"en\": \"Châteauguay\", \"fr\": \"Châteauguay\"}', 9, NULL, NULL),
(96, '{\"en\": \"Saskatoon\", \"fr\": \"Saskatoon\"}', 10, NULL, NULL),
(97, '{\"en\": \"Regina\", \"fr\": \"Regina\"}', 10, NULL, NULL),
(98, '{\"en\": \"Prince Albert\", \"fr\": \"Prince Albert\"}', 10, NULL, NULL),
(99, '{\"en\": \"Moose Jaw\", \"fr\": \"Moose Jaw\"}', 10, NULL, NULL),
(100, '{\"en\": \"Yorkton\", \"fr\": \"Yorkton\"}', 10, NULL, NULL),
(101, '{\"en\": \"Swift Current\", \"fr\": \"Swift Current\"}', 10, NULL, NULL),
(102, '{\"en\": \"North Battleford\", \"fr\": \"North Battleford\"}', 10, NULL, NULL),
(103, '{\"en\": \"Estevan\", \"fr\": \"Estevan\"}', 10, NULL, NULL),
(104, '{\"en\": \"Weyburn\", \"fr\": \"Weyburn\"}', 10, NULL, NULL),
(105, '{\"en\": \"Lloydminster\", \"fr\": \"Lloydminster\"}', 10, NULL, NULL),
(106, '{\"en\": \"Yellowknife\", \"fr\": \"Yellowknife\"}', 11, NULL, NULL),
(107, '{\"en\": \"Iqaluit\", \"fr\": \"Iqaluit\"}', 12, NULL, NULL),
(108, '{\"en\": \"Whitehorse\", \"fr\": \"Whitehorse\"}', 13, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `voitures`
--

CREATE TABLE `voitures` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `marque_id` bigint(20) UNSIGNED NOT NULL,
  `modele_id` bigint(20) UNSIGNED NOT NULL,
  `annee_id` bigint(20) UNSIGNED NOT NULL,
  `transmission_id` bigint(20) UNSIGNED NOT NULL,
  `traction_id` bigint(20) UNSIGNED NOT NULL,
  `carburant_id` bigint(20) UNSIGNED NOT NULL,
  `carrosserie_id` bigint(20) UNSIGNED NOT NULL,
  `proprietaire` bigint(20) UNSIGNED NOT NULL,
  `date_arrive` timestamp NOT NULL DEFAULT current_timestamp(),
  `prix_paye` decimal(10,2) NOT NULL,
  `prix_vente` decimal(10,2) NOT NULL,
  `disponible` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `annees`
--
ALTER TABLE `annees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `carburants`
--
ALTER TABLE `carburants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carrosseries`
--
ALTER TABLE `carrosseries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commandes`
--
ALTER TABLE `commandes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `commandes_voiture_id_foreign` (`voiture_id`),
  ADD KEY `commandes_user_id_foreign` (`user_id`),
  ADD KEY `commandes_payment_id_foreign` (`payment_id`),
  ADD KEY `commandes_statut_id_foreign` (`statut_id`),
  ADD KEY `commandes_expedition_id_foreign` (`expedition_id`);

--
-- Indexes for table `commande_taxes`
--
ALTER TABLE `commande_taxes`
  ADD PRIMARY KEY (`commande_id`,`tax_id`),
  ADD KEY `commande_taxes_tax_id_foreign` (`tax_id`);

--
-- Indexes for table `expeditions`
--
ALTER TABLE `expeditions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `journals`
--
ALTER TABLE `journals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marques`
--
ALTER TABLE `marques`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modeles`
--
ALTER TABLE `modeles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `modeles_marque_id_foreign` (`marque_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`courriel`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pays`
--
ALTER TABLE `pays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `photos_voiture_id_foreign` (`voiture_id`);

--
-- Indexes for table `privileges`
--
ALTER TABLE `privileges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `provences`
--
ALTER TABLE `provences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `provences_pays_id_foreign` (`pays_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `statuts`
--
ALTER TABLE `statuts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taxes`
--
ALTER TABLE `taxes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `taxes_provence_id_foreign` (`provence_id`);

--
-- Indexes for table `tractions`
--
ALTER TABLE `tractions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transmissions`
--
ALTER TABLE `transmissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_courriel_unique` (`courriel`),
  ADD KEY `users_privilege_id_foreign` (`privilege_id`),
  ADD KEY `users_ville_id_foreign` (`ville_id`);

--
-- Indexes for table `villes`
--
ALTER TABLE `villes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `villes_provence_id_foreign` (`provence_id`);

--
-- Indexes for table `voitures`
--
ALTER TABLE `voitures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `voitures_marque_id_foreign` (`marque_id`),
  ADD KEY `voitures_modele_id_foreign` (`modele_id`),
  ADD KEY `voitures_annee_id_foreign` (`annee_id`),
  ADD KEY `voitures_transmission_id_foreign` (`transmission_id`),
  ADD KEY `voitures_traction_id_foreign` (`traction_id`),
  ADD KEY `voitures_carburant_id_foreign` (`carburant_id`),
  ADD KEY `voitures_carrosserie_id_foreign` (`carrosserie_id`),
  ADD KEY `voitures_proprietaire_foreign` (`proprietaire`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `annees`
--
ALTER TABLE `annees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `carburants`
--
ALTER TABLE `carburants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `carrosseries`
--
ALTER TABLE `carrosseries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `commandes`
--
ALTER TABLE `commandes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expeditions`
--
ALTER TABLE `expeditions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `journals`
--
ALTER TABLE `journals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `marques`
--
ALTER TABLE `marques`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `modeles`
--
ALTER TABLE `modeles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pays`
--
ALTER TABLE `pays`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `privileges`
--
ALTER TABLE `privileges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `provences`
--
ALTER TABLE `provences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `statuts`
--
ALTER TABLE `statuts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `taxes`
--
ALTER TABLE `taxes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tractions`
--
ALTER TABLE `tractions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transmissions`
--
ALTER TABLE `transmissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `villes`
--
ALTER TABLE `villes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `voitures`
--
ALTER TABLE `voitures`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `commandes`
--
ALTER TABLE `commandes`
  ADD CONSTRAINT `commandes_expedition_id_foreign` FOREIGN KEY (`expedition_id`) REFERENCES `expeditions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `commandes_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `commandes_statut_id_foreign` FOREIGN KEY (`statut_id`) REFERENCES `statuts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `commandes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `commandes_voiture_id_foreign` FOREIGN KEY (`voiture_id`) REFERENCES `voitures` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `commande_taxes`
--
ALTER TABLE `commande_taxes`
  ADD CONSTRAINT `commande_taxes_commande_id_foreign` FOREIGN KEY (`commande_id`) REFERENCES `commandes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `commande_taxes_tax_id_foreign` FOREIGN KEY (`tax_id`) REFERENCES `taxes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `modeles`
--
ALTER TABLE `modeles`
  ADD CONSTRAINT `modeles_marque_id_foreign` FOREIGN KEY (`marque_id`) REFERENCES `marques` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `photos`
--
ALTER TABLE `photos`
  ADD CONSTRAINT `photos_voiture_id_foreign` FOREIGN KEY (`voiture_id`) REFERENCES `voitures` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `provences`
--
ALTER TABLE `provences`
  ADD CONSTRAINT `provences_pays_id_foreign` FOREIGN KEY (`pays_id`) REFERENCES `pays` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `taxes`
--
ALTER TABLE `taxes`
  ADD CONSTRAINT `taxes_provence_id_foreign` FOREIGN KEY (`provence_id`) REFERENCES `provences` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_privilege_id_foreign` FOREIGN KEY (`privilege_id`) REFERENCES `privileges` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_ville_id_foreign` FOREIGN KEY (`ville_id`) REFERENCES `villes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `villes`
--
ALTER TABLE `villes`
  ADD CONSTRAINT `villes_provence_id_foreign` FOREIGN KEY (`provence_id`) REFERENCES `provences` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `voitures`
--
ALTER TABLE `voitures`
  ADD CONSTRAINT `voitures_annee_id_foreign` FOREIGN KEY (`annee_id`) REFERENCES `annees` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `voitures_carburant_id_foreign` FOREIGN KEY (`carburant_id`) REFERENCES `carburants` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `voitures_carrosserie_id_foreign` FOREIGN KEY (`carrosserie_id`) REFERENCES `carrosseries` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `voitures_marque_id_foreign` FOREIGN KEY (`marque_id`) REFERENCES `marques` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `voitures_modele_id_foreign` FOREIGN KEY (`modele_id`) REFERENCES `modeles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `voitures_proprietaire_foreign` FOREIGN KEY (`proprietaire`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `voitures_traction_id_foreign` FOREIGN KEY (`traction_id`) REFERENCES `tractions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `voitures_transmission_id_foreign` FOREIGN KEY (`transmission_id`) REFERENCES `transmissions` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
