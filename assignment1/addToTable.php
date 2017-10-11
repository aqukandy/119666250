<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cosc";

$email = $_POST['Email'];
$user = $_POST['Username'];
$pass = $_POST['Password'];






try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "INSERT INTO `users`(`Email`, `Username`, `Password`)
			VALUES ('$email','$user','$pass')";



    // use exec() because no results are returned
    $conn->exec($sql);
    echo "New record created successfully";
} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}
?>
