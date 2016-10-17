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
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */