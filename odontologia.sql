-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 21-Set-2023 às 18:55
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
DROP DATABASE IF EXISTS `odontologia`;
CREATE DATABASE IF NOT EXISTS `odontologia` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `odontologia`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id_admin_pk` int(11) NOT NULL,
  `telefone` varchar(11) DEFAULT NULL,
  `email` text,
  `nome` text,
  `senha` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `admin`
--

INSERT INTO `admin` (`id_admin_pk`, `telefone`, `email`, `nome`, `senha`) VALUES
(1, '09009001728', 'senac@senac.senac', 'Carlos', 'admin');

-- --------------------------------------------------------

--
-- Estrutura da tabela `consulta`
--

DROP TABLE IF EXISTS `consulta`;
CREATE TABLE `consulta` (
  `id_consulta_pk` int(11) NOT NULL,
  `id_dentista_fk` int(11) NOT NULL,
  `id_paciente_fk` int(11) NOT NULL,
  `diagnostico` text,
  `data` date DEFAULT NULL,
  `valor` decimal(10,2) DEFAULT NULL,
  `situacao` text,
  `hora` time DEFAULT NULL,
  `receita_medica` text,
  `descricao` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `dentista`
--

DROP TABLE IF EXISTS `dentista`;
CREATE TABLE `dentista` (
  `id_funcionario_pk` int(12) NOT NULL,
  `cpf` varchar(11) DEFAULT NULL,
  `especialidade` text,
  `nome` text,
  `endereco` text,
  `telefone` bigint(12) DEFAULT NULL,
  `email` text,
  `crm` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `dentista`
--

INSERT INTO `dentista` (`id_funcionario_pk`, `cpf`, `especialidade`, `nome`, `endereco`, `telefone`, `email`, `crm`) VALUES
(1, '11111111111', 'dentisto', 'juancho', 'Rua x Y', 123456789012, 'nombre@pepe.com', '123');

-- --------------------------------------------------------

--
-- Estrutura da tabela `exame`
--

DROP TABLE IF EXISTS `exame`;
CREATE TABLE `exame` (
  `id_examen_pk` int(11) NOT NULL,
  `id_dentista_fk` int(11) NOT NULL,
  `id_paciente_fk` int(11) NOT NULL,
  `tipo` text,
  `descricao` text,
  `resultado` text,
  `hora` time DEFAULT NULL,
  `data_agenda` date DEFAULT NULL,
  `imagem` longblob
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `paciente`
--

DROP TABLE IF EXISTS `paciente`;
CREATE TABLE `paciente` (
  `id_paciente_pk` int(11) NOT NULL,
  `nome` text,
  `telefone` varchar(11) DEFAULT NULL,
  `email` text,
  `cpf` bigint(11) DEFAULT NULL,
  `endereco` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin_pk`);

--
-- Indexes for table `consulta`
--
ALTER TABLE `consulta`
  ADD PRIMARY KEY (`id_consulta_pk`),
  ADD KEY `id_dentista_fk` (`id_dentista_fk`),
  ADD KEY `id_paciente_fk` (`id_paciente_fk`);

--
-- Indexes for table `dentista`
--
ALTER TABLE `dentista`
  ADD PRIMARY KEY (`id_funcionario_pk`);

--
-- Indexes for table `exame`
--
ALTER TABLE `exame`
  ADD PRIMARY KEY (`id_examen_pk`),
  ADD KEY `id_dentista_fk` (`id_dentista_fk`),
  ADD KEY `id_paciente_fk` (`id_paciente_fk`);

--
-- Indexes for table `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`id_paciente_pk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
