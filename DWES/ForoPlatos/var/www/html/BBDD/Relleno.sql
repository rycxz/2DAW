-- Insertar ingredientes
INSERT INTO ingrediente (nombre) VALUES
('Tomate'),
('Cebolla'),
('Ajo'),
('Pimiento'),
('Aceite de oliva'),
('Sal'),
('Pimienta'),
('Pollo'),
('Arroz'),
('Carne molida'),
('Lechuga'),
('Queso'),
('Pan'),
('Pepino'),
('Zanahoria'),
('Albahaca'),
('Jamon'),
('Leche'),
('Harina'),
('Huevos');

-- Insertar recetas
INSERT INTO receta (nombre, elaboracion, id_usuario, fechaPublicacion, dificultad, tipoReceta, valoracionMedia, rutaImagen) VALUES
('Ensalada de Pollo', 'Cortar las pechugas de pollo en trozos pequeños. Cortar la lechuga, pepino y zanahorias en rodajas. Mezclar todo en un bol con mayonesa y servir.', 1, '2024-11-28', 'Facil', 'Tradicional', 4, 'a.png'),
('Arroz con Pollo', 'Cocer el arroz en agua con sal. Freir el pollo y añadir cebolla picada. Mezclar todo y dejar cocinar por 10 minutos.', 2, '2024-11-27', 'Media', 'SlowFood', 5, 'a.png'),
('Sopa de Tomate', 'Sofreír la cebolla y ajo, añadir los tomates picados y cocer durante 20 minutos. Triturar y servir.', 3, '2024-11-26', 'Facil', 'Tradicional', 4, 'a.png'),
('Tacos de Carne', 'Freir la carne molida con cebolla. Rellenar tortillas con la carne, lechuga, y queso. Servir con salsa.', 4, '2024-11-25', 'Media', 'Freidora sin aceite', 5, 'a.png'),
('Ensalada de Atún', 'Mezclar atún, pepino, zanahoria rallada y lechuga. Agregar aceite y limón al gusto.', 5, '2024-11-24', 'Facil', 'Tradicional', 4, 'a.png'),
('Pizza Margarita', 'Hornear una base de pizza con tomate triturado y queso. Decorar con hojas de albahaca y servir.', 1, '2024-11-23', 'Facil', 'Tradicional', 5, 'a.png'),
('Spaghetti a la Bolognesa', 'Cocer la pasta y preparar la salsa con carne molida, cebolla y tomate. Mezclar la pasta con la salsa y servir.', 2, '2024-11-22', 'Media', 'SlowFood', 4, 'a.png'),
('Sándwich de Jamón y Queso', 'Colocar el jamón y queso entre dos rebanadas de pan. Tostar hasta dorar.', 3, '2024-11-21', 'Facil', 'Freidora sin aceite', 4, 'a.png'),
('Croquetas de Pollo', 'Mezclar pollo desmenuzado con harina, leche y huevo. Formar las croquetas y freír en aceite caliente.', 4, '2024-11-20', 'Media', 'Tradicional', 5, 'a.png'),
('Burgers Caseras', 'Mezclar carne molida con sal y pimienta. Formar hamburguesas y freír. Servir en pan con lechuga y tomate.', 5, '2024-11-19', 'Media', 'SlowFood', 4, 'a.png'),
('Tortilla Española', 'Freír las patatas y cebolla en aceite. Batir los huevos y añadir a la mezcla. Cocinar a fuego lento.', 1, '2024-11-18', 'Facil', 'Tradicional', 5, 'a.png'),
('Tarta de Manzana', 'Hornear una base de masa con manzanas cortadas y azúcar. Decorar con canela y servir.', 2, '2024-11-17', 'Facil', 'SlowFood', 4, 'a.png'),
('Guacamole', 'Triturar aguacates con cebolla, tomate, limón y sal. Servir con nachos.', 3, '2024-11-16', 'Facil', 'Tradicional', 5, 'a.png'),
('Bocadillo de Jamón', 'Colocar jamón y queso entre dos rebanadas de pan. Servir con una rodaja de tomate.', 4, '2024-11-15', 'Facil', 'Freidora sin aceite', 4, 'a.png'),
('Mousse de Chocolate', 'Fundir el chocolate y mezclar con huevos batidos. Refrigerar hasta que tome consistencia.', 5, '2024-11-14', 'Media', 'SlowFood', 5, 'a.png'),
('Sopa de Lentejas', 'Cocer las lentejas con zanahoria, cebolla y tomate. Servir con un toque de aceite de oliva.', 1, '2024-11-13', 'Media', 'Tradicional', 4, 'a.png'),
('Lasaña de Carne', 'Preparar las capas con carne molida, pasta y salsa bechamel. Hornear hasta dorar.', 2, '2024-11-12', 'Dificil', 'SlowFood', 5, 'a.png'),
('Ensalada Mediterránea', 'Mezclar tomate, pepino, cebolla y aceitunas con queso feta. Aliñar con aceite de oliva y vinagre.', 3, '2024-11-11', 'Facil', 'Tradicional', 5, 'a.png'),
('Tarta de Chocolate', 'Preparar una base de masa y rellenar con una mezcla de chocolate y nata. Hornear y servir fría.', 4, '2024-11-10', 'Media', 'SlowFood', 4, 'a.png'),
('Paella Valenciana', 'Cocer arroz con mariscos, pollo y verduras. Cocinar a fuego lento hasta que el arroz esté en su punto.', 5, '2024-11-09', 'Dificil', 'Tradicional', 5, 'a.png');

