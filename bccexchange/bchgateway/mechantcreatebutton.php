<?php
	include_once('common.php');

	page_protect();
	// if(!isset($_SESSION['user_id']))
	// {
	// 	logout();
	// }

$email_id = $_POST['txtEmailID'];

?>
Enter Ammount:  <input type="text" name="Ammount"  id= "Ammount">

<form action="merchantprofile.php??Ammount=<?php echo $_POST['Ammount'];?>" method="post">

<input type="image" src="button.png" border="0" name="submit" alt="BTC Pay, the easy way to pay with bitcoins cash." >

</form>

</html> 