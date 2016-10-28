-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 28-Out-2016 às 02:53
-- Versão do servidor: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gerenciador`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `gerenciador`
--

CREATE TABLE IF NOT EXISTS `gerenciador` (
`id` int(11) NOT NULL,
  `tarefa` varchar(200) NOT NULL,
  `cliente` varchar(200) NOT NULL,
  `descricao` text NOT NULL,
  `prazo` date NOT NULL,
  `prioridade` int(11) NOT NULL,
  `concluido` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `gerenciador`
--

INSERT INTO `gerenciador` (`id`, `tarefa`, `cliente`, `descricao`, `prazo`, `prioridade`, `concluido`) VALUES
(2, 'erro BD', 'asdas', 'asdasdasd', '2016-10-28', 2, 0),
(3, 'verde', 'verde', 'verde', '2016-10-28', 1, 0),
(4, 'verde 01', 'verde 01', 'teste', '0000-00-00', 1, 0),
(5, 'altaaaaaaaaaaaaaaaaaaa', 'alta', 'altaaaaaaaaaaaaaaaa', '0000-00-00', 3, 0),
(6, 'media', 'media', 'media', '2016-10-21', 2, 0),
(7, 'erro BD', 'asdas', 'asdasdasd', '2016-10-27', 2, 1),
(8, 'verde', 'verde', 'verde', '0000-00-00', 1, 1),
(13, '001', '001', '001', '0000-00-00', 3, 1),
(14, '001', '001', '001', '0000-00-00', 3, 1),
(15, '0011', '001', '00111', '0000-00-00', 3, 1),
(17, 'ccccrrrrrrrrrrrrrrr', 'ccccrrrrrrrrrrrrrrrr', 'cccc', '0000-00-00', 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gerenciador`
--
ALTER TABLE `gerenciador`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gerenciador`
--
ALTER TABLE `gerenciador`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
