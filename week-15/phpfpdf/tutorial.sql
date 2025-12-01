CREATE DATABASE IF NOT EXISTS tutorial;
USE tutorial;

CREATE TABLE IF NOT EXISTS mahasiswa (
  nim VARCHAR(16) NOT NULL PRIMARY KEY,
  nama_lengkap VARCHAR(100) NOT NULL,
  tanggal_lahir DATE NOT NULL,
  no_hp VARCHAR(20) NOT NULL
);

INSERT INTO mahasiswa (nim, nama_lengkap, tanggal_lahir, no_hp) VALUES
('2019001','Ahmad Sudirman','2005-06-12','081234567890'),
('2019002','Siti Nurhaliza','2005-04-21','081298765432'),
('2019003','Budi Santoso','2005-03-05','081377788899'),
('2019004','Rina Marlina','2005-12-10','081266655544'),
('2019005','Nina Rahmawati','2005-07-15','081245678901'),
('2019006','Budi Prasetyo','2005-08-20','081256789012'),
('2019007','Rina Kartika','2005-09-25','081267890123'),
('2019008','Dewi Anggraini','2005-10-30','081278901234'),
('2019009','Andi Saputra','2005-11-05','081289012345'),
('2019010','Lestari Wulandari','2005-12-18','081290123456');
