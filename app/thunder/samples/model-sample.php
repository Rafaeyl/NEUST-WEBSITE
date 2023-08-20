<?php

namespace Model;

defined('ROOTPATH') OR exit('Access Denied!');

/**
 * {CLASSNAME} class
 */
class {CLASSNAME}
{
	
	use Model;

	protected $table = '{table}';
	protected $primaryKey = 'id';
	protected $loginUniqueColumn = 'email';

	protected $allowedColumns = [

		'username',
		'email',
		'password',
	];

	public function validatee($data, $id = null)
	{
		$this->errors = [];

		if(empty($this->errors))
		{
			return true;
		}

		return false;
	}



}