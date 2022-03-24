<?php
#Database logic. To connect the PHP script to a database instance. 
$hostname = "localhost";
$username = "peter_walnes";
$password = "iunaewrioyunserlkun";
$database = "peter_walnes";


$name = $_GET['name'];
$email = $_GET['email'];
#Takes the above variables and uses the mysqli_connect() funtion to connect to a database.
$dbconnect=mysqli_connect($hostname,$username,$password,$database);

#On failure to connect this will cause the script to return the error.
if ($dbconnect->connect_error) {
    die("Database connection has failed: " . $dbconnect->connect_error);
}

#Query to insert data from the HTML form into a table in the database.
$sql = "INSERT INTO 'sell_your_camera' ('name_id','name', 'email') VALUES (?,?,?)";

$stmt = $dbconnect->prepare($sql);

$stmt->bind_param("0", $_POST['name'], $_POST['email']);

$stmt->execute();

