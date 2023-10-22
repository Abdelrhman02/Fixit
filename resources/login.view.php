<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>FIXIT</title>
    <link href="bootsrap/bootstrap.css" rel="stylesheet">
    <link href="style/style.css" rel="stylesheet">
    <script src="js/jquery-3.6.0.js"></script>
</head>
<body>
<!-- Arabic Version -->
<section dir="rtl" id="main">
    <div class="container arabicLog">
        <img alt="" class="logo-img" src="images/logo.jpg" style="">
        <h2 class="text-primary" style="color:#175a89 !important; ">تسجيل الدخول</h2>
        <?php if (isset($_GET["message"])): ?>
            <p style="background: #ef5a5a;
    color: white;
    padding: 10px;"><?= addslashes($_GET["message"]); ?></p>
        <?php endif; ?>
        <form action="search" method="post" autocomplete="off">
            <label class="form-label" for="username">الرقم الجامعي/الرقم القومي</label>
            <div dir="ltr">
                <div class="input-group mb-3">
                    <input name="user_id" autocomplete="off" class="form-control"
                           required type="text">
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label" for="password">كلمة المرور</label>
                <input class="form-control" name="password" autocomplete="off" required type="password">
            </div>

            <button class="btn btn-primary btn-submit"
                    style="background-color:#175a89 !important; border-color:#175a89 !important;"
                    type="submit">تسجيل الدخول
            </button>
        </form>

    </div>
</section>

<script>
</script>
<script src="js/script.js"></script>
</body>
</html>