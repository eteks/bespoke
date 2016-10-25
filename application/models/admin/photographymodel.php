<?php
class Photographymodel extends CI_Model {
	public function __construct()
	{
		//$this->load->database();
	}
	public function insert_photoshoot_type($data)
	{	
		// echo "insert_photoshoot_type";
		// Query to insert data in database
		$this->db->insert('shopping_photo_shoot_display_details', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		}
		return false;
	}
	public function get_photoshoot_type()
	{	
		//get list of photoshoot_type from database using mysql query 
		$this->db->select('*');
		$this->db->from('shopping_photo_shoot_display_details');
		$this->db->order_by('display_createddate','desc');	
		$query = $this->db->get();
		
		//return all records in array format to the controller
		return $query->result_array();
	}
}