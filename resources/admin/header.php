<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" lang="ar" dir="ltr">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>fixit</title>
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style/requestStyle.css">
    <link href="style/assets/bootstrap.rtl.min.css" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900&display=swap">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <script src="js/"></script>
    <script src="js/jquery-3.6.0.min.js"></script>
</head>
<body style="direction: rtl">
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="admin">FIXIT</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="عرض/إخفاء لوحة التنقل">
        <span class="navbar-toggler-icon"></span>
    </button>
    <!-- <input class="form-control form-control-dark w-100 rounded-0 border-0" type="text" placeholder="بحث" aria-label="بحث"> -->
    <div class="w-100">fadf</div>
    <div class="navbar-nav" style="margin-left:1em;">
        <div class="nav-item text-nowrap">
            <a class="nav-link px-3 sign-out" style="border: 1px red solid;margin-left: 1em" href="logout">تسجيل الخروج</a>
        </div>
    </div>
</header>

<div class="container-fluid">
    <div class="row">
        <!-- Start Sidebar -->
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse" style="    position: fixed;
    height: 100%;">
            <div class="position-sticky pt-3 sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="admin">
                            <span data-feather="home" class="align-text-bottom"></span>
                            لوحة التحكم
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admin-request">
                            <span data-feather="file" class="align-text-bottom"></span>
                            الطلبات
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="addrequest">
                            <span data-feather="file-plus" class="align-text-bottom"></span>
                            اضافه طلب
                        </a>
                    </li>
                    <li class="mb-1">
                        <a href="admin-user" class="nav-link active" >
                            <span data-feather="users" class="align-text-bottom"></span>
                            المستخدمين
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="admin-user-add">
                            <span data-feather="user-plus" class="align-text-bottom"></span>
                            اضافة مستخدم
                        </a>
                    </li>



            </div>
        </nav>
        <!-- End Sidebar -->