<?php

include 'db_config.php';

$admin_mail = "rowan@positive-internet.com";

$conn = mysqli_connect($hostname,$username,$password,$database);
		
// Check connection
if($conn === false){
	die("ERROR: Could not connect. "
		. mysqli_connect_error());
}
		
// Taking all values from the form data(input)
$name = $_POST['name'];
$email = $_POST['email'];
$camera = $_POST['camera'];

// Santitize name
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$inputs['name'] = $name;

if ($name) {
	$name = trim($name);
	if ($name === '') {  
		$errors['name'] = NAME_REQUIRED;
	}
	} else {
		$errors['name'] = NAME_REQUIRED;
}

// Santitize email 
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$inputs['email'] = $email;

if ($email) {
	$email = filter_var($email, FILTER_VALIDATE_EMAIL);
	if ($email === false) {  
		$errors['email'] = EMAIL_INVALID;
	}
	} else {
		$errors['email'] = CAMERA_REQUIRED;
}

// Santitize camera
$camera = filter_input(INPUT_POST, 'camera', FILTER_SANITIZE_STRING);
$inputs['camera'] = $camera;

if ($camera) {
	$camera = trim($camera);
	if ($camera === '') {  
		$errors['camera'] = CAMERA_REQUIRED;
	}
	} else {
		$errors['camera'] = CAMERA_REQUIRED;
}

if (count($errors) === 0 ) {

// Performing insert query execution
$sql = "INSERT INTO sell_your_camera (name_id,name,email,camera) VALUES (NULL,'$name',
	'$email','$camera')";
		
if(mysqli_query($conn, $sql)){
	echo nl2br("Thank you $name, we have registered your interest and will be in contact");
} else{
	echo "ERROR: $sql. "
		. mysqli_error($conn);
}
		
// Close connection
mysqli_close($conn);

mail($admin_mail, 'Peterwalnes.com', 'Thank you for registering with us');

} else { 
	die;
}


?>

<html lang="en">
  
<head>
    <title></title>
    <link rel="stylesheet" href="styles.css" type="text/css">
</head>

</html>