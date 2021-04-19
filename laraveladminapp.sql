-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2021 at 10:28 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laraveladminapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_12_29_143532_create_pages_table', 2),
(5, '2020_12_29_155059_create_posts_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_body` varchar(700) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_published` tinyint(1) NOT NULL,
  `meta_tag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `page_title`, `page_body`, `is_published`, `meta_tag`, `meta_description`, `created_at`, `updated_at`, `admin_id`) VALUES
(1, 'home', '<p><strong>In the last 20 years, WebNmap has created 380,000 websites&nbsp;for businesses like yours.</strong>&nbsp;With our flexible website design packages, we don&rsquo;t just build you a great looking website; we provide all the tools you need to help grow and maintain it. You&#39;ll be able to review your website analytics, make updates with our easy to use editor or access online help and support videos anytime, anywhere, 24/7 with the <strong>WebNmap </strong>for Business app.</p>\r\n\r\n<p>We can even customise your <strong>WebNmap </strong>mobile-responsive website, so visitors see different content depending on variables like the time of day they visit and whether they&amp;</p>', 1, '<meta>', '<meta name=\"description\" content=\"websites for businesses \">,\r\n <meta name=\"keywords\" content=\"PHP, HTML, CSS, JavaScript\">', '2020-12-30 13:16:28', '2021-01-03 12:33:35', 2),
(2, 'Contact', '<p><strong>Contact Us:</strong></p>\r\n\r\n<p>WebNmap Techologies,</p>\r\n\r\n<p>46 market Place,</p>\r\n\r\n<p>Eastbourn 4534,</p>\r\n\r\n<p>Brighton,</p>\r\n\r\n<p>+44 9696 3882.</p>\r\n\r\n<p>hello@webnmap.com&nbsp;</p>', 1, NULL, NULL, '2020-12-31 16:38:02', '2021-01-03 12:16:43', 2),
(4, 'Services', '<p>Branding</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit nullam nunc justo sagittis suscipit ultrices.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Development</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit nullam nunc justo sagittis suscipit ultrices.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Web Design</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit nullam nunc justo sagittis suscipit ultrices.</p>\r\n\r\n<p>Social Media</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit nullam nunc justo sagittis suscipit ultrices.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Ecommerce</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit nullam nunc justo sa</p>', 0, NULL, NULL, '2021-01-01 15:19:23', '2021-01-03 12:17:37', 2),
(6, 'About', '<p>webnmap.com is the UK&rsquo;s leading website development company. Our website was launched in the UK in 1996 by the publishers of the Yellow Pages directory. Since then, we have put the names, addresses and telephone numbers of over 2.9 million businesses at your fingertips.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Search over 3,000&nbsp;classifications for companies matching the type of business you need, or&nbsp;find the right business&nbsp;near you by searching for a company name. Our service covers the whole of the UK (except the Isle of Man and the Channel Islands).</p>', 1, '<title>', 'WebNmap Techologies', '2021-01-03 12:18:54', '2021-01-03 12:18:54', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_body` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_published` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` tinyint(4) NOT NULL,
  `updated_by` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `post_title`, `post_body`, `is_published`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'Job post for HR Manager', '<p>Lorem&nbsp;ipsum&nbsp;dolor,&nbsp;sit&nbsp;amet&nbsp;consectetur&nbsp;adipisicing&nbsp;elit.&nbsp;Minus&nbsp;dicta,&nbsp;facilis&nbsp;qui&nbsp;voluptatem&nbsp;distinctio&nbsp;ex!&nbsp;Amet&nbsp;atque&nbsp;quibusdam&nbsp;sint&nbsp;explicabo&nbsp;facilis</p>\r\n\r\n<p>Lorem&nbsp;ipsum&nbsp;dolor,&nbsp;sit&nbsp;amet&nbsp;consectetur&nbsp;adipisicing&nbsp;elit.&nbsp;Minus&nbsp;dicta,&nbsp;facilis&nbsp;qui&nbsp;voluptatem&nbsp;distinctio&nbsp;ex!&nbsp;Amet&nbsp;atque&nbsp;quibusdam&nbsp;sint&nbsp;explicabo&nbsp;facilis&nbsp;autem,&nbsp;numquam&nbsp;nobis&nbsp;at,&nbsp;optio&nbsp;officiis&nbsp;illum?&nbsp;Saepe,&nbsp;qui?</p>\r\n\r\n<p>&nbsp;</p>', 1, '2020-12-29 00:00:00', '2021-01-03 12:34:04', 0, 2),
