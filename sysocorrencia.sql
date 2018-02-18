-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 18-Fev-2018 às 19:26
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
  `emp_municipio` varchar(70) DEFAULT NULL,
  `emp_estado` varchar(20) DEFAULT NULL,
  `emp_telefone` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `empresa`
--

INSERT INTO `empresa` (`emp_id`, `emp_desc`, `emp_municipio`, `emp_estado`, `emp_telefone`) VALUES
(124, 'Serluz - Unidade 1', 'LuziÃ¢nia', 'DF', '(61)3321-7200'),
(125, 'Serluz - Unidade 2', 'LuziÃ¢nia', 'DF', '(61)3321-7200'),
(126, 'Serluz - Unidade 4', 'LuziÃ¢nia', 'DF', '(61)3321-7200'),
(128, 'Serluz - Unidade 3', 'LuziÃ¢nia', 'DF', '(61)3321-7200');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ocorrencia`
--

CREATE TABLE `ocorrencia` (
  `id` int(11) NOT NULL,
  `responsavel` varchar(70) NOT NULL,
  `problema` varchar(100) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `localidade` varchar(100) NOT NULL,
  `status` char(1) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `usu_responsavel` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `ocorrencia`
--

INSERT INTO `ocorrencia` (`id`, `responsavel`, `problema`, `descricao`, `localidade`, `status`, `usuario`, `usu_responsavel`) VALUES
(5, 'Luciana', 'Retornar LigaÃ§Ã£o', ' ', 'Serluz - Unidade 1 - LuziÃ¢nia/DF', 'F', 'lucas', ' '),
(8, 'Paulo', 'InstalaÃ§Ã£o', ' ', 'Serluz - Unidade 1 - LuziÃ¢nia/DF', 'E', 'lucas', 'lucas'),
(9, 'Justine', 'InstalaÃ§Ã£o', '  ', 'Serluz - Unidade 4 - LuziÃ¢nia/DF', 'A', 'lucas', ' '),
(11, ' ', 'Retornar LigaÃ§Ã£o', ' ', 'Serluz - Unidade 1 - LuziÃ¢nia/DF', 'A', 'lucas', 'lucas'),
(12, ' ', 'Retornar LigaÃ§Ã£o', ' ', 'Serluz - Unidade 1 - LuziÃ¢nia/DF', 'A', 'lucas', 'lucas'),
(13, ' ', 'Bug', ' ', 'Serluz - Unidade 2 - LuziÃ¢nia/DF', 'A', 'lucas', 'lucas'),
(14, ' ', 'Suporte In Loco', ' ', 'Serluz - Unidade 1 - LuziÃ¢nia/DF', 'A', 'lucas', 'lucas'),
(15, 'Paulo', 'Retornar LigaÃ§Ã£o', 'j', 'Serluz - Unidade 3 - LuziÃ¢nia/DF', 'E', 'lucas', ' ');

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
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;
--
-- AUTO_INCREMENT for table `ocorrencia`
--
ALTER TABLE `ocorrencia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
