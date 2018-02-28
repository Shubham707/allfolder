<?php
ob_start();
include 'final_header.php';
?>
<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script type="text/javascript" src="js/city.js"></script>
<style>
* {
  box-sizing: border-box;
}

body {
  background-color: #f1f1f1;
}

#regForm {
 background-color: #ffffff;
 color: #006552 !important;
    margin: 25px auto;
    font-family: Raleway;
    padding: 14px;
    width: 50%;
    min-width: 300px;
        margin-bottom: 72px;
}
.fullwidth{
	width: 99% !important;
}

h2 {
  text-align: center;
  margin: 0 0 0px 0 !important;
  color: #006552;
}

input {
  padding: 10px;
  width: 35%;
  font-size: 15px;
  font-family: Raleway;
  border: 1px solid #aaaaaa;
  color: #006552 !important;
}
.bank input{
	width: 100%;
}
.document input{
	width: 100%;
}
select {
  padding: 7px;
  width: 35%;
  font-size: 17px;
  font-family: Raleway;
  border: 1px solid #aaaaaa;
  color: #006552 !important;
  margin: 3px;
}

/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
  display: none;
}

button {
  background-color: #006552;
  color: #ffffff;
  border: none;
  padding: 10px 20px;
  font-size: 17px;
  font-family: Raleway;
  cursor: pointer;
}
.btunn {
  background-color: #006552;
  color: #ffffff;
  border: none;
  padding: 10px 20px;
  font-size: 17px;
  font-family: Raleway;
  cursor: pointer;
}

button:hover {
  opacity: 0.8;
}

#prevBtn {
  background-color: #bbbbbb;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}
label {
    display: inline-block;
    max-width: 100%;
    margin-bottom: 5px;
    font-weight: 500;
}

.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #4CAF50;
}
.high{ padding: 50px !important; }
label{ color: black; }
</style>
<body>
<div class="success"></div>
<script></script>
<?php //if(){?>
<form id="regForm" action="kyc_submit.php" method="post">
 
  <!-- One "tab" for each step in the form: -->
  <div class="tab contact">
    <div>
     <h2>Basic Information:</h2>
   </div>
    <label>&nbsp;&nbsp;First Name:<em style="color:red">* &nbsp;&nbsp;&nbsp;&nbsp;</em></label><input type="text" placeholder="First name" oninput="this.className = ''" name="firstName">
    <label>&nbsp;&nbsp;Last  Name:<em style="color:red">* &nbsp;&nbsp;</em> </label><input type="text" placeholder="Last name" oninput="this.className = ''" name="lastName"></p>
    <label>&nbsp;&nbsp;Middle Name:<em style="color:red">&nbsp;</em></label><input type="text" placeholder="Middle name" oninput="this.className = ''" name="middleName">
    <label>&nbsp;&nbsp;Address:<em style="color:red">* &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;</em></label><input type="text" placeholder="Address1" oninput="this.className = ''" name="addLine1"></p>
    <label>&nbsp;&nbsp;Address:<em style="color:red"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</em></label><input type="text" placeholder="Address2" oninput="this.className = ''" name="addLine2">
    
      <label>&nbsp;&nbsp;Country:<em style="color:red">* &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;</em></label><select placeholder="Country" id="country" oninput="this.className = ''" name="country">

    </select>
    <label>&nbsp;&nbsp;State:<em style="color:red">* &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</em></label><select id="state" placeholder="State" oninput="this.className = ''" name="state"></select>
    <label>&nbsp;&nbsp;City:<em style="color:red">* &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</em></label><select id="city" placeholder="City" oninput="this.className = ''" name="city">
    </select>
  


    <label>&nbsp;&nbsp;Contact No:<em style="color:red">* &nbsp;&nbsp;</em></label><input type="text" placeholder="Contact No" oninput="this.className = ''" name="mobileNumber">
    <label>&nbsp;&nbsp;Pincode :<em style="color:red">* &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</em></label><input type="text" placeholder="Pincode" oninput="this.className = ''" name="pincode">
    
    <div class="msg "></div></p>
  </div>
  <div class="tab bank">
    <h2 style="fon-size:20px !important; text-align: center !important;">Bank Details:</h2>
  <p><label>&nbsp;&nbsp;Account No :<em style="color:red">* &nbsp;&nbsp;</em></label><input type="text" placeholder="Account No." oninput="this.className = ''" name="bankAccountNumber" ></p>
    <p><label>&nbsp;&nbsp;Account Holder Name :<em style="color:red">* &nbsp;&nbsp;</em></label><input type="text" placeholder="Bank Account Holder Name:" oninput="this.className = ''" name="bankAccountHolderName" ></p>
  <p><label>&nbsp;&nbsp;Bank Name: :<em style="color:red">* &nbsp;&nbsp;</em></label><input type="text" placeholder="Bank Name:" oninput="this.className = ''" name="bankName" ></p>
    <p><label>&nbsp;&nbsp;IFSC Code :<em style="color:red">* &nbsp;&nbsp;</em></label><input type="text" placeholder="IFSC Code: " oninput="this.className = ''" name="IFSCCode" ></p>
  </div>
  <div class="tab document">:
    <p>
    	<label for="upload" >Upload Document</label>
    	input</p>
    	<p><input  class="uploadbox" id="uploadbox" type="file" placeholder="Document Image" oninput="this.className = ''" name="file" >
      <!-- <a href="#"onclick="document.getElementById('id01').style.display='block'" class="btunn w3-button w3-black">Upload Document</a> -->
      </p>
    
    <p><label>&nbsp;&nbsp;Tax Proof Number :<em style="color:red">* &nbsp;&nbsp;</em></label><input type="text" placeholder="Tax Proof Number" oninput="this.className = ''" name="taxProofNumber" ></p>

    <p><label>&nbsp;&nbsp;Select ID Below  :<em style="color:red">* &nbsp;&nbsp;</em></label>
      <select placeholder="Document Image" id="taxProofImage" oninput="this.className = ''" name="addressProofType"  class="fullwidth">
    <option class="fullwidth">Please Select  </option>
   <option class="fullwidth">Driving License </option>
   <option class="fullwidth">Passport  </option>
   <option class="fullwidth"> Aadhar </option>
  </select>

    </p>
    <p><label>&nbsp;&nbsp; Address Proof ID  :<em style="color:red">* &nbsp;&nbsp;</em></label>
      <input id="addressProofNumber" type="text" placeholder="Address Proof Number" oninput="this.className = ''" name="file2"></p>
    <p>
      <label for="upload">Upload User Image</label>
     <input id="addressProofImage" type="file" placeholder="User Images" oninput="this.className = ''" name="file2" onchange="upload_document(this);">
      <!-- <a href="#" style="text-align: left;" onclick="document.getElementById('id02').style.display='block'" class="btunn w3-button w3-black">Upload Image User Profile</a> -->
      <input type="hidden" id="user_id" name="userId" value="<?php echo $_SESSION['user_id'];?>" >
    </p>
  </div>
   <div class="tab">Privacy:
    <p style="color:black;">Term And Condition All Fill:<input style="margin-bottom:30px !important; height: 20px; width: 40px;" class="high" placeholder="Privacy..." oninput="this.className = ''" name="privacy" type="checkbox"></p>
  </div>
  <div style="overflow:auto;">
    <div style="float:right;">
      <button type="button " id="prevBtn" onclick="nextPrev(-1)">Previous</button>
      <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
    </div>
  </div>
  <!-- Circles which indicates the steps of the form: -->
  <div style="text-align:center;margin-top:40px;">
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
  </div>
