-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2024 at 07:00 PM
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
-- Database: `booking_dp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Id` int(11) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Entry_Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Id`, `UserName`, `Password`, `Entry_Date`) VALUES
(1, 'admin@gmail.com', '0192023a7bbd73250516f069df18b500', '2024-04-10 15:21:29');

-- --------------------------------------------------------

--
-- Table structure for table `book_form`
--

CREATE TABLE `book_form` (
  `id` int(255) NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` int(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `location` varchar(100) NOT NULL,
  `price` int(50) NOT NULL,
  `guests` int(50) NOT NULL,
  `night` int(50) NOT NULL,
  `total` int(100) NOT NULL,
  `arrivals` date NOT NULL,
  `leaving` date NOT NULL,
  `payment` varchar(25) NOT NULL,
  `Data entry` datetime(4) NOT NULL DEFAULT current_timestamp(4)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book_form`
--

INSERT INTO `book_form` (`id`, `name`, `email`, `phone`, `address`, `location`, `price`, `guests`, `night`, `total`, `arrivals`, `leaving`, `payment`, `Data entry`) VALUES
(6, 'dev jasani', 'dhvni234@gmail.com', 2147483647, 'c -402 river view hights', 'goa', 55, 55, 55, 166375, '2024-07-11', '2024-08-07', 'online', '2024-04-13 10:35:10.0043'),
(7, 'raj jasani', 'ihavenoid@gmail.com', 2147483647, 'c -402 river view hights', 'goa', 55, 20, 20, 22000, '2024-07-26', '2024-08-21', 'online', '2024-04-13 10:36:26.7459'),
(8, 'raj shekhvat', 'rajshekhvat@gmail.com', 2147483647, 'mota varcha , anddhara', 'Paris', 2500, 2, 2, 10000, '2024-07-25', '2024-05-13', 'online', '2024-04-13 17:06:31.0611'),
(9, 'ram gajipra', 'gajpra@gmail.com', 1236548555, 'raj street , nana varcha', 'goa', 200, 5, 5, 5000, '2024-04-27', '2024-06-13', 'online', '2024-04-13 17:08:32.0610'),
(10, 'raaju shrivastav', 'raaju342@gmail.com', 1224522222, 'mota varcha , anddhara', 'Ayodhya', 700, 5, 5, 17500, '2024-04-27', '2024-05-22', 'cash', '2024-04-13 17:10:22.0551'),
(11, 'raj jasani', 'dhvni234@gmail.com', 1236548555, 'raj street , nana varcha', 'goa', 5000, 2, 2, 20000, '2024-04-27', '2024-04-30', 'online', '2024-04-13 17:11:36.3268'),
(13, 'dj', 'admin@gmail.com', 2147483647, 'cdbwhhhh', 'Kedarnath', 900, 5, 6, 27000, '2024-04-15', '2024-04-18', 'cash', '2024-04-15 09:30:41.4893'),
(15, 'jay dakhrea', 'adhjs@gmail.com', 2147483647, 'asas a ojnjs d d ', 'goa', 2500, 2, 2, 10000, '2024-04-16', '2024-04-18', 'online', '2024-04-15 14:58:15.2157'),
(19, 'dada saheb', 'dadasaeh@gmail.com', 2147483647, 'mota vrachha', 'Kedarnath', 900, 4, 5, 18000, '2024-06-28', '2024-07-03', 'online', '2024-04-26 12:39:16.1231'),
(20, 'nimesh pandya', 'mahandhosa@gmail.com', 1212211111, 'rvehnnh ', 'Prem Mandir, Vrindavan', 700, 4, 4, 11200, '2024-04-30', '2024-05-09', 'online', '2024-04-26 13:10:36.7630'),
(22, 'malhan thkur bhai bhai', 'mahandhosa@gmail.com', 2147483647, 'rvehnnh', 'Paris', 2500, 567, 1, 0, '2024-05-04', '2024-05-30', 'online', '2024-04-26 16:08:37.1459'),
(23, 'Dev jasani', 'djasfirst@gmail.com', 2147483647, 'mota vrachha', 'Paris', 2500, 4, 4, 40000, '2024-04-29', '2024-05-02', 'online', '2024-04-27 17:02:47.5448'),
(26, 'malhan thkur', 'admin@gmail.com', 2147483647, 'rvehnnh ', 'Rajasthan', 800, 3, 3, 0, '2024-05-02', '2024-05-23', 'Inquire', '2024-04-27 22:16:13.1665');

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `Id` int(11) NOT NULL,
  `Package_Name` varchar(100) NOT NULL,
  `Package_Description` text NOT NULL,
  `Img_Url` text NOT NULL,
  `Youtu_Url` text NOT NULL,
  `Discount_Price` int(20) NOT NULL,
  `Price` int(20) NOT NULL,
  `Rating` varchar(50) NOT NULL,
  `Hotel_Name` varchar(50) NOT NULL,
  `Food` varchar(50) NOT NULL,
  `Entry_By` int(11) DEFAULT NULL,
  `Entry_Date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`Id`, `Package_Name`, `Package_Description`, `Img_Url`, `Youtu_Url`, `Discount_Price`, `Price`, `Rating`, `Hotel_Name`, `Food`, `Entry_By`, `Entry_Date`) VALUES
