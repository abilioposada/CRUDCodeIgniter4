<?= $this->extend( 'plantillas/general' ) ?>

<?= $this->section( 'contenido' ) ?>
	<header>
		<h2>Libros</h2>
		<h3>
			<?= $libro->id != null ? 'Editando' : 'Agregando' ?>
		</h3>
	</header>
	
	<a href="<?= base_url( 'libros' ) ?>">Regresar al listado</a>

	<form action="<?= base_url( 'libros/guardar' ) ?>" method="post">
		<input type="hidden" name="id" value="<?= $libro->id ?>" />

		<input name="titulo" placeholder="Título" value="<?= $libro->titulo ?>" />

		<input name="isbn" placeholder="ISBN" value="<?= $libro->isbn ?>" />

		<select name="id_autor" id="id_autor">
			<?php foreach ( $autores as $autor ) : ?>
				<option value="<?= $autor->id ?>" <?= $autor->id == $libro->id_autor ? 'selected' : '' ?>><?= $autor->nombre ?></option>
			<?php endforeach ?>
		</select><br />

		<input type="submit" value="Guardar" />
	</form>

	<?php if ( session()->getFlashdata( 'errors' ) ) : ?>
		<ul>
			<?php foreach ( session()->getFlashdata( 'errors' ) as $field => $error ) : ?>
				<li><?= ucFirst( $field ) ?> <?= $error ?></li>
			<?php endforeach ?>
		</ul>
	<?php endif ?>
<?= $this->endSection() ?>