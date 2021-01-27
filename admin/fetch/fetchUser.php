
<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "admin");
if(isset($_POST["user_id"]))
{
    $query = "SELECT * FROM users WHERE user_id = '".$_POST["user_id"]."'";
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_assoc($result);
    echo json_encode($row);
}
?>