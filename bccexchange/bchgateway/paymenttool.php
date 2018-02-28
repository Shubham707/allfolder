

<?php
  include_once('common.php');

  include'header1.php';
 include'sidebar1.php';
$user_session=$_SESSION['user_session'];

?>
<?php
$invoice = uniqid();
?>


<div class="content-wrapper">

<section class="content-header">
<h1>
Create Payment Button

</h1>

</section>
<script>
function copyToClipboard(element) {
  var $temp = $("<input>");
  $("body").append($temp);
  $temp.val($(element).text()).select();
  document.execCommand("copy");
  $temp.remove();
}

</script>

<!-- Main content -->
<section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            
            <div class="box-body  col-xs-6">
               
             <h1>Create a Payment Button</h1>
             <p class="text-muted text-center">
                <form action="lib/secret.php" method="post" accept-charset="utf-8">
                  <input type="hidden" name="secret_key" value="<?php echo $user_session;?>">
                  <center><input class="btn btn-success" type="submit" name="submit" value="Get Secret Key"></center></p>
                  
                </form>
                
                 <!--  <?php if(@$_REQUEST['secret_key']){ ?>
                <p id="p1" style="background-color: black; color:white;"> <?php echo @$_REQUEST['secret_key'];?></p>
                  <?php } else { echo "<p>Secret Key: <br></p>"; }?> -->
                  
<!-- <button class="btn btn-success" onclick="copyToClipboard('#p1')">Copy Key</button> -->
                  <!-- .' && value2='.@$_REQUEST['value2']; -->
                </p>
                  
             <form role="form" action="bchbutton.php" method="post">
              <div class="box-body">
                <div class="form-group ">
                  <label for="exampleInputEmail1">Price :</label>
                  <input class="form-control" id="exampleInputEmail1" placeholder="Enter Money" type="text" name="ammount" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Accesskey :</label>
                  <input class="form-control" id="exampleInputPassword1" placeholder="Accesskey" type="text" name="accesskey" value="<?php echo @$_REQUEST['secret_key'];?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Redirect Url :</label>
                  <input class="form-control" id="redirect" placeholder="Redirect URL" type="url" name="redirect" required>
                </div>
                <input type="hidden" name="invoice" value="<?php echo $invoice;?>">

              
                <button type="submit" class="btn btn-primary">Submit</button>
             </form>

              </div>
            </div>
            <div class="box-body  col-xs-6">
             <p class="text-muted text-center"></p>
             <img src="assets/advisordigitalmarketing_92770943.jpg" width="500" style="margin-top: 50px;" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
  $('input[name="ammount"]').keyup(function(e)
                                {
  if (/\D/g.test(this.value))
  {
    // Filter non-digits from input value.
    this.value = this.value.replace(/\D/g, '');
  }
});
</script>
<?php include'footer1.php';?>
