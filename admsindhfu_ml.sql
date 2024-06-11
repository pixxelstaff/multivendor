-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 11, 2024 at 02:41 AM
-- Server version: 10.6.17-MariaDB-cll-lve
-- PHP Version: 8.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admsindhfu_ml`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Id`, `name`, `email`, `role`, `password`, `date`) VALUES
(1, 'admin', 'multivendoradmin@gmail.com', 'administrator', '$2y$10$iUiqlGv4pr.Xup3vISjae.4yGEgUeK8bAam3Gziqc.3p7Gn1djKdS', '09-03-2024'),
(2, 'subadmin', 'multivendorsubadmin@gmail.com', 'sub_admin', '$2y$10$i/VS5tAKA./3rk8HJz.JSuXrWyZIEvdHcUPfU0hNPS5OfCmPP9iXO', '09-03-2024'),
(3, 'muhammad anas', 'anas@multivendor.com', 'author', '$2y$10$3hdmc4V/34xNf0ntZXl6HuzQ2l5fdGbH6b7.GnWOT4/C37Uetri3.', '09-03-2024'),
(4, 'muhammad anas', 'anas@multivendor.com', 'author', '$2y$10$JkG11TrALNJmZ.RW9ZDZ1.AYeA62cfzpFrtx.ccUL9zNpS50yun56', '09-03-2024');

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `Id` int(11) NOT NULL,
  `name` mediumtext NOT NULL,
  `city_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`Id`, `name`, `city_id`) VALUES
(1, 'noorani basti', '1'),
(2, 'liaqaut colony', '1'),
(3, 'hala naka', '1'),
(4, 'affandi', '1'),
(5, 'paretabad', '1'),
(6, 'latifabad unit 2', '1'),
(7, 'latifabad unit 3', '1'),
(8, 'latifabad unit 4', '1'),
(9, 'latifabad unit 5', '1'),
(10, 'latifabad unit 6', '1'),
(11, 'latifabad unit 7', '1'),
(12, 'latifabad unit 8', '1'),
(13, 'latifabad unit 9', '1'),
(14, 'latifabad unit 10', '1'),
(15, 'latifabad unit 11', '1'),
(16, 'latifabad unit 12', '1'),
(17, 'saddar', '1');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `Id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `parentId` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  `image` varchar(1000) NOT NULL,
  `user` int(11) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Id`, `name`, `parentId`, `description`, `image`, `user`, `date`) VALUES
(3, 'technology', '0', 'category no 2', '78876-component 138.webp', 1, '17-03-2024'),
(5, 'mobile phones', '0', 'this is mobile catgeory', '69090-cat-06.jpg', 1, '20-04-2024'),
(6, 'headphones', '0', 'this is headphone', '32816-cat-07.jpg', 1, '20-04-2024'),
(7, 'ipads', '0', 'there is smartphones category', '96608-cat-03.jpg', 1, '20-04-2024'),
(8, 'smart watches', '0', 'smart gadets', '42385-cat-05.jpg', 1, '20-04-2024'),
(9, 'innovative lighting', '0', 'lights', '40304-cat-02.jpg', 1, '20-04-2024'),
(10, 'Laptops', '0', 'this category of laptop devices', '3036-cat-08.jpg', 1, '09-05-2024'),
(11, 'Lcds', '0', 'this category of laptop', '52353-cat-01-1.jpg', 1, '20-04-2024'),
(14, 'airpods', '0', 'this is airpod category', '95885-cat-09.jpg', 1, '20-04-2024');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `Id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `country_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`Id`, `name`, `country_id`) VALUES
(1, 'Hyderabad', '1'),
(2, 'Karachi', '1'),
(3, 'Lahore', '1'),
(4, 'Islamabad', '1'),
(5, 'Quetta', '1'),
(6, 'Peshawar', '1'),
(7, 'Fasialabad', '1'),
(8, 'Sukkur', '1'),
(9, 'Nawabshah', '1'),
(10, 'Sialkot', '1'),
(11, 'Mumbai', '2'),
(12, 'Dheli', '2'),
(13, 'Ahmedabad', '2'),
(14, 'Kolkata', '2'),
(15, 'Surat', '2'),
(16, 'Dhaka', '3'),
(17, 'New york', '4');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `Id` int(11) NOT NULL,
  `country` varchar(255) NOT NULL,
  `country_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`Id`, `country`, `country_code`) VALUES
