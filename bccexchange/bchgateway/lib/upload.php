<?php 
include'../common.php';
 $image=$_FILES['profile_picture']['name'];
 $loc=$_FILES['profile_picture']['tmp_name'];
 $imageFileType=$_FILES['profile_picture']['type'];
 $id=$_REQUEST['id'];
//die();
$allowedExts = array("gif", "jpeg", "jpg", "png");
//$extension = );
if ($imageFileType = "jpg" && $imageFileType = "png" && $imageFileType = "jpeg"
&& $imageFileType = "gif")
{
		
			/*unlink("../upload".$data['profile_picture']);*/
			$moved=move_uploaded_file($loc,'http://104.219.248.173/bchgateway/upload/'.$image);
			$sqli1="UPDATE `merchantuser` SET `profile_picture` = '$image' WHERE `merchantuser`.`id` = '$id'";
	        $query1=mysqli_query($mysqli,$sqli1) or die('File is not uploaded');
	        $msg="Picture uploaded succefully!";
			ob_start();
			header('Location:../merchantprofile.php?msg=$msg');
}
else
{
	
	$msg="Picture is not uploaded!";
	ob_start();
	header('Location:../merchantprofile.php?msg=Picture is not uploaded!');
}

?>
