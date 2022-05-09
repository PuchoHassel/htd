<?php  
include_once 'config.php';

if(isset($_POST["submit"])){

    $naam = $_POST["naam"];
    $adres = $_POST["adres"];
    $plaats = $_POST["plaats"];
    $postcode = $_POST["postcode"];
    $telefoon = $_POST["telefoon"];
    $van = $_POST["van"];
    $tot = $_POST["tot"];
    $kamernummer = $_POST["kamernummer"];

    $sql = "INSERT INTO reservering (naam, adres, plaats, postcode, telefoon, van, tot, kamernummer)
    VALUES ('$naam', '$adres', '$plaats', '$postcode', '$telefoon', '$van', '$tot', '$kamernummer')";

    if(mysqli_query($link, $sql)) {
        echo "Reservering is toegevoegd.";
    } else {
        echo "ERROR: " . $sql . ":-" . mysqli_error($link);
    }
    mysqli_close($link);
}
 ?>