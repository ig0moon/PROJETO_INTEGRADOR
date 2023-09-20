-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 20-Set-2023 às 22:26
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dentista`
--
ALTER TABLE `dentista`
  ADD PRIMARY KEY (`id_funcionario_pk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
