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
// $resLocation = mysqli_query($conn, "SELECT * FROM car_location");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Add a Pet</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-danger">
    <a class="navbar-brand text-light" href="index.php"><b>ADOPT-A-PET</b></a>
  </nav>

  <div class="jumbotron jumbotron-fluid b1a">
    <div class="container">
    <h1 class="display-4 jc1"><b>ADOPT don't shop!</b></h1>
    </div>
  </div>

  <div class="container-fluid mx-4">

    <fieldset class="my-5 b4 rounded-lg p-4">
      <legend class="j2 text-danger"><b>Add a Pet</b></legend>
      <p>Please enter ' , ?, ! only with a backslash (\) in front eg. \' \? \!. Otherwise you will get an error </p>

      <form  action="actions/a_create.php" method="post">
        <table cellspacing= "0" cellpadding="0">
            <tr>
              <th>Name</th>
              <td><input  type="text" name="pet_name"  placeholder="Name of Pet" /></td >
            </tr>    
            <tr>
              <th>Age of Pet</th>
              <td><input  type="text" name= "pet_age" placeholder="Age of Pet" /></td>
            </tr>
            <tr>
              <th>Size of Pet</th>
              <td><input type="text"  name="pet_size" placeholder ="Big or Small" /></td>
            </tr>
            <tr>
              <th>Description</th>
              <td><input type="text"  name="pet_description" placeholder ="Short Description" /></td>
            </tr>
            <tr>
              <th>Care - Does the Pet need special attention?</th>
              <td><input type="text"  name="pet_care" placeholder ="eg. needs a pool" /></td>
            </tr>
            <tr>
              <th>Hobbies</th>
              <td><input type="text"  name="pet_hobbies" placeholder ="eg. likes to swimm" /></td>
            </tr>
            <tr>
              <th>Location - Address</th>
              <td><input type="text"  name="pet_location" placeholder ="eg. Sunset Ave. 40, 3865 San Diego USA" /></td>
            </tr>
            <tr>
              <th>Image File Name - Image size 360x500px</th>
              <td><input type="text"  name="pet_img" placeholder ="dog.jpg" /></td>
            </tr>
            <tr>
              <th>Public display - Shown outside of the member area</th>
              <td><input type="text"  name="pet_public" placeholder ="yes or no" /></td>
            </tr>
            <tr>
              <th>Is still available?</th>
              <td><input type="text"  name="pet_availability" placeholder ="yes or no" /></td>
            </tr>
            
            <tr>
                 <td><button type ="submit">Insert Pet</button></td>
                 <td ><a href= "admin.php"><button  type="button">Back</button></a></td>
             </tr >
         </table>
     </form>
    </fieldset>
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

