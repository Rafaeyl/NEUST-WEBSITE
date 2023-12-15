<?php

namespace Controller;
use Model\Database;
use \Core\Session;
use Model\History_model;
use Model\InstitutionsInfo;
use Model\Officials;
use \Model\User;
use \Model\Institution;
use \Model\Image;
use \Model\About;
use \Model\About_school;
use \Model\Settings;

defined('ROOTPATH') or exit('Access Denied!');

class Dashboard
{
	use MainController;
	use Database;

	public function index()
	{
		$data['title'] = "Dashhome";
		$this->view('dashboard/dashhome', $data);
	}
	// Dashome
	public function dashhome($action = null, $id = null)
	{
		$ses = new Session;
		if (!$ses->is_logged_in()) {

			redirect('login');
		}

		$data['title'] = "Dashhome";
		$data['action'] = $action;

		$id = $ses->user('id');
		$query  = "select institutions.disabled FROM institutions JOIN users ON users.role = institutions.id WHERE users.id = $id";
		$data['rows'] = $this->query($query);

		$url = $_GET['url'] ?? 'home';
        $url = strtolower($url);
        $url = explode("/", $url);

        $slug  = $url[1] ?? 'home';
        $data['slug'] = $slug;
		
		$this->view('dashboard/dashhome', $data);
	}

	// User
	public function user($action = null, $id = null)
	{

		$data['title'] = "User";
		$data['action'] = $action;

		$ses = new Session;
		if (!$ses->is_logged_in()) {

			redirect('login');
		}

		$institutions = new Institution();
		
		$institutions->order_type = 'desc';
		$institutions->limit = 10;
		$data['institutions'] = $institutions->whereInstitution('disabled', 'Active');
		

		$data['user'] = new User();

		if ($action == 'new') {

			if ($_SERVER['REQUEST_METHOD'] == "POST") {

				$folder = "uploads/";
				if(!file_exists($folder))
				{
					mkdir($folder, 0777, true);
				}

				if ($data['user']->validatee($_FILES, $_POST)) {

					$destination = $folder . time() . $_FILES['image']['name'];
					move_uploaded_file($_FILES['image']['tmp_name'], $destination);
					
					$image_class = new Image();
					$image_class->resize($destination);
					

					$_POST['image'] = $destination;

					$email = $_POST['email'];
					$password =$_POST['password'];
					//send email here
					$data['user']->send_mail($email, 'NEUST OFF CAMPUS WEBSITE USER REGISTRATION', 
					"Proceed to the NEUST Papaya Off Campus using the login credentials below: ". "<br>".
					"Email: " . $email . "<br>". "Password: " . $password
					);

					$_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
					$_POST['date_created'] = date("Y-m-d H:i:s");
					$_POST['date_updated'] = date("Y-m-d H:i:s");

				
					$user_role = $_POST['role'];
					$query  = "select institution FROM institutions WHERE id =$user_role";
					$institute = $this->query($query);
					$_POST['institute'] = $institute[0]->institution;

					$data['user']->insert($_POST);

				
					redirect('dashboard/user');
				}
			}
		}else
		if($action == 'edit')
		{
			$data['row'] = $data['user']->first(['id'=>$id]);

			if($_SERVER['REQUEST_METHOD'] == "POST")
			{
				$folder = "uploads/";
				if(!file_exists($folder))
				{
					mkdir($folder, 0777, true);
				}

				if($data['user']->validatee($_FILES, $_POST, $id))
				{
					if(!empty($_FILES['image']['name']))
					{
						$destination = $folder . time() . $_FILES['image']['name'];
						move_uploaded_file($_FILES['image']['tmp_name'], $destination);
						
						$image_class = new Image();
						$image_class->resize($destination);

						$_POST['image'] = $destination;

						if(file_exists($data['row']->image))
							unlink($data['row']->image);
					}

					if(empty($_POST['password']))
					{
						unset($_POST['password']);
					}else{
						$_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
					}
					
					$user_role = $_POST['role'];
					$query  = "select institution FROM institutions WHERE id =$user_role";
					$institute = $this->query($query);
					$_POST['institute'] = $institute[0]->institution;

					$data['user']->update($id, $_POST);

					redirect('dashboard/user');
				}
			}
		}else
		if($action == 'delete')
		{

			$data['row'] = $data['user']->first(['id'=>$id]);

			if($_SERVER['REQUEST_METHOD'] == "POST")
			{
 
				$data['user']->delete($id);

				if(file_exists($data['row']->image))
					unlink($data['row']->image);
					
				redirect('dashboard/user');
			}
		}
		
		$user = $data['user'] ;
		$query = "select * from $user->table order by $user->order_column $user->order_type limit $user->limit offset $user->offset";

		
		$data['rows'] = $this->query($query);

		$data['errors'] = $data['user']->errors;

		if( $ses->user('institute') == 'Admin')
		{
			$this->view('dashboard/user', $data);
		}else
		{
			$this->view('access-denied');
		}

		
	}

	// Organization
	public function organization($action = null, $id = null)
	{

		$ses = new Session;
		if (!$ses->is_logged_in()) {

			redirect('login');
		}

		$data['title'] = "Organizations";
		$data['action'] = $action;

		$organization = new Institution();

		if($action == 'new')
		{
			if($_SERVER['REQUEST_METHOD'] == "POST")
			{
				$slug = str_to_url($_POST['name']);
				
				$query = "select id from $organization->table where slug = :slug limit 1";
				$slug_row = $this->query($query, ['slug'=>$slug]);
		
				if($slug_row)
				{
					$slug .= rand(1000,9999);
				}
				
				if($organization->validatee($_FILES, $_POST))
				{
					$_POST['slug']        = $slug;
					$_POST['institution'] = 'organization';

					$organization->insert($_POST);

					redirect('dashboard/organization');
				}
			}
		}else
		if($action == 'edit')
		{

			$data['row'] = $organization->first(['id'=>$id]);

			if($_SERVER['REQUEST_METHOD'] == "POST")
			{

				if($organization->validatee($_POST, $id))
				{
 
					$organization->update($id, $_POST);

					redirect('dashboard/organization');
				}
			}
		}else
		if($action == 'delete')
		{
			$data['row'] = $organization->first(['id'=>$id]);

			if($_SERVER['REQUEST_METHOD'] == "POST")
			{
				$organization->delete($id);

				redirect('dashboard/organization');
				
			}
		}

		$data['errors'] = $organization->errors;

		$query = "select * from $organization->table  WHERE institution = 'organization' order by $organization->order_column $organization->order_type limit $organization->limit offset $organization->offset";

		$data['org'] = $organization;

		$data['rows'] = $this->query($query);

		if( $ses->user('institute') == 'Admin')
		{
			
			$this->view('dashboard/organization', $data);
		}else
		{
			$this->view('access-denied');
		}

	}

