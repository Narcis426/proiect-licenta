-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2025 at 02:25 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db`
--

-- --------------------------------------------------------

--
-- Table structure for table `carcase`
--

CREATE TABLE `carcase` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `pozitionare_sursa` varchar(255) NOT NULL,
  `lungime_video_gpu` varchar(255) NOT NULL,
  `panou_lateral_transparent` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carcase`
--

INSERT INTO `carcase` (`id`, `name`, `pozitionare_sursa`, `lungime_video_gpu`, `panou_lateral_transparent`) VALUES
(1, 'Carcasa AQIRYS Naos Pro, MiddleTower, Tempered glass, Negru', 'Jos', '300 mm (Max)', 'Da, plexiglass'),
(2, 'Carcasa MSI MAG FORGE M100A aRGB cu sursa inclusa MSI MAG 600DN 600W 80 PLUS Active PFC', 'Sus', '300 mm (Max)', 'Da, plexiglass');

-- --------------------------------------------------------

--
-- Table structure for table `dash_text`
--

CREATE TABLE `dash_text` (
  `Id` int(11) NOT NULL,
  `user_type_id` varchar(255) DEFAULT NULL,
  `content_text` varchar(255) DEFAULT NULL,
  `titlu` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `dash_text`
--

INSERT INTO `dash_text` (`Id`, `user_type_id`, `content_text`, `titlu`) VALUES
(1, '1', 'BIfsadfasfasfads!', 'Dash admin'),
(2, '2', 'BIne ai venit, utilizator de tip utilizator!', 'Dash utilzator');

-- --------------------------------------------------------

--
-- Table structure for table `drepturi`
--

CREATE TABLE `drepturi` (
  `Id` int(11) NOT NULL,
  `IdPage` int(11) NOT NULL,
  `IdUserType` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `drepturi`
--

INSERT INTO `drepturi` (`Id`, `IdPage`, `IdUserType`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 1),
(4, 3, 1),
(5, 4, 1),
(6, 5, 1),
(7, 6, 1),
(8, 7, 1),
(9, 8, 1),
(10, 9, 1),
(11, 10, 1),
(12, 11, 1),
(13, 12, 2),
(14, 13, 2),
(15, 14, 2),
(16, 15, 2),
(17, 16, 2),
(18, 17, 2),
(19, 18, 2),
(20, 19, 2);

-- --------------------------------------------------------

--
-- Table structure for table `memorii_ram`
--

CREATE TABLE `memorii_ram` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `capacitate` varchar(255) NOT NULL,
  `kit_dual_channel` varchar(255) NOT NULL,
  `latenta_cas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `memorii_ram`
--

INSERT INTO `memorii_ram` (`id`, `name`, `capacitate`, `kit_dual_channel`, `latenta_cas`) VALUES
(1, 'Kit Memorie Kingston FURY Beast 32GB 2x16GB DDR4 3200MHz CL16 Dual Channel kf432c16bbk2/32', '32 GB', '2x 16 GB', '16 CL'),
(2, 'Kit Memorie Corsair Vengeance 64GB 2x32GB DDR5 5600MHz CL40 2x32GB 1.25V Negru Dual Channel Kit CMK64GX5M2B5600C40', '64 GB', '2x 32 GB', '16 CL');

-- --------------------------------------------------------

--
-- Table structure for table `pagini`
--

CREATE TABLE `pagini` (
  `Id` int(11) NOT NULL,
  `nume_meniu` varchar(255) DEFAULT NULL,
  `pagina` varchar(255) DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `Meniu` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pagini`
--

INSERT INTO `pagini` (`Id`, `nume_meniu`, `pagina`, `parent_id`, `Meniu`) VALUES
(1, 'Acasa', 'home.php', 0, '0'),
(2, 'Produse', 'toateprodusele.php', 0, '1'),
(3, 'Utilizatori', 'useri.php', 0, '0'),
(4, 'Producatori', 'producatori.php', 0, '1'),
(5, 'Specificatii Produse', '', 0, '1'),
(6, 'Procesoare', 'toateprocesoarele.php', 5, '1'),
(7, 'Placi Video', 'toateplacivideo.php', 5, '1'),
(8, 'Memorii RAM', 'toatememoriiram.php', 5, '1'),
(9, 'Stocare', 'toatestocarea.php', 5, '1'),
(10, 'Surse', 'toatesursele.php', 5, '1'),
(11, 'Carcase', 'toatecarcasele.php', 5, '1'),
(12, 'Produse', '', 0, '1'),
(13, 'Procesoare', 'procesoare.php', 12, '1'),
(14, 'Placi Video', 'placivideo.php', 12, '1'),
(15, 'Memorii RAM', 'memorii_ram.php', 12, '1'),
(16, 'Stocare', 'stocare.php', 12, '1'),
(17, 'Surse', 'surse.php', 12, '1'),
(18, 'Carcase', 'carcase.php', 12, '1'),
(19, 'Periferice', 'periferice.php', 12, '1'),
(20, 'Procesor I9', 'i9.php', 0, '0'),
(21, 'Procesor AMD Ryzen 5 5600X', 'r55600x.php', 0, '0'),
(22, 'Placa video Sapphire Radeon', 'rx6700xt.php', 0, '0'),
(23, 'Placa video MSI GeForce', 'rtx3060.php', 0, '0'),
(24, 'Kit Memorie Kingston', 'ramkingston32gb.php', 0, '0'),
(25, 'Kit Memorie Corsair', 'ramcorsair.php', 0, '0'),
(26, 'SSD Samsung 980', 'ssd.php', 0, '0'),
(27, 'SSD Kingston NV2', 'ssdkingston.php', 0, '0'),
(28, 'SSD KingMax PQ3480', 'ssdkingmax.php', 0, '0'),
(29, 'SSD Samsung 870', 'ssdsamsung.php', 0, '0'),
(30, 'Sursa Modulara GIGABYTE', 'sursagigabyte.php', 0, '0'),
(31, 'Sursa AQIRYS Pulsar 80+', 'sursaaqirys.php', 0, '0'),
(32, 'Carcasa AQIRYS Naos Pro', 'carcasaaqirys.php', 0, '0'),
(33, 'Carcasa MSI MAG FORGE M100A', 'carcasamsi.php', 0, '0'),
(34, 'Monitor Gaming MSI G274F', 'monitormsi.php', 0, '0'),
(35, 'Mouse Gaming Logitech G502 HERO', 'mouselogitech.php', 0, '0'),
(36, 'Tastatura Gaming Corsair K55', 'tastaturacorsair.php', 0, '0'),
(37, 'Mousepad AQIRYS Eclipse Medium', 'mousepadaqirys.php', 0, '0'),
(38, 'Casti Gaming Wireless Logitech G733', 'castilogitech.php', 0, '0'),
(39, 'Camera web Logitech C922', 'cameraweb.php', 0, '0');

-- --------------------------------------------------------

--
-- Table structure for table `placi_video`
--

CREATE TABLE `placi_video` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `procesor_video` varchar(255) NOT NULL,
  `producator_chipset` varchar(255) NOT NULL,
  `capacitate_memorie` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `placi_video`
--

INSERT INTO `placi_video` (`id`, `name`, `procesor_video`, `producator_chipset`, `capacitate_memorie`) VALUES
(1, 'Placa video Sapphire Radeon RX 6700 XT PULSE 12GB GDDR6 192-bit 11306-02-20G', 'Radeon RX 6000', 'AMD', '12 GB'),
(2, 'Placa video MSI GeForce RTX 3060 VENTUS 3X OC 12GB GDDR6 192-bit', 'NVIDIA GeForce RTX 30', 'NVIDIA', '12 GB');

-- --------------------------------------------------------

--
-- Table structure for table `procesoare`
--

CREATE TABLE `procesoare` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `frecventa` varchar(255) NOT NULL,
  `memorie_maxima` varchar(255) NOT NULL,
  `suport` varchar(255) NOT NULL,
  `tip` varchar(255) NOT NULL,
  `tip_procesor` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `procesoare`
--

INSERT INTO `procesoare` (`id`, `name`, `frecventa`, `memorie_maxima`, `suport`, `tip`, `tip_procesor`) VALUES
(1, 'Procesor Intel Core i9-14900KF 3,2 GHz Raptor Lake Refresh Socket 1700 Box BX8071514900KF', 'DDR4 3200 MHzDDR5 5600 MHz', '192 GB', 'Dual Channel', 'DDR4DDR5', NULL),
(2, 'Procesor AMD Ryzen 5 5600X 3.7GHz Socket AM4 Box + Cooler Wraith Stealth 100-100000065BOX', 'DDR4 3200 MHzDDR5 5600 MHz', '128 GB', 'Dual Channel', 'DDR4DDR5', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `producatori`
--

CREATE TABLE `producatori` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `producatori`
--

INSERT INTO `producatori` (`id`, `name`) VALUES
(1, 'Samsung'),
(2, 'MSI'),
(3, 'Intel'),
(4, 'Kingston'),
(5, 'Gigabyte'),
(6, 'Logitech'),
(7, 'Corsair'),
(8, 'Aqirys'),
(9, 'Serioux'),
(10, 'AMD'),
(11, 'Kingmax');

-- --------------------------------------------------------

--
-- Table structure for table `produse`
--

CREATE TABLE `produse` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `pret` varchar(10) NOT NULL,
  `descriere` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produse`
--

INSERT INTO `produse` (`id`, `name`, `image_url`, `pret`, `descriere`) VALUES
(35, 'Placa video MSI GeForce RTX 3060 VENTUS 3X OC 12GB GDDR6 192-bit', 'uploads/665899bdf3c11_rtx3060.jpg', '1649', 'GeForce RTX ™ 3060 va permite sa preluati cele mai noi jocuri folosind puterea Ampere - arhitectura RTX a doua generatie a NVIDIA. Obtineti performante incredibile cu Core Tracing Cores si Tensor Cores imbunatatite, noi multiprocesoare de streaming si memorie G6 de mare viteza.'),
(36, 'Procesor Intel Core i9-14900KF 3,2 GHz Raptor Lake Refresh Socket 1700 Box BX8071514900KF', 'uploads/66589a0b84b98_i9.jpg', '2940', 'Procesor Intel® Core™ i9-14900KF, pana la 6.0 GHz turbo, 36MB, Socket LGA1700, fara video integrat.\r\nLeadership continuu in domeniul overclocking-ului: Procesoarele deblocate Intel Core de a 14-a generatie continua sa ofere o experienta de overclocking de neegalat pentru toata lumea - de la experti la incepatori. '),
(37, 'Carcasa MSI MAG FORGE M100A aRGB cu sursa inclusa MSI MAG 600DN 600W 80 PLUS Active PFC', 'uploads/66589a4b975de_carcasamsi.jpg', '389', 'Carcasa MSI MAG FORGE M100A Sursa 600W MAG 600DN'),
(38, 'Kit Memorie Kingston FURY Beast 32GB 2x16GB DDR4 3200MHz CL16 Dual Channel kf432c16bbk2/32', 'uploads/66589b2ec6ff4_ramkingston32gb.jpg', '379', 'Kingston FURY™ Beast DDR4 oferă un puternic plus de performantă pentru jocuri, editare video si redare cu viteze până la 3733MHz si capacităti ale kittului de 8GB–128GB. Dispune de overclocking automat Plug N Play la viteze de 2666 MHz 1 si este pregătit atât pentru Intel XMP, cât si pentru AMD Ryzen.'),
(39, 'SSD Samsung 870 QVO 2TB SATA-III 2.5 inch MZ-77Q2T0BW', 'uploads/66589b6f04632_ssdsamsung.jpg', '729', 'SSD Samsung 870 QVO 2TB SATA-III 2.5 inch MZ-77Q2T0BW'),
(40, 'Sursa Modulara GIGABYTE P850GM 850W 80+ Gold gp-p850gm', 'uploads/66589bd84ebea_sursagigabyte.jpg', '449', 'PROIECTARE COMPLET MODULARA\r\nCertificarea 80 Plus Gold asigura o eficienta de 90% la o incarcare de 50%'),
(41, 'Mouse Gaming Logitech G502 HERO High Performance 16000 DPI USB - EER2 910-005470', 'uploads/66589c02c8837_mouselogitech.jpg', '270', 'G502 HERO dispune de un senzor optic avansat pentru acuratete maximă de urmărire, iluminare RGB personalizată, profiluri de jocuri personalizate, de la 100 până la 16.000 DPI si greutăti repozitionabile.'),
(42, 'Tastatura Gaming Corsair K55 RGB PRO XT Negru CH-9226715-NA', 'uploads/66589c368779b_tastaturacorsair.jpg', '369', 'Experimentati un nivel de imersiune de neegalat atunci cand jucati jocuri integrate iCUE, deoarece iluminarea RGB reactioneaza dinamic la actiunile si evenimentele din joc in timp real.\r\nProtectia IP42 va protejeaza tastatura impotriva stropilor si a prafului, astfel incat jocul dvs. sa nu se opreasca niciodata.'),
(44, 'Mousepad AQIRYS Eclipse Medium (MD) aqrys_eclipsemd', 'uploads/66589c84c2c2e_mousepadaqirys.jpg', '99', 'Mousepad textil cu suprafata waterproof din microfibra.\r\nIluminare controlata direct (buton plasat pe mousepad) sau prin driver AQIRYS'),
(45, 'Casti Gaming Wireless Logitech G733 LightSpeed RGB USB Black 981-000864', 'uploads/66589cd7a565c_castilogitech.jpg', '599', 'G733 este wireless si este conceput pentru confort. Este echipat cu sunet surround, filtrele vocale si iluminatul avansat de care aveti nevoie pentru a arata, a asculta si a va juca cu mai mult stil ca niciodata'),
(46, 'Monitor Gaming MSI G274F 27\'\' Full HD IPS 1ms 180Hz HDR, FreeSync G-SYNC compatible, DisplayPort, HDMI', 'uploads/66589d07747ec_monitormsi.jpg', '824', 'Echipat cu o rată de reîmprospătare de 1920 x 1080, 180 Hz, timp de răspuns GtG de 1 ms, panou IPS rapid, G274F vă va oferi avantajul competitiv de care aveti nevoie pentru a vă învinge adversarii. Bucurati-vă de un joc extrem de fluid, fără rupere, cu tehnologia NVIDIA G-SYNC compatibilă (atunci când este asociat cu o placă grafică NVIDIA compatibilă).'),
(47, 'Boxe Serioux SoundBoost HT5100C 5.1 140W', 'uploads/66589d30259c7_boxe.jpg', '324', 'Daca faci parte dintre cei care iubesc sa fie inconjurati de un sunet natural, cat mai aproape de realitate, atunci boxele Serioux SoundBoost 5100C sunt pentru tine. \r\nCu o putere totala de 140W, cele 5 boxe vor reda cu fidelitate muzica, dar mai ales sunetul din jocurile si filmele tale preferate.'),
(48, 'Camera web Logitech C922 Full HD Pro Stream HD 960-001088', 'uploads/66589d5cd1a2a_cameraweb.jpg', '469', 'FULL HD 1080P @ 30FPS / 720P @ 60FPS STREAMING.\r\nConceputa pentru a satisface nevoile streamerilor, C922 Pro Stream Webcam permite o redare si inregistrare video plina de viata, la o calitate de 1080p HD, 30 de cadre pe secunda (fps) sau 720p la 60fps, cu integrare H.264.'),
(49, 'Procesor AMD Ryzen 5 5600X 3.7GHz Socket AM4 Box + Cooler Wraith Stealth 100-100000065BOX', 'uploads/66589d8c5ffad_r5.jpg', '699', 'O modalitate rapidă si usoară de a extinde si accelera stocarea pe un computer desktop cu un procesor AMD Ryzen.\r\nUtilitarul simplu si puternic de overclocking pentru procesoarele AMD Ryzen'),
(50, 'Placa video Sapphire Radeon RX 6700 XT PULSE 12GB GDDR6 192-bit 11306-02-20G', 'uploads/66589dda5678c_rx6700xt.jpg', '1749', 'Placile grafice din seria AMD Radeon ™ RX 6700 ofera frame rates ultra-ridicate si un joc 2K serios. Obtineti experienta de gaming finala cu noi unitati de calcul puternice, revolutionare AMD Infinity Cache si pana la 16 GB de memorie GDDR6 dedicata. '),
(51, 'Kit Memorie Corsair Vengeance 64GB 2x32GB DDR5 5600MHz CL40 2x32GB 1.25V Negru Dual Channel Kit CMK64GX5M2B5600C40', 'uploads/66589e0880eba_ramcorsair.jpg', '1079', 'În era cu mai multe nuclee, viteza de procesare fără precedent a DDR5 asigură că procesorul dvs. de ultimă generatie primeste date rapid si cu usurintă. Indiferent dacă joci, creezi continut, deschizi 100 de file sau faci mai multe sarcini, computerul tău poate îndeplini sarcini complexe mai rapid decât oricând.'),
(52, 'SSD Kingston NV2 1TB PCI Express 4.0 x4 M.2 NVMe 2280 snv2s/1000g', 'uploads/66589e53e3f84_ssdkingston.jpg', '309', 'SSD NV2 PCIe 4.0 NVMe de la Kingston este o solutie de stocare substantiala de ultima generatie, alimentata de un controler NVMe Gen 4x4. NV2 ofera viteze de citire/scriere de pana la 3.500/2.800 MB/s, cu cerinte energetice si caldura mai mici, pentru a ajuta la optimizarea performantei sistemului dvs. si pentru a oferi valoare fara sacrificii.'),
(53, 'SSD KingMax PQ3480 1TB PCI Express 3.0 x4 M.2 NVMe 2280', 'uploads/66589e775e741_ssdkingmax.jpg', '299', 'SSD KingMax PQ3480 1TB PCI Express 3.0 x4 M.2 2280'),
(54, 'Sursa AQIRYS Pulsar 80+ 650W ARGB', 'uploads/66589eb548366_sursaaqirys.jpg', '299', 'Inspirati de unii dintre cei mai fascinanti membri ai comunitătii cosmice, vă prezentăm prima noastră sursă de energie pentru universul dvs. de gaming, seria PULSAR de înaltă performantă destinată alimentarii sistemelor de gaming.\r\nSeria PULSAR oferă eficientă certificată 80 PLUS si 80 PLUS Bronze* si o fiabilitate electrică remarcabilă sustinută de garantia noastră de 6 ani disponibilă pe toate modelele (750W*, 650W, 550W, 450W).'),
(55, 'Carcasa AQIRYS Naos Pro, MiddleTower, Tempered glass, Negru', 'uploads/66589ee7e34ce_carcasaaqirys.jpg', '439', 'Carcasa AQIRYS Naos Pro, MiddleTower, Tempered glass, Negru');

-- --------------------------------------------------------

--
-- Table structure for table `stocare`
--

CREATE TABLE `stocare` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `interfata` varchar(255) NOT NULL,
  `dimensiuni` varchar(255) NOT NULL,
  `viteza_de_transfer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stocare`
--

INSERT INTO `stocare` (`id`, `name`, `interfata`, `dimensiuni`, `viteza_de_transfer`) VALUES
(1, 'SSD Samsung 980 PRO 1TB PCI Express 4.0 x4 M.2 2280 mz-v8p1t0bw', 'PCI Express 4.0 x4', '80.15 x 2.38 x 22.15 mm', '5100'),
(2, 'SSD Kingston NV2 1TB PCI Express 4.0 x4 M.2 NVMe 2280 snv2s/1000g', 'PCI Express 4.0 x4', '80.15 x 2.38 x 22.15 mm', '5000'),
(3, 'SSD KingMax PQ3480 1TB PCI Express 3.0 x4 M.2 NVMe 2280', 'PCI Express 3.0 x4', '80.15 x 2.38 x 22.15 mm', '5200'),
(4, 'SSD Samsung 870 QVO 2TB SATA-III 2.5 inch MZ-77Q2T0BW', 'PCI Express 3.0 x4', '100 x 69.85 x 6.8 mm', '5600');

-- --------------------------------------------------------

--
-- Table structure for table `surse`
--

CREATE TABLE `surse` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `putere_sursa` varchar(255) NOT NULL,
  `sistem_de_racire` varchar(255) NOT NULL,
  `certificare` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `surse`
--

INSERT INTO `surse` (`id`, `name`, `putere_sursa`, `sistem_de_racire`, `certificare`) VALUES
(1, 'Sursa Modulara GIGABYTE P850GM 850W 80+ Gold gp-p850gm', '850 W', '1x 120 mm', '80+ Bronze'),
(2, 'Sursa AQIRYS Pulsar 80+ 650W ARGB', '650 W', '1x 120 mm', '80+ Gold');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Id` int(11) NOT NULL,
  `nume` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `nume`, `username`, `password`, `type`) VALUES
(1, 'admin', 'admin', '111', '1'),
(2, 'user', 'user', 'user', '2');

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE `user_types` (
  `Id` int(11) NOT NULL,
  `desc` varchar(255) DEFAULT NULL,
  `redirect` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`Id`, `desc`, `redirect`) VALUES
(1, 'admin', 'home.php'),
(2, 'user', 'home.php');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carcase`
--
ALTER TABLE `carcase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dash_text`
--
ALTER TABLE `dash_text`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `drepturi`
--
ALTER TABLE `drepturi`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `fk_drepturi_pagini` (`IdPage`),
  ADD KEY `fk_drepturi_user_types` (`IdUserType`);

--
-- Indexes for table `memorii_ram`
--
ALTER TABLE `memorii_ram`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pagini`
--
ALTER TABLE `pagini`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `placi_video`
--
ALTER TABLE `placi_video`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `procesoare`
--
ALTER TABLE `procesoare`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `producatori`
--
ALTER TABLE `producatori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produse`
--
ALTER TABLE `produse`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stocare`
--
ALTER TABLE `stocare`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surse`
--
ALTER TABLE `surse`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carcase`
--
ALTER TABLE `carcase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `dash_text`
--
ALTER TABLE `dash_text`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `drepturi`
--
ALTER TABLE `drepturi`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `memorii_ram`
--
ALTER TABLE `memorii_ram`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pagini`
--
ALTER TABLE `pagini`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `placi_video`
--
ALTER TABLE `placi_video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `procesoare`
--
ALTER TABLE `procesoare`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `producatori`
--
ALTER TABLE `producatori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `produse`
--
ALTER TABLE `produse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `stocare`
--
ALTER TABLE `stocare`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `surse`
--
ALTER TABLE `surse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_types`
--
ALTER TABLE `user_types`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `drepturi`
--
ALTER TABLE `drepturi`
  ADD CONSTRAINT `fk_drepturi_pagini` FOREIGN KEY (`IdPage`) REFERENCES `pagini` (`Id`),
  ADD CONSTRAINT `fk_drepturi_user_types` FOREIGN KEY (`IdUserType`) REFERENCES `user_types` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
