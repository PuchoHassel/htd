<?php  

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Reserverings</title>
</head>
<body>
    
    <table class="table w-75">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Kamernummer</th>
            <th scope="col">Naam</th>
            <th scope="col">Adres</th>
            <th scope="col">Plaats</th>
            <th scope="col">Postcode</th>
            <th scope="col">Telefoon</th>
            <th scope="col">Van</th>
            <th scope="col">Tot</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
            <?php include 'read.php'; ?>

            <?php if($result->num_rows > 0): ?>

            <?php while($array=mysqli_fetch_row($result)) : ?>
            
                <tr>
                    <th scope="row"> <?php echo $array[0]; ?></th>
                    <td><?php echo $array[1]; ?></td>
                    <td><?php echo $array[2]; ?></td>
                    <td><?php echo $array[3]; ?></td>
                    <td><?php echo $array[4]; ?></td>
                    <td><?php echo $array[5]; ?></td>
                    <td><?php echo $array[6]; ?></td>
                    <td><?php echo $array[7]; ?></td>
                    <td><?php echo $array[8]; ?></td>
                    <td><a class="btn btn-info" href="update.php?<?php echo $array[0]; ?>">Update</a>
                <a class="btn btn-danger" href="delete.php?<?php echo $array[0]; ?>">Delete</a>
                <button onclick="window.print()">Print</button></td>
                </tr>

                <?php endwhile; ?>

                <?php else: ?>

                    <tr>
                   <td colspan="8" rowspan="1" headers=""></td>
                </tr>
                <?php endif; ?>
                <?php mysqli_free_result($result); ?>
        </tbody>
    </table>







<div class="go-back">
            <a class="btn btn-success" href="dashboard.php">Dashboard</a>
        </div>
</body>
</html>