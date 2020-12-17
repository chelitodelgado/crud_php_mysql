CREATE DATABASE php_crud;

use php_crud;

CREATE TABLE usuarios(
  id INT(11) PRIMARY KEY AUTO_INCREMENT,
  nombre VARCHAR(255) NOT NULL,
  apellido_p VARCHAR(255) NOT NULL,
  apellido_m VARCHAR(255) NOT NULL,
  direccion TEXT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

