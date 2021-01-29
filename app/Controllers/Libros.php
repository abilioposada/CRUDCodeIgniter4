<?php namespace App\Controllers;

use App\Entities\Libro;
use App\Models\ModeloLibro;
use App\Models\ModeloAutor;

/**
 * Clase controlador libros
 * 
 * @property $modeloLibro
 */
class Libros extends BaseController
{
	/** @var ModeloLibro */
	private ModeloLibro $modeloLibro;

	/** Constructor clase controlador libros */
	public function __construct ()
	{
		$this->modeloLibro = new ModeloLibro; # Instancia
	}
	
	/**
	 * Acción inicio
	 * 
	 * @return String
	 */
	public function inicio () : String
	{
		# Vista con arreglo de entidades vínculadas y paginación
		return view( 'libros/listar', [
			'libros'	=> $this->modeloLibro->paginate( 3 ),
			'paginador'	=> $this->modeloLibro->pager
		] );
	}

	/**
	 * Acción eliminar
	 * 
	 * @param Int $id
	 */
	public function eliminar ( Int $id )
	{
		# Elimina por identificador
		$this->modeloLibro->delete( $id );

		# Mensaje temporal entre peticiones
		$this->session->setFlashData( 'mensaje', lang( 'App.general.accion.exitosa' ) );

		# Redirección acción inicio controlador
		return redirect()->to( base_url( '/libros' ) );
	}

	/**
	 * Acción agregar/editar
	 * 
	 * @param Int $id
	 * @return String
	 */
	public function agregarEditar ( Int $id = 0 ) : String
	{
		# Vista que vincula si identificador es válido con entidad previa, sino, con una nueva
		return view( 'libros/formulario', [
			'libro'		=> $id ? $this->modeloLibro->find( $id ) : new Libro,
			'autores'	=> ( new ModeloAutor )->find()
		] );
	}

	/** Acción guardar */
	public function guardar ()
	{
		# Si guardó
		if ( $this->modeloLibro->save( $this->request->getPost() ) )
		{
			# Mensaje temporal entre peticiones
			$this->session->setFlashData( 'mensaje', lang( 'App.general.accion.exitosa' ) );
			
			# Redirección acción inicio controlador
			return redirect()->to( base_url( '/libros' ) );
		}

		# Redirecciona página anterior con datos previos y errores
		return redirect()->back()->withInput()->with( 'errors', $this->modeloLibro->errors() );
	}
}