(5, 'Job post for Sr. php developer', '<p>Lorem&nbsp;ipsum&nbsp;dolor,&nbsp;sit&nbsp;amet&nbsp;consectetur&nbsp;adipisicing&nbsp;elit.&nbsp;Minus&nbsp;dicta,&nbsp;facilis&nbsp;qui&nbsp;voluptatem&nbsp;distinctio&nbsp;ex!&nbsp;Amet&nbsp;atque&nbsp;quibusdam&nbsp;sint&nbsp;explicabo&nbsp;facilis</p>\r\n\r\n<p>Lorem&nbsp;ipsum&nbsp;dolor,&nbsp;sit&nbsp;amet&nbsp;consectetur&nbsp;adipisicing&nbsp;elit.&nbsp;Minus&nbsp;dicta,&nbsp;facilis&nbsp;qui&nbsp;voluptatem&nbsp;distinctio&nbsp;ex!&nbsp;Amet&nbsp;atque&nbsp;quibusdam&nbsp;sint&nbsp;explicabo&nbsp;facilis&nbsp;autem,&nbsp;numquam&nbsp;nobis&nbsp;at,&nbsp;optio&nbsp;officiis&nbsp;illum?&nbsp;Saepe,&nbsp;qui?</p>\r\n\r\n<p>Lorem&nbsp;ipsum&nbsp;dolor,&nbsp;sit&nbsp;amet&nbsp;consectetur</p>', 0, '2021-01-01 15:10:30', '2021-01-03 12:11:46', 2, 2),
(6, 'What is E commerce', '<p>Lorem&nbsp;ipsum&nbsp;dolor,&nbsp;sit&nbsp;amet&nbsp;consectetur&nbsp;adipisicing&nbsp;elit.&nbsp;Minus&nbsp;dicta,&nbsp;facilis&nbsp;qui&nbsp;voluptatem&nbsp;distinctio&nbsp;ex!&nbsp;Amet&nbsp;atque&nbsp;quibusdam&nbsp;sint&nbsp;explicabo&nbsp;facilis&nbsp;autem,&nbsp;numquam&nbsp;nobis&nbsp;at,&nbsp;optio&nbsp;officiis&nbsp;illum?&nbsp;Saepe,&nbsp;qui?</p>\r\n\r\n<p>Lorem&nbsp;ipsum&nbsp;dolor,&nbsp;sit&nbsp;amet&nbsp;consectetur&nbsp;adipisicing&nbsp;elit.&nbsp;Minus&nbsp;dicta,&nbsp;facilis&nbsp;qui&nbsp;voluptatem&nbsp;distinctio&nbsp;ex!&nbsp;Amet&nbsp;atque&nbsp;quibusdam&nbsp;sint&nbsp;explicabo&nbsp;facilis&nbsp;autem,&nbsp;numquam&nbsp;nobis&nbsp;at,&nbsp;optio&nbsp;officiis&nbsp;illum?&nbsp;Saepe,&nbsp;qui?</p>', 1, '2021-01-01 15:11:50', '2021-01-03 12:13:29', 2, 2),
(8, 'About I-connect App', '<p>Lorem&nbsp;ipsum&nbsp;dolor,&nbsp;sit&nbsp;amet&nbsp;consectetur&nbsp;adipisicing&nbsp;elit.&nbsp;Minus&nbsp;dicta,&nbsp;facilis&nbsp;qui&nbsp;voluptatem&nbsp;distinctio&nbsp;ex!&nbsp;Amet&nbsp;atque&nbsp;quibusdam&nbsp;sint&nbsp;explicabo&nbsp;facilis&nbsp;autem,&nbsp;numquam&nbsp;nobis&nbsp;at,&nbsp;optio&nbsp;officiis&nbsp;illum?&nbsp;Saepe,&nbsp;qui?</p>\r\n\r\n<p>Lorem&nbsp;ipsum&nbsp;dolor,&nbsp;sit&nbsp;amet&nbsp;consectetur&nbsp;adipisicing&nbsp;elit.&nbsp;Minus&nbsp;dicta,&nbsp;facilis&nbsp;qui&nbsp;voluptatem&nbsp;distinctio&nbsp;ex!&nbsp;Amet&nbsp;atque&nbsp;quibusdam&nbsp;sint&nbsp;explicabo&nbsp;facilis&nbsp;autem,&nbsp;numquam&nbsp;nobis&nbsp;at,&nbsp;optio&nbsp;officiis&nbsp;illum?</p>\r\n\r\n<p>&nbsp;</p>', 0, '2021-01-01 15:21:50', '2021-01-03 12:14:44', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `is_admin` tinyint(4) NOT NULL,
  `notes` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `created_by`, `is_admin`, `notes`) VALUES
(2, 'soniya', 'soniya@gmail.com', NULL, '$2y$10$MDX6go9x89FfKlro1TY3yOIuDffqhjoAX2VT5XSvV9wzsLwmq7RCS', NULL, '2020-12-24 11:15:05', '2021-01-03 12:34:50', 0, 1, NULL),
(6, 'Jon', 'jon.doe@gmail.com', NULL, '$2y$10$2l7W1d4BEu/vEy7X3/24Hu1.eDUZsSKfOb8LCSa.kYCvZ33A78fD.', NULL, '2020-12-28 17:12:24', '2021-01-03 12:05:17', 0, 0, NULL),
(9, 'larry', 'Larry@yahoo.co', NULL, '$2y$10$iM.7ulwvgnkx1ZHheLTGwOsGQMph7.BIEUj7ZVRvoXvzyiDeopFOa', NULL, '2020-12-31 18:13:34', '2021-01-03 12:06:04', 2, 0, NULL),
(20, 'mark', 'mark_Otto@gmail.com', NULL, '$2y$10$Px.q/rWQ8WK91zBjZM2opuLKWbJ4Hveiab6aqbV6Wg1hPTroWLsYS', NULL, '2021-01-01 14:57:37', '2021-01-03 12:07:00', 2, 0, 'sdfsadf'),
(24, 'Maggy', 'maggy@yahoo.com', NULL, '$2y$10$u2lhf2SlEA0CYCy375B1Y.lZB7Nlw97l/TcEVDJgFmZfLklvpEM3K', NULL, '2021-01-01 15:16:29', '2021-01-03 12:08:10', 2, 0, NULL),
(27, 'admin', 'admin@gmail.com', NULL, '$2y$10$EjjcZU3ETEcZsOlOorX4c.yojK31kPMxoSxPJCt0mCu1/F8AZrqeC', NULL, '2021-01-02 22:01:52', '2021-01-02 22:01:52', 2, 1, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
