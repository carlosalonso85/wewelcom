
drop database restaurante;


create database  restaurante;

use restaurante;

create table  restaurante
(id_restaurante int primary key auto_increment,
 nombre varchar(255),
 direccion varchar(255),
 telefono int(20),
 comentarios varchar(1000));
 
 create table if not exists usuario
 (id_usuario int primary key auto_increment,
 nombre_usuario varchar(255),
 pass varchar(255),
 tipo_usuario tinyint);
 
INSERT INTO usuario (nombre_usuario, pass,tipo_usuario) VALUES ('Admin', '1234','0');

 


/* Restaurante*/

INSERT INTO restaurante (nombre,direccion,telefono,comentarios) VALUES ('Dos Cielos Madrid by Hermanos Torres', 'Cuesta de Sto. Domingo, 5, 28013 Madrid','915416700','Restaurante exclusivo en un antiguo establo con terraza y platos de alta cocina maridados con vinos.');
INSERT INTO restaurante (nombre,direccion,telefono,comentarios) VALUES ('CEBO','Cra de S. Jerónimo, 34, 28014 Madrid','917877780','Restaurante moderno y refinado, con platos de cocina mediterránea creativos y presentados de forma exquisita, y vinos españoles.');
INSERT INTO restaurante (nombre,direccion,telefono,comentarios) VALUES ('Restaurante La Catedral', 'Cra de S. Jerónimo, 16, 28014 Madrid',' 915233556','Tapas, paella y platos españoles típicos en un restaurante sofisticado con paneles de madera y una decoración vintage.');
INSERT INTO restaurante (nombre,direccion,telefono,comentarios) VALUES ('Lamucca de Prado', 'C. del Prado, 16, 28014 Madrid','915210000','Local diáfano de ladrillos vistos, grandes ventanales y techos altos para degustar platos internacionales.');
INSERT INTO restaurante (nombre,direccion,telefono,comentarios) VALUES ('Restaurante Vivares', 'C/ de Hortaleza, 52, 28004 Madrid','915315813','Tapas, hamburguesas y platos clásicos mediterráneos a partir del brunch en un restaurante moderno y peculiar.');
INSERT INTO restaurante (nombre,direccion,telefono,comentarios) VALUES ('La Esquina del Real', 'C. de la Amnistía, 4, 28013 Madrid','915594309','Platos clásicos de la cocina francesa, como fuagrás, pato y mollejas, en un restaurante con paredes de ladrillo e iluminación tenue.');



select * from restaurante;
SELECT * FROM usuario;
