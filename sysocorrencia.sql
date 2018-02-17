-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 17-Fev-2018 às 22:38
-- Versão do servidor: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sysocorrencia`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

CREATE TABLE `empresa` (
  `emp_id` int(11) NOT NULL,
  `emp_desc` varchar(200) DEFAULT NULL,
  `emp_muncipio` varchar(70) DEFAULT NULL,
  `emp_estado` varchar(20) DEFAULT NULL,
  `emp_telefone` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `empresa`
--

INSERT INTO `empresa` (`emp_id`, `emp_desc`, `emp_muncipio`, `emp_estado`, `emp_telefone`) VALUES
(52, 'Teste', 'Teste', 'GO', '1234567890'),
(100, 'Teste', 'Teste', 'GO', '1234567890');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ocorrencia`
--

CREATE TABLE `ocorrencia` (
  `id` int(11) NOT NULL,
  `responsavel` varchar(70) NOT NULL,
  `problema` varchar(70) NOT NULL,
  `descricao` varchar(400) NOT NULL,
  `localidade` varchar(70) NOT NULL,
  `status` char(1) NOT NULL,
  `usuario` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `usu_id` int(11) NOT NULL,
  `usu_nome` varchar(70) DEFAULT NULL,
  `usu_username` varchar(70) DEFAULT NULL,
  `usu_password` varchar(200) DEFAULT NULL,
  `usu_depart` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`usu_id`, `usu_nome`, `usu_username`, `usu_password`, `usu_depart`) VALUES
(126, 'Lucas', 'lucas', 'YWRtNzIwMA==', 'Suporte'),
(127, 'Thiago', 'thiago', 'YWRtNzIwMA==', 'Suporte'),
(128, 'Marcelo', 'marcelo', 'YWRtNzIwMA==', 'Desenvolvimento'),
(129, 'Nelma', 'nelma', 'YWRtNzIwMA==', 'Financeiro'),
(130, 'Josimar', 'josimar', 'YWRtNzIwMA==', 'Suporte'),
(131, 'Igor', 'igor', 'YWRtNzIwMA==', 'Desenvolvimento');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `ocorrencia`
--
ALTER TABLE `ocorrencia`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usu_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `empresa`
--
ALTER TABLE `empresa`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT for table `ocorrencia`
--
ALTER TABLE `ocorrencia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
