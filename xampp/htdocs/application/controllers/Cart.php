<?php

class Cart extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('array');
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->library('session');
	}

	public function index(){
		//load url helper
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->helper('form');

		//reconnect to the database
		$this->load->database();

		//load model
		$this->load->model('Cart_model');

		//load pages
		$this->load->view('header');
		$this->load->view('cart');
		$this->load->view('footer');
	}

	public function add(){
		$data = array(
			"username" => $_SESSION['username'],
			"productid" => $this->uri->segment(3)
		);

		//load model
		$this->load->model('Cart_model');

		//save the item
		$this->Cart_model->save_Item($data);
	}

	public function remove() {
		$data = array(
			"username" => $_POST["username"],
			"productid" => $_POST["productid"]
		);

		//load model
		$this->load->model('Cart_model');

		//save the item
		$this->Cart_model->remove_Item($data);
	}
}
