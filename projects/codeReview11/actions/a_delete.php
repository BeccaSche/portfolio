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
   $id = $_POST['id'];

   $sql = "DELETE FROM pets WHERE id = {$id}";
    if($conn->query($sql) === TRUE) {
       echo "<p>Successfully deleted!!</p>" ;
       echo "<a href='../admin.php'><button type='button'>Back</button></a>";
   } else {
       echo "Error updating record : " . $conn->error;
   }

   $conn->close();
}

?>

