<?php namespace App\Commands;

use CodeIgniter\CLI\CLI;
use CodeIgniter\CLI\BaseCommand;

/**
 * Clase comando GenerarEntidad
 */
class GenerarEntidad extends BaseCommand
{
	protected $group		= "Generadores";
	protected $name			= "generar:entidad";
	protected $description	= "Genera nueva entidad";
	protected $usage		= "generar:entidad [nombre]";
	protected $arguments	= [ 'nombre' => 'Archivo entidad a generar' ];

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
			$nombre = CLI::prompt( 'Ingrese nombre de la entidad', null, 'required' );
		}

		$nombre = pascalize( $nombre );

		$ruta = APPPATH . 'Entities' . DIRECTORY_SEPARATOR . "$nombre.php";

		$plantilla = <<<EOD
		<?php namespace App\Entities;

		use CodeIgniter\Entity;

		class {nombre} extends Entity
		{
			#
		}
		EOD;

		$plantilla = str_replace( '{nombre}', $nombre, $plantilla );

		# Crea carpeta si no existe
		if ( !is_dir( dirname( $ruta ) ) )
		{
			mkdir( dirname( $ruta ), 0775 );
		}

		if ( !write_file( $ruta, $plantilla ) )
		{
			CLI::error( 'Error al crear archivo entidad' ); return;
		}

		CLI::write( 'Archivo creado: ' . CLI::color( str_replace( APPPATH, 'App' . DIRECTORY_SEPARATOR, $ruta ), 'green' ) );
	}
}