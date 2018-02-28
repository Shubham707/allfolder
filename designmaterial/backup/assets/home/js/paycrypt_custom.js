$(document).ready(function(){
  $.validator.addMethod( 'passwordMatch', function(value, element) {

      // The two password inputs
      var password = $("#upassword").val();
      var confirmPassword = $("#ucpassword").val();

      // Check for equality with the password inputs
      if (password != confirmPassword ) {
          return false;
      } else {
          return true;
      }

  }, "Your Passwords Must Match");
  //to check user name alphabetically
  $.validator.addMethod("lettersonly", function(value, element) {
    return this.optional(element) || /^[a-z\s]+$/i.test(value);
  }, "Please enter alphabet");
//Valid emailId
$.validator.addMethod("validEmail", function(value, element) {
return this.optional(element) || /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i.test(value);
}, "Please enter valid email");

  $("#register").validate({
    rules:{
      fname:
      {
        required:true,
        lettersonly:true,
      },
      lname:{
        required:true,
        lettersonly:true,
      },
      uemail:{
        required:true,
        email:true,
        validEmail:true,
      },
      upassword:{
        required:true,
        minlength:8,
      },
      ucpassword:{
        required:true,
        minlength:8,
        passwordMatch:true,
      }
    },
    messages:{
      fname:
      {
        required:"First name is required",
      },
      lname:{
        required:"Last name is required",
      },
      uemail:{
        required:"Email is required",
        email:"Please enter valid email",
      },
      upassword:{
        required:"Password is required",
        minlength:"Password will be minimum 8 character",
      },
      ucpassword:{
        required:"Confirm password is required",
        minlength:"Password will be minimum 8 character",
      }
    },
    submitHandler: function(form) {
      form.submit();
    }
  });
  /*Generate userCaptcha*/
  $("#userCaptcha").on('click',function(){
    var baseUrl=$("#baseUrl").val();
    $.ajax({
      type:"GET",
      url:baseUrl+"userManager/userCaptch",
      dataType:"text",
      success:function(result){
        $("#captchVal").text(result);
      }
    });
  });
  /*Validate User Login*/
  $("#userLogin").validate({
    rules:{
      uemail:{
        required:true,
        email:true,
        validEmail:true
      },
      upassword:{
        required:true,
        minlength:8
      },
      inputcap:{
        required:true,
        minlength:6,
      }
    },
    messages:{
      uemail:{
        required:"Email is required",
        email:"Please enter valid email",
      },
      upassword:{
        required:"Password is required",
        minlength:"Password length will be 8 character in length"
      },
      inputcap:{
        required:"Please enter captcha",
        minlength:"Minimum length of captcha is 6 character in length",
      }
    },
    submitHandler: function(form) {
      form.submit();
    }
  });
  $("#forgetPass").validate({
    rules:{
      uemail:{
        required:true,
        email:true,
        validEmail:true
      }
    },
    messages:{
      uemail:{
        required:"Email is required",
        email:"Please enter valid email",
      }
    },
    submitHandler:function(form){
      form.submit();
    }
  });
});
