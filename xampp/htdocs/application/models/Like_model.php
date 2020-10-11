<?php
class Like_model extends CI_Model {
	public function __construct(){
		parent::__construct();
	}

	public function like($productid){
		$this->load->helper('array');

		//start session
		$this->load->library('session');

		//reconnect to the database
		$this->load->database();
//
//		$sql = "SELECT likes FROM product WHERE productid = ?";
//		$query = $this->db->query($sql, $productid);
		$sql_like = "UPDATE product SET likes = likes+1 WHERE productid = ?";
		$query_like = $this->db->query($sql_like, $productid);

//		$sql = "SELECT * FROM product WHERE productid= ?";
//		$query = $this->db->query($sql, array($productid));
//		$row = $query->row();
//		foreach ($query->result_array() as $row) {
//			$num_like = $row['likes'];
//			$new_like = $num_like + 1;
//			$sql_like = "UPDATE product SET likes = ? WHERE productid = ?";
//			$this->db->query($sql_like, array($new_like, $productid));
//			break;

	}
}