	// College
	public function college($action = null, $id = null)
	{

		$ses = new Session;
		if (!$ses->is_logged_in()) {

			redirect('login');
		}

		$data['title'] = "Colleges";
		$data['action'] = $action;

		$college = new Institution();

		if($action == 'new')
		{
			if($_SERVER['REQUEST_METHOD'] == "POST")
			{
				$slug = str_to_url($_POST['name']);
				
				$query = "select id from $college->table where slug = :slug limit 1";
				$slug_row = $this->query($query, ['slug'=>$slug]);
		
				if($slug_row)
				{
					$slug .= rand(1000,9999);
				}

				if($college->validatee($_FILES, $_POST))
				{
					$data                = [];
					$data['name']        = $_POST['name'];
					$data['acronym']     = $_POST['acronym'];
					$data['slug']        = $slug;
					$data['disabled']    = $_POST['disabled'];
					$data['institution'] ='college';
					
					$query = "insert into $college->table (name,acronym,slug,disabled,institution) values (:name,:acronym,:slug,:disabled,:institution)";
					$this->query($query, $data);

					// $college->insert($_POST);

					redirect('dashboard/college');
				}
			}
		}else
		if($action == 'edit')
		{

			$data['row'] = $college->first(['id'=>$id]);

			if($_SERVER['REQUEST_METHOD'] == "POST")
			{

				if($college->validatee($_POST, $id))
				{
 
					$college->update($id, $_POST);

					redirect('dashboard/college');
				}
			}
		}else
		if($action == 'delete')
		{
			$data['row'] = $college->first(['id'=>$id]);

			if($_SERVER['REQUEST_METHOD'] == "POST")
			{
				$college->delete($id);

				redirect('dashboard/college');
				
			}
		}

		$data['errors'] = $college->errors;

		$query = "select * from $college->table WHERE institution = 'college' order by $college->order_column $college->order_type limit $college->limit offset $college->offset";

		$data['org'] = $college;

		$data['rows'] = $this->query($query);

		if( $ses->user('institute') == 'Admin')
		{
			
			$this->view('dashboard/college', $data);
		}else
		{
			$this->view('access-denied');
		}

	
	}

	// Organization Info
	public function organization_info($action = null, $id = null)
	{
		
		$ses = new Session;
		if (!$ses->is_logged_in()) {

			redirect('login');
		}

		$data['title'] = "Organizations' Info";
		$data['action'] = $action;
		$data['OrganizationInfo'] = new InstitutionsInfo();

		$organization = new Institution();
		$organization->order_type = 'asc';
		$organization->limit = 10;

		$query = "SELECT * FROM institutions AS a WHERE NOT EXISTS ( SELECT institution FROM institutionsinfo AS b WHERE a.id = institution) AND institution='organization' AND disabled = 'active'";
		$data['organizations'] = $this->query($query);


		if ($action == 'new') {

			if ($_SERVER['REQUEST_METHOD'] == "POST") {

				$folder = "uploads/";
				if(!file_exists($folder))
				{
					mkdir($folder, 0777, true);
				}

				if ($data['OrganizationInfo']->validatee($_FILES, $_POST)) {

					$destination = $folder . time() . $_FILES['logo']['name'];
					move_uploaded_file($_FILES['logo']['tmp_name'], $destination);

					$image_class = new Image();
					$image_class->resize($destination);

					$_POST['logo'] = $destination;

					$destination1 = $folder . time() . $_FILES['cover_photo']['name'];
					move_uploaded_file($_FILES['cover_photo']['tmp_name'], $destination1);

					$image_class = new Image();
					$image_class->resize($destination1);

					$_POST['cover_photo'] = $destination1;

					$data['OrganizationInfo']->insert($_POST);
					redirect('dashboard/organization_info');
				}
			}
		}else
		if($action == 'edit')
		{
			$data['row'] = $data['OrganizationInfo']->first(['id'=>$id]);

			if($_SERVER['REQUEST_METHOD'] == "POST")
			{
				$folder = "uploads/";
				if(!file_exists($folder))
				{
					mkdir($folder, 0777, true);
				}

				if($data['OrganizationInfo']->validatee($_FILES, $_POST, $id))
				{
					if(!empty($_FILES['logo']['name']))
					{
						$destination = $folder . time() . $_FILES['logo']['name'];
						move_uploaded_file($_FILES['logo']['tmp_name'], $destination);
						
						$image_class = new Image();
						$image_class->resize($destination);

						$_POST['logo'] = $destination;

						if(file_exists($data['row']->logo))
							unlink($data['row']->logo);
					}

					if(!empty($_FILES['cover_photo']['name']))
					{
						$destination = $folder . time() . $_FILES['cover_photo']['name'];
						move_uploaded_file($_FILES['cover_photo']['tmp_name'], $destination);
						
						$image_class = new Image();
						$image_class->resize($destination);

						$_POST['cover_photo'] = $destination;

						if(file_exists($data['row']->cover_photo))
							unlink($data['row']->cover_photo);
					}
	

					$data['OrganizationInfo']->update($id, $_POST);

					redirect('dashboard/organization_info');
				}
			}
		}else
		if($action == 'delete')
		{

			$data['row'] = $data['OrganizationInfo']->first(['id'=>$id]);

			if($_SERVER['REQUEST_METHOD'] == "POST")
			{
 
				$data['OrganizationInfo']->delete($id);

				if(file_exists($data['row']->image))
					unlink($data['row']->image);
					
				redirect('dashboard/organization_info');
			}
		}

		// Admin table
		$query = "select institutionsinfo.*, institutions.name FROM institutionsinfo JOIN institutions ON institutionsinfo.institution = institutions.id WHERE institutions.institution = 'organization'";
		$data['rows'] = $this->query($query);
		
		// Organization Table
		$id = $ses->user('id');
		$query  = "select institutions.name FROM institutions JOIN users ON users.role = institutions.id WHERE users.id = $id";
		$orgname = $this->query($query);
		$role = $orgname[0]->name;

		$query = "select institutionsinfo.*,  institutions.name  FROM institutionsinfo JOIN institutions ON institutionsinfo.institution = institutions.id WHERE institutions.name = '$role'" ;
		$data['single_rows'] = $this->query($query);

		$data['errors'] = $data['OrganizationInfo']->errors;

		if( $ses->user('institute') == 'Admin' || $ses->user('institute') == 'organization')
		{
			$this->view('dashboard/organization_info', $data);
		}else
		{
			$this->view('access-denied');
		}
		
	}

	// College Info
	public function college_info($action = null, $id = null)
	{
		
		$ses = new Session;
		if (!$ses->is_logged_in()) {

			redirect('login');
		}

		$data['title'] = "College' Info";
		$data['action'] = $action;
		$data['collegeInfo'] = new InstitutionsInfo();

		$query = "SELECT * FROM institutions AS a WHERE NOT EXISTS ( SELECT institution FROM institutionsinfo AS b WHERE a.id = institution) AND institution='college' AND disabled = 'active'";
		$data['colleges'] = $this->query($query);


		if ($action == 'new') {

			if ($_SERVER['REQUEST_METHOD'] == "POST") {

				$folder = "uploads/";
				if(!file_exists($folder))
				{
					mkdir($folder, 0777, true);
				}

				if ($data['collegeInfo']->validatee($_FILES, $_POST)) {

					$destination = $folder . time() . $_FILES['logo']['name'];
					move_uploaded_file($_FILES['logo']['tmp_name'], $destination);

					$image_class = new Image();
					$image_class->resize($destination);

					$_POST['logo'] = $destination;

					$destination1 = $folder . time() . $_FILES['cover_photo']['name'];
					move_uploaded_file($_FILES['cover_photo']['tmp_name'], $destination1);

					$image_class = new Image();
					$image_class->resize($destination1);

					$_POST['cover_photo'] = $destination1;

					$data['collegeInfo']->insert($_POST);
					redirect('dashboard/college_info');
				}
			}
		}else
		if($action == 'edit')
		{
			$data['row'] = $data['collegeInfo']->first(['id'=>$id]);

			if($_SERVER['REQUEST_METHOD'] == "POST")
			{
				$folder = "uploads/";
				if(!file_exists($folder))
				{
					mkdir($folder, 0777, true);
				}

				if($data['collegeInfo']->validatee($_FILES, $_POST, $id))
				{
					if(!empty($_FILES['logo']['name']))
					{
						$destination = $folder . time() . $_FILES['logo']['name'];
						move_uploaded_file($_FILES['logo']['tmp_name'], $destination);
						
						$image_class = new Image();
						$image_class->resize($destination);

						$_POST['logo'] = $destination;

						if(file_exists($data['row']->logo))
							unlink($data['row']->logo);
					}

					if(!empty($_FILES['cover_photo']['name']))
					{
						$destination = $folder . time() . $_FILES['cover_photo']['name'];
						move_uploaded_file($_FILES['cover_photo']['tmp_name'], $destination);
						
						$image_class = new Image();
						$image_class->resize($destination);

						$_POST['cover_photo'] = $destination;

						if(file_exists($data['row']->cover_photo))
							unlink($data['row']->cover_photo);
					}
	

					$data['collegeInfo']->update($id, $_POST);

					redirect('dashboard/college_info');
				}
			}
		}else
		if($action == 'delete')
		{

			$data['row'] = $data['collegeInfo']->first(['id'=>$id]);

			if($_SERVER['REQUEST_METHOD'] == "POST")
			{
 
				$data['collegeInfo']->delete($id);

				if(file_exists($data['row']->image))
					unlink($data['row']->image);
					
				redirect('dashboard/college_info');
			}
		}
		// Admin table
		$query = "select institutionsinfo.*, institutions.name FROM institutionsinfo JOIN institutions ON institutionsinfo.institution = institutions.id WHERE institutions.institution = 'college'";
		$data['rows'] = $this->query($query);
		
		// Organization Table
		$id = $ses->user('id');
		$query  = "select institutions.name FROM institutions JOIN users ON users.role = institutions.id WHERE users.id = $id";
		$orgname = $this->query($query);
		$role = $orgname[0]->name;

		$query = "select institutionsinfo.* , institutions.name FROM institutionsinfo JOIN institutions ON institutionsinfo.institution = institutions.id WHERE institutions.name = '$role'" ;
		$data['single_rows'] = $this->query($query);

		$data['errors'] = $data['collegeInfo']->errors;

		if( $ses->user('institute') == 'Admin' || $ses->user('institute') == 'college')
		{
			$this->view('dashboard/college_info', $data);
		}else
		{
			$this->view('access-denied');
		}
		
		
	}

