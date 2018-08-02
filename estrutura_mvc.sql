-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 20-Jul-2018 às 21:55
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
-- Database: `estrutura_mvc`
--

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
(1, 'etwt', 'twetew', '<p>twt</p>\r\n', 1, '1', '2018-07-20 11:22:31', NULL, NULL),
(2, 'teste t', 'teste d', '<p>teste cc</p>\r\n', 0, '1', '2018-07-20 11:30:57', NULL, NULL),
(3, 'teste de titulo 2', 'teste de descriÃ§Ã£o', '<div style=\"background:#eeeeee; border:1px solid #cccccc; padding:5px 10px\"><u>marker</u></div>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"background-color:#16a085\">teste</span></p>\r\n\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:500px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Jorge</td>\r\n			<td>1</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Matheus</td>\r\n			<td>2</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Nunes</td>\r\n			<td>3</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n', 1, '1', '2018-07-20 11:37:48', '1', '2018-07-20 13:32:55'),
(4, 'Teste de tÃ­tulo', 'teste de descriÃ§Ã£o', '<p style=\"text-align:center\"><span class=\"marker\"><em><strong>teste</strong></em></span></p>\r\n', 1, '1', '2018-07-20 11:44:52', '1', '2018-07-20 13:30:19');

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
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `usuario`, `email`, `senha`, `dt_nascimento`, `ativo`, `tipo_user`, `data_criacao`, `celular`, `ultima_modificacao`, `ultimo_editor`) VALUES
(1, 'Jorge Matheus', 'jorge.matheus10@hotmail.com', '$2y$10$hWRVdFfPvppEyUn0WByzoOYTeyJ.QBMCkatmyFEAROGKvBEvErmpi', '1999-05-13', 1, 3, '2018-07-04 21:18:55', '(11) 95496-5195', '2018-07-20 18:09:26', 'Jorge Matheus'),
(44, 'tersdr', 'tsdts@sfsdf.sdfsf', '$2y$10$ywrJL4z7XSzO3iHtHwN./utE8ZD5sWfPRz/t801NfAR1ymRwyUzFW', NULL, 1, 1, '2018-07-20 12:39:48', '', NULL, NULL),
(32, 'Matheus', 'teste@teste.com', '$2y$10$dbLYypPX7agGfmE4hb7cX.L5erOac2lCl8Zf8pPCCX59LT9Hjt7h.', NULL, 0, 1, '2018-07-17 17:24:13', '(11) 95496-5195', '2018-07-20 14:22:21', 'Jorge Matheus');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;