<?php
class Cart_model extends CI_Model {
	public function __construct(){
		parent::__construct();
	}

	public function save_Item($cart_data){
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
}
