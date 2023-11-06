<?php 

namespace Controller;

defined('ROOTPATH') OR exit('Access Denied!');

class Forgot
{
	use MainController;
	
	public function index()
	{
		$data['title'] = "Forgot Password";
		$this->view('forgot',$data);
	}
}
