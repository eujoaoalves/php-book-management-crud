CREATE DATABASE library;

USE DATABASE library;

-- Como este é um projeto simples, não vi a necessidade de criar uma tabela para autores
CREATE TABLE book
  (
     id                      INT auto_increment NOT NULL,
     name                    VARCHAR(50) NOT NULL,
     book_author             VARCHAR(50) NOT NULL,
     number_pages            INT NOT NULL,
     price                   DOUBLE NOT NULL,
     number_copies_available INT NOT NULL,
     release_date            DATE NOT NULL,
     register_date           DATE NOT NULL,
     PRIMARY KEY (id)
  );

INSERT INTO book(book_author, name, number_copies_available, number_pages, price, register_date, release_date)
VALUES("Robert Cecil Martin","Clean Code",10,431,384,'2023-01-14','2008-08-01'),
("J.K. Rowling", "Harry Potter and the Sorcerer's Stone", 20, 309, 499, '2022-12-01', '1997-06-26'),
("Stephen King", "The Shining", 15, 447, 399, '2022-11-01', '1977-01-28'),
("George Orwell", "1984", 8, 267, 399, '2022-10-01', '1949-06-08'),
("Jane Austen", "Pride and Prejudice", 12, 432, 299, '2022-09-01', '1813-01-28'),
("F. Scott Fitzgerald", "The Great Gatsby", 10, 180, 399, '2022-08-01', '1925-04-10'),
