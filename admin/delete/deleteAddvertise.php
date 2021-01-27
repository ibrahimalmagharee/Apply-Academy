<?php
$connect = mysqli_connect("localhost", "root", "", "admin");

if($_POST['addvertise_id']){

    $addvertise_id = $_POST['addvertise_id'];
        $query = "DELETE FROM addvertise WHERE addvertise_id = $addvertise_id";
    $result=mysqli_query($connect, $query);
    if(isset($result)) {
        echo "YES";
    } else {
        echo "NO";
    }


}


?>