<?php
include('connect.php');
session_start();
if(!isset($_SESSION['username'])){
    hearder('location:index.php');
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="jumbotron">
            <h1 class="display-4 text-center text-success">Welcome <?php echo $_SESSION['username']?> </h1>  
            <p>This is the welcome page.</p>
            <p class="lead">
                <a class="btn btn-danger btn-lg" href="#" role="button">Logout</a>
            </p>
        </div>
    </div>
</body>
</html>