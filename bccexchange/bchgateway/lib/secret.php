<?php
include_once('../common.php');
$secret=$_POST['secret_key'];
$sql="SELECT * FROM `merchantuser` WHERE `username`='$secret' ";
$query=mysqli_query($mysqli, $sql);
$data=mysqli_fetch_assoc($query);


if($data){
header("Location:../paymenttool.php?secret_key=".$data[accesskey]."&& value2=".$data[password]);
}
else
{
	header("Location:../paymenttool.php?secret_key=Data Not Found!");
}
?>