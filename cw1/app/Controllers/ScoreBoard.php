<?php namespace App\Controllers;

use App\Models\UserModel;

class ScoreBoard extends BaseController
{    protected $model;
	public function index()
	{
		$model = new UserModel();
 
		$data['users'] = $model->orderBy('score', 'DESC')->findAll(); //order score in descending order
		
        echo view('template/header');
        echo view('score_board', $data);
		echo view('template/footer');
	//--------------------------------------------------------------------

	}

}