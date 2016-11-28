-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2016 at 08:31 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pro_search_adv`
--

-- --------------------------------------------------------

--
-- Table structure for table `bussness_types`
--

CREATE TABLE `bussness_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `bussness_type` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bussness_types`
--

INSERT INTO `bussness_types` (`id`, `bussness_type`, `created_at`, `updated_at`) VALUES
(1, 'Mohamed Ayed', '2016-11-27 17:16:24', '2016-11-27 17:16:24');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `business_type` int(10) UNSIGNED NOT NULL,
  `phones` varchar(255) DEFAULT NULL,
  `website` varchar(255) NOT NULL,
  `hashedcode` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `founder_date` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `company_name`, `address`, `email`, `business_type`, `phones`, `website`, `hashedcode`, `password`, `founder_date`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mohamed', 'modsajfgvbsdkg', 'mohamed@yahoo.com', 1, '01127946754662255 - 52551584', 'http://localhost:8000/admin/companies/create', '#1Mohamed658', '$2y$10$DQIXF5Jco1Meh6pT2kgCSuD1cMMNp0UeVN0B.h7DfsePfAfFJk54e', '2016-11-21', NULL, '2016-11-27 17:17:11', '2016-11-27 17:17:11');

-- --------------------------------------------------------

--
-- Table structure for table `jops`
--

CREATE TABLE `jops` (
  `id` int(10) UNSIGNED NOT NULL,
  `content` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jops`
--

INSERT INTO `jops` (`id`, `content`, `created_at`, `updated_at`) VALUES
(1, 'web development', '2016-11-27 19:07:19', '2016-11-27 19:07:19'),
(2, 'web desgine', '2016-11-27 19:07:19', '2016-11-27 19:07:19'),
(3, 'seo', '2016-11-27 19:07:19', '2016-11-27 19:07:19'),
(4, 'Marketing', '2016-11-27 19:07:19', '2016-11-27 19:07:19'),
(5, 'CEO', '2016-11-27 19:07:19', '2016-11-27 19:07:19');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_11_15_163745_create_companies_table', 1),
('2016_11_15_163754_create_jops_table', 1),
('2016_11_24_123317_create_bussness_types_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `hashedcode` varchar(255) NOT NULL,
  `jop_id` int(10) UNSIGNED NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `isadmin` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `firstname`, `lastname`, `password`, `phone`, `email`, `age`, `gender`, `hashedcode`, `jop_id`, `remember_token`, `isadmin`, `created_at`, `updated_at`) VALUES
(1, 'mohamedphp', 'mohamed', 'zayed', '$2y$10$A5Ii8XEs8e0PcN3vJMvH0uuqt91jxebFXe01mqanvYQWvsj1En8n6', '01096901954', 'alaa_dragneel@yahoo.com', '22', '0', '#1maza123', 1, 'HCGp3ysfCPwjBQbpqJ0wxdE61o2hVQkU7V8rmZWVoFlfDltovXmtedDd9gHV', 1, '2016-11-27 19:07:24', '2016-11-27 17:17:43'),
(2, 'alaa', 'mohamed', 'alaa', '$2y$10$m/qZEFXapbEYgZFMXBQjZO5yHqmMYbMIcFrVxkLh5deEnkliqJs4u', '01127946754', 'mohamedzayed709@yahoo.com', '22', '0', '#2maal123', 1, NULL, 0, '2016-11-27 19:07:24', '2016-11-27 19:07:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bussness_types`
--
ALTER TABLE `bussness_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `companies_email_unique` (`email`),
  ADD KEY `companies_business_type_foreign` (`business_type`);

--
-- Indexes for table `jops`
--
ALTER TABLE `jops`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_jop_id_foreign` (`jop_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bussness_types`
--
ALTER TABLE `bussness_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `jops`
--
ALTER TABLE `jops`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `companies`
--
ALTER TABLE `companies`
  ADD CONSTRAINT `companies_business_type_foreign` FOREIGN KEY (`business_type`) REFERENCES `bussness_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_jop_id_foreign` FOREIGN KEY (`jop_id`) REFERENCES `jops` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
