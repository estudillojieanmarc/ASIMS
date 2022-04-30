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
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Continue'
                    }).then((result) => {
                    if (result.isConfirmed) {
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