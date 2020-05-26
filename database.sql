CREATE TABLE users(
    id serial PRIMARY KEY,
    login varchar(30) NOT NULL,
    password varchar(100) NOT NULL
);