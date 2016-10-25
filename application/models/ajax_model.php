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
      $featured_products_where = '(prof.product_status=1 and prof.product_is_featured=1 and (prof.product_totalitems - prof.product_sold) != 0)';
      $featured_products_count_where = '(proc.product_status=1 and proc.product_is_featured=1 and (proc.product_totalitems - proc.product_sold) != 0)';
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

  //  Get product attribute price
  public function get_attribute_price() {
    $attribute_details = array();
    if($this->input->post('atribute_combination') && $this->input->post('product_id')) {
      $attribute_where = '(product_mapping_id="'.$this->input->post('product_id').'" and  (product_attribute_group_totalitems - product_attribute_group_sold) != 0)';
      $this->db->where($attribute_where); 
      $this->db->where_in('product_attribute_value_combination_id',$this->input->post('atribute_combination'));
      $attribute_query = $this->db->get('shopping_product_attribute_group');
      if($attribute_query->num_rows() > 0) {
        $attribute_details = $attribute_query->row_array();
      }
    }
    return $attribute_details;
  }


  public function get_product_info_popup()
  {   
    $query['product_details'] = array();
    $query['product_attributes'] = array();
    $query['product_gallery'] = array();
    $query['default_group'] = array(); 
    $query['error'] = 0;
    if($this->input->post('pro_id')) {

      // Product details
      $product_id = $this->input->post('pro_id');
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
    }
    else {
      $query['error'] = 1;
    }
    return $query;
  }

  //  To insert product to cart and get status
  public function insert_product_to_cart() {
    $data['error'] = 0;
    if($this->input->post('pro_id') && $this->input->post('quan')) {

      $pro_id = $this->input->post('pro_id');
      $order_session_id = $this->session->userdata('user_session_id');
      $quan = $this->input->post('quan');

      if($this->input->post('grp_id')) {
        $grp_id = $this->input->post('grp_id');
        $add_to_cart_where = '(product_attribute_group_id="'.$grp_id.'" and (product_attribute_group_totalitems - product_attribute_group_sold) >= "'.$quan.'")';
        $add_to_cart_query = $this->db->get_where('shopping_product_attribute_group',$add_to_cart_where);
        $add_to_cart_query_array =  $add_to_cart_query->row_array();
        if(!empty($add_to_cart_query_array)) {
          $items_status = 1;
          $price = $add_to_cart_query_array['product_attribute_group_price'];
        }
        else {
          $items_status = 0;
          $group_status =1;
        }
      }
      else {
        $grp_id=0;
        $add_to_cart_where = '(product_id="'.$pro_id.'" and (product_totalitems - product_sold) >= "'.$quan.'")';
        $add_to_cart_query = $this->db->get_where('shopping_product',$add_to_cart_where);
        $add_to_cart_query_array =  $add_to_cart_query->row_array();
        if(!empty($add_to_cart_query_array)) {
          $items_status = 1;
          $price = $add_to_cart_query_array['product_price'];
        }
        else {
          $items_status = 0;
          $group_status = 0;
        }
      }
         
      if($items_status!=0) {
        $add_to_cart_product_where = '( orderitem_product_id="'.$pro_id.'" and orderitem_product_attribute_group_id = "'.$grp_id.'" and orderitem_session_id="'.$order_session_id.'")';
        $add_to_cart_product_query = $this->db->get_where('shopping_orderitem',$add_to_cart_product_where);
        $add_to_cart_product_query_array =  $add_to_cart_product_query->row_array();
        $orderitem_count = count($add_to_cart_product_query_array);
        if($orderitem_count > 0) {
          $unique_id = $add_to_cart_product_query_array['orderitem_id'];
          $order_update_data = array( 
                                'orderitem_product_attribute_group_id' => $grp_id,
                                'orderitem_price' => $price,
                                'orderitem_quantity' => $quan,
                                'orderitem_status' => '1',
                                'orderitem_session_id' => $order_session_id,
                                'orderitem_product_id' => $pro_id
                              );
          $order_update_where = '( orderitem_id="'.$unique_id.'")'; 
          $this->db->set($order_update_data); 
          $this->db->where($order_update_where); 
          $this->db->update("shopping_orderitem", $order_update_data);
          $data['status'] = "Updated successfully";
        }
        else {
          $order_insert_data = array(
                                'orderitem_product_id' => $pro_id,
                                'orderitem_product_attribute_group_id' => $grp_id,
                                'orderitem_price' => $price,
                                'orderitem_quantity' => $quan,
                                'orderitem_session_id' => $order_session_id,
                                'orderitem_status' => '1'
                              );
          $this->db->insert('shopping_orderitem', $order_insert_data);
          $data['status'] = "Added successfully";
        } 
      }
      else {

        if($group_status!=0) {
          $available_items_where = '(product_attribute_group_id="'.$grp_id.'")';
          $available_items_query = $this->db->get_where('shopping_product_attribute_group',$available_items_where)->row_array();
          $quantity = $available_items_query['product_attribute_group_totalitems'] - $available_items_query['product_attribute_group_sold'];
          $data['status']  =  "Available only ".$quantity;
        }
        else {
          $available_items_where = '(product_id="'.$pro_id.'")';
          $available_items_query = $this->db->get_where('shopping_product',$available_items_where)->row_array();
          $quantity = $available_items_query['product_totalitems'] - $available_items_query['product_sold'];
          $data['status']  =  "Available only ".$quantity;
        }
      }
    }
    else {
      $data['error'] = 1;
    }
    return $data;

  }

  //  Remove items in cart list
  public function get_status_remove_items() {
    $data['status'] = 0;
    $data['error'] = 0;
    if($this->input->post('cart_pro_id')) {
      $order_session_id = $this->session->userdata('user_session_id');
      $basket_remove_where='(orderitem_product_id="'.$this->input->post('cart_pro_id').'" and orderitem_session_id= "'.$order_session_id.'" and orderitem_product_attribute_group_id= "'.$this->input->post('cart_grp_id').'")';
      $this->db->where($basket_remove_where);
      $this->db->delete('shopping_orderitem');
      $data['status'] = "success";
    }
    else {
      $data['error'] = 1;
    }
    return $data;
  }

  //  Update quantity in basket
  public function get_update_product() {
    $data['error'] = 0;
    if($this->input->post('updation_det')) {
      $order_session_id = $this->session->userdata('user_session_id');
      $updation_det = $this->input->post('updation_det');
      foreach ($updation_det as $key => $value) {
        $split_det = explode(',',$value);
        $group_id = $split_det[0];
        $quan = $split_det[1];
        if($group_id != 0) {
          $update_quantity_where = '(pag.product_attribute_group_id="'.$group_id.'")';
          $this->db->select('*');
          $this->db->from('shopping_product_attribute_group pag');
          $this->db->join('shopping_product sp','pag.product_mapping_id=sp.product_id','inner');
          $this->db->where($update_quantity_where);
          $update_quantity_query =  $this->db->get()->row_array();
          $update_quantity =  $update_quantity_query['product_attribute_group_totalitems'] - $update_quantity_query['product_attribute_group_sold'];
        }
        else {
          $update_quantity_where = '(product_id="'.$key.'")';
          $update_quantity_query = $this->db->get_where('shopping_product',$update_quantity_where)->row_array();
          $update_quantity =  $update_quantity_query['product_totalitems'] - $update_quantity_query['product_sold'];
        }
        if($update_quantity >= $quan) {
          $basket_update_data = array( 
                                  'orderitem_quantity' => $quan,
                                ); 
          $basket_update_where = '(orderitem_product_id="'.$key.'" and orderitem_product_attribute_group_id="'.$group_id.'" and orderitem_session_id="'.$order_session_id.'")'; 
          $this->db->set($basket_update_data); 
          $this->db->where($basket_update_where); 
          $this->db->update("shopping_orderitem", $basket_update_data);
          $data['status'] ="success";
        }
        else {
          $data['status'] ="".$update_quantity_query['product_title']." is not available. Available only ".$update_quantity; 
          return $data;
        }
      }
    }
    else {
      $data['error'] = 1;
    }
    return $data;
  }






}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */