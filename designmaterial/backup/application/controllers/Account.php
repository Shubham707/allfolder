<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include_once APPPATH.'third_party/jsonRPCClient.php';
include_once APPPATH.'third_party/Client.php';


class Account extends CI_Controller 
{   
	public function __construct() 
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('session','Rpc');
        $this->load->model('Account_model');
        $this->load->model('User_model');
        $this->load->model('Coin_model');
        $this->load->database();
        $this->load->library('parser');
        $email=$this->session->userdata('email');
        $boxid=$this->session->userdata('box_id');
       /* if($this->session->userdata('is_logged_in')==false)
        {
            redirect('login');
        }*/

    }
    public function my_account()
    {
        $email=$this->session->userdata('email');
        $boxid=$this->session->userdata('box_id');
        $keyValue['getKey']=$this->Account_model->view_account($email);
        $keyValue['getMonitiger']=$this->Account_model->monetiserList($email);
        $keyValue['getaffiliated']=$this->Account_model->affiliatedList($email);
        $this->load->view('dashboard/myaccount-done',$keyValue); 
    }
    
    public function monitiser()
    {
        $this->load->view('frontend/cryptocoin-monetiser');
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
         
         $client= new Client($rpc_host, $rpc_port, $rpc_user, $rpc_pass);
         $balance=$client->getBalance($email); 
         $address=$client->getAddress($email);
         $newaddress=$client->getNewAddress($email);
         $keyValue=$this->Account_model->view_account();
         $bitcoin=$this->Coin_model->listing();

         $coin=$value?$value:'bitcoin';
            $data=array(
                'address'=>$address,
                'balance'=>$balance,
                'email'=> $email,
                'newAddress'=>$newaddress,
                'coin'=> 'Bitcoin',
                'allData'=>$bitcoin,
                'security'=>$security,
            );
            $data['invoice']=$this->load->view('frontend/payment-invoice',$data,true);
             $data['result']='<div class="panel panel-default">
    <div class="panel-heading">Total: 0.00087383 BCH (BCC)
        <div class="pull-right"><img style="margin-top: -10px;" src="'.base_url().'assets/images/payment.png" width="200" height="30">
        </div>
    </div>
    <div class="panel-body">
        <div class="col-sm-12">
            <div class="col-sm-3">
               <a href="http://chart.apis.google.com/chart?cht=qr&chs=300x300&chl="'.$newaddress.'">
                <img src="http://chart.apis.google.com/chart?cht=qr&chs=300x300&chl="'.$newaddress.'" 
                alt="QR Code" style="width:60px;border:0;">
            </a>
            </div>
            <div class="col-sm-8">
                 1. Get '.$coin.' at bittrex.com if you dont already have any<br>
                2. <b>Send </b>'.$balance.''.$coin.'&nbsp;(dont include transaction fee in this amount!).
                    If you send <b>any other bitcoincash amount</b>, payment system will <b>ignore it </b>!
                <b>end 0.00087383 BCH (in ONE payment) to:</b>
            </div>
        </div>
        <form action="'.base_url().'index.php/payment/key-secrat" method="post">
            <div align="center" > 
                <a onclick=copy("'.$newaddress.'"); class="btn btn-primary">Copy</a>
                    <input type="text" style="margin-top: 20px; width:60%;" name="copy" disabled value="'.$newaddress.'">
            </div>
            <div align="center">
                <a class="btn btn-success" href="'.base_url().'wallet">Open Wallet</a>
            </div>
            <div align="center"><input type="submit" style="margin-top: 20px; width:60%;" name="submit" value="Click Here if you have already sent '.$coin.'»">
            </div>
         </form>';
           
        $this->load->view('frontend/add-payment', $data);
        
    }
   public function security_key()
    {
        $public_key=$this->public_key_pass(); 
        $private_key=$this->private_key_pass();
        $pub=md5($public_key);
        $pri=md5($private_key);
        $boxID=$this->User_model->listing();
        $total=$boxID + 1;

        $privateKey= $public_key.''.$this->input->post('coinName').''.$pub;
        $publicKey= $private_key.''.$this->input->post('coinName').''.$pri;
        $boxName=$this->input->post('boxName');
        $id=$this->input->post('user_id');
        $data = array(
            'boxID' =>       $boxID,
            'multicurrencyID'=>$total,
            'boxName'=>      $this->input->post('boxName'),
            'user_id'=>      $id,
            'publicKey'=>    $publicKey,
            'privateKey'=>   $privateKey,
            'coinName'=>     $this->input->post('coinName'),
            'boxType'=>      $this->input->post('boxType'),
            'isLockAddr'=>   $this->input->post('isLockAddr'),
            'email'=>        $this->input->post('email'),
            'callbackUrl'=>  $this->input->post('callbackUrl'),
            'isAdult'=>      $this->input->post('isAdult'),
            'boxType'=>      $this->input->post('boxType'),
            'isLockAddr'=>   $this->input->post('isLockAddr'),
            'isAdult_exst'=> $this->input->post('isAdult_exst'),
            'start_time'=>   $this->input->post('start_time'),
        );
        $keyID=$this->Account_model->securities_key($data);

        $sql="select * from security_key where user_id='$id'";
        $getValue=$this->db->query($sql)->result();

        $keyData= array(
        'security' => $keyID, 
        'msg'=>'Create Public and Private key ',
        'securityData'=>$getValue,
        );
        //echo var_dump($keyData);
        //die();
       
        $this->load->view('dashboard/create-new-payment-box',$keyData);
 

      
    }
    public function security_update()
    {
        $public_key=$this->public_key_pass(); 
        $private_key=$this->private_key_pass();
        $pub=md5($public_key);
        $pri=md5($private_key);
        $boxName=$this->input->post('boxName');
        $id=$this->input->post('key_id');
        if($id){
            $data = array(
                'key_id' =>      $this->input->post('key_id'),
                'boxName'=>      $this->input->post('boxName'),
                'user_id'=>      $this->input->post('user_id'),
                'publicKey'=>    $this->input->post('publicKey'),
                'privateKey'=>   $this->input->post('privateKey'),
                'coinName'=>     $this->input->post('coinName'),
                'boxType'=>      $this->input->post('boxType'),
                'isLockAddr'=>   $this->input->post('isLockAddr'),
                'email'=>        $this->input->post('email'),
                'callbackUrl'=>  $this->input->post('callbackUrl'),
                'isAdult'=>      $this->input->post('isAdult'),
                'boxType'=>      $this->input->post('boxType'),
                'isLockAddr'=>   $this->input->post('isLockAddr'),
                'isAdult_exst'=> $this->input->post('isAdult_exst'),
                'start_time'=>   $this->input->post('start_time'),
            );
             $this->User_model->Account_model($data,$id);
        }
       
        $sql="select * from security_key where key_id='$id'";
        $getValue=$this->db->query($sql)->result();

        $keyData= array( 
        'msg'=>'Create Public and Private key ',
        'allKey'=> $getValue,
        );

        $this->load->view('frontend/update-security',$keyData);

    }

    function public_key_pass($chars = 10) 
    {
       $letters = 'abcefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
       return $val=substr(str_shuffle($letters), 0, $chars);
    }
    function private_key_pass($chars = 10) 
    {
       $letters = 'abcefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
       return $val=substr(str_shuffle($letters), 0, $chars);
    }
    public function public_key()
    {
        $coin=$this->Coin_model->listing();
       /* $sql="SELECT * FROM security_key where key_id='48'";
        $security_key= $this->db->query($sql)->result();
        foreach ($security_key as $key => $value) {
            $val=$value->key_id;
        }*/
        
        $data= array(
            'allCoin' => $coin,
         );
  
        $this->load->view('dashboard/create-new-payment-box',$data);
   }
    public function update_key()
    {
        $id=$_REQUEST['key_id']; //die();
        $sql="SELECT * FROM `security_key` WHERE key_id='$id'";
        $data['allKey']= $this->db->query($sql)->result();
        $this->load->view('frontend/update-security',$data);
    }
    public function coinbox($multiId, $boxid, $name)
    {
	
        $query['allKey']=$this->Account_model->multicurrency($multiId, $boxid, $name);
        //print_r($query['allKey']); die();
        $this->load->view('frontend/update-security',$query);
    }
    public function coin_boxes($id,$value)
    {  
        $query=$this->Account_model->coinboxs_payment($value,$id);
        $data = array(
            'payment_details' => $query,
            'coin' => $value,
        );
      
        $this->load->view('frontend/coinbox-payment',$data);
      
        
    }
    public function my_account_details()
    {
        $email=$this->session->userdata('email');
        $data['getDetails']= $this->User_model->details_user($email);
        //print_r($data['getDetails']); die();
        $this->load->view('frontend/account',$data);
    
    }

}
