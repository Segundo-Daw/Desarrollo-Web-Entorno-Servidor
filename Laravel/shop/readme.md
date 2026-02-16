# Productos y clientes

## Modelos
Client, Product y Order. En cada Order solamente hay un Client y un Product.

## Endpoints MVC
- `GET /`: devuelve un index con todos los Pedidos (`Order`) de la base de datos. Debajo habrá una lista con todos los clientes, y debajo de cada uno habrá un botón de eliminar que lanzará una petición `DELETE /client/{id}`.

De Client:
- `GET /client/create`: devuelve formulario para crear cliente.
- `POST /client`: inserta el cliente con los datos del campo anterior.
- `DELETE /client/{id}`: elimina cliente.

De Order:
- `GET /order/create`: devuelve formulario de creación de order con un desplegable (o el input que quieras, pero que se pueda seleccionar) con clientes y otro con productos. Debe elegir uno de cada, e insertarlo en la BD.
- `POST /order`: llega desde el endpoint anterior y guarda en la bd el pedido seleccionado.

## Endpoints API REST
- `GET /api/order`: devuelve todas las orders de la base de datos.
- `POST /api/order`: insertar order en la bd
- `DELETE /api/order/{id}`: elimina de la bd esa order.

## Base de datos (algunos inserts)
```mysql
-- Insertar clientes de prueba
INSERT INTO clients (id, name, surname, address) VALUES
(1, 'Juan', 'Pérez', 'Calle Mayor 123, Madrid'),
(2, 'María', 'García', 'Avenida Central 45, Barcelona'),
(3, 'Carlos', 'López', 'Plaza España 7, Valencia'),
(4, 'Ana', 'Martínez', NULL),
(5, 'Pedro', 'Sánchez', 'Calle Real 89, Sevilla'),
(6, 'Laura', 'Fernández', 'Paseo Marítimo 32, Málaga'),
(7, 'Miguel', 'González', NULL),
(8, 'Elena', 'Rodríguez', 'Ronda Norte 56, Bilbao'),
(9, 'David', 'Jiménez', 'Calle Sol 14, Zaragoza'),
(10, 'Carmen', 'Ruiz', 'Avenida Libertad 67, Murcia');

-- Insertar productos de prueba
INSERT INTO products (id, name, price, size, description) VALUES
(1, 'Camiseta básica', 19.99, 'M', 'Camiseta de algodón 100%, varios colores'),
(2, 'Pantalón vaquero', 49.99, 'L', 'Pantalón denim azul, corte regular'),
(3, 'Vestido floral', 39.99, 'S', 'Vestido estampado de flores, manga corta'),
(4, 'Chaqueta de cuero', 89.99, 'M', 'Chaqueta piel ecológica, color negro'),
(5, 'Zapatos deportivos', 59.99, '42', 'Zapatillas running, amortiguación ligera'),
(6, 'Bufanda', 15.99, NULL, 'Bufanda de lana, color gris'),
(7, 'Gorra', 12.99, 'Única', 'Gorra ajustable, color azul marino'),
(8, 'Calcetines', 8.99, '39-42', 'Pack 3 pares calcetines deportivos'),
(9, 'Falda', 29.99, 'XS', NULL),
(10, 'Jersey', 45.99, 'L', 'Jersey de punto, cuello redondo'),
(11, 'Reloj', 129.99, NULL, 'Reloj analógico, correa acero inoxidable'),
(12, 'Gafas de sol', 79.99, 'Única', 'Gafas polarizadas, protección UV'),
(13, 'Bolso', 69.99, NULL, 'Bolso bandolera, piel sintética'),
(14, 'Cinturón', 24.99, '90', 'Cinturón cuero marrón'),
(15, 'Pijama', 34.99, 'XL', 'Pijama algodón, estampado rayas');

-- Insertar pedidos de prueba
INSERT INTO orders (id, product_id, client_id, date) VALUES
(1, 1, 3, '2024-01-15'),
(2, 3, 1, '2024-01-20'),
(3, 2, 5, '2024-01-25'),
(4, 5, 2, '2024-02-01'),
(5, 4, 8, '2024-02-05'),
(6, 7, 4, '2024-02-10'),
(7, 9, 6, '2024-02-15'),
(8, 11, 9, '2024-02-20'),
(9, 6, 7, '2024-02-25'),
(10, 8, 10, '2024-03-01'),
(11, 10, 2, '2024-03-05'),
(12, 13, 1, '2024-03-10'),
(13, 14, 5, '2024-03-12'),
(14, 12, 3, '2024-03-15'),
(15, 15, 6, '2024-03-18'),
(16, 1, 8, '2024-03-20'),
(17, 4, 4, '2024-03-22'),
(18, 7, 9, '2024-03-25'),
(19, 9, 2, '2024-03-28'),
(20, 2, 7, '2024-03-30');
```