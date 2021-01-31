<?php
ob_start();
session_start();
require_once 'db_connect.php';

if ( isset($_SESSION['user' ])!="" ) {
 header("Location: home.php");
 exit;
}

$error = false;

if( isset($_POST['btn-login']) ) {

  $email = trim($_POST['email']);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);

  $pass = trim($_POST[ 'pass']);
  $pass = strip_tags($pass);
  $pass = htmlspecialchars($pass);
 
  if(empty($email)){
    $error = true;
    $emailError = "Please enter your email address.";
  } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
    $error = true;
    $emailError = "Please enter valid email address.";
  }

  if (empty($pass)){
    $error = true;
    $passError = "Please enter your password." ;
  }

  if (!$error) {
 
    $password = hash( 'sha256', $pass);

    $res=mysqli_query($conn, "SELECT * FROM users WHERE user_email='$email'" );
    $row=mysqli_fetch_array($res, MYSQLI_ASSOC);
    $count = mysqli_num_rows($res);
 
    if( $count == 1 && $row['user_pass' ]==$password ) {
      if($row["user_status"] == 'admin'){
        $_SESSION["admin"]= $row["user_id"];
        header("Location: admin.php");
      
      }else {
        $_SESSION['user'] = $row['user_id'];
        header( "Location: home.php");
      }
   
    } else {
      $errMSG = "Incorrect Credentials, Try again..." ;
    }
 
  }
}

$resPet = mysqli_query($conn, "SELECT * FROM pets WHERE pet_public = 'yes'");

?>


<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="style.css"> 
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-danger">
    <a class="navbar-brand text-light ml-4" href="index.php"><b>ADOPT-A-PET</b></a>
  </nav>

  <div class="jumbotron jumbotron-fluid b1">
    <div class="container">
    <h1 class="display-4 jc1"><b>ADOPT don't shop!</b></h1>
    </div>
  </div>

  <div class ="container-fluid mx-4">
    <p class="text-danger j2 my-5 "><b>Adopt the Perfect Pet from more than 1'000 animal shelters & rescues</b></p>

      <div class ="row">

        <div class="col-6 b3 rounded-lg mx-2 p-3">
          <h2 class="c1 my-2">Please Log In to see all of our Pets</h2 >

          <form method="post"  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete= "off">
                           
            <?php if ( isset($errMSG) ) {echo  $errMSG; } ?>
                      
            <div class="form-group">
              <label for="exampleInputEmail1">Email address</label>                              
              <input  type="email" name="email"  class="form-control" placeholder= "Your Email" value="<?php echo $email; ?>"  maxlength="40" style="max-width: 25rem" />
                <span class="text-danger"><?php  echo $emailError; ?></span>
            </div>

            <div class="form-group ">
              <label for="exampleInputPassword1">Password</label>
              <input  type="password" name="pass"  class="form-control" placeholder ="Your Password" maxlength="15" style="max-width: 25rem" />
                <span  class="text-danger"><?php  echo $passError; ?></span>
            </div>
                      
            <button  type="submit" name= "btn-login" class="btn btn-danger m-2">Sign In</button>
          </form> 
      </div>

      <div class="col-5 b4 rounded-lg mx-2 p-3">
        <h2 class="c1">Not yet a member?</h2>
        <h4>Register and see all our Pets and their information!</h4>
        <a  href="register.php" class="btn btn-danger my-2">Register Now!</a>    
      </div> 

    </div>
  </div>

    <div class ="container-fluid m-4">
      <h2 class="mt-5 c1">Some of our Rescues that are looking for a new home:</h2>
      <h5 class="text-danger">Want to see more? Register as a Member!</h5>

      <div class="row d-flex justify-content-around">
      <?php
        if($resPet->num_rows > 0) {
          while($row = $resPet->fetch_assoc()) {
            echo "<div class='card col-xs-12 col-sm-6 col-md-6 col-lg-4 col-xl-3 m-1 my-3 p-0' style='width: 30rem;'>
                    <img src='img/".$row['pet_img']."' class='card-img-top' alt='Image of a pet'>
                    <div class='card-body b4'>
                      <h5 class='card-title mb-0 text-danger'>".$row['pet_name']."</h5>
                      <p>" .$row['pet_location']."</p>
                    </div>
                  </div>";
              }

          } else  {
              echo  "<p><center>No Data Avaliable</center></p>";
             }
      ?>
    </div>
  </div>

  <div class="b2 image-fluid m-0 p-0"> </div>

  <footer class="bg-danger d-flex justify-content-between">
    <div class="text-light m-4">Rebecca Schedler - CodeFactory 2020</div>
    <div class="text-light m-4" >
      <a class="navbar-brand text-light m-0 mr-2 p-0" href="index.php"><b>ADOPT-A-PET</b></a> Coderstreet 23 | 1010 Vienna | Austria      
    </div>
  </footer>

</body>
</html>
<?php ob_end_flush(); ?>