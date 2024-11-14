<?php
try {
    $cn = new PDO("mysql:host=localhost;dbname=daily-planner", 'root', '', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
    ]);
} catch (Throwable $exception) {
    exit('Error DB Connection ...');
}

function getCalendar2()
{
    global $cn;
    $sql = "SELECT * FROM `calendar`";
    $result = $cn->query($sql);
    $result->execute();

    return $result->fetchAll(\PDO::FETCH_ASSOC);

    return false;
}

$results = getCalendar2();


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
echo "<tr>";
$dayCalender = 1;
/*
$d1 = jdate('y/m',time());
echo $d1;
$d2 = jdate('y/m',$post);00/09/
echo $d2;
*/
for ($i = 1; $i < 100; $i++) {
    //echo $i."<br>";
    if ($toDayNum <= $i) {
        //echo $i."<br>";
        //echo $toDayNum."<br>";
        $active = null;
        $events = null;
        if (jdate('y/m', time()) == jdate('y/m', $post) and $today == $dayCalender) {
            $active = "today";
        }
        $id = jdate('y/m', $post);
        $id = convert_persian_to_latin_number($id);
        $id = $id . "/" . $dayCalender;
        //echo $id."<br>";
        $z = 0;
        foreach ($event as $key) {
            if ($event[$z]["date"] == $id) {
                $events .= "<span>";
                $events .= $event[$z]["subject"];
                $events .= '<input type="hidden" name="timestart" value="' . $event[$z]["timestart"] . '">';
                $events .= '<input type="hidden" name="timefinish" value="' . $event[$z]["timefinish"] . '">';
                $events .= '<input type="hidden" name="comment" value="' . $event[$z]["comment"] . '">';
                $events .= '<input type="hidden" name="date" value="' . $event[$z]["date"] . '">';
                $events .= '<input type="hidden" name="id" value="' . $event[$z]["id"] . '">';
            }
            $z++;
        }

        $id = "id='" . $id . "'";
        echo "<td class='day past $active' $id><div class='day-contents'>$dayCalender$events</div></td>";
        $dayCalender++;
    } else {
        echo "<td></td>";
    }
    if ($i == 7 or $i == 14 or $i == 21 or $i == 28 or $i == 7 * 5 or $i == 7 * 6 or $i == 7 * 7) {
        echo "</tr><tr>";
    }
    if ($dayCalender > $lastDayMonth) {
        echo "</tr>";
        break;
    }
}
/*
 * 31 31 31 31 31 31 |
 * 30 30 30 30 30    | ==> 30 + 6 + 1 = 37
 * 29                |
 * */
?>
