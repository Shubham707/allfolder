<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Excel extends CI_Controller{

    public function __construct() {
        parent::__construct();
        $this->load->model('Excel_model');
        $this->load->helper(array('form', 'url'));
        $this->load->helper('download');
        $this->load->dbutil();
        $this->load->helper('file');
        $this->load->library('zip');
        if($this->session->userdata('user_id')=='')
        {
            redirect('user/login');
        }
    }

  public function index()   
  {
    $boxid=$this->session->userdata('box_id');
    $value['users']=$this->Excel_model->allData($boxid);
    $name='payment';
    $data = $this->load->view('frontend/excel-file',$value,true);
    /*$getname="Payment";
    $this->zip->add_data($name, $getname);
   $this->zip->archive('/path/to/directory/Payment.zip');
    $this->zip->download('Payment.zip');*/
    $this->load->view('frontend/excel-file',$data); 
  }
}