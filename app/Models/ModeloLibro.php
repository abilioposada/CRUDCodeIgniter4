<?php namespace App\Models;

use CodeIgniter\Model;

class ModeloLibro extends Model
{
	protected $table				= 't_libros';
	protected $primaryKey			= 'id';

	protected $returnType			= 'App\Entities\Libro';
	protected $useSoftDeletes		= true;

	protected $allowedFields		= [ 'titulo', 'isbn', 'id_autor' ];

	protected $useTimestamps		= true;
	protected $createdField			= 'creado';
	protected $updatedField			= 'editado';
	protected $deletedField			= 'eliminado';

	protected $validationRules		= [
		'titulo'	=> [ 'required', 'string', 'min_length[2]' ],
		'isbn'		=> [ 'required', 'min_length[10]', 'max_length[13]' ],
		'id_autor'	=> [ 'required', 'is_natural_no_zero', 'is_not_unique[t_autores.id]' ]
	];

	protected $validationMessages	= [
		'titulo'	=> [
			'required'		=> 'es requerido',
			'string'		=> 'solo letras',
			'min_length'	=> 'mínimo de dos caracteres'
		],

		'isbn'		=> [
			'required'		=> 'es requerido',
			'string'		=> 'solo letras',
			'min_length'	=> 'mínimo de diez caracteres',
			'max_length'	=> 'máximo de trece caracteres',
		],

		'id_autor'	=> [
			'required'				=> 'es requerido',
			'is_natural_no_zero'	=> 'debe ser un número mayor a cero',
			'is_not_unique'			=> 'no existe'
		]
	];
}