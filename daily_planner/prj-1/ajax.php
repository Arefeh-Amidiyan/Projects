<?php
session_start();
if (isset($_SESSION["admin"])) {
    $admin = $_SESSION["admin"];
} else {
    header('location:index.php');
}
include 'include/pdo.php';
include 'include/connection.php';

//print_r($event);
$post = time();
if (isset($_POST["post"])) {
    $post = $_POST["post"];
}
include 'include/jdf.php';
include 'include/convert.php';
$dayList = array("شنبه", "یکشنبه", "دوشنبه", "سه شنبه", "چهارشنبه", "پنجشنبه", "جمعه");
$rooz = jdate('d', $post);
$rooz = convert_persian_to_latin_number($rooz);
$today = $rooz;
$rooz--;
$rooz = $rooz * 24 * 60 * 60;
$firstDayMonth = jdate('l', $post - $rooz);
//echo $firstDayMonth;
$j = 1;
foreach ($dayList as $day) {
    if ($day == $firstDayMonth) {
        //echo 'true';
        $toDayNum = $j;
    }
    $j++;
}
$monthNumber = jdate('n', $post);
$monthNumber = convert_persian_to_latin_number($monthNumber);
if ($monthNumber <= 6) {
    $lastDayMonth = 31;
} else {
    $lastDayMonth = 30;
}
if ($monthNumber == 12) {
    $lastDayMonth = 29;
}


if (isset($_POST["subject"]) and isset($_POST["calendarId"]) and isset($_POST["timeStart"]) and isset($_POST["timeFinish"]) and isset($_POST["comment"])) {
    if (trim($_POST["subject"]) != null and trim($_POST["timeStart"]) != null and trim($_POST["timeFinish"]) != null and trim($_POST["calendarId"]) != "لطفا تاریخ را از تقویم انتخاب نمایید.") {

        try {
            $cn = new PDO("mysql:host=localhost;dbname=daily-planner", 'root', '', [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
            ]);
        } catch (Throwable $exception) {
            exit('Error DB Connection ...');
        }

        $id = $_SESSION['user'];
        global $cn;
        $sql = "INSERT INTO `calendar`(`id`, `subject`, `timestart`, `timefinish`, `date`, `comment`, `user_id`) VALUES (null,'$_POST[subject]','$_POST[timeStart]','$_POST[timeFinish]','$_POST[calendarId]','$_POST[comment]','$id')";
        $result = $cn->prepare($sql);
        $result->execute();
die(var_dump("/////"));


    } else {
        include 'include/calendar.php';
        echo "<script>alert('لطفا فیلد ها را پر کنید')</script>";
    }
} else {
    include 'include/calendar.php';
    echo "<script>alert('بدون درخواست')</script>";
}

?>
