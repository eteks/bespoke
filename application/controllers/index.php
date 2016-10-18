<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('index_model');
        $this->load->helper('url');
        $this->load->library('session');
    }
     
    // Index page
	public function index()
	{
		$default_credentials = $this->index_model->get_credentials();
		$product_list = $this->index_model->get_product_list();
		$data['new_arrivals'] = $product_list['new_arrivals'];


		
		$this->load->view('index',$data);
	}

	// Product list page
	public function products_list()
	{
		$this->load->view('category');
	}

	// Logout - Clear session
	public function logout()
    {
        $this->session->unset_userdata('login_status');
        $this->session->unset_userdata('login_session');
        redirect(base_url()); 
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */