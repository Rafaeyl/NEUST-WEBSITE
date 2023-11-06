<?php

namespace Model;

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

//Load Composer's autoloader
require ROOT . '/assets/PHPMailer/src/Exception.php';
require ROOT . '/assets/PHPMailer/src/PHPMailer.php';
require ROOT . '/assets/PHPMailer/src/SMTP.php';

defined('ROOTPATH') or exit('Access Denied!');

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
		'institute',
		'password',
		'date_created',
		'date_updated',

	];

	public function signup($data)
	{
		if ($this->validate($data)) {
			//add extra user columns here
			$data['password']     = password_hash($data['password'], PASSWORD_DEFAULT);
			$data['date_created'] = date("Y-m-d H:i:s");
			$data['date_updated'] = date("Y-m-d H:i:s");


			$this->insert($data);
			redirect('dashboard/user');
		}
	}

	public function login($data)
	{
		$row = $this->first([$this->loginUniqueColumn => $data[$this->loginUniqueColumn]]);

		if ($row) {

			//confirm password
			if (password_verify($data['password'], $row->password)) {
				$ses = new \Core\Session;
				$ses->auth($row);

				redirect('dashboard/dashhome');
			} else {
				$this->errors[$this->loginUniqueColumn] = "Wrong $this->loginUniqueColumn or password";
			}
		} else {
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

		// Email checking

		if (empty($data['email'])) {
			$this->errors['email'] = "Email is required";
		} else
			if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
				$this->errors['email'] = "Email is not valid";
			}

		// Email unique



		if (!$id || isset($id)) {
			//edit mode
			if ($this->first(['email' => $data['email']], ['id' => $data[$id]])) {
				$this->errors['email'] = ucfirst('email') . " is already taken!";
			}
		} else {
			//insert mode
			if ($this->first(['email' => $data['email']])) {
				$this->errors['email'] = ucfirst('email') . " is already taken!";
			}
		}

		// Check for School ID
		if (empty($data['school_id'])) {
			$this->errors['school_id'] = "School ID is Required";
		}

		// Check for birthday
		if (empty($data['birthday'])) {
			$this->errors['birthday'] = "Birthday is Required";
		}

		// Check for username
		if (empty($data['username'])) {
			$this->errors['username'] = "Username is Required";
		}


		// Check for address
		if (empty($data['address'])) {
			$this->errors['address'] = "Address is Required";
		}


		//check for first name
		if (empty($data['first_name'])) {
			$this->errors['first_name'] = "First Name is Required";
		} else
			if (!preg_match('/^[a-zA-Z ]+$/', $data['first_name'])) {
				$this->errors['first_name'] = "Only letters allowed in first name";
			}

		//check for last name
		if (empty($data['last_name'])) {
			$this->errors['last_name'] = "Last name is Required";
		} else
			if (!preg_match('/^[a-zA-Z]+$/', $data['last_name'])) {
				$this->errors['last_name'] = "Only letters allowed in last name";
			}




		// Check for Phone Number preg_match('/^[0-9]{10}+$/'

		if (empty($data['phone'])) {
			$this->errors['phone'] = "Phone number is required";
		} else
			if (!preg_match('/^[0-9]{11}+$/', $data['phone'])) {
				$this->errors['phone'] = "Phone number is not valid";
			}

		// Password
		if (!$id && empty($data['password'])) {
			$this->errors['password'] = "Password is required";
		} else
			if (strlen($data['password']) < 8 && !empty($data['password'])) {
				$this->errors['password'] = "Password must be 8 character or more";
			} else
				if ($data['password'] != $data['confirm_pass'] && !empty($data['password'])) {
					$this->errors['password'] = "Passwords do not match";
				}

		if (empty($this->errors)) {
			return true;
		}

		return false;
	}

	function send_mail($recipient, $subject, $message)
	{

		$mail = new PHPMailer();
		$mail->IsSMTP();

		$mail->SMTPDebug  = 0;
		$mail->SMTPAuth   = TRUE;
		$mail->SMTPSecure = "tls";
		$mail->Port       = 587;
		$mail->Host       = "smtp.gmail.com";
		//$mail->Host       = "smtp.mail.yahoo.com";
		$mail->Username = "papayaoffc@gmail.com";
		$mail->Password = "ixhn koab sbxo bovq";

		$mail->IsHTML(true);
		$mail->AddAddress($recipient, "User");
		$mail->SetFrom("papayaoffc@gmail.com", "NEUST Papaya Off Campus");
		//$mail->AddReplyTo("reply-to-email", "reply-to-name");
		//$mail->AddCC("cc-recipient-email", "cc-recipient-name");
		$mail->Subject = $subject;
		$content       = $message;

		$mail->MsgHTML($content);
		if (!$mail->Send()) {
			//echo "Error while sending Email.";
			//echo "<pre>";
			//var_dump($mail);
			return false;
		} else {
			//echo "Email sent successfully";
			return true;
		}

	}
}