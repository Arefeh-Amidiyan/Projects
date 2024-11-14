<?php
session_start();



try {
    $cn = new PDO("mysql:host=localhost;dbname=daily-planner", 'root', '', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
    ]);
} catch (Throwable $exception) {
    exit('Error DB Connection ...');
}

function getCal()
{
    if (!isset($_SESSION['user'])){
        $id = 0;
    }else{
        $id = $_SESSION['user'];
    }
    global $cn;
    $sql = "SELECT * FROM `calendar` WHERE user_id = ? Order by id desc";
    $result = $cn->prepare($sql);
    $result->bindValue(1,$id);

    if ($result->execute()){
        return $result->fetchAll(\PDO::FETCH_ASSOC);
    }

    return false;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>daily planner</title>
    <link href="css/fonts.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <script SRC="js/bootstrap.bundle.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="css/shopping.css" rel="stylesheet" type="text/css">
</head>
<body style="direction: rtl;background-color: #f4dce1">
<div class="title">
    <img src="images/logo.png">

    <div class="d-flex justify-content-between align-items-center">
        <div class="navar">
            <a href="" class="index">
                <i class="fa fa-home"></i>
                <span href="" >خانه </span>
            </a>
            <a href="" class="index">
                <i class="material-icons" style="font-size:18px"></i>
                <span href="" >منو </span>
            </a>
            <a href="" class="index">
                <i class="fa fa-book"></i>
                <span >برنامه ها </span>
            </a>
            <a href="" class="index">
                <i class="fa fa-phone"></i>
                <span>تماس با ما</span>
            </a>
            <a href="" class="index">
                <i class="fa fa-users"></i>
                <span >درباره ما</span>
            </a>
        </div>
        <?php
        if (isset($_SESSION['user'])){
            ?>
            <div class="btn ms-2" style="background-color:#6f42c1">
                <a href='login/logout.php' class="text-light"  style="text-decoration:none">
                    خروج
                </a>
            </div>
            <?php

        }else{
            ?>
            <div class="btn ms-2" style="background-color:#6f42c1">
                <a target="_blank" href='login/login.php' class="text-light"  style="text-decoration:none">
                    ورود/ثبت نام
                </a>
            </div>
            <?php
        }

        ?>

    </div>

    <div id="mySidepanel" class="sidepanel mobileMenu">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
        <a href="#"> خانه  <i class="fa fa-home"></i></a>
        <a href="#"> مقالات <i class="fa fa-book"></i></a>
        <a href="#"> تماس با ما <i class="fa fa-phone"></i></a>
        <a href="#">درباره ما <i class="fa fa-users"></i></a>
    </div>
    <div><button class="openbtn mobileMenu" onclick="openNav()">☰</button></div>

</div>
<div class="px-5" style="margin-top: 10px">
    <div class="p-4">
        <div class="row">

        <div class="col-12 col-md-8 " >
            <div>
                <form class="todoForm w-100 shadow rounded-3" style="height: 450px">
                    <h1 class="todo-title">لیست انجام کارها</h1>

                    <?php
                    $get = getCal();
                    if ($get){
                        foreach ($get as $item){
                            ?>
                            <div class="input-gp">
                                <input type="checkbox" class="note-checkbox">
                                <input type="text" value="<?= $item['subject'] ?>" disabled class="text-dark">
                            </div>
                            <?php
                        }
                    }else{
                        ?>
                        <br>
                        <br>
                        <br>
                        <br>
                            <div class="input-gp">
                                <input type="checkbox" class="note-checkbox">
                                <input type="text" value="شما برنامه ای ندارید." disabled>
                            </div>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <?php
                    }
                    ?>

                </form>
            </div>
        </div>
        <div class="col-12 col-md-4 ">
            <div class="mb-3 mt-2 ">
                <img src="images/myday.jpg" class="w-100 shadow rounded-3">
            </div>
            <div class="mb-3 mt-1">
                <img src="images/groceries.jpg" class="w-100 shadow rounded-3">
            </div>
            <div class="mb-3 mt-1">
                <img src="images/gym.jpg" class="w-100 shadow rounded-3">
            </div>

        </div>
        </div>
    </div>
    <div class="px-4">
        <div class="row col-12">
                    <div class="col-3">
                        <a target="_blank" href='calendar.php'style="text-decoration: none">
                            <img src="images/calendar.png" class="w-100">
                            <div class="fw-bold text-center text-black" >
                                    <span>تقویم</span>
                            </div>
                        </a>
                    </div>
                    <div class="col-3">
                        <a href="sentence.php" style="text-decoration: none">
                            <img src="images/power.png" class="w-100">
                            <div class="fw-bold text-center text-black"><span>جملات انگیزشی روزانه </span></div>
                        </a>
                    </div>            
                    <div class="col-3">
                        <a href="notes.php" style="text-decoration: none">
                        <img src="images/notes.png" class="w-100">
                        <div class="fw-bold text-center text-black"><span>یادداشت ها</span></div>
                        </a>
                    </div>
                    <div class="col-3">
                        <img src="images/reminder.png" class="w-100">
                        <div class="fw-bold text-center"><span>یاد آور</span></div>
                    </div>
            </div>
        </div>
    </div>
    <br>
</div>

<script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl)
    {return new bootstrap.Tooltip(tooltipTriggerEl)})
    function openNav() {
  document.getElementById("mySidepanel").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidepanel").style.width = "0";
}
</script>
</body>
</html>