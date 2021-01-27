<?php
$connect = mysqli_connect("localhost", "root", "", "admin");

if($_POST['news_id']){

    $news_id = $_POST['news_id'];
    $query = "DELETE FROM news WHERE news_id = $news_id";
    $result=mysqli_query($connect, $query);
    if(isset($result)) {
        echo "YES";
    } else {
        echo "NO";
    }


}


?>