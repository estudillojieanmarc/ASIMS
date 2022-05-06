// FUNCTION FOR PASSWORD ENABLE
    function seePassword() {
        var x = document.getElementById("newPassword");
        var a = document.getElementById("conNewPassword");

        if (x.type === 'password' && a.type === 'password'){
            x.type ="text";
            a.type ="text";
        }else{
            x.type="password";
            a.type="password";
        }
        
    }
// FUNCTION FOR PASSWORD ENABLE



 //FUNCTION FOR RESET PASSWORD
    $('#resetButton').click(function(){
    let newPassword = $('#newPassword').val();
    let conNewPassword = $('#conNewPassword').val();
    if($('#newPassword').val() =='' || $('#conNewPassword').val() ==''){
      Swal.fire(
      'Enter Your Credentials',
      'Please, fill the missing fields',
      'warning'
      )
    }else if($('#email').val() =='' || $('#token').val() ==''){
        window.location.href="http://localhost/ASIMS/forgot.html";
    }else if((newPassword).length < 6){
        Swal.fire(
        'Use Strong Password',
        'Sorry, The password must be greater than 6',
        'warning'
        )
    }else if((newPassword) != (conNewPassword)){
        Swal.fire(
        'Password Mismatch',
        'Sorry, please check your password',
        'warning'
        )
    }else{
        Swal.fire({
            title: 'Are you sure?',
            text: "Do you want to update your password?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, update it!'
            }).then((result) => {
            if (result.isConfirmed) {
                var currentForm = $('#resetForm')[0];
                var data = new FormData(currentForm);
                $.ajax({
                    url:"/ASIMS/php/resetP.php",
                    method:"POST",
                    dataType:"text",
                    data:data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success:function(response){
                        if(response == "Your password has changed"){
                            $("#resetForm").trigger("reset");
                            Swal.fire({
                                title: 'Change Password Successfully',
                                text: "Your password has changed successfully",
                                icon: 'success',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Continue'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href="http://localhost/ASIMS/login.html";
                                }
                            })
                        }else if(response == "Sorry, Your password has not change"){
                            Swal.fire(
                            'Change Password Failed',
                            'Sorry, Your password has not change',
                            'error'
                            )
                        }else if(response == "sorry the token is invalid"){
                            Swal.fire(
                            'Change Password Failed',
                            'Sorry the token is invalid',
                            'error'
                            )
                        }else if(response == "all fields are mandatory"){
                            Swal.fire(
                            'Change Password Failed',
                            'Sorry, All fields are mandatory',
                            'error'
                            )
                        }else if(response == "No token Available"){
                            Swal.fire(
                            'Change Password Failed',
                            'Sorry, No token Available',
                            'error'
                            )
                        }
                    },
                error:function(error){console.log(error)}  }); 
                }
            });
        }
    });
 //FUNCTION FOR RESET PASSWORD