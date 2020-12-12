<?php 

    // DB connection
    require_once "../../app/db.php";
    require_once "../../app/functions.php";

    // Value get 
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $photo_data = fileUp($_FILES['photo'], '../../media/students/'); 
    $photo_name = $photo_data['file_name'];

    $sql = "INSERT INTO students (name, email, phone, photo)
    VALUES ('$name', '$email', '$phone', '$photo_name')";
    if ($conn->query($sql) === TRUE) {
        echo '<p class="alert alert-success">Employee added successfully...<button class="close" data-dismiss="alert">&times;</button></p>';
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
      
      $conn->close();




?>