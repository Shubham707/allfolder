
<?php
	include_once('common.php');
	//    header("Refresh:60");
	page_protect();
	// if(!isset($_SESSION['user_id']))
	// {
	// 	logout();
	// }

// $email_id = $_POST['txtEmailID'];
	
$user_session=$_SESSION['user_session'];
if($_SESSION['user_session']){
$sql="select * from merchantuser where username='$_SESSION[user_session]'";
}
else if($_POST['value1'] && $_POST['value2'])
{
	$sql="select * from merchantuser where accesskey='$_POST[value1]' AND password='$_POST[value2]'";
}

$query=mysqli_query($mysqli,$sql) or die('Query Not Execute');
 $data=mysqli_fetch_assoc($query) or die('Data Not Found');

?>
<?php
 $id = @$_GET['invoiceid'];
 $url = @$_GET['url'];
?>
<!DOCTYPE html>
<html>
<head>
<title>BCH PAY</title>
<!-- custom-theme -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //custom-theme -->
<link href="css1/style.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="css1/creditly.css" type="text/css" media="all" />
<link rel="stylesheet" href="css1/easy-responsive-tabs.css">
<script src="js1/jquery.min.js"></script>
<link href="//fonts.googleapis.com/css1family=Overpass:100,100i,200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext" rel="stylesheet">

</head>
<body >
	<div class="main" >	

		<div class="w3_agile_main_grids" >

			<div class="agile_main_top_grid" style="background-color:#072c4a;">
									<h1 color="red">TIME OUT</h1>
				<?php if($id){?>
                  <p align="center" style="color: white;font-size: 22px;">Invoice ID : <?php echo $id ;?></p>
                  <?php }?>
<a href="<?php echo $url;?>" style="color: white; height:200px; width:100px; background-color:green; padding-top: 20px;padding-bottom: 20px; padding-left: 15px;padding-right: 15px; border-radius: 5px;" >Back</a><br><br>              

				<div class="w3_agileits_main_top_grid_right" style="background-color:gray;">

				</div>
				
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		
	</div>
</body>
</html>
<style>
input.read-more-state {
    display: none;
}

p.read-more-target {
    font-size: 0;
    max-height: 0;
    opacity: 0;
    transition: .25s ease;
}

input.read-more-state:checked ~ div.read-more-wrap p.read-more-target {
    font-size: inherit;
    max-height: 999em;
    opacity: 1;
}

input.read-more-state ~ label.read-more-trigger:before {
    content: 'more';
    margin-left: 302px;
}

input.read-more-state:checked ~ label.read-more-trigger:before {
    content: 'less';
    margin-left: 302px;

label.read-more-trigger {
    cursor: pointer;
    display: inline-block;
}
</style>

