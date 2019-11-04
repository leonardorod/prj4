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

CREATE TABLE IF NOT EXISTS `tipo` (
  `idtipo` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_descricao` varchar(255) NOT NULL,
  PRIMARY KEY (idtipo)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `tipo` (`tipo_descricao`) VALUES
('Entrada');
INSERT INTO `tipo` (`tipo_descricao`) VALUES
('Saida');

CREATE TABLE IF NOT EXISTS `classe` (
  `idclasse` int(11) NOT NULL AUTO_INCREMENT,
  `cls_descricao` varchar(255) NOT NULL,
  `cls_idtipo` int(11) NOT NULL,
  PRIMARY KEY (idclasse)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `classe` (`cls_descricao`, `cls_idtipo`) VALUES
('Alimentação', 2);
INSERT INTO `classe` (`cls_descricao`, `cls_idtipo`) VALUES
('Combustivel', 2);
INSERT INTO `classe` (`cls_descricao`, `cls_idtipo`) VALUES
('Mercado', 2);
INSERT INTO `classe` (`cls_descricao`, `cls_idtipo`) VALUES
('Mensalidades', 2);
INSERT INTO `classe` (`cls_descricao`, `cls_idtipo`) VALUES
('Outros', 2);
INSERT INTO `classe` (`cls_descricao`, `cls_idtipo`) VALUES
('Salario', 1);
INSERT INTO `classe` (`cls_descricao`, `cls_idtipo`) VALUES
('Recebimento', 1);

CREATE TABLE IF NOT EXISTS `lanctos` (
  `idlanctos` int(11) NOT NULL AUTO_INCREMENT,
  `lct_valor` varchar(255) NOT NULL,
  `lct_idtipo` int(11) NOT NULL,
  `lct_idclasse` int(11) NOT NULL,
  `lct_idpessoas` int(11) NOT NULL,
  `lct_obs` varchar(255) DEFAULT NULL,
  `lct_data` datetime,
  PRIMARY KEY (idlanctos)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO lanctos(lct_valor, lct_idtipo, lct_idclasse, lct_idpessoas, lct_data) VALUES ('100', '2', '1', '1', '2019-01-01 00:00:00');