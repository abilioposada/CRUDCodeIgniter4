<?php namespace App\Controllers;

use App\Entities\Autor;
use App\Models\ModeloAutor;

/**
 * Clase controlador autores
 * 
 * @property $modeloAutor
 */
class Autores extends BaseController
{
	/** @var ModeloAutor */
	private ModeloAutor $modeloAutor;

	/** Constructor clase controlador autores */
	public function __construct ()
	{
		$this->modeloAutor = new ModeloAutor; # Instancia
	}

	/**
	 * Acción inicio
	 * 
	 * @return String
	 */
	public function inicio () : String
	{
		# Vista con arreglo de entidades vínculadas y paginación
		return view( 'autores/listar', [
			'autores'	=> $this->modeloAutor->paginate( 3 ),
			'paginador'	=> $this->modeloAutor->pager
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
		$this->modeloAutor->delete( $id );

		# Mensaje temporal entre peticiones
		$this->session->setFlashData( 'mensaje', lang( 'App.general.accion.exitosa' ) );

		# Redirección acción inicio controlador
		return redirect()->to( base_url( '/autores' ) );
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
		return view( 'autores/formulario', [
			'autor' => $id ? $this->modeloAutor->find( $id ) : new Autor
		] );
	}

	/** Acción guardar */
	public function guardar ()
	{
		# Si guardó
		if ( $this->modeloAutor->save( $this->request->getPost() ) )
		{
			# Mensaje temporal entre peticiones
			$this->session->setFlashData( 'mensaje', lang( 'App.general.accion.exitosa' ) );
			
			# Redirección acción inicio controlador
			return redirect()->to( base_url( '/autores' ) );
		}

		# Redirecciona página anterior con datos previos y errores
		return redirect()->back()->withInput()->with( 'errors', $this->modeloAutor->errors() );
	}
}