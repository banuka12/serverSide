<?php

namespace App\Controllers;

use App\Models\CelebrityModel;
use App\Models\UserModel;

class Quiz extends BaseController
{
	protected $session;

	public function __construct()
	{
		$this->session = \Config\Services::session();
		$this->session->start();
	}

	public function index()
	{
		//return redirect()->to('home');
	}

	public function start()
	{
		helper(['form', 'url']);

		$thisSession = [
			'name' => $this->request->getVar('name'),
			'score' => '0',

		];
		$this->session->set($thisSession);


		return redirect()->to(base_url('quiz/question/1'));
	}

	public function getSession() //to test session
	{
		$mySession = session();
		echo $mySession->get('name');
	}
	public function delSession() //to test session
	{
		$mySession = session();
		$mySession->destroy();
	}
	//score calculate
	public function scoreCal($answer) //mistake
	{
		$last_correct_answer_num = null;
		$last_answer_num = null;


		if ($this->request->getVar('answer') == '1') { //check form answer in previous page
			$last_answer_num = 1;
		} else if ($this->request->getVar('answer') == '2') {
			$last_answer_num = 2;
		}

		$last_correct_answer_num = intval(session()->get('lca')); //get last correct answer and score
		$score = intval(session()->get('score'));

		if ($last_correct_answer_num == $last_answer_num) { //check last answer is correct
			$score = $score + 1; // increase score value
			session()->set('score', $score); //add score to the session
		}
	}

	//display final score
	public function yourScore()
	{
		$answer = $this->request->getVar('answer');
		$this->scoreCal($answer);

		$data = [
			'name' => session()->get('name'),  //sent to view
			'score' => session()->get('score'),
			'title' => "Your Score",
		];

		$model = new UserModel(); //create a usermodel
		$score_data = [  //sent to databse
 
            'name' => session()->get('name'),
            'score'  => session()->get('score'),
            ];
		$save = $model->insert($score_data);

		echo view('template/header');
		echo view('your_score',$data);
		echo view('template/footer');
	}





	public function question($id)
	{
		if( session()->get('name') == null){ //checks whether name is inserted
			echo view('template/header');
			echo '<div class="alert alert-danger" role="alert">
			Please fill the form correctly and click the submit button!
		  </div>';
			echo view('begin');
			echo view('template/footer');
		}
		else{

		//generate answers for quiz
		$model = new CelebrityModel();
		$current_question_num = $id; //current question number
		$next_question_num = $id + 1; //next question number
		$total_questions = $model->countAllResults(); // total number of questions 
		$current_correct_answer_num = rand(1, 2); //correct answer place
		$correct_answer_details = $model->find($id); //get id data from database for correct answe
		$wrong_answer_id = rand(1, $total_questions); // generate wrong answer id
		while ($wrong_answer_id == $current_question_num) { //if wrong answer same as correct answer, generate another wrong answer
			$wrong_answer_id = rand(1, $total_questions);
		}
		$wrong_answer_details = $model->find($wrong_answer_id); // wrong answer details
		$first_answer = null;
		$second_answer = null;

		if ($current_correct_answer_num == 1) {
			$first_answer = $correct_answer_details;
			$second_answer = $wrong_answer_details;
		} else {
			$first_answer = $wrong_answer_details;
			$second_answer = $correct_answer_details;
		}

		if ($current_question_num == 1) //check whether the question is first question
		{

			session()->set('lca', $current_correct_answer_num);
		}

		if ($current_question_num != 1) //check whether the question is not first question
		{
			$answer = $this->request->getVar('answer');
			$this->scoreCal($answer);
			session()->set('lca', $current_correct_answer_num);

		}

		if ($current_question_num == $total_questions) { //check whether last question, if last question go score board
			$next_url = base_url() . "/quiz/yourScore";
		} else {
			$next_url = base_url() . "/quiz/question/" . $next_question_num;
		}


		$data = [ 
			'name' => session()->get('name'),
			'score' => session()->get('score'),
			'title' => "Quiz",
			'current_question_num' => $current_question_num,
			'next_question_num' => $next_question_num,
			'total_questions' => $total_questions,
			'question' => $correct_answer_details,
			'first_answer' => $first_answer,
			'second_answer' => $second_answer,
			'next_url' => $next_url,
		];

		echo view('template/header');
		echo view('quiz', $data);
		echo view('template/footer');
	}
}

	//--------------------------------------------------------------------

}
