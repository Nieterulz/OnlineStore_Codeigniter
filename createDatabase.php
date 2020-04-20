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
		vendido BOOLEAN NOT NULL,
		FOREIGN KEY (id_usuario) REFERENCES usuarios(id)
	);
	INSERT INTO `carritos` (`id`, `id_usuario`, `vendido`) VALUES
		(1, 1, false);";
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
			NULL,
			'portatil',
			'HP Pavilion Gaming 15-EC0007NS AMD Ryzen 5 3550H/8GB/256GB SSD/GTX1050/15.6 pulgadas',
			'No sacrifiques nada gracias al potente y fino portátil HP Pavilion Gaming de 15,6 pulgadas (39,6 cm). Experimenta gráficos de alta calidad y potencia de procesamiento para juegos y realización de múltiples tareas, además de una refrigeración térmica mejorada para un rendimiento y una estabilidad generales. Sumérgete en el juego con una pantalla con microborde y audio optimizado. El equilibrio perfecto entre trabajar y jugar, para que puedas hacerlo todo.',
			'1.png',
			'549',
			10
		),
		(
			NULL,
			'portatil',
			'Toshiba Satellite Pro R40-D-111 Intel Celeron 3865U/4GB/128GB SSD/14 pulgadas',
			'Gracias a la funcionalidad completa y a la fiable arquitectura Intel® Core? que incluye, el Satellite Pro R40-D de 35,6 cm (14 pulgadas) es la forma ideal de acercarte a la  informática empresarial. Listo para usarse nada más sacarlo de la caja, este portátil está muy bien equipado para los profesionales que necesitan un modelo de entrada de gama seguro, o para estudiantes que buscan un compañero de estudios fiable. Con una carcasa muy sólida y un teclado resistente de tamaño A4, el Satellite Pro R40-D ofrece durabilidad, se use donde se use. Su amplio abanico de opciones de conectividad significa que tanto los profesionales como los estudiantes podrán conectarse desde prácticamente cualquier lugar.',
			'2.jpg',
			'259',
			10
		),
		(
			NULL,
			'portatil',
			'Lenovo Ideapad S145-15AST AMD A9-9425/8GB/512GB SSD/15.6 pulgadas',
			'Diseñado para un rendimiento duradero, el IdeaPad S145 ofrece un potente procesador AMD con un diseño elegante y ligero. Perfecto para realizar tus tareas informáticas diarias desde cualquier parte, este portátil duradero de 39,62 cm (15,6 pulgadas) ofrece un magnífico sonido con una variedad de opciones de almacenamiento seguras y rápidas.',
			'3.jpg',
			'429.99',
			10
		),
		(
			NULL,
			'portatil',
			'HP 255 G7 AMD A4-9125/8GB/256GB SSD/15.6 pulgadas',
			'Te presentamos el 255 G7 de HP, un portátil con procesador AMD A4, 8GB de RAM, 256GB SSD de disco duro y pantalla de 15.6 pulgadas.',
			'4.jpg',
			'319.99',
			10
		),
		(
			NULL,
			'movil',
			'Xiaomi Redmi Note 8T 4/64GB Azul Estelar Libre',
			'Una estrella con 48 MP y 4 cámaras, así es el nuevo Smartphone de Xiaomi, el Redmi Note 8T. Redmi Note 8T presenta algunas de las especificaciones más altas disponibles en la fotografía de teléfonos inteligentes. Por primera vez en la serie Redmi Note, hemos implementado una cámara cuádruple con un sensor primario de 48MP de ultra alta resolución. Hemos agregado un objetivo macro de gran angular (antes de la corrección de distorsión) de 120º y enfoque automático de 2 cm a la configuración de la cámara trasera, asegurando que su cámara esté lista para cualquier situación.',
			'1.jpg',
			'169',
			10
		),
		(
			NULL,
			'movil',
			'Samsung Galaxy M20 4/64GB Ocean Blue Libre',
			'La nueva gama M de Samsung ya está aquí. El Samsung Galaxy M20 puede realizar múltiples tareas con juegos, vídeos y redes sociales sin sudar.
			Galaxy M20 viene con una impresionante pantalla infinita V de 16 cm (6,3 pulgadas). Su pantalla FHD + de borde a borde casi sin biselado le brinda una experiencia de visualización inmersiva. Obtenga tomas perfectas con poca luz con su cámara de fotos y tomas de gran retrato con función de enfoque en vivo.
			Además, Galaxy M20 cuenta con una enorme batería de 5000 mAh, una de las más amplias del mercado.',
			'2.jpg',
			'189',
			10
		),
		(
			NULL,
			'movil',
			'Xiaomi Redmi Note 8T 4/64GB Gris Medianoche Libre',
			'Una estrella con 48 MP y 4 cámaras, así es el nuevo Smartphone de Xiaomi, el Redmi Note 8T. Redmi Note 8T presenta algunas de las especificaciones más altas disponibles en la fotografía de teléfonos inteligentes. Por primera vez en la serie Redmi Note, hemos implementado una cámara cuádruple con un sensor primario de 48MP de ultra alta resolución. Hemos agregado un objetivo macro de gran angular (antes de la corrección de distorsión) de 120º y enfoque automático de 2 cm a la configuración de la cámara trasera, asegurando que su cámara esté lista para cualquier situación.',
			'3.jpg',
			'169',
			10
		),
		(
			NULL,
			'movil',
			'Realme X2 Pro 8/128GB Lunar White Libre',
			'Disfruta de la cámara con la cantidad de pixels más alta de realme con el nuevo Realme X2 Pro. El fotógrafo de National Geographic, Aaron Huey, ha trabajado con realme para mejorar la calidad de la cámara para conseguir resultados impecables en lugares como la playa, montaña, bosques y ciudades. Después de muchas pruebas y trabajo, la cámara de Realme X2 Pro otorga un rendimiento de color excepcional en escenarios de fotografía urbana.',
			'4.jpg',
			'436.08',
			10
		),
		(
			NULL,
			'sobremesa',
			'PcCom Bronze AMD Ryzen 3 2200G/8GB/1TB+240SSD',
			'Entra en el mundo Gaming del PC con este equipo de relación calidad/precio inigualable. Con este equipo disfrutarás de los juegos Online de más éxito del momento como LOL, Fortnite, Rocket League, CSGO, Overwatch...con un rendimiento excelente gracias a su procesador AMD Ryzen 3 2200G con gráficos Radeon? Vega 8 Graphics de 8 núcleos, sus 8GB de RAM DDR4 y su rápido SSD de 240GB',
			'1.jpg',
			'372.33',
			10
		),
		(
			NULL,
			'sobremesa',
			'PcCom Basic Gamer Intel i5-9400F/8GB/1TB+480GB SSD/GTX1650',
			'Pensado para un uso general en el hogar o en la oficina, el PcCom Basic Gamer se presenta como un equipo equilibrado en el que su procesador i5-9400F, sus 8GB de RAM DDR4, la Tarjeta gráfica dedicada GTX 1650, el rápido disco SSD de 480Gb y el generoso disco duro de 1TB permiten trabajar de forma holgada en muy diferentes tareas, lo que lo hace ideal para entornos domésticos o de oficina.',
			'2.jpg',
			'607.09',
			10
		),
		(
			NULL,
			'sobremesa',
			'PcCom Bronze AMD Ryzen 5 1600AF/16GB/1TB+240GB SSD/GTX 1650',
			'El PcCom Bronze Essential está equipado con el procesador AMD Ryzen 5, 16GB de RAM, 240GB SSD y gráficos impresionantes gracias a su Nvidia GTX1650 que te ofrecerá toda la potencia necesaria para disfrutar de los últimos juegos Online de más éxito del momento como Fortnite, LOL, Dota2, Rocket League, CSGO...con una relación calidad/precio inigualable.',
			'3.jpg',
			'644.31',
			10
		),
		(
			NULL,
			'sobremesa',
			'PcCom Silver AMD Ryzen 5 1600AF/16GB/480GB SSD+1TB/GTX1660',
			'Entra en la nueva generación de procesadores AMD Ryzen 5 con el nuevo PCCOM Silver. Su procesador AMD Ryzen 5 1600 AF de seis núcleos, 16 GB de RAM DDR4 y su potente tarjeta gráfica GTX 1660 te ofrecerán toda la potencia necesaria para disfrutar de los últimos juegos del mercado con una tasa de frames superior a 60fps y a resolución 1080p.',
			'4.jpg',
			'775.28',
			10
		),
		(
			NULL,
			'televisor',
			'Xiaomi Mi TV 4A 32 pulgadas LED HD',
			'Smart TV para todos con los esperados televisores Xiaomi Mi TV 4A. Disfruta de todo el contenido que quieras en este excelente televisor con potente hardware, mando con control por voz y una amplia conectividad.',
			'1.jpg',
			'179',
			10
		),
		(
			NULL,
			'televisor',
			'LG 43UM7100PLB 43 pulgadas LED UltraHD 4K',
			'El primer Smart TV con Inteligencia Artificial. LG Smart TV WebOS 4.5 es el más fácil, más rápido y más seguro. Con sistema de Inteligencia Artificial LG ThinQ y con Asistente de Google y Alexa integrados. Podrás convertir tu TV en el cerebro de tu hogar inteligente sin necesidad de hubs externos.',
			'2.jpg',
			'309.99',
			10
		),
		(
			NULL,
			'televisor',
			'Xiaomi Mi TV 4S 55 pulgadas LED UltraHD 4K',
			'Smart TV para todos con los esperados televisores Xiaomi Mi TV 4S. Disfruta de todo el contenido que quieras en este excelente televisor con potente hardware, Motion Smooth y cuerpo de metal.',
			'3.jpg',
			'448.99',
			10
		),
		(
			NULL,
			'televisor',
			'Samsung UE55RU7025KXXC 55 pulgadas LED Ultra HD 4K',
			'Disfruta de imágenes nítidas y brillantes con el televisor 4K UHD Samsung UE55RU7025KXXC, con una resolución cuatro veces superior a la del Full HD. Prepárate para percibir hasta el más mínimo detalle en todas tus escenas.',
			'4.jpg',
			'399',
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