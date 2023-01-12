<?php

// Connect to the database
$host = "localhost";
$user = "root";
$password = "";
$dbname = "sasakazi";

$response= array();

$conn = mysqli_connect($host, $user, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the form data 
$name = $_POST['name'];
$email = $_POST['email'];

// Insert the data into the database
$sql = "INSERT INTO users (name, email) VALUES ('$name', '$email')";

if (mysqli_query($conn, $sql)) {
    $response['error'] = false;
    $response['message'] = "Added Successfully";
} else {
    $response['error'] = true;
    $response['message'] = "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

?>
