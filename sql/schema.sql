DROP DATABASE IF EXISTS bytegreen;

CREATE DATABASE bytegreen;
USE bytegreen;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'technician', 'manager') NOT NULL
);

CREATE TABLE equipment (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    type VARCHAR(50) NOT NULL,
    location VARCHAR(100) NOT NULL,
    power_watts FLOAT NOT NULL,
    responsible VARCHAR(100) NOT NULL
);

CREATE TABLE energy_consumption (
    id INT AUTO_INCREMENT PRIMARY KEY,
    equipment_id INT NOT NULL,
    date DATE NOT NULL,
    kwh FLOAT NOT NULL,
    observations TEXT,
    CONSTRAINT fk_equipment FOREIGN KEY (equipment_id) REFERENCES equipment(id) ON DELETE CASCADE
);