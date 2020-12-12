<?php 
// DB connection
    require_once "../../app/db.php";
    require_once "../../app/functions.php";


    $sql = "SELECT * FROM students ORDER BY id DESC";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	  // output data of each row
	  $i = 1;
	  while($data = $result->fetch_assoc()) : ?>

	  	<tr>
			<td>
				<span class="custom-checkbox">
					<input type="checkbox" id="checkbox1" name="options[]" value="1">
					<label for="checkbox1"></label>
				</span>
			</td>
			<td><?php echo $i++ .'. '. $data['name']; ?></td>
			<td><?php echo $data['email']; ?></td>
			<td><?php echo $data['phone']; ?></td>
			<td><img  style="width: 70px; height: 70px; object-fit: cover;" class="img-thumbnail img-fluid" src="media/students/<?php echo $data['photo']; ?>" alt=""></td>
			<td>
				<a id="show_single_employee_btn" employee_id="<?php echo $data['id']; ?>" href="#viewEmployeeModal" style="color:red; font-size: 18px;"  class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit"></i> &#x1F441;</a>

				<a id="edit_employee_btn" employee_id="<?php echo $data['id']; ?>" href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>

				<a id="delete_employee_confirm" employee_id="<?php echo $data['id']; ?>"  href="#" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>

				
			</td>
		</tr>

	  <?php endwhile;
	} else {
	  echo "0 results";
	}
	$conn->close();





 ?>