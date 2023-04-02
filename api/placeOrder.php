<?php
include("db_connect.php");
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $d = mysqli_real_escape_string($connect, trim($_POST['detail']));
        $sT = mysqli_real_escape_string($connect, trim($_POST['shippingType']));
        $sN = mysqli_real_escape_string($connect, trim($_POST['senderName']));
        $sA = mysqli_real_escape_string($connect, trim($_POST['senderAddress']));
        $sP = mysqli_real_escape_string($connect, trim($_POST['senderPhoneNo']));
        $rN = mysqli_real_escape_string($connect, trim($_POST['receiverName']));
        $rA = mysqli_real_escape_string($connect, trim($_POST['receiverAddress']));
        $rP = mysqli_real_escape_string($connect, trim($_POST['receiverPhoneNo']));
        $w = mysqli_real_escape_string($connect, trim($_POST['weight']));
        $v = mysqli_real_escape_string($connect, trim($_POST['value']));
        $pay = mysqli_real_escape_string($connect, trim($_POST['payBy']));

    //register the user in the database
    //make the query
    $q = "INSERT INTO parcel (parcelID,detail,shippingType,senderName,
    senderAddress,senderPhoneNo,receiverName,receiverAddress,receiverPhoneNo
    ,weight,value,payBy,trackingNumber) 
    VALUES ('','$d','$sT','$sN','$sA','$sP','$rN','$rA','$rP','$w','$v','$pay','')";

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