	// Organizatin Official
	public function organization_officials($action = null, $id = null)
	{
		
		$ses = new Session;
		if (!$ses->is_logged_in()) {

			redirect('login');
		}

		$data['title'] = "Organizations' Official";
		$data['action'] = $action;
		$data['OrganizationOfficials'] = new Officials();

		$organization = new Institution();
		$organization->order_type = 'asc';
		$organization->limit = 10;

		$query = "SELECT * FROM institutions WHERE institution='organization' AND disabled = 'active'";
		$data['organizations'] = $this->query($query);


		if ($action == 'new') {

			if ($_SERVER['REQUEST_METHOD'] == "POST") {

				$folder = "uploads/";
				if(!file_exists($folder))
				{
					mkdir($folder, 0777, true);
				}

				if ($data['OrganizationOfficials']->validatee($_FILES, $_POST)) {

					$destination = $folder . time() . $_FILES['image']['name'];
					move_uploaded_file($_FILES['image']['tmp_name'], $destination);

					$image_class = new Image();
					$image_class->resize($destination);

					$_POST['image'] = $destination;

					$data['OrganizationOfficials']->insert($_POST);
					redirect('dashboard/organization_officials');
				}
			}
		}else
		if($action == 'edit')
		{
			$data['row'] = $data['OrganizationOfficials']->first(['id'=>$id]);

			if($_SERVER['REQUEST_METHOD'] == "POST")
			{
				$folder = "uploads/";
				if(!file_exists($folder))
				{
					mkdir($folder, 0777, true);
				}

				if($data['OrganizationOfficials']->validatee($_FILES, $_POST, $id))
				{
					if(!empty($_FILES['image']['name']))
					{
						$destination = $folder . time() . $_FILES['image']['name'];
						move_uploaded_file($_FILES['image']['tmp_name'], $destination);
						
						$image_class = new Image();
						$image_class->resize($destination);

						$_POST['image'] = $destination;

						if(file_exists($data['row']->image))
							unlink($data['row']->image);
					}
					
					$data['OrganizationOfficials']->update($id, $_POST);

					redirect('dashboard/organization_officials');
				}
			}
		}else
		if($action == 'delete')
		{

			$data['row'] = $data['OrganizationOfficials']->first(['id'=>$id]);

			if($_SERVER['REQUEST_METHOD'] == "POST")
			{
 
				$data['OrganizationOfficials']->delete($id);

				if(file_exists($data['row']->image))
					unlink($data['row']->image);
					
				redirect('dashboard/organization_officials');
			}
		}

		$id = $ses->user('id');
		$query  = "select institutions.name FROM institutions JOIN users ON users.role = institutions.id WHERE users.id = $id";
		$orgname = $this->query($query);
		$role = $orgname[0]->name;

		// all table
		$insitution = $ses->user('institute');
		if($insitution == 'Admin')
		{
			$query = "select officials.*, institutions.name FROM officials JOIN institutions ON officials.institution = institutions.id WHERE institutions.institution = 'organization' AND institutions.disabled = 'Active'";
		}
		if($insitution == 'organization')
		{
			$query = "select officials.*, institutions.name FROM officials JOIN institutions ON officials.institution = institutions.id WHERE institutions.name = '$role'" ;
		}

		$data['rows'] = $this->query($query);

		$data['errors'] = $data['OrganizationOfficials']->errors;

		if( $ses->user('institute') == 'Admin' || $ses->user('institute') == 'organization')
		{
			$this->view('dashboard/organization_officials', $data);
		}else
		{
			$this->view('access-denied');
		}
	}

	public function college_official($action = null, $id = null)
	{
		
		$ses = new Session;
		if (!$ses->is_logged_in()) {

			redirect('login');
		}

		$data['title'] = "College Officials";
		$data['action'] = $action;
		$data['collegeOfficials'] = new Officials();

		$organization = new Institution();
		$organization->order_type = 'asc';
		$organization->limit = 10;

		$query = "SELECT * FROM institutions WHERE institution='college' AND disabled = 'active'";
		$data['colleges'] = $this->query($query);


		if ($action == 'new') {

			if ($_SERVER['REQUEST_METHOD'] == "POST") {

				$folder = "uploads/";
				if(!file_exists($folder))
				{
					mkdir($folder, 0777, true);
				}

				if ($data['collegeOfficials']->validatee($_FILES, $_POST)) {

					$destination = $folder . time() . $_FILES['image']['name'];
					move_uploaded_file($_FILES['image']['tmp_name'], $destination);

					$image_class = new Image();
					$image_class->resize($destination);

					$_POST['image'] = $destination;

					$data['collegeOfficials']->insert($_POST);
					redirect('dashboard/college_official');
				}
			}
		}else
		if($action == 'edit')
		{
			$data['row'] = $data['collegeOfficials']->first(['id'=>$id]);

			if($_SERVER['REQUEST_METHOD'] == "POST")
			{
				$folder = "uploads/";
				if(!file_exists($folder))
				{
					mkdir($folder, 0777, true);
				}

				if($data['collegeOfficials']->validatee($_FILES, $_POST, $id))
				{
					if(!empty($_FILES['image']['name']))
					{
						$destination = $folder . time() . $_FILES['image']['name'];
						move_uploaded_file($_FILES['image']['tmp_name'], $destination);
						
						$image_class = new Image();
						$image_class->resize($destination);

						$_POST['image'] = $destination;

						if(file_exists($data['row']->image))
							unlink($data['row']->image);
					}
					
					$data['collegeOfficials']->update($id, $_POST);

					redirect('dashboard/college_official');
				}
			}
		}else
		if($action == 'delete')
		{

			$data['row'] = $data['collegeOfficials']->first(['id'=>$id]);

			if($_SERVER['REQUEST_METHOD'] == "POST")
			{
 
				$data['collegeOfficials']->delete($id);

				if(file_exists($data['row']->image))
					unlink($data['row']->image);
					
				redirect('dashboard/college_official');
			}
		}

		$id = $ses->user('id');
		$query  = "select institutions.name FROM institutions JOIN users ON users.role = institutions.id WHERE users.id = $id";
		$orgname = $this->query($query);
		$role = $orgname[0]->name;

		$insitution = $ses->user('institute');
		if($insitution == 'Admin')
		{
			$query = "select officials.*, institutions.name FROM officials JOIN institutions ON officials.institution = institutions.id WHERE institutions.institution = 'college' AND institutions.disabled = 'Active'";
		}
		if($insitution == 'college')
		{
			$query = "select officials.*, institutions.name FROM officials JOIN institutions ON officials.institution = institutions.id WHERE institutions.name = '$role'" ;
		}

		$data['rows'] = $this->query($query);

		$data['errors'] = $data['collegeOfficials']->errors;

		
		if( $ses->user('institute') == 'Admin' || $ses->user('institute') == 'college')
		{
			$this->view('dashboard/college_official', $data);
		}else
		{
			$this->view('access-denied');
		}

		
	}

