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
      url:"/ASIMS/php/forgot.php",
      method:"POST",
      dataType:"text",
      data:{
        forgot:1, 
        emailAddress:emailAddress,
      },
      success: function(response) {
            if(response == "Email send, Check your mail box"){
                Swal.fire(
                'Email send',
                'Please, Check your mail box',
                'success'
                )
            }else if(response == "Sorry, Email has not send"){
                Swal.fire(
                'Reset Code Failed',
                'Sorry, Email has not send',
                'error'
                )
            }else if(response == "Email not found"){
                Swal.fire(
                'Email Not Found',
                'Sorry, Enter valid email address',
                'error'
                )
            }else if(response == "Email not exist"){
                Swal.fire(
                'Email Not Exist',
                'Sorry, Enter valid email address',
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