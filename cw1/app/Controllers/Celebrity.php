<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\CelebrityModel;

class Celebrity extends BaseController
{
	public function index()
	{
		echo view('template/header');
		echo view('add_new_celebrity');
		echo view('template/footer');
	}

	public function add(){
		return view('add_new_celebrity');
	}

	public function store()
    {  
 
        helper(['form', 'url']);
         
        $model = new CelebrityModel();
		$tempData = $model->orderBy('id', 'DESC')->findAll();//Arrnge celebrtiy in descendng order
		$nextId = null;
		foreach ($tempData as &$val){
			$nextId =intval($val['id']) + 1 ;
			break;
		}
        $data = [ //save inserted celebrity data into an array
			'id' => $nextId,
            'name' => $this->request->getVar('name'),
            'img_url'  => $this->request->getVar('img_url')
            ];
		
		if( ($data['name']  == null) or (($data['img_url']  == null))){  //validation

			echo view('template/header');
			echo '<div class="alert alert-danger" role="alert">
			Please fill the form correctly and click the submit button!
		  </div>';
			echo view('add_new_celebrity');
			echo view('template/footer');
		}
		else{ //message if successful
			$save = $model->insert($data);

			echo view('template/header');
			echo '<div class="alert alert-success" role="alert">
			you successfully added a celebrity details in to database
		  </div>';
			echo view('add_new_celebrity');
			echo view('template/footer');

		}

		}	

 
    }
	//--------------------------------------------------------------------


