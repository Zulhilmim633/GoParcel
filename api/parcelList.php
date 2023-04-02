<?php
include("db_connect.php");
?>
<?php
$q = "SELECT detail, shippingType, adminPhoneNo FROM parcel";

$result = @mysqli_query($connect, $q);
if ($result) {
    echo '<table>
    <tr>
        <th>Detail</th>
        <th>Username</th>
        <th>Phone No</th>
        <th>Edit</th>
        <th>Delete</th>
        </tr>';

    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        echo '<tr>
        <td>' . $row['adminEmail'] . '</td>
        <td>' . $row['adminName'] . '</td>
        <td>' . $row['adminPhoneNo'] . '</td>
        <td><a href="./adminProfile.html?user=' . $row['adminName'] . '">EDIT</a></td>
        <td onclick="ask(\''.$row['adminName'].'\')" style="cursor:pointer;">DELETE</td>
        </tr>';
    }
    echo "</table>";

    mysqli_free_result($result);
} else {
    echo '<p class = "error">The current user could not be retrieved. 
    We apologize for any inconvenience.</p>';

    echo '<p>' . mysqli_error($connect) . '<br>Query: ' . $q . '</p>';
}
mysqli_close($connect);
?>