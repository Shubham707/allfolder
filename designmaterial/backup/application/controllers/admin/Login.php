<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller 
{   
	public function User() 
    {
        parent::__construct();
        $this->load->model('User_model');
		$this->load->helper(array('form', 'url','file'));
		$this->load->library('upload','session');
         $this->load->library('form_validation');
    }
    public function index()
    {
        $data['base_url']=base_url();

         if ($this->session->userdata('admin_is_logged_in')) {
             $this->load->view('backend/dashboard');
        } else {
            $this->load->view('backend/login');
        }
    }

   public function do_login() {

        $data['base_url']=base_url();

        if ($this->session->userdata('admin_is_logged_in')) {
            redirect('admin/dashboard');
        } else {

            $user = $_POST['username'];
            $password = $_POST['password'];

            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('admin/vwLogin');
            } else {
                //$salt = '5&JDDlwz%Rwh!t2Yg-Igae@QxPzFTSId';
                $enc_pass  = md5($password);
                $sql = "SELECT * FROM admin WHERE admin_name = '$user' AND admin_pass ='$enc_pass'";
                $query = $query = $this->db->query($sql);
                if ($query->num_rows()) 
                {
                        $row=$query->result_array(); 
                        foreach ($row as $key => $value) {
                         $session=$this->session->set_userdata(array(
                            'admin_name' => $value['admin_name'],
                            'admin_is_logged_in' => TRUE,
                            )); 
                         }
                        redirect(base_url().'admin/dashboard');
                      
                } else {
                    $err['error'] = 'Username or Password incorrect';
                    $err['base_url']=base_url();
                    $this->load->view('backend/login', $err);
                }
            }
        }
    }
        
    public function logout() 
    {
        $this->session->unset_userdata('admin_id');
        $this->session->unset_userdata('admin_name');
        $this->session->unset_userdata('admin_is_logged_in');   
        $this->session->sess_destroy();
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
        $this->load->view('backend/login');
    }
}
