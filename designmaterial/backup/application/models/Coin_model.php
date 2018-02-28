<?php 
/**
* product save
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Coin_model extends CI_Model 
{
	public function __construct() 
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('parser');
    }
    public function listing()
	{
		return $val= $this->db->get('coin')->result();

	}
	public function edit($id)
	{
		 $sql="select * from coin where coin_id='$id'";
		return $query=$this->db->query($sql)->result();

	}

	public function addCoin($value)
	{
		return $val= $this->db->Insert('coin',$value);

	}
	public function updateCoin($id,$data)
	{
		$this->db->where('coin_id', $id);
		return $exe=$this->db->update('coin', $data);
	}

}

