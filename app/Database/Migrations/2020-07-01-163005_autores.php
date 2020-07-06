<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Autores extends Migration
{
	public function up()
	{
		$this->forge->addField(
			[
				'id'	=> [
					'type'				=> 'bigint',
					'constraint'		=> 20,
					'unsigned'			=> true,
					'auto_increment'	=> true
				],

				'nombre'	=> [
					'type'			=> 'varchar',
					'constraint'	=> 175,
					'default'		=> 'Anónimo',
					'null'			=> false,
				],

				'nacionalidad'	=> [
					'type'			=> 'varchar',
					'constraint'	=> 75
				],

				'genero'		=> [
					'type'		=> "enum( 'M', 'F', 'O' )",
					'null'		=> false,
					'default'	=> 'O'
				],

				'creado'		=> [ 'type'	=> 'datetime' ],

				'editado'		=> [ 'type'	=> 'datetime' ],

				'eliminado'		=> [ 'type'	=> 'datetime' ]
			]
		);
		$this->forge->addPrimaryKey( 'id' );
		$this->forge->createTable( 't_autores' );
	}

	public function down ()
	{
		$this->forge->dropTable( 't_autores' );
	}
}