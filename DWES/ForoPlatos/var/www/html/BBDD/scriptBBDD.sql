drop database if exists foroplatos;
create database if not exists foroplatos;
use foroplatos;


drop table usuario;
CREATE TABLE usuario (
    id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    nickname VARCHAR(100) UNIQUE,
    contrasenia VARCHAR(100),
    email VARCHAR(100),
    usuario_redes VARCHAR(100),
    esAdmin TINYINT(1) UNSIGNED,
    fechaRegistro DATE,
    foto VARCHAR(100),
    bannerFoto VARCHAR(100),
    experiencia ENUM('Amateur','Promedio','Avanzado','Un Crack')
);

drop table receta;
CREATE TABLE receta (
    id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100),
    elaboracion VARCHAR(999),
    id_usuario INT UNSIGNED,
    fechaPublicacion DATE,
    dificultad ENUM('Facil','Media','Avanzada','Dificil'),
    tipoReceta ENUM('Tradicional','SlowFood','Freidora sin aceite'),
    valoracionMedia INT UNSIGNED,
    rutaImagen VARCHAR(300),
    FOREIGN KEY (id_usuario) REFERENCES usuario(id) ON DELETE CASCADE
);
 
drop table receta_ingrediente;
		CREATE TABLE receta_ingrediente (
			id_receta INT UNSIGNED,
			id_ingrediente INT UNSIGNED,
			cantidad INT UNSIGNED,
			medida_unidad VARCHAR(100),
			PRIMARY KEY(id_receta, id_ingrediente),
			FOREIGN KEY (id_receta) REFERENCES receta(id) ON DELETE CASCADE,
			FOREIGN KEY (id_ingrediente) REFERENCES ingrediente(id) ON DELETE CASCADE
		);

drop table ingrediente;
CREATE TABLE ingrediente (
    id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100) UNIQUE
);
 drop table comentario;
CREATE TABLE comentario (
   id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  id_receta int UNSIGNED DEFAULT NULL,
  id_usuario int UNSIGNED DEFAULT NULL,
  id_comentario_respuesta int UNSIGNED DEFAULT NULL,
  texto varchar(400) COLLATE utf8mb4_unicode_ci NOT NULL,
  fecha_creacion date NOT NULL,
  valoracion int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
ALTER TABLE comentario
  ADD CONSTRAINT fk2 FOREIGN KEY (id_receta) REFERENCES receta (id) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT fk3 FOREIGN KEY (id_usuario) REFERENCES usuario (id) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;
ALTER TABLE comentario
  ADD PRIMARY KEY (id),
  ADD KEY fk2 (id_receta),
  ADD KEY fk3 (id_usuario),
  ADD KEY fk8 (id_comentario_respuesta);
  
  INSERT INTO comentario ( id_receta, id_usuario, texto, fecha_creacion, valoracion)
VALUES 
( 1, 1, 'Comentario inicial', '2024-12-01', 5),
( 1, 2, 'Respuesta al comentario inicial', '2024-12-02', NULL),
( 1, 3, 'Otro comentario principal', '2024-12-03', 4);
