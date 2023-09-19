-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 19-Set-2023 às 20:18
-- Versão do servidor: 5.7.17
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `odontologia`
--
CREATE DATABASE IF NOT EXISTS `odontologia` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `odontologia`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin_pk` int(11) NOT NULL,
  `telefone` varchar(11) DEFAULT NULL,
  `email` text,
  `nome` text,
  `senha` text,
  PRIMARY KEY (`id_admin_pk`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `consulta`
--

CREATE TABLE IF NOT EXISTS `consulta` (
  `id_consulta_pk` int(11) NOT NULL,
  `id_dentista_fk` int(11) NOT NULL,
  `id_paciente_fk` int(11) NOT NULL,
  `diagnostico` text,
  `data` date DEFAULT NULL,
  `valor` decimal(10,2) DEFAULT NULL,
  `situacao` text,
  `hora` time DEFAULT NULL,
  `receita_medica` text,
  `descricao` text,
  PRIMARY KEY (`id_consulta_pk`),
  KEY `id_dentista_fk` (`id_dentista_fk`),
  KEY `id_paciente_fk` (`id_paciente_fk`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `dentista`
--

CREATE TABLE IF NOT EXISTS `dentista` (
  `id_funcionario_pk` int(11) NOT NULL,
  `cpf` varchar(11) DEFAULT NULL,
  `especialidade` text,
  `nome` text,
  `endereco` text,
  `telefone` int(11) DEFAULT NULL,
  `email` text,
  `crm` text,
  PRIMARY KEY (`id_funcionario_pk`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `exame`
--

CREATE TABLE IF NOT EXISTS `exame` (
  `id_examen_pk` int(11) NOT NULL,
  `id_dentista_fk` int(11) NOT NULL,
  `id_paciente_fk` int(11) NOT NULL,
  `tipo` text,
  `descricao` text,
  `resultado` text,
  `hora` time DEFAULT NULL,
  `data_agenda` date DEFAULT NULL,
  `imagem` longblob,
  PRIMARY KEY (`id_examen_pk`),
  KEY `id_dentista_fk` (`id_dentista_fk`),
  KEY `id_paciente_fk` (`id_paciente_fk`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `paciente`
--

CREATE TABLE IF NOT EXISTS `paciente` (
  `id_paciente_pk` int(11) NOT NULL,
  `nome` text,
  `telefone` varchar(11) DEFAULT NULL,
  `email` text,
  `cpf` bigint(11) DEFAULT NULL,
  `endereco` text,
  PRIMARY KEY (`id_paciente_pk`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
