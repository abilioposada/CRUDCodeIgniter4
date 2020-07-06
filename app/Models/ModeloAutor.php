<?php namespace App\Models;

use CodeIgniter\Model;

class ModeloAutor extends Model
{
	protected $table				= 't_autores';
	protected $primaryKey			= 'id';

	protected $returnType			= 'App\Entities\Autor';
	protected $useSoftDeletes		= true;

	protected $allowedFields		= [ 'nombre', 'nacionalidad', 'genero' ];

	protected $useTimestamps		= true;
	protected $createdField			= 'creado';
	protected $updatedField			= 'editado';
	protected $deletedField			= 'eliminado';

	protected $validationRules		= [
		'nombre'		=> [ 'required', 'string', 'min_length[3]' ],
		'nacionalidad'	=> [ 'required', 'string', 'min_length[3]' ],
		'genero'		=> [ 'required', 'in_list[M,F,O]' ]
	];

	protected $validationMessages	= [
		'nombre'		=> [
			'required'		=> 'es requerido',
			'string'		=> 'solo letras',
			'min_length'	=> 'mínimo de tres caracteres'
		],

		'nacionalidad'	=> [
			'required'		=> 'es requerida',
			'string'		=> 'solo letras',
			'min_length'	=> 'mínima de tres caracteres'
		],

		'genero'		=> [
			'required'	=> 'es requerido',
			'in_list'	=> 'no válido'
		]
	];
}