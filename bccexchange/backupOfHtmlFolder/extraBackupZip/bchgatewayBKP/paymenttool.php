

<?php
  include_once('common.php');
include'header1.php';

?>
<?php
$invoice = uniqid();
?>

<?php include'sidebar1.php';?>
<div class="content-wrapper">

<section class="content-header">
<h1>
Create Payment Button

</h1>

</section>

<!-- Main content -->
<section class="content">
<div class="row">
<section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            
            <div class="box-body  col-xs-6">
               
             <h1>Create a Payment Button</h1>
             <form role="form" action="bchbutton.php" method="post">
              <div class="box-body">
                <div class="form-group ">
                  <label for="exampleInputEmail1">Price :</label>
                  <input class="form-control" id="exampleInputEmail1" placeholder="Enter Money" type="text" name="ammount">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Accesskey :</label>
                  <input class="form-control" id="exampleInputPassword1" placeholder="Accesskey" type="text" name="accesskey">
                </div>
                <input type="hidden" name="invoice" value="<?php echo $invoice;?>">

              
                <button type="submit" class="btn btn-primary">Submit</button>
            
              </div>
              <!-- /.box-body -->
              
            </form>
         <!-- <form action="bchbutton.php" method="post" >
             Price : <input type="text" name="ammount" style="margin-left: 60px !important;">
             <br>
             <br>
             Accesskey : <input type="text" name="accesskey" style="margin-left: 30px;">
             <br>
             <br>
             <input type="hidden" name="invoice" value="<?php echo $invoice;?>">
             <input type="submit" name="Get Code" value="Get Code" class="btn btn-success">
             </from> -->
 
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