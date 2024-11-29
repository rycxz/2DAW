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
 
create table comentario(
id int unsigned primary key auto_increment,
id_usuario int unsigned,
id_receta int unsigned,
valoracion int unsigned,
fechaPublicacion datetime,
titulo varchar(70),
cuerpo varchar(999)
);