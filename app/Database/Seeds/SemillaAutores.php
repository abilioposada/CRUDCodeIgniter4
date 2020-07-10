<?php namespace App\DataBase\Seeds;

use CodeIgniter\DataBase\Seeder;

/**
 * Clase semilla base de datos de autores
 */
class SemillaAutores extends Seeder
{
	/**
	 * Corre consulta para base de datos
	 * 
	 * @return void
	 */
	public function run () : void
	{
		# Usando constructor de consultas
		$this->db->table( "t_autores" )->insertBatch(
			[
				[
					"nombre"		=> "Claudia Lars",
					"nacionalidad"	=> "Salvadoreña",
					"genero"		=> "F",
					"creado"		=> date( "Y-m-d H:i:s" )
				],
				[
					"nombre"		=> "Salvador Salazar Arrué",
					"nacionalidad"	=> "Salvadoreña",
					"genero"		=> "M",
					"creado"		=> date( "Y-m-d H:i:s" )
				]
			]
		);
	}
}