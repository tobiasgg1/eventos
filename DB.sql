CREATE TABLE participantes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    apellido VARCHAR(100) NOT NULL,
    numero_entrada INT NOT NULL UNIQUE,
    forma_pago ENUM('Efectivo', 'Tarjeta') NOT NULL,
    dni BIGINT NOT NULL UNIQUE,
    colegio VARCHAR(150) NOT NULL,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
