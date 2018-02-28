<?php
    include 'fundheader.php';
    include_once('common.php');
    page_protect();
    if (!isset($_SESSION['user_id'])) {
        logout();
    }

       $user_session = $_SESSION['user_session'];

$postData = array(
  "userMailId"=> $user_session

  );

// Create the context for the request
$context = stream_context_create(array(
  'http' => array(
    'method' => 'POST',
    'header' => "Content-Type: application/json\r\n",
    'content' => json_encode($postData)
    )
  ));


$response = file_get_contents($url_api.'/user/getAllDetailsOfUser', false, $context);


if ($response === false) {
    die('Error');
}



$responseData = json_decode($response, true);



if (isset($responseData['user'])) {
    $pyy_address = $responseData['user']['userPYYAddress'];
}

?>


<form >
<div class="">
    <div class="">
        <div class="row justify-content-center" >
            <div class="col-sm-6 col-md-6 text-center">
                <div class="card text-white bg-success">
                    <div class="card-header text-center">
                        <h1 class="font-custom">Receive PYY<br>

                        </h1>
                        <span class="text-muted">Receive PYY to this address</span>
                    </div>
                    <div class="card-body text-center bg-white text-success">
                        <a href="http://chart.apis.google.com/chart?cht=qr&chs=300x300&chl=<?php echo $new_address_BCH;?>">
                                                 <img src="http://chart.apis.google.com/chart?cht=qr&chs=300x300&chl=<?php echo $pyy_address?>"
                                                alt="QR Code" style="width:200px;border:0;"/></a><br>
                        <span><?php echo $pyy_address;?></span>
                    </div>
                </div>


            </div>
        </div>
    </div>

</div>
</form>

<?php
    include 'footer.php';

?>
