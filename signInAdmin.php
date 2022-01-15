<?php
    session_start();
    $message="";
    if(count($_POST)>0) {
        include_once "connectionadmin.php";
        $result = mysqli_query($conn,"SELECT * FROM admin WHERE email='" . $_POST["email"] . "' and password = '". $_POST["password"]."'");
        $row  = mysqli_fetch_array($result);
        if(is_array($row)) {
        $_SESSION["email"] = $row['email'];
        } else {
         $message = "Invalid Username or Password!";
        }
    }
    if(isset($_SESSION["email"])) {
    header("Location:Data.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="LoginStyle.css">
    <title>Log In</title>
    <style></style>
</head>
<body>


    <!--form-->
    <div class="container">

        <form action="" method="post" class="needs-validation">
        <div class='form_head'>
            <!--logo-->
            <img class='logo' src="logo.png" alt="Logo">
    
            <h1 class='login-title'>ADMIN PANEL</h1>
        </div>
                <!--Email-->
                    <label for="email"><strong>Email: </strong> </label>
                    <div class="input-group">
                         <input type="email" name="email" id="" class="form-control" required>
                         <div class="input-group-append">
                             <span class="input-group-text">@example.com</span>
                         </div>
                    </div>
                    <div class="invalid-feedback">Please fill out this field</div>
                <!--password-->
                    <label for="password"><strong>Password: </strong></label>
                    <div class="input-group">
                        <input type="password" name="password" class="form-control" required>
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <i class="material-icons">&#xe897;</i>
                            </span>
                        </div>
                    </div>
                    <div class="invalid-feedback">Please fill out this field</div>
                <!--submit button-->
                <button type="submit" class="btn btn-primary btn-block">Submit</button>
        </form>
    </div>

</body>
</html>