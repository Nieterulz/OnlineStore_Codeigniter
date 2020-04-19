<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<script
			defer
			src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"
		></script>
		<script src="<?php base_url()?>/store/js/scripts.js"></script>
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
			<div class="columns">
				<article
					class="column box is-4 is-offset-1"
					style="margin-top: 100px; margin-bottom: 100px;"
				>
					<img src="<?=base_url()?>/items/<?php echo $item[0]['variedad'] . "/" ?><?php echo $item[0]['imagen'] ?>"
					/>
					<p class="is-size-6 has-text-weight-bold">
						<?php echo $item[0]['nombre'] ?>
					</p>
					<br />
					<p id="stock" class="is-size-7 has-text-weight-bold">
						Quedan <?php echo $item[0]['stock'] ?> en stock
					</p>
					<br />
					<p class="is-size-4 has-text-weight-bold has-text-centered">
						<?php echo $item[0]['precio'] . "€" ?>
					</p>
				</article>
				<div class="column is-1"></div>
				<div
					class="column is-5 has-text-centered"
					style="margin-top: 100px; margin-bottom: 100px;"
				>
					<p class="is-size-5 has-text-weight-bold has-text-centered">
						<?php echo $item[0]['descripcion'] ?>
					</p>
					<br /><br />
					<div class="columns is-centered">
						<div class="field column is-3">
							<label for="quantity" class="is-size-5 has-text-weight-bold has-text-centered">Cantidad</label>
							<input
								type="number"
								id="quantity"
								min="1"
								max="10"
								value="1"
								class="input"
								onchange="changePrice(<?php echo $item[0]['precio'] ?>)"
							/>
						</div>
						<p
							id="currentPrice"
							class="column is-3 is-size-5 has-text-weight-bold has-text-centered"
							style="padding-top: 43px;"
						>
							<?php echo $item[0]['precio'] . "€" ?>
						</p>
					</div>
					<button class="button is-success">
						<strong> Añadir al carrito </strong>
					</button>
				</div>
			</div>
		</section>
	</body>
</html>
