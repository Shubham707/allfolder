<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserManager extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->helper('form');
    $this->load->database();
    $this->load->model('UserManagerModel');
    $this->load->model('User_model');
  }
  //user signup function
  public function signup()
  {
    $this->load->view('public/signup');
  }
  //user login function
  public function login()
  {
    $session_captcha['captchaVals']=$this->userDefaultCaptch();
    $this->load->view('public/login',$session_captcha);
  }
  //user forget password functions
  public function forget()
  {
    $this->load->view('public/forgot');
  }
  //user dashboard page
  public function dashboard()
  {
    $email=$this->session->userdata('userEmail');
    $arr['users']=$this->UserManagerModel->total($email);
    $arr['items']=$this->UserManagerModel->coinItem($email);
    $arr['items_sold']=$this->UserManagerModel->items_sold($email);
    $arr['monthly']=$this->UserManagerModel->imcome_monthly($email);
    $arr['all']=$this->UserManagerModel->imcome_All($email);
   $this->load->view('dashboard/index',$arr);
  }
  //register
  public function register()
  {
    $this->form_validation->set_error_delimiters('<label class="error">', '</label>');
    $this->form_validation->set_rules('fname', 'First name', 'required|alpha');
    $this->form_validation->set_rules('lname', 'Last name', 'required|alpha');
    $this->form_validation->set_rules('uemail', 'Email', 'required|valid_email|is_unique[users.email]',array(
                'required'      => 'You have not provided %s.',
                'is_unique'     => 'This %s already exists.'
        ));
    $this->form_validation->set_rules('upassword', 'Password', 'required');
    $this->form_validation->set_rules('ucpassword', 'Confirm Password', 'required');
    if ($this->form_validation->run() == FALSE)
    {
    $this->load->view('public/signup');
    }else {
      $boxID=$this->UserManagerModel->listing();
      $total=$boxID + 1;
      $ip= $_SERVER['REMOTE_ADDR'];
      $data = array(
      'firstname'=>	$this->input->post('fname'),
      'lastname'=>	$this->input->post('lname'),
      'email'=>		$this->input->post('uemail'),
      'box_id'=>    $total,
      'ipAddress'=>    $ip,
      'password'=>    hash('sha256', strtolower($this->input->post('upassword'))),
    );
    if($this->UserManagerModel->dataSave($data))
    {
      // $subject="User Registration";
	  	// $message = 'Registration Successfull';
  		// // Configure email library
  		// $config['protocol'] = 'smtp';
  		// $config['smtp_host'] = 'ssl://smtp.zoho.com';
  		// $config['smtp_port'] = 465;
  		// $config['smtp_user'] = 'info@v-coin.io';
  		// $config['smtp_pass'] = 'vision@123';
      //
  		// // Load email library and passing configured values to email library
  		// $this->load->library('email',$config);
  		// $this->email->set_newline("\r\n");
  		// // Sender email address
  		// $this->email->from('noreply@gmail.com');
  		// // Receiver email address
  		// $this->email->to($this->input->post('myEmail'));
  		// // Subject of email
  		// $this->email->subject($subject);
  		// // Message in email
  		// $this->email->message($message);
  		// 	if($this->email->send())
  		// 	{
      //     $this->session->set_flashdata('signup_success', 'Sucessfully Registered.');
      //     redirect(base_url().'login','refresh');
  		// 	}
  		// }
  		// else
  		// {
      //   $this->session->set_flashdata('signup_error', 'Something wrong! try again.');
      //   $this->load->view('public/signup');
  		// }
      $this->session->set_flashdata('signup_success', 'Sucessfully Registered.');
      redirect(base_url().'login','refresh');
    }
    else {
      $this->session->set_flashdata('signup_error', 'Something wrong! try again.');
      $this->load->view('public/signup');
    }

    }
  }
  //Generate User Caotcha
  public function userCaptch()
  {
    $randstr="";
   srand((double) microtime(TRUE) * 1000000);
   //our array add all letters and numbers if you wish
   $chars = array(
       'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'p',
       'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', '1', '2', '3', '4', '5',
       '6', '7', '8', '9', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K',
       'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');

   for ($rand = 0; $rand <= 5; $rand++) {
       $random = rand(0, count($chars) - 1);
       $randstr .= $chars[$random];
   }
   $this->session->set_userdata('captcha_session', $randstr);
   echo  $randstr;
  }
  //for default captcha
  public function userDefaultCaptch()
  {
    $randstr="";
   srand((double) microtime(TRUE) * 1000000);
   //our array add all letters and numbers if you wish
   $chars = array(
       'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'p',
       'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', '1', '2', '3', '4', '5',
       '6', '7', '8', '9', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K',
       'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');

   for ($rand = 0; $rand <= 5; $rand++) {
       $random = rand(0, count($chars) - 1);
       $randstr .= $chars[$random];
   }
   $this->session->set_userdata('captcha_session', $randstr);
   return  $randstr;
  }
  public function userLogin()
  {
    $this->form_validation->set_error_delimiters('<label class="error">', '</label>');
    $this->form_validation->set_rules('uemail', 'Email', 'required');
    $this->form_validation->set_rules('upassword', 'Password', 'required');
    $this->form_validation->set_rules('inputcap', 'Captcha', 'required|callback_captcha_check');

    if ($this->form_validation->run() == FALSE)
    {
      $session_captcha['captchaVals']=$this->userDefaultCaptch();
      $this->load->view('public/login',$session_captcha);
    }else {
      $data = array(
      'email'=>		$this->input->post('uemail'),
      'password'=>    hash('sha256', strtolower($this->input->post('upassword'))),
    );
      if($this->UserManagerModel->login($data))
      {
        $userInfo=$this->UserManagerModel->details_user($this->input->post('uemail'));
        $this->session->set_userdata('userId', $userInfo[0]->user_id);
        $this->session->set_userdata('userFirstName', $userInfo[0]->firstname);
        $this->session->set_userdata('userEmail', $this->input->post('uemail'));
        redirect(base_url().'dashboard','refresh');
      }
      else {
        $session_captcha['captchaVals']=$this->userDefaultCaptch();
          $this->session->set_flashdata('login_fail', 'Something wrong!try again.');
        $this->load->view('public/login',$session_captcha);
      }
  }
}
public function captcha_check($str)
{
  $captcha_session = $this->session->userdata('captcha_session');
  if ($str == $captcha_session)
    {
      return TRUE;

    }
    else
    {
      $this->form_validation->set_message('captcha_check', 'Captcha is not matching.');
      return FALSE;
    }
}

