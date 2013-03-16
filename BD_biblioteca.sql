CREATE TABLE  rol 
   (	id_rol int NOT NULL AUTO_INCREMENT, 
	nombre_rol varchar(50) NOT NULL, 
	 CONSTRAINT rol_pk PRIMARY KEY (id_rol)
   );

CREATE TABLE  editorial 
   (	id_editorial int NOT NULL AUTO_INCREMENT, 
	nombre_editorial varchar(50) NOT NULL, 
	 CONSTRAINT editorial_pk PRIMARY KEY (id_editorial)
   );

CREATE TABLE  tema 
   (	id_tema int NOT NULL AUTO_INCREMENT, 
	nombre_tema varchar(50) NOT NULL, 
	 CONSTRAINT tema_pk PRIMARY KEY (id_tema)
   );

CREATE TABLE  autor 
   (	id_autor int NOT NULL AUTO_INCREMENT, 
	nombre_autor varchar(50) NOT NULL, 
	 CONSTRAINT autor_pk PRIMARY KEY (id_autor)
   );

CREATE TABLE  estadolibro 
   (	id_estado_libro int NOT NULL AUTO_INCREMENT, 
	nombre_estado_libro varchar(50) NOT NULL, 
	 CONSTRAINT estadolibro_pk PRIMARY KEY (id_estado_libro)
   );

CREATE TABLE  libro 
   (	id_libro int NOT NULL AUTO_INCREMENT, 
	nombre_libro varchar(100) NOT NULL, 
	paginas_libro int NOT NULL,
	codigo_libro varchar(50) NOT NULL,
	version_libro varchar(10) NOT NULL,
	id_editorial int NOT NULL,
	id_estado_libro int NOT NULL,
	CONSTRAINT libro_pk PRIMARY KEY (id_libro),
	CONSTRAINT editoriallibro_id_editorial_fk FOREIGN KEY (id_editorial) REFERENCES editorial (id_editorial),
	CONSTRAINT estado_libro_id_estado_libro_fk FOREIGN KEY (id_estado_libro) REFERENCES estadolibro (id_estado_libro)
   );

CREATE TABLE  libroautor 
   (	id_libro int NOT NULL, 
	id_autor int NOT NULL, 
	 CONSTRAINT libroautor_PK PRIMARY KEY (id_libro, id_autor),
	CONSTRAINT libroautor_id_libro_fk FOREIGN KEY (id_libro)
	REFERENCES libro (id_libro),
	CONSTRAINT libroautor_id_autor_fk FOREIGN KEY (id_autor)
	REFERENCES autor (id_autor)
   );

CREATE TABLE  temalibro 
   (	id_tema int NOT NULL, 
	id_libro int NOT NULL, 
	CONSTRAINT temalibro_PK PRIMARY KEY (id_tema, id_libro),
	CONSTRAINT temalibro_id_tema_fk FOREIGN KEY (id_tema)
	REFERENCES tema (id_tema),
	CONSTRAINT temalibro_id_libro_fk FOREIGN KEY (id_libro)
	REFERENCES libro (id_libro)
   );

CREATE TABLE  usuario
   (	id_usuario int NOT NULL AUTO_INCREMENT, 
	nombre_usuario varchar(50) NOT NULL,
	nick_usuario varchar(50) NOT NULL,
	clave varchar(50) NOT NULL,
	apellido_usuario varchar(50) NOT NULL,
	direccion_usuario varchar(30) NOT NULL,
	telefono_usuario varchar(15) NULL,
	email_usuario varchar(50) NOT NULL,
	genero_usuario varchar(1) NOT NULL,
	id_rol int NOT NULL,
	CONSTRAINT usuario_pk PRIMARY KEY (id_usuario),
	CONSTRAINT usuario_id_rol_fk FOREIGN KEY (id_rol)
	REFERENCES rol (id_rol)
   );

CREATE TABLE  prestamo
   (	id_prestamo int NOT NULL AUTO_INCREMENT,
	id_usuario int NOT NULL, 
	fecha_prestamo date NOT NULL,
	fecha_propuesta date NOT NULL,
	fecha_entrega date NULL,
	multa int NULL,
	CONSTRAINT prestamo_pk PRIMARY KEY (id_prestamo),
	CONSTRAINT prestamo_id_usuario_fk FOREIGN KEY (id_usuario)
	REFERENCES usuario (id_usuario)
   );

CREATE TABLE  prestamolibro 
   (	id_prestamo int NOT NULL, 
	id_libro int NOT NULL, 
	CONSTRAINT prestamolibro_pk PRIMARY KEY (id_prestamo, id_libro),
	CONSTRAINT prestamolibro_id_prestamo_fk FOREIGN KEY (id_prestamo)
	REFERENCES prestamo (id_prestamo),
	CONSTRAINT prestamolibro_id_libro_fk FOREIGN KEY (id_libro)
	REFERENCES libro (id_libro)
   );
