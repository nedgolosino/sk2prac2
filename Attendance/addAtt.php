<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css"></link>
    <title>Add Attendance</title>
</head>
<body>
    <form method="POST">
        
        <div class="container d-flex justify-content-center mt-5">
            <div class="form-group">
                <label for="depName">Enter Employee ID:</label>
                <input type="number" name="depCode">
            </div>
        </div>
        <div class="container d-flex justify-content-center mt-5">
            <div class="form-group">
                <label for="depHead">Date/Time In:</label>
                <input type="datetime-local" name="attTimeIn">
            </div>
        </div>
        <div class="container d-flex justify-content-end mt-5">
            <button class="btn btn-success" name="submit">Submit</button>
        </div>
    </form>
    <div class="container d-flex justify-content-end mt-5">
        <a href="attendance.php"><button class="btn btn-secondary">Go Back</button></a>
    </div>
</body>
</html>


<?php
    include('../db.php');

    if(isset($_POST['submit'])){

        $empID = $_POST['depCode'];
        $attTimeIn = $_POST['attTimeIn'];

        $sql = "INSERT INTO attendance (empID, attTimeIn, attStat) VALUES ('$empID', '$attTimeIn', 'Cancel')";
        $sql = mysqli_query($conn, $sql);

        if($sql){
            echo "<script>
                    window.alert('Added Successfully');
                    window.location.href='addAtt.php';
                </script>";     
        }

    }
?>