<?php
    //connect to server
    $connect = mysqli_connect("localhost", "root","" , "goparcel");
    if (!$connect){
        die ( "ERROR: " .mysqli_connect_error());
    }
?>