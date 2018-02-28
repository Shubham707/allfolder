<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
/**
* Shubham Sahu 
* version: 1.0.1
*/
class Cart_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	public function retrieve_products()
	{
	$query = $this->db->get('coin');
	return $query->result();
	}

	

	
}