<?php namespace App\Controllers;

/**
 * Clase controlador inicio
 */
class Inicio extends BaseController
{
	/**
	 * Acción inicio
	 */
	public function inicio ()
	{
		return view( 'inicio' ); # Vista inicio
	}
}