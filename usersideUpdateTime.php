<?php
include_once 'userside.php';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rep_users";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

//Add data to table in database
$sm_id = $_POST['usersm_id'];
$time = $_POST['time'];

$sql = "UPDATE user SET user.time = '$time' WHERE user.sm_id = '$sm_id'";
$result = $conn->query($sql);



$conn->close();
?>