
<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "admin");
if(isset($_POST["addvertise_id"]))
{
    $query = "SELECT * FROM addvertise WHERE addvertise_id = '".$_POST["addvertise_id"]."'";
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_assoc($result);
    echo json_encode($row);
}
?>