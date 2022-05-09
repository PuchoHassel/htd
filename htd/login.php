<?php   
include 'header.php';

session_start();

if(isset($_SESSION["Loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: dashboard.php");
    exit;
}

require_once 'config.php';

$naam = $wachtwoord = "";
$naam_err = $wachtwoord_err = $login_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {

    if(empty(trim($_POST["naam"]))){
        $naam_err = "Please enter naam";
    } else{
        $naam = trim($_POST["naam"]);
    }

    if(empty(trim($_POST["wachtwoord"]))) {
        $wachtwoord_err = "Please enter wachtwoord";
    } else {
        $wachtwoord = trim($_POST["wachtwoord"]);
    }

    if(empty($naam_err) && empty($wachtwoord_err)){

        $sql = "SELECT medewerkercode, naam, wachtwoord FROM medewerker WHERE naam = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_naam);

            $param_naam = $naam;

            if(mysqli_stmt_execute($stmt)){

                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt)== 1){
                    mysqli_stmt_bind_result($stmt, $medewerkercode, $naam, $hashed_wachtwoord);

                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($wachtwoord, $hashed_wachtwoord)) {
                            session_start();

                            $_SESSION["loggedin"] = true;
                            $_SESSION["medewerkercode"] = $medewerkercode;
                            $_SESSION["naam"] = $naam;

                            header("location: dashboard.php");
                        } else{

                            $login_err = "Invalid naam or wachtwoord."; 
                        }
                    }
                } else{
                    $login_err = "Invalid naam or wachtwoord.";
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            mysqli_stmt_close($stmt);
        }
    }

    mysqli_close($link);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Login</title>
</head>
<body>
    <div class="wrapper">
        <h2>Login</h2>
        <p>Please fill in your credentials</p>

        <?php   
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        } 
        ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Naam:</label>
                <input type="text" name="naam" class="form-control <?php echo (!empty($naam_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $naam; ?>">
                    <span class="invalid-feedback"><?php echo $naam_err; ?>
                </span>
            </div>
            <div class="form-group">
                <label>Wachtwoord:</label>
                <input type="password" name="wachtwoord" class="form-control <?php echo (!empty($wachtwoord_err)) ? 'is-invalid' : ''; ?>">
                    <span class="invalid-feedback"><?php echo $wachtwoord_err; ?>
                </span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <p>Sign up</p> <a href="register.php">click here</a>
    </form>
    </div>
</body>
</html>