<?php
error_reporting(0);
$email =$_GET['e'];

include_once('common.php');
	//...... Update Current Password......//

if(isset($_POST['btnlogin']))
{
  $password = $_POST['signuppassword'];
	$confirmpassword = $_POST['confirmpassword'];

	$postData = array(

		"userMailId"=>$email,
		"newPassword"=>$password,
		"confirmNewPassword"=>$confirmpassword
		);

// Create the context for the request
	$context = stream_context_create(array(
		'http' => array(
			'method' => 'POST',
			'header' => "Content-Type: application/json\r\n",
			'content' => json_encode($postData)
			)
		));


	$response = file_get_contents($url_api.'/user/updateForgotPassordAfterVerify', TRUE, $context);

	if($response === FALSE){
		die('Error');
	}


	$responseData = json_decode($response, TRUE);

	if($responseData['statusCode']==200){
		$message = $responseData['message'];
		header("location:loginnew.php");

	}
	else
	{
		$fail = $responseData['message'];

	}
}




?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="BTG wallet">
    <meta name="author" content="Bitcoin cash Foundation">
    <meta name="keyword" content="BTG Wallet, bitcoin cash, bitcoin, wallet, bcc, bch, btc bch">
    <link rel="icon" href="img/favicon.png" type="image/x-icon" />
    <title>BITWIRE </title>
    <!-- Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" >
    <link href="css/simple-line-icons.css" rel="stylesheet">
    <!-- MDL LIB -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">

     <script type="text/javascript">
        url_api='<?php echo URL_API; ?>';
    </script>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
    <!-- Main styles for this application -->

    <link href="css/style.css" rel="stylesheet">
    <link href="./assets/css" rel="stylesheet">

<link rel="stylesheet" href="./assets/bootstrap.min.css">
<link rel="stylesheet" href="./assets/website.css">

</head>


<body >


 
   

<form action="" method="post">
	<div class="container-fluid">
		<div class="animated fadeIn">

		<div class="row justify-content-center" >
			<div class="col-sm-6 col-md-4">
				<div class="card">
					<div class="card-header bg-success" style="padding: 1.5rem;">
						<strong>Update Forget Password</strong>
						<div style="float:right;">
						<p style="color:green;"> <?php if(isset($message)) {echo $message; }?> </p>
						<p style="color:red;"> <?php if(isset($fail)) {echo $fail; }?> </p>
						</div>
					</div>

					<div class="card-body">
						<div class="form-group">
							<label class="form-form-control-label" for="inputSuccess1">Enter Email</label>
							<input id="email" name="email" autocomplete="off" class="form-control" type="email" value="<?php
							echo $email ;?>">

						</div>
						<div class="form-group">
							<label class="form-form-control-label" for="inputError1">New Password</label>
							<input  id="signuppassword" name="signuppassword" autocomplete="off" class="form-control" type="password" value="">

						</div>
						<div class="form-group">
							<label class="form-form-control-label" for="inputSuccess1">Confirm New Password</label>
							<input id="confirmpassword" name="confirmpassword" class="form-control" autocomplete="off" type="password" value="">

						</div>

					</div>
					<input type="submit" class="btn btn-info btn-lg text-center" id="btnlogin" name="btnlogin" value="Update"/>
					<div  class="btn btn-info btn-lg text-center" style="color:white; margin-top:20;" >
						<a href="indexnew.php" style="color:white; margin-top:20;">Back</a>
					</div>
				</div>
			</div>

			<!--/.col-->

			<!--/.col-->
		</div>

	</div>
</div>
</form>
<?php
include 'footer.php';
?>
