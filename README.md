# mapa-tiempo-real
Consulta de ubicacion en tiempo real


tabla ubicacion 

CREATE TABLE IF NOT EXISTS `ubicacionv` (
  `idmov` int(10) NOT NULL,
  `iduser` int(10) NOT NULL,
  `lat` text NOT NULL,
  `lng` text NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=latin1;

tabla user

CREATE TABLE IF NOT EXISTS `user` (
  `iduser` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `apellidop` text NOT NULL,
  `apellidom` text NOT NULL,
  `email` text NOT NULL,
  `telefono` text NOT NULL,
  `activo` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=501 DEFAULT CHARSET=latin1;

tabla 
