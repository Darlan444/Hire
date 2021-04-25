-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21-Abr-2021 às 23:48
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
  `cep` int(8) NOT NULL,
  `foto_f` varchar(50) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `telefone` int(11) NOT NULL,
  `whatsapp` int(11) NOT NULL,
  `valor` double NOT NULL,
  `num_comodos` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `anuncio`
--

INSERT INTO `anuncio` (`id`, `proprietario`, `cidade`, `bairro`, `rua`, `num`, `cep`, `foto_f`, `tipo`, `telefone`, `whatsapp`, `valor`, `num_comodos`) VALUES
(1, 'Joaquim', 'Juazeiro do Norte - CE', 'Novo Juazeiro', 'Rua Teste', 25, 63000000, 'lQqtg6qy.png', 'Aluguel', 2147483647, 2147483647, 500, 3),
(2, 'Joao', 'Crato - CE', 'Perigo', 'Rua Teste do teste', 532, 63000250, 'lQqtg6qy.png', 'Venda', 2147483647, 2147483647, 80000, 3),
(3, 'Jose', 'Barbalha - CE', 'Antigo', 'Rua dos Velhos', 46, 63000450, 'lQqtg6qy.png', 'Aluguel', 2147483647, 2147483647, 300, 5),
(4, 'Zebra', 'Juazeiro do Norte - CE', 'Zoo', 'Rua dos Animais', 87, 63000456, 'lQqtg6qy.png', 'Aluguel', 2147483647, 2147483647, 650, 7),
(5, 'Girafa', 'Juazeiro do Norte - CE', 'Zoo', 'Rua dos Animais', 98, 63000456, 'lQqtg6qy.png', 'Aluguel', 2147483647, 2147483647, 450, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'teste', '$2y$10$.8YDOpT0H7vPa012nYhete5szf2NwV3D0VUjEZa4oJtm4JTXP.xI6', '2021-04-03 19:31:12'),
(2, 'Teste2', '$2y$10$VepZdKcu04BHWK9REd/Q7eQxgLqLTnGxpHV6X6gIqVXs.OYsl08BG', '2021-04-18 19:45:06'),
(3, 'Teste3', '$2y$10$mrmUU/sb0aMOJ51hduF4yu8wH5l3gS4vDTxMvZvCqu505vGW1Kz1S', '2021-04-18 19:48:31');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
