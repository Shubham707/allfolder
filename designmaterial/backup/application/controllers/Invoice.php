<?php 
/* 
Author : Shubham Sahu
Version: 2017.1.0
Email  : shubhamsahu707@gmail.com
*/

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Invoice extends CI_Controller {
	
	public $CI_INNER_DIR='vendors/';
	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('Billing_model');
		$this->load->library("cart");

	}

	public function index()
	{
		
			$order = array(
				'fld_order_date' 			=> date('m/d/Y'),
				'fld_vendor_id' 			=> $this->session->userdata('vendor_id'),
				'fld_admin_username' 		=> $this->session->userdata('username'),
				'fld_admin_type' 			=> $this->session->userdata('user_type')
			);		
	
			$ord_id = $this->MBilling->insert_vendor_order($order);
			
			if ($cart = $this->cart->contents()):
				foreach ($cart as $item):
					$order_detail = array(
						'fld_order_id' 			=> $ord_id,
						'fld_book_id' 			=> $item['id'],
						'fld_order_quantity' 	=> $item['qty'],
						'fld_order_price' 		=> $item['price']
					);	
					$cust_id = $this->MBilling->insert_vendor_order_detail($order_detail);
				endforeach;
			endif;
			
			if ($cart = $this->cart->contents()):
				foreach ($cart as $item):
					
					$fld_book_sku[]=$item['skucode'];
					$fld_book_name[]=$item['name'];
					$fld_order_quantity[]=$item['qty'];
						
					
				endforeach;
			endif;
			
			$fld_book_list = array();
			foreach ($fld_book_sku as $id => $key) {
				$fld_book_list[$id] = array(
					'fld_book_sku'  => $fld_book_sku[$id],
					'fld_book_name' => $fld_book_name[$id],
					'fld_order_quantity' => $fld_order_quantity[$id],
				);
			}	
			
		$this->cart->destroy();
		
		//Mailing Code Starts
		/*$this->load->library('email');
		
		$config['charset'] = 'utf-8';
		$config['wordwrap'] = TRUE;
		$config['mailtype'] = 'html';
		
		$this->email->initialize($config);
		
		$this->email->from('sunnysss@b2cmarketing.in', 'Shopping');
		$this->email->to($this->input->post('fld_customer_email'));
		//$this->email->to('kb.snr02@gmail.com');
		//$this->email->cc('another@another-example.com');
		//$this->email->bcc('them@their-example.com');
		
		$this->email->subject('Orders have been submitted for Shopping');
		
		$data['order_mail_datarecord']=$fld_product_list;
		$data['order_no']=$ord_id;
		
		//$email = $this->load->view('crm/mod_template/order_template', $data, TRUE);
	 	$email='';
		 $this->email->message( $email );
		 $this->email->send();*/
		//Mailing Code Ends
		
		echo "<script>alert('Thank You! your order has been placed & Order No.=".$ord_id."!')</script>";
		echo'<meta http-equiv="refresh" content="1;url='.base_url().$this->CI_INNER_DIR.'product/bulk_search">';
	}
}