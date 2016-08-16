/**
		Script de base de datos
		UniversityTest
		SENA-ADSI
		Creado por: SIGTE
**/

/**************************************************************
Secci�n para creaci�n de TABLAS
***************************************************************/
CREATE TABLE tbl_tipopreguntas (
    eva_idtipo serial,
    eva_nombre varchar(32) NOT NULL,
    eva_descripcion varchar(128) NOT NULL,
    eva_estado boolean NOT NULL
) WITHOUT OIDS;

CREATE TABLE tbl_preguntas (
    eva_idPreguntasPk serial,
    eva_idCursoFk integer NOT NULL,
    eva_idmateriapk integer NOT NULL,
    eva_tipoPreguntaFk integer NOT NULL,
    eva_enunciado varchar(256) NOT NULL,
    eva_estado boolean
) WITHOUT OIDS;

CREATE TABLE tbl_tiporespuesta (
    eva_idTipoResPk serial,
    eva_respuesta varchar(32) NOT NULL,
    eva_estado boolean NOT NULL
) WITHOUT OIDS;

CREATE TABLE tbl_usuarios (
    eva_idUsuarioPk serial,
    eva_documento varchar(16) NOT NULL,
    eva_pNombre varchar(16) NOT NULL,
    eva_sNombre varchar(16) NOT NULL,
    eva_pApellido varchar(16) NOT NULL,
    eva_sApellido varchar(16) NOT NULL,
    eva_usuario varchar(16) NOT NULL,
    eva_password varchar(321) NOT NULL,
    eva_idRolFk integer NOT NULL,
    eva_estado boolean NOT NULL,
    eva_email varchar(128) NOT NULL
) WITHOUT OIDS;

CREATE TABLE tbl_permisos (
    eva_idPermisoPk serial,
    eva_permiso varchar(32) NOT NULL,
    eva_estado boolean NOT NULL
) WITHOUT OIDS;

CREATE TABLE tbl_respuestas (
    eva_idRespuestaPk serial,
    eva_idPreguntaFk integer NOT NULL,
    eva_respuesta varchar(256) NOT NULL,
    eva_tipoRespuestaFk integer NOT NULL,
    eva_estado boolean NOT NULL
) WITHOUT OIDS;

CREATE TABLE tbl_cursos (
    eva_idCursoPk serial,
    eva_codigo integer NOT NULL,
    eva_nombre varchar(64) NOT NULL,
    eva_fechaCreacion date,
    eva_usuarioFk integer NOT NULL,
    eva_estado boolean NOT NULL,
    eva_idMateriaFk integer NOT NULL
) WITHOUT OIDS;

CREATE TABLE tbl_roles (
    eva_idRol serial,
    eva_rol varchar(32) NOT NULL,
    eva_descripcion varchar(128) NOT NULL,
    eva_idusuariofk integer NOT NULL,
    eva_estado boolean NOT NULL
) WITHOUT OIDS;

CREATE TABLE tbl_rolpermiso (
    eva_idRolPermisoPk serial,
    eva_idRolFk integer NOT NULL,
    eva_idPermisoFk integer NOT NULL,
    eva_losPermisos varchar(32)
) WITHOUT OIDS;

CREATE TABLE tbl_respuestaseva (
    eva_idRespuestaPk serial,
    eva_idPreguntaFk integer NOT NULL,
    eva_idRespuestaUsu integer NOT NULL,
    eva_IdRespuestaCorFk integer NOT NULL,
    eva_idAcierto integer NOT NULL,
    eva_usuarioFk integer NOT NULL,
    eva_fecha date NOT NULL
) WITHOUT OIDS;

CREATE TABLE tbl_evaluaciones (
    eva_idEvaluacionPk serial,
    eva_codCursoFk integer NOT NULL,
    eva_fechaRegistro date NOT NULL,
    eva_idUsuarioFk integer NOT NULL,
    eva_fechainicial date NOT NULL,
    eva_fechaFinal date NOT NULL,
    eva_canPreguntas integer NOT NULL,
    eva_estado boolean NOT NULL
) WITHOUT OIDS;

