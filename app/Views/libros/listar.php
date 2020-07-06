<?= $this->extend( 'plantillas/general' ) ?>

<?= $this->section( 'contenido' ) ?>

	<header>
		<h2>Libros</h2>
		<h3>Listado</h3>
	</header>

	<a href="<?= base_url( 'libros/agregarEditar' ) ?>">Agregar</a>

	<table border="1">
		<thead>
			<tr>
				<th>Título</th>
				<th>ISBN</th>
				<th>Autor</th>
				<th>Acciones</th>
			</tr>
		</thead>

		<tbody>
			<?php foreach( $libros as $libro ) : ?>
				<tr>
					<td>
						<?= $libro->titulo ?>
					</td>

					<td>
						<?= $libro->isbn ?>
					</td>

					<td>
						<?= $libro->autor()->nombre ?>
					</td>

					<td>
						<a href="<?= base_url( 'libros/agregarEditar/' . $libro->id ) ?>">Editar</a>
						<a href="<?= base_url( 'libros/eliminar/' . $libro->id ) ?>" onclick="return confirm( '¿Está seguro?' )">Eliminar</a>
					</td>
				</tr>
			<?php endforeach ?>
		</tbody>

		<tfoot>
			<tr>
				<td colspan="4">Listado de libros</td>
			</tr>
		</tfoot>
	</table>

	<?= $pager->links() ?>
<?= $this->endSection() ?>