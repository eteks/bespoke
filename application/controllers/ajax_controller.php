<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax_Controller extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('ajax_model');
        $this->load->library('session'); 
        $this->load->library('email');   
        $this->load->library('form_validation');  
    }
     
  	// Registration
	public function registration()
	{	
		$data = $this->ajax_model->get_registeration_status();
		echo $data;
	}

    // Registration
    public function forget_password()
    {   
        $data = $this->ajax_model->get_forget_password_status();
        echo $data;
    }

    // Login
    public function login()
    {   
        $data = $this->ajax_model->get_login_status();
        echo $data;
    }

    // load more featured products
    public function load_more_featured()
    {   
        $data_values = $this->ajax_model->get_load_more_featured();
        $data['featured_products'] = $data_values['featured_products'];
        $data['featured_remaining_products'] = $data_values['featured_remaining_products'];
        $this->load->view('index',$data);
    }
    // Product attributes combination
    public function attribute_price()
    {   
        $data = $this->ajax_model->get_attribute_price();
        echo json_encode($data);
    }

    // Product attributes in popup
    public function popup_attributes()
    { 
        $product_details = $this->ajax_model->get_product_info_popup();
        $data['error'] = $product_details['error'];
        if($data['error'] != 1) {
            $data['product_details'] = $product_details['product_details'];
            $data_attributes_values = $product_details['product_attributes'];
            $out = array();
            if(!empty($data_attributes_values)) {
                foreach ($data_attributes_values as $key => $row) {
                    foreach ($row as $k => $r) {
                        if(!isset($out[$row['product_attribute_id']][$row['product_attribute_value_id']])) {
                            $out[$row['product_attribute_id']]['product_attribute_value_id'][$row['product_attribute_value_id']] = $row['product_attribute_value'];
                        }
                        if($k == 'product_attribute') {
                            $out[$row['product_attribute_id']][$k] = $row[$k];
                        }
                    }
                }
            }
            $data['product_attributes'] = $out;
            $data['product_gallery'] = $product_details['product_gallery'];
            $data['default_group'] = $product_details['default_group'];
            $this->load->view('cart_popup',$data); 
        }
        else {
            redirect(base_url().'nopage');
        }   
    }

    // Add to cart- add items in cart
    public function add_to_cart_details()
    {   
        $data_values = $this->ajax_model->insert_product_to_cart();
        $data['error'] = $data_values['error'];
        if($data['error'] != 1) {
            $data['status'] = $data_values['status'];
            echo $data['status'];
        }
        else {
            redirect(base_url().'nopage');
        }
    }

    // Remove items in cart
    public function remove_cart_product()
    {   
        $data_values = $this->ajax_model->get_status_remove_items();
        $data['error'] = $data_values['error'];
        if($data['error'] != 1) {
            $data['status'] = $data_values['status'];
            echo $data['status'];
        }
        else {
            redirect(base_url().'nopage');
        }
    }

    // Update products in basket
    public function update_baseket_product()
    {   
        $data_values = $this->ajax_model->get_update_product();
        $data['error'] = $data_values['error'];
        if($data['error'] != 1) {
            $data['status'] = $data_values['status'];
            echo $data['status'];
        }
        else {
            redirect(base_url().'nopage');
        }
    }

    // Get city based on state
    public function get_city()
    {   
        $data = $this->ajax_model->get_city_data();
        echo json_encode($data);
    }

    // Get area based on city
    public function get_area()
    {   
        $data = $this->ajax_model->get_area_data();
        echo json_encode($data);
    }

    // Get shipping amount based on area
    public function get_area_shipping()
    {   
        $data = $this->ajax_model->get_area_shipping_amount();
        echo $data;
    }

    // Get default address in checkout page
    public function checkout_profile_detail()
    {   
        $data_values = $this->ajax_model->get_checkout_profile_detail();
        $data['profile_details'] = $data_values['profile_details'];
        $data['state'] = $data_values['state'];
        $data['profile_get_city'] = $data_values['profile_get_city'];
        $data['profile_get_area'] = $data_values['profile_get_area'];
        $data['shipping_amount'] = $data_values['shipping_amount'];
        $this->load->view('checkout',$data,false);
    }



        

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */