<?php namespace App\DataBase\Seeds;

use CodeIgniter\DataBase\Seeder;

class SemillaLibros extends Seeder
{
	public function run ()
	{
		# Using Query Builder
		$this->db->table( 't_libros' )->insertBatch(
			[
				[
					'titulo'		=> 'Tierra de infancia',
					'isbn'			=> '9788484050919',
					'id_autor'		=> 1,
					'creado'		=> date( 'Y-m-d H:i:s' )
				],
				[
					'titulo'		=> 'La casa de vidrio',
					'isbn'			=> '9789992301845',
					'id_autor'		=> 1,
					'creado'		=> date( 'Y-m-d H:i:s' )
				],
				[
					'titulo'		=> 'Cuentos de barro',
					'isbn'			=> '9788483600870',
					'id_autor'		=> 2,
					'creado'		=> date( 'Y-m-d H:i:s' )
				],
				[
					'titulo'		=> 'Cuentos para cipotes',
					'isbn'			=> '9788483771808',
					'id_autor'		=> 2,
					'creado'		=> date( 'Y-m-d H:i:s' )
				],
				/* [
					'titulo'		=> 'Jícaras tristes',
					'isbn'			=> '9788484050421',
					'id_autor'		=> 2,
					'creado'		=> date( 'Y-m-d H:i:s' )
				] */
			]
		);
	}
}