	public function organization_about($action = null, $id = null)
	{
		
		$ses = new Session;
		if (!$ses->is_logged_in()) {

			redirect('login');
		}

		$data['title'] = "Organizations' About Us";
		$data['action'] = $action;
		$data['OrganizationAbout'] = new About();

		$organization = new Institution();
		$organization->order_type = 'asc';
		$organization->limit = 10;

		$query = "SELECT * FROM institutions AS a WHERE NOT EXISTS ( SELECT institution FROM about AS b WHERE a.id = institution) AND institution='organization' AND disabled = 'active'";
		$data['organizations'] = $this->query($query);


		if ($action == 'new') {

			if ($_SERVER['REQUEST_METHOD'] == "POST") {

				$folder = "uploads/";
				if(!file_exists($folder))
				{
					mkdir($folder, 0777, true);
				}

				if ($data['OrganizationAbout']->validatee($_FILES, $_POST)) {

					$destination = $folder . time() . $_FILES['image']['name'];
					move_uploaded_file($_FILES['image']['tmp_name'], $destination);

					$image_class = new Image();
					$image_class->resize($destination);

					$_POST['image'] = $destination;

					$data['OrganizationAbout']->insert($_POST);
					redirect('dashboard/organization_about');
				}
			}
		}else
		if($action == 'edit')
		{
			$data['row'] = $data['OrganizationAbout']->first(['id'=>$id]);

			if($_SERVER['REQUEST_METHOD'] == "POST")
			{
				$folder = "uploads/";
				if(!file_exists($folder))
				{
					mkdir($folder, 0777, true);
				}

				if($data['OrganizationAbout']->validatee($_FILES, $_POST, $id))
				{
					if(!empty($_FILES['image']['name']))
					{
						$destination = $folder . time() . $_FILES['image']['name'];
						move_uploaded_file($_FILES['image']['tmp_name'], $destination);
						
						$image_class = new Image();
						$image_class->resize($destination);

						$_POST['image'] = $destination;

						if(file_exists($data['row']->image))
							unlink($data['row']->image);
					}

					$data['OrganizationAbout']->update($id, $_POST);

					redirect('dashboard/organization_about');
				}
			}
		}else
		if($action == 'delete')
		{

			$data['row'] = $data['OrganizationAbout']->first(['id'=>$id]);

			if($_SERVER['REQUEST_METHOD'] == "POST")
			{
 
				$data['OrganizationAbout']->delete($id);

				if(file_exists($data['row']->image))
					unlink($data['row']->image);
					
				redirect('dashboard/organization_about');
			}
		}

		//Admin table
		$query = "select * FROM institutions JOIN about ON about.institution = institutions.id WHERE institutions.institution = 'organization'";
		$data['rows'] = $this->query($query);

		// Organization Table
		$id = $ses->user('id');
		$query  = "select institutions.name FROM institutions JOIN users ON users.role = institutions.id WHERE users.id = $id";
		$orgname = $this->query($query);
		$role = $orgname[0]->name;

		$query = "select about.* FROM about JOIN institutions ON about.institution = institutions.id WHERE institutions.name = '$role'" ;
		$data['single_rows'] = $this->query($query);

		$data['errors'] = $data['OrganizationAbout']->errors;

		if( $ses->user('institute') == 'Admin' || $ses->user('institute') == 'organization')
		{
			$this->view('dashboard/organization_about', $data);
		}else
		{
			$this->view('access-denied');
		}

		
	}

	public function college_about($action = null, $id = null)
	{
		
		$ses = new Session;
		if (!$ses->is_logged_in()) {

			redirect('login');
		}

		$data['title'] = "Colleges' About Us";
		$data['action'] = $action;
		$data['collegeAbout'] = new About();

		$organization = new Institution();
		$organization->order_type = 'asc';
		$organization->limit = 10;

		$query = "SELECT * FROM institutions AS a WHERE NOT EXISTS ( SELECT institution FROM about AS b WHERE a.id = institution) AND institution='college' AND disabled = 'active'";
		$data['colleges'] = $this->query($query);


		if ($action == 'new') {

			if ($_SERVER['REQUEST_METHOD'] == "POST") {

				$folder = "uploads/";
				if(!file_exists($folder))
				{
					mkdir($folder, 0777, true);
				}

				if ($data['collegeAbout']->validatee($_FILES, $_POST)) {

					$destination = $folder . time() . $_FILES['image']['name'];
					move_uploaded_file($_FILES['image']['tmp_name'], $destination);

					$image_class = new Image();
					$image_class->resize($destination);

					$_POST['image'] = $destination;

					$data['collegeAbout']->insert($_POST);
					redirect('dashboard/college_about');
				}
			}
		}else
		if($action == 'edit')
		{
			$data['row'] = $data['collegeAbout']->first(['id'=>$id]);

			if($_SERVER['REQUEST_METHOD'] == "POST")
			{
				$folder = "uploads/";
				if(!file_exists($folder))
				{
					mkdir($folder, 0777, true);
				}

				if($data['collegeAbout']->validatee($_FILES, $_POST, $id))
				{
					if(!empty($_FILES['image']['name']))
					{
						$destination = $folder . time() . $_FILES['image']['name'];
						move_uploaded_file($_FILES['image']['tmp_name'], $destination);
						
						$image_class = new Image();
						$image_class->resize($destination);

						$_POST['image'] = $destination;

						if(file_exists($data['row']->image))
							unlink($data['row']->image);
					}

					$data['collegeAbout']->update($id, $_POST);

					redirect('dashboard/college_about');
				}
			}
		}else
		if($action == 'delete')
		{

			$data['row'] = $data['collegeAbout']->first(['id'=>$id]);

			if($_SERVER['REQUEST_METHOD'] == "POST")
			{
 
				$data['collegeAbout']->delete($id);

				if(file_exists($data['row']->image))
					unlink($data['row']->image);
					
				redirect('dashboard/college_about');
			}
		}

		// Admin table
		$query = "select * FROM institutions JOIN about ON about.institution = institutions.id WHERE institutions.institution = 'college'";
		$data['rows'] = $this->query($query);

		// Organization Table
		$id = $ses->user('id');
		$query  = "select institutions.name FROM institutions JOIN users ON users.role = institutions.id WHERE users.id = $id";
		$orgname = $this->query($query);
		$role = $orgname[0]->name;

		$query = "select about.* FROM about JOIN institutions ON about.institution = institutions.id WHERE institutions.name = '$role'" ;
		$data['single_rows'] = $this->query($query);
	
		$data['errors'] = $data['collegeAbout']->errors;
			
		if( $ses->user('institute') == 'Admin' || $ses->user('institute') == 'college')
		{
			$this->view('dashboard/college_about', $data);
		}else
		{
			$this->view('access-denied');
		}
		
	}

