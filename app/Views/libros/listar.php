<?= $this->extend( 'plantillas/general' ) ?>

<?= $this->section( 'contenido' ) ?>

	<!-- Encabezados -->
	<header>

		<h2><?= lang( 'App.libro.nombre', [ count( $libros ) ] ) ?></h2>
		<h3><?= lang( 'App.general.listado', [ count( $libros ) ] ) ?></h3>

	</header>
	<!-- /Encabezados -->

	<a href="<?= base_url( 'libros/agregarEditar' ) ?>">

		<?= lang( 'App.general.accion.agregar' ) ?>
		
	</a>

	<!-- Tabla -->
	<table border="1">
	
		<!-- Encabezados de tabla -->
		<thead>

			<tr>

				<th><?= lang( 'App.libro.isbn' ) ?></th>
				<th><?= lang( 'App.libro.titulo' ) ?></th>
				<th><?= lang( 'App.autor.titulo', [ SINGULAR ] ) ?></th>
				<th><?= lang( 'App.general.accion.nombre' ) ?></th>
				
			</tr>

		</thead>
		<!-- /Encabezados de tabla -->

		<!-- Cuerpo tabla -->
		<tbody>

			<!-- Libros -->
			<?php foreach( $libros as $libro ) : ?>

				<tr>

					<!-- ISBN -->
					<td><?= $libro->isbn ?></td>

					<!-- Título -->
					<td><?= $libro->titulo ?></td>

					<!-- Nombre autor -->
					<td><?= $libro->autor()->nombre ?></td>

					<!-- Acciones -->
					<td>

						<a href="<?= base_url( '/libros/agregarEditar/' . $libro->id ) ?>">

							<?= lang( 'App.general.accion.editar' ) ?>

						</a>

						<a href="<?= base_url( '/libros/eliminar/' . $libro->id ) ?>" onclick="return confirm( '<?= lang( 'App.general.accion.confirmar' ) ?>' )">
						
							<?= lang( 'App.general.accion.eliminar' ) ?>

						</a>

					</td>

				</tr>

			<?php endforeach ?>
			<!-- /Libros -->

		</tbody>
		<!-- /Cuerpo tabla -->

		<tfoot>

			<tr>

				<td colspan="4">

					<?= lang( 'App.general.listado', [ count( $libros ) ] ) ?>
					<?= lang( 'App.libro.nombre', [ count( $libros ) ] ) ?>

				</td>

			</tr>

		</tfoot>

	</table>
	<!-- /Tabla -->

	<!-- Enlaces paginación -->
	<?= $paginador->links() ?>

<?= $this->endSection() ?>