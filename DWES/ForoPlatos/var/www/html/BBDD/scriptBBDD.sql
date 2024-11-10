drop database if exists foroplatos;
create database if not exists foroplatos;
use foroplatos;

create table receta(
id int unsigned primary key auto_increment,
nombre  varchar(100),
elaboracion varchar(999),
id_usuario int unsigned,
fechaPublicacion date,
dificultad enum('Facil','Media:','Avanzada','Dificil'),
tipoReceta   enum('Tradicional','SlowFood:','Freidora sin aceite'),
valoracionMedia int unsigned,
id_receta int unsigned
); 
drop table if exists usuario;
create table usuario(
id int unsigned primary key auto_increment,
nickname  varchar(100) unique,
contrasenia varchar(100),
email varchar(100),
usuario_redes varchar(100),
esAdmin tinyint (1) unsigned,
fechaRegistro datetime,
foto varchar(100),
bannerFoto varchar(100),
experiencia   enum('Amateur','Promedio','Avanzado','Un Crack')
); 
create table receta_ingediente(
id_receta int unsigned,
id_ingrediente  int unsigned,
cantidad int unsigned,
medida_unidad varchar(100),
foreign key ( id_receta) references receta(id),
foreign key ( id_ingrediente) references ingrediente(id),
primary key(id_receta, id_ingrediente)
);
create table ingrediente(
  
id int unsigned primary key auto_increment,
nombre  varchar(100) unique
); 
drop table usuario_comparte_plan_mensual;
create table usuario_sigue_usuario(
id_usuario_sigue  int unsigned unique,
id_usuario_seguido  int unsigned unique,
fechaSeguimiento datetime,
foreign key ( id_usuario_sigue) references usuario(id),
foreign key ( id_usuario_seguido) references usuario(id),
primary key(id_usuario_sigue, id_usuario_seguido)
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