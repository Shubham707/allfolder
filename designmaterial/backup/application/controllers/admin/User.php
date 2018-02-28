<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller 
{   
	public function User() 
    {
        parent::__construct();
        $this->load->model('User_model');
		$this->load->helper(array('form', 'url','file'));
		$this->load->library('upload','session');
         if($this->session->userdata('admin_is_logged_in')==false)
        {
            redirect(base_url().'admin/login','refresh');
        }

    }
   public function index()
    {
    	$value['listing']=$this->User_model->user_listing();
       $this->load->view('backend/users/index',$value);
    }

    public function add_user()
    {
      $this->load->view('backend/users/add-user');
    }
    public function details($id)
    {
    	$data['details']=$this->User_model->edit_user($id);
    	$this->load->view('backend/users/user-view',$data);
    }
    public function edit_user($id)
    {
      $data['editUser']=$this->User_model->edit_user($id);
      $this->load->view('backend/users/user-edit', $data);
    }
    public function insert_user()
    {
    	
		$config['upload_path']          = 'uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 100;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;
        //print_r($config); die();
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('userfile'))
        {
        	$data = $this->upload->data('userfile');
               $data = array(
		        'coin_name' => $this->input->post('coin_name'),
		        'coin_date' => $this->input->post('coin_date'),
		        'coin_image' => $_FILES['userfile']['name'],
		    );
		    $insertUserData = $this->User_model->addUser($data);
		    $value['listing']=$this->User_model->listing();
		    
		    $this->load->view('backend/coin/index',$value);
                
        }
        else
        {
                $error = array('error' => $this->upload->display_errors());

        }
    }
   				
	
}
