<?= $this->extend( 'plantillas/general' ) ?>

<?= $this->section( 'contenido' ) ?>

	<!-- Encabezados -->
	<header>
	
		<h2><?= lang( 'App.autor.titulo', [ count( $autores ) ] ) ?></h2>
		<h3><?= lang( 'App.general.listado', [ count( $autores ) ] ) ?></h3>

	</header>
	<!-- /Encabezados -->

	<a href="<?= base_url( 'autores/agregarEditar' ) ?>">

		<?= lang( 'App.general.accion.agregar' ) ?>
		
	</a>

	<!-- Tabla -->
	<table border="1">

		<!-- Encabezados de tabla -->
		<thead>

			<tr>

				<th><?= lang( 'App.autor.nombre' ) ?></th>
				<th><?= lang( 'App.autor.nacionalidad' ) ?></th>
				<th><?= lang( 'App.autor.genero.nombre' ) ?></th>
				<th><?= lang( 'App.general.accion.nombre' ) ?></th>

			</tr>

		</thead>
		<!-- /Encabezados de tabla -->

		<!-- Cuerpo tabla -->
		<tbody>

			<!-- Autores -->
			<?php foreach( $autores as $autor ) : ?>

				<tr>

					<!-- Nombre -->
					<td><?= $autor->nombre ?></td>

					<!-- Nacionalidad -->
					<td><?= $autor->nacionalidad ?></td>

					<!-- Genero -->
					<td><?= $autor->genero == 'M' ? 'Masculino' : ( $autor->genero == 'F' ? 'Femenino' : 'Otro' ) ?></td>

					<!-- Acciones -->
					<td>

						<a href="<?= base_url( '/autores/agregarEditar/' . $autor->id ) ?>">

							<?= lang( 'App.general.accion.editar' ) ?>

						</a>

						<a href="<?= base_url( '/autores/eliminar/' . $autor->id ) ?>" onclick="return confirm( '<?= lang( 'App.general.accion.confirmar' ) ?>' )">

							<?= lang( 'App.general.accion.eliminar' ) ?>

						</a>
					
					</td>

				</tr>

			<?php endforeach ?>
			<!-- /Autores -->

		</tbody>
		<!-- /Cuerpo tabla -->

		<tfoot>

			<tr>

				<td colspan="4">

					<?= lang( 'App.general.listado', [ count( $autores ) ] ) ?>
					<?= lang( 'App.autor.titulo', [ count( $autores ) ] ) ?>
					
				</td>
			
			</tr>

		</tfoot>

	</table>
	<!-- /Tabla -->

	<!-- Enlaces paginación -->
	<?= $paginador->links() ?>

<?= $this->endSection() ?>