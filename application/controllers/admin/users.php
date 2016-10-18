<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/usersmodel');
		$this->load->model('admin/location');
		// Load form helper library
		$this->load->helper(array('form','custom'));
		// Load form validation library
		$this->load->library('form_validation');
	}
	public function adminusers()
	{	
		//get list of admin users from database and store it in array variable 'adminusers' with key 'adminusers_list'
		$adminusers['adminusers_list'] = $this->usersmodel->get_adminusers();
		
		//call the adminusers views i.e rendered page and pass the adminusers data in the array variable 'adminusers'
		$this->load->view('admin/adminusers',$adminusers);
	}
	public function add_adminusers()
	{	
		$this->load->view('admin/add_adminusers');
	}
	function edit_unique($value, $params) 
	{
		//get main CodeIgniter object
	    $CI =& get_instance();
	    //load database library
	    $CI->load->database();    
	    $CI->form_validation->set_message('edit_unique', "Sorry, that %s is already being used.");
	    list($table, $id, $field, $current_id) = explode(".", $params);    
	    $query = $CI->db->select()->from($table)->where($field, $value)->limit(1)->get();    
	    if ($query->row() && $query->row()->$id != $current_id)
	    {
	        return FALSE;
	    }
	}
	public function edit_adminusers()
	{	
		// $user_details = edit_unique();
		// echo $user_details;

		$id = $this->uri->segment(4);
		// echo "id".$id;
		if (empty($id))
		{
			show_404();
		}
		if(!empty($_POST)){
			// print_r($_POST);
			$status = array();//array is initialized
			$errors = '';
			$validation_rules = array(
		       array(
		             'field'   => 'adminuser_username',
		             'label'   => 'Username',
		             'rules'   => 'trim|required|xss_clean|min_length[5]|max_length[12]|callback_edit_unique[shopping_adminusers.adminuser_id.adminuser_username.'.$id.']'
		          ),
		       array(
		             'field'   => 'adminuser_password',
		             'label'   => 'Password',
		             'rules'   => 'trim|required|xss_clean'
		          ), 
		       array(
		             'field'   => 'adminuser_email',
		             'label'   => 'Email',
		             'rules'   => 'trim|required|xss_clean|valid_email|callback_edit_unique[shopping_adminusers.adminuser_id.adminuser_email.'.$id.']'
		          ),
		       array(
		             'field'   => 'adminuser_mobile',
		             'label'   => 'Mobile',
		             'rules'   => 'trim|required|xss_clean|min_length[10]|max_length[10]'
		          ),   
		    );
		    $this->form_validation->set_rules($validation_rules);
		    if ($this->form_validation->run() == FALSE) {
		    	foreach($validation_rules as $row){
		            $field = $row['field'];          //getting field name
		            $error = form_error($field);    //getting error for field name
		                                            //form_error() is inbuilt function
		            //if error is their for field then only add in $errors_array array
		            if($error){
	                    $status['error_message'] = strip_tags($error);
	                    break;
		            }
	        	}
    		}
    		else{
				$data = array(
				'adminuser_id' => $id,
				'adminuser_username' => $this->input->post('adminuser_username'),
				'adminuser_password' => $this->input->post('adminuser_password'),
				'adminuser_email' => $this->input->post('adminuser_email'),
				'adminuser_mobile' => $this->input->post('adminuser_mobile'),
				);
				// print_r($data);
				$result = $this->usersmodel->update_adminusers($data);
				if($result)
					$status['error_message'] = "User Updated Successfully!";
				else
					$status['error_message'] = "Something Went Wrong!";	
    		}
		}
		$status['adminuser_data'] = $this->usersmodel->get_adminusers_data($id);
		$this->load->view('admin/edit_adminusers',$status);
	}
	public function ajax_user()
	{
		$data = $this->usersmodel->get_ajax_user_data();
		echo json_encode($data);
	}
	public function endusers()
	{
		//get list of end users from database and store it in array variable 'adminusers' with key 'adminusers_list'
		$endusers['endusers_list'] = $this->usersmodel->get_enduser();
		// $endusers['endusers_list'] = $this->usersmodel->get_endusers();
		// $endusers['state_list'] = $this->usersmodel->get_state();
		// $endusers['city_list'] = $this->usersmodel->get_state();
		
		//call the endusers views i.e rendered page and pass the adminusers data in the array variable 'adminusers'
		$this->load->view('admin/endusers',$endusers);	
	}
	public function edit_endusers()
	{
		$id = $this->uri->segment(4);
		// echo "id".$id;
		if (empty($id))
		{
			show_404();
		}
		if(!empty($_POST)){
			// print_r($_POST);
			$status = array();//array is initialized
			$errors = '';
			$validation_rules = array(
		       array(
		             'field'   => 'user_name',
		             'label'   => 'Username',
		             'rules'   => 'trim|required|xss_clean|min_length[5]|max_length[12]|callback_edit_unique[shopping_users.user_id.user_name.'.$id.']'
		          ),
		       array(
		             'field'   => 'user_password',
		             'label'   => 'Password',
		             'rules'   => 'trim|required|xss_clean'
		          ), 
		       array(
		             'field'   => 'user_email',
		             'label'   => 'Email',
		             'rules'   => 'trim|required|xss_clean|valid_email|callback_edit_unique[shopping_users.user_id.user_email.'.$id.']'
		          ),
	          array(
		             'field'   => 'user_dob',
		             'label'   => 'Date Of Birth',
		             'rules'   => 'trim|required|xss_clean|date_valid'
		          ),
		      array(
		             'field'   => 'user_mobile',
		             'label'   => 'Mobile',
		             'rules'   => 'trim|required|xss_clean|min_length[10]|max_length[10]'
		          ),  
		      array(
	             'field'   => 'state_name',
	             'label'   => 'State',
	             'rules'   => 'trim|required|xss_clean'
	          ),
	          array(
	             'field'   => 'city_name',
	             'label'   => 'City',
	             'rules'   => 'trim|required|xss_clean'
	          ),
	          array(
	             'field'   => 'area_name',
	             'label'   => 'Area',
	             'rules'   => 'trim|required|xss_clean'
	          ), 
		    );
		    $this->form_validation->set_rules($validation_rules);
		    if ($this->form_validation->run() == FALSE) {
		    	foreach($validation_rules as $row){
		            $field = $row['field'];          //getting field name
		            $error = form_error($field);    //getting error for field name
		                                            //form_error() is inbuilt function
		            //if error is their for field then only add in $errors_array array
		            if($error){
	                    $status['error_message'] = strip_tags($error);
	                    break;
		            }
	        	}
    		}
    		else{
				$data = array(
				'user_id' => $id,
				'user_name' => $this->input->post('user_name'),
				'user_password' => $this->input->post('user_password'),
				'user_email' => $this->input->post('user_email'),
				'user_dob' => $this->input->post('user_dob'),
				'user_mobile' => $this->input->post('user_mobile'),
				'user_state_id' => $this->input->post('state_name'),
				'user_city_id' => $this->input->post('city_name'),
				'user_area_id' => $this->input->post('area_name'),
				);
				$result = $this->usersmodel->update_endusers($data);
				if($result)
					$status['error_message'] = "Enduser Updated Successfully!";
				else
					$status['error_message'] = "Something Went Wrong!";	
    		}
		}
		$data_values = $this->usersmodel->get_endusers_data($id);
		$status['enduser_data']	= $data_values['state_city'];
		$status['state_list'] = $this->location->get_state();
		$status['cities']	= $data_values['cities'];
		$status['city_list'] = $this->location->get_city();
		$status['area_list'] = $this->location->get_area();
		$this->load->view('admin/edit_endusers',$status);	
	}
}