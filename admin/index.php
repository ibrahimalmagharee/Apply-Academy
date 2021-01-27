<?php
include 'header.php';
include 'sidbar.php';
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'admin';
$conn = mysqli_connect($host, $user, $pass, $db);

mysqli_set_charset($conn,'utf8');
mysqli_query($conn,"SET NAMES 'utf8'");


mysqli_set_charset($conn ,'utf8');

$sql_user = "SELECT * FROM `users`";
$user = mysqli_query($conn,$sql_user);
$u = mysqli_num_rows($user);

$sql_news = "SELECT * FROM `news`";
$news = mysqli_query($conn,$sql_news);
$n = mysqli_num_rows($news);

$sql_advertise = "SELECT * FROM `addvertise`";
$advertise = mysqli_query($conn,$sql_advertise);
$a = mysqli_num_rows($advertise);

$sql_course = "SELECT * FROM `course`";
$course = mysqli_query($conn,$sql_course);
$c = mysqli_num_rows($course);

$sql_video = "SELECT * FROM `video`";
$video = mysqli_query($conn,$sql_video);
$v = mysqli_num_rows($video);




?>

<div class="container">
    <div class="row" style="width: 2000px; margin-right: 10em">

        <div class="col-md-1" style="background-color: #0c85d0; margin-top: 2em">
            <h4 style="color: white; text-align: center; padding-top: 1em"><i class="fa fa-user m-r-10" aria-hidden="true"></i>  المستخدمين</h4>
            <h2 style="color: white; text-align: center"><?php echo $u; ?></h2>
        
        </div>

        <div class="col-md-1" style="background-color: #0c85d0; margin-right: 3em; margin-top: 2em">
            <h4 style="color: white; text-align: center; padding-top: 1em"><i class="fa fa-globe m-r-10" aria-hidden="true"></i>  الاخبار</h4>
            <h2 style="color: white; text-align: center"><?php echo $n; ?></h2>

        </div>

        <div class="col-md-1" style="background-color: #0c85d0; margin-right: 3em; margin-top: 2em">
            <h4 style="color: white; text-align: center; padding-top: 1em"><i class="fa fa-table m-r-10" aria-hidden="true"></i>  الاعلانات</h4>
            <h2 style="color: white; text-align: center"><?php echo $a; ?></h2>

        </div>

        <div class="col-md-1" style="background-color: #0c85d0; margin-right: 3em; margin-top: 2em">
            <h4 style="color: white; text-align: center; padding-top: 1em"><i class="fa fa-font m-r-10" aria-hidden="true"></i>  الدورات</h4>
            <h2 style="color: white; text-align: center"><?php echo $c; ?></h2>

        </div>

        <div class="col-md-1" style="background-color: #0c85d0; margin-right: 3em; margin-top: 2em">
            <h4 style="color: white; text-align: center; padding-top: 1em"><i class="fa fa-font m-r-10" aria-hidden="true"></i>  الفيديوهات</h4>
            <h2 style="color: white; text-align: center"><?php echo $v; ?></h2>

        </div>



    
    </div>
    
</div>

            <?php
            include 'footer.php';


            ?>
