<?php
class Register extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->helper(array('form', 'url'));

	}

	public function index(){

		$this->load->view('style_sheet');
		//load session
		$this->load->library('session');

		//load helper and the form validations
		$this->load->library('form_validation');
		$this->load->helper('form');

		//create rules
		$this->form_validation->set_rules('register_username', 'resusername', 'required');
		$this->form_validation->set_rules('register_email', 'resemail', 'required');
		$this->form_validation->set_rules('register_password', 'password', 'required|min_length[8]|alpha_numeric|callback_password_check');
		$this->form_validation->set_rules('register_password_cfrm', 'passwordcnfrm', 'required');

		//reload the same page if the registration fails
		if ($this->form_validation->run() == FALSE){
			$this->load->view('register');
		} else {
			//load model
			$this->load->model('register_model');

			$this->register_model->register_input();

			//only log in when the resgister is valid
			if (isset($_SESSION['signin_valid'])){
				//success page is the home page
				$this->load->view('header');
				$this->load->view('index');
				$this->load->view('footer');
			} else {
				//reload the page if the validation fails
				$this->load->view('register');
			}


		}

	}
	public function password_check($str)
	{
		if (preg_match('#[0-9]#', $str) && preg_match('#[a-zA-Z]#', $str)) {
			return TRUE;
		}
		$this->form_validation->set_message('password_check', "password must be alphaneumeric");
		return FALSE;
	}

}

