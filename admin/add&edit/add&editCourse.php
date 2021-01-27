<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'admin';
$conn = mysqli_connect($host, $user, $pass, $db);
mysqli_set_charset($conn,'utf8');
mysqli_query($conn,"SET NAMES 'utf8'");



if(!empty($_POST)){

    $name = $_POST['name'];

    $target = $_POST['target'];

    $subject = $_POST['subject'];

    $objects = $_POST['objects'];

    $period = $_POST['period'];

    $outcomes = $_POST['outcomes'];

    $advantage = $_POST['advantage'];

    $msg = '';
    if($_POST['course_id'] != ''){
        $course_id = $_POST['course_id'];
        $sql = "UPDATE course SET name='$name', target='$target', subject='$subject', objects='$objects', period='$period', outcomes='$outcomes', advantage='$advantage' WHERE course_id=$course_id";
        $msg = 'updated done';

    }else{
        $sql = "INSERT INTO `course` (name,target,subject,objects,period,outcomes,advantage) VALUES ('$name', '$target', '$subject', '$objects', '$period', '$outcomes', '$advantage')";
        $msg = 'added done';
    }
    $output = '';
    if (mysqli_query($conn, $sql)) {

        mysqli_set_charset($conn ,'utf8');
        $select = "SELECT course_id,name FROM `course`";
        $course = mysqli_query($conn,$select);
        $output .= '  
                <table class="table table-bordered table-responsive">  
                     <tr>  
                          <td width="70%">اسم الدورة</td>  
                          <td width="15%">تعديل</td>  
                          <td width="15%">عرض</td>  
                          <td width="15%">حذف</td>  
                     </tr>  
           ';
        while ($row = mysqli_fetch_array($course)) {
            $output .= '  
                     <tr>  
                          <td>' . $row["name"] . '</td>  
                          <td><input type="button" name="edit" value="تعديل" id="' . $row['course_id'] . '" class="btn btn-info btn-xs edit_data btn-warning" /></td>  
                          <td><input type="button" name="view" value="عرض" id="' . $row['course_id'] . '" class="btn btn-info btn-xs view_data btn-secondary" /></td>  
                          <td><input type="button" name="delete" value="حذف" id="' . $row['course_id'] . '" class="btn btn-info btn-xs delete_data btn-danger" /></td>  
                     </tr>  
                ';
        }
        $output .= '</table>';
    }
    echo $output;





}else{
    echo "error";
}

