CREATE DATABASE `trabalhoppi`;
USE `trabalhoppi`;

CREATE TABLE `Pessoa` (
	`codigo` BIGINT NOT NULL AUTO_INCREMENT,
	`nome` VARCHAR(150) NOT NULL COLLATE 'utf8mb4_0900_ai_ci',
	`sexo` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_0900_ai_ci',
	`email` VARCHAR(150) NOT NULL COLLATE 'utf8mb4_0900_ai_ci',
	`telefone` VARCHAR(150) NOT NULL COLLATE 'utf8mb4_0900_ai_ci',
	`cep` VARCHAR(150) NOT NULL COLLATE 'utf8mb4_0900_ai_ci',
	`logradouro` VARCHAR(150) NOT NULL COLLATE 'utf8mb4_0900_ai_ci',
	`cidade` VARCHAR(150) NOT NULL COLLATE 'utf8mb4_0900_ai_ci',
	`estado` VARCHAR(150) NOT NULL COLLATE 'utf8mb4_0900_ai_ci',
	PRIMARY KEY (`codigo`) USING BTREE
)
COLLATE='utf8mb4_0900_ai_ci'
ENGINE=InnoDB
;

CREATE TABLE `Paciente` (
	`codigo` BIGINT NOT NULL,
	`peso` FLOAT NOT NULL,
	`altura` FLOAT NOT NULL,
	`tipo_sanguineo` VARCHAR(10) NOT NULL COLLATE 'utf8mb4_0900_ai_ci',
	PRIMARY KEY (`codigo`) USING BTREE,
	CONSTRAINT `FK_Paciente_Pessoa` FOREIGN KEY (`codigo`) REFERENCES `trabalhoppi`.`Pessoa` (`codigo`) ON UPDATE NO ACTION ON DELETE NO ACTION
)
COLLATE='utf8mb4_0900_ai_ci'
ENGINE=InnoDB
;

CREATE TABLE `Funcionario` (
	`codigo` BIGINT NOT NULL,
	`data_contrato` DATE NOT NULL,
	`salario` FLOAT NOT NULL,
	`senha_hash` VARCHAR(300) NOT NULL COLLATE 'utf8mb4_0900_ai_ci',
	PRIMARY KEY (`codigo`) USING BTREE,
	CONSTRAINT `FK_Funcionario_Pessoa` FOREIGN KEY (`codigo`) REFERENCES `trabalhoppi`.`Pessoa` (`codigo`) ON UPDATE NO ACTION ON DELETE NO ACTION
)
COLLATE='utf8mb4_0900_ai_ci'
ENGINE=InnoDB
;

CREATE TABLE `Medico` (
	`codigo` BIGINT NOT NULL,
	`especialidade` FLOAT NOT NULL,
	`crm` VARCHAR(150) NOT NULL COLLATE 'utf8mb4_0900_ai_ci',
	PRIMARY KEY (`codigo`) USING BTREE,
	CONSTRAINT `FK_Medico_Funcionario` FOREIGN KEY (`codigo`) REFERENCES `trabalhoppi`.`Funcionario` (`codigo`) ON UPDATE NO ACTION ON DELETE NO ACTION
)
COLLATE='utf8mb4_0900_ai_ci'
ENGINE=InnoDB
;

CREATE TABLE `EnderecoAjax` (
	`cep` VARCHAR(150) NOT NULL COLLATE 'utf8mb4_0900_ai_ci',
	`logradouro` VARCHAR(150) NOT NULL COLLATE 'utf8mb4_0900_ai_ci',
	`cidade` VARCHAR(150) NOT NULL COLLATE 'utf8mb4_0900_ai_ci',
	`estado` VARCHAR(150) NOT NULL COLLATE 'utf8mb4_0900_ai_ci',
	PRIMARY KEY (`cep`) USING BTREE
)
COLLATE='utf8mb4_0900_ai_ci'
ENGINE=InnoDB
;

CREATE TABLE `Agenda` (
	`codigo` BIGINT NOT NULL,
	`codigo_medico` BIGINT NOT NULL,
	`data` DATE NOT NULL,
	`horario` TIME NOT NULL,
	`nome` VARCHAR(150) NOT NULL COLLATE 'utf8mb4_0900_ai_ci',
	`sexo` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_0900_ai_ci',
	`email` VARCHAR(150) NOT NULL COLLATE 'utf8mb4_0900_ai_ci',
	PRIMARY KEY (`codigo`) USING BTREE,
	INDEX `FK_Agenda_Medico` (`codigo_medico`) USING BTREE,
	CONSTRAINT `FK_Agenda_Medico` FOREIGN KEY (`codigo_medico`) REFERENCES `trabalhoppi`.`Medico` (`codigo`) ON UPDATE NO ACTION ON DELETE NO ACTION
)
COLLATE='utf8mb4_0900_ai_ci'
ENGINE=InnoDB
;