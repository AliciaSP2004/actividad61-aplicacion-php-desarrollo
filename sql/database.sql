CREATE TABLE usuario (
  usuario_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  nombre_usuario VARCHAR(50) NOT NULL UNIQUE,
  contrasena VARCHAR(255) NOT NULL,
  correo VARCHAR(150) NOT NULL UNIQUE,
  creacion TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO usuario (nombre_usuario, contrasena, correo) VALUES('juan','$2y$10$28hv3GIW8Ms9K3e.0swV2.vDM2r3LMRaVfEdU4eDoEzJgXURdlmTW','juan@gmail.com');
INSERT INTO usuario (nombre_usuario, contrasena, correo) VALUES('hernesto','$2y$10$28hv3GIW8Ms9K3e.0swV2.vDM2r3LMRaVfEdU4eDoEzJgXURdlmTW','hernesto@gmail.com');
INSERT INTO usuario (nombre_usuario, contrasena, correo) VALUES('jaime','$2y$10$28hv3GIW8Ms9K3e.0swV2.vDM2r3LMRaVfEdU4eDoEzJgXURdlmTW','jaime@gmail.com');
INSERT INTO usuario (nombre_usuario, contrasena, correo) VALUES('francisco','$2y$10$28hv3GIW8Ms9K3e.0swV2.vDM2r3LMRaVfEdU4eDoEzJgXURdlmTW','francisco@gmail.com');
INSERT INTO usuario (nombre_usuario, contrasena, correo) VALUES('aitana','$2y$10$28hv3GIW8Ms9K3e.0swV2.vDM2r3LMRaVfEdU4eDoEzJgXURdlmTW','aitana@gmail.com');
INSERT INTO usuario (nombre_usuario, contrasena, correo) VALUES('alicia','$2y$10$28hv3GIW8Ms9K3e.0swV2.vDM2r3LMRaVfEdU4eDoEzJgXURdlmTW','alicia@gmail.com');
INSERT INTO usuario (nombre_usuario, contrasena, correo) VALUES('jana','$2y$10$28hv3GIW8Ms9K3e.0swV2.vDM2r3LMRaVfEdU4eDoEzJgXURdlmTW','jana@gmail.com');
INSERT INTO usuario (nombre_usuario, contrasena, correo) VALUES('albaro','$2y$10$28hv3GIW8Ms9K3e.0swV2.vDM2r3LMRaVfEdU4eDoEzJgXURdlmTW','albaro@gmail.com');
INSERT INTO usuario (nombre_usuario, contrasena, correo) VALUES('pepe','$2y$10$28hv3GIW8Ms9K3e.0swV2.vDM2r3LMRaVfEdU4eDoEzJgXURdlmTW','pepe@gmail.com');
INSERT INTO usuario (nombre_usuario, contrasena, correo) VALUES('alberto','$2y$10$28hv3GIW8Ms9K3e.0swV2.vDM2r3LMRaVfEdU4eDoEzJgXURdlmTW','alberto@gmail.com');
INSERT INTO usuario (nombre_usuario, contrasena, correo) VALUES('isabel','$2y$10$28hv3GIW8Ms9K3e.0swV2.vDM2r3LMRaVfEdU4eDoEzJgXURdlmTW','isabel@gmail.com');



CREATE TABLE pokemons (
  pokemons_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  nº_pokedex INT UNIQUE,
  nombre VARCHAR(50) NOT NULL UNIQUE,
  tipo VARCHAR(150) NOT NULL,
  descripcion VARCHAR(500),
  habilidad VARCHAR(150),
  debilidad VARCHAR(150),
  region ENUM('Kanto', 'Johto', 'Hoenn', 'Sinnoh', 'Unova', 'Kalos', 'Alola', 'Galar', 'Hisui', 'Paldea', 'Teselia'),
  generacion ENUM('1º', '2º', '3º', '4º', '5º', '6º', '7º', '8º', '9º'),
  creacion TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO pokemons (nº_pokedex, nombre, tipo, descripcion, habilidad, debilidad, region, generacion) VALUES(25, 'Pikachu', 'electrico', 'Cuando se enfada, descarga electricidad por su cola.', 'electricidad estatica', 'tierra', 'Kanto', '1º');
INSERT INTO pokemons (nº_pokedex, nombre, tipo, descripcion, habilidad, debilidad, region, generacion) VALUES(4, 'Charmander', 'fuego', 'Su cola arde con una llama que refleja su estado de ánimo', 'Mar Llamas', 'agua', 'Kanto', '1º');
INSERT INTO pokemons (nº_pokedex, nombre, tipo, descripcion, habilidad, debilidad, region, generacion) VALUES(300, 'Skitty', 'normal', 'Le encanta mover cosas e ir detras de ellas', 'Gran encanto y Normalidad', 'lucha', 'Hoenn', '2º');
INSERT INTO pokemons (nº_pokedex, nombre, tipo, descripcion, habilidad, debilidad, region, generacion) VALUES(299, 'Nosepass', 'roca', 'Tiene una nariz brujula increble', 'Robustez e Iman', 'agua, planta, lucha, tirra y acero', 'Hoenn', '2º');
INSERT INTO pokemons (nº_pokedex, nombre, tipo, descripcion, habilidad, debilidad, region, generacion) VALUES(555, 'Darmanitan', 'fuego', 'Cuando resulta gravemente herido, su cuerpo se endurece y medita', 'Potencia bruta', 'agua tierra y roca', 'Teselia', '5º');
INSERT INTO pokemons (nº_pokedex , nombre , tipo , descripcion , habilidad , debilidad , region , generacion ) VALUES(150 ,  'Mewtwo' ,  'psiquico' ,  'Se dice que su ADN es 100% puro' ,  'Presion' ,  'bicho,fantasma y siniestro' ,  'Kanto','1º');
INSERT INTO pokemons (nº_pokedex , nombre , tipo , descripcion , habilidad , debilidad , region , generacion ) VALUES(1000,'Gholdengo','acero/fantasma','Se dice que su cuerpo esta formado por 1000 monedas','Cuerpo autea','fuego tierra fantasma y siniestro','Paldea','9º');
INSERT INTO pokemons (nº_pokedex, nombre, tipo, descripcion, habilidad, debilidad, region, generacion) VALUES(602, 'Tynamo', 'electrico', 'La electricidad de uno de uno solo es insignificante', 'Levitacion', 'Tierra', 'Teselia', '5º');
INSERT INTO pokemons (nº_pokedex, nombre, tipo, descripcion, habilidad, debilidad, region, generacion) VALUES(393, 'Piplup', 'agua', 'No se le da bien andar', 'Torrente', 'Planta y electrico', 'Sinnoh', '4º');
INSERT INTO pokemons (nº_pokedex, nombre, tipo, descripcion, habilidad, debilidad, region, generacion) VALUES(1001, 'Wo-Chien', 'siniestro/planta', 'Absorbe la energia de la vegetación marchitando los bosques', 'Tablilla debacle', 'fuego hielo lucha veneno volador bicho y hada ',  'Paldea', '9º');