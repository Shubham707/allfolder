<?php
include_once('../common.php');
$sql="SELECT year(trans_year)as get_year, SUM(trans_amount) as sum_ammount FROM transcation_list  GROUP BY YEAR(trans_year)";
$query=mysqli_query($mysqli, $sql) or die(mysqli_query());
$data=mysqli_fetch_assoc($query) or die(mysqli_query());
echo json_encode($data);
?>