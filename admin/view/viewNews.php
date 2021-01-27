
<?php
if(isset($_POST["news_id"]))
{


    $output = '';
    $connect = mysqli_connect("localhost", "root", "", "admin");
    mysqli_set_charset($connect ,'utf8');
    mysqli_set_charset($connect,'utf8');
    mysqli_query($connect,"SET NAMES 'utf8'");
    mysqli_set_charset($connect ,'utf8');


    mysqli_set_charset($connect ,'utf8');
    $query = "SELECT * FROM news WHERE news_id = '".$_POST["news_id"]."'";
    $result = mysqli_query($connect, $query);
    $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';
    while($row = mysqli_fetch_array($result))
    {
        $output .= ' 

 
 
  
                <tr>  
                     <td width="30%"><label>عنوان الخبر</label></td>  
                     <td width="70%">'.$row["title"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>تفاصيل الخبر</label></td>  
                     <td width="70%">'.$row["details"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>صورة الخبر</label></td>  
                     <td width="70%">'.$row["img"].'</td> 
                </tr>  
                <tr>  
                     <td width="30%"><label>تاريخ النشر</label></td>  
                     <td width="70%">'.$row["publish_date"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>تفعيل الخبر</label></td>  
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
