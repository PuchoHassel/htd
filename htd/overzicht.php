<?php  
include_once 'config.php';
$result = mysqli_query($link, "SELECT * FROM reservering");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <?php
    if(mysqli_num_rows($result) > 0){
        ?>

        <table class="table w-75">

        <tr>
            <th>#</th>
            <th>Kamernummer</th>
            <th>Naam</th>
            <th>Adres</th>
            <th>Plaats</th>
            <th>Postcode</th>
            <th>Telefoon</th>
            <th>Van</th>
            <th>Tot</th>
            <th>Action</th>
        </tr>
        <?php 
        $i=0;
        while($row = mysqli_fetch_array($result)) {
            ?>
            <tr>
                <td><?php echo $row["reserveringnummer"]; ?></td>
                <td><?php echo $row["kamernummer"]; ?></td>
                <td><?php echo $row["naam"]; ?></td>
                <td><?php echo $row["adres"]; ?></td>
                <td><?php echo $row["plaats"]; ?></td>
                <td><?php echo $row["postcode"]; ?></td>
                <td><?php echo $row["telefoon"]; ?></td>
                <td><?php echo $row["van"]; ?></td>
                <td><?php echo $row["tot"]; ?></td>
                <td><a href="update.php?id=<?php echo $row["reserveringnummer"]; ?>" class="btn btn-info">Edit</a>
                    <a href="delete.php" class="btn btn-danger">Delete</a></td>
            </tr>
            <?php
            $i++;
        }
        ?>
        </table>
        <?php
    } else{
        echo "No result";
    }
    ?>
</body>
</html>