<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include_once APPPATH.'third_party/jsonRPCClient.php';
include_once APPPATH.'third_party/Client.php';
include_once APPPATH.'third_party/cryptobox_config.php';
include_once APPPATH.'third_party/cryptobox.php';

class Affiliated extends CI_Controller 
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
        if($this->session->userdata('is_logged_in')==false)
        {
            redirect('user/login');
        }

    }
    public function index()
    {
        $data['boxid']=$this->session->userdata('box_id');
        $data['coins']=$this->Coin_model->listing();
        $this->load->view('frontend/cryptocoin-affiliated',$data);
    }
    public function saveAffiliated()
    {
        //print_r($_REQUEST); die();
        $str=substr('DEV'.hash('sha256', $this->input->post('email')), 0,30);
        $affiPrivateKey=$str;
        $data=array(
            'title' => $this->input->post('title'), 
            'affiPrivateKey' => $affiPrivateKey,
            'bitcoinAddress' => $this->input->post('bitcoinAddress'), 
            'bitcoinCashAddress' => $this->input->post('bitcoinCashAddress'),
            'litecoinAddress' => $this->input->post('litecoinAddress'),
            'dashcoinAddress' => $this->input->post('dashcoinAddress'),
            'dogecoinAddress' => $this->input->post('dogecoinAddress'),
            'speedcoinAddress' => $this->input->post('speedcoinAddress'),
            'universalCurrency' => $this->input->post('universalCurrency'),
            'peercoinAddress' => $this->input->post('peercoinAddress'),
            'reddcoinAddress' => $this->input->post('reddcoinAddress'),
            'potcoinAddress' => $this->input->post('potcoinAddress'),
            'feathercoinAddress' => $this->input->post('feathercoinAddress'),
            'vertcoinAddress' => $this->input->post('vertcoinAddress'),
            'MonetaryUnitAddress' => $this->input->post('MonetaryUnitAddress'),
            'email' => $this->input->post('email'),
        );
        $return=$this->Account_model->affiliatedSave($data);
        redirect(base_url().'index.php/account/my_account','refresh');
        
    }
    public function edit_data($id)
    {
        
        $data['details']=$this->Account_model->affiliatedListEdit($id);
  
       $this->load->view('frontend/affiliated_update',$data);
    }
     public function updateAffiliated()
    {
        $id = $this->input->post('affiliated_id');
        $data=array(
            'title' => $this->input->post('title'), 
            'affiPrivateKey' => $this->input->post('affiPrivateKey'),
            'bitcoinAddress' => $this->input->post('bitcoinAddress'), 
            'bitcoinCashAddress' => $this->input->post('bitcoinCashAddress'),
            'litecoinAddress' => $this->input->post('litecoinAddress'),
            'dashcoinAddress' => $this->input->post('dashcoinAddress'),
            'dogecoinAddress' => $this->input->post('dogecoinAddress'),
            'speedcoinAddress' => $this->input->post('speedcoinAddress'),
            'universalCurrency' => $this->input->post('universalCurrency'),
            'peercoinAddress' => $this->input->post('peercoinAddress'),
            'reddcoinAddress' => $this->input->post('reddcoinAddress'),
            'potcoinAddress' => $this->input->post('potcoinAddress'),
            'feathercoinAddress' => $this->input->post('feathercoinAddress'),
            'vertcoinAddress' => $this->input->post('vertcoinAddress'),
            'MonetaryUnitAddress' => $this->input->post('MonetaryUnitAddress'),
            'email' => $this->input->post('email'),
        );
        $this->Account_model->affiliatedUpdate($data,$id);
        redirect(base_url().'index.php/account/my_account','refresh');
        
    }


}
