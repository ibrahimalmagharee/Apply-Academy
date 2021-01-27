<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'admin';
$conn = mysqli_connect($host, $user, $pass, $db);
mysqli_set_charset($conn,'utf8');
mysqli_query($conn,"SET NAMES 'utf8'");



if(!empty($_POST)){

    $title = $_POST['title'];

    $url = $_POST['url'];

    $description = $_POST['description'];
    if (isset($_POST['is_active'])) {
        $is_active = $_POST['is_active'];
    }
    $msg = '';
    if($_POST['video_id'] != ''){
        $video_id = $_POST['video_id'];
        $sql = "UPDATE video SET title='$title', url='$url', description='$description', is_active='$is_active' WHERE video_id=$video_id";
        $msg = 'updated done';

    }else{
        $sql = "INSERT INTO `video` (title,url,description,is_active) VALUES ('$title', '$url', '$description', '$is_active')";
        $msg = 'added done';
    }
    $output = '';
    if (mysqli_query($conn, $sql)) {
        mysqli_set_charset($conn ,'utf8');
        $select = "SELECT video_id,title FROM `video`";
        $video = mysqli_query($conn,$select);
        $output .= '  
                <table class="table table-bordered table-responsive">  
                     <tr>  
                          <th width="70%">العنوان</th>  
                          <th width="15%">تعديل</th>  
                          <th width="15%">عرض</th>  
                          <th width="15%">حذف</th>  
                     </tr>  
           ';
        while ($row = mysqli_fetch_array($video)) {
            $output .= '  
                     <tr>  
                          <td>' . $row["title"] . '</td>  
                          <td><input type="button" name="edit" value="تعديل" id="' . $row['video_id'] . '" class="btn btn-info btn-xs edit_data btn-warning" /></td>  
                          <td><input type="button" name="view" value="عرض" id="' . $row['video_id'] . '" class="btn btn-info btn-xs view_data btn-secondary" /></td>  
                          <td><input type="button" name="delete" value="حذف" id="' . $row['video_id'] . '" class="btn btn-info bt-xs delete_data btn-danger" /></td>  
                     </tr>  
                ';
        }
        $output .= '</table>';
    }
    echo $output;





}else{
    echo "error";
}

