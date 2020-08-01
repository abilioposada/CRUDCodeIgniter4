<?= $this->extend( 'plantillas/general' ) ?>

<?= $this->section( 'contenido' ) ?>

	<!-- Encabezado -->
	<header>

		<h2><?= lang( 'App.autor.titulo', [ SINGULAR ] ) ?></h2>

		<!-- Subtitulo que se basa si el identificador es válido -->
		<h3>

			<?= lang( 'App.general.accion.' . ( $autor->id != null ? 'editando' : 'agregando' ) ) ?>

		</h3>

	</header>
	<!-- /Encabezado -->

	<a href="<?= base_url( '/autores' ) ?>">

		<?= lang( 'App.general.accion.retornar' ) ?>
		
	</a>

	<!-- Formulario -->
	<form action="<?= base_url( '/autores/guardar' ) ?>" method="post">

		<!-- Identificador -->
		<input type="hidden" name="id" value="<?= $autor->id ?>" />

		<!-- Nombre -->
		<input name="nombre" placeholder="<?= lang( 'App.autor.nombre' ) ?>" value="<?= $autor->nombre ?>" />

		<!-- Nacionalidad -->
		<input name="nacionalidad" placeholder="<?= lang( 'App.autor.nacionalidad' ) ?>" value="<?= $autor->nacionalidad ?>" />

		<!-- Conjunto de campos -->
		<fieldset>

			<!-- Leyenda conjunto -->
			<legend><?= lang( 'App.autor.genero.nombre' ) ?></legend>
			
			<!-- Masculino -->
			<input type="radio" name="genero" id="masculino" value="M" <?= $autor->genero == 'M' ? 'checked' : '' ?> />
			<label for="masculino"><?= lang( 'App.autor.genero.masculino' ) ?></label>

			<!-- Femenino -->
			<input type="radio" name="genero" id="femenino" value="F" <?= $autor->genero == 'F' ? 'checked' : '' ?> />
			<label for="femenino"><?= lang( 'App.autor.genero.femenino' ) ?></label>

			<!-- Otro -->
			<input type="radio" name="genero" id="otro" value="O" <?= $autor->genero == 'O' ? 'checked' : '' ?> />
			<label for="otro"><?= lang( 'App.autor.genero.otro' ) ?></label>

		</fieldset>
		<!-- /Conjunto de campos -->
		
		<br />

		<input type="submit" value="<?= lang( 'App.general.accion.guardar' ) ?>" />

	</form>
	<!-- /Formulario -->

	<!-- Mensajes de errores -->
	<?php if ( session()->getFlashdata( 'errors' ) ) : ?>

		<ul>

			<!-- Errores -->
			<?php foreach ( session()->getFlashdata( 'errors' ) as $campo => $error ) : ?>

				<!-- Campo con error -->
				<li><?= ucFirst( $campo ) ?> <?= $error ?></li>

			<?php endforeach ?>
			<!-- /Errores -->

		</ul>

	<?php endif ?>
	<!-- /Mensajes de errores -->

<?= $this->endSection() ?>