-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20-Set-2025 às 00:20
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `estacionamento_bd`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_cliente`
--

CREATE TABLE `tb_cliente` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ano_nasc` year(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `tb_cliente`
--

INSERT INTO `tb_cliente` (`id`, `nome`, `telefone`, `ano_nasc`) VALUES
(25, 'Leonardo', '32999988887', 1995),
(31, 'Dian', '55955887744', 1999),
(32, 'Lucas', '789445578', 1998),
(33, 'Tereza', '78441025', 1948),
(34, 'Gustavo', '32922558877', 2008),
(35, 'Andre', '8555226677', 2018),
(36, 'Teste', '558877', 1954),
(37, 'Tião', '14785296', 1989),
(38, 'Zé', '741258', 1956),
(39, 'Vinicius', '78965412', 1920),
(40, 'Tião', '32988887777', 1978),
(41, 'Antonio', '22977772222', 1945),
(42, 'Valmir', '35944553311', 1952),
(43, 'Nadia', '25977884411', 1980),
(44, 'Helena', '32911115555', 0000),
(45, 'Renan', '25977774444', 2002),
(46, 'Caio', '3255887744', 2004),
(47, 'Aparecida', '778899445566', 1930),
(48, 'Fabiana', '3588447711', 1989),
(49, 'Bruno', '14978542110', 2005);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_ocupacao`
--

CREATE TABLE `tb_ocupacao` (
  `id` int(11) NOT NULL,
  `id_vaga` int(11) NOT NULL,
  `id_veiculo` int(11) NOT NULL,
  `hora_entrada` timestamp NOT NULL DEFAULT current_timestamp(),
  `hora_saida` timestamp NULL DEFAULT NULL,
  `valor` decimal(10,2) DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `tb_ocupacao`
--

INSERT INTO `tb_ocupacao` (`id`, `id_vaga`, `id_veiculo`, `hora_entrada`, `hora_saida`, `valor`) VALUES
(2, 1, 7, '2025-09-17 22:57:23', '2025-09-18 23:43:43', '27.00'),
(3, 2, 8, '2025-09-17 22:57:23', '2025-09-18 23:43:44', '15.00'),
(4, 5, 17, '2025-09-18 23:37:56', '2025-09-18 23:43:44', '0.00'),
(5, 3, 17, '2025-09-18 23:41:20', NULL, '0.00'),
(6, 3, 17, '2025-09-18 23:43:01', NULL, '0.00'),
(7, 8, 17, '2025-09-18 23:45:31', '2025-09-18 23:47:12', '0.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_vaga`
--

CREATE TABLE `tb_vaga` (
  `id` int(11) NOT NULL,
  `situacao` tinyint(1) NOT NULL,
  `setor` char(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `tb_vaga`
--

INSERT INTO `tb_vaga` (`id`, `situacao`, `setor`, `numero`) VALUES
(1, 1, 'A', 1),
(2, 1, 'A', 2),
(3, 1, 'A', 3),
(4, 1, 'A', 4),
(5, 1, 'A', 5),
(6, 1, 'A', 6),
(7, 1, 'A', 7),
(8, 1, 'A', 8);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_veiculo`
--

CREATE TABLE `tb_veiculo` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `placa` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cor` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `tb_veiculo`
--

INSERT INTO `tb_veiculo` (`id`, `id_usuario`, `placa`, `cor`) VALUES
(7, 25, 'AAA-1111', 'Verde'),
(8, 33, 'BBB-2222', 'Azul'),
(17, 42, 'XYZ-2787', 'Amarelo'),
(18, 43, 'CCC-3333', 'Roxo'),
(19, 25, 'DDD-4444', 'Preto'),
(20, 47, 'ABC-1234', 'Prata'),
(21, 45, 'ZZZ-7894', 'Lilas'),
(22, 48, 'TTT-4598', 'Rosa'),
(23, 35, 'AGV-7845', 'Preto'),
(24, 49, 'QQQ-1111', 'Preto'),
(53, 42, 'EEE-5555', 'Amarelo');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_cliente`
--
ALTER TABLE `tb_cliente`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_ocupacao`
--
ALTER TABLE `tb_ocupacao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_vaga` (`id_vaga`),
  ADD KEY `id_veiculo` (`id_veiculo`);

--
-- Índices para tabela `tb_vaga`
--
ALTER TABLE `tb_vaga`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `setor` (`setor`,`numero`);

--
-- Índices para tabela `tb_veiculo`
--
ALTER TABLE `tb_veiculo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `placa` (`placa`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_cliente`
--
ALTER TABLE `tb_cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de tabela `tb_ocupacao`
--
ALTER TABLE `tb_ocupacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `tb_vaga`
--
ALTER TABLE `tb_vaga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `tb_veiculo`
--
ALTER TABLE `tb_veiculo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tb_ocupacao`
--
ALTER TABLE `tb_ocupacao`
  ADD CONSTRAINT `tb_ocupacao_ibfk_1` FOREIGN KEY (`id_vaga`) REFERENCES `tb_vaga` (`id`),
  ADD CONSTRAINT `tb_ocupacao_ibfk_2` FOREIGN KEY (`id_veiculo`) REFERENCES `tb_veiculo` (`id`);

--
-- Limitadores para a tabela `tb_veiculo`
--
ALTER TABLE `tb_veiculo`
  ADD CONSTRAINT `tb_veiculo_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `tb_cliente` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
