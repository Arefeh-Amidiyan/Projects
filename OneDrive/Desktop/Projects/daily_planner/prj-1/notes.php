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

function getNotes($user_id)
{
    global $cn;
    $sql = "SELECT * FROM `notes` WHERE user_id = ? Order by id desc";
    $result = $cn->prepare($sql);
    $result->bindValue(1,$user_id);

    if ($result->execute()){
        return $result->fetchAll(\PDO::FETCH_ASSOC);
    }

    return false;
}
$id = $_SESSION['user'];


if (isset($_GET['create']))
{


    global $cn;
    $sql = "INSERT INTO `notes`(`text`, `user_id`) VALUES ('$_GET[comment]','$id')";
    $result = $cn->prepare($sql);
    $result->execute();



}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Notes</title>
    <link href="../css/fonts.css" rel="stylesheet" type="text/css">
    <link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
    <script SRC="../js/bootstrap.bundle.js"></script>
    <link rel="shortcut icon" href="../images/logo3.png" />
</head>
<style>
    .note-button{
        color: white;
        border: 2px solid white;
    }
    .note-button:hover{
        background-color: #f6dde3;
        border: 2px solid #f6dde3;
        color : black;
    }
</style>
<body style="background-image: url('images/login-back.jpg');background-repeat: no-repeat,repeat;background-size: cover">
    <div style="margin: 0 200px">
        <div class="text-light" style="float: right;background-color: #6f42c1;text-align: center;width:500px;margin:auto;height: 400px;margin-top: 200px;border-radius:40px ;padding: 19px 30px;">
            <div class="ah-tab-content dt-sl" data-ah-tab-active="true">
                <div class="section-title title-wide no-after-title-wide dt-sl">
                    <h2>یادداشت</h2> </div> <div style="margin-top: 35px;" class="form-question-answer dt-sl mb-3 text-center">
                    <form name="note-page" method="get" action="#">
                        <input type="hidden" name="create" value="ok">
                        <textarea class="form-control" rows="5" placeholder="... یادداشت خود را بنویسید" name="comment" style="text-align: right;"></textarea>
                        <button class="btn btn-outline-danger w-50 mt-4 note-button" type="submit"> ثبت یادداشت </button>
                    </form>
                </div> <div class="comments-area default">
                </div> <!-- #comment-## -->
                </ol>
            </div>
        </div>
        <div class="text-light" style="float: left;background-color: #6f42c1;text-align: center;width:500px;margin:auto;height: 400px;margin-top: 200px;border-radius:40px ;padding: 19px 30px;">
            <div style="margin: 8px !important;" class="section-title text-sm-title title-wide no-after-title-wide mt-5 mb-0 dt-sl">
                <h2>یادداشت ها</h2>
            </div>
            <div class="comment-list" style="overflow:scroll;height: 280px">
                    <?php
                    include_once '../prj-1/include/jdf.php';

                    $get = getNotes($id);

                    if ($get){
                        foreach ($get as $item){
                            ?>
                <div class="col-12 border-top"> <div class="alert alert-custom alert-light-warning fade show shadow my-5" role="alert">
                        <div class="alert-icon"> <i class="fad fa-engine-warning"></i> </div>
                            <div class="alert-text"><?= $item['text'] ?>
                                <br>
                                در تاریخ <?= $item['created_at']; ?>
                            </div>
                    </div>
                </div>
                            <?php
                        }
                    }else{
                        ?>
                        <div class="col-12 border-top"> <div class="alert alert-custom alert-light-warning fade show shadow my-5" role="alert">
                                <div class="alert-icon"> <i class="fad fa-engine-warning"></i> </div>
                        <div class="alert-text"> در حال حاضر هیچ یادداشتی ثبت نشده است </div>
                            </div>
                        </div>
                        <?php
                    }

                    ?>
            </ol>

    </div>
</div>
</body>
</html>
