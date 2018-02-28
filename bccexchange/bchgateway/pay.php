<?php
require_once('common.php');

//session 
session_start();

//count items in array
$cartItems = count($_SESSION['user_session']);

//redirect if self navigating pages
if($cartItems < 1)
   {
   header("Location: cart.php");
   }
   
if(!$_SESSION['payTo']) 
	{
	header();
	}  

?>

<!DOCTYPE html>
<html>
<head>
<title>Pay</title>
<link rel="stylesheet" type="text/css" href="style.css">
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/qrcode.js"></script>
<script>
var btcs = new WebSocket('wss://ws.blockchain.info/inv');

btcs.onopen = function()
	{
	btcs.send( JSON.stringify( {"op":"addr_sub", "addr":"<?php echo $_SESSION['payTo']; ?>"} ) );
	};

btcs.onmessage = function(onmsg)
{
  var response = JSON.parse(onmsg.data);
  var getOuts = response.x.out;
  var countOuts = getOuts.length; 
  for(i = 0; i < countOuts; i++)
  {
    //check every output to see if it matches specified address
    var outAdd = response.x.out[i].addr;
    var specAdd = "<?php echo $_SESSION['payTo']; ?>";
       if (outAdd == specAdd )
       {
       var amount = response.x.out[i].value;
       var calAmount = amount / 100000000;
       $('#messages').prepend("Received " + calAmount + " BTC");
	   
	   /*var snd = new  Audio("");  
       snd.play();*/
	   
       }
  } 
}
</script>
</head>
<body>
<h1><?php echo $storeName; ?></h1>
<div id="viewCart">
  <span id="viewTitle">Finish & Pay</span><br>
  <div id="payAmt"><b>Amount Due: <?php echo $_SESSION['orderCost']; ?> BTC</b><br>
  Payment Order <br>
  <div id="qrcode"></div>
  <script type="text/javascript">
  new QRCode(document.getElementById("qrcode"), "<?php echo $_SESSION['payTo']; ?>");
  </script>
  <br>
  <input type="text" id="payBox" value="<?php echo $_SESSION['payTo']; ?>" onclick="this.select();" readonly>
  <br><div id="messages"></div>
  </div>
</div>
<br>
<?php 
session_destroy();
?>
</body>
</html>