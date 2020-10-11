<?php
class Profile_model extends CI_Model {
	public function __construct(){
		parent::__construct();
	}

	public function get_info(){
		//load cookie helper
		$this->load->helper('cookie');

		//start session
		$this->load->library('session');

		//reconnect to the database
		$this->load->database();

		//indentify the current user
		$email = $_SESSION['email'];


		//prepare data array
		$data = array(
			'' => $_SESSION['email'],
			'first_name'=> null,
			'last_name'=> null,
		);

		$sql = "SELECT * FROM users WHERE email = ?";
		$query = $this->db->query($sql,array($email));
		$row = $query->row();

		if(isset($row)){
			//prepare data array
			$data = array(
				'email' => $_SESSION['email'],
				'first_name'=> $row->first_name,
				'last_name'=> $row->last_name
			);
		}
		return $data;

	}

	public function do_edit(){
		//load cookie helper
		$this->load->helper('cookie');

		//start session
		$this->load->library('session');

		//reconnect to the database
		$this->load->database();

		//indentify the current user
		$email= $_SESSION['email'];

		//prepare data array
		$data = array(
			'email' => $_SESSION['email'],
			'password' => $_SESSION['password'],
			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),
		);

		$this->db->where('email', $_SESSION['email']);
		$this->db->update('users', $data);
	}


}
