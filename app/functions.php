<?php 

function old($name){
	if(isset($_POST[$name])){
		echo $_POST[$name];
	}else{
		echo "";
	}
	
}
/**
 * file uplode system
 */
function fileUp($file, $location, $format=['png','jpg','gif'])
{


	
	$file_name = $file['name'];
	$file_tmp_name = $file['tmp_name'];
	//without photo upload
if(empty($file_name)){
	$unicname = "defult.png";
	$status = "without";
}else{
	//file extenation
	$file_arr = explode('.', $file_name);
	$ext = strtolower(end($file_arr));

	//unice name
	$unicname = md5(time().rand()).".".$ext;
		


	//send file to folder
	if (in_array($ext,$format)) {

		move_uploaded_file($file_tmp_name,$location.$unicname);
		$status = 'with';
	}else{
		$status = 'Error';
	}
}
	
	return[
		'file_name' => $unicname,
		'status' => $status


	];




}
/**
 * notification function
 */
function notification($text,$type,$mess="Warning!"){
		
		$mess= "
			<div class='bs-example'> 
    		<div class='alert alert-$type alert-dismissible fade show'>
        <strong>$mess</strong> $text
        <button type='button' class='close' data-dismiss='alert'>&times;</button>
    </div>
</div>
    		";
    	return $mess;

}
/**
 * already exsiet value check
 */
function unique($conn,$table,$column,$data){
	$sql = "SELECT $column FROM $table WHERE $column = '$data'";
	$data = $conn -> query($sql);
	$row = $data -> num_rows;
	
	if ($row > 0) {
		return false;
	}else{
		return true;
	}

}
/**
 * passwor match function
 */
function pasMatch($pass_one,$pass_two){
	if ($pass_one == $pass_two) {
		return true;
	}else{
		return false;
	}
}

/**
 * sucess message
 */
function setMsg($mag){
	setcookie('smag',$mag,time()+10);
}
function getMsg(){
	$notificaion="";
	if (isset($_COOKIE['smag'])) {
	$message = $_COOKIE['smag'];
	$notificaion= "
			<div class='bs-example'> 
    		<div class='alert alert-success alert-dismissible fade show'>
        <strong>sucessfuly</strong></br>$message
        <button type='button' class='close' data-dismiss='alert'>&times;</button>
		    </div>
		</div>
    		";
    
	}
	return $notificaion;
	
}