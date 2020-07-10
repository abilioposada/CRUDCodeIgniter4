<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Clase migración libros
 */
class Libros extends Migration
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
				"id"	=> [
					"type"				=> "bigint",
					"constraint"		=> 20,
					"unsigned"			=> true,
					"auto_increment"	=> true
				],

				"titulo"	=> [
					"type"			=> "varchar",
					"constraint"	=> 75,
					"null"			=> false
				],

				"isbn"	=> [
					"type"			=> "varchar",
					'constraint'	=> 13,
					'null'			=> false,
					'unique'		=> true
				],

				"id_autor"	=> [
					"type"			=> "bigint",
					"constraint"	=> 20,
					"unsigned"		=> true,
					"null"			=> false
				],

				"creado"	=> [ "type"	=> "datetime" ],

				"editado"	=> [ "type"	=> "datetime" ],

				"eliminado"	=> [ "type"	=> "datetime" ]
			]
		);

		$this->forge->addPrimaryKey( 'id' ); # Establece llave primaria

		# Llave foránea
		$this->forge->addForeignKey( 'id_autor', 't_autores', 'id', 'cascade', 'no action' );
		$this->forge->createTable( 't_libros' ); # Crea tabla con datos anteriores
	}

	/**
	 * Corre la bajada de la migración
	 * 
	 * @return void
	 */
	public function down () : void
	{
		$this->forge->dropTable( 't_libros' ); # Elimina tabla
	}
}