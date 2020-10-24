-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 11, 2020 at 10:05 AM
-- Server version: 5.7.29-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clg_ams`
--

-- --------------------------------------------------------

--
-- Table structure for table `achivements`
--

CREATE TABLE `achivements` (
  `Achivement_id` int(10) UNSIGNED NOT NULL,
  `dept_id` int(10) UNSIGNED NOT NULL,
  `f_id` int(10) UNSIGNED NOT NULL,
  `Activty_Type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Add_Details` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE `assignments` (
  `assi_id` int(10) UNSIGNED NOT NULL,
  `dept_id` int(10) UNSIGNED NOT NULL,
  `sem_id` int(10) UNSIGNED NOT NULL,
  `sub_id` int(10) UNSIGNED NOT NULL,
  `assi_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`assi_id`, `dept_id`, `sem_id`, `sub_id`, `assi_name`, `file`, `created_at`, `updated_at`) VALUES
(3, 2, 2, 2, 'Dhaval', 'files/1581922359.docx', '2020-02-17 01:22:39', '2020-02-17 01:22:39'),
(4, 2, 2, 2, 'Dhaval', 'files/1581922387.docx', '2020-02-17 01:23:07', '2020-02-17 01:23:07'),
(7, 2, 2, 2, 'xyz', 'files/1581925568.pdf', '2020-02-17 02:16:08', '2020-02-17 02:16:08'),
(8, 1, 1, 1, 'xyz', 'files/1582012705.pdf', '2020-02-18 02:28:25', '2020-02-18 02:28:25');

-- --------------------------------------------------------

--
-- Table structure for table `attendences`
--

CREATE TABLE `attendences` (
  `atte_id` int(10) UNSIGNED NOT NULL,
  `stud_id` int(10) UNSIGNED NOT NULL,
  `dept_id` int(10) UNSIGNED NOT NULL,
  `sem_id` int(10) UNSIGNED NOT NULL,
  `sub_id` int(10) UNSIGNED NOT NULL,
  `slot` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attendence` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendences`
--

INSERT INTO `attendences` (`atte_id`, `stud_id`, `dept_id`, `sem_id`, `sub_id`, `slot`, `date`, `time`, `attendence`, `created_at`, `updated_at`) VALUES
(1, 8, 1, 2, 1, '1', '08-03-2020', '17:39', 0, '2020-03-08 06:41:06', '2020-03-08 06:41:06'),
(2, 10, 1, 2, 1, '1', '08-03-2020', '17:39', 1, '2020-03-08 06:41:06', '2020-03-08 06:41:06'),
(3, 8, 1, 2, 1, '4', '08-03-2020', '18:01', 0, '2020-03-08 07:01:35', '2020-03-08 07:01:35'),
(4, 10, 1, 2, 1, '4', '08-03-2020', '18:01', 1, '2020-03-08 07:01:35', '2020-03-08 07:01:35'),
(5, 8, 1, 2, 1, '2', '07-03-2020', '18:01', 0, '2020-03-08 07:02:09', '2020-03-08 07:02:09'),
(6, 10, 1, 2, 1, '2', '07-03-2020', '18:01', 0, '2020-03-08 07:02:09', '2020-03-08 07:02:09'),
(7, 8, 1, 2, 1, '3', '06-03-2020', '18:02', 0, '2020-03-08 07:02:40', '2020-03-08 07:02:40'),
(8, 10, 1, 2, 1, '3', '06-03-2020', '18:02', 0, '2020-03-08 07:02:40', '2020-03-08 07:02:40'),
(9, 8, 1, 2, 1, '2', '05-03-2020', '18:10', 0, '2020-03-08 07:11:05', '2020-03-08 07:11:05'),
(10, 10, 1, 2, 1, '2', '05-03-2020', '18:10', 1, '2020-03-08 07:11:05', '2020-03-08 07:11:05'),
(11, 8, 1, 2, 1, '4', '04-03-2020', '18:11', 1, '2020-03-08 07:11:45', '2020-03-08 07:11:45'),
(12, 10, 1, 2, 1, '4', '04-03-2020', '18:11', 1, '2020-03-08 07:11:45', '2020-03-08 07:11:45'),
(13, 8, 1, 2, 1, '1', '07-03-2020', '19:25', 0, '2020-03-08 08:25:39', '2020-03-08 08:25:39'),
(14, 10, 1, 2, 1, '1', '07-03-2020', '19:25', 1, '2020-03-08 08:25:39', '2020-03-08 08:25:39');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `dept_id` int(10) UNSIGNED NOT NULL,
  `depart_short_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `depart_full_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`dept_id`, `depart_short_name`, `depart_full_name`, `created_at`, `updated_at`) VALUES
(1, 'MCA', 'Master of Computer Application', '2020-02-12 00:49:55', '2020-02-12 00:49:55'),
(2, 'BCA', 'Bachelor of Computer Applications', '2020-02-12 01:44:01', '2020-02-12 01:44:01');

