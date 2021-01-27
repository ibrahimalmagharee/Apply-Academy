
<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "admin");
if(isset($_POST["video_id"]))
{
    $query = "SELECT * FROM video WHERE video_id = '".$_POST["video_id"]."'";
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_assoc($result);
    echo json_encode($row);
}
?>