CREATE TABLE tbl_asignacion (
    eva_idAsignacion serial,
    eva_idEvaluacionFk integer NOT NULL,
    eva_asignacion varchar(128) NOT NULL,
    eva_fechaReg date NOT NULL,
    eva_usuarioFk integer NOT NULL,
    eva_cursoFK integer NOT NULL,
    eva_estado boolean
) WITHOUT OIDS;

CREATE TABLE tbl_materia (
    eva_idMateriaPk serial,
    eva_descripcion varchar(32) NOT NULL,
    eva_fecha date NOT NULL,
    eva_estado boolean NOT NULL
) WITHOUT OIDS;

CREATE TABLE tbl_notificaciones (
    eva_idNotificacionPk serial,
    eva_idEvaluacionFk integer NOT NULL,
    eva_idTipoNotifFk integer NOT NULL,
    eva_fecha date NOT NULL,
    eva_respuesta varchar(32) NOT NULL
) WITHOUT OIDS;

CREATE TABLE tbl_tipNotificacion (
    eva_idTipoNof serial,
    eva_descripcion varchar(32) NOT NULL,
    eva_estado boolean NOT NULL
) WITHOUT OIDS;

/**************************************************************
Secci�n para creaci�n de CONSTRAINT
***************************************************************/

/**************************************************************
ALTER TABLE ONLY tbl_tipopreguntas
    ADD CONSTRAINT tbl_tipopreguntas_pkey PRIMARY KEY (eva_idtipo);

ALTER TABLE ONLY tbl_preguntas
    ADD CONSTRAINT tbl_preguntas_pkey PRIMARY KEY ("eva_idPreguntasPk");

ALTER TABLE ONLY tbl_preguntas
    ADD CONSTRAINT tbl_preguntas_eva_tipoPreguntaFk_fkey FOREIGN KEY ("eva_tipoPreguntaFk") REFERENCES tbl_tipopreguntas(eva_idtipo);

ALTER TABLE ONLY tbl_tiporespuesta
    ADD CONSTRAINT tbl_tiporespuesta_pkey PRIMARY KEY ("eva_idTipoResPk");

ALTER TABLE ONLY tbl_usuarios
    ADD CONSTRAINT tbl_usuarios_pkey PRIMARY KEY ("eva_idUsuarioPk");

ALTER TABLE ONLY tbl_permisos
    ADD CONSTRAINT tbl_permisos_pkey PRIMARY KEY ("eva_idPermisoPk");

ALTER TABLE ONLY tbl_respuestas
    ADD CONSTRAINT tbl_respuestas_pkey PRIMARY KEY ("eva_idRespuestaPk");

ALTER TABLE ONLY tbl_respuestas
    ADD CONSTRAINT tbl_respuestas_eva_idPreguntaFk_fkey FOREIGN KEY ("eva_idPreguntaFk") REFERENCES tbl_preguntas("eva_idPreguntasPk");

ALTER TABLE ONLY tbl_respuestas
    ADD CONSTRAINT tbl_respuestas_eva_tipoRespuestaFk_fkey FOREIGN KEY ("eva_tipoRespuestaFk") REFERENCES tbl_tiporespuesta("eva_idTipoResPk");

ALTER TABLE ONLY tbl_cursos
    ADD CONSTRAINT tbl_cursos_pkey PRIMARY KEY ("eva_idCursoPk");

ALTER TABLE ONLY tbl_cursos
    ADD CONSTRAINT tbl_cursos_eva_usuarioFk_fkey FOREIGN KEY ("eva_usuarioFk") REFERENCES tbl_usuarios("eva_idUsuarioPk");

ALTER TABLE ONLY tbl_roles
    ADD CONSTRAINT tbl_roles_pkey PRIMARY KEY ("eva_idRol");

ALTER TABLE ONLY tbl_roles
    ADD CONSTRAINT tbl_roles_eva_idusuariofk_fkey FOREIGN KEY (eva_idusuariofk) REFERENCES tbl_usuarios("eva_idUsuarioPk");

ALTER TABLE ONLY tbl_rolpermiso
    ADD CONSTRAINT tbl_rolpermiso_pkey PRIMARY KEY ("eva_idRolPermisoPk");

ALTER TABLE ONLY tbl_rolpermiso
    ADD CONSTRAINT tbl_rolpermiso_eva_idRolFk_fkey FOREIGN KEY ("eva_idRolFk") REFERENCES tbl_roles("eva_idRol");

ALTER TABLE ONLY tbl_rolpermiso
    ADD CONSTRAINT tbl_rolpermiso_eva_idPermisoFk_fkey FOREIGN KEY ("eva_idPermisoFk") REFERENCES tbl_permisos("eva_idPermisoPk");

ALTER TABLE ONLY tbl_respuestaseva
    ADD CONSTRAINT tbl_respuestaseva_pkey PRIMARY KEY ("eva_idRespuestaPk");

ALTER TABLE ONLY tbl_respuestaseva
    ADD CONSTRAINT tbl_respuestaseva_eva_idPreguntaFk_fkey FOREIGN KEY ("eva_idPreguntaFk") REFERENCES tbl_preguntas("eva_idPreguntasPk");

ALTER TABLE ONLY tbl_respuestaseva
    ADD CONSTRAINT tbl_respuestaseva_eva_IdRespuestaCorFk_fkey FOREIGN KEY ("eva_IdRespuestaCorFk") REFERENCES tbl_respuestas("eva_idRespuestaPk");

ALTER TABLE ONLY tbl_respuestaseva
    ADD CONSTRAINT tbl_respuestaseva_eva_usuarioFk_fkey FOREIGN KEY ("eva_usuarioFk") REFERENCES tbl_usuarios("eva_idUsuarioPk");

ALTER TABLE ONLY tbl_evaluaciones
    ADD CONSTRAINT tbl_evaluaciones_pkey PRIMARY KEY ("eva_idEvaluacionPk");

ALTER TABLE ONLY tbl_evaluaciones
    ADD CONSTRAINT tbl_evaluaciones_eva_idUsuarioFk_fkey FOREIGN KEY ("eva_idUsuarioFk") REFERENCES tbl_cursos("eva_idCursoPk");

ALTER TABLE ONLY tbl_asignacion
    ADD CONSTRAINT tbl_asignacion_pkey PRIMARY KEY ("eva_idAsignacion");

ALTER TABLE ONLY tbl_asignacion
    ADD CONSTRAINT tbl_asignacion_eva_idEvaluacionFk_fkey FOREIGN KEY ("eva_idEvaluacionFk") REFERENCES tbl_evaluaciones("eva_idEvaluacionPk");

ALTER TABLE ONLY tbl_asignacion
    ADD CONSTRAINT tbl_asignacion_eva_usuarioFk_fkey FOREIGN KEY ("eva_usuarioFk") REFERENCES tbl_usuarios("eva_idUsuarioPk");

ALTER TABLE ONLY tbl_asignacion
    ADD CONSTRAINT tbl_asignacion_eva_cursoFK_fkey FOREIGN KEY ("eva_cursoFK") REFERENCES tbl_cursos("eva_idCursoPk");

ALTER TABLE ONLY tbl_materia
    ADD CONSTRAINT tbl_materia_pkey PRIMARY KEY ("eva_idMateriaPk");

ALTER TABLE ONLY tbl_cursos
    ADD CONSTRAINT Foreign_key01 FOREIGN KEY ("eva_idMateriaFk") REFERENCES tbl_materia("eva_idMateriaPk");

ALTER TABLE ONLY tbl_notificaciones
    ADD CONSTRAINT tbl_notificaciones_pkey PRIMARY KEY ("eva_idNotificacionPk");

ALTER TABLE ONLY tbl_notificaciones
    ADD CONSTRAINT Foreign_key02 FOREIGN KEY ("eva_idEvaluacionFk") REFERENCES tbl_evaluaciones("eva_idEvaluacionPk");

ALTER TABLE ONLY tbl_tipNotificacion
    ADD CONSTRAINT tbl_tipNotificacion_pkey PRIMARY KEY ("eva_idTipoNof");

ALTER TABLE ONLY tbl_notificaciones
    ADD CONSTRAINT Foreign_key03 FOREIGN KEY ("eva_idTipoNotifFk") REFERENCES "tbl_tipNotificacion"("eva_idTipoNof");
SET search_path = pg_catalog, pg_catalog;
COMMENT ON SCHEMA public IS 'standard public schema';***************************************************************/

