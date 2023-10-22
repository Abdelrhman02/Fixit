<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" lang="ar" dir="rtl">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>fixit</title>
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style/requestStyle.css">
    <link href="style/assets/bootstrap.rtl.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style/assets/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900&display=swap">
    <script src="js/jquery-3.6.0.min.js"></script>
<body>

<h1 class="logo-h1">FIXIT</h1>
<!-- <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow"> -->
<header class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow" style="    direction: rtl;">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-center" href="#" style="font-size: 32px !important;">FIXIT</a>
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-center" href="request" style="pointer-events: none;   cursor: default;

"></a>

    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-center" href="request">عرض الطلبات</a>
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-center " href="addrequest">
        اضافه طلب</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="عرض/إخفاء لوحة التنقل">
        <span class="navbar-toggler-icon"></span>
    </button>
    <!-- Start User item  -->
    <div class="w-100 d-flex justify-content-lg-end justify-content-md-center pe-lg-5">
        <a href="logout">
            <button class="btn btn-danger">تسجيل خروج</button>
        </a>
    </div>

    <!-- End User item  -->
    <div class="navbar-nav">
        <div class="nav-item text-nowrap">
            <!-- <a class="nav-link px-3 sign-out" href="#">تسجيل الخروج</a> -->
        </div>
    </div>
</header>

<!-- Start Main Content -->
<!-- Start Main Content -->
<br>
<br>
<br>
<div class="container-fluid">
    <div class="row " style="direction: rtl;">

        <!-- Start Card 1 -->

        <section class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">بيانات الطلب </h1>
            </div>

            <!-- Start Card 2 -->
            <div class="card my-5">
                <div class="card-header fw-bold">
                    تفاصيل الطلب
                </div>
                <div class="card-body">

                    <div class="row">

                        <!-- Column 1 -->
                        <ul class="list-group list-group-flush col-md-6">

                            <li class="list-group-item">
                                <span class="fw-bold">فرع :</span>
                                <?= $data["Branch"] ?>

                            </li>

                            <li class="list-group-item">
                                <span class="fw-bold">المبنى :</span>
                                <?= $data["Building"] ?>
                            </li>

                            <li class="list-group-item">
                                <span class="fw-bold">الطابق :</span>
                                <?= $data["Floor"] ?>
                            </li>
                            <li class="list-group-item">

                            </li>
                        </ul>

                        <!-- Column 2 -->
                        <ul class="list-group list-group-flush col-md-6 col-12">

                            <li class="list-group-item">
                                <span class="fw-bold">القاعة :</span>
                                <?= $data["Room"] ?>
                            </li>

                            <li class="list-group-item">
                                <span class="fw-bold">النوع :</span>
                                <?= $data["Type"] ?>
                            </li>
                            <li class="list-group-item">

                            </li>
                        </ul>
                    </div>

                </div>
            </div>

            <!-- Start Image Card -->
            <div class="card my-5">
                <div class="card-header fw-bold">
                    المرفق
                </div>
                <div class="card-body">
                    <p class="text-center">
                        <button class="btn btn-secondary" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                            عرض المرفق
                        </button>
                    </p>
                    <div class="collapse" id="collapseExample">
                        <div class="">
                            <div class="text-center" class="collapse" id="collapseExample">
                                <img class="w-100" src="<?= $data["imgUrl"] ?>" alt="لا يوجد مرفق">

                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <div class="card my-5">
                <div class="card-header fw-bold">
                    تعليقات المديرين
                </div>
                <div class="card-body">

                    <div class="row">

                        <style>
                            .boxes-container {
                                display: grid;
                                grid-template-columns: 1fr 1fr 1fr;
                            }

                        </style>
                        <ul class="list-group list-group-flush col-md-12">
                            <?php foreach ($data as $d): ?>
                                <?php if (isset($d["endloop"])) {
                                    break;
                                } ?>
                                <?php if (isset($d["admin"])): ?>
                                    <li class="list-group-item">
                                        <div class="boxes-container">
                                            <div class="boxes">
                                                <span class="fw-bold"> مرسل التعليق :  <?= $d["admin"] ?></span>
                                                <p><?= $d["message"] ?></p>
                                            </div>
                                            <div class="boxes">
                                                <span class="fw-bold">تاريخ الرساله :</span>
                                                <?= $d["Time"] ?>
                                            </div>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                </div>
            </div>
            <!-- End Image Card -->
            <div class="card my-5">
                <div class="card-header fw-bold">
                    اضافه تعليق الفني
                </div>
                <div class="card-body">
                    <form action=tecFeedback/request?id=<?= $data["Request_num"] ?> method="post"
                          enctype="multipart/form-data">
                        <div class="input-group-icon">
                            <label for="tecFeedBack">أكتب تعليق </label>
                            <input class="input--style-4 js-datepicker"
                                   value="" name="TechFeedback" type="text" placeholder="اضف تعليقك"
                                   style="border: 1px #a9a9a9 solid; width: 100%">
                        </div>
                        <br>
                        <div class="input-group-icon">
                            <label for="tecImage">اضف صوره</label>
                            <input type="file" id="myFile" name="image_tec" class="input">
                        </div>
                        <br>

                        <div class="input-group-icon">
                            <button type="submit" class="btn btn-primary">ارسل التعليق</button>
                        </div>

                    </form>
                </div>
            </div>


    </div>