//check unique emailId
public function _unique_email($email) {


  if ($str == $captcha_session)
    {
      return TRUE;

    }
    else
    {
      $this->form_validation->set_message('captcha_check', 'Captcha is not matching.');
      return FALSE;
    }
}

public function logout()
{
  $this->session->unset_userdata('userId');
  $this->session->unset_userdata('userFirstName');
  $this->session->unset_userdata('userEmail');
  $this->session->sess_destroy();
  redirect(base_url().'welcome','refresh');
}
public function forget_pass()
{
  $this->form_validation->set_error_delimiters('<label class="error">', '</label>');
  $this->form_validation->set_rules('uemail', 'Email', 'required|valid_email|callback_checkEmailExist',array(
  'required'=> 'You have not provided %s.'));
  if ($this->form_validation->run() == FALSE)
  {
    $this->load->view('public/forgot');
  }
  else
  {
    $email=$this->input->post('uemail');
    $rand=rand(999999,111111);
		$otp=hash('sha256', strtolower($rand));
		@$this->db->where('email', $email);
		@$this->db->update('users', array('password'=> $otp));
		$message=$rand.'is your new passowrd';
		// Configure email library
		$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'ssl://smtp.zoho.com';
		$config['smtp_port'] = 465;
		$config['smtp_user'] = 'info@v-coin.io';
		$config['smtp_pass'] = 'vision@123';
		// Load email library and passing configured values to email library
		 $this->load->library('email',$config);
		 $this->email->set_newline("\r\n");
	       // Sender email address
		 $this->email->from('noreply@gmail.com');
	      	// Receiver email address
		 $this->email->to($email);
		// Subject of email
		 $this->email->subject("Password Reset");
		// Message in email and headers & content type of email
		 $this->email->message($message);
		 $this->email->set_header('MIME-Version', '1.0; charset=utf-8');
		 $this->email->set_header('Content-type', 'text/html');
		if($this->email->send())
		{
      $session_captcha['captchaVals']=$this->userDefaultCaptch();
      $this->session->set_flashdata('reset_success', 'Successfull password sent on your email.');
      $this->load->view('public/login',$session_captcha);
		}
    else {
      $this->session->set_flashdata('reset_fail', 'Something wrong!try again.');
      $this->load->view('public/forgot');
    }
  }
}

public function checkEmailExist($email)
{
  if($this->UserManagerModel->emailExist($email))
  {
      return TRUE;
  }
  else {
    $this->form_validation->set_message('checkEmailExist', 'Email does not exists.');
    return FALSE;
  }
}
public function user_profile()
{
   $email=$this->session->userdata('userEmail');
  $data['getDetails']= $this->User_model->details_user($email);
  $this->load->view('dashboard/profile',$data);
}
public function addProfile()
{
  $this->form_validation->set_error_delimiters('<label class="error">', '</label>');
  $this->form_validation->set_rules('org_name', 'Organisation Name', 'required');
  $this->form_validation->set_rules('website_name', 'Website Name', 'required|valid_url');
  $this->form_validation->set_rules('businessType', 'Business Type', 'required');
  $this->form_validation->set_rules('userFile', 'Upload Id', 'required');
  $this->form_validation->set_rules('mobileNum', 'Mobile Number', 'required|numeric');
  if($this->form_validation->run() == FALSE)
  {
    $config['upload_path']          = 'upload/';
    $config['allowed_types']        = 'gif|jpg|png|jpeg';
    $config['max_size']             = 2000;
    $config['max_width']            = 1024;
    $config['max_height']           = 768;
    $this->load->library('upload', $config);
          if (!$this->upload->do_upload('userFile'))
          {
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('upload_fail', $error);
            $this->load->view('dashboard/profile');
          }
          else
          {
            $imageData = $this->upload->data();
            $fileName=$imageData['file_name'];
            $data = array(
            'company_name'=>$this->input->post('org_name'),
            'company_website'=>$this->input->post('website_name'),
            'phone'=>$this->input->post('mobileNum'),
            'photo'=>$fileName,
            'business_type'=>$this->input->post('businessType')
          );
            if($this->UserManagerModel->updateUserProfile($data))
            {
              $this->session->set_flashdata('update_success', 'User profile added successfully');
              redirect(base_url().'loadProfile','refresh');
            }
            else {
              $this->session->set_flashdata('update_fail', 'User profile not added');
              $this->load->view('dashboard/profile');
            }
          }

  }
}


}
