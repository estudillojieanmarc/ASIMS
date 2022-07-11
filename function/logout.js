$(document).ready(function(){
    $("#logout").on('click',function(){
        $.ajax({
            type: 'POST',
            url: "./php/logout.php",
            success: function(response){
                if(response == 1){
                    // LOGOUT SUCCESSFULLY
                    Swal.fire({
                    title: 'Logout Successfully',
                    text: "Thank You For Your Work",
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 1500
                    }).then((result) => {
                    if (result) {
                        window.location = "http://localhost/ASIMS/login.html";
                    }
                    })
                }
                else{
                    // LOGOUT FAILED
                    Swal.fire({
                    icon: 'error',
                    title: 'Logout Failed',
                })     
                }
            }
        })
    });
});