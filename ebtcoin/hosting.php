<?php 
@SESSION_START();
 echo $ihost_id=$_SESSION['host_id'];
 echo $hosting="SELECT * FROM hosting where host_id='$ihost_id'";
$query=$mysqli->query($hosting);
$fetch=$query->fetch_assoc();
$rpc_host=$fetch['rpc_host'];
$rpc_port=$fetch['rpc_port'];
$rpc_user=$fetch['rpc_user'];
$rpc_pass=$fetch['rpc_pass'];
?>