	public function announcement($action = null, $id = null)
	{
		$ses = new Session;
		if (!$ses->is_logged_in()) {

			redirect('login');
		}

		$data['title'] = "Announcements";
		$data['action'] = $action;
		
		$announcement = new Institution();
		$announcement->table = 'announcements';
		$announcement->order_type = 'asc';
		$announcement->allowedColumns = [

			'image',
			'title',
			'description',
			'list_order',
			'disabled',
			'slug',
			'date',
			
		];
		
		if($action == 'new')
		{
			$folder = "uploads/";
			if(!file_exists($folder))
			{
				mkdir($folder, 0777, true);
			}
				
			if($_SERVER['REQUEST_METHOD'] == "POST")
			{	
				
				$slug = str_to_url($_POST['title']);
				
				$query = "select id from $announcement->table where slug = :slug limit 1";
				$slug_row = $this->query($query, ['slug'=>$slug]);
		
				if($slug_row)
				{
					$slug .= rand(1000,9999);
				}
				if($announcement->validatee($_FILES, $_POST))
				{
					$destination = $folder . time() . $_FILES['image']['name'];
					move_uploaded_file($_FILES['image']['tmp_name'], $destination);

					$image_class = new Image();
					$image_class->resize($destination);

					$_POST['image'] = $destination;
					$_POST['slug']        = $slug;
					$announcement->insert($_POST);

					redirect('dashboard/announcement');
				}
			}
		}else
		if($action == 'edit')
		{

			$data['row'] = $announcement->first(['id'=>$id]);

			if($_SERVER['REQUEST_METHOD'] == "POST")
			{
				$folder = "uploads/";
				if(!file_exists($folder))
				{
					mkdir($folder, 0777, true);
				}
				if($announcement->validatee($_POST, $id))
				{
					if(!empty($_FILES['image']['name']))
					{
						$destination = $folder . time() . $_FILES['image']['name'];
						move_uploaded_file($_FILES['image']['tmp_name'], $destination);
						
						$image_class = new Image();
						$image_class->resize($destination);

						$_POST['image'] = $destination;

						if(file_exists($data['row']->image))
							unlink($data['row']->image);
					}
					
					$announcement->update($id, $_POST);

					redirect('dashboard/announcement');
				}
			}
		}else
		if($action == 'delete')
		{
			$data['row'] = $announcement->first(['id'=>$id]);

			if($_SERVER['REQUEST_METHOD'] == "POST")
			{
				$announcement->delete($id);

				if(file_exists($data['row']->image))
					unlink($data['row']->image);

				redirect('dashboard/announcement');
				
			}
		}

		$data['rows'] = $announcement->findAll();
		$data['errors'] = $announcement->errors;
		$data['announcement'] = $announcement;

		if( $ses->user('institute') == 'Admin')
		{
			$this->view('dashboard/announcement', $data);
		}else
		{
			$this->view('access-denied');
		}
		
	}

	public function teachers($action = null, $id = null)
	{
		
		$ses = new Session;
		if (!$ses->is_logged_in()) {

			redirect('login');
		}

		$data['title'] = "Teachers";
		$data['action'] = $action;
		$data['teachers'] = new Institution();
		
		$data['teachers']->table = 'teachers';
		$data['teachers']->order_type = 'asc';
		$data['teachers']->allowedColumns = [
			
			'image',
			'institution_id',
		    'name',
			'suffixes',
		  	'position',
			'isFullTime',
			'isDeptHead',
			'list_order',
	   ];

	   $query = "SELECT * FROM institutions AS a WHERE institution='college' AND disabled = 'active'";
	   $data['colleges'] = $this->query($query);

		if ($action == 'new') {

			if ($_SERVER['REQUEST_METHOD'] == "POST") {

				$folder = "uploads/";
				if(!file_exists($folder))
				{
					mkdir($folder, 0777, true);
				}

				if ($data['teachers']->validatee($_FILES, $_POST)) {

					$destination = $folder . time() . $_FILES['image']['name'];
					move_uploaded_file($_FILES['image']['tmp_name'], $destination);

					$image_class = new Image();
					$image_class->resize($destination);

					$_POST['image'] = $destination;

					$data['teachers']->insert($_POST);
					redirect('dashboard/teachers');
				}
			}
		}else
		if($action == 'edit')
		{
			$data['row'] = $data['teachers']->first(['id'=>$id]);

			if($_SERVER['REQUEST_METHOD'] == "POST")
			{
				$folder = "uploads/";
				if(!file_exists($folder))
				{
					mkdir($folder, 0777, true);
				}

				if($data['teachers']->validatee($_FILES, $_POST, $id))
				{
					if(!empty($_FILES['image']['name']))
					{
						$destination = $folder . time() . $_FILES['image']['name'];
						move_uploaded_file($_FILES['image']['tmp_name'], $destination);
						
						$image_class = new Image();
						$image_class->resize($destination);

						$_POST['image'] = $destination;

						if(file_exists($data['row']->image))
							unlink($data['row']->image);
					}
					
					$data['teachers']->update($id, $_POST);

					redirect('dashboard/teachers');
				}
			}
		}else
		if($action == 'delete')
		{

			$data['row'] = $data['teachers']->first(['id'=>$id]);

			if($_SERVER['REQUEST_METHOD'] == "POST")
			{
 
				$data['teachers']->delete($id);

				if(file_exists($data['row']->image))
					unlink($data['row']->image);
					
				redirect('dashboard/teachers');
			}
		}

		// all table
		$data['rows'] = $data['teachers']->findAll();

		$data['errors'] = $data['teachers']->errors;

		if( $ses->user('institute') == 'Admin')
		{
			$this->view('dashboard/teachers', $data);
		}else
		{
			$this->view('access-denied');
		}
		
	}

