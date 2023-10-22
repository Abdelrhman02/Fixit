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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900&display=swap">
    <script src="js/jquery-3.6.0.min.js"></script>
<body>
<?php
function trimText($str, $length)
{
    $pieces = explode(" ", $str);
    return implode(" ", array_splice($pieces, 0, $length));
}

?>
<a href="http://localhost/fixit">
    <h1 class="logo-h1">FIXIT</h1></a>
<!-- <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow"> -->
<header class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow" style="    direction: rtl;">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-center" href="http://localhost/fixit/"
       style="font-size: 32px !important;">FIXIT</a>
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
                        <th scope="col">نوع_الطلب</th>
                        <th scope="col">الدور</th>
                        <th scope="col">الغرفه</th>
                        <th scope="col">المبنى</th>
                        <th scope="col">الفرع</th>
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
                        <td><?= date("F j, Y, g:i a", (int) $row["Request_num"]/1000 );  ?></td>
                        <td><?= $row["Request_num"]?></td>
                        <td><?= $row["Type"] ?></td>
                        <td><?= $row["Floor"] ?></td>
                        <td><?= $row["Room"] ?></td>
                        <td><?= $row["Building"] ?></td>
                        <td><?= $row["Branch"] ?></td>
                        <td></td>
                        <td><?php echo ($row["Status"] === "تم") ? "مكتمله" : "غير مكتمله"; ?></td>
                        <td><?php echo trimText($row["Details"], 5); ?></td>
                        <td>
                            <button class="btn-sm btn btn-danger dRequest delete_<?= $row["Request_num"] ?>"
                                    style="font-family: 'Cairo', sans-serif !important;">حذف
                            </button>
                        </td>
                        <td>
                            <button class="btn-sm btn btn-primary dRequest edit_<?= $row["Request_num"] ?>"
                                    style="font-family: 'Cairo', sans-serif !important;">تعديل
                            </button>
                        </td>
                    </tr>
                    <div class="alert_box" id="delete_<?= $row["Request_num"] ?>">
                        <div class="container_alert">
                            <p>هل انت متاكد من انك تريد حذف الطلب رقم <span><?= $row["Request_num"] ?></span> ؟</p>
                            <div class="alert_btn">
                                <a href="delete/request?id=<?= $row["Request_num"] ?>"
                                   style="text-decoration: none">
                                    <button style="background-color: #ff4545;    width: 100px;">نعم</button>
                                </a>
                                <button style="background-color: #fff;color: black;   width: 100px;"
                                        class="backBtn">
                                    رجوع
                                </button>

                            </div>
                        </div>
                    </div>
                    <div class="edit-container" id="edit_<?= $row["Request_num"] ?>" style="display: none">
                        <form action="update/request?id=<?= $row["Request_num"] ?>" method="post"
                              style="    background: #fff0;">

                            <div class="wrapper wrapper--w680" style="
                                        width: 1170px;
                                        margin: auto;
                                        position: fixed;
                                        top: 50%;
                                        left: 50%;
                                        transform: translate(-50%, -50%);">
                                <div class="card card-4" style="margin: 0 !important;">
                                    <div class="card-body" style="margin: 0 !important;">
                                        <h2 class="title">تعديل الطلب</h2>
                                        <div class="row row-space mg-1 ">
                                            <input class="input--style-4" type="text"
                                                   value="<?= $row["Date"] ?>" name="Date"
                                                   required="" id="req_num" style="display: none" readonly>
                                            <div class="col-4">
                                                <div class="input-group">
                                                    <label class="label">رقم الطلب</label>
                                                    <input class="input--style-4" type="text"
                                                           value="<?= $row["Request_num"] ?>" name="Request_num"
                                                           required="" id="req_num" readonly>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="input-group">
                                                    <label class="label" for="type">المشكلة</label>
                                                    <select class="input--style-4 js-datepicker"
                                                            name="Type" id="">
                                                        <option value="كهرباء" <?= $row["Type"] == "كهربية" ? "selected" : ""; ?>>
                                                            كهرباء
                                                        </option>
                                                        <option value="النت" <?= $row["Type"] == "النت" ? "selected" : ""; ?>>
                                                            النت
                                                        </option>
                                                        <option value="ماكينة التصوير" <?= $row["Type"] == "ماكينة التصوير" ? "selected" : ""; ?>>
                                                            ماكينة التصوير
                                                        </option>
                                                        <option value="تكييفات" <?= $row["Type"] == "تكييفات" ? "selected" : ""; ?>>
                                                            تكييفات
                                                        </option>
                                                        <option value="طابعة" <?= $row["Type"] == "طابعة" ? "selected" : ""; ?>>
                                                            طابعة
                                                        </option>
                                                        <option value="سباكة" <?= $row["Type"] == "سباكة" ? "selected" : ""; ?>>
                                                            سباكة
                                                        </option>
                                                        <option value="نجارة" <?= $row["Type"] == "نجارة" ? "selected" : ""; ?>>
                                                            نجارة
                                                        </option>
                                                        <option value="أعطال كهربية" <?= $row["Type"] == "أعطال كهربية" ? "selected" : ""; ?>>
                                                            أعطال كهربية
                                                        </option>
                                                        <option value="حدادة" <?= $row["Type"] == "حدادة" ? "selected" : ""; ?> >
                                                            حدادة
                                                        </option>
                                                        <option value="معماري"<?= $row["Type"] == "معماري" ? "selected" : ""; ?>>
                                                            معماري
                                                        </option>
                                                        <option value="زجاج"<?= $row["Type"] == "زجاج" ? "selected" : ""; ?>>
                                                            زجاج
                                                        </option>
                                                        <option value="another" <?= $row["Type"] == "-أخرى-" ? "selected" : ""; ?>>
                                                            -أخرى-
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="input-group">
                                                    <label class="label">الفرع</label>
                                                    <select class="input--style-4 js-datepicker"
                                                            name="Branch"
                                                            id="">
                                                        <option value="الخلفاوي" <?= $row["Branch"] == "الخلفاوي" ? "selected" : "" ?>>
                                                            الخلفاوي
                                                        </option>
                                                        <option value="روض الفرج" <?= $row["Branch"] == "روض الفرج" ? "selected" : "" ?>>
                                                            روض الفرج
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                        <br>
                                        <div class="row row-space row-edit">
                                            <div class="col-4">
                                                <div class="input-group">
                                                    <label class="label" for="type">المبنى</label>
                                                    <select class="input--style-4 js-datepicker" name="Building"
                                                            id="Building " required>
                                                        <option value="المبني الرئيسي" <?= $row["Building"] === "المبني الرئيسي" ? "selected" : "" ?>>
                                                            المبني الرئيسي
                                                        </option>
                                                        <option <?= $row["Building"] === "المبني الفرعي" ? "selected" : "" ?>
                                                                value="المبني الفرعي">المبني الفرعي
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="input-group">
                                                    <label class="label">الدور</label>
                                                    <div class="input-group-icon">
                                                        <select class="input--style-4 js-datepicker"
                                                                name="Floor"
                                                                required="" id="room_num">
                                                            <option value="0" <?= $row["Floor"] === "0" ? "selected" : "" ?>>
                                                                اختر الطابق
                                                            </option>
                                                            <option value="0" <?= $row["Floor"] === "0" ? "selected" : "" ?>>
                                                                الارضي
                                                            </option>
                                                            <option value="1" <?= $row["Floor"] === "1" ? "selected" : "" ?>>
                                                                الاول
                                                            </option>
                                                            <option value="2" <?= $row["Floor"] === "2" ? "selected" : "" ?>>
                                                                الثاني
                                                            </option>
                                                            <option value="3" <?= $row["Floor"] === "3" ? "selected" : "" ?>>
                                                                الثالث
                                                            </option>
                                                            <option value="4" <?= $row["Floor"] === "4" ? "selected" : "" ?>>
                                                                الرابع
                                                            </option>
                                                            <option value="5" <?= $row["Floor"] === "5" ? "selected" : "" ?>>
                                                                الخامس
                                                            </option>
                                                            <option value="6" <?= $row["Floor"] === "6" ? "selected" : "" ?>>
                                                                السادس
                                                            </option>
                                                            <option value="7" <?= $row["Floor"] === "7" ? "selected" : "" ?>>
                                                                السابع
                                                            </option>
                                                            <option value="8" <?= $row["Floor"] === "8" ? "selected" : "" ?>>
                                                                الثامن
                                                            </option>
                                                        </select>
                                                        <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="input-group">
                                                    <label class="label">رقم الغرفه</label>
                                                    <div class="input-group-icon">
                                                        <select class="input--style-4 js-datepicker"
                                                                type="text" name="Room"
                                                                id="room_num">
                                                            <option value="0"<?= $row["Room"] === "0" ? "selected" : ""; ?>>
                                                                اختر اسم الغرفه
                                                            </option>
                                                            <option value="SB1-1"<?= $row["Room"] === "SB1-1" ? "selected" : ""; ?>>
                                                                SB1-1
                                                            </option>
                                                            <option value="SB1-2"<?= $row["Room"] === "SB1-2" ? "selected" : ""; ?>>
                                                                SB1-2
                                                            </option>
                                                            <option value="SB1-3"<?= $row["Room"] === "SB1-3" ? "selected" : ""; ?>>
                                                                SB1-3
                                                            </option>
                                                            <option value="SB1-4"<?= $row["Room"] === "SB1-4" ? "selected" : ""; ?>>
                                                                SB1-4
                                                            </option>
                                                            <option value="SB1-5"<?= $row["Room"] === "SB1-5" ? "selected" : ""; ?>>
                                                                SB1-5
                                                            </option>
                                                            <option value="SB1-6"<?= $row["Room"] === "SB1-6" ? "selected" : ""; ?>>
                                                                SB1-6
                                                            </option>
                                                            <option value="SB1-7"<?= $row["Room"] === "SB1-7" ? "selected" : ""; ?>>
                                                                SB1-7
                                                            </option>
                                                            <option value="SB1-8"<?= $row["Room"] === "SB1-8" ? "selected" : ""; ?>>
                                                                SB1-8
                                                            </option>
                                                            <option value="SB2-1"<?= $row["Room"] === "SB2-1" ? "selected" : ""; ?>>
                                                                SB2-1
                                                            </option>
                                                            <option value="SB2-2"<?= $row["Room"] === "SB2-2" ? "selected" : ""; ?>>
                                                                SB2-2
                                                            </option>
                                                            <option value="SB2-3"<?= $row["Room"] === "SB2-3" ? "selected" : ""; ?>>
                                                                SB2-3
                                                            </option>
                                                            <option value="SB2-4"<?= $row["Room"] === "SB2-4" ? "selected" : ""; ?>>
                                                                SB2-4
                                                            </option>
                                                            <option value="SB2-5"<?= $row["Room"] === "SB2-5" ? "selected" : ""; ?>>
                                                                SB2-5
                                                            </option>
                                                            <option value="SB2-6"<?= $row["Room"] === "SB2-6" ? "selected" : ""; ?>>
                                                                SB2-6
                                                            </option>
                                                            <option value="SB2-7"<?= $row["Room"] === "SB2-7" ? "selected" : ""; ?>>
                                                                SB2-7
                                                            </option>
                                                            <option value="SB2-8"<?= $row["Room"] === "SB2-8" ? "selected" : ""; ?>>
                                                                SB2-8
                                                            </option>
                                                            <option value="SB3-1"<?= $row["Room"] === "SB3-1" ? "selected" : ""; ?>>
                                                                SB3-1
                                                            </option>
                                                            <option value="SB3-2"<?= $row["Room"] === "SB3-2" ? "selected" : ""; ?>>
                                                                SB3-2
                                                            </option>
                                                            <option value="SB3-3"<?= $row["Room"] === "SB3-3" ? "selected" : ""; ?>>
                                                                SB3-3
                                                            </option>
                                                            <option value="SB3-4"<?= $row["Room"] === "SB3-4" ? "selected" : ""; ?>>
                                                                SB3-4
                                                            </option>
                                                            <option value="SB3-5"<?= $row["Room"] === "SB3-5" ? "selected" : ""; ?>>
                                                                SB3-5
                                                            </option>
                                                            <option value="SB3-6"<?= $row["Room"] === "SB3-6" ? "selected" : ""; ?>>
                                                                SB3-6
                                                            </option>
                                                            <option value="SB3-7"<?= $row["Room"] === "SB3-7" ? "selected" : ""; ?>>
                                                                SB3-7
                                                            </option>
                                                            <option value="SB3-8"<?= $row["Room"] === "SB3-8" ? "selected" : ""; ?>>
                                                                SB3-8
                                                            </option>
                                                            <option value="SB4-1"<?= $row["Room"] === "SB4-1" ? "selected" : ""; ?>>
                                                                SB4-1
                                                            </option>
                                                            <option value="SB4-2"<?= $row["Room"] === "SB4-2" ? "selected" : ""; ?>>
                                                                SB4-2
                                                            </option>
                                                            <option value="SB4-3"<?= $row["Room"] === "SB4-3" ? "selected" : ""; ?>>
                                                                SB4-3
                                                            </option>
                                                            <option value="SB4-4"<?= $row["Room"] === "SB4-4" ? "selected" : ""; ?>>
                                                                SB4-4
                                                            </option>
                                                            <option value="SB4-5"<?= $row["Room"] === "SB4-5" ? "selected" : ""; ?>>
                                                                SB4-5
                                                            </option>
                                                            <option value="SB4-6"<?= $row["Room"] === "SB4-6" ? "selected" : ""; ?>>
                                                                SB4-6
                                                            </option>
                                                            <option value="SB4-7"<?= $row["Room"] === "SB4-7" ? "selected" : ""; ?>>
                                                                SB4-7
                                                            </option>
                                                            <option value="SB4-8"<?= $row["Room"] === "SB4-8" ? "selected" : ""; ?>>
                                                                SB4-8
                                                            </option>
                                                        </select>
                                                        <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                        </div>
                                        <br>
                                        <div class="row row-space">
                                            <div class="col-4">
                                                <div class="input-group">
                                                    <label class="label">حاله الطلب</label>
                                                    <input class="input--style-4 js-datepicker"
                                                           style="padding: 15px 0;" name="Status"
                                                           id="" value=" <?= $row["Status"] ?>" readonly>
                                                </div>
                                            </div>

                                            <div class="col-4">
                                                <div class="input-group">
                                                    <label class="label">وصف المشكله</label>
                                                    <div class="input-group-icon">
                                                        <textarea name="Details" id="" cols="30" rows="10"
                                                                  value="<?= $row["Details"] ?>"
                                                                  style="font-size: 16px; height: 60px;"><?= $row["Details"] ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4"><a href="uploads/"
                                                                  style="display:none">
                                                    <button class="btn-secondary btn imageBtn"
                                                            id="" type="button">عرض صوره
                                                        المشكله
                                                    </button>

                                                </a>
                                            </div>
                                            <div class="row row-space">

                                                <div class="col-2">
                                                </div>
                                            </div>
                                            <div class="p-t-15" style=" direction: ltr;">
                                                <button class="btn btn--radius-2 btn--blue" id="submitBtn"
                                                        style="background-color: #4caf50  !important; color: white;"
                                                        type="submit">
                                                    حفظ التعديلات
                                                </button>
                                                <button class="btn btn--radius-2 btn--blue backBtn" type="button"
                                                        style="background-color: #212529 !important; color: white">
                                                    رجوع
                                                </button>
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