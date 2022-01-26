/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/ vialsref_vials /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE vialsref_vials;

DROP TABLE IF EXISTS categorias;
CREATE TABLE `categorias` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS productos;
CREATE TABLE `productos` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `categoria_id` int(255) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text,
  `precio` float(100,2) NOT NULL,
  `stock` int(255) NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_producto_categoria` (`categoria_id`),
  CONSTRAINT `fk_producto_categoria` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS usuarios;
CREATE TABLE `usuarios` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rol` varchar(20) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO categorias(id,nombre) VALUES(31,'Baleros'),(32,'Balatas'),(35,'Bandas'),(36,'Cadenas'),(42,'Sublime');

INSERT INTO productos(id,categoria_id,nombre,descripcion,precio,stock,imagen) VALUES(1,31,'Balero tipo 1',X'62616c65726f206465206d6f746f',300.00,20,NULL),(2,31,'balero tipo 2',X'62616c65726f206465206175746f',300.00,40,''),(3,31,'balero tipo 3',X'62616c65726f206465206175746f',300.00,40,'imagen');
INSERT INTO usuarios(id,nombre,apellidos,email,password,rol,imagen) VALUES(1,'Admin','Admin','admin@admin.com','contraseña','admin',NULL),(2,'Pedro','Medina Robles','pedro@correo.com','123456','admin','');