(1, 'Ayodhya', 'After the construction of the Ram Mandir, the UP government has developed many tourism places that are awesome to enjoy.', '45549693b67a45f4.jpg', 'https://youtu.be/OiJ9CLgdMOQ?si=N3RtY9y6xVjr_Nw0', 700, 1400, '5', 'Hotel Royal Heritage', 'veg', NULL, '2024-04-13 16:17:23'),
(15, 'Kashmir', 'Post-Article 370 removal, India develops tourism; UAE firm opens 7-star mall.It offering an awesome experience in winter.', '47a74515c987565e.jpg', 'https://youtu.be/rFyO1NvOfsg?si=B8grblx7hMqkWQV9', 900, 1800, '5', 'HAAWE Boutique Hotel', 'Veg / Nonveg', NULL, '2024-04-13 16:20:50'),
(16, 'Qatar', 'After the FIFA World Cup and the new stadium, it attracts global tourism, offering an awesome experience to witness.', '960c07cf2e36bed2.jpg', 'https://youtu.be/z6KxBS34mPg?si=juHiNZXw9w9WPELQ', 2000, 4000, '5', 'The Chedi Katara hotel', 'Veg / Nonveg', NULL, '2024-04-13 16:23:08'),
(17, 'Kedarnath', 'Nestled in the Himalayas, Kedarnath is a sacred Hindu pilgrimage site known for its spiritual\r\n                        ambiance and stunning scenery.\r\n', 'ca920cf0a8840d17.jpg', 'https://youtu.be/cxlIUOMUrS4?si=s4Hicfwu_D4bvb3Q', 900, 1800, '4', 'kedar valley resorts', 'veg', NULL, '2024-04-13 16:27:39'),
(18, 'golden temple, amritsar', 'Spiritual serenity and stunning architecture draw tourists seeking cultural richness and Sikh\r\n                        heritage.\r\n', '378892b040c9f4a7.jpg', 'https://youtu.be/m701WKQMeYQ?si=hijELgZog6IEXUF7', 800, 1600, '4', 'Hotel grand mira', 'veg', NULL, '2024-04-13 16:29:43'),
(19, 'Prem Mandir, Vrindavan', 'A magnificent temple dedicated to Radha and Krishna, attracting devotees with its intricate\r\n                        marble craftsmanship.\r\n', '275cd59bda749b27.jpg', 'https://youtu.be/ZCmcxjbMP-w?si=fxVlLfZ7TOW65vDb', 700, 1400, '5', 'Resort Hare Krishna Orchid', 'veg', NULL, '2024-04-13 16:32:04'),
(20, 'Dwarka', 'Pilgrims flock to Dwarka for its sacred temples, particularly the Dwarkadhish Temple dedicated to\r\n                        Lord Krishna.\r\n', '38df527617ab455d.jpg', 'https://youtu.be/ovbRmT5Pc2w?si=PtATWUmUwzoPArzM', 750, 1500, '4', 'Hawthorn Suites', 'veg', NULL, '2024-04-13 16:35:25'),
(21, 'Kullu & Manali', 'Scenic landscapes, adventure sports, and vibrant culture make Kullu & Manali a favorite Himalayan\r\n                        retreat.\r\n', '60b2374a6e540f42.jpg', 'https://youtu.be/nkwLjnragtw?si=fJGkFFQCQmC4pGs2', 1000, 2000, '4', 'FabHotel Pearl', 'Veg / Nonveg', NULL, '2024-04-13 16:39:49'),
(22, 'Rajasthan', 'Rich history, majestic forts, and vibrant festivals allure tourists to Rajasthan\'s royal charm\r\n                        and cultural splendor.', '6246d05c672349eb.jpg', 'https://youtu.be/rdKpptxCCYw?si=vFoAReT-35F6ajkM', 800, 1600, '4', 'Novotel Jodhpur lti Circle', 'veg', NULL, '2024-04-13 16:43:15'),
(23, 'Goa', 'Golden beaches, vibrant nightlife, and Portuguese influence make Goa a paradise for sun-seekers\r\n                        and party enthusiasts.\r\n', 'cddb15451102d2ad.jpg', 'https://youtu.be/SQR52fIOHtw?si=pKKc8tAJSmXS0I87', 2000, 1000, '4', 'Taj Holiday village resort', 'Veg / Nonveg', NULL, '2024-04-13 16:44:45'),
(24, 'Paris', 'The City of Lights beckons with iconic landmarks, art, and romance, making it a global cultural\r\n                        capital.', 'f5803b8f4d0b1546.jpg', 'https://youtu.be/8Sucd2UZHiM?si=Xyb1jI5gdfCMoE5S', 2500, 5000, '5', 'Hotel Villa de paris', 'Veg / Nonveg', NULL, '2024-04-13 16:47:17');

