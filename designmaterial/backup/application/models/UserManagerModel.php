<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserManagerModel extends CI_Model
{
  //User Register
  public function dataSave($data)
	{
		return $val=$this->db->insert('users', $data);
	}
  //User Listing
  public function listing()
	{
		$data= $this->db->query('SELECT box_id FROM users ORDER BY  `box_id` DESC
LIMIT 1')->result();
		foreach ($data as $key => $row)
		{
			return $row->box_id;
		}
	}
 //user Login
 public function login($data)
	{

		$condition = "email =" . "'" . $data['email'] . "' AND " . "password =" . "'" . $data['password'] . "'";
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 1) {

			return true;

		} else {

			return false;
		}
	}
  //get user details
  public function details_user($value)
	{
		return $query=$this->db->select('*')->where('email', $value)->get('users')->result();

	}

  //echeck email existance
  public function emailExist($email)
  {
    $query = $this->db->get_where('users', array('email' => $email));
    $count = $query->num_rows();
    if ($count === 0)
    {
          return FALSE;
    }
    else
    {
      return TRUE;
    }
  }
  public function updateUserProfile($data)
  {
    return $val=$this->db->where('user_id', $this->session->userdata('userId'))->update('users', $data);
  }
  	public function total($email)
	{
		$sql="select * from users where email='$email'";
		 return $query=$this->db->query($sql)->result();
		 //print_r($query); die();
	}
	public function coinItem($email)
	{
		$sql="select * from monetiser where email='$email'";
		 return $query=$this->db->query($sql)->result();
		//print_r($query); die();
	}
	public function items_sold($email)
	{
		$sql="select * from crypto_payments where email='$email'";
		return $query=$this->db->query($sql)->result();
	}
	public function imcome_monthly($email)
	{
		$sql="SELECT txDate,amountUSD,amount FROM crypto_payments WHERE email='$email' and date(`txDate`) BETWEEN (CURDATE() - INTERVAL 1 MONTH) AND (CURDATE())";
		 return$query=$this->db->query($sql)->result();
		//print_r($query); die();
	}
	public function imcome_All($email)
	{
		$sql="SELECT txDate,amountUSD FROM crypto_payments where email='$email'";
		 return$query=$this->db->query($sql)->result();
		//print_r($query); die();
	}

}
//
 ?>
