<?php 


/**
 *  Institution class
 */

 namespace Model;

defined('ROOTPATH') OR exit('Access Denied!');

class Institution
{
	
	use Model;

	public $table = 'institutions';

	public $primaryKey = 'id';

	public $allowedColumns = [

		'name',
        'acronym',
		'slug',
        'disabled',
		'institution',
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