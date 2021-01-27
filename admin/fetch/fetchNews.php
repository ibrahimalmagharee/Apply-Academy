
<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "admin");
if(isset($_POST["news_id"]))
{
    $query = "SELECT * FROM news WHERE news_id = '".$_POST["news_id"]."'";
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_assoc($result);
    echo json_encode($row);
}
?>