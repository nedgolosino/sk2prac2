<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css"></link>
    <title>Add Department</title>
</head>
<body>
    <form method="POST">
        
        <div class="container d-flex justify-content-center mt-5">
            <div class="form-group">
                <label for="depName">Add Department Name:</label>
                <input type="text" name="depName">
            </div>
        </div>
        <div class="container d-flex justify-content-center mt-5">
            <div class="form-group">
                <label for="depHead">Add Department Head:</label>
                <input type="text" name="depHead">
            </div>
        </div>
        <div class="container d-flex justify-content-center mt-5">
            <div class="form-group">
                <label for="depTelNo">Add Department Tel No.:</label>
                <input type="number" name="depTelNo">
            </div>
        </div>
        <div class="container d-flex justify-content-end mt-5">
            <button class="btn btn-success" name="submit">Submit</button>
        </div>
    </form>
    <div class="container d-flex justify-content-end mt-5">
        <a href="departments.php"><button class="btn btn-secondary">Go Back</button></a>
    </div>
</body>
</html>


<?php
    include('../db.php');

    if(isset($_POST['submit'])){

        $depName = $_POST['depName'];
        $depHead = $_POST['depHead'];
        $depTelNo = $_POST['depTelNo'];

        $sql = "INSERT INTO departments (depName, depHead, depTelNo) VALUES ('$depName', '$depHead', '$depTelNo')";
        $sql = mysqli_query($conn, $sql);

        if($sql){
            echo "<script>
                    window.alert('Added Successfully');
                    window.location.href='addDept.php';
                </script>";
        }

    }
?>