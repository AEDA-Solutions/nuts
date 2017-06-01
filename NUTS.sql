-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 01-Jun-2017 às 04:20
-- Versão do servidor: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nuts`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `netdata`
--

CREATE TABLE `netdata` (
  `id` int(11) NOT NULL,
  `latitude` float DEFAULT NULL,
  `longitude` float DEFAULT NULL,
  `ping` float DEFAULT NULL,
  `packetloss` float DEFAULT NULL,
  `download_rate` float DEFAULT NULL,
  `upload_rate` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `netdata`
--

INSERT INTO `netdata` (`id`, `latitude`, `longitude`, `ping`, `packetloss`, `download_rate`, `upload_rate`) VALUES
(1, -15.8384, -48.0283, 192, 0, NULL, NULL),
(2, -15.8384, -48.0283, 173, 0, NULL, NULL),
(3, -15.8384, -48.0283, 158, 0, NULL, NULL),
(4, -15.8384, -48.0283, 202, 0, NULL, NULL),
(5, -15.764, -47.8722, 192, 0, NULL, NULL),
(6, -15.8385, -48.0283, 33, 0, NULL, NULL),
(7, -15.8385, -48.0283, 16, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` varchar(9) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL,
  `course` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `course`) VALUES
('103449130', 'Rebecca Cristina Lourenço de Andrade', 'rebecca.andrade@gmail.com', 'e358bf645a205cf15efa983b5517d945', 'Medicina'),
('113950380', 'Davi Feques Vale', 'davi.fv@gmail.com', '1c4648949a1578fdaf041059d25c2e1a', 'Engenharia Mecatrônica'),
('119340345', 'Rafaella Cristina Lourenço de Andrade', 'rafaella.cla@gmail.com', 'ef540053f05172603a1b503746239e7f', 'Direito'),
('123414123', 'Antonio Ribeiro Santos', 'antonio.ribeiro@gmail.com', '7bd751ea6c00606edb32a95684bcf7c1', 'Administração'),
('130266296', 'Mateus Moura Mesquita', 'mateus.mmm@hotmail.com', '7dee08598e0a7d4f558f5c61f0e1fd9c', 'Geologia'),
('140016295', 'André Luiz Lourenço de Andrade', 'andreanndrade10@gmail.com', '5765b9119834c0b14193f792ce86d0ff', 'Engenharia de Redes de Comunicação'),
('140356835', 'Fernando Queiroz Campelo', 'fernando_queiroz@hotmail.com', 'b492fc52b185dcd7e959e1eed980a55f', 'Engenharia de Redes de Comunicação'),
('151234094', 'Luiza Cunha Ramos de Lima', 'luiza.cunha@gmail.com', '23b59c15d55719b25b3c94f65b14e345', 'Direito'),
('173005124', 'Natalia Moura Resende', 'nat.mourauk@hotmail.com', '590fa20912f50ee3b4541e464c4b8451', 'Psicologia');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `netdata`
--
ALTER TABLE `netdata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `netdata`
--
ALTER TABLE `netdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
