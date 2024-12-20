CREATE DATABASE IF NOT EXISTS citas_medicas;
USE citas_medicas;

-- Tabla users
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    rol ENUM('paciente', 'medico', 'admin') NOT NULL,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Tabla de pacientes
CREATE TABLE pacientes (
    id_paciente INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL,
    fecha_nacimiento DATE,
    telefono VARCHAR(15),
    FOREIGN KEY (id_usuario) REFERENCES users(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Tabla de médicos
CREATE TABLE medicos (
    id_medico INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL,
    especialidad VARCHAR(100) NOT NULL,
    disponibilidad VARCHAR(255), -- Ejemplo: "Lunes a Viernes 9:00-17:00"
    FOREIGN KEY (id_usuario) REFERENCES users(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Tabla de citas
CREATE TABLE citas (
    id_cita INT AUTO_INCREMENT PRIMARY KEY,
    id_paciente INT NOT NULL,
    id_medico INT NOT NULL,
    fecha_hora DATETIME NOT NULL,
    estado ENUM('confirmada', 'pendiente', 'cancelada') DEFAULT 'pendiente',
    FOREIGN KEY (id_paciente) REFERENCES pacientes(id_paciente) ON DELETE CASCADE,
    FOREIGN KEY (id_medico) REFERENCES medicos(id_medico) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Tabla de historial de citas
CREATE TABLE historial_citas (
    id_historial INT AUTO_INCREMENT PRIMARY KEY,
    id_cita INT NOT NULL,
    observaciones TEXT,
    FOREIGN KEY (id_cita) REFERENCES citas(id_cita) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Tabla de contacto para soporte
CREATE TABLE contacto (
    id_contacto INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    mensaje TEXT NOT NULL,
    fecha_envio TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


////////////////////////////////////////////////////////////////////////////

--Alter medicos
ALTER TABLE medicos
ADD COLUMN nombre VARCHAR(100) NOT NULL AFTER id_usuario,
ADD COLUMN apellido VARCHAR(100) NOT NULL AFTER nombre;
-- INSERTs para la tabla "users"
INSERT INTO users (username, password, rol) VALUES 
('arojas', 'mpassword123', 'medico'),
('rcortes', 'mpassword123', 'medico'),
('aarguedas', 'mpassword123', 'medico'),
('scorrales', 'mpassword123', 'medico'),
('admin1', 'adminpassword', 'admin'),
('mgarcia', 'mypassword789', 'paciente'),
('jdoe', 'password123', 'paciente');

-- INSERTs para la tabla "pacientes"
INSERT INTO pacientes (id_usuario, fecha_nacimiento, telefono) VALUES
(1, '1990-05-15', '8555-1234'),
(4, '1985-03-10', '8555-5678');

select * from users;

-- INSERTs para la tabla "medicos"
INSERT INTO medicos (id_usuario, nombre, apellido, especialidad, disponibilidad) VALUES
(1, 'Adrian', 'Rojas', 'Cardiología', 'Lunes a Viernes 9:00-17:00'),
(2, 'Rachel', 'Cortes', 'Pediatría', 'Lunes a Jueves 10:00-14:00'),
(3, 'Alejandro', 'Arguedas', 'Dermatología', 'Martes y Jueves 14:00-18:00'),
(4, 'Shernna', 'Corrales', 'Neurología', 'Lunes, Miércoles y Viernes 8:00-15:00');


-- INSERTs para la tabla "citas"
INSERT INTO citas (id_paciente, id_medico, fecha, estado) VALUES
(1, 1, '2024-01-10 10:30:00', 'confirmada'),
(2, 2, '2024-01-12 11:00:00', 'pendiente');

-- INSERTs para la tabla "historial_citas"
INSERT INTO historial_citas (id_cita, observaciones) VALUES
(1, 'Paciente con presión arterial alta. Se recomendó dieta baja en sal.'),
(2, 'Chequeo general sin complicaciones.');

-- INSERTs para la tabla "contacto"
INSERT INTO contacto (nombre, email, mensaje) VALUES
('Juan Pérez', 'juan.perez@example.com', 'Necesito ayuda para reprogramar mi cita.'),
('Ana López', 'ana.lopez@example.com', 'Tengo problemas para acceder a mi cuenta.');

////////////////////////////////////////////////////////////////////////



ALTER TABLE citas
DROP COLUMN fecha_hora;

ALTER TABLE citas
ADD COLUMN fecha DATE NOT NULL;

ALTER TABLE citas
ADD COLUMN hora TIME NOT NULL;

/////////////////////////////////////////////////////////////////////////////

INSERT INTO users (username, password, rol) VALUES
('lperez', 'password456', 'paciente'),
('dmartinez', 'password789', 'paciente'),
('cbrown', 'password101', 'paciente'),
('jsmith', 'password112', 'paciente'),
('knguyen', 'password113', 'paciente'),
('bjohnson', 'password114', 'paciente'),
('tlee', 'password115', 'paciente'),
('arobinson', 'password116', 'paciente'),
('wwalker', 'password117', 'paciente'),
('gharris', 'password118', 'paciente');


INSERT INTO pacientes (id_usuario, fecha_nacimiento, telefono) VALUES
(1, '1990-05-15', '8555-1234'),
(2, '1988-07-22', '8555-2345'),
(3, '1992-11-30', '8555-3456'),
(4, '1985-03-10', '8555-5678'),
(5, '1979-01-18', '8555-4567'),
(6, '1993-08-25', '8555-6789'),
(7, '1982-12-14', '8555-7890'),
(8, '1995-06-05', '8555-8901'),
(9, '1991-10-20', '8555-0123'),
(10, '1987-09-09', '8555-2346');


/////////////////////////////////////////////////////////



ALTER TABLE medicos
ADD COLUMN licencia VARCHAR(100) NOT NULL AFTER disponibilidad,
ADD COLUMN consulta DOUBLE NOT NULL AFTER licencia;



UPDATE medicos 
SET licencia = 'Mi licencia: MED4897 · Colegio de Médicos y Cirujanos de Costa Rica', 
    consulta = 85000
WHERE id = 1;

UPDATE medicos 
SET licencia = 'Mi licencia: MED7885 · Colegio de Médicos y Cirujanos de Costa Rica', 
    consulta = 60000
WHERE id = 2;

UPDATE medicos 
SET licencia = 'Mi licencia: MED4827 · Colegio de Médicos y Cirujanos de Costa Rica', 
    consulta = 45000
WHERE id = 3;

UPDATE medicos 
SET licencia = 'Mi licencia: MED7385 · Colegio de Médicos y Cirujanos de Costa Rica', 
    consulta = 65000
WHERE id = 4;
