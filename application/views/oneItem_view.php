
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<script
			defer
			src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"
		></script>
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
		<section class="has-background-light">
		<div class="columns" >
			<article
				class="column box is-4 is-offset-1"
				style="margin-top: 100px; margin-bottom: 100px;"
			>
				<img src="<?=base_url()?>/items/<?php echo $item[0]['variedad'] . "/" ?><?php echo $item[0]['imagen'] ?>" />
				<p class="is-size-6 has-text-weight-bold"><?php echo $item[0]['nombre'] ?></p>
				<br>
				<p class="is-size-4 has-text-weight-bold has-text-centered"><?php echo $item[0]['precio'] . "€" ?></p>
			</article>
			<div class="column is-1"></div>
			<div
				class="column is-5 has-text-centered"
				style="margin-top: 100px; margin-bottom: 100px;"
			>
				<p class="is-size-5 has-text-weight-bold has-text-centered"><?php echo $item[0]['descripcion'] ?></p>
				<br><br>
				<button class="button is-success">
					<strong> Añadir al carrito </strong>
				</button>
			</div>

		</div>
		</section>
	</body>
</html>
