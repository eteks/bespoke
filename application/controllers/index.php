<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller {

	public $user = "";

	public function __construct()
    {
        parent::__construct();
        $this->load->model('index_model');
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library('../controllers/header_footer');
        // Load facebook library and pass associative array which contains appId and secret key
  //   	$this->load->library('facebook', array('appId' => '517864548414083', 'secret' => '6cec86f66448fee37b24bb7e7c71a390'));
  //   	// Get user's login information
		// $this->user = $this->facebook->getUser();
    }
    
    /* --------          Header page start     -------- */

    // Logout - Clear session
	public function logout()
    {
        $this->session->unset_userdata('login_status');
        $this->session->unset_userdata('login_session');
		$this->session->unset_userdata('token');
        redirect(base_url()); 
    }

    /* --------          Index page start     -------- */

    // product list page
	public function index()
	{
		// Google plus login
		$glogin_values = $this->header_footer->google_plus_login();
		$data['google_url'] = $glogin_values['glogin_url'];
		$data['social_login_status'] = $glogin_values['status'];

		// Get navbar fields
		$data['menubar_fields'] = $this->header_footer->menu_bar_fields();

		// Cart items
		$data['add_to_cart_list'] = $this->index_model->get_add_to_cart_list();

		// Get all recipients in footer
		$data['all_recipients'] = $this->index_model->get_all_recipients();

		$default_credentials = $this->index_model->get_credentials();
		$product_list = $this->index_model->get_product_list();
		$data['new_arrivals'] = $product_list['new_arrivals'];
		$data['featured_products'] = $product_list['featured_products'];
	
		$data['featured_remaining_products'] = $product_list['featured_remaining_products'];

		$data['add_to_cart_list'] = $this->index_model->get_add_to_cart_list();

		// echo "<pre>";
		// print_r($data['add_to_cart_list']);
		// echo "<pre>";
		
		// print_r($data['login_url']);	
		$this->load->view('index',$data);
	}

	/* --------          Index page end     -------- */

	/* --------          Listing page start     -------- */

	// Product list page
	public function products_list()
	{
		// Google plus login
		$glogin_values = $this->header_footer->google_plus_login();
		$data['google_url'] = $glogin_values['glogin_url'];
		$data['social_login_status'] = $glogin_values['status'];

		// Get navbar fields
		$data['menubar_fields'] = $this->header_footer->menu_bar_fields();

		// Cart items
		$data['add_to_cart_list'] = $this->index_model->get_add_to_cart_list();

		// Get all recipients in footer
		$data['all_recipients'] = $this->index_model->get_all_recipients();

		$sidebar_list = $this->index_model->listing_data();
		$data['error'] = $sidebar_list['error'];
		if($data['error'] != 1) {
			$data['rec_name'] = $sidebar_list['rec_name'];
			$data['cat_name'] = $sidebar_list['cat_name'];
			$data['subcategory_name'] = $sidebar_list['subcategory_name'];
			$data['subcategory_list'] = $sidebar_list['subcategory_list'];
			$data['product_list'] = $sidebar_list['product_list'];
			$data_atribute = $sidebar_list['attribute_list'];
			$out = array();
			if(!empty($data_atribute)) {
				foreach ($data_atribute as $key => $row) {
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
			$data['attribute_list'] = $out;

			// echo "<pre>";
			// print_r($data['product_list']);
			// echo "<pre>";



			$this->load->view('category',$data);
		}
		else {
			redirect(base_url().'nopage');
		}
	}

	/* --------          Listing page end     -------- */

	/* --------          product details start     -------- */

	public function product_details()
	{	
		// Google plus login
		$glogin_values = $this->header_footer->google_plus_login();
		$data['google_url'] = $glogin_values['glogin_url'];
		$data['social_login_status'] = $glogin_values['status'];

		// Get navbar fields
		$data['menubar_fields'] = $this->header_footer->menu_bar_fields();

		// Cart items
		$data['add_to_cart_list'] = $this->index_model->get_add_to_cart_list();

		// Get all recipients in footer
		$data['all_recipients'] = $this->index_model->get_all_recipients();

		$product_details = $this->index_model->get_product_info();
		$data['error'] = $product_details['error'];
		if($data['error'] != 1) {
			$data['product_details'] = $product_details['product_details'];
			$data_attributes_values	= $product_details['product_attributes'];
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
			$data['recommanded_products'] = $product_details['recommanded_products'];
			$data['default_group'] = $product_details['default_group'];
			$this->load->view('product_details',$data);		
		}
		else {
			redirect(base_url().'nopage');
		}	
	}

	/* --------          product details end     -------- */

	/* --------          Cart page start     -------- */

	public function cart()
	{	
		// Google plus login
		$glogin_values = $this->header_footer->google_plus_login();
		$data['google_url'] = $glogin_values['glogin_url'];
		$data['social_login_status'] = $glogin_values['status'];

		// Get navbar fields
		$data['menubar_fields'] = $this->header_footer->menu_bar_fields();

		// Cart items
		$data['add_to_cart_list'] = $this->index_model->get_add_to_cart_list();

		// Get all recipients in footer
		$data['all_recipients'] = $this->index_model->get_all_recipients();

		// Product details in cart
		$data['product_details'] = $this->index_model->get_basket_product_values();
		$this->load->view('cart',$data);
	}

	/* --------          Cart page end     -------- */

	/* --------          Checkout page start     -------- */

	public function checkout()
	{	
		// Google plus login
		$glogin_values = $this->header_footer->google_plus_login();
		$data['google_url'] = $glogin_values['glogin_url'];
		$data['social_login_status'] = $glogin_values['status'];

		// Get navbar fields
		$data['menubar_fields'] = $this->header_footer->menu_bar_fields();

		// Cart items
		$data['add_to_cart_list'] = $this->index_model->get_add_to_cart_list();

		// Get all recipients in footer
		$data['all_recipients'] = $this->index_model->get_all_recipients();

		// Product details in checkout
		$data['product_details'] = $this->index_model->get_basket_product_values();

		// Get product session
		$data['orderitem_session_id_checkout'] = $this->session->userdata('user_session_id');

		// Get state
		$data['state'] = $this->index_model->get_state();
		$this->load->view('checkout',$data);
	}

	/* --------          Checkout page end     -------- */

	/* --------          Recipients page start     -------- */

	public function recipient_category()
	{
		// Google plus login
		$glogin_values = $this->header_footer->google_plus_login();
		$data['google_url'] = $glogin_values['glogin_url'];
		$data['social_login_status'] = $glogin_values['status'];

		// Get navbar fields
		$data['menubar_fields'] = $this->header_footer->menu_bar_fields();

		// Cart items
		$data['add_to_cart_list'] = $this->index_model->get_add_to_cart_list();

		// Get all recipients in footer
		$data['all_recipients'] = $this->index_model->get_all_recipients();

		// Get category list
		$data_values = $this->index_model->get_recipients_category();	
		$data['recipient_slider'] = $data_values['recipient_slider'];
		$data['recipient_category'] = $data_values['recipient_category'];
		$this->load->view('recipient_category',$data);
	}

	/* --------          Recipients page end     -------- */


	/* --------          Forget password page start     -------- */

	public function forgot_password()
	{
		// Google plus login
		$glogin_values = $this->header_footer->google_plus_login();
		$data['google_url'] = $glogin_values['glogin_url'];
		$data['social_login_status'] = $glogin_values['status'];

		// Get navbar fields
		$data['menubar_fields'] = $this->header_footer->menu_bar_fields();

		// Cart items
		$data['add_to_cart_list'] = $this->index_model->get_add_to_cart_list();

		// Get all recipients in footer
		$data['all_recipients'] = $this->index_model->get_all_recipients();
		$this->load->view('forgot_password',$data);
	}

	/* --------          Forget password page end     -------- */

	/* --------          Photo shoot page start     -------- */

	public function portfolio()
	{
		// Google plus login
		$glogin_values = $this->header_footer->google_plus_login();
		$data['google_url'] = $glogin_values['glogin_url'];
		$data['social_login_status'] = $glogin_values['status'];

		// Get navbar fields
		$data['menubar_fields'] = $this->header_footer->menu_bar_fields();

		// Cart items
		$data['add_to_cart_list'] = $this->index_model->get_add_to_cart_list();

		// Get all recipients in footer
		$data['all_recipients'] = $this->index_model->get_all_recipients();

		// Get image gallery
		$data_image_values = $this->index_model->get_image_gallery();
		$out = array();
		if(!empty($data_image_values)) {
			foreach ($data_image_values as $key => $row) {
				foreach ($row as $k => $r) {
			    	if($k == 'display_title' || $k == 'display_description') {
     					$out[$row['display_id']][$k] = $row[$k];
	     			}
	     			else {
	     				if(!isset($out[$row['display_id']][$row['person_id']])) {
							$out[$row['display_id']]['person_id'][$row['person_id']][$k] = $row[$k];
			    		}
	     			}
			   	}
			}
		}
		$data['photo_gallery'] = $out;
		$this->load->view('portfolio',$data);
	}

	/* --------          Photo shoot page end     -------- */

	/* --------          Photo shoot gallery start     -------- */

	public function photo_shoot_gallery()
	{
		// Google plus login
		$glogin_values = $this->header_footer->google_plus_login();
		$data['google_url'] = $glogin_values['glogin_url'];
		$data['social_login_status'] = $glogin_values['status'];

		// Get navbar fields
		$data['menubar_fields'] = $this->header_footer->menu_bar_fields();

		// Cart items
		$data['add_to_cart_list'] = $this->index_model->get_add_to_cart_list();

		// Get all recipients in footer
		$data['all_recipients'] = $this->index_model->get_all_recipients();

		// Get photo shoot image gallery
		$data_image_values = $this->index_model->get_photo_shoot_gallery();
		$data['error'] = $data_image_values['error'];
		if($data['error'] != 1) {
			$data['title_detail'] = $data_image_values['title_detail'];
			$data['image_album'] = $data_image_values['image_album'];
		}
		else {
			redirect(base_url().'nopage');
		}

		// echo "<pre>";
		// print_r($data['image_album']);
		// echo "</pre>";


		$this->load->view('photo_shoot_gallery',$data);
	}

	/* --------          Photo shoot page end     -------- */

	/* --------          About page start     -------- */

	public function about_details()
	{
		$this->load->view('about_us');
	}

	/* --------          About page end     -------- */

	/* --------          Contact page start     -------- */

	public function contact_details()
	{
		$this->load->view('contact_us');
	}

	/* --------          Contact page end     -------- */
	
	public function account()
	{
		$this->load->view('account');
	}
	public function form()
	{
		$this->load->view('form');
	}
	public function nopage()
	{
		$this->load->view('error_page');
	}
	public function add_address()
	{
		$this->load->view('add_address');
	}
	public function login()
	{
		$this->load->view('login');
	}
	public function my_address()
	{
		$this->load->view('my_address');
	}
	public function order_list()
	{
		$this->load->view('order_list');
	}
	public function order_status()
	{
		$this->load->view('order_status');
	}
	public function thanks_for_order()
	{
		$this->load->view('thanks_for_order');
	}
	public function user_information()
	{
		$this->load->view('user_information');
	}
	public function welcome_message()
	{
		$this->load->view('welcome_message');
	}
	public function wishlist()
	{
		$this->load->view('wishlist');
	}
	public function pre_wedding()
	{
		$this->load->view('pre_wedding');
	}
	public function post_wedding()
	{
		$this->load->view('post_wedding');
	}
	public function track_order()
	{
		$this->load->view('track_order');
	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */