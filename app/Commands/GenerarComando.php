<?php namespace App\Commands;

use CodeIgniter\CLI\CLI;
use CodeIgniter\CLI\BaseCommand;

class GenerarComando extends BaseCommand
{
	protected $group		= 'Generadores';
	protected $name			= 'generar:comando';
	protected $description	= 'Genera nuevo comando';
	protected $usage		= 'generar:comando [nombre] [options]';
	protected $arguments	= [ 'nombre' => 'Archivo de comando a generar' ];
	protected $options		= [
		'-g' => 'Grupo',
		'-c' => 'Comando',
		'-d' => 'Descripción'
	];

	public function run ( Array $parametros = [] ) : void
	{
		helper( 'inflector' );
		
		$nombre = array_shift( $parametros );

		if ( empty( $nombre ) )
		{
			$nombre = CLI::prompt( 'Ingrese nombre del comando', null, 'required' );
		}

		$nombre = pascalize( $nombre );

		$grupo			= $parametros[ '-g' ] ?? CLI::getOption( 'g' ) ?? '';
		$comando		= $parametros[ '-c' ] ?? CLI::getOption( 'c' ) ?? '';
		$descripcion	= $parametros[ '-d' ] ?? CLI::getOption( 'd' ) ?? '';

		$ruta = APPPATH . 'Commands' . DIRECTORY_SEPARATOR . "$nombre.php";

		$plantilla = '<?php namespace App\Commands;

use CodeIgniter\CLI\CLI;
use CodeIgniter\CLI\BaseCommand;

/** Clase comando {nombre} */
class {nombre} extends BaseCommand
{
	protected $group		= "{grupo}";
	protected $name			= "{comando}";
	protected $description	= "{descripcion}";
	protected $usage		= "{comando}";
	protected $arguments	= [];
	protected $options		= [];

	/**
	 * Ejecuta comando
	 *
	 * @param Array $parametros
	 * @return void
	 */
	public function run ( Array $parametros = [] ) : void
	{
		#
	}
}';

		$plantilla = str_replace( '{grupo}', $grupo, $plantilla );
		$plantilla = str_replace( '{nombre}', $nombre, $plantilla );
		$plantilla = str_replace( '{comando}', $comando, $plantilla );
		$plantilla = str_replace( '{descripcion}', $descripcion, $plantilla );

		if ( !write_file( $ruta, $plantilla ) )
		{
			CLI::error( 'Error al crear archivo de comando' ); return;
		}

		CLI::write( 'Archivo creado: ' . CLI::color( str_replace( APPPATH, 'App' . DIRECTORY_SEPARATOR, $ruta ), 'green' ) );
	}
}