-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 24-Maio-2021 às 00:34
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
  `num_comodos` int(20) NOT NULL,
  `id_user` int(11) NOT NULL,
  `data_c` date DEFAULT current_timestamp(),
  `visibilidade` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `anuncio`
--

INSERT INTO `anuncio` (`id`, `proprietario`, `cidade`, `bairro`, `rua`, `num`, `cep`, `foto_f`, `tipo`, `telefone`, `whatsapp`, `valor`, `num_comodos`, `id_user`, `data_c`, `visibilidade`) VALUES
(12, 'Russo', 'Juazeiro do Norte - CE', 'Ásia', 'Rua Europa', 55, '55665-555', 'lQqtg6qy.png', 'Aluguel', '(81) 98844-8844', '(81) 98855-9955', '800,00', 6, 1, NULL, 1),
(13, 'Pirlo', 'Crato - CE', 'Jogo', 'Rua dos Jogadores', 3443, '66565-456', '', 'Aluguel', '(89) 89864-6441', '(78) 78523-4321', '2.000,00', 7, 1, NULL, 0),
(14, 'Bruxo', 'Juazeiro do Norte - CE', 'Brasileiro', 'Rua Seleção', 10, '63252-151', 'lQqtg6qy.png', 'Venda', '(22) 95656-4646', '(22) 95486-5465', '400.000,00', 0, 6, NULL, 0),
(15, 'Liminha', 'Crato - CE', 'Tribo', 'Rua Gaulesa', 4554, '63125-151', 'lQqtg6qy.png', 'Venda', '(20) 95564-8644', '(20) 96654-6567', '350.000,00', 8, 6, NULL, 1),
(16, 'Lindinho', 'Barbalha - CE', 'Tribo', 'Rua Gaulesa', 24, '24242-424', 'lQqtg6qy.png', 'Aluguel', '(24) 24242-4242', '(24) 24242-4242', '650,00', 7, 6, NULL, 1),
(17, 'BT', 'Juazeiro do Norte - CE', 'Tribo', 'Rua Gaulesa', 605, '65656-565', 'lQqtg6qy.png', 'Venda', '(66) 56565-6565', '(65) 56565-6565', '95.000,00', 9, 6, NULL, 1),
(18, 'Tox', 'Juazeiro do Norte - CE', 'Padaria', 'Rua do pão', 42, '26252-615', 'lQqtg6qy.png', 'Aluguel', '(65) 48949-8497', '(12) 65289-7241', '500,00', 6, 7, '2021-05-22', 1),
(19, 'Juvenal', 'Juazeiro do Norte - CE', '444', 'Rua da borracha', 333, '61561-646', 'lQqtg6qy.png', 'Venda', '(84) 95146-5163', '(18) 94986-5135', '150.000,00', 7, 7, '2021-05-22', 1),
(20, 'Teste', 'Crato - CE', 'Testadores', 'Rua Teste', 2121, '11111-111', 'lQqtg6qy.png', 'Aluguel', '(11) 11111-1111', '(11) 11111-1111', '400,00', 4, 7, '2021-05-22', 1);

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
(1, 'teste', '$2y$10$ZOUFFRSvV29Lbna/m0EqyOpkrIWpfqGsUIl9XrpXmSJ1SVSIax/3y', '2021-04-03 19:31:12', 'Teste', 'Teste', 'testando@email.com', '(88) 99889-8989'),
(2, 'Teste2', '$2y$10$VepZdKcu04BHWK9REd/Q7eQxgLqLTnGxpHV6X6gIqVXs.OYsl08BG', '2021-04-18 19:45:06', 'teste', 'teste', 'teste', 'teste'),
(3, 'Teste3', '$2y$10$mrmUU/sb0aMOJ51hduF4yu8wH5l3gS4vDTxMvZvCqu505vGW1Kz1S', '2021-04-18 19:48:31', '[value-5]', '[value-6]', '[value-7]', '[value-8]'),
(4, 'teste00', '$2y$10$eJCCS132zYxkdvJ/FvhWXe5EMWwclBZl30XQo6FvMnlldjFVhUrM6', '2021-05-05 16:55:58', '[value-5]', '[value-6]', '[value-7]', '[value-8]'),
(6, 'darlan', '$2y$10$kyjJVyTHuae6qrhkVcA.quoH0FKYqMFKJQiWBiZRCGkinMiznIUdK', '2021-05-15 19:37:44', 'Darlan', 'Santos', 'darlan@email.com', '(88) 99988-9955'),
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
