<?php 
include_once('../common.php'); 
$allowed = array(".", "-", "_"); 
//$email_id =""; 
$email_id= @$_REQUEST['email_id'];
//die();
//echo " =>>>>>>> ".hash('sha256',addslashes(strip_tags($email_id))); 
//echo "</br> =>>>>>>> ".hash('sha256',addslashes(strip_tags($password))); 
$error = array(); 
if(isset($_POST['btnlogin'])) { 
// var_dump($_POST); $email_id = $_POST['txtEmailID']; 
  if (empty($email_id)) 
  { 
	$error['emailError'] = "Please Provide valid email id";
  }
  elseif (!isEmail($email_id)) 
  {
  $error['emailError'] = "Please Provide valid email id";
  } 
  if(empty($error)) 
  { 
  	 $email_id = $mysqli->real_escape_string(strip_tags($email_id));
  	 $qstring = "select coalesce(id,0) as id, coalesce(username,'') as username from merchantuser WHERE encrypt_username = '" . hash('sha256',$email_id) . "'"; 
  	 $result = $mysqli->query($qstring); $user = $result->fetch_assoc(); 
//var_dump($user);
 if (($user) && ($user['id'] > 0 )) 
 { 
$new_password = "s!w@".rand(0,100000); 
$password_value = hash('sha256',addslashes(strip_tags($new_password)));
 $sub =" Password Recovery Mail"; $message_body =" Dear User \n"; 
 $message_body .= " Your recovery password is $new_password \n\n"; 
 $message_body .= " Please login and change it immediately\n\n"; 
 $message_body .= " Thanks \n"; $message_body .= " Administrator"; 
 $qstring = "update merchantuser set password ='".$password_value."'"; 
 $qstring .= " WHERE encrypt_username = '" . hash('sha256',$email_id) . "' and id = ".$user['id'] ; $result2 = $mysqli->query($qstring); 
   // $user2 = $result2->fetch_assoc();
  $error['emailError2'] = "An Email has been send to your email id. "; 
  $send=sendpmail($email_id,$sub,$message_body); } else { $error['emailError'] = "the Provided email_id is not registered with us"; 
	if($send)
	{
		header("Location:../login.php");
	}
	else
	{
		echo "error";
	}
	}
 }
} 
//var_dump($_SESSION); ?





