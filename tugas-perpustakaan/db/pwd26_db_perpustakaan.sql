CREATE DATABASE IF NOT EXISTS pwd26_db_perpustakaan
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_general_ci;

USE pwd26_db_perpustakaan;

CREATE TABLE IF NOT EXISTS anggota (
    id INT NOT NULL AUTO_INCREMENT,
    no_anggota VARCHAR(15) NOT NULL,
    nama_lengkap VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    no_hp VARCHAR(15) NOT NULL,
    jenis_anggota VARCHAR(30) NOT NULL,
    alamat TEXT NOT NULL,
    PRIMARY KEY (id)
);
