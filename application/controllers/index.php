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

		/* ------          Google Login    ----- */
		// Include the google api php libraries
        include_once APPPATH."libraries/google-api-php-client/Google_Client.php";
        include_once APPPATH."libraries/google-api-php-client/contrib/Google_Oauth2Service.php";
        
        // Google Project API Credentials
        $clientId = '803855437633-3bvq3m2akbgeu7ilrfr668fr3j5c5a4p.apps.googleusercontent.com';
        $clientSecret = 'qSzTTivFedKAhWtH0CI7iJp-';
        $redirectUrl = 'http://localhost/bespoke';
        
        // Google Client Configuration
        $gClient = new Google_Client();
        $gClient->setApplicationName('Login to bespoke.com');
        $gClient->setClientId($clientId);
        $gClient->setClientSecret($clientSecret);
        $gClient->setRedirectUri($redirectUrl);
        $google_oauthV2 = new Google_Oauth2Service($gClient);

        if (isset($_REQUEST['code'])) {
            $gClient->authenticate();
            $this->session->set_userdata('token', $gClient->getAccessToken());
            redirect($redirectUrl);
        }

        $token = $this->session->userdata('token');
        if (!empty($token)) {
            $gClient->setAccessToken($token);
        }

        if ($gClient->getAccessToken()) {
            $userProfile = $google_oauthV2->userinfo->get();

            // Preparing data for database insertion
            $userData['oauth_provider'] = 'google';
            $userData['id'] = $userProfile['id'];
            $userData['email'] = $userProfile['email'];
            $userData['user_name'] = $userProfile['name'];
            $userData['first_name'] = $userProfile['given_name'];
            // Insert or update user data

	        if(!empty($userData)){
               $status = $this->index_model->get_glogin_status($userData);
            	if($status==0) {
       		  		echo "Already exists! Please Check your mail for bespoke login credentials";
       		  		$this->session->unset_userdata('token');
        			redirect(base_url());
               	}
            } 
            else {
               echo "Login failed";
            }
        } 
        else {
            $data['authUrl'] = $gClient->createAuthUrl();
        }
        /* ------          Google end    ----- */
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
			// print_r($out);
			// echo "</pre>";
			$this->load->view('category',$data);
		}
		else {
			redirect(base_url().'nopage');
		}
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
	public function forgot_password()
	{
		$this->load->view('forgot_password');
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
	public function portfolio()
	{
		$this->load->view('portfolio');
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
	public function recipient_category()
	{
		$this->load->view('recipient_category');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */