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
    	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */