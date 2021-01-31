<?php 
	session_start();
	require_once 'db_connect.php';
	// echo $_SESSION["user"]. " " . $_GET["id"]; 

	if(isset($_POST["submit"])){
		$carId = $_GET["id"];
		$userId = $_SESSION["user"];
		$booking_date_start = $_POST["booking_date_start"];
		$booking_date_end = $_POST["booking_date_end"];

		$sql = "INSERT INTO booking (booking_date_start, booking_date_end, fk_user_id, fk_car_id) VALUES ('$booking_date_start','$booking_date_end', $userId, $carId)";

		$sql2 = "UPDATE cars SET car_availability = 'no' WHERE id = $carId";

	?>

		

	<!DOCTYPE html>
	<html>
		<head>
		  <title>Welcome - <?php echo $userRow['userName' ]; ?></title>
		  <meta charset="utf-8">
		  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
		  <link rel="stylesheet" type="text/css" href="style.css">
		  
		</head>

		<body>
			<nav class="navbar navbar-expand-lg navbar-light bg-warning">
		    <a class="navbar-brand text-light" href="index.php"><b>Movie Car Rental</b></a>
			    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			      <span class="navbar-toggler-icon"></span>
			    </button>

			    <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarNav">
			    	
			      <ul class="navbar-nav">
			        <li class="nav-item active">
			          <a class="nav-link mr-5 text-info" href="logout.php?logout"><b>Sign Out</b></a>
			        </li>
			        </ul>
			    </div>
			</nav>

			<div class="bg1 image-fluid"> </div>
		  
			<div class ="container-fluid mx-5">
				<h2 class="text-info my-4">Choose the date:</h2>
				<form method="post">
					<input type="date" name="booking_date_start">
					<input type="date" name="booking_date_end">
					<input type="submit" name="submit">

				</form>

		<?php	

			if(mysqli_query($conn, $sql) && mysqli_query($conn, $sql2)){
			echo "<div class='my-4'><h2 class='text-warning'>Your car was booked!</h2><a href='home.php'>Back to home page</a><br></div>";
		}

	}

?>

			</div>
				
			</body>
			</html>