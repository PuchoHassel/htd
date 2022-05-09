<?php
include 'config.php';
if(count($_POST)>0) {
    mysqli_query($link, "UPDATE reservering set reserveringnummer='" . $_POST['reserveringnummer']. "',
    naam='" . $_POST['naam']. "',
    adres='" . $_POST['adres']. "',
    plaats='" . $_POST['plaats'. "',
    postcode='" . $_POST['postcode']. "',
    telefoon='" . $_POST['telefoon']. "',
    van='" . $_POST['van']. "',
    tot='" . $_POST['tot']. "',
    kamernummer='" . $_POST['kamernummer'] . "' WHERE reserveringnummer='" . $_POST['reserveringnummer']. "'");

    $message = "Record has been modified!";
}
$result = mysqli_query($link, "SELECT reservering WHERE reserveringnummer='" . $_GET['reserveringnummer'] . "'");
$row= mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" class="updating" method="post">
        <div><?php if(isset($message)) {echo $message; } ?>
    </div>
    <div>
    <a href="overzicht.php">Reservering</a>
    </div>
    Naam: <br>
    <input type="text" name="naam" value="<?php echo $row['naam']; ?>">
    <br>
    Adres: <br>
    <input type="text" name="adres" value="<?php echo $row['adres']; ?>">
    <br>
    Plaats: <br>
    <input type="text" name="plaats" value="<?php echo $row['plaats']; ?>">
    <br>
    Postcode: <br>
    <input type="text" name="postcode" value="<?php echo $row['postcode']; ?>">
    <br>
    telefoon: <br>
    <input type="number" name="naam" value="<?php echo $row['telefoon']; ?>">
    <br>
    Van: <br>
    <input type="date" name="van" value="<?php echo $row['van']; ?>">
    <br>
    tot: <br>
    <input type="date" name="tot" value="<?php echo $row['tot']; ?>">
    <br>
    Kamernummer: <br>
    <input type="number" name="kamernummer" value="<?php echo $row['kamernummer']; ?>">
    <br>
    <input type="submit" name="submit" value="submit" class="btn btn-success">
    </form>
</body>
</html>