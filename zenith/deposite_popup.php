<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
.amount{
  margin-left: 31px;
  height: 30px;
  width: 30%;
}
</style>
<!-- send  id011-->
<div id="id011" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
        <div class="w3-center">
            <br>
            <span onclick="document.getElementById('id011').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>Transfer Bitcoin for Trading
        </div><br>
        <form method="post">
            <div class="form-group">
              <label for="usr">BTC Amount:</label>
              <input name="btcdepositammount" class="form-controll amount text-black"  value="" placeholder="BTC Amount" autocomplete="off" onkeypress="return isNumberKey(event)"  type="number" step="0.00000001">
            </div>
            <div class="form-group">
              <label for="pwd">Spending Password: </label>
              <input type="password" class="form-controll text-black" name="btcdeposit"  value="" placeholder="Spending Password">
            </div>
            <div class="form-group">

              <button name="btnbtcdeposit" class="btn btn-success">Deposit</button>
              <div id="error_message"></div>
            </div>
        </form>
        <br> <br> <br>
    </div>
</div>
<!-- close -->
<!-- send id012-->
<div id="id012" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
        <div class="w3-center">
            <br>
            <span onclick="document.getElementById('id012').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>Transfer Bitcoin Cash for Trading
        </div><br>
         <form method="post">
         <div class="form-group">
          <label for="usr">BCH Amount:</label>
          <input name="bccdepositammount" class="form-controll amount text-black"  value="" placeholder="BCH Amount" autocomplete="off" onkeypress="return isNumberKey(event)"  type="number" step="0.00000001">
        </div>
      <div class="form-group">
        <label for="pwd">Spending Password:</label>
        <input type="password" class="form-controll text-black" name="bccdeposit"  value="" placeholder="Spending Password">
      </div>
      <div class="form-group">

        <button name="btnbccdeposit" class="btn btn-success">Deposit</button>
        <div id="error_message"></div>
      </div>
    </form> <br> <br> <br>
    </div>

</div>

<div id="id013" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
        <div class="w3-center">
            <br>
            <span onclick="document.getElementById('id013').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>Transfer GDS for Trading
        </div><br>
         <form  method="post">
         <div class="form-group">
          <label for="usr">GDS Amount:</label>
          <input name="gdsdepositammount" class="form-controll amount text-black"  value="" placeholder="GDS Amount" autocomplete="off" onkeypress="return isNumberKey(event)"  type="number" step="0.00000001">
        </div>
      <div class="form-group">
        <label for="pwd">Spending Password:</label>
       <input type="password" class="form-controll text-black" name="gdsdeposit"  value="" placeholder="Spending Password">
      </div>
      <div class="form-group">

        <button name="btngdsdeposit" class="btn btn-success">Deposit</button>
        <div id="error_message"></div>
      </div>
    </form> <br> <br> <br>
    </div>

</div>

<!-- start 14 -->
<div id="id014" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
        <div class="w3-center">
            <br>
            <span onclick="document.getElementById('id014').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span> Transfer PYY for Trading
        </div><br>
         <form  method="post">
          <div class="form-group">
                <label for="usr">PYY Amount:</label>
                <input name="pyydepositammount" class="form-controll amount text-black"  value="" placeholder="PYY Amount" autocomplete="off" onkeypress="return isNumberKey(event)"  type="number" step="0.00000001">
              </div>
            <div class="form-group">
              <label for="pwd">Spending Password:</label>
             <input type="password" class="form-controll text-black" name="pyydeposit"  value="" placeholder="Spending Password">
            </div>
            <div class="form-group">

       <button name="btnpyydeposit" class="btn btn-success">Deposit</button>
       <div id="error_message"></div>
      </div>
    </form> <br> <br> <br>
    </div>

