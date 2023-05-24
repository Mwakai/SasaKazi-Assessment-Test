<?php

// Connect to the database
$host = "localhost";
$user = "root";
$password = "";
$dbname = "sasakazi";

$conn = mysqli_connect($host, $user, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$stmt = $conn->prepare("SELECT * FROM `users` WHERE 1");
 
//executing the query 
$stmt->execute();

//binding results to the query 
$stmt->bind_result($id, $name, $email);
$result = $stmt->execute();


if($result == TRUE){
    // if we get the response then we are displaying it below.
    $response['error'] = false;
    $response['message'] = "Retrieval Successful!";
    
    $stmt->store_result();
    // on below line we are passing parameters which we want to get.
    $stmt->bind_result($id,$name,$email);
    // on below line we are fetching the data.
    $stmt->fetch();
    // after getting all data we are passing this data in our array.
    $response['id'] = $id;
    $response['name'] = $name;
    $response['email'] = $email;
} else{
    // if the id entered by user does not exist then
    // we are displaying the error message
    $response['error'] = true;
    $response['message'] = "Incorrect id";
}

echo json_encode($response);

?>
