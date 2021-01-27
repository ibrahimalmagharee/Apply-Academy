<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'admin';
$conn = mysqli_connect($host, $user, $pass, $db);

mysqli_set_charset($conn,'utf8');
mysqli_query($conn,"SET NAMES 'utf8'");
mysqli_set_charset($conn ,'utf8');


mysqli_set_charset($conn ,'utf8');
$sql_course = "SELECT * FROM `course`";
$course = mysqli_query($conn,$sql_course);
$sql = "SELECT * FROM `addvertise`";
$addvertise = mysqli_query($conn,$sql);

?>
<!DOCTYPE html>
<html dir="rtl" lang="ar">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title>لوحة التحكم</title>
    <!-- Bootstrap Core CSS -->
    <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/stylepage.css" rel="stylesheet">
    <link href="css/icons/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="css/colors/blue.css" id="theme" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>

<div class="container" style="margin-top: 5em;">
    <div class="row">
        <div class="col-md-6">
        <?php

        while($rows = mysqli_fetch_assoc($course)){?>
        <h3>اسم الدورة</h3>
        <P><?= $rows['name'] ?></P>
        <h3>الفئة المستهدفة</h3>
            <P><?= $rows['target'] ?></P>
        <h3>محاور الدورة</h3>
            <p><?= $rows['subject'] ?></p>
        <h3>أهداف الدورة</h3>
            <P><?= $rows['objects'] ?></P>
        <h3>مدة الدورة</h3>
            <P><?= $rows['period'] ?></P>
        <h3>مخرجات الدورة</h3>
            <P><?= $rows['outcomes'] ?></P>
        <h3>مميزات الدورة</h3>
            <p><?= $rows['advantage'] ?></p>

        <?php  } ?>
        </div>
        <div class="col-md-6">
            <?php

            while($rows = mysqli_fetch_assoc($addvertise)){?>
            <img src="img/<?= $rows['img'] ?>" alt="Card image cap">
            <?php  } ?>
        </div>
    </div>
</div>




</body>
</html>