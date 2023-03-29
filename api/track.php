
<?php
    include("db_connect.php");

    
    if(isset($_POST['id']) or isset($_GET['id']))
    {
        $id = isset($_POST['id']) ? $_POST['id'] : $_GET['id'];
        $id = mysqli_real_escape_string($connect, $id);
        
        $q = "SELECT Sender_Name, Sender_Address, Receiver_Name,
        Receiver_Address, Delivery_date, Parcel_Status 
        FROM parcel WHERE Track_ID = '$id'";

        $result = @mysqli_query($connect, $q);

        if($result)
        {
            
        }
    }
    else
    {
        echo "<p class='req_erorr'>This is api. Required to make a POST or GET of id to get a response</p>";
    }
?>