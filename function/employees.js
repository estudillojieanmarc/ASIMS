// FUNCTION TRIGGER     
    $(document).ready(function(){
        showEmployees();
        count_pending();
        addButton();
        showInactive();
    });
// END FUNCTION TRIGGER     


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



// ADD EMPLOYEES
    $('#addEmployeeButton').click(function(){
        var addEmail = $('#addEmail').val().trim();
        var atpos =  addEmail.indexOf("@");
        var dotpos =  addEmail.lastIndexOf(".com");

        var currentForm = $('#addEmployeeForm')[0];
        var data = new FormData(currentForm);

        if($('#addFullname').val()=='' || $('#addPosition').val()=='' || $('#addNumber').val()=='' || $('#addEmail').val()=='' || $('#addUsername').val()=='' || $('#addPassword').val()==''){
            Swal.fire(
            'Submit Failed',
            'Please, Input all the missing fields',
            'warning'
            ) 
        }else if(atpos < 1 || dotpos < atpos +2 || dotpos + 2 >= addEmail.length){
            Swal.fire(
                'Invalid Email Address',
                'Please enter valid email address',
                'warning'
            )
        }else{
            $.ajax({
                    url: "./php/newEmployees.php",
                    method: "POST",
                    dataType: "text",
                    data:data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success:function(response){
                        if(response == 1){
                            showEmployees();
                            $("#addEmployeeForm").trigger("reset");
                                Swal.fire({
                                    position:'center',
                                    icon: 'success',
                                    title: 'ADD SUCCESSFULLY',
                                    text: 'NEW EMPLOYEE HAVE ALREADY BEEN STORED',
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                        }else if(response == 'Sorry, The user is already exist'){
                                Swal.fire(
                                'Added Failed',
                                'Sorry, The user is already exist',
                                'error'
                                )
                        }else if(response == 'Sorry, The email is already taken'){
                            Swal.fire(
                            'Added Failed',
                            'Sorry, The email is already taken',
                            'error'
                            )
                        }else if(response == 'Sorry, The username is already taken'){
                            Swal.fire(
                            'Added Failed',
                            'Sorry, The username is already taken',
                            'error'
                            )
                        }else if(response == 'Sorry, The phone is already taken'){
                            Swal.fire(
                            'Added Failed',
                            'Sorry, The phone is already taken',
                            'error'
                            )
                        }
                    },
                    error:function(error){
                        console.log(error)
                    }
                }) 
            }
    })
// END ADD EMPLOYEES


// SHOW EMPLOYEES
    function showEmployees(){
        $.ajax({
            url: "./fetch/fetchEmployees.php",
            method: 'POST',
            data: {getEmployees: 1},
            success : function(data) {
                $("#showEmployees").html(data);
            }
        })
    }
// END SHOW EMPLOYEES


// SHOW EMPLOYEES
    function showInactive(){
        $.ajax({
            url: "./fetch/fetchInactive.php",
            method: 'POST',
            data: {getInactive: 1},
            success : function(data) {
                $("#showInactive").html(data);
            }
        })
    }
// END SHOW EMPLOYEES


// FUNCTION FOR FETCH DATA TO THE UPDATE MODAL 
    function updateEmployees(id){
        $('#updateModal').modal('show')
        $.ajax({
            url: './fetch/editEmployees.php',
            type: 'POST',
            dataType: 'json',
            data: {employeeId: id},
        })
        .done(function(response) {
            $('#UemployeeId').val(response[0].emp_id)           
            $('#Ufullname').val(response[0].fullname)           
            $('#UprofilePicture').attr("src","/ASIMS/assets/employees/"+response[0].image)
            $('#Uposition').val(response[0].position)
            $('#UphoneNumber').val(response[0].PhoneNumber)
            $('#UemailAddress').val(response[0].email_address)
            $('#Uusername').val(response[0].username)
        })
    }
// FUNCTION FOR FETCH DATA TO THE UPDATE MODAL 




// FUNCTION FOR FETCH DATA TO THE VIEW MODAL 
    function viewEmployees(id){
        $('#viewModal').modal('show')
        $.ajax({
            url: './fetch/editEmployees.php',
            type: 'POST',
            dataType: 'json',
            data: {employeeId: id},
        })
        .done(function(response) {
            $('#fullname').html(response[0].fullname)           
            $('#profilePicture').attr("src","/ASIMS/assets/employees/"+response[0].image)
            $('#position').html(response[0].position)
            $('#phoneNumber').html(response[0].PhoneNumber)
            $('#emailAddress').html(response[0].email_address)
        })
    }
// FUNCTION FOR FETCH DATA TO THE VIEW MODAL 




// FUNCTION FOR UPDATING EMPLOYEES DETAILS
    $('#updateButton').click(function(e){

    var UemailAddress = $('#UemailAddress').val().trim();
    var atpos =  UemailAddress.indexOf("@");
    var dotpos =  UemailAddress.lastIndexOf(".com");

    if(atpos < 1 || dotpos < atpos +2 || dotpos + 2 >= UemailAddress.length){
        Swal.fire(
        'Invalid Email Address',
        'Please enter valid email address',
        'warning'
        )
    }else{
    e.preventDefault();
    Swal.fire({
    title: 'Are you sure?',
    text: "Do you want to update this employee?",
    icon: 'question',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, update it!'
    }).then((result) => {
    if (result.isConfirmed) {
        var currentForm = $('#updateForm')[0];
        var data = new FormData(currentForm);
        $.ajax({
            url: './php/updateEmployees.php',
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
                        title: 'Update Success',
                        text: "Employee Details Has Been Updated",
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 1000,
                    }).then((result) => {
                    if (result) {
                        showInactive();
                        showEmployees();
                    }
                    });
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
    }
});
// FUNCTION FOR UPDATING EMPLOYEES DETAILS



// SEARCH FUNCTION
    $(document).ready(function(){
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#showEmployees tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#showInactive tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
// SEARCH FUNCTION





// CREATE EXCEL
    $(document).ready(function(){  
    $('#createExcel').click(function(){  
        Swal.fire({
            title: 'Are you sure?',
            text: "Do you want to export this table to excel?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Export it!'
        }).then((result) => {
            if (result.isConfirmed) {
                var excelData = $('#showEMPLOYEESTable').html();
                window.location = "http://localhost/ASIMS/php/excel.php?data=" +excelData;
                console.log(excelData);
                Swal.fire(
                    'Exported!',
                    'EMPLOYEES Table has been export to excel file',
                    'success'
                )
            }
        })
    });  
    });  
// CREATE EXCEL





// SHOW ADD BUTTON
    function addButton(){
        $.ajax({
            url: "./fetch/fetchEmployees.php",
            method: 'POST',
            data: {getButton: 1},
            success : function(data) {
                $("#addEmployee").html(data);
            }
        })
    }
// END SHOW ADD BUTTON





// DISABLE THE EMPLOYEES
    function inactiveEmployees(id){
        Swal.fire({
        title: 'Are you sure?',
        text: "Do you want to deactivate this employee?",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, deactivate it'
        }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
            url: './php/delete.php',
            type: 'POST',
            dataType: 'json',
            data: {deactivateEmployees: id},
        });
        Swal.fire({
            title: 'Change Status',
            text: "employee was deactivate successfully",
            icon: 'success',
            showConfirmButton: false,
            timer: 1000,
        }).then((result) => {
        if (result) {
            showEmployees();
        }
        });
        }
        });
    }
// DISABLE THE EMPLOYEES






// DELETE THE EMPLOYEES
    function deleteEmployees(id){
        Swal.fire({
        title: 'Are you sure?',
        text: "Do you want to delete this employee?",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it'
        }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
            url: './php/delete.php',
            type: 'POST',
            dataType: 'json',
            data: {deleteEmployees: id},
        });
        Swal.fire({
            title: 'Delete Success',
            text: "employee was delete successfully",
            icon: 'success',
            showConfirmButton: false,
            timer: 1000,
        }).then((result) => {
        if (result) {
            showInactive();
        }
        });
        }
        });
    }
// DELETE THE EMPLOYEES







// ENABLE THE EMPLOYEES
    function activeEmployees(id){
        Swal.fire({
        title: 'Are you sure?',
        text: "Do you want to activate this employee?",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, activate it'
        }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
            url: './php/delete.php',
            type: 'POST',
            dataType: 'json',
            data: {activateEmployees: id},
        });
        Swal.fire({
            title: 'Change Status',
            text: "employee was activate successfully",
            icon: 'success',
            showConfirmButton: false,
            timer: 1000,
        }).then((result) => {
        if (result) {
            showInactive()
        }
        });
        }
        });
    }
// ENABLE THE EMPLOYEES