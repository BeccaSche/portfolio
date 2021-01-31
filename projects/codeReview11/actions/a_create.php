<?php

ob_start();
session_start();

if( !isset($_SESSION['admin' ]) ) {
 header("Location: index.php");
 exit;
}
if(isset($_SESSION["user"])){
  header("Location: home.php");
  exit;
}

require_once '../db_connect.php';

if ($_POST) {
  $pname = $_POST['pet_name'];
  $page = $_POST[ 'pet_age'];
  $psize = $_POST[ 'pet_size'];
  $pdescription = $_POST[ 'pet_description'];
  $pcare = $_POST[ 'pet_care'];
  $phobbies = $_POST[ 'pet_hobbies'];
  $plocation = $_POST[ 'pet_location'];
  $pimg = $_POST[ 'pet_img'];
  $ppublic = $_POST['pet_public'];
  $pavail = $_POST[ 'pet_availability'];
   
  
  $sql = "INSERT INTO pets (pet_name, pet_age, pet_size, pet_description, pet_care, pet_hobbies, pet_location, pet_img, pet_public, pet_availability) VALUES ('$pname', $page,'$psize','$pdescription', '$pcare', '$phobbies', '$plocation', '$pimg', '$ppublic', '$pavail')";
    if($conn->query($sql) === TRUE) {
       echo "<p>New Record Successfully Created</p>" ;
       echo "<a href='../create.php'><button type='button'>Back</button></a>";
        echo "<a href='../admin.php'><button type='button'>Home</button></a>";
   } else  {
       echo "Error " . $sql . ' ' . $conn->connect_error;
   }

   $conn->close();
}

?>