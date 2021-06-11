-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 12-Jun-2021 às 00:26
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

INSERT INTO `anuncio` (`id`, `proprietario`, `cidade`, `bairro`, `rua`, `num`, `cep`, `foto_f`, `tipo`, `whatsapp`, `valor`, `num_comodos`, `id_user`, `data_c`, `visibilidade`) VALUES
(47, 'teste', 'Juazeiro do Norte - CE', 'teste', 'teste', 12, '99999-999', 'img2-1622848983-6.jpg ', 'Aluguel', '(88) 88888-8888', '2,50', 5, 6, '2021-06-04', 1),
(48, 'Testando', 'Juazeiro do Norte - CE', 'AAA', 'Rua Teste', 123, '23123-123', 'img1-1622850724-6.jpg ', 'Aluguel', '(23) 12132-3231', '555,00', 3, 6, '2021-06-04', 1),
(49, 'Teste 2', 'Juazeiro do Norte - CE', 'Testes', 'Rua Teste', 222, '22222-222', 'Arquivos Hire (1)-1622850767-6.jpg ', 'Venda', '(22) 22222-2222', '222,22', 6, 6, '2021-06-04', 0),
(50, 'Marco', 'Crato - CE', 'Tiro', 'Rua Tiro', 123, '22222-222', 'Arquivos Hire (6)-1622928900-6.jpg ', 'Aluguel', '(23) 12132-3231', '2.131,23', 4, 6, '2021-06-05', 1),
(51, 'Marcos', 'Juazeiro do Norte - CE', 'Galhudos', 'Rua Galhudos', 123, '11111-111', 'Arquivos Hire (4)-1622937152-14.jpg ', 'Aluguel', '(88) 98853-1646', '2.000,00', 7, 14, '2021-06-05', 1),
(52, 'Salve', 'Juazeiro do Norte - CE', 'Vinte', 'Rua Vinte', 20, '63000-000', 'Arquivos Hire (1)-1623181103-6.jpg ', 'Aluguel', '(88) 99988-9988', '500,00', 5, 6, '2021-06-08', 1),
(53, 'cu', 'Juazeiro do Norte - CE', 'cxu', 'cu', 123, '88888-888', 'rsz_carros_tunados1-1623192675-6.jpg ', 'Aluguel', '(99) 99999-9999', '20', 3, 6, '2021-06-08', 1),
(54, 'cu', 'Crato - CE', 'tyeste', 'teste', 123, '66666-666', 'rsz_carros_tunados1-1623192793-6.jpg ', 'Aluguel', '(66) 66666-6666', '656.567,57', 3, 6, '2021-06-08', 1),
(55, 'Maria', 'Juazeiro do Norte - CE', 'Centro', 'Rua São Paulo', 442, '63000-000', 'frt-1623197851-6.jpg ', 'Aluguel', '(88) 99989-9988', '450,00', 6, 6, '2021-06-08', 1),
(56, 'José', 'Juazeiro do Norte - CE', 'Centro', 'Rua São Pedro', 332, '63000-000', 'frt-1623198825-6.jpg ', 'Aluguel', '(88) 98898-9988', '750,00', 6, 6, '2021-06-08', 1),
(57, 'ads', 'Juazeiro do Norte - CE', 'ads', 'sdasda', 321, '51111-', 'rsz_carros_tunados1-1623282216-6.jpg ', 'Aluguel', '(88) 88898-9', '2.132,31', 6, 6, '2021-06-09', 1),
(58, 'sadsda', 'Juazeiro do Norte - CE', 'dassad', 'sda', 231, '65465-465', 'frt-1623282297-6.jpg ', 'Aluguel', '(88) 46545-44', '2.313,21', 3, 6, '2021-06-09', 1),
(59, 'dassda', 'Juazeiro do Norte - CE', 'dsasda', 'dsadsadsa', 3212, '23132-131', 'cmd-1623283907-6.jpg ', 'Aluguel', '(31) 32123-2123', '3.212,31', 3, 6, '2021-06-09', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `img_comodos`
--

CREATE TABLE `img_comodos` (
  `id` int(11) NOT NULL,
  `id_anuncio` int(255) NOT NULL,
  `id_user` int(255) NOT NULL,
  `img_file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `img_comodos`
--

INSERT INTO `img_comodos` (`id`, `id_anuncio`, `id_user`, `img_file`) VALUES
(1, 52, 6, 'Arquivos Hire (2).jpg'),
(2, 52, 6, 'Arquivos Hire (3).jpg'),
(3, 52, 6, 'Arquivos Hire (4).jpg'),
(4, 52, 6, 'Arquivos Hire (5).jpg'),
(5, 53, 6, 'rsz_carros_tunados1.jpg'),
(6, 54, 6, 'rsz_carros_tunados1-1623192793.jpg'),
(7, 55, 6, 'cmd.jpg'),
(8, 55, 6, 'cmd2.jpg'),
(10, 56, 6, 'cmd-1623198825.jpg'),
(11, 56, 6, 'cmd2-1623198825.jpg'),
(12, 57, 6, 'cmd-1623282216.jpg'),
(13, 57, 6, 'cmd2-1623282216.jpg'),
(14, 57, 6, 'frt.jpg'),
(15, 58, 6, 'cmd-1623282297.jpg'),
(16, 58, 6, 'cmd2-1623282297.jpg'),
(17, 58, 6, 'rsz_carros_tunados1-1623282297.jpg'),
(18, 59, 6, 'cmd2-1623283907.jpg'),
(19, 59, 6, 'frt-1623283907.jpg'),
(20, 59, 6, 'rsz_carros_tunados1-1623283907.jpg');

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
(6, 'darlan', '$2y$10$kyjJVyTHuae6qrhkVcA.quoH0FKYqMFKJQiWBiZRCGkinMiznIUdK', '2021-05-15 19:37:44', 'Darlan', 'Teste', 'darlan@email.com', '(88) 88888-8888'),
(7, 'marco', '$2y$10$cQe.WaUew2Saf93TYMBG9eEIVqoxMFXf6cP.z/XV/XfZ4GYgnGEtG', '2021-05-15 19:43:46', '[value-5]', '[value-6]', 'marco@email.com', '[value-8]'),
(8, 'testemvc', '$2y$10$1KgA9bXttDZI.eqI5Rg3FeoRyio0iqzBWRrN/Ezw6FaWwv1.0f31y', '2021-06-03 20:48:06', '', '', '', ''),
(9, 'testess', '$2y$10$tyqkzr8JMvaVeg.wYRsp9.BRbCp73u498b0mLQzCbqOeLsk6BXaHO', '2021-06-03 20:57:24', '', '', '', ''),
(10, 'teste123', '$2y$10$9CuTt6sSobuzI45HxwT4LeJ.lO3eumHiswws57OSgLbayG86Q24ji', '2021-06-03 21:24:10', '', '', '', ''),
(11, 'teste145', '$2y$10$uLgLU7sxJfoDC8sQviqT5uxE95PFE1VExIEnmI7ZUZBCrTAkWTb6m', '2021-06-03 21:25:54', '', '', '', ''),
(12, 'teste1456', '$2y$10$mGXAgSiOsiyYQ3QayK0nBeq7CJ9LNMhM4pFTE19dB.ZxvJnAyfjUS', '2021-06-03 21:31:25', '', '', '', ''),
(13, 'darlanteste', '$2y$10$5itXu928tu/qqpU5dfaMg.C1wmlax4hU6A9MxF8mDPCPjk9REFTla', '2021-06-04 18:44:51', '', '', '', ''),
(14, 'Marcos', '$2y$10$e7gi1aysPCXdMFTQUf6fB.Zw6zEyP/85iT/miwVZnXDhLVfHACuSK', '2021-06-05 20:47:04', 'Marcos', 'Heiner', 'marcos@email.com', '(88) 98853-1646'),
(15, 'Junior', '$2y$10$7C7aTgTrCW2Z44elJFt.xukCflYa7Xft.B3NEylWOTLAIAsrMumL.', '2021-06-05 20:49:47', '', '', '', '');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `anuncio`
--
ALTER TABLE `anuncio`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `img_comodos`
--
ALTER TABLE `img_comodos`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT de tabela `img_comodos`
--
ALTER TABLE `img_comodos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
