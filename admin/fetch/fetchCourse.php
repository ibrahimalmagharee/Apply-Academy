
<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "admin");
if(isset($_POST["course_id"]))
{
    $query = "SELECT * FROM course WHERE course_id = '".$_POST["course_id"]."'";
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_assoc($result);
    echo json_encode($row);
}
?>