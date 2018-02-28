<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include_once APPPATH.'third_party/jsonRPCClient.php';
include_once APPPATH.'third_party/Client.php';


class Payment extends CI_Controller 
{

	public function __construct() 
    {
        parent::__construct();
        $this->load->helper('form');
         $this->load->model('Account_model');
         $this->load->model('Coin_model');
        $this->load->database();
        $this->load->library('session','Rpc');
        $this->load->model('Product_model');
        /* if($this->session->userdata('user_id')=='')
        {
            redirect('user/login');
        }*/
    }
    public function index()
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
         $data['invoice']=$this->load->view('frontend/payment-invoice',$data,true);
	//print_r($data); die();
        $this->load->view('frontend/payment-data.php',$data);
    }

    public function payment_add()
    {
        $coin=$_REQUEST['multiCurrency'];
    }

    public function new_payment()
    {
         $coins=$this->Coin_model->listing();
         $id=$this->session->userdata('box_id');

         $data=array(
            'boxid'=> $id,
            'coins'=> $coins,
            );
         $this->load->view('frontend/payment-box',$data);
    }
    public function secret_key()
    {
 
        $this->load->view('frontend/all-key');
   
    }
    public function unrecognised_received_payments()
    {
        $data['country']=$this->Product_model->country();
 
        $this->load->view('dashboard/unrecognised-received-payments',$data);

    }
    public function auto_payments_external_wallet()
    {
        $data['country']=$this->Product_model->country();
        $this->load->view('dashboard/auto-payments-to-your-wallet',$data);
    }
    public function payment_successfull()
    {
        $data['country']=$this->Product_model->country();
        $this->load->view('dashboard/payment-successfull',$data);
      
    }
    public function multi_pay_post()
    {
        $coins=$this->Coin_model->listing();
         $id=$this->session->userdata('box_id');

         $data=array(
            'boxid'=> $id,
            'coins'=> $coins,
            );
        $this->load->view('frontend/multi-payment-post',$data);
    }
    public function payment_go_url()
    {
        $rpc_host = "162.213.252.66";
        $rpc_port = "18336";
        $rpc_user = "test";
        $rpc_pass = "test123";
        $email=$this->session->userdata('email');
         $client= new Client($rpc_host, $rpc_port, $rpc_user, $rpc_pass);
         $data['balance']=$client->getBalance($email); 
         $data['newaddress']=$client->getNewAddress($email);
         $data['address']=$client->getAddress($email);
         $this->load->view('frontend/payment-wallet-data');
        
    }


}
