 
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
              window.location = "/ASIMS/verification.php";
            }else if(response == 0){
            Swal.fire(
            'Sorry Login Failed',
            'Wrong Username/Password',
            'error'
            )
            }else if(response == 2){
              Swal.fire(
              'Inactive Account',
              'Your account is disable to access the A&S Application',
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
