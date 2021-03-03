-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 03 Mar 2021, 15:21:43
-- Sunucu sürümü: 8.0.18
-- PHP Sürümü: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `phpcms_db`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `categories`
--

CREATE TABLE `categories` (
  `category_id` int(5) NOT NULL,
  `category_name` varchar(50) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(25, 'Web Development'),
(26, 'Graphic Design'),
(27, 'Digital Marketing'),
(28, 'SEO Consulting');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(5) NOT NULL,
  `comment_post_id` int(5) NOT NULL,
  `comment_date` date NOT NULL,
  `comment_author` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `comment_email` varchar(64) COLLATE utf8_turkish_ci NOT NULL,
  `comment_text` text COLLATE utf8_turkish_ci NOT NULL,
  `comment_status` varchar(50) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_date`, `comment_author`, `comment_email`, `comment_text`, `comment_status`) VALUES
(20, 19, '2021-03-03', 'unknown', 'unknown@gmail.com', 'search engine first comment.', 'approved'),
(21, 19, '2021-03-03', 'subscriber', 'subscriber@gmail.com', 'search engine second comment.', 'approved'),
(22, 16, '2021-03-03', 'user', 'user@gmail.com', 'Logo Design first comment.', 'approved'),
(23, 17, '2021-03-03', 'unknown', 'unknown@gmail.com', 'node.js first comment.', 'unapproved');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `portfolios`
--

CREATE TABLE `portfolios` (
  `portfolio_id` int(5) NOT NULL,
  `portfolio_name` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `portfolio_category` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `portfolio_img_sm` text COLLATE utf8_turkish_ci NOT NULL,
  `portfolio_img_bg` text COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `portfolios`
--

INSERT INTO `portfolios` (`portfolio_id`, `portfolio_name`, `portfolio_category`, `portfolio_img_sm`, `portfolio_img_bg`) VALUES
(18, 'Web Design', 'Web Development', '01-thumbnail.jpg', '01-full.jpg'),
(19, 'Logo', 'Graphic Design', '02-thumbnail.jpg', '02-full.jpg'),
(20, 'Web Analytics', 'Web Development', '03-thumbnail.jpg', '03-full.jpg'),
(21, 'Call To Action', 'Digital Marketing', '04-thumbnail.jpg', '04-full.jpg'),
(22, 'Visual Hierarchy', 'Graphic Design', '05-thumbnail.jpg', '05-full.jpg'),
(23, 'Search Engine Friendly', 'SEO Consulting', '06-thumbnail.jpg', '06-full.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `post_category` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `post_title` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `post_author` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `post_date` date NOT NULL,
  `post_comment_number` int(10) NOT NULL,
  `post_image` text COLLATE utf8_turkish_ci NOT NULL,
  `post_text` text COLLATE utf8_turkish_ci NOT NULL,
  `post_tags` text COLLATE utf8_turkish_ci NOT NULL,
  `post_hits` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `posts`
--

INSERT INTO `posts` (`post_id`, `post_category`, `post_title`, `post_author`, `post_date`, `post_comment_number`, `post_image`, `post_text`, `post_tags`, `post_hits`) VALUES
(15, 'Web Development', 'Php Features', 'root', '2021-03-03', 8, 'php-blog1.jpg', 'Php Features. Quisque sed tristique nisl. Vestibulum vel tellus lectus. Praesent mollis augue ac maximus vestibulum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed mattis elit vitae nulla fringilla, sed dictum enim feugiat. Suspendisse ac magna ac turpis pulvinar lobortis. Curabitur non eros enim. Etiam aliquam ac nisi sit amet sagittis. Vestibulum ut tortor metus.', 'php, features, web, programming', 1),
(16, 'Graphic Design', 'Logo Design', 'Lexy Doe', '2021-03-03', 8, 'logo-design.jpg', 'Logo Design. Quisque sed tristique nisl. Vestibulum vel tellus lectus. Praesent mollis augue ac maximus vestibulum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed mattis elit vitae nulla fringilla, sed dictum enim feugiat. Suspendisse ac magna ac turpis pulvinar lobortis. Curabitur non eros enim. Etiam aliquam ac nisi sit amet sagittis. Vestibulum ut tortor metus.', 'logo, design, graphic', 6),
(17, 'Web Development', 'Node.js Features', 'user', '2021-03-03', 8, 'nodejs-blog2.jpg', 'Node.js Features. Quisque sed tristique nisl. Vestibulum vel tellus lectus. Praesent mollis augue ac maximus vestibulum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed mattis elit vitae nulla fringilla, sed dictum enim feugiat. Suspendisse ac magna ac turpis pulvinar lobortis. Curabitur non eros enim. Etiam aliquam ac nisi sit amet sagittis. Vestibulum ut tortor metus.', 'nodejs, features, web, programming, javascript', 6),
(18, 'Digital Marketing', 'Social Media', 'John Doe', '2021-03-03', 8, 'social-media.jpg', 'Social Media. Quisque sed tristique nisl. Vestibulum vel tellus lectus. Praesent mollis augue ac maximus vestibulum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed mattis elit vitae nulla fringilla, sed dictum enim feugiat. Suspendisse ac magna ac turpis pulvinar lobortis. Curabitur non eros enim. Etiam aliquam ac nisi sit amet sagittis. Vestibulum ut tortor metus.', 'social, media, digital, marketing', 1),
(19, 'SEO Consulting', 'Search Engine', 'root', '2021-03-03', 8, 'seo-consulting.jpg', 'Search Engine. Quisque sed tristique nisl. Vestibulum vel tellus lectus. Praesent mollis augue ac maximus vestibulum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed mattis elit vitae nulla fringilla, sed dictum enim feugiat. Suspendisse ac magna ac turpis pulvinar lobortis. Curabitur non eros enim. Etiam aliquam ac nisi sit amet sagittis. Vestibulum ut tortor metus.', 'search, engine, seo, consulting', 9);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `user_id` int(5) NOT NULL,
  `user_name` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `user_password` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `user_email` varchar(64) COLLATE utf8_turkish_ci NOT NULL,
  `user_role` varchar(30) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_password`, `user_email`, `user_role`) VALUES
(1, 'root', '$2y$10$R51.XBFZw4UfJZDnaGamee5B.CMh0w9RqMYMLDeZmCitDVqRhxFoq', 'root@phpblog.com', 'admin');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Tablo için indeksler `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Tablo için indeksler `portfolios`
--
ALTER TABLE `portfolios`
  ADD PRIMARY KEY (`portfolio_id`);

--
-- Tablo için indeksler `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Tablo için AUTO_INCREMENT değeri `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Tablo için AUTO_INCREMENT değeri `portfolios`
--
ALTER TABLE `portfolios`
  MODIFY `portfolio_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Tablo için AUTO_INCREMENT değeri `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
