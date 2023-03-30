


function getState($stateCode)
{
    if ($stateCode >= 1000 && $stateCode <= 2000)
        return "Perlis";
    else if ($stateCode >= 5000 && $stateCode <= 9810)
        return "Kedah";
    else if ($stateCode >= 10000 && $stateCode <= 14400)
        return "Pulau Pinang";
    else if ($stateCode >= 20000 && $stateCode <= 24300)
        return "Terengganu";
    else if ($stateCode >= 93000 && $stateCode <= 98859)
        return "Sarawak";
    else if ($stateCode >= 88000 && $stateCode <= 91309)
        return "Sabah";
    else if ($stateCode >= 15000 && $stateCode <= 18500)
        return "Kelantan";
    else if ($stateCode >= 70000 && $stateCode <= 73509)
        return "Negeri Sembilan";
    else if ($stateCode >= 79000 && $stateCode <= 86900)
        return "Johor";
    else if ($stateCode >= 75000 && $stateCode <= 78309)
        return "Melaka";
    else if ($stateCode >= 30000 && $stateCode <= 36810)
        return "Perak";
    else if ($stateCode >= 62300 && $stateCode <= 62988)
        return "Putrajaya";
    else if ($stateCode >= 87000 && $stateCode <= 87033)
        return "Labuan";
    else if (($stateCode >= 50000 && $stateCode <= 60000) || $stateCode == 68100)
        return "Kuala Lumpur";
    else if (($stateCode >= 40000 && $stateCode <= 48300) || ($stateCode >= 63000 && $stateCode <= 68100))
        return "Selangor";
    else if (($stateCode >= 25000 && $stateCode <= 28800) || ($stateCode >= 39000 && $stateCode <= 39200)
        || ($stateCode >= 28000 && $stateCode <= 28350) || $stateCode == 49000 || $stateCode == 69000
    )
        return "Pahang";
    else {
        return false;
    }
}

let t = {}
for (let index = 0; index < 99999; index++) {
    let states = Object.keys(t)
    states.indexOf(getState(index)) === -1 ? t[getState(index)] = index : undefined
    // getState(index)  ? t.push(`${index} ${getState(index)}`) : undefined
}

console.log(t)