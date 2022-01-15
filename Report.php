
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
    <title>Report</title>
</head>
<body>
<div class="sidenav">
    <div style='text-align: center;'>
        <p id='logo'><img src="logo2.png" alt="Logo"></p>
        <h1>Respublica</h1>
    </div>
    <div class='side_nav_cont'>
    <h2>Customer</h2>
    <a href="Report.php" class="active">Reports</a>
    <a href="Data.php">Data</a>

    <a href="logout.php" class="log_out_btn">
        <span class="glyphicon glyphicon-log-out"></span> Log out
    </a>
    </div>
</div>

<div class="main">
  <h1 class='page_title'>Report</h1>

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

        $sql = "SELECT user.sm_id, user.first_name, user.last_name, user.time
        FROM user
        ORDER BY user.time DESC
        LIMIT 5;";
        $result = $conn->query($sql);

        $rank_inc = 1;
        if ($result->num_rows > 0) {
            // output data of each row
            echo 
                '<table id="myTable" class="styled-table" >
                <thead>
                <tr>
                    <th>Rank</th>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Time</th>
                </tr>
                </thead>';

        while($row = $result->fetch_assoc()){
            echo '
            <tr>
            <td>'.$rank_inc++.'</td>
            <td>'. $row['sm_id'].'</td>
            <td>'. $row['first_name'].'</td>
            <td>'. $row['last_name'].'</td>
            <td id="timer'.$row['sm_id'].'">'. $row['time'].'</td>
        </tr>';

        }
        echo "</table>";
        } else {
            echo "0 results";
        }

        $conn->close();
    ?>
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
</script>

</body>

</html>