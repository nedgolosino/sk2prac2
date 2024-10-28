<?php
    include('../db.php');
    

    if(isset($_GET['depCode'])){
        $depCode = $_GET['depCode'];

        $sql = "DELETE FROM departments WHERE depCode = '$depCode'";
        $sql = mysqli_query($conn, $sql);


        if($sql){

            echo "
                <script>
                    window.alert('Deleted Successfully');    
                    window.location.href='departments.php';
                </script>
            
            ";
        }
    }

?>