 //FUNCTION FOR LOGIN
    $('#loginButton').click(function(){
    var username = $('#username').val().trim();
    var password = $('#password').val().trim();
    if($('#username').val() =='' || $('#password').val() == ''){
      Swal.fire(
      'Enter your credentials',
      'Please input all missing Fields',
      'warning'
      )        
      }else{
      $.ajax({
      url:"/ASIMS/php/emplogin.php",
      method:"POST",
      dataType:"text",
      data:{
        login:1, 
        username:username,
        password:password
      },
      success: function(response) {
            if(response == 1){
            $('#loginForm').trigger("reset");
            Swal.fire({
            title: 'Login Successfully',
            text: 'Welcome To A&S Motor Parts',
            icon: 'success',
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Continue'
            }).then((result) => {
              if (result.isConfirmed) {
                window.location = "/ASIMS/dashboard.php";
              }
            })
            }else if(response == 0){
            Swal.fire(
            'Sorry Login Failed',
            'Wrong Username/Password',
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

// FUNCTION FOR PASSWORD ENABLE
      function seePassword() {
        var x = document.getElementById("password");
        if (x.type==='password'){
            x.type ="text";
            y.style.display="block";
            z.style.display="none";
        }else{
            x.type="password";
            y.style.display="none"
            z.style.display="block";
        }
      }
// FUNCTION FOR PASSWORD ENABLE
