<?php

namespace Model;

defined('ROOTPATH') OR exit('Access Denied!');

/**
 * User class
 */
class User
{
	
	use Model;

	public $table = 'users';
	public $primaryKey = 'id';
	public $loginUniqueColumn = 'email';

	public $allowedColumns = [

		'image',
		'school_id',
		'first_name',
		'last_name',
		'username',
		'email',
		'birthday',
		'gender',
		'phone',
		'address',
		'role',
		'password',
		'date_created',
		'date_updated',

	];

	/*****************************
	 * 	rules include:
		required
		alpha
		email
		numeric
		unique
		symbol
		longer_than_8_chars
		alpha_numeric_symbol
		alpha_numeric
		alpha_symbol
	 * 
	 ****************************/
	protected $onInsertValidationRules = [

		'first_name' => [
			'alpha_space',
			'required',
		],
		'last_name' => [
			'alpha_space',
			'required',
		],
		'email' => [
			'email',
			'unique',
			'required',
		],
		'username' => [
			'alpha',
			'required',
		],
		'phone' => [
			'phone_validation',
			'required',
		],
		'birthday' => [
			'required',
		],
		'address' => [
			'required',
		],
		'role' => [
			'alpha',
			'required',
		],
		'password' => [
			'not_less_than_8_chars',
			'required',
		],
	];

	protected $onUpdateValidationRules = [

		'first_name' => [
			'alpha_space',
			'required',
		],
		'last_name' => [
			'alpha_space',
			'required',
		],
		'email' => [
			'email',
			'unique',
			'required',
		],
		'username' => [
			'alpha',
			'required',
		],
		'phone' => [
			'phone_validation',
			'required',
		],
		'birthday' => [
			'required',
		],
		'address' => [
			'required',
		],
		'role' => [
			'alpha',
			'required',
		],
		'password' => [
			'not_less_than_8_chars',
			'required',
		],
	];

	public function signup($data)
	{
		if($this->validate($data))
		{
			//add extra user columns here
			$data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
			$data['date_created'] = date("Y-m-d H:i:s");
			$data['date_updated'] = date("Y-m-d H:i:s");
			

			$this->insert($data);
			redirect('dashboard/user');
		}
	}

	public function login($data)
	{
		$row = $this->first([$this->loginUniqueColumn=>$data[$this->loginUniqueColumn]]);

		if($row){

			//confirm password
			if(password_verify($data['password'], $row->password))
			{
				$ses = new \Core\Session;
				$ses->auth($row);
				
				redirect('dashboard/dashhome');
			}else{
				$this->errors[$this->loginUniqueColumn] = "Wrong $this->loginUniqueColumn or password";
			}
		}else{
			$this->errors[$this->loginUniqueColumn] = "Wrong $this->loginUniqueColumn or password";
		}
	}

	public function validatee($files_data, $data, $id = null)
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
		// Check for School ID
		if(empty($data['school_id']))
		{
			$this->errors['school_id'] = "School ID is Required";
		}

		// Check for birthday
		if(empty($data['birthday']))
		{
			$this->errors['birthday'] = "Birthday is Required";
		}

		// Check for username
		if(empty($data['username']))
		{
			$this->errors['username'] = "Username is Required";
		}
		
		
		// Check for address
		if(empty($data['address']))
		{
			$this->errors['address'] = "Address is Required";
		}
	

		//check for first name
		if(empty($data['first_name']))
		{
			$this->errors['first_name'] = "First Name is Required";
		}else
		if(!preg_match('/^[a-zA-Z ]+$/', $data['first_name']))
		{
			$this->errors['first_name'] = "Only letters allowed in first name";
		}

		//check for last name
		if(empty($data['last_name']))
		{
			$this->errors['last_name'] = "Last name is Required";
		}else
		if(!preg_match('/^[a-zA-Z]+$/', $data['last_name']))
		{
			$this->errors['last_name'] = "Only letters allowed in last name";
		}

		// $key = $this->getPrimaryKey();
		// Check for email
		if(empty($data['email']))
		{
			$this->errors['email'] = "Email is required";
		}else
		if(!filter_var($data['email'],FILTER_VALIDATE_EMAIL))
		{
			$this->errors['email'] = "Email is not valid";
		}
		// else
		// if (!empty($data[$key])) {
		// 	//edit mode
		// 	if ($this->first(['email' => $data['email']], [$key => $data[$key]])) {
		// 		$this->errors['email'] = ucfirst('email') . " should be unique";
		// 	}
		// } else {
		// 	//insert mode
		// 	if ($this->first(['email' => $data['email']])) {
		// 		$this->errors['email'] = ucfirst('email') . " should be unique";
		// 	}
		// }
		// if($this->where1('email', $data['email']))
		// {
		// 	$this->errors['email'] = "Email is already in use";
		// }
		

		// Check for Phone Number preg_match('/^[0-9]{10}+$/'

		if(empty($data['phone']))
		{
			$this->errors['phone'] = "Phone number is required";
		}else
		if(!preg_match('/^[0-9]{11}+$/', $data['phone']))
		{
			$this->errors['phone'] = "Phone number is not valid";
		}

		// Password
		if(!$id && empty($data['password']))
		{
			$this->errors['password'] = "Password is required";
		}else
		if(strlen($data['password']) < 8 && !empty($data['password']))
		{
			$this->errors['password'] = "Password must be 8 character or more";
		}else
		if($data['password'] != $data['confirm_pass'] && !empty($data['password']))
		{
			$this->errors['password'] = "Passwords do not match";
		}

		if(empty($this->errors))
		{
			return true;
		}

		return false;
	}
}