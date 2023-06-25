-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 25-Jun-2023 às 16:00
-- Versão do servidor: 8.0.31
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `financa`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `financeiro`
--

DROP TABLE IF EXISTS `financeiro`;
CREATE TABLE IF NOT EXISTS `financeiro` (
  `id_financeiro` int NOT NULL AUTO_INCREMENT,
  `valor` varchar(9) DEFAULT NULL,
  `descricao` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_financeiro`)
) ENGINE=MyISAM AUTO_INCREMENT=111 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `financeiro`
--

INSERT INTO `financeiro` (`id_financeiro`, `valor`, `descricao`) VALUES
(108, '34', 'icms'),
(102, '22', 'teste'),
(110, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Test User', 'asd@asd.com', '2023-06-22 04:20:26', '$2y$10$PHiXiQd5.nDWJ6yJ5Lxj5exJA5gF3MsrI0A5RXgs/jZkv29.FNgnG', '060JfgMKG0', '2023-06-22 04:20:26', '2023-06-22 04:20:26'),
(2, 'Test User', 'asd@asd.com', '2023-06-22 04:20:59', '$2y$10$1CnPPevv0Dj3AlcXq9xGheO1x8..O4ADqOAyu5b9R29A.eBPp6q.u', 'FlW01VbsVV', '2023-06-22 04:20:59', '2023-06-22 04:20:59'),
(3, '', 'admin', NULL, 'admin', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `email_user` varchar(45) DEFAULT NULL,
  `status` int DEFAULT NULL,
  `senha_user` varchar(45) DEFAULT NULL,
  `token` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_user`, `email_user`, `status`, `senha_user`, `token`) VALUES
(1, 'admin', 1, 'admin', '00c4c22432ecb391b172efc7f36933e977aa73ad'),
(2, 'moderador', 2, 'moderador', '96ef49c08f7bc56d2b855e859e6267a7ec2f6705'),
(3, 'financeiro1', 3, 'financeiro1', '5ebaccb6127a4d8a79a7836f5b1e4f5599bd9167'),
(4, 'financeiro2', 4, 'financeiro2', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
