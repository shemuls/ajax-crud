<?php require_once('app/db.php') ?> 
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Bootstrap CRUD Data Table for Database with Modal Form</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="assets/css/style.css">


</head>
<body>
<div class="container">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Manage <b>Employees</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Employee</span></a>
						<a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>						
					</div>
				</div>
			</div>
			<div class="mess-all"></div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>
							<span class="custom-checkbox">
								<input type="checkbox" id="selectAll">
								<label for="selectAll"></label>
							</span>
						</th>
						<th>Name</th>
						<th>Email</th>
						<th>Phone</th>
						<th>Photo</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody id="show_all_employee">
					

				</tbody>
			</table>
			<div class="clearfix">
				<div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
				<ul class="pagination">
					<li class="page-item disabled"><a href="#">Previous</a></li>
					<li class="page-item"><a href="#" class="page-link">1</a></li>
					<li class="page-item"><a href="#" class="page-link">2</a></li>
					<li class="page-item active"><a href="#" class="page-link">3</a></li>
					<li class="page-item"><a href="#" class="page-link">4</a></li>
					<li class="page-item"><a href="#" class="page-link">5</a></li>
					<li class="page-item"><a href="#" class="page-link">Next</a></li>
				</ul>
			</div>
		</div>
	</div>        
</div>
<!-- Add employee modal -->
<div id="addEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form id="add_employee" method="POST" enctype="multipart/form-data">
				<div class="modal-header">						
					<h4 class="modal-title">Add Employee</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<div class="mess"></div>					
					<div class="mess2"></div>					
					<div class="form-group">
						<label>Name</label>
						<input name="name" type="text" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Email</label>
						<input name="email" type="email" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Phone</label>
						<input name="phone" type="text" class="form-control" required>
					</div>				
					<div class="form-group">
						<label>Photo</label>
						<input name="photo" type="file" required>
					</div>	
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-success" value="Add">
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Edit employe modal -->
<div id="editEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form id="update_employee_form" method="POST" enctype="multipart/form-data">
				<div class="modal-header">						
					<h4 class="modal-title">Edit Employee</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
										
					<div class="form-group">
						<label>Name</label>
						<input name="name" type="text" class="form-control" required>
						<!-- employe id with hidden input type -->
						<input name="employee_id" type="hidden">
					</div>
					<div class="form-group">
						<label>Email</label>
						<input name="email" type="email" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Phone</label>
						<input name="phone" type="text" class="form-control" required>
					</div>			
					<div class="form-group">
						<label><img class="img-thumbnail img-fluid" style="with: 130px; height: 130px;object-fit: cover" src="" alt=""></label>
						<input name="new_photo" type="file" >
						<input name="employee_old_img" type="hidden">
					</div>					
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-info" value="Save">
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Delete Modal HTML -->
<div id="deleteEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form>
				<div class="modal-header">						
					<h4 class="modal-title">Delete Employee</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<p>Are you sure you want to delete these Records?</p>
					<p class="text-warning"><small>This action cannot be undone.</small></p>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input id="delete_employee" type="submit" class="btn btn-danger" value="Delete">
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Employee single View Modal HTML -->
<div id="viewEmployeeModal" class="modal fade">
	<div style="max-width: 800px;" class="modal-dialog custom-width-">
		<div class="modal-content">
			<form>
				<div class="modal-header">						
					<h4 class="modal-title">Employee Profile</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<div class="row container d-flex justify-content-center fluid">
			            <div class="col-xl-12 col-md-12">
			                <div class="card user-card-full">
			                    <div class="row m-l-0 m-r-0">
			                        <div class="col-sm-4 bg-c-lite-green user-profile">
			                            <div class="card-block text-center text-white">
			                                <div class="m-b-25 "> <img style="width: 120px; height: 120px; object-fit: cover;" class="single_image_  img-thumbnail img-fluid" src="https://img.icons8.com/bubbles/100/000000/user.png" class="img-radius" alt="User-Profile-Image"> </div>
			                                <h6 class="f-w-600 single_name_">Hembo Tingor</h6>
			                                <p></p> <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
			                            </div>
			                        </div>
			                        <div class="col-sm-8">
			                            <div class="card-block">
			                                <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Information</h6>
			                                <div class="row">
			                                    <div class="col-sm-6">
			                                        <p class="m-b-10 f-w-600">Email</p>
			                                        <h6  class="text-muted f-w-400 single_email_">rntng@gmail.com</h6>
			                                    </div>
			                                    <div class="col-sm-6">
			                                        <p class="m-b-10 f-w-600">Phone</p>
			                                        <h6 class="text-muted f-w-400 single_phone_">98979989898</h6>
			                                    </div>
			                                </div>
			                                <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Projects</h6>
			                                <div class="row">
			                                    <div class="col-sm-6">
			                                        <p class="m-b-10 f-w-600">Recent</p>
			                                        <h6 class="text-muted f-w-400">Sam Disuja</h6>
			                                    </div>
			                                    <div class="col-sm-6">
			                                        <p class="m-b-10 f-w-600">Most Viewed</p>
			                                        <h6 class="text-muted f-w-400">Dinoter husainm</h6>
			                                    </div>
			                                </div>
			                                <ul class="social-link list-unstyled m-t-40 m-b-10">
			                                    <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="facebook" data-abc="true"><i class="mdi mdi-facebook feather icon-facebook facebook" aria-hidden="true"></i></a></li>
			                                    <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="twitter" data-abc="true"><i class="mdi mdi-twitter feather icon-twitter twitter" aria-hidden="true"></i></a></li>
			                                    <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="instagram" data-abc="true"><i class="mdi mdi-instagram feather icon-instagram instagram" aria-hidden="true"></i></a></li>
			                                </ul>
			                            </div>
			                        </div>
			                    </div>
			                </div>
			            </div>
			        </div>
				</div>
			</form>
		</div>
	</div>
</div>



<!-- js file -->

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="assets/js/custom.js"></script>

</body>
</html>