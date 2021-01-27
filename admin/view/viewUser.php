
<?php
if(isset($_POST["user_id"]))
{


    $output = '';
    $connect = mysqli_connect("localhost", "root", "", "admin");
    mysqli_set_charset($connect ,'utf8');
    $query = "SELECT * FROM users WHERE user_id = '".$_POST["user_id"]."'";
    $result = mysqli_query($connect, $query);
    $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';
    while($row = mysqli_fetch_assoc($result))
    {
        $output .= ' 

 
 
  
                <tr>  
                     <td width="30%"><label>الاسم</label></td>  
                     <td width="70%">'.$row["name"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>البريد الالكتروني</label></td>  
                     <td width="70%">'.$row["email"].'</td>  
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
