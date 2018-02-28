<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include_once APPPATH.'third_party/jsonRPCClient.php';
include_once APPPATH.'third_party/Client.php';
class Product extends CI_Controller 
{

	public function __construct() 
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('Product_model');
        $this->load->library('session','Rpc');
        $this->load->helper(array('form', 'url','file'));
        $this->load->library('upload');
        $this->load->database();
         if($this->session->userdata('user_id')=='')
        {
            redirect('user/login');
        }
    }
    public function add_product()
    {
        
        $this->load->view('frontend/add-product');
       
    }
    public function add_pay_product()
    {/*
        echo "<pre>";
         print_r($_REQUEST);
         echo "</pre>";
          die();*/
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
    	   $product_id="Order-No".rand(99999,10000);
    	    $data=array(
            'order_id'=>$product_id,
		    "productTitle" => $this->input->post('gourlproductTitle'),
		    "priceUSD" => $this->input->post('gourlpriceUSD'),
		    "priceLabel" => $this->input->post('gourlpriceLabel'),
            "email" => $this->session->userdata('email'),
            'image'=> $_FILES['userfile']['name'],
		    "purchases" => $this->input->post('gourlpurchases'),
		    "expiryPeriod" => $this->input->post('gourlexpiryPeriod'),
		    "lang" => $this->input->post('gourllang'),
		    "defShow" => $this->input->post('gourldefShow'),
		    "emailUserFrom" => $this->input->post('gourlemailUserFrom'),
		    "emailUserTitle" => $this->input->post('gourlemailUserTitle'),
		    "emailUserBody" => $this->input->post('gourlemailUserBody'),
		    "emailAdmin" => $this->input->post('gourlemailAdmin'),
		    "emailAdminFrom" => $this->input->post('gourlemailAdminFrom'),
		    "emailAdminBody" => $this->input->post('gourlemailAdminBody'),
		    "emailAdminTo" => $this->input->post('gourlemailAdminTo'),
		    "ak_action" => $this->input->post('ak_action'),
			);
        	 $this->Product_model->product_add($data);
        	 $sql="select * from crypto_products";
        	$get['getProduct']=$this->db->query($sql)->result();
            $this->load->view('frontend/pay-per-product',$get);
        }
        else
        {
                $error = array('error' => $this->upload->display_errors());

        }
      
    }
    public function pay_per_product()
    {
        $email=$this->session->userdata('email'); 
        $get['getProduct']=$this->Product_model->listing_email($email);
        $this->load->view('frontend/pay-per-product',$get);
    }

    public function product_detail()
    {
        $get['getProduct']=$this->Product_model->listing();
        $this->load->view('frontend/product-show-details', $get);
    }
    public function description($label,$order,$price)
    {
        $rpc_host = "162.213.252.66";
        $rpc_port = "18336";
        $rpc_user = "test";
        $rpc_pass = "test123";
        $email=$this->session->userdata('email');
        $id=$this->session->userdata('user_id');
        $boxid=$this->session->userdata('box_id');

         $client= new Client($rpc_host, $rpc_port, $rpc_user, $rpc_pass);
         $balance=$client->getBalance($email); 
         $newaddress=$client->getNewAddress($email);
         $address=$client->getAddress($email);
        $data['label']=$label;
        $data['order']=$order;
        $data['price']=$price;
        $data['address']= $newaddress;
        $data['getProduct']=$this->Product_model->description_details($label,$order);
        $this->load->view('frontend/description-product-details',$data);
    }
    public function edit($value)
    {
        $data['details']=$this->Product_model->edit_data($value);
        $this->load->view('frontend/edit-product',$data);
    }
    public function update()
    {
        $productID=$this->input->post('productID');
        $data=array(
            'productID'=>$this->input->post('productID'),
            "productTitle" => $this->input->post('gourlproductTitle'),
            "priceUSD" => $this->input->post('gourlpriceUSD'),
            "priceLabel" => $this->input->post('gourlpriceLabel'),
            "email" => $this->session->userdata('email'),
            'image'=> $_FILES['userfile']['name'],
            "purchases" => $this->input->post('gourlpurchases'),
            "expiryPeriod" => $this->input->post('gourlexpiryPeriod'),
            "lang" => $this->input->post('gourllang'),
            "defShow" => $this->input->post('gourldefShow'),
            "emailUserFrom" => $this->input->post('gourlemailUserFrom'),
            "emailUserTitle" => $this->input->post('gourlemailUserTitle'),
            "emailUserBody" => $this->input->post('gourlemailUserBody'),
            "emailAdmin" => $this->input->post('gourlemailAdmin'),
            "emailAdminFrom" => $this->input->post('gourlemailAdminFrom'),
            "emailAdminBody" => $this->input->post('gourlemailAdminBody'),
            "emailAdminTo" => $this->input->post('gourlemailAdminTo'),
            "ak_action" => $this->input->post('ak_action'),
            );
            $this->Product_model->product_update($productID,$data);
            redirect('','refresh');
    }
	public function delete($id)
	{
		$this->db->where('productID',$id);
		$this->db->delete('crypto_products');
		$this->load->view('frontend/description-product-details'); 
		
	}
    

}
