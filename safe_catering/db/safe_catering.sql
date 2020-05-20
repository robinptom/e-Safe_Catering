-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 11, 2020 at 06:06 AM
-- Server version: 10.0.38-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `safe_catering`
--

-- --------------------------------------------------------

--
-- Table structure for table `alert`
--

CREATE TABLE `alert` (
  `alert_id` int(11) NOT NULL,
  `alert_no_entry_type` datetime NOT NULL,
  `alert_user_id` int(11) NOT NULL,
  `alert_form_type` varchar(50) NOT NULL,
  `alert_date` datetime NOT NULL,
  `alert_created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `log_id` int(11) NOT NULL,
  `log_user_id` int(11) NOT NULL,
  `log_user_role` int(11) NOT NULL,
  `log_date` date NOT NULL,
  `log_time` time NOT NULL,
  `logged_in_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`log_id`, `log_user_id`, `log_user_role`, `log_date`, `log_time`, `logged_in_status`) VALUES
(1, 1, 1, '2020-05-11', '09:58:10', 0),
(2, 1, 1, '2020-05-11', '09:58:10', 0),
(3, 1, 1, '2020-05-11', '09:58:10', 0),
(4, 1, 1, '2020-05-11', '09:58:10', 0),
(5, 1, 1, '2020-05-11', '09:58:10', 0),
(6, 21, 2, '0000-00-00', '09:46:51', 0),
(7, 21, 2, '2020-05-04', '09:46:58', 1),
(8, 1, 1, '2020-05-11', '09:58:10', 0),
(9, 22, 2, '2020-05-04', '11:38:56', 0),
(10, 22, 2, '2020-05-04', '11:38:56', 0),
(11, 23, 2, '2020-05-04', '13:32:49', 0),
(12, 23, 2, '2020-05-04', '13:32:49', 0),
(13, 22, 2, '2020-05-04', '11:38:56', 0),
(14, 23, 2, '2020-05-04', '13:32:49', 0),
(15, 23, 2, '2020-05-04', '13:32:49', 0),
(16, 23, 2, '2020-05-04', '13:32:49', 0),
(17, 25, 3, '2020-05-04', '12:05:00', 0),
(18, 25, 3, '2020-05-04', '12:05:00', 0),
(19, 24, 3, '2020-05-04', '13:27:26', 0),
(20, 24, 3, '2020-05-04', '13:27:26', 0),
(21, 1, 1, '2020-05-11', '09:58:10', 0),
(22, 24, 3, '2020-05-04', '13:27:26', 0),
(23, 24, 3, '2020-05-04', '13:27:26', 0),
(24, 24, 3, '2020-05-04', '13:27:26', 0),
(25, 24, 3, '2020-05-04', '13:27:26', 0),
(26, 24, 3, '2020-05-04', '13:27:26', 0),
(27, 24, 3, '2020-05-04', '13:27:26', 0),
(28, 23, 2, '2020-05-04', '13:32:49', 0),
(29, 23, 2, '2020-05-04', '13:32:49', 0),
(30, 18, 2, '0000-00-00', '13:45:14', 0),
(31, 1, 1, '2020-05-11', '09:58:10', 0),
(32, 1, 1, '2020-05-11', '09:58:10', 0),
(33, 1, 1, '2020-05-11', '09:58:10', 0),
(34, 1, 1, '2020-05-11', '09:58:10', 0),
(35, 26, 2, '2020-05-10', '22:01:16', 0),
(36, 26, 2, '2020-05-10', '22:01:16', 0),
(37, 1, 1, '2020-05-11', '09:58:10', 0),
(38, 26, 2, '2020-05-10', '22:01:16', 0),
(39, 1, 1, '2020-05-11', '09:58:10', 0),
(40, 27, 2, '2020-05-04', '16:28:22', 0),
(41, 27, 2, '2020-05-04', '16:28:22', 0),
(42, 28, 3, '2020-05-10', '21:47:33', 0),
(43, 28, 3, '2020-05-10', '21:47:33', 0),
(44, 26, 2, '2020-05-10', '22:01:16', 0),
(45, 1, 1, '2020-05-11', '09:58:10', 0),
(46, 31, 3, '2020-05-04', '16:20:18', 0),
(47, 31, 3, '2020-05-04', '16:20:18', 0),
(48, 26, 2, '2020-05-10', '22:01:16', 0),
(49, 1, 1, '2020-05-11', '09:58:10', 0),
(50, 26, 2, '2020-05-10', '22:01:16', 0),
(51, 27, 2, '2020-05-04', '16:28:22', 0),
(52, 1, 1, '2020-05-11', '09:58:10', 0),
(53, 26, 2, '2020-05-10', '22:01:16', 0),
(54, 28, 3, '2020-05-10', '21:47:33', 0),
(55, 1, 1, '2020-05-11', '09:58:10', 0),
(56, 1, 1, '2020-05-11', '09:58:10', 0),
(57, 34, 2, '2020-05-06', '10:43:54', 0),
(58, 34, 2, '2020-05-06', '10:43:54', 0),
(59, 1, 1, '2020-05-11', '09:58:10', 0),
(60, 26, 2, '2020-05-10', '22:01:16', 0),
(61, 28, 3, '2020-05-10', '21:47:33', 0),
(62, 1, 1, '2020-05-11', '09:58:10', 0),
(63, 26, 2, '2020-05-10', '22:01:16', 0),
(64, 26, 2, '2020-05-10', '22:01:16', 0),
(65, 26, 2, '2020-05-10', '22:01:16', 0),
(66, 28, 3, '2020-05-10', '21:47:33', 0),
(67, 1, 1, '2020-05-11', '09:58:10', 0),
(68, 26, 2, '2020-05-10', '22:01:16', 0),
(69, 28, 3, '2020-05-10', '21:47:33', 0),
(70, 1, 1, '2020-05-11', '09:58:10', 0),
(71, 28, 3, '2020-05-10', '21:47:33', 0),
(72, 26, 2, '2020-05-10', '22:01:16', 0),
(73, 28, 3, '2020-05-10', '21:47:33', 0),
(74, 27, 2, '2020-05-09', '11:23:45', 1),
(75, 1, 1, '2020-05-11', '09:58:10', 0),
(76, 26, 2, '2020-05-10', '22:01:16', 0),
(77, 28, 3, '2020-05-10', '21:47:33', 0),
(78, 1, 1, '2020-05-11', '09:58:10', 0),
(79, 26, 2, '2020-05-10', '22:01:16', 0),
(80, 28, 3, '2020-05-10', '21:47:33', 0),
(81, 1, 1, '2020-05-11', '09:58:10', 0),
(82, 28, 3, '2020-05-10', '21:47:33', 0),
(83, 28, 3, '2020-05-10', '21:47:33', 0),
(84, 26, 2, '2020-05-10', '22:01:16', 0),
(85, 1, 1, '2020-05-11', '09:58:10', 0),
(86, 37, 3, '2020-05-10', '19:53:47', 0),
(87, 37, 3, '2020-05-10', '19:53:47', 0),
(88, 1, 1, '2020-05-11', '09:58:10', 0),
(89, 28, 3, '2020-05-10', '21:47:33', 0),
(90, 26, 2, '2020-05-10', '22:01:16', 0),
(91, 26, 2, '2020-05-10', '22:01:16', 0),
(92, 1, 1, '2020-05-11', '09:58:10', 0),
(93, 28, 3, '2020-05-10', '21:47:33', 0),
(94, 26, 2, '2020-05-10', '22:01:16', 0),
(95, 1, 1, '2020-05-11', '09:58:10', 0),
(96, 1, 1, '2020-05-11', '09:58:10', 0);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(50) NOT NULL,
  `role_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`, `role_created`) VALUES
