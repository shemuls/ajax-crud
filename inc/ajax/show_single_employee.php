<?php 
// DB connection
    require_once "../../app/db.php";
    require_once "../../app/functions.php";


    // value get
    $id = $_POST['id'];

    // sql to select manually a record
	$sql  = "SELECT * FROM students WHERE id='$id'";
	$data = $conn -> query($sql);

	$single_employee = $data -> fetch_assoc();

	

	echo json_encode($single_employee
	);









 ?>