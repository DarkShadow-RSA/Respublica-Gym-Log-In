<?php
    include_once 'Data.php';

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
    $first_name = $_POST['fname'];
    $last_name = $_POST['lname'];

    $sql = "UPDATE user SET user.first_name = '$first_name', user.last_name  = '$last_name' WHERE user.sm_id = '$sm_id'";

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}

    $result = $conn->query($sql);

$conn->close();
?>