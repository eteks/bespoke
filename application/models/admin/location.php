<?php
class Location extends CI_Model {
	public function __construct()
	{
		//$this->load->database();
	}
	public function get_state()
	{	
		// just for sample
		// $query = $this->db->query("SELECT * FROM shopping_category WHERE category_status = 1");
		// $query = $this->db->get_where('shopping_category', array('category_status' => 1));
		// echo $query->num_rows();
		// return $query->row_array();

		//get list of categories from database using mysql query 
		$query = $this->db->query("SELECT * FROM shopping_state order 
			by state_createddate desc");		
		// echo "<pre>";
		// print_r($query->result());
		// echo "</pre>";
		//return all records in array format to the controller
		return $query->result_array();
	}
	public function insert_state($data)
	{	
		// Query to check whether state name already exist or not
		$condition = "state_name =" . "'" . $data['state_name'] . "'";
		$this->db->select('*');
		$this->db->from('shopping_state');
		$this->db->where($condition);
		// $this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 0) {
			// Query to insert data in database
			$this->db->insert('shopping_state', $data);
			if ($this->db->affected_rows() > 0) {
				return true;
			}
		} else {
			return false;
		}
	}	
	public function update_state($data)
	{	
		$condition = "state_name =" . "'" . $data['state_name'] . "' AND state_id NOT IN (". $data['state_id'].")";
		$this->db->select('*');
		$this->db->from('shopping_state');
		$this->db->where($condition);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return false;
		}
		else{
			$this->db->where('state_id', $data['state_id']);
			$this->db->update('shopping_state', $data);
			return true;
		}	
	}	
	public function get_state_data($id)
	{	
		$query = $this->db->get_where('shopping_state', array('state_id' => $id));
		return $query->row_array();
	}
	public function get_city()
	{	
		// just for sample
		// $query = $this->db->query("SELECT * FROM shopping_category WHERE category_status = 1");
		// $query = $this->db->get_where('shopping_category', array('category_status' => 1));
		// echo $query->num_rows();
		// return $query->row_array();

		//get list of categories from database using mysql query 
		$query = $this->db->query("SELECT * FROM shopping_city order 
			by city_createddate desc");		
		// echo "<pre>";
		// print_r($query->result());
		// echo "</pre>";
		//return all records in array format to the controller
		return $query->result_array();
	}
	public function insert_city($data)
	{	
		// Query to check whether state name already exist or not
		$condition = "city_name =" . "'" . $data['city_name'] . "'";
		$this->db->select('*');
		$this->db->from('shopping_city');
		$this->db->join('shopping_state', 'shopping_state.state_id = shopping_city.city_state_id','inner');
		$this->db->where($condition);
		// $this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 0) {
			// Query to insert data in database
			$this->db->insert('shopping_city', $data);
			if ($this->db->affected_rows() > 0) {
				return true;
			}
		} else {
			return false;
		}
	}
	// public function insert_city($data)
	// {	

	// 	$condition = '(city_name="'.$data['city_name'].'" and city_state_id="'.$data['city_state_id'].'")';

	// 	$query = $this->db->get_where('shopping_city',$condition);

	// 	if ($query->num_rows() == 0) {
	// 		// Query to insert data in database
	// 		$this->db->insert('shopping_city', $data);
	// 		// if ($this->db->affected_rows() > 0) {
	// 		// 	return true;
	// 		// }
	// 		return true;
	// 	}
	// 	else {
	// 		return false;
	// 	}
	// }
	public function update_city($data)
	{	
		$condition = "city_name =" . "'" . $data['city_name'] . "' AND city_id NOT IN (". $data['city_id'].")";
		$this->db->select('*');
		$this->db->from('shopping_city');
		$this->db->where($condition);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return false;
		}
		else{
			$this->db->where('city_id', $data['city_id']);
			$this->db->update('shopping_city', $data);
			return true;
		}	
	}	
	public function get_city_data($id)
	{	
		// echo $id;
		$where = '(city_id="'.$id.'")';
		$query['state_city'] = $this->db->get_where('shopping_city', $where)->row_array();

		$where1 = '(state_status=1)';
		$query['states'] = $this->db->get_where(' `shopping_state', $where1)->result_array();

		return $query;
	}
	// public function get_city_data($id)
	// {	
	// 	$query = $this->db->get_where('shopping_city', array('city_id' => $id));
	// 	return $query->row_array();
	// }
	public function get_cities()
	{
		$this->db->select('*');
		$this->db->from('shopping_city city');
		$this->db->join('shopping_state state', 'state.state_id = city.city_state_id', 'inner');
		$this->db->order_by('state.state_name','desc');
		return $this->db->get()->result_array();
	}
	public function get_area()
	{	
		// just for sample
		// $query = $this->db->query("SELECT * FROM shopping_category WHERE category_status = 1");
		// $query = $this->db->get_where('shopping_category', array('category_status' => 1));
		// echo $query->num_rows();
		// return $query->row_array();

		//get list of categories from database using mysql query 
		$query = $this->db->query("SELECT * FROM shopping_area order 
			by area_createddate desc");		
		// echo "<pre>";
		// print_r($query->result());
		// echo "</pre>";
		//return all records in array format to the controller
		return $query->result_array();
	}
//Get area data based on state
	public function get_ajax_area_data()
	 {
		//  Get area data based on citypublic 
		if($this->input->post('states_id')) 
		{
		$area_where='(city_state_id="'.$this->input->post('states_id').'" and city_status= 1)';
		$query = $this->db->get_where('shopping_city',$area_where)->result_array();
		}
		return $query;
	 }
	public function insert_area($data)
	{
		// Query to check whether area name already exist or not
		$condition = "area_name =" . "'" . $data['area_name'] . "'";
		$this->db->select('*');
		$this->db->from('shopping_area');
		$this->db->join('shopping_state', 'shopping_state.state_id = shopping_area.area_state_id','inner');
		$this->db->join('shopping_city', 'shopping_city.city_id = shopping_area.area_city_id','inner');
		$this->db->where($condition);
		// $this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 0) {
			// Query to insert data in database
			$this->db->insert('shopping_area', $data);
			if ($this->db->affected_rows() > 0) {
				return true;
			}
		} else {
			return false;
		}
	}
	public function update_area($data)
	{
		$condition = "area_name =" . "'" . $data['area_name'] . "' AND area_id NOT IN (". $data['area_id'].")";
		$this->db->select('*');
		$this->db->from('shopping_area');
		$this->db->where($condition);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return false;
		}
		else{
			$this->db->where('area_id', $data['area_id']);
			$this->db->update('shopping_area', $data);
			return true;
		}	
	}
	public function get_area_data($id)
	{	
		// echo $id;
		$where = '(area_id="'.$id.'")';
		$query['state_city'] = $this->db->get_where('shopping_area', $where)->row_array();
		$where1 = '(area_status=1)';
		$query['states'] = $this->db->get_where(' `shopping_area', $where1)->result_array();
		$query['cities'] = $this->db->get_where(' `shopping_area', $where1)->result_array();

		return $query;
	}
	public function get_areas()
	{
		$this->db->select('*');
		$this->db->from('shopping_area area');
		$this->db->join('shopping_state state', 'state.state_id = area.area_state_id', 'inner');
		$this->db->join('shopping_city city', 'city.city_id = area.area_city_id', 'inner');
		$this->db->order_by('state.state_name','desc');
		$this->db->order_by('city.city_name','desc');
		return $this->db->get()->result_array();
	}
	public function get_order()
	{	
		//get list of adminusers from database using mysql query 
		$this->db->select('*');
		$this->db->from('shopping_order');
		$this->db->order_by('order_createddate','desc');	
		$query = $this->db->get();
		//return all records in array format to the controller
		return $query->result_array();
	}
		public function update_order($data)
	{	
		$this->db->where('order_id', $data['order_id']);
		$this->db->update('shopping_order', $data);
		// trans_complete() function is used to check whether updated query successfully run or not
		if ($this->db->get() == false) {
			return false;
		}
		return true;	
	}	
		public function get_order_data($id)
	{	
		$where = '(order_id="'.$id.'")';
		$query['state_city'] = $this->db->get_where('shopping_order', $where)->row_array();
		$where1 = '(order_status=1)';
		$query['states'] = $this->db->get_where(' `shopping_order', $where1)->result_array();
		$query['cities'] = $this->db->get_where(' `shopping_order', $where1)->result_array();

		return $query;
	}
	public function get_orders()
	{
		$this->db->select('*');
		$this->db->from('shopping_order order');
		$this->db->join('shopping_state state', 'state.state_id = order.order_shipping_state_id', 'inner');
		$this->db->join('shopping_city city', 'city.city_id = order.order_shipping_city_id', 'inner');
		$this->db->join('shopping_area area', 'area.area_id = order.order_shipping_area_id', 'inner');
		$this->db->order_by('state.state_name','desc');
		$this->db->order_by('city.city_name','desc');
		$this->db->order_by('area.area_name','desc');
		return $this->db->get()->result_array();
	}
	public function get_orderitem()
	{	
		//get list of adminusers from database using mysql query 
		$this->db->select('*');
		$this->db->from('shopping_orderitem');
		$this->db->order_by('orderitem_createddate','desc');	
		$query = $this->db->get();
		//return all records in array format to the controller
		return $query->result_array();
	}
	public function update_orderitem($data)
	{	
		$this->db->where('orderitem_order_id', $data['orderitem_id']);
		$this->db->update('shopping_orderitem', $data);
		// trans_complete() function is used to check whether updated query successfully run or not
		if ($this->db->get() == false) {
			return false;
		}
		return true;	
	}
	public function get_orderitem_data($id)
	{	
		$query = $this->db->get_where('shopping_orderitem', array('orderitem_id' => $id));
		return $query->row_array();
	}
	public function get_ordersitem()
	{
		$this->db->select('*');
		$this->db->from('shopping_orderitem orderitem');
		$this->db->join('shopping_product product', 'product.product_id = orderitem.orderitem_product_id', 'inner');
		$this->db->order_by('product.product_title','desc');
		return $this->db->get()->result_array();
	}
	// public function get_transaction()
	// {	
	// 	//get list of adminusers from database using mysql query 
	// 	$this->db->select('*');
	// 	$this->db->from('shopping_ccavenue_transaction');
	// 	$this->db->order_by('transaction_createddate','desc');	
	// 	$query = $this->db->get();

	// 	//return all records in array format to the controller
	// 	return $query->result_array();
	// }
}