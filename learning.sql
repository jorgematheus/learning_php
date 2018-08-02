-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 01-Ago-2018 às 21:58
-- Versão do servidor: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `learning`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aulas`
--

DROP TABLE IF EXISTS `aulas`;
CREATE TABLE IF NOT EXISTS `aulas` (
  `id` int(12) NOT NULL,
  `autor` varchar(50) DEFAULT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `data_criacao` datetime DEFAULT NULL,
  `ultima_edicao` varchar(50) DEFAULT NULL,
  `data_edicao` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `aulas`
--

INSERT INTO `aulas` (`id`, `autor`, `nome`, `data_criacao`, `ultima_edicao`, `data_edicao`) VALUES
(1, 'Jorge', 'Aula1', NULL, NULL, NULL),
(2, 'Jorge', 'Aula2', NULL, NULL, NULL),
(3, 'Jorge', 'Aula3', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `aula_has_conteudo`
--

DROP TABLE IF EXISTS `aula_has_conteudo`;
CREATE TABLE IF NOT EXISTS `aula_has_conteudo` (
  `idAula` int(12) NOT NULL,
  `idConteudo` int(12) NOT NULL,
  PRIMARY KEY (`idAula`,`idConteudo`),
  KEY `FK_aulas_has_conteudo_conteudo` (`idConteudo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `aula_has_conteudo`
--

