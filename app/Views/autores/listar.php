<?= $this->extend( 'plantillas/general' ) ?>

<?= $this->section( 'contenido' ) ?>
	<header>
		<h2>Autores</h2>
		<h3>Listado</h3>
	</header>

	<a href="<?= base_url( 'autores/agregarEditar' ) ?>">Agregar</a>

	<table border="1">
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Nacionalidad</th>
				<th>Género</th>
				<th>Acciones</th>
			</tr>
		</thead>

		<tbody>
			<?php foreach( $autores as $autor ) : ?>
				<tr>
					<td>
						<?= $autor->nombre ?>
					</td>

					<td>
						<?= $autor->nacionalidad ?>
					</td>

					<td>
						<?= $autor->genero == 'M' ? 'Masculino' : ( $autor->genero == 'F' ? 'Femenino' : 'Otro' ) ?>
					</td>
					<td>
						<a href="<?= base_url( 'autores/agregarEditar/' . $autor->id ) ?>">Editar</a>
						<a href="<?= base_url( 'autores/eliminar/' . $autor->id ) ?>" onclick="return confirm( '¿Está seguro?' )">Eliminar</a>
					</td>
				</tr>
			<?php endforeach ?>
		</tbody>

		<tfoot>
			<tr>
				<td colspan="4">Listado de autores</td>
			</tr>
		</tfoot>
	</table>

	<?= $pager->links() ?>

<?= $this->endSection() ?>