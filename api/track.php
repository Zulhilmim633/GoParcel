
<?php
    include("db_connect.php");
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        $tracking = $_GET['number'];
        $q = "SELECT * FROM tracking WHERE trackingNo = '$tracking'";
    
        $result = mysqli_query($connect, $q);
    
        if (@mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    
            echo "SUCCESS:";
            echo $row['trackingNo'].";".$row['status'].";".$row['pickupLoc'].";".$row['inTransitLoc'];
    
            exit();
            mysqli_free_result($result);
        } else {
            echo "ERROR:NOTFOUND";
        }
        mysqli_close($connect);
    }
?>