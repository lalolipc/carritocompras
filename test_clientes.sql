
DROP TABLE IF EXISTS clientes;

CREATE TABLE clientes (
  ID int(11) NOT NULL AUTO_INCREMENT,
  Apellido varchar(60) NOT NULL,
  Nombre varchar(60) NOT NULL,
  Dni int(11) NOT NULL,
  Domicilio varchar(120) DEFAULT NULL,
  Email varchar(45) NOT NULL,
  FechaAlta date NOT NULL,
  PRIMARY KEY (ID)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES clientes WRITE;
INSERT INTO clientes VALUES (1,'Valdez','Ramon',21112332,'gascon 1251','ramon@gmail.com','2013-02-15'),
(3,'Poroz','Hernesto',41523412,'avellaneda 2212','hernesto@gmail.com','2012-01-19'),
(4,'Aponte','Carlos',99090215,'sarmiento 1512','carl@gmail.com','2012-07-03'),
(5,'Bernal','Minori',33459016,'falucho 3523','vernal@gmail.com','2014-03-27'),
(6,'Perrea','Sandra',44455555,'gral alvear 512','sandra@gmail.com','2014-01-22'),
(7,'Jimenez','Perla',41212451,'lamadrid 3245','perla@gmail.com','2009-11-26'),
(8,'Villegas','Andres',44007252,'alberti 562','andyJ@gmail.com','2009-05-14'),
(9,'Muriel','Milton',31162171,'frankllin 1623','milton@gmail.com','2010-03-09'),
(10,'Motato','Yuki',88988981,'mitre 891','yuki@gmail.com','2011-09-18'),
(11,'Soler','sebastian',12312311,'Cordoba ','sebasoler7@hotmail.com','2017-11-24'),
(12,'Eliminar','Prueba nombre',12314123,'sarasa 123','asd@asd.com','2017-11-25');
UNLOCK TABLES;

CREATE TABLE usuarios (
  ID int(11) NOT NULL AUTO_INCREMENT,
  nick varchar(60) NOT NULL,
  pass varchar(60) NOT NULL,
  PRIMARY KEY (ID)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

insert into usuarios(nick,pass)values('juan','1234');
insert into usuarios(nick,pass)values('pedro','1234');

DROP TABLE IF EXISTS productos;
CREATE TABLE productos (
  ID int(11) NOT NULL AUTO_INCREMENT,
  nombre varchar(60) NOT NULL,
  precio varchar(60) NOT NULL,
  foto longblob NOT,
  PRIMARY KEY (ID)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
insert into productos(nombre,precio)values('papas','30');


DROP TABLE IF EXISTS productos;
CREATE TABLE productos (
  ID int(11) NOT NULL AUTO_INCREMENT,
  nombre varchar(60) NOT NULL,
  precio varchar(60) NOT NULL,
  foto varchar(60) NOT NULL,
  PRIMARY KEY (ID)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


insert into productos(nombre,precio,foto)values('fideos',40,'fideos.jpg');

insert into productos(nombre,precio,foto)values('yerba',10,'yerba.jpeg');

insert into productos(nombre,precio,foto)values('chizitos',75,'chizitos.jpg.jpeg');

insert into productos(nombre,precio,foto)values('yerba',10,'yerba.jpeg');