(1, 'admin', '2020-04-04 08:41:00'),
(2, 'auditor', '2020-04-04 08:41:00'),
(3, 'vendor', '2020-04-04 08:42:00');

-- --------------------------------------------------------

--
-- Table structure for table `sc1_food_delivery`
--

CREATE TABLE `sc1_food_delivery` (
  `sc1_id` int(11) NOT NULL,
  `sc1_date` datetime NOT NULL,
  `sc1_food_item` text NOT NULL,
  `sc1_batch_code` text NOT NULL,
  `sc1_supplied_by` text NOT NULL,
  `sc1_use_by_date` datetime NOT NULL,
  `sc1_temp` text NOT NULL,
  `sc1_del_vehicle_check` text NOT NULL,
  `sc1_comment_action` text NOT NULL,
  `sc1_sign` text NOT NULL,
  `sc1_mgr_supvsr_chk` date NOT NULL,
  `sc1_mgr_sign` text NOT NULL,
  `sc1_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sc1_food_delivery`
--

INSERT INTO `sc1_food_delivery` (`sc1_id`, `sc1_date`, `sc1_food_item`, `sc1_batch_code`, `sc1_supplied_by`, `sc1_use_by_date`, `sc1_temp`, `sc1_del_vehicle_check`, `sc1_comment_action`, `sc1_sign`, `sc1_mgr_supvsr_chk`, `sc1_mgr_sign`, `sc1_user_id`) VALUES
(1, '2020-05-04 11:47:41', 'FPvJH9B2zMZAaOoOm3YpjOgu1Jbk6aXaBkGPDVb68laITXLMa40SWUX3HJpgfIL+TWcfF4aM8MUp4f2UHEojBg==', 'w4lAyKdFdQks1cXR5lEs5kzijYVK3WhaNctmH1RDq1/2lo8WEXkf9x8O2fXCmqE8ELHwoAHssV8Ain2jnB+8gA==', 'NQQxbONdi/u5ZUZmEGwzmOkLLUdfpKLDQYcCLvXk79cQa72sb5JNk8nH3h2pDXZvcidScPB4yLHHdHNOd+xkzA==', '2020-05-20 00:00:00', '1o/BaPti1yi2C718a6KN75doizxqmiOLETV6dZ9P1Sy09l3qPp5bnt83H9RLntyMkxJ+3bDv/f2cvobsnvCrEw==', 'FygIVPavKjz9jslZZKrUMv8M5w2hk81e9ITf0mmUpsiYzttach+qpj5cfZUi5S71xkYyArVpJg8t8Bs6RJvScQ==', 'LsJdlI5lQxHMdpK0j1uY8IA2S8SRlbDCEvL+7OIQUwSygsw2JoJyOGyzQt+Nv5nPeHPNJp/+0XY7htKIU2TviQ==', '', '0000-00-00', '', 25),
(2, '2020-05-04 11:48:41', 'WhLg7rDRGnZ3wqzcMnPWJSnOwpaDRFTRrAzQNq8Tu3hamC3utFo9GYGFcMjVcTaUBK74O1vn+uJMCR/PhUbYYg==', 'Nsuu7HPDnUDyqkbfHBmBXnsKE+LA73vu9d/j83dnyrOY/cKez1rZ41tnYX1z7U+ArvLl774DBd3MuqV6obERrw==', 'Oj/4S9jzuAYkzBDm/jvfnZJdLxoFMX0E6n+UDm9wtTqwINwI4H1PRtGcpJRNZwRbAtuga6uuKlP0MI6O/YtEUA==', '2020-05-20 00:00:00', 'ooXBwUE/XR4mnE0XyK87JPFvf8Tkh6z//b7L0GX4O9XkKRO+EHODd5yI4PlA/fBGStJdMR9KxO5q+8o371KQVw==', 'QrxMQS2HfJlx0XMde3w8PsqC6o7y3QFWaDnp0GJd5CI570VY/7RFK+oPimydvSans+GXpINMwQ/PjYU78TcQ6w==', 'tVpALDDezSlGzWb6rcPD/fZLbu/JN+q+qrztRlgX7YNthh0BCwgsw6mXyuKt3Tkq+C48fMw5owfew/Z1Lmczco2Hfal7SUU63bkvCQmqtOVnp4IVFdGJRseqVaNK4S6k', '', '0000-00-00', '', 25),
(3, '2020-05-04 14:34:45', 'Nt4JgzD4zPhqf/xzHULZbhApU616VPTAuR5t45ygzJNt2mxiDdRriP6YXGfrLIFW6wDl7QS/gB4GX+lcB28bdA==', 'VIQEBeRL+jdF1eOmclXQbP+YMcMXTJJLkKNvvFi5H7+yx3pcJngT1F0kkRn1arsT2JPukPaahkUTSfwt5HUg5Q==', 'zqgI8TBZZ+qQzv1neGNMmE47O4yNl4fLflaoImFVMmgBxOy6FmCoFwsNFRyOjGyAhRCfzZF+PbV8Wgxw+zdYMA==', '2020-05-05 00:00:00', 'XmhZR1qOFgS6EUV73x4mBtcXvw4x+VlniwX6Wy3Osg/xoUw0V69xj4gNWZqI4Ywnz41BP2bZvUu3DReIVCIv7Q==', 'rO/9hgUAp5K3YfrhwVze5iyxhdBLnOVNwQOhbFClaFsiapGh+YY1ipjC6B2gv2An4yJRBN1kD+xAqq7twDnWag==', 'qvTC6RsTl0g8OBzJ1ow693C7oVooOe2I904durikBhw7gu1CAAO6RqASGOQCI9It4Qxy+ix5qc4njSx18j0K9Q==', '', '0000-00-00', '', 28),
(4, '2020-05-04 14:35:08', '8QNBOUb2F3Tf4ADf9gvFfR5CkKCqn4lS7sJPqHw0jfz6/eRLQbt9xO6ar5zpWAsj3sznSTR9xpTwaF9G7Bs+cw==', 'Ac0066QK4xLdc+nNlYbFzkIZwhAcZivgt4vaxKW0uKraPtlJ44j6A/ndeyzYGjUAuPVWrcdOFZTBX6A/gFDzGg==', 'Qoq8a0yYSUZcHERYTT+1DVAkiSO2nCAaekVu3yrERAdMyKYGXuqljJws5IFtbKgoiwjJBqaOfheVRVPu0xs9Cg==', '2020-05-06 00:00:00', 'MjHtGLxOes8JLIHsXWGTFSEvKQZ/ZqTczTrF16GGItGY4Q7CD+sMKuyxfeFlhXzpDCp5RZyrqcobYw21BryECA==', 'CLhVhkkLytyCK9U11Wy361dqGouOBYgvupFHGk9y0ThYBEKKaJNSAEXR8W6IRn8i9qe1zOVBmv3ZXxepQi3f1w==', 'vLvzlKHbl79aBcuLCHyZXRTvmlI7sm2L4du1fXSoWmAIjJfL9+Yfa2fj2fscKev/ebNYN8gTBAMydAddvmc2zw==', '', '0000-00-00', '', 28),
(5, '2020-05-04 15:52:42', 'gCe6z9U/kvcczge6CtYL4iSwiFlGWEJRuAt0Cs4b336c2sCx8uePNIxqS21XYrL4wTk3Sn1b9BUZOH93ht/3AQ==', '7joQUELoJ56rLbIOL/apnB2d3JbZd2bH9pwWZ2KEkuqtR1bhzzA+HoX5Jn7owQL7x1aufdhaMrVx9nAG1TYM0A==', '8nW7x6gepX3bw47qNamTQdsJpZ+mNPeSznHULI/hNi+4knf2VolLWzuWIysbUETE8di6ZtcyoU/AOhOXLMKorg==', '2020-05-07 00:00:00', 'uNXr6wHpjSEVYOPSjCX++j1jJLouUq75XbQvK1eCpv7S1Gv12/nHZ29G028weReha1/mruVQXy3w3j4ha8sKwA==', 'jEJGhsBAxUTZBK5fHsOVWdCLkj+u7OP/FUUT1eUJ8DoWqT2y7b+r4ffGl33reCWpHILc4khdiraXlEohAsHRzA==', 'GefPzehFYmc+IphLfiXaB5I/znJ7RPtxl1geH2naZranT1pJhtUNRgzLRPYeVJou/TGA4gn35LvjX8zSbx3V8g==', '', '0000-00-00', '', 28),
(6, '2020-05-04 16:02:05', '0/tIEOmFtC8A4qcRQ+nFmAHaeruz5JeH0p30gHqwtJWDrfXF0kvFo3mNp53N/gA0N4/jWKZYUUPz20+8xsTlGg==', 'yOQezJ0kesrzzbh351EcoQv53vSzBchjW8kURuUENdgSlLfNGPNpQTnAzV773nEGvUrY78SYjPezuT/85F3pzg==', 'WBQs9m0eYe8dFDZqHuYZgvOpOMrOyiLd3xU/YhjVshqsYQiUteZMYYFZICwLdthoMGMNCi2/H24PUB1629AgAA==', '2020-05-08 00:00:00', 'd8vPeZKZtl5JTa6Rx9M8yU19n2I0dIgDl448fdWZe/3i/Pz6IkGdCtENe2pbIb67sZTPs0H3uW2LFBD0LYccYA==', 'fTVPi8Ch5GeHp2nbc7qh6jEHKMsmui2tyn/Uf2+NqJZLM6jSYGBMaTni0tufTVPxIA29dpnL8avm3L1hTWl7ew==', 'nnG29NmCCXkNn5BMgDvLEog4a6Yx9wqxwPh3SenTuNtzjX2isT0qS8GmB16DO8Vk2KOG65ZfaPg4u1dCRk8CgA==', '', '0000-00-00', '', 31),
(7, '2020-05-04 16:02:24', 'lRBjgfzxRN1RfvZObg/tvzlaC8TxsUJmvkDpgK3pEbKBw3VZX6qX+84fy0M7Dd1qWvmUj63UQfeRRGoRB4x3Sw==', '04WdhgjiIGvgVSMJtH8ADMZwFqruRIw6P32wBv9EHz9ZxxLDbzBBo8+t7jtTTvJ9n5gCCMJqwv31Gsry1makoA==', 'fCiigmG/NeMO9skBzWefTolslH2jOkl72G9otrWYKqEmhxrxz8FYRLuB2p4rSIZaGQOHUTATbcTKVOYL5IMCkA==', '2020-05-15 00:00:00', 'OYSnXTmbDCQscaf56I8nK+s/+yEozTPYuab64i2Ho8sbi7k6qzMs/7Q80oE1mavN0AP7W43z5Td4uxAo2NojXQ==', 'zoCOgSHma7z2WubI1wJfqUwm3+e58T/H86K1lUZYKoJTovkORULUa3i2tpdmEQzzlJU2pcxVysQ2poKKdqnBWw==', 'JdqbUYlACd0FNSJ3fwp3pYFrnboJstE+TDjezw1xFxP7BpSaBYfD4z3IvpEquU5kYaV2Hv4cdlPFaaTsxRgzFA==', '', '0000-00-00', '', 31),
(8, '2020-05-09 11:17:26', 'B6tiAF0ihgUepk8ek/iu6vdj6E3JfxyFmplEhiAHU31zdHILDmjlKgXieuaje9OGZ0OB4PpDiOohLeSvKRc1fA==', 'o32v28Csb3obDUzJANrxa+1NXTanor80pIlIDJ4x3sE6loD1ghZPFPtBHlK9GAjcqmoGA7dtkgnboxbG4G4JIg==', 'NxL9QSoPlRWBS94csmheM6MScGv1+7su4Wr4/m7i69vjonwtzAgjB+f0wu6mIfkFZ00rZHBVqE/jBvAeh4hFyQ==', '2020-05-20 00:00:00', 'Ow6TLOYWwZGZbp0U8kG3yIooRU7omsFfQTHZXU1w4aqhZK7kDA+7SpXytowUeUvy/BR8a5kDVi4MoJd9+X+9Dg==', 'ylPxZWbyPAaBEhbUpkPraFcmQHxNcrramvq9fCiYsVxGkUk0PW/JWA6FunGfbyVFL4k/tOZM5/Ch4hJXO30shw==', '9jM7NXQv+hx56lPbX0roTg3kpo4s2x6icICo/PV8H4AhVyg3HgoTTdDZdWofvU31eavLCqLQ///pxTlbTraTxA==', '', '0000-00-00', '', 28);

-- --------------------------------------------------------

--
-- Table structure for table `sc2_refrigeration`
--

CREATE TABLE `sc2_refrigeration` (
  `sc2_id` int(11) NOT NULL,
  `sc2_date` datetime NOT NULL,
  `sc2_user_id` int(11) NOT NULL,
  `sc2_temperature` text NOT NULL,
  `sc2_unit` text NOT NULL,
  `sc2_comments_action` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sc2_refrigeration`
--

INSERT INTO `sc2_refrigeration` (`sc2_id`, `sc2_date`, `sc2_user_id`, `sc2_temperature`, `sc2_unit`, `sc2_comments_action`) VALUES
(1, '2020-05-04 11:48:59', 25, 'fFRkaHghyMQ9VdT2zGG1OMeFrFldKan8FCMu7giojR8TW6RuLQ9OaqnMjQNUE2HktoXlJlLEioExP6L78cAaoQ==', 'blast chiller', 'fFRkaHghyMQ9VdT2zGG1OMeFrFldKan8FCMu7giojR8TW6RuLQ9OaqnMjQNUE2HktoXlJlLEioExP6L78cAaoQ=='),
(2, '2020-05-04 11:49:23', 25, 'gDVgHpyWiXZS/CwkDCG06YNciP9a8CcEGpB9BG6f7L3q4LBr11SgzSWKsrXAALoqsJU+6+NAxUScAUIK74gowQ==', 'Cooler', 'fFRkaHghyMQ9VdT2zGG1OMeFrFldKan8FCMu7giojR8TW6RuLQ9OaqnMjQNUE2HktoXlJlLEioExP6L78cAaoQ=='),
(3, '2020-05-04 11:55:07', 25, 'sX6GmkCriWmWO/pAt1vRRnuq2N2wCbPumjBdAMYlUXHH4UQpa1Hk7M9mkt3X/q1igyodPYVNgD3dGwPY8egUXA==', 'blast chiller', 'fFRkaHghyMQ9VdT2zGG1OMeFrFldKan8FCMu7giojR8TW6RuLQ9OaqnMjQNUE2HktoXlJlLEioExP6L78cAaoQ=='),
(4, '2020-05-04 12:05:58', 24, 'pl5R+0w1PSBceat+ElEFf5pyHN/jgxbXNGcMAuFtuGxCp9+wn1i+62XcRjy3X7JsEByTie+gnFTnAmUGewdR/w==', 'blast chiller', 'fFRkaHghyMQ9VdT2zGG1OMeFrFldKan8FCMu7giojR8TW6RuLQ9OaqnMjQNUE2HktoXlJlLEioExP6L78cAaoQ=='),
(5, '2020-05-04 12:06:08', 24, 'U3TlEDX2sJwP4jTGQFOF6kZX8q4TvF/K+Z3N1Pt7tIJhAgIaeRVTq92rFowDrddoG0eWsXTAPrA7zT9yuHZz2w==', 'Cooler', 'fFRkaHghyMQ9VdT2zGG1OMeFrFldKan8FCMu7giojR8TW6RuLQ9OaqnMjQNUE2HktoXlJlLEioExP6L78cAaoQ=='),
(6, '2020-05-04 12:06:25', 24, 'ui9VwXNKnA1DDqdK93CGFyGRkusnVynfJMvvtxmxbj+p3JVyPIQPYn4+PeTIoxvzjkW/RduDpSRQDeTVc6MNtg==', 'Cooler 2', 'fFRkaHghyMQ9VdT2zGG1OMeFrFldKan8FCMu7giojR8TW6RuLQ9OaqnMjQNUE2HktoXlJlLEioExP6L78cAaoQ=='),
(7, '2020-05-04 12:54:25', 24, 'KF1qN9jQ4i8EB5sgGrpi/McLXRoMQEnH+xufVXjsQd1Xxp5VRkhkKE5nbg15QQOSnlPHI2fjJpD2sBWiJE0p8A==', 'blast chiller', 'PGilKoeuRsPil5B5vot64MqJgJN+Nz/d7/mmFkSq/ZEURxnzqiRWH2gHWhDLLUUhBMUQkfnrSc0Vu+vcJYv8ug=='),
(8, '2020-05-04 12:54:32', 24, '+pYD6F+90Xk60WCszDqlyte9KsCK0UZ/SDg4niJ+O/jaHYXAs3UgqnWP27jiI7ayrrLHUpYgK1nuiZ8Ju74+2w==', 'sfsdfsdf', 'ZQjdwenuejCE7RrdXktDTlVjvRsP5T+yFvyaZza1qFeAMI717edMV4ZpAVqwIDJbPYxhw658ex7YKNda3HVCxQ=='),
(9, '2020-05-04 12:55:47', 24, 'oJEqM3X5CVN1CGUa+9buzAePZOBsNg36harmWwuzzenNvyS/06Fp1INd4m3cXaTj0oakLUDDYLKuy4fNztEuZA==', 'Please ping me when update is over. Will check then, now I am logging out - Syam', 'TKZsXxqrVrnuTRSCP7/wlsFdeJDHdrtiYXSQmzap23gM73nmSLBIqTdLtHkwLaS2lDZINQ9ewkMJy8DZxIOcew=='),
(10, '2020-05-04 13:04:33', 24, '2Wh1zR/kqjudaWhu94tBAzPOhA41eERwZmkLxExlzLyK4QJuk5TnqkDTK55LsUypJsXHjeyPm81EIJXAAkpZQw==', 'Ref U Name', 'l6Ta3GmK+D/e+8Aj//WzVgs7oELTbuGI40PRVnvMJycxgLU235BKSE2LJ4KhFKv8UpMlCO6Bfv8WsvNktA2vWQ=='),
(11, '2020-05-04 15:46:24', 28, 'nu0iJxm7gxRtMKSOjPNT+Qg7dLajvDNvPhEyZKPm4xf13cKQ/UsxDqwr+U3UmnY1YQk1TjceTp4W3QEiTrVajw==', 'Chiller-Kitchen', 'CapDSrQ05ixe+3Ne7JV/tLpdGFXg4aElhc+gJ7ozN6mNPe+BeSO2pznzuv+PU25CORWdL/bDU9nTrEFFiBOfZw=='),
(12, '2020-05-04 15:46:37', 28, '+W2nnO+X8KbswPcvKOs101QcmTwsP6Qef3bk13jvReFhDxAyTYWqtWlwj2Pzk9EJFoMujbIv4IXADtwXMvVodw==', 'Chiller-Kitchen', 'ebhcky0dsBulpkZ8rVNGLTPSpUzs5GAi/Dzi0krldLAdWqLw6z6i630Q1NF/mB7YTZOstFy/xn6kZxhul9jYuw=='),
(13, '2020-05-04 15:47:02', 28, 'niqIplOu0//DgYtVICT/I2k3T8Rs0/ffID7kmikVe9xLha1EaUdBRNJlTnYlZvr4bMKUcZ7fKkLALedrNuBwPw==', 'Chiller-Kitchen', 'xJeYAoc9pNJTx9MNcJqQtscFRPE4Xg3/EDeGYMAqGY5/Liz0k+IBi2mWM9bDmpyHWmuH6J1LrFUiyTGLgNexyVen5nfsBI06rPPmr19dkYLBf5Tyl04bsVGYYnMcnhgi'),
(14, '2020-05-04 16:03:54', 31, 'LqYGbkNfbJrhwDmGklFU9Cbqfkkh4Gz7bYX1rR/3z6j/Jmif/CDNg4ZpdeMGlhw/I9+zhiT5Eo+vTOTRkzuaMg==', 'Hot Hold Unit', 'sJZFDR5WrViZ4yZwumf2R8gPOW7GVAEGwcwsXhafsby305cUXmac7zhfUpAdJXQdVUiBxS/rAOjTk5ja7WVPIIZT2s3XR0VfCJ9HKQlJPSYOE8xP4360B2R00WOhk+JW'),
(15, '2020-05-04 16:04:03', 31, '3zD3TB9tT/sdt+QkT31Nnn4BLSJbjHUeMmvNokeRLHZ7GrAho7cyA9mISGofFZF5RAPDnzpfFq9CeVFNePox3w==', 'Display-Chiller', '4Dtk1//AJPltXCBqe+9w+k4Z3X/X8xiIfLwPeMbU90OuVoWdANsMgHl8KV3OtGm5c7kqt+ugEG0h2a2HSHHJCB6xeiklOOtXpZ2t2M8WH5c4DpbyFh5umfPuAOQnnnsZ'),
(16, '2020-05-04 16:04:13', 31, 'UeIf7fpvHoej9NVLZXaaIMDWuVZ5IKMpiS28p/S1WSU2GbF6Yh+11fdFamjsreZrelVtLmh5UBepGMkrs/ykVw==', 'Chiller-Kitchen', '9h5YejZtER/CrZK3z6hreby4LRhK4+s2fSZbLEJkecWPSbJyu7EgIyiak4kbijfHrRV5bUd6bjJUmDfiVVLy/u0JZ45i+LHcj/+e+LUV/EWSm8iDnGWaF00XOk20nCHa');

-- --------------------------------------------------------

--
-- Table structure for table `sc3_reheating`
--

CREATE TABLE `sc3_reheating` (
  `sc3_id` int(11) NOT NULL,
  `sc3_date` datetime NOT NULL,
  `sc3_food` text NOT NULL,
  `sc3_time_started_cooking` varchar(500) NOT NULL,
  `sc3_time_finished_cooking` varchar(500) NOT NULL,
  `sc3_core_temp` text NOT NULL,
  `sc3_sign` text NOT NULL,
  `sc3_time_into_fridge_bchiller` varchar(500) NOT NULL,
  `sc3_bchiller_sign` text NOT NULL,
  `sc3_comments_action` text NOT NULL,
  `sc3_mgr_supvsr_chk` date NOT NULL,
  `sc3_mgr_sign` text NOT NULL,
  `sc3_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sc3_reheating`
--

INSERT INTO `sc3_reheating` (`sc3_id`, `sc3_date`, `sc3_food`, `sc3_time_started_cooking`, `sc3_time_finished_cooking`, `sc3_core_temp`, `sc3_sign`, `sc3_time_into_fridge_bchiller`, `sc3_bchiller_sign`, `sc3_comments_action`, `sc3_mgr_supvsr_chk`, `sc3_mgr_sign`, `sc3_user_id`) VALUES
(1, '2020-05-04 11:51:16', 'Ow89l3PSF6MXcnDwnCPLQKBflrqiZFYworvJnodr+2LDKWUttY0IMbYnu+zdmsJvrjylDN78XayTLTLhsz99Eg==', '17:10:00', '17:15:00', 'fMG20QGRznbMnyvUMw6S4dfF3wN6FhxF+MrQged2GRd4sjo04JgWHpISnNS6BVtInFq+DpvliGGIavByO55OTw==', '', '17:30:00', '', 'gSLzoTX/QOe7rYYPzb5WSZh/0TU4dvWoNCipgxzDQo8ZgINhgKQhe6XNuKvDAttdCU8B2PH9YfHh9D9jAvhVEg==', '0000-00-00', '', 25),
(2, '2020-05-04 15:48:39', '00dU/j20pNMq+xkjlRroPvvu0mwXfJ0FwuG+ENEPH4qmyGd75HJDsojWgUYXSSyy7pGutjCl9KWYbDtLJYC3QQ==', '12:00:00', '12:30:00', 'za4CX8xS/6IO84yZWi0tManmDhvbcyGPdVnfhOF+Yskdku1V96a0NSo/u4SAqIKeIOItNzqurhjI2GBsEAPcAA==', '', '01:30:00', '', 'wJmpmtLFgk7qHa0l1eq5RpHRaZpv0vu81jL/1QbWFhzoHuXZzvEgSAQjERWEXQIusKuk7TQUs/lEvF1F7b2x/w==', '0000-00-00', '', 28),
(3, '2020-05-04 15:48:56', 'wFj2WAcsJCHVRQ4iEKbwmsxa2cxQsj9M8G4HoHF3ri9wSI8IZ0YPrpH4ll74kVM+jpKLGDlOgUWrszuo0ZYntA==', '12:00:00', '12:30:00', 'nVV2hwoHIGh67PvVp4yYvn7qiaK3J7rTwS0gZxbHBQuxSAj7Ls2Zv1DrTXJRgZ0jRV9OM7FYGQ2Af0gSXIK47g==', '', '22:00:00', '', 'LrJi3Dml671c+1Gj9aO/C7SLXr9bT+iSQQkIxOLYdBp0ufuz2CaIpvLhLoOxCxTugdhScLXu4qV9F06HvrkjMA==', '0000-00-00', '', 28),
(4, '2020-05-04 16:05:16', 'Eib1gnYGmfBuC1UZlyt35llFF3imbNZmRcUdf6ELX8kkBTxNhEpFykVZLYROqb7gMNKT3r7edXIQA22CGodIyQ==', '12:00:00', '12:30:00', 'wVx3ZlhvaRIIpZsFV9rVFAVtBJXCR/RAn861Vg2ZOIfkjTPE8gvRShdm/qQriWGALsJFahemkWNXsz6kqu6gXQ==', '', '01:30:00', '', '/CyqVKjNB/26lOoALHNZZ6bWfM+9gvyLvOjPo2HxMLfFzuNFVJ8GrpUTCo5LyaavmV/KZ6bNQzqKViSlcs8d4A==', '0000-00-00', '', 31),
(5, '2020-05-04 16:05:28', 'pQbyzkOOnxkqCySrrjbVvP6nFulAu95AGbjoYnE329GlFDauS3JH4XMEre8/80mwTtj5RXT8nYfjcWIGjrGBSA==', '12:00:00', '12:30:00', 'gODIcOQ/3iGM4EeQ0WUONsucXwOyxYUAn8E26HpuTI/jgs6K5hnEtRZ81YYW1T9sRtDnLpOYKl0oz/W2aeXf0A==', '', '22:00:00', '', '0b1559IE7LQTLXHSmLWwrKT6fD7ymVKTBQscPCiad1L9z2CggkKUliRvgjE/XHscXju38Gm5JGY/sNSHEwLepQ==', '0000-00-00', '', 31);

-- --------------------------------------------------------

--
-- Table structure for table `sc4_display_records`
--

CREATE TABLE `sc4_display_records` (
  `sc4_id` int(11) NOT NULL,
  `sc4_date` datetime DEFAULT NULL,
  `sc4_food` text NOT NULL,
  `sc4_hot_hold_time` varchar(500) NOT NULL,
  `sc4_core_temp_chk1` text NOT NULL,
  `sc4_core_temp_chk2` text NOT NULL,
  `sc4_core_temp_chk3` text NOT NULL,
  `sc4_comments_action` text NOT NULL,
  `sc4_sign` text NOT NULL,
  `sc4_mgr_supvsr_chk` date NOT NULL,
  `sc4_mgr_sign` text NOT NULL,
  `sc4_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sc4_display_records`
--

INSERT INTO `sc4_display_records` (`sc4_id`, `sc4_date`, `sc4_food`, `sc4_hot_hold_time`, `sc4_core_temp_chk1`, `sc4_core_temp_chk2`, `sc4_core_temp_chk3`, `sc4_comments_action`, `sc4_sign`, `sc4_mgr_supvsr_chk`, `sc4_mgr_sign`, `sc4_user_id`) VALUES
(1, '2020-05-09 09:09:05', 'lCINU/XHMJ4P2HXWOhUrlIUW8C9wFPdLVsBD9sn/iqVqvdAKH0Kn/QuzXj3nu3d1RiPz6Hht6rqErkDvptwvJw==', '0:25:46', '/5TzPz8zVUxGZAZqZgkXgl569PtqNtAu7TbzA+eeFvwEomJ37eXyKA1+0D1CP4zp9BAk2J2fqfU+NqUjeW1UvA==', 'zrC2V+03/71f8kp4XkD7vlo0bk9j/T2qRFe/bGTpR+6E7cZLKluPnIpz9m7Fm8PSlkJXKXVyQxFWvErM5m8L/w==', 'xDCzpJUNB1cXapynOTp1o0oZdpAl9n/JQpksYqo11gNl+vR0cjzeJg8+HrHfAwDTAo6pmmv9hV3VdowwUY8ltQ==', 'LpAdGK+ik1i4A9JjFLv+HBanrOnnmsHJhZhI7QuspWQX8bsmWrBq5hZ4x4XOYl4mkzKUn2UdICbGaW89p+5q2A==', '', '0000-00-00', '', 28);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `sup_id` int(11) NOT NULL,
  `sup_name` text NOT NULL,
  `sup_created` datetime NOT NULL,
  `sup_updated` datetime NOT NULL,
  `sup_user_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`sup_id`, `sup_name`, `sup_created`, `sup_updated`, `sup_user_id`) VALUES
(1, '8eYc+TOAyCJrZywMAwT2KKqLwRwRcEwx2oOOtwe1wfxlP26Ge5PQ/z+y8nDkvpAZJhcBHx7FCpCjCEnEY8HaMA==', '2020-05-02 12:41:00', '0000-00-00 00:00:00', '3'),
(2, '84WpTqplCzcH2t7ETRO7nDTnWjL7Gsn1wz2e+TRckDJ+9aOQKtba223V0hj1FwdsGm6A3YaRpuPlSbFWJsQ0RA==', '2020-05-02 13:32:14', '0000-00-00 00:00:00', '5'),
(3, 'AMhPJ4mqgHFziQAySqBfwMkj18Zo8xvpglDJmxzn7nYDA5Gmmzd0IM/lTNEcfLZWSMRikrbU80GFCNqSQOkelw==', '2020-05-02 14:45:25', '0000-00-00 00:00:00', '5'),
(4, 'DMyyZ4e2tTHZmbyv6TKz3kqmuPP3aDWwJbhsr2DmXWqWo56jQXe/h7XLKUheImYne1qNR8c9R9rFuZcQqTSWeg==', '2020-05-02 19:38:08', '0000-00-00 00:00:00', '8'),
(5, 'XdmQ7W3qrQsNOVJ0ynkfUc7Be0VNDlL0cewg2V9gEL5+FCp1vPLlOiFDcuyD674Ay2kO+9LaCZ2gfqjS49xYaw==', '2020-05-03 13:48:32', '0000-00-00 00:00:00', '5'),
(6, 'fVwBXpo0KrMiFoJnqCzGMg9xcLxMcMzOuqBdDlXHEJUvtWZ6CqjoHD9VlswaIBLnoQWHHwljYSmsa711xDJGiw==', '2020-05-03 14:31:29', '0000-00-00 00:00:00', '19'),
(7, 'IItDP0CuM4I7a7Xr8aFCE4Tp5Rr6Mhz9qpKu/6Ra605SMXVSAiVkCd+c7RYuYqhs17ihKUUbgg0VpUENdGmJfw==', '2020-05-03 14:57:01', '0000-00-00 00:00:00', '24'),
(8, 'aD0Imjm8egKnp82vT9Cyuv/DZfboc9dFy8ZGyX0FHVRpiZ0Ho4Jga0pq93416bZjLOEnTXrtg2iufrdv69mmPw==', '2020-05-03 14:57:10', '0000-00-00 00:00:00', '24'),
(9, 'Vidvn+/ny3WvmUTKHKwDZ2D6WO53kADBfx9M72yhmAvFTd7n8chj/bvXBJ8qEHJQrnZZmIQL55rAkUj52oY8pg==', '2020-05-03 14:57:18', '0000-00-00 00:00:00', '24'),
(10, 'Nz0iG5QN/IIVb/eEzGMe+lvW3mXISBjyzIdTsyWKA7+dxLH9/2k4OXioMSeoA+f4Yts9BYohRHL8h3LEBB8cJw==', '2020-05-03 14:57:26', '0000-00-00 00:00:00', '24'),
(11, 'N/MuFMFL8iI5zt+AkuUE6xu1RXgY2gk1jG8tRuns0G1ofuWGbAHVrhZ9jbrojcqTDrAX2EW/B+JsgPNlPqY7vw==', '2020-05-03 15:18:15', '0000-00-00 00:00:00', '26'),
(12, 'A3rN/ST7Yb0LVnklZ1d5hTgIgeIkaNDcdPWPGoBxc5LTSXa71KmpbcEUClBWrkJ5jTqx4BBMRADh9Assl+TBFg==', '2020-05-04 11:46:52', '0000-00-00 00:00:00', '25'),
(13, 'Vc4cTyTk8MEdqv5/t8NGNzdCMs/jlO+1d/tGe7NRS8OxWKVzguXnW22vMeIB+d6yFZACUm3gnzZ3Ukt1hEsbdA==', '2020-05-04 14:33:41', '2020-05-09 11:15:07', '28'),
(14, '8Wvr9/bBxOTB3Z7wQF+BTJE0ZlXDUVJ+EF330IZBH5UmmRMMlMBosWo9I8rNfeSiIz1LePBVn5gv9ILdamaQ/Q==', '2020-05-04 14:33:58', '0000-00-00 00:00:00', '28'),
(15, 'Horw1MI4as/gZAZBqdG479J1Xc+31cUjzpUI6tGVW7rbXAbVGA1/n/KmX8tJtkpA4uUhiVOf6l8SlP3l+SSPzQ==', '2020-05-04 14:34:12', '0000-00-00 00:00:00', '28'),
(16, 'THY8rZKlLIbJ4Z8EiaPRw7pueOnq70BeAHjxau3BmBIYELVM1j4dUOOhYgEt1z/MHlCy7nI5gff0h0YzNBWp0g==', '2020-05-04 16:01:17', '0000-00-00 00:00:00', '31'),
(17, '+DQADClE9LfQpwrLbWKfuw/wWCSJaeYXAO5htYg5iSkdiATMFoTbZZXSkzT3wELp0fKcJnLkqfvbImi0YBG1Tg==', '2020-05-04 16:01:44', '0000-00-00 00:00:00', '31');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_role` int(11) NOT NULL COMMENT '1 - Admin , 2 - Auditor, 3 - Vendor',
  `user_name` varchar(50) NOT NULL,
  `user_pwd` varchar(50) NOT NULL,
  `user_created_date` datetime NOT NULL,
  `user_created_by` int(11) NOT NULL,
  `user_vendor_id` text NOT NULL,
  `user_active_status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_role`, `user_name`, `user_pwd`, `user_created_date`, `user_created_by`, `user_vendor_id`, `user_active_status`) VALUES
(1, 1, 'admin@gmail.com', 'admin', '2020-04-09 21:05:11', 1, '', 1),
(26, 2, 'auditor1@safecatering.ie', 'safe', '2020-05-04 14:14:55', 1, '', 1),
(27, 2, 'auditor2@safecatering.ie', 'safe', '2020-05-04 14:15:43', 1, '', 1),
(28, 3, 'vendor1@safe.ie', 'safe', '2020-05-04 14:17:09', 26, '00001', 1),
(30, 3, 'vendor3@safe.ie', 'safecatering', '2020-05-04 14:21:21', 27, '00003', 1),
(31, 3, 'vendor4@safe.ie', 'safe', '2020-05-04 14:22:43', 27, '00004', 1),
(34, 1, 'prasanth.muruga@euphontec.com', 'safe', '2020-05-06 09:44:10', 1, '', 1),
(35, 3, 'vendor2@safe.ie', 'safecatering', '2020-05-09 11:10:31', 26, '00010', 1),
(37, 3, 'xyz1@gmail.com', 'test', '2020-05-10 19:43:54', 36, '787878', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `ud_id` int(11) NOT NULL,
  `ud_fname` text NOT NULL,
  `ud_lname` text NOT NULL,
  `ud_address` text NOT NULL,
  `ud_ph_no` text NOT NULL,
  `ud_user_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`ud_id`, `ud_fname`, `ud_lname`, `ud_address`, `ud_ph_no`, `ud_user_id`) VALUES
