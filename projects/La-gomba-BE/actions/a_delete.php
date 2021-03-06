<?php
    ob_start();
    session_start();
    require_once 'db_connect.php'; 

    // if session is not set this will redirect to login page
    if( !isset($_SESSION['admin']) && !isset($_SESSION['user']) ) {
        header("Location: ../login/login.php");
        exit;
    }

    // select logged-in admins details
    $sql = "SELECT * FROM users WHERE user_id=".$_SESSION['admin'];
    $result = mysqli_query($conn, $sql);
    $userRow = mysqli_fetch_assoc($result);   
?>
<!DOCTYPE html>
<html>
<?php include '../head.php'; ?>
<body>
    <header>   
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="admin.php">All cuties<span class="sr-only">(current)</span></a>
                    </li><li class="nav-item">
                        <a class="nav-link text-warning" href="insert.php">Add a pet</a>
                    </li>
                </ul>
            </div>
            <span class="ml-auto text-white mr-3">
                <img class="rounded" style="height: 40px; width: 40px" src="<?php echo $userRow['image'];?>">
                Hi <?php echo $userRow['userName']; ?>
            </span>
            <a href="login/logout.php?logout" class="nav-link  btn btn-outline-warning">Log out</a>
        </nav>
    </header>

    <div class="container mt-4 mx-auto text-center">
        <?php 
            if ($_POST) {
                $id = $_POST['id'];

                $sql = "DELETE FROM animals WHERE animal_id = {$id}";

                if($conn->multi_query($sql) === TRUE) {
                    echo "<h1 class='text-white'>Successfully deleted!!</h1>" ;
                    header("Refresh: 3; url= ../admin.php");
                } else {
                echo "Error updating record : " . $conn->error;
                }

                $conn->close();
            }
        ?>
    </div>
    <div class="card-footer text-dark bg-transparent text-center font-weight-bold"> &copy; 2020 </div>
</body>
</html>
<?php ob_end_flush(); ?>