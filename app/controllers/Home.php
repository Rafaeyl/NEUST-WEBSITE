<?php

namespace Controller;

use Model\About_school;
use Model\History_model;
use \Model\Institution;
use \Model\Settings;
use \Model\Officials;
use Model\Database;

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

//Load Composer's autoloader
require ROOT . '/assets/PHPMailer/src/Exception.php';
require ROOT . '/assets/PHPMailer/src/PHPMailer.php';
require ROOT . '/assets/PHPMailer/src/SMTP.php';

defined('ROOTPATH') or exit('Access Denied!');

/**
 * home class
 */
class Home
{
	use MainController;
	use Database;
	public function index()
	{

		$institutions             = new Institution();
		$institutions->order_type = 'asc';

		// college
		$college          = "select * from institutions where institution='college' and disabled='Active' LIMIT 10";
		$data['colleges'] = $this->query($college);

		// organization
		$organization          = "select * from institutions where institution='organization' and disabled='Active' LIMIT 20";
		$data['organizations'] = $this->query($organization);

		// Contact Infomation
		$contact_info                 = new Institution();
		$contact_info->table          = 'contact_info';
		$contact_info->allowedColumns = [

			'facebook_link',
			'email',
			'phone',
			'address',
		];
		$data['school_contact']       = $contact_info->findAll();
		$contact_school               = $data['school_contact'];
		// Announcements
		$announcement                 = new Institution();
		$announcement->table          = 'announcements';
		$announcement->order_column   = 'list_order';
		$announcement->order_type     = 'desc';
		$announcement->allowedColumns = [

			'description',
			'list_order',
			'disabled',
		];
		$data['announcements']        = $announcement->whereInstitution('disabled', 'Active');

		// Teachers
		$teachers = new Officials();

		$teachers->table          = 'teachers';
		$teachers->allowedColumns = [

			'image',
			'name',
			'suffixes',
			'position',
		];
		$teachers->order_column   = 'list_order';
		$data['teachers']         = $teachers->findAll();

		// settings
		$settings         = new Settings();
		$data['settings'] = $settings->findAll();

		$data['SETTINGS'] = [];
		if ($data['settings']) {
			foreach ($data['settings'] as $setting_row) {
				$data['SETTINGS'][$setting_row->setting] = $setting_row->value;
			}
		}

		// About School
		$about_school         = new About_school();
		$data['about_school'] = $about_school->findAll();

		// url
		$url = $_GET['url'] ?? 'home';
		$url = strtolower($url);
		$url = explode("/", $url);

		$data['slug'] = $url[1] ?? 'home';

		// News
		$news = new Institution();

		$news->table          = 'news';
		$news->order_type    = 'desc';
		$news->limit         = 4;
		$sql                 = "select news.*, news_categories.name from news join news_categories on news.category_id = news_categories.id WHERE news.isArchived='no' order by $news->order_column $news->order_type limit $news->limit offset $news->offset";
		$data['news']        = $this->query($sql);
		$data['news_footer'] = $this->query_row($sql);

		// SldiwShow
		$slideShow = new Institution();

		$slideShow->table      = 'news';
		$slideShow->order_type = 'desc';
		$slideShow->limit      = 10;
		$sql                   = "select news.*, news_categories.name from news join news_categories on news.category_id = news_categories.id WHERE news.isArchived='no' and news.isHeadline = 'Yes' order by $slideShow->order_column $slideShow->order_type limit $slideShow->limit offset $slideShow->offset";
		$data['slideShow']     = $this->query($sql);

		// News
		$news = new Institution();


		$sql_gallery  = "SELECT gallery_images.file_name from gallery join gallery_images on gallery_images.gallery_id = gallery.id where gallery.id = (SELECT id as p FROM `gallery` ORDER BY id desc limit 1)";
		$data['gallery_home'] = $this->query($sql_gallery);

		$sql_name  = "SELECT gallery.title from gallery join gallery_images on gallery_images.gallery_id = gallery.id where gallery.id = (SELECT id as p FROM `gallery` ORDER BY id desc limit 1) limit 1";
		$data['gallery_name'] = $this->query($sql_name);

		// Contact Form - Send Email
		try {
			if (isset($_POST['send'])) {
				$name    = htmlentities($_POST["name"]);
				$email   = htmlentities($_POST["email"]);
				$subject = htmlentities($_POST["subject"]);
				$message = htmlentities($_POST["message"]);

				$mail = new PHPMailer(true);
				$mail->isSMTP();
				$mail->Host     = "smtp.gmail.com";
				$mail->SMTPAuth = true;

				$mail->Username = $contact_school['email'];
				$mail->Password = $contact_school['password'];

				$mail->Port       = 465;
				$mail->SMTPSecure = 'ssl';
				$mail->isHTML(true);
				$mail->setFrom($email, $name);
				$mail->addAddress($contact_school['email']);

				$mail->Subject = ("$email ($subject)");
				$mail->Body    = $message;

				if ($mail->send()) {
					$_SESSION['status'] = "Message Sent!";
				}
			}
		} catch (Exception $e) {
			$_SESSION['error'] = "Please check your Gmail and Gmail app password again!";
		} catch (\Exception $e) { //The leading slash means the Global PHP Exception class will be caught
			echo $e->getMessage(); //Boring error messages from anything else!
		}
		$data['title'] = "Home";
		$this->view('home', $data);
	}

