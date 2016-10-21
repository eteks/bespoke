<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');     
    }
     
    // Index page
	public function index()
	{
		$this->load->view('index');
	}

	// Product list page
	public function products_list()
	{
		$this->load->view('category');
	}
	public function category()
	{
		$this->load->view('category');
	}
	public function sub_category()
	{
		$this->load->view('sub_category');
	}
	public function about_us()
	{
		$this->load->view('about_us');
	}
	public function account_1()
	{
		$this->load->view('account_1');
	}
	public function account()
	{
		$this->load->view('account');
	}
	public function cart()
	{
		$this->load->view('cart');
	}
	public function checkout_0()
	{
		$this->load->view('checkout_0');
	}
	public function checkout_1()
	{
		$this->load->view('checkout_1');
	}
	public function checkout_2()
	{
		$this->load->view('checkout_2');
	}
public function checkout_3()
	{
		$this->load->view('checkout_3');
	}
	public function checkout_4()
	{
		$this->load->view('checkout_4');
	}
	public function checkout_5()
	{
		$this->load->view('checkout_5');
	}
	public function contact_us()
	{
		$this->load->view('contact_us');
	}
	public function forgot_password()
	{
		$this->load->view('forgot_password');
	}
	public function form()
	{
		$this->load->view('form');
	}
	public function error_page()
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
	public function product_details()
	{
		$this->load->view('product_details');
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
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */