<?php

class Entry extends CI_Controller {

	public function index() {

		//load helper and the form validations
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->view('style_sheet');
		$this->load->model('Entry_model');

		//Check if cookie was set. autologin when valid
		$this->load->helper('cookie');
		if(isset($_COOKIE['username']) && isset($_COOKIE['pass'])){
			$_SESSION['username'] = $_COOKIE['username'];
			$_SESSION['pass'] = $_COOKIE['pass'];
			$_SESSION['is_signed_in'] = 'yes';
		}
		$this->load->library('pagination');
		$config = array();
		$config['base_url'] = base_url('Entry/index');
		$config["total_rows"]= $this->Entry_model->get_count();
		$config["per_page"] = 3;

		$this->pagination->initialize($config);
		$data["links"] = $this->pagination->create_links();
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['product'] = $this->Entry_model->get_product($config["per_page"],$page);

		$this->load->view('header');
		$this->load->view('index', $data);
		$this->load->view('footer');
	}

}


?>

