<?php
include("db_connect.php");
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(filter_var($_POST['adminName'], FILTER_VALIDATE_EMAIL)){
        $e = mysqli_real_escape_string($connect, $_POST['adminName']);
        $q = "SELECT * FROM admin WHERE adminEmail = '$e'";
    }
    else {
        $n = mysqli_real_escape_string($connect, $_POST['adminName']);
        $q = "SELECT * FROM admin WHERE adminName = '$n'";
    }

    $result = mysqli_query($connect, $q);

    if (@mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

        echo "SUCCESS:";
        echo $row['adminName'].";".$row['adminEmail'].";".$row['adminPhoneNo'].";".$row['adminPassword'];

        exit();

        mysqli_free_result($result);
        mysqli_close($connect);
    } else {
        $er = filter_var($_POST['adminName'], FILTER_VALIDATE_EMAIL) ? "ERROR:Email does not match with password" : "ERROR:Username does not match with password";
        echo $er;
    }
    mysqli_close($connect);
}
?>