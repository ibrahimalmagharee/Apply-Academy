<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'admin';
$conn = mysqli_connect($host, $user, $pass, $db);
mysqli_set_charset($conn,'utf8');
mysqli_query($conn,"SET NAMES 'utf8'");

if(isset($_POST["action"])) {
// View
    if($_POST["action"] == "fetch")
    {
        mysqli_set_charset($conn, 'utf8');
        $select = "SELECT addvertise_id,title FROM `addvertise`";
        $addvertise = mysqli_query($conn, $select);
        $output = '
   <table class="table table-bordered table-responsive">  
   <thead>
    <tr>  
          <td width="70%"> عنوان الاعلان</td>  
          <td width="15%">تعديل</td>  
          <td width="15%">عرض</td>  
          <td width="15%">حذف</td>  
     </tr> 
     </thead>
  ';
        while($row = mysqli_fetch_array($addvertise))
        {
            $output .= '

         <tr>  
              <td>' . $row["title"] . '</td>  
              <td><input type="button" name="edit" value="تعديل" id="'.$row['addvertise_id'].'" class="btn btn-info btn-xs edit_data btn-warning" /></td>  
              <td><input type="button" name="view" value="عرض" id="'.$row['addvertise_id'].'" class="btn btn-info btn-xs view_data btn-secondary" /></td>  
              <td><input type="button" name="delete" value="حذف" id="'.$row['addvertise_id'].'" class="btn btn-info bt-xs delete_data btn-danger" /></td>  
         </tr>
   ';
        }
        $output .= '</table>';
        echo $output;
    }

    // Insert

    if ($_POST["action"] == "insert") {
        $title = $_POST['title'];

        $details = $_POST['details'];

        $publish_date = $_POST['publish_date'];

        if (isset($_POST['is_active'])) {
            $is_active = $_POST['is_active'];
        }

        $file = $_FILES["image"]["name"];

        $sql_course = "SELECT course_id,name FROM `course` where name='$title'";
        $course = mysqli_query($conn, $sql_course);

        while ($rows = mysqli_fetch_assoc($course)) {
            $course_id = $rows['course_id'];
        }

        $sql = "INSERT INTO `addvertise` (title,details,img,publish_date,is_active,course_id) VALUES ('$title', '$details', '$file', '$publish_date', '$is_active','$course_id')";
        if (mysqli_query($conn, $sql)) {

        }
    }

    // Update

    if ($_POST["action"] == "update") {
        $addvertise_id = $_POST['addvertise_id'];
        $title = $_POST['title'];

        $details = $_POST['details'];

        $publish_date = $_POST['publish_date'];

        if (isset($_POST['is_active'])) {
            $is_active = $_POST['is_active'];
        }

        $file = $_FILES["image"]["name"];

        $sql_course = "SELECT course_id,name FROM `course` where name='$title'";
        $course = mysqli_query($conn, $sql_course);

        while ($rows = mysqli_fetch_assoc($course)) {
            $course_id = $rows['course_id'];
        }

        $sql = "UPDATE addvertise SET title='$title', details='$details', img='$file', publish_date='$publish_date', is_active='$is_active', course_id='$course_id'  WHERE addvertise_id=$addvertise_id";
        if (mysqli_query($conn, $sql)) {

        }


    }
}

?>



