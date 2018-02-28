<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');


Class Login extends CI_Controller 
{

		public function __construct() 
		{
			parent::__construct();
			$this->load->helper('form');
			$this->load->library('form_validation','session');
			$this->load->library('Rpc');
			$this->load->model('User_model');
			$this->load->database();
		}
			
		///login user
		public function login_user() 
		{
			
				$email = $this->input->post('username');
		        $pass = hash('sha256', strtolower($this->input->post('password')));

		            $this->form_validation->set_rules('username', 'Email', 'required');
		            $this->form_validation->set_rules('password', 'Password', 'required');

		            if ($this->form_validation->run() == FALSE) {
		             
				        $this->load->view('frontend/login');
				     
		            } 
		            else 
		            {
		            	
					    $sql = "SELECT * FROM users WHERE email = '$email' AND password ='$pass'";
		                $query = $query = $this->db->query($sql);
		                if ($query->num_rows()) 
		                {
								$row=$query->result_array(); 
								foreach ($row as $key => $value) {
								 $session=$this->session->set_userdata(array(
									'firstname' => $value['firstname'],
									'lastname' => $value['lastname'],
									'username' => $value['username'],
									'email' => $value['email'],
									'user_id' => $value['user_id'],
									'box_id' => $value['box_id'],
									'is_logged_in' => TRUE,
									)); 
								 }
								redirect(base_url() . 'index.php/account/my_account_details');
								
						} else {
								$msg = 'error';
							    redirect(base_url() . 'index.php/user/login');
						}

		            }
		}

		// Logout from admin page
		public function logout() 
		{
				$sess_array = array(
				'username' => ''
				);
				$this->session->unset_userdata('logged_in', $sess_array);
				$data['message_display'] = 'Successfully Logout';
		        $this->load->view('frontend/login',$data);
		}
		public function help_and_support()
		{
			$this->load->view('dashboard/help-and-supports');
		}

}