</form>
<?php // } else { ?>

<?php //}?>
<script>
var currentTab = 0;
showTab(currentTab);

function showTab(n) {
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  fixStepIndicator(n)
}
function nextPrev(n) {
  var x = document.getElementsByClassName("tab");
  if (n == 1 && !validateForm()) return false;
  x[currentTab].style.display = "none";
  currentTab = currentTab + n;
  if (currentTab >= x.length) {
    document.getElementById("regForm").submit();
    return false;
  }
  showTab(currentTab);
}

function validateForm() {

  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  for (i = 0; i < y.length; i++) {
    if (y[i].value == "") {
      y[i].className += " invalid";
      valid = false;
    }

  }
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid;
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  x[n].className += " active";
}


</script>
<script> 
//form Submit 
$("input[name=file]").change(function()
{ 
/*alert($(this).val());*/
URL=$(this).val();
var id =$('#user_id').val();
$.ajax({ 
  url: url_api+'/verification/uploadTaxProofImageImage', 
  type: 'POST', 
  data: { 'userId':'1','taxProofImageName':URL}, 
  "contentType": "application/x-www-form-urlencoded",
  enctype: 'multipart/form-data', 
   success: function (response) 
   { 
   alert('Successfull'); 
   } 
}); 
return false; 
});
 </script>
 <script> 
//form Submit 
$("input[name=file2]").change(function()
{ 
/*alert($(this).val());*/
URL=$(this).val();
//var id = "<?php// $_SESSION['user_id'];?>"; 
$.ajax({ 
  url: url_api+'/verification/uploadAddressProofImage', 
  type: 'POST', 
  data: {'userId':'1','addressProofImage':URL }, 
  "contentType": "application/x-www-form-urlencoded",
  enctype: 'multipart/form-data', 
   success: function (response) 
   { 
   alert('successfull'); 
   } 
}); 
return false; 
});
 </script>
<!-- http://localhost:1338/verification/uploadAddressProofImage -->
<?php
    include 'footer.php';
?>
<script>
  
</script>
</body>
</html>