-- Insertar relaciones receta-ingrediente
-- Ensalada de Pollo
INSERT INTO receta_ingrediente (id_receta, id_ingrediente, cantidad, medida_unidad) VALUES
(1, 8, 1, 'Pechuga'),
(1, 12, 2, 'Tazas'),
(1, 14, 1, 'Pepino'),
(1, 15, 2, 'Zanahorias'),
(1, 11, 1, 'Taza');

-- Arroz con Pollo
INSERT INTO receta_ingrediente (id_receta, id_ingrediente, cantidad, medida_unidad) VALUES
(2, 8, 1, 'Pechuga'),
(2, 9, 2, 'Tazas'),
(2, 10, 1, 'Cebolla'),
(2, 6, 1, 'Cucharadita'),
(2, 5, 2, 'Cucharadas');

-- Sopa de Tomate
INSERT INTO receta_ingrediente (id_receta, id_ingrediente, cantidad, medida_unidad) VALUES
(3, 1, 4, 'Tomates'),
(3, 2, 1, 'Cebolla'),
(3, 3, 3, 'Dientes'),
(3, 5, 1, 'Cucharada'),
(3, 6, 1, 'Cucharadita');

-- Tacos de Carne
INSERT INTO receta_ingrediente (id_receta, id_ingrediente, cantidad, medida_unidad) VALUES
(4, 10, 1, 'Kg'),
(4, 13, 1, 'Lechuga'),
(4, 16, 1, 'Cucharada'),
(4, 11, 1, 'Taza'),
(4, 5, 1, 'Cucharada');

-- Ensalada de Atún
INSERT INTO receta_ingrediente (id_receta, id_ingrediente, cantidad, medida_unidad) VALUES
(5, 7, 1, 'Lata'),
(5, 14, 1, 'Pepino'),
(5, 15, 1, 'Zanahorias'),
(5, 13, 1, 'Lechuga'),
(5, 6, 1, 'Cucharadita');

-- Pizza Margarita
INSERT INTO receta_ingrediente (id_receta, id_ingrediente, cantidad, medida_unidad) VALUES
(6, 1, 3, 'Tomates'),
(6, 5, 2, 'Cucharadas'),
(6, 11, 1, 'Taza'),
(6, 12, 1, 'Taza'),
(6, 17, 1, 'Cucharadita');

-- Spaghetti a la Bolognesa
INSERT INTO receta_ingrediente (id_receta, id_ingrediente, cantidad, medida_unidad) VALUES
(7, 10, 500, 'Gramos'),
(7, 2, 1, 'Cebolla'),
(7, 5, 2, 'Cucharadas'),
(7, 1, 3, 'Tomates'),
(7, 6, 1, 'Cucharadita');

-- Sándwich de Jamón y Queso
INSERT INTO receta_ingrediente (id_receta, id_ingrediente, cantidad, medida_unidad) VALUES
(8, 16, 1, 'Rebanada'),
(8, 12, 2, 'Rebanadas'),
(8, 7, 1, 'Rebanada'),
(8, 13, 1, 'Rodaja'),
(8, 5, 1, 'Cucharada');

-- Croquetas de Pollo
INSERT INTO receta_ingrediente (id_receta, id_ingrediente, cantidad, medida_unidad) VALUES
(9, 8, 1, 'Pechuga'),
(9, 18, 1, 'Taza'),
(9, 16, 2, 'Huevos'),
(9, 9, 1, 'Taza'),
(9, 5, 2, 'Cucharadas');

-- Burgers Caseras
INSERT INTO receta_ingrediente (id_receta, id_ingrediente, cantidad, medida_unidad) VALUES
(10, 10, 500, 'Gramos'),
(10, 11, 1, 'Pan'),
(10, 15, 1, 'Lechuga'),
(10, 14, 1, 'Rodaja'),
(10, 5, 1, 'Cucharada');

-- Y así sucesivamente para el resto de recetas...

INSERT INTO usuario (nickname, contrasenia, email,usuario_redes,esAdmin,fechaRegistro,foto,bannerFoto, experiencia)
        VALUES ('admin', 'phpMola', 'admin@admin','adminDeAdmins','1',NOW(),'a.jpg' , 'a.png','Avanzado') 
