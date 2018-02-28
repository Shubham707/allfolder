-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2017 at 08:01 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wallet`
--

-- --------------------------------------------------------

--
-- Table structure for table `authorization`
--

CREATE TABLE `authorization` (
  `authorization_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL DEFAULT '0',
  `login_time` datetime NOT NULL,
  `authorization_code` varchar(200) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `merchantuser`
--

CREATE TABLE `merchantuser` (
  `id` int(11) NOT NULL,
  `date` varchar(300) NOT NULL,
  `ip` varchar(30) NOT NULL,
  `username` varchar(65) NOT NULL,
  `encrypt_username` varchar(500) DEFAULT '',
  `password` varchar(300) NOT NULL,
  `accesskey` varchar(225) NOT NULL,
  `transcation_password` varchar(500) DEFAULT '',
  `email` varchar(200) DEFAULT '',
  `wallet_address` varchar(255) DEFAULT '',
  `admin` varchar(1) DEFAULT NULL,
  `profile_picture` varchar(255) NOT NULL,
  `locked` varchar(1) DEFAULT NULL,
  `supportpin` varchar(6) DEFAULT NULL,
  `secret` varchar(16) DEFAULT NULL,
  `authused` varchar(1) DEFAULT NULL,
  `otp_value` varchar(500) DEFAULT '',
  `is_email_verify` tinyint(4) DEFAULT '0',
  `BCH_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `merchantuser`
--

INSERT INTO `merchantuser` (`id`, `date`, `ip`, `username`, `encrypt_username`, `password`, `accesskey`, `transcation_password`, `email`, `wallet_address`, `admin`, `profile_picture`, `locked`, `supportpin`, `secret`, `authused`, `otp_value`, `is_email_verify`, `BCH_address`) VALUES
(1, '2017-09-15 11:25:54', '::1', 'priyanka12@gmail.com', '6216ac3d07a888d1bd9258c7c022ae31796769be6076e95862c955b008a78368', '6b51d431df5d7f141cbececcf79edf3dd861c3b4069f0b11661a3eefacbba918', '254544', '6b51d431df5d7f141cbececcf79edf3dd861c3b4069f0b11661a3eefacbba918', 'priyanka12@gmail.com', '', NULL, 'Hydrangeas.jpg', NULL, NULL, NULL, NULL, '', 0, ''),
(2, '2017-09-16 16:06:52', '::1', 'shubhamsahu707@gmail.com', '082b7a1b163e1db07877759de57eef20daf52f98b911cf47ed63163cd4cd2aed', '6b51d431df5d7f141cbececcf79edf3dd861c3b4069f0b11661a3eefacbba918', '685994', '6b51d431df5d7f141cbececcf79edf3dd861c3b4069f0b11661a3eefacbba918', 'shubhamsahu707@gmail.com', '', NULL, 'Hydrangeas.jpg', NULL, NULL, NULL, NULL, '', 0, ''),
(8, '2017-09-19 16:07:51', '::1', 'sahutech8@gmail.com', 'f6e0432819749dbbcdad036fd4e91b820c2e69201df8ea234e97a8771ecac998', '6b51d431df5d7f141cbececcf79edf3dd861c3b4069f0b11661a3eefacbba918', '871819', '6b51d431df5d7f141cbececcf79edf3dd861c3b4069f0b11661a3eefacbba918', 'sahutech8@gmail.com', '', NULL, '', NULL, NULL, NULL, NULL, '', 0, ''),
(9, '2017-09-22 16:34:56', '::1', 'sahutech823@gmail.com', '68446544724a7bba83e11244d874015e8262fe02263c5dc64c3fd4df59b95c4e', '6b51d431df5d7f141cbececcf79edf3dd861c3b4069f0b11661a3eefacbba918', '312029', '6b51d431df5d7f141cbececcf79edf3dd861c3b4069f0b11661a3eefacbba918', 'sahutech823@gmail.com', '', NULL, '', NULL, NULL, NULL, NULL, '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `pay_id` int(11) NOT NULL,
  `pay_address` varchar(255) NOT NULL,
  `to_address` varchar(255) NOT NULL,
  `transection_id` varchar(255) NOT NULL,
  `accesskey` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`pay_id`, `pay_address`, `to_address`, `transection_id`, `accesskey`, `created`, `updated`) VALUES
(1, '1', '1', '1', '1', '2017-09-18 11:28:03', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `transcation`
--

CREATE TABLE `transcation` (
  `transcation_id` bigint(20) NOT NULL,
  `from_user_id` int(11) DEFAULT '0',
  `to_user_id` int(11) DEFAULT '0',
  `transcation_type` varchar(30) DEFAULT '',
  `time` datetime DEFAULT '0000-00-00 00:00:00',
  `from_address` varchar(50) DEFAULT NULL,
  `to_address` varchar(50) DEFAULT '0',
  `opening_amount` float DEFAULT '0',
  `trans_amount` float DEFAULT '0',
  `closing_amount` float DEFAULT '0',
  `fee` double DEFAULT '0',
  `confirmations` varchar(200) DEFAULT '',
  `txid` varchar(500) DEFAULT '',
  `info` varchar(500) DEFAULT '',
  `otp_value` varchar(10) DEFAULT '',
  `is_processed` tinyint(4) DEFAULT '0',
  `creation_ip` varchar(20) DEFAULT '',
  `creation_date` datetime DEFAULT '0000-00-00 00:00:00',
  `is_deleted` tinyint(4) DEFAULT '0',
  `last_modification_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `trans_date` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transcation`
--

INSERT INTO `transcation` (`transcation_id`, `from_user_id`, `to_user_id`, `transcation_type`, `time`, `from_address`, `to_address`, `opening_amount`, `trans_amount`, `closing_amount`, `fee`, `confirmations`, `txid`, `info`, `otp_value`, `is_processed`, `creation_ip`, `creation_date`, `is_deleted`, `last_modification_date`, `trans_date`) VALUES
(1, 0, 0, '1', '2017-09-30 00:00:00', '1', '1', 1, 1, 1, 1, '1', '1', '1', '1', 1, '1', '2017-09-21 00:00:00', 1, '2017-09-19 18:30:00', 2001),
(23, 1, 1, '1', '2017-09-22 00:00:00', '1', '1', 1, 1, 1, 1, '1', '1', '1', '1', 1, '1', '2017-09-29 00:00:00', 1, '2017-09-20 10:05:40', 0000);

-- --------------------------------------------------------

--
-- Table structure for table `transcation_list`
--

CREATE TABLE `transcation_list` (
  `trans_id` int(11) NOT NULL,
  `invoiceid` varchar(255) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `trans_account` varchar(255) NOT NULL,
  `trans_address` varchar(255) NOT NULL,
  `trans_category` varchar(255) NOT NULL,
  `trans_amount` varchar(255) NOT NULL,
  `trans_label` varchar(255) NOT NULL,
  `trans_vout` varchar(255) NOT NULL,
  `trans_confirmations` varchar(255) NOT NULL,
  `trans_trusted` varchar(255) NOT NULL,
  `trans_txid` varchar(255) NOT NULL,
  `trans_walletconflicts` varchar(255) NOT NULL,
  `trans_time` varchar(255) NOT NULL,
  `trans_timereceived` varchar(255) NOT NULL,
  `trans_bip_replaceable` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `trans_year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transcation_list`
--

INSERT INTO `transcation_list` (`trans_id`, `invoiceid`, `order_id`, `trans_account`, `trans_address`, `trans_category`, `trans_amount`, `trans_label`, `trans_vout`, `trans_confirmations`, `trans_trusted`, `trans_txid`, `trans_walletconflicts`, `trans_time`, `trans_timereceived`, `trans_bip_replaceable`, `created`, `update`, `trans_year`) VALUES
(17, '', '#order933482', 'zelles(rohit@gmail.com)', 'n3ytc8SkCoQUUNreZZUrGZpqPVNEeANxCN', 'receive', '0.001', 'zelles(rohit@gmail.com)', '0', '2537', '', '12c3388e0f3aa763a5eac27d3f240064ba455451d1b29b9699cf1cf4bcc01c7b', '', '1505907910', '1505907910', 'no', '2017-09-22 07:50:06', '0000-00-00 00:00:00', '2017'),
(18, '', '#order562400', 'zelles(rohit@gmail.com)', 'mrxa5HisVDBRDM3ECEMvh62Lds5CFB5nvr', 'receive', '0.002', 'zelles(rohit@gmail.com)', '0', '2538', '', '12c3388e0f3aa763a5eac27d3f240064ba455451d1b29b9699cf1cf4bcc01c7b', '', '1505907910', '1505907910', 'no', '2017-09-22 07:23:15', '0000-00-00 00:00:00', '2018'),
(19, '', '#order363545', 'zelles(rohit@gmail.com)', 'mpo4w6MZRryV3d224TUeUg7FX3hAoSstD7', 'receive', '0.003', 'zelles(rohit@gmail.com)', '0', '2539', '', '12c3388e0f3aa763a5eac27d3f240064ba455451d1b29b9699cf1cf4bcc01c7b', '', '1505907910', '1505907910', 'no', '2017-09-22 07:23:23', '0000-00-00 00:00:00', '2019'),
(20, '', '#order504142', 'zelles(rohit@gmail.com)', 'mvHho9V1JW1ZSvUhuMcLTa8vEjR4JUzEmp', 'receive', '0.008', 'zelles(rohit@gmail.com)', '0', '2540', '', '12c3388e0f3aa763a5eac27d3f240064ba455451d1b29b9699cf1cf4bcc01c7b', '', '1505907910', '1505907910', 'no', '2017-09-22 07:50:56', '0000-00-00 00:00:00', '2020'),
(21, '', '#order504142', 'zelles(rohit@gmail.com)', 'mvHho9V1JW1ZSvUhuMcLTa8vEjR4JUzEmp', 'receive', '0.008', 'zelles(rohit@gmail.com)', '0', '2540', '', '12c3388e0f3aa763a5eac27d3f240064ba455451d1b29b9699cf1cf4bcc01c7b', '', '1505907910', '1505907910', 'no', '2017-09-22 07:54:29', '0000-00-00 00:00:00', '2020');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `date` varchar(300) NOT NULL,
  `ip` varchar(30) NOT NULL,
  `username` varchar(65) NOT NULL,
  `encrypt_username` varchar(500) DEFAULT '',
  `password` varchar(300) NOT NULL,
  `transcation_password` varchar(500) DEFAULT '',
  `email` varchar(200) DEFAULT '',
  `wallet_address` varchar(255) DEFAULT '',
  `admin` varchar(1) DEFAULT NULL,
  `locked` varchar(1) DEFAULT NULL,
  `supportpin` varchar(6) DEFAULT NULL,
  `secret` varchar(16) DEFAULT NULL,
  `authused` varchar(1) DEFAULT NULL,
  `otp_value` varchar(500) DEFAULT '',
  `is_email_verify` tinyint(4) DEFAULT '0',
  `BCH_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `date`, `ip`, `username`, `encrypt_username`, `password`, `transcation_password`, `email`, `wallet_address`, `admin`, `locked`, `supportpin`, `secret`, `authused`, `otp_value`, `is_email_verify`, `BCH_address`) VALUES
