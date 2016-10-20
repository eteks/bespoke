<?php 

class Index_Model extends CI_Model {

	public function __construct()
  {
    $this->load->database();
  }
  
  /* --------          Default credentials start     -------- */
  // Default credentials
  public function get_credentials()
  {
    $login_status = $this->session->userdata("login_status");
    $random = uniqid();

    // General session not exists
    if(!$this->session->userdata("general_session_id")) {
      $this->session->set_userdata("general_session_id",$random);
    }

    // Order session exists
    if($this->session->userdata("user_session_id")) {
      // echo $this->session->userdata("user_session_id");
      $session_id = explode('_',$this->session->userdata("user_session_id"));  
      if($login_status == 1) {
        $login_session = $this->session->userdata("login_session");
        $user_id = $login_session['user_id'];
        if($user_id != $session_id[2]) {
          $this->session->unset_userdata('user_session_id');
        }
      }
      else {
        $user_id = 0;
        if($user_id != $session_id[2]) {
          $this->session->unset_userdata('user_session_id');
        } 
      }
    }

    // Order session not exists
    if(!$this->session->userdata("user_session_id")) {
      $general_session_id = $this->session->userdata("general_session_id");
      if($login_status == 1) {
        $login_session = $this->session->userdata("login_session");
        $user_id = $login_session['user_id'];
        $this->session->set_userdata("user_session_id","reg_user_".$user_id."_".$general_session_id);
      }
      else {
        $user_id = 0;
        $this->session->set_userdata("user_session_id","reg_user_".$user_id."_".$general_session_id);
      }
    }
  }	

  /* --------          Default credentials end     -------- */

  /* --------          Header part start     -------- */

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

  /* --------          Header part end     -------- */

  /* --------          Footer part start     -------- */

  // Get all recipients
  public function get_all_recipients()
  { 
    $all_recipients_where = '(recipient_status=1)';
    $query = $this->db->get_where('shopping_recipient',$all_recipients_where)->result_array();
    return $query;
  }

  /* --------          Footer part end     -------- */

  /* --------          Index credentials start     -------- */

  // Home page products list
  public function get_product_list()
  { 
    // New arrivals.
    $new_arrivals_limit = 10;  
    $featured_products_limit = 4;

    $new_arrivals_where = '(pro.product_status=1)';
    $featured_products_where = '(prof.product_status=1 and prof.product_is_featured=1)';
    $featured_products_count_where = '(proc.product_status=1 and proc.product_is_featured=1)';

    $this->db->select('*');
    $this->db->from('shopping_product pro');
    $this->db->join('shopping_product_upload_image spui', 'pro.product_id=spui.product_mapping_id','inner');
    $this->db->group_by('spui.product_mapping_id');
    $this->db->order_by('pro.product_createddate','desc');
    $this->db->limit($new_arrivals_limit,'0');
    $this->db->where($new_arrivals_where);

    $query['new_arrivals'] = $this->db->get()->result_array();

    $this->db->select('*');
    $this->db->from('shopping_product prof');
    $this->db->join('shopping_product_upload_image spuif', 'prof.product_id=spuif.product_mapping_id','inner');
    $this->db->group_by('spuif.product_mapping_id');
    $this->db->limit($featured_products_limit,'0');
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
    if($query_count_data >= $featured_products_limit) {
      $query['featured_remaining_products'] = $query_count_data - $featured_products_limit;
    }
    else {
      $query['featured_remaining_products'] = 0;
    }
    return $query;
  }

 



  /* --------          Index credentials end     -------- */
  
    	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */

