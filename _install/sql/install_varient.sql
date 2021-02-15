-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 06 Ara 2017, 23:25:22
-- Sunucu sürümü: 10.1.25-MariaDB
-- PHP Sürümü: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `install_varient`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ads`
--

CREATE TABLE `ads` (
  `id` int(11) NOT NULL,
  `header_728` text,
  `header_468` text,
  `header_234` text,
  `index_728_top` text,
  `index_468_top` text,
  `index_234_top` text,
  `index_728_bottom` text,
  `index_468_bottom` text,
  `index_234_bottom` text,
  `posts_728` text,
  `posts_468` text,
  `posts_234` text,
  `videos_728` text,
  `videos_468` text,
  `videos_234` text,
  `category_728` text,
  `category_468` text,
  `category_234` text,
  `tag_728` text,
  `tag_468` text,
  `tag_234` text,
  `search_728` text,
  `search_468` text,
  `search_234` text,
  `post_details_728` text,
  `post_details_468` text,
  `post_details_234` text,
  `sidebar_300` text,
  `sidebar_234` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `ads`
--

INSERT INTO `ads` (`id`, `header_728`, `header_468`, `header_234`, `index_728_top`, `index_468_top`, `index_234_top`, `index_728_bottom`, `index_468_bottom`, `index_234_bottom`, `posts_728`, `posts_468`, `posts_234`, `videos_728`, `videos_468`, `videos_234`, `category_728`, `category_468`, `category_234`, `tag_728`, `tag_468`, `tag_234`, `search_728`, `search_468`, `search_234`, `post_details_728`, `post_details_468`, `post_details_234`, `sidebar_300`, `sidebar_234`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `name_slug` varchar(255) DEFAULT NULL,
  `parent_id` int(11) DEFAULT '0',
  `description` varchar(500) DEFAULT NULL,
  `keywords` varchar(500) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `block_type` varchar(255) DEFAULT NULL,
  `category_order` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `comment` varchar(5000) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `comment_likes`
--

CREATE TABLE `comment_likes` (
  `id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `message` varchar(5000) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `title` varchar(500) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `path_big` varchar(255) DEFAULT NULL,
  `path_small` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `gallery_categories`
--