	public function contact()
	{
		$institutions             = new Institution();
		$institutions->order_type = 'asc';

		// college
		$college          = "select * from institutions where institution='college' and disabled='Active' LIMIT 10";
		$data['colleges'] = $this->query($college);

		// organization
		$organization          = "select * from institutions where institution='organization' and disabled='Active' LIMIT 20";
		$data['organizations'] = $this->query($organization);

		// Contact Infomation
		$contact_info                 = new Institution();
		$contact_info->table          = 'contact_info';
		$contact_info->allowedColumns = [

			'facebook_link',
			'email',
			'phone',
			'address',
		];
		$data['school_contact']       = $contact_info->findAll();
		$school_contact               = $data['school_contact'];

		// settings
		$settings         = new Settings();
		$data['settings'] = $settings->findAll();

		$data['SETTINGS'] = [];
		if ($data['settings']) {
			foreach ($data['settings'] as $setting_row) {
				$data['SETTINGS'][$setting_row->setting] = $setting_row->value;
			}
		}

		// url
		$url = $_GET['url'] ?? 'home';
		$url = strtolower($url);
		$url = explode("/", $url);

		$data['slug'] = $url[1] ?? 'home';

		// News
		$news = new Institution();

		$news->table         = 'news';
		$news->order_type    = 'desc';
		$news->limit         = 1;
		$sql                 = "select news.*, news_categories.name from news join news_categories on news.category_id = news_categories.id  order by $news->order_column $news->order_type limit $news->limit offset $news->offset";
		$data['news_footer'] = $this->query_row($sql);
		// News End

		// Contact Form - Send Email

		try {


			if (isset($_POST['send'])) {
				$name    = htmlentities($_POST["name"]);
				$email   = htmlentities($_POST["email"]);
				$subject = htmlentities($_POST["subject"]);
				$message = htmlentities($_POST["message"]);

				$mail = new PHPMailer(true);
				$mail->isSMTP();
				$mail->Host     = "smtp.gmail.com";
				$mail->SMTPAuth = true;

				$school_email   = $school_contact[0]->email;
				$email_password = $school_contact[0]->password;

				$mail->Username = $school_email;
				$mail->Password = $email_password;

				$mail->Port       = 465;
				$mail->SMTPSecure = 'ssl';
				$mail->isHTML(true);
				$mail->setFrom($email, $name);
				$mail->addAddress("villanuevarafaeljr129@gmail.com");

				$mail->Subject = ("$email ($subject)");
				$mail->Body    = $message;

				if ($mail->send()) {
					$_SESSION['status'] = "Message Sent!";
				}
			}
		} catch (Exception $e) {
			$_SESSION['error'] = "Please check your Gmail and Gmail app password again!";
		} catch (\Exception $e) { //The leading slash means the Global PHP Exception class will be caught
			echo $e->getMessage(); //Boring error messages from anything else!
		}



		$data['title'] = "Contact";
		$this->view('home/contact', $data);

	}

