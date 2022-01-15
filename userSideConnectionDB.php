<?php
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

$sql = "SELECT user.first_name, user.last_name, user.sm_id, user.time
FROM user";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    echo 
          '<table id="myTable" class="styled-table" >
          <thead>
          <tr>
              <th>ID</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Time</th>
              <th>Action</th>
          </tr>
          </thead>';

while($row = $result->fetch_assoc()){
    echo '
    <tr>
    <td>'. $row['sm_id'].'</td>
    <td>'. $row['first_name'].'</td>
    <td>'. $row['last_name'].'</td>
    <td id="timer'.$row['sm_id'].'">'. $row['time'].'</td>
    <td>
        <input onclick="clicked(`myButton'.$row['sm_id'].'`,`timer'.$row['sm_id'].'`)" class="btn-in actionBTN" type="button" value="Sign In" id="myButton'.$row['sm_id'].'">
    </td>
</tr>';

}
echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>