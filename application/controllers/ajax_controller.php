<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax_Controller extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('ajax_model');
        $this->load->library('session');  
        $this->load->library('form_validation');  
    }
     
  	// Registration
	public function registration()
	{	
		$data = $this->ajax_model->get_registeration_status();
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
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */