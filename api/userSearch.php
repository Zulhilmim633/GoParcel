<?php
include("db_connect.php");
?>
<?php
$n = mysqli_real_escape_string($connect, $_POST['userName']);
$q = "SELECT userEmail, userName, FullName, userAddress, userPhoneNo FROM user WHERE userName = '$n'";

$result = @mysqli_query($connect, $q);
if ($result) {
    echo '<table>
    <tr>
        <th>Email</th>
        <th>Username</th>
        <th>Full Name</th>
        <th>Address</th>
        <th>Phone No</th>
        <th>Edit</th>
        <th>Delete</th>
        </tr>';

    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        echo '<tr>
        <td>' . $row['userEmail'] . '</td>
        <td>' . $row['userName'] . '</td>
        <td>' . $row['FullName'] . '</td>
        <td>' . $row['userAddress'] . '</td>
        <td>' . $row['userPhoneNo'] . '</td>
        <td><a href="./userProfile.html?user=' . $row['userName'] . '">EDIT</a></td>
        <td onclick="ask(\''.$row['userName'].'\')" style="cursor:pointer;">DELETE</td>
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