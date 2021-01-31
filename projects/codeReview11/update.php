
<?php
ob_start();
session_start();
require_once 'db_connect.php';

// if session is not set this will redirect to login page
if( !isset($_SESSION['admin' ]) ) {
 header("Location: index.php");
 exit;
}
if(isset($_SESSION["user"])){
  header("Location: home.php");
  exit;
}

if($_GET["id"]){
  $id = $_GET["id"];

  $sql = "SELECT * FROM pets WHERE id = {$id}";
  $result = $conn->query($sql);

  $data = $result->fetch_assoc();

  $conn->close();

?>

<!DOCTYPE html>
<html>
<head>
  <title >Edit Pet</title>
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

  <div class="container-fluid mx-4">

    <fieldset class="my-5 b4 rounded-lg p-4">
    <legend class="j2 text-danger">Update Pet</legend>

      <form action="actions/a_update.php"  method="post">
        <table  cellspacing="0" cellpadding= "0">
          <tr>
            <th>Type</th>
            <td><input  type="text" name="pet_name"  placeholder="Name of Pet" value="<?php echo $data['pet_name'] ?>" /></td>
           </tr >    
           <th>Age of Pet</th>
            <td><input  type="text" name= "pet_age" placeholder="Age of Pet" value ="<?php echo $data['pet_age'] ?>" /></td >
           </tr>
           <tr>
            <th>Size of Pet</th>
            <td><input type="text"  name="pet_size" placeholder ="Big or Small" value ="<?php echo $data['pet_size'] ?>"/></td>
          </tr>
          <tr>
            <th>Description</th>
            <td><input type="text"  name="pet_description" placeholder ="Short Description" value ="<?php echo $data['pet_description'] ?>" /></td>
          </tr>
          <tr>
            <th>Care - Does the Pet need special attention?</th>
            <td><input type="text"  name="pet_care" placeholder ="eg. needs a pool" value ="<?php echo $data['pet_care'] ?>" /></td>
          </tr>
          <tr>
            <th>Hobbies</th>
            <td><input type="text"  name="pet_hobbies" placeholder ="eg. likes to swimm" value ="<?php echo $data['pet_hobbies'] ?>"/></td>
          </tr>
          <tr>
            <th>Location - Address</th>
            <td><input type="text"  name="pet_location" value ="<?php echo $data['pet_location'] ?>" /></td>
          </tr>
          <tr>
            <th>Image File Name - Image size 360x500px</th>
            <td><input type="text"  name="pet_img" placeholder ="dog.jpg" value ="<?php echo $data['pet_img'] ?>" /></td>
          </tr>
          <tr>
            <th>Public display - Shown outside of the member area</th>
            <td><input type="text"  name="pet_public" placeholder ="yes or no" value ="<?php echo $data['pet_public'] ?>" /></td>
          </tr>
          <tr>
            <th>Is still available?</th>
            <td><input type="text"  name="pet_availability" placeholder ="yes or no" value ="<?php echo $data['pet_availability'] ?>"/></td>
          </tr>

          </tr>
           <tr>
               <input type= "hidden" name= "id" value= "<?php echo $data['id']?>" />
               <td><button  type= "submit">Save Changes</button></td>
               <td><a  href="admin.php"><button  type="button">Back</button></a></td >
           </tr>
        </table>
      </form >
    </fieldset >
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

<?php
}
?>