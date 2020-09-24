-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2020 at 03:11 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `limon_eshikhon`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_post`
--

CREATE TABLE `blog_post` (
  `id` int(11) NOT NULL,
  `title` varchar(222) NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `menu_id` int(11) DEFAULT NULL,
  `submenu_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog_post`
--

INSERT INTO `blog_post` (`id`, `title`, `description`, `image`, `created_at`, `status`, `user_id`, `menu_id`, `submenu_id`) VALUES
(1, '‘ভুল করে’ টেন্ডুলকারকে আউট দিয়েছিলেন তিনি', 'এক–দুই বছর নয়, টানা ২০ বছর আন্তর্জাতিক ক্রিকেট আম্পায়ারিং করেছেন স্টিভ বাকনর। ওয়েস্ট ইন্ডিয়ান ভদ্রলোক বছরের পর বছর ধরে সুনামের সঙ্গেই ম্যাচ পরিচালনা করেছেন। তা করতে গিয়ে যে কিছু ভুল করেননি এমন নয়। বাকনর তা স্বীকারও করেন। এই যেমন স্বীকার করলেন অন্তত দুবার ভারতীয় মহাতারকা শচীন টেন্ডুলকারকে আউট ঘোষণা করেছিলেন। ক্রিকেট ইতিহাসের অন্যতম সেরা আম্পায়ার বাকনর বললেন তিনিও মানুষ, আর মানুষ মাত্রই ভুল করে।', '../images/5.jpg', '2020-07-29 07:18:45', 'Cancel', 2, 1, 1),
(3, 'আজকের ‘আগুনে আংটি’ ৫০ বছর আগের পেলে-টোস্টাওদের জন্য', '১৯৭০ বিশ্বকাপের ব্রাজিল দল ইতিহাসের অন্যতম সেরা। কথাটা দ্ব্যর্থহীন কণ্ঠে বলার কারণ, কোনো বিবেচনাতেই পেলে-টোস্টাও-জেয়ারজিনহোদের সেই দল এর নিচে নামেনি। বরং মারিও জাগালোর সেই দল অনেকের বিচারেই বিশ্বকাপ ইতিহাসের সেরা। তাই প্রকৃতি মোটেই বেরসিক নয়। সময়ের কাজটা সময়েই করতে জানে। কীভাবে? সে কথাই বলছি।', '../images/3.jpg', '2020-07-29 07:18:49', 'Accept', 3, 1, 2),
(4, 'এভারটনে আটকে গেল লিভারপুল', 'রোববার এভারটনকে হারালেও লিভারপুলের লিগ শিরোপা জয়ের স্বপ্ন পূরণ হতো না। আরও একটি ম্যাচ জিততে হতো। কিন্তু তাই বলে ইংলিশ প্রিমিয়ার লিগের পয়েন্ট তালিকার ১২তম এভারটনকে হারাতে পারবে না ইয়ূর্গেন ক্লপের দল! ম্যাচটি গোলশূন্য ড্র করে পরিস্থিতি কিছুটা জটিলই করে তুলেছে তারা। পরের ম্যাচে ক্রিস্টাল প্যালেসের বিপক্ষে জিতলেও খুব একটা স্বস্তিতে থাকবে না লিভারপুল। ২ জুলাই যে তাদের প্রতিপক্ষ ম্যানচেস্টার সিটি। তবে সিটি তাদের পরের ম্যাচে বার্নলিকে হারাতে না পারলে ক্রিস্টাল প্যালেসের বিপক্ষে জয়ই ৩০ বছর পর লিভারপুলকে লিগ শিরোপা এনে দেবে।', '../images/6.jpg', '2020-07-29 07:19:13', 'Accept', 2, 3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `comments` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `user_name`, `blog_id`, `comments`) VALUES
(1, 2, 'Mahbubul Alam', 4, 'Hello 1'),
(2, 2, 'Mahbubul Alam', 3, 'Hello 2'),
(3, 2, 'Mahbubul Alam', 1, 'Hello 2'),
(5, 3, 'Limon Alam', 4, 'Hello 4'),
(6, 3, 'Limon Alam', 3, 'Hello 5'),
(7, 3, 'Limon Alam', 1, 'Hello 6'),
(8, 3, 'Limon Alam', 4, 'Hello World'),
(9, 2, 'Mahbubul Alam', 1, 'Hello World');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `menu`) VALUES
(1, 'Crime'),
(2, 'Sports'),
(3, 'Entertainment'),
(4, 'International');

-- --------------------------------------------------------

--
-- Table structure for table `sub_menu`
--

CREATE TABLE `sub_menu` (
  `id` int(11) NOT NULL,
  `sub_menu` varchar(100) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_menu`
--

INSERT INTO `sub_menu` (`id`, `sub_menu`, `menu_id`) VALUES
(1, 'BD Crime', 1),
(2, 'USA Crime', 1),
(3, 'BD Sports', 2),
(4, 'USA Sports', 2),
(5, 'BD Ent', 3),
(6, 'USA Ent', 3),
(7, 'BD', 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(4) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `reTypePassword` varchar(100) NOT NULL,
  `role_id` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `reTypePassword`, `role_id`) VALUES
(1, 'Super Admin', 'admin@admin.com', '01918845404', 'e10adc3949ba59abbe56e057f20f883e', 'e10adc3949ba59abbe56e057f20f883e', 2),
(2, 'Mahbubul Alam', 'mahbub@gmail.com', '01945325673', '827ccb0eea8a706c4c34a16891f84e7b', '827ccb0eea8a706c4c34a16891f84e7b', 1),
(3, 'Limon Alam', 'limoninfoo@gmail.com', '01946326545', '827ccb0eea8a706c4c34a16891f84e7b', '827ccb0eea8a706c4c34a16891f84e7b', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_post`
--
ALTER TABLE `blog_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_menu`
--
ALTER TABLE `sub_menu`
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
-- AUTO_INCREMENT for table `blog_post`
--
ALTER TABLE `blog_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sub_menu`
--
ALTER TABLE `sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
