<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Photography extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/photographymodel');
		$this->load->library('upload');
		// Load form helper library
		$this->load->helper('form');
		// Load form validation library
		$this->load->library('form_validation');
	}
	public function add_photoshoot_type()
	{	
		// print_r($_POST);
		$status = array();//array is initialized
		$errors=''; // variable is initialized
		$validation_rules = array(
	       array(
	             'field'   => 'photoshoot_type',
	             'label'   => 'Photoshoot Type',
	             'rules'   => 'trim|required|xss_clean|is_unique[shopping_photo_shoot_display_details.display_title]'
	          ),
	       array(
	             'field'   => 'photoshoot_description',
	             'label'   => 'Photoshoot Description',
	             'rules'   => 'trim|required|xss_clean'
	          ),
	       array(
	             'field'   => 'photoshoot_type_status',
	             'label'   => 'Status',
	             'rules'   => 'trim|required|xss_clean'
	          ),   
	    );
	 //    $this->form_validation->set_rules($validation_rules);
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
    		if(!empty($_POST)){
				if (!empty($errors)) {
					$status['error_message'] = strip_tags($errors);
				}
				else{
					$data = array(
					'photoshoot_type' => $this->input->post('photoshoot_type'),
					'photoshoot_description' => $this->input->post('photoshoot_description'),
					'photoshoot_type_status' => $this->input->post('photoshoot_type_status'),
					);
					$result = $this->photography->insert_photoshoot_type($data);
					if($result)
						$status['error_message'] = "PhotoShoot Type Created Successfully!";
					else
						$status['error_message'] = "Something went Wrong!";
				}		
			}
    	}
    	if(isset($_POST))
    		$status['photoshoot_type_data'] = array(
					'photoshoot_type' => $this->input->post('category_name'),
					'photoshoot_description' => $this->input->post('photoshoot_description'),
					'photoshoot_type_status' => $this->input->post('photoshoot_type_status'),
					);
		print_r($status['error_message']);
		$this->load->view('admin/add_photoshoot_type',$status);
	}
}