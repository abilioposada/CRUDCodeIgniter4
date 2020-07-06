<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Libros extends Migration
{
	public function up ()
	{
		$this->forge->addField(
			[
				'id'	=> [
					'type'				=> 'bigint',
					'constraint'		=> 20,
					'unsigned'			=> true,
					'auto_increment'	=> true
				],

				'titulo'	=> [
					'type'			=> 'varchar',
					'constraint'	=> 75,
					'null'			=> false
				],

				'isbn'	=> [
					'type'			=> 'varchar',
					'constraint'	=> 13,
					'null'			=> false,
					'unique'		=> true
				],

				'id_autor'	=> [
					'type'			=> 'bigint',
					'constraint'	=> 20,
					'unsigned'		=> true
				],

				'creado'	=> [ 'type'	=> 'datetime' ],

				'editado'	=> [ 'type'	=> 'datetime' ],

				'eliminado'	=> [ 'type'	=> 'datetime' ]
			]
		);

		$this->forge->addPrimaryKey( 'id' );
		$this->forge->addForeignKey( 'id_autor', 't_autores', 'id', 'cascade', 'no action' );
		$this->forge->createTable( 't_libros' );
	}

	public function down ()
	{
		$this->forge->dropTable( 't_libros' );
	}
}