</div>
<!-- deposite -->
<!-- 15-->
<div id="id015" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
        <div class="w3-center">
            <br>
            <span onclick="document.getElementById('id015').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>Withdraw BTC to Wallet
        </div><br>
        <form method="post">
         <div class="form-group">
                <label for="usr">BTC Amount:</label>
                <input  name="btcwithdrawammount"  class="form-controll amount text-black" value="" placeholder="BTC Amount" autocomplete="off" onkeypress="return isNumberKey(event)"  type="number" step="0.00000001">
              </div>
            <div class="form-group">
              <label for="pwd">Spending Password:</label>
              <input type="password" class="form-controll text-black" name="btcwithdraw"  value="" placeholder="Spending Password">
            </div><br>
            <small style="color:black">&nbsp;&nbsp;Note: A fee of 0.001 BTC will be charged for every withdrawal.</small>

            <div class="form-group">
        <button name="btnbtcwithdraw" class="btn btn-danger">Withdraw</button>
        <div id="error_message"></div>
      </div>
    </form>
     <br> <br> <br>
    </div>
</div>
<!-- 16 -->
<div id="id016" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
        <div class="w3-center">
            <br>
            <span onclick="document.getElementById('id016').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>Withdraw BCH to Wallet
        </div><br>
        <form method="post">
         <div class="form-group">
                <label for="usr">BCH Amount:</label>
               <input  name="bccwithdrawammount" class="form-controll amount text-black" value="" placeholder="BCH Amount" autocomplete="off" onkeypress="return isNumberKey(event)"  type="number" step="0.00000001">
              </div>
            <div class="form-group">
              <label for="pwd">Spending Password:</label>
              <input type="password" class="form-controll text-black" name="bccwithdraw"  value="" placeholder="Spending Password">
            </div>
            <small style="color:black">Note: A fee of 0.001 BCH will be charged for every withdrawal.</small>
            <div class="form-group">

        <button name="btnbccwithdraw" class="btn btn-danger">Withdraw</button>
        <div id="error_message"></div>
      </div>
    </form>
     <br> <br> <br>
    </div>

</div>
<!-- 17 -->
<div id="id017" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
        <div class="w3-center">
            <br>
            <span onclick="document.getElementById('id017').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>Withdraw GDS to Wallet
        </div><br>
        <form method="post">
         <div class="form-group">
                <label for="usr">GDS Amount:</label>
                <input  name="gdswithdrawammount" class="form-controll amount text-black" value="" placeholder="GDS Amount" autocomplete="off" onkeypress="return isNumberKey(event)"  type="number" step="0.00000001">
              </div>
            <div class="form-group">
              <label for="pwd">Spending Password:</label>
              <input type="password" class="form-controll text-black" name="gdswithdraw"  value="" placeholder="Spending Password">
            </div>
            <small style="color:black">&nbsp;&nbsp;Note: A fee of 0.001 GDS will be charged for every withdrawal.</small>
            <div class="form-group">

       <button name="btngdswithdraw" class="btn btn-danger">Withdraw</button>
       <div id="error_message"></div>
      </div>
    </form>
     <br> <br> <br>
    </div>

</div>
<!-- 18 -->
<div id="id018" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
        <div class="w3-center">
            <br>
            <span onclick="document.getElementById('id018').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>Withdraw PYY to Wallet
        </div><br>
        <form method="post">
         <div class="form-group">
                <label for="usr">PYY Amount</label>
                <input  name="pyywithdrawammount" class="form-controll amount text-black" value="" placeholder="PYY Amount" autocomplete="off" onkeypress="return isNumberKey(event)"  type="number" step="0.00000001">
              </div>
            <div class="form-group">
              <label for="pwd">Spending Password:</label>
              <input type="password" class="form-controll text-black" name="pyywithdraw"  value="" placeholder="Spending Password">
            </div>
            <small style="color:black">&nbsp;&nbsp;Note: A fee of 0.001 PYY will be charged for every withdrawal.</small>
            <div class="form-group">
       <button name="btnpyywithdraw" class="btn btn-danger">Withdraw</button>
       <div id="error_message"></div>
      </div>
    </form>
     <br> <br> <br>
    </div>

</div>
