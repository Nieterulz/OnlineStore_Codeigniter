<html LANG="es">
<meta charset="UTF-8mb4">
<head>
   <title>Creacion BD</title>
</head>


<body>

<h1>Creando Base de Datos 'store'</h1>

<?php
$user = "root";
$password = "";
$database = "store";
mb_internal_encoding('UTF-8');
try {

    $base = new PDO("mysql:host=127.0.0.1;dbname=$database;charset=utf8", $user, $password);
    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "conexion ok.";

    $salt = strtr(base64_encode(mcrypt_create_iv(16, MCRYPT_DEV_URANDOM)), '+', '.');
    $contrasena = crypt('antonio', $salt);
    $query = "
	DROP TABLE IF EXISTS usuarios;
	CREATE TABLE usuarios(
		id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
		usuario varchar(100) NOT NULL,
		contrasena varchar(200) NOT NULL,
		correo text NOT NULL,
		rol varchar(15) NOT NULL
	);
	INSERT INTO usuarios (`id`, `usuario`, `contrasena`, `correo`, `rol`) VALUES
		(1, 'antonio', '$contrasena', 'ajsamu@hotmail.com', 'administrador');";
    $base->query($query);

    $query = "
	DROP TABLE IF EXISTS carritos;
	CREATE TABLE carritos(
		id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
		id_usuario int NOT NULL,
		FOREIGN KEY (id_usuario) REFERENCES usuarios(id)
	);
	INSERT INTO `carritos` (`id`, `id_usuario`) VALUES
		(1, 1);";
    $base->query($query);

    $query = "
	DROP TABLE IF EXISTS pedidos;
	CREATE TABLE pedidos(
		id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
		id_carrito int NOT NULL,
		id_producto int NOT NULL,
		cantidad int NOT NULL,
		FOREIGN KEY (id_carrito) REFERENCES carritos(id),
		FOREIGN KEY (id_producto) REFERENCES productos(id)
	);
	INSERT INTO `pedidos` (`id`, `id_carrito`, `id_producto`, `cantidad`) VALUES
		(1, 1, 1, 1),
		(2, 1, 2, 1),
		(3, 1, 3, 1);";
    $base->query($query);

    $query = "
	DROP TABLE IF EXISTS productos;
	CREATE TABLE productos(
		id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
		variedad varchar(30) NOT NULL,
		nombre text NOT NULL,
		descripcion text NOT NULL COLLATE utf8_spanish_ci ,
		imagen varchar(200) NOT NULL,
		precio varchar(10) NOT NULL,
		stock int NOT NULL
	) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
	INSERT INTO `productos` (`id`, `variedad`, `nombre`, `descripcion`, `imagen`, `precio`, `stock`) VALUES
		(
			1,
			'portatil',
			'HP Pavilion Gaming 15-EC0007NS AMD Ryzen 5 3550H/8GB/256GB SSD/GTX1050/15.6 pulgadas',
			'No sacrifiques nada gracias al potente y fino portátil HP Pavilion Gaming de 15,6 pulgadas (39,6 cm). Experimenta gráficos de alta calidad y potencia de procesamiento para juegos y realización de múltiples tareas, además de una refrigeración térmica mejorada para un rendimiento y una estabilidad generales. Sumérgete en el juego con una pantalla con microborde y audio optimizado. El equilibrio perfecto entre trabajar y jugar, para que puedas hacerlo todo.',
			'1.png',
			'549',
			10
		),
		(
			2,
			'portatil',
			'Toshiba Satellite Pro R40-D-111 Intel Celeron 3865U/4GB/128GB SSD/14 pulgadas',
			'Gracias a la funcionalidad completa y a la fiable arquitectura Intel® Core? que incluye, el Satellite Pro R40-D de 35,6 cm (14 pulgadas) es la forma ideal de acercarte a la  informática empresarial. Listo para usarse nada más sacarlo de la caja, este portátil está muy bien equipado para los profesionales que necesitan un modelo de entrada de gama seguro, o para estudiantes que buscan un compañero de estudios fiable. Con una carcasa muy sólida y un teclado resistente de tamaño A4, el Satellite Pro R40-D ofrece durabilidad, se use donde se use. Su amplio abanico de opciones de conectividad significa que tanto los profesionales como los estudiantes podrán conectarse desde prácticamente cualquier lugar.',
			'2.jpg',
			'259',
			10
		),
		(
			3,
			'portatil',
			'Lenovo Ideapad S145-15AST AMD A9-9425/8GB/512GB SSD/15.6 pulgadas',
			'Diseñado para un rendimiento duradero, el IdeaPad S145 ofrece un potente procesador AMD con un diseño elegante y ligero. Perfecto para realizar tus tareas informáticas diarias desde cualquier parte, este portátil duradero de 39,62 cm (15,6 pulgadas) ofrece un magnífico sonido con una variedad de opciones de almacenamiento seguras y rápidas.',
			'3.jpg',
			'429.99',
			10
		),
		(
			4,
			'portatil',
			'HP 255 G7 AMD A4-9125/8GB/256GB SSD/15.6 pulgadas',
			'Te presentamos el 255 G7 de HP, un portátil con procesador AMD A4, 8GB de RAM, 256GB SSD de disco duro y pantalla de 15.6 pulgadas.',
			'4.jpg',
			'319.99',
			10
		);";
    $base->query($query);
} catch (Exception $e) {
    die('Error: ' . $e->GetMessage());
} finally {
    $base = null; //cierra la conexion
}

?>

</body>
</html>