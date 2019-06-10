DROP Database IF EXISTS ProjetoRequerimento;
CREATE DATABASE ProjetoRequerimento;

Use ProjetoRequerimento;


CREATE TABLE ALUNO(
	ALN_MATRICULA VARCHAR(15) NOT NULL,
	ALN_NOME VARCHAR(50) NOT NULL,
	ALN_EMAIL VARCHAR(50) NOT NULL,
	ALN_DT_NASC DATE NOT NULL,
	ALN_SENHA VARCHAR(8) NOT NULL,
	ALN_CPF VARCHAR(11) NOT NULL,
	PRIMARY KEY (ALN_CPF)
);


CREATE TABLE TIPO(
	TP_ID INT NOT NULL,
	TP_DESCRICAO VARCHAR(10) NOT NULL,
	PRIMARY KEY (TP_ID)
);

CREATE TABLE SUBTIPO(
	SUBTP_ID INT NOT NULL,
	SUBTP_DESCRICAO VARCHAR(45) NOT NULL,
	PRIMARY KEY (SUBTP_ID),
	TP_ID INT NOT NULL,

	CONSTRAINT TIPO_SUBTIPO FOREIGN KEY (TP_ID)
	REFERENCES TIPO (TP_ID)
);

CREATE TABLE CURSO(
	CRS_DURACAO VARCHAR(10) NOT NULL,
	CRS_NOME_CURSO VARCHAR(15) NOT NULL,
	CRS_CODIGO INT NOT NULL,
	PRIMARY KEY (CRS_CODIGO)
);


CREATE TABLE ANEXO(
	ANX_HREF VARCHAR(150) NOT NULL,
	ANX_ID VARCHAR(45) NOT NULL,
	PRIMARY KEY (ANX_ID)
);

CREATE TABLE FUNCIONARIO(
	FNC_CPF VARCHAR(11) NOT NULL,
	FNC_NOME VARCHAR(45) NOT NULL,
	FNC_RG_NUMERO VARCHAR(8) NOT NULL,
	FNC_RG_ESTADO VARCHAR(2) NOT NULL,
	FNC_RG_ORGAO_EXP VARCHAR(3) NOT NULL,
	FNC_CARGO VARCHAR(20) NOT NULL,
	FNC_EMAIL VARCHAR(20) NOT NULL,
	FNC_SENHA VARCHAR(8) NOT NULL,
	FNC_TELEFONE VARCHAR(9) NOT NULL,
	FNC_MATRICULA VARCHAR(10) NOT NULL,
	PRIMARY KEY (FNC_CPF)
);

CREATE TABLE REQUERIMENTO(
	REQ_PROTOCOLO INT NOT NULL ,
	REQ_TIPO VARCHAR(45) NOT NULL,
	REQ_DESCRICAO VARCHAR(45) NOT NULL,
	REQ_STATUS VARCHAR(45) NOT NULL,
	REQ_DT_ABERTURA TIMESTAMP NOT NULL,
	PRIMARY KEY (REQ_PROTOCOLO),
	ALN_CPF VARCHAR(11) NOT NULL,
	SUBTP_ID INT NOT NULL,
	ANX_ID VARCHAR(45) NOT NULL,	
    
	CONSTRAINT ALUNO_REQUERIMENTO FOREIGN KEY (ALN_CPF)
	REFERENCES ALUNO (ALN_CPF),
	CONSTRAINT SUBTIPO_REQUERIMENTO FOREIGN KEY (SUBTP_ID)
	REFERENCES SUBTIPO (SUBTP_ID),
	CONSTRAINT ANEXO_REQUERIMENTO FOREIGN KEY (ANX_ID)
	REFERENCES ANEXO (ANX_ID)
);

CREATE TABLE MATRICULA(
	MTR_ID VARCHAR(9) NOT NULL,
	MTR_ANO INT(4) NOT NULL,
	MATR_SEMESTRE VARCHAR(10) NOT NULL,
	PRIMARY KEY (MTR_ID),
	CRS_CODIGO INT NOT NULL,
	ALN_CPF VARCHAR(11) NOT NULL,

	CONSTRAINT CURSO_MATRICULA FOREIGN KEY (CRS_CODIGO)
	REFERENCES CURSO (CRS_CODIGO),
	CONSTRAINT ALUNO_MATRICULA FOREIGN KEY (ALN_CPF)
	REFERENCES ALUNO(ALN_CPF)
);

CREATE TABLE HISTORICO_SITUACAO(
	HTS_ID INT NOT NULL,
	HTS_ID_SIT_ANTERIOR INT NOT NULL,
	HTS_ID_SIT_NOVA INT NOT NULL,
	HTS_DATA_HORA TIMESTAMP NOT NULL,
	PRIMARY KEY(HTS_ID),
	REQ_PROTOCOLO INT NOT NULL,
	FNC_CPF VARCHAR(11) NOT NULL,

	CONSTRAINT REQUERIMENTO_HISTORICO_SITUACAO FOREIGN KEY(REQ_PROTOCOLO)
	REFERENCES REQUERIMENTO (REQ_PROTOCOLO),
	CONSTRAINT FUNCIONARIO_HISTORICO_SITUACAO FOREIGN KEY(FNC_CPF)
	REFERENCES FUNCIONARIO (FNC_CPF)	
);
