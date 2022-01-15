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
    $first_name = $_POST['fname1'];
    $last_name = $_POST['lname1'];

    $sql = "INSERT INTO user (user.first_name, user.last_name) VALUES ('$first_name', '$last_name')";

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}

    $result = $conn->query($sql);

$conn->close();
?>