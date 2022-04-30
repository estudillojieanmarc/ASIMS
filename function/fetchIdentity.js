// FUNCTION TRIGGER     
    $(document).ready(function(){
        identity();
    });
// END FUNCTION TRIGGER 


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