<?php 

namespace Controller;
use Model\Database;
use Model\Institution;
use Model\Settings;

defined('ROOTPATH') OR exit('Access Denied!');

/**
 * Category class
 */
class Category
{
	use MainController;
	use Database;
	public function index()
	{
		
		$data['title'] = 'News Categories';

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

		// Latest News
		$news = new Institution();
		
		$news->table = 'news';
		$news->allowedColumns = [
			
			'category_id',
		    'title',
			'description',
		  	'image',
			'date',
			'slug',
	   ];

		$news->order_type = 'desc';
		$news->limit = 5;
		$data['latest_news'] = $news->findAll();

		// News detailes
		$url = $_GET['url'] ?? 'home';
        $url = strtolower($url);
        $url = explode("/", $url);

        $data['slug'] = $url[1] ?? 'home';
        $slug = $data['slug'];
        
         if($slug)
        {
			$sql = "select news.*, news_categories.name from news join news_categories on news.category_id = news_categories.id where news_categories.slug = '$slug'";
			$data['rows']  = $this->query($sql);
			
		}
		$this->view('category', $data);
	}
}
