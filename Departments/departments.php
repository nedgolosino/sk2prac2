<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css"></link>
    <title>Document</title>
</head>
<body>

    <div class="container d-flex justify-content-center mt-5">
        <a href="addDept.php">Add Departments</a>
        <p> | </p>
        <a href="../index.php">Back to Menu</a>
    </div>  

    <div class="container d-flex justify-content-center mt-5">
        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <td>Code</td>
                    <td>Name</td>
                    <td>Head</td>
                    <td>Tel. No.</td>
                    <td>Actions</td>
                </tr>
            </thead>

<?php
    include('../db.php');

    $sql = "SELECT * FROM departments";
    $sql = mysqli_query($conn, $sql);

    if($sql){
        while($row = mysqli_fetch_assoc($sql)){
            
            echo "
                    <tbody>
                        <td>$row[depCode]</td>
                        <td>$row[depName]</td>
                        <td>$row[depHead]</td>
                        <td>$row[depTelNo]</td>
                        <td><a href='editDept.php?depCode=$row[depCode];'><button class='btn btn-success'>Edit</button></a>
                            <a href='delDept.php?depCode=$row[depCode];'><button class='btn btn-danger'>Delete</button></a>
                        </td>
                    </tbody>
                ";
        }
    }

?>
        </table>

    </div>
</body>
</html>
