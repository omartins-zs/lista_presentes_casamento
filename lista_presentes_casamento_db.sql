-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 29-Ago-2024 às 20:23
-- Versão do servidor: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lista_presentes_casamento_db`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `marcas`
--

CREATE TABLE `marcas` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `marcas`
--

INSERT INTO `marcas` (`id`, `nome`, `created_at`, `updated_at`) VALUES
(1, 'Consul', '2024-08-29 12:00:04', '2024-08-29 12:07:25'),
(2, 'Cadence', '2024-08-29 12:00:04', '2024-08-29 12:00:04'),
(3, 'Britania', '2024-08-29 12:00:53', '2024-08-29 12:00:53'),
(4, 'Mondial', '2024-08-29 12:00:53', '2024-08-29 12:00:53'),
(5, 'Electrolux', '2024-08-29 12:00:53', '2024-08-29 12:00:53'),
(6, 'Oster', '2024-08-29 12:00:53', '2024-08-29 12:00:53'),
(7, 'Arno', '2024-08-29 12:00:53', '2024-08-29 12:00:53');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `detalhes` text NOT NULL,
  `imagem` blob NOT NULL,
  `preco_intervalo` varchar(50) NOT NULL,
  `comprado` tinyint(4) DEFAULT '0',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `link_1` varchar(255) DEFAULT NULL,
  `link_2` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `detalhes`, `imagem`, `preco_intervalo`, `comprado`, `created_at`, `updated_at`, `link_1`, `link_2`) VALUES
(1, 'Ventilador de mesa', '3 Velocidades \r\n110V', '', 'Até R$ 120,00', 0, '2024-08-29 11:40:57', '2024-08-29 11:40:57', NULL, NULL),
(2, 'Sanduicheira Grill', '', '', 'Até 100,00', 0, '2024-08-29 14:12:24', '2024-08-29 14:12:24', NULL, NULL),
(3, 'Microondas', '', '', 'R$ 400,00 - R$ 500,00', 0, '2024-08-29 14:12:24', '2024-08-29 14:12:24', NULL, NULL),
(4, 'Liquidificador 1000W', '', '', 'Até 130,00', 0, '2024-08-29 14:12:24', '2024-08-29 14:12:24', NULL, NULL),
(5, 'Chaleira Elétrica', '', '', 'Até 100,00', 0, '2024-08-29 14:12:24', '2024-08-29 14:12:24', NULL, NULL),
(6, 'Aspirador de Pó', '', '', 'Até R$ 120,00', 0, '2024-08-29 14:12:24', '2024-08-29 14:12:24', NULL, NULL),
(7, 'Afiador de Facas', '', '', 'Até R$ 50,00', 0, '2024-08-29 14:12:24', '2024-08-29 14:12:24', NULL, NULL),
(8, 'Kit Churrasco com Tábua', '', '', 'Até R$ 100,00', 0, '2024-08-29 14:12:24', '2024-08-29 14:12:24', NULL, NULL),
(9, 'Kit de Potes Herméticos', '', '', 'R$ 80,00 - R$ 130,00', 0, '2024-08-29 14:12:24', '2024-08-29 14:12:24', NULL, NULL),
(10, 'Kit de Utensílios de Cozinha em Silicone', '', '', 'Até R$ 70,00', 0, '2024-08-29 14:12:24', '2024-08-29 14:12:24', NULL, NULL),
(11, 'Fritadeira Airfryer', '', '', 'R$ 250,00 - R$ 350,00', 0, '2024-08-29 14:12:24', '2024-08-29 14:12:24', NULL, NULL),
(12, 'Faqueiro Tramontina 24 Peças', '', '', 'Até R$ 100,00', 0, '2024-08-29 14:12:24', '2024-08-29 14:12:24', NULL, NULL),
(13, 'Jogo de Facas Tramontina', '', '', 'Até R$ 100,00', 0, '2024-08-29 14:12:24', '2024-08-29 14:12:24', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto_marcas`
--

CREATE TABLE `produto_marcas` (
  `produto_id` int(11) NOT NULL,
  `marca_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produto_marcas`
--
ALTER TABLE `produto_marcas`
  ADD PRIMARY KEY (`produto_id`,`marca_id`),
  ADD KEY `marca_id` (`marca_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `produto_marcas`
--
ALTER TABLE `produto_marcas`
  ADD CONSTRAINT `produto_marcas_ibfk_1` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `produto_marcas_ibfk_2` FOREIGN KEY (`marca_id`) REFERENCES `marcas` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
