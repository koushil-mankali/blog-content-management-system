-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2020 at 07:25 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blogcms`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(70) COLLATE utf8_bin NOT NULL,
  `category_posts` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_posts`) VALUES
(1, 'Mobiles', 4),
(2, 'Tech', 2);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `post_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `post_desc` varchar(5000) COLLATE utf8_bin NOT NULL,
  `category` int(11) NOT NULL,
  `author` int(100) NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `post_img` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_name`, `post_desc`, `category`, `author`, `post_date`, `post_img`) VALUES
(1, 'Nokia Smartphone Released!!', 'Nokia used to be one of the world\\\'s biggest mobile phone manufacturers but it fell behind with the advent of iPhone and Android smartphones. In 2014, Nokia\\\'s Devices and Services division was sold to Microsoft. In 2016, Finnish company HMD Global bought a part of Microsoft\\\'s feature phone business and has a licensing agreement that allows it to make smartphones under the Nokia brand. Nokia\\\'s latest mobile launch is the C2 Tennen. The smartphone was launched in 29th May 2020. The phone comes with a 5.45-inch touchscreen display\\r\\n\\r\\nIt comes with 2GB of RAM. The phone packs 32GB of internal storage that can be expanded up to 128GB via a microSD card. As far as the cameras are concerned, the Nokia C2 Tennen packs a 8-megapixel + 2-megapixel primary camera on the rear and a 5-megapixel front shooter for selfies.\\r\\n\\r\\nThe Nokia C2 Tennen runs Android 10 and is powered by a 3000mAh.\\r\\n\\r\\nConnectivity options include Wi-Fi and Bluetooth. Sensors on the phone include Face unlock.\\r\\n\\r\\nNokia used to be one of the world\\\'s biggest mobile phone manufacturers but it fell behind with the advent of iPhone and Android smartphones. In 2014, Nokia\\\'s Devices and Services division was sold to Microsoft. In 2016, Finnish company HMD Global bought a part of Microsoft\\\'s feature phone business and has a licensing agreement that allows it to make smartphones under the Nokia brand. Nokia\\\'s latest mobile launch is the C2 Tennen. The smartphone was launched in 29th May 2020. The phone comes with a 5.45-inch touchscreen display\\r\\n\\r\\nIt comes with 2GB of RAM. The phone packs 32GB of internal storage that can be expanded up to 128GB via a microSD card. As far as the cameras are concerned, the Nokia C2 Tennen packs a 8-megapixel + 2-megapixel primary camera on the rear and a 5-megapixel front shooter for selfies.\\r\\n\\r\\nThe Nokia C2 Tennen runs Android 10 and is powered by a 3000mAh.\\r\\n\\r\\nConnectivity options include Wi-Fi and Bluetooth. Sensors on the phone include Face unlock.', 1, 1, '2020-07-13 16:07:32', '5f0c86c41fcd1nokia.png'),
(2, 'Samsung Galaxy Note', 'Samsung is going to launch Galaxy A51 in India today. The smartphone has already made its debut in Vietnam along with Galaxy A71. The company has teased the Galaxy A51\\\'s launch on Twitter, confirming that the smartphone will feature a quad-camera setup at the back.\\r\\n\\r\\nThe short video on Twitter also confirmed that it will sport a rectangular camera module just like its recently launched Galaxy S10 Lite and Galaxy Note 10 Lite.\\r\\n\\r\\nSamsung Galaxy A51 specifications\\r\\nAs per the Vietnam version, Samsung Galaxy A51 features a  6.5-inch full-HD+ Super AMOLED  Infinity-O display with a resolution of 1,080 x 2,400 pixels. It also has an in-display fingerprint sensor. The smartphone is powered by an Octa-core chipset. In terms of storage, the smartphone offers up to 8 GB RAM and 128 GB storage that can be expandable up to 512 GB via Micro SD card.\\r\\n\\r\\nIn the camera department, the smartphone sports a 32 MP selfie shooter. On the back, the quad-camera setup includes a 48 MP primary sensor, 12 MP secondary sensor, one 5 MP macro lens and a 5 MP depth sensor.\\r\\n\\r\\nGalaxy A51 is equipped with a 4,000 mAh battery that supports 15W fast charge tech. For connectivity, you will get USB Type-C port,  4G LTE, Wi-Fi and Bluetooth. The phone comes in Prism Crush Black, White, Blue, and Pink colour variants.', 1, 1, '2020-07-13 16:08:56', '5f0c8718512dasamsung.jpeg'),
(3, 'Global Warming !!!', 'Global warming is the ongoing rise of the average temperature of the Earth\\\'s climate system.[1] It is a major aspect of climate change which, in addition to rising global surface temperatures,[2] also includes its effects, such as changes in precipitation.[3] While there have been prehistoric periods of global warming, observed changes since the mid-20th century have been unprecedented in rate and scale.[4]\\r\\n\\r\\n\\r\\nObserved temperature from NASA[5] vs the 1850–1900 average as a pre-industrial baseline. The primary driver for increased global temperatures in the industrial era is human activity, with natural forces adding variability.[6]\\r\\nThe Intergovernmental Panel on Climate Change (IPCC) concluded that \\\"human influence on climate has been the dominant cause of observed warming since the mid-20th century\\\". These findings have been recognized by the national science academies of major nations and are not disputed by any scientific body of national or international standing.[7] The largest human influence has been the emission of greenhouse gases, with over 90% of the impact from carbon dioxide and methane.[8] Fossil fuel burning is the principal source of these gases, with agricultural emissions and deforestation also playing significant roles. Climate sensitivity to these gases is affected by feedbacks, such as loss of snow cover, increased water vapour, and melting permafrost.\\r\\n\\r\\nLand surfaces are heating faster than the ocean surface, leading to heat waves, wildfires, and the expansion of deserts.[9] Increasing atmospheric energy and rates of evaporation are causing more intense storms and weather extremes, damaging infrastructure and agriculture.[10] Surface temperature increases are greatest in the Arctic and have contributed to the retreat of glaciers, permafrost, and sea ice. Environmental impacts include the extinction or relocation of many species as their ecosystems change, most immediately in coral reefs, mountains, and the Arctic. Surface temperatures would stabilize and decline a little if emissions were cut off, but other impacts will continue for centuries, including rising sea levels from melting ice sheets, rising ocean temperatures, and ocean acidification from elevated levels of carbon dioxide.[11]\\r\\n\\r\\nSome effects of climate change\\r\\n\\r\\nEcological collapse possibilities. Bleaching has damaged the Great Barrier Reef and threatens reefs worldwide.\\r\\n\\r\\n\\r\\nMitigation efforts to address global warming include the development and deployment of low carbon energy technologies, policies to reduce fossil fuel emissions, reforestation, forest preservation, as well as the development of potential climate engineering technologies. Societies and governments are also working to adapt to current and future global warming impacts, including ...', 2, 1, '2020-07-13 16:10:55', '5f0c878faef9dearth.jpg'),
(4, 'New Redmi Smartphone ', 'Xiaomi Mi Note 10 smartphone was launched on 6th November 2019. The phone comes with a 6.47-inch touchscreen display with a resolution of 1080x2340 pixels. Xiaomi Mi Note 10 is powered by a 2.2GHz octa-core Qualcomm Snapdragon 730G processor. It comes with 6GB of RAM. The Xiaomi Mi Note 10 runs Android 9 and is powered by a 5260mAh non-removable battery. The Xiaomi Mi Note 10 supports proprietary fast charging.\\r\\n\\r\\nAs far as the cameras are concerned, the Xiaomi Mi Note 10 on the rear packs a 108-megapixel primary camera with an f/1.69 aperture; a second 20-megapixel camera; a third 12-megapixel camera and a fourth 5-megapixel camera. The rear camera setup has autofocus. It sports a 32-megapixel camera on the front for selfies.\\r\\n\\r\\nThe Xiaomi Mi Note 10 runs MIUI 11 based on Android 9 and packs 128GB of inbuilt storage. The Xiaomi Mi Note 10 is a dual-SIM smartphone that accepts Nano-SIM and Nano-SIM cards. It was launched in Glacier White, Aurora Green, and Midnight Black colours.\\r\\n\\r\\nConnectivity options on the Xiaomi Mi Note 10 include Wi-Fi 802.11 a/b/g/n, GPS, Bluetooth v5.00, NFC, Infrared, USB Type-C, FM radio, 3G, and 4G with active 4G on both SIM cards. Sensors on the phone include accelerometer, ambient light sensor, compass/ magnet...', 1, 1, '2020-07-13 16:12:27', '5f0c87ebf0f7fredmi.jpg'),
(5, 'Nokia 3310 old Mobiles', 'The iconic Nokia 3310 feature phone has been reborn after 17 years and it\\\'s clear that HMD Global is selling the Nokia 3310 (2017) largely for the sake of nostalgia. It has the classic Nokia ringtone, the physical buttons, the tiny body, solid build quality, and even a Snake game. It\\\'s available in vibrant colours and weighs just 80g. It takes its design cues from the original but the screen is now a full-colour 2.4-inch QVGA (240x320-pixel) panel. There\\\'s a 2-megapixel camera on the back now and a 3.5mm audio socket on the bottom. The new Nokia 3310 features dual Micro-SIM slots and support for up to 32GB microSD cards. There\\\'s 16MB of internal storage, but only about 1.5MB is free, so you\\\'ll need a microSD card to store photos or songs.The UI is easy to understand. However, the new Nokia 3310 is much more expensive than similar Nokia feature phones with comparable features.\\r\\nThe iconic Nokia 3310 feature phone has been reborn after 17 years and it\\\'s clear that HMD Global is selling the Nokia 3310 (2017) largely for the sake of nostalgia. It has the classic Nokia ringtone, the physical buttons, the tiny body, solid build quality, and even a Snake game. It\\\'s available in vibrant colours and weighs just 80g. It takes its design cues from the original but the screen is now a full-colour 2.4-inch QVGA (240x320-pixel) panel. There\\\'s a 2-megapixel camera on the back now and a 3.5mm audio socket on the bottom. The new Nokia 3310 features dual Micro-SIM slots and support for up to 32GB microSD cards. There\\\'s 16MB of internal storage, but only about 1.5MB is free, so you\\\'ll need a microSD card to store photos or songs.The UI is easy to understand. However, the new Nokia 3310 is much more expensive than similar Nokia feature phones with comparable features.\\r\\nThe iconic Nokia 3310 feature phone has been reborn after 17 years and it\\\'s clear that HMD Global is selling the Nokia 3310 (2017) largely for the sake of nostalgia. It has the classic Nokia ringtone, the physical buttons, the tiny body, solid build quality, and even a Snake game. It\\\'s available in vibrant colours and weighs just 80g. It takes its design cues from the original but the screen is now a full-colour 2.4-inch QVGA (240x320-pixel) panel. There\\\'s a 2-megapixel camera on the back now and a 3.5mm audio socket on the bottom. The new Nokia 3310 features dual Micro-SIM slots and support for up to 32GB microSD cards. There\\\'s 16MB of internal storage, but only about 1.5MB is free, so you\\\'ll need a microSD card to store photos or songs.The UI is easy to understand. However, the new Nokia 3310 is much more expensive than similar Nokia feature phones with comparable features.', 1, 1, '2020-07-13 16:13:31', '5f0c882bd4fc7nokiaa.jpg'),
(6, 'Latest Technology News', 'Technology (\\\"science of craft\\\", from Greek τέχνη, techne, \\\"art, skill, cunning of hand\\\"; and -λογία, -logia[2]) is the sum of techniques, skills, methods, and processes used in the production of goods or services or in the accomplishment of objectives, such as scientific investigation. Technology can be the knowledge of techniques, processes, and the like, or it can be embedded in machines to allow for operation without detailed knowledge of their workings. Systems (e.g. machines) applying technology by taking an input, changing it according to the system\\\'s use, and then producing an outcome are referred to as technology systems or technological systems.\\r\\n\\r\\nThe simplest form of technology is the development and use of basic tools. The prehistoric discovery of how to control fire and the later Neolithic Revolution increased the available sources of food, and the invention of the wheel helped humans to travel in and control their environment. Developments in historic times, including the printing press, the telephone, and the Internet, have lessened physical barriers to communication and allowed humans to interact freely on a global scale.\\r\\n\\r\\nTechnology has many effects. It has helped develop more advanced economies (including today\\\'s global economy) and has allowed the rise of a leisure class. Many technological processes produce unwanted by-products known as pollution and deplete natural resources to the detriment of Earth\\\'s environment. Innovations have always influenced the values of a society and raised new questions in the ethics of technology. Examples include the rise of the notion of efficiency in terms of human productivity, and the challenges of bioethics.\\r\\n\\r\\nPhilosophical debates have arisen over the use of technology, with disagreements over whether technology improves the human condition or worsens it. Neo-Luddism, anarcho-primitivism, and similar reactionary movements criticize the pervasiveness of technology, arguing that it harms the environment and alienates people; proponents of ideologies such as transhumanism and techno-progressivism view continued technological progress as beneficial to society and the human condition.', 2, 1, '2020-07-13 16:14:14', '5f0c8856e2929technology.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `uname` varchar(70) COLLATE utf8_bin NOT NULL,
  `upass` varchar(70) COLLATE utf8_bin NOT NULL,
  `urole` int(11) NOT NULL,
  `u_posts` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uname`, `upass`, `urole`, `u_posts`) VALUES
(1, 'koushil', '$2y$10$V8GfkzvwryTg0qfFbsz0B..s/KowlETTHjKvBNLP11nRfhejVUVoK', 0, 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
