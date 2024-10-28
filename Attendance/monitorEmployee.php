<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css"></link>
    <title>Attendance</title>
</head>
<body> 

    <div class="container d-flex justify-content-end mt-5">
        <a href="monitorDate.php">Monitor Attendance by Date</a>
    </div>

    <form method="GET">
        <div class="container d-flex justify-content-start mt-5">
            <div class="form-group">
                <label for="">Input Employee #:</label>
                <input type="number" name="empID">
            </div>
        </div>
        <div class="container d-flex justify-content-start mt-5">
            <button class="btn btn-success" name="submit">Find</button>
        </div>
    </form>
    <div class="container d-flex justify-content-end mt-5">
        <a href="../index.php"><button class="btn btn-secondary">Go Back</button></a>
    </div>

    <?php
    include('../db.php');

    if(isset($_GET['submit'])){

    $empID = $_GET['empID'];

    $sql = "SELECT a.*, e.empFName, e.empLName, e.empRPH ,d.depName FROM attendance a JOIN employees e on a.empID = e.empID JOIN departments d ON e.depCode = d.depCode where a.empID = '$empID'";
    $sql = mysqli_query($conn, $sql);
    $fetchName = mysqli_fetch_assoc($sql);

    $empFName = $fetchName['empFName'];
    $empLName = $fetchName['empLName'];
    $empRPH = $fetchName['empRPH'];
    $depName = $fetchName['depName'];
    
?>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 d-flex align-items-start">
                <label for="">Name: </label>
                <p value=><?php echo "{$empFName} {$empLName}"?></p>
            </div>
            <div class="col-md-6 d-flex align-items-start justify-content-end">
                <label for="">Department: </label>
                <p value=><?php echo "{$depName}"?></p>
            </div>
        </div>
    </div>

    <div class="container d-flex justify-content-center mt-5">
        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <td>Record #</td>
                    <td>Emp. ID</td>
                    <td>Date/Time In</td>
                    <td>Date/Time Out</td>
                    <td>Total</td>
                </tr>
            </thead>
            
<?php
    
    $tableSql = "SELECT *, TIMESTAMPDIFF(HOUR, attTimeIn, attTimeOut) as timeDiff,(SELECT SUM(TIMESTAMPDIFF(HOUR, attTimeIn, attTimeOut)) FROM attendance WHERE empID = '$empID') as totalHours FROM attendance WHERE empID = '$empID'";
    $tableSql = mysqli_query($conn, $tableSql);

    if($tableSql){
        while($row = mysqli_fetch_assoc($tableSql)){
            $totalHours = $row['totalHours'];

            $salary = $empRPH * $totalHours;
            $generated = date('Y-m-d H:i:s');
            
            echo "<tbody>  
                    <td>$row[attRN]</td>
                    <td>$row[empID]</td>
                    <td>$row[attTimeIn]</td>
                    <td>$row[attTimeOut]</td>
                    <td>$row[timeDiff]</td>
                </tbody>";
            }
?>
            
        </table>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-6 d-flex align-items-start">
                <label for="">Rate Per Hour: </label>
                <p value=""><?php echo "{$empRPH}"; ?></p>
            </div>
            <div class="col-md-6 d-flex align-items-start justify-content-end">
                <label for="">Total Hours Worked: </label>
                <p value=""><?php echo "{$totalHours}"; ?></p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 d-flex align-items-start">
                <label for="">Salary: </label>
                <p value=""><?php echo "{$salary}"; ?></p>
            </div>
            <div class="col-md-6 d-flex align-items-start justify-content-end">
                <label for="">Date Generated: </label>
                <p value=""><?php echo "{$generated}"; ?></p>
            </div>
        </div>
    </div>

</body>
</html>
<?php
          
        }
    }
?>