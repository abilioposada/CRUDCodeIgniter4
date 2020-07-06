<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Aplicación Librería</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous" />
	</head>
	<body>
		<h1>Aplicación Librería</h1>

		<nav>
			<ul>
				<li>
					<a href="<?= base_url( 'autores' ) ?>">Autores</a>
					<ul>
						<li>
							<a href="<?= base_url( 'autores' ) ?>">Listar</a>
						</li>
						<li>
							<a href="<?= base_url( 'autores/agregarEditar' ) ?>">Agregar</a>
						</li>
					</ul>
				</li>

				<li>
					<a href="<?= base_url( 'libros' ) ?>">Libros</a>
					<ul>
						<li>
							<a href="<?= base_url( 'libros' ) ?>">Listar</a>
						</li>
						<li>
							<a href="<?= base_url( 'libros/agregarEditar' ) ?>">Agregar</a>
						</li>
					</ul>
				</li>
			</ul>
		</nav>

		<?= $this->renderSection( 'contenido' ) ?>

		<footer>
			<p>Todos los derechos reservados &reg; <?= date( 'Y' ) ?></p>
		</footer>

		<?php if ( session()->getFlashData( 'mensaje' ) ) : ?>
			<script>alert( "<?= session()->getFlashData( 'mensaje' ) ?>" );</script>
		<?php endif ?>
	</body>
</html>