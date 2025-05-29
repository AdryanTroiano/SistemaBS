-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29/05/2025 às 16:06
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
  `datedonation` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cadastrobs`
--

INSERT INTO `cadastrobs` (`id`, `nome`, `sexo`, `cpf`, `telefone`, `email`, `endereco`, `numero`, `cep`, `complemento`, `bairro`, `nasc`, `ts`, `datedonation`) VALUES
(1, 'José pereira', 'M', '123.456.789-10', '(12) 34567-8901', 'jose@gmail.com', 'Avenida Herculano Rangel', 12, '15902-024', '', 'Jardim Contendas', '1967-02-05', 'O+', '2024-11-05'),
(2, 'Luis Almeida Campos', 'M', '123.443.323-33', '(34) 41332-3233', 'luiscampos@outlook.com', 'Praça Doutor Fued Simão', 67, '15904-012', '', 'Vila Nova', '1989-06-09', 'O+', '2024-08-05'),
(3, 'Maria Clara', 'M', '031.302.323-31', '(16) 99323-3323', 'mariaclara@outlook.com', 'Avenida Brigadeiro Faria Lima', 12, '15090-000', '', 'Vila São José', '2000-08-20', 'O+', '2024-05-05'),
(4, 'Leticia de Oliveira', 'F', '132.145.151-51', '(12) 42424-4444', 'leticia@gmail.com', 'RUA DOUTOR JOAQUIM MACHADO FARO ROLEMBERG', 37, '15903-020', '', 'Jardim São Luiz', '2003-09-22', 'O+', '2024-11-05'),
(5, 'Rui da Silva', 'M', '141.924.924-94', '(16) 93929-3929', 'rui@gmail.com', 'Rua Dona Elvira Sargi Monteiro', 31, '15901-024', '', 'Jardim Alvorada', '1979-08-22', 'O+', '2024-10-27'),
(6, 'Pintosvaldo da Silva', 'M', '482.884.244-24', '(16) 99233-2323', 'pintosvaldo@gmail.com', 'Avenida Vicente José Parise', 189, '15901-000', '', 'Vila Portuguesa', '1999-10-07', 'O+', '2024-01-05'),
(7, 'Raimunda Souza', 'F', '131.231.231-23', '(91) 39123-9821', 'raimunda@gmail.com', 'Rua Doutor Manoel Fadigas de Souza', 123, '15901-020', '', 'Jardim Alvorada', '2000-11-28', 'O+', '2023-06-05'),
(8, 'Roberto Felipe', 'M', '812.831.283-18', '(16) 99308-9219', 'roberto@gmail.com', 'Rua Visconde do Rio Branco', 37, '15900-015', '', 'Centro', '1980-02-20', 'O+', '2024-11-05'),
(9, 'Roberto Souza', 'M', '131.231.313-13', '(31) 23131-3131', 'robertao@gmail.com', 'Praça Tókio', 12, '15904-021', '', 'Parque Residencial Laranjeiras I', '1959-11-05', 'O+', '2024-11-05'),
(10, 'Deide Costa', 'F', '123.123.123-31', '(81) 38838-3232', 'deidecosta@gmail.com', 'Rua Dalmo Braga', 1244, '15902-044', '', 'Jardim Contendas', '1999-09-12', 'A+', '2024-11-05'),
(11, 'Socorro da Silva', 'M', '184.848.448-48', '(16) 99323-3323', 'socorro@gmail.com', 'Rua Antonio Palópoli', 12, '15901-054', '', 'Vila Sargi', '1978-04-12', 'A-', '2024-11-05'),
(12, 'JANAINA MAURA TROIANO', 'M', '132.322.131-23', '(16) 99308-9219', 'adryantroian@gmail.com', 'Rua Doutor Joaquim Machado Faro Rolemberg', 37, '15905-020', '', 'Jardim Bela Vista', '2024-11-28', 'O+', '2024-11-06');

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
('A+', 6),
('A-', 10),
('AB+', 11),
('AB-', 12),
('B+', 4),
('B-', 2),
('O+', 20),
('O-', 1);

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
-- Índices de tabela `estoque_sangue`
--
ALTER TABLE `estoque_sangue`
  ADD PRIMARY KEY (`tipo_sangue`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
