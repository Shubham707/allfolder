<?php
//http://162.213.252.66:90/gourl/crypto_frame/notify

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include_once APPPATH.'third_party/jsonRPCClient.php';
include_once APPPATH.'third_party/Client.php';

class Notify extends CI_Controller 
{
	public function __construct() 
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('Wallet_model');
        $this->load->database();
        $this->load->library('Rpc');
        $this->load->library('email');
    }
	
    public function getAddressValue($data)
    { 

        $rpc_host = "162.213.252.66";
        $rpc_port = "18336";
        $rpc_user = "test";
        $rpc_pass = "test123";
        $client= new Client($rpc_host, $rpc_port, $rpc_user, $rpc_pass);
        $listing=$client->test($data);
        //print_r($listing);

        if($listing==0)
        {
        	echo "Transection Successfully!";
        }
       elseif($listing==1)
        {
        	echo  "Transection Confirmation Waiting!!";
        }
        else
        {
        	echo "Please send";
        }
      
    }
}


