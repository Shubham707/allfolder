<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Coin extends CI_Controller 
{   
    public function Coin() 
    {
        parent::__construct();
        $this->load->model('Coin_model');
        $this->load->helper(array('form', 'url','file'));
        $this->load->library('upload','session');
         if($this->session->userdata('admin_is_logged_in')==false)
        {
            redirect(base_url().'admin/login','refresh');
        }

    }
   public function index()
    {
        $value['getCoin']=$this->Coin_model->listing();
       $this->load->view('backend/coin/index',$value);
    }

    public function add_coin()
    {
      $this->load->view('backend/coin/add-coin');
    }
    public function edit_coin($id)
    {
        $data['editCoin']=$this->Coin_model->edit($id);
      $this->load->view('backend/coin/coin-edit', $data);
    }
    public function insert_coin()
    {
        
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
               $data = array(
                'coin_name' => $this->input->post('coin_name'),
                'coin_date' => $this->input->post('coin_date'),
                'coin_image' => $_FILES['userfile']['name'],
            );
            $insertUserData = $this->Coin_model->addCoin($data);
            $value['getCoin']=$this->Coin_model->listing();
            
            $this->load->view('backend/coin/index',$value);
                
        }
        else
        {
                $error = array('error' => $this->upload->display_errors());

        }
    }
    public function update_coin()
    {
            $id=$this->input->post('coin_id');

            $config['upload_path']          = 'uploads/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 100;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;
            //print_r($config); die();
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            $this->upload->do_upload('userfile');
            
                $image = $this->upload->data('userfile');
                
                   $data = array(
                    'coin_name' => $this->input->post('coin_name'),
                    'coin_image' => $_FILES['userfile']['name'],
                     );
                    $insertUserData = $this->Coin_model->updateCoin($id, $data);
               
                $value['getCoin']=$this->Coin_model->listing();
                
                $this->load->view('backend/coin/index',$value);
           
    }               
    
}
