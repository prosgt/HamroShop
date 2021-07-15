-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2019 at 08:20 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emall`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `uid`, `pid`, `quantity`, `status`) VALUES
(19, 7, 37, 8, 0);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`, `description`) VALUES
(7, 'Electronics', 'Electronics item'),
(8, 'Health and Beauty', 'Health nd beauti releted'),
(9, 'Sports', 'sport'),
(10, 'Fashion', '');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `category` int(11) DEFAULT NULL,
  `productname` varchar(100) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `image` varchar(1000) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `seller` int(11) DEFAULT NULL,
  `addeddate` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `category`, `productname`, `description`, `image`, `number`, `price`, `discount`, `seller`, `addeddate`) VALUES
(35, 7, 'Huawei Y9 Prime [ 4 GB RAM, 128 GB ROM ] 6.59 Display with Motorized Pop-up Camera', 'Brand: Huawei Model: Y9 Prime Network Technology: GSM / HSPA / LTE SIM Type: Dual NANO SIM Body Dimension: 163.5 x 77.3 x 8.8 mm (6.44 x 3.04 x 0.35 in) Weight: 196.8 g (6.95 oz) Display: 6.59 inches,LTPS IPS LCD capacitive touchscreen, 1080 x 2340 pixels, 19.5:9 ratio (~391 ppi density) OS: Android 9.0 (Pie); EMUI 9 Chipset: Hisilicon Kirin 710F (12 nm) CPU: Octa-core (4x2.2 GHz Cortex-A73 & 4x1.7 GHz Cortex-A53) GPU: Mali-G51 MP4 RAM: 4 GB Storage: 128 GB, expandable up to 512 GB (uses SIM 2 slot) Front Camera: Motorized pop-up 16 MP, f/2.0 Rear camera: &#34;16 MP, f/1.8, (wide), PDAF8 MP (ultrawide)2 MP, f/2.4, depth sensor LED flash, HDR, panorama&#34; Video: 1080p@30fps Sound: Active noise cancellation with dedicated mic Connectivity: Wi-Fi 802.11 a/b/g/n/ac, dual-band, Wi-Fi Direct, hotspot, Bluetooth 5.0, A2DP, LE, Type-C 1.0 reversible connector Sensors: Fingerprint (rear-mounted), accelerometer, gyro, proximity, compass Battery: Non-removable Li-Po 4000 mAh battery', 'assest/upload/image/480ce6ee47138e94859bddd042cef228.jpg_340x340q80.jpg_.webp', 17, 30000, 5, NULL, '2019-11-24 05:07:24'),
(36, 7, 'Transcend MTS 820 M.2 6Gbps 120GB Store Internal SSD', 'Space-saving M.2 SATA form factor (80mm) for ultra-compact computing devices 3D NAND flash chips SATA III 6Gb/s interface and SLC caching technology for exceptional transfer speeds Engineered with a RAID engine and LDPC (Low-Density Parity Check) coding to ensure data integrity Supports Device Sleep Mode (DevSleep) to prolong notebook battery life by intelligently shutting down SATA interface when not in use Supports S.M.A.R.T., TRIM and NCQ commands', 'assest/upload/image/37c5c3bd4f446aa90ff6b50ae6811af6.jpg', 30, 5000, 3, NULL, '2019-11-24 05:09:17'),
(37, 8, 'Fair & Lovely Advanced Multivitamin Cream - 25g', 'Fair and Lovely presents you with this Advanced Multivitamin Fairness Expert. This supplement targets the five main fairness treatments. It has laser-like precision on skin marks and scar. The face polish targeting on tans, skin peeling effect on skin dullness and advanced lightening treatment in dark circles. It is an herbal vitamin composition that utilizes the healing and revitalizing properties of herbs to lighten unnatural blemishes and dark spots. However, its lightening effect is enhanced with the addition of melatonin, the pigment responsible for skin coloration, balancing herbs that act directly to inhibit darkening and taning of the skin. This product contains no bleach or harmful ingredients. This brand is known to empower a woman to change her destiny. Feel confident, beautiful and charming with the help of this innovative and all natural product. Take these supplements daily in order to fulfil your dream of having a perfect, flawless complexion.', 'assest/upload/image/b25bf48c44b82a8f5d08472af09dd873.jpg_340x340q80.jpg_.webp', 290, 100, 20, NULL, '2019-11-24 05:12:39'),
(38, 7, 'Samsung UA43N5300 43 inch Full HD LED Smart TV: Buy Online at Best Prices in Nepal |', 'DisplayScreen Size:43&#34; Resolution1,920 x 1,080 VideoPicture Engine:Hyper Real PQI (Picture Quality Index):500 HDR (High Dynamic Range):Yes Contrast:Mega Contrast Color:PurColor Contrast Enhancer:Yes Film Mode:Yes AudioDolby Digital Plus:Yes Sound Output (RMS):40W Speaker Type:4CH Multiroom Link:Yes Blutooth Audio:Yes Smart ServiceSmartThings App Support:Yes ConvergenceMobile to TV - Mirroring, DLNA:Yes Bluetooth Low Energy:Yes WiFi Direct:Yes TV Sound to Mobile:Yes Sound Mirroring:Yes DifferentiationAnalog Clean View:Yes Triple Protection:Yes Tuner/BroadcastingDigital Broadcasting:Ready Analog Tuner:Yes ConnectivityHDMI:2 USB:1 Component In (Y/Pb/Pr):1 Composite In (AV):1 (Common Use for Component Y) Digital Audio Out (Optical):1 RF In (Terrestrial / Cable input):1/0/0 HDMI A / Return Ch. Support:Yes DesignDesign:Slim Edge Mold Bezel Type:VNB Slim Type:Semi Slim Front Color:Black Hairline Stand Type:Mini Arc Additional FeatureProcessor:Quad-Core Accessibility:Voice guide/Enlarge/Hi', 'assest/upload/image/19b4a3ae4c226a63c2a8d9a6970b2cad.jpg', 15, 90000, 12, NULL, '2019-11-24 05:14:04'),
(39, 7, 'Samsung UA43N5300 43 inch Full HD LED Smart TV: Buy Online at Best Prices in Nepal |', 'DisplayScreen Size:43&#34; Resolution1,920 x 1,080 VideoPicture Engine:Hyper Real PQI (Picture Quality Index):500 HDR (High Dynamic Range):Yes Contrast:Mega Contrast Color:PurColor Contrast Enhancer:Yes Film Mode:Yes AudioDolby Digital Plus:Yes Sound Output (RMS):40W Speaker Type:4CH Multiroom Link:Yes Blutooth Audio:Yes Smart ServiceSmartThings App Support:Yes ConvergenceMobile to TV - Mirroring, DLNA:Yes Bluetooth Low Energy:Yes WiFi Direct:Yes TV Sound to Mobile:Yes Sound Mirroring:Yes DifferentiationAnalog Clean View:Yes Triple Protection:Yes Tuner/BroadcastingDigital Broadcasting:Ready Analog Tuner:Yes ConnectivityHDMI:2 USB:1 Component In (Y/Pb/Pr):1 Composite In (AV):1 (Common Use for Component Y) Digital Audio Out (Optical):1 RF In (Terrestrial / Cable input):1/0/0 HDMI A / Return Ch. Support:Yes DesignDesign:Slim Edge Mold Bezel Type:VNB Slim Type:Semi Slim Front Color:Black Hairline Stand Type:Mini Arc Additional FeatureProcessor:Quad-Core Accessibility:Voice guide/Enlarge/Hi', 'assest/upload/image/19b4a3ae4c226a63c2a8d9a6970b2cad.jpg', 15, 90000, 12, NULL, '2019-11-24 05:14:09');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `uid`, `pid`, `qty`, `amount`, `status`, `date`) VALUES
(11, 6, 37, 2, 180, 1, '2019-11-24 05:36:35'),
(12, 7, 35, 3, 85500, 1, '2019-11-24 05:44:32'),
(13, 7, 37, 8, 640, 0, '2019-11-24 07:06:50');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `createdate` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `email`, `password`, `address`, `image`, `type`, `createdate`) VALUES
(4, 'saugat', 'Ghimire', 'saugat@gmail.com', 'p@$$word1', 'Jhapa', ' ', 2, NULL),
(6, 'Suman', 'Poudel', 's@s.c', 'p@$$word1', 'Birtamode', ' ', 1, '2019-11-24'),
(7, 'Narayan', 'Rajbanshi', 'narayan@gmail.com', 'p@$$w0rd1', 'Jhapa', ' ', 1, '2019-11-24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
