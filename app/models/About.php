<?php

namespace Model;

defined('ROOTPATH') OR exit('Access Denied!');

/**
 * About class
 */
class About
{
	
	use Model;

	public $table = 'about';
	public $primaryKey = 'id';

	public $allowedColumns = [

		'image',
		'title',
		'events',
		'students',
		'activities',
		'description',
		'institution',
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

	   if(empty($data['title']))
	   {
		   $this->errors['title'] = " Title is Required";
	   }else
	   if(!preg_match('/^[a-zA-Z ]+$/', $data['title']))
	   {
		   $this->errors['title'] = "Only letters allowed in title";
	   }

	   if(empty($data['description']))
	   {
		   $this->errors['description'] = "Description is Required";
	   }

	   
	   if(empty($data['students']))
	   {
		   $this->errors['students'] = "Students are Required";
	   }

		if(empty($this->errors))
		{
			return true;
		}

		return false;
	}



}