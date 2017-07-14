<title>Add</title>
<h1>Arduino Smart Metering</h1>
<?php
	$servername = "localhost:3306";
	$username = " id1863335_root";
	$password = "abhishek";
	$led="";
	$conn = new mysqli($servername, $username, $password);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	echo '<h2>Connected successfully</h2><br>';
	if($_GET)
	{
		$led=$_GET['led'];
		$sql = "INSERT INTO id1863335_arduino.control (led) VALUES ('$led')";
		if ($conn->query($sql) === TRUE) 
		{
			echo "Data Inserted into  Database Sucessfully";
		}
		else
		{
			echo "Error: " . $sql . "<br>" . $conn->error;
	
		}	
	}
	else
	{
		echo '<h3>Parameter Missing</h3>';
	}
	$conn->close();
?>