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



  public function get_add_to_cart_list() {

    $cart_list_where = '(so.orderitem_session_id="'.$this->session->userdata("user_session_id").'")';
    $this->db->select('*');
    $this->db->from('shopping_orderitem so');
    $this->db->join('shopping_product sp','so.orderitem_product_id=sp.product_id','inner');
    $this->db->join('shopping_product_upload_image pui','sp.product_id=pui.product_mapping_id','inner');
    $this->db->where($cart_list_where);
    $this->db->group_by('so.orderitem_id');
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

    $new_arrivals_where = '(pro.product_status=1 and (pro.product_totalitems - pro.product_sold) != 0)';
    $featured_products_where = '(prof.product_status=1 and prof.product_is_featured=1 and (prof.product_totalitems - prof.product_sold) != 0)';
    $featured_products_count_where = '(proc.product_status=1 and proc.product_is_featured=1 and (proc.product_totalitems - proc.product_sold) != 0)';

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
      $pro_data_where = '(p.product_recipient_id="'.$this->input->get('rec').'" and p.product_category_id="'.$this->input->get('cat').'" and (p.product_totalitems - p.product_sold) != 0)';
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
      $pro_data_where = '(p.product_recipient_id="'.$this->input->get('rec').'" and p.product_category_id="'.$this->input->get('cat').'" and p.product_subcategory_id="'.$this->input->get('sub').'" and (p.product_totalitems - p.product_sold) != 0)';
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
  
    	
  /* --------          Product detail page start     -------- */

  public function get_product_info()
  {   
    $query['product_details'] = array();
    $query['product_attributes'] = array();
    $query['product_gallery'] = array();
    $query['recommanded_products'] = array(); 
    $query['default_group'] = array(); 
    $query['error'] = 0;
    $limit = 15;
    if($this->uri->segment(2)) {

      // Product details
      $product_id = $this->uri->segment(2);
      $pro_det_where = '(p.product_id="'.$product_id .'")';
      $this->db->select('*');
      $this->db->from('shopping_product p');
      $this->db->join('shopping_category c','p.product_category_id=c.category_id','inner');
      $this->db->join('shopping_subcategory s','p.product_subcategory_id=s.subcategory_id','inner');
      $this->db->join('shopping_recipient r','p.product_recipient_id=r.recipient_id','inner');
      $this->db->join('shopping_product_upload_image pui','p.product_id=pui.product_mapping_id','inner');
      $this->db->where($pro_det_where);
      $this->db->group_by('p.product_id');
      $query['product_details'] = $this->db->get()->row_array();
      $subcategory_id = $query['product_details']['subcategory_id'];
      $category_id = $query['product_details']['category_id'];
      $recipient_id = $query['product_details']['recipient_id'];


      // Image gallery
      $pro_gall_where = '(pr.product_id="'.$product_id .'")';
      $this->db->select('*');
      $this->db->from('shopping_product pr');
      $this->db->join('shopping_product_upload_image puig','pr.product_id=puig.product_mapping_id','inner');
      $this->db->where($pro_gall_where);
      $query['product_gallery'] = $this->db->get()->result_array();

      // Default group id
      $pro_grp_where = '(product_mapping_id="'.$product_id .'")';
      $query['default_group'] = $this->db->group_by('product_mapping_id')->get_where('shopping_product_attribute_group',$pro_grp_where)->row_array();  

      // Attribute list
      $attribute_list_query = $this->db->query("SELECT * FROM shopping_product_attribute_value AS c INNER JOIN ( SELECT product_attribute_group_id, SUBSTRING_INDEX( SUBSTRING_INDEX( t.product_attribute_value_combination_id, ',', n.n ) , ',', -1 ) value FROM shopping_product_attribute_group t CROSS JOIN numbers n WHERE n.n <=1 + ( LENGTH( t.product_attribute_value_combination_id ) - LENGTH( REPLACE( t.product_attribute_value_combination_id, ',', '')))   AND t.product_mapping_id=$product_id) AS a ON a.value = c.product_attribute_value_id INNER JOIN shopping_product_attribute AS pa ON c.product_attribute_id=pa.product_attribute_id");
      if($attribute_list_query->num_rows() > 0) {
        $query['product_attributes'] = $attribute_list_query->result_array();  
      }


      // Recommanded products start
      $recommanded_where_sub = '(rp.product_id!="'.$this->uri->segment(2).'" and rp.product_subcategory_id="'.$subcategory_id.'" and rp.product_category_id="'.$category_id.'" and rp.product_recipient_id="'.$recipient_id.'" and rp.product_status=1 and (rp.product_totalitems - rp.product_sold) != 0)';
      $recommanded_products_sub = $this->db->select('*');
      $recommanded_products_sub = $this->db->from('shopping_product rp');
      $recommanded_products_sub = $this->db->join('shopping_product_upload_image rpu','rp.product_id=rpu.product_mapping_id','inner');
      $recommanded_products_sub = $this->db->where($recommanded_where_sub);
      $recommanded_products_sub = $this->db->limit($limit, '0');
      $recommanded_products_sub = $this->db->group_by('rp.product_id');
      $query['recommanded_products'] = $recommanded_products_sub->get()->result_array();
      $sub_pro_count = count($query['recommanded_products']);
      if($sub_pro_count < $limit) {
        $limit_rec = $limit - $sub_pro_count;
        $recommanded_where_rec = '(rrp.product_subcategory_id!="'.$subcategory_id.'" and rrp.product_category_id="'.$category_id.'" and rrp.product_status=1 and rrp.product_recipient_id="'.$recipient_id.'" and (rrp.product_totalitems - rrp.product_sold) != 0)';
        $recommanded_products_rec = $this->db->select('*');
        $recommanded_products_rec = $this->db->from('shopping_product rrp');
        $recommanded_products_rec = $this->db->join('shopping_product_upload_image rrpu','rrp.product_id=rrpu.product_mapping_id','inner');
        $recommanded_products_rec = $this->db->where($recommanded_where_rec);
        $recommanded_products_rec = $this->db->limit($limit_rec, '0');
        $recommanded_products_rec = $this->db->group_by('rrp.product_id');
        $query['recommanded_products_rec'] = $recommanded_products_rec->get()->result_array();
        $rec_pro_count = count($query['recommanded_products_rec']) + $sub_pro_count;
        $query['recommanded_products'] = array_merge($query['recommanded_products'],$query['recommanded_products_rec']);
        if($rec_pro_count && $rec_pro_count < $limit) {
          $limit_cat = $limit - $rec_pro_count;
          $recommanded_where_cat = '(crp.product_category_id!="'.$category_id.'" and crp.product_recipient_id="'.$recipient_id.'" and crp.product_status=1 and (crp.product_totalitems - crp.product_sold) != 0)';
          $recommanded_products_cat = $this->db->select('*');
          $recommanded_products_cat = $this->db->from('shopping_product crp');
          $recommanded_products_cat = $this->db->join('shopping_product_upload_image crpu','crp.product_id=crpu.product_mapping_id','inner');
          $recommanded_products_cat = $this->db->where($recommanded_where_cat);
          $recommanded_products_cat = $this->db->limit($limit_cat, '0');
          $recommanded_products_cat = $this->db->group_by('crp.product_id');
          $query['recommanded_products_cat'] = $recommanded_products_cat->get()->result_array();
          $query['recommanded_products'] = array_merge($query['recommanded_products'],$query['recommanded_products_cat']);
        }
      }

      // Recommanded products end
    }
    else {
      $query['error'] = 1;
    }
    return $query;
  }

  /* --------          Product details page end     -------- */

  /* --------          Basket page start     -------- */

  public function get_basket_product_values() {
    $cart_list_where = '(so.orderitem_session_id="'.$this->session->userdata("user_session_id").'")';
    $this->db->select('*');
    $this->db->from('shopping_orderitem so');
    $this->db->join('shopping_product sp','so.orderitem_product_id=sp.product_id','inner');
    $this->db->join('shopping_product_upload_image pui','sp.product_id=pui.product_mapping_id','inner');
    $this->db->where($cart_list_where);
    $this->db->group_by('so.orderitem_id');
    $query = $this->db->get()->result_array();
    return $query;
  
  } 

  /* --------          Basket page end     -------- */


  //  Get state
  public function get_state()
  {
    $where = '(state_status=1)';
    $query = $this->db->get_where('shopping_state',$where);
    return $query->result_array();
  }


  


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */

