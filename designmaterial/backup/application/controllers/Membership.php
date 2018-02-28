<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include_once APPPATH.'third_party/jsonRPCClient.php';
include_once APPPATH.'third_party/Client.php';



class Membership extends CI_Controller 
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
	

	public function pay_per_membership()
	{
	$rpc_host = "162.213.252.66";
        $rpc_port = "18336";
        $rpc_user = "test";
        $rpc_pass = "test123";
        $email=$this->session->userdata('email');
        $id=$this->session->userdata('user_id');
        $boxid=$this->session->userdata('box_id');

         $security=$this->Account_model->security_key_listing($id,$boxid);
         $keyValue=$this->Account_model->paymentCoin();

         $client= new Client($rpc_host, $rpc_port, $rpc_user, $rpc_pass);
         $balance=$client->getBalance($email); 
         $newaddress=$client->getNewAddress($email);
         $address=$client->getAddress($email);

         $data=array(
            'address'=>$address,
            'balance'=>$balance,
            'email'=> $email,
            'coin'=> 'Bitcoin',
            'newAddress'=>$newaddress,
            'allData'=>$keyValue,
            'security'=>$security,
        );
	      // print_r($data); die();
		$this->load->view('frontend/pay-per-membership',$data);

	}
	public function cryptocoin($value,$id)
    {
        $getData=$this->Account_model->coinboxs_payment($value,$id);
        $rpc_host = "162.213.252.66";
        $rpc_port = "18336";
        $rpc_user = "test";
        $rpc_pass = "test123";
       /* $getData=$this->Account_model->invoice($coin);*/
        $email=$this->session->userdata('email');
        $id=$this->session->userdata('user_id');
        $boxid=$this->session->userdata('box_id');

        $security=$this->Account_model->security_key_listing($id,$boxid);
        $keyValue=$this->Account_model->paymentCoin();
         $coinList=$this->Coin_model->listing();
         $client= new Client($rpc_host, $rpc_port, $rpc_user, $rpc_pass);
         $balance=$client->getBalance($email); 
         $address=$client->getAddress($email);
         $newaddress=$client->getNewAddress($email);
         $keyValue=$this->Account_model->view_account();
            $data=array(
                'address' =>$address,
                'balance' =>$balance,
                'email' => $email,
                'newAddress' =>$newaddress,
                'coin' => 'Bitcoin',
                'coinList' =>$coinList,
                'allData' =>$coinList,
                'security' =>$security,
            );
           
        $this->load->view('frontend/pay-per-membership', $data);
        
    }
	
}
