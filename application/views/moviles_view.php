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
		<section class="has-text-centered has-background-light">
		<br><br>
		<p class="Title is-size-2 has-text-weight-bold"> Móviles</p>
		<div class="columns is-multiline " style="margin-left: 100px !important;margin-right: 100px !important;">
			<?php foreach ($items as $item): ?>
					<article class="column box is-3 "
					style="margin-left: 55px !important;
							margin-right: 30px !important;
							margin-top: 40px !important;">
						<a href="<?=base_url() . 'index.php/oneItem/item/' . $item->id?>">
							<img src="<?=base_url()?>/items/<?php echo $item->variedad . "/" ?><?php echo $item->imagen ?>" />
						</a>
						<p class="is-size-6 has-text-weight-bold"><?php echo $item->nombre ?></p>
						<br>
						<p class="is-size-4 has-text-weight-bold has-text-centered"><?php echo $item->precio . "€" ?></p>
					</article>
			<?php endforeach?>
			<br><br><br>
		</div>
		</section>
	</body>
</html>

