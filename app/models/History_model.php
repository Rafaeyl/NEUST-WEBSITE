<?php 


namespace Model;
/**
 *  History_model class
 */
class History_model
{
	
	use Model;

	public $table = 'history';
	
	public $allowedColumns = [

		'image',
		'title',
		'description',
		'date',
		'list_order',
	];

	public function validatee($files_data, $post_data, $id = null)
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

		if(empty($post_data['title']))
 		{
 			$this->errors['title'] = "title is required!";
 		}
		
		if(empty($this->errors))
		{
			return true;
		}

		return false;
	}
}