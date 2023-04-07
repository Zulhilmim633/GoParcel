<?php
include("db_connect.php");
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $p = mysqli_real_escape_string($connect, trim($_POST['adminPassword']));
    $n = mysqli_real_escape_string($connect, trim($_POST['adminName']));
    $ph = mysqli_real_escape_string($connect, trim($_POST['adminPhoneNo']));
    $e = mysqli_real_escape_string($connect, trim($_POST['adminEmail']));

    //check if email user exist
    $exist = array();
    $result = @mysqli_query($connect, "SELECT adminEmail FROM admin WHERE adminName = '$n'");
    $test = mysqli_fetch_array($result, MYSQLI_ASSOC);
    if($test){
        if(!$test['adminEmail'] == $_POST['adminEmail'])
            $exist[] = "ERROR:USERNAME;";
    }

    if($exist){
        for ($i=0; $i < count($exist); $i++) { 
            echo $exist[$i];
        }
        exit();
    }

    //register the user in the database
    //make the query
    $q = "UPDATE admin SET adminName='$n', adminPassword='$p', adminPhoneNo='$ph' WHERE adminEmail='$e' LIMIT 1";

    $result = @mysqli_query($connect, $q);
    if ($result) {
        echo "SUCCESS";
        exit();
    } else {
        echo "System Error";
        echo mysqli_error($connect) . " Query: $q";
    }

    mysqli_close($connect);
    exit();
}
?>