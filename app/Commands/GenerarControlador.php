<?php namespace App\Commands;

use CodeIgniter\CLI\CLI;
use CodeIgniter\CLI\BaseCommand;

/** Clase comando GenerarControlador */
class GenerarControlador extends BaseCommand
{
	protected $group		= "Generadores";
	protected $name			= "generar:controlador";
	protected $description	= "Genera nuevo controlador";
	protected $usage		= "generar:controlador [nombre] [options]";
	protected $arguments	= [ 'nombre' => 'Archivo controlador a generar' ];
	protected $options		= [
		'-m' => 'Modelo',
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
			$nombre = CLI::prompt( 'Ingrese nombre del controlador', null, 'required' );
		}

		$nombre = pascalize( $nombre );

		$modelo		= $parametros[ '-m' ] ?? CLI::getOption( 'm' ) ?? '';
		$entidad	= $parametros[ '-e' ] ?? CLI::getOption( 'e' ) ?? '';

		$ruta = APPPATH . 'Controllers' . DIRECTORY_SEPARATOR . "$nombre.php";

		$plantilla = '<?php namespace App\Controllers;

{entidad}{modelo}
/** Clase controlador {nombre} */
class {nombre} extends BaseController
{
	/** Constructor clase controlador {nombre} */
	public function __construct () {}

	/**
	 * Acción inicio
	 * 
	 * @return String
	 */
	public function index () : String
	{
		return "Controlador {nombre}";
	}

	/**
	 * Acción eliminar
	 * 
	 * @param Int $id
	 */
	public function eliminar ( Int $id ) {}

	/**
	 * Acción agregar/editar
	 * 
	 * @param Int $id
	 * @return String
	 */
	public function agregarEditar ( Int $id = 0 ) : String {}

	/** Acción guardar */
	public function guardar () {}
}';

		$plantilla = str_replace( '{nombre}', $nombre, $plantilla );
		$plantilla = str_replace( '{modelo}', empty( $modelo ) ? '' : "use App\\Models\\$modelo;\n", $plantilla );
		$plantilla = str_replace( '{entidad}', empty( $entidad ) ? '' : "use App\\Entities\\$entidad;\n", $plantilla );

		if ( !write_file( $ruta, $plantilla ) )
		{
			CLI::error( 'Error al crear archivo controlador' ); return;
		}

		CLI::write( 'Archivo creado: ' . CLI::color( str_replace( APPPATH, 'App' . DIRECTORY_SEPARATOR, $ruta ), 'green' ) );
	}
}