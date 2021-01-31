<?php
ob_start();
session_start();
require_once 'db_connect.php';

if( !isset($_SESSION['user' ]) ) {
 header("Location: index.php");
 exit;
}

$res=mysqli_query($conn, "SELECT * FROM users WHERE user_id=".$_SESSION['user']);
$userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);

$resPet = mysqli_query($conn, "SELECT * FROM pets WHERE pet_age > 8");
?>

<!DOCTYPE html>
<html>
<head>
  <title>User Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="style.css">
  
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-danger">
    <a class="navbar-brand text-light" href="index.php"><b>ADOPT-A-PET</b></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarNav">
        <div class="ml-5 text-light">
          Welcome <b><?php echo $userRow['user_name' ]; ?></b> you are logged in as a member!
        </div>
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link mr-5 text-light" href="logout.php?logout"><b>Sign Out</b></a>
          </li>
        </ul>
      </div>
  </nav>

  <div class="jumbotron jumbotron-fluid b1a">
    <div class="container">
    <h1 class="display-4 jc1"><b>ADOPT don't shop!</b></h1>
    </div>
  </div>

  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link text-danger" href="home.php">All Pets</a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-danger" href="general.php">Big and Small</a>
    </li>
    <li class="nav-item">
      <a class="nav-link active text-danger" href="seniors.php"><b>Seniors</b></a>
    </li>
  </ul>
 
  <div class ="container-fluid d-flex justify-content-center my-4">
    
    <div class="row d-flex justify-content-around">
      
    <?php

      if($resPet->num_rows > 0) {
        while($row = $resPet->fetch_assoc()) {
          echo "<div class='card mb-3 b4' style='max-width: 540px;'>
                  <div class='row no-gutters'>
                    <div class='col-md-4'>
                      <img src='img/".$row['pet_img']."' class='card-img' alt='Pet image'>
                    </div>
                    <div class='col-md-8'>
                      <div class='card-body'>
                        <h4 class='card-title text-danger mb-0'>".$row['pet_name']."</h4>
                        <div class='mb-2'><small><b>Age:</b> " .$row['pet_age']." years </small></div>
                        <p class='card-text'>
                          " .$row['pet_description']."<br>
                          <b>Attention! </b>" .$row['pet_care']."<br>
                          <b>Hobbies: </b>" .$row['pet_hobbies']."<br>
                          <b>Location: </b>" .$row['pet_location']."<br>
                        </p> 
                      </div>
                    </div>
                  </div>
                </div>";
 
            }

        } else  {
            echo  "<p><center>No Data Avaliable</center></p>";
           }
    ?>

    </div>
  </div>
  <div class="b2 image-fluid m-0"> </div>

  <footer class="bg-danger d-flex justify-content-between">
    <div class="text-light m-4">Rebecca Schedler - CodeFactory 2020</div>
    <div class="text-light m-4" >
      <a class="navbar-brand text-light m-0 mr-2 p-0" href="index.php"><b>ADOPT-A-PET</b></a> Coderstreet 23 | 1010 Vienna | Austria      
    </div>
  </footer> 
       
</body>
</html>
<?php ob_end_flush(); ?>