create database mvc_livros;
use mvc_livros;

CREATE TABLE LIVROS (
    ID INTEGER AUTO_INCREMENT PRIMARY KEY,
    TITULO varchar(255),
    AUTOR  varchar(255),
    ANO DATE,
    EDITORA varchar(255)
);

SELECT * FROM livros;
