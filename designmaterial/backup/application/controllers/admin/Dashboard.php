<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller 
{   
	public function __construct() 
    {
        parent::__construct();
        if($this->session->userdata('admin_is_logged_in')==false)
        {
            redirect(base_url().'admin/login','refresh');
        }
    }

    public function index()
    {
       $this->load->view('backend/dashboard');
    }
    

}
