-- Database: tienda
CREATE DATABASE IF NOT EXISTS tienda CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE tienda;

-- Roles
CREATE TABLE IF NOT EXISTS rol (
    idrol INT AUTO_INCREMENT PRIMARY KEY,
    nombrerol VARCHAR(50) NOT NULL,
    descripcion VARCHAR(255) DEFAULT NULL,
    status TINYINT NOT NULL DEFAULT 1
);

-- Users
CREATE TABLE IF NOT EXISTS usuario (
    idusuario INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    telefono VARCHAR(20) DEFAULT '',
    password VARCHAR(255) NOT NULL,
    rolid INT NOT NULL,
    status TINYINT NOT NULL DEFAULT 1,
    FOREIGN KEY (rolid) REFERENCES rol(idrol)
);

-- Categories
CREATE TABLE IF NOT EXISTS categoria (
    idcategoria INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    descripcion VARCHAR(255) DEFAULT NULL,
    status TINYINT NOT NULL DEFAULT 1
);

-- Providers
CREATE TABLE IF NOT EXISTS proveedor (
    idproveedor INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    descripcion VARCHAR(255) DEFAULT NULL,
    telefono VARCHAR(20) DEFAULT NULL,
    email VARCHAR(100) DEFAULT NULL,
    direccion VARCHAR(255) DEFAULT NULL,
    status TINYINT NOT NULL DEFAULT 1
);

-- Products
CREATE TABLE IF NOT EXISTS producto (
    idproducto INT AUTO_INCREMENT PRIMARY KEY,
    proveedorid INT NOT NULL,
    categoriaid INT NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    descripcion TEXT,
    precio DECIMAL(10,2) NOT NULL,
    stock INT NOT NULL DEFAULT 0,
    imagen VARCHAR(255) DEFAULT NULL,
    status TINYINT NOT NULL DEFAULT 1,
    FOREIGN KEY (proveedorid) REFERENCES proveedor(idproveedor),
    FOREIGN KEY (categoriaid) REFERENCES categoria(idcategoria)
);

-- Modules
CREATE TABLE IF NOT EXISTS modulo (
    idmodulo INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(100) NOT NULL,
    status TINYINT NOT NULL DEFAULT 1
);

-- Permissions
CREATE TABLE IF NOT EXISTS permisos (
    idpermiso INT AUTO_INCREMENT PRIMARY KEY,
    rolid INT NOT NULL,
    moduloid INT NOT NULL,
    r TINYINT DEFAULT 0,
    w TINYINT DEFAULT 0,
    u TINYINT DEFAULT 0,
    d TINYINT DEFAULT 0,
    FOREIGN KEY (rolid) REFERENCES rol(idrol),
    FOREIGN KEY (moduloid) REFERENCES modulo(idmodulo)
);

-- Sample data
INSERT INTO rol (nombrerol, descripcion, status) VALUES
('Administrador','Acceso completo',1),
('Cliente','Comprador',1);

-- sample user (password: admin)
INSERT INTO usuario (nombre,email,telefono,password,rolid,status) VALUES
('Admin','admin@example.com','123456',
  '$2y$10$abcdefghijklmnopqrstuv',
  1,1);

INSERT INTO categoria (nombre, descripcion, status) VALUES
('Veterinaria','Productos veterinarios',1),
('Alimento','Alimentos para mascotas',1),
('Petshop','Accesorios y juguetes',1);

INSERT INTO proveedor (nombre, descripcion, telefono, email, direccion, status) VALUES
('Proveedor 1','Proveedor principal','111111111','prov1@example.com','Ciudad 1',1),
('Proveedor 2','Proveedor secundario','222222222','prov2@example.com','Ciudad 2',1);

INSERT INTO producto (proveedorid,categoriaid,nombre,descripcion,precio,stock,imagen,status) VALUES
(1,1,'Leche para Gato','Presentacion de 120gr',15.00,50,'lechegato.jpg',1),
(1,1,'Leche para Perro','Presentacion de 120gr',20.00,50,'lecheperro.jpg',1),
(1,1,'Biberones','Biberones 50ml',5.00,50,'biberones.jpg',1),
(1,1,'Curamic Plata','Presentacion de 290gr',35.00,50,'curamic.png',1),
(1,1,'K-Nino','Presentacion 2 en 1',40.00,50,'k-nino.png',1),
(1,1,'Fiproler','Pipetas para pulgas',25.00,50,'fiproler.png',1),
(2,2,'Cambo Cachorro','Presentación de 7KG',75.00,30,'Cambo.jpg',1),
(2,2,'Cambo Pate','Presentacion Adulto en Lata',10.00,30,'cambo_lata.jpg',1),
(2,2,'Ricocat Pate','Presentación en lata',7.00,30,'LataGato.png',1),
(2,2,'Ricocat Bolsa','Presentación de 1KG',12.00,30,'RicocatGato.png',1),
(2,2,'Ricocan Pate','Presentación de 330gr',9.00,30,'RicocanLata.png',1),
(2,2,'Ricocan Bolsa','Presentación de 1KG',12.00,30,'RicocanPer.png',1),
(2,3,'Bebedero de Mano','Diversos colores',10.00,20,'b1.png',1),
(2,3,'Juguete de Maiz','Se pega al suelo',14.00,20,'b7.png',1),
(2,3,'Plato I Dog','Diversos colores',7.00,20,'b3.png',1),
(2,3,'Zapatillas','Tallas XS, S y M',15.00,20,'b4.png',1),
(2,3,'Bebedero y Comedero','Colores verde y rosado',30.00,20,'b5.png',1),
(2,3,'Mochila Transportadora','Material Importado',75.00,20,'b6.png',1);


-- Shopping cart tables
CREATE TABLE IF NOT EXISTS carrito (
    idcarrito INT AUTO_INCREMENT PRIMARY KEY,
    sessionid VARCHAR(128) NOT NULL,
    fecha DATETIME DEFAULT CURRENT_TIMESTAMP,
    status TINYINT NOT NULL DEFAULT 1
);

CREATE TABLE IF NOT EXISTS carrito_detalle (
    id INT AUTO_INCREMENT PRIMARY KEY,
    idcarrito INT NOT NULL,
    productoId INT NOT NULL,
    cantidad INT NOT NULL DEFAULT 1,
    precio DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (idcarrito) REFERENCES carrito(idcarrito),
    FOREIGN KEY (productoId) REFERENCES producto(idproducto)
);

-- Contact messages
CREATE TABLE IF NOT EXISTS contacto (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    correo VARCHAR(100) NOT NULL,
    telefono VARCHAR(20) DEFAULT NULL,
    mensaje TEXT NOT NULL,
    fecha DATETIME DEFAULT CURRENT_TIMESTAMP
);