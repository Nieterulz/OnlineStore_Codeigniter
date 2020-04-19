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
		<title>Home</title>
	</head>
	<body class="has-navbar-fixed-top">
		<!-- Header -->
		<header>
			<nav
				class="navbar has-background-dark is-fixed-top"
				role="navigation"
				aria-label="main navigation"
			>
				<div class="navbar-brand">
					<a class="navbar-item" href="<?=base_url()?>">
						<img
							src="https://bulma.io/images/bulma-logo.png"
							width="112"
							height="28"
						/>
					</a>
					<a
						role="button"
						class="navbar-burger burger"
						aria-label="menu"
						aria-expanded="false"
						data-target="navbarBasicExample"
					>
						<span aria-hidden="true"></span>
						<span aria-hidden="true"></span>
						<span aria-hidden="true"></span>
					</a>
				</div>

				<div id="navbarBasicExample" class="navbar-menu">
					<div class="navbar-start">
						<a
							href="<?=base_url()?>"
							class="navbar-item has-text-white has-background-dark">
							<strong>Inicio</strong>
						</a>

						<div class="navbar-item"></div>
						<div class="navbar-item"></div>
						<div class="navbar-item"></div>
						<div class="navbar-item"></div>
						<div class="navbar-item"></div>
						<div class="navbar-item"></div>
						<div class="navbar-item"></div>

						<input
							id="search"
							class="navbar-item input is-rounded"
							type="text"
							style="margin-top: 7px;"
							placeholder="Buscar ..."
						/>
					</div>

					<div class="navbar-end">
<?php
if (isset($_SESSION['usuario'])) {
    echo "<div class='navbar-item'>
	<a href=" . base_url() . "index.php/shoppingCart/>
		<icon
			class='fa fa-shopping-cart icon has-text-light is-size-4'
		></icon>
	</a>
	</div>";
}
?>
						<div class="navbar-item">
							<div class="buttons">

<?php
if (!isset($_SESSION['usuario'])) {
    echo "<a
		href=" . base_url() . "index.php/users/register/
		class='button is-success'
	>
		<strong>Registrar</strong>
	</a>";
}

if (!isset($_SESSION['usuario'])) {
    echo "<a
		href=" . base_url() . "index.php/users/login/
		class='button is-light has-text-weight-bold'
	>
		Iniciar Sesión
	</a>";
}

if (isset($_SESSION['usuario'])) {
    echo "
	<div class='dropdown is-hoverable is-right has-text-centered'>
		<div class='dropdown-trigger'>
			<a
				href='#'
				class='button is-success has-text-weight-bold has-icon-right has-text-dark'
				aria-controls='dropdown-menu'
			>" .
    $_SESSION['usuario'] . "<hr><hr>" .
    "<icon
					class='fa fa-user icon is-small has-text-dark'
				></icon>
			</a>
		</div>
		<div class='dropdown-menu' id='dropdown-menu' role='menu'>
			<div class='dropdown-content'>
				<div class='dropdown-item'>
					<a
						href=" . base_url() . "index.php/users/config/
						class='has-text-weight-bold has-text-dark'
					>Configuración</a>
						<icon class='fa fa-cog icon is-small has-text-dark'
					></icon>
				</div>
				<hr class='dropdown-divider'>
				<div class='dropdown-item has-icon-right'>
					<a
						href=" . base_url() . "index.php/items/close_sesion/
						class='has-text-weight-bold has-text-dark'>Cerrar sesión</a>
					<icon class='fa fa-sign-out-alt icon is-small has-text-dark'
					></icon>
				</div>
			</div>
		</div>
	</div>
	";
}
?>

							</div>
						</div>
					</div>
				</div>
			</nav>
		</header>
	</body>
</html>