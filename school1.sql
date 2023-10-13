-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2020 at 07:54 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school1`
--

-- --------------------------------------------------------

--
-- Table structure for table `aboutschool`
--

CREATE TABLE `aboutschool` (
  `about_id` int(11) NOT NULL,
  `addtext` varchar(19) NOT NULL,
  `text` varchar(212) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aboutschool`
--

INSERT INTO `aboutschool` (`about_id`, `addtext`, `text`, `img`) VALUES
(1, 'مدرسة سعداوي مجاهد', 'مدرسة سعداوي مجاهد الثانوية المشتركة بميدوم انشئت عام 2018 ميلاديا توجد المدرسة بقرية ميدوم التابعة لمركز الواسطي في محافظة بني سويف المدرسة تحتوي علي كوادر تعليمية ذو مستوي عالي وتقدم العديد من الخدمات التعليمية', '../control/source/00.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `attfirst`
--

CREATE TABLE `attfirst` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `idstd` int(11) NOT NULL,
  `numberday` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attfirst`
--

INSERT INTO `attfirst` (`id`, `name`, `idstd`, `numberday`) VALUES
(1, '0', 0, 0),
(2, 'محمود نصر', 5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `attsecond`
--

CREATE TABLE `attsecond` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `idstd` int(11) NOT NULL,
  `numberday` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attsecond`
--

INSERT INTO `attsecond` (`id`, `name`, `idstd`, `numberday`) VALUES
(1, '0', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `attthird`
--

CREATE TABLE `attthird` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `idstd` int(11) NOT NULL,
  `numberday` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attthird`
--

INSERT INTO `attthird` (`id`, `name`, `idstd`, `numberday`) VALUES
(1, '0', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`) VALUES
(1, 'sadawy', '25cd3e7045931981fec4d3c04815d36a0604bedc');

-- --------------------------------------------------------

--
-- Table structure for table `manger`
--

CREATE TABLE `manger` (
  `manger_Id` int(11) NOT NULL,
  `mangerAdd` varchar(30) NOT NULL,
  `mangerText` varchar(684) NOT NULL,
  `mangerImg` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manger`
--

INSERT INTO `manger` (`manger_Id`, `mangerAdd`, `mangerText`, `mangerImg`) VALUES
(1, 'كلمة السيدة مديرة المدرسة', 'أبنائي الطلبة الأعزاء، المعلمون الكرام، الاهالي الافاضل... يسعدني أن أحييكم جميعا باجمل تحية ونحن نبدأ عامنا الدراسي بعزيمة قوية وإرادة متجددة، بمشيئة الله تعالى سنعمل على تحقيق بيئة تربوية فعالة ومحفزة على التعلم والتميز بحيث يتم إعداد طلابنا إعداداً تربوياً علمياً خلقياً ودينياً، يقوم على تحقيق ذلك معلمون مؤهلون اكفاء لهم القدرة على التعامل مع التقنيات الحديثة في إطار مشاركة اجتماعية فعالة ومتعاونة من قبل المجتمع المحلي ,أولياء الأمور والمدرسة لذلك تقع على عاتقنا مسؤولية كبيرة قوامها مضاعفة الجهود والعمل سويا على معالجة مواطن الضعف وتحسين أداء الطلبة وتوفير الوسائل الضرورية لتحسين البيئة التعليمية من اجل رفع مستوى النجاح في كل صف وفي المدرسة اجمع ... والله الموفق والمستعان.', 'source/مديرة المدرسة.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `news` varchar(4000) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `news`, `date`) VALUES
(1, 'حصول المدرسة علي المركز الاول في حفظ القران الكريم', '2020-04-03 08:10:53'),
(3, 'حصول المدرسة علي المركز الاول في حفظ القران الكريم', '2020-04-03 08:11:04'),
(4, 'ظهور نتيجة الصف الاول الثانوي', '2020-04-03 08:11:34'),
(5, 'ظهور نتيجة الصف الثاني الثانوي', '2020-04-03 08:11:39');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `res_id` int(11) NOT NULL,
  `First` varchar(2000) NOT NULL,
  `second` varchar(2000) NOT NULL,
  `third` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`res_id`, `First`, `second`, `third`) VALUES
(1, 'http://studg11.emis.gov.eg/', 'http://studg11.emis.gov.eg/', 'http://studg11.emis.gov.eg/');

-- --------------------------------------------------------

--
-- Table structure for table `settingsite`
--

CREATE TABLE `settingsite` (
  `site_id` int(11) NOT NULL,
  `sitename` varchar(255) NOT NULL,
  `active` int(1) NOT NULL,
  `email` varchar(16) NOT NULL,
  `number` varchar(13) NOT NULL,
  `address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settingsite`
--

INSERT INTO `settingsite` (`site_id`, `sitename`, `active`, `email`, `number`, `address`) VALUES
(1, 'مدرسة سعداوي مجاهد الثانوية ', 2, 'sadawy@gmail.com', '17555', 'ميدوم-الواسطي-بني سويف');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `img` varchar(400) NOT NULL,
  `news` varchar(92) NOT NULL,
  `date` datetime NOT NULL,
  `number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `img`, `news`, `date`, `number`) VALUES
(1, 'source/01.jpg', 'حفل اليوم الرياضي بالمدرسة', '2020-04-03 07:07:27', 0),
(2, 'source/01.jpg', 'حفل اليوم الرياضي بالمدرسة', '2020-04-03 07:09:29', 0),
(3, 'source/02.jpg', 'اعضاء جمعية السكان', '2020-04-03 07:07:57', 0),
(4, 'source/04.jpg', 'حصول المدرسة علي المركز الاول في حفظ القرآن الكريم علي مستوي المحافظة', '2020-04-03 07:08:12', 0),
(5, 'source/05.jpg', 'اجتماع اولياء الامور', '2020-04-03 07:08:28', 0),
(6, 'source/06.jpg', 'ندوة الاخلاق الحميدة', '2020-04-03 07:08:39', 0),
(7, 'source/07.jpg', 'حفل تكريم المتفوقين', '2020-04-03 07:08:55', 0),
(9, 'source/08.jpg', 'جانب من حفل عيد الام', '2020-04-03 07:10:23', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sliderstc`
--

CREATE TABLE `sliderstc` (
  `id` int(11) NOT NULL,
  `img` varchar(400) NOT NULL,
  `news` varchar(92) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sliderstc`
--

INSERT INTO `sliderstc` (`id`, `img`, `news`, `date`) VALUES
(1, 'ssaass', 'asdda', '2020-04-21 19:04:18'),
(2, 'source/00.jpg', 'مدرسة سعداوي مجاهد', '2020-04-03 07:06:21');

-- --------------------------------------------------------

--
-- Table structure for table `version`
--

CREATE TABLE `version` (
  `version_Id` int(11) NOT NULL,
  `versionAdd` varchar(20) NOT NULL,
  `versionText` varchar(450) NOT NULL,
  `versionImg` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `version`
--

INSERT INTO `version` (`version_Id`, `versionAdd`, `versionText`, `versionImg`) VALUES
(1, 'رؤية ورسالة المدرسة', 'تهدف المدرسة الي تخريج طالب قادر على التفاعل مع متطلبات العصر من خلال بيئة تربوية فعالة من المجتمع و للمجتمع التعاون المثمر بين أعضاء هيئة التدريس للدعم الفعال من جانب المجتمع و أولياء الامور لتفعيل البناء للقيادة المدرسيه , الاستمرارية فى التنمية المهنية للعاملين بالمدرسة وتوفير التكنولوجيا الحديثة لجميع المتعلمين بجانب المتابعة و التقويم المستمر لنتائج تحصيل المتعلمين وتعديل وتهذيب السلوك الطلابي من خلال تفعيل المشاركة في لأنشطة\r\n', '../control/source/اللوجو الرسمي.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aboutschool`
--
ALTER TABLE `aboutschool`
  ADD PRIMARY KEY (`about_id`);

--
-- Indexes for table `attfirst`
--
ALTER TABLE `attfirst`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idstd` (`idstd`);

--
-- Indexes for table `attsecond`
--
ALTER TABLE `attsecond`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idstd` (`idstd`);

--
-- Indexes for table `attthird`
--
ALTER TABLE `attthird`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idstd` (`idstd`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manger`
--
ALTER TABLE `manger`
  ADD PRIMARY KEY (`manger_Id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`res_id`);

--
-- Indexes for table `settingsite`
--
ALTER TABLE `settingsite`
  ADD PRIMARY KEY (`site_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliderstc`
--
ALTER TABLE `sliderstc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `version`
--
ALTER TABLE `version`
  ADD PRIMARY KEY (`version_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aboutschool`
--
ALTER TABLE `aboutschool`
  MODIFY `about_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attfirst`
--
ALTER TABLE `attfirst`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `attsecond`
--
ALTER TABLE `attsecond`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `attthird`
--
ALTER TABLE `attthird`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `manger`
--
ALTER TABLE `manger`
  MODIFY `manger_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `res_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settingsite`
--
ALTER TABLE `settingsite`
  MODIFY `site_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sliderstc`
--
ALTER TABLE `sliderstc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `version`
--
ALTER TABLE `version`
  MODIFY `version_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
