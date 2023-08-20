<?php

namespace Model;

defined('ROOTPATH') OR exit('Access Denied!');

/**
 * About class
 */
class About_school
{
	
	use Model;

	public $table = 'about_school';
	public $primaryKey = 'id';

	public $allowedColumns = [

		'video',
        'title',
        'description',
        'students',
        'staffs',
        'teachers',
	];

	public function validatee($files_data,$data, $id = null)
	{
		$this->errors = [];

		// validate image
		
		$allowed_types = [
            
            'mp4',
            'webm',
            'mkv',
            'mov',
			'avi',
			'wmv',
		];

		$url = strtolower(pathinfo($files_data['video']['name'], PATHINFO_EXTENSION));
        $maxsize = 1000000000;

		if(!$id)
	   {
		   if(empty($files_data['video']['name']))
		   {
			   $this->errors['video'] = "A video is required!";
		   }else
		   {
				
			   if(!in_array($url, $allowed_types))
			   {
				   $this->errors['video'] = "Only files of this type are allowed: ". implode(", ", $allowed_types);
			   }
			   if($files_data['video']['size'] >= $maxsize)
				{
					$this->errors['video'] = "file is to large. File should not exceed 2GB";
				}

			}
	   }else
	   {
		   if(!empty($files_data['video']['name']))
		   {
			if(!in_array($url, $allowed_types))
			{
				$this->errors['video'] = "Only files of this type are allowed: ". implode(", ", $allowed_types);
			}
			if($files_data['video']['size'] >= $maxsize)
			{
				$this->errors['video'] = "file is to large. File should not exceed 2GB";
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

       if(empty($data['teachers']))
	   {
		   $this->errors['teachers'] = "Teachers are Required";
	   }

       if(empty($data['staffs']))
	   {
		   $this->errors['staffs'] = "Staffs are Required";
	   }

		if(empty($this->errors))
		{
			return true;
		}

		return false;
	}



}