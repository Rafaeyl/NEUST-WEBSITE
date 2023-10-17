<?php

namespace Controller;
use Model\Database;

defined('ROOTPATH') or exit('Access Denied!');

class GalleryAdmin
{
	use MainController;
	use Database;

	public function index()
	{
		$data['title'] = "Dashhome";
		$this->views('galleryAdmin/index', $data);
	}

    public function details()
	{
		$data['title'] = "Dashhome";
		$this->views('galleryAdmin/details', $data);
	}

    public function addEdit()
	{
		$data['title'] = "Dashhome";
		$this->views('galleryAdmin/addEdit', $data);
	}

    public function postAction()
	{
		$data['title'] = "Dashhome";
		$this->views('galleryAdmin/postAction', $data);
	}

  
}

