INSERT INTO rol (nombre_rol) VALUES('administrador');
INSERT INTO rol (nombre_rol) VALUES('bibliotecario');
INSERT INTO rol (nombre_rol) VALUES('usuario');
COMMIT;

INSERT INTO editorial (nombre_editorial) VALUES('alfaomega');
INSERT INTO editorial (nombre_editorial) VALUES('mcgraw hill');
INSERT INTO editorial (nombre_editorial) VALUES('Pearson');
INSERT INTO editorial (nombre_editorial) VALUES('Limusa');
INSERT INTO editorial (nombre_editorial) VALUES('Cengage Learning Editores');
COMMIT;

INSERT INTO tema (nombre_tema) VALUES('matematicas');
INSERT INTO tema (nombre_tema) VALUES('fisica');
INSERT INTO tema (nombre_tema) VALUES('programacion');
INSERT INTO tema (nombre_tema) VALUES('quimica');
INSERT INTO tema (nombre_tema) VALUES('biologia');
COMMIT;

INSERT INTO autor (nombre_autor) VALUES('James Stewart');
INSERT INTO autor (nombre_autor) VALUES('Louis  Leithold');
INSERT INTO autor (nombre_autor) VALUES('Jeff Ferguson');
INSERT INTO autor (nombre_autor) VALUES('Raymond Chang');
INSERT INTO autor (nombre_autor) VALUES('Raymond Serway');
COMMIT;

INSERT INTO estadolibro (nombre_estado_libro) VALUES('Disponible');
INSERT INTO estadolibro (nombre_estado_libro) VALUES('Prestado');
INSERT INTO estadolibro (nombre_estado_libro) VALUES('En reparacion');
COMMIT;

INSERT INTO libro (nombre_libro, paginas_libro, codigo_libro, version_libro, id_editorial, id_estado_libro) VALUES('Calculo de Stewart', 1280, 'MAT001', '5', 2, 1);
INSERT INTO libro (nombre_libro, paginas_libro, codigo_libro, version_libro, id_editorial, id_estado_libro) VALUES('Biologia para ingenieros', 890, 'BIO001', '2B', 5, 1);
INSERT INTO libro (nombre_libro, paginas_libro, codigo_libro, version_libro, id_editorial, id_estado_libro) VALUES('Programacion en c#', 720, 'PRO001', '10.12.1', 4, 1);
INSERT INTO libro (nombre_libro, paginas_libro, codigo_libro, version_libro, id_editorial, id_estado_libro) VALUES('Quimica de Chang', 1140, 'QUI001', '7', 3, 1);
INSERT INTO libro (nombre_libro, paginas_libro, codigo_libro, version_libro, id_editorial, id_estado_libro) VALUES('Fisica concepto y aplicaciones', 990, 'FIS001', '2', 1, 1);
COMMIT;

INSERT INTO libroautor (id_libro, id_autor) VALUES(1,1);
INSERT INTO libroautor (id_libro, id_autor) VALUES(2,2);
INSERT INTO libroautor (id_libro, id_autor) VALUES(3,3);
INSERT INTO libroautor (id_libro, id_autor) VALUES(4,4);
INSERT INTO libroautor (id_libro, id_autor) VALUES(5,5);
COMMIT;

INSERT INTO temalibro (id_tema, id_libro) VALUES(1,1);
INSERT INTO temalibro (id_tema, id_libro) VALUES(5,2);
INSERT INTO temalibro (id_tema, id_libro) VALUES(3,3);
INSERT INTO temalibro (id_tema, id_libro) VALUES(4,4);
INSERT INTO temalibro (id_tema, id_libro) VALUES(2,5);
COMMIT;

INSERT INTO usuario (nombre_usuario, nick_usuario, clave, apellido_usuario, direccion_usuario, telefono_usuario, email_usuario, genero_usuario, id_rol) VALUES('Sergio','sergio.rueda','12345','Rueda','Av. Revolucion', '3311218580', 'sergio.rueda@hotmail.com', 'masculino', 1);
INSERT INTO usuario (nombre_usuario, nick_usuario, clave, apellido_usuario, direccion_usuario, telefono_usuario, email_usuario, genero_usuario, id_rol) VALUES('Carlos','carlos.orjuela','12345','Orjuela','Av. Revolucion', '3311218580', 'carlos_andres_orjuela@hotmail.com', 'masculino', 1);
INSERT INTO usuario (nombre_usuario, nick_usuario, clave, apellido_usuario, direccion_usuario, telefono_usuario, email_usuario, genero_usuario, id_rol) VALUES('Laura','laura.ariza','12345','Ariza','Zapatoca', '3113459868', 'laura.ariza@hotmail.com', 'femenino', 3);
INSERT INTO usuario (nombre_usuario, nick_usuario, clave, apellido_usuario, direccion_usuario, telefono_usuario, email_usuario, genero_usuario, id_rol) VALUES('Andres','andres.caicedo','12345','Caicedo','Zapatoca', '3179475037', 'andres.caicedo87@hotmail.com', 'masculino', 3);
INSERT INTO usuario (nombre_usuario, nick_usuario, clave, apellido_usuario, direccion_usuario, telefono_usuario, email_usuario, genero_usuario, id_rol) VALUES('Gloria','gloria.plata','12345','Plata','Zapatoca', '3006983528', 'gloriaplata_79@hotmail.com', 'femenino', 2);
COMMIT;

INSERT INTO prestamo (id_usuario, fecha_prestamo, fecha_propuesta, fecha_entrega, multa) VALUES(3,'2013-02-04','2013-02-08','2013-02-07',0);
INSERT INTO prestamo (id_usuario, fecha_prestamo, fecha_propuesta, fecha_entrega, multa) VALUES(4,'2013-02-06','2013-02-12','2013-02-12',0);
INSERT INTO prestamo (id_usuario, fecha_prestamo, fecha_propuesta, fecha_entrega, multa) VALUES(3,'2013-02-18','2013-02-24','2013-02-26',1000);
INSERT INTO prestamo (id_usuario, fecha_prestamo, fecha_propuesta, fecha_entrega, multa) VALUES(4,'2013-02-21','2013-02-28','2013-02-23',0);
INSERT INTO prestamo (id_usuario, fecha_prestamo, fecha_propuesta, fecha_entrega, multa) VALUES(3,'2013-02-27','2013-03-04','2013-02-15',5500);
COMMIT;

INSERT INTO prestamolibro (id_prestamo, id_libro) VALUES(3,1);
INSERT INTO prestamolibro (id_prestamo, id_libro) VALUES(5,1);
INSERT INTO prestamolibro (id_prestamo, id_libro) VALUES(4,2);
INSERT INTO prestamolibro (id_prestamo, id_libro) VALUES(2,3);
INSERT INTO prestamolibro (id_prestamo, id_libro) VALUES(2,5);
COMMIT;
