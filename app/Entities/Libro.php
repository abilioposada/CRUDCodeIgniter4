<?php namespace App\Entities;

use CodeIgniter\Entity;
use App\Models\ModeloAutor;

/**
 * Clase entidad libro
 */
class Libro extends Entity
{
	/**
	 * Relación autor
	 * 
	 * @return Autor
	 */
	public function autor () : Autor
	{
		return ( new ModeloAutor )->find( $this->id_autor ); # Busca por identificador
	}
}