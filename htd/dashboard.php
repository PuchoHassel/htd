<?php   

session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Dashboard</title>
</head>
<body>
    <h1 class="my-5"> Welcome, <b> <?php echo htmlspecialchars($_SESSION["naam"]); ?></h1>

    <div class="navbar position-absolute top-0 start-50 translate-middle"></div>
    <a href="overzicht_res.php" class="btn btn-info">Reserverings</a>
    <a href="overzicht.php" class="btn btn-info">Reservering</a>

    <div class="navbar position-absolute top-0 end-0">
    <a href="logout.php" class="btn btn-danger ml-3">Sign Out</a>
    
</div>
</body>
</html>