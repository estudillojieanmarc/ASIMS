// FUNCTION TRIGGER     
    $(document).ready(function(){
        showTask();
        count_pending();
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



// ADD TASK
    $(document).ready(function(){
    $("#newTask").on('click',function(){
        var currentForm = $('#newTaskForm')[0];
        var data = new FormData(currentForm);
        if($('#task').val()==''){
            Swal.fire(
                'Submit Failed',
                'Please, Input a task',
                'warning'
                )
        }else{
                $.ajax({
                        url: "./php/newTask.php",
                        method: "POST",
                        dataType: "text",
                        data:data,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success:function(response){
                            if(response == '1'){
                                showTask();
                                count_pending();
                                $("#newTaskForm").trigger("reset");
                                Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'NEW TASK HAS BEEN SUBMIT',
                                showConfirmButton: false,
                                timer: 1500
                                })
                            }
                            else{
                                Swal.fire(
                                    'Submit Failed',
                                    'The task has not been submit',
                                    'warning'
                                    )
                            }
                        },
                        error:function(error){
                            console.log(error)
                        }
                    }) 
                }
        })
    })
// END ADD TASK





// SHOW TASK
function showTask(){
    $.ajax({
        url: "./fetch/fetchAllTask.php",
        method: 'POST',
        data: {getTask: 1},
        success : function(data) {
            $("#showTask").html(data);
        }
    })
}
// SHOW TASK






// DELETE TASK 
    function deleteTask(id){
    Swal.fire({
        title: 'Are you sure?',
        text: "Do you want to end this task?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, End It'
        }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
            url: './php/delete.php',
            type: 'POST',
            dataType: 'json',
            data: {deleteTask: id},
        });
        Swal.fire({
            title: 'Task Done',
            text: "Great Job Employees!",
            icon: 'success',
            showCancelButton: false,
            showConfirmButton: false,
            timer: 1500
        }).then((result) => {
        if (result) {
            showTask();        
            count_pending();
        }
        });
        }
        });
    }
// DELETE TASK 









// FUNCTION FOR FETCH DATA TO THE UPDATE MODAL 
    function editTask(id){
        $('#updateTaskModal').modal('show')
        $.ajax({
            url: './fetch/fetchTask.php',
            type: 'POST',
            dataType: 'json',
            data: {taskId: id},
        })
        .done(function(response) {
            $('#updateTaskId').val(response[0].id)
            $('#updateTask').val(response[0].task)
            })
    }
// FUNCTION FOR FETCH DATA TO THE UPDATE MODAL 








// FUNCTION FOR UPDATING TASK 
    $('#updateTaskBtn').click(function(e){
    e.preventDefault();
    Swal.fire({
    title: 'Are you sure?',
    text: "Do you want to update this item?",
    icon: 'question',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, update it!'
    }).then((result) => {
    if (result.isConfirmed) {
        var currentForm = $('#updateTaskForm')[0];
        var data = new FormData(currentForm);
        $.ajax({
            url: './php/updateTask.php',
            method: "POST",
            dataType: "text",
            data:data,
            cache: false,
            contentType: false,
            processData: false,
            success:function(response){
                if(response == 0){
                    Swal.fire(
                    'Update Failed',
                    'Sorry the task is not updated.',
                    'error'
                    )
                }else if(response == 1){
                    editTask();
                    showTask();                    
                    Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'TASK HAS BEEN UPDATED',
                    showConfirmButton: false,
                    timer: 1500
                    })
                }
            },
        error:function(error){console.log(error)}  }); 
        }
    })
    });
// FUNCTION FOR UPDATING TASK 