-- --------------------------------------------------------

--
-- Table structure for table `facultys`
--

CREATE TABLE `facultys` (
  `f_id` int(10) UNSIGNED NOT NULL,
  `dept_id` int(10) UNSIGNED NOT NULL,
  `fname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Qualification` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area_interest` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exprience` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `proflie` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `facultys`
--

INSERT INTO `facultys` (`f_id`, `dept_id`, `fname`, `lname`, `Qualification`, `dob`, `gender`, `position`, `area_interest`, `exprience`, `phone`, `email`, `proflie`, `created_at`, `updated_at`) VALUES
(1, 2, 'Dhaval', 'Variya', 'MCA,BCA', 'Wednesday 05 November 1997', 'Male', 'Prof', 'dsdsddss', '5', '8530347205', 'variyadhaval758@gmail.com', 'images/1581617606.jpg', '2020-02-12 01:55:07', '2020-02-13 12:43:26'),
(2, 2, 'vishal', 'chauhan', 'abc', 'Saturday 01 February 2020', 'Male', 'Ass.Prof', 'sxsx', '5', '9033337833', 'vishal@gmail.com', 'images/1581617429.jpg', '2020-02-13 12:40:29', '2020-02-13 12:40:29'),
(3, 2, 'janak', 'vaghela', 'MCA,BCA', 'Thursday 04 December 1997', 'Male', 'Prof.(Dr.)', 'cccacsa', '12', '971455826', 'janak@gmail.com', 'images/1581909575.jpg', '2020-02-16 21:49:35', '2020-02-16 21:49:35'),
(4, 1, 'Kausika', 'Pal', 'MCA,BCA', 'Monday 14 February 1983', 'Female', 'Prof', 'ccccb hcygccvyju6', '5 years', '9884555220', 'kp@gmail.com', 'images/1582877221.png', '2020-02-28 02:37:01', '2020-02-28 02:37:01');

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
(3, '2020_01_27_082609_create_department_table', 1),
(4, '2020_01_28_035056_create_faculty_table', 2),
(9, '2020_02_13_050419_create_semester_table', 6),
(12, '2020_02_13_055336_create_assignments_table', 7),
(15, '2020_02_18_073753_create_subjects_table', 10),
(18, '2020_02_28_054718_create_achivements_table', 12),
(19, '2020_03_04_171618_create_students_table', 13),
(20, '2020_03_04_171659_create_attendences_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `semesters`
--

CREATE TABLE `semesters` (
  `sem_id` int(10) UNSIGNED NOT NULL,
  `dept_id` int(10) UNSIGNED NOT NULL,
  `sem_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `semesters`
--

INSERT INTO `semesters` (`sem_id`, `dept_id`, `sem_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Sem-1', '2020-02-13 01:27:44', '2020-02-17 01:00:42'),
(2, 1, 'Sem-2', '2020-02-17 01:00:14', '2020-02-17 01:00:14'),
(3, 1, 'Sem-3', '2020-02-17 01:00:26', '2020-02-17 01:00:26'),
(4, 1, 'Sem-4', '2020-02-24 01:27:57', '2020-02-26 22:16:30'),
(5, 1, 'Sem-5', '2020-02-25 10:34:22', '2020-02-26 22:16:55'),
(6, 2, 'Sem-1', '2020-02-28 03:06:44', '2020-02-28 03:06:44');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `stud_id` int(10) UNSIGNED NOT NULL,
  `dept_id` int(10) UNSIGNED NOT NULL,
  `sem_id` int(10) UNSIGNED NOT NULL,
  `e_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `f_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `m_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `l_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blood_group` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year_admission` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stud_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `par_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`stud_id`, `dept_id`, `sem_id`, `e_no`, `f_name`, `m_name`, `l_name`, `address`, `dob`, `gender`, `blood_group`, `year_admission`, `stud_phone`, `par_phone`, `email`, `profile`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '1886', 'Dhaval', 'Pravinbhai', 'Variya', 'Katargam', '05/11/97', 'Male', 'O-', '2017', '8530347205', '9514785225', 'dhaval@gmai.com', '1581500495.jpg', '2020-03-08 04:44:01', '2020-03-08 04:44:01'),
(8, 1, 2, '1885', 'Akshit', 'Prakashbhai', 'Trivedi', 'Katargam', '03/03/98', 'Male', 'A+', '2018', '9033337833', '9632587410', 'akshit@gmail.com', '1581500495.jpg', '2020-03-08 05:00:18', '2020-03-08 05:00:18'),
(10, 1, 2, '1887', 'janak', 'Pravinbhai', 'Variya', 'Katargam', '05/11/97', 'Male', 'O-', '2017', '8530347205', '9514785225', 'dhaval@gmai.com', '1581500495.jpg', '2020-03-08 05:00:18', '2020-03-08 05:00:18'),
(17, 1, 5, '1888', 'Bharat', 'Narotttambhai', 'Jadav', 'Katargam', '11/11/97', 'Male', 'AB-', '2017', '9745552220', '9515555555', 'bharat@gmai.com', '1581500495.jpg', '2020-03-08 23:01:24', '2020-03-08 23:01:24');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `sub_id` int(10) UNSIGNED NOT NULL,
  `dept_id` int(10) UNSIGNED NOT NULL,
  `sem_id` int(10) UNSIGNED NOT NULL,
  `sub_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`sub_id`, `dept_id`, `sem_id`, `sub_name`, `sub_code`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'Android', '341', '2020-02-18 02:27:10', '2020-02-18 02:27:10'),
(2, 1, 5, 'CN', '36402', '2020-02-26 22:17:22', '2020-02-26 22:17:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Dhaval', 'variyadhaval758@gmail.com', NULL, '$2y$10$DxdEWePX1MiGhcO9mLTsJOXhJ03gRqPRAyEcq4EdUEzFajYPBAP6G', 'VTF1ACsbJASsIp4AgL1ZFvUg4yXM8cBd4G13Fyb1UAXvtA23Bg2rlZO46kBB', '2020-02-12 00:47:43', '2020-02-12 00:47:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `achivements`
--
ALTER TABLE `achivements`
  ADD PRIMARY KEY (`Achivement_id`),
  ADD KEY `achivements_dept_id_foreign` (`dept_id`),
  ADD KEY `achivements_f_id_foreign` (`f_id`);

--
-- Indexes for table `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`assi_id`),
  ADD KEY `assignments_dept_id_foreign` (`dept_id`),
  ADD KEY `assignments_sem_id_foreign` (`sem_id`),
  ADD KEY `assignments_sub_id_foreign` (`sub_id`);

--
-- Indexes for table `attendences`
--
ALTER TABLE `attendences`
  ADD PRIMARY KEY (`atte_id`),
  ADD KEY `attendences_dept_id_foreign` (`dept_id`),
  ADD KEY `attendences_stud_id_foreign` (`stud_id`),
  ADD KEY `attendences_sem_id_foreign` (`sem_id`),
  ADD KEY `attendences_sub_id_foreign` (`sub_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `facultys`
--
ALTER TABLE `facultys`
  ADD PRIMARY KEY (`f_id`),
  ADD KEY `facultys_dept_id_foreign` (`dept_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `semesters`
--
ALTER TABLE `semesters`
  ADD PRIMARY KEY (`sem_id`),
  ADD KEY `semesters_dept_id_foreign` (`dept_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`stud_id`),
  ADD UNIQUE KEY `e_no` (`e_no`),
  ADD KEY `students_dept_id_foreign` (`dept_id`),
  ADD KEY `students_sem_id_foreign` (`sem_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`sub_id`),
  ADD KEY `subjects_sem_id_foreign` (`sem_id`),
  ADD KEY `subjects_dept_id_foreign` (`dept_id`);

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
-- AUTO_INCREMENT for table `achivements`
--
ALTER TABLE `achivements`
  MODIFY `Achivement_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `assignments`
--
ALTER TABLE `assignments`
  MODIFY `assi_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `attendences`
--
ALTER TABLE `attendences`
  MODIFY `atte_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `dept_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `facultys`
--
ALTER TABLE `facultys`
  MODIFY `f_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `semesters`
--
ALTER TABLE `semesters`
  MODIFY `sem_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `stud_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `sub_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `achivements`
--
ALTER TABLE `achivements`
  ADD CONSTRAINT `achivements_dept_id_foreign` FOREIGN KEY (`dept_id`) REFERENCES `departments` (`dept_id`),
  ADD CONSTRAINT `achivements_f_id_foreign` FOREIGN KEY (`f_id`) REFERENCES `facultys` (`f_id`);

--
-- Constraints for table `attendences`
--
ALTER TABLE `attendences`
  ADD CONSTRAINT `attendences_dept_id_foreign` FOREIGN KEY (`dept_id`) REFERENCES `departments` (`dept_id`),
  ADD CONSTRAINT `attendences_sem_id_foreign` FOREIGN KEY (`sem_id`) REFERENCES `semesters` (`sem_id`),
  ADD CONSTRAINT `attendences_stud_id_foreign` FOREIGN KEY (`stud_id`) REFERENCES `students` (`stud_id`),
  ADD CONSTRAINT `attendences_sub_id_foreign` FOREIGN KEY (`sub_id`) REFERENCES `subjects` (`sub_id`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_dept_id_foreign` FOREIGN KEY (`dept_id`) REFERENCES `departments` (`dept_id`),
  ADD CONSTRAINT `students_sem_id_foreign` FOREIGN KEY (`sem_id`) REFERENCES `semesters` (`sem_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