	public function organization_advisers($action = null, $id = null)
	{
		
		$ses = new Session;
		$data['ses'] = new Session;
		if (!$ses->is_logged_in()) {

			redirect('login');
		}

		$data['title'] = "Advisers";
		$data['action'] = $action;
		$data['organization_advisers'] = new Institution();
		
		$data['organization_advisers']->table = 'advisers';
		$data['organization_advisers']->order_type = 'asc';
		$data['organization_advisers']->allowedColumns = [
			
			'image',
			'institution_id',
		    'adviser_name',
		  	'position',
			'list_order',
	   ];

	   $query = "SELECT * FROM institutions WHERE institution='organization' AND disabled = 'active'";
	   $data['organizations'] = $this->query($query);

		if ($action == 'new') {

			if ($_SERVER['REQUEST_METHOD'] == "POST") {

				$folder = "uploads/";
				if(!file_exists($folder))
				{
					mkdir($folder, 0777, true);
				}

				if ($data['organization_advisers']->validatee($_FILES, $_POST)) {

					$destination = $folder . time() . $_FILES['image']['name'];
					move_uploaded_file($_FILES['image']['tmp_name'], $destination);

					$image_class = new Image();
					$image_class->resize($destination);

					$_POST['image'] = $destination;

					$data['organization_advisers']->insert($_POST);
					redirect('dashboard/organization_advisers');
				}
			}
		}else
		if($action == 'edit')
		{
			$data['row'] = $data['organization_advisers']->first(['id'=>$id]);

			if($_SERVER['REQUEST_METHOD'] == "POST")
			{
				$folder = "uploads/";
				if(!file_exists($folder))
				{
					mkdir($folder, 0777, true);
				}

				if($data['organization_advisers']->validatee($_FILES, $_POST, $id))
				{
					if(!empty($_FILES['image']['name']))
					{
						$destination = $folder . time() . $_FILES['image']['name'];
						move_uploaded_file($_FILES['image']['tmp_name'], $destination);
						
						$image_class = new Image();
						$image_class->resize($destination);

						$_POST['image'] = $destination;

						if(file_exists($data['row']->image))
							unlink($data['row']->image);
					}
					
					$data['organization_advisers']->update($id, $_POST);

					redirect('dashboard/organization_advisers');
				}
			}
		}else
		if($action == 'delete')
		{

			$data['row'] = $data['organization_advisers']->first(['id'=>$id]);

			if($_SERVER['REQUEST_METHOD'] == "POST")
			{
 
				$data['organization_advisers']->delete($id);

				if(file_exists($data['row']->image))
					unlink($data['row']->image);
					
				redirect('dashboard/organization_advisers');
			}
		}

		$id = $ses->user('id');
		$query  = "select institutions.name FROM institutions JOIN users ON users.role = institutions.id WHERE users.id = $id";
		$orgname = $this->query($query);
		$role = $orgname[0]->name;

		// all table
		$insitution = $ses->user('institute');
		if($insitution == 'Admin')
		{
			$query = "select advisers.*, institutions.name FROM advisers JOIN institutions ON advisers.institution_id = institutions.id WHERE institutions.institution = 'organization' AND institutions.disabled = 'Active'";
		}
		if($insitution == 'organization')
		{
			$query = "select advisers.*, institutions.name FROM advisers JOIN institutions ON advisers.institution_id = institutions.id WHERE institutions.name = '$role'" ;
		}

		$data['rows'] = $this->query($query);

		$data['errors'] = $data['organization_advisers']->errors;

		if( $ses->user('institute') == 'Admin' || $ses->user('institute') == 'organization')
		{
			$this->view('dashboard/organization_advisers', $data);
		}else
		{
			$this->view('access-denied');
		}
		
	}

	// Organization
	public function contact_info($action = null, $id = null)
	{

		$ses = new Session;
		if (!$ses->is_logged_in()) {

			redirect('login');
		}

		$data['title'] = "School's Contact Infomation";
		$data['action'] = $action;

		$contact_info = new Institution();
		$contact_info->table = 'contact_info';
		$contact_info->allowedColumns = [
			
			'facebook_link',
		    'email',
			'password',
			'phone',
		  	'address',
	   ];

		if($action == 'edit')
		{

			$data['row'] = $contact_info->first(['id'=>$id]);

			if($_SERVER['REQUEST_METHOD'] == "POST")
			{
				$contact_info->errors = [];

				if(empty($_POST['phone']))
				{
					$contact_info->errors['phone'] = "Phone number is required";
				}else
				if(!preg_match('/^[0-9]{11}+$/', $_POST['phone']))
				{
					$contact_info->errors['phone'] = "Phone number is not valid";
				}

				if(empty($contact_info->errors))
				{
					$contact_info->update($id, $_POST);

					redirect('dashboard/contact_info');
				}
						
			}
		}

		$data['rows'] = $contact_info->findAll();
		$data['errors'] = $contact_info->errors;
		$data['contact_info'] = $contact_info;

		if( $ses->user('institute') == 'Admin')
		{
			$this->view('dashboard/contact_info', $data);
		}else
		{
			$this->view('access-denied');
		}
	}

	public function about_school($action = null, $id = null)
	{
		
		$ses = new Session;
		if (!$ses->is_logged_in()) {

			redirect('login');
		}

		$data['title'] = "About School";
		$data['action'] = $action;
		$data['about_school'] = new About_school();

		if($action == 'edit')
		{
			$data['row'] = $data['about_school']->first(['id'=>$id]);

			if($_SERVER['REQUEST_METHOD'] == "POST")
			{
				$folder = "uploads/";
				if(!file_exists($folder))
				{
					mkdir($folder, 0777, true);
				}

				if($data['about_school']->validatee($_FILES, $_POST, $id))
				{
					if(!empty($_FILES['video']['name']))
					{
						$destination = $folder . time() . $_FILES['video']['name'];
						move_uploaded_file($_FILES['video']['tmp_name'], $destination);
	
						$_POST['video'] = $destination;

						if(file_exists($data['row']->video))
							unlink($data['row']->video);
					}
					
					$data['about_school']->update($id, $_POST);

					redirect('dashboard/about_school');
				}
			}
		}

		// all table
		$data['rows'] = $data['about_school']->findAll();

		$data['errors'] = $data['about_school']->errors;

		if( $ses->user('institute') == 'Admin')
		{
			$this->view('dashboard/about_school', $data);
		}else
		{
			$this->view('access-denied');
		}
	}

	public function settings($action = null, $id = null)
	{
		
		$ses = new Session;
		if (!$ses->is_logged_in()) {

			redirect('login');
		}

		$data['title'] = "Settings";
		$data['action'] = $action;
		$data['settings'] = new Settings();


		if ($action == 'new') {

			if ($_SERVER['REQUEST_METHOD'] == "POST") {

				$folder = "uploads/";
				if(!file_exists($folder))
				{
					mkdir($folder, 0777, true);
				}

				if ($data['settings']->validatee($_FILES, $_POST)) {

					$data['settings']->insert($_POST);
					redirect('dashboard/settings');
				}
			}
		}else
		if($action == 'edit')
		{
			$data['row'] = $data['settings']->first(['id'=>$id]);

			if($_SERVER['REQUEST_METHOD'] == "POST")
			{
				$folder = "uploads/";
				if(!file_exists($folder))
				{
					mkdir($folder, 0777, true);
				}

				if($data['settings']->validatee($_FILES, $_POST, $id))
				{
					if(!empty($_FILES['value']['name']))
					{
						$destination = $folder . time() . $_FILES['value']['name'];
						move_uploaded_file($_FILES['value']['tmp_name'], $destination);
						
						$image_class = new Image();
						$image_class->resize($destination);

						$_POST['value'] = $destination;

						if(file_exists($data['row']->value))
							unlink($data['row']->value);
					}

					$data['settings']->update($id, $_POST);

					redirect('dashboard/settings');
				}
			}
		}else
		if($action == 'delete')
		{

			$data['row'] = $data['settings']->first(['id'=>$id]);

			if($_SERVER['REQUEST_METHOD'] == "POST")
			{
 
				$data['settings']->delete($id);

				if(file_exists($data['row']->value))
					unlink($data['row']->value);
					
				redirect('dashboard/settings');
			}
		}

		$data['rows'] = $data['settings']->findAll();

		$data['errors'] = $data['settings']->errors;

		if( $ses->user('institute') == 'Admin')
		{
			$this->view('dashboard/settings', $data);
		}else
		{
			$this->view('access-denied');
		}
		
	}

