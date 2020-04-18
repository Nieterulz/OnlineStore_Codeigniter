
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
		<title>Iniciar Sesión</title>
	</head>
	<body>
		<!-- Contenido -->
		<section class="hero is-light is-fullheight">
			<div class="hero-body">
				<div class="container">
					<div class="columns is-centered">
						<div class="column is-5">
							<p class="has-text-weight-bold is-size-4 has-text-centered has-text-dark">Registrarse</p>
							<!-- Formulario -->
							<form action="<?base_url() . '/index.php/register/validar/'?>" class="box">
								<!-- Usuario -->
								<div class="field">
									<label for="" class="label">Usuario</label>
									<div class="control has-icons-left">
										<input
											id="usuario"
											type="text"
											class="input has-background-white"
											required
										/>
										<span class="icon is-small is-left">
											<i class="fa fa-user"></i>
										</span>
									</div>
								</div>
								<!-- E-mail -->
								<div class="field">
									<label for="" class="label">E-mail</label>
									<div class="control has-icons-left">
										<input
											id="email"
											type="email"
											class="input has-background-white"
											required
										/>
										<span class="icon is-small is-left">
											<i class="fa fa-envelope"></i>
										</span>
									</div>
								</div>
								<!-- Contraseña -->
								<div class="field">
									<label for="" class="label">Contraseña</label>
									<div class="control has-icons-left">
										<input id="contrasena" type="password" class="input has-background-white" required />
										<span class="icon is-small is-left">
											<i class="fa fa-lock"></i>
										</span>
									</div>
								</div>
								<!-- Contraseña2 -->
								<div class="field">
									<label for="" class="label">Repetir contraseña</label>
									<div class="control has-icons-left">
										<input id="contrasenaR" type="password" class="input has-background-white" required />
										<span class="icon is-small is-left">
											<i class="fa fa-lock"></i>
										</span>
									</div>
								</div>
								<!-- Botón -->
								<div class="field">
									<button class="button is-success">
										<strong>Registrarse</strong>
									</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
	</body>
</html>
