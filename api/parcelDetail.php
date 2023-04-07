<?php
    include("db_connect.php");
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: Content-Type");
    $id = mysqli_real_escape_string($connect, $_GET['id']);

    $q = "SELECT * FROM parcel WHERE parcelID = '$id'";
    $result = @mysqli_query($connect, $q);
    if ($result) {
        $parcel = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $q1 = @mysqli_query($connect,"SELECT * FROM tracking WHERE trackingNo='".$parcel['trackingNumber']."'");
        $track = mysqli_fetch_array($q1, MYSQLI_ASSOC);
        echo "SUCCESS:";
        echo $track['status'].';'.$track['inTransitLoc'].';'.$track['pickupLoc'].';'.$track['deliveryDate'].';'.$parcel['senderName'].';'.
        $parcel['senderPhoneNo'].';'.$parcel['senderAddress'].';'.$parcel['receiverName'].';'.$parcel['receiverPhoneNo'].
        ';'.$parcel['receiverAddress'].';'.$parcel['detail'].';'.$parcel['weight'].';'.$parcel['value'].';'.$parcel['payBy'].';'.$parcel['trackingNumber'];
        mysqli_free_result($result);
    } else {
        echo 'ERROR:';
        echo mysqli_error($connect) . ', Query: ' . $q;
    }
    mysqli_close($connect);
?>