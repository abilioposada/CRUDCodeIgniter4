<?= $this->extend( 'plantillas/general' ) ?>

<?= $this->section( 'contenido' ) ?>

	<!-- Encabezados -->
	<header>

		<h2>Libros</h2>

		<h3>Listado</h3>

	</header>
	<!-- /Encabezados -->

	<a href="<?= base_url( 'libros/agregarEditar' ) ?>">Agregar</a>

	<!-- Tabla -->
	<table border="1">
	
		<!-- Encabezados de tabla -->
		<thead>

			<tr>

				<th>Título</th>

				<th>ISBN</th>

				<th>Autor</th>

				<th>Acciones</th>
				
			</tr>

		</thead>
		<!-- /Encabezados de tabla -->

		<!-- Cuerpo tabla -->
		<tbody>

			<!-- Libros -->
			<?php foreach( $libros as $libro ) : ?>

				<tr>

					<!-- Título -->
					<td><?= $libro->titulo ?></td>

					<!-- ISBN -->
					<td><?= $libro->isbn ?></td>

					<!-- Nombre autor -->
					<td><?= $libro->autor()->nombre ?></td>

					<!-- Acciones -->
					<td>

						<a href="<?= base_url( 'libros/agregarEditar/' . $libro->id ) ?>">Editar</a>

						<a href="<?= base_url( 'libros/eliminar/' . $libro->id ) ?>" onclick="return confirm( 'Confirmar' )">Eliminar</a>

					</td>

				</tr>

			<?php endforeach ?>
			<!-- /Libros -->

		</tbody>
		<!-- /Cuerpo tabla -->

		<tfoot>

			<tr>

				<td colspan="4">Listado de libros</td>

			</tr>

		</tfoot>

	</table>
	<!-- /Tabla -->

	<!-- Enlaces paginación -->
	<?= $paginador->links() ?>

<?= $this->endSection() ?>