<?php
include("db_connect.php");
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $n = mysqli_real_escape_string($connect, trim($_POST['adminName']));
    $e = mysqli_real_escape_string($connect, trim($_POST['adminEmail']));
    $ph = mysqli_real_escape_string($connect, trim($_POST['adminPhone']));
    $p = mysqli_real_escape_string($connect, trim($_POST['adminPassword']));

    //check if email already exist
    $exist = array();
    $result = @mysqli_query($connect, "SELECT adminEmail FROM admin WHERE adminEmail = '$e'");
    $test = mysqli_fetch_array($result, MYSQLI_ASSOC);
    if($test){
        echo "ERROR:EMAIL;";
        exit();
    }

    //register the user in the database
    //make the query
    $q = "INSERT INTO admin (adminName, adminEmail, adminPhoneNo, adminPassword) 
    VALUES ('$n','$e','$ph','$p')";

    $result = @mysqli_query($connect, $q);
    if ($result) {
        echo "SUCCESS";
    } else {
        echo "ERROR";
        echo mysqli_error($connect) . " Query: $q";
    }

    mysqli_close($connect);
    exit();
}
?>