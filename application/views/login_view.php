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
if (isset($mensaje)) {
    echo "
	<div class='notification is-danger has-text-weight-bold is-size-6'>
		<button class='delete'></button>" .
        $mensaje .
        "</div>";
}
?>
							<p class="has-text-weight-bold is-size-4 has-text-centered has-text-dark">Iniciar Sesión </p>

							<!-- Formulario -->
							<form
								id="form_log"
								name="form_log"
								action="<?php echo base_url() ?>index.php/users/verify_sesion/"
								method="post"
								class="box"
							>
								<!-- Usuario -->
								<div class="field">
									<label for="usuario" class="label">Usuario</label>
									<div class="control has-icons-left ">
										<input
											id="usuario"
											name="usuario"
											type="text"
											class="input has-background-white"
											required
										/>
										<span class="icon is-small is-left">
											<i class="fa fa-user"></i>
										</span>
									</div>
								</div>
								<!-- Contraseña -->
								<div class="field">
									<label for="contrasena" class="label">Contraseña</label>
									<div class="control has-icons-left">
										<input
											id="contrasena"
											name="contrasena"
											type="password"
											class="input has-background-white"
											required />
										<span class="icon is-small is-left">
											<i class="fa fa-lock"></i>
										</span>
									</div>
								</div>
								<!-- Botón -->
								<div class="field">
									<input
										type="submit"
										name="submit_log"
										class="button is-success has-text-weight-bold" value="Iniciar Sesión"
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
