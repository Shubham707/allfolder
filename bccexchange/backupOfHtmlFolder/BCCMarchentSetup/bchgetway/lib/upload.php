<?php 
include'../common.php';
$image=$_FILES['profile_picture']['name'];
$loc=$_FILES['profile_picture']['tmp_name'];
$imageFileType=$_FILES['profile_picture']['type'];
$id=$_POST['id'];
$allowedExts = array("gif", "jpeg", "jpg", "png");
//$extension = );
if ($imageFileType = "jpg" && $imageFileType = "png" && $imageFileType = "jpeg"
&& $imageFileType = "gif")
{
	if($id)
	{
		$sql="select * from merchantuser where id='$id'";
		$query=mysqli_query($mysqli, $sql) or die(mysqli_error());
		$data=mysqli_fetch_assoc($query);
		if($data['profile_picture'])
		{
			unlink("../upload".$data['profile_picture']);
			$moved=move_uploaded_file($loc,'../upload/'.$image);
			$sqli1="UPDATE `merchantuser` SET `profile_picture` = '$image' WHERE `merchantuser`.`id` = '$id'";
	        $query1=mysqli_query($mysqli,$sqli1) or die('File is not uploaded');
	        $msg="Picture uploaded succefully!";
			ob_start();
			header('Location:../merchantprofile.php?msg=$msg');
		}
		else{
			$msg="Picture is not uploaded!";
			ob_start();
			header('Location:../merchantprofile.php?msg=Picture is not uploaded!');

		}
	}
}
else
{
	
	$msg="Picture is not uploaded!";
	ob_start();
	header('Location:../merchantprofile.php?msg=Picture is not uploaded!');
}

?>