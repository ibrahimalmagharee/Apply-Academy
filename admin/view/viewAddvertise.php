
<?php
if(isset($_POST["addvertise_id"]))
{


    $output = '';
    $connect = mysqli_connect("localhost", "root", "", "admin");
    mysqli_set_charset($connect ,'utf8');
    $query = "SELECT * FROM addvertise WHERE addvertise_id = '".$_POST["addvertise_id"]."'";
    $result = mysqli_query($connect, $query);
    $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';
    while($row = mysqli_fetch_array($result))
    {
        $output .= ' 

 
 
  
                <tr>  
                     <td width="30%"><label>العنوان</label></td>  
                     <td width="70%">'.$row["title"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>تفاصيل الاعلان</label></td>  
                     <td width="70%">'.$row["details"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>صورة الاعلان</label></td>  
                     <td width="70%">'.$row["img"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>تاريخ النشر</label></td>  
                     <td width="70%">'.$row["publish_date"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>تفعيل الاعلان</label></td>  
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
