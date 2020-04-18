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
						<div class="navbar-item">
							<a href="<?=base_url()?>index.php/shoppingCart/">
								<icon
									class="fa fa-shopping-cart icon has-text-light is-size-4"
								></icon>
							</a>
						</div>
						<div class="navbar-item">
							<div class="buttons">
								<a
									href="<?=base_url() . 'index.php/register/'?>"
									class="button is-success">
									<strong>Registrar</strong>
								</a>
								<a
									href="<?=base_url()?>index.php/login/"
									class="button is-light has-text-weight-bold"
								>
									Iniciar Sesión
								</a>
							</div>
						</div>
					</div>
				</div>
			</nav>
		</header>
	</body>
</html>