CREATE TABLE `gallery_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `newsletters`
--

CREATE TABLE `newsletters` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `title` varchar(500) DEFAULT NULL,
  `slug` varchar(500) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `keywords` varchar(500) DEFAULT NULL,
  `is_custom` int(11) DEFAULT '1',
  `page_content` text,
  `page_order` int(11) DEFAULT '1',
  `visibility` int(11) DEFAULT '1',
  `title_active` int(11) DEFAULT '1',
  `breadcrumb_active` int(11) DEFAULT '1',
  `right_column_active` int(11) DEFAULT '1',
  `need_auth` int(11) DEFAULT '0',
  `location` varchar(255) DEFAULT 'top',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `pages`
--

INSERT INTO `pages` (`id`, `title`, `slug`, `description`, `keywords`, `is_custom`, `page_content`, `page_order`, `visibility`, `title_active`, `breadcrumb_active`, `right_column_active`, `need_auth`, `location`, `created_at`) VALUES
(1, 'Index', 'index', 'Varient Index Page', 'index,home', 0, NULL, 1, 1, 1, 1, 0, 0, 'none', '2017-11-22 20:05:45'),
(2, 'Register', 'register', 'Varient Register Page', 'register, auth', 0, NULL, 2, 1, 1, 1, 0, 0, 'none', '2017-11-22 20:07:52'),
(3, 'Login', 'login', 'Varient Login Page', 'login, auth', 0, NULL, 0, 1, 1, 1, 0, 0, 'none', '2017-11-22 20:14:41'),
(4, 'Reset Password', 'reset-password', 'Varient Reset Password Page', 'reset password, auth', 0, NULL, 0, 1, 1, 1, 0, 0, 'none', '2017-11-22 20:16:38'),
(5, 'Change Password', 'change-password', 'Varient Change Password Page', 'change password, auth', 0, NULL, 0, 1, 1, 1, 0, 0, 'none', '2017-11-22 20:19:07'),
(6, 'Update Profile', 'update-profile', 'Varient Update Profile Page', 'update profile, auth', 0, NULL, 0, 1, 1, 1, 0, 0, 'none', '2017-11-22 20:20:32'),
(7, 'Contact', 'contact', 'Varient Contact Page', 'varient, contact, page', 0, NULL, 1, 1, 1, 1, 0, 0, 'top', '2017-11-22 20:22:18'),
(8, 'Gallery', 'gallery', 'Varient Gallery Page', 'varient, gallery , page', 0, NULL, 2, 1, 1, 1, 0, 0, 'main', '2017-11-22 20:33:50'),
(9, 'Posts', 'posts', 'Varient Posts Page', 'varient, posts, articles, page', 0, NULL, 0, 1, 1, 1, 1, 0, 'none', '2017-11-22 20:35:36'),
(10, 'Videos', 'videos', 'Varient Videos Page', 'varient,videos, articles,watch, page', 0, NULL, 1, 1, 1, 1, 1, 0, 'main', '2017-11-22 20:37:27'),
(11, 'RSS Channels', 'rss-channels', 'Varient RSS Channels Page', 'varient, rss channels, rss feeds', 0, NULL, 0, 1, 1, 1, 0, 0, 'none', '2017-11-22 20:44:10'),
(12, 'Reading List', 'reading-list', 'Varient Reading List Page', 'varient, reading list,  read later', 0, NULL, 0, 1, 1, 1, 1, 0, 'none', '2017-11-22 20:49:16'),
(13, 'User Agreement', 'user-agreement', 'Varient User Agreement Page', 'varient, user agreement, terms', 0, NULL, 0, 1, 1, 1, 0, 0, 'none', '2017-11-22 20:52:21');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `polls`
--

CREATE TABLE `polls` (
  `id` int(11) NOT NULL,
  `question` text,
  `option1` text,
  `option2` text,
  `option3` text,
  `option4` text,
  `option5` text,
  `option6` text,
  `option7` text,
  `option8` text,
  `option9` text,
  `option10` text,
  `status` int(11) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `poll_votes`
--

CREATE TABLE `poll_votes` (
  `id` int(11) NOT NULL,
  `poll_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `vote` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(500) DEFAULT NULL,
  `title_slug` varchar(500) DEFAULT NULL,
  `keywords` varchar(500) DEFAULT NULL,
  `summary` varchar(1000) DEFAULT NULL,
  `content` longtext,
  `category_id` int(11) DEFAULT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  `image_big` varchar(255) DEFAULT NULL,
  `image_default` varchar(255) DEFAULT NULL,
  `image_slider` varchar(255) DEFAULT NULL,
  `image_mid` varchar(255) DEFAULT NULL,
  `image_small` varchar(255) DEFAULT NULL,
  `hit` int(11) DEFAULT '0',
  `optional_url` varchar(1000) DEFAULT NULL,
  `need_auth` int(11) DEFAULT '0',
  `is_slider` int(11) DEFAULT '0',
  `slider_order` int(11) DEFAULT '1',
  `is_featured` int(11) DEFAULT '0',
  `featured_order` int(11) DEFAULT '1',
  `is_recommended` int(11) NOT NULL DEFAULT '0',
  `is_breaking` int(11) NOT NULL DEFAULT '1',
  `visibility` int(11) DEFAULT '1',
  `post_type` varchar(100) DEFAULT 'post',
  `image_url` text,
  `embed_code` text,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `post_images`
--

