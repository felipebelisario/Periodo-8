CREATE TABLE `Pessoa` (
	`codigo` BIGINT NOT NULL AUTO_INCREMENT,
	`nome` VARCHAR(150) NOT NULL  ,
	`sexo` VARCHAR(100) NOT NULL  ,
	`email` VARCHAR(150) NOT NULL  ,''
	`telefone` VARCHAR(150) NOT NULL  ,
	`cep` VARCHAR(150) NOT NULL  ,
	`logradouro` VARCHAR(150) NOT NULL  ,
	`cidade` VARCHAR(150) NOT NULL  ,
	`estado` VARCHAR(150) NOT NULL  ,
	PRIMARY KEY (`codigo`)   
)
ENGINE=InnoDB
;

CREATE TABLE `Paciente` (
	`codigo` BIGINT NOT NULL,
	`peso` FLOAT NOT NULL,
	`altura` FLOAT NOT NULL,
	`tipo_sanguineo` VARCHAR(10) NOT NULL  ,
	PRIMARY KEY (`codigo`)   ,
	CONSTRAINT `FK_Paciente_Pessoa` FOREIGN KEY (`codigo`) REFERENCES `Pessoa` (`codigo`) 
)
ENGINE=InnoDB
;

CREATE TABLE `Funcionario` (
	`codigo` BIGINT NOT NULL,
	`data_contrato` DATE NOT NULL,
	`salario` FLOAT NOT NULL,
	`senha_hash` VARCHAR(300) NOT NULL  ,
	PRIMARY KEY (`codigo`)   ,
	CONSTRAINT `FK_Funcionario_Pessoa` FOREIGN KEY (`codigo`) REFERENCES `Pessoa` (`codigo`) 
)
ENGINE=InnoDB
;

CREATE TABLE `Medico` (
	`codigo` BIGINT NOT NULL,
	`especialidade` FLOAT NOT NULL,
	`crm` VARCHAR(150) NOT NULL  ,
	PRIMARY KEY (`codigo`)   ,
	CONSTRAINT `FK_Medico_Funcionario` FOREIGN KEY (`codigo`) REFERENCES `Funcionario` (`codigo`) 
)
ENGINE=InnoDB
;

CREATE TABLE `EnderecoAjax` (
	`cep` VARCHAR(150) NOT NULL  ,
	`logradouro` VARCHAR(150) NOT NULL  ,
	`cidade` VARCHAR(150) NOT NULL  ,
	`estado` VARCHAR(150) NOT NULL  ,
	PRIMARY KEY (`cep`)   
)
ENGINE=InnoDB
;

CREATE TABLE `Agenda` (
	`codigo` BIGINT NOT NULL,
	`codigo_medico` BIGINT NOT NULL,
	`data` DATE NOT NULL,
	`horario` TIME NOT NULL,
	`nome` VARCHAR(150) NOT NULL  ,
	`sexo` VARCHAR(100) NOT NULL  ,
	`email` VARCHAR(150) NOT NULL  ,
	PRIMARY KEY (`codigo`)   ,
	INDEX `FK_Agenda_Medico` (`codigo_medico`)   ,
	CONSTRAINT `FK_Agenda_Medico` FOREIGN KEY (`codigo_medico`) REFERENCES `Medico` (`codigo`) 
)
ENGINE=InnoDB
;