(1, '+YB/nZAXLd76bvAM+7VGJi2E2YLEF9dVkAzplmzusOSTE5xggkTHjJjusi1BmL45Klb4FUW7IFD1OBqCbSD5qw==', 'PSUXwmiFw6GzdFigIVF/xewrqAn+QRPdxg/zA5YL52yLUEdZmdxZ2wbtCuZ4nXXn4JQe0xY3v1+qUeG0mG06dA==', 'R3n6RqzDo1jmIp7kVzoA6+IIaiPun2Pag54Tz3a4qGHrPRaoShHS1rM7VXkXc144/LkhJfSBFIRyzxYz0IqoZA==', '89z8CIpiCh/tm2sgbCUgQfceChhsuUOz3jvfQQTtqu0563fCTzO1qIFXkJgcekpVvI7zThXN9SLkTkMRXSpEyQ==', '1'),
(11, 'Z8KFeI0i2oEkZPLTb9b8IpTNRafh+lkEUrBTVTFPHe8b5SPpYxdEeTqa9mgRecJr9VZAUWc7b9rM3YrlF18KSA==', 'q9Rnwy+yBhXPkOlDa2cKBuzyIEUhtPwY/djhBtibxU+2gmfEDLvLEUgUlsXRkX4NP5uYZduGuGb80+luuqnGQg==', '805tfZmW2Lwgn7oeP3X/UBeRJVTlEYpPCNWvWhZJky74hve3kBQtFFDXwQekLUDR5zXvJQoZXlOcoryzSBca3A==', 'ilbmuPvVJkw8UqefGyBaeTenjJbtMqNrbpGWdcsqiopVZ1uSGpcfZYK6qvioV5bppy9T9MMzs1dNQTNrVUG+8w==', '26'),
(12, 'dIm340XiVnTPtpumzbUF52STYrXiQOJtPH8tlPgSn1kVr1nVXHb9lAG4Waufg5cG3bx/nJXgmV9OHpEZtXnrIA==', 'DSRzgbK1AGyH4+zXgaMnzW7c3Any927Z/nbctATlU8JJBWf8gU54OQkYWwTfYhTvgzLJzM7jxgYbUd2bGx6UDQ==', 'mhOEKD2L5eDyY/eXFMivDr5mYcXs9VtWwY2gvVVUVG5CcwL0sH+aA6gDZ9QMMAcIiv8SIdBC0j/k3WYCzAUK0A==', 'AI49Z8K0dmEQnBAdcsFhONlA3BXNAp7bCedwm/uGwilDq8QraPjYq07VenrRzBYVU2UU/K1jLe2gXPXnM5CB1Q==', '27'),
(13, 'U+R5IOnHPoEJTPLUKi7VyF43jjUR+wgDzVDmm7i7S1XG/ug7B8w4cWQkaEfyd8fCphEIXRbHbMPiN4HBiY3LZQ==', 'c94R/TGbteMjRm2tYA4swUcGbB3lDplsKetvY58dzPRiB8jfj6BGwmf8lfjLCmYNQfPVgmsfyWFzm9fWdcOxag==', 'MzTGF53A7OJLqY9E1anfON5jsM7wi60OWXlrdMjJ1OEuOTN1SDeCotPUNNbO1TSwMnBwTQ3dc13nBV61BVQP/g==', 'IGZOCE7gI4x3EfC5YYgOrqivcxPQBRKBJoc/P5eYjs1DIIwDQUXQdcPk0M+rS0OM78t5d0DeVDdBUVYZ4gP48g==', '28'),
(14, 'hHt4J45lDJF/Qh/9xGwlzQN7/sBpiokUFJgqWQcuige3NJe0nUv4Z9Sj7AZwWIUio27knlf4jjPAbr0wMTkg8A==', 'N4wdfQfHRGVNMSJhnKTLVq6d9aJDtoPrlhry88gF5sN4rQ87hFPIgTeu/xH15/ZqxeWDObL0gi1dMaLrccdLkA==', 'aerHYsHv4yo+aja0+DPSg9+hJ33/BN7yIs24B0/Ses9/daVJKJwQ5dy12SnOEn30+FPWQKfbB+UPEHF1zsoukg==', '/fUBtRCqGcKVXa+5PB1jN4vc52MXiA8vUAqJkOg+liROcD2TNg0AUWyBoYoFKyUDFyjZrGYgvMenT8JTiMxXqQ==', '29'),
(15, 'RkQ2zGGXUE6ca3sojcjE0XqaSjrAVD0YbMmW7lqyggTy6Rc3iuVZJf15MmxD4ZLlemNrorp40OMZhOuxneFb0A==', 'zJCwR8GA0oxlkVHRsaMnfRut/ztzx6BHX25CQvUfa/BqysKNLeKuyV6udF4/9wUjvarUF/v/d7hq0qdnsc/k+Q==', 'ptv6QY9rM1tE0GcZHPT2+OejIS4AUmjjpRLL4ahNQMWnY5pvqSOHvlU8z4/wOs6wnZyRSOwFJhf7IBkCRAVLKw==', 'y6XOBWYEnJfoSTUkLl1CiJaCgZL9gEgSEeAqM+uK/alALtwetF1+Grsx2I8llw+QIKp+i4+mfI+1XDpp/uxdSw==', '30'),
(16, 'IZaOSlAg2/rUvB7NVJEo/JS0cZgWqeR0/Dwl6cnKUwUPJY6hgiPsB3/S5nT/vgxOmKBvJPu4URDk3oV53/qmgw==', 'JOFk7DoZsRLxS8oB9UOOimiUXzyP3xhNzIpAxHSdDxRNMbxYjnb7efL7moNoUJ57ayemNOGaTrhUhWNgjnX68w==', 'a+9M/B5GyGKoZl9iRtZenWAD43KKbQ8vYKQgOIt0gxzhXbvL+rYgLsPs6k91qIQzGJ3m3VEser0ZO9BFugisUg==', 'Lhxvhn7HuKDeCrSvdnAhcdJvMRcT1uPUo7I/PZG0D38PAZ1LFhJAubRVZjUA0pTCB5zW8NgfiAU1YtKFJBSPaQ==', '31'),
(19, 'QdAfiU5EOQ0t4CUPpGmZiRgmt7T2PS5qmJ77OFKqBO5NIVjxLNVWJm5A4P2RQG0nKgj9JQc9m87dvU7y+ue/oQ==', 'MIsoT7OsD4KywHqeIfgPH1GfKYoI8XEoNbbAWxKX2Uxm/Jx49EU/UtrHsg8M62qeJ6a2XqKZitTEgD/wSJjB0Q==', 'Sv3i8u70IH0z6n3HzwOdN54nPzCIKmyy1SLM5jENJUb/wR1GPBAoZRYnukHNf93ne2rloCOSU0B3mIuE0b7KtA==', 'r6EJD7+FmPN/HrQ4QM4Fw9sB7WHAdvMJIgiHzVkYaMQphG+s8IlfGRTGABAXHbIkulkKysmpneGFxBxhLiu23w==', '34'),
(20, 'IAUUd808qboOwe99KUKoGndpQLe3UUvs7BX6iP9d3Jnx/msbxlMR2WfpBiVITpcWU7G8qZh+vojLWCqXKpqCDQ==', 'mUxaoZExvjci9PdV9j/6RwLkCT+UlBiLUfUITEB23my/0prAuSznKaiu6XtLE3nqB+SbV9NPacorc/ViZ2YbRg==', 'SyfLxbsLL6/PxrZIdALeThdsiCEhn2YY2UySwqsZ6tRaIza2LO0/kMb9Amug8Q+jgRXFQ9HSBlSjjGHvSQbvFQ==', '1kJSS6ZJ5vklOX0VteNHd1Tme42rqfqfQft2xjIdLvT/x5qV/o86j98zVFUgO/8+9BndZ66miXTi8GUBX4A/UA==', '35'),
(22, 'ya597OXx3nGLxQGfxrW58lrryDEC17nRVw1VVz1VmlZ3Rt3ONO60yPOd7mt3B6TSO9sbAg+yPsFdBKrJe/id3w==', 'auTkqZqBQ1ff6vd0M/K3UNs2JHfB3VT4wzZZKW/DKzAd0rqIQE7vSIuffGG0Z0m3Ga80FYB9584mh0LlnmNAFA==', 'TbEjixUgjnSTOMRJdz/ILoUXaN6IdtRZE+qlij6CMOHoPqHtENQ5CTKZ5Dg7tyZlnuqSaXnodysjNF4n5PgWKg==', 'XTr7WXRcabiFfuApMrFRTaM4HCtBSLENUmF6EHICpJc7S/QABZ0oRJtDvu1j72SMn0TbIu8xaw1rd1sFYbN2vA==', '37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alert`
--
ALTER TABLE `alert`
  ADD PRIMARY KEY (`alert_id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `sc1_food_delivery`
--
ALTER TABLE `sc1_food_delivery`
  ADD PRIMARY KEY (`sc1_id`);

--
-- Indexes for table `sc2_refrigeration`
--
ALTER TABLE `sc2_refrigeration`
  ADD PRIMARY KEY (`sc2_id`);

--
-- Indexes for table `sc3_reheating`
--
ALTER TABLE `sc3_reheating`
  ADD PRIMARY KEY (`sc3_id`);

--
-- Indexes for table `sc4_display_records`
--
ALTER TABLE `sc4_display_records`
  ADD PRIMARY KEY (`sc4_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`sup_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`ud_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alert`
--
ALTER TABLE `alert`
  MODIFY `alert_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sc1_food_delivery`
--
ALTER TABLE `sc1_food_delivery`
  MODIFY `sc1_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sc2_refrigeration`
--
ALTER TABLE `sc2_refrigeration`
  MODIFY `sc2_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `sc3_reheating`
--
ALTER TABLE `sc3_reheating`
  MODIFY `sc3_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sc4_display_records`
--
ALTER TABLE `sc4_display_records`
  MODIFY `sc4_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `sup_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `ud_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
