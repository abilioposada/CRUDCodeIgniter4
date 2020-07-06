<?php namespace App\DataBase\Seeds;

use CodeIgniter\DataBase\Seeder;

class SemillaBasedatos extends Seeder
{
	public function run ()
	{
		$this->call( 'SemillaAutores' );
		$this->call( 'SemillaLibros' );
	}
}