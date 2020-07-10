<?= $this->extend( 'plantillas/general' ) ?>

<?= $this->section( 'contenido' ) ?>

	<!-- Encabezado -->
	<header>

		<h2>Autores</h2>

		<!-- Subtitulo que se basa si el identificador es válido -->
		<h3><?= $autor->id != null ? 'Editando' : 'Agregando' ?></h3>

	</header>
	<!-- /Encabezado -->

	<a href="<?= base_url( 'autores' ) ?>">Regresar al listado</a>

	<!-- Formulario -->
	<form action="<?= base_url( 'autores/guardar' ) ?>" method="post">

		<!-- Identificador -->
		<input type="hidden" name="id" value="<?= $autor->id ?>" />

		<!-- Nombre -->
		<input placeholder="Nombre" name="nombre" value="<?= $autor->nombre ?>" />

		<!-- Nacionalidad -->
		<input placeholder="Nacionalidad" name="nacionalidad" value="<?= $autor->nacionalidad ?>" />

		<!-- Conjunto de campos -->
		<fieldset>

			<!-- Leyenda conjunto -->
			<legend>Género</legend>
			
			<!-- Masculino -->
			<input type="radio" name="genero" id="masculino" value="M" <?= $autor->genero == 'M' ? 'checked' : '' ?> />
			<label for="masculino">Masculino</label>

			<!-- Femenino -->
			<input type="radio" name="genero" id="femenino" value="F" <?= $autor->genero == 'F' ? 'checked' : '' ?> />
			<label for="femenino">Femenino</label>

			<!-- Otro -->
			<input type="radio" name="genero" id="otro" value="O" <?= $autor->genero == 'O' ? 'checked' : '' ?> />
			<label for="otro">Otro</label>

		</fieldset>
		<!-- /Conjunto de campos -->
		
		<br />

		<input type="submit" value="Guardar" />

	</form>
	<!-- /Formulario -->

	<!-- Mensajes de errores -->
	<?php if ( session()->getFlashdata( 'errors' ) ) : ?>

		<ul>

			<!-- Errores -->
			<?php foreach ( session()->getFlashdata( 'errors' ) as $field => $error ) : ?>

				<!-- Campo con error -->
				<li><?= ucFirst( $field ) ?> <?= $error ?></li>

			<?php endforeach ?>
			<!-- /Errores -->

		</ul>

	<?php endif ?>
	<!-- /Mensajes de errores -->

<?= $this->endSection() ?>