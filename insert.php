
<?php
$hostname = "localhost";
$username = "peter_walnes";
$password = "iunaewrioyunserlkun";
$database = "peter_walnes";

$admin_mail = "rowan@positive-internet.com";

$conn = mysqli_connect($hostname,$username,$password,$database);
		
// Check connection
if($conn === false){
	die("ERROR: Could not connect. "
		. mysqli_connect_error());
}
		
// Taking all values from the form data(input)
$name = $_REQUEST['name'];
$email = $_REQUEST['email'];
$camera = $_REQUEST['camera'];

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

?>

<html lang="en">
  
<head>
    <title></title>
    <link rel="stylesheet" href="https://www.w3schools.com/html/styles.css" type="text/css">
</head>

</html>