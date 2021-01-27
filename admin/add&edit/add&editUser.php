<?php
include 'db.php';



if(isset($_GET['edit'])) {
    $id = $_GET['edit'];

    $sql = "SELECT * FROM std WHERE id=$id";

    $result = mysqli_query($conn, $sql);
    $rows = mysqli_fetch_assoc($result);

    $name  = $rows['name'];
    $age   = $rows['age'];
    $level = $rows['level'];
    $email  = $rows['email'];
    $oldpass = $rows['password'];
    //var_dump($rows);
    //echo $rows['name'];
}




if(isset( $_POST['add'] )) {
    $name  = $_POST['fname'];
    $age   = $_POST['age'];
    $level = $_POST['level'];
    $email = $_POST['email'];
    $pass  = sha1($_POST['pass']);

    if( $name != '' && $age != '' && $level != '' && $email != '' && $pass != '' ) {

        $sql = "INSERT INTO std (name, age, level, email, password) VALUES ('$name', $age, $level, '$email', '$pass')";

        if( mysqli_query($conn, $sql) ){
            echo "Student Added successfuly";
        }else {
            echo "Student not Added!!";
        }

    }else {
        echo "All Feiled Required!!";
    }
}

if(isset($_POST['edit'])) {
    $name  = $_POST['fname'];
    $age   = $_POST['age'];
    $level = $_POST['level'];
    $email = $_POST['email'];
    $pass  = $_POST['pass'];

    if($pass != '') {
        $pass  = sha1($_POST['pass']);
    }else {
        $pass = $oldpass;
    }

    $sql = "UPDATE std SET name='$name', age=$age, level=$level, email='$email', password='$pass' WHERE id=$id";

    mysqli_query($conn, $sql);

    header("Location: viewstd.php");

}






include 'header.php';
?>
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 mt-5">

                <form method="post" action="">
                    <?php
                    if(isset($_GET['edit'])) {
                        echo "<h2> Edit $name Profile</h2>";
                    }else {
                        echo "<h2>Add New Student</h2>";
                    }
                    ?>

                    <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" name="fname" value="<?php if(isset($id)) { echo $name; } ?>" class="form-control" placeholder="Full Name">
                    </div>

                    <div class="form-group">
                        <label>Age</label>
                        <input type="text" name="age" value="<?php if(isset($id)) { echo $age; } ?>"  class="form-control" placeholder="Age">
                    </div>

                    <div class="form-group">
                        <label>Level</label>
                        <input type="text" name="level" value="<?php if(isset($id)) { echo $level; } ?>"  class="form-control" placeholder="Level">
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" value="<?php if(isset($id)) { echo $email; } ?>"  class="form-control" placeholder="Email">
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="pass" class="form-control" placeholder="Password">
                    </div>

                    <button type="submit" name="<?php if(isset($id)) { echo 'edit'; } else { echo 'add'; } ?>" class="btn btn-primary btn-lg btn-block">
                        <?php
                        if(isset($id)) {
                            echo "Edit Profile";
                        }else {
                            echo "Add Student";
                        }
                        ?>

                    </button>
                </form>

            </div>
        </div>
    </div>

<?php
include 'footer.php';
?>
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

    $email = $_POST['email'];

    $password = $_POST['password'];
    $msg = '';
    if($_POST['user_id'] != ''){
        $user_id = $_POST['user_id'];
        $sql = "UPDATE users SET name='$name', email='$email', password='$password' WHERE user_id=$user_id";
        $msg = 'updated done';

    }else{
        $sql = "INSERT INTO `users` (name,email,password) VALUES ('$name', '$email', '$password')";
        $msg = 'added done';
    }
    $output = '';
    if (mysqli_query($conn, $sql)) {
        mysqli_set_charset($conn ,'utf8');
        $select = "SELECT user_id,name FROM `users`";
        $user = mysqli_query($conn,$select);
        $output .= '  
                <table class="table table-bordered table-responsive">  
                     <tr>  
                          <th width="70%">الاسم</th>  
                          <th width="15%">تعديل</th>  
                          <th width="15%">عرض</th>  
                          <th width="15%">حذف</th>  
                     </tr>  
           ';
        while ($row = mysqli_fetch_array($user)) {
            $output .= '  
                     <tr>  
                          <td>' . $row["name"] . '</td>  
                          <td><input type="button" name="edit" value="تعديل" id="' . $row['user_id'] . '" class="btn btn-info btn-xs edit_data btn-warning" /></td>  
                          <td><input type="button" name="view" value="عرض" id="' . $row['user_id'] . '" class="btn btn-info btn-xs view_data btn-secondary" /></td>  
                          <td><input type="button" name="delete" value="حذف" id="' . $row['user_id'] . '" class="btn btn-info bt-xs delete_data btn-danger" /></td>  
                     </tr>  
                ';
        }
        $output .= '</table>';
    }
    echo $output;





}else{
    echo "error";
}

