-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 14, 2023 at 10:10 AM
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
-- Database: `point_media_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` tinyint(10) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `full_name`, `admin_name`, `password`, `email`) VALUES
(1, 'Raghad Othman', 'r1', '601f1889667efaebb33b8c12572835da3f027f78', 'raghad.othman@point-media.com');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `title_ar` varchar(255) NOT NULL,
  `title_en` varchar(255) NOT NULL,
  `article_ar` text NOT NULL,
  `article_en` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title_ar`, `title_en`, `article_ar`, `article_en`, `image`, `created_at`, `updated_at`) VALUES
(3, 'ldshf', 'ljhblk', 'hglk', 'jgk', '1664727779.png', '2022-10-02 16:22:59', '0000-00-00 00:00:00'),
(4, 'ldshf', 'ljhblk', 'hglk', 'jgk', '1664727789.png', '2022-10-02 16:23:09', '0000-00-00 00:00:00'),
(6, 'هذا المقال للاختبار2...بعد التعديل', 'This article testing...after edit', 'نتى سيمبن منى نستيبﻻ نﻻ نسيتبﻻ نتﻻنستيﻻب نﻻنسيتﻻب نتى سيمبن منى نستيبﻻ نﻻ نسيتبﻻ نتﻻنستيﻻب نﻻنسيتﻻب نتى سيمبن منى نستيبﻻ نﻻ نسيتبﻻ نتﻻنستيﻻب نﻻنسيتﻻب نتى سيمبن منى نستيبﻻ نﻻ نسيتبﻻ نتﻻنستيﻻب نﻻنسيتﻻب \r\nنتى سيمبن منى نستيبﻻ نﻻ نسيتبﻻ نتﻻنستيﻻب نﻻنسيتﻻب نتى سيمبن منى نستيبﻻ نﻻ نسيتبﻻ نتﻻنستيﻻب نﻻنسيتﻻب \r\nنتى سيمبن منى نستيبﻻ نﻻ نسيتبﻻ نتﻻنستيﻻب نﻻنسيتﻻب نتى سيمبن منى نستيبﻻ نﻻ نسيتبﻻ نتﻻنستيﻻب نﻻنسيتﻻب نتى سيمبن منى نستيبﻻ نﻻ نسيتبﻻ نتﻻنستيﻻب نﻻنسيتﻻب ', 'lksjdnfln lsdfo sodf nnj sdfknsdk fnk sdf lksjdnfln lsdfo sodf nnj sdfknsdk fnk sdf lksjdnfln lsdfo sodf nnj sdfknsdk fnk sdf lksjdnfln lsdfo sodf nnj sdfknsdk fnk sdf \r\nlksjdnfln lsdfo sodf nnj sdfknsdk fnk sdf lksjdnfln lsdfo sodf nnj sdfknsdk fnk sdf lksjdnfln lsdfo sodf nnj sdfknsdk fnk sdf lksjdnfln lsdfo sodf nnj sdfknsdk fnk sdf lksjdnfln lsdfo sodf nnj sdfknsdk fnk sdf \r\nlksjdnfln lsdfo sodf nnj sdfknsdk fnk sdf lksjdnfln lsdfo sodf nnj sdfknsdk fnk sdf ', '1664727793.png', '2022-11-08 23:27:10', '0000-00-00 00:00:00'),
(7, 'هذا المقال للاختبار2...', 'Test From Adding Page...', 'هذا المقال للاختبار2...هذا المقال للاختبار2...هذا المقال للاختبار2...هذا المقال للاختبار2...\r\nهذا المقال للاختبار2...هذا المقال للاختبار2...هذا المقال للاختبار2...هذا المقال للاختبار2...هذا المقال للاختبار2...هذا المقال للاختبار2...هذا المقال للاختبار2...هذا المقال للاختبار2...هذا المقال للاختبار2...هذا المقال للاختبار2...هذا المقال للاختبار2...هذا المقال للاختبار2...هذا المقال للاختبار2...هذا المقال للاختبار2...هذا المقال للاختبار2...هذا المقال للاختبار2...هذا المقال للاختبار2...هذا المقال للاختبار2...هذا المقال للاختبار2...هذا المقال للاختبار2...\r\nهذا المقال للاختبار2...هذا المقال للاختبار2...هذا المقال للاختبار2...\r\nهذا المقال للاختبار2...', 'Test From Adding Page...Test From Adding Page...Test From Adding Page...Test From Adding Page...\r\nTest From Adding Page...Test From Adding Page...Test From Adding Page...Test From Adding Page...Test From Adding Page...Test From Adding Page...Test From Adding Page...Test From Adding Page...Test From Adding Page...Test From Adding Page...Test From Adding Page...Test From Adding Page...Test From Adding Page...Test From Adding Page...Test From Adding Page...\r\nTest From Adding Page...Test From Adding Page...Test From Adding Page...\r\nTest From Adding Page...', '1665587697.png', '2022-10-12 15:14:57', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `title_ar` varchar(255) NOT NULL,
  `title_en` varchar(255) NOT NULL,
  `short_description_ar` text NOT NULL,
  `short_description_en` text NOT NULL,
  `description_ar` text NOT NULL,
  `description_en` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `our_works`
--

CREATE TABLE `our_works` (
  `id` int(11) NOT NULL,
  `description_ar` text NOT NULL,
  `description_en` text NOT NULL,
  `category` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `our_works`
--

INSERT INTO `our_works` (`id`, `description_ar`, `description_en`, `category`, `image`) VALUES
(12, 'هذا أول أعمالنا4...هذا أول أعمالنا4...هذا أول أعمالنا4...', 'This Is Our First Work4...This Is Our First Work4...This Is Our First Work4...This Is Our First Work4...This Is Our First Work4...This Is Our First Work4...This Is Our First Work4...This Is Our First Work4...This Is Our First Work4...\r\n', 'تصميم هوية بصرية', '1665659723.png'),
(13, 'هذا أول أعمالنا3...هذا أول أعمالنا3...هذا أول أعمالنا3...', 'This Is Our First Work3...This Is Our First Work3...This Is Our First Work3...', 'تصميم هوية بصرية', '1665659743.png'),
(14, 'هذا أول أعمالنا5...هذا أول أعمالنا5...هذا أول أعمالنا5...', 'This Is Our First Work5...This Is Our First Work5...This Is Our First Work5...', 'تصاميم سوشال ميديا', '1665659763.png'),
(16, 'هذا أول أعمالنا5...هذا أول أعمالنا5...هذا أول أعمالنا5...', 'This Is Our First Work5...This Is Our First Work5...This Is Our First Work5...', 'تصميم لوغوفوليو', '1665659771.png'),
(17, 'هذا أول أعمالنا5...هذا أول أعمالنا5...هذا أول أعمالنا5...', 'This Is Our First Work5...This Is Our First Work5...This Is Our First Work5...', 'تصميم لوغوفوليو', '1665659774.png'),
(18, 'هذا أول أعمالنا5...هذا أول أعمالنا5...هذا أول أعمالنا5...', 'This Is Our First Work5...This Is Our First Work5...This Is Our First Work5...This Is Our First Work5...This Is Our First Work5...This Is Our First Work5...This Is Our First Work5...This Is Our First Work5...This Is Our First Work5...This Is Our First Work5...This Is Our First Work5...This Is Our First Work5...This Is Our First Work5...This Is Our First Work5...This Is Our First Work5...\r\n', 'تصميم هوية بصرية', '1665659777.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_name` (`admin_name`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `our_works`
--
ALTER TABLE `our_works`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` tinyint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `our_works`
--
ALTER TABLE `our_works`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
