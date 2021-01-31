<?php
ob_start();
session_start();
if( isset($_SESSION['user'])!="" ){
 header("Location: home.php" );
}
include_once 'db_connect.php';
$error = false;
if ( isset($_POST['btn-signup']) ) {
 
  $name = trim($_POST['name']);
  $name = strip_tags($name);
  $name = htmlspecialchars($name);

  $email = trim($_POST[ 'email']);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);

  $pass = trim($_POST['pass']);
  $pass = strip_tags($pass);
  $pass = htmlspecialchars($pass);

  if (empty($name)) {
    $error = true ;
    $nameError = "Please enter your full name.";
  } else if (strlen($name) < 3) {
    $error = true;
    $nameError = "Name must have at least 3 characters.";
  } else if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
    $error = true ;
    $nameError = "Name must contain alphabets and space.";
  }

  if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
    $error = true;
    $emailError = "Please enter valid email address." ;
  } else {
    $query = "SELECT user_email FROM users WHERE user_email='$email'";
    $result = mysqli_query($conn, $query);
    $count = mysqli_num_rows($result);
      if($count!=0){
        $error = true;
        $emailError = "Provided Email is already in use.";
      }
  }

  if (empty($pass)){
    $error = true;
    $passError = "Please enter password.";
  } else if(strlen($pass) < 6) {
    $error = true;
    $passError = "Password must have atleast 6 characters." ;
  }

  $password = hash('sha256' , $pass);

  if( !$error ) {
   
    $query = "INSERT INTO users(user_name,user_email,user_pass) VALUES('$name','$email','$password')";
    $res = mysqli_query($conn, $query);
   
    if ($res) {
     $errTyp = "success";
     $errMSG = "Successfully registered, you may login now";
      unset($name);
      unset($email);
      unset($pass);
    } else  {
     $errTyp = "danger";
     $errMSG = "Something went wrong, try again later..." ;
    }
   
  }
}
?>


<!DOCTYPE html>
<html>
<head>
  <title>Login & Registration System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="style.css"> 
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-danger">
    <a class="navbar-brand text-light" href="index.php"><b>ADOPT-A-PET</b></a>
  </nav>

  <div class="jumbotron jumbotron-fluid b1">
    <div class="container">
    <h1 class="display-4 jc1"><b>ADOPT don't shop!</b></h1>
    </div>
  </div>

  <div class="container-fluid m-4 b4 rounded-lg">

    <h2 class="c1 my-3">Register as a Member here:</h2>

    <form method="post"  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"  autocomplete="off" class="mx-5 px-5 py-3" >
                
      <?php
        if ( isset($errMSG) ) {
      ?>
        <div  class="alert alert-<?php echo $errTyp ?>" >
          <?php echo  $errMSG; ?>
        </div>
      <?php
        }
      ?>
         
      <input type ="text"  name="name"  class ="form-control m-3"  placeholder ="Enter Name"  maxlength ="50"   value = "<?php echo $name ?>" />
        <span   class = "text-danger" > <?php   echo  $nameError; ?> </span >
           
      <input   type = "email"   name = "email"   class = "form-control m-3"   placeholder = "Enter Your Email"   maxlength = "40"   value = "<?php echo $email ?>" />
        <span   class = "text-danger" > <?php   echo  $emailError; ?> </span >
                    
      <input   type = "password"   name = "pass"   class = "form-control m-3"   placeholder = "Enter Password"   maxlength = "15" />
        <span   class = "text-danger" > <?php   echo  $passError; ?> </span >
       
      <button   type = "submit"   class = "btn btn-block btn-danger m-3"   name = "btn-signup" >Sign Up</button >
              
    </form > 

  </div>
  <div class="container-fluid m-4 b3 rounded-lg">

    <h2 class="py-4">Log in as a Member <a   href = "index.php" class="text-danger">here</a></h2> 

  </div>

  <div class="b2 image-fluid m-0"> </div>

  <footer class="bg-danger d-flex justify-content-between">
    <div class="text-light m-4">Rebecca Schedler - CodeFactory 2020</div>
    <div class="text-light m-4" >
      <a class="navbar-brand text-light m-0 mr-2 p-0" href="index.php"><b>ADOPT-A-PET</b></a> Coderstreet 23 | 1010 Vienna | Austria      
    </div>
  </footer> 
          
  
</body >
</html >
<?php  ob_end_flush(); ?>