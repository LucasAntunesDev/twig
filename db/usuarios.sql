CREATE TABLE IF NOT EXISTS usuarios (
    id int not null primary key auto_increment,
    nome varchar(255) not null,
    senha varchar(255) not null
)