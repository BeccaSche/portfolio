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

if($_POST) {
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

  $id = $_POST['id'];

  $sql = "UPDATE pets SET pet_name = '$pname', pet_age = '$page', pet_size = '$psize', pet_description = '$pdescription', pet_care = '$pcare', pet_hobbies = '$phobbies', pet_location = '$plocation', pet_img = '$pimg', pet_public = '$ppuplic', pet_availability = '$pavail' WHERE id = {$id}";
   if($conn->query($sql) === TRUE) {
       echo  "<p>Successfully Updated</p>";
       echo "<a href='../update.php?id=" .$id."'><button type='button'>Back</button></a>";
       echo  "<a href='../admin.php'><button type='button'>Home</button></a>";
   } else {
        echo "Error while updating record : ". $conn->error;
   }

   $conn->close();

}

?>