	public function teachers()
	{
		$institutions             = new Institution();
		$institutions->order_type = 'asc';

		// college
		$college          = "select * from institutions where institution='college' and disabled='Active' LIMIT 10";
		$data['colleges'] = $this->query($college);

		// organization
		$organization          = "select * from institutions where institution='organization' and disabled='Active' LIMIT 20";
		$data['organizations'] = $this->query($organization);

		// Contact Infomation
		$contact_info                 = new Institution();
		$contact_info->table          = 'contact_info';
		$contact_info->allowedColumns = [

			'facebook_link',
			'email',
			'phone',
			'address',
		];
		$data['school_contact']       = $contact_info->findAll();
		$school_info                  = $data['school_contact'];


		// settings
		$settings         = new Settings();
		$data['settings'] = $settings->findAll();

		$data['SETTINGS'] = [];
		if ($data['settings']) {
			foreach ($data['settings'] as $setting_row) {
				$data['SETTINGS'][$setting_row->setting] = $setting_row->value;
			}
		}

		// Teachers
		$teachers = new Officials();

		$teachers->table          = 'teachers';
		$teachers->allowedColumns = [

			'image',
			'name',
			'suffixes',
			'position',
			'list_order',
		];
		$teachers->order_column   = 'list_order';
		$data['teachers']         = $teachers->findAll();

		// url
		$url = $_GET['url'] ?? 'home';
		$url = strtolower($url);
		$url = explode("/", $url);

		$data['slug'] = $url[1] ?? 'home';

		// News
		$news = new Institution();

		$news->table         = 'news';
		$news->order_type    = 'desc';
		$news->limit         = 1;
		$sql                 = "select news.*, news_categories.name from news join news_categories on news.category_id = news_categories.id  order by $news->order_column $news->order_type limit $news->limit offset $news->offset";
		$data['news_footer'] = $this->query_row($sql);
		// News End

		$data['title'] = "Teachers";
		$this->view('home/teachers', $data);
	}

	public function mission()
	{
		// url
		$url = $_GET['url'] ?? 'home';
		$url = strtolower($url);
		$url = explode("/", $url);

		$data['slug'] = $url[1] ?? 'home';

		$institutions             = new Institution();
		$institutions->order_type = 'asc';

		// college
		$college          = "select * from institutions where institution='college' and disabled='Active' LIMIT 10";
		$data['colleges'] = $this->query($college);

		// organization
		$organization          = "select * from institutions where institution='organization' and disabled='Active' LIMIT 20";
		$data['organizations'] = $this->query($organization);

		// Contact Infomation
		$contact_info                 = new Institution();
		$contact_info->table          = 'contact_info';
		$contact_info->allowedColumns = [

			'facebook_link',
			'email',
			'phone',
			'address',
		];
		$data['school_contact']       = $contact_info->findAll();
		$school_info                  = $data['school_contact'];


		// settings
		$settings         = new Settings();
		$data['settings'] = $settings->findAll();

		$data['SETTINGS'] = [];
		if ($data['settings']) {
			foreach ($data['settings'] as $setting_row) {
				$data['SETTINGS'][$setting_row->setting] = $setting_row->value;
			}
		}

		// News
		$news = new Institution();

		$news->table         = 'news';
		$news->order_type    = 'desc';
		$news->limit         = 1;
		$sql                 = "select news.*, news_categories.name from news join news_categories on news.category_id = news_categories.id  order by $news->order_column $news->order_type limit $news->limit offset $news->offset";
		$data['news_footer'] = $this->query_row($sql);
		// News End

		$data['title'] = "Mission and Vision";
		$this->view('home/mission', $data);
	}

