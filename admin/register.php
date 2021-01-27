<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'admin';
$conn = mysqli_connect($host, $user, $pass, $db);
mysqli_query($conn,"SET NAMES 'utf8'");
mysqli_set_charset($conn,'utf8');

if(!mysqli_connect_errno()) {

    if(isset($_POST['add'])){

        $username = $_POST['username'];

        $email = $_POST['email'];

        $password = $_POST['password'];

        $confirmpassword = $_POST['confirmpassword'];




        $msg = '';

        if($username != '' && $email != '' && $password != ''){
            $sql = "INSERT INTO `register` (username,email,password) VALUES ('$username', '$email', '$password')";

            echo '<script language="javascript" class="alert alert-success"  >';
            echo 'alert("تم التسجيل بنجاح")';
            echo '</script>';

            header("Location: login.php");

            if(mysqli_query($conn, $sql)){
                $msg = 'The addition process is done' ;
            } else {
                $msg = 'Some problem here :3';
            }
        } else {
            echo '<script language="javascript" class="alert alert-success"  >';
            echo 'alert("ادخل جميع الحقول")';
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
  <title>اضافة مستخدم</title>
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
        <div class="content-wrapper full-page-wrapper d-flex align-items-center auth register-full-bg">
          <div class="row w-100">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <h2 style="text-align: center; font-size: 1.5em">مستخدم جديد</h2>
                <form class="pt-4" method="post" action="">

                    <div class="form-group">

                        <input type="text" class="form-control" name="username" id="username" aria-describedby="emailHelp" placeholder="ادخل اسم المستخدم">
                        <div class="valid-feedbackk">

                        </div>
                        <div class="invalid-feedback">
                            الرجاء ادخل اسم المستخدم بشكل صحيح
                        </div>

                        <i class="mdi mdi-account"></i>
                    </div>
                    <div class="form-group">

                      <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="ادخل البريد الالكتروني">
                        <div class="valid-feedback">

                        </div>
                        <div class="invalid-feedback">
                            الرجاء ادخل الايميل بشكل صحيح
                        </div>

                        <i class="mdi mdi-account"></i>
                    </div>
                    <div class="form-group">

                      <input type="password" class="form-control" name="password" id="Password" placeholder="ادخل كلمة المرور">

                        <i class="mdi mdi-eye"></i>
                    </div>
                    <div class="form-group">

                      <input type="password" class="form-control" name="confirmpassword" id="confirmpassword"  placeholder="تأكيد كلمة المرور">


                        <i class="mdi mdi-eye"></i>
                    </div>
                    <div id="check" style="text-align: center">

                    </div>



                    <div class="mt-5">
                        <button class="btn btn-block btn-primary btn-lg font-weight-medium" name="add">
                            اضافة مستخدم
                        </button>
                    </div>
                    <div class="mt-2 w-75 mx-auto">

                    <div class="mt-2 text-center">
                      <a href="login.php" class="auth-link text-black" style="font-size: 1em">لدي حساب بالفعل <span class="font-weight-medium"></span></a>
                    </div>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script>
$('#Password, #confirmpassword').on('keyup', function () {
if ($('#Password').val() == $('#confirmpassword').val() && $('#Password').val() !='' && $('#confirmpassword').val()!= '') {
$('#check').html('كلمة المرور صحيحة').css('color', 'green');
} else
$('#check').html('الرجاء التأكد من كلمة المرور').css('color', 'red');
});


</script>
  <!-- endinject -->
  <!-- inject:js -->
<?php include 'footer.php' ; ?>
  <script src="login/js/off-canvas.js"></script>
  <script src="login/js/misc.js"></script>
<script src="js/jquery-3.2.1.slim.min.js"></script>

<script src="js/validator.js"></script>
  <!-- endinject -->
</body>

</html>
