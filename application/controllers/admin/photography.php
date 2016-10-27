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
	public function photoshoot_type()
	{	
		//get list of photoshoot_type from database and store it in array variable 'photoshoot_type' with key 'photoshoot_type_list'
		$photoshoot_type['photoshoot_type_list'] = $this->photographymodel->get_photoshoot_type();
		
		//call the photoshoot_type views i.e rendered page and pass the photoshoot_type data in the array variable 'photoshoot_type'
		$this->load->view('admin/photoshoot_type',$photoshoot_type);
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
    		if(!empty($_POST)){
				if (!empty($errors)) {
					$status['error_message'] = strip_tags($errors);
				}
				else{
					$data = array(
					'display_title' => $this->input->post('photoshoot_type'),
					'display_description' => $this->input->post('photoshoot_description'),
					'display_status' => $this->input->post('photoshoot_type_status'),
					);
					$result = $this->photographymodel->insert_photoshoot_type($data);
					if($result)
						$status['error_message'] = "PhotoShoot Type Created Successfully!";
					else
						$status['error_message'] = "Something went Wrong!";
				}		
			}
    	}
    	if(isset($_POST))
    		$status['photoshoot_type_data'] = array(
					'photoshoot_type' => $this->input->post('photoshoot_type'),
					'photoshoot_description' => $this->input->post('photoshoot_description'),
					'photoshoot_type_status' => $this->input->post('photoshoot_type_status'),
					);
		// print_r($status['error_message']);
		$this->load->view('admin/add_photoshoot_type',$status);
	}
	public function edit_photoshoot_type()
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
		             'field'   => 'photoshoot_type',
		             'label'   => 'Photoshoot Type',
		             'rules'   => 'trim|required|xss_clean|callback_edit_unique[shopping_photo_shoot_display_details.display_id.display_title].'.$id.']'
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
				if (!empty($errors)) {
					$status['error_message'] = strip_tags($errors);
				}
				else{
					$data = array(
					'display_id' => $id,
					'display_title' => $this->input->post('photoshoot_type'),
					'display_description' => $this->input->post('photoshoot_description'),
					'display_status' => $this->input->post('photoshoot_type_status'),
					);
					$result = $this->photographymodel->update_photoshoot_type($data);
					if($result)
						$status['error_message'] = "Photoshoot Type Updated Successfully!";
					else
						$status['error_message'] = "Something went Wrong!";
				}		
    		}
		}
		$status['photoshoot_type_data'] = $this->photographymodel->get_photoshoot_type_data($id);
		// print_r($data);
		$this->load->view('admin/edit_photoshoot_type',$status);
	}
	public function photoshoot_person_detail()
	{	
		//get list of photoshoot_type from database and store it in array variable 'photoshoot_type' with key 'photoshoot_type_list'
		$query_result = $this->photographymodel->get_photoshoot_person_detail();
		$photoshoot_person_detail['photoshoot_person_list'] = $query_result['person_result'];
		$photoshoot_person_detail['photoshoot_person_image_list'] = $query_result['person_image'];

		
		//call the photoshoot_type views i.e rendered page and pass the photoshoot_type data in the array variable 'photoshoot_type'
		$this->load->view('admin/photoshoot_person_detail',$photoshoot_person_detail);
	}
	public function add_photoshoot_person_detail()
	{	
		// print_r($_POST);
		$status = array();//array is initialized
		$errors='';
		$person_image = array();
		if(!empty($_POST)){
			$filesCount = count($_FILES['person_image']['name']);
			for($i = 0; $i < $filesCount; $i++){
				// array_push($product_image,$_FILES['userFiles']['name'][$i]);
				$_FILES['userFile']['name'] = $_FILES['person_image']['name'][$i];
                $_FILES['userFile']['type'] = $_FILES['person_image']['type'][$i];
                $_FILES['userFile']['tmp_name'] = $_FILES['person_image']['tmp_name'][$i];
                $_FILES['userFile']['error'] = $_FILES['person_image']['error'][$i];
                $_FILES['userFile']['size'] = $_FILES['person_image']['size'][$i];

				$config['upload_path'] = FCPATH.ADMIN_MEDIA_PATH; 
				$config['allowed_types'] = FILETYPE_ALLOWED;//FILETYPE_ALLOWED which is defined constantly in constants file
				$config['file_name'] = $_FILES['person_image']['name'][$i];

				$this->upload->initialize($config);
				if($this->upload->do_upload('userFile')){
				    $uploadData = $this->upload->data();
				    $person_image['person_photo_path'][$i] = ADMIN_MEDIA_PATH.$uploadData['file_name'];
				    $person_image['person_photo_status'][$i] = $this->input->post('photoshoot_person_status')[$i];
				}
			}
			if (!empty($errors)) {
				$status['error_message'] = strip_tags($errors);
			}
			else{
				$data['person_basic'] = array(
					'person_name' => $this->input->post('person_name'),
					'person_relationshlp_status' => $this->input->post('relationship_status'),
					'person_address' => $this->input->post('person_address'),
					'person_display_id' => $this->input->post('photoshoot_type'),
					'person_status' => $this->input->post('person_status'),
					'person_bride_name' => $this->input->post('person_bride_name'),
					'person_groom_name' => $this->input->post('person_groom_name'),
				);
				$data['person_photos'] = array_map(null,$person_image['person_photo_path'],$person_image['person_photo_status']);
				$result = $this->photographymodel->insert_photoshoot_person_detail($data);
				if($result)
					$status['error_message'] = "PhotoShoot Person Detail Inserted Successfully!";
				else
					$status['error_message'] = "Something went Wrong!";
			}		
		}
    	if(isset($_POST))
    		$status['photoshoot_type_data'] = array(
					'photoshoot_type' => $this->input->post('photoshoot_type'),
					'photoshoot_description' => $this->input->post('photoshoot_description'),
					'photoshoot_type_status' => $this->input->post('photoshoot_type_status'),
					);
		// print_r($status['error_message']);
		$status['photoshoot_type_list'] = $this->photographymodel->get_photoshoot_type();
		$this->load->view('admin/add_photoshoot_person_detail',$status);
	}
	public function edit_photoshoot_person_detail()
	{	
		// $id = $this->uri->segment(4);
		// // echo "id".$id;
		// if (empty($id))
		// {
		// 	show_404();
		// }
		// if(!empty($_POST)){
		// 	// print_r($_POST);
		// 	$status = array();//array is initialized
		// 	$errors = '';
		// 	$validation_rules = array(
		//        array(
		//              'field'   => 'photoshoot_type',
		//              'label'   => 'Photoshoot Type',
		//              'rules'   => 'trim|required|xss_clean|callback_edit_unique[shopping_photo_shoot_display_details.display_id.display_title].'.$id.']'
		//           ),
		//        array(
		//              'field'   => 'photoshoot_description',
		//              'label'   => 'Photoshoot Description',
		//              'rules'   => 'trim|required|xss_clean'
		//           ),
		//        array(
		//              'field'   => 'photoshoot_type_status',
		//              'label'   => 'Status',
		//              'rules'   => 'trim|required|xss_clean'
		//           ),   
	 //    	);
		//     $this->form_validation->set_rules($validation_rules);
		//     if ($this->form_validation->run() == FALSE) {
		//     	foreach($validation_rules as $row){
		//             $field = $row['field'];          //getting field name
		//             $error = form_error($field);    //getting error for field name
		//                                             //form_error() is inbuilt function
		//             //if error is their for field then only add in $errors_array array
		//             if($error){
	 //                    $status['error_message'] = strip_tags($error);
	 //                    break;
		//             }
	 //        	}
  //   		}
  //   		else{
		// 		if (!empty($errors)) {
		// 			$status['error_message'] = strip_tags($errors);
		// 		}
		// 		else{
		// 			$data = array(
		// 			'display_id' => $id,
		// 			'display_title' => $this->input->post('photoshoot_type'),
		// 			'display_description' => $this->input->post('photoshoot_description'),
		// 			'display_status' => $this->input->post('photoshoot_type_status'),
		// 			);
		// 			$result = $this->photographymodel->update_photoshoot_type($data);
		// 			if($result)
		// 				$status['error_message'] = "Photoshoot Type Updated Successfully!";
		// 			else
		// 				$status['error_message'] = "Something went Wrong!";
		// 		}		
  //   		}
		// }
		// $status['photoshoot_type_data'] = $this->photographymodel->get_photoshoot_type_data($id);
		// print_r($data);
		$status['photoshoot_type_list'] = $this->photographymodel->get_photoshoot_type();
		$this->load->view('admin/edit_photoshoot_person_detail',$status);
	}
}