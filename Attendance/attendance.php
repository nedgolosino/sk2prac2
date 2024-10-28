<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css"></link>
    <title>Attendance</title>
</head>
<body>

    <div class="container d-flex justify-content-center mt-5">
        <a href="addAtt.php">Add Attendance</a>
        <p> | </p>
        <a href="../index.php">Back to Menu</a>
    </div>  

    <div class="container d-flex justify-content-center mt-5">
        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <td>Record #</td>
                    <td>Emp. ID</td>
                    <td>Date/Time In</td>
                    <td>Date/Time Out</td>
                    <td>Actions</td>
                </tr>
            </thead>

<?php
    include('../db.php');

    $sql = "SELECT * FROM attendance";
    $sql = mysqli_query($conn, $sql);

    if($sql){
        while($row = mysqli_fetch_assoc($sql)){
            
            echo "
                    <tbody>
                        <td>$row[attRN]</td>
                        <td>$row[empID]</td>
                        <td>$row[attTimeIn]</td>
                        <td>";
        
                        // Check if attTimeOut is NULL
                        if ($row['attTimeOut'] == NULL) {
                            echo "<a href='?timeOutID={$row['attRN']}'>Time Out</a>";
                        } else {
                            echo $row['attTimeOut'];
                        }
                        
                        echo "</td>
                                <td><a href='editEmp.php?empID={$row['empID']}'>{$row['attStat']}</a></td>
                                </tr>
                            </tbody>";
                    }
                }

?>
        </table>

    </div>
</body>
</html>


<?php
    if(isset($_GET['timeOutID'])){

        $id = $_GET['timeOutID'];

        $sql = "UPDATE attendance SET attTimeOut = NOW() WHERE attRN = '$id'";
        $sql = mysqli_query($conn, $sql);

        if($sql){
            echo "<script>
                        window.alert('Time Out set Successfully');
                        window.location.href='attendance.php';
                    </script>";
        }
    }

?>