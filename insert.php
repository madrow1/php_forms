
		<?php

		$conn = mysqli_connect("localhost", "peter_walnes", "iunaewrioyunserlkun", "peter_walnes");
		
		// Check connection
		if($conn === false){
			die("ERROR: Could not connect. "
				. mysqli_connect_error());
		}
		
		// Taking all values from the form data(input)
		$name = $_REQUEST['name'];
		$email = $_REQUEST['email'];
		
		// Performing insert query execution
		$sql = "INSERT INTO sell_your_camera (name_id,name,email) VALUES (NULL,'$name',
			'$email')";
		
		if(mysqli_query($conn, $sql)){
			echo "<h3>data stored in a database successfully."
				. " Please browse your localhost php my admin"
				. " to view the updated data</h3>";

			echo nl2br("\n$name\n $email");
		} else{
			echo "ERROR: $sql. "
				. mysqli_error($conn);
		}
		
		// Close connection
		mysqli_close($conn);
		?>
