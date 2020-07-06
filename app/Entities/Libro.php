<?php namespace App\Entities;

use CodeIgniter\Entity;
use App\Models\ModeloAutor;

class Libro extends Entity
{
	public function autor ()
	{
		return ( new ModeloAutor )->find( $this->id_autor );
	}
}