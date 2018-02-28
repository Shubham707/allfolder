
<?php
	include_once('common.php');
  include_once('header1.php');
    include_once('sidebar1.php');

	page_protect();
	
$user_session=$_SESSION['user_session'];
if($_SESSION['user_session']){
$sql="select * from merchantuser where username='$_SESSION[user_session]'";
}

$query=mysqli_query($mysqli,$sql) or die('Query Not Execute');
 $data=mysqli_fetch_assoc($query) or die('Data Not Found');

$errorsend = array();

$user_current_balance = 0;
$reciever_address= "";
$coin_amount = 0;

$user_current_balance2 = 0;
$client = "";
if(_LIVE_)
{
    $client = new Client($rpc_host, $rpc_port, $rpc_user, $rpc_pass);
    if(isset($client))
    {
    	      $client->getnewaddress($user_session);
 $user_current_balance = $client->getBalance($user_session);
         
    }
}
$fees = $user_current_balance * 3 /100;

  
if(isset($_POST['submit']))
{
    //  var_dump($_POST);
    $coin_amount = $_POST['amount'];
    $reciever_address = $_POST['address'];
    
    $user_current_balance = 0;
    
    if(_LIVE_)
    {
        $client = new Client($rpc_host, $rpc_port, $rpc_user, $rpc_pass);
        if(isset($client))
        {
              $user_current_balance = $client->getBalance($user_session) - $fees;
        }
    }
    
    
    if ($coin_amount > $user_current_balance)
    {
        $errorsend['txtCharError'] = "Withdrawal amount exceeds your wallet balance";
    }
    
    if(empty($errorsend))
    {
        if(_LIVE_)
        {
        	$move = $client->move($user_session,'pennybch@gmail.com', (float)$fees);
        $withdraw_message = $client->withdraw($user_session, $reciever_address,(float)$coin_amount);
            
        }
        header("Location:bchmessage.php");
    }   
}
?>
	
<html>
<head>
<style>
@import url(https://fonts.googleapis.com/css?family=Roboto:400,300,600,400italic);
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  -webkit-font-smoothing: antialiased;
  -moz-font-smoothing: antialiased;
  -o-font-smoothing: antialiased;
  font-smoothing: antialiased;
  text-rendering: optimizeLegibility;
}

body {
  font-family: "Roboto", Helvetica, Arial, sans-serif;
  font-weight: 100;
  font-size: 12px;
  line-height: 30px;
  color: #072c4a;
  background: #f1f1f1;
}

.container {
  max-width: 400px;
  width: 100%;
  margin: 0 auto;
  position: relative;
}

#contact input[type="text"],
#contact input[type="email"],
#contact input[type="tel"],
#contact input[type="url"],
#contact textarea,
#contact button[type="submit"] {
  font: 400 12px/16px "Roboto", Helvetica, Arial, sans-serif;
}

#contact {
  background: #F9F9F9;
  padding: 25px;
  margin: 150px 0;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}

#contact h3 {
  display: block;
  font-size: 30px;
  font-weight: 300;
  margin-bottom: 10px;
}

#contact h4 {
  margin: 5px 0 15px;
  display: block;
  font-size: 13px;
  font-weight: 400;
}

fieldset {
  border: medium none !important;
  margin: 0 0 10px;
  min-width: 100%;
  padding: 0;
  width: 100%;
}

#contact input[type="text"],
#contact input[type="email"],
#contact input[type="tel"],
#contact input[type="url"],
#contact textarea {
  width: 100%;
  border: 1px solid #ccc;
  background: #FFF;
  margin: 0 0 5px;
  padding: 10px;
}

#contact input[type="text"]:hover,
#contact input[type="email"]:hover,
#contact input[type="tel"]:hover,
#contact input[type="url"]:hover,
#contact textarea:hover {
  -webkit-transition: border-color 0.3s ease-in-out;
  -moz-transition: border-color 0.3s ease-in-out;
  transition: border-color 0.3s ease-in-out;
  border: 1px solid #aaa;
}

#contact textarea {
  height: 100px;
  max-width: 100%;
  resize: none;
}

#contact button[type="submit"] {
  cursor: pointer;
  width: 100%;
  border: none;
  background: black;
  color: #FFF;
  margin: 0 0 5px;
  padding: 10px;
  font-size: 15px;
}

#contact button[type="submit"]:hover {
  background: #072c4a;
  -webkit-transition: background 0.3s ease-in-out;
  -moz-transition: background 0.3s ease-in-out;
  transition: background-color 0.3s ease-in-out;
}

#contact button[type="submit"]:active {
  box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.5);
}

.copyright {
  text-align: center;
}

#contact input:focus,
#contact textarea:focus {
  outline: 0;
  border: 1px solid #aaa;
}

::-webkit-input-placeholder {
  color: #888;
}

:-moz-placeholder {
  color: #888;
}

::-moz-placeholder {
  color: #888;
}

:-ms-input-placeholder {
  color: #888;
}
</style>
</head>
<body>
<div class="container">  
  <form id="contact" action="" method="post">
    <h3 align="center">Withdraw BCH</h3>
    <fieldset>
    <lable> Receiver Address </lable>
      <input placeholder="Receiver Address" name="address" type="text" tabindex="1" required autofocus>
    </fieldset>

    <fieldset>
    <lable> Amount </lable>
      <input placeholder="Amount" name="amount" type="text" tabindex="2" required>
      <?php if(isset($errorsend['txtCharError'])) { echo "<br/><span class=\"messageClass text-danger\">".$errorsend['txtCharError']."</span>";  }?>
    </fieldset>

    <fieldset>
      <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Withdraw BCH</button>
    </fieldset>
    
  </form>
</div>
<?php include'footer1.php';?>
</body>
</html>


