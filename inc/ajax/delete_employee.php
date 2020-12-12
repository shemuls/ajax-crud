<?php 
// DB connection
    require_once "../../app/db.php";
    require_once "../../app/functions.php";



    // value get
    $id = $_POST['id'];

    // sql to delete a record
	$sql = "DELETE FROM students WHERE id='$id'";

	if ($conn->query($sql) === TRUE) {
	  echo '<p class="alert alert-danger">Employee deleted  successfully...<button class="close" data-dismiss="alert">&times;</button></p>';
	} else {
	  echo "Error deleting record: " . $conn->error;
	}

	$conn->close();









 ?>