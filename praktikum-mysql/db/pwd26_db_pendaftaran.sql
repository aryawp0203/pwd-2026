-- Membuat database
CREATE DATABASE IF NOT EXISTS pwd26_db_pendaftaran
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_general_ci;

-- Memilih database
USE pwd26_db_pendaftaran;

-- Membuat tabel mahasiswa
CREATE TABLE IF NOT EXISTS mahasiswa (
    id INT NOT NULL AUTO_INCREMENT,
    nim VARCHAR(20) NOT NULL,
    nama VARCHAR(100) NOT NULL,
    prodi VARCHAR(50) NOT NULL,
    jenis_kelamin VARCHAR(20) NOT NULL,
    alamat TEXT NOT NULL,
    PRIMARY KEY (id)
);