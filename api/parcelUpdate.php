<?php
include("db_connect.php");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id = mysqli_real_escape_string($connect, trim($_POST['id']));
    $track = mysqli_real_escape_string($connect, trim($_POST['trackingNo']));
    $s = mysqli_real_escape_string($connect, trim($_POST['status']));
    $tl = mysqli_real_escape_string($connect, trim($_POST['transitLoc']));
    $pl = mysqli_real_escape_string($connect, trim($_POST['pickLoc']));
    $date = mysqli_real_escape_string($connect, trim($_POST['date']));
    $sn = mysqli_real_escape_string($connect, trim($_POST['senderName']));
    $sp = mysqli_real_escape_string($connect, trim($_POST['senderPhoneNo']));
    $sa = mysqli_real_escape_string($connect, trim($_POST['senderAddress']));
    $rn = mysqli_real_escape_string($connect, trim($_POST['receiverName']));
    $rp = mysqli_real_escape_string($connect, trim($_POST['receiverPhoneNo']));
    $ra = mysqli_real_escape_string($connect, trim($_POST['receiverAddress']));
    $d = mysqli_real_escape_string($connect, trim($_POST['detail']));
    $w = mysqli_real_escape_string($connect, trim($_POST['weight']));
    $v = mysqli_real_escape_string($connect, trim($_POST['value']));
    $pb = mysqli_real_escape_string($connect, trim($_POST['payBy']));

    //register the user in the database
    //make the query
    $result = @mysqli_query($connect, "UPDATE parcel SET detail='$d', senderName='$sn', senderPhoneNo='$sp', 
    senderAddress='$sa', receiverName='$rn', receiverPhoneNo='$rp', receiverAddress='$ra',weight='$w', 
    value='$v', payBy='$pb' WHERE parcelID='$id' LIMIT 1");
    @mysqli_query($connect,"UPDATE tracking SET status='$s', pickupLoc='$pl', inTransitLoc='$tl', deliveryDate='$date' WHERE trackingNo='$track' LIMIT 1");

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