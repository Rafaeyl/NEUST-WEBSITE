<?php 

namespace Controller;
use \Model\Institution;
use \Model\Settings;
use Model\Database;
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

// require ROOT . '/assets/PHPMailer/src/Exception.php';
// require ROOT . '/assets/PHPMailer/src/PHPMailer.php';
// require ROOT . '/assets/PHPMailer/src/SMTP.php';

defined('ROOTPATH') OR exit('Access Denied!');

/**
 * Colleges class
 */
class Colleges
{
	use MainController;
	use Database;
	public function index()
	{
		$institutions = new Institution();
		$institutions->order_type = 'asc';

		$college = "select * from institutions where institution='college' and disabled='Active'";
		$data['colleges'] = $this->query($college);

		$organization = "select * from institutions where institution='organization' and disabled='Active'";
		$data['organizations'] = $this->query($organization);

		// settings
		$settings = new Settings();
		$data['settings'] = $settings->findAll();

		$data['SETTINGS'] = [];
		if ($data['settings']) {
			foreach ($data['settings'] as $setting_row) {
				$data['SETTINGS'][$setting_row->setting] = $setting_row->value;
			}
		}

		// Contact Infomation
		$contact_info = new Institution();
		$contact_info->table = 'contact_info';
		$contact_info->allowedColumns = [

			'facebook_link',
			'email',
			'phone',
			'address',
		];
		$data['school_contact'] = $contact_info->findAll();
		// 

		// News
		$news = new Institution();
	
		$news->table = 'news';
		$news->order_type = 'desc';
		$news->limit = 1;
		$sql = "select news.*, news_categories.name from news join news_categories on news.category_id = news_categories.id  order by $news->order_column $news->order_type limit $news->limit offset $news->offset";
		$data['news_footer'] = $this->query_row($sql);
		// News End

		$url = $_GET['url'] ?? 'home';
        $url = strtolower($url);
        $url = explode("/", $url);

        $data['slug'] = $url[1] ?? 'home';
        $slug = $data['slug'];

		

	
        
         if($slug)
        {
			// Colleges Info
            $sql = "select institutionsinfo.*, institutions.name, institutions.slug from institutionsinfo join institutions on institutionsinfo.institution = institutions.id where institutions.slug = '$slug' limit 1";
            $data['collegeInfo']  = $this->query_row($sql);

			$collegeInfo = $data['collegeInfo'];

			// Colleges About
			$sql = "select about.*, institutions.name, institutions.slug from about join institutions on about.institution = institutions.id where institutions.slug = '$slug' limit 1";
            $data['collegeAbout']  = $this->query_row($sql);

			// Colleges Official
			$sql = "select officials.*, institutions.slug from officials join institutions on officials.institution = institutions.id where institutions.slug = '$slug' order by officials.list_order";
            $data['collegeOfficials']  = $this->query($sql);

			// Teachers Start
			$query = "select teachers.* FROM teachers JOIN institutions ON teachers.institution_id = institutions.id WHERE institutions.slug = '$slug'";
			$data['teachers'] = $this->query($query);
			// Teachers end

			// Contact form - send email - php mailer
			// try{
			// 	if (isset($_POST['send'])) {
			// 		$name = htmlentities($_POST["name"]);
			// 		$email = htmlentities($_POST["email"]);
			// 		$subject = htmlentities($_POST["subject"]);
			// 		$message = htmlentities($_POST["message"]);

			// 		$mail = new PHPMailer(true);
			// 		$mail->isSMTP();
			// 		$mail->Host = "smtp.gmail.com";
			// 		$mail->SMTPAuth = true;

			// 		$mail->Username = "papayaoffc@gmail.com";
			// 		$mail->Password = "ixhn koab sbxo bovq";

			// 		$mail->Port = 465;
			// 		$mail->SMTPSecure = 'ssl';
			// 		$mail->isHTML(true);
			// 		$mail->setFrom($email, $name);
			// 		$mail->addAddress($collegeInfo['email'],$collegeInfo['name']);

			// 		$mail->Subject = ("$subject ($email)");
			// 		$mail->Body = $message;

			// 		if($mail->send())
			// 		{ 
			// 			$_SESSION['status'] = "Message Sent!";
			// 		}
			// 	}
        	// }catch (Exception $e) {
			// 	$_SESSION['error'] = "Please check your Gmail and Gmail app password again!";
			// } catch (\Exception $e) { //The leading slash means the Global PHP Exception class will be caught
			// 	echo $e->getMessage(); //Boring error messages from anything else!
			// }
	
        }

		$data['title'] = "Colleges";
		$this->view('colleges',$data);
	}

}
