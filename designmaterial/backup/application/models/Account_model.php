<?php 
/**
* product save
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Account_model extends CI_Model 
{
	public function __construct() 
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('parser');
    }
    public function paymentCoin()
    {
    	$sql="select * from coin";
    	return $query=$this->db->query($sql)->result();
    }

	public function view_account($email) 
	{
		// $sql="select a.*,b.*,c.* from security_key a left join coin b on a.coinName=b.coin_name left join crypto_payments c on (c.boxID=a.boxID and c.coinLabel=a.boxName) where email='$email'";
		 return $val=$this->db->get('security_key')->result(); 
	}
	public function invoice($coin) 
	{
		$sql="SELECT * FROM crypto_products WHERE productTitle ='$coin'";
		return $value= $this->db->query($sql)->result();
		 
	}
	public function multicurrency($mutiid, $boxid, $name)
	{
		  $sql = "SELECT * FROM security_key WHERE multicurrencyID = '$mutiid' AND boxID ='$boxid' AND coinName ='$name'";
		 return $value= $this->db->query($sql)->result();

	}
	public function coinboxs_payment($value,$id)
	{
		$sql="SELECT * FROM crypto_payments, security_key WHERE crypto_payments.boxID='$id' AND security_key.boxID='$id' AND crypto_payments.coinLabel='$value' AND security_key.boxName='$value'";
		 return $query = $this->db->query($sql)->result();
	}
	public function securities_key($value)
	{
		$this->db->insert('security_key',$value);

	}
	public function securities_update($value,$id)
	{
		return $this->db->update('security_key',$value);
	}
	public function security_key_listing($id,$boxid)
	{
		$options=array('user_id'=>$id, 'boxID'=> $boxid,);
		return $query =  $this->db->get_where('security_key', $options)->result();
	}
	public function affiliatedSave($data)
	{
		return $query =  $this->db->Insert('affiliated',$data);
	}
	public function monetiserSave($data)
	{
		return $query =  $this->db->Insert('monetiser',$data);
	}
	public function monetiserList($email)
	{
		return $this->db->select('*')
		     ->from('monetiser as m')
		     ->where('m.email', $email)
		     ->join('coin as c', 'c.coin_name = m.coinLabel', 'LEFT')
		     ->get()->result();
		/*return $this->db->select('*')->where('email', $email)->get('monetiser')->result();*/
	}

	public function affiliatedList($value)
	{

		return $this->db->select('*')->where('email', $value)->get('affiliated')->result();
		
	}

	public function affiliatedListEdit($value)
	{
		return $this->db->select('*')->where('affiliated_id', $value)->get('affiliated')->result();
		
	}
	public function affiliatedUpdate($value,$id)
	{
		$this->db->where('affiliated_id',$id);
		return $this->db->Update('affiliated',$value);
		
	}
	public function monetiser_edit($value)
	{
		return $this->db->select('*')->where('monetiser_id', $value)->get('monetiser')->result();
	}

}

