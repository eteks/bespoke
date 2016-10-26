<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Header_Footer_Model extends CI_Model {

	public function __construct()
  {
    $this->load->database();
  }
  
  // Google plus login 
  public function get_glogin_status($user_data=array())
  { 
    $user_password = random_string('alnum',8);
    $user_name_id = random_string('alnum',4);
    $user_name = $user_data['user_name'].' '.$user_name_id;

    $check_already_where = '(user_email="'.$user_data['email'].'")';
    $check_already_data = $this->db->get_where('shopping_users',$check_already_where);

    if($check_already_data -> num_rows() > 0) {
      $status = 0;
    }
    else {
      $reg_data = array(
        'user_name' => $user_name,
        'user_first_name' => $user_data['first_name'],
        'user_email' => $user_data['email'],
        'user_status' => '1'
      );
      $this->db->insert('shopping_users', $reg_data);
      $user_id = $this->db->insert_id();
      $check_login_where = '(user_id="'.$user_id.'")';
      $check_login_data = $this->db->get_where('shopping_users',$check_login_where);
      $this->session->set_userdata("login_status","1");   
      $user_session_details = $check_login_data->row_array();
      $this->session->set_userdata("login_session",$user_session_details);
      $status=1;
    }
    return $status;
  }

  // Get menubar fields
  public function get_menubar_fields()
  { 
    $menubar_fields_where = '(ss.subcategory_status and sc.category_status=1 and sr.recipient_status)';
    $this->db->select('*');
    $this->db->from('shopping_subcategory_category_and_recipient sscr');
    $this->db->join('shopping_subcategory ss', 'sscr.subcategory_mapping_id=ss.subcategory_id','inner');
    $this->db->join('shopping_category sc', 'sscr.category_mapping_id=sc.category_id','inner');
    $this->db->join('shopping_recipient sr', 'sscr.recipient_mapping_id=sr.recipient_id','inner');
    $this->db->where($menubar_fields_where);
    $this->db->order_by('recipient_id');
    $this->db->order_by('category_id');
    $query = $this->db->get()->result_array();
    return $query;
  }


}
/* End of file Header_Footer_Model.php */