CREATE DATABASE IF NOT EXISTS users;

USE users;

CREATE TABLE IF NOT EXISTS users (
    UserID INT PRIMARY KEY AUTOINCREMENT,
    Nombre varchar(100),
    Dni int,
    Pais varchar(100),
    Email varchar(100)
);