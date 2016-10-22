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

  /* --------          Index page start     -------- */

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

 



  /* --------          Index page end     -------- */




  /* --------          Listing page start     -------- */

  // sidebar list
  public function listing_data()
  { 
    $query['error'] = 0;


    if($this->uri->segment(2)) {
      if($this->uri->segment(3) == 'sub') {
        if($this->uri->segment(4)) {

          // Get subcategory name
          $subcategory_name_where = '(subcategory_id="'.$this->uri->segment(4).'")';
          $query['subcategory_name'] = $this->db->get_where('shopping_subcategory',$subcategory_name_where)->row_array();
 
          // Get category name
          $category_name_where = '(scr.subcategory_mapping_id="'.$this->uri->segment(4).'" and scr.recipient_mapping_id="'.$this->uri->segment(2).'")';
          $this->db->select('*');
          $this->db->from('shopping_subcategory_category_and_recipient scr');
          $this->db->join('shopping_category c','scr.category_mapping_id=c.category_id','inner');
          $this->db->where($category_name_where);
          $this->db->group_by('c.category_id');
          $query['cat_name'] = $this->db->get()->row_array();

          // Get subcategory list
          $sub_data_where = '(scrs.category_mapping_id="'.$query['cat_name']['category_id'].'" and scrs.recipient_mapping_id="'.$this->uri->segment(2).'")';
          $this->db->select('*');
          $this->db->from('shopping_subcategory_category_and_recipient scrs');
          $this->db->join('shopping_subcategory ss','scrs.subcategory_mapping_id=ss.subcategory_id','inner');
          $this->db->where($sub_data_where);
          $this->db->group_by('ss.subcategory_id');
          $query['subcategory_list'] = $this->db->get()->result_array(); 

          // product list
          // $pro_data_where = '(product_subcategory_id="'.$this->uri->segment(4).'")';
          // $query['product_list'] = $this->db->order_by('product_price')->get_where('shopping_product',$pro_data_where)->result_array(); 


          // echo "<pre>";
          // print_r($query['product_list']);

          // echo "</pre>";







        }     
        else {
          $query['error'] = 1;
        }

      }
      else if($this->uri->segment(3) == 'cat') {
        if($this->uri->segment(4)) {

          // Get subcategory name
          $query['subcategory_name'] = array();

          // Get category name
          $category_name_where = '(category_id="'.$this->uri->segment(4).'")';
          $query['cat_name'] = $this->db->get_where('shopping_category',$category_name_where)->row_array();

          // Get subcategory list
          $sub_data_where = '(scrs.category_mapping_id="'.$this->uri->segment(4).'")';
          $this->db->select('*');
          $this->db->from('shopping_subcategory_category_and_recipient scrs');
          $this->db->join('shopping_subcategory ss','scrs.subcategory_mapping_id=ss.subcategory_id','inner');
          $this->db->where($sub_data_where);
          $this->db->group_by('ss.subcategory_id');
          $query['subcategory_list'] = $this->db->get()->result_array();
        }
        else {
          $query['error'] = 1;
        }


      }

      else {
      $query['error'] = 1;
      }
    }
    else {
      $query['error'] = 1;
    }





    return $query;
  }

 



  /* --------          Listing page end     -------- */
  
    	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */

