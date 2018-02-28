
<?php 
/**
* product save
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Excel_model extends CI_Model 
{
	public function __construct() 
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('parser');
    }
    public function allData($boxID)
	{
		$sql="select * from crypto_payments where boxID='$boxID'";
		return $data=$this->db->query($sql)->result();
	}
	

}

