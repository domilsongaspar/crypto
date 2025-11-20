-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 10-Ago-2022 às 12:20
-- Versão do servidor: 5.7.26
-- versão do PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cyt_db`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `_cryptodatas`
--

DROP TABLE IF EXISTS `_cryptodatas`;
CREATE TABLE IF NOT EXISTS `_cryptodatas` (
  `_code` varchar(255) NOT NULL,
  `_name` varchar(255) NOT NULL,
  `_used` tinyint(1) NOT NULL DEFAULT '0',
  `_proprietary` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `_cryptodatas`
--

INSERT INTO `_cryptodatas` (`_code`, `_name`, `_used`, `_proprietary`) VALUES
('507fc4589c52cdea0ca4a6d54c100871', 'Domilson', 0, '_S56+f0D_S55+c0F_S51+70C5@3P6+e9B@3P6+a0C@3P0+70D1@3P3+f9B_S55+e5E_S55+e5E_S55+c0F_S52+75D1@3P0+70D1_S52+75D1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `_repositories`
--

DROP TABLE IF EXISTS `_repositories`;
CREATE TABLE IF NOT EXISTS `_repositories` (
  `_id` varchar(255) NOT NULL,
  `_name` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `_repositories`
--

INSERT INTO `_repositories` (`_id`, `_name`) VALUES
('_S56+f0D_S55+c0F_S51+70C5@3P6+e9B@3P6+a0C@3P0+70D1@3P3+f9B_S55+e5E_S55+e5E_S55+c0F_S52+75D1@3P0+70D1_S52+75D1', 'a87753a7763545f7953bb937ed68d308');

-- --------------------------------------------------------

--
-- Estrutura da tabela `_users`
--

DROP TABLE IF EXISTS `_users`;
CREATE TABLE IF NOT EXISTS `_users` (
  `_id` varchar(255) NOT NULL,
  `_name` text NOT NULL,
  `_password` text NOT NULL,
  `_email` varchar(500) NOT NULL,
  `_qtd` tinyint(4) NOT NULL DEFAULT '0',
  `_logged` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `_users`
--

INSERT INTO `_users` (`_id`, `_name`, `_password`, `_email`, `_qtd`, `_logged`) VALUES
('_S56+f0D_S55+c0F_S51+70C5@3P6+e9B@3P6+a0C@3P0+70D1@3P3+f9B_S55+e5E_S55+e5E_S55+c0F_S52+75D1@3P0+70D1_S52+75D1', '_S52+64a8_S52+97F0@3P0+73E4@3P0+21A5@3P0+43F8_S51+81B5_S52+97F0@3P0+25A6 @3P1+78c8_S52+75D1_S51+81B5_S50+41B1_S52+75D1@3P2+92D4', '#@3P0+49e6@3P0+28b1_S51+89a0@3P3+f9B@3P3+a7F@3P3+f9B@3P3+a7F_S55+c0F_S55+c0F@3P0+70D1_S50+32C4#', '@3P0+70D1_S52+97F0@3P0+73E4@3P0+21A5@3P0+43F8_S51+81B5_S52+97F0@3P0+25A6_S50+32C4_S52+75D1_S51+81B5_S50+41B1_S52+75D1@3P2+92D4@_S50+32C4@3P0+73E4_S52+75D1@3P0+21A5@3P0+43F8-_S51+33A0_S52+97F0@3P0+73E4', 0, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
