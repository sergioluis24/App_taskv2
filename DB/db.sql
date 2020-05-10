CREATE DATABASE IF NOT EXISTS apptask;
USE apptask;

CREATE TABLE users (
    id          INT(10) auto_increment NOT NULL,
    nombre        VARCHAR(50) NOT NULL,
    apellido     VARCHAR(50) NOT NULL,
    email       VARCHAR(50) NOT NULL,
    passowrd    VARCHAR(50) NOT NULL,
    tasks       INT(10) NOT NULL,
    fund        FLOAT(10,2) NOT NULL,
    CONSTRAINT pk_users PRIMARY KEY(id)
);
CREATE TABLE priority (
    id          INT(10) auto_increment NOT NULL,
    nombre        VARCHAR(50) NOT NULL,
    CONSTRAINT pk_priority PRIMARY KEY(id)
);
CREATE TABLE tasks (
    id              INT(10) auto_increment NOT NULL,
    user_id         INT(10) NOT NULL,
    priority_id     INT(10) NOT NULL,
    title           VARCHAR(50) NOT NULL,
    descripcion     MEDIUMTEXT NOT NULL,
    estado           BOOLEAN NOT NULL,
    date_registry   DATE NOT NULL,
    date_expected   DATE NOT NULL,
    CONSTRAINT pk_tasks PRIMARY KEY(id),
    CONSTRAINT fk_tasks_priority FOREIGN KEY(priority_id) REFERENCES priority(id),
    CONSTRAINT fk_tasks_user FOREIGN KEY(user_id) REFERENCES users(id)

);
CREATE TABLE articles (
    id              INT(10) auto_increment NOT NULL,
    user_id         INT(10) NOT NULL,
    id_priority     INT(10) NOT NULL,
    title           VARCHAR(50) NOT NULL,
    descripcion     MEDIUMTEXT NOT NULL,
    estado           BOOLEAN NOT NULL,
    date_registry   DATE NOT NULL,
    date_expected   DATE NOT NULL,
    CONSTRAINT pk_articles PRIMARY KEY(id),
    CONSTRAINT fk_articles_priority FOREIGN KEY(id_priority) REFERENCES priority(id),
    CONSTRAINT fk_articles_user FOREIGN KEY(user_id) REFERENCES users(id)
);
-- Priority
INSERT INTO priority VALUES (NULL,'normal');
INSERT INTO priority VALUES (NULL,'medium');
INSERT INTO priority VALUES (NULL,'high');

-- Article
INSERT INTO articles VALUES (NULL,1,1, "Primer articulo", "Solo consisto en un ejemplo",FALSE, "5/9/2020", "5/11/2020");

-- Task
INSERT INTO tasks VALUES (NULL,1,1, "Primer tarea", "Solo consisto en un ejemplo",FALSE, "5/9/2020", "5/11/2020");

-- Users
INSERT INTO users VALUES (NULL, "Sergio Luis", "Hernandez Cruz", "sergioluis2324@gmail.com", "sergioluis123", 0, 500);