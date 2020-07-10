<?php namespace App\DataBase\Seeds;

use CodeIgniter\DataBase\Seeder;

/**
 * Clase semilla base de datos
 */
class SemillaBasedatos extends Seeder
{
	/**
	 * Corre llamadas a semillas
	 * 
	 * @return void
	 */
	public function run () : void
	{
		# Llama semilla autores
		$this->call( 'SemillaAutores' );
		
		# Llama semilla libros
		$this->call( 'SemillaLibros' );
	}
}