	public function march()
	{
		// url
		$url = $_GET['url'] ?? 'home';
		$url = strtolower($url);
		$url = explode("/", $url);

		$data['slug'] = $url[1] ?? 'home';

		$institutions             = new Institution();
		$institutions->order_type = 'asc';

		// college
		$college          = "select * from institutions where institution='college' and disabled='Active' LIMIT 10";
		$data['colleges'] = $this->query($college);

		// organization
		$organization          = "select * from institutions where institution='organization' and disabled='Active' LIMIT 20";
		$data['organizations'] = $this->query($organization);

		// Contact Infomation
		$contact_info                 = new Institution();
		$contact_info->table          = 'contact_info';
		$contact_info->allowedColumns = [

			'facebook_link',
			'email',
			'phone',
			'address',
		];
		$data['school_contact']       = $contact_info->findAll();
		$school_info                  = $data['school_contact'];


		// settings
		$settings         = new Settings();
		$data['settings'] = $settings->findAll();

		$data['SETTINGS'] = [];
		if ($data['settings']) {
			foreach ($data['settings'] as $setting_row) {
				$data['SETTINGS'][$setting_row->setting] = $setting_row->value;
			}
		}

		// News
		$news = new Institution();

		$news->table         = 'news';
		$news->order_type    = 'desc';
		$news->limit         = 1;
		$sql                 = "select news.*, news_categories.name from news join news_categories on news.category_id = news_categories.id  order by $news->order_column $news->order_type limit $news->limit offset $news->offset";
		$data['news_footer'] = $this->query_row($sql);
		// News End

		$data['title'] = "NEUST March";
		$this->view('home/march', $data);
	}

	public function history()
	{
		// url
		$url = $_GET['url'] ?? 'home';
		$url = strtolower($url);
		$url = explode("/", $url);

		$data['slug'] = $url[1] ?? 'home';

		$institutions             = new Institution();
		$institutions->order_type = 'asc';

		// college
		$college          = "select * from institutions where institution='college' and disabled='Active' LIMIT 10";
		$data['colleges'] = $this->query($college);

		// organization
		$organization          = "select * from institutions where institution='organization' and disabled='Active' LIMIT 20";
		$data['organizations'] = $this->query($organization);

		// Contact Infomation
		$contact_info                 = new Institution();
		$contact_info->table          = 'contact_info';
		$contact_info->allowedColumns = [

			'facebook_link',
			'email',
			'phone',
			'address',
		];
		$data['school_contact']       = $contact_info->findAll();


		// settings
		$settings         = new Settings();
		$data['settings'] = $settings->findAll();

		$data['SETTINGS'] = [];
		if ($data['settings']) {
			foreach ($data['settings'] as $setting_row) {
				$data['SETTINGS'][$setting_row->setting] = $setting_row->value;
			}
		}

		// History
		$history = new History_model;

		$history->order_type   = 'asc';
		$history->limit        = 10;
		$history->order_column = 'list_order';

		$data['histories'] = $history->findAll();
		// News
		$news = new Institution();

		$news->table         = 'news';
		$news->order_type    = 'desc';
		$news->limit         = 1;
		$sql                 = "select news.*, news_categories.name from news join news_categories on news.category_id = news_categories.id  order by $news->order_column $news->order_type limit $news->limit offset $news->offset";
		$data['news_footer'] = $this->query_row($sql);
		// News End

		$data['title'] = "History";
		$this->view('home/history', $data);
	}

