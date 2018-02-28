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
  margin: 100px auto;
  font-family: Raleway;
  padding: 40px;
  width: 40%;
  min-width: 300px;
}

h1 {
  text-align: center;  
}

input {
  padding: 10px;
  width: 100%;
  font-size: 17px;
  font-family: Raleway;
  border: 1px solid #aaaaaa;
}
select {
  padding: 10px;
  width: 100%;
  font-size: 17px;
  font-family: Raleway;
  border: 1px solid #aaaaaa;
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
  background-color: #4CAF50;
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

.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #4CAF50;
}
.high{ padding: 50px !important; }
</style>
<body>

<form id="regForm" action="lib/user_verified.php">
  <h1>Basic Information:</h1>
  <!-- One "tab" for each step in the form: -->
  <div class="tab">
    <p><input type="text" placeholder="First name" oninput="this.className = ''" name="fname"></p>
    <p><input type="text" placeholder="Last name" oninput="this.className = ''" name="lname"></p>
    <p><input type="text" placeholder="Middle name" oninput="this.className = ''" name="middle_name"></p>
    <p><input type="text" placeholder="Address1" oninput="this.className = ''" name="address1"></p>
    <p><input type="text" placeholder="Address2" oninput="this.className = ''" name="address2"></p>
    <p>
      <select placeholder="Country" id="country" oninput="this.className = ''" name="country">
      
    </select></p>
    <p><select id="state" placeholder="State" oninput="this.className = ''" name="state"></select></p>
    <p><select id="city" placeholder="City" oninput="this.className = ''" name="city">
    </select>
  </p>
    
    
    <p><input type="text" placeholder="Contact No" oninput="this.className = ''" name="phone"></p>
    <p><input type="email" placeholder="Email" oninput="this.className = ''" name="email"></p>
    <p><input type="text" placeholder="Pincode" oninput="this.className = ''" name="pincode"></p>
    <p><div class="msg"></div></p>
  </div>
  <div class="tab">Bank Details:
  <p><input type="text" placeholder="Account No." oninput="this.className = ''" name="account_no"></p>
    <p><input type="text" placeholder="Tax Id:" oninput="this.className = ''" name="tax_id"></p>
    <p><input type="text" placeholder="IFSC Code: " oninput="this.className = ''" name="ifsc_code"></p>
  </div>
  <div class="tab">:
    <p>
    	<label for="upload">Upload Document</label>
    	input
    	<input type="file" placeholder="Photo" oninput="this.className = ''" name="photo">
    </p>
    <p><input type="text" placeholder="Tax Proof Number" oninput="this.className = ''" name="proof_no"></p>
    
    <p><select placeholder="Document Image" oninput="this.className = ''" name="document_id">
    <option>Please Select  </option>
   <option>Driving License </option>
   <option>Passport  </option>
   <option>Aadhar </option></select>

    </p>
    <p>
      <label for="upload">Upload Document</label>
      input
      <input type="file" placeholder="Documnet Images" oninput="this.className = ''" name="documnet">
    </p>
  </div>
   <div class="tab">Privacy:
    <p>Term And Condition All Fill:<input style="margin-bottom:30px !important; height: 20px; width: 40px;" class="high" placeholder="Privacy..." oninput="this.className = ''" name="privacy" type="checkbox"></p>
  </div>
  <div style="overflow:auto;">
    <div style="float:right;">
      <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
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

<script>
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the crurrent tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
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
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("regForm").submit();
   
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {

      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }

  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}
</script>
<!-- <script type="text/javascript" src="js/country.js"></script>
<script language="javascript">
    populateCountries("country", "state");
    populateCountries("country2");
</script> -->

</body>
</html>