-- --------------------------------------------------------

--
-- Table structure for table `payment_mastar`
--

CREATE TABLE `payment_mastar` (
  `payment_mastar_id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `nameOnCard` varchar(50) NOT NULL,
  `cardNumber` varchar(50) NOT NULL,
  `expMonth` int(11) NOT NULL,
  `expYear` int(11) NOT NULL,
  `cvv` int(5) NOT NULL,
  `payerEmail` varchar(50) NOT NULL,
  `payerAddress` text NOT NULL,
  `payerCity` varchar(50) NOT NULL,
  `payerState` varchar(50) NOT NULL,
  `payerZipCode` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `payment_mastar`
--

INSERT INTO `payment_mastar` (`payment_mastar_id`, `booking_id`, `name`, `nameOnCard`, `cardNumber`, `expMonth`, `expYear`, `cvv`, `payerEmail`, `payerAddress`, `payerCity`, `payerState`, `payerZipCode`) VALUES
(9, 21, 'malhan thkur bhai bhai', 'akshy paji', '0', 10, 2024, 111, 'akshy@op.com', 'wer', 'mumbai', 'mubai', 123456),
(11, 21, 'malhan thkur bhai bhai', 'akshy paji', '0', 4, 2026, 123, 'dcd@gmail.com', 'wer', 'weed', 'mubai', 123456),
(15, 23, 'Dev jasani', 'akshy paji', '1111222233334444', 6, 2026, 123, 'akshy@op.com', 'wer', 'mumbai', 'gujrat', 123456),
(16, 25, 'malhan thkur', 'akshy paji', '7878', 3, 2024, 123, 'akshy@op.com', 'wer', 'weed', 'gujrat', 123564),
(19, 25, 'malhan thkur', 'dipika rabveer', '7878222222222222', 12, 2026, 123, 'akshy@op.com', 'wer', 'mumbai', 'dregvhj', 123564),
(20, 0, '&lt;br /&gt;&lt;b&gt;Warning&lt;/b&gt;:  Undefined', 'akshy paji', '111111111', 2, 2025, 111, 'akshy@op.com', 'wer', 'mumbai', 'mubai', 123564),
(21, 0, '&lt;br /&gt;&lt;b&gt;Warning&lt;/b&gt;:  Undefined', 'akshy paji', '11111111111111', 9, 2026, 123, 'akshy@op.com', 'wer', 'mumbai', 'gujrat', 123);

-- --------------------------------------------------------

--
-- Table structure for table `staff_data`
--

CREATE TABLE `staff_data` (
  `Staff_Id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Post` varchar(50) NOT NULL,
  `Staff_Img` text NOT NULL,
  `Description` text NOT NULL,
  `Instagram` text NOT NULL DEFAULT '#',
  `Facebook` text NOT NULL DEFAULT '#',
  `Whatsapp` text NOT NULL DEFAULT '#',
  `Telegram` text NOT NULL DEFAULT '#',
  `Staff_Type` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=Guide ,1=Admin',
  `Entry_By` int(11) DEFAULT NULL,
  `Entry_Date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `staff_data`
--

INSERT INTO `staff_data` (`Staff_Id`, `Name`, `Post`, `Staff_Img`, `Description`, `Instagram`, `Facebook`, `Whatsapp`, `Telegram`, `Staff_Type`, `Entry_By`, `Entry_Date`) VALUES
(1, 'Dev Jasani', 'Chief Executive Officer', 'dev.jpg', 'Dev, As The Founder And Current CEO Of Company, Is Responsible For Focusing On Business Growth, And Strategizing To Outperform Competitors And Execute That.', 'https://www.instagram.com/_d.jasani_/', 'https://www.facebook.com/dev.jasani.35', 'https://chat.whatsapp.com/GH847bKIbUH2G7MsyW9eMo', 'https://t.me/+S9nb8gvcfXY1MDI9', 1, 1, '2024-04-13 00:09:19'),
(2, 'Urvish Koshiya', 'Managing Director', 'urvish.jpg', 'Urvish Oversees On-Field Operations At Dreamland Travels, Managing Tours And Staff, Ensuring Site Productivity.', 'https://www.instagram.com/urvish.12/?igsh=MWE1aWw4cW9hcnkwdQ%3D%3D', '#', 'https://chat.whatsapp.com/GH847bKIbUH2G7MsyW9eMo', 'https://t.me/+S9nb8gvcfXY1MDI9', 1, 1, '2024-04-13 00:09:19'),
(4, 'Dhvnil Bhigradiya', 'Managing Director', '89590a72c2a14195.jpg', 'Dhvnil handles technical duties, including assisting booked tourists, managing data, and updating the website with trending content.', 'https://www.instagram.com/dhva_nil_/?igsh=MWxrMGpqcjl4M2g0cQ%3D%3D', '#', 'https://chat.whatsapp.com/GH847bKIbUH2G7MsyW9eMo', 'https://t.me/+S9nb8gvcfXY1MDI9', 1, NULL, '2024-04-13 10:28:55'),
(5, 'Alan Ritchson', 'tour assistant', '49f8a0771c4f631b.jpg', 'The tour guide offers package and booking details. After booking, a personal guide aids you from arrival to departure.', '#', '#', '#', '#', 0, NULL, '2024-04-13 16:56:01'),
(6, 'Michelle Rodriguez', 'tour assistant', 'af223f422c4fcad9.jpg', 'The tour guide offers package and booking details. After booking, a personal guide aids you from arrival to departure.', '#', '#', '#', '#', 0, NULL, '2024-04-13 16:57:27'),
(7, 'Charlize Theron', 'tour assistant', 'c9898cc21b96eab6.jpg', 'The tour guide offers package and booking details. After booking, a personal guide aids you from arrival to departure.', '#', '#', '#', '#', 0, NULL, '2024-04-13 16:58:50'),
(8, 'Tyrese Gibson', 'tour assistant', '942c515527c85732.jpg', 'The tour guide offers package and booking details. After booking, a personal guide aids you from arrival to departure.', '#', '#', '#', '#', 0, NULL, '2024-04-13 17:01:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `book_form`
--
ALTER TABLE `book_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `payment_mastar`
--
ALTER TABLE `payment_mastar`
  ADD PRIMARY KEY (`payment_mastar_id`);

--
-- Indexes for table `staff_data`
--
ALTER TABLE `staff_data`
  ADD PRIMARY KEY (`Staff_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `book_form`
--
ALTER TABLE `book_form`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `payment_mastar`
--
ALTER TABLE `payment_mastar`
  MODIFY `payment_mastar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `staff_data`
--
ALTER TABLE `staff_data`
  MODIFY `Staff_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
