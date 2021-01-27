<?php
$connect = mysqli_connect("localhost", "root", "", "admin");

if($_POST['course_id']){

    $course_id = $_POST['course_id'];
    $query = "DELETE FROM course WHERE course_id = $course_id";
    $result=mysqli_query($connect, $query);
    if(isset($result)) {
        echo "YES";
    } else {
        echo "NO";
    }


}


?>