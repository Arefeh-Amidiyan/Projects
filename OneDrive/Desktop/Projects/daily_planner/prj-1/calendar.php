<?php
session_start();
if (!isset($_SESSION['user'])){
    header("location:index.php");
}

try {
    $cn = new PDO("mysql:host=localhost;dbname=daily-planner", 'root', '', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
    ]);
} catch (Throwable $exception) {
    exit('Error DB Connection ...');
}

function getCalendar()
{
    global $cn;
    $sql = "SELECT * FROM `calendar`";
    $result = $cn->query($sql);
    $result->execute();

        return $result->fetchAll(\PDO::FETCH_ASSOC);

    return false;
}

$results = getCalendar();


$event = array();
$p = 0;
if ($results != null) {
    foreach ($results as $res) {
        $event[$p]["date"] = $res['date'];
        $event[$p]["subject"] = $res['subject'];
        $event[$p]["timestart"] = $res['timestart'];
        $event[$p]["timefinish"] = $res['timefinish'];
        $event[$p]["comment"] = $res['comment'];
        $event[$p]["id"] = $res['id'];
        $p++;
    }
}
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
//echo $monthNumber;
//echo $lastDayMonth;
//1 --> 24 * 60 * 60 = 86400
//30 ---> 86400 * 30 = 2592000
?>
<!DOCTYPE html>
<html>
<head>
    <title>تقویم مدیریت برنامه روزانه</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
    <link rel="stylesheet" href="css/calendar.css" type="text/css"/>
    <link rel="shortcut icon" href="../images/logo3.png" />
</head>
<body>
<div class="main" dir="rtl">
    <h1>تقویم مدیریت برنامه روزانه</h1>
    <div class="calnder">
        <div class="column_right_grid calender">
            <div class="clndr-event">

                <a class="refresh" href="">
                    <img src="image/refresh.png">
                </a>

                    <span id="startmodal" class="popup-with-zoom-anim">اضافه کردن رویداد</span>


                <a class="logout" href="logout.php">
                    <img src="image/logout.png">
                </a>
                <br>
                <br>

            </div>
            <div class="cal1">
                <div class="clndr">
                    <div class="clndr-controls">
                        <div>
                            <form action="" method="post">
                                <input type="hidden" name="post" value="<?php echo $post - 2592000 ?>">
                                <button class="prev" type="submit"> قبل</button>
                            </form>
                        </div>
                        <div class="month"><?php echo jdate('F ماه سال Y', $post) ?></div>
                        <div>
                            <div>
                                <form action="" method="post">
                                    <input type="hidden" name="post" value="<?php echo $post + 2592000 ?>">
                                    <button class="next" type="submit"> بعد</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <table class="clndr-table">
                        <thead>
                        <tr class="header-days">
                            <td class="header-day">شنبه</td>
                            <td class="header-day">یک شنبه</td>
                            <td class="header-day">دو شنبه</td>
                            <td class="header-day">سه شنبه</td>
                            <td class="header-day">چهار شنبه</td>
                            <td class="header-day">پنج شنبه</td>
                            <td class="header-day">جمعه</td>
                        </tr>
                        </thead>
                        <tbody id="calendar">
                        <?php
                        include 'include/calendar.php';
                        ?>

                          <tr>
                          <td class='day' id="00/09/1">
                              <div class='day-contents'>1</div>
                          </td>
                          <td class='day select' id="00/09/2">
                              <div class='day-contents'>
                                  2
                                  <span>
                                  تست 2
                                  <input type="hidden" name="timestart" value="11:38">
                                  <input type="hidden" name="timefinish" value="22:39">
                                  <input type="hidden" name="comment" value="نظر برای این رویداد">
                                  <input type="hidden" name="date" value="00/09/2">
                                  <input type="hidden" name="id" value="2">
                              </span>
                              </div>
                          </td>
                      </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="event">
    <h2>اضافه کردن رویداد</h2>
    <input id="subject" placeholder="موضوع">
    <input id="calendarId" type="text" readonly value="لطفا تاریخ را از تقویم انتخاب نمایید.">
    <label>ساعت شروع :</label>
    <input id="timeStart" type="time">
    <label>ساعت پایان :</label>
    <input id="timeFinish" type="time">
    <textarea id="comment" placeholder="توضیحات بیشتر"></textarea>
    <button id="send">ثبت</button>
</div>
<div id="modal">
    <h2>نمایش رویداد</h2>
    <input readonly id="spanId" type="text" value="">
    <input id="spantimeStart" type="time">
    <input id="spantimeFinish" type="time">
    <input id="spansubject">
    <textarea id="spancomment" placeholder="توضیحات بیشتر"></textarea>

</div>
<div id="background"></div>
<!--//main-->
</body>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>
</html>
