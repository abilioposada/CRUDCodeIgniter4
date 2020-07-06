<?php namespace App\Controllers;

use App\Entities\Libro;
use App\Models\ModeloLibro;
use App\Models\ModeloAutor;

class Libros extends BaseController
{
	private $modeloLibro;

	public function __construct ()
	{
		$this->modeloLibro = new ModeloLibro;
	}
	
	public function index ()
	{
		return view( 'libros/listar', [ 'libros' => $this->modeloLibro->paginate( 3 ), 'pager' => $this->modeloLibro->pager ] );
	}

	public function eliminar ( $id )
	{
		$this->modeloLibro->delete( $id );
		$this->session->setFlashData( 'mensaje', 'Eliminación exitosa' );

		return redirect()->to( base_url( 'libros' ) );
	}

	public function agregarEditar ( Int $id = 0 ) : String
	{
		return view( 'libros/formulario', [ 'libro' => $id ? $this->modeloLibro->find( $id ) : new Libro, 'autores' => ( new ModeloAutor )->find() ] );
	}

	public function guardar ()
	{
		if ( $this->modeloLibro->save( $this->request->getPost() ) )
		{
			$this->session->setFlashData( 'mensaje', 'Guardado exitoso' );
			
			return redirect()->to( base_url( 'libros' ) );
		}

		return redirect()->back()->withInput()->with( 'errors', $this->modeloLibro->errors() );
	}
}