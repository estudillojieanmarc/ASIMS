// FUNCTION TRIGGER     
$(document).ready(function(){
    editAccount();
});
// END FUNCTION TRIGGER 


// FUNCTION FOR FETCH DATA TO THE UPDATE 
    function editAccount(){
        $.ajax({
            url: './fetch/editAccount.php',
            type: 'POST',
            dataType: 'json',
            data: {manageAccount: 1},
        })
        .done(function(response) {
            $('#profilePicture').attr("src","/ASIMS/assets/employees/"+response[0].image)
            $('#fullname').val(response[0].fullname)           
            $('#position').val(response[0].position)           
            $('#email').val(response[0].email_address)           
            $('#username').val(response[0].username)           
            $('#password').val(response[0].password)           
            })
    }
// FUNCTION FOR FETCH DATA TO THE UPDATE 



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



// FUNCTION FOR UPDATING INVENTORY DETAILS
$('#updateButton').click(function(e){
    e.preventDefault();
    Swal.fire({
    title: 'Are you sure?',
    text: "Do you want to update your account?",
    icon: 'question',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, update it!'
    }).then((result) => {
    if (result.isConfirmed) {
        var currentForm = $('#updateAccount')[0];
        var data = new FormData(currentForm);
        $.ajax({
            url: './php/updateAccount.php',
            method: "POST",
            dataType: "text",
            data:data,
            cache: false,
            contentType: false,
            processData: false,
            success:function(response){
                if(response == 'Sorry, the file is too large.'){
                    Swal.fire(
                    'Update Failed',
                    'Sorry the file is too large.',
                    'error'
                    )
                }else if(response == 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.'){
                    Swal.fire(
                    'Update Failed',
                    'Sorry, only JPG, JPEG, PNG & GIF files are allowed.',
                    'error'
                    )
                }else if(response == 1){
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Update Success',
                        text: "Account Has Been Updated",
                        showConfirmButton: false,
                        timer: 1500
                      })
                    identity()
                    editAccount()
                    $('#profilePicture').val('');
                    document.getElementById("profilePicture").value = "";
                }else if(response == 0){
                    Swal.fire(
                    'Update Failed',
                    'Sorry the Medicine details has not updated.',
                    'error'
                    )
                }
            },
        error:function(error){console.log(error)}  }); 
        }
    })
    });
// FUNCTION FOR UPDATING INVENTORY DETAILS





// FUNCTION FOR FETCH EMPLOYEES
function identity(){
    $.ajax({
        url: "./fetch/fetchIdentity.php",
        method: 'POST',
        dataType: 'json',        
        data: {getFullname: 1},
    })
    .done(function(response) {
        $('#fetchFullname').val(response[0].fullname)
        $('#fetchPosition').val(response[0].position)
    })
}
// FUNCTION FOR FETCH EMPLOYEES