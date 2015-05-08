-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: Mai 08, 2015 as 07:16 PM
-- Versão do Servidor: 5.5.8
-- Versão do PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `booknet`
--
CREATE DATABASE `booknet` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `booknet`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluguel`
--

CREATE TABLE IF NOT EXISTS `aluguel` (
  `idAluguel` int(11) NOT NULL AUTO_INCREMENT,
  `idNegociacao` int(11) NOT NULL,
  `dataVencimento` date DEFAULT NULL,
  PRIMARY KEY (`idAluguel`),
  KEY `fk_Aluguel_Operacoes1_idx` (`idNegociacao`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `aluguel`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `idCategoria` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  PRIMARY KEY (`idCategoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`idCategoria`, `nome`) VALUES
(1, 'Horror'),
(2, 'Infantil'),
(3, 'Contos'),
(4, 'Crônicas'),
(5, 'Romance'),
(6, 'Poesia'),
(7, 'Ficção Científica'),
(8, 'Culinária'),
(9, 'Autoajuda'),
(10, 'Erótico'),
(11, 'Policial'),
(12, 'Biografia'),
(13, 'Reportagem'),
(14, 'Quadrinhos');

-- --------------------------------------------------------

--
-- Estrutura da tabela `livros`
--

CREATE TABLE IF NOT EXISTS `livros` (
  `idLivro` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `idCategoria` int(11) NOT NULL,
  `permiteAluguel` varchar(45) DEFAULT NULL,
  `foto` varchar(200) DEFAULT NULL,
  `ISBN` varchar(45) DEFAULT NULL,
  `editora` varchar(50) DEFAULT NULL,
  `autor` varchar(100) DEFAULT NULL,
  `nacionalidade` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idLivro`),
  KEY `fk_Livro_Categoria1_idx` (`idCategoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Extraindo dados da tabela `livros`
--

INSERT INTO `livros` (`idLivro`, `nome`, `idCategoria`, `permiteAluguel`, `foto`, `ISBN`, `editora`, `autor`, `nacionalidade`) VALUES
(1, 'Dominando o android', 1, 'S', 'livro1.png', '9788575224120', 'Novatec', 'Nelson Glauber', 'Nacional'),
(2, 'Quebra a Cabeça! Padrões de Projeto', 1, 'N', 'livro2.jpg', '9788576081746', 'Alta Books', 'Elisabeth Freeman, Eric Freeman', 'Nacional'),
(3, 'Pizza do Faustão', 1, 'S', 'livro3.jpg', '9788525051493', 'Globo', 'Fausto Silva', 'Nacional'),
(4, 'O Fascinante Império de Steve Jobs', 1, 'S', 'livro4.jpg', '9788579302237', 'Empório dos livros', 'Michael Moritz', 'Internacional'),
(5, 'A música do silêncio', 1, 'S', 'livro5.jpg', '9788580413533', 'Arqueiro', 'Patrick Rothfuss', 'Nacional'),
(8, 'Percy Jackson e Os Olimpianos - o Ladrão de R', 1, 'S', 'livro6,jpg', '9788580575392', 'Não informado', 'Rick Riordan', 'Internacional'),
(9, 'Pai Rico Pai Pobre', 1, 'N', 'livro7.png', '9788535206234', 'Campus', 'Kiyosaki, Robert T', 'Internacional'),
(10, 'A Guerra dos Tronos - As Crônicas de Gelo e Fogo - Vol. 1', 1, 'N', 'livro8.png', '9788562936524', 'Leya', 'Martin, George R. R. ', 'Internacional'),
(11, 'Dicionário Jurídico', 1, 'N', 'livro9.png', '9788561544331', 'Crhonus', 'Guilaumon, Talita Hae Sun Brandini Park; Park, Thais Hae Ok Brandini', 'Nacional');

-- --------------------------------------------------------

--
-- Estrutura da tabela `livros_valores`
--

CREATE TABLE IF NOT EXISTS `livros_valores` (
  `idLivro_Valores` int(11) NOT NULL AUTO_INCREMENT,
  `idLivro` int(11) NOT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `valorVenda` decimal(10,2) DEFAULT NULL,
  `valorAluguel` decimal(10,2) DEFAULT NULL,
  `taxaRenovacao` decimal(5,3) DEFAULT NULL,
  `multa` decimal(5,3) DEFAULT NULL,
  PRIMARY KEY (`idLivro_Valores`),
  KEY `fk_Livro_Valores_Livro1_idx` (`idLivro`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Extraindo dados da tabela `livros_valores`
--

INSERT INTO `livros_valores` (`idLivro_Valores`, `idLivro`, `quantidade`, `valorVenda`, `valorAluguel`, `taxaRenovacao`, `multa`) VALUES
(1, 1, 100, '90.00', '15.50', '0.030', '0.050'),
(2, 2, 50, '106.31', '10.50', '0.030', '0.050'),
(3, 3, 10, '36.48', '5.50', '0.030', '0.050'),
(4, 4, 20, '31.90', '5.50', '0.030', '0.050'),
(5, 5, 100, '17.40', '3.20', '0.030', '0.050'),
(6, 8, 300, '24.61', '10.50', '0.030', '0.050'),
(7, 9, 50, '38.90', '10.00', '0.030', '0.050'),
(8, 10, 300, '30.78', '15.00', '0.030', '0.050'),
(9, 11, 200, '20.00', '0.00', '0.000', '0.000');

-- --------------------------------------------------------

--
-- Estrutura da tabela `negociacoes`
--

CREATE TABLE IF NOT EXISTS `negociacoes` (
  `idNegociacao` int(11) NOT NULL AUTO_INCREMENT,
  `idLivro` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `dataNegociacao` date NOT NULL,
  PRIMARY KEY (`idNegociacao`),
  KEY `fk_Aluguel_Livro_idx` (`idLivro`),
  KEY `fk_Aluguel_Usuario1_idx` (`idUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `negociacoes`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa_fisica`
--

CREATE TABLE IF NOT EXISTS `pessoa_fisica` (
  `idPessoaFisica` int(11) NOT NULL AUTO_INCREMENT,
  `idUsuario` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `identidade` varchar(20) DEFAULT NULL,
  `cpf` varchar(11) DEFAULT NULL,
  `dataNascimento` date NOT NULL,
  `endereco` varchar(200) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `celular` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `homePage` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idPessoaFisica`),
  KEY `fk_Pessoa_Fisica_Usuarios1_idx` (`idUsuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `pessoa_fisica`
--

INSERT INTO `pessoa_fisica` (`idPessoaFisica`, `idUsuario`, `nome`, `identidade`, `cpf`, `dataNascimento`, `endereco`, `telefone`, `celular`, `email`, `homePage`) VALUES
(1, 19, 'leo', '89898989', '11111111', '2015-05-15', 'Rua ', '123', '321', 'leo@leo', 'leo'),
(2, 20, 'leo', '89898989', '11111111', '2015-05-15', 'Rua ', '123', '321', 'leo@leo', 'leo'),
(3, 24, 'teste', 'teste', 'teste', '2015-05-08', 'teste, teste, teste, , teste', 't', 't', 'teste@teste', 't'),
(4, 25, 'teste', 'teste', 'teste', '2015-05-08', 'teste, teste, teste, AL, teste', 't', 't', 'teste@teste', 't');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa_juridica`
--

CREATE TABLE IF NOT EXISTS `pessoa_juridica` (
  `idPessoaJuridica` int(11) NOT NULL AUTO_INCREMENT,
  `idUsuario` int(11) NOT NULL,
  `CNPJ` varchar(20) NOT NULL,
  `razaoSocial` varchar(100) NOT NULL,
  `endereco` varchar(200) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `celular` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `homePage` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idPessoaJuridica`),
  KEY `fk_Pessoa_Juridica_Usuarios1_idx` (`idUsuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `pessoa_juridica`
--

INSERT INTO `pessoa_juridica` (`idPessoaJuridica`, `idUsuario`, `CNPJ`, `razaoSocial`, `endereco`, `telefone`, `celular`, `email`, `homePage`) VALUES
(1, 23, 'jur', 'jur', 'jur', '123', '123', 'jur@jur', 'jur');

-- --------------------------------------------------------

--
-- Estrutura da tabela `reservas`
--

CREATE TABLE IF NOT EXISTS `reservas` (
  `idReserva` int(11) NOT NULL AUTO_INCREMENT,
  `idLivro` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  PRIMARY KEY (`idReserva`),
  KEY `fk_Reservas_Livros1_idx` (`idLivro`),
  KEY `fk_Reservas_Usuarios1_idx` (`idUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `reservas`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(45) NOT NULL,
  `senha` varchar(60) NOT NULL,
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `user`, `senha`) VALUES
(11, 'a', '$2a$08$MjAyOTg5MjU1MTU1NGNlMemJkLjCS9Nx.rfwR9anSZRCadE51O3we'),
(19, 'leo', '$2a$08$OTYwNjM5ODYwNTU0Y2Y5OOF.gahyQfBCZxpuJR.JS1eKk9pvCnXLe'),
(20, 'leo', '$2a$08$NTg0NDUzMzk3NTU0Y2Y5YO54dNtwRzNNn09J47EQujL9a6bVCEe5m'),
(21, 'jur', '$2a$08$MjA4OTI2NDczOTU1NGNmYuRt87JvEdvC8T/qPKdQEdKG3qyFErObm'),
(22, 'jur', '$2a$08$ODI3OTIxNzA4NTU0Y2ZkO.RKG/nkbQVtwssWRoNSGVIvvHmdtHK.a'),
(23, 'jur', '$2a$08$MzUzNzk0OTEyNTU0Y2ZkYOryPlFYbs8nwXr3KXkbTLJjc8aLPSona'),
(24, 'teste', '$2a$08$MTU0MzMwNjI0MzU1NGNmZO8fH2wK./vrVePhGCxaka0Acc0AJne7e'),
(25, 'teste', '$2a$08$NDEwNjE0NzYxNTU0Y2ZlNOyzu.foL/0o5DDnkTZwdDIQ6oUlF.4KO');

--
-- Restrições para as tabelas dumpadas
--

--
-- Restrições para a tabela `aluguel`
--
ALTER TABLE `aluguel`
  ADD CONSTRAINT `fk_Aluguel_Operacoes1` FOREIGN KEY (`idNegociacao`) REFERENCES `negociacoes` (`idNegociacao`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `livros`
--
ALTER TABLE `livros`
  ADD CONSTRAINT `fk_Livro_Categoria1` FOREIGN KEY (`idCategoria`) REFERENCES `categorias` (`idCategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `livros_valores`
--
ALTER TABLE `livros_valores`
  ADD CONSTRAINT `fk_Livro_Valores_Livro1` FOREIGN KEY (`idLivro`) REFERENCES `livros` (`idLivro`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `negociacoes`
--
ALTER TABLE `negociacoes`
  ADD CONSTRAINT `fk_Aluguel_Livro` FOREIGN KEY (`idLivro`) REFERENCES `livros` (`idLivro`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Aluguel_Usuario1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `pessoa_fisica`
--
ALTER TABLE `pessoa_fisica`
  ADD CONSTRAINT `fk_Pessoa_Fisica_Usuarios1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `pessoa_juridica`
--
ALTER TABLE `pessoa_juridica`
  ADD CONSTRAINT `fk_Pessoa_Juridica_Usuarios1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `reservas`
--
ALTER TABLE `reservas`
  ADD CONSTRAINT `fk_Reservas_Livros1` FOREIGN KEY (`idLivro`) REFERENCES `livros` (`idLivro`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Reservas_Usuarios1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
