<?= $this->extend( 'plantillas/general' ) ?>

<?= $this->section( 'contenido' ) ?>

	<!-- Encabezado -->
	<header>

		<h2>Libros</h2>

		<!-- Subtitulo que se basa si el identificador es válido -->
		<h3><?= $libro->id != null ? 'Editando' : 'Agregando' ?></h3>
		
	</header>
	<!-- /Encabezado -->
	
	<a href="<?= base_url( 'libros' ) ?>">Regresar al listado</a>
	
	<!-- Formulario -->
	<form action="<?= base_url( 'libros/guardar' ) ?>" method="post">

		<!-- Identificador -->
		<input type="hidden" name="id" value="<?= $libro->id ?>" />

		<!-- Título -->
		<input name="titulo" placeholder="Título" value="<?= $libro->titulo ?>" />

		<!-- ISBN -->
		<input name="isbn" placeholder="ISBN" value="<?= $libro->isbn ?>" />

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