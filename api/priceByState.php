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

function getDirection($stateFrom, $stateTo)
{
    $north = array('North','Perlis','Kedah','Penang','Perak');
    $east = array('East','Kelantan','Terengganu','Pahang');
    $south = array('South','Johor','Melaka');
    $west = array('West','Selangor','Negeri Sembilan','Putrjaya','Kuala Lumpur');
    $penisula = array('Penisula','labuan','Sarawak','Sabah');
    
    $bearing = array($north,$east,$south,$west,$penisula);
    foreach($bearing as $direction){
        foreach($direction as $states){
            if($states == getState($stateFrom)){
                $stateFrom = $direction[0];
            }
            if($states == getState($stateTo)){
                $stateTo = $direction[0];
            }
        }
    }
    return "$stateFrom to $stateTo";
}

// Check if the "name" parameter is present in the query string
if (isset($_GET['stateFrom']) && isset($_GET['stateTo'])) {
    // Get the value of the "name" parameter
    $stateFrom = $_GET['stateFrom'];
    $stateTo = $_GET['stateTo'];
    // echo $stateFrom;
    // echo "From: " . getState($stateFrom) . " and send to " . getState($stateTo);
    $result = getDirection($stateFrom,$stateTo);
    if($result == "North to North" || $result == "East to East" || $result == "South to South" || $result == "West to West" || $result == "Penisula to Penisula") {
        $priceParcel = 7.00;
    }
    else if ($result == "North to East" || $result == "East to North" || $result == "North to West" 
    || $result == "West to North" || $result == "East to South" || $result == "South to East" 
    || $result == "South to West" || $result == "West to South") {
        $priceParcel = 9.00;
    }
    else if ($result == "West to East" || $result == "East to West" || $result == "North to South" || $result == "South to North"){
        $priceParcel = 12.00;
    }
    else if ($result == "North to Penisula" || $result == "East to Penisula" || $result == "South to Penisula" || $result == "West to Penisula" || $result == "Penisula to North" || $result == "Penisula to East" || $result == "Penisula to South" || $result == "Penisula to West") {
        $priceParcel = 16.00;
    }
    else {
        echo "ERROR:STATE";
        exit();
    }
    echo "SUCCESS:";
    echo $priceParcel;
} else {
    // Return an error message if the "name" parameter is not present
    echo 'ERROR:GET';
}
