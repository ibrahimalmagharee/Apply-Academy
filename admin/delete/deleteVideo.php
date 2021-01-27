<?php
$connect = mysqli_connect("localhost", "root", "", "admin");

if($_POST['video_id']){

    $video_id = $_POST['video_id'];
    $query = "DELETE FROM video WHERE video_id = $video_id";
    $result=mysqli_query($connect, $query);
    if(isset($result)) {
        echo "YES";
    } else {
        echo "NO";
    }


}


?>