	public function history($action = null, $id = null)
	{
		
		$ses = new Session;
		if (!$ses->is_logged_in()) {

			redirect('login');
		}

		$data['title'] = "history";
		$data['action'] = $action;
		$data['history'] = new History_model();


		if ($action == 'new') {

			if ($_SERVER['REQUEST_METHOD'] == "POST") {

				$folder = "uploads/";
				if(!file_exists($folder))
				{
					mkdir($folder, 0777, true);
				}

				if ($data['history']->validatee($_FILES, $_POST)) {
					
					$destination = $folder . time() . $_FILES['image']['name'];
					move_uploaded_file($_FILES['image']['tmp_name'], $destination);

					$image_class = new Image();
					$image_class->resize($destination);

					$_POST['image'] = $destination;

					$data['history']->insert($_POST);
					redirect('dashboard/history');
				}
			}
		}else
		if($action == 'edit')
		{
			$data['row'] = $data['history']->first(['id'=>$id]);

			if($_SERVER['REQUEST_METHOD'] == "POST")
			{
				$folder = "uploads/";
				if(!file_exists($folder))
				{
					mkdir($folder, 0777, true);
				}

				if($data['history']->validatee($_FILES, $_POST, $id))
				{
					if(!empty($_FILES['image']['name']))
					{
						$destination = $folder . time() . $_FILES['image']['name'];
						move_uploaded_file($_FILES['image']['tmp_name'], $destination);
						
						$image_class = new Image();
						$image_class->resize($destination);

						$_POST['image'] = $destination;

						if(file_exists($data['row']->image))
							unlink($data['row']->image);
					}
				
					$data['history']->update($id, $_POST);

					redirect('dashboard/history');
				}
			}
		}else
		if($action == 'delete')
		{

			$data['row'] = $data['history']->first(['id'=>$id]);

			if($_SERVER['REQUEST_METHOD'] == "POST")
			{
 
				$data['history']->delete($id);

				if(file_exists($data['row']->value))
					unlink($data['row']->value);
					
				redirect('dashboard/history');
			}
		}

		$data['rows'] = $data['history']->findAll();

		$data['errors'] = $data['history']->errors;

		if( $ses->user('institute') == 'Admin')
		{
			$this->view('dashboard/history', $data);
		}else
		{
			$this->view('access-denied');
		}
		
	}

	public function news_categories($action = null, $id = null)
	{

		$ses = new Session;
		if (!$ses->is_logged_in()) {

			redirect('login');
		}

		$data['title'] = "News Categories";
		$data['action'] = $action;

		$news_categories = new Institution();
		$news_categories->table = 'news_categories';
		$news_categories->allowedColumns = [
		    'name',
			'slug',
		  	'disabled',
	   ];

		if($action == 'new')
		{
			if($_SERVER['REQUEST_METHOD'] == "POST")
			{
				$slug = str_to_url($_POST['name']);
				
				$query = "select id from $news_categories->table where slug = :slug limit 1";
				$slug_row = $this->query($query, ['slug'=>$slug]);
		
				if($slug_row)
				{
					$slug .= rand(1000,9999);
				}
				
				if($news_categories->validatee($_FILES, $_POST))
				{
					$_POST['slug']        = $slug;

					$news_categories->insert($_POST);

					redirect('dashboard/news_categories');
				}
			}
		}else
		if($action == 'edit')
		{

			$data['row'] = $news_categories->first(['id'=>$id]);

			if($_SERVER['REQUEST_METHOD'] == "POST")
			{

				if($news_categories->validatee($_POST, $id))
				{
 
					$news_categories->update($id, $_POST);

					redirect('dashboard/news_categories');
				}
			}
		}else
		if($action == 'delete')
		{
			$data['row'] = $news_categories->first(['id'=>$id]);

			if($_SERVER['REQUEST_METHOD'] == "POST")
			{
				$news_categories->delete($id);

				redirect('dashboard/news_categories');
				
			}
		}

		$data['errors'] = $news_categories->errors;

		$query = "select * from $news_categories->table";
		$data['rows'] = $this->query($query);

		$data['$news_categories'] = $news_categories;

		
		if( $ses->user('institute') == 'Admin')
		{
			$this->view('dashboard/news_categories', $data);
		}else
		{
			$this->view('access-denied');
		}
		
	}

	public function news($action = null, $id = null)
	{
		
		$ses = new Session;
		if (!$ses->is_logged_in()) {

			redirect('login');
		}

		$data['title'] = "news";
		$data['action'] = $action;

		// Categories
		$adminNewsCategories = new Institution();

		$adminNewsCategories->table = 'news_categories';
		$adminNewsCategories->allowedColumns = [
			
		 	'category',
			'slug',
			'disabled',
		];
		
		$adminNewsCategories->order_type = 'desc';
		$adminNewsCategories->limit = 10;
		$data['categories'] = $adminNewsCategories->findAll();

		// News
		$data['news'] = new Institution();
		
		$data['news']->table = 'news';
		$data['news']->allowedColumns = [
			
			'category_id',
		    'title',
			'description',
		  	'image',
			'date',
			'author',
			'slug',
			'isHeadline',
			'isArchived',
	   ];

	   // all table
		$data['rows'] = $data['news']->findAll();

		if ($action == 'new') {

			if ($_SERVER['REQUEST_METHOD'] == "POST") {

				$folder = "uploads/";
				if(!file_exists($folder))
				{
					mkdir($folder, 0777, true);
				}

				$slug = str_to_url($_POST['title']);
				
				$query = "select id from news where slug = :slug limit 1";
				$slug_row = $this->query($query, ['slug'=>$slug]);
		
				if($slug_row)
				{
					$slug .= rand(1000,9999);
				}

				if ($data['news']->validatee($_FILES, $_POST)) {

					$destination = $folder . time() . $_FILES['image']['name'];
					move_uploaded_file($_FILES['image']['tmp_name'], $destination);

					$image_class = new Image();
					$image_class->resize($destination);

					$_POST['image'] = $destination;
					$_POST['slug']  = $slug;
					
					$data['news']->insert($_POST);
					redirect('dashboard/news');
				}
			}
		}else
		if($action == 'edit')
		{
			$data['row'] = $data['news']->first(['id'=>$id]);

			if($_SERVER['REQUEST_METHOD'] == "POST")
			{
				$folder = "uploads/";
				if(!file_exists($folder))
				{
					mkdir($folder, 0777, true);
				}

				if($data['news']->validatee($_FILES, $_POST, $id))
				{
					if(!empty($_FILES['image']['name']))
					{
						$destination = $folder . time() . $_FILES['image']['name'];
						move_uploaded_file($_FILES['image']['tmp_name'], $destination);
						
						$image_class = new Image();
						$image_class->resize($destination);

						$_POST['image'] = $destination;

						if(file_exists($data['row']->image))
							unlink($data['row']->image);
					}
					
					$data['news']->update($id, $_POST);

					redirect('dashboard/news');
				}
			}
		}else
		if($action == 'delete')
		{

			$data['row'] = $data['news']->first(['id'=>$id]);

			if($_SERVER['REQUEST_METHOD'] == "POST")
			{
 
				$data['news']->delete($id);

				if(file_exists($data['row']->image))
					unlink($data['row']->image);
					
				redirect('dashboard/news');
			}
		}

		$data['errors'] = $data['news']->errors;

		if( $ses->user('institute') == 'Admin')
		{
			$this->view('dashboard/news', $data);
		}else
		{
			$this->view('access-denied');
		}
	}
	public function faq($action = null, $id = null)
	{
		$ses = new Session;
		if (!$ses->is_logged_in()) {

			redirect('login');
		}

		$data['title'] = "FAQS";
		$data['action'] = $action;
		
		$faq = new Institution();
		$faq->table = 'faqs';
		$faq->order_type = 'asc';
		$faq->allowedColumns = [

			'question',
			'answer',
			'list_order',
		];

		if($action == 'new')
		{
			if($_SERVER['REQUEST_METHOD'] == "POST")
			{
				
				if($faq->validatee($_FILES, $_POST))
				{
		
					$faq->insert($_POST);

					redirect('dashboard/faq');
				}
			}
		}else
		if($action == 'edit')
		{

			$data['row'] = $faq->first(['id'=>$id]);

			if($_SERVER['REQUEST_METHOD'] == "POST")
			{

				if($faq->validatee($_POST, $id))
				{
 
					$faq->update($id, $_POST);

					redirect('dashboard/faq');
				}
			}
		}else
		if($action == 'delete')
		{
			$data['row'] = $faq->first(['id'=>$id]);

			if($_SERVER['REQUEST_METHOD'] == "POST")
			{
				$faq->delete($id);

				redirect('dashboard/faq');
				
			}
		}

		$data['rows'] = $faq->findAll();
		$data['errors'] = $faq->errors;
		$data['faq'] = $faq;

		if( $ses->user('institute') == 'Admin')
		{
			$this->view('dashboard/faq', $data);
		}else
		{
			$this->view('access-denied');
		}
		
	}

