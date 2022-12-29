-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2021 at 03:11 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `userform`
--

-- --------------------------------------------------------

--
-- Table structure for table `usertable`
--

CREATE TABLE `usertable` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `code` mediumint(50) NOT NULL,
  `status` text NOT NULL, 
  `perfil` int(3) not null
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `usertable`
--
ALTER TABLE `usertable`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `usertable`
--
ALTER TABLE `usertable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


-- INSERT INTO `usertable`(`name`, `email`, `password`, `code`, `status`) VALUES ('Super Admin','superadmin@ieism.edu.pe','AnnO@2022$',1234,'verified')

CREATE TABLE almacentable (
  id int(11) not null auto_increment, 
  nombre varchar(255) NOT NULL,
  ubicacion varchar(255) null,
  descripcion varchar(255) null,
  fecha date not null,
  CONSTRAINT pk_almacen PRIMARY KEY(id)
)ENGINE=InnoDb;

INSERT INTO `almacentable`(`nombre`, `ubicacion`, `fecha`) VALUES 
('Escritorio','', CURDATE()),
('Ferreteria','', CURDATE()),
('Frescos','', CURDATE()),
('Secos','', CURDATE());

CREATE TABLE medidatable (
  id int(11) NOT NULL AUTO_INCREMENT,
  nombre varchar(255) NOT NULL,
  mininombre varchar(255) null,
  descripcion varchar(255) null,
  fecha date not null,
  CONSTRAINT pk_medida PRIMARY KEY(id)
);

INSERT INTO `medidatable`(`nombre`, `mininombre`, `fecha`) VALUES 
('Atado','', CURDATE()),
('Galon','', CURDATE()),
('Gramos','GR', CURDATE()),
('Litros','L', CURDATE()),
('Paquete','PQ', CURDATE()),
('Unidad','UND', CURDATE());

CREATE TABLE tipomovimiento (
  id int(11) NOT NULL AUTO_INCREMENT,
  nombre varchar(255) NOT NULL,  
  descripcion varchar(255) null,
  fechacreacion date not null,
  CONSTRAINT pk_tipomovimiento PRIMARY KEY(id)
);

INSERT INTO `tipomovimiento`(`nombre`,`fechacreacion`) VALUES 
('ingreso', CURDATE()),
('salida', CURDATE());

CREATE TABLE area (
  id int(11) NOT NULL AUTO_INCREMENT,
  nombre varchar(255) NOT NULL,  
  descripcion varchar(255) null,
  fechacreacion date not null,
  CONSTRAINT pk_areas PRIMARY KEY(id)
);

INSERT INTO `area`(`nombre`,`fechacreacion`) VALUES 
('ADMINISTRACION', CURDATE()),
('DIRECCION', CURDATE()),
('MANTENIMIENTO', CURDATE()),
('SECRETARIA', CURDATE()),
('SEGURIDAD', CURDATE()),
('SSCC', CURDATE()),
('SUBDIRECCION', CURDATE());

-- INSERT ---> UUID_TO_BIN( UUID())
-- SELECT ---> BIN_TO_UUID(ID) id,
CREATE TABLE PRODUCTOS (
  id int(11) NOT NULL AUTO_INCREMENT,
  almacen_id int(11) not null,
  medidatable_id int(11) not null,
  nombre varchar(255) NOT NULL,
  codigo varchar(255) NULL,
  marca varchar(255) NULL,
  stock int(11) not null DEFAULT '1',   
  fechacreacion date not null,
  estado int(3) not null,
  CONSTRAINT pk_medida PRIMARY KEY(id),
  CONSTRAINT fk_almacen FOREIGN KEY(almacen_id) REFERENCES almacentable(id),
  CONSTRAINT fk_medidatable FOREIGN KEY(medidatable_id) REFERENCES medidatable (id)
)ENGINE=InnoDb;

CREATE TABLE PRODUCTOS_DETALLES (
  id int(11) NOT NULL AUTO_INCREMENT,
  tipoMovimiento_id int(11) not null,
  area_id int(11) not null,
  producto_id int(11) not null,  
  nea varchar(255) NULL,
  guia varchar(255) NULL,
  cantidad int(11) not null,
  fechaingreso date null,
  fechasalida date null,
  fechamovimiento date not null,
  estado int(3) not null DEFAULT '1',
  CONSTRAINT pk_productoDetalles PRIMARY KEY(id),
  CONSTRAINT fk_movimiento FOREIGN KEY(tipoMovimiento_id) REFERENCES tipomovimiento (id),
  CONSTRAINT fk_area FOREIGN KEY(area_id) REFERENCES area (id),
  CONSTRAINT fk_producto FOREIGN KEY(producto_id) REFERENCES PRODUCTOS (id)
)ENGINE=InnoDb;
