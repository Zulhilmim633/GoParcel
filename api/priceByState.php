<?php

function getState($stateCode)
{
    if ($stateCode >= 1000 && $stateCode <= 2000)
        return "Perlis";
    elseif ($stateCode >= 5000 && $stateCode <= 9810)
        return "Kedah";
    elseif ($stateCode >= 10000 && $stateCode <= 14400)
        return "Penang";
    elseif ($stateCode >= 20000 && $stateCode <= 24300)
        return "Terengganu";
    elseif ($stateCode >= 93000 && $stateCode <= 98859)
        return "Sarawak";
    elseif ($stateCode >= 88000 && $stateCode <= 91309)
        return "Sabah";
    elseif ($stateCode >= 15000 && $stateCode <= 18500)
        return "Kelantan";
    elseif ($stateCode >= 70000 && $stateCode <= 73509)
        return "Negeri Sembilan";
    elseif ($stateCode >= 79000 && $stateCode <= 86900)
        return "Johor";
    elseif ($stateCode >= 75000 && $stateCode <= 78309)
        return "Melaka";
    elseif ($stateCode >= 30000 && $stateCode <= 36810)
        return "Perak";
    elseif ($stateCode >= 62300 && $stateCode <= 62988)
        return "Putrajaya";
    elseif ($stateCode >= 87000 && $stateCode <= 87033)
        return "Labuan";
    elseif (($stateCode >= 50000 && $stateCode <= 60000) || $stateCode == 68100)
        return "Kuala Lumpur";
    elseif (($stateCode >= 40000 && $stateCode <= 48300) || ($stateCode >= 63000 && $stateCode <= 68100))
        return "Selangor";
    elseif (($stateCode >= 25000 && $stateCode <= 28800) || ($stateCode >= 39000 && $stateCode <= 39200)
        || ($stateCode >= 28000 && $stateCode <= 28350) || $stateCode == 49000 || $stateCode == 69000
    )
        return "Pahang";
    else {
        return "Cannot find accurate State by postcode";
    }
}

$north = ['Perlis','Kedah','Penang','Perak'];
$east = ['Kelantan','Terengganu','Pahang'];
$south = ['Johor','Melaka'];
$west = ['Selangor','Negeri Sembilan','Putrjaya'];
$east_penisular = ['labuan','Sarawak','Sabah'];

function getPrice($stateFrom, $stateTo)
{
}

// Check if the "name" parameter is present in the query string
if (isset($_GET['stateFrom']) && isset($_GET['stateTo'])) {
    // Get the value of the "name" parameter
    $stateFrom = $_GET['stateFrom'];
    $stateTo = $_GET['stateTo'];
    // echo $stateFrom;
    echo "From: " . getState($stateFrom) . " and send to " . getState($stateTo);
} else {
    // Return an error message if the "name" parameter is not present
    echo '{"result":"error","data":[],"reasons":"required stateFrom and stateTo"}';
}
