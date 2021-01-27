<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'admin';
$conn = mysqli_connect($host, $user, $pass, $db);

mysqli_set_charset($conn,'utf8');
mysqli_query($conn,"SET NAMES 'utf8'");
mysqli_set_charset($conn ,'utf8');


// Add Student

if(isset($_POST['register'])){

    $course_name = $_POST['course_name'];
    $register_date = $_POST['register_date'];
    $student_name_A = $_POST['student_name_A'];
    $student_name_E = $_POST['student_name_E'];
    $id = $_POST['id'];
    $birthday = $_POST['birthday'];
    $telephone = $_POST['telephone'];
    $phone_J = $_POST['phone_J'];
    $phone_W = $_POST['phone_W'];
    $email = $_POST['email'];
    $facebook = $_POST['facebook'];
    $home_place = $_POST['home_place'];
    $qulification = $_POST['qulification'];
    $job = $_POST['job'];
    $university = $_POST['university'];

    $sql_course = "SELECT course_id,name FROM `course` where name='$course_name'";
    $course = mysqli_query($conn, $sql_course);

    while ($rows = mysqli_fetch_assoc($course)) {
        $course_id = $rows['course_id'];
    }



    $msg = '';

    $sql = "INSERT INTO `student` (course_name,register_date,student_name_A,student_name_E,id,birthday,telephone,phone_J,phone_W,email,facebook,home_place,qulification,job,university,course_id) VALUES ('$course_name', '$register_date', '$student_name_A', '$student_name_E', '$id', '$birthday', '$telephone', '$phone_J', '$phone_W', '$email', '$facebook', '$home_place', '$qulification', '$job', '$university','$course_id')";

    echo '<script language="javascript" class="alert alert-warning"  >';
    echo 'alert("تمت الاضافة بنجاح")';
    echo '</script>';

    if(mysqli_query($conn, $sql)){
        $msg = 'The addition process is done' ;
    } else {
        $msg = 'Some problem here :3';
    }


}else{
}

// End Student


mysqli_set_charset($conn ,'utf8');

$course_id = intval($_GET['course_id']);
$sql = "select * from `addvertise` where course_id=$course_id";
$addvertise = mysqli_query($conn,$sql);



$sql_course = "SELECT * FROM `course` where course_id=$course_id";
$course = mysqli_query($conn,$sql_course);

$sql_addvertise = "SELECT * FROM `addvertise`";
$addvertiselist = mysqli_query($conn,$sql_addvertise);

?>


<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>الاكاديمية التطبيقية</title>
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="./css/owl.carousel.min.css">
    <link rel="stylesheet" href="./css/owl.theme.default.min.css">
    <link rel="stylesheet" href="./css/aos.css">
    <link rel="stylesheet" href="css/style.css">


</head>

<body>
    <!-- NAVBAR START -->
    <nav class="nav">
        <div class="nav-menu flex-row">
            <div class="nav-brand">
                <a href="index.php" class="text-grey" data-text="الاكاديمية التطبيقية">الاكاديمية التطبيقية</a>
            </div>
            <div class="toggle-collapse menu">
                <div class="toggle-icons">
                    <i class="fas fa-bars"></i>
                </div>
            </div>
            <div>
                <ul class="nav-items">
                    <li class="nav-link">
                        <a href="#">الرئيسية</a>
                    </li>
                    <li class="nav-link">
                        <a href="#">الاخبار</a>
                    </li>
                    <li class="nav-link">
                        <a href="#">الدورات التعليمية</a>
                    </li>
                    <li class="nav-link">
                        <a href="#">الاعلانات</a>
                    </li>
                    <li class="nav-link">
                        <a href="#">دورات اونلاين</a>
                    </li>
                    <li class="nav-link">
                        <a href="#">من نحن</a>
                    </li>
                </ul>
            </div>
            <div class="social text-grey">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
            </div>
        </div>
    </nav>
    <!-- NAVBAR END -->
    <!-- main site section -->
<main>
    <!-- site title -->
<section class="site-title">
    <div class="site-background" data-aos="fade-up" data-aos-delay="300">
        <!-- <h3>الاكاديمية التطبيقية</h3> -->
        <div class="logo">
            <img src="./assets/111.png" style="width: 30%; height: 30%;" alt="">
        </div>
    </div>
