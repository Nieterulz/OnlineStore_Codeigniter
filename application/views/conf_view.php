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
		<title>Home</title>
	</head>
	<body>
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
							<p
								class="has-text-weight-bold is-size-4 has-text-centered has-text-dark"
							>
								Configuración
							</p>

							<!-- Formulario -->
							<form
								id="form_user"
								name="form_user"
								action="<?php echo base_url() ?>index.php/users/changeUser"
								method="post"
								class="box"
							>
								<!-- Usuario -->
								<label for="usuario" class="label">Usuario</label>
								<div class="field has-addons">
									<div class="control has-icons-left is-expanded">
										<input
											id="usuario"
											name="usuario"
											type="text"
											class="input has-background-white"
											value="<?php echo $_SESSION['usuario']; ?>"
										/>
										<span class="icon is-small is-left">
											<i class="fa fa-user"></i>
										</span>
									</div>
									<div class="control">
										<input
											type="submit"
											name="submit_user"
											class="button is-success">
										</input>
									</div>
								</div>
							</form>

							<form
								id="form_email"
								name="form_email"
								action="<?php echo base_url() ?>index.php/users/changeEmail"
								method="post"
								class="box"
							>
								<!-- Email -->
								<label for="email" class="label">E-mail</label>
								<div class="field has-addons">
									<div class="control has-icons-left is-expanded">
										<input
											id="email"
											name="email"
											type="email"
											class="input has-background-white"
											value="<?php echo $_SESSION['correo']; ?>"
										/>
										<span class="icon is-small is-left">
											<i class="fa fa-envelope"></i>
										</span>
									</div>
									<div class="control">
										<input
											type="submit"
											name="submit_email"
											class="button is-success">
										</input>
									</div>
								</div>
							</form>
							<form
								id="form_passwd"
								name="form_passwd"
								action="<?php echo base_url() ?>index.php/users/changePasswd"
								method="post"
								class="box"
							>
								<!-- Contraseña -->
								<label for="passwd" class="label">Nueva Contraseña</label>
								<div class="field has-addons">
									<div class="control has-icons-left is-expanded">
										<input
											id="passwd"
											name="passwd"
											type="password"
											class="input has-background-white"
										/>
										<span class="icon is-small is-left">
											<i class="fa fa-lock"></i>
										</span>
									</div>
									<div class="control">
										<input
											type="submit"
											name="submit_passwd"
											class="button is-success">
										</input>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
	</body>
</html>
