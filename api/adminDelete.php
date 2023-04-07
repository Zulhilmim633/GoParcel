<?php
include("db_connect.php");
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (filter_var($_POST['user'], FILTER_VALIDATE_EMAIL)) {
        $e = mysqli_real_escape_string($connect, $_POST['user']);
        $q = "DELETE FROM admin WHERE adminEmail = '$e' LIMIT 1";
    } else {
        $n = mysqli_real_escape_string($connect, $_POST['user']);
        $q = "DELETE FROM admin WHERE adminName = '$n' LIMIT 1";
    }
    $result = @mysqli_query($connect, $q);

    if (mysqli_affected_rows($connect) == 1) {
        echo 'DELETED';
    } else {
        echo 'ERROR:';
        echo mysqli_error($connect);
    }
    mysqli_close($connect);
}
?>