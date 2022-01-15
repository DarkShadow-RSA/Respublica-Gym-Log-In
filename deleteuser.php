<?php
    include_once 'Data.php';

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "rep_users";

    if(isset($_POST['usersm_id2'])) {
        $sm_id = $_POST['usersm_id2'];

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }

        //Delete data from database
        $sql = "DELETE FROM user WHERE user.sm_id = $sm_id";

        if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
        } else {
        echo "Error updating record: " . $conn->error;
        }

        $result = $conn->query($sql);
    }
    


    $conn->close();
?>