/**************************************************************
Secci�n para creaci�n de TRIGGERS
***************************************************************/


/**************************************************************
Secci�n para creaci�n de PRIVILEGIOS
***************************************************************/


/**************************************************************
Secci�n para creaci�n de STORE PROCEDURE
***************************************************************/

/**************************************************************
Secci�n para creaci�n de INSERT
***************************************************************/

--permisos:

INSERT INTO tbl_permisos(
	eva_idPermisoPk, eva_permiso, eva_estado)
	VALUES (1, 'escritura', true);
	
--usuario:

INSERT INTO tbl_usuarios(
	eva_documento, eva_pNombre, eva_sNombre, eva_pApellido, eva_sApellido, eva_usuario, eva_password, eva_idRolFk, eva_estado, eva_email)
	VALUES (1030544919, 'olme', 'gustavo', 'marin', 'sanchez', 'olme_gms', '1234', 1, true, 'olme_gms@hotmail.com');
	
	INSERT INTO tbl_usuarios(
	eva_documento, eva_pNombre, eva_sNombre, eva_pApellido, eva_sApellido, eva_usuario, eva_password, eva_idRolFk, eva_estado, eva_email)
	VALUES (1069731878, 'Luz', 'Angela', 'Moreno', 'Parga', 'luz_amp', '1234', 1, true, 'lamoreno87@misena.edu.co');
	
