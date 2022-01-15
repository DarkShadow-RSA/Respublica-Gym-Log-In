<?php
session_start();
?>

<?php
if($_SESSION["email"]) {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="adminside.css">
    <title>Data</title>
</head>
<body>
<div class="sidenav">
    <div style='text-align: center;'>
        <p id='logo'><img src="logo2.png" alt="Logo"></p>
        <h1>Respublica</h1>
    </div>
    <div class='side_nav_cont'>
    <h2>Customer</h2>
    <a href="Report.php">Reports</a>
    <a href="Data.php" class="active">Data</a>

    <a id='log_out_btn' href="logout.php" class="log_out_btn">
        <span class="glyphicon glyphicon-log-out"></span> Log out
    </a>
    </div>
</div>

<div class="main">
  <h1 class='page_title'>Data</h1>
  <i onclick='openNav_NewUser()' style='font-size:24px' class='fas new_user'>&#xf234; New User</i>

  <div id='searchBar'>
    <input type="text" id="myInput" class="form-control" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
  </div>


  <div class="data" id='ranking'>

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
              <!-- Call to action buttons -->
              <ul class="list-inline m-0">
                  <li class="list-inline-item">
                      <button onclick="openNav(`'.$row['sm_id'].'`)" id="editBtn'.$row['sm_id'].'" class="btn btn-success btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button>
                  </li>
                  <li class="list-inline-item">
                      <button onclick="openNav_DeleteUser(`'.$row['sm_id'].'`)" id="delBtn'.$row['sm_id'].'" class="btn btn-danger btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                  </li>
              </ul>

            </td>
        </tr>';
        
        }
        echo "</table>";
        } else {
            echo "0 results";
        }

        $conn->close();
    ?>
  </div>

<!--Edit User Data-->
<div id="myNav" class="overlay">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <div class="overlay-content">
        <form action="edit.php" method = "POST" class="needs-validation"> 
            <h4 class="modal-title">Edit User</h4>
            <div class="overlay-body">
                <label for="smID">ID:</label><br>
                <input type="text" class="form-control" id="usersm_id" name="usersm_id" value='' readonly="readonly"><br>
                <label for="fname">First name:</label><br>
                <input type="text" class="form-control" id="fname" name="fname" required ><br>
                <label for="lname">Last name:</label><br>
                <input type="text" class="form-control" id="lname" name="lname" required><br><br>
            </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" onclick="closeNav()" value="Cancel">
                    <input type="submit" class="btn btn-info" value="Save">
                </div>           
        </form> 
        </div>
    </div>
</div>

<!--New User Data-->
<div id="new_user_input" class="overlay">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav_NewUser()">&times;</a>
    <div class="overlay-content">
        <form action="newuser.php" method = "POST" class="needs-validation"> 
            <h4 class="modal-title">New User</h4>
            <div class="overlay-body">

                <label for="fname">First name:</label><br>
                <input type="text" class="form-control" id="fname1" name="fname1" required ><br>
                <label for="lname">Last name:</label><br>
                <input type="text" class="form-control" id="lname1" name="lname1" required><br><br>
                <label for="smID">Time:</label><br>
                <input type="text" class="form-control" value='00:00:00' readonly="readonly"><br>
            </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" onclick="closeNav_NewUser()" value="Cancel">
                    <input type="submit" class="btn btn-info" value="Save">
                </div>           
        </form> 
        </div>
    </div>
</div>

<!--Delete User Data-->
<div id="delete_user_input" class="overlay">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav_DeleteUser()">&times;</a>
    <div class="overlay-content">
        <form action="deleteuser.php" method = "POST" class="needs-validation"> 
            <h4 class="modal-title">Delete the User?</h4>
            <h5 class="form_content">You will not be able to recover it.</h5>
            <div class="overlay-body">

            <input type="hidden" class="form-control" id="usersm_id2" name="usersm_id2" value=''><br>
            </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" onclick="closeNav_DeleteUser()" value="Cancel">
                    <input type="submit" class="btn btn-danger" value="Delete">
                </div>           
        </form> 
        </div>
    </div>
</div>




<script>

//search bar
function myFunction() {

// Declare variables 
var input = document.getElementById("myInput");
var filter = input.value.toUpperCase();
var table = document.getElementById("myTable");
var trs = table.tBodies[0].getElementsByTagName("tr");

// Loop through first tbody's rows
for (var i = 0; i < trs.length; i++) {

  // define the row's cells
  var tds = trs[i].getElementsByTagName("td");

  // hide the row
  trs[i].style.display = "none";

  // loop through row cells
  for (var i2 = 0; i2 < tds.length; i2++) {

    // if there's a match
    if (tds[i2].innerHTML.toUpperCase().indexOf(filter) > -1) {

      // show the row
      trs[i].style.display = "";

      // skip to the next row
      continue;

    }
  }
}
}

//New user nav
function openNav_NewUser() {
  document.getElementById("new_user_input").style.height = "100%";
}

function closeNav_NewUser() {
  document.getElementById("new_user_input").style.height = "0%";
}

//Delete user nav
function openNav_DeleteUser(userID) {
  document.getElementById("delete_user_input").style.height = "100%";
  document.getElementById("usersm_id2").value = userID;
}

function closeNav_DeleteUser() {
  document.getElementById("delete_user_input").style.height = "0%";
}

//Edit user nav
function openNav(userID) {
  document.getElementById("myNav").style.height = "100%";
  document.getElementById("usersm_id").value = userID;
}

function closeNav() {
  document.getElementById("myNav").style.height = "0%";
}
</script>
</body>

</html>

<?php
}header("Location: logout.php");
?>

