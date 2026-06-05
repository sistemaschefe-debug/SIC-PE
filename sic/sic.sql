-- phpMyAdmin SQL Dump
-- version 4.2.9.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Tempo de geração: 09/07/2015 às 13:56
-- Versão do servidor: 5.5.37-0ubuntu0.12.04.1
-- Versão do PHP: 5.3.10-1ubuntu3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de dados: `sic`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `arma`
--

CREATE TABLE IF NOT EXISTS `arma` (
`id_arma` int(11) NOT NULL,
  `nome_arma` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `arma`
--

INSERT INTO `arma` (`id_arma`, `nome_arma`) VALUES
(1, 'Infantaria'),
(2, 'Cavalaria'),
(3, 'Artilharia'),
(4, 'Engenharia'),
(5, 'IntendÃªncia'),
(6, 'Material BÃ©lico'),
(7, 'ComunicaÃ§Ãµes'),
(8, 'QCO'),
(9, 'QEM'),
(10, 'SaÃºde'),
(11, 'SAREx');

-- --------------------------------------------------------

--
-- Estrutura para tabela `corpo`
--

CREATE TABLE IF NOT EXISTS `corpo` (
`id_corpo` int(11) NOT NULL,
  `nome_corpo` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `corpo`
--

INSERT INTO `corpo` (`id_corpo`, `nome_corpo`) VALUES
(2, 'Corpo Administrativo'),
(4, 'BCSv'),
(5, 'Corpo de Cadetes'),
(6, 'DivisÃ£o de Ensino'),
(7, 'Comando da AMAN');

-- --------------------------------------------------------

--
-- Estrutura para tabela `notificacoes`
--

CREATE TABLE IF NOT EXISTS `notificacoes` (
`id_notificacao` int(11) NOT NULL,
  `cod_veiculo` int(11) NOT NULL,
  `se_apresentou` char(1) NOT NULL,
  `local_notificacao` varchar(100) NOT NULL,
  `data_notificacao` date NOT NULL,
  `hora_notificacao` varchar(5) NOT NULL,
  `prazo_comparecimento` date NOT NULL,
  `anotador` int(11) NOT NULL,
  `motivo_notificacao` varchar(255) NOT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `despacho_cmt_pe` text NOT NULL,
  `finalizado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pessoas`
--

CREATE TABLE IF NOT EXISTS `pessoas` (
`id_pessoa` int(11) NOT NULL,
  `cod_posto` int(11) NOT NULL,
  `cod_arma` int(11) NOT NULL,
  `nome_completo` varchar(255) NOT NULL,
  `nome_guerra` varchar(255) NOT NULL,
  `identidade` varchar(20) NOT NULL,
  `telefone_residencial` varchar(30) NOT NULL,
  `cod_setor` int(11) NOT NULL,
  `ramal` varchar(10) NOT NULL,
  `habilitacao` varchar(30) NOT NULL,
  `categoria` varchar(10) NOT NULL,
  `validade_habilitacao` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `posto`
--

CREATE TABLE IF NOT EXISTS `posto` (
`id_posto` int(11) NOT NULL,
  `nome_posto` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `posto`
--

INSERT INTO `posto` (`id_posto`, `nome_posto`) VALUES
(1, 'Gen Ex'),
(2, 'Gen Div'),
(3, 'Gen Bda'),
(4, 'Cel'),
(5, 'Ten Cel'),
(6, 'Maj'),
(7, 'Cap'),
(8, '1º Ten'),
(9, '2º Ten'),
(10, 'Asp Of'),
(11, 'Cad 4º ano'),
(12, 'Cad 3º ano'),
(13, 'Cad 2º ano'),
(14, 'Cad 1º ano'),
(15, 'S Ten'),
(16, '1º Sgt'),
(17, '2º Sgt'),
(18, '3º Sgt'),
(19, 'Cb'),
(20, 'Sd EP'),
(21, 'Sd EV'),
(22, 'Civil');

-- --------------------------------------------------------

--
-- Estrutura para tabela `setor`
--

CREATE TABLE IF NOT EXISTS `setor` (
`id_setor` int(11) NOT NULL,
  `nome_setor` varchar(100) NOT NULL,
  `cod_corpo` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `setor`
--

INSERT INTO `setor` (`id_setor`, `nome_setor`, `cod_corpo`) VALUES
(2, 'DTI', 2),
(3, 'Sec Tiro', 5),
(4, 'Sec Psicoped', 6),
(5, 'Sec Mob', 4),
(6, 'Sec Lid', 5),
(7, 'Sec Equi', 5),
(8, 'Sec Ens G', 6),
(9, 'Sec Ens F', 6),
(10, 'Sec Ens E', 6),
(11, 'Sec Ens D', 6),
(12, 'Sec Ens C', 6),
(13, 'Sec Ens B', 6),
(14, 'Sec Ens A', 6),
(15, 'STE', 6),
(16, 'SPD', 5),
(17, 'SMAv', 6),
(18, 'SIEsp', 5),
(19, 'SEF', 5),
(20, 'SCmd C Adm/OD', 2),
(21, 'SCh DE', 6),
(22, 'SCP', 6),
(23, 'SAM', 5),
(24, 'SAFO', 7),
(25, 'S4 CC', 5),
(26, 'S4 BCSv', 4),
(27, 'S3 CC', 5),
(28, 'S3 BCSv', 4),
(29, 'S2 CC', 5),
(30, 'S2 BCSv', 4),
(31, 'S1 CC', 5),
(32, 'S1 BCSv', 4),
(33, 'S/4 DE', 6),
(34, 'S/3 DE', 6),
(35, 'RP BCSv', 4),
(36, 'Pref Mil', 2),
(37, 'P Med BCSv', 4),
(38, 'HMR', 2),
(39, 'H Vet', 2),
(40, 'Edit Acad', 6),
(41, 'E5', 7),
(42, 'E4', 7),
(43, 'E3', 7),
(44, 'E2', 7),
(45, 'E1', 7),
(46, 'DivisÃ£o Administrativa', 2),
(47, 'Div Odont', 2),
(48, 'Div Log', 2),
(49, 'Comando do CC', 5),
(50, 'Comando do BCSv', 4),
(51, 'Comando da AMAN', 7),
(52, 'Cia Sv', 4),
(53, 'Cia PE', 4),
(54, 'Cia Gd', 4),
(55, 'Cia Fuz', 4),
(56, 'Cia Cmdo', 4),
(57, 'C MB', 5),
(58, 'C Int', 5),
(59, 'C Inf', 5),
(60, 'C Eng', 5),
(61, 'C Com', 5),
(62, 'C Cav', 5),
(63, 'C Bas', 5),
(64, 'C Art', 5),
(65, 'Bibl Acad', 6),
(66, 'Banda de MÃºsica', 4),
(67, 'Assessoria JurÃ­dica', 7),
(68, 'Asse Esp', 7),
(69, 'Asse EG', 7),
(70, 'Almox', 2),
(71, 'Aj Geral', 7),
(72, 'ACP', 2),
(73, '2Âª Cia Aux CC', 4),
(74, '1Âª Cia Aux CC', 4);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipo_brasao`
--

CREATE TABLE IF NOT EXISTS `tipo_brasao` (
`id_tipo_brasao` int(11) NOT NULL,
  `nome_tipo_brasao` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `tipo_brasao`
--

INSERT INTO `tipo_brasao` (`id_tipo_brasao`, `nome_tipo_brasao`) VALUES
(1, 'Carro ProvisÃ³rio'),
(2, 'Carro'),
(3, 'Moto ProvisÃ³rio'),
(4, 'Moto'),
(5, 'Bicicleta ProvisÃ³rio'),
(6, 'Bicicleta');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
`id_usuario` int(11) NOT NULL,
  `identidade` varchar(10) NOT NULL,
  `cod_posto` int(11) NOT NULL,
  `nivel` int(11) NOT NULL,
  `situacao` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `nome_guerra` varchar(50) NOT NULL,
  `usuario` varchar(40) NOT NULL,
  `senha` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `identidade`, `cod_posto`, `nivel`, `situacao`, `nome`, `nome_guerra`, `usuario`, `senha`) VALUES
(1, '0131832446', 17, 2, 1, 'Weber', 'Weber', 'sgtweber', 'e10adc3949ba59abbe56e057f20f883e'),
(2, '0109771279', 21, 1, 1, 'Israel Mateus de Lima Mapele', 'Mapele', 'sdmapele', 'f0f727870ec3e379df2ca8c41a752388');

-- --------------------------------------------------------

--
-- Estrutura para tabela `veiculos_identificados`
--

CREATE TABLE IF NOT EXISTS `veiculos_identificados` (
`id_veiculo_identificado` int(11) NOT NULL,
  `cod_tipo_brasao` int(11) NOT NULL,
  `nr_brasao` int(11) NOT NULL,
  `cod_pessoa` int(11) NOT NULL,
  `marca` varchar(100) NOT NULL,
  `modelo` varchar(50) NOT NULL,
  `cor` varchar(50) NOT NULL,
  `placa` varchar(50) NOT NULL,
  `ano_modelo` varchar(50) NOT NULL,
  `data_cad_alt` datetime NOT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `observacao` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `arma`
--
ALTER TABLE `arma`
 ADD PRIMARY KEY (`id_arma`);

--
-- Índices de tabela `corpo`
--
ALTER TABLE `corpo`
 ADD PRIMARY KEY (`id_corpo`);

--
-- Índices de tabela `notificacoes`
--
ALTER TABLE `notificacoes`
 ADD PRIMARY KEY (`id_notificacao`), ADD KEY `cod_veiculo` (`cod_veiculo`,`anotador`), ADD KEY `anotador` (`anotador`);

--
-- Índices de tabela `pessoas`
--
ALTER TABLE `pessoas`
 ADD PRIMARY KEY (`id_pessoa`), ADD KEY `cod_posto` (`cod_posto`,`cod_arma`,`cod_setor`), ADD KEY `cod_arma` (`cod_arma`), ADD KEY `cod_setor` (`cod_setor`);

--
-- Índices de tabela `posto`
--
ALTER TABLE `posto`
 ADD PRIMARY KEY (`id_posto`);

--
-- Índices de tabela `setor`
--
ALTER TABLE `setor`
 ADD PRIMARY KEY (`id_setor`), ADD KEY `cod_corpo` (`cod_corpo`);

--
-- Índices de tabela `tipo_brasao`
--
ALTER TABLE `tipo_brasao`
 ADD PRIMARY KEY (`id_tipo_brasao`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
 ADD PRIMARY KEY (`id_usuario`), ADD UNIQUE KEY `identidade` (`identidade`), ADD KEY `cod_posto` (`cod_posto`);

--
-- Índices de tabela `veiculos_identificados`
--
ALTER TABLE `veiculos_identificados`
 ADD PRIMARY KEY (`id_veiculo_identificado`), ADD KEY `cod_tipo_brasao` (`cod_tipo_brasao`,`cod_pessoa`), ADD KEY `cod_pessoa` (`cod_pessoa`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `arma`
--
ALTER TABLE `arma`
MODIFY `id_arma` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de tabela `corpo`
--
ALTER TABLE `corpo`
MODIFY `id_corpo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de tabela `notificacoes`
--
ALTER TABLE `notificacoes`
MODIFY `id_notificacao` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `pessoas`
--
ALTER TABLE `pessoas`
MODIFY `id_pessoa` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `posto`
--
ALTER TABLE `posto`
MODIFY `id_posto` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de tabela `setor`
--
ALTER TABLE `setor`
MODIFY `id_setor` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=75;
--
-- AUTO_INCREMENT de tabela `tipo_brasao`
--
ALTER TABLE `tipo_brasao`
MODIFY `id_tipo_brasao` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de tabela `veiculos_identificados`
--
ALTER TABLE `veiculos_identificados`
MODIFY `id_veiculo_identificado` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `notificacoes`
--
ALTER TABLE `notificacoes`
ADD CONSTRAINT `notificacoes_ibfk_1` FOREIGN KEY (`cod_veiculo`) REFERENCES `veiculos_identificados` (`id_veiculo_identificado`),
ADD CONSTRAINT `notificacoes_ibfk_2` FOREIGN KEY (`anotador`) REFERENCES `usuarios` (`id_usuario`);

--
-- Restrições para tabelas `pessoas`
--
ALTER TABLE `pessoas`
ADD CONSTRAINT `pessoas_ibfk_1` FOREIGN KEY (`cod_posto`) REFERENCES `posto` (`id_posto`),
ADD CONSTRAINT `pessoas_ibfk_2` FOREIGN KEY (`cod_arma`) REFERENCES `arma` (`id_arma`),
ADD CONSTRAINT `pessoas_ibfk_3` FOREIGN KEY (`cod_setor`) REFERENCES `setor` (`id_setor`);

--
-- Restrições para tabelas `setor`
--
ALTER TABLE `setor`
ADD CONSTRAINT `setor_ibfk_1` FOREIGN KEY (`cod_corpo`) REFERENCES `corpo` (`id_corpo`);

--
-- Restrições para tabelas `usuarios`
--
ALTER TABLE `usuarios`
ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`cod_posto`) REFERENCES `posto` (`id_posto`);

--
-- Restrições para tabelas `veiculos_identificados`
--
ALTER TABLE `veiculos_identificados`
ADD CONSTRAINT `veiculos_identificados_ibfk_1` FOREIGN KEY (`cod_tipo_brasao`) REFERENCES `tipo_brasao` (`id_tipo_brasao`),
ADD CONSTRAINT `veiculos_identificados_ibfk_2` FOREIGN KEY (`cod_pessoa`) REFERENCES `pessoas` (`id_pessoa`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
