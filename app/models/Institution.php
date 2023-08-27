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
	
	
	public function validatee($files_data,$data, $id = null)
	{
		$this->errors = [];

		$allowed_types = [

			'image/jpeg',
			'image/png',
			'image/gif',
			'image/webp',

		];

		if (isset($files_data['image']['name'])) {
			if (!$id) {
				if (empty($files_data['image']['name'])) {
					$this->errors['image'] = "An image is required!";
				} else {

					if (!in_array($files_data['image']['type'], $allowed_types)) {
						$this->errors['image'] = "Only files of this type are allowed: " . implode(", ", $allowed_types);
					}
				}
			} else {
				if (!empty($files_data['image']['name'])) {
					if (!in_array($files_data['image']['type'], $allowed_types)) {
						$this->errors['image'] = "Only files of this type are allowed: " . implode(", ", $allowed_types);
					}
				}
			}
		}
		
 
		if(empty($this->errors))
		{
			return true;
		}

		
		return false;
	}


}