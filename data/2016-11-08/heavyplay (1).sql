-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2016 at 10:16 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `heavyplay`
--

-- --------------------------------------------------------

--
-- Table structure for table `d4is_category`
--

CREATE TABLE `d4is_category` (
  `cat_id` int(10) UNSIGNED NOT NULL,
  `cat_name` varchar(150) NOT NULL,
  `cat_slug` varchar(100) NOT NULL,
  `cat_description` text NOT NULL,
  `cat_level` enum('1','2') NOT NULL DEFAULT '1',
  `cat_parent_id` int(11) NOT NULL,
  `cat_link` varchar(200) NOT NULL DEFAULT '#',
  `cat_regdate` date NOT NULL,
  `cat_status` enum('N','Y') NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `d4is_category`
--

INSERT INTO `d4is_category` (`cat_id`, `cat_name`, `cat_slug`, `cat_description`, `cat_level`, `cat_parent_id`, `cat_link`, `cat_regdate`, `cat_status`) VALUES
(1, 'Labtops', 'labtops', '', '1', 0, 'category.php?p=1', '2016-10-31', 'Y'),
(2, 'Desktops', 'desktop', '', '1', 0, 'category.php?p=2', '2016-10-31', 'Y'),
(3, 'Gear & Accessories', 'gear-and-accessory', '', '1', 0, '#', '2016-10-31', 'Y'),
(4, 'Alienware New 13', 'alienware-new-13', '', '2', 1, '#', '2016-11-04', 'Y'),
(5, 'Alienware 15', 'alienware-15', '', '2', 1, '#', '2016-11-04', 'Y'),
(6, 'Alienware 17', 'alienware-17', '', '2', 1, '#', '2016-11-04', 'Y'),
(7, 'Aurora', 'aurora', '', '2', 2, '#', '2016-11-04', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `d4is_menuposition`
--

CREATE TABLE `d4is_menuposition` (
  `mnp_id` int(10) UNSIGNED NOT NULL,
  `mnp_name` varchar(100) NOT NULL,
  `mnp_position` varchar(25) NOT NULL,
  `mnp_regdate` date NOT NULL,
  `mnp_visibility` enum('N','Y') NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `d4is_menuposition`
--

INSERT INTO `d4is_menuposition` (`mnp_id`, `mnp_name`, `mnp_position`, `mnp_regdate`, `mnp_visibility`) VALUES
(1, 'main-menu', 'xplor-top', '2016-11-06', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `d4is_menus`
--

CREATE TABLE `d4is_menus` (
  `mn_id` int(10) UNSIGNED NOT NULL,
  `mn_text` varchar(255) NOT NULL,
  `mn_position` int(11) NOT NULL,
  `mn_level` enum('1','2') NOT NULL DEFAULT '1',
  `mn_parent` int(11) NOT NULL,
  `mn_link` varchar(200) NOT NULL,
  `mn_status` enum('N','Y') NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `d4is_menus`
--

INSERT INTO `d4is_menus` (`mn_id`, `mn_text`, `mn_position`, `mn_level`, `mn_parent`, `mn_link`, `mn_status`) VALUES
(1, 'หน้าแรก', 1, '1', 0, 'index.php', 'Y'),
(2, 'สินค้า', 1, '1', 0, 'product.php', 'Y'),
(3, 'เกี่ยวกับเรา', 1, '1', 0, '#', 'Y'),
(4, 'ขอใบเสนอราคา', 1, '1', 0, 'quotation.php', 'Y'),
(5, 'วิธีการสั่งซื้อ', 1, '1', 0, '#', 'Y'),
(6, 'แจ้งชำระเงิน', 1, '1', 0, 'payment-notice.php', 'Y'),
(7, 'ติดต่อเรา', 1, '1', 0, 'content.php?p=18', 'Y'),
(8, 'Labtops', 1, '2', 2, 'content.php?p=15', 'Y'),
(9, 'Desktops', 1, '2', 2, 'content.php?p=17', 'Y'),
(10, 'Gear & Accessories', 1, '2', 2, '#', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `d4is_post`
--

CREATE TABLE `d4is_post` (
  `post_id` int(10) UNSIGNED NOT NULL,
  `post_type` enum('post','page') NOT NULL DEFAULT 'post',
  `post_title` varchar(255) NOT NULL,
  `post_content` text NOT NULL,
  `post_visibility` enum('public','password','private') NOT NULL DEFAULT 'public',
  `post_publish` date NOT NULL,
  `post_regdate` date NOT NULL,
  `post_count` int(11) NOT NULL,
  `post_public_submission` enum('draft','submit') NOT NULL DEFAULT 'draft',
  `post_temp_id` varchar(150) NOT NULL,
  `post_by` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `d4is_post`
--

INSERT INTO `d4is_post` (`post_id`, `post_type`, `post_title`, `post_content`, `post_visibility`, `post_publish`, `post_regdate`, `post_count`, `post_public_submission`, `post_temp_id`, `post_by`) VALUES
(15, 'page', 'Alienware labtop', '<table border="0" cellpadding="1" cellspacing="1" style="width:100%">\r\n	<tbody>\r\n		<tr>\r\n			<td style="text-align:center">\r\n			<h1><strong>ALIENWARE LAPTOPS</strong></h1>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<table border="0" cellpadding="5" cellspacing="5" style="width:100%">\r\n	<tbody>\r\n		<tr>\r\n			<td style="text-align:center"><img alt="" src="http://i.dell.com/sites/imagecontent/app-merchandizing/responsive/LearnSegment/alienware/assets/en/PublishingImages/alienware-laptops/alienware-laptop-category-premigration-day01_Compare-1.jpg" /></td>\r\n			<td style="text-align:center"><img alt="" src="http://i.dell.com/sites/imagecontent/app-merchandizing/responsive/LearnSegment/alienware/assets/en/PublishingImages/alienware-laptops/alienware-laptop-category-premigration-day01_Compare-1.jpg" /></td>\r\n			<td style="text-align:center"><img alt="" src="http://i.dell.com/sites/imagecontent/app-merchandizing/responsive/LearnSegment/alienware/assets/en/PublishingImages/alienware-laptops/alienware-laptop-category-premigration-day01_Compare-1.jpg" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td style="text-align:center">\r\n			<h2><strong>NEW 13</strong></h2>\r\n			</td>\r\n			<td style="text-align:center">\r\n			<h2><strong>15</strong></h2>\r\n			</td>\r\n			<td style="text-align:center">\r\n			<h2><strong>17</strong></h2>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>CPU&nbsp;</strong>:<br />\r\n			Up to Intel&reg; Core&trade; i7-6700HQ</td>\r\n			<td><strong>CPU&nbsp;</strong>:<br />\r\n			Up to Intel&reg; Core&trade; i7-6820HK</td>\r\n			<td><strong>CPU&nbsp;</strong>:<br />\r\n			Up to Intel&reg; Core&trade; i7-6820HK</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Windows&nbsp;</strong>:&nbsp;<br />\r\n			Windows 10 Home</td>\r\n			<td><strong>Windows&nbsp;</strong>:&nbsp;<br />\r\n			Windows 10 Home</td>\r\n			<td><strong>Windows&nbsp;</strong>:&nbsp;<br />\r\n			Windows 10 Home</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Graphic&nbsp;</strong>:&nbsp;<br />\r\n			Up to NVIDIA&reg; GeForce&reg; GTX 1060</td>\r\n			<td><strong>Graphic&nbsp;</strong>:&nbsp;<br />\r\n			Up to NVIDIA&reg; GeForce&reg; GTX 1070</td>\r\n			<td><strong>Graphic&nbsp;</strong>:&nbsp;<br />\r\n			Up to NVIDIA&reg; GeForce&reg; GTX 1070</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>RAM&nbsp;</strong>:<br />\r\n			Up to 32GB DDR4 at 2400MHz</td>\r\n			<td><strong>RAM&nbsp;</strong>:<br />\r\n			Up to 32GB Dual Channel DDR4 at 2400MHz</td>\r\n			<td><strong>RAM&nbsp;</strong>:<br />\r\n			Up to 32GB Dual Channel DDR4 at 2400MHz</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Harddrive&nbsp;</strong>:&nbsp;<br />\r\n			Up to 1TB PCIe SSD + 1TB PCIe SSD</td>\r\n			<td><strong>Harddrive&nbsp;</strong>:&nbsp;<br />\r\n			Up to 1TB PCIe SSD + 1TB 7200RPM SATA 6Gb/s</td>\r\n			<td><strong>Harddrive&nbsp;</strong>:&nbsp;<br />\r\n			Up to 1TB PCIe SSD + 1TB 7200RPM SATA 6Gb/s</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Display&nbsp;</strong>:&nbsp;<br />\r\n			Up to 13.3 inch QHD (2560 x 1440) OLED</td>\r\n			<td><strong>Display&nbsp;</strong>:&nbsp;<br />\r\n			Up to 15.6 inch UHD display</td>\r\n			<td><strong>Display&nbsp;</strong>:<br />\r\n			&nbsp;Up to 17.3 inch UHD display</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>ราคา :&nbsp;</strong><br />\r\n			เริ่มต้นที่ xx,xxx บาท</td>\r\n			<td><strong>ราคา :</strong><br />\r\n			เริ่มต้นที่ xx,xxx บาท</td>\r\n			<td><strong>ราคา</strong>&nbsp;:<br />\r\n			เริ่มต้นที่ xx,xxx บาท</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="text-align:center">\r\n			<hr /><a href="#"><input name="alw-13" type="button" value="จัดสเปคและสั่งซื้อ" /></a></td>\r\n			<td style="text-align:center">\r\n			<hr /><a href="#"><input name="alw-13" type="button" value="จัดสเปคและสั่งซื้อ" /></a></td>\r\n			<td style="text-align:center">\r\n			<hr /><a href="#"><input name="alw-13" type="button" value="จัดสเปคและสั่งซื้อ" /></a></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n', 'public', '2016-11-06', '2016-11-06', 0, 'submit', '9f72vmbrdvnam795532jii34n6', '7'),
(17, 'page', 'Alienware desktop', '<table border="0" cellpadding="1" cellspacing="1" style="width:100%">\r\n	<tbody>\r\n		<tr>\r\n			<td style="text-align:center">\r\n			<h1><strong>ALIENWARE DESKTOPS</strong></h1>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<table border="0" cellpadding="5" cellspacing="5" style="width:100%">\r\n	<tbody>\r\n		<tr>\r\n			<td style="text-align:center"><img alt="" src="http://i.dell.com/sites/imagecontent/consumer/merchandizing/en/PublishingImages/165x119/AW%20Migration%20Assets/desktops/alienware-desktop-category-premigration-day01_Compare-2.jpg" style="height:515px; width:340px" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td style="text-align:center">\r\n			<h2><strong>AURORA</strong></h2>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="text-align:center">Dual graphics-ready compact mid tower. Designed for virtual reality and engineered with liquid cooling and tool-less access.</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="text-align:center"><strong>CPU</strong> :&nbsp;Up to Intel&reg; Core&trade; i7-6700K Processor</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="text-align:center"><strong>OS</strong> :&nbsp;Windows 10 Home</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="text-align:center"><strong>Graphic card </strong>:&nbsp;Up to NVIDIA&reg; GeForce&reg; GTX 1080 Founders Edition</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="text-align:center"><strong>RAM </strong>:&nbsp;Up to 64GB DDR4 at 2133MHz</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="text-align:center"><strong>Harddrive</strong> :&nbsp;Up to 1TB M.2 PCIe SSD + 2TB 7200RPM SATA 6Gb/s</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="text-align:center">Comes with keyboard and mouse</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="text-align:center"><strong>ราคา :&nbsp;</strong>เริ่มต้นที่ xx,xxx บาท</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="text-align:center">\r\n			<hr /><a href="product.php?p=1"><input name="alw-13" type="button" value="จัดสเปคและสั่งซื้อ" /></a></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n', 'public', '2016-11-06', '2016-11-06', 0, 'submit', 'nq8upct7p8rcrkbj0h7vlg1mi0', '7'),
(18, 'page', 'ติดต่อเรา', '<h2>ช่องทางการติดต่อ</h2>\r\n\r\n<p>Tel:&nbsp;<strong>090-8933321</strong><br />\r\nLINE:&nbsp;<strong>aw_reseller_th​</strong><br />\r\nEmail: Alienware-th@hotmail.com&nbsp;<br />\r\nIn Box Facebook&nbsp;<a href="http://www.facebook.com/messages/403216913081920" target="_blank">http://www.facebook.com/messages/403216913081920</a>&nbsp;<br />\r\n<span style="color:#ff0000">*ช่องทางนี้จะตอบเร็วสุดครับผม</span><br />\r\nFpsthailand: Alienware-th &nbsp;Private Message(PM)</p>\r\n', 'public', '2016-11-07', '2016-11-07', 0, 'submit', 'vqq216s43evtcurc4seq9d54m4', '7');

-- --------------------------------------------------------

--
-- Table structure for table `d4is_product`
--

CREATE TABLE `d4is_product` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `product_shotdetail` text NOT NULL,
  `product_category` int(11) NOT NULL,
  `product_startprice` float NOT NULL,
  `product_qty` int(11) NOT NULL,
  `product_image` text NOT NULL,
  `product_visibility` enum('N','Y') NOT NULL DEFAULT 'Y',
  `product_regdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `d4is_product`
--

INSERT INTO `d4is_product` (`product_id`, `product_name`, `product_shotdetail`, `product_category`, `product_startprice`, `product_qty`, `product_image`, `product_visibility`, `product_regdate`) VALUES
(1, 'Aurora - dpcwxt01', 'ALIENWARE AURORA GAMING DESKTOP', 2, 799.99, 0, 'http://i.dell.com/sites/imagecontent/consumer/merchandizing/en/PublishingImages/165x119/AW%20Migration%20Assets/desktops/alienware-desktop-category-premigration-day01_Compare-2.jpg', 'Y', '2016-11-06'),
(2, 'Alienware New 13 - dkcwe01h', 'The first of its kind to feature quad-core, H-class processors, the Alienware 13 has evolved to offer unprecendented graphics power with NVIDIA 10-series graphics.', 1, 1199.99, 0, 'http://i.dell.com/sites/imagecontent/app-merchandizing/responsive/LearnSegment/alienware/assets/en/PublishingImages/alienware-laptops/alienware-laptop-category-premigration-day01_Compare-1.jpg', 'Y', '2016-11-07'),
(3, 'Alienware New 13 - dkcwe02h', 'Alienware’s most powerful 13" gaming laptop. Featuring quad-core, H-class processors and NVIDIA 10-series graphics, the Alienware 13 has evolved to offer unprecedented gameplay.', 1, 1499.99, 0, 'http://i.dell.com/sites/imagecontent/app-merchandizing/responsive/LearnSegment/alienware/assets/en/PublishingImages/alienware-laptops/alienware-laptop-category-premigration-day01_Compare-1.jpg', 'Y', '2016-11-08');

-- --------------------------------------------------------

--
-- Table structure for table `d4is_product_attribute`
--

CREATE TABLE `d4is_product_attribute` (
  `pa_id` int(10) UNSIGNED NOT NULL,
  `pa_title` varchar(200) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `d4is_product_attribute`
--

INSERT INTO `d4is_product_attribute` (`pa_id`, `pa_title`, `product_id`) VALUES
(1, 'Processor', 1),
(2, 'Operating system', 1),
(3, 'Chassis', 1),
(4, 'Graphic card', 1),
(5, 'Memory', 1),
(6, 'Harddrive', 1),
(7, 'Optical drive', 1),
(8, 'Wireless', 1),
(9, 'Game controller', 1),
(10, 'Dell monitor', 1),
(11, 'Support', 1),
(12, 'ประกันอุบัติเหตุ', 1),
(13, 'OFFICE 365', 1),
(14, 'MICROSOFT OFFICE', 1),
(15, 'SECURITY SOFTWARE', 1),
(16, 'VIDEO CARD', 2),
(18, 'PROCESSOR', 2),
(19, 'OPERATING SYSTEM', 2),
(20, 'DISPLAY', 2),
(21, 'MEMORY', 2),
(22, 'HARD DRIVE', 2),
(23, 'WIRELESS', 2),
(24, 'PRIMARY BATTERY', 2),
(25, 'REGULATORY COMPLIANCE', 2),
(26, 'SERVICE', 2),
(27, 'SUPPORT', 2),
(28, 'MICROSOFT OFFICE 365 (WORD, EXCEL, POWERPOINT, OUTLOOK & MORE)', 2),
(29, 'MICROSOFT OFFICE', 2),
(31, 'SECURITY SOFTWARE', 2),
(32, 'VIDEO CARDI', 3),
(33, 'PROCESSOR', 3),
(34, 'OPERATING SYSTEM', 3),
(35, 'DISPLAY', 3),
(36, 'MEMORY', 3),
(37, 'HARD DRIVE', 3),
(38, 'WIRELESS', 3),
(39, 'PRIMARY BATTERY', 3),
(40, 'REGULATORY COMPLIANCE', 3),
(41, 'SERVICE', 3),
(42, 'SUPPORT', 3),
(43, 'MICROSOFT OFFICE 365 (WORD, EXCEL, POWERPOINT, OUTLOOK & MORE)', 3),
(44, 'MICROSOFT OFFICE', 3),
(45, 'SECURITY SOFTWARE', 3);

-- --------------------------------------------------------

--
-- Table structure for table `d4is_product_attribute_detail`
--

CREATE TABLE `d4is_product_attribute_detail` (
  `pad_id` int(10) UNSIGNED NOT NULL,
  `pa_detail` text NOT NULL,
  `pa_inculdeprice` float NOT NULL,
  `pa_recommand` enum('N','Y') NOT NULL DEFAULT 'N',
  `pa_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `d4is_product_attribute_detail`
--

INSERT INTO `d4is_product_attribute_detail` (`pad_id`, `pa_detail`, `pa_inculdeprice`, `pa_recommand`, `pa_id`) VALUES
(1, 'Intel® Core™ i3-6100 Processor (2-Cores, 3MB Cache, Turbo Boost 2.0, 3.7GHz)', 0, 'N', 1),
(2, 'Intel® Core™ i5-6400 Processor (4-Cores, 6MB Cache, Turbo Boost 2.0, up to 3.3GHz)', 100, 'N', 1),
(3, 'Windows 10 Home 64bit English', 0, 'N', 2),
(4, 'Windows 10 Pro 64-bit English', 50, 'Y', 2),
(5, 'Alienware™ 460 Watt Multi-GPU Approved Power Supply', 0, 'N', 3),
(6, 'Alienware™ 460 Watt Multi-GPU Approved Power Supply', 100, 'N', 3),
(7, 'Alienware™ 850 Watt Multi-GPU Approved Power Supply with High Peformance Liquid Cooling', 100, 'Y', 3),
(8, 'NVIDIA® GeForce® GTX 950 with 2GB GDDR5', 0, 'N', 4),
(9, 'NVIDIA® GeForce® GTX 960 with 2GB GDDR5', 50, 'N', 4),
(10, 'Radeon™ RX 480 with 8GB GDDR5', 125, 'N', 4),
(11, 'NVIDIA® GeForce® GTX 1070 Founders Edition with 8GB GDDR5', 350, 'N', 4),
(12, 'NVIDIA® GeForce® GTX 980 with 4GB GDDR5', 400, 'N', 4),
(13, 'NVIDIA® GeForce® GTX 980 Ti with 6GB GDDR5', 550, 'N', 4),
(14, 'NVIDIA® GeForce® GTX 1080 Founders Edition with 8GB GDDR5X', 650, 'Y', 4),
(15, 'Dual NVIDIA® GeForce® GTX 950 with 2GB GDDR5 each (NVIDIA SLI® Enabled)', 200, 'N', 4),
(16, 'Dual Radeon™ RX 480 with 8GB GDDR5 each (AMD CrossFire™ Enabled)', 450, 'N', 4),
(17, 'Dual NVIDIA® GeForce® GTX™ 1070 with 8GB GDDR5 each (NVIDIA SLI® Enabled)', 800, 'N', 4),
(18, 'Dual NVIDIA® GeForce® GTX 980 with 4GB GDDR5 each (NVIDIA SLI® Enabled)', 950, 'N', 4),
(19, 'Dual NVIDIA® GeForce® GTX 980 Ti with 6GB GDDR5 each (NVIDIA SLI® Enabled)', 125, 'N', 4),
(20, 'Dual NVIDIA® GeForce® GTX 1080 Founders Edition with 8GB GDDR5X each (NVIDIA SLI® Enabled)', 1450, 'N', 4),
(21, '8GB DDR4 at 2133MHz', 0, 'N', 5),
(22, '16GB DDR4 at 2133MHz', 150, 'Y', 5),
(23, '32GB DDR4 at 2133MHz', 400, 'N', 5),
(24, '64GB DDR4 at 2133MHz', 800, 'N', 5),
(25, 'Single bay : 1TB (64MB Cache) 7200 RPM SATA 6Gb/s', 0, 'N', 6),
(26, 'Single bay : 256GB M.2 PCIe Solid State Drive', 150, 'N', 6),
(27, 'Single bay : 512GB M.2 PCIe Solid State Drive', 275, 'N', 6),
(28, 'Single bay : 1TB M.2 PCIe Solid State Drive', 725, 'N', 6),
(29, 'Dual bay : 256GB M.2 PCIe SSD (Boot) + 1TB 7200RPM SATA 6Gb/s (Storage)', 230, 'Y', 6),
(30, 'Dual bay : 512GB M.2 PCIe SSD (Boot) + 1TB 7200RPM SATA 6Gb/s (Storage)', 355, 'N', 6),
(31, 'Intel® 3165 1x1 802.11ac Wi-Fi Wireless LAN and Bluetooth 4.2', 0, 'N', 8),
(32, 'Qualcomm DW1820 2x2 802.11ac Wi-Fi Wireless LAN and Bluetooth 4.1', 15, 'Y', 8),
(33, 'Optical Drive Not included', 0, 'N', 7),
(34, 'Tray Loading Dual Layer DVD Burner', 30, 'N', 7),
(35, 'None', 0, 'N', 9),
(36, 'Xbox One Wireless Controller', 50, 'N', 9),
(37, 'None', 0, 'N', 10),
(38, 'Dell UltraSharp 24 InfinityEdge Monitor - U2417H', 259.99, 'N', 10),
(39, 'Dell 24 Gaming Monitor - SE2417HG', 149.99, 'N', 10),
(40, 'Dell UltraSharp 27 InfinityEdge Monitor - U2717D', 539.99, 'N', 10),
(41, 'Dell UltraSharp 34 Curved Ultrawide Monitor - U3415W', 749.99, 'Y', 10),
(42, 'Dell 28 Ultra HD 4K Monitor - S2817Q', 429.99, 'N', 10),
(43, 'Dell 27 Curved Monitor - SE2716H', 399.99, 'N', 10),
(44, 'Dell 27 Gaming Monitor - S2716DG with HDMI cable', 623, 'Y', 10),
(45, '1 Year Limited Hardware Warranty with Onsite Service after Remote Diagnosis', 0, 'N', 11),
(46, '1 Year Premium Support (HARDWARE + SOFTWARE)', 89, 'N', 11),
(47, '2 Years Premium Support (HARDWARE + SOFTWARE)', 169, 'N', 11),
(48, '3 Years Premium Support (HARDWARE + SOFTWARE)', 239, 'Y', 11),
(49, '4 Years Premium Support (HARDWARE + SOFTWARE)', 299, 'N', 11),
(50, 'None', 0, 'N', 12),
(51, '1 Year Accidental Damage Service', 49, 'N', 12),
(52, '2 Year Accidental Damage Service', 79, 'N', 12),
(53, '3 Year Accidental Damage Service', 99, 'Y', 12),
(54, '4 Year Accidental Damage Service', 119, 'N', 12),
(55, 'None', 0, 'N', 13),
(56, 'Office 365 Personal Annual Subscription with Auto-Renewal : ANNUAL SUBSCRIPTION ON UP TO 1 PC + 1 TABLET', 69.99, 'Y', 13),
(57, 'Office 365 Home Annual Subscription with Auto-Renewal : ANNUAL SUBSCRIPTION ON UP TO 5 DEVICES', 99.99, 'N', 13),
(58, 'Microsoft Office Home and Student 2016', 139.99, 'N', 14),
(59, 'Microsoft Office Home and Business 2016', 229.99, 'Y', 14),
(60, 'Microsoft Office Professional 2016', 399.99, 'N', 14),
(61, 'Microsoft Office 30 Day Trial', 0, 'N', 14),
(62, 'No Anti-virus Requested', 0, 'N', 15),
(63, 'McAfee LiveSafe 12 Month Subscription', 50, 'N', 15),
(64, 'McAfee LiveSafe 36 Month Subscription', 99.99, 'Y', 15),
(65, 'NVIDIA® GeForce® GTX 1060 with 6GB GDDR5', 0, 'N', 16),
(66, 'Intel® Core™ i5-6300HQ (Quad-Core, 6MB Cache, up to 3.2GHz w/ Turbo Boost)', 0, 'N', 18),
(67, 'Windows 10 Home 64bit English', 0, 'N', 19),
(68, '13.3 inch HD (1366 x 768) TN Anti-Glare 200-nits Display', 0, 'N', 20),
(69, '8GB DDR4 at 2133MHz (1x8GB)', 0, 'N', 21),
(70, '16GB DDR4 at 2133MHz (2x8GB)', 100, 'Y', 21),
(71, '32GB DDR4 at 2133MHz (2x16GB)', 300, 'N', 21),
(72, '180GB M.2 SATA 6Gb/s SSD Single bay drive', 0, 'N', 22),
(73, '256GB PCIe SSD (Boot) Single bay drive', 100, 'N', 22),
(74, '512GB PCIe SSD (Boot) Single bay drive', 300, 'Y', 22),
(75, '1TB PCIe SSD (Boot) Single bay drive', 650, 'N', 22),
(76, '512GB PCIe SSD (Boot) + 256GB PCIe SSD (Storage) Dual bay drive', 500, 'N', 22),
(77, '1TB PCIe SSD (Boot) + 1TB PCIe SSD (Storage) Dual bay drive', 1400, 'N', 22),
(78, 'Killer 1435 802.11ac 2x2 WiFi and Bluetooth 4.1', 0, 'N', 23),
(79, 'Killer 1535 802.11ac 2x2 WiFi and Bluetooth 4.1', 25, 'Y', 23),
(80, 'Lithium Ion (76 Wh) Battery', 0, 'N', 24),
(81, 'Product Safety, EMC and Environmental Datasheets\nDell Regulatory Compliance Home Page\nDell and the Environment', 0, 'N', 25),
(82, '1 Year Hardware Service with Onsite/In-Home Service After Remote Diagnosis', 0, 'N', 26),
(83, '1 Year Premium Support (HARDWARE + SOFTWARE)', 119, 'N', 26),
(84, '2 Years Premium Support (HARDWARE + SOFTWARE)', 249, 'N', 26),
(85, '3 Years Premium Support (HARDWARE + SOFTWARE)', 359, 'Y', 26),
(86, '4 Years Premium Support (HARDWARE + SOFTWARE)', 449, 'N', 26),
(87, 'None', 0, 'N', 27),
(88, '1 Year Accidental Damage Service', 59, 'N', 27),
(89, '2 Year Accidental Damage Service', 109, 'N', 27),
(90, '3 Year Accidental Damage Service', 149, 'Y', 27),
(91, '4 Year Accidental Damage Service', 189, 'N', 27),
(92, 'None', 0, 'N', 28),
(93, 'Office 365 Personal Annual Subscription with Auto-Renewal (ANNUAL SUBSCRIPTION ON UP TO 1 PC + 1 TABLET)', 69.99, 'Y', 28),
(94, 'Office 365 Home Annual Subscription with Auto-Renewal (ANNUAL SUBSCRIPTION ON UP TO 5 DEVICES)', 99.99, 'N', 28),
(95, 'Microsoft Office Home and Business 2016 (PERMANENT LICENSE FOR 1 PC)', 299.99, 'N', 29),
(96, 'Microsoft Office Professional 2016 (PERMANENT LICENSE FOR 1 PC)', 399.99, 'N', 29),
(97, 'Microsoft Office 30 Day Trial (NO OFFICE LICENSE INCLUDED)', 0, 'N', 29),
(98, 'No Anti-virus Requested', 0, 'N', 31),
(99, 'McAfee LiveSafe 12 Month Subscription (1 years of McAfee for only $50 with system purchase ($89.99 value))', 50, 'N', 31),
(100, 'McAfee LiveSafe 36 Month Subscription (3 years of McAfee for the price of 2 ($269.97 value))', 99, 'Y', 31),
(101, 'NVIDIA® GeForce® GTX 1060 with 6GB GDDR5', 0, 'N', 32),
(102, 'Intel® Core™ i5-6300HQ (Quad-Core, 6MB Cache, up to 3.2GHz w/ Turbo Boost)', 0, 'N', 33),
(103, 'Intel® Core™ i7-6700HQ (Quad-Core, 6MB Cache, up to 3.5GHz w/ Turbo Boost)', 150, 'Y', 33),
(104, 'Windows 10 Home 64bit English', 0, 'N', 34),
(105, 'Windows 10 Pro 64-bit English', 50, 'Y', 34),
(106, '13.3 inch FHD (1920 x 1080) IPS Anti-Glare 300-nits Display', 0, 'N', 35),
(107, '13.3 inch QHD (2560 x 1440) OLED Anti-Glare 400-nits Display with Touch Technology', 250, 'Y', 35),
(108, '16GB DDR4 at 2133MHz (2x8GB)', 0, 'N', 36),
(109, '16GB DDR4 at 2400MHz (2x8GB)', 0, 'N', 36),
(110, '16GB DDR4 at 2667MHz (2x8GB)', 50, 'N', 36),
(111, '32GB DDR4 at 2133MHz (2x16GB)', 200, 'N', 36),
(112, '32GB DDR4 at 2400MHz (2x16GB)', 200, 'Y', 36),
(113, '256GB PCIe SSD (Boot) Single bay drive', 0, 'N', 37),
(114, '512GB PCIe SSD (Boot) Single bay drive', 200, 'N', 37),
(115, '1TB PCIe SSD (Boot) Single bay drive', 550, 'N', 37),
(116, '512GB PCIe SSD (Boot) + 256GB PCIe SSD (Storage) Dual bay drive', 400, 'N', 37),
(117, '1TB PCIe SSD (Boot) + 1TB PCIe SSD (Storage) Dual bay drive', 1300, 'N', 37),
(118, 'Killer 1435 802.11ac 2x2 WiFi and Bluetooth 4.1', 0, 'N', 38),
(119, 'Killer 1535 802.11ac 2x2 WiFi and Bluetooth 4.1', 25, 'Y', 38),
(120, 'Lithium Ion (76 Wh) Battery', 0, 'N', 39),
(121, 'Product Safety, EMC and Environmental Datasheets\nDell Regulatory Compliance Home Page\nDell and the Environment', 0, 'N', 40),
(122, '1 Year Hardware Service with Onsite/In-Home Service After Remote Diagnosis', 0, 'N', 41),
(123, '1 Year Premium Support (HARDWARE + SOFTWARE)', 119, 'N', 41),
(124, '2 Years Premium Support (HARDWARE + SOFTWARE)', 249, 'N', 41),
(125, '3 Years Premium Support', 359, 'Y', 41),
(126, '4 Years Premium Support', 449, 'N', 41),
(127, 'None', 0, 'N', 42),
(128, '1 Year Accidental Damage Service', 59, 'N', 42),
(129, '2 Year Accidental Damage Service', 109, 'N', 42),
(130, '3 Year Accidental Damage Service', 149, 'Y', 42),
(131, '4 Year Accidental Damage Service', 189, 'N', 42),
(132, 'None', 0, 'N', 43),
(133, 'Office 365 Personal Annual Subscription with Auto-Renewal (ANNUAL SUBSCRIPTION ON UP TO 1 PC + 1 TABLET)', 69.99, 'Y', 43),
(134, 'Office 365 Home Annual Subscription with Auto-Renewal (ANNUAL SUBSCRIPTION ON UP TO 5 DEVICES)', 99.99, 'N', 43),
(135, 'Microsoft Office Home and Business 2016', 229.99, 'Y', 44),
(136, 'Microsoft Office Professional 2016', 399.99, 'N', 44),
(137, 'Microsoft Office 30 Day Trial (NO OFFICE LICENSE INCLUDED)', 0, 'N', 44),
(138, 'No Anti-virus Requested', 0, 'N', 45),
(139, 'McAfee LiveSafe 12 Month Subscription\n1 years of McAfee for only $50 with system purchase ($89.99 value)', 50, 'N', 45),
(140, 'McAfee LiveSafe 36 Month Subscription 3 years of McAfee for the price of 2 ($269.97 value)', 99, 'Y', 45);

-- --------------------------------------------------------

--
-- Table structure for table `d4is_product_setup`
--

CREATE TABLE `d4is_product_setup` (
  `ps_id` int(10) UNSIGNED NOT NULL,
  `ps_session_id` text NOT NULL,
  `ps_product_id` int(11) NOT NULL,
  `ps_attr_id` int(11) NOT NULL,
  `ps_attr_price` float NOT NULL,
  `user_id` int(11) NOT NULL,
  `recog_date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `d4is_product_setup`
--

INSERT INTO `d4is_product_setup` (`ps_id`, `ps_session_id`, `ps_product_id`, `ps_attr_id`, `ps_attr_price`, `user_id`, `recog_date`) VALUES
(1, '2qbf2e8moh0g45vnj8saanhpk3', 1, 2, 100, 0, 2016),
(2, 'gdikes3esurgafn044qktekkb6', 1, 2, 100, 0, 2016),
(3, 'gdikes3esurgafn044qktekkb6', 1, 4, 50, 0, 2016),
(4, 'gdikes3esurgafn044qktekkb6', 1, 6, 100, 0, 2016),
(5, 'gdikes3esurgafn044qktekkb6', 1, 5, 0, 0, 2016),
(6, 'gdikes3esurgafn044qktekkb6', 1, 6, 100, 0, 2016),
(7, 'gdikes3esurgafn044qktekkb6', 1, 7, 100, 0, 2016),
(8, 'gdikes3esurgafn044qktekkb6', 1, 5, 0, 0, 2016),
(9, '6qjocu1om9rltf53ilqoh128u4', 1, 6, 100, 0, 2016),
(10, '6qjocu1om9rltf53ilqoh128u4', 1, 7, 100, 0, 2016),
(11, '6qjocu1om9rltf53ilqoh128u4', 1, 6, 100, 0, 2016),
(12, '3kjpclflv2vgtak1e1f47ag861', 1, 4, 50, 0, 2016),
(15, '9b94fq64iksl4bi6ig5lnao8e1', 1, 6, 100, 0, 2016),
(16, 'q3pmrgqdi7t8e20d4u22s4a3d5', 1, 4, 50, 0, 2016),
(22, 'q3pmrgqdi7t8e20d4u22s4a3d5', 1, 9, 50, 0, 2016),
(23, 'q3pmrgqdi7t8e20d4u22s4a3d5', 1, 10, 125, 0, 2016),
(26, 'tmfp4ou60o59it7aac3l5gb9k0', 1, 9, 50, 0, 2016),
(27, 'tmfp4ou60o59it7aac3l5gb9k0', 1, 8, 0, 0, 2016),
(28, 'tmfp4ou60o59it7aac3l5gb9k0', 1, 9, 50, 0, 2016),
(29, 'tmfp4ou60o59it7aac3l5gb9k0', 1, 10, 125, 0, 2016),
(30, 'tmfp4ou60o59it7aac3l5gb9k0', 1, 9, 50, 0, 2016),
(31, 'tmfp4ou60o59it7aac3l5gb9k0', 1, 8, 0, 0, 2016),
(32, 's9k2p636f4tqd9ih81alctm7v2', 1, 9, 50, 0, 2016),
(33, 's9k2p636f4tqd9ih81alctm7v2', 1, 10, 125, 0, 2016),
(40, 'bguua41ka1c7buq635q8sg2p53', 1, 8, 0, 0, 2016),
(46, 'pq61fa1rq62u96j7997qjgfsp7', 1, 22, 150, 0, 2016),
(47, 'pq61fa1rq62u96j7997qjgfsp7', 1, 34, 30, 0, 2016),
(48, 'pq61fa1rq62u96j7997qjgfsp7', 1, 48, 239, 0, 2016),
(49, 'pq61fa1rq62u96j7997qjgfsp7', 1, 53, 99, 0, 2016),
(60, 'pq61fa1rq62u96j7997qjgfsp7', 1, 4, 50, 0, 2016),
(65, 'pq61fa1rq62u96j7997qjgfsp7', 1, 6, 100, 0, 2016),
(66, 'pq61fa1rq62u96j7997qjgfsp7', 1, 25, 0, 0, 2016),
(70, 'pq61fa1rq62u96j7997qjgfsp7', 1, 1, 0, 0, 2016),
(71, 'pq61fa1rq62u96j7997qjgfsp7', 1, 56, 69.99, 0, 2016),
(72, 'pq61fa1rq62u96j7997qjgfsp7', 1, 8, 0, 0, 2016),
(73, 'mgt5ibiamidvs3iqmktgq5e0a3', 1, 7, 100, 0, 2016),
(74, 'mgt5ibiamidvs3iqmktgq5e0a3', 1, 10, 125, 0, 2016),
(75, 'mgt5ibiamidvs3iqmktgq5e0a3', 1, 22, 150, 0, 2016),
(76, 'a2gtonp9bneavhpmn4rt99bfi6', 1, 4, 50, 0, 2016),
(77, 'a2gtonp9bneavhpmn4rt99bfi6', 1, 7, 100, 0, 2016),
(78, 'a2gtonp9bneavhpmn4rt99bfi6', 1, 10, 125, 0, 2016),
(79, '1upmtqqft2ci4knikj6mq79207', 2, 70, 100, 0, 2016),
(80, '1upmtqqft2ci4knikj6mq79207', 2, 73, 100, 0, 2016),
(81, 's0kbsvctpbbanc1bjlsq6u7q83', 2, 70, 100, 0, 2016),
(82, 's0kbsvctpbbanc1bjlsq6u7q83', 2, 65, 0, 0, 2016),
(83, 's0kbsvctpbbanc1bjlsq6u7q83', 2, 74, 300, 0, 2016),
(84, 's0kbsvctpbbanc1bjlsq6u7q83', 2, 79, 25, 0, 2016),
(86, 's0kbsvctpbbanc1bjlsq6u7q83', 2, 85, 359, 0, 2016),
(88, 'vul9de3pp5ff6k37irlv7vts82', 3, 102, 0, 0, 2016),
(89, 'fuqih31kfh001383uhjo7ua6p6', 3, 103, 150, 0, 2016),
(90, 'fuqih31kfh001383uhjo7ua6p6', 3, 107, 250, 0, 2016);

-- --------------------------------------------------------

--
-- Table structure for table `d4is_quotation`
--

CREATE TABLE `d4is_quotation` (
  `qt_id` int(10) UNSIGNED NOT NULL,
  `qt_toname` varchar(200) NOT NULL,
  `qt_email` varchar(200) NOT NULL,
  `qt_info` text NOT NULL,
  `qt_approve` enum('N','Y') NOT NULL DEFAULT 'N',
  `qt_type` enum('1','2') NOT NULL DEFAULT '1',
  `qt_regdate` date NOT NULL,
  `qt_acc_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `d4is_quotation`
--

INSERT INTO `d4is_quotation` (`qt_id`, `qt_toname`, `qt_email`, `qt_info`, `qt_approve`, `qt_type`, `qt_regdate`, `qt_acc_id`) VALUES
(1, 'ฐากูร ปราบปรี', 't.prappre@outlook.com', 'Dell Alienware 13', 'N', '1', '2016-11-08', 8);

-- --------------------------------------------------------

--
-- Table structure for table `d4is_useraccount`
--

CREATE TABLE `d4is_useraccount` (
  `acc_id` int(10) UNSIGNED NOT NULL,
  `acc_email` varchar(255) NOT NULL,
  `acc_password` text NOT NULL,
  `acc_regdate` date NOT NULL,
  `acc_regby` enum('Normal','Facebook') NOT NULL DEFAULT 'Normal',
  `acc_activestatus` enum('N','Y') NOT NULL DEFAULT 'Y',
  `acc_type` enum('1','2') NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `d4is_useraccount`
--

INSERT INTO `d4is_useraccount` (`acc_id`, `acc_email`, `acc_password`, `acc_regdate`, `acc_regby`, `acc_activestatus`, `acc_type`) VALUES
(4, 'asd@gmail.com', '2e1ed0fb3968e9fa82b249dc052ee9e4', '2016-10-30', 'Normal', 'Y', '2'),
(5, 'asda@gmail.com', '2e1ed0fb3968e9fa82b249dc052ee9e4', '2016-10-30', 'Normal', 'Y', '2'),
(6, 'asdasd!@gmail.com', '2e1ed0fb3968e9fa82b249dc052ee9e4', '2016-10-30', 'Normal', 'Y', '2'),
(7, 'tagoon.p@gmail.com', '12d789f35c40fecebf9d914f95fb2246', '2016-10-30', 'Normal', 'Y', '1'),
(8, 't.prappre@outlook.com', '2f8bb1aec2ddedd09f4067f188674d3b', '2016-11-07', 'Normal', 'Y', '2');

-- --------------------------------------------------------

--
-- Table structure for table `d4is_userinfo`
--

CREATE TABLE `d4is_userinfo` (
  `info_id` int(10) UNSIGNED NOT NULL,
  `prefix_id` int(11) NOT NULL,
  `fname` varchar(160) NOT NULL,
  `lname` varchar(160) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(14) NOT NULL,
  `acc_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `d4is_userinfo`
--

INSERT INTO `d4is_userinfo` (`info_id`, `prefix_id`, `fname`, `lname`, `address`, `phone`, `acc_id`) VALUES
(1, 1, 'Tagoon', 'Prappre', '', '', 7);

-- --------------------------------------------------------

--
-- Table structure for table `tb_facebook`
--

CREATE TABLE `tb_facebook` (
  `ID` int(6) NOT NULL,
  `FACEBOOK_ID` varchar(50) NOT NULL,
  `NAME` varchar(150) NOT NULL,
  `LINK` varchar(250) NOT NULL,
  `CREATE_DATE` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `d4is_category`
--
ALTER TABLE `d4is_category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `d4is_menuposition`
--
ALTER TABLE `d4is_menuposition`
  ADD PRIMARY KEY (`mnp_id`);

--
-- Indexes for table `d4is_menus`
--
ALTER TABLE `d4is_menus`
  ADD PRIMARY KEY (`mn_id`);

--
-- Indexes for table `d4is_post`
--
ALTER TABLE `d4is_post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `d4is_product`
--
ALTER TABLE `d4is_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `d4is_product_attribute`
--
ALTER TABLE `d4is_product_attribute`
  ADD PRIMARY KEY (`pa_id`);

--
-- Indexes for table `d4is_product_attribute_detail`
--
ALTER TABLE `d4is_product_attribute_detail`
  ADD PRIMARY KEY (`pad_id`);

--
-- Indexes for table `d4is_product_setup`
--
ALTER TABLE `d4is_product_setup`
  ADD PRIMARY KEY (`ps_id`);

--
-- Indexes for table `d4is_quotation`
--
ALTER TABLE `d4is_quotation`
  ADD PRIMARY KEY (`qt_id`);

--
-- Indexes for table `d4is_useraccount`
--
ALTER TABLE `d4is_useraccount`
  ADD PRIMARY KEY (`acc_id`);

--
-- Indexes for table `d4is_userinfo`
--
ALTER TABLE `d4is_userinfo`
  ADD PRIMARY KEY (`info_id`);

--
-- Indexes for table `tb_facebook`
--
ALTER TABLE `tb_facebook`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`FACEBOOK_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `d4is_category`
--
ALTER TABLE `d4is_category`
  MODIFY `cat_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `d4is_menuposition`
--
ALTER TABLE `d4is_menuposition`
  MODIFY `mnp_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `d4is_menus`
--
ALTER TABLE `d4is_menus`
  MODIFY `mn_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `d4is_post`
--
ALTER TABLE `d4is_post`
  MODIFY `post_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `d4is_product`
--
ALTER TABLE `d4is_product`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `d4is_product_attribute`
--
ALTER TABLE `d4is_product_attribute`
  MODIFY `pa_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `d4is_product_attribute_detail`
--
ALTER TABLE `d4is_product_attribute_detail`
  MODIFY `pad_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;
--
-- AUTO_INCREMENT for table `d4is_product_setup`
--
ALTER TABLE `d4is_product_setup`
  MODIFY `ps_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;
--
-- AUTO_INCREMENT for table `d4is_quotation`
--
ALTER TABLE `d4is_quotation`
  MODIFY `qt_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `d4is_useraccount`
--
ALTER TABLE `d4is_useraccount`
  MODIFY `acc_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `d4is_userinfo`
--
ALTER TABLE `d4is_userinfo`
  MODIFY `info_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_facebook`
--
ALTER TABLE `tb_facebook`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
