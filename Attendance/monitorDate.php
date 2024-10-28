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
        <a href="monitorEmployee.php">Monitor Attendance by Employee</a>
    </div>

    <form method="GET">
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-6 d-flex align-items-start">
                    <label for="">Time Start:</label>
                    <input type="datetime-local" name="timeIn">
                </div>
                <div class="col-md-6 d-flex align-items-start justify-content-center">
                    <label for="">Time End:</label>
                    <input type="datetime-local" name="timeOut">
                </div>
            </div>
        </div>
        <div class="container d-flex justify-content-start mt-3">
            <button class="btn btn-success" name="submit">Search</button>
    </div>
    </form>
    
    <div class="container d-flex justify-content-end mt-5">
        <a href="../index.php"><button class="btn btn-secondary">Go Back</button></a>
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
    include('../db.php');

    if(isset($_GET['submit'])){

    $timeIn = $_GET['timeIn'];
    $timeOut = $_GET['timeOut'];


    $sql = "SELECT *, TIMESTAMPDIFF(HOUR, attTimeIn, attTimeOut) as timeDiff,(SELECT SUM(TIMESTAMPDIFF(HOUR, attTimeIn, attTimeOut)) FROM attendance) as totalHours FROM attendance WHERE attTimeIn >= '$timeIn' AND attTimeOut <= '$timeOut'";
    $sql = mysqli_query($conn, $sql);

    if($sql){
        while($row = mysqli_fetch_assoc($sql)){
            $totalHours = $row['totalHours'];
           
            echo "<tbody>  
                    <td>$row[attRN]</td>
                    <td>$row[empID]</td>
                    <td>$row[attTimeIn]</td>
                    <td>$row[attTimeOut]</td>
                    <td>$row[timeDiff]</td>
                </tbody>";
            }        
        }
    }
?>  
        </table>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-6 d-flex align-items-start">
                <label for="">Date Generated: </label>
                <p value=""><?php $generated = date('Y-m-d H:i:s'); echo "{$generated}"; ?></p>
            </div>
            <div class="col-md-6 d-flex align-items-start justify-content-end">
                <label for="">Total Hours Worked: </label>
                <p><?php if(empty($totalHours))
                echo "Not Available"; 
                else echo "{$totalHours}"; ?></p>
            </div>
        </div>
    </div>
</body>
</html>