CREATE DATABASE IF NOT EXISTS consesionario;
USE consesionario;

CREATE TABLE coches(
id      int(10) auto_increment NOT NULL,
modelo  varchar(100) NOT NULL,
marca   varchar(50) NOT NULL,
precio  int(20) NOT NULL,
stock   int(255),
CONSTRAINT pk_coches PRIMARY KEY(id)
)ENGINE=InnoDB;

CREATE TABLE grupos(
id      int(10) auto_increment NOT NULL,
nombre  varchar(100) NOT NULL,
ciudad  varchar(100) NOT NULL,
CONSTRAINT pk_grupos PRIMARY KEY(id)
)ENGINE=InnoDB;

CREATE TABLE vendedores(
id          int(10) auto_increment NOT NULL,
grupo_id    int(10) NOT NULL,
jefe        int(10),        
nombre      varchar(100) NOT NULL,
apellidos   varchar(100) NOT NULL,
cargo       varchar(100) NOT NULL,
fecha       date,
sueldo      float(10,2),
comision    float(10,2),
CONSTRAINT pk_vendedores PRIMARY KEY(id),
CONSTRAINT fk_vendedores_grupos FOREIGN KEY(grupo_id) REFERENCES grupos(id),
CONSTRAINT fk_vendedores_jefe FOREIGN KEY(jefe) REFERENCES vendedores(id)
)ENGINE=InnoDB;

CREATE TABLE clientes(
id              int(10) auto_increment NOT NULL,   
vendedor_id     int(10) NOT NULL,
nombre          varchar(100) NOT NULL,
ciudad          varchar(100) NOT NULL,
gastado         float(50,2) NOT NULL,
fecha           date,
CONSTRAINT pk_clientes PRIMARY KEY(id),
CONSTRAINT fk_clientes_vendedor FOREIGN KEY(vendedor_id) REFERENCES vendedores(id)
)ENGINE=InnoDB;

CREATE TABLE encargos(
id              int(10) auto_increment NOT NULL,
cliente_id      int(10) NOT NULL,
coches_id       int(10) NOT NULL,
cantidad        int(100),
fecha           date,
CONSTRAINT pk_encargos PRIMARY KEY(id),
CONSTRAINT fk_encargos_coches FOREIGN KEY(coches_id) REFERENCES coches(id),
CONSTRAINT fk_encargos_clienes FOREIGN KEY(cliente_id) REFERENCES clientes(id)
)ENGINE=InnoDB;


-- Insertar Datos

-- Table Coches
INSERT INTO coches VALUES(NULL, 'Acord', 'Honda', 100000, 3); 
INSERT INTO coches VALUES(NULL, 'Legacy', 'Subaru', 470000, 8); 
INSERT INTO coches VALUES(NULL, 'Avalon', 'Toyota', 350000, 4); 
INSERT INTO coches VALUES(NULL, 'Odyssey', 'Honda', 200000, 5); 
INSERT INTO coches VALUES(NULL, 'Maxima', 'Nissan', 120000, 7);