(16, '2017-08-03 15:28:14', '::1', 'vib@gmail.com', '95ab78588d2272f428b4ed6cf0fcb15b6dbb957642e0d3ce12cb863417f966ee', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '4ff6c92cf95f78ee87f6436f631e93734b164d3ce05bca98a6c40545d12f8a8c', 'vib@gmail.com', '', NULL, NULL, NULL, NULL, NULL, '57c4fc581c7a7c72da0f0ac70adc56968e43de38ed6111ac35a41867ca1d21ca', 0, ''),
(38, '2017-08-11 11:18:47', '::1', 'vibh@gmail.com', '501843d1895402a6df6204e85aa02796718311b669ad6842184cbb739b760a54', '2613c4d466628d0a4bbd473e87a8d06d65fa73ab8f11534dff56180b4429303f', '2613c4d466628d0a4bbd473e87a8d06d65fa73ab8f11534dff56180b4429303f', 'vibh@gmail.com', '', NULL, NULL, NULL, NULL, NULL, '', 0, ''),
(39, '2017-08-11 12:46:26', '::1', 'vib12@gmail.com', '56df531504b84ca8bcbadbaf0e39b968215d920532fb7988ae1a02030b303f5a', '2613c4d466628d0a4bbd473e87a8d06d65fa73ab8f11534dff56180b4429303f', '2613c4d466628d0a4bbd473e87a8d06d65fa73ab8f11534dff56180b4429303f', 'vib12@gmail.com', '', NULL, NULL, NULL, NULL, NULL, '', 0, ''),
(40, '2017-08-11 12:47:16', '::1', 'vib123@gmail.com', '4436200a43eab1d66b6b250a0ca750efc4dda052cffbf375959f730802c9cf31', 'a8d221d8071a8740f96ecfe7932d9183f07093284c4a641c747017c1e9fcdd6d', 'a8d221d8071a8740f96ecfe7932d9183f07093284c4a641c747017c1e9fcdd6d', 'vib123@gmail.com', '', NULL, NULL, NULL, NULL, NULL, '', 0, ''),
(41, '2017-08-22 15:26:09', '::1', 'vibhork@gmail.com', '07bfdb031a71da218fd5972c334bd15e56fdc03a9bf02cb58b8218bd381cfce8', '54d2e3be24e2fa5b0fb7c5b8121fee15d2cb66ddec8c123e8c0813d053779088', '54d2e3be24e2fa5b0fb7c5b8121fee15d2cb66ddec8c123e8c0813d053779088', 'vibhork@gmail.com', '', NULL, NULL, NULL, NULL, NULL, '', 0, ''),
(42, '2017-08-24 12:45:46', '::1', 'priyanka@gmail.com', '4a3d71ae16451a30c74900339117e07ed2789b627c04656f8ee439921fe48288', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'priyanka@gmail.com', '', NULL, NULL, NULL, NULL, NULL, '', 0, ''),
(43, '2017-08-25 15:38:50', '::1', 'pri@gmail.com', '6dd6e4abd5af6820ee876168fe0243d0d48f95c71af4adeb831f2545f7ac1a8a', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'pri@gmail.com', '', NULL, NULL, NULL, NULL, NULL, '', 0, ''),
(44, '2017-08-26 14:46:54', '::1', 'nisha@gmail.com', 'f143c5d479145dcc32e8ff6e387564c8a16db603089ed163219f1a483dbdb8da', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'nisha@gmail.com', '', NULL, NULL, NULL, NULL, NULL, '', 0, ''),
(46, '2017-08-26 14:55:59', '::1', 'soniya@gmail.com', '8ad771ab0d7b6a5c668112bae7ad4568da94109c6d80045d3bd818901cd39cb0', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'soniya@gmail.com', '', NULL, NULL, NULL, NULL, NULL, '', 0, ''),
(47, '2017-08-26 15:18:36', '::1', 'priyanjindal@gmail.com', '7a8437686e2d5b1d3f726d57774a3990b4e0b03092c317dd669baec266292fe3', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', 'priyanjindal@gmail.com', '2N5vDYaL7BnajwdaMsp8tkF5erhKSNmpWsz', NULL, NULL, NULL, NULL, NULL, '', 0, ''),
(48, '2017-08-26 15:20:23', '::1', 'seema@gmail.com', '5b8ea135e77d53cfe1874788b3b01cc6076df1c8c3487efe286bd23dc43ef22f', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'seema@gmail.com', '', NULL, NULL, NULL, NULL, NULL, '', 0, ''),
(49, '2017-08-26 15:21:35', '::1', 'poonam@gmail.com', 'b089688ff791ed98e791d698bd20fd91637fe72eb0842598e3ffeeb8a08a6627', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'poonam@gmail.com', '', NULL, NULL, NULL, NULL, NULL, '', 0, ''),
(50, '2017-08-26 15:27:24', '::1', 'priyanka1@gmail.com', '6c881c2bd6cea5173d683dbd8a8aff7ec4726c904eb7ff6a4de8fb37503754b5', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'priyanka1@gmail.com', '', NULL, NULL, NULL, NULL, NULL, '', 0, ''),
(51, '2017-08-26 15:30:45', '::1', 'rohit@gmail.com', 'c76d10d23bd1a20891d1edc075d66d2b639397efe778dc5597248fdd3227a0ea', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'rohit@gmail.com', '', NULL, NULL, NULL, NULL, NULL, '', 0, ''),
(52, '2017-08-26 15:31:53', '::1', 'rohit1@gmail.com', '10b640d25ef69f2c1b153d4597f61c03214f2b9328fc524579ae5ddafa62930c', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'rohit1@gmail.com', '2MzZFbvbfHmPq94xaTtyA4rWUEUDSzMrGYc', NULL, NULL, NULL, NULL, NULL, '', 0, ''),
(53, '2017-08-26 15:59:18', '::1', 'pooja@gmail.com', 'b8f21493f513a0a53a46fbcc7b0e8fc0b1e4d293a7e7df500c984e9fa8cf2770', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'pooja@gmail.com', '', NULL, NULL, NULL, NULL, NULL, '', 0, '2NEgind4n5ebx7KVkLCN9pkBUy9ESQiD4DH'),
(54, '2017-08-26 16:00:14', '::1', 'pooja1@gmail.com', 'dfc466819dad1a0b17bb210ba6348d5ee8e2ffd2e95f679e38542fe380aa399a', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'pooja1@gmail.com', '', NULL, NULL, NULL, NULL, NULL, '', 0, '2MtZ5vL4tHRGb2egLc3MboW8J718qdFTWeR'),
(55, '2017-08-26 16:15:13', '::1', 'pinky@gmail.com', '7a2d3ec75b6f949e80723afca9c9cb66bda3ea22d54f01efb17025fb88cbccbd', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'pinky@gmail.com', '', NULL, NULL, NULL, NULL, NULL, '', 0, ''),
(56, '2017-08-26 17:03:44', '::1', 'rahul@gmail.com', '5c6551e24bfb8c3a542db4e4d1bf4906288b558766e29233cf18ea022499060d', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'rahul@gmail.com', '', NULL, NULL, NULL, NULL, NULL, '', 0, ''),
(57, '2017-08-26 17:06:54', '::1', 'babu@gmail.com', '5132177c44696140dcdedfb08bb7ff1cf2523b425b1f5276ce36eb76586f7e8f', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'babu@gmail.com', '', NULL, NULL, NULL, NULL, NULL, '', 0, ''),
(58, '2017-08-27 01:06:28', '::1', 'mohit@gmail.com', 'e9490000e3c1846efbef4c14c489078cda5dafc142766a8fc4adc256c852875f', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'mohit@gmail.com', '', NULL, NULL, NULL, NULL, NULL, '', 0, ''),
(59, '2017-08-27 01:17:20', '::1', 'new@gmail.com', 'f619e87c6fc32065033b7c9a0ac67cce03a9c283be787bda947349fb575d1374', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'new@gmail.com', '', NULL, NULL, NULL, NULL, NULL, '', 0, ''),
(60, '2017-08-27 01:18:01', '::1', 'new2@gmail.com', '097bb0a9e3666ddf68af3383de7e738e640b2bc9c742eeefbf77ebf72159fb49', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'new2@gmail.com', '', NULL, NULL, NULL, NULL, NULL, '', 0, ''),
(61, '2017-08-27 01:26:22', '::1', 'komal@gmail.com', 'e617d915ecc5236c3871cb966294e0f9e8b76c849c2cedf395158a0b78bd131f', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'komal@gmail.com', '', NULL, NULL, NULL, NULL, NULL, '', 0, ''),
(62, '2017-09-14 13:25:25', '::1', 'priya99@gmail.com', 'c3dab926316c442b4478466a7704f7dfba0bbd33b3d7f49413db58450fbb9425', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'priya99@gmail.com', '', NULL, NULL, NULL, NULL, NULL, '', 0, ''),
(63, '', '', 'priyankagarg1112@gmail.com', '', '89b15b9a6dd59b40d27c9e020a2af9a68e4b563d7ad95eeb9c1532734f6c4d1f', '', '', '', NULL, NULL, NULL, NULL, NULL, '', 0, ''),
(64, '2017-09-15 11:16:34', '::1', 'priyanka33@gmail.com', '0cd93e4cea8f90bef8bbd43d4813e33af891c60c9af9e506afae45bb23cc028f', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'priyanka33@gmail.com', '', NULL, NULL, NULL, NULL, NULL, '', 0, ''),
(65, '2017-09-15 11:18:36', '::1', 'priya121@gmail.com', 'ff5ccdb634e3f47aa0f44ff052c1223f2b529208cd6495bc34a5bade12c7965c', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'priya121@gmail.com', '', NULL, NULL, NULL, NULL, NULL, '', 0, ''),
(66, '2017-09-15 21:20:06', '::1', 'rohit11@gmail.com', 'f96434a8b5ee72ffcf7855e7c7f09e1d887ceff5e1511c90d69cdaf2e588e7d5', '6b51d431df5d7f141cbececcf79edf3dd861c3b4069f0b11661a3eefacbba918', '6b51d431df5d7f141cbececcf79edf3dd861c3b4069f0b11661a3eefacbba918', 'rohit11@gmail.com', '', NULL, NULL, NULL, NULL, NULL, '', 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authorization`
--
ALTER TABLE `authorization`
  ADD PRIMARY KEY (`authorization_id`);

--
-- Indexes for table `merchantuser`
--
ALTER TABLE `merchantuser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`pay_id`);

--
-- Indexes for table `transcation`
--
ALTER TABLE `transcation`
  ADD PRIMARY KEY (`transcation_id`);

--
-- Indexes for table `transcation_list`
--
ALTER TABLE `transcation_list`
  ADD PRIMARY KEY (`trans_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authorization`
--
ALTER TABLE `authorization`
  MODIFY `authorization_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `merchantuser`
--
ALTER TABLE `merchantuser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `transcation`
--
ALTER TABLE `transcation`
  MODIFY `transcation_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `transcation_list`
--
ALTER TABLE `transcation_list`
  MODIFY `trans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