(1, 'Pakistan', '92'),
(2, 'India', '91'),
(3, 'Bangladesh', '880'),
(4, 'america', '1'),
(5, 'canada', '1');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `Id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `companyname` varchar(255) NOT NULL,
  `country` varchar(50) NOT NULL,
  `address_01` mediumtext NOT NULL,
  `address_02` mediumtext NOT NULL,
  `city` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `note` longtext NOT NULL,
  `orderprice` varchar(255) NOT NULL,
  `payment_option` varchar(255) NOT NULL,
  `vendor_ids` varchar(1000) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `purchase_code` varchar(50) NOT NULL,
  `trash` varchar(50) NOT NULL,
  `user_trash` varchar(50) NOT NULL,
  `viewed` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`Id`, `name`, `lastname`, `companyname`, `country`, `address_01`, `address_02`, `city`, `zipcode`, `phone`, `email`, `note`, `orderprice`, `payment_option`, `vendor_ids`, `user_id`, `purchase_code`, `trash`, `user_trash`, `viewed`, `status`, `date`) VALUES
(1, 'muhammad', 'ahemd', 'pixxelhouse', '1', 'gulshane-farid illahi phase 2 hyderabad,sindh,pakistan', '', 'hyderabad', '71000', '03133889331', 'incredibleinfo333@gmail.com', '', '779', 'cash on delivery', '1', '1', 'reg-7790132', '', '', '1', '1', '06-05-2024'),
(2, 'abrar', 'ahmed', 'pixxelhouse', '1', 'house no 35 gulshan-e-habib cliffton karachi', '', 'karachi', '71000', '03133889331', 'incredibleinfo333@gmail.com', '', '9800', 'cash on delivery', '1', '1', 'reg-7652147', '', '', '1', '0', '07-05-2024'),
(3, 'muhammad', 'umar', 'inverex', '1', 'gulshane-farid illahi phase 2 hyderabad,sindh,pakistan', '', 'hyderabad', '71000', '03113176526', 'ma5814294@gmail.cim', '', '240', 'cash on delivery', '1', '1', 'reg-4031589', '', '', '1', '0', '07-05-2024'),
(4, 'imtiaz', 'brohi', 'engro', '1', 'house no 11 near school of knowledge society sanghar', '', 'sanghar', '71000', '03133889331', 'incredibleinfo333@gmail.com', 'hsadhsgah', '1199', 'cash on delivery', '1', '1', 'reg-6905282', '', '', '1', '0', '07-05-2024'),
(5, 'muzammil', 'rajput', 'zyrogtechnology', '1', 'gulshane-farid illahi phase 2 hyderabad,sindh,pakistan', '', 'hyderabad', '71000', '03423826150', 'incredibleinfo333@gmail.com', '', '2100', 'cash on delivery', '1', '1', 'reg-3308595', '', '', '1', '0', '07-05-2024'),
(6, 'uzair', 'bhatti', 'galaxy powers', '1', 'street no 77 gulsah-e-hameed star lite building 14 floor flat no 21,karachi', '', 'karachi', '85000', '03322642084', 'uziqureshi111@gmail.com', 'there is no any special not', '52918', 'cash on delivery', '1', '1', 'reg-3556054', '', '', '1', '0', '08-05-2024'),
(7, 'hina', 'jameel', 'fintech', '1', 'gulshane-farid illahi phase 2 hyderabad,sindh,pakistan', '', 'hyderabad', '71000', '03163872414', 'hinajameel001@gmail.com', '', '85496', 'cash on delivery', '1', '1', 'reg-3359967', '', '', '1', '0', '08-05-2024'),
(8, 'yaqoob', 'qureshi', 'abbott', '1', 'gulshane-farid illahi phase 2 hyderabad,sindh,pakistan', '', 'hyderabad', '71000', '03113176526', 'kol@gmail.com', '', '147', 'cash on delivery', '1', '1', 'reg-8556987', '', '', '1', '0', '08-05-2024'),
(9, 'saqib', 'jatoi', 'experthub', '1', 'fareed plaza liaquat colony flat no 43,hyderbad', '', 'hyderabad', '71000', '03100000001', 'khyt@gmail.com', '', '670', 'cash on delivery', '1,0', '1', 'reg-3076281', '', '', '1', '0', '08-05-2024'),
(10, 'muhammad', 'illays', 'crystal tower', '1', 'gulshane-farid illahi phase 2 hyderabad,sindh,pakistan', '', 'hyderabad', '71000', '03423826150', 'ma5814294@gmail.cim', '', '97415', 'cash on delivery', '1', '1', 'reg-2163700', '', '', '1', '0', '08-05-2024'),
(11, 'mudasir', 'mughal', 'pixxelhouse', '1', 'near al-habib hotel unit no 7 latifabad,hyderabad', '', 'hyderabad', '71000', '03173741154', 'kol@gmail.com', '', '1799', 'cash on delivery', '1', '1', 'reg-2950771', '', '', '1', '0', '08-05-2024'),
(12, 'safullah', 'khan', 'multivendor', '1', 'gulshane-farid illahi phase 2 hyderabad,sindh,pakistan', '', 'hyderabad', '71000', '03100000001', 'ma5814294@gmail.cim', '', '51799', 'cash on delivery', '1', '1', 'reg-6099740', '', '', '1', '0', '08-05-2024'),
(13, 'furqan', 'rajpoot', 'ibex technology', '1', 'gulshane-farid illahi phase 2 hyderabad,sindh,pakistan', 'gulshane-farid illahi phase 2 hyderabad,sindh,pakistan', 'hyderabad', '71000', '03133889331', 'incredibleinfo333@gmail.com', '', '45', 'cash on delivery', '1', '1', 'reg-5159951', '', '', '1', '0', '11-05-2024'),
(14, 'zubair', 'shiekh', 'hsn.com', '1', 'gulshane-farid illahi phase 2 hyderabad,sindh,pakistan', '', 'hyderabad', '71000', '03100000001', 'ma5814294@gmail.cim', '', '1000', 'cash on delivery', '0', '1', 'reg-811539', '', '', '1', '1', '11-05-2024'),
(15, 'khizer', 'sheikh', 'pixxelhouse', '1', 'gulshane-farid illahi phase 2 hyderabad,sindh,pakistan', '', 'hyderabad', '71000', '03100000001', 'ma5814294@gmail.cim', '', '699', 'cash on delivery', '1', '1', 'reg-1598476', '', '', '1', '0', '11-05-2024'),
(16, 'furqan', 'sheikh', 'sunpowers', '1', 'gulshane-farid illahi phase 2 hyderabad,sindh,pakistan', '', 'hyderabad', '71000', '03173741154', 'kol@gmail.com', '', '50000', 'cash on delivery', '1', '1', 'reg-2855316', '', '', '1', '0', '11-05-2024'),
(17, 'muhammad', 'anas', 'reliance', '1', 'gulshane-farid illahi phase 2 hyderabad,sindh,pakistan', '', 'hyderabad', '71000', '03133889331', 'incredibleinfo333@gmail.com', '', '55500', 'cash on delivery', '1', '1', 'reg-8074388', '', '', '1', '0', '11-05-2024'),
(18, 'Abdul', 'basit', 'sunpowers', '1', 'gulshane-farid illahi phase 2 hyderabad,sindh,pakistan', '', 'hyderabad', '71000', '03183205589', 'qureshiuser123@gmail.com', '', '1478', 'cash on delivery', '1', '1', 'reg-3962953', '', '', '1', '0', '14-05-2024'),
(19, 'yaya', 'qureshi', 'wealtyvapes', '1', 'gulshane-farid illahi phase 2 hyderabad,sindh,pakistan', '', 'hyderabad', '71000', '0332264284', 'anasq8644@gmail.com', '', '13698', 'cash on delivery', '1', '1', 'reg-9976106', '', '', '1', '0', '14-05-2024'),
(20, 'muhammad', 'ahemd', 'pixxelhouse', '1', 'gulshane-farid illahi phase 2 hyderabad,sindh,pakistan', '', 'hyderabad', '71000', '03133889331', 'ma0000094@gmail.cim', '', '199', 'cash on delivery', '2', '1', 'reg-3966183', '', '', '1', '0', '14-05-2024'),
(21, 'shawaixz', 'syed', 'engro', '1', 'gulshane-farid illahi phase 2 hyderabad,sindh,pakistan', '', 'hyderabad', '71000', '03423826150', 'shawaizshahsyed@gmail.com', '', '52500', 'cash on delivery', '1,0', '1', 'reg-793191', '', '', '1', '0', '14-05-2024'),
(22, 'furqan', 'ahemd', 'reliance', '1', 'gulshane-farid illahi phase 2 hyderabad,sindh,pakistan', '', 'hyderabad', '71000', '03359193511', 'ma5814294@gmail.cim', '', '6999', 'cash on delivery', '1', '1', 'reg-2713477', '', '', '1', '0', '14-05-2024'),
(23, 'habib', 'sheikh', 'hsn.com', '1', 'gulshane-farid illahi phase 2 hyderabad,sindh,pakistan', '', 'hyderabad', '71000', '03359193511', 'qureshiuser123@gmail.com', '', '500', 'cash on delivery', '1', '1', 'reg-7986676', '', '', '1', '0', '14-05-2024'),
(24, 'muhammad', 'ahmed', 'reliance', '1', 'gulshane-farid illahi phase 2 hyderabad,sindh,pakistan', '', 'hyderabad', '71000', '03133889331', 'anasq8644@gmail.com', '', '1799', 'cash on delivery', '1', '1', 'reg-2933940', '', '', '1', '0', '14-05-2024'),
(25, 'saifullah', 'sheikh', 'engro', '1', 'gulshane-farid illahi phase 2 hyderabad,sindh,pakistan', '', 'hyderabad', '71000', '03133889331', 'saifullah.saify11@gmail.com', '', '2504', 'cash on delivery', '1,2', '1', 'reg-8649000', '', '', '1', '0', '14-05-2024'),
(27, 'habib', 'lashari', 'reliance', '1', 'gulshane-farid illahi phase 2 hyderabad,sindh,pakistan', '', 'hyderabad', '71000', '03173741154', 'qureshiuser123@gmail.com', '', '1000', 'cash on delivery', '0', '1', 'reg-4015679', '', '', '1', '0', '16-05-2024'),
(28, 'kamran', 'akamal', 'reliance', '1', 'gulshane-farid illahi phase 2 hyderabad,sindh,pakistan', '', 'hyderabad', '71000', '03423826150', 'shawaizshahsyed@gmail.com', '', '5500', 'cash on delivery', '1', '1', 'reg-7885024', '', '', '1', '0', '16-05-2024'),
(30, 'mubashir', '', 'sunpowers', '1', 'gulshane-farid illahi phase 2 hyderabad,sindh,pakistan', '', 'hyderabad', '71000', '03423826150', 'sahabsyed820@gmail.com', '', '80', 'bank transfer', '1', '1', 'reg-6228752', '', '', '1', '0', '20-05-2024'),
(31, 'mubashir', 'ahmed', 'socialvision', '1', 'resham gali hyderabad', '', 'hyderabad', '71000', '03137663476', 'mubashiransari206@gmail.com', '', '115', 'cash on delivery', '4,1', '1', 'reg-4103495', '', '', '1', '0', '20-05-2024'),
(32, 'abdul', 'khalid', 'engros', '1', 'street no 454 ,hyderbad', '', 'hyderabad', '71000', '03137663476', 'qureshiuser123@gmail.com', '', '2599', 'cash on delivery', '1', '1', 'reg-7931638', '', '', '1', '0', '20-05-2024'),
(33, 'muhammad', 'fahad', 'sunpowers', '1', 'gulshane-farid illahi phase 2 hyderabad,sindh,pakistan', '', 'hyderabad', '71000', '03359193511', 'ma5814294@gmail.com', '', '5570', 'cash on delivery', '4', '5', 'reg-1956106', '', '', '1', '0', '30-05-2024'),
(34, 'muhammad', 'anas', 'pixxelhouse', '1', 'gulshane-farid illahi phase 2 hyderabad,sindh,pakistan', '', 'hyderabad', '71000', '03133889331', 'ma5814294@gmail.com', '', '7399', 'cash on delivery', '1,0', '5', 'reg-380803', '', '', '0', '0', '01-06-2024'),
(35, 'furqan', 'ahemd', 'pixxelhouse', '1', 'gulshane-farid illahi phase 2 hyderabad,sindh,pakistan', '', 'hyderabad', '71000', '03100000001', 'ma5814294@gmail.com', 'dsgfhdsfg hdgfhdsfgsd fhdgsfhdsf hgfhdgfsh', '30500', 'cash on delivery', '0,1', '5', 'reg-779466', '', '', '0', '0', '02-06-2024'),
(36, 'muhammad', 'ahemd', 'pixxelhouse', '1', 'gulshane-farid illahi phase 2 hyderabad,sindh,pakistan', '', 'hyderabad', '71000', '03173741154', 'qureshiuser123@gmail.com', '', '25000', 'cash on delivery', '0', '5', 'reg-6609320', '', '', '0', '0', '02-06-2024'),
(37, 'muhammad', 'ahemd', 'sunpowers', '2', 'gulshane-farid illahi phase 2 hyderabad,sindh,pakistan', '', 'hyderabad', '71000', '03359193511', 'qureshiuser123@gmail.com', '', '6200', 'cash on delivery', '0,1', '5', 'reg-4314769', '', '', '0', '0', '06-06-2024'),
(38, 'muhammad', 'ahemd', 'pixxelhouse', '1', 'gulshane-farid illahi phase 2 hyderabad,sindh,pakistan', '', 'hyderabad', '71000', '03133889331', 'ma5814294@gmail.cim', '', '2000', 'cash on delivery', '0', '5', 'reg-252626', '', '', '0', '0', '06-06-2024'),
(39, 'muhammad', 'anas', 'pixxelhouse', '1', 'gulshane-farid illahi phase 2 hyderabad,sindh,pakistan', '', 'hyderabad', '71000', '03173741154', 'shawaizshahsyed@gmail.com', 'helllo how are you', '5500', 'cash on delivery', '0', '5', 'reg-2390429', '', '', '0', '0', '06-06-2024'),
(40, 'furqan', 'ahemd', 'sunpowers', '1', 'gulshane-farid illahi phase 2 hyderabad,sindh,pakistan', '', 'hyderabad', '71000', '03173741154', 'ma5814294@gmail.com', 'sagfdgsafd gasfdgasfd gasfdgasfdgas gsfdgsafdgs gsfdgasfd', '2000', 'cash on delivery', '0', '5', 'reg-7324021', '', '', '0', '0', '06-06-2024'),
(41, 'habib', 'ahemd', 'sunrises', '1', 'gulshane-farid illahi phase 2 hyderabad,sindh,pakistan', '', 'hyderabad', '71000', '03133889331', 'ma5814294@gmail.cim', 'sgafdgasfdga', '5500', 'cash on delivery', '0', '5', 'reg-3723904', '', '', '0', '0', '06-06-2024'),
(42, 'muhammad', 'ahemd', 'sunpowers', '1', 'gulshane-farid illahi phase 2 hyderabad,sindh,pakistan', '', 'hyderabad', '71000', '03173741154', 'ma5814294@gmail.com', 'aGFGAFS AGFSAgf', '5500', 'cash on delivery', '0', '5', 'reg-164915', '', '', '0', '0', '06-06-2024'),
(43, 'muhammad', 'ahemd', 'pixxelhouse', '1', 'gulshane-farid illahi phase 2 hyderabad,sindh,pakistan', '', 'hyderabad', '71000', '03423826150', 'qureshiuser123@gmail.com', 'ERWEWER', '49500', 'cash on delivery', '0', '1', 'reg-378888', '', '', '0', '0', '07-06-2024'),
(44, 'muhammad', 'anas', 'pixxelhouse', '1', 'gulshane-farid illahi phase 2 hyderabad,sindh,pakistan', '', 'hyderabad', '71000', '03133889331', 'incredibleinfo333@gmail.com', 'SDFDSFDFDSFSDF', '49500', 'cash on delivery', '0', '1', 'reg-8060855', '', '', '0', '0', '07-06-2024'),
(45, 'muhammad', 'anas', 'pixxelhouse', '1', 'gulshane-farid illahi phase 2 hyderabad,sindh,pakistan', '', 'hyderabad', '71000', '03173741154', 'qureshiuser123@gmail.com', 'DSFDSFDSFD', '49500', 'cash on delivery', '0', '1', 'reg-6972693', '', '', '0', '0', '07-06-2024'),
(46, 'muhammad', 'lashari', 'pixxelhouse', '1', 'gulshane-farid illahi phase 2 hyderabad,sindh,pakistan', '', 'hyderabad', '71000', '03133889331', 'ma5814294@gmail.com', '', '49500', 'cash on delivery', '0', '1', 'reg-9647244', '', '', '0', '0', '07-06-2024'),
(47, 'muhammad', 'anas', 'pixxelhouse', '1', 'gulshane-farid illahi phase 2 hyderabad,sindh,pakistan', '', 'hyderabad', '71000', '03423826150', 'qureshiuser123@gmail.com', '', '49500', 'cash on delivery', '0', '1', 'reg-2966924', '', '', '0', '0', '07-06-2024'),
(48, 'muhammad', 'anas', 'pixxelhouse', '1', 'gulshane-farid illahi phase 2 hyderabad,sindh,pakistan', '', 'hyderabad', '71000', '03423826150', 'qureshiuser123@gmail.com', '', '49500', 'cash on delivery', '0', '1', 'reg-4123667', '', '', '0', '0', '07-06-2024'),
(50, 'muhammad', 'anas', 'pixxelhouse', '1', 'gulshane-farid illahi phase 2 hyderabad,sindh,pakistan', '', 'hyderabad', '71000', '03359193511', 'qureshiuser123@gmail.com', '', '8000', 'cash on delivery', '16', '0', 'reg-1962929', '', '', '0', '0', '08-06-2024'),
(51, 'habib', 'ahemd', 'pixxelhouse', '1', 'gulshane-farid illahi phase 2 hyderabad,sindh,pakistan', '', 'hyderabad', '71000', '03173741154', 'qureshiuser123@gmail.com', 'dgfdgfdfdgfdg', '8000', 'cash on delivery', '16', '0', 'reg-8393225', '', '', '0', '0', '08-06-2024'),
(52, 'kaiser khan', 'ghouri', 'pixxelhouse', '1', 'gulshane-farid illahi phase 2 hyderabad,sindh,pakistan', '', 'hyderabad', '71000', '03133889331', 'qaiserkha964@gmail.com', '', '8000', 'cash on delivery', '16', '0', 'reg-34412', '', '', '0', '0', '08-06-2024'),
(53, 'zubair', 'shaikh', 'pixxelhouse', '1', 'main auto bhan road Near Akbar CNG station', '', 'hyderabad', '33112', '35910991212', 'pixxel.staff@gmail.com', '', '11000', 'cash on delivery', '1,0', '0', 'reg-5987423', '', '', '0', '0', '08-06-2024'),
(54, 'MUHAMMAD', 'USMAN', 'Pixxel house', '1', '775/B Ayoub Colony Unit 11 latifabad Hyderabad', '775/B Ayoub Colony Unit 11 latifabad Hyderabad', 'Hyderabad', '71800', '03133907971', 'mu47724@gmail.com', '', '5500', 'cash on delivery', '0', '0', 'reg-6267180', '', '', '0', '0', '08-06-2024'),
(55, 'pixxel', 'staff', 'pixxelhouse', '1', 'main auto bhan road Near Akbar CNG station', '', 'hyderabad', '718000', '03313591099', 'pixxel.staff@gmail.com', '', '11000', 'cash on delivery', '0', '0', 'reg-4007736', '', '', '0', '0', '08-06-2024');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `Id` int(11) NOT NULL,
  `item_name` mediumtext NOT NULL,
  `item_id` varchar(50) NOT NULL,
  `item_vendor_id` varchar(50) NOT NULL,
  `item_quantity` varchar(255) NOT NULL,
  `item_price` varchar(255) NOT NULL,
  `item_options` varchar(1000) NOT NULL,
  `item_type` varchar(255) NOT NULL,
  `image` varchar(1000) NOT NULL,
  `order_code` varchar(255) NOT NULL,
  `order_id` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `admin_trash` varchar(50) NOT NULL,
  `vendor_trash` varchar(50) NOT NULL,
  `admin_view` varchar(50) NOT NULL,
  `vendor_view` varchar(50) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`Id`, `item_name`, `item_id`, `item_vendor_id`, `item_quantity`, `item_price`, `item_options`, `item_type`, `image`, `order_code`, `order_id`, `status`, `admin_trash`, `vendor_trash`, `admin_view`, `vendor_view`, `date`) VALUES
(1, 'ULTRAPORTABLE 4K QUADCOPTER (WHITE) HomeShop...Ultraportable 4K Quadcopter (White)', '14', '1', '1', '699', '', 'product', '58604-product-copyright-3.jpg', 'hmu-1-7488253', '1', '1', '', '', '1', '1', '06-05-2024'),
(2, 'DEWALT DWMT73803 Mechanics Tools Kit and Socket Set, 168-Piece', '12', '1', '1', '80', '', 'product', '58385-71EXsP2lG0L._AC_SX679_.jpg', 'xaw-1-5120187', '1', '0', '', '', '1', '1', '06-05-2024'),
(3, 'Roofing repair system', '7', '1', '2', '9800', '', 'service', '96089-63a2d2376ffab73770cd43c3_B_0016_Roofing-Services-copy-1.webp', 'jmt-2-3642729', '2', '0', '', '', '1', '1', '07-05-2024'),
(4, 'DEWALT DWMT73803 Mechanics Tools Kit and Socket Set, 168-Piece', '12', '1', '3', '240', '', 'product', '58385-71EXsP2lG0L._AC_SX679_.jpg', 'rxy-3-5235533', '3', '0', '', '', '1', '1', '07-05-2024'),
(5, 'ULTRAPORTABLE 4K QUADCOPTER (WHITE) HomeShop...Ultraportable 4K Quadcopter (White)', '14', '1', '1', '699', '', 'product', '58604-product-copyright-3.jpg', 'exi-4-4252275', '4', '0', '', '', '1', '1', '07-05-2024'),
(6, 'Dry cleaning service', '11', '1', '1', '500', '', 'service', '72019-1_ni4HMR46HBhZu7QgNe6yaA.jpg', 'jca-4-7026530', '4', '0', '', '', '1', '1', '07-05-2024'),
(7, 'brand new t900 ultra watch', '13', '1', '1', '2100', 'body-color : black,strap-color : white', 'product', '36708-t900-ultra-smart-watch-pakistan-telectronics.pk_.jpg', 'mpz-5-5320022', '5', '0', '', '', '1', '1', '07-05-2024'),
(8, 'ULTRAPORTABLE 4K QUADCOPTER (WHITE) HomeShop...Ultraportable 4K Quadcopter (White)', '14', '1', '1', '699', '', 'product', '58604-product-copyright-3.jpg', 'cgr-6-3233938', '6', '0', '', '', '1', '1', '08-05-2024'),
(9, 'Laborum Et Dolorum Fuga Exetra Harum', '11', '1', '2', '420', 'color : black,size : small', 'product', '47795-ad64b4bf-ee8e-46b6-8561-fb4c052b09ba.jpg', 'uwx-6-3673571', '6', '1', '', '', '1', '1', '08-05-2024'),
(10, 'child tution services', '10', '1', '1', '1799', '', 'service', '64424-shutterstock_409205623_blog.jpg__1760x1080_q90_crop_progressive_subsampling-2_upscale.jpg', 'qkg-6-9728126', '6', '0', '', '', '1', '1', '08-05-2024'),
(11, 'Turnkey Residential Solar Solutions In Pakistan', '12', '1', '1', '50000', '', 'service', '65100-images.jpg', 'lqr-6-226988', '6', '0', '', '', '1', '1', '08-05-2024'),
(12, 'ULTRAPORTABLE 4K QUADCOPTER (WHITE) HomeShop...Ultraportable 4K Quadcopter (White)', '14', '1', '1', '699', '', 'product', '58604-product-copyright-3.jpg', 'doz-7-6767265', '7', '0', '', '', '1', '1', '08-05-2024'),
(13, 'Razer BlackShark V2 X Gaming Headset: 7.1 Surround Sound - 50mm Drivers - Memory Foam Cushions - for PC, PS4, PS5, Switch - 3.5mm Audio Jack - Quartz Pink', '8', '1', '1', '98', 'color : black,size : usb', 'product', '25054-51FRJHB7XOL._AC_SX679_.jpg', 'pla-7-7206893', '7', '0', '', '', '1', '1', '08-05-2024'),
(14, 'child tution services', '10', '1', '1', '1799', '', 'service', '64424-shutterstock_409205623_blog.jpg__1760x1080_q90_crop_progressive_subsampling-2_upscale.jpg', 'wxn-7-3468933', '7', '0', '', '', '1', '1', '08-05-2024'),
(15, 'Roofing repair system', '7', '1', '1', '4900', '', 'service', '96089-63a2d2376ffab73770cd43c3_B_0016_Roofing-Services-copy-1.webp', 'rtk-7-4971071', '7', '0', '', '', '1', '1', '08-05-2024'),
(16, 'beautiful wedding decorations services?', '6', '1', '1', '78000', '', 'service', '80471-Indoor-Nikah-event-stage-decoration-setup-ideas-in-Pakistan-5.jpg', 'pgy-7-2688867', '7', '0', '', '', '1', '1', '08-05-2024'),
(17, 'Razer BlackShark V2 X Gaming Headset: 7.1 Surround Sound - 50mm Drivers - Memory Foam Cushions - for PC, PS4, PS5, Switch - 3.5mm Audio Jack - Quartz Pink', '8', '1', '3', '147', 'color : black,size : usb', 'product', '25054-51FRJHB7XOL._AC_SX679_.jpg', 'kft-8-6709999', '8', '0', '', '', '1', '1', '08-05-2024'),
(18, 'Dry cleaning service', '11', '1', '1', '500', '', 'service', '72019-1_ni4HMR46HBhZu7QgNe6yaA.jpg', 'rje-9-5008230', '9', '0', '', '', '1', '1', '08-05-2024'),
(19, 'test 2', '5', '0', '1', '80', '', 'service', '29628-design-gorgeous-stunning-wordpress-landing-page-squeeze-page-sale-page.webp', 'ylo-9-9607142', '9', '0', '', '', '1', '1', '13-05-2024'),
(20, 'the care of your body', '2', '1', '1', '90', '', 'service', '32675-14-3.jpg', 'ily-9-6828318', '9', '0', '', '', '1', '1', '13-05-2024'),
(21, 'beautiful wedding decorations services?', '6', '1', '6', '18', '', 'service', '80471-Indoor-Nikah-event-stage-decoration-setup-ideas-in-Pakistan-5.jpg', 'yzu-10-3619494', '10', '0', '', '', '1', '1', '08-05-2024'),
(22, 'checking service 01', '13', '1', '1', '199', '', 'service', '39654-5456834b-ba95-41a9-85b2-4abd4d313c11.png', 'vgw-10-7572036', '10', '0', '', '', '1', '1', '08-05-2024'),
(23, 'Roofing repair system', '7', '1', '1', '4900', '', 'service', '96089-63a2d2376ffab73770cd43c3_B_0016_Roofing-Services-copy-1.webp', 'nys-10-9984278', '10', '0', '', '', '1', '1', '08-05-2024'),
(24, 'Mahir Deep Cleaning Services', '8', '1', '1', '2300', '', 'service', '15198-How_To_Start_A_Cleaning_Business_-_article_image.jpg', 'lmu-10-7387095', '10', '0', '', '', '1', '1', '08-05-2024'),
(25, 'SALON SERVICES', '9', '1', '2', '13998', '', 'service', '11390-Pose_Price_List_oct_22-5.webp', 'kpt-10-1871975', '10', '0', '', '', '1', '1', '08-05-2024'),
(26, '3352 Black Manager Chair', '4', '1', '2', '76000', 'color : red', 'product', '57431-IMG_5575.webp', 'cih-10-9786931', '10', '0', '', '', '1', '1', '08-05-2024'),
(27, 'child tution services', '10', '1', '1', '1799', '', 'service', '64424-shutterstock_409205623_blog.jpg__1760x1080_q90_crop_progressive_subsampling-2_upscale.jpg', 'azh-11-8086148', '11', '0', '', '', '1', '1', '08-05-2024'),
(28, 'Turnkey Residential Solar Solutions In Pakistan', '12', '1', '1', '50000', '', 'service', '65100-images.jpg', 'vmb-12-807660', '12', '0', '', '', '1', '1', '08-05-2024'),
(29, 'child tution services', '10', '1', '1', '1799', '', 'service', '64424-shutterstock_409205623_blog.jpg__1760x1080_q90_crop_progressive_subsampling-2_upscale.jpg', 'fgr-12-6484355', '12', '0', '', '', '1', '1', '08-05-2024'),
(30, 'Professional and Luxury watches for everyone', '3', '2', '1', '45', '', 'product', '27186-longines-la-grande-classique-de-longines-l4-523-0-90-2-2000x2000-1667544770-removebg-preview_600x600.webp', 'yit-13-2725399', '13', '0', '', '', '1', '1', '11-05-2024'),
(31, 'refrigerator service starts here', '15', '0', '1', '1000', '', 'service', '72419-featured-image-fridge.webp', 'zam-14-184074', '14', '2', '', '', '1', '1', '16-05-2024'),
(32, 'ULTRAPORTABLE 4K QUADCOPTER (WHITE) HomeShop...Ultraportable 4K Quadcopter (White)', '14', '1', '1', '699', '', 'product', '58604-product-copyright-3.jpg', 'wfj-15-9352225', '15', '0', '', '', '1', '1', '11-05-2024'),
(33, 'Turnkey Residential Solar Solutions In Pakistan', '12', '1', '1', '50000', '', 'service', '65100-images.jpg', 'ozg-16-2723753', '16', '0', '', '', '1', '1', '11-05-2024'),
(34, 'check 02', '14', '1', '1', '5500', '', 'service', '54337-create-and-manage-multiple-order-success-pages.jpg', 'ght-17-2635944', '17', '0', '', '', '1', '1', '11-05-2024'),
(35, 'Turnkey Residential Solar Solutions In Pakistan', '12', '1', '1', '50000', '', 'service', '65100-images.jpg', 'ctm-17-7329001', '17', '1', '', '', '1', '1', '13-05-2024'),
(36, 'ULTRAPORTABLE 4K QUADCOPTER (WHITE) HomeShop...Ultraportable 4K Quadcopter (White)', '14', '1', '2', '1398', '', 'product', '58604-product-copyright-3.jpg', 'aez-18-168103', '18', '0', '', '', '1', '1', '14-05-2024'),
(37, 'DEWALT DWMT73803 Mechanics Tools Kit and Socket Set, 168-Piece', '12', '1', '1', '80', '', 'product', '58385-71EXsP2lG0L._AC_SX679_.jpg', 'hdo-18-749901', '18', '0', '', '', '1', '1', '14-05-2024'),
(38, 'ULTRAPORTABLE 4K QUADCOPTER (WHITE) HomeShop...Ultraportable 4K Quadcopter (White)', '14', '1', '1', '699', '', 'product', '58604-product-copyright-3.jpg', 'vqm-19-4675018', '19', '0', '', '', '1', '1', '14-05-2024'),
(39, 'brand new t900 ultra watch', '13', '1', '3', '6300', 'body-color : silver,strap-color : orange', 'product', '36708-t900-ultra-smart-watch-pakistan-telectronics.pk_.jpg', 'pir-19-9778664', '19', '0', '', '', '1', '1', '14-05-2024'),
(40, 'child tution services', '10', '1', '1', '1799', '', 'service', '64424-shutterstock_409205623_blog.jpg__1760x1080_q90_crop_progressive_subsampling-2_upscale.jpg', 'usc-19-2865030', '19', '1', '', '', '1', '1', '14-05-2024'),
(41, 'Roofing repair system', '7', '1', '1', '4900', '', 'service', '96089-63a2d2376ffab73770cd43c3_B_0016_Roofing-Services-copy-1.webp', 'nck-19-720713', '19', '0', '', '', '1', '1', '14-05-2024'),
(42, 'new lenovo laptop', '9', '2', '1', '199', 'storage : 4gb ram', 'product', '29195-612Fl0aUARL._AC_SX679_.jpg', 'moe-20-1690837', '20', '0', '', '', '1', '1', '14-05-2024'),
(43, 'Turnkey Residential Solar Solutions In Pakistan', '12', '1', '1', '50000', '', 'service', '65100-images.jpg', 'haf-21-8854348', '21', '2', '', '', '1', '1', '14-05-2024'),
(44, 'Mahir Deep Cleaning Services', '8', '1', '1', '2300', '', 'service', '15198-How_To_Start_A_Cleaning_Business_-_article_image.jpg', 'bos-21-5145479', '21', '2', '', '', '1', '1', '14-05-2024'),
(45, 'the tour and travel service', '3', '1', '1', '120', '', 'service', '99325-College-Visit.jpg', 'hbl-21-3721596', '21', '0', '', '', '1', '1', '14-05-2024'),
(46, 'dfgdfdg', '4', '0', '1', '80', '', 'service', '84399-20210228_170944.jpg', 'tfx-21-1865100', '21', '0', '', '', '1', '1', '01-06-2024'),
(47, 'SALON SERVICES', '9', '1', '1', '6999', '', 'service', '11390-Pose_Price_List_oct_22-5.webp', 'duh-22-2476458', '22', '0', '', '', '1', '1', '14-05-2024'),
(48, 'Dry cleaning service', '11', '1', '1', '500', '', 'service', '72019-1_ni4HMR46HBhZu7QgNe6yaA.jpg', 'odg-23-5737713', '23', '2', '', '', '1', '1', '14-05-2024'),
(49, 'child tution services', '10', '1', '1', '1799', '', 'service', '64424-shutterstock_409205623_blog.jpg__1760x1080_q90_crop_progressive_subsampling-2_upscale.jpg', 'dgj-24-8343318', '24', '0', '', '', '1', '1', '14-05-2024'),
(50, 'DEWALT DWMT73803 Mechanics Tools Kit and Socket Set, 168-Piece', '12', '1', '2', '160', '', 'product', '58385-71EXsP2lG0L._AC_SX679_.jpg', 'rnz-25-949894', '25', '0', '', '', '1', '1', '14-05-2024'),
(51, 'Professional and Luxury watches for everyone', '3', '2', '1', '45', '', 'product', '27186-longines-la-grande-classique-de-longines-l4-523-0-90-2-2000x2000-1667544770-removebg-preview_600x600.webp', 'yxe-25-5791978', '25', '0', '', '', '1', '1', '14-05-2024'),
(52, 'child tution services', '10', '1', '1', '1799', '', 'service', '64424-shutterstock_409205623_blog.jpg__1760x1080_q90_crop_progressive_subsampling-2_upscale.jpg', 'rox-25-903150', '25', '2', '', '', '1', '1', '14-05-2024'),
(53, 'Dry cleaning service', '11', '1', '1', '500', '', 'service', '72019-1_ni4HMR46HBhZu7QgNe6yaA.jpg', 'dtp-25-9542331', '25', '2', '', '', '1', '1', '16-05-2024'),
(55, 'refrigerator service starts here', '15', '0', '1', '1000', '', 'service', '72419-featured-image-fridge.webp', 'uze-27-5906104', '27', '1', '', '', '1', '1', '16-05-2024'),
(56, 'check 02', '14', '1', '1', '5500', '', 'service', '54337-create-and-manage-multiple-order-success-pages.jpg', 'luc-28-9881957', '28', '1', '', '', '1', '1', '16-05-2024'),
(58, 'DEWALT DWMT73803 Mechanics Tools Kit and Socket Set, 168-Piece', '12', '1', '1', '80', '', 'product', '58385-71EXsP2lG0L._AC_SX679_.jpg', 'qum-30-5948132', '30', '0', '', '', '1', '1', '20-05-2024'),
(59, 'Honeydrill King Size 9\\&quot; Air Mattress with Headboard, Inflatable Sofa Bed Air Couch for Camping (Pump Not', '15', '4', '1', '70', '', 'product', '3489-Honeydrill-King-Size-9-Air-Mattress-with-Headboard-Inflatable-Sofa-Bed-Air-Couch-for-Camping-Pump-Not-Included_9ffafdac-5fe9-48fd-af20-0e9999e0cd74.74c7bee8147674c3a1e8f61c186cc40d.jpg', 'zjo-31-3811832', '31', '1', '', '', '1', '1', '20-05-2024'),
(60, 'fallana service is updated by vendor', '19', '1', '1', '45', '', 'service', '43701-Swagger-Wear-logo-.png', 'kqy-31-2934986', '31', '0', '', '', '1', '1', '20-05-2024'),
(61, 'child tution services', '10', '1', '1', '1799', '', 'service', '64424-shutterstock_409205623_blog.jpg__1760x1080_q90_crop_progressive_subsampling-2_upscale.jpg', 'jlw-32-3049280', '32', '0', '', '', '1', '1', '20-05-2024'),
(62, 'Dry cleaning service', '11', '1', '1', '500', '', 'service', '72019-1_ni4HMR46HBhZu7QgNe6yaA.jpg', 'naf-32-1109885', '32', '0', '', '', '1', '1', '20-05-2024'),
(63, 'fuyu', '18', '1', '1', '300', '', 'service', '83940-9112533075.png', 'rqj-32-7324172', '32', '0', '', '', '1', '1', '20-05-2024'),
(64, 'Honeydrill King Size 9\\&quot; Air Mattress with Headboard, Inflatable Sofa Bed Air Couch for Camping (Pump Not', '15', '4', '1', '70', '', 'product', '3489-Honeydrill-King-Size-9-Air-Mattress-with-Headboard-Inflatable-Sofa-Bed-Air-Couch-for-Camping-Pump-Not-Included_9ffafdac-5fe9-48fd-af20-0e9999e0cd74.74c7bee8147674c3a1e8f61c186cc40d.jpg', 'uot-33-2475671', '33', '1', '', '', '1', '1', '30-05-2024'),
(65, 'Inverter repairing services', '28', '4', '1', '5500', '', 'service', '4167-images.jpg', 'zdb-33-5102111', '33', '1', '', '', '1', '1', '30-05-2024'),
(66, 'ULTRAPORTABLE 4K QUADCOPTER (WHITE) HomeShop...Ultraportable 4K Quadcopter (White)', '14', '1', '1', '699', '', 'product', '58604-product-copyright-3.jpg', 'qil-34-7579791', '34', '0', '', '', '0', '0', '01-06-2024'),
(67, 'Car interior cleaning', '27', '0', '1', '5500', '', 'service', '22114-service_img_2.webp', 'cvu-34-6940105', '34', '0', '', '', '0', '0', '01-06-2024'),
(68, 'Sanitary Plumbing', '24', '0', '1', '1200', '', 'service', '60196-s1.jpg', 'nvf-34-2969294', '34', '2', '', '', '0', '0', '02-06-2024'),
(69, '2024 Apple 11-inch iPad Air M2 Wi-Fi 512GB - Starlight', '19', '0', '1', '25000', '', 'product', '77897-2024-Apple-11-inch-iPad-Air-M2-Wi-Fi-512GB-Starlight_5bd718fd-c550-4815-b61f-5f94892e2117.165d08b3475699b7e484fdffa1480cbb.webp', 'zjk-35-6053306', '35', '0', '', '', '0', '0', '02-06-2024'),
(70, 'Ninja TWISTi, HIGH-SPEED Blender DUO 3 Preset Auto-iQ Programs, 34 oz. Pitcher Capacity, SS150', '20', '1', '1', '5500', '', 'product', '25541-Ninja-TWISTi-HIGH-SPEED-Blender-DUO-3-Preset-Auto-iQ-Programs-34-oz-Pitcher-Capacity-SS150_998555c3-207a-4333-a645-04481a4fef4b.29ba39c0e3b175711caae8d69a939862.webp', 'mdz-35-3014872', '35', '0', '', '', '0', '0', '02-06-2024'),
(71, '2024 Apple 11-inch iPad Air M2 Wi-Fi 512GB - Starlight', '19', '0', '1', '25000', '', 'product', '77897-2024-Apple-11-inch-iPad-Air-M2-Wi-Fi-512GB-Starlight_5bd718fd-c550-4815-b61f-5f94892e2117.165d08b3475699b7e484fdffa1480cbb.webp', 'dym-36-8396786', '36', '0', '', '', '0', '0', '02-06-2024'),
(72, 'doctors services', '32', '0', '1', '2000', '', 'service', '36086-Female_Doctor_Daughter_Mother_1296x728-header-1296x729.webp', 'qhi-37-8360056', '37', '0', '', '', '0', '0', '06-06-2024'),
(73, 'brand new t900 ultra watch', '13', '1', '2', '4200', 'body-color : silver,strap-color : orange', 'product', '36708-t900-ultra-smart-watch-pakistan-telectronics.pk_.jpg', 'zun-37-8255499', '37', '0', '', '', '0', '0', '06-06-2024'),
(74, 'doctors services', '32', '0', '1', '2000', 'saturday-12:41 pm-12:42 pm', 'service', '36086-Female_Doctor_Daughter_Mother_1296x728-header-1296x729.webp', 'ucz-38-8288836', '38', '0', '', '', '0', '0', '06-06-2024'),
(75, 'Car interior cleaning', '27', '0', '1', '5500', 'saturday-20:45 pm-21:45 pm', 'service', '22114-service_img_2.webp', 'xjf-39-498432', '39', '0', '', '', '0', '0', '06-06-2024'),
(76, 'doctors services', '32', '0', '1', '2000', 'saturday-12:41 pm-12:42 pm', 'service', '36086-Female_Doctor_Daughter_Mother_1296x728-header-1296x729.webp', 'rky-40-3921650', '40', '0', '', '', '0', '0', '06-06-2024'),
(77, 'Car interior cleaning', '27', '0', '1', '5500', 'saturday-20:45 pm-21:45 pm', 'service', '22114-service_img_2.webp', 'lcq-41-8520675', '41', '0', '', '', '0', '0', '06-06-2024'),
(78, 'Car interior cleaning', '27', '0', '1', '5500', 'saturday-20:45 pm-21:45 pm', 'service', '22114-service_img_2.webp', 'vru-42-8919569', '42', '0', '', '', '0', '0', '06-06-2024'),
(79, 'CT-SCAN', '40', '16', '1', '8000', 'saturday-20:28 pm-21:28 pm', 'service', '3651-head.jpg', 'hqj-50-6849225', '50', '0', '', '', '0', '0', '08-06-2024'),
(80, 'CT-SCAN', '40', '16', '1', '8000', 'saturday-20:28 pm-21:28 pm', 'service', '3651-head.jpg', 'dmo-51-4231060', '51', '0', '', '', '0', '0', '08-06-2024'),
(81, 'CT-SCAN', '40', '16', '1', '8000', 'saturday-20:28 pm-21:28 pm', 'service', '3651-head.jpg', 'cky-52-7854062', '52', '0', '', '', '0', '0', '08-06-2024'),
(82, 'css exams training', '25', '1', '1', '5500', '', 'service', '50666-7831256552328467-WEBSITE-Schedule_(1).jpg', 'etz-53-1298226', '53', '0', '', '', '0', '0', '08-06-2024'),
(83, 'shadgsahgdsa', '39', '0', '1', '5500', 'saturday-21:39 pm-20:38 pm', 'service', '32082-MainAfter.webp', 'syu-53-508603', '53', '0', '', '', '0', '0', '08-06-2024'),
(84, 'Car interior cleaning', '27', '0', '1', '5500', 'saturday-20:45 pm-21:45 pm', 'service', '22114-service_img_2.webp', 'kcz-54-5765150', '54', '0', '', '', '0', '0', '08-06-2024'),
(85, 'Car interior cleaning', '27', '0', '2', '11000', 'saturday-20:45 pm-21:45 pm', 'service', '22114-service_img_2.webp', 'mnv-55-7476870', '55', '0', '', '', '0', '0', '08-06-2024');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `price` varchar(255) NOT NULL,
  `sale_price` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `sku` varchar(255) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `product_type` varchar(255) NOT NULL,
  `featured_image` varchar(1000) NOT NULL,
  `gallery_image` varchar(1000) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `dimensions` varchar(1000) NOT NULL,
  `excerpt` longtext NOT NULL,
  `stock` varchar(50) NOT NULL,
  `featured` varchar(50) NOT NULL,
  `viewed` varchar(50) NOT NULL,
  `trash` varchar(50) NOT NULL,
  `vendor_trash` varchar(50) NOT NULL,
  `date` varchar(255) NOT NULL,
  `approve` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `price`, `sale_price`, `quantity`, `category`, `sku`, `vendor_id`, `product_type`, `featured_image`, `gallery_image`, `tags`, `dimensions`, `excerpt`, `stock`, `featured`, `viewed`, `trash`, `vendor_trash`, `date`, `approve`) VALUES
(1, 'title here 01', '&lt;p&gt;this is simple description&lt;br&gt;&amp;nbsp;&lt;/p&gt;&lt;figure class=\\&quot;image image-style-side\\&quot;&gt;&lt;img style=\\&quot;aspect-ratio:750/750;\\&quot; src=\\&quot;../images/uploadimg/197049-d03fc2806ce8d304677911ce264434f3.jpg_750x750.jpg_.webp\\&quot; width=\\&quot;750\\&quot; height=\\&quot;750\\&quot;&gt;&lt;/figure&gt;', '120', '80', '100', '9', 'dec-001', 2, 'simple', '91243-Acrylic-Wall-Light.jpg', '', 'light', '45,66,220', 'Elegant Appearance: Simple line design, bright and elegant, match most styles of interior furnishings, providing vibrant and clean lighting for your living environment.', '1', '0', '', '', '', '23-04-2024', '1'),
(2, 'rolex fake watches', '&lt;p&gt;Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat. At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.&lt;/p&gt;', '120', '80', '50', '8', 'wat-111', 2, 'simple', '62961-product-1_897e383f-c64b-4637-90ac-45688b831ccf_700x700.webp', '34030-product-8_dc1f1f5b-b27f-4850-843f-e8b142e49d3f_700x700.webp,35274-product-9_c904bb21-0c55-42e4-913f-f0072e7af615_700x700.webp,77921-product-15_7133eef2-f418-4e28-9212-c7cc18c6c54d_700x700.webp,', 'watches,g-shock,rolex', '45,45,45', 'consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '1', '0', '', '', '', '27-03-2024', '1'),
(3, 'Professional and Luxury watches for everyone', '&lt;ul&gt;&lt;li&gt;Chandelier, Creative Hollow Iron Pendant Light, Metal Lamp Shade, Ceiling Hanging Lamp, Cafe Bar Decoration Lighting Fixture&lt;/li&gt;&lt;li&gt;Elegant Appearance: Simple line design, bright and elegant, match most styles of interior furnishings, providing vibrant and clean lighting for your living environment.&lt;/li&gt;&lt;li&gt;High Quality: Our chandeliers are made of iron, which has strong heat resistance and will not fade. High quality material, durable and scratch resistant.&lt;/li&gt;&lt;li&gt;low power consumption and long life, the bright uniform colour, non-glare, no radiation.&lt;/li&gt;&lt;li&gt;Turned off it looks very decorative, turned on it gives off cozy light for a cozy atmosphere.&lt;/li&gt;&lt;li&gt;This simple and stylish design makes it perfect for home and business decoration. It is a good choice for living room, dining room, bedroom&lt;/li&gt;&lt;/ul&gt;', '120', '45', '60', '8', 'rol-1x2', 2, 'simple', '27186-longines-la-grande-classique-de-longines-l4-523-0-90-2-2000x2000-1667544770-removebg-preview_600x600.webp', '39882-la-grande-classique-de-longines-l4-523-0-90-2-detailed-view-2000x2000-101-1667544770-removebg-preview_600x600.webp', 'watches here,luxury watch,premium wtch', '15,10,12', 'High Quality: Our chandeliers are made of iron, which has strong heat resistance and will not fade. High quality', '1', '0', '', '', '', '23-04-2024', '1'),
(4, '3352 Black Manager Chair', '&lt;p&gt;&lt;strong&gt;Fabrics&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;At Poshish, we believe that furniture is more than just functional pieces; it’s an expression of your personality and style. We understand the significance of choosing the right fabric to bring your vision to life, and that’s why we take great pride in offering an extensive and carefully curated collection of fabrics that cater to every taste and preference.&lt;/p&gt;&lt;p&gt;&lt;strong&gt;*Disclaimer:&lt;/strong&gt; Some fabrics &amp;amp; leather may not be available due to certain reasons. Please confirm the availability of fabrics &amp;amp; leather from the sales team before ordering. Colors &amp;amp; Wood Textures may vary as per the industrial manufacturing standards recognized globally and due to screen resolutions.&lt;/p&gt;&lt;p&gt;&lt;strong&gt;Wood Textures&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;At Poshish, we understand that the essence of exquisite furniture lies in the intricate details and the warmth of wood textures. We take great pride in offering an extensive collection of wood textures that will not only enhance your furniture but also add a touch of natural elegance to your living spaces.&lt;/p&gt;&lt;p&gt;&lt;strong&gt;*Disclaimer:&lt;/strong&gt; Some wooden textures may not be available due to certain reasons. Please confirm the availability of wooden textures from the sales team before ordering. Colors &amp;amp; Textures may vary as per the industrial manufacturing standards recognized globally and due to screen resolutions.&lt;/p&gt;', '52000', '38000', '10', '8', 'off-chr-0x1', 1, 'attribute', '57431-IMG_5575.webp', '69171-3352-BLACK-MANAGER-CHAIR.webp,91627-IMG_5574.webp', 'chairs,office chairs', '120,80,300', 'e ordering. Colors &amp; Wood Textures may vary as per the industrial manufacturing standards recognized globally and due to screen resolutions.', '1', '0', '', '', '', '27-03-2024', '1'),
(6, 'sofa product here', '&lt;p&gt;tretretre rterter&lt;/p&gt;', '12', '3', '6', '3', 'off-chr-0x1', 2, 'variation', '63121-SOS0005-sofa-set-sofa-design-furniture-store-in-pakistan-e1675746645378.webp', '27798-iwfdjhfddfdf.jpg,1455-iwjfsdbjfnsd.jpg', 'sofa,kuxuxry sofa,premium sofa', '40,80,300', 'this is the updated version', '1', '0', '', '', '', '27-03-2024', '1'),
(7, 'brand new sony canon rdx 99', '&lt;p&gt;there is description of our sony product&lt;/p&gt;', '500', '', '98', '3', '45', 2, 'variation', '80876-canon-eos-90d-hero-1.webp', '7883-brand-new-canon-dslr-camera-eos-90d-with-18-135-1626283578-5898104.jpg,81205-Camera-Tech-Cover-photo.webp,64806-Ekc54rx2YMgRt5ycD5KYf5.jpg,41031-pro-21.webp', 'camera,hdr,hd camera,cheap camera,sony camera', '90,56,45', 'fdsfdfds dfdsfdsf', '1', '0', '', '', '', '30-03-2024', '1'),
(8, 'Razer BlackShark V2 X Gaming Headset: 7.1 Surround Sound - 50mm Drivers - Memory Foam Cushions - for PC, PS4, PS5, Switch - 3.5mm Audio Jack - Quartz Pink', '&lt;h2&gt;About this item&lt;/h2&gt;&lt;ul&gt;&lt;li&gt;Advanced Passive Noise Cancellation: sturdy closed earcups fully cover ears to prevent noise from leaking into the headset, with its cushions providing a closer seal for more sound isolation.&lt;/li&gt;&lt;li&gt;7.1 Surround Sound for Positional Audio: Outfitted with custom-tuned 50 mm drivers, capable of software-enabled surround sound. *Only available on Windows 10 64bit&lt;/li&gt;&lt;li&gt;Triforce Titanium 50mm High-End Sound Drivers: With titanium-coated diaphragms for added clarity, our new, cutting-edge proprietary design divides the driver into 3 parts for the individual tuning of highs, mids, and lows—producing brighter, clearer audio with richer highs and more powerful lows&lt;/li&gt;&lt;li&gt;Lightweight Design with Breathable Foam Ear Cushions: At just 240g, the BlackShark V2X is engineered from the ground up for maximum comfort&lt;/li&gt;&lt;li&gt;Hyperclear Cardioid Mic: Improved pickup pattern ensures more voice and less noise as it tapers off towards the mic’s back and sides&lt;/li&gt;&lt;li&gt;Cross-platform compatibility: Works with PC, Mac, PS4, Xbox One, Nintendo Switch via 3.5mm jack, enjoy unfair audio advantage across almost every platform.Xbox One stereo Adapter may be required, purchase separately&lt;/li&gt;&lt;/ul&gt;', '59.99', '49.99', '100', '8', 'hed-091', 1, 'attribute', '25054-51FRJHB7XOL._AC_SX679_.jpg', '99301-61YIiVcTxzL._AC_SX679_.jpg,18773-71s+onCu+wL._AC_SX679_.jpg', 'headphones,amazon,samsung', '120,80,300', 'Brand	Razer Model Name	BlackShark V2 X Color	Classic Black Form Factor	Over Ear Connectivity Technology	Wired - 3.5 mm audio jack', '1', '0', '', '', '', '27-03-2024', '1'),
(9, 'new lenovo laptop', '&lt;h2&gt;About this item&lt;/h2&gt;&lt;ul&gt;&lt;li&gt;【 Processing】Celeron N4020 (2 Cores &amp;amp; 2 Threads, 1.10GHz Base Clock, Up to 2.80GHz)&lt;/li&gt;&lt;li&gt;【14\\&quot; HD Display】14.0-inch diagonal, HD (1366 x 768), micro-edge, BrightView.&lt;/li&gt;&lt;li&gt;【Memory &amp;amp; Storage 】4GB LPDDR4x RAM &amp;amp; 128GB eMMC&lt;/li&gt;&lt;li&gt;【Windows 11 Home in S mode】You may switch to regular windows 11: Press \\&quot;Start button\\&quot; bottom left of the screen; Select \\&quot;Settings\\&quot; icon above \\&quot;power\\&quot; icon;Select Update &amp;amp; Security and Activation, then Go to Store; Select \\&quot;Get\\&quot; option under \\&quot;Switch out of S mode\\&quot;; Hit Install. (If you also see an \\&quot;Upgrade your edition of Windows\\&quot; section, be careful not to click the \\&quot;Go to the Store\\&quot; link that appears there.)&lt;/li&gt;&lt;/ul&gt;', '120', '', '100', '8', 'len-100', 2, 'variation', '29195-612Fl0aUARL._AC_SX679_.jpg', '75395-component 135.webp,72156-Component 272.webp,70459-img-3.webp,', 'laptop,lenovo,4gb laptop,8gb laptop,checp laptop,jhjghgh', '120,80,220', 'Brand	OMMOTECH Model Name	IDEAPAD 1 Screen Size	14 Inches Hard Disk Size	64 GB CPU Model	Celeron N4020 Ram Memory Installed Size 4 GB - 8 GB', '1', '0', '', '-1', '', '27-03-2024', '1'),
(10, 'Gaba National GN-202 Steam Iron', '&lt;h4&gt;&lt;strong&gt;Product Details&lt;/strong&gt;&lt;/h4&gt;&lt;p&gt;Gaba National GN-202 Steam Iron Price in Pakistan is Rs. 7,670/-.&lt;br&gt;GABA NATIONAL GN-202 Steam Iron combines efficiency and convenience for effective garment care. With a sleek design, this steam iron features a powerful steam function that effortlessly removes wrinkles, ensuring a polished look for your clothes. The adjustable temperature control allows for versatile use on various fabric types. The ergonomic design and comfortable grip enhance ease of use, making the GNE-202 Steam Iron a reliable choice for quick and efficient ironing tasks. Keep your wardrobe looking sharp with this practical and stylish steam iron from GABA NATIONAL.&lt;br&gt;&lt;strong&gt;Key Features&lt;/strong&gt;&lt;/p&gt;&lt;ul&gt;&lt;li&gt;Comfortable Handle for easy grip&lt;/li&gt;&lt;li&gt;Over Heat Safety Protection&lt;/li&gt;&lt;li&gt;Non Stick Coating&lt;/li&gt;&lt;li&gt;Water Tank Capacity 250 ml&lt;/li&gt;&lt;li&gt;Temperature Changeable&lt;/li&gt;&lt;li&gt;Horizontal and Vertical Surge of Steam&lt;/li&gt;&lt;li&gt;Spray, Steam and Dry Iron&lt;/li&gt;&lt;li&gt;Automatic Shut Off&lt;/li&gt;&lt;li&gt;2200 Watts&lt;/li&gt;&lt;/ul&gt;', '60', '', '10', '8', 'wat-111', 1, 'attribute', '85915-gaba-gn-202-steam-iron.webp', '9911-istockphoto-1347107270-612x612.jpg,', 'Upto 3 Days Returnable,Invoice Available', '40,80,220', 'Invoice Available,Secure Payments,365 Days Help Desk', '1', '0', '', '-1', '', '23-04-2024', '1'),
(12, 'DEWALT DWMT73803 Mechanics Tools Kit and Socket Set, 168-Piece', '&lt;figure class=\\&quot;table\\&quot;&gt;&lt;table&gt;&lt;tbody&gt;&lt;tr&gt;&lt;th&gt;&lt;strong&gt;Manufacturer&lt;/strong&gt;&lt;/th&gt;&lt;td&gt;‎Dewalt&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;th&gt;Part Number&lt;/th&gt;&lt;td&gt;‎DWMT73803&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;th&gt;Product Dimensions&lt;/th&gt;&lt;td&gt;‎50.8 x 37.34 x 12.7 cm; 10.43 kg&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;th&gt;Item model number&lt;/th&gt;&lt;td&gt;‎DWMT73803&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;th&gt;Size&lt;/th&gt;&lt;td&gt;‎One Size&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;th&gt;Colour&lt;/th&gt;&lt;td&gt;‎Black&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;th&gt;Style&lt;/th&gt;&lt;td&gt;‎168 PC&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;th&gt;Finish&lt;/th&gt;&lt;td&gt;‎Polished&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;th&gt;Material&lt;/th&gt;&lt;td&gt;‎Polycarbonate&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;th&gt;Pattern&lt;/th&gt;&lt;td&gt;‎Tools Kit &amp;amp; Socket&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;th&gt;Power Source&lt;/th&gt;&lt;td&gt;‎Hand Powered&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;th&gt;Item Package Quantity&lt;/th&gt;&lt;td&gt;‎1&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;th&gt;Number of Pieces&lt;/th&gt;&lt;td&gt;‎168&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;th&gt;Head Style&lt;/th&gt;&lt;td&gt;‎Hex&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;th&gt;Measurement System&lt;/th&gt;&lt;td&gt;‎Metric&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;th&gt;Included Components&lt;/th&gt;&lt;td&gt;‎168PC 14/38/12DR SOCKET SET PTA&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;th&gt;Batteries included?&lt;/th&gt;&lt;td&gt;‎No&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;th&gt;Batteries Required?&lt;/th&gt;&lt;td&gt;‎No&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;th&gt;Item Weight&lt;/th&gt;&lt;td&gt;‎10.4 kg&lt;/td&gt;&lt;/tr&gt;&lt;/tbody&gt;&lt;/table&gt;&lt;/figure&gt;', '5000', '80', '100', '8', 'rol-1x2', 1, 'simple', '58385-71EXsP2lG0L._AC_SX679_.jpg', '14356-71VMZNpptSL._AC_SX679_.jpg', 'toolbox,gadets,fallana dhimkana', '120,80,300', 'Amazon.com Return Policy:Regardless of your statutory right of withdrawal, you enjoy a 30-day right of return for many products. For exceptions and conditions, see Return details.', '0', '0', '', '-1', '', '23-04-2024', '1'),
(13, 'brand new t900 ultra watch', '&lt;figure class=\\&quot;table\\&quot;&gt;&lt;table&gt;&lt;thead&gt;&lt;tr&gt;&lt;th colspan=\\&quot;2\\&quot;&gt;General Features&lt;/th&gt;&lt;/tr&gt;&lt;/thead&gt;&lt;tbody&gt;&lt;tr&gt;&lt;th&gt;&lt;strong&gt;SIM Support&lt;/strong&gt;&lt;/th&gt;&lt;td&gt;&lt;strong&gt;N/A&lt;/strong&gt;&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;th&gt;&lt;strong&gt;Dimensions&lt;/strong&gt;&lt;/th&gt;&lt;td&gt;&lt;strong&gt;N/A&lt;/strong&gt;&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;th&gt;&lt;strong&gt;Strap Material&lt;/strong&gt;&lt;/th&gt;&lt;td&gt;&lt;strong&gt;Silicon&lt;/strong&gt;&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;th&gt;&lt;strong&gt;Water Resistant&lt;/strong&gt;&lt;/th&gt;&lt;td&gt;&lt;strong&gt;IP67&lt;/strong&gt;&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;th&gt;&lt;strong&gt;Weight&lt;/strong&gt;&lt;/th&gt;&lt;td&gt;&lt;strong&gt;N/A&lt;/strong&gt;&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;th&gt;&lt;strong&gt;Operating System&lt;/strong&gt;&lt;/th&gt;&lt;td&gt;&lt;strong&gt;Proprietary OS&lt;/strong&gt;&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;th&gt;&lt;strong&gt;Speaker&lt;/strong&gt;&lt;/th&gt;&lt;td&gt;&lt;strong&gt;Yes&lt;/strong&gt;&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;th&gt;&lt;strong&gt;Modes&lt;/strong&gt;&lt;/th&gt;&lt;td&gt;&lt;strong&gt;Multiple sports modes&lt;/strong&gt;&lt;/td&gt;&lt;/tr&gt;&lt;/tbody&gt;&lt;/table&gt;&lt;/figure&gt;&lt;figure class=\\&quot;table\\&quot;&gt;&lt;table&gt;&lt;thead&gt;&lt;tr&gt;&lt;th colspan=\\&quot;2\\&quot;&gt;Display&lt;/th&gt;&lt;/tr&gt;&lt;/thead&gt;&lt;tbody&gt;&lt;tr&gt;&lt;th&gt;&lt;strong&gt;Camera&lt;/strong&gt;&lt;/th&gt;&lt;td&gt;&lt;strong&gt;N/A&lt;/strong&gt;&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;th&gt;&lt;strong&gt;Screen Size&lt;/strong&gt;&lt;/th&gt;&lt;td&gt;&lt;strong&gt;2.01&lt;/strong&gt;&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;th&gt;&lt;strong&gt;Screen Resolution&lt;/strong&gt;&lt;/th&gt;&lt;td&gt;&lt;strong&gt;N/A&lt;/strong&gt;&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;th&gt;&lt;strong&gt;Screen Type&lt;/strong&gt;&lt;/th&gt;&lt;td&gt;&lt;strong&gt;TFT&lt;/strong&gt;&lt;/td&gt;&lt;/tr&gt;&lt;/tbody&gt;&lt;/table&gt;&lt;/figure&gt;&lt;figure class=\\&quot;table\\&quot;&gt;&lt;table&gt;&lt;thead&gt;&lt;tr&gt;&lt;th colspan=\\&quot;2\\&quot;&gt;Memory&lt;/th&gt;&lt;/tr&gt;&lt;/thead&gt;&lt;tbody&gt;&lt;tr&gt;&lt;th&gt;&lt;strong&gt;Ram&lt;/strong&gt;&lt;/th&gt;&lt;td&gt;&lt;strong&gt;N/A&lt;/strong&gt;&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;th&gt;&lt;strong&gt;Rom&lt;/strong&gt;&lt;/th&gt;&lt;td&gt;&lt;strong&gt;N/A&lt;/strong&gt;&lt;/td&gt;&lt;/tr&gt;&lt;/tbody&gt;&lt;/table&gt;&lt;/figure&gt;', '2500', '1999', '100', '8', 'dec-001', 1, 'variation', '36708-t900-ultra-smart-watch-pakistan-telectronics.pk_.jpg', '76310-54036a8c-a796-4919-a093-4b9f2c283444.jpg,71380-Ins3657735261_3274abe3e7374df0bc0e11d4c650e1df_349065397_1639875706494695_2200183591673541727_n.jpg,', 'smart gadets,watches,phone watch', '15,80,300', 'T900 Ultra Smart Watch Series 8 - Bluetooth Call Smartwatch with Heart Rate and Sleep Monitoring', '1', '0', '', '-1', '', '27-04-2024', '1'),
(14, 'ULTRAPORTABLE 4K QUADCOPTER (WHITE) HomeShop...Ultraportable 4K Quadcopter (White)', '&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur feugiat laoreet odio, sit amet tincidunt sem bibendum et. Praesent fermentum auctor malesuada. Nunc pretium lectus est, vitae sodales nisi dignissim id. Cras molestie blandit lobortis. Mauris varius maximus elit, non hendrerit sapien dapibus vitae. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur feugiat laoreet odio, sit amet tincidunt sem bibendum et. Praesent fermentum auctor malesuada. Nunc pretium lectus est, vitae sodales nisi dignissim id. Cras molestie blandit lobortis. Mauris varius maximus elit, non hendrerit sapien dapibus vitae.&lt;/p&gt;&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur feugiat laoreet odio, sit amet tincidunt sem bibendum et. Praesent fermentum auctor malesuada. Nunc pretium lectus est, vitae sodales nisi dignissim id. Cras molestie blandit lobortis. Mauris varius maximus elit, non hendrerit sapien dapibus vitae.&lt;/p&gt;', '699', '', '10', '3', 'sof-x11', 1, 'simple', '58604-product-copyright-3.jpg', '', 'drone,#drone,spy camera,drone shooting', '120,66,300', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur feugiat laoreet odio, sit amet tincidunt sem bibendum et. Praesent fermentum auctor malesuada. Nunc pretium lectus est, vitae sodales nisi dignissim id. Cras molestie blandit lobortis. Mauris varius maximus elit, non hendrerit sapien dapibus vitae.', '1', '', '', '-1', '', '28-04-2024', '1'),
(18, 'Door Bells RVDC41', '&lt;p&gt;&lt;strong&gt;ey Features&lt;/strong&gt;&lt;/p&gt;&lt;ul&gt;&lt;li&gt;Color: White&lt;/li&gt;&lt;li&gt;Sound: Ding Dong&lt;/li&gt;&lt;li&gt;Voltage: 250V AC 50Hz&lt;/li&gt;&lt;li&gt;Use: Home &amp;amp; Office&lt;a href=\\&quot;javascript:;\\&quot;&gt;SHOW ALL KEY FEATURES&lt;/a&gt;&lt;/li&gt;&lt;/ul&gt;&lt;p&gt;&lt;strong&gt;Product Specifications&lt;/strong&gt;&lt;/p&gt;&lt;figure class=\\&quot;table\\&quot;&gt;&lt;table&gt;&lt;tbody&gt;&lt;tr&gt;&lt;td&gt;Sound Range&lt;/td&gt;&lt;td&gt;10 Meter&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;Mount Type&lt;/td&gt;&lt;td&gt;Wall Mounted&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;Frequency Range&lt;/td&gt;&lt;td&gt;50/ 60hz&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;Material&lt;/td&gt;&lt;td&gt;Plastic&lt;/td&gt;&lt;/tr&gt;&lt;/tbody&gt;&lt;/table&gt;&lt;/figure&gt;&lt;p&gt;&lt;a href=\\&quot;javascript:;\\&quot;&gt;SHOW ALL SPECIFICATIONS&lt;/a&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;Product Details&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;Riva Door Bells Price in Pakistan is Rs. 1,520/-.&lt;/p&gt;&lt;p&gt;Never miss out on another home visitor by always making sure, you are able to answer the door on time with the highly efficient RIVA Electronic Door Bell. Designed with a firm and solid structure, this latest bell proves to be extremely durable and withstanding outdoor weather conditions. High-quality sound that can be heard up to 10 meters makes it much more convenient for you to listen and answer the door on time. You can also switch the bell on mute mode at times you don’t want anyone to disturb you.&lt;/p&gt;&lt;p&gt;&lt;strong&gt;Features&lt;/strong&gt;&lt;br&gt;• Quality Flame Retardant ABS shell&lt;/p&gt;&lt;p&gt;• Durable to ...&lt;/p&gt;', '5500', '', '100', '3', 'dec-001', 1, 'simple', '69704-RVDC-41-01.webp', '74863-RVDC-41-02.webp', 'products,electronic', ',,', '', '1', '0', '0', '-1', '', '02-06-2024', '1'),
(19, '2024 Apple 11-inch iPad Air M2 Wi-Fi 512GB - Starlight', '&lt;h3&gt;Product details&lt;/h3&gt;&lt;p&gt;iPad Air. Fresh Air.&lt;/p&gt;&lt;p&gt;iPad Air. Light. Speed.&lt;br&gt;iPad Air. Dream big.&lt;br&gt;The redesigned 11-inch iPad Air is supercharged by the incredibly fast Apple M2 chip.1 It features a stunning Liquid Retina display, a new landscape camera perfect for FaceTime and video calls, and superfast Wi-Fi 6E.2 And it works with the new Apple Pencil Pro and Magic Keyboard, so you can multitask, study, work, play, and create from anywhere..&lt;/p&gt;&lt;ul&gt;&lt;li&gt;11-INCH LIQUID RETINA DISPLAY—The gorgeous Liquid Retina display features advanced technologies like P3 wide color, True Tone, and ultralow reflectivity, which make everything look stunning.1&lt;/li&gt;&lt;li&gt;PERFORMANCE AND STORAGE—The M2 chip lets you multitask smoothly between powerful apps and play graphics-intensive games. And with all-day battery life, you can keep working and playing wherever you go.4 Choose up to 1TB of storage depending on the room you need for apps, music, movies, and more.5&lt;/li&gt;&lt;li&gt;IPADOS + APPS—iPadOS makes iPad more productive, intuitive, and versatile. With iPadOS, run multiple apps at once, use Apple Pencil to write in any text field with Scribble, and edit and share photos. Stage Manager makes multitasking easy with resizable, overlapping apps and external display support. iPad Air comes with essential apps like Safari, Messages, and Keynote, with over a million more apps available on the App Store.&lt;/li&gt;&lt;li&gt;APPLE PENCIL AND MAGIC KEYBOARD—Apple Pencil Pro transforms iPad Air into an immersive drawing canvas and the world’s best note‑taking device. Apple Pencil (USB-C) is also compatible with iPad Air. Magic Keyboard features a great typing experience and a built‑in trackpad, while doubling as a protective cover for iPad. Accessories sold separately.&lt;/li&gt;&lt;li&gt;ADVANCED CAMERAS—iPad Air features a landscape 12MP Ultra Wide front camera that supports Center Stage for videoconferencing or epic Portrait mode selfies. The 12MP Wide back camera with True Tone flash is perfect for capturing photos and 4K videos. And get great sound with dual studio-quality mics and landscape stereo speakers&lt;/li&gt;&lt;li&gt;UNLOCK AND PAY WITH TOUCH ID—Touch ID is built into the top button, so you can use your fingerprint to unlock your iPad Air, sign in to apps, and make payments securely with Apple Pay.&lt;br&gt;&lt;br&gt;&lt;strong&gt;Legal&lt;/strong&gt;&lt;br&gt;&lt;br&gt;&lt;i&gt;&amp;nbsp;Accessories sold separately and subject to availability. Compatibility varies by generation. Apps are available on the App Store. Title availability is subject to change. Third-party software sold separately.&lt;/i&gt;&lt;br&gt;&amp;nbsp;&lt;/li&gt;&lt;li&gt;&lt;i&gt;1. The display has rounded corners. When measured diagonally as a rectangle, the 11-inch iPad Air 10.86 inches. Actual viewable area is less.&lt;/i&gt;&lt;br&gt;&lt;br&gt;&lt;i&gt;2. Wi-Fi 6E available in counties and regions where supported.&lt;/i&gt;&lt;br&gt;&amp;nbsp;&lt;/li&gt;&lt;li&gt;&lt;i&gt;3. Battery life varies by use and configuration. See &lt;/i&gt;&lt;a href=\\&quot;https://apple.com/batteries\\&quot;&gt;&lt;i&gt;apple.com/batteries&lt;/i&gt;&lt;/a&gt;&lt;i&gt; for more information.&lt;/i&gt;&lt;br&gt;&lt;br&gt;&lt;i&gt;4. Available space is less and varies due to many factors. Storage capacity subject to change based on software version, settings, and iPad model. 1GB = 1 billion bytes; 1TB = 1 trillion bytes. Actual formatted capacity less.&lt;/i&gt;&lt;/li&gt;&lt;/ul&gt;', '25000', '', '100', '3', 'off-chr-0x1', 0, 'simple', '77897-2024-Apple-11-inch-iPad-Air-M2-Wi-Fi-512GB-Starlight_5bd718fd-c550-4815-b61f-5f94892e2117.165d08b3475699b7e484fdffa1480cbb.webp', '13233-7d0dd9fb-8d82-4725-a8bd-619d9bfb413d.7d19ad99d05a6c6e3035ef14f4870e82.webp,', 'apple,producr,ipad,vsison', '120,80,320', '', '1', '0', '0', '-1', '', '02-06-2024', '1'),
(20, 'Ninja TWISTi, HIGH-SPEED Blender DUO 3 Preset Auto-iQ Programs, 34 oz. Pitcher Capacity, SS150', '&lt;p&gt;The Ninja® TWISTi™, High-Speed Blender DUO blender delivers the smoothest purees and finest blends of any Ninja pitcher. The built-in Twist Tamper pushes down ingredients toward the high-speed blades to create perfectly thick outputs like smoothie bowls and nut butters. 5 Preset Auto-iQ® programs help you create your favorite outputs with a touch of a button. Blend directly in your 18 oz. to-go cup for better ingredient breakdown. It comes with 10 delicious recipes for you to try. Clean up is easy with dishwasher-safe cups, blades, and lids.&lt;/p&gt;&lt;ul&gt;&lt;li&gt;Total Texture Control is the built-in Twist Tamper + high-speed blades that power through tough ingredients with 1500 Peak-Watt Power for no stalling, no stirring, no shaking.&lt;/li&gt;&lt;li&gt;The built-in Twist Tamper pushes ingredients down toward the high-speed blades for thick results.&lt;/li&gt;&lt;li&gt;The Hybrid-Edge Blades Assembly delivers better breakdown of frozen whole fruits and veggies, nuts, seeds, and ice for smoother blends.&lt;/li&gt;&lt;li&gt;SmartTORQUE technology is designed for heavy food loads, the power-dense motor maintains high speed to deliver uninterrupted performance.&lt;/li&gt;&lt;li&gt;With the 34 fl oz. High-Speed Pitcher you can crush, chop, and make smoothie bowls in one compact versatile pitcher.&lt;/li&gt;&lt;li&gt;Customize flavors and textures with the removable drizzle cap by adding ingredients while processing. Helps you create the perfect textures for the best smoothies.&lt;/li&gt;&lt;li&gt;3 preset Auto-iQ programs for one-touch Extractions, Frozen Drinks, Bowls.&lt;/li&gt;&lt;li&gt;The nutrient extraction* cup is designed to deliver better ingredient breakdown for perfectly smooth drinkables. Twist on a spout lid &amp;amp; enjoy your drinks on the go.&lt;/li&gt;&lt;li&gt;*Extract a drink containing vitamins and nutrients from fruits and vegetables.&lt;/li&gt;&lt;/ul&gt;', '5500', '', '100', '3', 'wat-111', 1, 'simple', '25541-Ninja-TWISTi-HIGH-SPEED-Blender-DUO-3-Preset-Auto-iQ-Programs-34-oz-Pitcher-Capacity-SS150_998555c3-207a-4333-a645-04481a4fef4b.29ba39c0e3b175711caae8d69a939862.webp', '91229-428e1748-1cbd-4c65-bb30-c63a2c649928.28aa1643b781c0525323c19f7c89fa73.webp,37719-f0846cde-1dad-4b1b-9320-11fa8cd10fa6.4fb8f3483d65113813e3fa24ce51f5a8.webp', 'juicer,blender,kuch bhi\\&#039;', '120,80,300', 'Customize flavors and textures with the removable drizzle cap by adding ingredients while processing. Helps you create the perfect textures for the best smoothies', '1', '0', '0', '-1', '', '02-06-2024', '1'),
(21, 'mobile', '&lt;p&gt;sjacbwdwsxibweijcdbq&lt;/p&gt;', '40000', '35000', '50', '5', 'kehfg', 0, 'simple', '66429-img-2.jpg', '27679-img-5.jpg,97002-img-6.jpg,46603-img-7.jpg', 'mobile', ',,', 'hsdcbsdjbcwej', '1', '0', '0', '-1', '', '07-06-2024', '1'),
(22, 'shdghdf dfghdf dhfghdsf', '&lt;p&gt;dfidsfuids idsfuiudsfidsf idufidfu idsufidsuf idsufidsuf idsfuidfu&lt;/p&gt;', '5500', '', '100', '14', '5', 1, 'simple', '46922-images.jpg', '15749-MainAfter.webp', 'eshsg', '120,80,300', 'dfidsfuids idsfuiudsfidsf idufidfu idsufidsuf idsufidsuf idsfuidfu', '1', '0', '0', '-1', '', '08-06-2024', '1'),
(23, 'laptop', '&lt;p&gt;asbscdbhjnsdjn&lt;/p&gt;', '40000', '35000', '50', '10', 'kehfg', 16, 'simple', '32624-img-3.jpg', '58538-img-4.jpg,6461-img-6.jpg,', 'laptop', ',,', 'jnxsadkjxcnisdj', '1', '0', '1', '', '', '08-06-2024', '1');

-- --------------------------------------------------------

--
-- Table structure for table `product_attributes`
--

CREATE TABLE `product_attributes` (
  `Id` int(11) NOT NULL,
  `attribute` varchar(1000) NOT NULL,
  `attribute_value` varchar(1000) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_attributes`
