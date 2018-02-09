<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

include_once APPPATH.'third_party/jsonRPCClient.php';
include_once APPPATH.'third_party/Client.php';

class Claimdetails extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session','Rpc');
		$this->load->helper('utility_helper');
		$this->load->model('Home_model');
    $this->load->model('Auth_model');

		$this->from="shubhamsahu707@gmail.com";
        if($this->session->userdata('user_id')==false || $this->session->userdata('is_Admin_in')==false )
        {
            redirect(base_url().'/logout');
        }
	}
	
	public function index()
	{
	$sql="select * from claimBitcandy order by serial_no desc limit 1";
	$query['listing']=$this->db->query($sql)->result();
        $this->load->view('adminpanel/claimdetails',$query); 
       
    }
    public function details($value)
    {
    	$sql="select * from claimBitcandy where serial_no='$value' order by serial_no desc limit 1";
	$query['listing']=$this->db->query($sql)->result();
        $this->load->view('adminpanel/claimdetails',$query);
    }
    public function sendRecords()
    {
    	$query=$this->db->query('select * from currency_list')->result();
    	 $rpc_host=$query[0]->host;
    	 $rpc_port=$query[0]->port;
    	 $rpc_user=$query[0]->user;
    	 $rpc_pass=$query[0]->pass;

        $client= new Client($rpc_host, $rpc_port, $rpc_user, $rpc_pass);
		$post = $this->input->post();
	
		 	//die();
		 foreach ($post['claimData'] as  $value) {
		 	$a=explode("^",$value);
		 	$user=$a[0];
		 	$amt=$a[1];
		 	$this->getmove($this->from, $user, $amt);
		 	redirect(base_url().'','refresh');	 		
		 }	
    }

 

    

}


?>
