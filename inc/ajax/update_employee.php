<?php 
// DB connection
    require_once "../../app/db.php";
    require_once "../../app/functions.php";


    // value get
    $id = $_POST['employee_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $old_photo = $_POST['employee_old_img'];

    if (!empty($_FILES['new_photo']['name'])) {
    	$photo_data = fileUp($_FILES['new_photo'], '../../media/students/'); 
    	$photo_name = $photo_data['file_name'];

    	unlink('../../media/students/' . $old_photo);

    }else {
    	$photo_name = $old_photo;
    }

    // sql to select manually a record
	$sql  = "UPDATE students SET name='$name', email='$email', phone='$phone', photo='$photo_name' WHERE id='$id'";

	if ($conn->query($sql) === TRUE) {
        echo '<p class="alert alert-success">Employee updated  successfully...<button class="close" data-dismiss="alert">&times;</button></p>';
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }

	






	$conn->close();


 ?>