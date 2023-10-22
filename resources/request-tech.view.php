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

<div class="container-fluid">
    <div class="row " style="direction: rtl;">
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="width: 100%">
            <h2 class="pt-3">الطلبات</h2>
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                    <tr>
                        <th scope="col">تاريخ_الطلب</th>
                        <th scope="col">رقم_الطلب</th>
                        <th scope="col">اسم_الفني</th>
                        <th scope="col">نوع_الطلب</th>
                        <th scope="col">الدور</th>
                        <th scope="col">الغرفه</th>
                        <th scope="col">الفرع</th>
                        <th scope="col">المبنى</th>
                        <th scope="col">وصف_المشكله</th>
                        <th scope="col">حاله_الطلب</th>
                    </tr>
                    </thead>

                    <tbody style="font-family: 'Cairo', sans-serif !important;">
                    <?php foreach ($data

                    as $row): ?>
                    <?php if (isset($row["Request_num"])): ?>
                    <tr class="data row_<?= $row["Request_num"] ?>"
                        style="font-family: 'Cairo', sans-serif !important;">
                        <td><?= isset($row["Date"]) ? $row["Date"] : "" ?></td>
                        <td><?= $row["Request_num"] ?></td>
                        <td><?= $_SESSION["name"] ?></td>
                        <td><?= $row["Type"] ?></td>
                        <td><?= $row["Floor"] ?></td>
                        <td><?= $row["Room"] ?></td>
                        <td><?= $row["Building"] ?></td>
                        <td><?= $row["Branch"] ?></td>
                        <td><?php
                            $pieces = explode(" ", $row["Details"]);
                            $first_part = implode(" ", array_splice($pieces, 0, 6));
                            echo $first_part
                            ?></td>
                        <td><?php echo ($row["Status"]) === "تم" ? "مكتمله" : "غير مكتمله"; ?></td>
                        <td>
                            <a href="show-request-tec?id=<?= $row["Request_num"] ?>">
                                <button class="btn-sm btn btn-secondary  dRequest show_<?= $row["Request_num"] ?>"
                                        style="font-family: 'Cairo', sans-serif !important;" title="عرض تفاصيل الطلب"><i
                                            class="bi bi-eye-fill"></i>
                                </button>
                            </a>
                        </td>
                        <td>
                            <button class="btn-sm btn btn-primary dRequest edit_<?= $row["Request_num"] ?>"
                                    title="اضافه تعليق"
                                    style="font-family: 'Cairo', sans-serif !important;"><i
                                        class='bi bi-chat-left-text'></i>
                            </button>

                        </td>
                        <td>

                            <a href="complete/request?id=<?= $row["Request_num"] ?>&Status=<?= $row["Status"] === "تم" ? "جار" : "تم" ?>">
                                <button class="btn-sm btn btn-success dRequest delete_<?= $row["Request_num"] ?>"
                                        title="<?= $row["Status"] === "تم" ? "لم يتم التنفييذ" : "تم التنفيذ" ?>"
                                        style="font-family: 'Cairo', sans-serif !important; background-color: <?= $row["Status"] == "تم" ? "#f44336" : "    #4caf50" ?> ;border-color: <?= $row["Status"] === "جار" ? "#607d8b" : "" ?> "><?= $row["Status"] === "جار" ? "<i class='bi bi-check-lg'></i>
" : "<i class='bi bi-x-circle'></i>" ?>

                                </button>
                            </a>
                        </td>
                    </tr>
                    <div class="edit-container" id="edit_<?= $row["Request_num"] ?>" style="display: none">
                        <form action=tecFeedback/request?id=<?= $row["Request_num"] ?> method="post"
                              enctype="multipart/form-data">
                            <div class="wrapper wrapper--w680" style="
                                        width: 1170px;
                                        margin: auto;
                                        position: fixed;
                                        top: 50%;
                                        left: 50%;
                                        transform: translate(-50%, -50%);">
                                <div class="card card-4" style="margin: 0 !important;">
                                    <div class="card-body" style="margin: 0 !important;">
                                        <h2 class="title"> ارسل تعليق</h2>
                                        <div class="row row-space mg-1 ">
                                            <div class="input-group-icon">
                                                <label for="tecFeedBack">أكتب تعليق </label>
                                                <input class="input--style-4 js-datepicker"
                                                       value="" name="TechFeedback" type="text" placeholder="اضف تعليقك"
                                                       style="border: 1px #a9a9a9 solid; width:100%">
                                            </div>
                                            <br>
                                            <br>
                                            <br>
                                            <div class="input-group-icon">
                                                <label for="tecImage">اضف صوره</label>
                                                <input type="file" id="myFile" name="image_tec" class="input">
                                            </div>
                                            <br>

                                            <div class="p-t-15" style=" direction: ltr;">
                                                <button class="btn btn--radius-2 btn--blue" id="submitBtn"
                                                        style="background-color: #4caf50  !important; color: white;"
                                                        type="submit">
                                                    ارسل التعليق
                                                </button>
                                                <button class="btn btn--radius-2 btn--blue backBtn" type="button"
                                                        style="background-color: #212529 !important; color: white">
                                                    رجوع
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </form>
                        <?php endif; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </main>

    </div>
</div>

</div>

<script src="./js/request2.js">

</script>
</body>
</html>

