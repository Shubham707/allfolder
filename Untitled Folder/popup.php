
<?php @$user_session = @$_SESSION['user_session'];   include_once('hosting.php');?>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">



<!-- forget -->
 <div id="id03" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">

      <div class="w3-center"><br>
        <span onclick="document.getElementById('id03').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
        New Address Genrate
      </div>

         <?php $client = "";
     /* $wallet_address = "";
      if(_LIVE_)
      {
        $client = new Client($rpc_host, $rpc_port, $rpc_user, $rpc_pass);
        if(isset($client))
        {
           $new=$client->getnewaddress($user_session);
	   
        }
        }*/
        ?>
        

      
        <div class="w3-section">
           <label><b>New Address:</b></label>
          <input class="w3-input w3-border w3-margin-bottom" type="email" placeholder="Enter Email" name="txtEmailID" required value="<?php echo $new;?>">
        </div>

   <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
        <button onclick="window.location.href=''" type="button" class="w3-button w3-green">Confirm</button>
      </div>

    </div>
  </div>
</div>

<!-- send  id04-->
<div id="id04" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
<div class="w3-center"><br>
        <!--<span onclick="document.getElementById('id04').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>-->
 Send
      </div>
     

      
      <form  role="frm" class="w3-container" action="lib/send.php" method="post" >
        <hr>
          
          <div class="form-group">
            <label for="usr">TO:</label>
            <input id="btcaddress"  name ="btcaddress" placeholder="EBT Address" autocomplete="off" type="text" class="form-control" required>
          </div>
          
          <div class="form-group">
              <label for="usr">Amount EBT:</label>
              <input id="btcval" name="txtChar" placeholder="Amount EBT" autocomplete="off" type="text" class="form-control" required>
          </div>
       
          
          <div class="form-group">
            <label for="usr">Description:</label>
            <textarea id="discription" name ="discription" class="form-control" placeholder="Description" class="form-control"></textarea>
          </div>
          <div  class="form-group">
              <label style="float:left">Spending Password</label>
              <input id="spendingpassword" name="spendingpassword" class="form-control" autocomplete="off" type="password" placeholder="Spending password">
                
          </div>
          
          <input name="btncontact" class="w3-button w3-block w3-blue w3-section w3-padding" type="submit" value"Send">
          <div class="w3-container w3-border-top w3-padding-16 w3-light-grey" style="text-align:center;">
        <button onclick="document.getElementById('id04').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>

      </div
          
        </div>
      </form>

  

    </div>
  </div>
</div>

<!-- close -->
<!-- send id05-->
<div id="id05" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">

      <div class="w3-center"><br>
        <span onclick="document.getElementById('id05').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
 Recieve
      </div>
 
      <form  role="frm" class="w3-container" action="#" method="post" >
        <hr>
         
          <div class="form-group">
            
            <label for="usr">Deposit EBT Coin</label>
            <?php 
            if(_LIVE_)
            {
              $client = new Client($rpc_host, $rpc_port, $rpc_user, $rpc_pass);
              if(isset($client))
              {
                $new_address = $client->getAddress($user_session);
                $user_current_balance = $client->getBalance($user_session) - $fee;
              }
            }
            ?>
            <input type="text" class="form-control js-copytextarea" id="copy" value="<?php echo $new_address;?> " disabled><br>
            <center><label style="padding:0px;margin-top:-5px;">
                          <a href="http://chart.apis.google.com/chart?cht=qr&chs=300x300&chl=<?php echo $new_address?>">
                        <img src="http://chart.apis.google.com/chart?cht=qr&chs=300x300&chl=<?php echo $new_address?>" 
                        alt="QR Code" style="width:200px;border:0;"/></a></label></center>
           
        
          
         

		
        </div>
      </form>
    </div>
  </div>
</div>

<!-- close -->