--

INSERT INTO `product_attributes` (`Id`, `attribute`, `attribute_value`, `product_id`) VALUES
(1, '[\"color\"]', '[\"red | blue\"]', 4),
(3, '[\"color\"]', '[\"red\"]', 6),
(4, '[\"color\",\"size\"]', '[\"black | green | pink | white\",\"3.5 mm | usb\"]', 8),
(5, '[\"storage\"]', '[\"4gb ram | 8 gb ram\"]', 9),
(6, '[\"color\"]', '[\"red\"]', 7),
(8, '[\"color\",\"watt\"]', '[\"White\",\"2200\"]', 10),
(9, '[\"body-color\",\"strap-color\"]', '[\"silver | black\",\"orange | grey | light grey | black | white\"]', 13);

-- --------------------------------------------------------

--
-- Table structure for table `product_reviews`
--

CREATE TABLE `product_reviews` (
  `Id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `rating` varchar(50) NOT NULL,
  `review` longtext NOT NULL,
  `user_data` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_variations`
--

CREATE TABLE `product_variations` (
  `Id` int(11) NOT NULL,
  `variations` longtext NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_variations`
--

INSERT INTO `product_variations` (`Id`, `variations`, `product_id`) VALUES
(2, '[{\"variation_name\":\"red\",\"variation_price\":\"12\",\"variation_sale_price\":\"3\",\"variation_length\":\"40\",\"variation_width\":\"160\",\"variation_height\":\"180\",\"variation_quantity\":\"123\",\"variation_sku\":\"wre-0987\",\"variation_stock\":\"1\",\"variation_exercept\":\"the product is updated\"}]', 6),
(3, '[{\"variation_name\":\"4gb ram\",\"variation_price\":\"229.99\",\"variation_sale_price\":\"199.99\",\"variation_length\":\"40\",\"variation_width\":\"160\",\"variation_height\":\"180\",\"variation_quantity\":\"50\",\"variation_sku\":\"lenovo-4gb-100\",\"variation_stock\":\"1\",\"variation_exercept\":\"Brand\\tOMMOTECH Model Name\\tIDEAPAD 1 Screen Size\\t14 Inches Hard Disk Size\\t64 GB CPU Model\\tCeleron N4020 Ram Memory Installed Size\\t4 GB\"},{\"variation_name\":\"8 gb ram\",\"variation_price\":\"249.99\",\"variation_sale_price\":\"229.99\",\"variation_length\":\"40\",\"variation_width\":\"160\",\"variation_height\":\"180\",\"variation_quantity\":\"50\",\"variation_sku\":\"len-8-101\",\"variation_stock\":\"1\",\"variation_exercept\":\"Brand\\tOMMOTECH Model Name\\tIDEAPAD 1 Screen Size\\t14 Inches Hard Disk Size\\t64 GB CPU Model\\tCeleron N4020 Ram Memory Installed Size\\t8 GB\"}]', 9),
(4, '[{\"variation_name\":\"red\",\"variation_price\":\"34\",\"variation_sale_price\":\"11\",\"variation_length\":\"40\",\"variation_width\":\"160\",\"variation_height\":\"180\",\"variation_quantity\":\"22\",\"variation_sku\":\"ght-90890\",\"variation_stock\":\"0\",\"variation_exercept\":\"hope it works\"}]', 7),
(6, '[{\"variation_name\":\"silver - orange\",\"variation_price\":\"2100\",\"variation_sale_price\":\"\",\"variation_length\":\"40\",\"variation_width\":\"40\",\"variation_height\":\"80\",\"variation_quantity\":\"30\",\"variation_sku\":\"ght-90890\",\"variation_stock\":\"1\",\"variation_exercept\":\"T900 Ultra Smart Watch Series 8 - Bluetooth Call Smartwatch with Heart Rate and Sleep MonitoringT900 Ultra Smart Watch Series 8 - Bluetooth Call Smartwatch with Heart Rate and Sleep MonitoringT900 Ultra Smart Watch Series 8 - Bluetooth Call Smartwatch with Heart Rate and Sleep Monitoring\"},{\"variation_name\":\"silver - grey\",\"variation_price\":\"2200\",\"variation_sale_price\":\"\",\"variation_length\":\"40\",\"variation_width\":\"160\",\"variation_height\":\"80\",\"variation_quantity\":\"50\",\"variation_sku\":\"ght-90890\",\"variation_stock\":\"1\",\"variation_exercept\":\"T900 Ultra Smart Watch Series 8 - Bluetooth Call Smartwatch with Heart Rate and Sleep MonitoringT900 Ultra Smart Watch Series 8 - Bluetooth Call Smartwatch with Heart Rate and Sleep MonitoringT900 Ultra Smart Watch Series 8 - Bluetooth Call Smartwatch with Heart Rate and Sleep Monitoring\"},{\"variation_name\":\"silver - light grey\",\"variation_price\":\"2300\",\"variation_sale_price\":\"1900\",\"variation_length\":\"40\",\"variation_width\":\"40\",\"variation_height\":\"80\",\"variation_quantity\":\"50\",\"variation_sku\":\"wre-0987\",\"variation_stock\":\"1\",\"variation_exercept\":\"T900 Ultra Smart Watch Series 8 - Bluetooth Call Smartwatch with Heart Rate and Sleep MonitoringT900 Ultra Smart Watch Series 8 - Bluetooth Call Smartwatch with Heart Rate and Sleep MonitoringT900 Ultra Smart Watch Series 8 - Bluetooth Call Smartwatch with Heart Rate and Sleep Monitoring\"},{\"variation_name\":\"silver - black\",\"variation_price\":\"2900\",\"variation_sale_price\":\"2600\",\"variation_length\":\"40\",\"variation_width\":\"40\",\"variation_height\":\"80\",\"variation_quantity\":\"123\",\"variation_sku\":\"ght-90890\",\"variation_stock\":\"1\",\"variation_exercept\":\"T900 Ultra Smart Watch Series 8 - Bluetooth Call Smartwatch with Heart Rate and Sleep MonitoringT900 Ultra Smart Watch Series 8 - Bluetooth Call Smartwatch with Heart Rate and Sleep MonitoringT900 Ultra Smart Watch Series 8 - Bluetooth Call Smartwatch with Heart Rate and Sleep Monitoring\"},{\"variation_name\":\"silver - white\",\"variation_price\":\"2500\",\"variation_sale_price\":\"\",\"variation_length\":\"40\",\"variation_width\":\"40\",\"variation_height\":\"40\",\"variation_quantity\":\"30\",\"variation_sku\":\"ght-90890\",\"variation_stock\":\"1\",\"variation_exercept\":\"T900 Ultra Smart Watch Series 8 - Bluetooth Call Smartwatch with Heart Rate and Sleep MonitoringT900 Ultra Smart Watch Series 8 - Bluetooth Call Smartwatch with Heart Rate and Sleep MonitoringT900 Ultra Smart Watch Series 8 - Bluetooth Call Smartwatch with Heart Rate and Sleep Monitoring\"},{\"variation_name\":\"black- orange\",\"variation_price\":\"2500\",\"variation_sale_price\":\"1700\",\"variation_length\":\"40\",\"variation_width\":\"160\",\"variation_height\":\"80\",\"variation_quantity\":\"123\",\"variation_sku\":\"lenovo-4-100\",\"variation_stock\":\"1\",\"variation_exercept\":\"T900 Ultra Smart Watch Series 8 - Bluetooth Call Smartwatch with Heart Rate and Sleep MonitoringT900 Ultra Smart Watch Series 8 - Bluetooth Call Smartwatch with Heart Rate and Sleep MonitoringT900 Ultra Smart Watch Series 8 - Bluetooth Call Smartwatch with Heart Rate and Sleep Monitoring\"},{\"variation_name\":\"black- grey\",\"variation_price\":\"2500\",\"variation_sale_price\":\"1900\",\"variation_length\":\"40\",\"variation_width\":\"40\",\"variation_height\":\"40\",\"variation_quantity\":\"50\",\"variation_sku\":\"wre-0987\",\"variation_stock\":\"1\",\"variation_exercept\":\"T900 Ultra Smart Watch Series 8 - Bluetooth Call Smartwatch with Heart Rate and Sleep MonitoringT900 Ultra Smart Watch Series 8 - Bluetooth Call Smartwatch with Heart Rate and Sleep MonitoringT900 Ultra Smart Watch Series 8 - Bluetooth Call Smartwatch with Heart Rate and Sleep Monitoring\"},{\"variation_name\":\"black- light grey\",\"variation_price\":\"1700\",\"variation_sale_price\":\"\",\"variation_length\":\"40\",\"variation_width\":\"40\",\"variation_height\":\"80\",\"variation_quantity\":\"50\",\"variation_sku\":\"wre-0987\",\"variation_stock\":\"1\",\"variation_exercept\":\"T900 Ultra Smart Watch Series 8 - Bluetooth Call Smartwatch with Heart Rate and Sleep MonitoringT900 Ultra Smart Watch Series 8 - Bluetooth Call Smartwatch with Heart Rate and Sleep MonitoringT900 Ultra Smart Watch Series 8 - Bluetooth Call Smartwatch with Heart Rate and Sleep Monitoring\"},{\"variation_name\":\"black- black\",\"variation_price\":\"2500\",\"variation_sale_price\":\"\",\"variation_length\":\"40\",\"variation_width\":\"40\",\"variation_height\":\"40\",\"variation_quantity\":\"50\",\"variation_sku\":\"wre-0987\",\"variation_stock\":\"1\",\"variation_exercept\":\"T900 Ultra Smart Watch Series 8 - Bluetooth Call Smartwatch with Heart Rate and Sleep MonitoringT900 Ultra Smart Watch Series 8 - Bluetooth Call Smartwatch with Heart Rate and Sleep MonitoringT900 Ultra Smart Watch Series 8 - Bluetooth Call Smartwatch with Heart Rate and Sleep Monitoring\"},{\"variation_name\":\"black- white\",\"variation_price\":\"2100\",\"variation_sale_price\":\"\",\"variation_length\":\"40\",\"variation_width\":\"50\",\"variation_height\":\"40\",\"variation_quantity\":\"30\",\"variation_sku\":\"lenovo-4-100\",\"variation_stock\":\"1\",\"variation_exercept\":\"T900 Ultra Smart Watch Series 8 - Bluetooth Call Smartwatch with Heart Rate and Sleep MonitoringT900 Ultra Smart Watch Series 8 - Bluetooth Call Smartwatch with Heart Rate and Sleep MonitoringT900 Ultra Smart Watch Series 8 - Bluetooth Call Smartwatch with Heart Rate and Sleep Monitoring\"}]', 13);

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `Id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `price` varchar(255) NOT NULL,
  `sale_price` varchar(255) NOT NULL,
  `service_type` varchar(255) NOT NULL,
  `available` varchar(255) NOT NULL,
  `start_date` varchar(255) NOT NULL,
  `end_date` varchar(255) NOT NULL,
  `start_time` varchar(255) NOT NULL,
  `end_time` varchar(255) NOT NULL,
  `slot` varchar(255) NOT NULL,
  `city` varchar(50) NOT NULL,
  `area` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `location` mediumtext NOT NULL,
  `services_data` longtext NOT NULL,
  `excerpt` mediumtext NOT NULL,
  `featured_image` varchar(1000) NOT NULL,
  `gallery_images` longtext NOT NULL,
  `video` varchar(1000) NOT NULL,
  `tags` mediumtext NOT NULL,
  `validity` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `viewed` varchar(50) NOT NULL,
  `trash` varchar(50) NOT NULL,
  `vendor_trash` varchar(50) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`Id`, `name`, `description`, `price`, `sale_price`, `service_type`, `available`, `start_date`, `end_date`, `start_time`, `end_time`, `slot`, `city`, `area`, `category`, `location`, `services_data`, `excerpt`, `featured_image`, `gallery_images`, `video`, `tags`, `validity`, `user_id`, `status`, `viewed`, `trash`, `vendor_trash`, `date`) VALUES
(1, 'the car renewal day', '&lt;p&gt;in this you will renew your car means service and meanwhile the car is at garage you can vist a measum&lt;/p&gt;', '110', '90', 'basic', '1', '', '', '', '', '', '', '', '', 'NH 5, Rani Bagh Qasimabad, Hyderabad, Sindh, Pakistan', '[{\"name\":\"car repair\",\"description\":\"in this you will renew your car means service and meanwhile the car is at garage you can vist a measum\"},{\"name\":\"measeum visit\",\"description\":\"in this you will renew your car means service and meanwhile the car is at garage you can vist a measum\"}]', 'ashgshdgas hasdhagd hasdghasg ahsgdhasgdhas hagdahsgdahs dshagdhsgdhas hadghasd', '27684-hand-mechanic-holding-car-service-600nw-2340377479.webp', '78243-merlin_156969357_5c37f256-0b6d-400d-bfba-cabd3e6c4dfd-superJumbo.jpg,66224-multi-brand-car-service-india.jpg', '', 'car,car service,car repair,historic place,hfghfhfghgfh', '', '1', '1', '', '', '', '30-03-2024'),
(2, 'the care of your body', '&lt;p&gt;in this you will renew your car means service and meanwhile the car is at garage you can vist a measum&lt;/p&gt;', '110', '90', 'basic', '1', '', '', '', '', '', '', '', '', 'NH 5, Rani Bagh Qasimabad, Hyderabad, Sindh, Pakistan', '[{\"name\":\"dental service\",\"description\":\"in this you will renew your denatlmeans service and meanwhile the car is at garage you can vist a measum\"},{\"name\":\"Lunch at rt\",\"description\":\"in this you will renew your car means service and meanwhile the car is at garage you can vist a measum\"}]', 'ashgshdgas hasdhagd hasdghasg ahsgdhasgdhas hagdahsgdahs dshagdhsgdhas hadghasd', '32675-14-3.jpg', '31196-diy-taco-lunch-box-54f8791776b64900b285fbfc22a4f0bc.jpg,22695-Sumac-turkey-stuffed-pittas-73482d5.jpg', '', 'car,car service,car repair,historic place,updated service', '', '1', '1', '', '', '', '30-03-2024'),
(3, 'the tour and travel service', '&lt;p&gt;this is a testing service to check all the thing is working properly?&lt;/p&gt;', '120', '', 'normal', '1', '', '', '', '', '', '', '', '', 'NH 5, Rani Bagh Qasimabad, Hyderabad, Sindh, PakistanVVVVVVVVVVVVVVVV', '[{\"name\":\"university visit\",\"description\":\"there will be a university visit\"},{\"name\":\"saloon service\",\"description\":\"then u will have a visit\"},{\"name\":\"lunch\",\"description\":\"lunch at desi hurt resturant\"},{\"name\":\"car service\",\"description\":\"you will have an car service\"}]', 'there is testing hub', '99325-College-Visit.jpg', '99736-1035w-oVSsAGGpgjg.webp,23333-Sumac-turkey-stuffed-pittas-73482d5.jpg,5769-campus-visit-collage.jpg', '', 'university,services,hello,lello,shgdshdg,sdjhsajdha', '', '1', '1', '', '', '', '22-04-2024'),
(6, 'beautiful wedding decorations services?', '&lt;p&gt;Now get the best decor services at the best prices in Pakistan.&lt;br&gt;Find below the complete secification and details for the Alpha wedding decor package.&lt;br&gt;• Customized Stage Backdrop Design &amp;amp; Décor 20x10sqft&lt;br&gt;• Stage Polished Wooden Floor 20x16sqft&lt;br&gt;• Stage polished Wooden Ramp 20x8sqft&lt;br&gt;• Stage Special Silverline Diwan /Sofa Seat for Couple&lt;br&gt;• Stage Related General + theme Lighting&lt;br&gt;• 2 Specially Designed Gazebos/Huts to be adorned at Side Lounges&lt;br&gt;• Customized Arena Décor + Round Table Floral Arrangements&lt;br&gt;• Customized Entrance Décor by Special Stuff&lt;br&gt;• Professional DJ Sound System&lt;br&gt;• Artificial but Imported Class Flowers to be used for entire Décor&lt;/p&gt;&lt;p&gt;&lt;strong&gt;All of this in just Rs. 78,000/- Only&lt;/strong&gt;&lt;/p&gt;', '78000', '', 'basic', '0', '2024-04-24', '2024-08-31', '', '', '', '', '', '', 'NH 5, Rani Bagh Qasimabad, Hyderabad, Sindh, Pakistan', '[{\"name\":\"wedding decorations\",\"description\":\"we can your wedding decorations parternors and guiders\"},{\"name\":\"bridal shower event organizer\",\"description\":\"can be your bridal\\/groom shower ecvent organizer\"}]', 'A2z Events Solutions is the only wedding designer in Lahore that can deliver all the wedding decoration services under one roof as promised. The design and decoration of the event are proportional to the customer’s budget. A2z Event Solutions offers the best wedding design services in Lahore on an affordable and customized budget.', '80471-Indoor-Nikah-event-stage-decoration-setup-ideas-in-Pakistan-5.jpg', '', '', 'wedding,bridal shower,groom shoower,falana', '', '1', '1', '', '', '', '23-04-2024'),
(7, 'Roofing repair system', '&lt;p&gt;&lt;strong&gt;Type of application:&lt;/strong&gt;&amp;nbsp;Homes, garage, and any other residential areas.&lt;/p&gt;&lt;p&gt;‍&lt;strong&gt;Roof design:&lt;/strong&gt;&amp;nbsp;Most residential roofs have steeper slopes and high-pitched structures.&lt;/p&gt;&lt;p&gt;‍&lt;strong&gt;Common roofing materials:&lt;/strong&gt;&amp;nbsp;Asphalt shingles, ceramic roof tiles, slate roofs, and cedar shingles.&lt;/p&gt;&lt;h3&gt;&lt;strong&gt;Commercial roofing service&lt;/strong&gt;&lt;/h3&gt;&lt;p&gt;&lt;strong&gt;Type of application:&lt;/strong&gt;&amp;nbsp;Shopping centers, restaurants, and other commercial buildings.&lt;/p&gt;&lt;p&gt;‍&lt;strong&gt;Roof design:&lt;/strong&gt;&amp;nbsp;Designed with a low slope, low pitched, and flat design. It is also usually built to allow water to drain and prevent pooling water.&lt;/p&gt;&lt;p&gt;‍&lt;strong&gt;Common roofing materials:&lt;/strong&gt;&amp;nbsp;Thermoplastic polyolefin (TPO), metal, gravel, and ethylene propylene diene monomer (EPDM).&lt;/p&gt;&lt;h3&gt;&lt;strong&gt;Industrial roofing service&lt;/strong&gt;&lt;/h3&gt;&lt;p&gt;&lt;strong&gt;Type of application:&lt;/strong&gt;&amp;nbsp;Industrial applications&lt;/p&gt;&lt;p&gt;‍&lt;strong&gt;Roof design:&lt;/strong&gt;&amp;nbsp;Industrial roofs generally have truss and low-rise structures.&lt;/p&gt;&lt;p&gt;‍&lt;strong&gt;Common roofing materials:&lt;/strong&gt;&amp;nbsp;Thermoplastic polyolefin (TPO), thermoset roof membrane, metal roofs, built-up roofs, spray foam, and modified bitumen.&lt;/p&gt;&lt;h2&gt;&lt;strong&gt;Different types of roofing services&lt;/strong&gt;&lt;/h2&gt;&lt;p&gt;Now that you have a better grasp of the types of roofing firms let’s look at the various services you can offer your customers.&lt;/p&gt;&lt;h3&gt;&lt;strong&gt;Roofing inspection&lt;/strong&gt;&lt;/h3&gt;&lt;p&gt;Professional roofing inspectors assess the entire roof and attic. Best practices recommend a periodic roofing inspection to minimize the risk of problems with the roof.&lt;/p&gt;&lt;p&gt;Roof inspection involves examining its quality and condition, attic ventilation, roof vents, and gutters. Commercial roofing types require regular roofing inspection as part of maintenance. Hiring an experienced and certified roofing inspector helps ensure a professional job.&lt;/p&gt;&lt;h3&gt;&lt;strong&gt;Roof repairs&lt;/strong&gt;&lt;/h3&gt;&lt;p&gt;Roof repairs are an immediate solution for roof issues. Some roofs may only need minor rehabilitation, and in this situation, roof repair is the perfect solution. A roofing inspector can identify the damage, and professional roofers can handle the repair.&lt;/p&gt;&lt;p&gt;Roof repairs deal with specific repairs such as:&lt;/p&gt;&lt;ul&gt;&lt;li&gt;Missing or broken shingles&lt;/li&gt;&lt;li&gt;Missing nails and cracks in tiles&lt;/li&gt;&lt;li&gt;Leak repairs&lt;/li&gt;&lt;li&gt;Poor ventilation&lt;/li&gt;&lt;li&gt;Signs of deterioration&lt;/li&gt;&lt;li&gt;Gutter repairs&lt;/li&gt;&lt;/ul&gt;&lt;h3&gt;&lt;strong&gt;Roof restoration&lt;/strong&gt;&lt;/h3&gt;&lt;p&gt;Suppose the roof is moderately damaged; roof repair would not cut it. In a case like this, it is necessary to perform a restoration to prevent future damages and enhance the roof’s durability.&lt;/p&gt;&lt;p&gt;The steps involved in roof restoration are:&lt;/p&gt;&lt;ul&gt;&lt;li&gt;Repair the entire roof, replace broken tiles, and clean with pressure washing.&lt;/li&gt;&lt;li&gt;Clean the entire roof and gutters to remove debris, mold, and lichen.&lt;/li&gt;&lt;li&gt;Apply filler coats, protective coats, and seals.&lt;/li&gt;&lt;li&gt;Paint the roof with an airless sprayer.&lt;/li&gt;&lt;/ul&gt;&lt;h3&gt;&lt;strong&gt;Roof replacement&lt;/strong&gt;&lt;/h3&gt;&lt;p&gt;When damaged heavily, the roof may be beyond repair or restoration; it is time to replace the roof. Roof replacement is expensive, but it extends the roof’s life expectancy.&lt;/p&gt;&lt;p&gt;A total or partial roof replacement is carefully planned. Safety measures are followed to the tee to protect building contents and roofers. Roof replacements require more materials, labor, and time to finish.&lt;/p&gt;', '5500', '4900', 'basic', '1', '2024-04-24', '2024-06-27', '', '', '', '', '', '', 'NH 5, Rani Bagh Qasimabad, Hyderabad, Sindh, Pakistan', '[{\"name\":\"repiar roofing service\",\"description\":\"repiar roofing service\"}]', 'A total or partial roof replacement is carefully planned. Safety measures are followed to the tee to protect building contents and roofers. Roof replacements require more materials, labor, and time to finish.', '96089-63a2d2376ffab73770cd43c3_B_0016_Roofing-Services-copy-1.webp', '', '', 'reapir', '', '1', '1', '', '', '', '23-04-2024'),
(8, 'Mahir Deep Cleaning Services', '&lt;h2&gt;&lt;strong&gt;Why Do You Need Mahir Deep Cleaning Services?&lt;/strong&gt;&lt;/h2&gt;&lt;p&gt;Cleaning services can help you clean your house from top to bottom, including windows and cupboards. &lt;strong&gt;Booking the whole house deep cleaning services of Mahir Company saves you time, money, and hassle&lt;/strong&gt;.&lt;/p&gt;&lt;h3&gt;&lt;strong&gt;Mahir Deep Cleaning Saves You Time&lt;/strong&gt;&lt;/h3&gt;&lt;p&gt;&lt;strong&gt;When you book house deep cleaning through us, you will not have to spend weekends cleaning the tiles of your floor or watching your maid do it&lt;/strong&gt;.&lt;/p&gt;&lt;p&gt;Our Mahir cleaners will take over the task of cleaning every nook and corner of your washroom, kitchen, and other parts of your home, even your almirahs, and drawers.&lt;/p&gt;&lt;p&gt;&lt;strong&gt;Booking our services is so easy that all you have to do is to search for us using the keyword deep cleaning services near me&lt;/strong&gt;.&lt;/p&gt;&lt;p&gt;Our Mahir\\&#039;s will be at your home 60 mins after the booking or the time you have selected for booking. So, with us, you will save your weekends and leisure time.&lt;/p&gt;&lt;h3&gt;&lt;strong&gt;Mahir Deep Cleaning Saves You Money&lt;/strong&gt;&lt;/h3&gt;&lt;p&gt;&lt;strong&gt;For deep kitchen cleaning, you have to buy expensive cleaning materials that cost you almost as much as booking our services, making our services cost-effective&lt;/strong&gt;.&lt;/p&gt;&lt;p&gt;Also, you don’t have the experience our cleaners have in selecting cleaning agents and equipment. Nor do you have the skills to clean stubborn stains like our professionals.&lt;/p&gt;&lt;p&gt;&lt;strong&gt;So, whether it is room deep cleaning or any other part of your home, booking our services is an affordable option&lt;/strong&gt;.&lt;/p&gt;&lt;h3&gt;&lt;strong&gt;Mahir Deep Cleaning Saves You Hassle&lt;/strong&gt;&lt;/h3&gt;&lt;p&gt;You can book our deep cleaning services and expect us to clean those corners of your home, like kitchen shelves and kitchen hood, as we have included sub-services.&lt;/p&gt;&lt;p&gt;So, if you are shifting to a new home or getting your home ready for an event, or preparing your home for welcoming 2023, booking our services will be the most hassle-free thing to do.&lt;/p&gt;&lt;p&gt;Our Mahir\\&#039;s are certified and trained professionals; we have verified them from Tasdeeq Pakistan and provide them with weekly training sessions.&lt;/p&gt;&lt;p&gt;&lt;strong&gt;So, your family and your home will be safe with us if you book our services for even room deep cleaning, which is the most private part of your home&lt;/strong&gt;.&lt;br&gt;What are you thinking? Book now and make your life easy.&lt;/p&gt;', '2300', '', 'normal', '1', '2024-04-27', '2024-05-03', '', '', '', '', '', '', 'Shop No 11, Siddique Plaza, Latifabad Unit No. 8 Latifabad Unit 8 Latifabad, Hyderabad, Sindh 71800, Pakistan', '[{\"name\":\"cleaning services\",\"description\":\"cleaning services\"}]', '', '15198-How_To_Start_A_Cleaning_Business_-_article_image.jpg', '', '', 'cleaning', '', '1', '1', '', '', '', '23-04-2024'),
(9, 'SALON SERVICES', '&lt;p&gt;At Pose we specialize in Blondes, Balayage and Hair Extension techniques. We pride ourselves on professional, highly skilled services being offered at affordable rates in a relaxing and professional environment.&lt;br&gt;At Pose we specialize in Blondes, Balayage and Hair Extension techniques. We pride ourselves on professional, highly skilled services being offered at affordable rates in a relaxing and professional environment.At Pose we specialize in Blondes, Balayage and Hair Extension techniques. We pride ourselves on professional, highly skilled services being offered at affordable rates in a relaxing and professional environment.At Pose we specialize in Blondes, Balayage and Hair Extension techniques. We pride ourselves on professional, highly skilled services being offered at affordable rates in a relaxing and professional environment.At Pose we specialize in Blondes, Balayage and Hair Extension techniques. We pride ourselves on professional, highly skilled services being offered at affordable rates in a relaxing and professional environment.At Pose we specialize in Blondes, Balayage and Hair Extension techniques. We pride ourselves on professional, highly skilled services being offered at affordable rates in a relaxing and professional environment.&lt;/p&gt;', '7800', '6999', 'normal', '1', '2024-04-23', '2024-06-05', '', '', '', '', '', '', 'Latifabad Unit # 3 Latifabad, Hyderabad, Sindh, Pakistan', '[{\"name\":\"hair treatment service\",\"description\":\"hair treatment service\"},{\"name\":\"make up service\",\"description\":\"make up service\"}]', 'At Pose we specialize in Blondes, Balayage and Hair Extension techniques. We pride ourselves on professional, highly skilled services being offered at affordable rates in a relaxing and professional environment.', '11390-Pose_Price_List_oct_22-5.webp', '', '', 'hair treatment,fallana treatment', '', '1', '1', '', '', '', '23-04-2024'),
(10, 'child tution services', '&lt;p&gt;The use of coaching has snowballed in recent years with it now a critical component part of supporting the learning and development activities of many organisations. But when it comes procuring coaching services or coach training, many purchasing decisions are still being made based upon cost, rather than the value of the results the coaching can achieve.&lt;/p&gt;&lt;p&gt;So how can organisations get the best service or product for their budget? We look at some sure-fire ways to help guide you to guaranteeing good quality and the best value for your financial outlay.&lt;/p&gt;&lt;p&gt;&lt;strong&gt;1 Aligning purchasing decisions with your organisation’s and people’s needs&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;Ideally, coaching should be integrated into the bigger picture and support the organisation’s strategic goals as well as the needs of your employees. Bottom line, coaching needs to be applied where it is going to have the biggest impact so do think about who will receive the coaching, which employee groups you need to invest in and what developmental areas to focus on.&lt;/p&gt;&lt;p&gt;One-to-one coaching is an accepted staple of talent management but what can coaching achieve if scaled up? Many organisations are moving away from the traditional hierarchical leadership model in the realisation that teams and teaming are the answer to many of the pressing issues facing businesses.&lt;/p&gt;&lt;p&gt;Team coaching plays an important role when it comes to increasing capacity to live with uncertainty. A good team coach or pairing of team coaches can be more cost effective and will help teams within organisations perform better where complex tasks require greater levels of collaboration. Working with change, relationships, performance, clarifying purpose, improving effectiveness for business growth and better understanding stakeholder needs are all successful deliverable outcomes of commissioning team coaching.&lt;/p&gt;&lt;p&gt;The value of individual coaching should not be undermined though looking at how wider trends are impacting on how leaders want to learn. DDI highlights in its &lt;a href=\\&quot;https://www.ddiworld.com/global-leadership-forecast-2021\\&quot;&gt;&lt;strong&gt;Global Leadership Forecast 2021&lt;/strong&gt;&lt;/a&gt;, that in times of uncertainty leaders want two things: more time to learn and greater external validation that they are doing the right things. According to its findings, ‘more than anything, leaders want outside coaching and development assignments to help them grow their skills outside of day-to-day work. In addition, they expressed a strong desire for assessment to help them pinpoint their development areas.’&lt;/p&gt;&lt;p&gt;&lt;strong&gt;2 Be aware of the time and effort that goes into managing the coaching process&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;HR has a crucial part to play in selecting, managing and evaluating coaching initiatives, but just how much do they know about the coaching process?&lt;/p&gt;&lt;p&gt;For starters, coaching is not a quick fix and HR professionals should get involved in coaching engagements from the offset. A critical framework is essential to assess an individual’s or team’s need for coaching, their readiness, determining whether to use an internal or external coach and running a thorough coach selection and matching process.&lt;/p&gt;&lt;p&gt;HR should also be involved in briefing the coach, managing the contracting process and monitoring and evaluating the impact the coaching has had. Finally, that learning should be captured and fed back into the organisation’s people management strategy so that it informs how learning and development opportunities are run in the future.&lt;/p&gt;&lt;p&gt;&lt;strong&gt;3 Consider the stakeholder relationships&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;Coaching has come of age with its use focused on people with high skills and motivation, but its use can occasionally throw up unseen challenges. Where HR might be responsible for managing the coaching process, line managers or internal coaches are often the ones delivering it.&lt;/p&gt;&lt;p&gt;Understanding ethical issues and boundaries is hugely important. Good contracting is essential to setting goals, respecting boundaries, maintaining confidentiality and achieving your organisational objectives. But be aware that as sponsor, you will not automatically be privy to everything going on for the coachee during these sessions. There may be sensitive areas that impact performance or a coachee could be suffering from mental health issues. A professionally qualified coaching practitioner will be able to direct the coachee to the best place to get support.&lt;/p&gt;&lt;p&gt;&lt;strong&gt;4 Be a quality gatekeeper – setting stringent criteria&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;Choosing the right coach can be a hard task especially when anyone can say they are a coach. What evidence should you be asking coaches to provide to support their credentials?&lt;/p&gt;&lt;p&gt;A good coach will come armed with experience, qualifications and references that won’t hide poor skills. Hire coaches based on their provable expertise, not what they cost. Set your selection criteria bar as high as you can.&lt;/p&gt;&lt;p&gt;Choose coaches who demonstrate their true capabilities, accountability and professionalism through accredited training and the membership of professional bodies such as the International Coaching Federation, EMCC or Association for Coaching. Establish the type of coaching they offer. Consider their corporate background – do they understand your business? Can they deliver for your organisation?&lt;/p&gt;&lt;p&gt;&lt;strong&gt;5 Measure and evaluate your coaching&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;If you are buying external coaching or coach training in, try to centralise the responsibility and decision making for purchasing and commissioning coaching in one place. Having an oversight of all the coaching taking place throughout the organisation will help ensure that you are controlling costs, ensuring quality and managing its effectiveness.&lt;/p&gt;&lt;p&gt;You can use Return on Investment (ROI) models or create your own way of measuring the coaching’s effectiveness but do ask the coaches you engage for regular feedback along with the coachees you are sponsoring. Involve yourself in the contracting process so you know what progress is being made. Also capture and question that data to enable you to feed that knowledge back into how you manage your people going forward.&lt;/p&gt;&lt;p&gt;Coaching is a wonderful, effective and fulfilling way of developing and leading your people. Done right within the constraints of your budget, it can be transformative and allow your people and organisation to reach their potential, even in times of unprecedented and exponential change.&lt;/p&gt;', '2000', '1799', 'basic', '1', '2024-04-23', '2025-01-03', '', '', '', '', '', '', 'NH 5, Rani Bagh Qasimabad, Hyderabad, Sindh, Pakistan', '[{\"name\":\"tution services\",\"description\":\"tution services for child 1 to 9\"},{\"name\":\"competative exam preparation\",\"description\":\"competative exam preparation\"}]', 'Coaching is integral to personal growth, team development and organisational learning, so its integration into the broader people management strategy allows you to monitor its contribution to the company’s wider developmental needs.', '64424-shutterstock_409205623_blog.jpg__1760x1080_q90_crop_progressive_subsampling-2_upscale.jpg', '', '', 'coaching,study', '', '1', '1', '', '', '', '23-04-2024'),
(11, 'Dry cleaning service', '&lt;p&gt;In the bustling city of Lahore, where every moment is a whirlwind of activity, finding a reliable and efficient dry cleaning service is essential. Look no further — our dry cleaning service is here to provide you with stain-free perfection for your garments. With a commitment to quality and customer satisfaction, we stand out as the premier choice for dry cleaning in Lahore.&lt;/p&gt;&lt;h2&gt;&lt;strong&gt;State-of-the-Art Technology&lt;/strong&gt;&lt;/h2&gt;&lt;p&gt;Our &lt;a href=\\&quot;https://workonicservices.com/\\&quot;&gt;&lt;strong&gt;dry cleaning services&lt;/strong&gt;&lt;/a&gt; is equipped with state-of-the-art technology to ensure that your clothes receive the best care possible. Our machines are designed to handle a variety of fabrics delicately, removing stains and preserving the integrity of your garments. From delicate silk dresses to heavy winter coats, our technology can handle it all, leaving your clothes looking as good as new.&lt;/p&gt;&lt;h2&gt;&lt;strong&gt;Expert Staff&lt;/strong&gt;&lt;/h2&gt;&lt;p&gt;At the heart of our dry cleaning service is a team of expert staff dedicated to providing top-notch service. Our skilled professionals have years of experience in the industry and undergo continuous training to stay updated on the latest cleaning techniques. Whether it’s a stubborn stain or a delicate fabric, our staff has the knowledge and expertise to handle it with care, ensuring your clothes receive the attention they deserve.&lt;/p&gt;&lt;h2&gt;&lt;strong&gt;Eco-Friendly Practices&lt;/strong&gt;&lt;/h2&gt;&lt;p&gt;We understand the importance of environmental sustainability, which is why our dry cleaning service employs eco-friendly practices. Our cleaning solutions are biodegradable and free from harsh chemicals, ensuring that your clothes are not only impeccably clean but also environmentally friendly. By choosing our service, you contribute to a greener, cleaner Lahore.&lt;/p&gt;&lt;h2&gt;&lt;strong&gt;Convenient Pickup and Delivery&lt;/strong&gt;&lt;/h2&gt;&lt;p&gt;To make your experience with us even more seamless, we offer convenient pickup and delivery services. Simply schedule a pickup, and our team will collect your garments from your doorstep. Once the cleaning process is complete, we’ll deliver your clothes back to you, saving you time and effort. Our commitment to convenience is just another reason why we are the preferred dry cleaning service in Lahore.&lt;/p&gt;&lt;h2&gt;&lt;strong&gt;Customized Care for Special Items&lt;/strong&gt;&lt;/h2&gt;&lt;p&gt;We understand that some garments require special care, whether it’s a wedding gown, a vintage piece, or a tailored suit. Our dry cleaning service offers customized care for these special items, ensuring they receive the attention and treatment they need. Trust us to handle your most cherished garments with the utmost care and precision.&lt;/p&gt;&lt;h2&gt;&lt;strong&gt;Affordable Pricing&lt;/strong&gt;&lt;/h2&gt;&lt;p&gt;Quality dry cleaning shouldn’t come with a hefty price tag. We believe in providing our customers with affordable pricing without compromising on the level of service. Our transparent pricing ensures that you know exactly what you’re paying for, and with various packages to choose from, you can select the one that best suits your needs and budget.&lt;/p&gt;&lt;h2&gt;&lt;strong&gt;Quick Turnaround Time&lt;/strong&gt;&lt;/h2&gt;&lt;p&gt;We understand that time is of the essence, and waiting for your clothes to be cleaned can be inconvenient. That’s why our dry cleaning service boasts a quick turnaround time. From pickup to delivery, we aim to get your clothes back to you promptly without compromising on the quality of cleaning. Enjoy the convenience of fast and efficient service with our dry cleaning team.&lt;/p&gt;&lt;h2&gt;&lt;strong&gt;Quality Assurance Guarantee&lt;/strong&gt;&lt;/h2&gt;&lt;p&gt;We take pride in our work, and to demonstrate our commitment to quality, we offer a satisfaction guarantee. If you’re not completely satisfied with the results, we’ll reevaluate and reprocess your garments at no extra cost. Your satisfaction is our priority, and we go the extra mile to ensure that your clothes are not just clean but meet the high standards you expect from a premium dry cleaning service.&lt;/p&gt;&lt;h2&gt;&lt;strong&gt;Customer Testimonials&lt;/strong&gt;&lt;/h2&gt;&lt;p&gt;Don’t just take our word for it — hear what our satisfied customers have to say. Our service has garnered positive reviews for our attention to detail, promptness, and the remarkable condition in which we return garments. Customer satisfaction is the backbone of our success, and we value the trust our clients place in us to care for their clothes.&lt;/p&gt;', '500', '', 'basic', '1', '2024-04-30', '2024-07-27', '', '', '', '', '', '', 'Shop No 11, Siddique Plaza, Latifabad Unit No. 8 Latifabad Unit 8 Latifabad, Hyderabad, Sindh 71800, Pakistan', '[{\"name\":\"washing clothes\",\"description\":\"we can wash cloth\"}]', 'We take pride in our work, and to demonstrate our commitment to quality, we offer a satisfaction guarantee. If you’re not completely satisfied with the results, we’ll reevaluate and reprocess your garments at no extra cost. Your satisfaction is our priority, and we go the extra mile to ensure that your clothes are not just clean but meet the high standards you expect from a premium dry cleaning service.', '72019-1_ni4HMR46HBhZu7QgNe6yaA.jpg', '', '', 'Expert,Eco-Friendly Practices,State-of-the-Art Technology,Affordable Pricing', '', '1', '1', '', '-1', '', '23-04-2024'),
(12, 'Turnkey Residential Solar Solutions In Pakistan', '&lt;h3&gt;&lt;strong&gt;Turnkey Solar Energy Systems Provider In Pakistan, Solutions And Energy Supplies&lt;/strong&gt;&lt;/h3&gt;&lt;p&gt;Paksolar Renewable Energy can specify the design, installation, commissioning, and consultancy of renewable energy systems, as per your requirements. The company has practical experience in implementing turnkey solar projects for residential and commercial projects. Paksolar Renewable Energy is a major player in the renewable market and has been blessed by its superiors with the potency of adapting the latest technology at its internal R&amp;amp;D facilities. After the successful test, we developed and quickly launched it in the Pakistani market with the requisite international standards, which made us the Top Solar Energy Solutions Provider in Pakistan.&lt;br&gt;Residential solar systems come in various types, each designed to meet specific energy needs and considerations.&lt;/p&gt;&lt;p&gt;&lt;a href=\\&quot;https://www.paksolarservices.com/residential-solar-system-services-in-pakistan.html\\&quot;&gt;Grid-tied systems (on-grid) &lt;/a&gt;are the most common, where solar panels generate electricity that is fed into the utility grid. This allows homeowners to offset their energy consumption and even sell excess power back to the grid.&lt;/p&gt;&lt;p&gt;&lt;a href=\\&quot;https://www.paksolarservices.com/residential-off-grid-solar-system-in-pakistan.html\\&quot;&gt;Off-grid systems&lt;/a&gt;, on the other hand, operate independently from the grid, relying on battery storage to store excess energy for use during nighttime or cloudy days. They are ideal for remote locations or areas with unreliable grid access.&lt;/p&gt;&lt;p&gt;&lt;a href=\\&quot;https://www.paksolarservices.com/net-metering-solar-systems-in-pakistan.html\\&quot;&gt;Hybrid systems&lt;/a&gt; combine the best of both worlds, integrating grid-tied and off-grid capabilities, enabling homeowners to enjoy the benefits of grid connection while also having backup power during outages. Furthermore, there are also community solar systems, where multiple households share the benefits of a larger solar installation located in a communal area. These systems provide an opportunity for individuals without suitable roof space to participate in solar energy generation. With these diverse options, homeowners can select the residential solar system that best suits their energy goals, location, and budget.&lt;/p&gt;&lt;p&gt;&lt;strong&gt;How Much Can I Save With Solar?&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;It is up to you, how much you wanted to produce electricity units in daily bases.&lt;br&gt;Note:The production of the solar electcity highly dependable by sunlight, cleaning of the solar panels from dust, snow, rain and etc&lt;/p&gt;&lt;p&gt;Will residential solar worthwhile investment for your home? Let\\&#039;s discover together! Get in contact with us, and our resident engineers will make a custom design for your facility that offers the best return on your investment.&lt;/p&gt;&lt;p&gt;Paksolar is a group of engineers and consultants who build energy solutions for the smart home. Moreover, we harness data to analyze, construct, monitor and maintain grid-connected solar systems across Pakistan.&lt;/p&gt;&lt;p&gt;&lt;strong&gt;How It Works?!&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;When your solar panel\\&#039;s system produces electricity, it is consumed on the premises load and any shortfall is seamlessly provided by the grid. If generation from this system is more than the requirement of the home electrical load, the extra energy goes to the battery bank after battery storage is full charge, without &lt;strong&gt;net metering&lt;/strong&gt; this excess generation goes to the grid unaccounted for, and there is no benefit for you. To get the excess generation benefits, you need to apply for net metering visits to your near DISCOS or ask your solution provider. After application; a new “&lt;strong&gt;Bi-Directional&lt;/strong&gt;” electricity meter will be installed as part of the system and will keep track and record this and excess generation and give credit to your monthly bill.&lt;/p&gt;', '50000', '', 'basic', '1', '2024-04-25', '2024-08-07', '', '', '', '', '', '', 'Latifabad Unit # 3 Latifabad, Hyderabad, Sindh, Pakistan', '[{\"name\":\"residental solar service\",\"description\":\"residental solar service\"}]', 'When your solar panel\\&#039;s system produces electricity, it is consumed on the premises load and any shortfall is seamlessly provided by the grid. If generation from this system is more than the requirement of the home electrical load, the extra energy goes to t', '65100-images.jpg', '', '', 'Solar,electricity', '', '1', '1', '', '-1', '', '23-04-2024'),
(13, 'checking service 01', '&lt;p&gt;Welcome to Our Platform!&lt;br&gt;Dear [Vendor Name] ,&lt;br&gt;Thank you for registering on our platform! We\\&#039;re thrilled to have you join our community of vendors.&lt;br&gt;Before you can start using our platform, your registration needs to be approved by our admin team. This process typically takes 2-4 hours. We\\&#039;ll notify you via email once your account is approved and ready for use.&lt;br&gt;A friendly reminder: please refrain from sharing your email and password with anyone. Keeping your account information confidential helps ensure the security of your account and protects your privacy. Once again, thank you for choosing our platform. We\\&#039;re excited to see the value you\\&#039;ll bring to our community! Best regards,&lt;br&gt;[Your Platform Name] Team&lt;/p&gt;', '199', '', 'basic', '1', '2024-05-16', '2024-05-15', '', '', '', '', '', '', 'Shop No 11, Siddique Plaza, Latifabad Unit No. 8 Latifabad Unit 8 Latifabad, Hyderabad, Sindh 71800, Pakistan', '[{\"name\":\"fallana service\",\"description\":\"\"}]', '', '39654-5456834b-ba95-41a9-85b2-4abd4d313c11.png', '', '', '', '', '1', '1', '', '-1', '', '07-05-2024'),
(14, 'check 02', '&lt;p&gt;Welcome to Our Platform!&lt;br&gt;Dear [Vendor Name] ,&lt;br&gt;Thank you for registering on our platform! We\\&#039;re thrilled to have you join our community of vendors.&lt;br&gt;Before you can start using our platform, your registration needs to be approved by our admin team. This process typically takes 2-4 hours. We\\&#039;ll notify you via email once your account is approved and ready for use.&lt;br&gt;A friendly reminder: please refrain from sharing your email and password with anyone. Keeping your account information confidential helps ensure the security of your account and protects your privacy. Once again, thank you for choosing our platform. We\\&#039;re excited to see the value you\\&#039;ll bring to our community! Best regards,&lt;br&gt;[Your Platform Name] Team&lt;/p&gt;', '5500', '', 'basic', '1', '2024-05-30', '2024-06-08', '07:00', '07:00', '', '1', '4', '14', 'Latifabad Unit # 3 Latifabad, Hyderabad, Sindh, Pakistan', '[{\"name\":\"dhakana service\",\"description\":\"\"}]', '', '54337-create-and-manage-multiple-order-success-pages.jpg', '', '', 'new,update', '', '1', '1', '', '-1', '', '22-05-2024'),
(16, 'cathering services', '&lt;p&gt;In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy isIn publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy isIn publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy isIn publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy isIn publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy isIn publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy isIn publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy is&lt;/p&gt;', '5500', '4900', 'basic', '1', '2024-05-10', '2024-05-30', '08:00', '22:00', '', '1', '2', '16', 'Shop No 11, Siddique Plaza, Latifabad Unit No. 8 Latifabad Unit 8 Latifabad, Hyderabad, Sindh 71800, Pakistan', '[{\"name\":\"we can prepare rice\",\"description\":\"In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy is\"},{\"name\":\"we can make qoorma\",\"description\":\"In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy is\"},{\"name\":\"we can make kheer\",\"description\":\"\"},{\"name\":\"we can make barbq\",\"description\":\"In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy is\"}]', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy is', '86301-images.jpg', '24845-featured-image-fridge.webp,2061-gettyimages-1144173422-612x612.jpg,76846-sdss.jpg', '', 'catering,food,haleem', '', '1', '1', '', '-1', '', '09-05-2024'),
(18, 'fuyu', '&lt;p&gt;uyu&lt;/p&gt;', '456', '300', 'basic', '1', '2024-05-17', '2024-05-29', '17:12', '', '', '1', '4', '6', 'NH 5, Rani Bagh Qasimabad, Hyderabad, Sindh, Pakistan', '[{\"name\":\"ititityi\",\"description\":\"ytiuiui\"},{\"name\":\"uiuy\",\"description\":\"uiui\"},{\"name\":\"uiu\",\"description\":\"uiui\"}]', '', '83940-9112533075.png', '', '', '', '', '1', '1', '', '-1', '', '14-05-2024'),
(19, 'fallana service is updated by vendor', '&lt;p&gt;dsfdfdsfdsfds dsfdsfsdfdsf jhdfhgdhsfgd fhfdghgsdfhdsf hdgfhdfghdf hdsfghdsfghsdf rtrtret&lt;/p&gt;', '5500', '45', 'basic', '1', '2024-05-23', '2024-05-28', '20:52', '20:52', '', '1', '16', '3', 'NH 5, Rani Bagh Qasimabad, Hyderabad, Sindh, Pakistan', '[{\"name\":\"wedding decorations\",\"description\":\"qweqweqweqweqwe\"},{\"name\":\"swaggers shirt service\",\"description\":\"there are many services\"}]', '', '43701-Swagger-Wear-logo-.png', '', '', '', '', '1', '1', '', '', '', '18-05-2024'),
(22, 'test service as qwe updated something', '&lt;p&gt;In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy is In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy is In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy is In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy is In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy is&amp;nbsp;&lt;/p&gt;', '35435', '', 'basic', '1', '2024-05-30', '2024-05-30', '06:00', '06:08', '', '1', '2', '16', 'hdsghsd sdghfghsdf hsdfghdsgfs hdsfghdsgfhds', '[{\"name\":\"digitalmarketing service\",\"description\":\"\"}]', 'copy is In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before', '66336-customer-service-1.webp', '', '', 'sdfgd,dfjhdsfj,dfhdjsfh,sdfdhsfjhf', '', '1', '1', '', '', '', '22-05-2024'),
(23, 'sghsgfhdsf hgdfhgdhsf hgdfhgdshfgds hgdfhgdfghsdf', '&lt;p&gt;In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy is&lt;br&gt;In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy is&lt;br&gt;In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy is&lt;br&gt;In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy is&lt;br&gt;In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy is&lt;br&gt;In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy is&lt;/p&gt;', '5500', '', 'standard', '1', '2024-06-04', '2024-05-27', '22:51', '20:56', '', '1', '17', '0', 'NH 5, Rani Bagh Qasimabad, Hyderabad, Sindh, Pakistan', '[{\"name\":\"khali peli ma service\",\"description\":\"In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy is\"}]', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy is', '42872-undraw_Going_up_re_86kg.png', '', '33500-smp.mp4', 'fgdgfdg,dsfdsfsdf', '', '0', '1', '', '', '', '25-05-2024'),
(24, 'Sanitary Plumbing', '&lt;p&gt;Duis porttitor ullamcorper elit tincidunt mollis. Quisque auctor, sapien porta lacinia iaculis, purus urna facilisis risus, nec feugiat erat lacus ut nunc. Ut euismod egestas leo lobortis finibus. Ut accumsan molestie est, at condimentum libero tincidunt tincidunt. Aenean sem massa, mattis at vehicula ac, consequat vitae libero. Aenean suscipit, arcu at mollis fermentum, urna nisl tincidunt neque, eget fermentum purus ante a nunc.Curabitur pulvinar sollicitudin justo, non hendrerit nisi. Donec pulvinar a metus tincidunt tincidunt. Vestibulum pharetra et lacus id convallis.&lt;br&gt;Duis porttitor ullamcorper elit tincidunt mollis. Quisque auctor, sapien porta lacinia iaculis, purus urna facilisis risus, nec feugiat erat lacus ut nunc. Ut euismod egestas leo lobortis finibus. Ut accumsan molestie est, at condimentum libero tincidunt tincidunt. Aenean sem massa, mattis at vehicula ac, consequat vitae libero. Aenean suscipit, arcu at mollis fermentum, urna nisl tincidunt neque, eget fermentum purus ante a nunc.Curabitur pulvinar sollicitudin justo, non hendrerit nisi. Donec pulvinar a metus tincidunt tincidunt. Vestibulum pharetra et lacus id convallis.&lt;/p&gt;', '1200', '', 'basic', '1', '2024-05-25', '2024-05-30', '13:42', '12:43', '', '1', '17', '6', 'NH 5, Rani Bagh Qasimabad, Hyderabad, Sindh, Pakistan', '[{\"name\":\"Sanitary Plumbing\",\"description\":\"we are doing sanitary plumbing service\"},{\"name\":\"roofing\",\"description\":\"we are can dor roofing with three 3 different style\"}]', '', '60196-s1.jpg', '32797-s5.jpg,62306-s7.jpg,59192-s11.jpg', '71428-istockphoto-1465901783-640_adpp_is.mp4', 'plubering,service', '', '0', '1', '1', '', '', '25-05-2024'),
(25, 'css exams training', '&lt;p&gt;In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy isIn publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy isIn publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy isIn publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy is&lt;/p&gt;', '5500', '', 'basic', '1', '2024-05-27', '2024-05-29', '15:42', '16:43', '', '1', '2', '16', 'Latifabad Unit # 3 Latifabad, Hyderabad, Sindh, Pakistan', '[{\"name\":\"css exam training\",\"description\":\"In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document\"}]', 'In publishing and graphic design, Lorem ipg on meaningful content. Lorem ipsum may be used as a placeholder before the final copy isIn publishing and', '50666-7831256552328467-WEBSITE-Schedule_(1).jpg', '', '56750-208815_small.mp4', 'compettitve exams,exams', '', '1', '1', '1', '', '', '25-05-2024'),
(26, 'Unlimited Basic Wash Pass', '&lt;p&gt;In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy is&lt;br&gt;In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy is&lt;br&gt;In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy is&lt;br&gt;In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy is&lt;br&gt;In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy is&lt;br&gt;In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy is&lt;br&gt;In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy is&lt;/p&gt;', '5500', '', '', '1', '2024-05-27', '2024-05-30', '08:00', '18:00', '', '1', '17', '18', 'Latifabad Unit # 3 Latifabad, Hyderabad, Sindh, Pakistan', '[{\"name\":\"Pre-Soak\",\"description\":\"this is Pre-Soak service\"},{\"name\":\"Protective Polish\",\"description\":\"this is Protective Polish\"},{\"name\":\"Spot-Free Rinse\",\"description\":\"this is Spot-Free Rinse\"},{\"name\":\"Heated Blowers &amp; Wheel Cleaner\",\"description\":\"this is Heated Blowers &amp; Wheel Cleaner\"},{\"name\":\"Free vacuums\",\"description\":\"this is Free vacuums\"}]', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy is', '15341-a9466059-c30e-4e7f-9692-1875b4e3ca02.jpg', '91826-982x905_img1.png', '22182-6950555-hd_1920_1080_25fps.mp4', 'car,car service', '', '0', '1', '1', '', '', '27-05-2024');
INSERT INTO `service` (`Id`, `name`, `description`, `price`, `sale_price`, `service_type`, `available`, `start_date`, `end_date`, `start_time`, `end_time`, `slot`, `city`, `area`, `category`, `location`, `services_data`, `excerpt`, `featured_image`, `gallery_images`, `video`, `tags`, `validity`, `user_id`, `status`, `viewed`, `trash`, `vendor_trash`, `date`) VALUES
(27, 'Car interior cleaning', '&lt;p&gt;In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy is&lt;br&gt;In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy is&lt;br&gt;In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy is&lt;br&gt;In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy is&lt;br&gt;In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy is&lt;br&gt;In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy is&lt;br&gt;In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy is&lt;br&gt;In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy is&lt;/p&gt;', '5500', '', 'basic', '1', '2024-06-01', '2024-07-01', '20:00', '23:00', '1', '1', '17', '18', 'Abdul Wahab Arcade Clinic #3 1st Floor,opp:national saving center,Doctor line saddar hyderabad', '[{\"name\":\"car interior service\",\"description\":\"\"}]', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy is', '22114-service_img_2.webp', '45881-1-anas-hd.jpg,19584-2-anas-hd.webp,44948-34.jpg,1020-best-business-consultants-in-Karachi.jpg', '50799-6950555-hd_1920_1080_25fps.mp4', 'car,interior,service', '45', '0', '1', '1', '', '', '06-06-2024'),
(30, 'kuch bhi sevrice', '&lt;p&gt;dkhdshffsd jdfhjdshdsf jdhfjdhfds jdhfjsdhfsd jhdjdfshjdfs jfsjdhfsjdhfj&lt;/p&gt;', '5500', '', 'basic', '1', '2024-06-08', '2024-06-05', '04:54', '04:54', '', '1', '', '14', 'NH 5, Rani Bagh Qasimabad, Hyderabad, Sindh, Pakistan', '[{\"name\":\"saloon service\",\"description\":\"asff sdsdfsd\"}]', 'asfsf jhfjdsfdsf jsdhfjsdfds jsdhfjdsf ksdjksl sksdjsadjask ksdjaklsdjas skjdaksdaklj ksdjskdjas', '66439-f0846cde-1dad-4b1b-9320-11fa8cd10fa6.4fb8f3483d65113813e3fa24ce51f5a8.webp', '', '', 'ytuytutyuyt', '', '1', '1', '0', '', '', '03-06-2024'),
(32, 'doctors services', '&lt;p&gt;In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy is available.&lt;br&gt;In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy is available.&lt;br&gt;In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy is available.&lt;br&gt;In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy is available.&lt;br&gt;In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy is available.&lt;/p&gt;', '5500', '2000', 'basic', '1', '2024-06-27', '2024-06-20', '19:27', '20:28', '1', '1', '17', '6', 'NH 5, Rani Bagh Qasimabad, Hyderabad, Sindh, Pakistan', '[{\"name\":\"Tooth bleaching\",\"description\":\"\"}]', '', '36086-Female_Doctor_Daughter_Mother_1296x728-header-1296x729.webp', '68458-2.png,56146-service_img.jpg', '24635-4496268-hd_1920_1080_25fps.mp4', 'fgdgfdg', '45', '0', '1', '1', '', '', '06-06-2024'),
(38, 'something service is here', '&lt;p&gt;something service is here something service is here something service is here&lt;/p&gt;', '5500', '', 'basic', '1', '2024-06-06', '2024-06-29', '12:00', '20:04', '1', '1', '17', '6', 'Abdul Wahab Arcade Clinic #3 1st Floor,opp:national saving center,Doctor line saddar hyderabad', '[{\"name\":\"we repair ac also\",\"description\":\"\"}]', 'shdgshgdhsagd shdgashgash', '46019-download.jpg', '95731-maxresdefault.jpg,87177-python-training-institute.webp', '', 'tags', '45', '1', '1', '1', '', '', '06-06-2024'),
(39, 'shadgsahgdsa', '&lt;p&gt;saduuasdysuadysaud stystdysadtas dysdtysatdyasdtysa saydtys dsfgdtf ydsftytf ytfytdsf ytfydtfydf ydstfydtf ydstfydsf ydstfydf hgxhchzxc ysdfytdf ytftdf xchxch&lt;/p&gt;', '5500', '', 'basic', '1', '2024-06-23', '2024-06-24', '21:38', '21:38', '1', '1', '17', '6', 'Shop No 11, Siddique Plaza, Latifabad Unit No. 8 Latifabad Unit 8 Latifabad, Hyderabad, Sindh 71800, Pakistan', '[{\"name\":\"Tooth bleaching\",\"description\":\"sadsadsad\"}]', 'asdasdsad', '32082-MainAfter.webp', '50899-images.jpg', '47848-4496268-hd_1920_1080_25fps.mp4', 'ytuytutyuyt,sfaasaff', '45', '0', '1', '1', '', '', '08-06-2024'),
(40, 'CT-SCAN', '&lt;p&gt;asjkkxcbsxjhq&lt;/p&gt;', '10000', '8000', 'basic', '1', '2024-06-07', '2024-06-15', '20:27', '22:27', '1', '1', '6', '18', 'hyderabad', '[{\"name\":\"CT-SCAN\",\"description\":\"JSXNJSXJN\"}]', 'sknxkqsxnaskxnqsk', '3651-head.jpg', '84617-big1.jpg,64962-big2.jpg,14904-pic3.jpg,46494-pic4.jpg', '32181-20240531_202136.mp4', 'ct-scan', '30', '16', '1', '1', '', '', '08-06-2024');

-- --------------------------------------------------------

--
-- Table structure for table `service_category`
--

CREATE TABLE `service_category` (
  `Id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `parentId` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  `image` varchar(1000) NOT NULL,
  `user` int(11) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service_category`
--

INSERT INTO `service_category` (`Id`, `name`, `parentId`, `description`, `image`, `user`, `date`) VALUES
(3, 'technology', '0', 'service_category no 2', '78876-component 138.webp', 1, '17-03-2024'),
(6, 'headphones', '0', 'this is headphone', '32816-cat-07.jpg', 1, '20-04-2024'),
(14, 'airpods', '0', 'this is airpod service_category', '95885-cat-09.jpg', 1, '20-04-2024'),
(16, 'saloons service', '0', 'there is first catgeory developed for service', '14571-gettyimages-1144173422-612x612.jpg', 1, '09-05-2024'),
(17, 'pool service', '0', 'there is pool service for our client', '33363-images.jpg', 1, '09-05-2024'),
(18, 'dental', '0', 'this is dental category', '', 1, '25-05-2024');

-- --------------------------------------------------------

--
-- Table structure for table `service_reviews`
--

CREATE TABLE `service_reviews` (
  `Id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `rating` varchar(50) NOT NULL,
  `review` longtext NOT NULL,
  `user_data` varchar(50) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `service_slot`
--

CREATE TABLE `service_slot` (
  `Id` int(11) NOT NULL,
  `slot_days` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`slot_days`)),
  `slot_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`slot_data`)),
  `service_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service_slot`
--

INSERT INTO `service_slot` (`Id`, `slot_days`, `slot_data`, `service_id`) VALUES
(1, '[\"tuesday\"]', '[{\"tuesday\":[{\"startTime\":\"11:30\",\"endTime\":\"17:30\",\"person\":\"10\"}]}]', '33'),
(2, '[\"saturday\",\"sunday\"]', '[{\"saturday\":[{\"startTime\":\"14:27\",\"endTime\":\"19:28\",\"person\":\"41\"}]},{\"sunday\":[{\"startTime\":\"23:27\",\"endTime\":\"17:12\",\"person\":\"34\"}]}]', '34'),
(3, '[\"saturday\"]', '[{\"saturday\":[{\"startTime\":\"23:45\",\"endTime\":\"21:44\",\"person\":\"41\"}]}]', '36'),
(4, '[\"saturday\"]', '[{\"saturday\":[{\"startTime\":\"22:55\",\"endTime\":\"22:56\",\"person\":\"41\"}]}]', '37'),
(5, '[\"saturday\"]', '[{\"saturday\":[{\"startTime\":\"12:08\",\"endTime\":\"23:08\",\"person\":\"3\"}]}]', '38'),
(6, '[\"saturday\"]', '[{\"saturday\":[{\"startTime\":\"12:33\",\"endTime\":\"23:32\",\"person\":\"41\"}]}]', '35'),
(8, '[\"saturday\"]', '[{\"saturday\":[{\"startTime\":\"20:45\",\"endTime\":\"21:45\",\"person\":\"41\"}]}]', '27'),
(9, '[\"saturday\",\"sunday\",\"monday\"]', '[{\"saturday\":[{\"startTime\":\"12:41\",\"endTime\":\"12:42\",\"person\":\"4\"},{\"startTime\":\"22:40\",\"endTime\":\"22:40\",\"person\":\"41\"},{\"startTime\":\"23:42\",\"endTime\":\"23:41\",\"person\":\"3\"},{\"startTime\":\"13:42\",\"endTime\":\"22:41\",\"person\":\"5\"}]},{\"sunday\":[{\"startTime\":\"19:39\",\"endTime\":\"21:41\",\"person\":\"5\"}]},{\"monday\":[{\"startTime\":\"22:41\",\"endTime\":\"20:41\",\"person\":\"6\"}]}]', '32'),
(10, '[\"saturday\",\"sunday\"]', '[{\"saturday\":[{\"startTime\":\"21:39\",\"endTime\":\"20:38\",\"person\":\"4\"}]},{\"sunday\":[{\"startTime\":\"20:38\",\"endTime\":\"20:38\",\"person\":\"5\"}]}]', '39'),
(11, '[\"saturday\",\"sunday\",\"monday\"]', '[{\"saturday\":[{\"startTime\":\"20:28\",\"endTime\":\"21:28\",\"person\":\"10\"}]},{\"sunday\":[{\"startTime\":\"20:28\",\"endTime\":\"21:28\",\"person\":\"10\"}]},{\"monday\":[{\"startTime\":\"21:28\",\"endTime\":\"22:28\",\"person\":\"10\"}]}]', '40');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `country code` varchar(255) NOT NULL,
  `zip_code` varchar(255) NOT NULL,
  `city` int(11) NOT NULL,
  `country` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `privacy_policy` varchar(100) NOT NULL,
  `promotions` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Id`, `name`, `surname`, `gender`, `dob`, `email`, `phone`, `country code`, `zip_code`, `city`, `country`, `password`, `privacy_policy`, `promotions`, `status`, `date`) VALUES
(1, 'anas', 'qureshi', 'male', '16-05-2003', 'in@gmail.com', '03133889331', '92', '71000', 1, 1, 'anas123@', '0', '0', '1', '14-03-2023'),
(2, 'anas', 'qureshi', 'male', '28-02-2024', 'incredibleinfo333@gmail.com', '031667262533', '92', '71000', 3, 1, '$2y$10$ghznA9D6M9I5saDnpO9CyekJLRLlnYUhuCP4CxaTufOaIoK5Ek0vG', '0', '0', '1', '14-03-2024'),
(3, 'muhammad anas', 'qureshi', 'male', '15-02-2012', 'qureshiuser123@gmail.com', '03113137431', '92', '71000', 1, 1, '$2y$10$l6n5Z2pX8WZFwAGdjhIP1Owe6JHiRbZdRhRdJmT6SZxfaq9ISnpvm', '0', '0', '1', '14-05-2024'),
(4, 'anas', 'qureshi', 'male', '13-05-2024', 'incredibleinfo333@gmail.com', '', '92', '71000', 1, 1, '$2y$10$KNkghkrtqM1f5n7gyyxRcuYKDj.hRlt3ObGnCs8U64DFkuhp5fbYm', '0', '0', '1', '20-05-2024'),
(5, 'fahad', 'rajput', 'male', '29-05-2024', 'ma5814294@gmail.com', '03133889331', '92', '71000', 1, 1, '$2y$10$HcKTl20VEB/Bhqe8GuwML.CJOFCuTbmPJzFwXt1pKggIcjysoz486', '1', '1', '1', '30-05-2024'),
(6, 'shawaiz', 'shah', 'male', '05-06-2024', 'shawaizshahsyed@gmail.com', '03423600767', '92', '73000', 1, 1, '$2y$10$xG/mHFQftJyn7mFSJITE4OcdiWK00D1w4dKfJNK.U0uRuMtkF4mdq', '1', '0', '1', '07-06-2024');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `Id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `cnic` varchar(255) NOT NULL,
  `business` varchar(255) NOT NULL,
  `business_url` varchar(1000) NOT NULL,
  `country_code` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `city` int(11) NOT NULL,
  `country` int(11) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `policy` varchar(50) NOT NULL,
  `promo` varchar(50) NOT NULL,
  `viewed` varchar(50) NOT NULL,
  `approved` varchar(50) NOT NULL,
  `token` varchar(50) NOT NULL,
  `token_expire` varchar(256) NOT NULL,
  `trash` varchar(50) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`Id`, `name`, `surname`, `email`, `phone`, `cnic`, `business`, `business_url`, `country_code`, `zipcode`, `address`, `city`, `country`, `password`, `policy`, `promo`, `viewed`, `approved`, `token`, `token_expire`, `trash`, `date`) VALUES
(1, 'M anas', 'qureshi', 'incredibleinfo333@gmail.com', '03133889331', '4130218233589', 'homiedecors', 'https://homiedecors.com', '92', '71000', 'gulshane-farid illahi phase 2 hyderabad,sindh,pakistan', 1, 1, '$2y$10$l6n5Z2pX8WZFwAGdjhIP1Owe6JHiRbZdRhRdJmT6SZxfaq9ISnpvm', '0', '0', '1', '1', '', '', '', '22-05-2024'),
(2, 'anas', 'qureshi', 'qureshiuser123@gmail.com', '03100089331', '41302900233589', 'homiedecors', 'https://homiedecors.com/', '92', '71000', 'gulshane-farid illahi phase 2 hyderabad,sindh,pakistan', 2, 1, '$2y$10$rAQxM06U.JXY/gVZAdb37ud5zsqO33zH44SIkvXrNYA5a2B9p4pIG', '0', '0', '0', '-1', '', '', '-1', '26-03-2024'),
(15, 'usman ', 'test', 'johnely4567@gmail.com', '3133907971', '4135895882365', 'tch diigtla', 'pixxelhouse', '92', '718000', 'main auto bhan road Near Akbar CNG station', 1, 1, '$2y$10$.ajBYKEt762yY.JRRQ6F3OqxXcebAtdr3ZoWnW1XYzDTVH2Tmgivy', '1', '0', '', '0', '', '', '', '07-06-2024'),
(16, 'shawaiz', 'shah', 'shawaizshahsyed@gmail.com', '03423600767', '4130468355955', 'syedzada', 'https://syedzada.com', '92', '73000', 'hyderabad sindh', 1, 1, '$2y$10$M.IdmN/wkBBmjITtZAb.xuhExgjWyAWtbDROcNfvYINzMRBz/D0l6', '1', '0', '', '0', '', '', '', '07-06-2024');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_attributes`
--
ALTER TABLE `product_attributes`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `product_variations`
--
ALTER TABLE `product_variations`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `service_category`
--
ALTER TABLE `service_category`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `service_reviews`
--
ALTER TABLE `service_reviews`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `service_slot`
--
ALTER TABLE `service_slot`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `country_key` (`country`),
  ADD KEY `city_key` (`city`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `v_city_key` (`city`),
  ADD KEY `v_country_key` (`country`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `area`
--
ALTER TABLE `area`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `product_attributes`
--
ALTER TABLE `product_attributes`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `product_reviews`
--
ALTER TABLE `product_reviews`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_variations`
--
ALTER TABLE `product_variations`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `service_category`
--
ALTER TABLE `service_category`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `service_reviews`
--
ALTER TABLE `service_reviews`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service_slot`
--
ALTER TABLE `service_slot`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `city_key` FOREIGN KEY (`city`) REFERENCES `city` (`Id`),
  ADD CONSTRAINT `country_key` FOREIGN KEY (`country`) REFERENCES `country` (`Id`);

--
-- Constraints for table `vendor`
--
ALTER TABLE `vendor`
  ADD CONSTRAINT `v_city_key` FOREIGN KEY (`city`) REFERENCES `city` (`Id`),
  ADD CONSTRAINT `v_country_key` FOREIGN KEY (`country`) REFERENCES `country` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
