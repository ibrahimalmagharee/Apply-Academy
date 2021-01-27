
<?php
if(isset($_POST["course_id"]))
{


    $output = '';
    $connect = mysqli_connect("localhost", "root", "", "admin");
    mysqli_set_charset($connect ,'utf8');
    $query = "SELECT * FROM course WHERE course_id = '".$_POST["course_id"]."'";
    $result = mysqli_query($connect, $query);
    $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';
    while($row = mysqli_fetch_array($result))
    {
        $output .= ' 

 
 
  
                <tr>  
                     <td width="30%"><label>اسم الدورة</label></td>  
                     <td width="70%">'.$row["name"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>الفئة المستهدفة</label></td>  
                     <td width="70%">'.$row["target"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>محاور الدورة</label></td>  
                     <td width="70%">'.$row["subject"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>أهداف الدورة</label></td>  
                     <td width="70%">'.$row["objects"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>مدة الدورة</label></td>  
                     <td width="70%">'.$row["period"].'</td>  
                </tr>
                <tr>  
                     <td width="30%"><label>مخرجات الدورة</label></td>  
                     <td width="70%">'.$row["outcomes"].'</td>  
                </tr> 
                <tr>  
                     <td width="30%"><label>مميزات الدورة</label></td>  
                     <td width="70%">'.$row["advantage"].'</td>  
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
