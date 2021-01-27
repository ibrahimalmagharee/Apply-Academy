<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'admin';
$conn = mysqli_connect($host, $user, $pass, $db);
mysqli_query($conn,"SET NAMES 'utf8'");
mysqli_set_charset($conn,'utf8');

if(!mysqli_connect_errno()) {

    if(isset($_POST['save'])){

        $email = $_POST['email'];
        $password = $_POST['password'];



        if($email != '' && $password != ''  ){
            $sql = "UPDATE `register` SET `password` = '$password' WHERE email = '$email'";

            echo '<script language="javascript" class="alert alert-success"  >';
            echo 'alert("تم تغيير كلمة المرور بنجاح")';
            echo '</script>';

            if(mysqli_query($conn, $sql)){
                $msg = 'The addition process is done' ;
            } else {
                $msg = 'Some problem here :3';
            }
            header("Location: login.php");
        } else {
            echo '<script language="javascript" class="alert alert-success"  >';
            echo 'alert("ادخل الايميل ")';
            echo '</script>';
        }

    }



}else{
    die("error".mysqli_connect_error());
}


?>

<!DOCTYPE html>
<html dir="rtl" lang="ar">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>نسيت كلمة المرور</title>
    <!-- plugins:css -->

    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="login/css/style.css">
    <!-- endinject -->
</head>

<body>
<style>
    .invalid-feedback{
        text-align: center;
    }
</style>
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper">
        <div class="row">
            <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-full-bg">
                <div class="row w-100">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-dark text-left p-5" >
                            <h2 style="text-align: center; font-size: 1.5em">ادخل كلمة مرور جديدة</h2>

                            <form method="post" action="" class="pt-5" style="text-align: center;">


                                        <div class="form-group">
                                            <input type="email" name="email" id="email" class="form-control" placeholder="البريد الالكتروني">
                                            <div class="valid-feedback">

                                            </div>
                                            <div class="invalid-feedback">
                                                الرجاء ادخل الايميل بشكل صحيح
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <input type="password" name="password" id="password" class="form-control" placeholder="كلمة المرور">
                                            <div class="valid-feedback">

                                            </div>
                                            <div class="invalid-feedback">
                                                الرجاء ادخل كلمة المرور بشكل صحيح
                                            </div>
                                        </div>
                                        <button type="submit"  name="save" class="btn btn-primary btn-flat m-b-15" style=" text-align: center ; margin-top: 10% ">حفظ</button>

                                    </form>

                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- row ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->

<!-- endinject -->
<!-- inject:js -->
<script src="login/js/off-canvas.js"></script>
<script src="login/js/misc.js"></script>
<!-- endinject -->
</body>

</html>



