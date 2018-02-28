<?php
    include 'final_header.php';
    include_once('common.php');
    page_protect();
    if (!isset($_SESSION['user_id']) && !isset($_SESSION['token'])) {
        logout();
    }

   $user_session = $_SESSION['user_session'];



if(isset($_GET['curr']))
{
  $currencyname=base64_decode($_GET['curr']);

  switch ($currencyname) {
        
        case 'inrw':
      
               $accno='1234567890';
               $accname='Bitwire';
               $ifsccode='QWERTY12345';
        break;
        case 'eurw':
      
            $accno='1234567890';
               $accname='Bitwire';
               $ifsccode='QWERTY12345';
        break;
        case 'usdw':
        $accno='1234567890';
               $accname='Bitwire';
               $ifsccode='QWERTY12345';
        break;
        
        case 'gbpw':
        $accno='1234567890';
               $accname='Bitwire';
               $ifsccode='QWERTY12345';
       
        break;
        
        case 'brlw':
        $accno='1234567890';
               $accname='Bitwire';
               $ifsccode='QWERTY12345';
     
        break;
        
        case 'plnw':
         $accno='1234567890';
               $accname='Bitwire';
               $ifsccode='QWERTY12345';
        break;
        
        case 'cadw':
       
       $accno='1234567890';
               $accname='Bitwire';
               $ifsccode='QWERTY12345';
        break;
        
        case 'tryw':
       $accno='1234567890';
               $accname='Bitwire';
               $ifsccode='QWERTY12345';
        break;
        
        case 'rubw':
      $accno='1234567890';
               $accname='Bitwire';
               $ifsccode='QWERTY12345';
        break;
        
        case 'mxnw':
      $accno='1234567890';
               $accname='Bitwire';
               $ifsccode='QWERTY12345';
         break;
        case 'czkw':
         $accno='1234567890';
               $accname='Bitwire';
               $ifsccode='QWERTY12345';
        break;
        
        case 'ilsw':
         $accno='1234567890';
               $accname='Bitwire';
               $ifsccode='QWERTY12345';
        break;
        
        case 'nzdw':
        $accno='1234567890';
               $accname='Bitwire';
               $ifsccode='QWERTY12345';
        break;
        
        case 'jpyw':
        $accno='1234567890';
               $accname='Bitwire';
               $ifsccode='QWERTY12345';
        break;
        
        case 'sekw':
        $accno='1234567890';
               $accname='Bitwire';
               $ifsccode='QWERTY12345';
        break;
        
        case 'audw':
       $accno='1234567890';
               $accname='Bitwire';
               $ifsccode='QWERTY12345';
        break;
        default :
         $currencyname='inrw';
         $accno='1234567890';
               $accname='Bitwire';
               $ifsccode='QWERTY12345';

    }



}
?>


<form >
<div class="" style="margin-bottom: 48px !important;">
    <div class=" " style="margin-bottom: 48px !important;">
        <div class="row balance-div" style="border-left:none;">
            <div class="col-md-10">
                
                <a class="btn" href="sendget.php?curr=<?php echo base64_encode($currencyname);?>" id="btnsend"><i class="fa fa-sign-out"></i> Send <?= strtoupper($currencyname); ?></a>
                <a class="btn" href="address.php?curr=<?php echo base64_encode($currencyname);?>" id="btnreceived"><i class="fa fa-sign-in"></i> Receive <?= strtoupper($currencyname); ?></a>
                <a class="btn" href="fundstransaction.php?curr=<?php echo base64_encode($currencyname);?>"><i class="fa fa-sign-in"></i> Transactions <?= strtoupper($currencyname); ?></a>
                 <a class="btn" href="deposit.php?curr=<?php echo base64_encode($currencyname);?>"><i class="fa fa-sign-in"></i> Deposit <?= strtoupper(substr($currencyname,0,3));  ?></a>
                 <a class="btn" href="withdraw.php?curr=<?php echo base64_encode($currencyname);?>"><i class="fa fa-sign-in"></i> Withdraw <?= strtoupper(substr($currencyname,0,3));  ?></a>
            </div>

            
        </div>
        <div class="row justify-content-center">
            <div class="col-sm-6 col-md-6 text-center">
                <div class="card text-white bg-success">
                    <div class="card-header text-center">
                        <h3 class="font-custom">Deposit <?= strtoupper(substr($currencyname,0,3)); ?> from your 
                        bank to our <h2> Bank  <h2></h3>
                        
                    </div>
                    Comming Soon....
                    <!-- <div class="card-body text-center bg-white text-success">
                       <p style="color: #343434;"><b>Account Name : </b> <?php echo @$accname;?></p>
                       <p style="color: #343434;"><b>Account No : </b> <?php echo @$accno;?></p>
                       <p style="color: #343434;"><b>IFSC Code : </b> <?php echo @$ifsccode;?></p>
                    </div>
             
                
                    <div class="card-body text-center bg-success text-success">
                    <lable> Enter Refrence Code </lable>
                    </div>
                    <br>
                    <div>
                     <input id="code" name="code" class="form-control form-control-sm" autocomplete="off" type="text" value="">
                    
                     </div>
                     
                     <br>
                     <div>

                        <input type="submit" class="btn btn-info btn-lg" id="code" name="code" value="Send"/>
                    </div> -->
                </div>


            </div>
        </div>
    </div>

</div>
</form>
<?php    include 'footer.php'; ?>
