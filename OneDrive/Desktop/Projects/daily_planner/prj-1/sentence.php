
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Motivation</title>
    <link href="../css/fonts.css" rel="stylesheet" type="text/css">
    <link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
    <script SRC="../js/bootstrap.bundle.js"></script>
    <link rel="shortcut icon" href="images/logo3.png" />
</head>
<body style="background-image: url('images/login-back.jpg');background-repeat: no-repeat,repeat;background-size: cover">
    <div class="text-light" style="background-color: #6f42c1;text-align: center;width:500px;margin:auto;height: 400px;margin-top: 200px;border-radius:40px ">
        <br>
        <br><br><br><br><br><br><br>
            <?php

            $characters = [
                'امروز هوا خیلی خوبه پاشو شروع کن ',
                'قدرت ',
                'جهانی که برای خودمان ساخته ایم نتیجه ی تفکرات مان است<br> نمی توانیم دنیا را بدون تغیر طرز تفکرمان تغیر دهیم ',
                'موفقیت پاداش افراد شکست خورده ایست که ناامید نشده اند',
                'حتی یک زندگی شاد نمی تواند بدون درجه ای از تاریکی باشد',
                '...شجاع باش <br>بر ترس هایت غلبه کن و اولین قدم را بردار موفقیت پشت قدم های تو نهفته شده',
            ];
            $key = 5;
            $RANDOM = mt_rand(0,$key);
            foreach($characters as $keys=> $item) {
                if ($RANDOM==$keys){
                    echo $item.'<br>';
                }else{
                    continue;
                }

            }



            ?>
        </br>
    </div>
</body>
</html>