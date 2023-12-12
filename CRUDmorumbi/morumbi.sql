-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 30/10/2023 às 05:04
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `morumbi`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `idolos`
--

CREATE TABLE `idolos` (
  `id` int(11) NOT NULL,
  `nomeIdolo` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `idolos`
--

INSERT INTO `idolos` (`id`, `nomeIdolo`) VALUES
(1, 'Rogério Ceni'),
(2, 'Lugano'),
(3, 'Cafu'),
(4, 'Luis Fabiano'),
(5, 'Mineiro'),
(6, 'Hernanes'),
(7, 'Muller'),
(8, 'Rai'),
(9, 'Lucas Moura'),
(10, 'Rafinha'),
(11, 'Arboleda'),
(12, 'Calleri'),
(13, 'Luciano');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipovisita`
--

CREATE TABLE `tipovisita` (
  `id` int(11) NOT NULL,
  `descVisita` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tipovisita`
--

INSERT INTO `tipovisita` (`id`, `descVisita`) VALUES
(1, 'Jogar no Morumbi'),
(4, 'Ensaio Fotografico'),
(5, 'Tour no Morumbi');

-- --------------------------------------------------------

--
-- Estrutura para tabela `visita`
--

CREATE TABLE `visita` (
  `id` int(11) NOT NULL,
  `nomeVisitante` varchar(70) NOT NULL,
  `cpf` char(11) DEFAULT NULL,
  `dataVisita` date NOT NULL,
  `id_idolos` int(11) NOT NULL,
  `id_tipoVisita` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `visita`
--

INSERT INTO `visita` (`id`, `nomeVisitante`, `cpf`, `dataVisita`, `id_idolos`, `id_tipoVisita`) VALUES
(10, 'Batima', '12345678910', '2005-05-20', 4, 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `idolos`
--
ALTER TABLE `idolos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tipovisita`
--
ALTER TABLE `tipovisita`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `visita`
--
ALTER TABLE `visita`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_idolos` (`id_idolos`),
  ADD KEY `fk_tipoVisita` (`id_tipoVisita`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `idolos`
--
ALTER TABLE `idolos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `tipovisita`
--
ALTER TABLE `tipovisita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `visita`
--
ALTER TABLE `visita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `visita`
--
ALTER TABLE `visita`
  ADD CONSTRAINT `fk_idolos` FOREIGN KEY (`id_idolos`) REFERENCES `idolos` (`id`),
  ADD CONSTRAINT `fk_tipoVisita` FOREIGN KEY (`id_tipoVisita`) REFERENCES `tipovisita` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
