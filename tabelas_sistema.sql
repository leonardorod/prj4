--
-- Criação da Tabela Pessoas e Insert de Valores Padrões
--
CREATE TABLE IF NOT EXISTS `pessoas` (
  `idpessoas` int(11) NOT NULL AUTO_INCREMENT,
  `pess_nome` varchar(255) NOT NULL,
  `pess_usuario` varchar(255) DEFAULT NULL,
  `pess_senha` varchar(255) DEFAULT NULL,
  PRIMARY KEY (idpessoas)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `pessoas` (`pess_nome`, `pess_usuario`, `pess_senha`) VALUES
('Leonardo', 'leo', '123');

INSERT INTO `pessoas` (`pess_nome`, `pess_usuario`, `pess_senha`) VALUES
('Vinicius', 'vnferna', 'vini1528');