CREATE TABLE `post_images` (
  `id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `image_big` varchar(255) DEFAULT NULL,
  `image_default` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `reading_lists`
--

CREATE TABLE `reading_lists` (
  `id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `site_title` varchar(255) DEFAULT NULL,
  `site_description` varchar(500) DEFAULT NULL,
  `application_name` varchar(255) DEFAULT NULL,
  `site_color` varchar(100) DEFAULT 'default',
  `site_lang` varchar(100) DEFAULT 'english',
  `show_hits` int(11) DEFAULT '1',
  `show_rss` int(11) DEFAULT '1',
  `show_newsticker` int(11) DEFAULT '1',
  `pagination_per_page` int(11) DEFAULT '10',
  `facebook_url` varchar(500) DEFAULT NULL,
  `twitter_url` varchar(500) DEFAULT NULL,
  `google_url` varchar(500) DEFAULT NULL,
  `instagram_url` varchar(500) DEFAULT NULL,
  `pinterest_url` varchar(500) DEFAULT NULL,
  `linkedin_url` varchar(500) DEFAULT NULL,
  `vk_url` varchar(500) DEFAULT NULL,
  `youtube_url` varchar(500) DEFAULT NULL,
  `optional_url_button_name` varchar(500) DEFAULT 'Click',
  `about_footer` varchar(1000) DEFAULT NULL,
  `google_analytics` text,
  `primary_font` varchar(255) DEFAULT NULL,
  `secondary_font` varchar(255) DEFAULT NULL,
  `tertiary_font` varchar(255) DEFAULT NULL,
  `contact_text` text,
  `contact_address` varchar(500) DEFAULT NULL,
  `contact_email` varchar(255) DEFAULT NULL,
  `contact_phone` varchar(255) DEFAULT NULL,
  `map_api_key` varchar(500) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `mail_protocol` varchar(100) DEFAULT 'smtp',
  `mail_host` varchar(255) DEFAULT NULL,
  `mail_port` varchar(255) DEFAULT '587',
  `mail_username` varchar(255) DEFAULT NULL,
  `mail_password` varchar(255) DEFAULT NULL,
  `mail_title` varchar(255) DEFAULT NULL,
  `facebook_app_id` varchar(500) DEFAULT NULL,
  `facebook_app_secret` varchar(500) DEFAULT NULL,
  `google_app_name` varchar(500) DEFAULT NULL,
  `google_client_id` varchar(500) DEFAULT NULL,
  `google_client_secret` varchar(500) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `settings`
--

INSERT INTO `settings` (`id`, `site_title`, `site_description`, `application_name`, `site_color`, `site_lang`, `show_hits`, `show_rss`, `show_newsticker`, `pagination_per_page`, `facebook_url`, `twitter_url`, `google_url`, `instagram_url`, `pinterest_url`, `linkedin_url`, `vk_url`, `youtube_url`, `optional_url_button_name`, `about_footer`, `google_analytics`, `primary_font`, `secondary_font`, `tertiary_font`, `contact_text`, `contact_address`, `contact_email`, `contact_phone`, `map_api_key`, `latitude`, `longitude`, `mail_protocol`, `mail_host`, `mail_port`, `mail_username`, `mail_password`, `mail_title`, `facebook_app_id`, `facebook_app_secret`, `google_app_name`, `google_client_id`, `google_client_secret`, `created_at`) VALUES
(1, 'Varient', 'Varient - News Magazine', 'Varient', 'default', 'english', 1, 1, 1, 16, '', '', '', '', '', '', '', '', 'Click Here To See More', '', '', 'open_sans', 'roboto', 'verdana', '', '', '', '', '', '', '', 'smtp', '', '587', '', '', 'Varient', '', '', 'Varient', '', '', '2017-07-06 00:11:07');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `tag` varchar(255) DEFAULT NULL,
  `tag_slug` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT 'name@domain.com',
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(100) DEFAULT 'user',
  `user_type` varchar(100) DEFAULT 'registered',
  `google_id` varchar(255) DEFAULT NULL,
  `facebook_id` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `about_me` varchar(5000) DEFAULT NULL,
  `facebook_url` varchar(500) DEFAULT NULL,
  `twitter_url` varchar(500) DEFAULT NULL,
  `google_url` varchar(500) DEFAULT NULL,
  `instagram_url` varchar(500) DEFAULT NULL,
  `pinterest_url` varchar(500) DEFAULT NULL,
  `linkedin_url` varchar(500) DEFAULT NULL,
  `vk_url` varchar(500) DEFAULT NULL,
  `youtube_url` varchar(500) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `username`, `slug`, `email`, `password`, `role`, `user_type`, `google_id`, `facebook_id`, `avatar`, `status`, `about_me`, `facebook_url`, `twitter_url`, `google_url`, `instagram_url`, `pinterest_url`, `linkedin_url`, `vk_url`, `youtube_url`, `created_at`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', '$2a$08$U4cKHtgbNRqFNlL9TPKtQ.ohz3slO5PnkwL9/avxZBsYwY6rsBRQq', 'admin', 'registered', NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-11-22 20:03:46');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `visual_settings`
