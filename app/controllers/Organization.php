<?php

namespace Controller;

use \Model\Institution;
use \Model\Settings;
use Model\Database;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require ROOT . '/assets/PHPMailer/src/Exception.php';
require ROOT . '/assets/PHPMailer/src/PHPMailer.php';
require ROOT . '/assets/PHPMailer/src/SMTP.php';

defined('ROOTPATH') or exit('Access Denied!');

/**
 * Organizations class
 */
class Organization
{

	use MainController;
	use Database;
	public function index()
	{
		$institutions             = new Institution();
		$institutions->order_type = 'asc';

		// Colleges
		$college          = "select * from institutions where institution='college' and disabled='Active'";
		$data['colleges'] = $this->query($college);

		// Organizations
		$organization          = "select * from institutions where institution='organization' and disabled='Active'";
		$data['organizations'] = $this->query($organization);

		// settings
		$settings         = new Settings();
		$data['settings'] = $settings->findAll();

		$data['SETTINGS'] = [];
		if ($data['settings']) {
			foreach ($data['settings'] as $setting_row) {
				$data['SETTINGS'][$setting_row->setting] = $setting_row->value;
			}
		}

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

		// News
		$news = new Institution();

		$news->table         = 'news';
		$news->order_type    = 'desc';
		$news->limit         = 1;
		$sql                 = "select news.*, news_categories.name from news join news_categories on news.category_id = news_categories.id  order by $news->order_column $news->order_type limit $news->limit offset $news->offset";
		$data['news_footer'] = $this->query_row($sql);
		// News End

		$url = $_GET['url'] ?? 'home';
		$url = strtolower($url);
		$url = explode("/", $url);

		$data['slug'] = $url[1] ?? 'home';
		$slug         = $data['slug'];

		if ($slug) {
			// Organizations Info
			$sql                      = "select institutionsinfo.*, institutions.name, institutions.slug from institutionsinfo join institutions on institutionsinfo.institution = institutions.id where institutions.slug = '$slug' limit 1";
			$data['organizationInfo'] = $this->query_row($sql);

			$organizationInfo = $data['organizationInfo'];

			// Organizations About
			$sql                       = "select about.*, institutions.name, institutions.slug from about join institutions on about.institution = institutions.id where institutions.slug = '$slug' limit 1";
			$data['organizationAbout'] = $this->query_row($sql);

			$sql                           = "select officials.*, institutions.slug from officials join institutions on officials.institution = institutions.id where institutions.slug = '$slug' order by officials.list_order";
			$data['organizationOfficials'] = $this->query($sql);

			// Contact form - send email - php mailer

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

					$mail->Username = $organizationInfo['email'];
					$mail->Password = $organizationInfo['password'];

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

		}
		$data['title'] = "Organization";
		$this->view('organization', $data);
	}

}