-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 11, 2017 at 01:26 PM
-- Server version: 5.6.35-1+deb.sury.org~xenial+0.1
-- PHP Version: 7.1.9-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `slimblog`
--
CREATE DATABASE IF NOT EXISTS `slimblog` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `slimblog`;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--
-- Creation: Sep 11, 2017 at 10:20 AM
--

CREATE TABLE `posts` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `changed`) VALUES
(1, 'Sample post 1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin id massa non odio malesuada gravida. Nulla diam diam, porta quis nibh sit amet, convallis fermentum elit. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Morbi consectetur ut sapien in lacinia. Praesent eget porta nisi. Nulla quis felis non mauris finibus viverra vel vitae diam. Pellentesque rhoncus sapien eget bibendum egestas. Aliquam congue, leo pulvinar malesuada lacinia, ante metus malesuada magna, a fermentum nunc elit sit amet sem. Mauris sit amet viverra sapien, non mattis tellus.\r\n\r\nMaecenas mollis, quam nec tempor varius, est nulla venenatis mauris, et consectetur purus lectus in quam. Nunc euismod, velit nec faucibus mattis, elit sem iaculis est, et vestibulum arcu ipsum eu arcu. Mauris metus eros, feugiat quis volutpat id, finibus non augue. Nam pellentesque metus purus, ut congue sem maximus id. Integer id erat ipsum. Curabitur diam magna, ornare ac congue eget, accumsan ut sapien. Aliquam blandit est at hendrerit tempus. Donec ut cursus sem. Fusce vitae nulla felis.\r\n\r\n', '2017-09-11 10:22:30'),
(2, 'Sample post 2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin id massa non odio malesuada gravida. Nulla diam diam, porta quis nibh sit amet, convallis fermentum elit. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Morbi consectetur ut sapien in lacinia. Praesent eget porta nisi. Nulla quis felis non mauris finibus viverra vel vitae diam. Pellentesque rhoncus sapien eget bibendum egestas. Aliquam congue, leo pulvinar malesuada lacinia, ante metus malesuada magna, a fermentum nunc elit sit amet sem. Mauris sit amet viverra sapien, non mattis tellus.\r\n\r\nMaecenas mollis, quam nec tempor varius, est nulla venenatis mauris, et consectetur purus lectus in quam. Nunc euismod, velit nec faucibus mattis, elit sem iaculis est, et vestibulum arcu ipsum eu arcu. Mauris metus eros, feugiat quis volutpat id, finibus non augue. Nam pellentesque metus purus, ut congue sem maximus id. Integer id erat ipsum. Curabitur diam magna, ornare ac congue eget, accumsan ut sapien. Aliquam blandit est at hendrerit tempus. Donec ut cursus sem. Fusce vitae nulla felis.\r\n', '2017-09-11 10:24:16'),
(3, 'Sample post 3', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin id massa non odio malesuada gravida. Nulla diam diam, porta quis nibh sit amet, convallis fermentum elit. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Morbi consectetur ut sapien in lacinia. Praesent eget porta nisi. Nulla quis felis non mauris finibus viverra vel vitae diam. Pellentesque rhoncus sapien eget bibendum egestas. Aliquam congue, leo pulvinar malesuada lacinia, ante metus malesuada magna, a fermentum nunc elit sit amet sem. Mauris sit amet viverra sapien, non mattis tellus.\r\n\r\nMaecenas mollis, quam nec tempor varius, est nulla venenatis mauris, et consectetur purus lectus in quam. Nunc euismod, velit nec faucibus mattis, elit sem iaculis est, et vestibulum arcu ipsum eu arcu. Mauris metus eros, feugiat quis volutpat id, finibus non augue. Nam pellentesque metus purus, ut congue sem maximus id. Integer id erat ipsum. Curabitur diam magna, ornare ac congue eget, accumsan ut sapien. Aliquam blandit est at hendrerit tempus. Donec ut cursus sem. Fusce vitae nulla felis.\r\n', '2017-09-11 10:24:44'),
(4, 'Sample post 4', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin id massa non odio malesuada gravida. Nulla diam diam, porta quis nibh sit amet, convallis fermentum elit. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Morbi consectetur ut sapien in lacinia. Praesent eget porta nisi. Nulla quis felis non mauris finibus viverra vel vitae diam. Pellentesque rhoncus sapien eget bibendum egestas. Aliquam congue, leo pulvinar malesuada lacinia, ante metus malesuada magna, a fermentum nunc elit sit amet sem. Mauris sit amet viverra sapien, non mattis tellus.\r\n\r\nMaecenas mollis, quam nec tempor varius, est nulla venenatis mauris, et consectetur purus lectus in quam. Nunc euismod, velit nec faucibus mattis, elit sem iaculis est, et vestibulum arcu ipsum eu arcu. Mauris metus eros, feugiat quis volutpat id, finibus non augue. Nam pellentesque metus purus, ut congue sem maximus id. Integer id erat ipsum. Curabitur diam magna, ornare ac congue eget, accumsan ut sapien. Aliquam blandit est at hendrerit tempus. Donec ut cursus sem. Fusce vitae nulla felis.\r\n', '2017-09-11 10:24:44'),
(5, 'Sample post 5', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin id massa non odio malesuada gravida. Nulla diam diam, porta quis nibh sit amet, convallis fermentum elit. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Morbi consectetur ut sapien in lacinia. Praesent eget porta nisi. Nulla quis felis non mauris finibus viverra vel vitae diam. Pellentesque rhoncus sapien eget bibendum egestas. Aliquam congue, leo pulvinar malesuada lacinia, ante metus malesuada magna, a fermentum nunc elit sit amet sem. Mauris sit amet viverra sapien, non mattis tellus.\r\n\r\nMaecenas mollis, quam nec tempor varius, est nulla venenatis mauris, et consectetur purus lectus in quam. Nunc euismod, velit nec faucibus mattis, elit sem iaculis est, et vestibulum arcu ipsum eu arcu. Mauris metus eros, feugiat quis volutpat id, finibus non augue. Nam pellentesque metus purus, ut congue sem maximus id. Integer id erat ipsum. Curabitur diam magna, ornare ac congue eget, accumsan ut sapien. Aliquam blandit est at hendrerit tempus. Donec ut cursus sem. Fusce vitae nulla felis.\r\n', '2017-09-11 10:24:44');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--
-- Creation: Sep 10, 2017 at 09:11 PM
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `role`) VALUES
(1, 'Velizar Zlatev', '$2y$10$dqkFbHQRqM2x1S62Bg4V1uNGNTvrQOFA8Kvgs7ML9V1DJ7nZo504S', 'example@mail.bg', 0);

--
-- Indexes for dumped tables
--

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
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `id_2` (`id`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
