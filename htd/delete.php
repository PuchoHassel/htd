<?php


include_once 'config.php';

  
$sql = "DELETE FROM reservering WHERE reserveringnummer=true ";
if(mysqli_query($link, $sql)){
    echo "Record was deleted successfully.";
} 
else{
    echo "ERROR: Could not able to execute $sql. " 
                                   . mysqli_error($link);
}
mysqli_close($link);

?>

<html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<a class="btn btn-info" href="overzicht_res.php">Overzicht</a>
</html>