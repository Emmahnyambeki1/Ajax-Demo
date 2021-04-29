<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    echo json_encode(['error' => $conn->connect_error]); 
}

$sql = "INSERT INTO username (username) VALUES ('".$_POST['username']."')";

if ($conn->query($sql) === TRUE) {
echo json_encode(['success'=>'Username saved !!']); 
} else {
echo json_encode(['error'=> 'Username already exists <br><i><b>'.$conn->error.'</b></i>']); 
}

$conn->close();



