<?php
$connect = mysqli_connect("localhost", "root", "", "admin");

if($_POST['user_id']){

    $user_id = $_POST['user_id'];
    $query = "DELETE FROM users WHERE user_id = $user_id";
    $result=mysqli_query($connect, $query);
    if(isset($result)) {
        echo "YES";
    } else {
        echo "NO";
    }


}


?>