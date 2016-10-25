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
    $param_len = count($this->input->get());
    $query['error'] = 0;
    if($this->input->get('rec') && $this->input->get('cat') && $param_len==2) {

      // Get recipient name
      $recipient_name_where = '(recipient_id="'.$this->input->get('rec').'")';
      $query['rec_name'] = $this->db->get_where('shopping_recipient',$recipient_name_where)->row_array();

      // Get category name
      $category_name_where = '(category_id="'.$this->input->get('cat').'")';
      $query['cat_name'] = $this->db->get_where('shopping_category',$category_name_where)->row_array();

      // Get subcategory name
      $query['subcategory_name'] = array();

      // Get subcategory list
      $sub_data_where = '(scrs.category_mapping_id="'.$this->input->get('cat').'" and scrs.recipient_mapping_id="'.$this->input->get('rec').'")';
      $this->db->select('*');
      $this->db->from('shopping_subcategory_category_and_recipient scrs');
      $this->db->join('shopping_subcategory ss','scrs.subcategory_mapping_id=ss.subcategory_id','inner');
      $this->db->where($sub_data_where);
      $this->db->group_by('ss.subcategory_id');
      $query['subcategory_list'] = $this->db->get()->result_array();

      // Product list
      $pro_data_where = '(p.product_recipient_id="'.$this->input->get('rec').'" and p.product_category_id="'.$this->input->get('cat').'")';
      $this->db->select('*');
      $this->db->from('shopping_product p');
      $this->db->join('shopping_product_upload_image pui','p.product_id=pui.product_mapping_id','inner');
      $this->db->where($pro_data_where);
      $this->db->group_by('p.product_id');
      $this->db->order_by('p.product_price');
      $query['product_list'] = $this->db->get()->result_array();

      // Attribute list
      $query['attribute_list'] = array();
      $rec_id = $this->input->get('rec');
      $cat_id = $this->input->get('cat');
      $attribute_list_query = $this->db->query("SELECT * FROM shopping_product_attribute_value AS c INNER JOIN ( SELECT product_attribute_group_id,product_mapping_id, SUBSTRING_INDEX( SUBSTRING_INDEX( t.product_attribute_value_combination_id, ',', n.n ) , ',', -1 ) value FROM shopping_product_attribute_group t CROSS JOIN numbers n WHERE n.n <=1 + ( LENGTH( t.product_attribute_value_combination_id ) - LENGTH( REPLACE( t.product_attribute_value_combination_id, ',', ''))) ) AS a  ON a.value = c.product_attribute_value_id INNER JOIN shopping_product_attribute AS pa ON c.product_attribute_id=pa.product_attribute_id INNER JOIN shopping_product AS sp ON a.product_mapping_id=sp.product_id where sp.product_recipient_id=$rec_id and sp.product_category_id=$cat_id group by(c.product_attribute_value_id)");
      if($attribute_list_query->num_rows() > 0) {
        $query['attribute_list'] = $attribute_list_query->result_array();  
      }







    }
    else if($this->input->get('rec') && $this->input->get('cat') && $this->input->get('sub') && $param_len==3) {

      // Get recipient name
      $recipient_name_where = '(recipient_id="'.$this->input->get('rec').'")';
      $query['rec_name'] = $this->db->get_where('shopping_recipient',$recipient_name_where)->row_array();

      // Get category name
      $category_name_where = '(category_id="'.$this->input->get('cat').'")';
      $query['cat_name'] = $this->db->get_where('shopping_category',$category_name_where)->row_array();

      // Get subcategory name
      $subcategory_name_where = '(subcategory_id="'.$this->input->get('sub').'")';
      $query['subcategory_name'] = $this->db->get_where('shopping_subcategory',$subcategory_name_where)->row_array();

      // Get subcategory list
      $sub_data_where = '(scrs.category_mapping_id="'.$this->input->get('cat').'" and scrs.recipient_mapping_id="'.$this->input->get('rec').'")';
      $this->db->select('*');
      $this->db->from('shopping_subcategory_category_and_recipient scrs');
      $this->db->join('shopping_subcategory ss','scrs.subcategory_mapping_id=ss.subcategory_id','inner');
      $this->db->where($sub_data_where);
      $this->db->group_by('ss.subcategory_id');
      $query['subcategory_list'] = $this->db->get()->result_array(); 

      // product list
      $pro_data_where = '(p.product_recipient_id="'.$this->input->get('rec').'" and p.product_category_id="'.$this->input->get('cat').'" and p.product_subcategory_id="'.$this->input->get('sub').'")';
      $this->db->select('*');
      $this->db->from('shopping_product p');
      $this->db->join('shopping_product_upload_image pui','p.product_id=pui.product_mapping_id','inner');
      $this->db->where($pro_data_where);
      $this->db->group_by('p.product_id');
      $this->db->order_by('p.product_price');
      $query['product_list'] = $this->db->get()->result_array();

      // Attribute list
      $query['attribute_list'] = array();
      $rec_id = $this->input->get('rec');
      $cat_id = $this->input->get('cat');
      $sub_id = $this->input->get('sub');
      $attribute_list_query = $this->db->query("SELECT * FROM shopping_product_attribute_value AS c INNER JOIN ( SELECT product_attribute_group_id,product_mapping_id, SUBSTRING_INDEX( SUBSTRING_INDEX( t.product_attribute_value_combination_id, ',', n.n ) , ',', -1 ) value FROM shopping_product_attribute_group t CROSS JOIN numbers n WHERE n.n <=1 + ( LENGTH( t.product_attribute_value_combination_id ) - LENGTH( REPLACE( t.product_attribute_value_combination_id, ',', ''))) ) AS a  ON a.value = c.product_attribute_value_id INNER JOIN shopping_product_attribute AS pa ON c.product_attribute_id=pa.product_attribute_id INNER JOIN shopping_product AS sp ON a.product_mapping_id=sp.product_id where sp.product_recipient_id=$rec_id and sp.product_category_id=$cat_id and sp.product_subcategory_id=$sub_id group by(c.product_attribute_value_id)");
      if($attribute_list_query->num_rows() > 0) {
        $query['attribute_list'] = $attribute_list_query->result_array();  
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

