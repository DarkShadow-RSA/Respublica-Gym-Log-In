<?php
    include_once 'index.html';

    // Create connection
    $dbServername = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "bookhub";
    
    $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword,$dbName);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    //Add data to table in database
    $title = $_POST['title'];
    $author = $_POST['author'];
    $year = $_POST['year'];
    $price = $_POST['price'];

    $sql ="INSERT INTO books (Title, Author,Year, Price) VALUES ('$title','$author','$year','$price');";

    $result = $conn->query($sql);

// Query with condition
$sql = "SELECT* FROM books
WHERE Year=2007 && Price >=500;";


if($result = mysqli_query($conn, $sql)){
    if($result->num_rows > 0){
        echo "<table id='dbResults'>";
            echo "<tr>";
                echo "<th>Book ID</th>";
                echo "<th>Title</th>";
                echo "<th>Author</th>";
                echo "<th>Year</th>";
                echo "<th>Price</th>";
            echo "</tr>";
        while($row = $result->fetch_assoc()){
            echo "<tr>";
                echo "<td>" . $row['Book_id'] . "</td>";
                echo "<td>" . $row['Title'] . "</td>";
                echo "<td>" . $row['Author'] . "</td>";
                echo "<td>" . $row['Year'] . "</td>";
                echo "<td>" . $row['Price'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";

    } else{
        echo "No records found that were published in 2007 and their price is more than R500";
    }
} else{
    echo "0 results found";
}

$conn->close();
?>
while($row = $result->fetch_assoc()) {
echo "<br> id: ". $row["first_name"]. " - Name: ". $row["last_name"]. " " . $row["sm_id"] . "<br>";
}

<table id="myTable" class="table table-striped" >
    <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>SMID</th>
        <th>Time</th>
        <th>Action</th>
    </tr>
    <tr>
        <td>Alfreds </td>
        <td>Futterkiste</td>
        <td>22826793</td>
        <td id="timer1">00:00:00</td>
        <td>
            <input onclick="clicked('myButton1','timer1')" class="actionBTN" type="button" value="Sign In" id="myButton1">
        </td>
    </tr>
    <tr>
        <td>james </td>
        <td>Futterkiste</td>
        <td>22026003</td>
        <td id="timer2">00:00:00</td>
        <td                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       >
            <input onclick="clicked('myButton2','timer2')" class="actionBTN" type="button" value="Sign In" id="myButton2">
        </td>
    </tr>
    <tr>
        <td>jamey </td>
        <td>Luiz</td>
        <td>22345633</td>
        <td>Signed Out</td>
        <td>
            <input type="button" value="sign In" class="btn btn-success">
        </td>
    </tr>
    <tr>
        <td>jack </td>
        <td>Car</td>
        <td>22054753</td>
        <td>Signed Out</td>
        <td>
            <input type="button" value="sign In" class="btn btn-success">
        </td>
    </tr>
</table>