-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 09-Maio-2023 às 13:16
-- Versão do servidor: 10.5.16-MariaDB
-- versão do PHP: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `id18058912_bibliomania`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `id_categ` int(11) NOT NULL,
  `nome_categ` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id_categ`, `nome_categ`) VALUES
(48, 'Romance.'),
(50, 'Crônica'),
(51, 'Conto.'),
(52, 'Novela.'),
(53, 'Epopeia.'),
(54, 'Elegia.'),
(56, 'Comédia.'),
(57, 'Tragédia.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentarios`
--

CREATE TABLE `comentarios` (
  `id_coment` int(11) NOT NULL,
  `data` date DEFAULT NULL,
  `id_cad` int(11) DEFAULT NULL,
  `id_li` int(11) DEFAULT NULL,
  `comentario` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `comentarios`
--

INSERT INTO `comentarios` (`id_coment`, `data`, `id_cad`, `id_li`, `comentario`) VALUES
(39, '2021-12-13', 77, 80, 'Sei lá'),
(40, '2021-12-13', 77, 80, 'WTF'),
(41, '2021-12-13', 77, 80, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `histórico`
--

CREATE TABLE `histórico` (
  `id_hist` int(11) NOT NULL,
  `id_cad` int(11) DEFAULT NULL,
  `id_li` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `histórico`
--

INSERT INTO `histórico` (`id_hist`, `id_cad`, `id_li`) VALUES
(17, 77, 80),
(18, 78, 80),
(19, 79, 80);

-- --------------------------------------------------------

--
-- Estrutura da tabela `livros`
--

CREATE TABLE `livros` (
  `id_li` int(11) NOT NULL,
  `nome_liv` varchar(100) NOT NULL,
  `autor` text NOT NULL,
  `edição` varchar(100) DEFAULT NULL,
  `id_categ` int(11) DEFAULT NULL,
  `descrição` text DEFAULT NULL,
  `c_arquivo` text DEFAULT NULL,
  `img_li` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `livros`
--

INSERT INTO `livros` (`id_li`, `nome_liv`, `autor`, `edição`, `id_categ`, `descrição`, `c_arquivo`, `img_li`) VALUES
(80, 'irineu', 'vc num sabe nem eu', 'de ouro', 53, 'top-19 formas de como mendigar na rua vestido de com roupa de presidiario de desenhos animados.', 'pdfs/irineu.pdf', 'pdfs/img_li/irineu.jfif');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `id_p` int(11) NOT NULL,
  `id_cad` int(11) DEFAULT NULL,
  `nome_livro` varchar(100) NOT NULL,
  `genero_livro` varchar(100) NOT NULL,
  `inf_add` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pedidos`
--

INSERT INTO `pedidos` (`id_p`, `id_cad`, `nome_livro`, `genero_livro`, `inf_add`) VALUES
(12, 77, 'PAULO HELDER GONCALVES RODRIGUES', 'comedia', '[plo´pop´póó´po');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_cad` int(11) NOT NULL,
  `nome_usu` text DEFAULT NULL,
  `email` text NOT NULL,
  `Password` varchar(10) NOT NULL,
  `c_photo` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_cad`, `nome_usu`, `email`, `Password`, `c_photo`) VALUES
(77, 'PauloHelder', 'pauloheldergr@gmail.com', '12345', 'fotocad/PauloHelder.jpg'),
(78, 'root', 'cicero.silva362@aluno.ce.gov.br', '123456789', 'fotocad/root.jpg'),
(79, 'Edu', 'cicero.silva362@Aluno.ce.gov', 'e123', 'fotocad/Edu.png');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categ`);

--
-- Índices para tabela `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id_coment`),
  ADD KEY `id_cad` (`id_cad`),
  ADD KEY `id_li` (`id_li`);

--
-- Índices para tabela `histórico`
--
ALTER TABLE `histórico`
  ADD PRIMARY KEY (`id_hist`),
  ADD KEY `id_cad` (`id_cad`),
  ADD KEY `id_li` (`id_li`);

--
-- Índices para tabela `livros`
--
ALTER TABLE `livros`
  ADD PRIMARY KEY (`id_li`),
  ADD KEY `id_categ` (`id_categ`);

--
-- Índices para tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id_p`),
  ADD KEY `id_cad` (`id_cad`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_cad`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categ` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT de tabela `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id_coment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de tabela `histórico`
--
ALTER TABLE `histórico`
  MODIFY `id_hist` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `livros`
--
ALTER TABLE `livros`
  MODIFY `id_li` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id_p` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_cad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`id_cad`) REFERENCES `usuario` (`id_cad`),
  ADD CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`id_li`) REFERENCES `livros` (`id_li`);

--
-- Limitadores para a tabela `histórico`
--
ALTER TABLE `histórico`
  ADD CONSTRAINT `histórico_ibfk_1` FOREIGN KEY (`id_cad`) REFERENCES `usuario` (`id_cad`),
  ADD CONSTRAINT `histórico_ibfk_2` FOREIGN KEY (`id_li`) REFERENCES `livros` (`id_li`);

--
-- Limitadores para a tabela `livros`
--
ALTER TABLE `livros`
  ADD CONSTRAINT `livros_ibfk_1` FOREIGN KEY (`id_categ`) REFERENCES `categorias` (`id_categ`);

--
-- Limitadores para a tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`id_cad`) REFERENCES `usuario` (`id_cad`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
