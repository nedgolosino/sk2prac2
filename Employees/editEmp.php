<?php
    include('../db.php');

    if(isset($_GET['empID'])){

        $empID = $_GET['empID'];
    

        if(isset($_POST['submit'])){

            $depCode = $_POST['depCode'];
            $empLName = $_POST['empLName'];
            $empFName = $_POST['empFName'];
            $empRPH = $_POST['empRPH'];

            $sql = "UPDATE employees SET depCode = '$depCode', empLName = '$empLName', empFName = '$empFName', empRPH = '$empRPH' WHERE empID = '$empID'";
            $sql = mysqli_query($conn, $sql);

            if($sql){
                echo "<script>
                        window.alert('Updated Successfully');
                        window.location.href='employees.php';
                    </script>";
            }

        }else{

            $sql = "SELECT * FROM employees WHERE empID = '$empID'";
            $sql = mysqli_query($conn, $sql);
            
            while($row = mysqli_fetch_assoc($sql)){

                $depCode = $row['depCode'];
                $empLName = $row['empLName'];
                $empFName = $row['empFName'];
                $empRPH = $row['empRPH'];
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css"></link>
    <title>Add Employee</title>
</head>
<body>
    <form method="POST">
        
        <div class="container d-flex justify-content-center mt-5">
            <div class="form-group">
                <label for="depName">Add Department Code:</label>
                <input type="number" name="depCode" value="<?php echo "$depCode"?>" required>
            </div>
        </div>
        <div class="container d-flex justify-content-center mt-5">
            <div class="form-group">
                <label for="depHead">Add Employee Last Name:</label>
                <input type="text" name="empLName" value="<?php echo "$empLName"?>" required>
            </div>
        </div>
        <div class="container d-flex justify-content-center mt-5">
            <div class="form-group">
                <label for="depHead">Add Employee First Name:</label>
                <input type="text" name="empFName" value="<?php echo "$empFName"?>" required>
            </div>
        </div>
        <div class="container d-flex justify-content-center mt-5">
            <div class="form-group">
                <label for="depHead">Add Employee Rate/Hour:</label>
                <input type="number" step="0.01" name="empRPH" value="<?php echo "$empRPH"?>" required>
            </div>
        </div>
        <div class="container d-flex justify-content-end mt-5">
            <button class="btn btn-success" name="submit">Submit</button>
        </div>
    </form>
    <div class="container d-flex justify-content-end mt-5">
        <a href="employees.php"><button class="btn btn-secondary">Go Back</button></a>
    </div>
</body>
</html>

