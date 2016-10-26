<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Header_Footer extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('header_footer_model');
        $this->load->library('session');  
        $this->load->library('form_validation');  
           // Load facebook library and pass associative array which contains appId and secret key
  //    $this->load->library('facebook', array('appId' => '517864548414083', 'secret' => '6cec86f66448fee37b24bb7e7c71a390'));
  //    // Get user's login information
        // $this->user = $this->facebook->getUser();
    }

    // Facebook login
    // public function facebook_login() {


     // if (!$this->user) {
        //  $data['login_url'] = $this->facebook->getLoginUrl(array('redirect_uri' => site_url('index/facebooklogin'),'scope' => array("email")));
        // }


        // if($this->user) {
 //         // $user_profile = $this->facebook->api('/me/');
 //         $user_profile = $this->facebook->api('/me?fields=id,first_name,name,last_name,email');
 //         print_r($user_profile);
 //         $user_password = random_string('alnum',8);
 //         $user_name_id = random_string('alnum',4);
 //         $user_name = $user_profile['name'].' '.$user_name_id;
            
 //             $check_already_where = '(user_email="'.$user_profile['email'].'")';
 //            $check_already_data = $this->db->get_where('shopping_users',$check_already_where);

 //            if($check_already_data -> num_rows() > 0) {
 //             echo "Already exists! Please Check your mail for bespoke login credentials";
 //            }
 //            else {
 //             $reg_data = array(
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
    //          // $config['useragent']      = "CodeIgniter";
    //          // $config['mailpath']       = "/usr/sbin/sendmail -t -i";
    //          // $config['protocol'] = 'smtp';
    //          // $config['smtp_host'] = 'ssl://smtp.gmail.com'; //change this
    //          // $config['smtp_port'] = '465';
    //          // $config['smtp_user'] = 'sweetkannan05@gmail.com'; //change this
    //          // // $config['smtp_pass'] = '*****'; //change this
    //          // $config['mailtype'] = 'html';
    //          // $config['charset'] = 'iso-8859-1';
    //          // $config['wordwrap'] = TRUE;
    //          // // $config['newline'] = "\r\n"; //use double quotes to comply with RFC 822 standard

    //          // $this->load->library('email');
    //          // $this->email->initialize($config);
    //          // $this->email->set_newline('\r\n');
    //          // $this->email->from('sweetkannan05@gmail.com', 'your Name');
    //          // $this->email->to('sweetkannan05@gmail.com');
    //          // $this->email->subject('Your Subject here.. ');
    //          // $this->email->message('Your Message here..');
    //          // if (!$this->email->send()) {
    //          //  echo 'Your e-mail has not been sent!';
    //          // }    
    //       //     else {
    //       //     echo 'Your e-mail has been sent!';
    //       //     }
    //         }
    //      }




    // }

    /* ------          Google Plus Login Start   ----- */

    public function google_plus_login() {

         $data['glogin_url'] = '#';
        // Include the google api php libraries
        include_once APPPATH."libraries/google-api-php-client/Google_Client.php";
        include_once APPPATH."libraries/google-api-php-client/contrib/Google_Oauth2Service.php";
        
        // Google Project API Credentials
        $clientId = $this->config->item('google_id');
        $clientSecret = $this->config->item('google_secret_key');
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
            if(!empty($userData)) {
               $status = $this->header_footer_model->get_glogin_status($userData);
                if($status==0) {
                    // alert message
                    $data['status'] = "Already exists! Please Check your mail for bespoke login credentials";
                    $this->session->unset_userdata('token');
                }
                else {
                    $data['status'] = "Success";
                    // mail function
                }
            } 
            else {
               $this->session->unset_userdata('token'); 
               $data['status'] = "Login failed";
            }
        } 
        else {
            $data['status'] = 1;
            $data['glogin_url'] = $gClient->createAuthUrl(); 
        }
        return $data;

    }

    /* ------          Google Plus Login End   ----- */

    /* ------          Menu Bar Fields Start   ----- */

    public function menu_bar_fields() {

        $data_values_navbar = $this->header_footer_model->get_menubar_fields();
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
        return $out;
    }

    /* ------          Menu Bar Fields End   ----- */

    /* --------          Header page end     -------- */
      

}

/* End of file Header_Footer.php */
/* Location: ./application/controllers/Header_Footer.php */