 //FUNCTION FOR LOGIN
    $('#forgotButton').click(function(){
    var emailAddress = $('#emailAddress').val().trim();
    var atpos =  emailAddress.indexOf("@");
    var dotpos =  emailAddress.lastIndexOf(".com");

    if($('#emailAddress').val() ==''){
      Swal.fire(
      'Enter Your Credentials',
      'Please input your email address',
      'warning'
      )
    }else if(atpos < 1 || dotpos < atpos +2 || dotpos + 2 >= emailAddress.length){
        Swal.fire(
        'Invalid Email Address',
        'Please enter valid email address',
        'warning'
        )
    }else{
      $.ajax({
      url:"/ASIMS/php/forgotPassword.php",
      method:"POST",
      dataType:"text",
      data:{
        forgot:1, 
        emailAddress:emailAddress,
      },
      success: function(response) {
            if(response == 1){
                $("#forgotForm").trigger("reset");
                Swal.fire(
                'Email Has Send Successfully',
                'Please, Check your email',
                'success'
                )
            }else if(response == "Sorry, Email has not send"){
                Swal.fire(
                'Reset Code Failed',
                'Sorry, Email has not send',
                'error'
                )
            }else if(response == 2){
                Swal.fire(
                'Wrong Email Address',
                'Enter the email address that you inserted in your account',
                'error'
                )
            }else if(response == 3){
                Swal.fire(
                'Email Not Exist',
                'Sorry, Enter valid email address',
                'error'
                )
            }else if(response == 0){
                Swal.fire(
                'Token Not Update',
                'Sorry, token not update',
                'error'
                )
            }
            },
            error:function(er){
            console.log(er)
            }
            });
        }
    });
 //FUNCTION FOR LOGIN