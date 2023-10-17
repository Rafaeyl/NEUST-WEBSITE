<?php 

namespace Controller;
use Model\Institution;
use Model\Settings;
use Model\Database;

defined('ROOTPATH') OR exit('Access Denied!');

/**
 * NewsDetail class
 */
class Gallery
{
	use MainController;
	use Database;
	public function index()
	{
		$institutions = new Institution();
		$institutions->order_type = 'asc';

		// college
		$college = "select * from institutions where institution='college' and disabled='Active' LIMIT 10";
		$data['colleges'] = $this->query($college);

		// organization
		$organization = "select * from institutions where institution='organization' and disabled='Active' LIMIT 20";
		$data['organizations'] = $this->query($organization);

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

		// settings
		$settings = new Settings();
		$data['settings'] = $settings->findAll();

		$data['SETTINGS'] = [];
		if ($data['settings']) {
			foreach ($data['settings'] as $setting_row) {
				$data['SETTINGS'][$setting_row->setting] = $setting_row->value;
			}
		}

		// News detailes
		$url = $_GET['url'] ?? 'home';
        $url = strtolower($url);
        $url = explode("/", $url);

        $data['slug'] = $url[1] ?? 'home';
        $slug = $data['slug'];

		$data['title'] = "School Album";

        if($slug)
        {
			$sql = "select gallery_images.*, gallery.title from gallery_images join gallery on gallery_images.gallery_id = gallery.id where gallery.id = '$slug' LIMIT 8";
			$data['rows']  = $this->query($sql);

			$sql = "select gallery.title from gallery join gallery_images on gallery_images.gallery_id = gallery.id where gallery.id = '$slug' limit 1";
			$data['gallery_name']  = $this->query($sql);

			// Pagination
			$page_query = "SELECT COUNT(gallery_images.id) AS galleries_total FROM gallery_images LEFT JOIN gallery ON gallery_images.gallery_id = gallery.id WHERE gallery.id = '$slug' ";

			$query =  $this->query($page_query);
			$data['galleries_total'] = $query[0]->galleries_total;

			$this->view('gallery', $data);
		}else{
			$this->view('404');
		}
	}
}
