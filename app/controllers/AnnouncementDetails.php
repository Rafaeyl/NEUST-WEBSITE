<?php 

namespace Controller;
use Model\Institution;
use Model\Settings;
use Model\Database;

defined('ROOTPATH') OR exit('Access Denied!');

/**
 * NewsDetail class
 */
class AnnouncementDetails
{
	use MainController;
	use Database;
	public function index()
	{
        $data['title'] = "Announcement Details";
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

        $announcement = new Institution();
		$announcement->table = 'announcements';
		$announcement->order_type = 'asc';
		$announcement->allowedColumns = [

			'description',
			'list_order',
			'disabled',
			'slug',
		];

        // News detailes
		$url = $_GET['url'] ?? 'home';
        $url = strtolower($url);
        $url = explode("/", $url);

        $data['slug'] = $url[1] ?? 'home';
        $slug = $data['slug'];

        $data['title'] = "Announcement Detail";

        if($slug)
        {
			$sql = "select * FROM announcements WHERE slug = '$slug'";
			$data['row']  = $this->query_row($sql);
			
			$sql = "select * FROM announcements WHERE slug <> '$slug'";
			$data['announce']  = $this->query($sql);

            $this->view('announcementDetails', $data);
		}
		
	}

}
