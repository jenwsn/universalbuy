<?php

class Post_model extends CI_Model{
	public function __construct() {
		parent::__construct();
	}
	public function post_item($file_path) {
	$this->load->helper('array');
	$this->load->library('session');
	$six_digit_random_number = mt_rand(100000, 999999);
	$path = implode(',',$file_path );
	$data = array(
		'productid' => 	$six_digit_random_number,
		'name' =>substr($path, 0, strpos($path, ".")),
		'description' => "this is a test post",
		'price' =>100,
		'path' =>   implode(',',$file_path ) ,
		'likes' => 0,
		'username' =>  $_SESSION['email']
	);
	$this->load->database();
	$this->db->insert('product', $data);
	}
}