-- Table grupos
INSERT INTO grupos VALUES(NULL, 'Vendedores A', 'Santiago' );
INSERT INTO grupos VALUES(NULL, 'Vendedores B', 'Tenares' );
INSERT INTO grupos VALUES(NULL, 'Vendedores C', 'San Francisco' );
INSERT INTO grupos VALUES(NULL, 'Vendedores D', 'Puerto Plata' );
INSERT INTO grupos VALUES(NULL, 'Vendedores E', 'Bonao' );
-- Table Vendedores
INSERT INTO vendedores VALUES(NULL, 1, NULL, 'Roberandy', 'Lopez', 'Responsable de la tienda', CURDATE(), 30000, 4);
INSERT INTO vendedores VALUES(NULL, 1, 1, 'Anderson', 'Luciano', 'Ayudante de la tienda', CURDATE(), 23000, 2);
INSERT INTO vendedores VALUES(NULL, 2, NULL, 'Jonathan', 'Rosario', 'Responsable de la tienda', CURDATE(), 38000, 5);
INSERT INTO vendedores VALUES(NULL, 2, 3, 'Jofer', 'Tavarez', 'Ayudante de la tienda', CURDATE(), 12000, 6);
INSERT INTO vendedores VALUES(NULL, 3, NULL, 'Sergio', 'Hernandez', 'Mecanico jefe', CURDATE(), 50000, 2);
INSERT INTO vendedores VALUES(NULL, 4, NULL, 'Critopher', 'Hernandez', 'Vendedor de cambios', CURDATE(), 13000, 8);
INSERT INTO vendedores VALUES(NULL, 5, NULL, 'Yaritza', 'Vargas', 'Vendedor experto', CURDATE(), 60000, 2);
INSERT INTO vendedores VALUES(NULL, 6, NULL, 'Etanislao', 'Flete', 'Ejecutivo de cuentas', CURDATE(), 80000, 1);
INSERT INTO vendedores VALUES(NULL, 6, 8, 'Luis', 'Manuel', 'Ayudante de la tienda', CURDATE(), 10000, 10);
-- Table clientes
INSERT INTO clientes values (NULL, 1, 'Hormigones Industriales', 'Embrujo 3ero', 300000, CURDATE());
INSERT INTO clientes values (NULL, 1, 'Cecomsa', 'Estrella Sadala', 470000, CURDATE());
INSERT INTO clientes values (NULL, 1, 'Torniacero', 'Duarte', 700000, CURDATE());
INSERT INTO clientes values (NULL, 1, 'Sirena', 'Bartolome Colón', 600000, CURDATE());
INSERT INTO clientes values (NULL, 1, 'Cemento Cibao', 'Baitoa', 480000, CURDATE());
INSERT INTO clientes values (NULL, 1, 'Encanto', 'Calle del sol', 120000, CURDATE());
-- Tables encargos
INSERT INTO encargos values (NULL, 1, 1, 3, CURDATE());
INSERT INTO encargos values (NULL, 2, 2, 1, CURDATE());
INSERT INTO encargos values (NULL, 3, 3, 2, CURDATE());
INSERT INTO encargos values (NULL, 4, 4, 3, CURDATE());
INSERT INTO encargos values (NULL, 5, 5, 4, CURDATE());
INSERT INTO encargos values (NULL, 6, 5, 1, CURDATE());

-- Ejercicio 2
-- Modificar la comision de los vendedores y ponerla al 2% cuando ganan 50000 o mas.
USE consesionario;
UPDATE vendedores SET comision = 0.5 WHERE sueldo >= 50000;
-- Ejercicio 3
-- Incrementar el precio de los coches en un 5 porciento.
UPDATE coches SET precio = precio*1.05;
-- Ejercicio 4
-- Sacar todos los vendedores cuya fecha de alta sea posterior al 1 de julio de 2018
SELECT * FROM vendedores WHERE fecha >='2018-7-1';
-- Ejercicio 5
-- Mostrar todos los vendedores con su nombre y el numero de dias en el consesionario
SELECT nombre,DATEDIFF(CURDATE(),fecha) as 'Fecha Laborada' FROM vendedores;
-- Ejercicio 6
-- Visualizar el nombre y los apellidos de los vendedores en una misma columna, su fecha de registro y el dia de la semana en la que se registraron.
SELECT CONCAT(nombre, " ", apellidos), fecha AS "Fecha de registro",DAYNAME(fecha) AS "Dia del registro" FROM vendedores; 
-- Ejercicio 7
-- Mostrar el nombre y el salario de los vendedores con cargo de 'Ayudante de la tienda'
SELECT nombre, sueldo FROM vendedores WHERE cargo="Ayudante de la tienda";
-- Ejercicio 8
-- Visualizar todos los coches en cuyo marca exista la letra "A" y cuyo modelo empiece por "F"
SELECT * FROM coches WHERE marca LIKE '%a%' AND modelo LIKE 'f%';

