-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 08/08/2012 às 12:12:32
-- Versão do Servidor: 5.5.25a
-- Versão do PHP: 5.3.15

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `lliure`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `ll_faqplus_categorias`
--

CREATE TABLE IF NOT EXISTS `ll_faqplus_categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `categoria` int(11) DEFAULT NULL,
  `permissoes` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `categoria` (`categoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ll_faqplus_perguntas`
--

CREATE TABLE IF NOT EXISTS `ll_faqplus_perguntas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `resposta` text,
  `data` varchar(50) DEFAULT NULL,
  `data_up` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `categoria` (`categoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Restrições para as tabelas dumpadas
--

--
-- Restrições para a tabela `ll_faqplus_categorias`
--
ALTER TABLE `ll_faqplus_categorias`
  ADD CONSTRAINT `ll_faqplus_categorias_ibfk_1` FOREIGN KEY (`categoria`) REFERENCES `ll_faqplus_categorias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para a tabela `ll_faqplus_perguntas`
--
ALTER TABLE `ll_faqplus_perguntas`
  ADD CONSTRAINT `ll_faqplus_perguntas_ibfk_1` FOREIGN KEY (`categoria`) REFERENCES `ll_faqplus_categorias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
