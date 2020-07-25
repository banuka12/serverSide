<?php namespace App\Controllers;

class Home extends BaseController
{
	public function __construct() {
		//session started
		$this->session = \Config\Services::session();
		$this->session->start();
		helper('url');
		  
}
	public function index()
	{
		session()->destroy();
		echo view('template/header');
		echo view('begin');
		echo view('template/footer');

	}

	//--------------------------------------------------------------------

}
