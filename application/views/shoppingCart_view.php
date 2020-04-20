<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<script
			defer
			src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"
		></script>
		<script src="<?php echo base_url(); ?>js/scripts.js"></script>
		<link
			rel="stylesheet"
			href="https://cdn.jsdelivr.net/npm/bulma@0.8.2/css/bulma.min.css"
		/>
		<script
			type="module"
			src="https://unpkg.com/ionicons@5.0.0/dist/ionicons/ionicons.esm.js"
		></script>
		<script
			nomodule=""
			src="https://unpkg.com/ionicons@5.0.0/dist/ionicons/ionicons.js"
		></script>
	</head>
	<body>
		<section class=" hero has-background-light">
		<?php
if (isset($mensaje)) {
    echo "
	<div class='notification is-success has-text-weight-bold is-size-6'>
		<button class='delete'></button>" .
        $mensaje .
        "</div>";
}
?>
			<p class="title has-text-centered has-text-weight-bold">Carrito de compra</p>
			<div class="columns is-multiline " style="margin-left: 100px !important;margin-right: 100px !important;">
				<?php
$total = 0;
if ($items != "") {
    foreach ($items as $item):
        $total = $total + ($item->precio * $item->cantidad);
        echo "<article class='column box is-3 '
		style='margin-left: 55px !important;
				margin-right: 30px !important;
				margin-top: 40px !important;'>
			<a
				href=" . base_url() . "index.php/shoppingCart/deleteItem/$item->id_producto
				class='delete column is-1 is-offset-11'></a>
			<a href=" . base_url() . "index.php/oneItem/item/" . $item->id_producto . ">
				<img src=" . base_url() . "/items/" . $item->variedad . "/" . $item->imagen . " />
			</a>
			<p class='is-size-6 has-text-weight-bold'>" . $item->nombre . "</p>
			<br>
			<p class='is-size-6 has-text-weight-bold has-text-centered'>
				Cantidad:" . $item->cantidad . "
			</p>
			<p class='is-size-4 has-text-weight-bold has-text-centered'>" .
            ($item->precio * $item->cantidad) . "€
			</p>
		</article>";
    endforeach;
}

?>
				<br><br><br>
			</div>
			<?php
if ($total != 0) {
    echo "<p class='title has-text-centered has-text-weight-bold'>Precio total: " . $total . "€<p>";
    echo "<div class='field has-text-centered' >
	<a
		href=" . base_url() . "index.php/shoppingCart/realizarPedido
		class='button is-centered is-success has-text-weight-bold'
	>
	Realizar pedidos
</a> <br><br><br>";
} else {
    echo "<p
						style='padding-top: 180px;'
						class=' title is-size-2 column is-4 is-offset-4'> EL carrito está vacío</p>";
    echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
}
?>
		</section>
	</body>
</html>
