<?php 
	
if (!defined("IN_WALLET")) { die("Auth Error1!"); }
class Client {
	private $uri;
	private $jsonrpc;

	function __construct($host, $port, $user, $pass)
	{
		$this->uri = "http://" . $user . ":" . $pass . "@" . $host . ":" . $port . "/";
		$this->jsonrpc = new jsonRPCClient($this->uri,false);
		
	}

	function getBalance($user_session)
	{

		return $this->jsonrpc->getbalance("merchant(" . $user_session . ")", 6);
		//return 21;

	}
	
    function getAddress($user_session)
    {
                return $this->jsonrpc->getaccountaddress("merchant(" . $user_session . ")");
	}

	function getAddressList($user_session)
	{
		return $this->jsonrpc->getaddressesbyaccount("merchant(" . $user_session . ")");
		//return array("1test", "1test");
	}

	
	function getTransactionList($user_session)
	{
		return $this->jsonrpc->listtransactions("merchant(" . $user_session . ")", 200);
	}

	function getNewAddress($user_session)
	{
	//	echo "indise add";
		return $this->jsonrpc->getnewaddress("merchant(" . $user_session . ")");
		//return "1test";
	}

	function withdraw($user_session, $address, $amount)
	{
		return $this->jsonrpc->sendfrom("merchant(" . $user_session . ")", $address, (float)$amount, 6);
		//return "ok wow";
	}
	
	function move($user_session, $address, $amount)
	{
		return $this->jsonrpc->move("merchant(" . $user_session . ")", $address, (float)$amount, 6);
		//return "ok wow";
	}
	function payment($address, $amount,$comment)
	{
		return $this->jsonrpc->sendtoaddress( $address, (float)$amount, $comment);
		//return "ok wow";
	}

}
?>
