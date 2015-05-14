-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: Mai 08, 2015 as 10:58 PM
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
-- Estrutura da tabela `generos`
--

CREATE TABLE IF NOT EXISTS `generos` (
  `idGenero` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  PRIMARY KEY (`idGenero`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Extraindo dados da tabela `generos`
--

INSERT INTO `generos` (`idGenero`, `nome`) VALUES
(15, 'Aventura'),
(21, 'Suspense');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `pessoa_fisica`
--

INSERT INTO `pessoa_fisica` (`idPessoaFisica`, `idUsuario`, `nome`, `identidade`, `cpf`, `dataNascimento`, `endereco`, `telefone`, `celular`, `email`, `homePage`) VALUES
(5, 26, 'leo', '312312312', '12312321312', '0000-00-00', 'rua, cohatrac, sao luis, MA, 650500', '9898798', '128731888767', 'leonardo@hotmail.com', 'leonardo');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `user`, `senha`) VALUES
(26, 'leo', '$2a$08$MTQwNDE5MzIwODU1NGQzZOqRHe6EOtgTxb9VKGiBQXsHXwJEUv2Je');

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
  ADD CONSTRAINT `fk_Livro_Categoria1` FOREIGN KEY (`idCategoria`) REFERENCES `generos` (`idGenero`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
