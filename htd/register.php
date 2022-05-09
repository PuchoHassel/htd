<?php   
include 'header.php';

require_once "config.php";

$naam = $wachtwoord = $confirm_wachtwoord = "";
$naam_err = $wachtwoord_err = $confirm_wachtwoord_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {

    if(empty(trim($_POST["naam"]))) {
        $naam_err = "Please enter a name.";
    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["naam"]))) {
        $naam_err = "Naam can only contain letters.";
    }else {
        $sql = "SELECT medewerkercode FROM medewerker WHERE naam = ?";

        if($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, "s", $param_naam);

            $param_naam = trim($_POST["naam"]);

            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt) == 1) {
                    $naam_err = "this naam is already taken.";
                } else{
                    $naam = trim($_POST["naam"]);
                }
            }else {
                echo "Oops! Something went wrong.";
            }
            mysqli_stmt_close($stmt);
        }
    }
    if(empty(trim($_POST["wachtwoord"]))) {
        $wachtwoord_err = "Please enter a password";
    }elseif(strlen(trim($_POST["wachtwoord"])) < 6) {
        $wachtwoord_err = "Password must have atleast 6 characters.";
    }else {
        $wachtwoord = trim($_POST["wachtwoord"]);
    }

    if(empty(trim($_POST["confirm_wachtwoord"]))){
        $confirm_wachtwoord_err = "Please confirm wachtwoord.";
    }else {
        $confirm_wachtwoord = trim($_POST["confirm_wachtwoord"]);

        if(empty($wachtwoord_err) && ($wachtwoord != $confirm_wachtwoord)) {
            $confirm_wachtwoord_err = "Wachtwoord did not match.";
        }
    }

    if(empty($naam_err) && empty($wachtwoord_err) && empty($confirm_wachtwoord_err)) {
        $sql = "INSERT INTO medewerker (naam, wachtwoord) VALUES (?, ?)";

        if($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, "ss", $param_naam, $param_wachtwoord);

            $param_naam = $naam;
            $param_wachtwoord = password_hash($wachtwoord, PASSWORD_DEFAULT);

            if(mysqli_stmt_execute($stmt)) {
                header("location: login.php");
            } else{
                echo "Oops! Something went wrong.";
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
    <title>Sign Up</title>
</head>
<body>
    <div class="wrapper">
        <h2>Sign Up</h2>
        <p>Please fill in the form</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Naam:</label>
                <input type="text" name="naam" class="form-control <?php echo (!empty($naam_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $naam; ?>">
                    <span class="invalid-feedback"><?php echo $naam_err; ?>
                </span>
            </div>

            <div class="form-group">
                <label>Wachtwoord</label>
                <input type="password" name="wachtwoord" class="form-control <?php echo (!empty($wachtwoord_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $wachtwoord; ?>">
                    <span class="invalid-feedback"> <?php echo $wachtwoord_err; ?>
                </span>
            </div>

            <div class="form-group">
                <label>Confirm wachtwoord</label>
                <input type="password" name="confirm_wachtwoord" class="form-control <?php echo (!empty($confirm_wachtwoord_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_wachtwoord; ?>">
                    <span class="invalid-feedback"><?php echo $confirm_wachtwoord_err ?>
                </span>
            </div>

            <div class="form-group">
                <input type="submit"  class="btn btn-primary" value="Submit">
            </div>
    </form>
    </div>
</body>
</html>