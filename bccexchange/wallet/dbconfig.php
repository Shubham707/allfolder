<?php
/*$db_host = "localhost";
$db_name = "wallet";
$db_user = "root";
$db_pass = "";*/
$db_host = "localhost";
$db_user = "root";
$db_pass = "password";
$db_name = "wallet";

try{

    $db_con = new PDO("mysql:host=localhost; dbname=wallet",$db_user,$db_pass, array(
    PDO::ATTR_PERSISTENT => true
));;
    $db_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
    echo $e->getMessage();
}

?>