	public function album($action = null, $id = null)
	{
		$ses = new Session;
		if (!$ses->is_logged_in()) {

			redirect('login');
		}

		$data['title'] = "News Categories";
		$data['action'] = $action;

		$album = new Institution();
		$album->table = 'album';
		$album->allowedColumns = [

		    'album_name',
			'image',
		  	'date_created',
			'slug'
	   ];

		if($action == 'new')
		{
			if($_SERVER['REQUEST_METHOD'] == "POST")
			{
				
				$folder = "uploads/";
				if(!file_exists($folder))
				{
					mkdir($folder, 0777, true);
				}

				$slug = str_to_url($_POST['album_name']);
				
				$query = "select id from news where slug = :slug limit 1";
				$slug_row = $this->query($query, ['slug'=>$slug]);
		
				if($slug_row)
				{
					$slug .= rand(1000,9999);
				}

				if($album->validatee($_FILES, $_POST))
				{
					$destination = $folder . time() . $_FILES['image']['name'];
					move_uploaded_file($_FILES['image']['tmp_name'], $destination);

					$image_class = new Image();
					$image_class->resize($destination);

					$_POST['image'] = $destination;
					$_POST['slug']  = $slug;
					$album->insert($_POST);

					redirect('dashboard/album');
				}
			}
		}else
		if($action == 'edit')
		{
			$data['row'] = $album->first(['id'=>$id]);

			$folder = "uploads/";
			if(!file_exists($folder))
			{
				mkdir($folder, 0777, true);
			}

			if($_SERVER['REQUEST_METHOD'] == "POST")
			{

				if($album->validatee($_POST, $id))
				{
					if(!empty($_FILES['image']['name']))
					{
						$destination = $folder . time() . $_FILES['image']['name'];
						move_uploaded_file($_FILES['image']['tmp_name'], $destination);
						
						$image_class = new Image();
						$image_class->resize($destination);

						$_POST['image'] = $destination;

						if(file_exists($data['row']->image))
							unlink($data['row']->image);
					}

					$album->update($id, $_POST);

					redirect('dashboard/album');
				}
			}
		}else
		if($action == 'delete')
		{
			$data['row'] = $album->first(['id'=>$id]);

			if($_SERVER['REQUEST_METHOD'] == "POST")
			{
				$album->delete($id);

				if(file_exists($data['row']->value))
					unlink($data['row']->value);
				
				redirect('dashboard/album');
			}
		}

		$data['errors'] = $album->errors;

		$query = "select * from $album->table";
		$data['rows'] = $this->query($query);

		$data['album'] = $album;

		
		if( $ses->user('institute') == 'Admin')
		{
			$this->view('dashboard/album', $data);
		}else
		{
			$this->view('access-denied');
		}
	}
	public function gallery($action = null, $id = null)
	{
		$ses = new Session;
		if (!$ses->is_logged_in()) {

			redirect('login');
		}

		$data['title'] = "Gallery";
		$data['action'] = $action;

		// Album
		$album = new Institution();

		$album->table = 'album';
		$album->allowedColumns = [
			
			'album_name',
			'image',
		  	'date_created',
		];
		$album->order_type = 'desc';
		$data['albums'] = $album->findAll();

		// Gallery
		$gallery = new Institution();
		$gallery->table = 'gallery';
		$gallery->allowedColumns = [

		    'album_id',
			'image',
		  	'image_name',
	   ];

		if($action == 'new')
		{
			if($_SERVER['REQUEST_METHOD'] == "POST")
			{
				$folder = "uploads/";
				if(!file_exists($folder))
				{
					mkdir($folder, 0777, true);
				}

				if($gallery->validatee($_FILES, $_POST))
				{
					$destination = $folder . time() . $_FILES['image']['name'];
					move_uploaded_file($_FILES['image']['tmp_name'], $destination);

					$image_class = new Image();
					$image_class->resize($destination);

					$_POST['image'] = $destination;

					$gallery->insert($_POST);

					redirect('dashboard/gallery');
				}
			}
		}else
		if($action == 'edit')
		{
			$data['row'] = $gallery->first(['id'=>$id]);

			$folder = "uploads/";
			if(!file_exists($folder))
			{
				mkdir($folder, 0777, true);
			}

			if($_SERVER['REQUEST_METHOD'] == "POST")
			{

				if($gallery->validatee($_POST, $id))
				{
					if(!empty($_FILES['image']['name']))
					{
						$destination = $folder . time() . $_FILES['image']['name'];
						move_uploaded_file($_FILES['image']['tmp_name'], $destination);
						
						$image_class = new Image();
						$image_class->resize($destination);

						$_POST['image'] = $destination;

						if(file_exists($data['row']->image))
							unlink($data['row']->image);
					}

					$gallery->update($id, $_POST);

					redirect('dashboard/gallery');
				}
			}
		}else
		if($action == 'delete')
		{
			$data['row'] = $gallery->first(['id'=>$id]);

			if($_SERVER['REQUEST_METHOD'] == "POST")
			{
				$gallery->delete($id);

				if(file_exists($data['row']->value))
					unlink($data['row']->value);
				
				redirect('dashboard/gallery');
			}
		}

		$data['errors'] = $gallery->errors;

		$query = "select * from $gallery->table";
		$data['rows'] = $this->query($query);

		$data['gallery'] = $gallery;

		
		if( $ses->user('institute') == 'Admin')
		{
			$this->view('dashboard/gallery', $data);
		}else
		{
			$this->view('access-denied');
		}
	}

	public function academic_calendar($action = null, $id = null)
	{

		$ses = new Session;
		if (!$ses->is_logged_in()) {

			redirect('login');
		}

		$data['title'] = "News Categories";
		$data['action'] = $action;

		$academic_calendar = new Institution();
		$academic_calendar->table = 'academic_calendar';
		$academic_calendar->allowedColumns = [
		    'title',
			'date',
		  	'type',
			'list_order',
	   ];

		if($action == 'new')
		{
			if($_SERVER['REQUEST_METHOD'] == "POST")
			{
				
				
				if($academic_calendar->validatee($_FILES, $_POST))
				{
					$academic_calendar->insert($_POST);

					redirect('dashboard/academic_calendar');
				}
			}
		}else
		if($action == 'edit')
		{

			$data['row'] = $academic_calendar->first(['id'=>$id]);

			if($_SERVER['REQUEST_METHOD'] == "POST")
			{

				if($academic_calendar->validatee($_POST, $id))
				{
 
					$academic_calendar->update($id, $_POST);

					redirect('dashboard/academic_calendar');
				}
			}
		}else
		if($action == 'delete')
		{
			$data['row'] = $academic_calendar->first(['id'=>$id]);

			if($_SERVER['REQUEST_METHOD'] == "POST")
			{
				$academic_calendar->delete($id);

				redirect('dashboard/academic_calendar');
				
			}
		}

		$data['errors'] = $academic_calendar->errors;

		$query = "select * from $academic_calendar->table";
		$data['rows'] = $this->query($query);

		$data['academic_calendar'] = $academic_calendar;

		
		if( $ses->user('institute') == 'Admin')
		{
			$this->view('dashboard/academic_calendar', $data);
		}else
		{
			$this->view('access-denied');
		}
		
	}
}