INSERT INTO `aula_has_conteudo` (`idAula`, `idConteudo`) VALUES
(1, 1),
(1, 2),
(2, 1),
(3, 2),
(3, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `class`
--

DROP TABLE IF EXISTS `class`;
CREATE TABLE IF NOT EXISTS `class` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author` tinyint(5) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `date_creation` datetime DEFAULT NULL,
  `last_editor` tinyint(5) DEFAULT NULL,
  `date_edition` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `class`
--

INSERT INTO `class` (`id`, `author`, `description`, `name`, `date_creation`, `last_editor`, `date_edition`) VALUES
(1, 1, 'teste descrição turma', 'turma de  teste', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `class_has_course`
--

DROP TABLE IF EXISTS `class_has_course`;
CREATE TABLE IF NOT EXISTS `class_has_course` (
  `idClass` int(11) NOT NULL,
  `idCourse` int(11) NOT NULL,
  PRIMARY KEY (`idClass`,`idCourse`),
  KEY `FK_Course` (`idCourse`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `class_has_course`
--

INSERT INTO `class_has_course` (`idClass`, `idCourse`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `content`
--

DROP TABLE IF EXISTS `content`;
CREATE TABLE IF NOT EXISTS `content` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(60) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `content` mediumtext NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `author` varchar(10) NOT NULL,
  `date_creation` datetime NOT NULL,
  `last_editor` varchar(10) DEFAULT NULL,
  `date_edition` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_Author` (`author`),
  KEY `FK_Last_Editor` (`last_editor`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `content`
--

INSERT INTO `content` (`id`, `title`, `description`, `content`, `active`, `author`, `date_creation`, `last_editor`, `date_edition`) VALUES
(2, 'teste t', 'teste d', '<p>teste cc</p>\r\n', 1, '1', '2018-07-20 11:30:57', '1', '2018-07-31 10:25:08'),
(3, 'teste de titulo 2', 'teste de descriÃ§Ã£o', '<div style=\"background:#eeeeee; border:1px solid #cccccc; padding:5px 10px\"><u>marker</u></div>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"background-color:#16a085\">teste 2</span></p>\r\n\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:500px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Jorge</td>\r\n			<td>1</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Matheus</td>\r\n			<td>2</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Nunes</td>\r\n			<td>3</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n', 1, '1', '2018-07-20 11:37:48', '1', '2018-07-25 14:14:17'),
(4, 'Teste de tÃ­tulo', 'teste de descriÃ§Ã£o', '<p style=\"text-align:center\"><span class=\"marker\"><em><strong>teste</strong></em></span></p>\r\n', 0, '1', '2018-07-20 11:44:52', '1', '2018-07-31 13:24:41');

-- --------------------------------------------------------

--
-- Estrutura da tabela `course`
--

DROP TABLE IF EXISTS `course`;
CREATE TABLE IF NOT EXISTS `course` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `author` tinyint(4) DEFAULT NULL,
  `img_logo` varchar(32) DEFAULT NULL,
  `date_creation` datetime DEFAULT NULL,
  `last_editor` char(1) DEFAULT NULL,
  `date_edition` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `course`
--

INSERT INTO `course` (`id`, `title`, `description`, `author`, `img_logo`, `date_creation`, `last_editor`, `date_edition`) VALUES
(1, 'teste curso', 'teste descricao', 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `course_has_lesson`
--

DROP TABLE IF EXISTS `course_has_lesson`;
CREATE TABLE IF NOT EXISTS `course_has_lesson` (
  `idCourse` int(11) NOT NULL,
  `idLesson` int(11) NOT NULL,
  PRIMARY KEY (`idCourse`,`idLesson`),
  KEY `FK_Lesson` (`idLesson`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `course_has_lesson`
--

INSERT INTO `course_has_lesson` (`idCourse`, `idLesson`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `curso_has_aula`
--

DROP TABLE IF EXISTS `curso_has_aula`;
CREATE TABLE IF NOT EXISTS `curso_has_aula` (
  `idCurso` int(12) NOT NULL,
  `idAula` int(12) NOT NULL,
  PRIMARY KEY (`idCurso`,`idAula`),
  KEY `FK_curso_has_aula_Aula` (`idAula`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `curso_has_aula`
--

INSERT INTO `curso_has_aula` (`idCurso`, `idAula`) VALUES
(1, 2),
(2, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `lesson`
--

DROP TABLE IF EXISTS `lesson`;
CREATE TABLE IF NOT EXISTS `lesson` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `active` int(1) DEFAULT '1',
  `description` varchar(130) DEFAULT NULL,
  `author` varchar(50) DEFAULT NULL,
  `date_creation` datetime DEFAULT NULL,
  `last_editor` char(1) DEFAULT NULL,
  `date_edition` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `lesson`
--

INSERT INTO `lesson` (`id`, `title`, `active`, `description`, `author`, `date_creation`, `last_editor`, `date_edition`) VALUES
(1, 'teste de aula 1', 0, 'descriÃ§Ã£o aula 1', '1', '2018-07-25 13:46:00', '1', '2018-08-01 18:48:47'),
(2, 'Novo tÃ­tulo aula', 1, NULL, '1', '2018-07-30 18:59:39', '1', '2018-07-31 13:29:45'),
(3, 'Novo titulo aula ', 1, NULL, '1', '2018-07-30 19:00:02', '1', '2018-07-31 13:29:43'),
(4, 'Novo titulo aula ', 1, 'nova descricao', '1', '2018-07-30 19:00:44', '1', '2018-07-31 13:29:42'),
(5, 'test', 1, ' descriÃ§Ã£o', '1', '2018-07-30 19:01:25', '1', '2018-07-31 13:29:40');

-- --------------------------------------------------------

--
-- Estrutura da tabela `lesson_has_content`
--

DROP TABLE IF EXISTS `lesson_has_content`;
CREATE TABLE IF NOT EXISTS `lesson_has_content` (
  `idLesson` int(11) NOT NULL,
  `idContent` int(11) NOT NULL,
  PRIMARY KEY (`idLesson`,`idContent`),
  KEY `FK_content` (`idContent`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `lesson_has_content`
--

INSERT INTO `lesson_has_content` (`idLesson`, `idContent`) VALUES
(1, 2),
(1, 3),
(2, 4),
(5, 2),
(5, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `dt_nascimento` date DEFAULT NULL,
  `ativo` tinyint(1) DEFAULT '1',
  `tipo_user` tinyint(1) DEFAULT '1',
  `data_criacao` datetime DEFAULT NULL,
  `celular` varchar(15) DEFAULT NULL,
  `ultima_modificacao` datetime DEFAULT NULL,
  `ultimo_editor` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `usuario`, `email`, `senha`, `dt_nascimento`, `ativo`, `tipo_user`, `data_criacao`, `celular`, `ultima_modificacao`, `ultimo_editor`) VALUES
(1, 'Jorge Matheus ', 'jorge.matheus10@hotmail.com', '$2y$10$guh37mlyu/qWNjfR/AcF2OdgTSnnPv20SCxEXBLAO3ZlXP2BlsBlG', '1999-05-14', 1, 3, '2018-07-04 21:18:55', '(11) 95496-5195', '2018-08-01 13:37:20', 'Jorge Matheus'),
(32, 'Matheus', 'teste@teste.com', '$2y$10$GMG6J.VSFcahTTGqzmbUD.gbDn7Q2VEj7p/aRTCfBvMarol6tfb5y', '1969-12-31', 1, 1, '2018-07-17 17:24:13', '(11) 95496-5195', '2018-07-25 12:49:55', 'Jorge Matheus'),
(45, 'teste2', 'teste2@teste.com', '$2y$10$TJFyGjEycak6mETsKAhGgep/uifBa8Ub5XlB0lgBOsMbnFYXESoWm', '1969-12-31', 1, 2, '2018-07-23 16:46:29', NULL, '2018-07-31 12:34:59', 'Jorge Matheus'),
(46, 'teste', 'jorge.mwatheus10@hotmail.com', '$2y$10$wPeq.w6hocFngJYKt/5p5.oUELS94w0Fm/9bpwpkf4PVyDRCNPwe.', NULL, 0, 1, '2018-07-23 17:05:13', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `user_type_permission`
--

DROP TABLE IF EXISTS `user_type_permission`;
CREATE TABLE IF NOT EXISTS `user_type_permission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `params` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
