<?= $this->extend( 'plantillas/general' ) ?>

<?= $this->section( 'contenido' ) ?>
	<header>
		<h2>Autores</h2>	
		<h3>
			<?= $autor->id != null ? 'Editando' : 'Agregando' ?>
		</h3>
	</header>

	<a href="<?= base_url( 'autores' ) ?>">Regresar al listado</a>

	<form action="<?= base_url( 'autores/guardar' ) ?>" method="post">
		<input type="hidden" name="id" value="<?= $autor->id ?>" />

		<input placeholder="Nombre" name="nombre" value="<?= $autor->nombre ?>" />

		<input placeholder="Nacionalidad" name="nacionalidad" value="<?= $autor->nacionalidad ?>" />

		<fieldset>
			<legend>Género</legend>
			
			<input type="radio" name="genero" id="masculino" value="M" <?= $autor->genero == 'M' ? 'checked' : '' ?> />
			<label for="masculino">Masculino</label>

			<input type="radio" name="genero" id="femenino" value="F" <?= $autor->genero == 'F' ? 'checked' : '' ?> />
			<label for="femenino">Femenino</label>

			<input type="radio" name="genero" id="otro" value="O" <?= $autor->genero == 'O' ? 'checked' : '' ?> />
			<label for="otro">Otro</label>
		</fieldset><br />

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