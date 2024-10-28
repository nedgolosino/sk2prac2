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
        <a href="addEmp.php">Add Employees</a>
        <p> | </p>
        <a href="../index.php">Back to Menu</a>
    </div>  

    <div class="container d-flex justify-content-center mt-5">
        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <td>ID</td>
                    <td>Dept.</td>
                    <td>Last Name</td>
                    <td>First Name</td>
                    <td>Rate/Hour</td>
                    <td>Actions</td>
                </tr>
            </thead>

<?php
    include('../db.php');

    $sql = "SELECT *, depName FROM employees e JOIN departments d ON e.depCode = d.depCode";
    $sql = mysqli_query($conn, $sql);

    if($sql){
        while($row = mysqli_fetch_assoc($sql)){
            
            echo "
                    <tbody>
                        <td>$row[empID]</td>
                        <td>$row[depName]</td>
                        <td>$row[empFName]</td>
                        <td>$row[empLName]</td>
                        <td>$row[empRPH]</td>
                        <td><a href='editEmp.php?empID=$row[empID];'><button class='btn btn-success'>Edit</button></a>
                            <a href='delEmp.php?empID=$row[empID];'><button class='btn btn-danger'>Delete</button></a>
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
