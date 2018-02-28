<?php
	include_once('common.php');
	if($_SESSION['user_session']) {
		session_destroy();
		header('Location:mechantlogin.php');
		exit();
	}
?> 