-- Insertar una query que tenga las especificaciones del ejercicio anterior
INSERT INTO coches VALUES (NULL, 'Ford', 'Mustang', 700000, 10);
-- Ejercicio 9
-- Mostrar todos los vendedores del grupo numero 2, ordenados por salario de mayor a menor
SELECT * FROM vendedores WHERE grupo_id=2 ORDER BY sueldo DESC;
-- Ejercicio 10
-- Visualizar los apellidos de los vendedores, su fecha y su numero de grupo, ordenado por fecha descendente, mostrar los 4 ultimos
SELECT apellidos, fecha, grupo_id FROM vendedores ORDER BY fecha DESC LIMIT 4;
-- Ejercicio 11
-- Visualizar todos los cargos y el numero de vendedores que hay en cada cargo
SELECT cargo, COUNT(id) AS "Numero de empleados" FROM vendedores GROUP BY cargo ORDER BY COUNT(id) DESC;
-- Ejercicio 12
-- Conseguir la masa salarial del consesionario (anual)
SELECT SUM(sueldo) FROM vendedores;
-- Ejercicio 13
-- Sacar la media de sueldos entdres todos los vendedores por grupo
SELECT CEIL(AVG(v.sueldo)) AS "Promedio", g.nombre AS "Grupo",grupo_id AS "Numero" FROM vendedores v
INNER JOIN grupos g ON g.id=v.grupo_id
GROUP BY (grupo_id);
-- Ejercicio 14
-- Visualizar las unidades totales vendidas de cada coches a cada cliente.
-- Monstando el nombre del producto, numero de cliente y la suma de unidades.
SELECT CONCAT(co.marca," ",co.modelo) AS "Vehiculo", cl.nombre, e.cantidad
FROM encargos e
INNER JOIN coches co ON co.id = e.coches_id
INNER JOIN clientes cl ON cl.id = e.cliente_id
GROUP BY e.coches_id, e.cliente_id;
-- Ejercicio 15
-- Monstrar los clientes que mas encargos han hecho y mostrar cuantos hicieron
SELECT c.nombre AS "Nombre del cliente", COUNT(e.cliente_id) FROM encargos e
INNER JOIN clientes c ON c.id = e.cliente_id 
GROUP BY c.id;
-- Ejercicio 16
-- Obtener listado de clientes atendidos por el vendedor 'Roberandy Lopez'
SELECT cl.nombre AS "Clientes atendidos por David" FROM clientes cl 
INNER JOIN vendedores ve ON ve.id = cl.vendedor_id
WHERE CONCAT(ve.nombre," ",ve.apellidos) = "Roberandy Lopez";
-- Esta otra es con subconsulta 
SELECT nombre AS "Cliente" 
FROM clientes 
WHERE vendedor_id IN (SELECT id FROM vendedores WHERE nombre="Roberandy" AND apellidos="Lopez");
-- Ejercicio 17
-- Obtener listado con los encargos realizados por el cliente "Cecomsa"
SELECT e.id, cl.nombre, e.coche_id, CONCAT(co.modelo, " ", co.marca) AS "coche", e.cantidad, e.fecha FROM encargos e
INNER JOIN clientes cl ON cl.id = e.cliente_id
INNER JOIN coches co ON co.id = e.coche_id
WHERE cliente_id IN (SELECT id FROM clientes WHERE nombre="Cecomsa");
-- Ejercicio 18
-- Listar los clientes que han hecho algun encargo del coche "Ford Mustang"
SELECT * FROM clientes cl
WHERE cl.id IN 
(SELECT e.cliente_id FROM encargos e WHERE e.coche_id IN 
(SELECT co.id FROM coches co 
WHERE co.modelo = "Ford" AND co.marca= "Mustang"));
-- Ejercicio 19
-- Obtener los vendedores con 2 o mas clientes.
SELECT * FROM vendedores v 
WHERE id IN (SELECT vendedor_id FROM clientes GROUP BY vendedor_id HAVING COUNT(id)>=2  );
-- Ejercicio 20
-- Seleccionar el grupo en el que trabaja el vendedor con mayor salario y mostrar el nombre del grupo
SELECT * FROM grupos WHERE id IN
(SELECT grupo_id FROM vendedores WHERE sueldo = (SELECT MAX(sueldo) FROM vendedores ));
-- Ejercicio 21   
-- Obtener los nombres y ciudades de los clientes con encargos dec 3 en adelante
SELECT nombre, ciudad FROM clientes WHERE id IN
(SELECT cliente_id FROM encargos WHERE cantidad >=3);
-- Ejercicio 22
-- Mostrar listado de clientes (numero de cliente y el nombre) mostrar tambien el numero de vendedor y su nombre.
SELECT cl.id, cl.nombre, cl.vendedor_id, CONCAT(nombre, " ", apellidos) FROM clientes cl
INNER JOIN vendedores v ON v.id = cl.vendedor_id;
--  Ejercicio 23
-- Listar todos los encargos realizados con la marca del coche y el nombre del cliente.
SELECT e.id, co.marca, cl.nombre FROM coches co, clientes cl, encargos e
WHERE e.coche_id = co.id AND e.cliente_id = cl.id;
-- Ejercicio 24
-- Listar los encargos con el nombre del coche, el nombre del cliente y el nombre de la ciudad, pero unicamente cuando sean de Embrujo 3ero
SELECT e.id AS "Numero de pedido" ,CONCAT(co.marca, " ", co.modelo) AS "Auto", cl.nombre AS "Cliente", cl.ciudad FROM encargos e
INNER JOIN clientes cl ON cl.id = e.cliente_id
INNER JOIN coches co ON co.id = e.coche_id
WHERE cl.ciudad = "Embrujo 3ero";
-- Ejercicio 25
-- Obtener una lista de los nombres de los clientes con el importe de sus encargos acumulado
SELECT cl.nombre, SUM(en.cantidad * co.precio) AS "Importe"
FROM clientes cl 
INNER JOIN encargos en ON en.cliente_id = cl.id
INNER JOIN coches co ON co.id = en.coche_id
GROUP BY cl.nombre;
-- Ejercicio 26
-- Sacar los vendedores que tienen jefe y sacar el nombre del jefe
SELECT v1.nombre AS "Vendedor" , v2.nombre AS "Jefe"
FROM vendedores v1
INNER JOIN vendedores v2 ON v1.jefe = v2.id;
-- Ejercicio 27
-- Visualizar los nombre de los clientes y las cantidad de encargos realizaos, incluyendo los que no hayan realiazado encargos
SELECT cl.nombre, COUNT(e.id) FROM clientes cl
INNER JOIN encargos e ON cl.id = e.cliente_id
GROUP BY cl.nombre
-- Usamos left en el JOIN para que saque tambien los que no tiene encargos
-- Ejercicio 28
-- Mostrar todos los vendedores y el numero de clientes. se deben mostar tengan o no clientes
SELECT CONCAT(v.nombre, " ", v.apellidos) AS "Vendedor", COUNT(cl.id) AS "Numero de clientes" 
FROM vendedores v 
LEFT JOIN clientes cl ON cl.vendedor_id = v.id
GROUP BY 1;
-- Ejercicio 29 
-- Crear una vista llamada vendedores A que incluira todos los vendedores del grupo que se llame "Vendedores A"
CREATE VIEW vendedoresa AS
SELECT * FROM vendedores WHERE grupo_id IN
(SELECT id FROM grupos WHERE nombre="Vendedores A");
-- Ejercicio 30
-- Mostrar los datos del vendedor con mas antiguedad en el consesionario
SELECT * FROM vendedores ORDER BY fecha ASC LIMIT 1;
-- Ejercicio 30 PLUS 
-- Obtener el coche con mas unidades vendidas
SELECT * FROM coches WHERE id IN 
    (SELECT id FROM encargos WHERE cantidad IN 
        (SElECT MAX(cantidad) FROM encargos)
    );

    -- Sacar cuantas tareas tienen menos de 10 dia para cumplirse

    SELECT  COUNT(id) FROM tasks WHERE DATEDIFF(date_expected,CURDATE()) < 10;
    -- Sacar diferencia de fechas
    
    SELECT DATEDIFF(date_expected,CURDATE()) AS 'date_expected' FROM articles;
    DATEDIFF(CURDATE(),fecha)

    