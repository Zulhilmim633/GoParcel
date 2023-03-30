<?php
include("db_connect.php");
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $error = array();

    if (empty($_POST['userPassword'])) {
        $error[] = 'You forgot to the password';
    } else {
        $p = mysqli_real_escape_string($connect, trim($_POST['userPassword']));
    }

    if (empty($_POST['userName'])) {
        $error[] = 'You forgot to the Name';
    } else {
        $n = mysqli_real_escape_string($connect, trim($_POST['userName']));
    }

    if (empty($_POST['userPhoneNo'])) {
        $error[] = 'You forgot to the phone number';
    } else {
        $ph = mysqli_real_escape_string($connect, trim($_POST['userPhoneNo']));
    }

    if (empty($_POST['userEmail'])) {
        $error[] = 'You forgot to the email';
    } else {
        $e = mysqli_real_escape_string($connect, trim($_POST['userEmail']));
    }
    
    if (empty($_POST['userAddress'])) {
        $error[] = 'You forgot to the Address';
    } else {
        $a = mysqli_real_escape_string($connect, trim($_POST['userAddress']));
    }

    //check if email already exist
    $exist = array();
    $q = "SELECT userName FROM user WHERE ";// userEmail = '$e' OR userName = '$n'";
    $result = @mysqli_query($connect, $q ."userEmail = '$e'");
    $test = mysqli_fetch_array($result, MYSQLI_ASSOC);
    if($test){
        $exist[] = "ERROR:EMAIL;";
    }

    $result = @mysqli_query($connect, $q ."userName = '$n'");
    $test = mysqli_fetch_array($result, MYSQLI_ASSOC);
    if($test){
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
    $q = "INSERT INTO user (userEmail, userName, userPassword, userPhoneNo, 
    userAddress) VALUES ('$e','$n','$p','$ph',
    '$a')";

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