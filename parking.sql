-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 23-Ago-2021 às 18:14
-- Versão do servidor: 8.0.26-0ubuntu0.20.04.2
-- versão do PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `parking`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `formas_pagamentos`
--

CREATE TABLE `formas_pagamentos` (
  `forma_pagamento_id` int NOT NULL,
  `forma_pagamento_nome` varchar(30) NOT NULL,
  `forma_pagamento_ativa` tinyint(1) NOT NULL,
  `forma_pagamento_data_alteracao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `formas_pagamentos`
--

INSERT INTO `formas_pagamentos` (`forma_pagamento_id`, `forma_pagamento_nome`, `forma_pagamento_ativa`) VALUES
(1, 'Dinheiro', 0),
(2, 'Cartão de credito', 1),
(3, 'Cartão de Débito', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `groups`
--

CREATE TABLE `groups` (
  `id` mediumint UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Estrutura da tabela `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estrutura da tabela `mensalidades`
--

CREATE TABLE `mensalidades` (
  `mensalidade_id` int NOT NULL,
  `mensalidade_mensalista_id` int NOT NULL,
  `mensalidade_precificacao_id` int NOT NULL,
  `mensalidade_valor_mensalidade` varchar(20) NOT NULL,
  `mensalidade_mensalista_dia_vencimento` int NOT NULL,
  `mensalidade_data_vencimento` date NOT NULL,
  `mensalidade_data_pagamento` datetime DEFAULT NULL,
  `mensalidade_status` tinyint(1) NOT NULL,
  `mensalidade_data_alteracao` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `mensalidades`
--

INSERT INTO `mensalidades` (`mensalidade_id`, `mensalidade_mensalista_id`, `mensalidade_precificacao_id`, `mensalidade_valor_mensalidade`, `mensalidade_mensalista_dia_vencimento`, `mensalidade_data_vencimento`, `mensalidade_data_pagamento`, `mensalidade_status`, `mensalidade_data_alteracao`) VALUES
(1, 1, 1, '130', 25, '2021-09-25', NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `mensalistas`
--

CREATE TABLE `mensalistas` (
  `mensalista_id` int NOT NULL,
  `mensalista_data_cadastro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `mensalista_nome` varchar(45) NOT NULL,
  `mensalista_sobrenome` varchar(150) NOT NULL,
  `mensalista_data_nascimento` date DEFAULT NULL,
  `mensalista_cpf` varchar(20) NOT NULL,
  `mensalista_rg` varchar(20) NOT NULL,
  `mensalista_email` varchar(50) NOT NULL,
  `mensalista_telefone_fixo` varchar(20) DEFAULT NULL,
  `mensalista_telefone_movel` varchar(20) NOT NULL,
  `mensalista_cep` varchar(10) NOT NULL,
  `mensalista_endereco` varchar(155) NOT NULL,
  `mensalista_numero_endereco` varchar(20) NOT NULL,
  `mensalista_bairro` varchar(45) NOT NULL,
  `mensalista_cidade` varchar(105) NOT NULL,
  `mensalista_estado` varchar(2) NOT NULL,
  `mensalista_complemento` varchar(145) NOT NULL,
  `mensalista_ativo` tinyint(1) NOT NULL,
  `mensalista_dia_vencimento` int NOT NULL,
  `mensalista_obs` tinytext,
  `mensalista_data_alteracao` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `mensalistas`
--

INSERT INTO `mensalistas` (`mensalista_id`, `mensalista_data_cadastro`, `mensalista_nome`, `mensalista_sobrenome`, `mensalista_data_nascimento`, `mensalista_cpf`, `mensalista_rg`, `mensalista_email`, `mensalista_telefone_fixo`, `mensalista_telefone_movel`, `mensalista_cep`, `mensalista_endereco`, `mensalista_numero_endereco`, `mensalista_bairro`, `mensalista_cidade`, `mensalista_estado`, `mensalista_complemento`, `mensalista_ativo`, `mensalista_dia_vencimento`, `mensalista_obs`) VALUES
(1, '2020-03-13 22:00:02', 'Lucio', 'Souza', '2020-03-13', '359.731.420-19', '334.44644-12', 'lucio@gmail.com', '(23) 9123-9123', '(41) 9999-9999', '80530-000', 'Rua de Curitiba', '45', 'Centro', 'Curitiba', 'PR', '', 1, 25, 'simnn'),
(3, '2021-08-17 23:26:56', 'Talisson', 'Neto', '1997-07-09', '352.477.670-12', '46.315.772-2', 'santos@gmail.com', '7140053042', '071994342345', '48110-000', 'Noélia dias goes', '0218A', 'aguas de catu', 'catu', 'BA', '', 1, 23, 'simmmm');

-- --------------------------------------------------------

--
-- Estrutura da tabela `precificacoes`
--

CREATE TABLE `precificacoes` (
  `precificacao_id` int NOT NULL,
  `precificacao_categoria` varchar(50) NOT NULL,
  `precificacao_valor_hora` varchar(50) NOT NULL,
  `precificacao_valor_mensalidade` varchar(20) NOT NULL,
  `precificacao_numero_vagas` int NOT NULL,
  `precificacao_ativa` tinyint(1) NOT NULL,
  `precificacao_data_alteracao` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `precificacoes`
--

INSERT INTO `precificacoes` (`precificacao_id`, `precificacao_categoria`, `precificacao_valor_hora`, `precificacao_valor_mensalidade`, `precificacao_numero_vagas`, `precificacao_ativa`) VALUES
(1, 'Veículo Grande', '5,00', '130,00', 23, 1),
(2, 'Veículo Médio', '10,00', '150,00', 33, 1),
(3, 'Veículo Pequeno', '3,00', '80,00', 12, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sistema`
--

CREATE TABLE `sistema` (
  `sistema_id` int NOT NULL,
  `sistema_razao_social` varchar(145) DEFAULT NULL,
  `sistema_nome_fantasia` varchar(145) DEFAULT NULL,
  `sistema_cnpj` varchar(25) DEFAULT NULL,
  `sistema_ie` varchar(25) DEFAULT NULL,
  `sistema_telefone_fixo` varchar(25) DEFAULT NULL,
  `sistema_telefone_movel` varchar(25) NOT NULL,
  `sistema_email` varchar(100) DEFAULT NULL,
  `sistema_site_url` varchar(100) DEFAULT NULL,
  `sistema_cep` varchar(25) DEFAULT NULL,
  `sistema_endereco` varchar(145) DEFAULT NULL,
  `sistema_numero` varchar(25) DEFAULT NULL,
  `sistema_cidade` varchar(45) DEFAULT NULL,
  `sistema_estado` varchar(2) DEFAULT NULL,
  `sistema_texto_ticket` tinytext CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `sistema_data_alteracao` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `sistema`
--

INSERT INTO `sistema` (`sistema_id`, `sistema_razao_social`, `sistema_nome_fantasia`, `sistema_cnpj`, `sistema_ie`, `sistema_telefone_fixo`, `sistema_telefone_movel`, `sistema_email`, `sistema_site_url`, `sistema_cep`, `sistema_endereco`, `sistema_numero`, `sistema_cidade`, `sistema_estado`, `sistema_texto_ticket`) VALUES
(1, 'Park Now System - teste', 'Park Now', '80.838.809/0001-26', '683.90228-49', '(41) 3232-3030', '(21) 9999-3244', 'parknow@contato.com.br', 'http://parknow.com.br', '80510-000', 'Rua da Programação', '54', 'Curitiba', 'PR', 'Park Now - Seu veículo em boas mãos.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int UNSIGNED DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int UNSIGNED NOT NULL,
  `last_login` int UNSIGNED DEFAULT NULL,
  `active` tinyint UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `data_ultima_alteracao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(3, '::1', 'taineto', '$2y$10$kQs5dNpAN3De7DWphqE.IuClCuyAT9O4QiVT98ObO5e4SGKbd/LvS', 'talissonneto70@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1625840994, 1627326763, 1, 'Talisson', 'Neto', NULL, NULL),
(4, '::1', 'admin', '$2y$12$Q90HDCScUufiIaJYrnZ9eupjVDEnFXi9ANWwVmCCUIukbLzQ8Tit6', 'admin@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1625931045, 1629740778, 1, 'Administrator', 'admin', NULL, NULL),
(5, '::1', 'jenny', '$2y$10$.doBbJ9FquJ9GoEbDAi7FeKEdriTvRFvcgsvjS4gcmnr2oDJEVkXu', 'jenny@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1627326842, 1627326862, 1, 'Jennifer', 'Gostosa', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `group_id` mediumint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(7, 3, 2),
(9, 4, 1),
(10, 5, 2);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `formas_pagamentos`
--
ALTER TABLE `formas_pagamentos`
  ADD PRIMARY KEY (`forma_pagamento_id`);

--
-- Índices para tabela `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `mensalidades`
--
ALTER TABLE `mensalidades`
  ADD PRIMARY KEY (`mensalidade_id`);

--
-- Índices para tabela `mensalistas`
--
ALTER TABLE `mensalistas`
  ADD PRIMARY KEY (`mensalista_id`);

--
-- Índices para tabela `precificacoes`
--
ALTER TABLE `precificacoes`
  ADD PRIMARY KEY (`precificacao_id`);

--
-- Índices para tabela `sistema`
--
ALTER TABLE `sistema`
  ADD PRIMARY KEY (`sistema_id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_email` (`email`),
  ADD UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  ADD UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  ADD UNIQUE KEY `uc_remember_selector` (`remember_selector`);

--
-- Índices para tabela `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `formas_pagamentos`
--
ALTER TABLE `formas_pagamentos`
  MODIFY `forma_pagamento_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `mensalidades`
--
ALTER TABLE `mensalidades`
  MODIFY `mensalidade_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `mensalistas`
--
ALTER TABLE `mensalistas`
  MODIFY `mensalista_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `precificacoes`
--
ALTER TABLE `precificacoes`
  MODIFY `precificacao_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `sistema`
--
ALTER TABLE `sistema`
  MODIFY `sistema_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
