<?= $this->extend( 'plantillas/general' ) ?>

<?= $this->section( 'contenido' ) ?>

	<!-- Encabezados -->
	<header>
	
		<h2>Autores</h2>
		<h3>Listado</h3>

	</header>
	<!-- /Encabezados -->

	<a href="<?= base_url( 'autores/agregarEditar' ) ?>">Agregar</a>

	<!-- Tabla -->
	<table border="1">

		<!-- Encabezados de tabla -->
		<thead>

			<tr>

				<th>Nombre</th>
				
				<th>Nacionalidad</th>
				
				<th>Género</th>
				
				<th>Acciones</th>

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

						<a href="<?= base_url( 'autores/agregarEditar/' . $autor->id ) ?>">Editar</a>

						<a href="<?= base_url( 'autores/eliminar/' . $autor->id ) ?>" onclick="return confirm( 'Confirmar' )">Eliminar</a>
					
					</td>

				</tr>

			<?php endforeach ?>
			<!-- /Autores -->

		</tbody>
		<!-- /Cuerpo tabla -->

		<tfoot>

			<tr>

				<td colspan="4">Listado de autores</td>
			
			</tr>

		</tfoot>

	</table>
	<!-- /Tabla -->

	<!-- Enlaces paginación -->
	<?= $paginador->links() ?>

<?= $this->endSection() ?>