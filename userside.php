<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="userSideStyle.css">
    <title>Dashboard</title>


</head>
<body>
    <!-- The video -->
    <div class="fullscreen-bg">
    <video loop muted autoplay poster="img/videoframe.jpg" class="fullscreen-bg__video">
        <source src="v1.mp4" type="video/mp4">
    </video>
</div>

  <!--Fullscreen Overlay Nav-->
  <div id="myNav" class="overlay">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <div class="overlay-content">
      <h1>About</h1>
      <h2>A personal project to enhance my developing skills and knowledge. The web application tracks user time usage in a gym.</h2>
      <h1>Contact</h1>
      <a href="https://github.com/DarkShadow-RSA" target="_blank">GitHub</a>
    </div>
  </div>

  <!--navbar-->
  <div class="topnav" id="myTopnav">
    <a href="#overlay"><span style="font-size:60px;cursor:pointer" onclick="openNav()">&#9776;</span></a>
    <a href="#home" class="active"><img src="logo.png" alt="Logo" style="margin-left: 40px; margin: 20px;"></a>
  </div>


  <h1 id='heading'>Respublica GYM Users</h1>

  <input type="text" id="myInput" class="form-control" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">

  <!--Table-->
  <?php
    include 'userSideConnectionDB.php'
  ?>

  <button onclick="topFunction()" id="myBtn" title="Go to top">&#10148;</button>

  <form method="post" action="usersideUpdateTime.php" name="form" id="time_submit_form" style="display: none;">
    <input type="text" name="usersm_id" id="usersm_id" value=''/>
    <input type="text" name="time" id="time" value=''/>
  </form>
</body>

<script type="text/javascript" src="userside.js"></script>


        
</html>