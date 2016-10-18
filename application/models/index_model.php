<?php 

class Index_Model extends CI_Model {

	public function __construct()
  {
    $this->load->database();
  }
  
  // Default credentials
  public function get_credentials()
  {
    $login_status = $this->session->userdata("login_status");
    $random = uniqid();

    // General session not exists
    if(!$this->session->userdata("general_session_id")) {
      $this->session->set_userdata("general_session_id",$random);
    }

    // Order session exists
    if($this->session->userdata("user_session_id")) {
      // echo $this->session->userdata("user_session_id");
      $session_id = explode('_',$this->session->userdata("user_session_id"));  
      if($login_status == 1) {
        $login_session = $this->session->userdata("login_session");
        $user_id = $login_session['user_id'];
        if($user_id != $session_id[2]) {
          $this->session->unset_userdata('user_session_id');
        }
      }
      else {
        $user_id = 0;
        if($user_id != $session_id[2]) {
          $this->session->unset_userdata('user_session_id');
        } 
      }
    }

    // Order session not exists
    if(!$this->session->userdata("user_session_id")) {
      $general_session_id = $this->session->userdata("general_session_id");
      if($login_status == 1) {
        $login_session = $this->session->userdata("login_session");
        $user_id = $login_session['user_id'];
        $this->session->set_userdata("user_session_id","reg_user_".$user_id."_".$general_session_id);
      }
      else {
        $user_id = 0;
        $this->session->set_userdata("user_session_id","reg_user_".$user_id."_".$general_session_id);
      }
    }
  }	
    	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */