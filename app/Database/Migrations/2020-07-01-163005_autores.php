<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Clase migración autores
 */
class Autores extends Migration
{
	/**
	 * Corre levantamiento inicial migración
	 * 
	 * @return void
	 */
	public function up () : void
	{
		# Agrega campos
		$this->forge->addField(
			[
				"id"			=> [
					"type"				=> "bigint",
					"constraint"		=> 20,
					"unsigned"			=> true,
					"auto_increment"	=> true
				],

				"nombre"		=> [
					"type"			=> "varchar",
					"constraint"	=> 175,
					"default"		=> "Anónimo",
					"null"			=> false,
				],

				"nacionalidad"	=> [
					"type"			=> "varchar",
					"constraint"	=> 75
				],

				"genero"		=> [
					"type"		=> "enum( 'M', 'F', 'O' )",
					"null"		=> false,
					"default"	=> "O"
				],

				"creado"		=> [ "type"	=> "datetime" ],

				"editado"		=> [ "type"	=> "datetime" ],

				"eliminado"		=> [ "type"	=> "datetime" ]
			]
		);

		$this->forge->addPrimaryKey( "id" ); # Establece llave primaria
		$this->forge->createTable( "t_autores" ); # Crea tabla con datos anteriores
	}

	/**
	 * Corre la bajada de la migración
	 * 
	 * @return void
	 */
	public function down () : void
	{
		$this->forge->dropTable( "t_autores" );
	}
}