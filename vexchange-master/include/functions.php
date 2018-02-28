<script type="text/javascript" src="js/sails.io.js"></script>
<script type="text/javascript">
  io.sails.url = '<?php echo URL_API;?>';
  window.ioo = io;
  socket = io.connect( '<?php echo URL_API;?>', {
    reconnection: true,
    reconnectionDelay: 1000,
    reconnectionDelayMax : 5000,
    reconnectionAttempts: 99999
  });

  socket.on( 'connect', function () {} );
  socket.on( 'disconnect', function () { socket.connect();  } );
</script>
<script>
url_api = '<?php echo URL_API;?>';


function sell_data(){



var ask_rate = document.getElementById('ask_rate').value;
var ask_vol = document.getElementById('ask_vol').value;
var ask_amount = document.getElementById('ask_amount').value;

var sub_curr='<?php echo substr($currency1,0,3);?>';
var main_curr='<?php echo   strtolower($currency2);?>';

if(ask_rate !='' && ask_vol !='0' && ask_amount !='0')
{

<?php if(isset($_SESSION['user_id'])){
?>
user_id = '<?php echo $_SESSION['user_id']; ?>';
var askownerId=user_id;

var url=url_api+"/trademarket"+main_curr+sub_curr.toLowerCase()+"/addAsk"+sub_curr+"Market";

var json_ask = {
"askAmount<?php echo  $currency2;?>":ask_amount,
"askAmount<?php echo substr($currency1,0,3);?>":ask_vol,
"askRate":ask_rate,
"askownerId":askownerId
}


$.ajax({
type: "POST",
contentType: "application/json",
url: url,
data: JSON.stringify(json_ask),
success: function(result){


$('#alertmsg1').empty();

if (result.statusCode!=200)
{
     $('#alertmsg1').append('<div class="alert alert-danger"><strong> &nbsp;'+result.message+'</strong>  </div>');

}
}
});
<?php }else{?>

$('#alertmsg1').html('<div class="alert alert-danger"><strong>Please Login First !!!</strong>  </div>');
<?php }?>
}else{
$('#alertmsg1').html('<div class="alert alert-danger"><strong>Please filled price and amount first !!!</strong>  </div>');
}
}



function buy_data(){



var bid_rate = document.getElementById('bid_rate').value;
var bid_vol = document.getElementById('bid_vol').value;
var bid_amount = document.getElementById('bid_amount').value;

var sub_curr='<?php echo substr($currency1,0,3);?>';
var main_curr='<?php echo   strtolower($currency2);?>';

if(bid_rate !='' && bid_vol !='0' && bid_amount !='0')
{

<?php if(isset($_SESSION['user_id'])){
?>
var user_id = '<?php echo $_SESSION['user_id']; ?>';

var bidownerId=user_id;

var url=url_api+"/trademarket"+main_curr+sub_curr.toLowerCase()+"/addBid"+sub_curr+"Market";


var json_ask = {
      "bidAmount<?php echo  $currency2;?>":bid_amount,
      "bidAmount<?php echo substr($currency1,0,3);?>":bid_vol,
      "bidRate":bid_rate,
      "bidownerId":bidownerId,

}


$.ajax({
type: "POST",
contentType: "application/json",
url: url,
data: JSON.stringify(json_ask),
success: function(result){


$('#alertmsg').empty();

if (result.statusCode!=200)
  {
     $('#alertmsg').append('<div class="alert alert-danger"><strong> &nbsp;'+result.message+'</strong>  </div>');

}
}
});
<?php }else{?>

$('#alertmsg').html('<div class="alert alert-danger"><strong>Please Login First !!!</strong>  </div>');
<?php }?>
}else{
$('#alertmsg').html('<div class="alert alert-danger"><strong>Please filled price and amount first !!!</strong>  </div>');
}
}
</script>
