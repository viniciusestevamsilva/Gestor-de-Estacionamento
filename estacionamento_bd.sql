-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 05-Set-2025 às 00:28
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
-- Estrutura da tabela `tb_ocupacao`
--

CREATE TABLE `tb_ocupacao` (
  `id` int(11) NOT NULL,
  `id_vaga` int(11) NOT NULL,
  `id_veiculo` int(11) NOT NULL,
  `hora_entrada` timestamp NOT NULL DEFAULT current_timestamp(),
  `hora_saida` timestamp NULL DEFAULT NULL,
  `valor` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuario`
--

CREATE TABLE `tb_usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `senha` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_usuario` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_veiculo`
--

CREATE TABLE `tb_veiculo` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `placa` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modelo` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_ocupacao`
--
ALTER TABLE `tb_ocupacao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_vaga` (`id_vaga`),
  ADD KEY `id_veiculo` (`id_veiculo`);

--
-- Índices para tabela `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

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
-- AUTO_INCREMENT de tabela `tb_ocupacao`
--
ALTER TABLE `tb_ocupacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_usuario`
--
ALTER TABLE `tb_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_vaga`
--
ALTER TABLE `tb_vaga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_veiculo`
--
ALTER TABLE `tb_veiculo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
  ADD CONSTRAINT `tb_veiculo_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `tb_usuario` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
