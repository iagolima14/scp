-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 17/10/2018 às 08:41
-- Versão do servidor: 5.6.41-84.1
-- Versão do PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `marmo643_scp`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_itens`
--

CREATE TABLE `tb_itens` (
  `id` int(11) NOT NULL,
  `nome_item` text NOT NULL,
  `codigo` varchar(30) NOT NULL,
  `quantidade` int(6) NOT NULL,
  `data` date DEFAULT NULL,
  `valor` decimal(12,2) DEFAULT NULL,
  `situacao` enum('A','I') NOT NULL,
  `disponivel` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_movimentacoes`
--

CREATE TABLE `tb_movimentacoes` (
  `id` int(11) NOT NULL,
  `id_setor_antigo` int(11) DEFAULT NULL,
  `id_novo_setor` int(11) DEFAULT NULL,
  `data` datetime DEFAULT NULL,
  `usuario_responsavel` int(11) DEFAULT NULL,
  `id_patrimonio` int(11) DEFAULT NULL,
  `sit_fisica_momento` enum('BOM','INSERVIVEL','REGULAR','PRECARIO') DEFAULT NULL,
  `analisado` enum('S') DEFAULT NULL,
  `id_unidade` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_patrimonio`
--

CREATE TABLE `tb_patrimonio` (
  `id` int(11) NOT NULL,
  `num_patrimonio` varchar(9) NOT NULL,
  `patri_antigo` varchar(9) DEFAULT NULL,
  `id_item` int(11) NOT NULL,
  `descricao` text NOT NULL,
  `id_setor` int(11) DEFAULT NULL,
  `id_unidade` int(11) NOT NULL,
  `sit_fisica` enum('BOM','REGULAR','INSERVIVEL','PRECARIO') NOT NULL,
  `data_aquisicao` date NOT NULL,
  `valor_aquisicao` decimal(12,2) NOT NULL,
  `obs` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_setores`
--

CREATE TABLE `tb_setores` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `id_unidade` int(11) NOT NULL,
  `responsavel` varchar(50) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `situacao` enum('A','I') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `tb_setores`
--

INSERT INTO `tb_setores` (`id`, `nome`, `id_unidade`, `responsavel`, `telefone`, `situacao`) VALUES
(32, 'CRC', 25, 'Paulo', '713115-7841', 'A'),
(33, 'Recepção', 25, 'Karla', '7131185478', 'A'),
(34, 'Diretoria', 25, 'Lucas', '71 31156988', 'A'),
(35, 'Inservível', 25, 'Diretor', '7133152266', 'A');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_unidades`
--

CREATE TABLE `tb_unidades` (
  `id` int(11) NOT NULL,
  `nome` varchar(40) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `regiao` enum('RMSP','IP','RMSC','IC','CEAPA') DEFAULT NULL,
  `telefone` varchar(20) NOT NULL,
  `diretor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `tb_unidades`
--

INSERT INTO `tb_unidades` (`id`, `nome`, `cidade`, `regiao`, `telefone`, `diretor`) VALUES
(24, 'PLB - Penitenciária Lemos de Brito', 'Salvador', 'RMSP', '(071) 3117-2975', 5),
(25, 'CPS - Cadeia Pública de Salvador', 'Salvador', 'RMSP', '(071) 3117-8625', NULL),
(26, 'CAE - Casa do Albergado e Egressos', 'Salvador', 'RMSP', '(071) 3306-1446', NULL),
(27, 'CPLF - Conjunto Penal de Lauro de Freita', 'Lauro de Freitas', 'RMSC', '(071) 3283-5407', 12),
(28, 'CPE - Conjunto Penal de Eunápolis', 'Eunápolis', 'IC', '(073) 3281-6139', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_usuarios`
--

CREATE TABLE `tb_usuarios` (
  `id` int(11) NOT NULL,
  `login` varchar(40) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `matricula` varchar(20) DEFAULT NULL,
  `nome` varchar(50) NOT NULL,
  `permissao` enum('1','2') NOT NULL,
  `situacao` enum('A','I') NOT NULL,
  `log` enum('S') DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `id_unidade` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `tb_usuarios`
--

INSERT INTO `tb_usuarios` (`id`, `login`, `senha`, `matricula`, `nome`, `permissao`, `situacao`, `log`, `telefone`, `email`, `id_unidade`) VALUES
(1, 'iago.adm', '21232f297a57a5a743894a0e4a801fc3', '1234567890', 'iago lima', '1', 'A', 'S', '12345678911', 'iago@iago.com', 25),
(2, 'marcus', '827ccb0eea8a706c4c34a16891f84e7b', '55555554', 'Marcus Assis', '1', 'A', 'S', '99225566', 'marcus@live.com.br', 24),
(3, 'iago.cm', '6d769ecb25444b49111b669de9ec6104', '123135452', 'Iago Lima', '2', 'A', 'S', '2132165465', 'teste@teste.com', 25),
(5, 'marcus.cm', '827ccb0eea8a706c4c34a16891f84e7b', '5555555', 'Marcus Comum', '2', 'A', 'S', '12132154', 'marcus@teste.com', 25),
(12, 'admin', '21232f297a57a5a743894a0e4a801fc3', '123456789', 'User Admin', '1', 'A', 'S', '71900000000', 'adm@adm.com', 27);

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `tb_itens`
--
ALTER TABLE `tb_itens`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_movimentacoes`
--
ALTER TABLE `tb_movimentacoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_unidade` (`id_unidade`),
  ADD KEY `id_setor_antigo` (`id_setor_antigo`),
  ADD KEY `id_novo_setor` (`id_novo_setor`),
  ADD KEY `id_patrimonio` (`id_patrimonio`),
  ADD KEY `usuario_responsavel` (`usuario_responsavel`);

--
-- Índices de tabela `tb_patrimonio`
--
ALTER TABLE `tb_patrimonio`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `num_patrimonio` (`num_patrimonio`),
  ADD KEY `id_item` (`id_item`),
  ADD KEY `id_setor` (`id_setor`),
  ADD KEY `id_unidade` (`id_unidade`);

--
-- Índices de tabela `tb_setores`
--
ALTER TABLE `tb_setores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_unidade` (`id_unidade`);

--
-- Índices de tabela `tb_unidades`
--
ALTER TABLE `tb_unidades`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nome` (`nome`),
  ADD KEY `diretor` (`diretor`);

--
-- Índices de tabela `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`),
  ADD KEY `id_unidade` (`id_unidade`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `tb_itens`
--
ALTER TABLE `tb_itens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4065;

--
-- AUTO_INCREMENT de tabela `tb_movimentacoes`
--
ALTER TABLE `tb_movimentacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `tb_patrimonio`
--
ALTER TABLE `tb_patrimonio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1212;

--
-- AUTO_INCREMENT de tabela `tb_setores`
--
ALTER TABLE `tb_setores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de tabela `tb_unidades`
--
ALTER TABLE `tb_unidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de tabela `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `tb_movimentacoes`
--
ALTER TABLE `tb_movimentacoes`
  ADD CONSTRAINT `tb_movimentacoes_ibfk_1` FOREIGN KEY (`id_unidade`) REFERENCES `tb_unidades` (`id`),
  ADD CONSTRAINT `tb_movimentacoes_ibfk_2` FOREIGN KEY (`id_setor_antigo`) REFERENCES `tb_setores` (`id`),
  ADD CONSTRAINT `tb_movimentacoes_ibfk_3` FOREIGN KEY (`id_novo_setor`) REFERENCES `tb_setores` (`id`),
  ADD CONSTRAINT `tb_movimentacoes_ibfk_4` FOREIGN KEY (`id_patrimonio`) REFERENCES `tb_patrimonio` (`id`),
  ADD CONSTRAINT `tb_movimentacoes_ibfk_5` FOREIGN KEY (`usuario_responsavel`) REFERENCES `tb_usuarios` (`id`);

--
-- Restrições para tabelas `tb_patrimonio`
--
ALTER TABLE `tb_patrimonio`
  ADD CONSTRAINT `tb_patrimonio_ibfk_1` FOREIGN KEY (`id_item`) REFERENCES `tb_itens` (`id`),
  ADD CONSTRAINT `tb_patrimonio_ibfk_2` FOREIGN KEY (`id_setor`) REFERENCES `tb_setores` (`id`),
  ADD CONSTRAINT `tb_patrimonio_ibfk_3` FOREIGN KEY (`id_unidade`) REFERENCES `tb_unidades` (`id`);

--
-- Restrições para tabelas `tb_setores`
--
ALTER TABLE `tb_setores`
  ADD CONSTRAINT `tb_setores_ibfk_1` FOREIGN KEY (`id_unidade`) REFERENCES `tb_unidades` (`id`);

--
-- Restrições para tabelas `tb_unidades`
--
ALTER TABLE `tb_unidades`
  ADD CONSTRAINT `tb_unidades_ibfk_1` FOREIGN KEY (`diretor`) REFERENCES `tb_usuarios` (`id`);

--
-- Restrições para tabelas `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD CONSTRAINT `tb_usuarios_ibfk_1` FOREIGN KEY (`id_unidade`) REFERENCES `tb_unidades` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
