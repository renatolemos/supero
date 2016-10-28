-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 28-Out-2016 às 02:54
-- Versão do servidor: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `login_teste`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `login_teste`
--

CREATE TABLE IF NOT EXISTS `login_teste` (
`id` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `login_teste`
--

INSERT INTO `login_teste` (`id`, `usuario`, `senha`, `email`) VALUES
(1, 'teste', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'teste@teste.com.br'),
(2, 'renato', '123456', '09151a69bb02e2cde6efbde9f246c97704e4cab9'),
(3, 'admin', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'teste@teste.com.br');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login_teste`
--
ALTER TABLE `login_teste`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login_teste`
--
ALTER TABLE `login_teste`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
