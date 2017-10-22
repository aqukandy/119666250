<?php
session_start();
	$servername = "localhost";
	$dbusername = "root";
	$dbpassword = "";
	$dbname = "cosc";
	$username = $_POST['Username'];
	$password = $_POST['Password'];
	$email = $_POST['Email'];
	
	$hashPass = password_hash($password, PASSWORD_DEFAULT, ['cost' => 15]);
	try{
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $dbusername, $dbpassword);

	// set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
    $sql = "INSERT INTO `users`(`Username`, `Password`, `Email`)
			VALUES ('$username','$hashPass','$email')";
    // use exec() because no results are returned
    $conn->exec($sql);
	header("Location: index.php");
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

?>