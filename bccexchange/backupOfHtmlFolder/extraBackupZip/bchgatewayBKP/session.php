<?php
include('common.php');
//error_reporting(0);
  session_start();
  
   if($user_check = $_SESSION['user_session'])
   {
   $ses_sql = mysqli_query("select user_name, user_id, user_email from user where user_name = '$user_check' ");
   
   $row = mysqli_fetch_assoc($ses_sql);
   
   $login_session = $row['user_name'];
   $login_id = $row['user_id'];
   $login_email = $row['user_email'];
   }
  header("Location:index.php");
?>