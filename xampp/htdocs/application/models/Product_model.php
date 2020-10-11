<?php

class Product_model extends CI_Model{
	public function __construct() {
		parent::__construct();
	}

	public function get_item_info($productid) {
		//reconnect to the database
		$this->load->database();

		//array helper
		$this->load->helper('array');

		//prepare data array
		$data = array(
			'productid' => $productid,
			'name'=> null,
			'description'=> null,
			'price'=> null,
			'path'=> null
		);

		$sql = "SELECT * FROM product WHERE productid = ?";
		$query = $this->db->query($sql, array($productid));
		$row = $query->row();

		if(isset($row)) {
			//assign data array
			$data = array(
				'productid' => $productid,
				'name'=> $row->name,
				'description'=> $row->description,
				'price'=> $row->price,
				'path'=> $row->path,
			);
		}

		return $data;
	}
	public function save_Item($cart_data){
		//start session
		$this->load->library('session');

		//reload database
		$this->load->database();

		//load helper array
		$this->load->helper('array');

		$this->db->insert('favorite', $cart_data);
	}

	public function remove_Item($cart_data){
		//reload database
		$this->load->database();

		//load helper array
		$this->load->helper('array');

		$this->db->delete('favorite', $cart_data);
	}

	public function do_edit($productid) {
		$this->load->helper('array');
		$this->load->library('session');
		$data = array(
			'name' => $this->input->post('name'),
			'description' => $this->input->post('description'),
			'price' => $this->input->post('price'),
		);
		$this->load->database();
		$this->db->where('productid', $productid);
		$this->db->update('product', $data);

	}

	public function get_comments($productid){
		//reconnect to the database
		$this->load->database();

		//array helper
		$this->load->helper('array');

		$data = array(
			'productid' => $productid,
			'email'=> null,
			'body'=> null
		);
		$sql = "SELECT * FROM comments WHERE productid =  ?";
		$query = $this->db->query($sql, array($productid));
		$row = $query->row();
		if(isset($row)) {
			//assign data array
			$data = array(
				'productid' => $productid,
				'email'=> $row->email,
				'body'=> $row->body
			);
		}
		return $data;
	}

	public function create_comment($productid){
		//reconnect to the database
		$this->load->database();
		//array helper
		$this->load->helper('array');
		$this->load->helper('cookie');
		$this->load->library('session');

		$data = [
			'productid'=>$productid,
			'email'=>$_SESSION['email'],
			'body'=>$this->input->post('body')
		];
		return $this->db->insert('comments',$data);

	}
}
