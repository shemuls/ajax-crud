(function($){
	$(document).ready(function(){

            // Activate tooltip
        $('[data-toggle="tooltip"]').tooltip();
        
        // Select/Deselect checkboxes
        var checkbox = $('table tbody input[type="checkbox"]');
        $("#selectAll").click(function(){
            if(this.checked){
                checkbox.each(function(){
                    this.checked = true;                        
                });
            } else{
                checkbox.each(function(){
                    this.checked = false;                        
                });
            } 
        });
        checkbox.click(function(){
            if(!this.checked){
                $("#selectAll").prop("checked", false);
            }
        });

        // $('#addEmployeeModalBtn').click(function(){
        //     $('#add_employee').modal();
        // });


        // add_employee modal input data get
        $('form#add_employee').submit(function(e){
            e.preventDefault();
            
            let name    = $('input[name="name"]').val();
            let email    = $('input[name="email"]').val();
            let phone    = $('input[name="phone"]').val();
            let photo    = $('input[name="photo"]').val();
            
            if (name == '' || email == '' || phone == '') {
                $('.mess').html('<p class="alert alert-danger">All fields are required <button class="close" data-dismiss="alert">&times;</button></p>');
            }else{
                $.ajax({
                    url     : 'inc/ajax/add_employee.php',
                    data    : new FormData(this),
                    method  : 'POST',
                    contentType: false,
                    processData: false,
                    success : function(data){
                       $('form#add_employee')[0].reset();
                        $('#addEmployeeModal').modal('hide');
                        $('.mess-all').html(data);
                        allEmployeeDataShowing();
                    }

                });
            }
        
        });

        // showing employee data in table
        function allEmployeeDataShowing(){
            $.ajax({
                url     : 'inc/ajax/show_all_employee.php',
                success : function(data){
                   $('tbody#show_all_employee').html(data);
                   console.log(data);
                }

            });
        }
        allEmployeeDataShowing();

        // delete_employee
        $(document).on('click', 'a#delete_employee_confirm', function(){
          
            let delete_id = $(this).attr('employee_id');
            let conf = confirm('Are you sure you want to delete these Records?');
            if ( conf == true ) {
                $.ajax({
                    url     : 'inc/ajax/delete_employee.php',
                    data    : { id : delete_id },
                    method  : 'POST',
                    success : function(data){
                       $('.mess-all').html(data);
                            allEmployeeDataShowing();
                    }

                });
            }
            
        });

        // show single employee data
        $(document).on('click', 'a#show_single_employee_btn', function(){
            let show_id = $(this).attr('employee_id');

            $.ajax({
                url     : 'inc/ajax/show_single_employee.php',
                data    : { id : show_id },
                method  : 'POST',
                success : function(data){
                    let  show_data = JSON.parse(data);
                    $('#viewEmployeeModal .single_name_').text(show_data.name);
                    $('#viewEmployeeModal img.single_image_').attr('src', 'media/students/'+ show_data.photo);
                    $('#viewEmployeeModal .single_email_').text(show_data.email);
                    $('#viewEmployeeModal .single_phone_').text(show_data.phone);
                },
            });
        });

        // edit single employee data
        $(document).on('click', 'a#edit_employee_btn', function(){
            let edit_id = $(this).attr('employee_id');
            
            $.ajax({
                url     : 'inc/ajax/edit_employee.php',
                data    : { id : edit_id },
                method  : 'POST',
                success : function(data){
                    let edit_data = JSON.parse(data);
                    $('#editEmployeeModal input[name="name"]').val(edit_data.name);
                    $('#editEmployeeModal input[name="email"]').val(edit_data.email);
                    $('#editEmployeeModal input[name="phone"]').val(edit_data.phone);
                    $('#editEmployeeModal input[name="employee_id"]').val(edit_data.id);
                    $('#editEmployeeModal input[name="employee_old_img"]').val(edit_data.photo);
                    $('#editEmployeeModal img').attr('src','media/students/' + edit_data.photo);
                }
            });


        });

        // update_employee_form  submit
        $(document).on('submit', 'form#update_employee_form', function(e){
            e.preventDefault();

            
            $.ajax({
                url     : 'inc/ajax/update_employee.php',
                data    : new FormData(this),
                method  : 'POST',
                contentType: false,
                processData: false,
                method  : 'POST',
                success : function(data){
                    $('form#update_employee_form')[0].reset();
                    $('#editEmployeeModal').modal('hide');
                    $('.mess-all').html(data);
                    allEmployeeDataShowing();
                }
            });
            


        });









            




    });
})(jQuery)