--

CREATE TABLE `visual_settings` (
  `id` int(11) NOT NULL,
  `post_list_style` varchar(100) NOT NULL DEFAULT 'vertical',
  `site_color` varchar(100) NOT NULL DEFAULT 'default',
  `site_block_color` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `logo_footer` varchar(255) DEFAULT NULL,
  `favicon` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `visual_settings`
--

INSERT INTO `visual_settings` (`id`, `post_list_style`, `site_color`, `site_block_color`, `logo`, `logo_footer`, `favicon`) VALUES
(1, 'vertical', 'default', '#161616', '', '', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `widgets`
--

CREATE TABLE `widgets` (
  `id` int(11) NOT NULL,
  `title` varchar(500) DEFAULT NULL,
  `content` text,
  `type` varchar(100) DEFAULT NULL,
  `widget_order` int(11) DEFAULT '1',
  `visibility` int(11) DEFAULT '1',
  `is_custom` int(11) DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `widgets`
--

INSERT INTO `widgets` (`id`, `title`, `content`, `type`, `widget_order`, `visibility`, `is_custom`, `created_at`) VALUES
(1, 'Popular Posts', '', 'popular-posts', 1, 1, 0, '2017-11-22 21:00:15'),
(2, 'Recommended Posts', '', 'recommended-posts', 2, 1, 0, '2017-11-22 21:02:00'),
(3, 'Random Posts', '', 'random-slider-posts', 3, 1, 0, '2017-11-22 21:03:02'),
(4, 'Featured Video', '', 'featured-video', 4, 1, 0, '2017-11-22 21:03:47'),
(5, 'Tags', '', 'tags', 5, 1, 0, '2017-11-22 21:04:29'),
(6, 'Voting Poll', '', 'poll', 6, 1, 0, '2017-11-22 21:05:24');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `comment_likes`
--
ALTER TABLE `comment_likes`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `gallery_categories`
--
ALTER TABLE `gallery_categories`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `polls`
--
ALTER TABLE `polls`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `poll_votes`
--
ALTER TABLE `poll_votes`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `post_images`
--
ALTER TABLE `post_images`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `reading_lists`
--
ALTER TABLE `reading_lists`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `visual_settings`
--
ALTER TABLE `visual_settings`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `widgets`
--
ALTER TABLE `widgets`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `ads`
--
ALTER TABLE `ads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Tablo için AUTO_INCREMENT değeri `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `comment_likes`
--
ALTER TABLE `comment_likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `gallery_categories`
--
ALTER TABLE `gallery_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- Tablo için AUTO_INCREMENT değeri `polls`
--
ALTER TABLE `polls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `poll_votes`
--
ALTER TABLE `poll_votes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `post_images`
--
ALTER TABLE `post_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `reading_lists`
--
ALTER TABLE `reading_lists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Tablo için AUTO_INCREMENT değeri `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Tablo için AUTO_INCREMENT değeri `visual_settings`
--
ALTER TABLE `visual_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Tablo için AUTO_INCREMENT değeri `widgets`
--
ALTER TABLE `widgets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
