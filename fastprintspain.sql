DROP DATABASE IF EXISTS baseDatosNombreWeb;
CREATE DATABASE baseDatosNombreWeb;
USE baseDatosNombreWeb;

# Tabla para rastrear los medios que se pongan (imagenes, videos...) en noticias y servicios
/*
CREATE TABLE medios (
	id int primary key auto_increment,
    nombre varchar(60) not null,
    tipo varchar(60) not null,
    url varchar(255) not null
);
*/

# Tabla de usuarios 
CREATE TABLE usuarios (
	id int primary key auto_increment,
    nombre varchar(60) not null,
    apellidos varchar(100) not null,
    email varchar(60) not null,
    password varchar(60) not null,
    sexo varchar(60) not null,
    telefono varchar(20) not null,
    direccion varchar(255) not null,
    rol varchar(60) not null default "usuario",
    token varchar(255),
    confirmado tinyint(1)
);
#TABLA CATEGORIAS 
CREATE TABLE categorias (
	id int primary key auto_increment,
    nombre varchar(100)
);
# Tabla para registrar las NOTICIAS
CREATE TABLE noticias (
	id int primary key auto_increment,
    titulo varchar(255) not null,
    cuerpo text not null,
    fecha_publicacion date not null,
    medios varchar(255),  # Cadena separada por comas con los id de los medios que utiliza
    id_autor int not null,
    id_categoria int not null default 1,
    foreign key(id_autor) references usuarios(id),
    foreign key (id_categoria) references categorias(id)
);

# Tabla para registrar las SERVICIOS
CREATE TABLE servicios (
	id int primary key auto_increment,
    nombre varchar(60) not null,
    descripcion text not null,
    precio decimal(10,2) not null,
    medios varchar(255)  default ''# Cadena separada por comas con los id de los medios que utiliza
);

# Tabla para registrar las PRESUPUESTOS
CREATE TABLE presupuestos (
	id int primary key auto_increment,
    id_usuario int not null,
    fecha_presupuesto date not null,
    total decimal(10,2) not null,
    medios varchar(255),  # Cadena separada por comas con los id de los medios que utiliza
    foreign key(id_usuario) references usuarios(id)
);
ALTER TABLE presupuestos ADD column estado varchar(100);
### VALORES POR DEFECTO ###########################

# USUARIO admin@correo.com (password: admin) y usuario@correo.com (password: 1234) 
INSERT INTO usuarios (nombre, apellidos, email, password, sexo, telefono, direccion, rol, confirmado) VALUES
('admin','admin','admin@correo.com','$2y$10$JrYc71UI6EHz0xf8WN7.OeAG4mUXFCGxjT7wgJWe1GCGwirzMAS0G','n/d','555-123-456','calle falsa 123','admin',1),
('usuario','usuario','usuario@correo.com','$2y$10$i87gXQDMlsHh.3uyRqD2GuXR1BlHORnlK6.xSf5uEiFkzpKCXpDtq','n/d','555-123-456','calle falsa 123','usuario',1);

# SERVICIOS , 6 servicios sin imagenes para pruebas
INSERT INTO servicios (nombre, descripcion, precio) VALUES
("Impresión normal", "Servicio de impresión tarifa plana", 100.00) ,
("Impresión digital", "Servicio de impresión digital en varios formatos", 200.00) ,
("Impresión 3d", "Impresión en 3D plástico de modelo hasta 15x15x15", 300.00) ,
("Impresión 3d grande", "Impresión en 3D plástico de modelo hasta 45x45x45", 400.00) ,
("Impresión 3d gigante", "Impresión en 3D plástico de modelo hasta 100x100x100", 500.00) ,
("Impresión 3d pack", "PACK de 5 impresiones en 3D de modelos 15x15x15", 600.00);

# Categorias por defecto
INSERT INTO categorias (nombre) VALUES 
('otros'),
('coches'),
('moda'),
('sociedad'),
('tecnologia');

# NOTICIAS, algunas noticias de ejemplo
INSERT INTO noticias (titulo, cuerpo, fecha_publicacion, id_autor) VALUES
("Mejores impresiones 3D para tu Nintendo Switch", "La impresión 3D ha abierto un mundo de posibilidades para personalizar y mejorar la experiencia de juego con tu Nintendo Switch. ¡Desde soportes y organizadores hasta accesorios únicos que te harán divertirte! Descubre nuestro TOP de mejores impresiones 3D para Nintendo Switch. ", "2024-07-28" , 1),
("Cómo diseñar en 3D sin saber de diseño", "El diseño en 3D solía ser un campo exclusivo para profesionales con amplios conocimientos en modelado y gráficos. Sin embargo, gracias a los avances tecnológicos, ahora cualquier persona puede crear increíbles diseños en 3D sin tener ninguna experiencia previa. En este artículo, exploraremos cómo puedes hacer tus diseños realidad utilizando plataformas como Makerworld, AnkerMake, Meshy, […]", "2024-07-28" , 1),
("Fabricación aditiva: qué es, tipos y ejemplos", "En muchas ocasiones habrás oído hablar del término Fabricación Aditiva relacionado con la impresión 3D. En este artículo vamos a hablar sobre qué es la fabricación aditiva, qué tipos hay, y veremos algunos ejemplos, de forma que aprenderás a entender y diferenciar los tipos de Fabricación Aditiva. ¿Qué es la fabricación aditiva? La fabricación aditiva, […]", "2024-07-28" , 1);