
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
            $er = filter_var($_POST['userName'], FILTER_VALIDATE_EMAIL) ? "ERROR:Email does not match with password" : "ERROR:Username does not match with password";
            echo $er;
        }
        mysqli_close($connect);
    }
?>