</section>
<!-- site content -->
<section class="container">
    <div class="site-content">
        <div class="posts">
            <div class="post-content" data-aos="zoom-in" data-aos-delay="200" style="box-shadow: 0px 11px 35px 2px rgba(0, 0, 0, 0.14);">
                <div class="post-image">
                    <div style="width: content-box">
                        <?php
                        while ($row = mysqli_fetch_assoc($addvertise)){

                            ?>
                            <img src="../admin/img/<?= $row['img'] ?>"alt="blog1" class="img" style="width: 830px; height: 450px">

                    </div>
                    <div class="post-info flex-row">
                        <span> <i class="fas fa-calendar-alt text-grey"></i>&nbsp;&nbsp; <?= $row['publish_date'] ?> </span>
                    </div>
                </div>
                <?php
                }
                ?>
                <div class="post-title">
                    <?php
                    while ($rows = mysqli_fetch_assoc($course)){
                        ?>

                        <h3>اسم الدورة</h3>
                        <p><?= $rows['name'] ?></p>

                        <h4>الفئة المستهدفة</h4>
                        <p><?= $rows['target'] ?></p>

                        <h4>محاور الدورة</h4>
                        <p><?= $rows['subject'] ?></p>

                        <h4>أهداف الدورة</h4>
                        <p><?= $rows['objects'] ?></p>

                        <h4>مدة الدورة</h4>
                        <p><?= $rows['period'] ?></p>

                        <h4>مخرجات الدورة</h4>
                        <p><?= $rows['outcomes'] ?></p>

                        <h4>مميزات الدورة</h4>
                        <p><?= $rows['advantage'] ?></p>
                        <?php
                    }

                    ?>
                </div>
            </div>


        </div>

        <aside class="sidebar">
            <div class="popular-post" style="margin-right: 2em; margin-top: -8em">
                <h2>اخر الاعلانات</h2>
                <?php

                while($rows = mysqli_fetch_assoc($addvertiselist)){
                if ($rows['is_active'] == 'نعم'){

                ?>
                <div class="post-content" data-aos="flip-up" data-aos-delay="200" style="box-shadow: 0px 11px 35px 2px rgba(0, 0, 0, 0.14); margin-top: 3em">

                    <a class="text-dark" style="text-decoration: none" href="advertisment.php?course_id=<?= $rows['course_id']; ?>">
                    <div class="post-image">
                        <div style="margin-top: -1em">
                            <img src="../admin/img/<?= $rows['img'] ?>" alt="blog1" class="img" style="width: 333px; height: 250px;">
                        </div>
                        <div class="post-info flex-row">
                            <span> <i class="fas fa-calendar-alt text-grey"></i>&nbsp;&nbsp; <?=$rows['publish_date'] ?></span>
                        </div>
                    </div>
                    <div class="post-title">
                        <a href="#"><?= $rows['title'] ?></a>
                    </div>
                    </a>

                </div>
                <?php  } }?>

            </div>
        </aside>

    </div>
</section>
<!-- site content -->

    <!-- site title -->
</main>
    <!-- main site section -->
<!-- footer  -->
<footer class="footer">
    <div class="container">
        <div class="about-us" data-aos="fade-left" data-aos-delay="200" >
            <h2>من نحن</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic esse pariatur quam, rerum adipisci nemo corporis veniam placeat numquam! Nostrum!</p>
        </div>
        <div class="news-letter" data-aos="fade-left" data-aos-delay="200">
            <h2>راسلنا</h2>
            <p>تلقى جديدنا اول باول</p>
            <div class="form-element">
                <input type="text" placeholder="Email">
                <span><i class="fas fa-chevron-left"></i></span>
            </div>
        </div>
        <div class="instagram" data-aos="fade-right" data-aos-delay="200">
            <h2>Instagram</h2>
            <div class="flex-row">
                <img src="./assets/instagram/thumb-card3.png" alt="">
                <img src="./assets/instagram/thumb-card4.png" alt="">
                <img src="./assets/instagram/thumb-card5.png" alt="">
            </div>
            <div class="flex-row">
                <img src="./assets/instagram/thumb-card6.png" alt="">
                <img src="./assets/instagram/thumb-card7.png" alt="">
                <img src="./assets/instagram/thumb-card8.png" alt="">
            </div>
        </div>
        <div class="follow" data-aos="fade-right" data-aos-delay="200">
            <h2>تابعنا</h2>
            <p>على وسائل التواصل الاجتماعي</p>
            <div>
              <i class="fab fa-facebook-f"></i>
              <i class="fab fa-twitter"></i>
              <i class="fab fa-instagram"></i>
              <i class="fab fa-youtube"></i>
            </div>
        </div>
    </div>
    <div class="rights flex-row">
        <h4 class="text-grey">
            Copyrights 	&copy; 2019 All Rights made by Sami F A Abuyousef
        </h4>
    </div>
    <div class="move-up">
        <span> <i class="fas fa-arrow-circle-up fa-2x"></i></span>
    </div>
</footer>
<!-- footer  -->

    <script src="./js/jquery3.4.1.min.js"></script>
    <script src="./js/owl.carousel.min.js"></script>
    <script src="./js/aos.js"></script>
    <script src="./js/main.js"></script>

    
</body>

</html>