-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 01/12/2024 às 02:16
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
-- Banco de dados: `login`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `noticias`
--

CREATE TABLE `noticias` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `conteudo` text NOT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT current_timestamp(),
  `autor_id` int(11) NOT NULL,
  `status` enum('pendente','aprovado') DEFAULT 'pendente',
  `imagem` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `noticias`
--

INSERT INTO `noticias` (`id`, `titulo`, `conteudo`, `data_criacao`, `autor_id`, `status`, `imagem`) VALUES
(2, 'daf df', 'VDVEW', '2024-12-01 00:18:21', 6, 'aprovado', 0x75706c6f61642f436170747572612064652074656c6120323032342d31312d3036203138303834382e706e67),
(3, 'daf df', 'ASV.KHEVHJbvshv ', '2024-12-01 00:20:05', 6, 'aprovado', 0x75706c6f61642f436170747572612064652074656c6120323032342d31302d3233203032333535322e706e67),
(6, 'LWHDBV', 'dvvSDBddb', '2024-12-01 00:37:52', 5, 'pendente', 0x75706c6f61642f436170747572612064652074656c6120323032342d31312d3036203138303834382e706e67),
(7, '\\kjcxb lSDHB KL JBSLJK Bslb l', 'çakjsbijsadbpjibsdivbvoiasdbvoudsfbvouysdvuodsbusbhasbsbcousadvouasdbvusgkhsviuygkuydgci7sAGDKDUCDI7SGXKUHG7FWDD', '2024-12-01 01:14:05', 5, 'pendente', 0x75706c6f61642f436170747572612064652074656c6120323032342d31302d3233203033303035392e706e67);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `login` varchar(80) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `role` enum('admin','escritor') NOT NULL DEFAULT 'escritor'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nome`, `login`, `senha`, `role`) VALUES
(2, 'Rogerios', 'rog@gmail.com', '123456', 'admin'),
(3, 'Bruno', 'fonsecabruno6062@gmail.com', '123456789', 'escritor'),
(4, 'Roberto gomes bolais', 'cu@cu.com', 'cu', 'admin'),
(5, 'lahdsbv', 'teste@teste.com', 'teste', 'admin'),
(6, 'Bruno', 'u@gmail.com', 'Coxinha2007.', 'escritor'),
(7, 'lenon', 'lenon@gmail.com', '123456', 'escritor'),
(8, 'Bruno', 'bruno@teste.com', 'rubel', 'escritor');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `autor_id` (`autor_id`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `noticias`
--
ALTER TABLE `noticias`
  ADD CONSTRAINT `noticias_ibfk_1` FOREIGN KEY (`autor_id`) REFERENCES `usuario` (`idusuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
