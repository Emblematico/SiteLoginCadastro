-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 12-Fev-2020 às 04:37
-- Versão do servidor: 10.4.6-MariaDB
-- versão do PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bdusuario`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbnivelacesso`
--

CREATE TABLE `tbnivelacesso` (
  `idNivel` int(11) NOT NULL,
  `Nivel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbnivelacesso`
--

INSERT INTO `tbnivelacesso` (`idNivel`, `Nivel`) VALUES
(1, 2),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbusuario`
--

CREATE TABLE `tbusuario` (
  `idUser` int(11) NOT NULL,
  `Usuario` varchar(50) NOT NULL,
  `Email` varchar(70) NOT NULL,
  `Senha` varchar(50) NOT NULL,
  `idNivel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbusuario`
--

INSERT INTO `tbusuario` (`idUser`, `Usuario`, `Email`, `Senha`, `idNivel`) VALUES
(3, 'KGIGA', 'giga@gmail.com', '157', 4),
(5, 'Alex', 'lopees157@gmail.com', '2345', 2),
(15, 'GIGA', '123@gmail.com', '12345', 2),
(29, 'K', 'aleK123@gmail.com', '099876', 9);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tbnivelacesso`
--
ALTER TABLE `tbnivelacesso`
  ADD PRIMARY KEY (`idNivel`);

--
-- Índices para tabela `tbusuario`
--
ALTER TABLE `tbusuario`
  ADD PRIMARY KEY (`idUser`),
  ADD KEY `fk_idnivel` (`idNivel`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbnivelacesso`
--
ALTER TABLE `tbnivelacesso`
  MODIFY `idNivel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `tbusuario`
--
ALTER TABLE `tbusuario`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tbusuario`
--
ALTER TABLE `tbusuario`
  ADD CONSTRAINT `fk_idnivel` FOREIGN KEY (`idNivel`) REFERENCES `tbnivelacesso` (`idNivel`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
