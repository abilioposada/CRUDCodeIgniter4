<?php namespace App\Commands;

use CodeIgniter\CLI\CLI;
use CodeIgniter\CLI\BaseCommand;

/** Clase comando GenerarTodo */
class GenerarTodo extends BaseCommand
{
	protected $group		= "Generadores";
	protected $name			= "generar:todo";
	protected $description	= "Genera nueva estructura";
	protected $usage		= "generar:todo [nombre] [options]";
	protected $arguments	= [ 'nombre'	=> 'Entidad a generar estructura' ];
	protected $options		= [ '-p'		=> 'Nombre entidad en plural' ];

	/**
	 * Ejecuta comando
	 *
	 * @param Array $parametros
	 * @return void
	 */
	public function run ( Array $parametros = [] ) : void
	{
		helper( 'inflector' );

		$nombre = array_shift( $parametros );

		if ( empty( $nombre ) )
		{
			$nombre = CLI::prompt( 'Ingrese nombre entidad', null, 'required' );
		}

		$plural = $parametros[ '-p' ] ?? CLI::getOption( 'p' ) ?? plural( $nombre );

		$nombre = pascalize( $nombre );

		$this->call( 'migrate:create', [ $plural ] );
		$this->call( 'make:seeder', [ 'Semilla' . pascalize( $plural ) ] );
		$this->call( 'generar:entidad', [ $nombre ] );
		$this->call( 'generar:modelo', [ "Modelo$nombre", '-e' => $nombre ] );
		$this->call( 'generar:controlador', [ $plural,
			'-m' => "Modelo$nombre",
			'-e' => $nombre
		] );
	}
}