<!-- 
  <div id="id01" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">

      <div class="w3-center"><br>
        <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
        Address
      </div>

      <div class="w3-section">
        
         
        </div>
      <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">

        <span class="w3-right w3-padding w3-hide-small"><a onclick="document.getElementById('id03').style.display='block'">Forgot Password</a></span> 
      </div>

    </div>
  </div> -->
  <!-- start 4 -->
  <div id="id07" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">

      <div class="w3-center"><br>
        <span onclick="document.getElementById('id07').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
        Transaction 
      </div>

         <?php $client = "";
      /*$wallet_address = "";
      if(_LIVE_)
      {
        $client = new Client($rpc_host, $rpc_port, $rpc_user, $rpc_pass);
        if(isset($client))
        {
           $new=$client->getnewaddress('blabla');
        }
        }*/
        ?>
        

      
        <div class="w3-section">
            <form  role="frm" class="w3-container" action="lib/send_btc.php" method="post" >
        <hr>
          
          <div class="form-group">
          
          <div class="form-group">
              <label for="usr">BTC:</label>
              <input id="btcval" name="txtChar" placeholder="Enter BTC" autocomplete="off" type="text" class="form-control" required>
          </div>
          <div class="form-group">
              <label for="usr">Transection Id:</label>
              <input id="btcval" name="txtChar" placeholder="Paste recipient BX Address" autocomplete="off" type="text" class="form-control" required>
          </div>
       
         
         
          
          <button class="w3-button w3-block w3-blue w3-section w3-padding" type="submit">Send</button>
       
       
      </div>
          
        </div>
      </form>
        </div>

   

    </div>
  </div>
</div>
  <!-- close -->
<script type="text/javascript">
//$(document).ready();  
function checkemail()
{
 var email=document.getElementById( "txtEmailID" ).value;
 var password=document.getElementById('pass').value;

 if(email)
 {
  $.ajax({
  type: 'post',
  url: 'lib/check_availability.php',
  data: { username:email, pass:password },
  success: function (response) {
   $( '#email_status' ).html(response);
   if(response=="OK") 
   {
    return true; 
   }
   else
   {
    return false; 
   }
  }
  });
 }
 else
 {
  $( '#email_status' ).html("");
  return false;
 }
}
function checkotp()
{
 var email=document.getElementById( "emailotp" ).value;

 if(email)
 {
  $.ajax({
  type: 'post',
  url: 'lib/check_otp.php',
  data: { username:email },
  success: function (response) {
   $( '#email_s' ).html(response);
   if(response=="OK") 
   {
    return true; 
   }
   else
   {
    return false; 
   }
  }
  });
 }
 else
 {
  $( '#email_s' ).html("");
  return false;
 }
}

</script>
<script type="text/javascript">
  
function signcheckemail()
{
 var email=document.getElementById( "emailid" ).value;
   
  
 if(email)
 {
  $.ajax({
  type: 'post',
  url: 'lib/signup.php',
  data: { username:email },
  success: function (response) {
   $( '#result' ).html(response);
   if(response=="OK") 
   {
    return true;  
   }
   else
   {
    return false; 
   }
  }
  });
 }
 else
 {
  $( '#email_status' ).html("");
  return false;
 }
}
</script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript">
        $(function () {
            $("#btnSubmit").click(function () {
                var password = $("#signuppassword").val();
                var confirmPassword = $("#confirmpassword").val();
                var penpassword = $("#spendingpassword").val();
                var penconfirmPassword = $("#confirmspendingpassword").val();

                if (password != confirmPassword) {
                    $("#error1").html('Password Not match');
                    return false;
                }
                if (penpassword != penconfirmPassword) {
                    $("#error2").html('Spending Password Not match');
                    return false;
                }
                return true;
                $('#error1').html('');
                $('#error2').html('');
            });
        });
    </script> <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>  $('input[name="txtChar"]').keyup(function(e)                                
{  if (/\D/g.test(this.value))  {    
// Filter non-digits from input value.   
 this.value = this.value.replace(/\D/g, '');  
}
});
 $('input[name="phone"]').keyup(function(e)                                
{  if (/\D/g.test(this.value))  {    
// Filter non-digits from input value.   
 this.value = this.value.replace(/\D/g, '');  
}
});
</script>

