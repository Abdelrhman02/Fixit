<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>الصفحه الئيسيه</title>
    <link rel="stylesheet" href="style/main2.css">
</head>
<body>
<h1 class="logo-h1">FIXIT</h1>

<div class="container">
    <div class="section_1" style="width: 420px !important;">
        <h1 style="font-size: 50px; ">اهلا بك يا
            <?php
            $pieces = explode(" ", $_SESSION['name']);
            $first_part = implode(" ", array_splice($pieces, 0, 1));
            echo $first_part
            ?>

        </h1>
        <br>
        <div class="block-container">
            <div>
                <a href="addrequest">
                    <div class="block">
                        <img src="./images/check-list%20(1).png" alt="">
                        <p>اضافه طلب</p>
                    </div>
                </a>
            </div>
            <div>
                <a href="request">
                    <div class="block">
                        <img src="./images/check-list%20(2).png" alt="">
                        <p>عرض الطلب</p>
                    </div>
                </a>
            </div>
        </div>

    </div>
</div>
</div>
<a href="logout">
    <button class="button-24">تسجيل الخروج</button>
</a>

<footer>
    <p>&#169 copyright </p>
    <p>Made By Banha University</p>
</footer>
<div class="scrollbar" id="style-1">
    <div class="force-overflow"></div>
</div>
</body>
</html>