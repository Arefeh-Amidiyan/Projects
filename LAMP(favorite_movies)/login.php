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
<div class="container box" id="mainbox">
    <h1>فرم ورود</h1>
    <?php
    if (isset($_SESSION['username'])){
       header('location:index.php');
    }
    global $db_hostname, $db_port, $db_database, $db_username, $db_password;
    include ('config.php');

?>

<img src="image/avatar.webp" class="avat">

    <form method="post" class="inputs" action="index.php" >
        <label for="username"  dir="rtl">نام کاربری</label>
        <input type="text" id="username" name="username" required>

        <label for="password"  dir="rtl">کلمه عبور</label>
        <input type="password" id="password" name="password" required>

        <input type="submit" value="ورود">

                        
        <a href="javascript:void(0)" onclick="closeBox()" class="close">
                <i class="material-icons">close</i>
        </a>
    </form>
</div>

<a href="javascript:void(0)" onclick="openBox()" style="text-decoration: none">
            <div class="open text-center" id="openmainbox">
                ورود کاربران
            </div>
    </a>
</div>

<script>
    function closeBox(){
        document.getElementById('mainbox').style.marginTop ="-400px";
        document.getElementById('openmainbox').style.opacity='1';
    }
    function openBox(){
        document.getElementById('mainbox').style.marginTop='150px';
        document.getElementById('openmainbox').style.opacity='0';
    }
</script>

</body>
</html>