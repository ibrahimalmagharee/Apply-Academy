<?php
include '../admin/db.php';
mysqli_set_charset($conn ,'utf8');


$sql = "SELECT * FROM `news`";
$news = mysqli_query($conn,$sql);

$sql_video = "SELECT * FROM `video`";
$video = mysqli_query($conn,$sql_video);



$sql_course = "SELECT * FROM `course`";
$course = mysqli_query($conn,$sql_course);



$sql_addvertise = "SELECT * FROM `addvertise`";
$addvertise = mysqli_query($conn,$sql_addvertise);


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
                        <a href="#news">الاخبار</a>
                    </li>
                    <li class="nav-link">
                        <a href="#">الدورات التعليمية</a>
                    </li>
                    <li class="nav-link">
                        <a href="#advertise">الاعلانات</a>
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
<!-- carousel -->
<section>
    <div class="blog">
        <div class="container">
            <div class="owl-carousel owl-theme blog-post" id="advertise">
                <?php

                while($rows = mysqli_fetch_assoc($addvertise)){
                if ($rows['is_active'] == 'نعم'){

                ?>
                <a class="text-dark" style="text-decoration: none" href="advertisment.php?course_id=<?= $rows['course_id']; ?>">
                <div class="blog-content">
                    <img src="../admin/img/<?= $rows['img'] ?>" alt="post-1" style="width: content-box; height: 250px;">
                    <div class="blog-title">
                        <h3><?= $rows['title'] ?></h3>
                        <button class="btn btn-blog">انضم الينا</button>
                        <span>سارع بالتسجيل</span>
                    </div>
                </div>
                    <?php  } }?>
                </a>

            </div>
            <div class="owl-navigation">
                <div class="owl-nav-prev"> <i class="fas fa-long-arrow-alt-left"></i> </div>
                <div class="owl-nav-next"> <i class="fas fa-long-arrow-alt-right"></i> </div>
            </div>
        </div>
    </div>
</section>
<!-- carousel -->
<!-- site content -->
<section class="container">
    <div class="site-content">
        <div class="posts" id="news">
            <?php

            while($rows = mysqli_fetch_assoc($news)){
            if ($rows['is_active'] == 'نعم'){

            ?>
            <a class="text-dark" style="text-decoration: none">
            <div class="post-content" data-aos="zoom-in" data-aos-delay="200">
                <div class="post-image">
                    <div>
                        <img src="../admin/img/<?= $rows['img'] ?>" alt="blog1" class="img" style="width: 830px; height: 450px">
                    </div>
                    <div class="post-info flex-row">
                        <span> <i class="fas fa-calendar-alt text-grey"></i>&nbsp;&nbsp; <?= $rows['publish_date'] ?> </span>
                    </div>
                </div>
                <div class="post-title">
                    <a href="#"><?= $rows['title'] ?></a>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Impedit corrupti excepturi unde laudantium magnam nam exercitationem, aperiam minus culpa voluptatibus totam magni voluptates hic optio animi officiis asperiores provident id debitis odit quia, quaerat quae ab. Necessitatibus cumque perspiciatis rerum.</p>
                    <a style="font-size: 1rem; font-family: Cairo; border-radius: 0; padding: .5rem .5rem; background: rgb(200, 235, 255)" href="news.php?news_id=<?= $rows['news_id']; ?>">  المزيد &nbsp; <i class="fas fa-arrow-left"></i></a>
                </div>
            </div>
            <hr style="width: 90%; margin-top: 2rem; margin-bottom: 3rem;">
            <?php  }} ?>
            </a>


        </div>
        <aside class="sidebar">
            <div class="category">
                <h2>اقسام الموقع</h2>
                <ul class="category-list">
                    <li class="list-items" data-aos="fade-right" data-aos-delay="100">
                        <a href="#news">الاخبار</a>
                        <span>(05)</span>
                    </li>
                    <li class="list-items" data-aos="fade-right" data-aos-delay="200">
                        <a href="#advertise">الاعلانات</a>
                        <span>(02)</span>
                    </li>
                    <li class="list-items" data-aos="fade-right" data-aos-delay="300">
                        <a href="#video">الفيديوهات</a>
                        <span>(03)</span>
                    </li>
                    <li class="list-items" data-aos="fade-right" data-aos-delay="400">
                        <a href="#">الدورات التعليمية</a>
                        <span>(07)</span>
                    </li>
                    <li class="list-items" data-aos="fade-right" data-aos-delay="500">
                        <a href="#">التدريب</a>
                        <span>(04)</span>
                    </li>
                </ul>
            </div>
            <div class="popular-post" id="video">
                <h2>الفيديوهات</h2>
                <?php

                while($rows = mysqli_fetch_assoc($video)){
                if ($rows['is_active'] == 'نعم'){
                ?>
                <div class="post-content" data-aos="flip-up" data-aos-delay="200">
                    <div class="post-image">
                        <div>
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?= $rows['url'] ?>" allowfullscreen style="width: 7.5cm; height: 4cm;"></iframe>                        </div>
                        <div class="post-info flex-row">
                            <span> <i class="fas fa-calendar-alt text-grey"></i>&nbsp;&nbsp; October 16 2019 </span>
                        </div>
                    </div>
                    <div class="post-title">
                        <a href="#"><?= $rows['title'] ?> </a>
                    </div>
                </div>
                <?php  }} ?>

            </div>
            <div class="news-letter" data-aos="fade-up" data-aos-delay="300">
                <h2>تلقى جديدنا</h2>
                <div class="form-element">
                <input type="text" class="input-element" placeholder="البريد الالكتروني">
                <button class="btn form-btn">انضم الينا</button>
                </div>
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
            Copyrights 	&copy; 2019 All Rights made by
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