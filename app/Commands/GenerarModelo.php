<?php namespace App\Commands;

use CodeIgniter\CLI\CLI;
use CodeIgniter\CLI\BaseCommand;

/** Clase comando GenerarModelo */
class GenerarModelo extends BaseCommand
{
	protected $group		= "Generadores";
	protected $name			= "generar:modelo";
	protected $description	= "Genera nuevo modelo";
	protected $usage		= "generar:modelo [nombre] [options]";
	protected $arguments	= [ 'nombre' => 'Archivo modelo a generar' ];
	protected $options		= [
		'-t' => 'Tabla',
		'-e' => 'Entidad'
	];

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
			$nombre = CLI::prompt( 'Ingrese nombre del modelo', null, 'required' );
		}

		$nombre = pascalize( $nombre );

		$tabla		= $parametros[ '-t' ] ?? CLI::getOption( 't' ) ?? '';
		$entidad	= $parametros[ '-e' ] ?? CLI::getOption( 'e' ) ?? '';

		$ruta = APPPATH . 'Models' . DIRECTORY_SEPARATOR . "$nombre.php";

		$plantilla = '<?php namespace App\Models;

use CodeIgniter\Model;

class {nombre} extends Model
{
	protected $table				= "{tabla}";
	protected $primaryKey			= "id";

	protected $returnType			= "{entidad}";
	protected $useSoftDeletes		= true;

	protected $allowedFields		= [];

	protected $useTimestamps		= true;
	protected $createdField			= "creado";
	protected $updatedField			= "editado";
	protected $deletedField			= "eliminado";

	protected $validationRules		= [];
	protected $validationMessages	= [];
}';

		$plantilla = str_replace( '{entidad}', empty( $entidad ) ? 'array' : "App\\Entities\\$entidad", $plantilla );
		$plantilla = str_replace( '{nombre}', $nombre, $plantilla );
		$plantilla = str_replace( '{tabla}', $tabla, $plantilla );

		if ( !write_file( $ruta, $plantilla ) )
		{
			CLI::error( 'Error al crear archivo modelo' ); return;
		}

		CLI::write( 'Archivo creado: ' . CLI::color( str_replace( APPPATH, 'App' . DIRECTORY_SEPARATOR, $ruta ), 'green' ) );
	}
}