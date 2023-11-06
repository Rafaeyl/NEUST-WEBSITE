<?php

namespace Model;

defined('ROOTPATH') OR exit('Access Denied!');

/**
 * InstitutionsInfo class
 */
class InstitutionsInfo
{
	
	use Model;

	public $table = 'institutionsinfo';
	public $primaryKey = 'id';
	public $loginUniqueColumn = 'email';

	public $allowedColumns = [

		'logo',
		'cover_photo',
		'email',
		'password',
		'phone',
		'fb_link',
		'institution',
		
	];

	public function validatee($files_data, $data, $id = null)
	{
		$this->errors = [];
				
		$allowed_types = [

			'image/jpeg',
			'image/png',
			'image/gif',
			'image/webp',
			'image/jfif',

		];

		// Logo
		if(!$id)
	   {
		   if(empty($files_data['logo']['name']))
		   {
			   $this->errors['logo'] = "An logo is required!";
		   }else
		   {

			   if(!in_array($files_data['logo']['type'], $allowed_types))
			   {
				   $this->errors['logo'] = "Only files of this type are allowed: ". implode(", ", $allowed_types);
			   }
			}
	   }else
	   {
		   if(!empty($files_data['logo']['name']))
		   {
			   if(!in_array($files_data['logo']['type'], $allowed_types))
			   {
				   $this->errors['logo'] = "Only files of this type are allowed: ". implode(", ", $allowed_types);
			   }
		   }
	   }

		// Cover Photo
	   if(!$id)
	   {
		   if(empty($files_data['cover_photo']['name']))
		   {
			   $this->errors['cover_photo'] = "An cover photo is required!";
		   }else
		   {

			   if(!in_array($files_data['cover_photo']['type'], $allowed_types))
			   {
				   $this->errors['cover_photo'] = "Only files of this type are allowed: ". implode(", ", $allowed_types);
			   }
			}
	   }else
	   {
		   if(!empty($files_data['cover_photo']['name']))
		   {
			   if(!in_array($files_data['cover_photo']['type'], $allowed_types))
			   {
				   $this->errors['cover_photo'] = "Only files of this type are allowed: ". implode(", ", $allowed_types);
			   }
		   }
	   }


	 	if(!preg_match('/^[0-9]{11}+$/', $data['phone']) && !empty($data['phone']))
		{
			$this->errors['phone'] = "Phone number is not valid";
		}

		if(isset($data['institution']))
		{
			if($data['institution'] == 'empty' && !empty($data['institution']))
			{
				$this->errors['institution'] = "Add new organization/college to continue";
			}
	
		}
		
		if(empty($this->errors))
		{
			return true;
		}

		return false;
	}



}