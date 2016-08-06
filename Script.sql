/**
		Script de base de datos
		UniversityTest
		SENA-ADSI
		Creado por: SIGTE
**/

/**************************************************************
Sección para creación de TABLAS															 
***************************************************************/
CREATE TABLE tbl_usuarios
(
  eva_idusuariopk serial NOT NULL,
  eva_documento character varying(16) NOT NULL,
  eva_pnombre character varying(16) NOT NULL,
  eva_snombre character varying(16) NOT NULL,
  eva_papellido character varying(16) NOT NULL,
  eva_sapellido character varying(16) NOT NULL,
  eva_usuario character varying(16) NOT NULL,
  eva_password character varying(321) NOT NULL,
  eva_idrolfk integer NOT NULL,
  eva_estado boolean NOT NULL,
  eva_email character varying(128) NOT NULL,
  CONSTRAINT tbl_usuarios_pkey PRIMARY KEY (eva_idusuariopk)
)
WITH (
  OIDS=FALSE
);

CREATE TABLE tbl_cursos
(
  eva_idcursopk serial NOT NULL,
  eva_codigo character varying(32) NOT NULL,
  eva_nombre character varying(64) NOT NULL,
  eva_estado boolean NOT NULL,
  eva_fechacreacion date,
  CONSTRAINT tbl_cursos_pkey PRIMARY KEY (eva_idcursopk)
)
WITH (
  OIDS=FALSE
);

/**************************************************************
Sección para creación de CONSTRAINT															 
***************************************************************/


/**************************************************************
Sección para creación de TRIGGERS															 
***************************************************************/


/**************************************************************
Sección para creación de PRIVILEGIOS															 
***************************************************************/


/**************************************************************
Sección para creación de STORE PROCEDURE															 
***************************************************************/