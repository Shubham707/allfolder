<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include_once APPPATH.'third_party/jsonRPCClient.php';
include_once APPPATH.'third_party/Client.php';



class Address extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
       	$this->load->library('session','Rpc');
        $this->load->model('Account_model');
        $this->load->model('Coin_model');
        if($this->session->userdata('user_id')=='')
        {
            redirect('user/login');
        }
	}
    public function insert()
    {
        # code...
    }
	

	
}
