-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2024 at 06:29 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `content_ms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `aminities`
--

CREATE TABLE `aminities` (
  `id` int(10) NOT NULL,
  `ami_icon` varchar(255) DEFAULT NULL,
  `ami_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `aminities`
--

INSERT INTO `aminities` (`id`, `ami_icon`, `ami_name`) VALUES
(1, 'uploads/_Banner for site.jpg', '<p>Something Aminity</p>'),
(2, 'uploads/_DLF The Crest Banner.jpg', '<p>Second Aminity</p>'),
(6, 'uploads/icon4.png', 'Parking'),
(7, 'uploads/icon5.png', 'Room Service'),
(8, 'uploads/icon6.png', 'Spa and Wellness'),
(9, 'uploads/icon7.png', 'Air Conditioning'),
(10, 'uploads/icon8.png', 'Breakfast Included'),
(11, 'uploads/icon9.png', 'Pet Friendly'),
(12, 'uploads/icon10.png', '24-Hour Security'),
(13, 'uploads/1_image_some.jpg', '<p>Testing Aminity work</p>'),
(14, 'uploads/sid_prop.jpg', '<p>Something Aminity</p>');

-- --------------------------------------------------------

--
-- Table structure for table `aminity_content`
--

CREATE TABLE `aminity_content` (
  `id` int(10) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `para_text` varchar(200) NOT NULL,
  `ami_image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `aminity_content`
--

INSERT INTO `aminity_content` (`id`, `heading`, `para_text`, `ami_image`) VALUES
(1, '<h1><span style=\"color: #c39710; font-family: \'comic sans ms\', sans-serif;\"><strong>Amenities</strong></span></h1>\r\n<p><span style=\"font-family: verdana, geneva, sans-serif;\">Embassy Lake Terraces beckons you to indulge in over 60 international standard a', '<p><strong>Sky Deck </strong></p>\r\n<p>2 Acers Sky Deck On the 11th Floor</p>', '_5006112-0-Board-walk2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `carousel_slides`
--

CREATE TABLE `carousel_slides` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `heading_text` varchar(255) NOT NULL,
  `paragraph_text` text DEFAULT NULL,
  `button_text` varchar(255) DEFAULT 'Enquiry',
  `button_color` varchar(7) DEFAULT '#007bff',
  `button_text_color` varchar(7) DEFAULT '#ffffff'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carousel_slides`
--

INSERT INTO `carousel_slides` (`id`, `image`, `heading_text`, `paragraph_text`, `button_text`, `button_color`, `button_text_color`) VALUES
(9, 'IMG_20171029_134433.jpg', '<h1><strong>Updated First Slide</strong></h1>\r\n<p>&nbsp;</p>', '<p>Updated We are offering you great pleasured things here and you willl enjoy .We are offering you great pleasured things here and you willl enjoy.&nbsp;<span style=\"font-family: \'book antiqua\', palatino, serif;\"><em><strong>We are offering you great pleasured things here </strong></em></span>and you willl enjoy.We are offering you great pleasured things here and you willl enjoy</p>', 'Enquiry Now', '#007bff', '#ffffff'),
(10, '_5006112-0-Board-walk2.jpg', '<h1>Second Slide</h1>', '<p>Something here is amazing,Something here is amazing,Something here is amazing,Something here is amazing,Something here is amazing,Something here is amazing</p>', 'Enquiry Now', '#93691f', '#ffffff'),
(12, '1_image_some.jpg', '<h1><strong>Changed&nbsp; Heading Property</strong></h1>', '<p>Changed Pragraph Here is Paragraph which you want to put about you description of your businness and all as you want ok</p>', 'Enquiry Now ', '#ff00ae', '#ffffff');

-- --------------------------------------------------------

--
-- Table structure for table `floor_gallery`
--

CREATE TABLE `floor_gallery` (
  `id` int(10) NOT NULL,
  `image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `floor_gallery`
--

INSERT INTO `floor_gallery` (`id`, `image_path`) VALUES
(1, 'IMG_20171126_140701.jpg'),
(2, 'https://images.unsplash.com/photo-1593642632785-e7b6b9d1f557?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwzNjUyOXwwfDF8c2VhcmNofDR8fGZsb3VyJTIwZ2FsbGVyeXxlbnwwfHx8fDE2ODg5NTAwMDE&ixlib=rb-1.2.1&q=80&w=400'),
(3, 'https://images.unsplash.com/photo-1574158622684-8cfba320ed3f?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwzNjUyOXwwfDF8c2VhcmNofDExfHxmbG9vciUyMGdhbGxlcnl8ZW58MHx8fHwxNjg4OTUwMDAz&ixlib=rb-1.2.1&q=80&w=400'),
(4, 'https://images.unsplash.com/photo-1536610350940-4f72437d97db?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwzNjUyOXwwfDF8c2VhcmNofDEyfHxmbG9vciUyMGdhdGhlc3xlbnwwfHx8fDE2ODg5NTAwMDI&ixlib=rb-1.2.1&q=80&w=400'),
(5, 'https://images.unsplash.com/photo-1612431238493-3f51f0ff0ab5?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwzNjUyOXwwfDF8c2VhcmNofDExMnx8c2hvdHN8ZW58MHx8fHwxNjg4OTUwMDA1&ixlib=rb-1.2.1&q=80&w=400'),
(6, 'https://images.unsplash.com/photo-1579021610355-07e878f0480b?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwzNjUyOXwwfDF8c2VhcmNofDExfHxmbG9vciUyMGdyYXZlbHxlbnwwfHx8fDE2ODg5NTAwMDY&ixlib=rb-1.2.1&q=80&w=400'),
(7, 'https://images.unsplash.com/photo-1598323527553-4b87b06ab18b?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwzNjUyOXwwfDF8c2VhcmNofDEyfHxmbG9vciUyMGdyYXZlbHxlbnwwfHx8fDE2ODg5NTAwMDc&ixlib=rb-1.2.1&q=80&w=400'),
(8, 'https://images.unsplash.com/photo-1524373097571-b8a2bb9a7a62?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwzNjUyOXwwfDF8c2VhcmNofDE2fHxmbG9vciUyMGdyYXZlbHxlbnwwfHx8fDE2ODg5NTAwMDg&ixlib=rb-1.2.1&q=80&w=400'),
(9, 'https://images.unsplash.com/photo-1551971481-9f6e21c7e30c?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwzNjUyOXwwfDF8c2VhcmNofDExfHxmbG9vciUyMGdyYXZlbHxlbnwwfHx8fDE2ODg5NTAwMDk&ixlib=rb-1.2.1&q=80&w=400');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(10) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `image`) VALUES
(2, 'IMG_20171029_143349.jpg'),
(3, 'IMG_20171126_140656.jpg'),
(5, 'IMG_20180107_115656_BURST6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `gallery_headings`
--

CREATE TABLE `gallery_headings` (
  `id` int(10) NOT NULL,
  `heading` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery_headings`
--

INSERT INTO `gallery_headings` (`id`, `heading`) VALUES
(1, '<p><em>Gallery</em></p>');

-- --------------------------------------------------------

--
-- Table structure for table `header`
--

CREATE TABLE `header` (
  `id` int(10) NOT NULL,
  `logo_image` varchar(200) NOT NULL,
  `c_image` varchar(255) NOT NULL,
  `mobile_number` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `header`
--

INSERT INTO `header` (`id`, `logo_image`, `c_image`, `mobile_number`) VALUES
(1, 'uploadlogofile.png', '1_image_some.jpg', '+91 9146042932');

-- --------------------------------------------------------

--
-- Table structure for table `horizon_section_content`
--

CREATE TABLE `horizon_section_content` (
  `id` int(10) NOT NULL,
  `heading` text NOT NULL,
  `para_text` text NOT NULL,
  `image_path` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `horizon_section_content`
--

INSERT INTO `horizon_section_content` (`id`, `heading`, `para_text`, `image_path`) VALUES
(1, '<h1><span style=\"font-family: \'comic sans ms\', sans-serif;\">MAKE</span><strong> <span style=\"color: #2dc26b;\">YOUR</span> Mark ON THE HORIZON </strong>&nbsp;</h1>\r\n<p>Within the renowned Embassy Lake Terraces, the Signature Residences stands as the crown jewel that is in a league of its own. These residences epitomize luxurious living, perfectly blending the grandeur of villa life with the sophisticated features and conveniences of upscale condominium living.  </p>\r\n<p>Designed to be a statement home, every space is meticulously crafted to elevate your achievements and celebrate your legacy.</p>', '', '1_image_some.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `landmark_content`
--

CREATE TABLE `landmark_content` (
  `id` int(10) NOT NULL,
  `heading` text NOT NULL,
  `para_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `landmark_content`
--

INSERT INTO `landmark_content` (`id`, `heading`, `para_text`) VALUES
(1, '<p><strong>MARQUEE Landmark </strong></p>\r\n<p>Strategically nestled in Hebbal, Embassy Lake Terraces enjoys a prime location at the heart of growth and investment in the Indian Silicon Valley. Renowned as the preferred destination for luxury lifestyles and office space developments, Hebbal offers endless opportunities.</p>', '0');

-- --------------------------------------------------------

--
-- Table structure for table `lifestyle_residences`
--

CREATE TABLE `lifestyle_residences` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `image_path` varchar(255) NOT NULL,
  `btn_text` varchar(255) DEFAULT NULL,
  `btn_details` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lifestyle_residences`
--

INSERT INTO `lifestyle_residences` (`id`, `title`, `subtitle`, `image_path`, `btn_text`, `btn_details`, `description`) VALUES
(4, '<p>Updated Card Title</p>', '<p>Updated CArd Subtitle</p>', 'uploads/_5006112-0-Board-walk2.jpg', '<p>TEXT of button here</p>', '<p>something details are | where which you want to add</p>', '<p>something description hover ere you need to add for your saftey</p>'),
(6, '<p>second card</p>', '<p>something in card subtitle</p>', 'uploads/_DLF The Crest Banner.jpg', NULL, '<p>Property Details | Here</p>', '<p>What Description You want to asddd</p>'),
(8, '<p>Title Example</p>', '<p>Subtitle Example</p>', 'uploads/1_image_some.jpg', NULL, '<p>Some Details here you want to add for your busineesss and some other details</p>', '<p>some description you can add over here for youu</p>');

-- --------------------------------------------------------

--
-- Table structure for table `life_style_content`
--

CREATE TABLE `life_style_content` (
  `id` int(10) NOT NULL,
  `heading` text NOT NULL,
  `para_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `life_style_content`
--

INSERT INTO `life_style_content` (`id`, `heading`, `para_text`) VALUES
(1, '<p><span style=\"font-size: 14pt;\"><strong><span style=\"color: #c39710;\">CHOOSE</span> THE Lifestyle YOU DESIRE&nbsp;</strong></span></p>\r\n<p>Presenting a diverse collection of residences, thoughtfully crafted to suit your aspirations. At Embassy Lake Terraces, the choice is yours to embrace.</p>', 'Presenting a diverse collection of residences, thoughtfully crafted to suit your aspirations. At Embassy Lake Terraces, the choice is yours to embrace.');

-- --------------------------------------------------------

--
-- Table structure for table `master_gallery`
--

CREATE TABLE `master_gallery` (
  `id` int(10) NOT NULL,
  `image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `master_gallery`
--

INSERT INTO `master_gallery` (`id`, `image_path`) VALUES
(1, 'IMG_20171029_134428.jpg'),
(2, 'https://images.unsplash.com/photo-1593642632785-e7b6b9d1f557?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwzNjUyOXwwfDF8c2VhcmNofDR8fGZsb3VyJTIwZ2FsbGVyeXxlbnwwfHx8fDE2ODg5NTAwMDE&ixlib=rb-1.2.1&q=80&w=400'),
(3, 'https://images.unsplash.com/photo-1574158622684-8cfba320ed3f?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwzNjUyOXwwfDF8c2VhcmNofDExfHxmbG9vciUyMGdhbGxlcnl8ZW58MHx8fHwxNjg4OTUwMDAz&ixlib=rb-1.2.1&q=80&w=400'),
(4, 'https://images.unsplash.com/photo-1536610350940-4f72437d97db?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwzNjUyOXwwfDF8c2VhcmNofDEyfHxmbG9vciUyMGdhdGhlc3xlbnwwfHx8fDE2ODg5NTAwMDI&ixlib=rb-1.2.1&q=80&w=400'),
(5, 'https://images.unsplash.com/photo-1612431238493-3f51f0ff0ab5?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwzNjUyOXwwfDF8c2VhcmNofDExMnx8c2hvdHN8ZW58MHx8fHwxNjg4OTUwMDA1&ixlib=rb-1.2.1&q=80&w=400'),
(6, 'https://images.unsplash.com/photo-1579021610355-07e878f0480b?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwzNjUyOXwwfDF8c2VhcmNofDExfHxmbG9vciUyMGdyYXZlbHxlbnwwfHx8fDE2ODg5NTAwMDY&ixlib=rb-1.2.1&q=80&w=400'),
(7, 'https://images.unsplash.com/photo-1598323527553-4b87b06ab18b?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwzNjUyOXwwfDF8c2VhcmNofDEyfHxmbG9vciUyMGdyYXZlbHxlbnwwfHx8fDE2ODg5NTAwMDc&ixlib=rb-1.2.1&q=80&w=400'),
(8, 'https://images.unsplash.com/photo-1524373097571-b8a2bb9a7a62?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwzNjUyOXwwfDF8c2VhcmNofDE2fHxmbG9vciUyMGdyYXZlbHxlbnwwfHx8fDE2ODg5NTAwMDg&ixlib=rb-1.2.1&q=80&w=400'),
(9, 'https://images.unsplash.com/photo-1551971481-9f6e21c7e30c?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwzNjUyOXwwfDF8c2VhcmNofDExfHxmbG9vciUyMGdyYXZlbHxlbnwwfHx8fDE2ODg5NTAwMDk&ixlib=rb-1.2.1&q=80&w=400');

-- --------------------------------------------------------

--
-- Table structure for table `master_plan_content`
--

CREATE TABLE `master_plan_content` (
  `id` int(10) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `para_text` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `master_plan_content`
--

INSERT INTO `master_plan_content` (`id`, `heading`, `para_text`) VALUES
(1, '<h1 style=\"text-align: center;\"><strong>DOWNLOAD MASTER PLAN &amp; FLOOR PLAN</strong> OF&nbsp;<em>Embassy Lake Terraces Enjoy&nbsp;</em></h1>\r\n<p style=\"text-align: center;\">unparalleled convenience with Manipal Hospital, leading tech parks, and internat', '');

-- --------------------------------------------------------

--
-- Table structure for table `master_static_images`
--

CREATE TABLE `master_static_images` (
  `id` int(10) NOT NULL,
  `image_path_floor` varchar(255) NOT NULL,
  `image_path_master` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `master_static_images`
--

INSERT INTO `master_static_images` (`id`, `image_path_floor`, `image_path_master`) VALUES
(1, 'IMG_20180612_114526.jpg', 'IMG_20180213_124152.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `nearby_places`
--

CREATE TABLE `nearby_places` (
  `id` int(11) NOT NULL,
  `type` varchar(50) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `distance` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nearby_places`
--

INSERT INTO `nearby_places` (`id`, `type`, `name`, `distance`) VALUES
(1, 'nearby', 'Mall 1', '1 km'),
(2, 'nearby', 'Park', '2 km'),
(3, 'nearby', 'Hospital', '3 km'),
(4, 'nearby', 'School', '1.5 km'),
(5, 'commute', 'Kempegowda International Airport', '14 km'),
(6, 'commute', 'Devanahalli Railway Station', '4.3 km'),
(7, 'commute', 'Dodjala H Station', '13 km'),
(8, 'commute', 'Rani Circle Stop', '12.8 km'),
(9, 'nearby', 'something', '1.2km'),
(10, 'nearby', 'area name', '12 - 4');

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `plot_size` varchar(100) DEFAULT NULL,
  `configuration` varchar(100) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `p_status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `name`, `location`, `price`, `type`, `plot_size`, `configuration`, `image`, `p_status`) VALUES
(4, 'Updated proeprty ', 'Mumbai', '2 cr - 3 cr', 'what is ', '1000-2000', 'yesss', 'IMG_20171029_143356.jpg', 'Pre Launch'),
(6, 'some Property', 'Pune', '1 Cr - 2 Cr', 'something', '1000-2000', 'something', 'sid_prop.jpg', 'Under Construction');

-- --------------------------------------------------------

--
-- Table structure for table `property_conent`
--

CREATE TABLE `property_conent` (
  `id` int(10) NOT NULL,
  `heading` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `property_conent`
--

INSERT INTO `property_conent` (`id`, `heading`) VALUES
(1, '<h1 style=\"text-align: center;\"><strong><span style=\"color: #c39710;\">SIMILAR</span> Properties</strong></h1>');

-- --------------------------------------------------------

--
-- Table structure for table `security_content`
--

CREATE TABLE `security_content` (
  `id` int(10) NOT NULL,
  `scm_image` varchar(255) NOT NULL,
  `heading` text NOT NULL,
  `para_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `security_content`
--

INSERT INTO `security_content` (`id`, `scm_image`, `heading`, `para_text`) VALUES
(1, '_Banner for site.jpg', '<h1 class=\"text-white\"><span style=\"color: #c39710;\"><strong>UnParalleled</strong></span> Security &amp;&nbsp;<br>Maintenance</h1>\r\n<p class=\"text-white\">Enjoy peace of mind with our single-door lock-out system complemented by an integrated multi-layered security system, all managed by professionals for a truly hassle-free living experience.</p>\r\n<hr style=\"border-color: white; opacity: 0.5;\">\r\n<h2 class=\"text-white\">Prime Location with <br>Enhanced Connectivity</h2>\r\n<p class=\"text-white\">Located in a prime luxury destination, these residences offer convenient access to essential services and unparalleled connectivity to Bangalore\'s Airport (BIAL) and CBD.</p>\r\n<h2 class=\"text-white\">Prime Location with <br>Enhanced Connectivity</h2>\r\n<p class=\"text-white\">Located in a prime luxury destination, these residences offer convenient access to essential services and unparalleled connectivity to Bangalore\'s Airport (BIAL) and CBD.</p>\r\n<hr style=\"border-color: white; opacity: 0.5;\">', '');

-- --------------------------------------------------------

--
-- Table structure for table `security_content_image`
--

CREATE TABLE `security_content_image` (
  `id` int(10) NOT NULL,
  `sc_image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `site_visits`
--

CREATE TABLE `site_visits` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `preferred_date` varchar(200) NOT NULL,
  `message` text NOT NULL,
  `property_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `site_visits`
--

INSERT INTO `site_visits` (`id`, `first_name`, `last_name`, `phone`, `email`, `preferred_date`, `message`, `property_id`, `created_at`) VALUES
(1, 'Siddharth', 'Shingade', '9098786765', 'siddharth.k.shingade@gmail.com', '0000-00-00', '', 4, '2024-09-27 05:06:21'),
(2, 'Siddharth', 'Shingade', '9098786765', 'siddharth.k.shingade@gmail.com', '0000-00-00', '', 4, '2024-09-27 05:08:05'),
(4, 'namste', 'main hu', '9098786765', 'dkjalnaproject@gmail.com', '', '', 4, '2024-09-27 05:18:03'),
(5, 'Siddharth', 'Shingade', '9098786765', 'dkjalnaproject@gmail.com', '2024-10-06', '', 4, '2024-09-27 05:19:47'),
(6, 'Arjun', 'Lokare', '9098789099', 'arjun@gmail.com', '2024-10-26', '', 0, '2024-10-10 15:00:06'),
(7, 'siddharth', 'shingade', '9146042932', 'siddharth.k.shingade@gmail.com', '2024-10-19', '', 0, '2024-10-10 15:22:56'),
(8, 'Aaditya', 'Patiil', '6676755445', 'aadi@gmail.com', '2024-11-01', '', 0, '2024-10-10 15:54:39');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(11) NOT NULL,
  `heading` varchar(300) NOT NULL,
  `heading_para` varchar(300) NOT NULL,
  `enquire_button` varchar(200) NOT NULL,
  `position` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `tag` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `specifications`
--

CREATE TABLE `specifications` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `icon_path` varchar(255) NOT NULL,
  `info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `specifications`
--

INSERT INTO `specifications` (`id`, `title`, `icon_path`, `info`) VALUES
(12, 'Balcony', 'path-to-balcony-icon.png', 'Spacious balconies with anti-slip flooring and glass railings.'),
(13, 'Lighting', 'path-to-lighting-icon.png', 'LED lighting fixtures with energy-saving and dimming options for all spaces.'),
(14, 'Gym', 'path-to-gym-icon.png', 'Fully-equipped gym with state-of-the-art machines and free weights.'),
(15, 'Swimming Pool', 'path-to-swimming-pool-icon.png', 'Olympic-sized swimming pool with temperature control and underwater lighting.'),
(16, 'Garden', 'path-to-garden-icon.png', 'Landscaped gardens with walking paths and a children’s play area.'),
(17, '<p>PHPPPP</p>', 'IMG_20190430_185724.jpg', '<p>PHP is programming language whichh we use to create static and dynamic pages which are embedd with html&nbsp;</p>'),
(18, '<p>Testing Specification</p>', '1_image_some.jpg', '<p>Here is Description of this specification where admin added this specification and admin can manipulate the text and he can change the text colorr and all of this</p>'),
(19, '<p>Added Specification</p>', '1_image_some.jpg', '<p>Something Description for checking something</p>');

-- --------------------------------------------------------

--
-- Table structure for table `specification_content`
--

CREATE TABLE `specification_content` (
  `id` int(10) NOT NULL,
  `heading` text NOT NULL,
  `para_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `specification_content`
--

INSERT INTO `specification_content` (`id`, `heading`, `para_text`) VALUES
(1, '<h1><strong>Specification</strong></h1>\r\n<p>&nbsp;Embassy Lake Terraces beckons you to indulge in over 60 international standard amenities, meticulously crafted to cater to every age group and preference.</p>', '');

-- --------------------------------------------------------

--
-- Table structure for table `submissions`
--

CREATE TABLE `submissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `submissions`
--

INSERT INTO `submissions` (`id`, `first_name`, `last_name`, `phone`, `email`, `message`, `created_at`) VALUES
(1, 'Siddharth', 'Shingade', '9146042932', 'siddharth.k.shingade@gmail.com', 'something here to discuss', '2024-09-26 03:56:25'),
(2, 'Siddharth', 'Shingade', '9098786765', 'dkjalnaproject@gmail.com', 'something here to enquiry and i am gonna enquire', '2024-09-26 14:35:09'),
(3, 'mahesh', 'shingade', '7868584777', 'siddharth.k.shingade@gmail.com', 'something here for enquire', '2024-10-10 14:59:01'),
(4, 'Arjun', 'Yed', '8767676767', 'sidd@gmail.com', 'something that you can discuss with here', '2024-10-10 15:24:57'),
(5, 'Arjun', 'Yed', '8767676767', 'sidd@gmail.com', 'something that you can discuss with here', '2024-10-10 15:32:36'),
(6, 'Mahesh ', 'Lokare', '9146042932', 'mahesh@gmail.com', 'dfdlfdfldflk', '2024-10-10 15:41:48'),
(7, 'First Name', 'Last Name', '9099999999', 'soe@gmail.com', 'something here is sdlfkefk', '2024-10-10 15:55:37');

-- --------------------------------------------------------

--
-- Table structure for table `vc_image`
--

CREATE TABLE `vc_image` (
  `id` int(10) NOT NULL,
  `image_path` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `villa_content`
--

CREATE TABLE `villa_content` (
  `id` int(11) NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `heading_text` varchar(255) DEFAULT NULL,
  `paragraph_text` varchar(255) NOT NULL,
  `card_heading` varchar(255) NOT NULL,
  `card_text` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `villa_content`
--

INSERT INTO `villa_content` (`id`, `image_path`, `heading_text`, `paragraph_text`, `card_heading`, `card_text`) VALUES
(1, 'uploads/1726899919_IMG_20171029_134426.jpg', '<h2 class=\"text-white\"><span style=\"font-family: georgia, palatino, serif;\"><em>Villa</em> </span>GRANDEUR WITH HIGH-RISE SOPHISTICATION</h2>', '<p class=\"text-white\">Within the renowned Embassy Lake Terraces, the Signature Residences stands as the crown jewel that is in a league of its own. These residences epitomize luxurious living, perfectly blending the grandeur of villa life with the sophist', '<h1 class=\"gradient-text\"><span style=\"font-size: 10pt;\">READY TO MOVE IN</span></h1>', '<p class=\"text-white\">Simplex &amp; Duplex Residences | 4 &amp; 5 Bed Residences</p>\r\n<p class=\"text-white\">7825 to 9156 sq.ft. | 1 Cr - 2 Cr</p>');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aminities`
--
ALTER TABLE `aminities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aminity_content`
--
ALTER TABLE `aminity_content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carousel_slides`
--
ALTER TABLE `carousel_slides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `floor_gallery`
--
ALTER TABLE `floor_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery_headings`
--
ALTER TABLE `gallery_headings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `header`
--
ALTER TABLE `header`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `horizon_section_content`
--
ALTER TABLE `horizon_section_content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `landmark_content`
--
ALTER TABLE `landmark_content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lifestyle_residences`
--
ALTER TABLE `lifestyle_residences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `life_style_content`
--
ALTER TABLE `life_style_content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_gallery`
--
ALTER TABLE `master_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_plan_content`
--
ALTER TABLE `master_plan_content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_static_images`
--
ALTER TABLE `master_static_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nearby_places`
--
ALTER TABLE `nearby_places`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property_conent`
--
ALTER TABLE `property_conent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `security_content`
--
ALTER TABLE `security_content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `security_content_image`
--
ALTER TABLE `security_content_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_visits`
--
ALTER TABLE `site_visits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specifications`
--
ALTER TABLE `specifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specification_content`
--
ALTER TABLE `specification_content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `submissions`
--
ALTER TABLE `submissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vc_image`
--
ALTER TABLE `vc_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `villa_content`
--
ALTER TABLE `villa_content`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `aminities`
--
ALTER TABLE `aminities`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `aminity_content`
--
ALTER TABLE `aminity_content`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `carousel_slides`
--
ALTER TABLE `carousel_slides`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `floor_gallery`
--
ALTER TABLE `floor_gallery`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `gallery_headings`
--
ALTER TABLE `gallery_headings`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `header`
--
ALTER TABLE `header`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `horizon_section_content`
--
ALTER TABLE `horizon_section_content`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `landmark_content`
--
ALTER TABLE `landmark_content`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lifestyle_residences`
--
ALTER TABLE `lifestyle_residences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `life_style_content`
--
ALTER TABLE `life_style_content`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `master_gallery`
--
ALTER TABLE `master_gallery`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `master_plan_content`
--
ALTER TABLE `master_plan_content`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `master_static_images`
--
ALTER TABLE `master_static_images`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nearby_places`
--
ALTER TABLE `nearby_places`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `property_conent`
--
ALTER TABLE `property_conent`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `security_content`
--
ALTER TABLE `security_content`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `security_content_image`
--
ALTER TABLE `security_content_image`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `site_visits`
--
ALTER TABLE `site_visits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `specifications`
--
ALTER TABLE `specifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `specification_content`
--
ALTER TABLE `specification_content`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `submissions`
--
ALTER TABLE `submissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `vc_image`
--
ALTER TABLE `vc_image`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `villa_content`
--
ALTER TABLE `villa_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
