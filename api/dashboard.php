<?php
    include("db_connect.php");

    $u = "SELECT COUNT(DISTINCT userEmail) AS 'Total User' FROM user";
    $a = "SELECT COUNT(DISTINCT adminEmail) AS 'Total Admin' FROM admin";
    $p = "SELECT COUNT(DISTINCT parcelID) AS 'Total Parcel' FROM parcel";
    $c = "SELECT COUNT(DISTINCT trackingNo) AS 'Completed Parcel' FROM tracking WHERE status = 'Delivered'";

    $tables = [$u, $a, $p, $c];

    foreach($tables as $table){
        $result = mysqli_query($connect, $table);
        echo mysqli_fetch_row($result)[0];
        echo ";";
    }
    mysqli_free_result($result);
    mysqli_close($connect);
    exit();