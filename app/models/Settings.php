<?php

namespace Model;

defined('ROOTPATH') OR exit('Access Denied!');

/**
 * Settings class
 */
class Settings
{
	
	use Model;

	protected $table = 'settings';
	protected $primaryKey = 'id';

	protected $allowedColumns = [

		'setting',
		'type',
		'value',
	];

	public function validatee($files_data,$data, $id = null)
	{
		$this->errors = [];
			
		$allowed_types = [

			'image/jpeg',
			'image/png',
			'image/gif',
			'image/webp',

		];

		if(!$id)
	   {

	   }else
	   {
		   if(!empty($files_data['value']['name']))
		   {
			   if(!in_array($files_data['value']['type'], $allowed_types))
			   {
				   $this->errors['value'] = "Only files of this type are allowed: ". implode(", ", $allowed_types);
			   }
		   }
	   }

	   if(empty($data['setting']))
			{
				$this->errors['setting'] = "Setting is required!";
			}

		if(empty($this->errors))
		{
			return true;
		}

		return false;
	}



}