	public function faqs()
	{
		// url
		$url = $_GET['url'] ?? 'home';
		$url = strtolower($url);
		$url = explode("/", $url);

		$data['slug'] = $url[1] ?? 'home';

		$institutions             = new Institution();
		$institutions->order_type = 'asc';

		// college
		$college          = "select * from institutions where institution='college' and disabled='Active' LIMIT 10";
		$data['colleges'] = $this->query($college);

		// organization
		$organization          = "select * from institutions where institution='organization' and disabled='Active' LIMIT 20";
		$data['organizations'] = $this->query($organization);

		// Contact Infomation
		$contact_info                 = new Institution();
		$contact_info->table          = 'contact_info';
		$contact_info->allowedColumns = [

			'facebook_link',
			'email',
			'phone',
			'address',
		];
		$data['school_contact']       = $contact_info->findAll();


		// settings
		$settings         = new Settings();
		$data['settings'] = $settings->findAll();

		$data['SETTINGS'] = [];
		if ($data['settings']) {
			foreach ($data['settings'] as $setting_row) {
				$data['SETTINGS'][$setting_row->setting] = $setting_row->value;
			}
		}

		// History
		$faq                 = new Institution();
		$faq->table          = 'faqs';
		$faq->order_type     = 'asc';
		$faq->limit          = 10;
		$faq->order_column   = 'list_order';
		$faq->allowedColumns = [

			'question',
			'answer',
			'list_order',
		];

		$data['faqs'] = $faq->findAll();

		// News
		$news = new Institution();

		$news->table         = 'news';
		$news->order_type    = 'desc';
		$news->limit         = 1;
		$sql                 = "select news.*, news_categories.name from news join news_categories on news.category_id = news_categories.id  order by $news->order_column $news->order_type limit $news->limit offset $news->offset";
		$data['news_footer'] = $this->query_row($sql);
		// News End

		$data['title'] = "FAQs";
		$this->view('home/faqs', $data);
	}
	public function admission()
	{
		// url
		$url = $_GET['url'] ?? 'home';
		$url = strtolower($url);
		$url = explode("/", $url);

		$data['slug'] = $url[1] ?? 'home';

		$institutions             = new Institution();
		$institutions->order_type = 'asc';

		// college
		$college          = "select * from institutions where institution='college' and disabled='Active' LIMIT 10";
		$data['colleges'] = $this->query($college);

		// organization
		$organization          = "select * from institutions where institution='organization' and disabled='Active' LIMIT 20";
		$data['organizations'] = $this->query($organization);

		// Contact Infomation
		$contact_info                 = new Institution();
		$contact_info->table          = 'contact_info';
		$contact_info->allowedColumns = [

			'facebook_link',
			'email',
			'phone',
			'address',
		];
		$data['school_contact']       = $contact_info->findAll();
		$school_info                  = $data['school_contact'];


		// settings
		$settings         = new Settings();
		$data['settings'] = $settings->findAll();

		$data['SETTINGS'] = [];
		if ($data['settings']) {
			foreach ($data['settings'] as $setting_row) {
				$data['SETTINGS'][$setting_row->setting] = $setting_row->value;
			}
		}

		// News
		$news = new Institution();

		$news->table         = 'news';
		$news->order_type    = 'desc';
		$news->limit         = 1;
		$sql                 = "select news.*, news_categories.name from news join news_categories on news.category_id = news_categories.id  order by $news->order_column $news->order_type limit $news->limit offset $news->offset";
		$data['news_footer'] = $this->query_row($sql);
		// News End

		$data['title'] = "Admission";
		$this->view('home/admission', $data);
	}

	public function academic_calendar()
	{
		// url
		$url = $_GET['url'] ?? 'home';
		$url = strtolower($url);
		$url = explode("/", $url);

		$data['slug'] = $url[1] ?? 'home';

		$institutions             = new Institution();
		$institutions->order_type = 'asc';

		// college
		$college          = "select * from institutions where institution='college' and disabled='Active' LIMIT 10";
		$data['colleges'] = $this->query($college);

		// organization
		$organization          = "select * from institutions where institution='organization' and disabled='Active' LIMIT 20";
		$data['organizations'] = $this->query($organization);

		// Contact Infomation
		$contact_info                 = new Institution();
		$contact_info->table          = 'contact_info';
		$contact_info->allowedColumns = [

			'facebook_link',
			'email',
			'phone',
			'address',
		];
		$data['school_contact']       = $contact_info->findAll();

		// settings
		$settings         = new Settings();
		$data['settings'] = $settings->findAll();

		$data['SETTINGS'] = [];
		if ($data['settings']) {
			foreach ($data['settings'] as $setting_row) {
				$data['SETTINGS'][$setting_row->setting] = $setting_row->value;
			}
		}
		
		// Calendar
		$academic_calendar                 = new Institution();
		$academic_calendar->table          = 'academic_calendar';
		$academic_calendar->order_type     = 'asc';
		$academic_calendar->order_column   = 'list_order';
		$academic_calendar->allowedColumns = [
			'title',
			'date',
		  	'type',
			'list_order',
		];

		$sql                 = "select * FROM $academic_calendar->table WHERE type= 'general' order by $academic_calendar->order_column $academic_calendar->order_type ";
		$data['general'] = $this->query($sql);

		$sql1                = "select * FROM $academic_calendar->table WHERE type= 'holiday' order by $academic_calendar->order_column $academic_calendar->order_type ";
		$data['holiday'] = $this->query($sql1);

		$data['title'] = "Academic Calendar";
		$this->view('home/academic_calendar', $data);
	}

}