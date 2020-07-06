<?php namespace App\Controllers;

use App\Entities\Autor;
use App\Models\ModeloAutor;

class Autores extends BaseController
{
	private $modeloAutor;

	public function __construct ()
	{
		$this->modeloAutor = new ModeloAutor;
	}

	public function index () : String
	{
		return view( 'autores/listar', [ 'autores' => $this->modeloAutor->paginate( 3 ), 'pager' => $this->modeloAutor->pager ] );
	}

	public function eliminar ( Int $id )
	{
		$this->modeloAutor->delete( $id );
		$this->session->setFlashData( 'mensaje', 'Eliminación exitosa' );

		return redirect()->to( base_url( 'autores' ) );
	}

	public function agregarEditar ( Int $id = 0 ) : String
	{
		return view( 'autores/formulario', [ 'autor' => $id ? $this->modeloAutor->find( $id ) : new Autor ] );
	}

	public function guardar ()
	{
		if ( $this->modeloAutor->save( $this->request->getPost() ) )
		{
			$this->session->setFlashData( 'mensaje', 'Guardado exitoso' );
			
			return redirect()->to( base_url( 'autores' ) );
		}

		return redirect()->back()->withInput()->with( 'errors', $this->modeloAutor->errors() );
	}
}