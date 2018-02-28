<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller 
{
	public function __construct() 
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('Rpc','session');
        $this->load->model('User_model');
        $this->load->database();
        $this->load->helper(array('form', 'url','file'));           
        $this->load->library('upload');
        $this->load->library('email');
        /*if($this->session->userdata('user_id')=='')
        {
            redirect('user/login');
        }*/
    }
    public function profile()
    {
        $this->load->view('dashboard/profile');
    }
    public function login()
	{
		$this->load->view('frontend/login');
	}
	public function signup()
	{
		$this->load->view('frontend/signup');
	}
    
    public function user_save()
    {
        $boxID=$this->User_model->listing();
        $total=$boxID + 1;
        $ip= $_SERVER['REMOTE_ADDR'];
    	$data = array(
    		'title' => 		$this->input->post('title'),
    		'firstname'=>	$this->input->post('firstname'),
    		'lastname'=>	$this->input->post('lastname'),
    		'email'=>		$this->input->post('email'),
    		'country'=>		$this->input->post('country'),
    		'state'=>		$this->input->post('state'),
    		'city'=>		$this->input->post('city'),
    		'username'=>	$this->input->post('username'),
            'box_id'=>    $total,
            'paid'=>    'unpaid',
            'ipAddress'=>    $ip,
            'password'=>    hash('sha256', strtolower($this->input->post('password'))),
    	);
        
    	
    	$this->User_model->dataSave($data);
	$subject="User Registration";
        $message = '<h1>Registration Successfull</h1>';
         $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.zoho.com'; 
        $config['smtp_port'] = '465';
        $config['smtp_timeout'] = '7';
        $config['smtp_user'] = 'info@v-coin.io';
        $config['smtp_pass'] = 'vision@123';
        $config['charset'] = 'utf-8'; 
        $config['newline'] = "\r\n";
        $config['mailtype'] = 'text';
        $config['validation'] = TRUE;
        $this->load->library('email',$config);
        $this->email->from('noreply@gmail.com');
        $this->email->to($this->input->post('email'));
        $this->email->subject($subject); 
        $this->email->message($message); 
        $this->email->set_header('MIME-Version', '1.0; charset=utf-8'); $this->email->set_header('Content-type', 'text/html');
        $this->email->send();
        $value['message']="Registration Successfull!";
        $this->load->view('frontend/login', $value);

    }
    public function update_user()
    {
        $config['upload_path']          = 'uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 100;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;
        $this->load->library('upload', $config);
        

       if ($this->upload->do_upload('userfile'))
        {
           $images = $this->upload->data('userfile');       
        }
        else
        {
                $error = array('error' => $this->upload->display_errors());

        }
            $id=$this->input->post('user_id');  
            $email=$this->session->userdata('email'); 
            $ip= $_SERVER['REMOTE_ADDR'];
            $pass=hash('sha256', strtolower($this->input->post('password')));
            $sql = "SELECT * FROM users WHERE email = '$email' AND password ='$pass'";
                $query = $query = $this->db->query($sql);
        if($query){
            $data=array(
            'title' => $this->input->post('title'), 
            'firstname' => $this->input->post('firstname'), 
            'lastname' =>  $this->input->post('lastname'), 
            'position' => $this->input->post('position'), 
            'company_name' => $this->input->post('company_name'), 
            'company_website' => $this->input->post('company_website'), 
            'country' => $this->input->post('country'),
            'state' => $this->input->post('state'), 
            'city' => $this->input->post('city'), 
            'phone' => $this->input->post('phone'), 
            'photo' => $_FILES['userfile']['name'],
            'username' => $this->input->post('username'),
            'ipAddress'=>    $ip,
            'password'=>    hash('sha256', strtolower($this->input->post('password'))),
            'monetiser' => $this->input->post('monetiser'), 
            'affiliate' => $this->input->post('affiliate'),
            'notifications' => $this->input->post('notifications'), 
            'user_id' => $this->input->post('user_id'),

            );
            //print_r($data); die();
            $get=$this->User_model->updateUser($data,$id);
            redirect(base_url().'account/my_account_details','refresh');
        }
        else{
            echo "error";

        }
	
		
       
    }
    public function forget(){
	$this->load->view('frontend/forget');
	}
	public function resetPassword()
	{
		$email=$this->input->post('username');
		$result=$this->User_model->emailCheck($email);
		if($result==1)
		{
		$rand=rand(999999,111111);
		$otp=hash('sha256', strtolower($this->input->post($rand)));
		$this->db->where('email',$email);
		$this->db->update('user',array('password'=>$otp,));
		$message=$rand.'is your new passowrd';
		 $config['protocol'] = 'smtp';
		$config['smtp_host'] = 'ssl://smtp.zoho.com'; 
		$config['smtp_port'] = '465';
		$config['smtp_timeout'] = '7';
		$config['smtp_user'] = 'info@v-coin.io';
        	$config['smtp_pass'] = 'vision@123';
		$config['charset'] = 'utf-8'; 
		$config['newline'] = "\r\n";
		$config['mailtype'] = 'text';
		$config['validation'] = TRUE;
		$this->load->library('email',$config);
		$this->email->from('noreply@gmail.com');
		$this->email->to($email);
		$this->email->subject($subject); 
		$this->email->message($message); 
		$this->email->set_header('MIME-Version', '1.0; charset=utf-8'); $this->email->set_header('Content-type', 'text/html');
		if($this->email->send())
		{
		 $msg['msg']="otp send successfull!";
		 $this->load->view('frontend/forget',$msg);
		}
		}
		else
		{
		$msg['msg']="Your email id does not match!";
		 $this->load->view('frontend/forget',$msg);
		}
		
	}
    

}
