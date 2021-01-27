<?php
session_start();

$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'admin';
$conn = mysqli_connect($host, $user, $pass, $db);
mysqli_query($conn,"SET NAMES 'utf8'");
mysqli_set_charset($conn,'utf8');



if(isset($_POST['login'])){
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    if($email != '' && $password != ''){
        $sql = "SELECT * FROM register WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);

        $user = mysqli_fetch_assoc($result);

         $user['email'] ;
         $user['password'] ;
         $user_id = $user['user_id'] ;
         $_SESSION['user_id'] = $user_id;

        if( $user['password'] == $password ) {

            $_SESSION['login'] = 'true';

           header("Location: index.php");
        }
    }else{
        header("Location: login.php");

    }




}else{

}


?>


<!DOCTYPE html>
<html dir="rtl" lang="ar">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>تسجيل الدخول</title>


  <link rel="stylesheet" href="login/css/style.css">

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
              <div class="auth-form-dark text-left p-5">
                <h2 style="text-align: center; font-size: 1.5em">تسجيل الدخول</h2>

                  <form method="post" action="" class="pt-5">
                    <div class="form-group">
                      <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="ادخل البريد الالكتروني" style="margin-top: 1em;">
                        <div class="valid-feedback">

                        </div>
                        <div class="invalid-feedback">
                            الرجاء ادخل الايميل بشكل صحيح
                        </div>
                      <i class="mdi mdi-account"></i>

                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control" id="password" name="password" placeholder="ادخل كلمة المرور" >
                        <div class="valid-feedback">

                        </div>
                        <div class="invalid-feedback">
                            الرجاء ادخل كلمة المرور بشكل صحيح
                        </div>
                        <i class="mdi mdi-eye"></i>
                    </div>
                    <div class="mt-5">
                        <button type="submit" class="btn btn-block btn-warning btn-lg font-weight-medium"  name="login" >
                                   تسجيل الدخول
                        </button>
                    </div>
                    <div class="mt-3 text-center">
                      <a href="forget.php" class="auth-link text-white" >نسيت كلمة المرور</a>
                    </div>
                    <div class="mt-3 text-center">
                      <a href="register.php" class="auth-link text-white" >مستخدم جديد</a>
                    </div>
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
<script src="js/jquery-3.2.1.slim.min.js"></script>

<script src="js/validator.js"></script>

</body>

</html>
