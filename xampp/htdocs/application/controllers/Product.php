<?php

class Product extends CI_Controller {
	public function __constructor() {
		parent::__constructor();
		$this->load->helper('url');
	}
	public function index()
	{
		//load url helper
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->helper('form');

		//load session
		$this->load->library('session');

		//get item id
		$productid = $this->uri->segment(3);

		//load model
		$this->load->model('Product_model');

		//get item information

		$productinfo = $this->Product_model->get_item_info($productid);
		$comments = $this->Product_model->get_comments($productid);
		$pass_data = array_merge($productinfo, $comments);

		//show the item information
		$this->load->view('header');
		$this->load->view('product', $pass_data);

	}

	public function loadEditPage(){
		//load url helper
		$this->load->helper('url');

		//load array helper
		$this->load->helper('array');

		//load session
		$this->load->library('session');

		//load helper and the form validations
		$this->load->library('form_validation');
		$this->load->helper('form');

		//load model
		$this->load->model('Product_model');

		//get profile information
		$productid = $this->uri->segment(3);
		$information = $this->Product_model->get_item_info($productid);
		$this->load->view('header');
		$this->load->view('edit_product', $information);
		$this->load->view('footer');
	}

	public function edit(){
		//load url helper
		$this->load->helper('url');

		//load array helper
		$this->load->helper('array');

		//load session
		$this->load->library('session');

		//load helper and the form validations
		$this->load->library('form_validation');
		$this->load->helper('form');

		//load model
		$this->load->model('Product_model');

		//process edit
		$productid = $this->uri->segment(3);
		$this->Product_model->do_edit($productid);

		//reload to the profile page
		$this->index();
	}

public function add_cart(){
		//load url helper
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->helper('form');
		//load session
		$this->load->library('session');
		$productid = $this->uri->segment(3);

		if (isset($_SESSION['email'])){
			$cart_data = array(
				"username" => $_SESSION['email'],
				"productid" => $productid);

			//load model
			$this->load->model('Product_model');

			//save the item
			$this->Product_model->save_Item($cart_data);
		} else {
			//reload the page if the validation fails
			$this->session->set_flashdata('login_error', "Please Log in or Register to add to your cart");
		}
		//go back to previous page
		$page_id = $this->uri->segment(1);
		if($page_id === 'Product'){
			$this->load->view('header');
			$this->load->view('index');
			$this->load->view('footer');
		}
	}

	public function remove() {
		//load session
		$this->load->library('session');
		$cart_data = array(
			"username" => $_SESSION['username'],
			"productid" => $this->uri->segment(3)
		);

		//load model
		$this->load->model('Product_model');

		//save the item
		$this->Product_model->remove_Item($cart_data);
	}

	public function comment(){
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->model('Product_model');
		$productid = $this->uri->segment(3);
		$this->form_validation->set_rules('body','Body','required');
		if($this->form_validation->run() === TRUE){
			$this->Product_model->create_comment($productid);
		}
		redirect(base_url().'Product/index/'. $productid);
		}

}
