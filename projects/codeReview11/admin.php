<?php
ob_start();
session_start();
require_once 'db_connect.php';

if( !isset($_SESSION['admin' ]) ) {
 header("Location: index.php");
 exit;
}
if(isset($_SESSION["user"])){
  header("Location: home.php");
  exit;
}

$res=mysqli_query($conn, "SELECT * FROM users WHERE user_id=".$_SESSION['admin']);
$userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);

$resPet = mysqli_query($conn, "SELECT * FROM pets");

// $resLocation = mysqli_query($conn, "SELECT * FROM pet_location");

?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin Page</title>
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
        Welcome <b><?php echo $userRow['user_name' ]; ?></b>, you are logged in as Admin!
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

  <div class="container-fluid">
       
    <a href="create.php" class="btn btn-danger m-4 py-2 px-4" role="button">Add Pet</a>
    
    <div class ="container-fluid d-flex justify-content-center my-4">
         
      <table  border="1" cellspacing= "1" cellpadding="4">
        <thead>
            <tr>
              <th>Id</th>
              <th>Name</th>
              <th>Age</th>
              <th>Size</th>
              <th>Description</th>
              <th>Care</th>
              <th>Hobbies</th>
              <th>Location</th>
              <th>Image</th>
              <th>Public</th>
              <th>Avaliable</th> 
            </tr>
        </thead>

        <tbody>
      <?php
       
        if($resPet->num_rows > 0) {
          while($row = $resPet->fetch_assoc()) {
            echo "<tr>
                    <td>" .$row['id']."</td>
                    <td>" .$row['pet_name']."</td>
                    <td>" .$row['pet_age']."</td>
                    <td>" .$row['pet_size']."</td>
                    <td>" .$row['pet_description']."</td>
                    <td>" .$row['pet_care']."</td>
                    <td>" .$row['pet_hobbies']."</td>
                    <td>" .$row['pet_location']."</td>
                    <td><img src='img/".$row['pet_img']." ' style='max-width: 10vw'></td>          
                    <td>" .$row['pet_public']."</td>
                    <td>" .$row['pet_availability']."</td>
                    <td>
                      <a href='update.php?id=" .$row['id']."'><button type='button'>Edit</button></a>
                      <a href='delete.php?id=" .$row['id']."'><button type='button'>Delete</button></a>
                    </td>
                  </tr>";
                 }
          } else  {
              echo  "<tr><td colspan='5'><center>No Data Avaliable</center></td></tr>";
            }
      ?>

        </tbody>
      </table>
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