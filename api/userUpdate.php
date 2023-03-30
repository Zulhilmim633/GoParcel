<?php
include("db_connect.php");
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $p = mysqli_real_escape_string($connect, trim($_POST['userPassword']));
    $n = mysqli_real_escape_string($connect, trim($_POST['userName']));
    $ph = mysqli_real_escape_string($connect, trim($_POST['userPhoneNo']));
    $e = mysqli_real_escape_string($connect, trim($_POST['userEmail']));
    $a = mysqli_real_escape_string($connect, trim($_POST['userAddress']));
    $FN = mysqli_real_escape_string($connect, trim($_POST['FullName']));

    //check if email user exist
    $exist = array();
    $result = @mysqli_query($connect, "SELECT userEmail FROM user WHERE userName = '$n'");
    $test = mysqli_fetch_array($result, MYSQLI_ASSOC);
    if($test){
        if(!$test['userEmail'] == $_POST['userEmail'])
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
    $q = "UPDATE user SET userName='$n', userPassword='$p', userPhoneNo='$ph', 
    userAddress='$a',FullName='$FN' WHERE userEmail='$e' LIMIT 1";

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