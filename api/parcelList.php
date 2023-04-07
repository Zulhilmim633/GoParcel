<?php
include("db_connect.php");
?>
<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
$q = "SELECT * FROM parcel";

$result = @mysqli_query($connect, $q);
if ($result) {
    echo '<table>
    <tr>
        <th>Status</th>
        <th style="width: 14em;">Sender</th>
        <th>Phone No</th>
        <th style="width:15em;">From</th>
        <th style="width: 14em;">Receiver</th>
        <th>Phone No</th>
        <th style="width:15em;">To</th>
        <th>Track No</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>';

    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $track = @mysqli_query($connect,"SELECT * FROM tracking WHERE trackingNo='".$row['trackingNumber']."'");
        $r1 = mysqli_fetch_array($track, MYSQLI_ASSOC);
        echo '<tr>
        <td>' . $r1['status'] . '</td>
        <td>' . $row['senderName'] . '</td>
        <td>' . $row['senderPhoneNo'] . '</td>
        <td>' . $row['senderAddress'] . '</td>
        <td>' . $row['receiverName'] . '</td>
        <td>' . $row['receiverPhoneNo'] . '</td>
        <td>' . $row['receiverAddress'] . '</td>
        <td>' . $row['trackingNumber'] . '</td>
        <td><a href="./parcelEdit.html?id=' . $row['parcelID'] . '">Update</a></td>
        <td onclick="ask(\'' . $row['parcelID'] . '\')" style="cursor:pointer;">DELETE</td>
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