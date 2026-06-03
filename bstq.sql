-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03/06/2026 às 02:42
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bstq`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `doacoes`
--

CREATE TABLE `doacoes` (
  `id` int(11) NOT NULL,
  `doador_id` int(10) UNSIGNED NOT NULL,
  `ubs_id` int(11) NOT NULL,
  `data_doacao` date NOT NULL,
  `quantidade_ml` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `doacoes`
--

INSERT INTO `doacoes` (`id`, `doador_id`, `ubs_id`, `data_doacao`, `quantidade_ml`) VALUES
(7, 16, 5, '2026-06-02', 10000);

-- --------------------------------------------------------

--
-- Estrutura para tabela `doadores`
--

CREATE TABLE `doadores` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(45) NOT NULL,
  `sexo` char(1) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `numero` int(6) NOT NULL,
  `cep` varchar(20) NOT NULL,
  `complemento` varchar(100) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `nasc` date NOT NULL,
  `datedonation` date NOT NULL,
  `peso` int(11) NOT NULL,
  `tipo_sangue_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `doadores`
--

INSERT INTO `doadores` (`id`, `nome`, `sexo`, `cpf`, `telefone`, `email`, `endereco`, `numero`, `cep`, `complemento`, `bairro`, `nasc`, `datedonation`, `peso`, `tipo_sangue_id`) VALUES
(16, 'Ädryan', 'M', '519.872.868-39', '(16) 99308-9219', 'adryantroian@gmail.com', 'Rua Doutor Joaquim Machado Faro Rolemberg', 37, '15905-020', '', 'Jardim Bela Vista', '2005-07-26', '2026-06-02', 80, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `estoque_sangue`
--

CREATE TABLE `estoque_sangue` (
  `id` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL DEFAULT 0,
  `tipo_sangue_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `estoque_sangue`
--

INSERT INTO `estoque_sangue` (`id`, `quantidade`, `tipo_sangue_id`) VALUES
(1, 506, 1),
(2, 10, 2),
(3, 11, 5),
(4, 12, 6),
(5, 5, 3),
(6, 2, 4),
(7, 6020, 7),
(8, 1, 8);

-- --------------------------------------------------------

--
-- Estrutura para tabela `logs_estoque`
--

CREATE TABLE `logs_estoque` (
  `id` int(11) NOT NULL,
  `acao` varchar(50) DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `data_hora` datetime DEFAULT current_timestamp(),
  `ip` varchar(50) DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `tipo_sangue_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `logs_estoque`
--

INSERT INTO `logs_estoque` (`id`, `acao`, `quantidade`, `data_hora`, `ip`, `usuario_id`, `tipo_sangue_id`) VALUES
(2, 'RETIRADA', 100, '2026-03-05 18:30:48', '::1', 1, 1),
(3, 'DOACAO', 5000, '2026-03-05 18:39:27', '::1', 1, 7),
(4, 'DOACAO', 1000, '2026-03-05 18:47:28', '::1', 1, 7),
(5, 'DOACAO', 10000, '2026-06-02 21:40:09', '::1', 1, 1),
(6, 'RETIRADA', 10000, '2026-06-02 21:40:43', '::1', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `retiradas`
--

CREATE TABLE `retiradas` (
  `id` int(10) UNSIGNED NOT NULL,
  `quantidade_ml` int(11) NOT NULL,
  `data_retirada` date NOT NULL,
  `observacao` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `tipo_sangue_id` int(11) DEFAULT NULL,
  `ubs_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `retiradas`
--

INSERT INTO `retiradas` (`id`, `quantidade_ml`, `data_retirada`, `observacao`, `created_at`, `tipo_sangue_id`, `ubs_id`) VALUES
(1, 500, '2026-03-05', '', '2026-03-05 21:17:41', 1, 4),
(2, 100, '2026-03-13', '', '2026-03-05 21:28:31', 1, 4),
(3, 100, '2026-03-05', '', '2026-03-05 21:30:48', 1, 4),
(4, 10000, '2026-06-02', 'Sei la vei', '2026-06-03 00:40:43', 1, 5);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipos_sangue`
--

CREATE TABLE `tipos_sangue` (
  `id` int(11) NOT NULL,
  `tipo` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tipos_sangue`
--

INSERT INTO `tipos_sangue` (`id`, `tipo`) VALUES
(1, 'A+'),
(2, 'A-'),
(5, 'AB+'),
(6, 'AB-'),
(3, 'B+'),
(4, 'B-'),
(7, 'O+'),
(8, 'O-');

-- --------------------------------------------------------

--
-- Estrutura para tabela `ubs`
--

CREATE TABLE `ubs` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `ubs`
--

INSERT INTO `ubs` (`id`, `nome`) VALUES
(1, 'UBS Norte'),
(2, 'UBS Leste'),
(3, 'UBS Oeste'),
(4, 'UBS Central'),
(5, 'Hospital Santa Casa');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `nivel` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `email`, `senha`, `nivel`) VALUES
(1, 'adryan', 'adryantroian@gmail.com', '$2y$10$1DuuMzgaLNC5053t6PS3xOLFwSReD0GA7wdYulYCRvRTyJQi9Yq9O', 'admin'),
(2, 'heliel', 'heliel@gmail.com', '$2y$10$efUDAxnMM8bsFqFeBvUVNuE6OetsXzgcxf6TWTT9x.nCi7zDeMvgi', '0');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `doacoes`
--
ALTER TABLE `doacoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_doador` (`doador_id`),
  ADD KEY `fk_ubs` (`ubs_id`);

--
-- Índices de tabela `doadores`
--
ALTER TABLE `doadores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_doadores_tipo_sangue` (`tipo_sangue_id`);

--
-- Índices de tabela `estoque_sangue`
--
ALTER TABLE `estoque_sangue`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_estoque_tipo_sangue` (`tipo_sangue_id`);

--
-- Índices de tabela `logs_estoque`
--
ALTER TABLE `logs_estoque`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_logs_usuario` (`usuario_id`),
  ADD KEY `fk_logs_tipo_sangue` (`tipo_sangue_id`);

--
-- Índices de tabela `retiradas`
--
ALTER TABLE `retiradas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_retiradas_tipo_sangue` (`tipo_sangue_id`),
  ADD KEY `fk_retiradas_ubs` (`ubs_id`);

--
-- Índices de tabela `tipos_sangue`
--
ALTER TABLE `tipos_sangue`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tipo` (`tipo`);

--
-- Índices de tabela `ubs`
--
ALTER TABLE `ubs`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `doacoes`
--
ALTER TABLE `doacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `doadores`
--
ALTER TABLE `doadores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `estoque_sangue`
--
ALTER TABLE `estoque_sangue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `logs_estoque`
--
ALTER TABLE `logs_estoque`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `retiradas`
--
ALTER TABLE `retiradas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tipos_sangue`
--
ALTER TABLE `tipos_sangue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `ubs`
--
ALTER TABLE `ubs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `doacoes`
--
ALTER TABLE `doacoes`
  ADD CONSTRAINT `fk_doador` FOREIGN KEY (`doador_id`) REFERENCES `doadores` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_ubs` FOREIGN KEY (`ubs_id`) REFERENCES `ubs` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `doadores`
--
ALTER TABLE `doadores`
  ADD CONSTRAINT `fk_doadores_tipo_sangue` FOREIGN KEY (`tipo_sangue_id`) REFERENCES `tipos_sangue` (`id`);

--
-- Restrições para tabelas `estoque_sangue`
--
ALTER TABLE `estoque_sangue`
  ADD CONSTRAINT `fk_estoque_tipo_sangue` FOREIGN KEY (`tipo_sangue_id`) REFERENCES `tipos_sangue` (`id`);

--
-- Restrições para tabelas `logs_estoque`
--
ALTER TABLE `logs_estoque`
  ADD CONSTRAINT `fk_logs_tipo_sangue` FOREIGN KEY (`tipo_sangue_id`) REFERENCES `tipos_sangue` (`id`),
  ADD CONSTRAINT `fk_logs_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);

--
-- Restrições para tabelas `retiradas`
--
ALTER TABLE `retiradas`
  ADD CONSTRAINT `fk_retiradas_tipo_sangue` FOREIGN KEY (`tipo_sangue_id`) REFERENCES `tipos_sangue` (`id`),
  ADD CONSTRAINT `fk_retiradas_ubs` FOREIGN KEY (`ubs_id`) REFERENCES `ubs` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
