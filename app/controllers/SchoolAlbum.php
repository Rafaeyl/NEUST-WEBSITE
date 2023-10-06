<?php 

namespace Controller;
use Model\Institution;
use Model\Settings;
use Model\Database;

defined('ROOTPATH') OR exit('Access Denied!');

/**
 * NewsDetail class
 */
class SchoolAlbum
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

		$data['title'] = "School Album";
			
        $this->view('schoolAlbum', $data);
	
	}

}
