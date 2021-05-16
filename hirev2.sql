-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16-Maio-2021 às 03:25
-- Versão do servidor: 10.4.18-MariaDB
-- versão do PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `hirev2`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `anuncio`
--

CREATE TABLE `anuncio` (
  `id` int(11) NOT NULL,
  `proprietario` varchar(40) NOT NULL,
  `cidade` varchar(40) NOT NULL,
  `bairro` varchar(40) NOT NULL,
  `rua` varchar(40) NOT NULL,
  `num` int(5) NOT NULL,
  `cep` varchar(9) NOT NULL,
  `foto_f` varchar(50) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `whatsapp` varchar(15) NOT NULL,
  `valor` varchar(20) NOT NULL,
  `num_comodos` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `anuncio`
--

INSERT INTO `anuncio` (`id`, `proprietario`, `cidade`, `bairro`, `rua`, `num`, `cep`, `foto_f`, `tipo`, `telefone`, `whatsapp`, `valor`, `num_comodos`) VALUES
(1, 'Joaquim', 'Juazeiro do Norte - CE', 'Novo Juazeiro', 'Rua Teste', 25, '63000000', 'lQqtg6qy.png', 'Aluguel', '2147483647', '2147483647', '500', 3),
(11, 'Kratos', 'Juazeiro do Norte - CE', 'Jogadores', 'Rua do Game', 666, '63050-666', 'lQqtg6qy.png', 'Aluguel', '(88) 98866-5666', '(88) 98815-4444', '650,00', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `nome` varchar(20) NOT NULL,
  `sobrenome` varchar(20) NOT NULL,
  `email` varchar(70) NOT NULL,
  `telefone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`, `nome`, `sobrenome`, `email`, `telefone`) VALUES
(1, 'teste', '$2y$10$ZOUFFRSvV29Lbna/m0EqyOpkrIWpfqGsUIl9XrpXmSJ1SVSIax/3y', '2021-04-03 19:31:12', '[value-5]', '[value-6]', '[value-7]', '[value-8]'),
(2, 'Teste2', '$2y$10$VepZdKcu04BHWK9REd/Q7eQxgLqLTnGxpHV6X6gIqVXs.OYsl08BG', '2021-04-18 19:45:06', 'teste', 'teste', 'teste', 'teste'),
(3, 'Teste3', '$2y$10$mrmUU/sb0aMOJ51hduF4yu8wH5l3gS4vDTxMvZvCqu505vGW1Kz1S', '2021-04-18 19:48:31', '[value-5]', '[value-6]', '[value-7]', '[value-8]'),
(4, 'teste00', '$2y$10$eJCCS132zYxkdvJ/FvhWXe5EMWwclBZl30XQo6FvMnlldjFVhUrM6', '2021-05-05 16:55:58', '[value-5]', '[value-6]', '[value-7]', '[value-8]'),
(6, 'darlan', '$2y$10$kyjJVyTHuae6qrhkVcA.quoH0FKYqMFKJQiWBiZRCGkinMiznIUdK', '2021-05-15 19:37:44', '', '', '', ''),
(7, 'marco', '$2y$10$cQe.WaUew2Saf93TYMBG9eEIVqoxMFXf6cP.z/XV/XfZ4GYgnGEtG', '2021-05-15 19:43:46', '[value-5]', '[value-6]', 'marco@email.com', '[value-8]');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `anuncio`
--
ALTER TABLE `anuncio`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `anuncio`
--
ALTER TABLE `anuncio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
