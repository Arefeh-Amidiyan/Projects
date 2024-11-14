<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="register.css">
</head>
<body>
<br/><br\>
<h1>فرم ثبت نام</h1>
<div class="container box" id="mainbox">
    
    <?php
        global $db_hostname, $db_port, $db_database, $db_username, $db_password;
        include ('config.php');

    // بررسی آیا فرم ارسال شده است
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // دریافت اطلاعات فرم
        $name = $_POST["username"];
        $password = $_POST["password"];

        // هش کردن پسورد
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        try {
            $conn = new PDO("mysql:host=$db_hostname;port=$db_port;dbname=$db_database;charset=utf8", $db_username, $db_password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // آماده سازی و اجرای دستور SQL برای ذخیره اطلاعات کاربر در دیتابیس
            $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
            $stmt->bindParam(':username', $name);
            $stmt->bindParam(':password', $hashed_password);

            if ($stmt->execute()) {
                echo "با موفقیت ثبت نام شد";
            } else {
                echo "Error: " . $stmt->errorInfo()[2];
            }
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        }
    ?>
    <br/><br/><br/><br/><br/><br/>
    <img src="image/avatar.webp" class="avat">
    <form method="post"  class="inputs" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label  for="username" dir="rtl">نام کاربری</label>
    <input type="text" id="username" name="username" required>

    <label for="password"  dir="rtl" >کلمه عبور</label>
    <input type="password" id="password" name="password" required>

    <input type="submit" class="label" value="ثبت نام">
                
    <a href="javascript:void(0)" onclick="closeBox()" class="close">
                <i class="material-icons">close</i>
    </a>
     
    </form>

    <a href="javascript:void(0)" onclick="openBox()" style="text-decoration: none">
            <div class="open" id="openmainbox">
                ورود کاربران
            </div>
    </a>
</div>

<script>
    function closeBox(){
        document.getElementById('mainbox').style.marginTop ="-500px";
        document.getElementById('openmainbox').style.opacity='1';
    }
    function openBox(){
        document.getElementById('mainbox').style.marginTop='150px';
        document.getElementById('openmainbox').style.opacity='0';
    }
</script>

</body>
</html>