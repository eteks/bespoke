<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller {

	public $user = "";

	public function __construct()
    {
        parent::__construct();
        $this->load->model('index_model');
        $this->load->helper('url');
        $this->load->library('session');
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
		// unset($_SESSION['access_token']);
        redirect(base_url()); 
    }

    // Facebook login
	// public function facebooklogin()
 //    {
 //    	if($this->user) {
 //    		// $user_profile = $this->facebook->api('/me/');
 //    		$user_profile = $this->facebook->api('/me?fields=id,first_name,name,last_name,email');
 //    		print_r($user_profile);
 //    		$user_password = random_string('alnum',8);
 //    		$user_name_id = random_string('alnum',4);
 //    		$user_name = $user_profile['name'].' '.$user_name_id;
   			
 //   			$check_already_where = '(user_email="'.$user_profile['email'].'")';
 //            $check_already_data = $this->db->get_where('shopping_users',$check_already_where);

 //            if($check_already_data -> num_rows() > 0) {
 //            	echo "Already exists! Please Check your mail for bespoke login credentials";
 //            }
 //            else {
 //            	$reg_data = array(
	//                 'user_name' => $user_name,
	//                 'user_password' => $user_password,
	//                 'user_email' => $user_profile['email'],
	//                 'user_status' => '1'
	//             );
	//             $this->db->insert('shopping_users', $reg_data);
	//             $user_id = $this->db->insert_id();
	//             $check_login_where = '(user_id="'.$user_id.'")';
	//             $check_login_data = $this->db->get_where('shopping_users',$check_login_where);
	//             // $this->facebook->destroysession();
	//             $this->session->set_userdata("login_status","1");   
	//             $user_session_details = $check_login_data->row_array();
	//             $this->session->set_userdata("login_session",$user_session_details);
	//             redirect('index');
	//             $this->facebook->destroysession();
	// 			// $config['useragent']      = "CodeIgniter";
	// 			// $config['mailpath']       = "/usr/sbin/sendmail -t -i";
	// 			// $config['protocol'] = 'smtp';
	// 			// $config['smtp_host'] = 'ssl://smtp.gmail.com'; //change this
	// 			// $config['smtp_port'] = '465';
	// 			// $config['smtp_user'] = 'sweetkannan05@gmail.com'; //change this
	// 			// // $config['smtp_pass'] = '*****'; //change this
	// 			// $config['mailtype'] = 'html';
	// 			// $config['charset'] = 'iso-8859-1';
	// 			// $config['wordwrap'] = TRUE;
	// 			// // $config['newline'] = "\r\n"; //use double quotes to comply with RFC 822 standard

	// 			// $this->load->library('email');
	// 			// $this->email->initialize($config);
	// 			// $this->email->set_newline('\r\n');
	// 			// $this->email->from('sweetkannan05@gmail.com', 'your Name');
	// 			// $this->email->to('sweetkannan05@gmail.com');
	// 			// $this->email->subject('Your Subject here.. ');
	// 			// $this->email->message('Your Message here..');
	// 			// if (!$this->email->send()) {
	// 			// 	echo 'Your e-mail has not been sent!';
	// 			// }	
	// 		 //  	else {
	// 		 //    	echo 'Your e-mail has been sent!';
	// 		 //  	}
	//         }
	//    	}

 //    }

    /* --------          Header page end     -------- */

    /* --------          Index page start     -------- */

    // product list page
	public function index()
	{
		// if (!$this->user) {
		// 	$data['login_url'] = $this->facebook->getLoginUrl(array('redirect_uri' => site_url('index/facebooklogin'),'scope' => array("email")));
		// }
		$default_credentials = $this->index_model->get_credentials();
		$product_list = $this->index_model->get_product_list();
		$data['new_arrivals'] = $product_list['new_arrivals'];
		$data['featured_products'] = $product_list['featured_products'];
		$data_values_navbar = $this->index_model->get_menubar_fields();
		$out = array();
		if(!empty($data_values_navbar)) {
			foreach ($data_values_navbar as $key => $row) {
				foreach ($row as $k => $r) {
					if(!isset($out[$row['recipient_id']][$row['category_id']][$row['subcategory_id']])) {
						$out[$row['recipient_id']]['category_id'][$row['category_id']]['subcategory_id'][$row['subcategory_id']] = $row['subcategory_name'];
				    }
				    if($k == 'recipient_type') {
	     				$out[$row['recipient_id']][$k] = $row[$k];
	     			}
	     			else if($k == 'category_name') {
	     				$out[$row['recipient_id']]['category_id'][$row['category_id']][$k] = $row[$k];
	     			}
			    }
			}
		}
		$data['menubar_fields'] = $out;
		$data['featured_remaining_products'] = $product_list['featured_remaining_products'];
		$data['all_recipients'] = $this->index_model->get_all_recipients();
		// print_r($data['login_url']);	
		$this->load->view('index',$data);
	}

	/* --------          Index page end     -------- */

	/* --------          Listing page start     -------- */

	// Product list page
	public function products_list()
	{
		$this->load->view('category');
	}

	/* --------          Listing page end     -------- */

	/* --------          Recipients page start     -------- */

	// Category and subcategory list page
	public function recipients_list()
	{
		$this->load->view('recipients');
	}

	/* --------          Recipients page end     -------- */

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
	

	


	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */