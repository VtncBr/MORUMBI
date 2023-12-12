-- Active: 1694899644536@@127.0.0.1@3306@morumbi
--
-- Banco de dados: `visitamorumbi`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `idolos`
--

CREATE TABLE `idolos` (
  `id` int(11) NOT NULL,
  `nomeIdolo` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `idolos`
--

INSERT INTO `idolos` (`id`, `nomeIdolo`) VALUES
(1, 'Rogério Ceni');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipovisita`
--

CREATE TABLE `tipovisita` (
  `id` int(11) NOT NULL,
  `descVisita` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tipovisita`
--

INSERT INTO `tipovisita` (`id`, `descVisita`) VALUES
(1, 'Jogar bola');

-- --------------------------------------------------------

--
-- Estrutura da tabela `visita`
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
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `idolos`
--
ALTER TABLE `idolos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tipovisita`
--
ALTER TABLE `tipovisita`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `visita`
--
ALTER TABLE `visita`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_idolos` (`id_idolos`),
  ADD KEY `fk_tipoVisita` (`id_tipoVisita`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `idolos`
--
ALTER TABLE `idolos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tipovisita`
--
ALTER TABLE `tipovisita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `visita`
--
ALTER TABLE `visita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `visita`
--
ALTER TABLE `visita`
  ADD CONSTRAINT `fk_idolos` FOREIGN KEY (`id_idolos`) REFERENCES `idolos` (`id`),
  ADD CONSTRAINT `fk_tipoVisita` FOREIGN KEY (`id_tipoVisita`) REFERENCES `tipovisita` (`id`);
COMMIT;