-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 31-Ago-2018 às 16:11
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
  `title` varchar(100) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `active` char(1) NOT NULL DEFAULT '1',
  `author` tinyint(5) DEFAULT NULL,
  `date_creation` datetime DEFAULT NULL,
  `last_editor` tinyint(5) DEFAULT NULL,
  `date_edition` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=60 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `class`
--

INSERT INTO `class` (`id`, `title`, `description`, `image`, `active`, `author`, `date_creation`, `last_editor`, `date_edition`) VALUES
(44, 'TESTE2', 'TESTE', '15a241e783720545b9b4693e21a2498a.png', '0', 1, '2018-08-29 12:07:40', 1, '2018-08-29 12:44:18'),
(45, 'qqqqqqqqqqqqqqqqq', 'qqqqqqqqqqq', 'a9bf4d17ad497687729412ebc29bf030.jpg', '0', 1, '2018-08-29 12:09:10', 1, '2018-08-29 12:44:20'),
(40, 'DESC1e', 'teste2', 'eab7763eff3b3ca151e51bcf7b7ee3b8.jpg', '0', 1, '2018-08-28 19:06:28', 1, '2018-08-29 18:42:22'),
(41, '656546', '', '5c20bfa1c3a2fd85b3bf47ece1bf841a.jpg', '0', 1, '2018-08-29 09:35:43', 1, '2018-08-29 13:20:54'),
(42, 'teste d', '', 'f036aa0064e087962e26f96e447013d1.png', '0', 1, '2018-08-29 10:07:35', 1, '2018-08-29 12:44:27'),
(43, 'teste di', '', 'de5c90bb25854b145a66a3399cb160ac.jpg', '0', 1, '2018-08-29 10:08:08', 1, '2018-08-29 12:44:31'),
(39, 'teste', '', '70a6ae565a41e9d7f4c7a8370bf73b75.png', '0', 1, '2018-08-28 19:05:34', 1, '2018-08-29 12:44:32'),
(29, 'Turma de Direito - 8Âº Semestre', 'Cursos atribuÃ­dos Ã  turma de Direito do 8Âº Semestre.', '9f5fcde3519de4bcfd7d11fdb8812132.jpg', '1', 1, '2018-08-28 17:57:58', 1, '2018-08-30 13:38:46'),
(27, 'Turma de CiÃªncia da ComputaÃ§Ã£o - 4Âº Semestre', 'Cursos atribuÃ­dos Ã  turma de CiÃªncia da ComputaÃ§Ã£o do 4Âº Semestre.', 'ce2d7358e9073e9fb2a09c5d8142a731.jpg', '1', 1, '2018-08-28 17:51:59', 1, '2018-08-30 13:38:53'),
(46, 'teste', 'teste', 'f9d885b101712eb3c17f2cc5ef34dfc7.jpg', '0', 1, '2018-08-29 17:43:47', 1, '2018-08-29 18:42:28'),
(47, 'teste12', 'teste', NULL, '0', 1, '2018-08-29 17:44:48', 1, '2018-08-29 18:42:30'),
(48, 'teste com nova imagem', 'ZZZZteste de descricao teste de descricaoteste de descricaoteste de descricaoteste de descricaoteste de descricaoteste de descricaoteste de descricaoteste de descricao                ', '77e1459e364800e8c608afafb225b50c.jpg', '0', 1, '2018-08-29 18:14:47', 1, '2018-08-29 18:42:33'),
(49, 'NOVO TESTE', 'teste', 'a540f9e380e5c36f8977a912173e7fad.jpg', '0', 1, '2018-08-29 18:39:04', 1, '2018-08-29 18:42:37'),
(50, 'tretttwret', 'rewtet', 'cb6b821d623b535d1f1bac0744599cf8.jpg', '0', 1, '2018-08-29 18:41:25', 1, '2018-08-29 18:42:40'),
(51, '0111111111111111111111111111101111111111111111111111111111011111111111111111111111111110111111111111', 'descdesdescdesdescdesdescdesdescdesdescdesdescdesdescdesdescdesdescdesdescdesdescdesdescdesdescdesdescdesdescdesdescdesdescdesdescdesdescdesdescdesdescdesdescdesdescdesdescdesdescdesdescdesdescdesdescdesdescdesdescdesdescdesdescdesdescdesdescdesdescdesdes', 'class-default-image.jpg', '0', 1, '2018-08-29 18:41:43', 1, '2018-08-30 18:58:40'),
(52, 'wetwetwet', 'wetwt', 'class-default-image.jpg', '0', 1, '2018-08-29 18:59:15', 1, '2018-08-30 13:38:59'),
(53, 'teste', 'teste', 'cc791029fd938037c151ed0a66200ac7.jpg', '0', 1, '2018-08-30 09:50:33', 1, '2018-08-30 13:39:02'),
(54, 'wetwt', '', '9a1cfc116c02ff100041f5720e4ad564.jpg', '0', 1, '2018-08-30 09:51:42', 1, '2018-08-30 13:39:03'),
(55, 'qqqqqqqqqqqqqq', '', 'ea8575ae52772c528c0f0edf14ec4ee1.jpg', '0', 1, '2018-08-30 09:52:35', 1, '2018-08-30 13:39:05'),
(56, '55555555555', '55555555555555', 'class-default-image.jpg', '0', 1, '2018-08-30 09:54:00', 1, '2018-08-30 13:39:11'),
(57, 'DIREITO', '', 'f3bf00ddc4c3352e2617e3570b4329d0.jpg', '0', 1, '2018-08-30 13:16:51', 1, '2018-08-30 13:39:08'),
(58, 'qqqqqqqqqqqqq', 'q', '6d1c91ee53f9b761a1279a76982560bc.jpg', '0', 1, '2018-08-30 13:20:29', 1, '2018-08-30 13:39:14'),
(59, '22222222', '', 'class-default-image.jpg', '0', 1, '2018-08-30 13:21:28', 1, '2018-08-30 13:43:23');

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
(27, 2),
(40, 1),
(40, 2),
(40, 3),
(40, 6),
(44, 3),
(44, 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `content`
--

DROP TABLE IF EXISTS `content`;
CREATE TABLE IF NOT EXISTS `content` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
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
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `content`
--

INSERT INTO `content` (`id`, `title`, `description`, `content`, `active`, `author`, `date_creation`, `last_editor`, `date_edition`) VALUES
(2, 'teste t', 'teste d', '<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><strong><span style=\"font-family:&quot;Trebuchet MS&quot;,sans-serif\"><span style=\"color:black\">ATENDIMENTO GRATUITO PARA A COMUNIDADE!</span></span></strong></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><strong><span style=\"font-family:&quot;Trebuchet MS&quot;,sans-serif\"><span style=\"color:black\">HOR&Aacute;RIO DE FUNCIONAMENTO:&nbsp;</span></span></strong><span style=\"font-family:&quot;Trebuchet MS&quot;,sans-serif\"><span style=\"color:black\">de segunda a sexta das 08h &agrave;s 17h e s&aacute;bados das 08 &agrave;s 12h</span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><strong><span style=\"font-family:&quot;Trebuchet MS&quot;,sans-serif\"><span style=\"color:black\">LOCAL DE FUNCIONAMENTO:</span></span></strong><span style=\"font-family:&quot;Trebuchet MS&quot;,sans-serif\"><span style=\"color:black\">&nbsp;Avenida Mato Grosso, 26 - Centro, Campo Grande &ndash; MS &ndash; Fone: (67) 3323-7801</span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><strong><span style=\"font-family:&quot;Trebuchet MS&quot;,sans-serif\"><span style=\"color:black\">OBJETIVO:&nbsp;</span></span></strong><span style=\"font-family:&quot;Trebuchet MS&quot;,sans-serif\"><span style=\"color:black\">O N&uacute;cleo de Pr&aacute;tica Jur&iacute;dica - NPJ &eacute; respons&aacute;vel pela coordena&ccedil;&atilde;o e desenvolvimento do Est&aacute;gio Supervisionado, que tem por finalidade proporcionar ao aluno oportunidade de desenvolver sua capacidade profissional, sob a direta supervis&atilde;o cr&iacute;tica do professor/orientador.</span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><strong><span style=\"font-family:&quot;Trebuchet MS&quot;,sans-serif\"><span style=\"color:black\">ATIVIDADES:&nbsp;</span></span></strong><span style=\"font-family:&quot;Trebuchet MS&quot;,sans-serif\"><span style=\"color:black\">As atividades do Est&aacute;gio de Pr&aacute;tica Real s&atilde;o desenvolvidas no NPJ, que funciona como Servi&ccedil;o de Assist&ecirc;ncia Judici&aacute;ria, com presta&ccedil;&atilde;o de servi&ccedil;o jur&iacute;dico-social &agrave; popula&ccedil;&atilde;o carente.<br />\r\nOs alunos que fazem parte da equipe, em contato direto com a pr&aacute;tica jur&iacute;dica real, sempre sob a supervis&atilde;o do professor orientador, desenvolvem as seguintes atividades:</span></span></span></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:11pt\"><span style=\"color:black\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><span style=\"font-family:&quot;Trebuchet MS&quot;,sans-serif\">atendimento direto do cliente;</span></span></span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"color:black\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><span style=\"font-family:&quot;Trebuchet MS&quot;,sans-serif\">acordos extrajudiciais;</span></span></span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"color:black\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><span style=\"font-family:&quot;Trebuchet MS&quot;,sans-serif\">elabora&ccedil;&atilde;o de pe&ccedil;as processuais;</span></span></span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"color:black\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><span style=\"font-family:&quot;Trebuchet MS&quot;,sans-serif\">acompanhamento de processos at&eacute; a decis&atilde;o que p&otilde;e fim ao lit&iacute;gio.</span></span></span></span></li>\r\n</ul>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><strong><span style=\"font-family:&quot;Trebuchet MS&quot;,sans-serif\"><span style=\"color:black\">&Aacute;REA DE ATUA&Ccedil;&Atilde;O</span></span></strong><span style=\"font-family:&quot;Trebuchet MS&quot;,sans-serif\"><span style=\"color:black\">: &Aacute;rea civil nos juizados especiais<br />\r\nOs Juizados Especiais C&iacute;veis s&atilde;o &oacute;rg&atilde;os da Justi&ccedil;a que se destinam a resolver pequenas causas com rapidez e de forma simples.</span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><span style=\"font-family:&quot;Trebuchet MS&quot;,sans-serif\"><span style=\"color:black\">Para propor nos Juizados as partes n&atilde;o pagam custas processuais.<br />\r\nOs Juizados se destinam ao julgamento de causas c&iacute;veis de menor complexidade, como tamb&eacute;m outras causas definidas no art. 3&ordm;, da Lei 9.099/95, e no art. 275 do CPC:<br />\r\n&quot;Art. 3&ordm; O Juizado Especial C&iacute;vel tem compet&ecirc;ncia para concilia&ccedil;&atilde;o, processo e julgamento das causas c&iacute;veis de menor complexidade, assim consideradas:</span></span></span></span><br />\r\n&nbsp;</p>\r\n\r\n<figure class=\"easyimage easyimage-full\"><img alt=\"teste\" src=\"blob:http://localhost:3000/d65fe368-983d-4ca8-969f-e964d572f31c\" style=\"width:1358px\" />\r\n<figcaption></figcaption>\r\n</figure>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\"><br />\r\n<span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><span style=\"font-family:&quot;Trebuchet MS&quot;,sans-serif\"><span style=\"color:black\">II - as enumeradas no art. 275, inciso II, do C&oacute;digo de Processo Civil;<br />\r\nIII - a a&ccedil;&atilde;o de despejo para uso pr&oacute;prio;<br />\r\nIV - as a&ccedil;&otilde;es possess&oacute;rias sobre bens im&oacute;veis de valor n&atilde;o excedente ao fixado no inciso I deste artigo.<br />\r\n&sect;1&ordm; Compete ao Juizado Especial promover a execu&ccedil;&atilde;o:<br />\r\nI - dos seus julgados;<br />\r\nII - dos t&iacute;tulos executivos extrajudiciais, no valor de at&eacute; quarenta vezes o sal&aacute;rio m&iacute;nimo, observado o disposto no &sect; 1&ordm; do art. 8&ordm; desta Lei.&quot;</span></span></span></span></p>\r\n', 0, '1', '2018-07-20 11:30:57', '1', '2018-08-30 13:47:55'),
(3, 'teste de titulo 2', 'teste de descriÃ§Ã£o', '<div style=\"background:#eeeeee; border:1px solid #cccccc; padding:5px 10px\"><u>marker</u></div>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"background-color:#16a085\">teste 2</span></p>\r\n\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:500px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Jorge</td>\r\n			<td>1</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Matheus</td>\r\n			<td>2</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Nunes</td>\r\n			<td>3</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n', 1, '1', '2018-07-20 11:37:48', '1', '2018-07-25 14:14:17'),
(4, 'Teste de tÃ­tulo', 'teste de descriÃ§Ã£o', '<p style=\"text-align:center\"><span class=\"marker\"><em><strong>teste</strong></em></span></p>\r\n', 1, '1', '2018-07-20 11:44:52', '1', '2018-08-20 14:26:44'),
(5, 'Teste de tÃ­tulo32343', 'teste', '<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><strong><span style=\"color:black\"><span style=\"background-color:#27ae60\">ATENDIMENTO GRATUITO PARA A COMUNIDADE!</span></span></strong></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><strong><span style=\"color:black\">HOR&Aacute;RIO DE FUNCIONAMENTO:&nbsp;</span></strong><span style=\"color:black\">de segunda a sexta das 08h &agrave;s 17h e s&aacute;bados das 08 &agrave;s 12h</span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><strong><span style=\"color:black\">LOCAL DE FUNCIONAMENTO:</span></strong><span style=\"color:black\">&nbsp;Avenida Mato Grosso, 26 - Centro, Campo Grande &ndash; MS &ndash; Fone: (67) 3323-7801</span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><strong><span style=\"color:black\">OBJETIVO:&nbsp;</span></strong><span style=\"color:black\">O N&uacute;cleo de Pr&aacute;tica Jur&iacute;dica - NPJ &eacute; respons&aacute;vel pela coordena&ccedil;&atilde;o e desenvolvimento do Est&aacute;gio Supervisionado, que tem por finalidade proporcionar ao aluno oportunidade de desenvolver sua capacidade profissional, sob a direta supervis&atilde;o cr&iacute;tica do professor/orientador.</span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><strong><span style=\"color:black\">ATIVIDADES:&nbsp;</span></strong><span style=\"color:black\">As atividades do Est&aacute;gio de Pr&aacute;tica Real s&atilde;o desenvolvidas no NPJ, que funciona como Servi&ccedil;o de Assist&ecirc;ncia Judici&aacute;ria, com presta&ccedil;&atilde;o de servi&ccedil;o jur&iacute;dico-social &agrave; popula&ccedil;&atilde;o carente.<br />\r\nOs alunos que fazem parte da equipe, em contato direto com a pr&aacute;tica jur&iacute;dica real, sempre sob a supervis&atilde;o do professor orientador, desenvolvem as seguintes atividades:</span></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:11pt\"><span style=\"color:black\">atendimento direto do cliente;</span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"color:black\">acordos extrajudiciais;</span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"color:black\">elabora&ccedil;&atilde;o de pe&ccedil;as processuais;</span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"color:black\">acompanhamento de processos at&eacute; a decis&atilde;o que p&otilde;e fim ao lit&iacute;gio.</span></span></li>\r\n</ul>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><strong><span style=\"color:black\">&Aacute;REA DE ATUA&Ccedil;&Atilde;O</span></strong><span style=\"color:black\">: &Aacute;rea civil nos juizados especiais<br />\r\nOs Juizados Especiais C&iacute;veis s&atilde;o &oacute;rg&atilde;os da Justi&ccedil;a que se destinam a resolver pequenas causas com rapidez e de forma simples.</span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"color:black\">Para propor nos Juizados as partes n&atilde;o pagam custas processuais.<br />\r\nOs Juizados se destinam ao julgamento de causas c&iacute;veis de menor complexidade, como tamb&eacute;m outras causas definidas no art. 3&ordm;, da Lei 9.099/95, e no art. 275 do CPC:<br />\r\n&quot;Art. 3&ordm; O Juizado Especial C&iacute;vel tem compet&ecirc;ncia para concilia&ccedil;&atilde;o, processo e julgamento das causas c&iacute;veis de menor complexidade, assim consideradas:<br />\r\nI - as causas cujo valor n&atilde;o exceda a quarenta vezes o sal&aacute;rio m&iacute;nimo;&nbsp;<br />\r\nII - as enumeradas no art. 275, inciso II, do C&oacute;digo de Processo Civil;<br />\r\nIII - a a&ccedil;&atilde;o de despejo para uso pr&oacute;prio;<br />\r\nIV - as a&ccedil;&otilde;es possess&oacute;rias sobre bens im&oacute;veis de valor n&atilde;o excedente ao fixado no inciso I deste artigo.<br />\r\n&sect;1&ordm; Compete ao Juizado Especial promover a execu&ccedil;&atilde;o:<br />\r\nI - dos seus julgados;<br />\r\nII - dos t&iacute;tulos executivos extrajudiciais, no valor de at&eacute; quarenta vezes o sal&aacute;rio m&iacute;nimo, observado o disposto no &sect; 1&ordm; do art. 8&ordm; desta Lei.&quot;</span></span></p>\r\n', 0, '1', '2018-08-02 09:22:56', '1', '2018-08-20 14:27:09'),
(6, 'ccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccÃ§', 'descricao0descricao0descricao0descricao0descricao0descricao0descricao0descricao0descricao0descricao0descricao0descricao0descricao0descricao0descricao0descricao0descricao0descricao0descricao0descricao0', '<p style=\"margin-left:0px; margin-right:0px; text-align:justify\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin eget pulvinar enim, eu dignissim mi. Cras non sapien quis quam tincidunt ultricies non vitae turpis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Vestibulum pretium est eu hendrerit pellentesque. Donec consectetur turpis eu est blandit tincidunt. Aenean tortor tellus, iaculis imperdiet diam at, tristique sagittis risus. Integer a rutrum mauris. Sed at quam eu magna feugiat dapibus sed ac nisi. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Proin accumsan efficitur erat in placerat. Donec id est viverra, viverra magna sed, efficitur odio. Aliquam lectus urna, vestibulum et hendrerit ac, commodo eu felis.</p>\r\n\r\n<p style=\"margin-left:0px; margin-right:0px; text-align:justify\">Pellentesque id diam orci. Sed mollis nulla nec orci auctor finibus. Donec et neque eu nunc ultricies accumsan. Nam vitae accumsan sem. Donec id velit facilisis, auctor orci et, sollicitudin leo. Aenean laoreet laoreet nisi eget ullamcorper. Nullam ut malesuada elit. Cras sit amet eros a ante sagittis rutrum nec eget nunc.</p>\r\n\r\n<p style=\"margin-left:0px; margin-right:0px; text-align:justify\">Duis vulputate mi sit amet elit gravida efficitur. Donec sed lorem et metus cursus sodales a vitae justo. Suspendisse potenti. Mauris sed elementum nisi. Curabitur accumsan ut arcu venenatis lobortis. Proin vestibulum enim ac magna gravida pharetra. Etiam pellentesque quis erat in tempor. Donec at est a lectus dignissim bibendum. Ut vel egestas neque. Vestibulum suscipit, mauris vel lacinia maximus, nibh justo efficitur libero, id vulputate quam ipsum in eros. Nunc sed pretium metus. Vivamus porta rhoncus porta. Maecenas lacinia molestie tristique. Sed euismod ipsum quam, non dignissim nisi dignissim ac.</p>\r\n\r\n<p style=\"margin-left:0px; margin-right:0px; text-align:justify\">Praesent ornare augue ac ante pulvinar, in iaculis lectus euismod. Nulla facilisi. Maecenas semper metus a ullamcorper viverra. Quisque arcu dolor, venenatis ac orci a, viverra tempus leo. Nam lobortis dui sit amet mauris ultricies, eget congue dui tempus. Sed vel nisl nec nunc finibus lobortis. Sed maximus orci eu nibh cursus, ut vulputate ligula mattis. Etiam nisl turpis, ornare at efficitur pulvinar, ultrices nec orci. Aenean consectetur eu turpis mattis malesuada. Donec euismod felis placerat, accumsan dolor sit amet, cursus nulla. In quis turpis purus. Cras suscipit dolor in felis commodo dictum. Donec auctor ex sit amet ornare congue. Sed turpis felis, congue id venenatis quis, accumsan ut justo.</p>\r\n\r\n<p style=\"margin-left:0px; margin-right:0px; text-align:justify\">In facilisis arcu a lacus euismod, id vestibulum arcu laoreet. Duis semper quis quam in sagittis. Aliquam aliquet ante lacinia, semper nibh vitae, cursus urna. In malesuada lacus sem, vitae mollis neque placerat vel. Suspendisse tempor urna id venenatis faucibus. Nunc mollis congue imperdiet. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vivamus dapibus mi nec tellus tempor, tristique facilisis nunc laoreet. Etiam at ex commodo massa volutpat tincidunt quis in augue. Sed suscipit, arcu vitae ultricies venenatis, velit neque congue elit, a pharetra urna tellus a augue. Quisque porttitor urna a erat ultrices, quis fringilla mi commodo. Sed iaculis lectus urna, nec ullamcorper justo mollis sit amet. Pellentesque rhoncus diam vitae vehicula dapibus. Suspendisse potenti. Maecenas accumsan velit libero. Ut nisl velit, lobortis et eros vel, vehicula luctus nisi.</p>\r\n', 0, '1', '2018-08-03 12:58:00', '1', '2018-08-31 11:09:08'),
(7, 'cccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccc', '', '', 0, '1', '2018-08-30 18:51:52', '1', '2018-08-30 18:53:06');

-- --------------------------------------------------------

--
-- Estrutura da tabela `course`
--

DROP TABLE IF EXISTS `course`;
CREATE TABLE IF NOT EXISTS `course` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `active` char(1) NOT NULL DEFAULT '1',
  `author` tinyint(4) DEFAULT NULL,
  `img_logo` varchar(32) DEFAULT NULL,
  `date_creation` datetime DEFAULT NULL,
  `last_editor` char(1) DEFAULT NULL,
  `date_edition` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `course`
--

INSERT INTO `course` (`id`, `title`, `description`, `active`, `author`, `img_logo`, `date_creation`, `last_editor`, `date_edition`) VALUES
(1, 'teste curso22222', 'teste descricao', '1', 1, NULL, NULL, '1', '2018-08-20 13:04:46'),
(2, 'teste de curso 20_08', 'teste de descricao', '1', 1, NULL, '2018-08-20 11:36:31', NULL, NULL),
(3, 'titulo', 'descricao', '1', 1, NULL, '2018-08-20 11:43:25', NULL, NULL),
(4, 'titulo', NULL, '0', 1, NULL, '2018-08-20 11:43:35', '1', '2018-08-28 13:15:35'),
(5, 't', NULL, '0', 1, NULL, '2018-08-20 11:45:48', '1', '2018-08-20 13:57:53'),
(6, 'cccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccc', 'descricao0descricao0descricao0descricao0descricao0descricao0descricao0descricao0descricao0descricao0descricao0descricao0descricao0descricao0descricao0descricao0descricao0descricao0descricao0descricao0', '0', 1, NULL, '2018-08-20 14:22:29', '1', '2018-08-30 18:58:44');

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
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(2, 2),
(2, 3),
(2, 4),
(4, 6),
(5, 2),
(5, 3),
(6, 2);

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
-- Estrutura da tabela `group_user`
--

DROP TABLE IF EXISTS `group_user`;
CREATE TABLE IF NOT EXISTS `group_user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(60) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `author` varchar(10) NOT NULL,
  `date_creation` datetime NOT NULL,
  `last_editor` varchar(10) DEFAULT NULL,
  `date_edition` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_Author` (`author`),
  KEY `FK_Last_Editor` (`last_editor`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `lesson`
--

DROP TABLE IF EXISTS `lesson`;
CREATE TABLE IF NOT EXISTS `lesson` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `active` int(1) DEFAULT '1',
  `description` varchar(255) DEFAULT NULL,
  `author` varchar(50) DEFAULT NULL,
  `date_creation` datetime DEFAULT NULL,
  `last_editor` char(1) DEFAULT NULL,
  `date_edition` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `lesson`
--

INSERT INTO `lesson` (`id`, `title`, `active`, `description`, `author`, `date_creation`, `last_editor`, `date_edition`) VALUES
(1, 'teste de aula 1', 1, 'descriÃ§Ã£o aula 1', '1', '2018-07-25 13:46:00', '1', '2018-08-31 10:02:28'),
(6, 'teste', 1, 'teste', '1', '2018-08-20 14:12:08', NULL, NULL),
(2, 'cccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccc', 0, 'descricao0descricao0descricao0descricao0descricao0descricao0descricao0descricao0descricao0descricao0descricao0descricao0descricao0descricao0descricao0descricao0descricao0descricao0descricao0descricao0', '1', '2018-07-30 18:59:39', '1', '2018-08-30 18:58:48'),
(3, 'Novo titulo aula ', 1, NULL, '1', '2018-07-30 19:00:02', '1', '2018-07-31 13:29:43'),
(4, 'Novo titulo aula ', 1, 'nova descricao', '1', '2018-07-30 19:00:44', '1', '2018-08-03 13:22:59'),
(5, 'test', 0, ' descriÃ§Ã£o', '1', '2018-07-30 19:01:25', '1', '2018-08-20 12:32:30');

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
(2, 5),
(2, 6),
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
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `usuario`, `email`, `senha`, `dt_nascimento`, `ativo`, `tipo_user`, `data_criacao`, `celular`, `ultima_modificacao`, `ultimo_editor`) VALUES
(1, 'Jorge Matheus ', 'jorge.matheus10@hotmail.com', '$2y$10$guh37mlyu/qWNjfR/AcF2OdgTSnnPv20SCxEXBLAO3ZlXP2BlsBlG', '1999-05-14', 1, 3, '2018-07-04 21:18:55', '(11) 95496-5195', '2018-08-01 13:37:20', 'Jorge Matheus'),
(47, 'Matheus', 'jorge.matheus11@hotmail.com', '$2y$10$8Ldf.Df41pIQ6xhkHdINE.6rtHVoE13mh75bPnhLg9qhcDYmqdvfW', NULL, 1, 3, '2018-08-29 12:45:05', '', NULL, NULL),
(32, 'Matheus', 'teste@teste.com', '$2y$10$GMG6J.VSFcahTTGqzmbUD.gbDn7Q2VEj7p/aRTCfBvMarol6tfb5y', '1969-12-31', 1, 1, '2018-07-17 17:24:13', '(11) 95496-5195', '2018-07-25 12:49:55', 'Jorge Matheus'),
(45, 'teste2', 'teste2@teste.com', '$2y$10$TJFyGjEycak6mETsKAhGgep/uifBa8Ub5XlB0lgBOsMbnFYXESoWm', '1969-12-31', 1, 2, '2018-07-23 16:46:29', NULL, '2018-07-31 12:34:59', 'Jorge Matheus'),
(46, 'teste', 'jorge.mwatheus10@hotmail.com', '$2y$10$wPeq.w6hocFngJYKt/5p5.oUELS94w0Fm/9bpwpkf4PVyDRCNPwe.', NULL, 1, 1, '2018-07-23 17:05:13', '', NULL, NULL);

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
