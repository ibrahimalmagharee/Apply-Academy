
<?php
if(isset($_POST["video_id"]))
{


    $output = '';
    $connect = mysqli_connect("localhost", "root", "", "admin");
    mysqli_set_charset($connect ,'utf8');
    $query = "SELECT * FROM video WHERE video_id = '".$_POST["video_id"]."'";
    $result = mysqli_query($connect, $query);
    $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';
    while($row = mysqli_fetch_assoc($result))
    {
        $output .= ' 

 
 
  
                <tr>  
                     <td width="30%"><label>العنوان</label></td>  
                     <td width="70%">'.$row["title"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>رابط الفيديو</label></td>  
                     <td width="70%">'.$row["url"].'</td>  
                </tr> 
                <tr>  
                     <td width="30%"><label>الوصف</label></td>  
                     <td width="70%">'.$row["description"].'</td>  
                </tr> 
                <tr>  
                     <td width="30%"><label>تفعيل الفيديو</label></td>  
                     <td width="70%">'.$row["is_active"].'</td>  
                </tr>  
                
           ';
    }
    $output .= '  
           </table>  
      </div>  
      ';
    echo $output;

}

?>
