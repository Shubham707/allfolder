

<?php
include'header1.php';

?>
<?php
$key = @$_REQUEST['accesskey'];
$price = @$_REQUEST['ammount'];
$invoiceid = @$_REQUEST['invoice'];
$redirect = @$_REQUEST['redirect'];
?>

<?php include'sidebar1.php';?>
<div class="content-wrapper">

<section class="content-header">
</section>

<!-- Main content -->
<section class="content">
<div class="row">
<section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            
            <div class="box-body">
               
             <h1> Generated Code </h1>
Select all of the HTML code below, then copy and paste it into your web page.
<br>
<br>
<div>
<textarea style="width:100%;height:170px;background-color: #f1f1f1;">
<form action="http://bccwallet.io/bchgateway/enterammount.php?invoiceid="<?php echo $invoiceid;?>" method="post" >
  <input type="hidden" name="accesskey" value="<?php echo $key ;?>" >
  <input type="hidden" name="ammount" value="<?php echo $price;?>" >
    <input type="hidden" name="invoiceid" value="<?php echo $invoiceid;?>" >
    <input type="hidden" name="redirect" value="<?php echo $redirect;?>" >

  <input type="image" src="http://bccwallet.io/bchgateway/button.png" border="0" name="submit" alt="BitPay, the easy way to pay with bitcoins." >
</form>
</textarea>

</div>
<h1> Button Preview</h1>
<form action="http://bccwallet.io/bchgateway/enterammount.php?invoiceid="<?php echo $invoiceid;?>" method="post" >
  <input type="hidden" name="accesskey" value="<?php echo $key ;?>" >
  <input type="hidden" name="ammount" value="<?php echo $price;?>" >
  <input type="hidden" name="invoiceid" value="<?php echo $invoiceid;?>" >
  <input type="hidden" name="redirect" value="<?php echo $redirect;?>" >

  <input type="image" src="http://bccwallet.io/bchgateway/button.png" border="0" name="submit" alt="BitPay, the easy way to pay with bitcoins." >
</form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
<?php include'footer1.php';?>

