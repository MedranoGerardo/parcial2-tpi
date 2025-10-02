-- Script para la base de datos alumno y la tabla estudiante

CREATE DATABASE IF NOT EXISTS alumno;
USE alumno;

CREATE TABLE IF NOT EXISTS estudiante (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    teléfono VARCHAR(20) NOT NULL,
    `fecha de nacimiento` DATE NOT NULL,
    dirección TEXT NOT NULL
);

INSERT INTO estudiante (nombre, teléfono, `fecha de nacimiento`, dirección) VALUES
('Juan Pérez', '555-0123', '1995-05-15', 'Calle Principal 123, Ciudad'),
('María González', '555-0456', '1998-08-22', 'Avenida Central 456, Ciudad'),
('Carlos López', '555-0789', '1997-12-10', 'Barrio Norte 789, Ciudad');