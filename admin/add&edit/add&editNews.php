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
        $select = "SELECT news_id,title FROM `news`";
        $news = mysqli_query($conn, $select);
        $output = '
   <table class="table table-bordered table-responsive">  
    <tr>  
          <td width="70%"> عنوان الخبر</td>  
          <td width="15%">تعديل</td>  
          <td width="15%">عرض</td>  
          <td width="15%">حذف</td>  
     </tr> 
  ';
        while($row = mysqli_fetch_array($news))
        {
            $output .= '

         <tr>  
              <td>' . $row["title"] . '</td>  
              <td><input type="button" name="edit" value="تعديل" id="'.$row['news_id'].'" class="btn btn-info btn-xs edit_data btn-warning" /></td>  
              <td><input type="button" name="view" value="عرض" id="'.$row['news_id'].'" class="btn btn-info btn-xs view_data btn-secondary" /></td>  
              <td><input type="button" name="delete" value="حذف" id="'.$row['news_id'].'" class="btn btn-info bt-xs delete_data btn-danger" /></td>  
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
        $sql = "INSERT INTO `news` (title,details,img,publish_date,is_active) VALUES ('$title', '$details', '$file','$publish_date','$is_active')";
        if (mysqli_query($conn, $sql)) {

        }
    }

    // Update

    if ($_POST["action"] == "update") {
        $news_id = $_POST['news_id'];
        $title = $_POST['title'];

        $details = $_POST['details'];

        $publish_date = $_POST['publish_date'];

        if (isset($_POST['is_active'])) {
            $is_active = $_POST['is_active'];
        }

        $file = $_FILES["image"]["name"];
        $sql = "UPDATE news SET title='$title', details='$details', img='$file', publish_date='$publish_date', is_active='$is_active'  WHERE news_id=$news_id";
        if (mysqli_query($conn, $sql)) {

        }


    }
}












?>