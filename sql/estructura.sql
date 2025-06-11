CREATE DATABASE tesis_db;
USE tesis_db;

CREATE TABLE tesistas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    apellidos VARCHAR(100),
    nombres VARCHAR(100),
    dni CHAR(8),
    escuela_profesional ENUM('Ing de Sistemas', 'Ing Mecánica Eléctrica', 'Ing Mecatrónica','Ing Ciberseguridad'),
    estado ENUM('Activo', 'Inactivo') DEFAULT 'Activo'
);

CREATE TABLE tesis (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255),
    linea_investigacion ENUM('Ing Software', 'Redes', 'Robótica e IA', 'Gestion de TI', 'Seguridad Informática'),
    resumen TEXT,
    objetivos TEXT,
    fecha_inicio DATE,
    fecha_fin DATE,
    estado ENUM('En curso', 'Finalizado', 'Suspendido'),
    id_tesista INT,
    FOREIGN KEY (id_tesista) REFERENCES tesistas(id) ON DELETE CASCADE
);