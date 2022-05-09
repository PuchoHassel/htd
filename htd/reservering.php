<?php   
include 'header.php';

require_once "config.php";

$naam = $adres = $plaats = $postcode = $telefoon = $van = $tot = $kamernummer = "";
$naam_err = $adres_err = $plaats_err = $potcode_err = $telefoon_err = $van_err = $tot_err = $kamernummer_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(empty(trim($_POST["naam"]))) {
        $naam_err = "Please enter your name";
    } else{
        $naam = trim($_POST["naam"]);
    }

    if(empty(trim($_POST["adres"]))) {
        $adres_err = "Please enter your adres";
    } else {
        $adres = trim($_POST["adres"]);
    }

    if(empty(trim($_POST["plaats"]))) {
        $plaats_err = "Please enter your location";
    } else {
        $plaats = trim($_POST["plaats"]);
    }

    if(empty(trim($_POST["postcode"]))) {
        $potcode_err = "Please enter your postal code";
    } else{
        $postcode = trim($_POST["postcode"]);
    }

    if(empty(trim($_POST["telefoon"]))) {
        $telefoon_err = "Please enter your phone number";
    } else{
        $telefoon = trim($_POST["telefoon"]);
    }

    if(empty(trim($_POST["van"]))) {
        $van_err = "Please select the starting date";
    } else {
        $van = trim($_POST["van"]);
    }

    if(empty(trim($_POST["tot"]))) {
        $tot_err = "Please select an ending date";
    } else {
        $tot = trim($_POST["tot"]);
    }

    if(empty(trim($_POST["kamernummer"]))) {
        $kamernummer_err = "Please select a room";
    } else {
        $kamernummer = trim($_POST["kamernummer"]);
    }

    if(empty($naam_err) && empty($adres_err) && empty($plaats_err) && empty($potcode_err) && empty($telefoon_err) && empty($van_err) && empty($tot_err) && empty($kamernummer_err)) {
        $sql = "INSERT INTO reservering (naam, adres, plaats, postcode, telefoon, van, tot, kamernummer) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        if($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, "ssssissi", $param_naam, $param_adres, $param_plaats, $param_postcode, $param_telefoon, $param_van, $param_tot, $param_kamernummer);
            $param_naam = $naam;
            $param_adres = $adres;
            $param_plaats = $plaats;
            $param_postcode = $postcode;
            $param_telefoon = $telefoon;
            $param_van = $van;
            $param_tot = $tot;
            $param_kamernummer = $kamernummer;

            if(mysqli_stmt_execute($stmt)) {
                header("location: index.php");
            } else {
                echo "Error";
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
    <title>Reserveer een Kamer</title>
</head>
<body>

    <div class="container">
        <div class="header">
            <h2>Fill in the form</h2>
        </div>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Naam:</label>
                <input type="text" name="naam" class="form-control <?php echo (!empty($naam_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $naam; ?>">
                    <span class="invalid-feedback"><?php echo $naam_err; ?>
            </div>
            <div class="form-group">
                <label>Adres:</label>
                <input type="text" name="adres" class="form-control <?php echo (!empty($adres_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $adres; ?>">
                    <span class="invalid-feedback"><?php echo $adres_err; ?>
            </div>
            <div class="form-group">
                <label>Plaats:</label>
                <input type="text" name="plaats" class="form-control <?php echo (!empty($plaats_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $plaats; ?>">
                    <span class="invalid-feedback"><?php echo $plaats_err; ?>
            </div>
            <div class="form-group">
                <label>Postcode:</label>
                <input type="text" name="postcode" class="form-control <?php echo (!empty($postcode_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $postcode; ?>">
                <span class="invalid-feedback"><?php echo $postcode_err; ?>
            </div>
            <div class="form-group">
                <label>Telefoon:</label>
                <input type="number" name="telefoon" class="form-control <?php echo (!empty($telefoon_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $telefoon; ?>">
                <span class="invalid-feedback"><?php echo $telefoon_err; ?>
            </div>
            <div class="form-group">
                <label>Van:</label>
                <input type="date" name="van" class="form-control <?php echo (!empty($van_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $van; ?>">
                <span class="invalid-feedback"><?php echo $van_err; ?>
            </div>
            <div class="form-group">
                <label>Tot:</label>
                <input type="date" name="tot" class="form-control <?php echo (!empty($tot_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $tot; ?>">
                <span class="invalid-feedback"><?php echo $tot_err; ?>
            </div>
            <div class="form-group">
                <label>Kamer:</label>
                <select name="kamernummer" class="form-control <?php echo (!empty($kamernummer_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $kamernummer; ?>">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
            </select>
            <span class="invalid-feedback"><?php echo $kamernummer_err; ?>
            </div>

            <div class="form-group">
                <input type="submit" name="submit" class="btn btn-primary" value="submit">
                <!-- <button onclick="window.print()">Print</button></td> -->
            </div>
        </form>
    </div>
</body>
</html>