<?php namespace App\DataBase\Seeds;

use CodeIgniter\DataBase\Seeder;

/**
 * Clase semilla base de datos de libros
 */
class SemillaLibros extends Seeder
{
	/**
	 * Corre consulta para base de datos
	 * 
	 * @return void
	 */
	public function run () : void
	{
		# Usando constructor de consultas
		$this->db->table( 't_libros' )->insertBatch(
			[
				[
					"titulo"	=> "Tierra de infancia",
					"isbn"		=> "9788484050919",
					"id_autor"	=> 1,
					"creado"	=> date( "Y-m-d H:i:s" )
				],
				[
					"titulo"	=> "La casa de vidrio",
					"isbn"		=> "9789992301845",
					"id_autor"	=> 1,
					"creado"	=> date( "Y-m-d H:i:s" )
				],
				[
					"titulo"	=> "Cuentos de barro",
					"isbn"		=> "9788483600870",
					"id_autor"	=> 2,
					"creado"	=> date( "Y-m-d H:i:s" )
				],
				[
					"titulo"	=> "Cuentos para cipotes",
					"isbn"		=> "9788483771808",
					"id_autor"	=> 2,
					"creado"	=> date( "Y-m-d H:i:s" )
				]
			]
		);
	}
}