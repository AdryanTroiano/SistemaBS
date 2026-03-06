-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06/03/2026 às 01:30
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
-- Banco de dados: `cadastro`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `cadastrobs`
--

CREATE TABLE `cadastrobs` (
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
  `ts` varchar(4) NOT NULL,
  `datedonation` date NOT NULL,
  `peso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cadastrobs`
--

INSERT INTO `cadastrobs` (`id`, `nome`, `sexo`, `cpf`, `telefone`, `email`, `endereco`, `numero`, `cep`, `complemento`, `bairro`, `nasc`, `ts`, `datedonation`, `peso`) VALUES
(1, 'José pereira', 'M', '123.456.789-10', '(12) 34567-8901', 'jose@gmail.com', 'Avenida Herculano Rangel', 12, '15902-024', '', 'Jardim Contendas', '1967-02-05', 'O+', '2025-03-05', 120),
(2, 'Luis Almeida Campos', 'M', '123.443.323-33', '(34) 41332-3233', 'luiscampos@outlook.com', 'Praça Doutor Fued Simão', 67, '15904-012', '', 'Vila Nova', '1989-06-09', 'O+', '2024-08-05', 0),
(3, 'Maria Clara', 'M', '031.302.323-31', '(16) 99323-3323', 'mariaclara@outlook.com', 'Avenida Brigadeiro Faria Lima', 12, '15090-000', '', 'Vila São José', '2000-08-20', 'O+', '2024-05-05', 0),
(4, 'Leticia de Oliveira', 'F', '132.145.151-51', '(12) 42424-4444', 'leticia@gmail.com', 'RUA DOUTOR JOAQUIM MACHADO FARO ROLEMBERG', 37, '15903-020', '', 'Jardim São Luiz', '2003-09-22', 'O+', '2024-11-05', 0),
(5, 'Rui da Silva', 'M', '141.924.924-94', '(16) 93929-3929', 'rui@gmail.com', 'Rua Dona Elvira Sargi Monteiro', 31, '15901-024', '', 'Jardim Alvorada', '1979-08-22', 'O+', '2024-10-27', 0),
(6, 'Pintosvaldo da Silva', 'M', '482.884.244-24', '(16) 99233-2323', 'pintosvaldo@gmail.com', 'Avenida Vicente José Parise', 189, '15901-000', '', 'Vila Portuguesa', '1999-10-07', 'O+', '2024-01-05', 0),
(7, 'Raimunda Souza', 'F', '131.231.231-23', '(91) 39123-9821', 'raimunda@gmail.com', 'Rua Doutor Manoel Fadigas de Souza', 123, '15901-020', '', 'Jardim Alvorada', '2000-11-28', 'O+', '2023-06-05', 0),
(8, 'Roberto Felipe', 'M', '812.831.283-18', '(16) 99308-9219', 'roberto@gmail.com', 'Rua Visconde do Rio Branco', 37, '15900-015', '', 'Centro', '1980-02-20', 'O+', '2024-11-05', 0),
(9, 'Roberto Souza', 'M', '131.231.313-13', '(31) 23131-3131', 'robertao@gmail.com', 'Praça Tókio', 12, '15904-021', '', 'Parque Residencial Laranjeiras I', '1959-11-05', 'O+', '2024-11-05', 0),
(10, 'Deide Costa', 'F', '123.123.123-31', '(81) 38838-3232', 'deidecosta@gmail.com', 'Rua Dalmo Braga', 1244, '15902-044', '', 'Jardim Contendas', '1999-09-12', 'A+', '2024-11-05', 0),
(11, 'Socorro da Silva', 'M', '184.848.448-48', '(16) 99323-3323', 'socorro@gmail.com', 'Rua Antonio Palópoli', 12, '15901-054', '', 'Vila Sargi', '1978-04-12', 'A-', '2024-11-05', 0),
(12, 'JANAINA MAURA TROIANO', 'M', '132.322.131-23', '(16) 99308-9219', 'adryantroian@gmail.com', 'Rua Doutor Joaquim Machado Faro Rolemberg', 37, '15905-020', '', 'Jardim Bela Vista', '2024-11-28', 'O+', '2024-11-06', 0),
(13, 'thais', 'F', '231.321.123-21', '(12) 13212-1213', 'sdsdasd@gmail.com', 'Rua Umbelina Cabral de Mello', 12, '15902-130', '', 'Jardim Taquarão II', '2025-06-06', 'N.A', '2025-06-06', 0),
(14, 'luis', 'M', '515.123.213-12', '(16) 99933-2323', 'luis@gmail.com', 'Rua Doutor Joaquim Machado Faro Rolemberg', 35, '15905-020', '', 'Jardim Bela Vista', '2025-06-06', 'N.A', '2025-06-06', 0),
(15, 'adryan', 'M', '213.131.232-13', '(12) 32121-33', 'adryantroian@gmail.com', 'Rua Professor Luiz Antônio Fragoso', 12, '15902-020', '', 'Jardim Contendas', '2005-06-13', 'A+', '2026-03-15', 50);

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
(1, 15, 1, '2026-03-12', 400),
(2, 15, 1, '2026-03-02', 500),
(3, 15, 4, '2026-03-02', 200),
(4, 15, 1, '2026-03-15', 500),
(5, 1, 2, '2026-03-05', 5000),
(6, 1, 2, '2025-03-05', 1000);

-- --------------------------------------------------------

--
-- Estrutura para tabela `estoque_sangue`
--

CREATE TABLE `estoque_sangue` (
  `tipo_sangue` varchar(3) NOT NULL,
  `quantidade` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `estoque_sangue`
--

INSERT INTO `estoque_sangue` (`tipo_sangue`, `quantidade`) VALUES
('A+', 506),
('A-', 10),
('AB+', 11),
('AB-', 12),
('B+', 5),
('B-', 2),
('O+', 6020),
('O-', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `logs_estoque`
--

CREATE TABLE `logs_estoque` (
  `id` int(11) NOT NULL,
  `funcionario` varchar(100) DEFAULT NULL,
  `acao` varchar(50) DEFAULT NULL,
  `tipo_sangue` varchar(4) DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `data_hora` datetime DEFAULT current_timestamp(),
  `ip` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `logs_estoque`
--

INSERT INTO `logs_estoque` (`id`, `funcionario`, `acao`, `tipo_sangue`, `quantidade`, `data_hora`, `ip`) VALUES
(2, 'adryan', 'RETIRADA', 'A+', 100, '2026-03-05 18:30:48', '::1'),
(3, 'adryan', 'DOACAO', 'O+', 5000, '2026-03-05 18:39:27', '::1'),
(4, 'adryan', 'DOACAO', 'O+', 1000, '2026-03-05 18:47:28', '::1');

-- --------------------------------------------------------

--
-- Estrutura para tabela `retiradas`
--

CREATE TABLE `retiradas` (
  `id` int(10) UNSIGNED NOT NULL,
  `tipo_sangue` varchar(4) NOT NULL,
  `quantidade_ml` int(11) NOT NULL,
  `data_retirada` date NOT NULL,
  `destino` varchar(100) DEFAULT NULL,
  `observacao` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `retiradas`
--

INSERT INTO `retiradas` (`id`, `tipo_sangue`, `quantidade_ml`, `data_retirada`, `destino`, `observacao`, `created_at`) VALUES
(1, 'A+', 500, '2026-03-05', 'Hospital Santa Casa', '', '2026-03-05 21:17:41'),
(2, 'A+', 100, '2026-03-13', 'Hospital santa casa', '', '2026-03-05 21:28:31'),
(3, 'A+', 100, '2026-03-05', 'Hospital santa casa', '', '2026-03-05 21:30:48');

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
(4, 'UBS Central');

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
-- Índices de tabela `cadastrobs`
--
ALTER TABLE `cadastrobs`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `doacoes`
--
ALTER TABLE `doacoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_doador` (`doador_id`),
  ADD KEY `fk_ubs` (`ubs_id`);

--
-- Índices de tabela `estoque_sangue`
--
ALTER TABLE `estoque_sangue`
  ADD PRIMARY KEY (`tipo_sangue`);

--
-- Índices de tabela `logs_estoque`
--
ALTER TABLE `logs_estoque`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `retiradas`
--
ALTER TABLE `retiradas`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT de tabela `cadastrobs`
--
ALTER TABLE `cadastrobs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `doacoes`
--
ALTER TABLE `doacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `logs_estoque`
--
ALTER TABLE `logs_estoque`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `retiradas`
--
ALTER TABLE `retiradas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `ubs`
--
ALTER TABLE `ubs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  ADD CONSTRAINT `fk_doador` FOREIGN KEY (`doador_id`) REFERENCES `cadastrobs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_ubs` FOREIGN KEY (`ubs_id`) REFERENCES `ubs` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
