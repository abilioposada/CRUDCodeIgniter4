<?= $this->extend( 'plantillas/general' ) ?>

<?= $this->section( 'contenido' ) ?>

	<!-- Encabezado -->
	<header>

		<h2><?= lang( 'App.libro.nombre', [ SINGULAR ] ) ?></h2>

		<!-- Subtitulo que se basa si el identificador es válido -->
		<h3>

			<?= lang( 'App.general.accion.' . ( $libro->id != null ? 'editando' : 'agregando' ) ) ?>

		</h3>
		
	</header>
	<!-- /Encabezado -->
	
	<a href="<?= base_url( '/libros' ) ?>">

		<?= lang( 'App.general.accion.retornar' ) ?>

	</a>
	
	<!-- Formulario -->
	<form action="<?= base_url( '/libros/guardar' ) ?>" method="post">

		<!-- Identificador -->
		<input type="hidden" name="id" value="<?= $libro->id ?>" />

		<!-- Título -->
		<input name="titulo" placeholder="<?= lang( 'App.libro.titulo' ) ?>" value="<?= $libro->titulo ?>" />

		<!-- ISBN -->
		<input name="isbn" placeholder="<?= lang( 'App.libro.isbn' ) ?>" value="<?= $libro->isbn ?>" />

		<!-- Autor -->
		<select name="id_autor" id="id_autor">

			<!-- Autores -->
			<?php foreach ( $autores as $autor ) : ?>

				<option value="<?= $autor->id ?>" <?= $autor->id == $libro->id_autor ? 'selected' : '' ?>>

					<?= $autor->nombre ?>
					
				</option>
			
			<?php endforeach ?>
			<!-- /Autores -->
		
		</select>
		
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