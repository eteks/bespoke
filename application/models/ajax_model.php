<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax_Model extends CI_Model {

	 public function __construct()
    {
         $this->load->database();
    }
   
   	//  Get registration status
    public function get_registeration_status() {
        $validation_rules = array(
            array(
                 'field'   => 'username',
                 'label'   => 'User Name',
                 'rules'   => 'trim|required|xss_clean|is_unique[shopping_users.user_name]'
              ),
            array(
                 'field'   => 'email',
                 'label'   => 'Email',
                 'rules'   => 'trim|required|valid_email|xss_clean|is_unique[shopping_users.user_email]'
              ),
            array(
                 'field'   => 'password',
                 'label'   => 'Password',
                 'rules'   => 'trim|required|xss_clean'
              ),   
        );
        $this->form_validation->set_rules($validation_rules);

        if ($this->form_validation->run() == FALSE) {   
            foreach($validation_rules as $row){
                $field = $row['field'];         //getting field name
                $error = form_error($field);    //getting error for field name
                //form_error() is inbuilt function
                //if error is their for field then only add in $errors_array array
                if($error){
                    $status = strip_tags($error);
                    break;
                }
            }
        }
        else {
            $reg_data = array(
                'user_name' => $this->input->post('username'),
                'user_password' => $this->input->post('password'),
                'user_email' => $this->input->post('email'),
                'user_status' => '1'
                );
            $this->db->insert('shopping_users', $reg_data);
            $user_id = $this->db->insert_id();
            $check_login_where = '(user_id="'.$user_id.'")';
            $check_login_data = $this->db->get_where('shopping_users',$check_login_where);
            $this->session->set_userdata("login_status","1");   
            $user_session_details = $check_login_data->row_array();
            $this->session->set_userdata("login_session",$user_session_details);
            $status = "success";
        }
        echo $status;
    } 

    //  Get login status
    public function get_login_status() {
        $validation_rules = array(
            array(
                 'field'   => 'email',
                 'label'   => 'Email',
                 'rules'   => 'trim|required|valid_email|xss_clean'
              ),
            array(
                 'field'   => 'password',
                 'label'   => 'Password',
                 'rules'   => 'trim|required|xss_clean'
              ),   
        );
        $this->form_validation->set_rules($validation_rules);

        if ($this->form_validation->run() == FALSE) {   
            foreach($validation_rules as $row){
                $field = $row['field'];         
                $error = form_error($field);  
                if($error){
                    $status = strip_tags($error);
                    break;
                }
            }
        }
        else {
            $check_login_where = '(user_email="'.$this->input->post('email').'" and    user_status=1 and user_password="'.$this->input->post('password').'")';
            $check_login_data = $this->db->get_where('shopping_users',$check_login_where);
            if($check_login_data->num_rows() > 0) {
                $this->session->set_userdata("login_status","1");   
                $user_session_details = $check_login_data->row_array();
                $this->session->set_userdata("login_session",$user_session_details);
                $status = "success";
            }
            else {
                $status = "Please enter valid details";  
            }
        }
        echo $status;
    } 
    	
  // Get load more featured products
  public function get_load_more_featured()
  { 
    $query = array();
    if($this->input->post('str_val')) {
      $featured_products_limit = 4;
      $display_count = $this->input->post('str_val') + $featured_products_limit;
      $featured_products_where = '(prof.product_status=1 and prof.product_is_featured=1)';
      $featured_products_count_where = '(proc.product_status=1 and proc.product_is_featured=1)';
      $this->db->select('*');
      $this->db->from('shopping_product prof');
      $this->db->join('shopping_product_upload_image spuif', 'prof.product_id=spuif.product_mapping_id','inner');
      $this->db->group_by('spuif.product_mapping_id');
      $this->db->limit($featured_products_limit,$this->input->post('str_val'));
      $this->db->where($featured_products_where);
      $query['featured_products'] = $this->db->get()->result_array();

      // featured products count
      $this->db->select('*');
      $this->db->from('shopping_product proc');
      $this->db->join('shopping_product_upload_image spuic', 'proc.product_id=spuic.product_mapping_id','inner');
      $this->db->group_by('spuic.product_mapping_id');
      $this->db->where($featured_products_count_where);
      $query_featured_count = $this->db->get()->result_array();
      $query_count_data = count($query_featured_count);
      if($query_count_data >= $display_count) {
        $query['featured_remaining_products'] =  $query_count_data - $display_count;     
      }
      else {
        $query['featured_remaining_products'] =  0;   
      }

    }
    return $query;
  }





}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */