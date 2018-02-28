$('document').ready(function()
{
    /* validation */
    $("#fpassword-form").validate({
        rules:
        {
            
            user_email: {
                required: true,
                email: true
            },
        },
        messages:
        {
           user_email: "Enter a Valid Email"
     },
        submitHandler: submitForm
    });
    /* validation */

    /* form submit */
    function submitForm()
    {
        var data = $("#fpassword-form").serialize();

        $.ajax({

            type : 'POST',
            url  : 'fpassword.php',
            data : data,
            beforeSend: function()
            {
                $("#errorfpassword").fadeOut();
                $("#btn-fpassword").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; sending ...');
            },
            success :  function(data)
            {
                if(data==0){

                    $("#errorfpassword").fadeIn(1000, function(){


                        $("#errorfpassword").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; Sorry email not exits !</div>');

                        $("#btn-fpassword").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Send');
                        
                    });

                }
                else if(data=="send")
                {

                    $("#btn-fpassword").html('Sending');
                    alert("Successfully Send New Password on your Mail ID"); window.location="landingpage.php";

                }
                else{

                    $("#errorfpassword").fadeIn(1000, function(){

                        $("#errorfpassword").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; Sorry email not exits !</div>');

                        $("#btn-fpassword").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Create Account');
                    });

                }
            }
        });
        return false;
    }
    /* form submit */

});
