


// FUNCTION FOR ADDING QTY IN TODO BADGE
function count_pending(){
    $.ajax({
        url: "./fetch/taskBadge.php",
        method : "POST",
        data : {count_pending:1},
        success : function(data){
            $("#todoQty").html(data);
        }
    })
    }
// FUNCTION FOR ADDING QTY IN TODO BADGE




// ADD CATEGORY
$('#codeSubmit').click(function(event){
    var userCode = localStorage.getItem('code');
    event.preventDefault();
    var currentForm = $('#codeForm')[0];
    var data = new FormData(currentForm);
    if($('#userCode').val() == '' ){
            Swal.fire(
            'Submit Failed',
            'Please, Enter the verification code',
            'warning'
            )
            }else{
                if(userCode === $('#userCode').val()){
                    $('#userCode').trigger("reset");
                    Swal.fire({
                    title: 'Login Successfully',
                    text: 'Welcome To A&S Motor Parts',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 1500
                    }).then((result) => {
                      if (result) {
                        window.location = "/ASIMS/dashboard.php";
                      }
                    })
                }else{
                    Swal.fire(
                        'Invalid Verification Code!',
                        'Please Try Again',
                        'error'
                      )
                }
            }
})
// END ADD CATEGORY