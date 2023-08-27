<?php

namespace Model;

defined('ROOTPATH') OR exit('Access Denied!');

/**
 * Officials class
 */
class Officials
{
	
	use Model;

	public $table = 'officials';
	public $primaryKey = 'id';
	public $loginUniqueColumn = 'email';

	public $allowedColumns = [

		'image',
		'official_name',
		'position',
		'suffix',
		'institution',
		'list_order',
	];

	public function validatee($files_data,$data, $id = null)
	{
		$this->errors = [];

		// validate image
		
		$allowed_types = [

			'image/jpeg',
			'image/png',
			'image/gif',
			'image/webp',

		];

		if(!$id)
	   {
		   if(empty($files_data['image']['name']))
		   {
			   $this->errors['image'] = "An image is required!";
		   }else
		   {

			   if(!in_array($files_data['image']['type'], $allowed_types))
			   {
				   $this->errors['image'] = "Only files of this type are allowed: ". implode(", ", $allowed_types);
			   }
			}
	   }else
	   {
		   if(!empty($files_data['image']['name']))
		   {
			   if(!in_array($files_data['image']['type'], $allowed_types))
			   {
				   $this->errors['image'] = "Only files of this type are allowed: ". implode(", ", $allowed_types);
			   }
		   }
	   }

	   if(empty($data['official_name']))
	   {
		   $this->errors['official_name'] = " Name is Required";
	   }

	   if(empty($data['position']))
	   {
		   $this->errors['position'] = " Position is Required";
	   }else
	   if(!preg_match('/^[a-zA-Z ]+$/', $data['position']))
	   {
		   $this->errors['position'] = "Only letters allowed in position";
	   }

	   if(empty($data['list_order']))
	   {
		   $this->errors['list_order'] = "List order is Required";
	   }
	   
	//    if(empty($data['suffix']))
	//    {
	// 	   $this->errors['suffix'] = "Academic suffix is Required";
	//    }else
	//    if(!preg_match('/^[a-zA-Z ]+$/', $data['suffix']))
	//    {
	// 	   $this->errors['suffix'] = "Only letters allowed in position";
	//    }

		if(empty($this->errors))
		{
			return true;
		}

		return false;
	}



}