DROP DATABASE IF EXISTS bytegreen;

CREATE DATABASE bytegreen;
USE bytegreen;

CREATE TABLE equipmento (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    tipo VARCHAR(50) NOT NULL,
    localizacao VARCHAR(100) NOT NULL,
    power_watts FLOAT NOT NULL,
    responsabilidade VARCHAR(100) NOT NULL
);

CREATE TABLE energy_consumo (
    id INT AUTO_INCREMENT PRIMARY KEY,
    equipmento_id INT NOT NULL,
    data DATE NOT NULL,
    kwh FLOAT NOT NULL,
    observacoes TEXT,
    CONSTRAINT fk_equipmento FOREIGN KEY (equipmento_id) REFERENCES equipmento(id) ON DELETE CASCADE
);