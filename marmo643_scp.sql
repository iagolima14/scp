-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 25/10/2018 às 13:10
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
-- Estrutura para tabela `tb_code_control`
--

CREATE TABLE `tb_code_control` (
  `id` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  `diaehora` datetime NOT NULL,
  `cod_antigo` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `cod_novo` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Fazendo dump de dados para tabela `tb_code_control`
--

INSERT INTO `tb_code_control` (`id`, `id_item`, `diaehora`, `cod_antigo`, `cod_novo`, `id_user`) VALUES
(1, 4404, '2018-10-23 19:10:08', '', '20150001', 2),
(2, 4404, '2018-10-23 19:12:01', '20150001', '10170001', 2),
(3, 4405, '2018-10-24 10:09:43', '', '20150001', 1),
(4, 4410, '2018-10-24 10:10:20', '', '20150002', 1),
(5, 4405, '2018-10-24 10:11:01', '20150001', '10170002', 1),
(6, 4411, '2018-10-24 10:11:36', '', '20150003', 1),
(7, 4422, '2018-10-24 10:14:48', '', '20160001', 1),
(8, 4412, '2018-10-24 10:15:13', '', '20160002', 1),
(9, 4422, '2018-10-24 11:56:20', '20160001', '20150004', 2),
(10, 4422, '2018-10-24 12:54:59', '20150004', '20170001', 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_grupo`
--

CREATE TABLE `tb_grupo` (
  `id` int(11) NOT NULL,
  `nome_grupo` varchar(40) DEFAULT NULL,
  `cod_grupo` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `tb_grupo`
--

INSERT INTO `tb_grupo` (`id`, `nome_grupo`, `cod_grupo`) VALUES
(5, 'ELETROO', 10),
(6, 'INFORMATICA', 20),
(7, 'MOVEIS', 30),
(8, 'BENS', 40);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_itens`
--

CREATE TABLE `tb_itens` (
  `id` int(11) NOT NULL,
  `nome_item` text NOT NULL,
  `codigo` varchar(12) NOT NULL,
  `codigo_siscop` varchar(9) DEFAULT NULL,
  `grupo` int(11) DEFAULT NULL,
  `subgrupo` int(11) DEFAULT NULL,
  `situacao` enum('A','I') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Fazendo dump de dados para tabela `tb_itens`
--

INSERT INTO `tb_itens` (`id`, `nome_item`, `codigo`, `codigo_siscop`, `grupo`, `subgrupo`, `situacao`) VALUES
(4404, 'MESA DE CANTO', '100003048', '10170001', 5, 7, 'A'),
(4405, 'ARMARIO ESTANTE EM MADEIRA', '100003057', '10170002', 5, 7, 'A'),
(4406, 'MESA DE CENTRO EM GRANITO', '100003062', NULL, NULL, NULL, 'A'),
(4407, 'SOFA EM MADEIRA', '100003063', NULL, NULL, NULL, 'A'),
(4408, 'CREDENZA EM MADEIRA', '100003067', NULL, NULL, NULL, 'A'),
(4409, 'ESTANTE EM ACO COM 06 PRATELEIRAS', '100003071', NULL, NULL, NULL, 'A'),
(4410, 'BALCAO EM ACO', '100003075', '20150002', 6, 8, 'A'),
(4411, 'BALCAO EM MADEIRA', '100003076', '20150003', 6, 8, 'A'),
(4412, 'BANCADA DE TRABALHO EM ACO', '100003080', '20160002', 6, 6, 'A'),
(4413, 'BANCADA DE TRABALHO EM MADEIRA', '100003081', NULL, NULL, NULL, 'A'),
(4414, 'CADEIRA UNIVERSITARIA', '100003084', NULL, NULL, NULL, 'A'),
(4415, 'CADEIRA ESCOLAR', '100003085', NULL, NULL, NULL, 'A'),
(4416, 'CAVALETE PARA FLIP CHART', '100003092', NULL, NULL, NULL, 'A'),
(4417, 'QUADRO BRANCO', '100003104', NULL, NULL, NULL, 'A'),
(4418, 'QUADRO DE AVISO', '100003105', NULL, NULL, NULL, 'A'),
(4419, 'MURAL EM MADEIRA', '100003125', NULL, NULL, NULL, 'A'),
(4420, 'MODULO ARMARIO PARA ESCRITORIO', '100003132', NULL, NULL, NULL, 'A'),
(4421, 'CLAVICULARIO EM ACO', '100003157', NULL, NULL, NULL, 'A'),
(4422, 'BALDE A PEDAL EM ACO INOX', '100003168', '20170001', 6, 7, 'A'),
(4423, 'CARRO COLETOR', '100003171', NULL, NULL, NULL, 'A'),
(4424, 'ELIMINADOR DE MOSCAS', '100003173', NULL, NULL, NULL, 'A'),
(4425, 'FERRO DE PASSAR ROUPA AUTOMATICO', '100003174', NULL, NULL, NULL, 'A'),
(4426, 'MAQUINA DE COSTURA TIPO INDUSTRIAL', '100003176', NULL, NULL, NULL, 'A'),
(4427, 'TABUA DE PASSA ROUPA', '100003179', NULL, NULL, NULL, 'A'),
(4630, 'CELULAR ASUS', '10007346378', '20150004', 6, 8, 'A');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_itens_lancamento`
--

CREATE TABLE `tb_itens_lancamento` (
  `id` int(11) NOT NULL,
  `id_item` int(11) DEFAULT NULL,
  `id_lancamento` int(11) DEFAULT NULL,
  `quantidade` int(6) DEFAULT NULL,
  `valor` decimal(9,2) DEFAULT NULL,
  `adicionado` enum('S') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `tb_itens_lancamento`
--

INSERT INTO `tb_itens_lancamento` (`id`, `id_item`, `id_lancamento`, `quantidade`, `valor`, `adicionado`) VALUES
(1, 4423, 9, 10, '400.00', NULL),
(2, 4424, 9, 6, '20.00', NULL),
(3, 4630, 10, 25, '1250.00', 'S'),
(4, 4417, 10, 12, '158.00', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_lancamentos`
--

CREATE TABLE `tb_lancamentos` (
  `id` int(11) NOT NULL,
  `num_doc` varchar(20) DEFAULT NULL,
  `id_origem` int(11) NOT NULL,
  `data_aquisicao` date NOT NULL,
  `qnt_itens` int(5) DEFAULT NULL,
  `confirmado` enum('S') DEFAULT NULL,
  `id_operador` int(11) NOT NULL,
  `diaehora` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `tb_lancamentos`
--

INSERT INTO `tb_lancamentos` (`id`, `num_doc`, `id_origem`, `data_aquisicao`, `qnt_itens`, `confirmado`, `id_operador`, `diaehora`) VALUES
(5, '12345EDC', 6, '2018-10-25', NULL, NULL, 2, '2018-10-25 11:12:28'),
(6, '234234', 6, '2018-10-15', NULL, NULL, 2, '2018-10-25 11:29:38'),
(7, 'werwer23', 4, '2018-10-16', NULL, NULL, 2, '2018-10-25 11:29:59'),
(8, '456456', 5, '2018-10-02', NULL, NULL, 2, '2018-10-25 11:33:36'),
(9, '124584HAJA', 6, '2018-10-25', NULL, NULL, 2, '2018-10-25 11:53:22'),
(10, 'DOC10252545', 3, '2018-10-25', NULL, NULL, 2, '2018-10-25 12:55:55');

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
-- Estrutura para tabela `tb_subgrupo`
--

CREATE TABLE `tb_subgrupo` (
  `id` int(11) NOT NULL,
  `nome_subgrupo` varchar(40) DEFAULT NULL,
  `cod_subgrupo` int(10) NOT NULL,
  `id_grupo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `tb_subgrupo`
--

INSERT INTO `tb_subgrupo` (`id`, `nome_subgrupo`, `cod_subgrupo`, `id_grupo`) VALUES
(5, '', 15, 5),
(6, 'MONITOR e TV', 16, 5),
(7, 'ESTABILIZADOR 10v', 17, 5),
(8, 'CELULAR', 15, 6),
(9, 'CARRO', 50, 8);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_tipo_origens`
--

CREATE TABLE `tb_tipo_origens` (
  `id` int(11) NOT NULL,
  `nome_origem` varchar(40) CHARACTER SET ucs2 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Fazendo dump de dados para tabela `tb_tipo_origens`
--

INSERT INTO `tb_tipo_origens` (`id`, `nome_origem`) VALUES
(1, 'FUNPEN'),
(2, 'OUTROS'),
(3, 'PRÓPRIO'),
(4, 'CONVÊNIO'),
(5, 'DOAÇÃO'),
(6, 'DEPEN'),
(7, 'TRANSFERÊNCIA DE OUTROS ORGÃOS');

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
(25, 'CPS - Cadeia Pública de Salvador', 'Salvador', 'RMSP', '(071) 3117-8625', 3),
(26, 'CAE - Casa do Albergado e Egressos', 'Salvador', 'RMSP', '(071) 3306-1446', NULL),
(27, 'CPLF - Conjunto Penal de Lauro de Freita', 'Lauro de Freitas', 'RMSC', '(071) 3283-5407', 12),
(28, 'CPE - Conjunto Penal de Eunápolis', 'Eunápolis', 'IC', '(073) 3281-6139', NULL),
(29, 'CPFS - Conjunto Penal de Feira de Santan', 'Feira de Santana', 'IP', '75311301', NULL);

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
(5, 'marcus.cm', '827ccb0eea8a706c4c34a16891f84e7b', '5555555', 'Marcus Comum', '2', 'A', 'S', '12132154', 'marcus@teste.com', 26),
(12, 'admin', '21232f297a57a5a743894a0e4a801fc3', '123456789', 'User Admin', '1', 'A', 'S', '71900000000', 'adm@adm.com', 27);

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `tb_code_control`
--
ALTER TABLE `tb_code_control`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_item` (`id_item`),
  ADD KEY `id_user` (`id_user`);

--
-- Índices de tabela `tb_grupo`
--
ALTER TABLE `tb_grupo`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_itens`
--
ALTER TABLE `tb_itens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigo` (`codigo`),
  ADD UNIQUE KEY `codigo_siscop` (`codigo_siscop`);

--
-- Índices de tabela `tb_itens_lancamento`
--
ALTER TABLE `tb_itens_lancamento`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_lancamentos`
--
ALTER TABLE `tb_lancamentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_operador` (`id_operador`),
  ADD KEY `id_origem` (`id_origem`);

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
-- Índices de tabela `tb_subgrupo`
--
ALTER TABLE `tb_subgrupo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_grupo` (`id_grupo`);

--
-- Índices de tabela `tb_tipo_origens`
--
ALTER TABLE `tb_tipo_origens`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT de tabela `tb_code_control`
--
ALTER TABLE `tb_code_control`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `tb_grupo`
--
ALTER TABLE `tb_grupo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `tb_itens`
--
ALTER TABLE `tb_itens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4631;

--
-- AUTO_INCREMENT de tabela `tb_itens_lancamento`
--
ALTER TABLE `tb_itens_lancamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tb_lancamentos`
--
ALTER TABLE `tb_lancamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `tb_movimentacoes`
--
ALTER TABLE `tb_movimentacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `tb_patrimonio`
--
ALTER TABLE `tb_patrimonio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3670;

--
-- AUTO_INCREMENT de tabela `tb_setores`
--
ALTER TABLE `tb_setores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de tabela `tb_subgrupo`
--
ALTER TABLE `tb_subgrupo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `tb_tipo_origens`
--
ALTER TABLE `tb_tipo_origens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `tb_unidades`
--
ALTER TABLE `tb_unidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de tabela `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `tb_code_control`
--
ALTER TABLE `tb_code_control`
  ADD CONSTRAINT `tb_code_control_ibfk_1` FOREIGN KEY (`id_item`) REFERENCES `tb_itens` (`id`),
  ADD CONSTRAINT `tb_code_control_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `tb_usuarios` (`id`);

--
-- Restrições para tabelas `tb_lancamentos`
--
ALTER TABLE `tb_lancamentos`
  ADD CONSTRAINT `tb_lancamentos_ibfk_1` FOREIGN KEY (`id_operador`) REFERENCES `tb_usuarios` (`id`),
  ADD CONSTRAINT `tb_lancamentos_ibfk_2` FOREIGN KEY (`id_origem`) REFERENCES `tb_tipo_origens` (`id`);

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
-- Restrições para tabelas `tb_subgrupo`
--
ALTER TABLE `tb_subgrupo`
  ADD CONSTRAINT `tb_subgrupo_ibfk_1` FOREIGN KEY (`id_grupo`) REFERENCES `tb_grupo` (`id`);

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
