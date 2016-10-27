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
	public function get_photoshoot_type_data($id)
	{	
		$query = $this->db->get_where('shopping_photo_shoot_display_details', array('display_id' => $id));
		return $query->row_array();
	}
	public function update_photoshoot_type($data)
	{	
		$this->db->where('display_id', $data['display_id']);
		$this->db->update('shopping_photo_shoot_display_details', $data);
		// trans_complete() function is used to check whether updated query successfully run or not
		if ($this->db->trans_complete() == false) {
			return false;
		}
		return true;	
	}	
	public function get_photoshoot_person_detail()
	{	
		//get list of photoshoot_person_detail from database using mysql query 
		$this->db->select('*');
		$this->db->from('shopping_photo_shoot_person_details pd');
		$this->db->join('shopping_photo_shoot_display_details pt','pd.person_display_id=pt.display_id','inner');
		$this->db->order_by('person_createddate','desc');	
		$query['person_result'] = $this->db->get()->result_array();

		//get list of photoshoot upload images
		$this->db->select('*');
		$this->db->from('shopping_photo_shoot_person_details AS pd');
		$this->db->join('shopping_photo_shoot_upload_image AS pimg', 'pimg.photo_shoot_person_mapping_id = pd.person_id', 'inner');
		$this->db->order_by('person_createddate','desc');
		$query['person_image'] = $this->db->get()->result_array();
		
		//return all records in array format to the controller
		return $query;
	}	
	public function insert_photoshoot_person_detail($data)
	{	
		$data_person_basic = $data['person_basic'];
		$data_person_photos = $data['person_photos'];
		// Query to insert data in database
		$this->db->insert('shopping_photo_shoot_person_details', $data_person_basic);
		//get inserted photoshoot person id to map in upload photos relationship table
		$person_id = $this->db->insert_id();
		foreach($data_person_photos as $key => $value) {
			$person_photos_map = array(
                					'photo_shoot_personsdfsd_mapping_id' => $person_id,
                					'photo_shoot_upload_image' => $value[0],
                					'photo_shoot_upload_image_status' => $value[1],
             						);
			$this->db->insert('shopping_photo_shoot_upload_image', $person_photos_map);
		}
		// if ($this->db->trans_status() === FALSE){
		//     $this->db->trans_rollback();
		//     return false;
		// }
		// else{
		//     $this->db->trans_commit();
		//     return true;
		// }
		if ($this->db->affected_rows() > 0) {
			return true;
		}
		return false;
	}	
}