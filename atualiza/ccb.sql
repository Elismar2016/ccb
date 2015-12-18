-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 01-Dez-2015 às 16:14
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ccb`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `address`
--

CREATE TABLE IF NOT EXISTS `address` (
  `idaddress` int(11) NOT NULL AUTO_INCREMENT,
  `street` varchar(255) COLLATE utf8_bin NOT NULL,
  `number` varchar(255) COLLATE utf8_bin NOT NULL,
  `cep` varchar(8) COLLATE utf8_bin NOT NULL,
  `district` int(11) NOT NULL,
  PRIMARY KEY (`idaddress`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=12 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `idcity` int(11) NOT NULL AUTO_INCREMENT,
  `namecity` varchar(255) COLLATE utf8_bin NOT NULL,
  `state` int(11) NOT NULL,
  PRIMARY KEY (`idcity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `id` varchar(40) COLLATE utf8_bin NOT NULL,
  `ip_address` varchar(45) COLLATE utf8_bin NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `disabled`
--

CREATE TABLE IF NOT EXISTS `disabled` (
  `iddisabled` int(11) NOT NULL AUTO_INCREMENT,
  `cabinet` int(11) NOT NULL,
  `reason` text COLLATE utf8_bin NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(2) NOT NULL,
  PRIMARY KEY (`iddisabled`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `district`
--

CREATE TABLE IF NOT EXISTS `district` (
  `iddistrict` int(11) NOT NULL AUTO_INCREMENT,
  `namedistrict` varchar(255) COLLATE utf8_bin NOT NULL,
  `city` int(11) NOT NULL,
  PRIMARY KEY (`iddistrict`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `flow`
--

CREATE TABLE IF NOT EXISTS `flow` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `datehour` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `visitor` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `lending`
--

CREATE TABLE IF NOT EXISTS `lending` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `datehour` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cabinet` int(11) NOT NULL,
  `visitor` int(11) NOT NULL,
  `status` tinyint(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=14 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `state`
--

CREATE TABLE IF NOT EXISTS `state` (
  `idstate` int(11) NOT NULL AUTO_INCREMENT,
  `uf` varchar(2) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`idstate`),
  UNIQUE KEY `uf` (`uf`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `username` varchar(50) COLLATE utf8_bin NOT NULL,
  `phone` varchar(20) COLLATE utf8_bin NOT NULL,
  `password` varchar(32) COLLATE utf8_bin NOT NULL,
  `role` tinyint(5) NOT NULL,
  `status` tinyint(5) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=15 ;

ALTER TABLE `user` ADD `help` TINYINT(2) NOT NULL DEFAULT '1' AFTER `role`;

ALTER TABLE `user` CHANGE `help` `help` TINYINT(2) NOT NULL;
-- --------------------------------------------------------

--
-- Estrutura da tabela `visitor`
--

CREATE TABLE IF NOT EXISTS `visitor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_bin NOT NULL,
  `cpf` varchar(11) COLLATE utf8_bin NOT NULL,
  `rg` varchar(11) COLLATE utf8_bin NOT NULL,
  `phone` varchar(14) COLLATE utf8_bin NOT NULL,
  `maker` INT(11) COLLATE utf8_bin NOT NULL,
  `address` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cpf` (`cpf`,`rg`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=8 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;