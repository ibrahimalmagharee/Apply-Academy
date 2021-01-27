<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'admin';
$conn = mysqli_connect($host, $user, $pass, $db);
mysqli_set_charset($conn,'utf8');
mysqli_query($conn,"SET NAMES 'utf8'");
mysqli_set_charset($conn ,'utf8');

$sql = "SELECT * FROM `addvertise` where course_id='$courses_id' ";
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
        <?php

        while($rows = mysqli_fetch_assoc($addvertise)){?>
        <div class="col-md-4">
            <div class="card" style="width: 18rem;">
               <a href="test1.php"> <img class="card-img-top" src="img/<?= $rows['img'] ?>" alt="Card image cap"></a>
                <div class="card-body">
                    <a href="test1.php"><p class="card-text">
                        <?= $rows['details'] ?>
                        </p></a>
                </div>
            </div>
        </div>
        <?php  } ?>
    </div>
</div>




</body>
</html>