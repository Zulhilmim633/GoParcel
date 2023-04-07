<?php
include("db_connect.php");
?>
<?php
$id = mysqli_real_escape_string($connect, $_POST['parcelID']);
$q = "SELECT * FROM parcel WHERE parcelID = '$id'";

$result = @mysqli_query($connect, $q);
if ($result) {
    echo '<table>
    <tr>
        <th style="width: 14em;">Sender</th>
        <th>Phone No</th>
        <th style="width:19em;">From</th>
        <th style="width: 14em;">Receiver</th>
        <th>Phone No</th>
        <th style="width:19em;">To</th>
        <th>Pay by</th>
        <th>Need to Pay</th>
        <th>Update Status</th>
        <th>Delete</th>
    </tr>';

    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        echo '<tr>
        <td>' . $row['senderName'] . '</td>
        <td>' . $row['senderPhoneNo'] . '</td>
        <td>' . $row['senderAddress'] . '</td>
        <td>' . $row['receiverName'] . '</td>
        <td>' . $row['receiverPhoneNo'] . '</td>
        <td>' . $row['receiverAddress'] . '</td>
        <td>' . $row['payBy'] . '</td>
        <td>' . $row['value'] . '</td>
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