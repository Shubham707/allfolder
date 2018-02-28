<?php
///echo URL_API.''./verification/addVerificationDetails
include'common.php';
$firstName=$_POST['firstName'];
$lastName=$_POST['lastName'];
$middleName=$_POST['middleName'];
$addLine1=$_POST['addLine1'];
$addLine2=$_POST['addLine2'];
$country=$_POST['country'];
$state=$_POST['state'];
$city=$_POST['city'];
$mobileNumber=$_POST['mobileNumber'];
$pincode=$_POST['pincode'];
$bankAccountNumber=$_POST['bankAccountNumber'];
$bankAccountHolderName=$_POST['bankAccountHolderName'];
$bankName=$_POST['bankName'];
$IFSCCode=$_POST['IFSCCode'];
$file=$_POST['file'];
$taxProofNumber=$_POST['taxProofNumber'];
$addressProofType=$_POST['addressProofType'];
$file2=$_POST['file2'];
$userId=$_POST['userId'];


$postData = array(
"firstName"=>$firstName,
  "lastName"=>$lastName,
  "middleName"=>$middleName,
  "addLine1"=>$addLine1,
  "addLine2"=>$addLine2,
  "country"=>$country,
  "state"=>$state,
  "city"=>$city,
  "mobileNumber"=>$mobileNumber,
  "pincode"=>$pincode,
  "bankAccountNumber"=>$bankAccountNumber,
  "bankAccountHolderName"=>$bankAccountHolderName,
  "bankName"=>$bankName,
  "IFSCCode"=>$IFSCCode,
  "file"=>$file,
  "taxProofNumber"=>$taxProofNumber,
  "addressProofType"=>$addressProofType,
  "file2"=>$file2,
  "userId"=>$userId,
  );

  $context = stream_context_create(array(
    'http' => array(
      'method' => 'POST',
      'header' => "Content-Type: application/json\r\n",
      'content' => json_encode($postData)
      )
    ));

    $response = file_get_contents($url_api.'/verification/addVerificationDetails', false, $context);


		 $responseData = json_decode($response, true);
     $data=$responseData['message'];
      if ($responseData) {

        header("location:index.php?msg=".$data);
      }
      else{
         header("location:index.php?msg=Your verification details is not submited");
      }



?>







?>
