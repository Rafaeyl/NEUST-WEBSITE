<?php 

namespace Controller;
use Model\Institution;
use Model\Settings;
use Model\Database;

defined('ROOTPATH') OR exit('Access Denied!');

/**
 * newsAndEvents class
 */
class NewsAndEvents
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

		// News Categories
		$news_categories = new Institution();
		$news_categories->table = 'news_categories';
		$news_categories->allowedColumns = [
		    'name',
			'slug',
		  	'disabled',
	   ];
	    $data['categories'] = $news_categories->findAll();

        $data['title'] = "News and Events";
     
		$sql = "select news.*, news_categories.name from news join news_categories on news.category_id = news_categories.id ORDER BY date desc limit 12";
		$data['rows']  = $this->query($sql);
		


		
		$this->view('newsAndEvents', $data);
		
	   
		
	}

}