INSERT INTO tbl_usuarios(
	eva_documento, eva_pNombre, eva_sNombre, eva_pApellido, eva_sApellido, eva_usuario, eva_password, eva_idRolFk, eva_estado, eva_email)
	VALUES (80024471, 'Fredy', 'Oswaldo', 'Marin', 'Duarte', 'fomarin17', '1234', 1, true, 'fomarin17@misena.edu.co');

--rol:

INSERT INTO tbl_roles(
	eva_idRol, eva_rol, eva_descripcion, eva_idusuariofk, eva_estado)
	VALUES (1, 'instructor', 'docente de la institucion', 1, true);	

--rolpermiso:

INSERT INTO tbl_rolpermiso(
	eva_idRolPermisoPk, eva_idRolFk, eva_idPermisoFk, eva_losPermisos)
	VALUES (1, 1, 1, 1);

-- materias:

INSERT INTO tbl_materia(
	eva_idMateriaPk, eva_descripcion, eva_fecha, eva_estado)
	VALUES (1, 'ciencias', '2016-08-12', true);

INSERT INTO tbl_materia(
	eva_idMateriaPk, eva_descripcion, eva_fecha, eva_estado)
	VALUES (2, 'sociales', '2016-08-12', true);

INSERT INTO tbl_materia(
	eva_idMateriaPk, eva_descripcion, eva_fecha, eva_estado)
	VALUES (3, 'matematicas', '2016-08-12', true);

INSERT INTO tbl_materia(
	eva_idMateriaPk, eva_descripcion, eva_fecha, eva_estado)
	VALUES (4, 'fisica', '2016-08-12', true);

INSERT INTO tbl_materia(
	eva_idMateriaPk, eva_descripcion, eva_fecha, eva_estado)
	VALUES (5, 'quimica', '2016-08-12', true);

INSERT INTO tbl_materia(
	eva_idMateriaPk, eva_descripcion, eva_fecha, eva_estado)
	VALUES (6, 'lengua castellana', '2016-08-12', true);

INSERT INTO tbl_materia(
	eva_idMateriaPk, eva_descripcion, eva_fecha, eva_estado)
	VALUES (7, 'matematicas', '2016-08-12', true);