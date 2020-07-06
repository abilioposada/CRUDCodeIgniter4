<?php namespace App\DataBase\Seeds;

use CodeIgniter\DataBase\Seeder;

class SemillaAutores extends Seeder
{
	public function run ()
	{
		# Using Query Builder
		$this->db->table( 't_autores' )->insertBatch(
			[
				[
					'nombre'		=> 'Claudia Lars',
					'nacionalidad'	=> 'Salvadoreña',
					'genero'		=> 'F',
					'creado'		=> date( 'Y-m-d H:i:s' )
				],
				[
					'nombre'		=> 'Salvador Salazar Arrué',
					'nacionalidad'	=> 'Salvadoreña',
					'genero'		=> 'M',
					'creado'		=> date( 'Y-m-d H:i:s' )
				],
				/* [
					'nombre'		=> 'Alfredo Espino',
					'nacionalidad'	=> 'Salvadoreña',
					'genero'		=> 'M',
					'creado'		=> date( 'Y-m-d H:i:s' )
				] */
			]
		);
	}
}