
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
		<title>Iniciar Sesión</title>
	</head>
	<body>
		<!-- Contenido -->
		<section class="hero is-light is-fullheight">
			<div class="hero-body">
				<div class="container">
					<div class="columns is-centered">
						<div class="column is-5">
						<?php
if (!empty(validation_errors())) {
    echo "<div class='notification is-danger has-text-weight-bold is-size-6'>
		<button class='delete'></button>" .
    validation_errors() .
        "</div>";
}
?>
						<?php
if (isset($mensaje)) {
    echo "
	<div class='notification is-success has-text-weight-bold is-size-6'>
		<button class='delete'></button>" .
        $mensaje .
        "</div>";
}
?>
							<p class="has-text-weight-bold is-size-4 has-text-centered has-text-dark">Registrar un producto</p>
							<form
								id="form_admin"
								name="form_admin"
								action="<?php echo base_url() ?>index.php/users/addItem"
								method="post"
								class="box"
							>
								<!-- nombre -->
								<div class="field">
									<label for="" class="label">Nombre</label>
									<div class="control">
										<input
											id="nombre"
											name="nombre"
											type="text"
											class="input has-background-white"
											required
										/>
									</div>
								</div>
								<!-- Descripción -->
								<div class="field">
									<label for="" class="label">Descripción</label>
									<div class="control">
										<input
											id="descripcion"
											name="descripcion"
											type="descripcion"
											class="input has-background-white"
											required
										/>
									</div>
								</div>

								<div class="field">
									<label for="" class="label">Variedad</label>
									<div class="select">
										<select id="variedad" name="variedad">
											<option value="portatil">Portátil</option>
											<option value="sobremesa">Sobremesa</option>
											<option value="movil">Móvil</option>
											<option value="televisor">Televisor</option>
										</select>
									</div>
								</div>
								<!-- Imagen -->
								<div class="field">
									<label for="" class="label">Imagen</label>
									<div class="control ">
										<input id="imagen" name="imagen" type="file" accept=".jpg,.png" class="input has-background-white" required />
									</div>
								</div>
								<!-- Precio -->
								<div class="field">
									<label for="" class="label">Precio</label>
									<div class="control">
										<input id="precio" name="precio" type="text" class="input has-background-white" required />
									</div>
								</div>
								<!-- Stock -->
								<div class="field">
									<label for="" class="label">Stock</label>
									<div class="control">
										<input id="stock" name="stock" type="number" class="input has-background-white" required />
									</div>
								</div>
								<!-- Botón -->
								<div class="field">
									<input
										type="submit"
										name="submit_admin"
										class="button is-success has-text-weight-bold" value="Registrar producto"
									>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
	</body>
</html>
