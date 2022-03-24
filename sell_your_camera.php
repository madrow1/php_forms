<?php
$hostname = "localhost";
$username = "peter_walnes";
$password = "iunaewrioyunserlkun";
$database = "peter_walnes";

$dbconnect=mysqli_connect($hostname,$username,$password,$database);

if ($dbconnect->connect_error) {
    die("Database connection has failed: " . $dbconnect->connect_error);
}

?>

<!DOCTYPE html>

<html>
<body>

<form action="sell_your_camera.php" method="post">
Name: <input type="text" name="name"><br>
E-mail: <input type="text" name="email"><br>
<input type="submit">
</form>

</body>
</html>