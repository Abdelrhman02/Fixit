<?php include_once "header.php" ?>
<?php
$users = array();
$requests = array();

foreach ($data as $row) {
    if (isset($row["Role"])) {
        array_push($users, $row);
    } else {
        array_push($requests, $row);
    }
}

?>
    <style>
        .sidebarSearch {
            visibility: visible !important;
            opacity: 1;
            transform: translate(0, 0) !important;
        }

        .hide {
            display: none;
        }
    </style>

    <div class="container-fluid">
        <div class="row " style="direction: rtl;">
            <!-- Start Sidebar -->
            <button class="btn-primary btn-sm searchBtn" id="searchBtnAdmin" style="
            background-color: rgb(25 135 84 / 68%);
           position: absolute;
            top: 4.2em;
            left: 1em;
            border-radius: 30px;
            width: 200px;">
                <span data-feather="search" class="align-text-bottom"></span>ابحث عن مشكله
            </button>
            <nav id="searchSideBar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse"
                 style="position: fixed;top: 3em;visibility: hidden;
            transform: translate(300px, 0);
            transition: 0.42s all ease-in-out;
                            ">
                <a href="admin-request" style="position: absolute; top: 33px;left: 13px; z-index: 100">
                    <button class="btn btn-primary btn-sm " id="searchBtn" style="cursor: pointer">عرض الكل</button>
                </a>
                <div class="position-sticky pt-3 sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="mb-1">
                            <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed"
                                    data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false"
                                    style="font-size: 32px;">
                                ابحث
                            </button>
                        </li>
                        <hr>

                        <li class="mb-3">

                            <div class="input-group-icon">
                                <select class="input--style-4 js-datepicker" id="tec_name" name="Request_state"
                                        id="tec_name">
                                    <option value="null" selected> اختر اسم الفني</option>
                                    <?php foreach ($users as $user): ?>
                                        <?php if ($user["Role"] !== "Admin" && $user["Role"] !== "Student"): ?>
                                            <option value="<?= $user["Name"] ?>"><?= $user["Name"] ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </li>

                        <li class="mb-3">

                            <div class="input-group-icon">
                                <select class="input--style-4 js-datepicker" id="request_building" name="Request_state"
                                >
                                    <option value="null" selected>اختر المبنى</option>
                                    <option value="الخلفاوي">الخلفاوي</option>
                                    <option value="روض الفرج">روض الفرج</option>

                                </select>
                            </div>
                        </li>

                        <li class="mb-3">
                            <div class="input-group-icon">
                                <select class="input--style-4 js-datepicker" id="request_type" name="Request_state"
                                        id="">
                                    <option value="null" selected>اختر نوع الطلب</option>
                                    <option value="كهرباء">
                                        كهربية
                                    </option>
                                    <option value="النت">
                                        النت
                                    </option>
                                    <option value="ماكينة التصوير">
                                        ماكينة التصوير
                                    </option>
                                    <option value="تكييفات">
                                        تكييفات
                                    </option>
                                    <option value="طابعة">
                                        طابعة
                                    </option>
                                    <option value="سباكة">
                                        سباكة
                                    </option>
                                    <option value="نجارة">
                                        نجارة
                                    </option>
                                    <option value="أعطال كهربية">
                                        أعطال كهربية
                                    </option>
                                    <option value="حدادة">
                                        حدادة
                                    </option>
                                    <option value="معماري">
                                        معماري
                                    </option>
                                    <option value="زجاج">
                                        زجاج
                                    </option>
                                    <option value="another">
                                        -أخرى-
                                    </option>

                                </select>
                            </div>
                        </li>
                        <li class="mb-3">
                            <div class="input-group-icon">
                                <select class="input--style-4 js-datepicker" data-provide="datepicker"
                                        name="Request_state"
                                        id="Request_status">
                                    <option value="null">حاله الطلب</option>
                                    <option value="غير مكتمله">لم يتم التنفيذ</option>
                                    <option value="مكتمله">تم التنفيذ</option>

                                </select>
                            </div>
                        </li>
                        <br>
                        <li class="mb-3">
                            <div class='input-group date' id='datetimepicker2'>
                                <label class="label">من تاريخ</label>
                                <div class="input-group-icon">
                                    <input class="input--style-4 js-datepicker" id="start_date" type="date"
                                           name="birthday"
                                           required="">
                                    <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                </div>
                            </div>
                        </li>
                        <li class="mb-3">
                            <div class="input-group">
                                <label class="label">الى تاريخ</label>
                                <div class="input-group-icon">
                                    <input class="input--style-4 js-datepicker" id="end_date" type="date"
                                           name="birthday"
                                           required="">
                                    <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                </div>
                            </div>
                        </li>
                        <br>
                        <li class="mb-3">
                            <div class="input-group">
                                <label class="label">رقم الطلب</label>
                                <input class="input--style-4" type="text" name="address" required="" id="req_num"
                                       placeholder="ادخل رقم الطلب"
                                       style="background-color: #9e9e9e !important; color: white">
                            </div>
                        </li>
                        <div style="display: none">

                            <!-- End Users Collapse -->
                            <li class="nav-item">
                                <a class="nav-link"
                                   href="../../../../Users/20122/Downloads/Compressed/v1.3-master_2/v1.3-master/main/reports.html">
                                    <span data-feather="bar-chart-2" class="align-text-bottom"></span>
                                    التقارير
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"
                                   href="../../../../Users/20122/Downloads/Compressed/v1.3-master_2/v1.3-master/main/stat.html">
                                    <span data-feather="layers" class="align-text-bottom"></span>
                                    احصائيات
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"
                                   href="../../../../Users/20122/Downloads/Compressed/v1.3-master_2/v1.3-master/main/stat.html">
                                    <span data-feather="settings" class="align-text-bottom"></span>
                                    اعدادات
                                </a>
                            </li>
                        </div>
                    </ul>

                    <div style="display: none">

                        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
                            <span>التقارير المحفوظة</span>
                            <a class="link-secondary" href="#" aria-label="إضافة تقرير جديد">
                                <span data-feather="plus-circle" class="align-text-bottom"></span>
                            </a>
                        </h6>
                        <ul class="nav flex-column mb-2">

                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <span data-feather="file-text" class="align-text-bottom"></span>
                                    الشهر الحالي
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <span data-feather="file-text" class="align-text-bottom"></span>
                                    الربع الأخير
                                </a>
                            </li>

                        </ul>
                    </div>

                    <!-- Start Test Drop list -->
                    <hr>

                    <!-- End Test Drop list -->


                </div>
            </nav>

            <!-- End Sidebar -->

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <style>.table-sm > :not(caption) > * > * {
                        padding: 0.25rem 0.5rem !important;

                    }</style>

                <h2 class="pt-3">الطلبات</h2>
                <div class="table-responsive">
                    <table class="table table-striped table-sm" style="">
                        <thead>
                        <tr>
                            <th scope="col">تاريخ_الطلب</th>
                            <th scope="col">رقم_الطلب</th>
                            <th scope="col">نوع_الطلب</th>
                            <th scope="col">وصف_الطلب</th>
                            <th scope="col">الدور</th>
                            <th scope="col">الغرفه</th>
                            <th scope="col">المبنى</th>
                            <th scope="col">الفرع</th>
                            <th scope="col">تعين_فني</th>
                            <th scope="col">حاله_الطلب</th>
                        </tr>
                        </thead>

                        <tbody style="font-family: 'Cairo', sans-serif !important;">
                        <?php foreach ($requests

                        as $row): ?>
                        <tr class="data row_<?= $row["Request_num"] ?>"
                            style="font-family: 'Cairo', sans-serif !important;font-size: 14px;">
                            <td><?= date("F j, Y, g:i a", (int)$row["Request_num"] / 1000); ?></td>
                            <td><?= $row["Request_num"] ?></td>
                            <td><?= $row["Type"] ?></td>
                            <td><?= $row["subType"] ?></td>
                            <td><?= $row["Floor"] ?></td>
                            <td><?= $row["Room"] ?></td>
                            <td style="white-space: nowrap;"><?= $row["Building"] ?></td>
                            <td><?= $row["Branch"] ?></td>
                            <td style="white-space: nowrap;"><?= isset($row["Technical"]) ? "تم تعين فني" : "" ?></td>
                            <td><?php echo ($row["Status"]) === "تم" ? "مكتمله" : "غير مكتمله"; ?></td>
                            <td>
                                <a href="admin-show-request?id=<?= $row["Request_num"] ?>">
                                    <button class="btn-sm btn btn-secondary  dRequest show_<?= $row["Request_num"] ?>"
                                            style="font-family: 'Cairo', sans-serif !important;"><i
                                                class="bi bi-eye-fill"></i>
                                    </button>
                                </a>
                            </td>
                            <td>
                                <button class="btn-sm btn btn-primary dRequest edit_<?= $row["Request_num"] ?>"
                                        style="font-family: 'Cairo', sans-serif !important;"><i
                                            class="bi bi-pencil-square"></i>

                                </button>
                            </td>
                            <td>
                                <button class="btn-sm btn btn-danger dRequest delete_<?= $row["Request_num"] ?>"
                                        style="font-family: 'Cairo', sans-serif !important;"><i
                                            class="bi bi-archive-fill"></i>

                                    </span>
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
                                                        <label class="label">الفرع</label>
                                                        <select class="input--style-4 js-datepicker"
                                                                style="    padding: 5px 0;" name="Branch"
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

                                                <div class="col-4">
                                                    <button class="btn btn-secondary addTec"
                                                            requestNum="<?= $row["Request_num"] ?>"
                                                            id="addTec_<?= $row["Request_num"] ?>" type="button"> اختر
                                                        اسم الفني
                                                    </button>
                                                    <button class="btn btn-danger hide"
                                                            id="cancelAddTec_<?= $row["Request_num"] ?>" type="button"
                                                            style="position: fixed;top: -55px;right: 163px;    width: 38px;border-radius: 999em;height: 38px;">
                                                        X
                                                    </button>
                                                    <div class="hide bg-dark"
                                                         style="position: fixed;width: 100%;height: 100%;top: 0;z-index: 100000; left: 0;--bs-bg-opacity: 0.5 !important;"
                                                         id="addTecField_<?= $row["Request_num"] ?>">

                                                        <div class="card card-body"
                                                             style="position: fixed;padding: 3em;top: 50%;left: 50%;transform: translate(-50%,-50%);z-index: 1000"
                                                        >
                                                            <div class="">
                                                                <div class="input-group-icon">
                                                                    <label class="label">اسم الفني الاول</label>
                                                                    <select class="input--style-4 js-datepicker"
                                                                            id="tec_name"
                                                                            name="Technical_1"
                                                                            id="tec_name">
                                                                        <option selected> اختر اسم الفني
                                                                        </option>
                                                                        <?php foreach ($users as $user): ?>
                                                                            <?php if ($user["Role"] !== "Admin" && $user["Role"] !== "Student"): ?>
                                                                                <option value="<?= $user["ID"] . "--" . $user["Name"] ?>" <?php if (isset($row["Technical"][0])) {
                                                                                    echo $row["Technical"][0] === $user["Name"] ? "selected" : "";
                                                                                } ?>><?= $user["Name"] ?></option>
                                                                            <?php endif; ?>

                                                                        <?php endforeach; ?>
                                                                    </select>
                                                                </div>
                                                                <br>
                                                                <br>
                                                                <div class="input-group-icon">

                                                                    <label class="label">اسم الفني الثاني</label>
                                                                    <select class="input--style-4 js-datepicker"
                                                                            id="tec_name"
                                                                            name="Technical_2"
                                                                            id="tec_name">
                                                                        <option value="" selected> اختر اسم الفني
                                                                        </option>
                                                                        <?php foreach ($users as $user): ?>
                                                                            <?php if ($user["Role"] !== "Admin" && $user["Role"] !== "Student"): ?>
                                                                                <option value="<?= $user["ID"] . "--" . $user["Name"] ?>" <?php if (isset($row["Technical"][1])) {
                                                                                    echo $row["Technical"][1] === $user["Name"] ? "selected" : "";
                                                                                } ?>><?= $user["Name"] ?></option>
                                                                            <?php endif; ?>

                                                                        <?php endforeach; ?>
                                                                    </select>
                                                                </div>
                                                                <br>
                                                                <br>
                                                                <div class="input-group-icon">
                                                                    <label class="label">اسم الفني الثالث</label>

                                                                    <select class="input--style-4 js-datepicker"
                                                                            id="tec_name"
                                                                            name="Technical_3"
                                                                            id="tec_name">
                                                                        <option value="" selected> اختر اسم الفني
                                                                        </option>
                                                                        <?php foreach ($users as $user): ?>
                                                                            <?php if ($user["Role"] !== "Admin" && $user["Role"] !== "Student"): ?>
                                                                                <option value="<?= $user["ID"] . "--" . $user["Name"] ?>" <?php if (isset($row["Technical"][2])) {
                                                                                    echo $row["Technical"][2] === $user["Name"] ? "selected" : "";
                                                                                } ?>><?= $user["Name"] ?></option>
                                                                            <?php endif; ?>

                                                                        <?php endforeach; ?>
                                                                    </select>
                                                                </div>
                                                                <br>
                                                                <button class="btn btn-primary hide"
                                                                        id="saveAddTec_<?= $row["Request_num"] ?>"
                                                                        type="button" style="display: block">
                                                                    حفظ التعديلات
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <br>
                                            <div class="row row-space row-edit">
                                                <div class="col-4">
                                                    <div class="input-group">
                                                        <label class="label">رقم الغرفه</label>
                                                        <div class="input-group-icon">
                                                            <select class="input--style-4 js-datepicker"
                                                                    type="text" name="Room"
                                                                    id="room_num">
                                                                <option value="" <?= !$row["Room"] ? "selected" : ""; ?>>
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

                                                <div class="col-4">
                                                    <div class="input-group">
                                                        <label class="label" for="type">المشكلة</label>
                                                        <select class="input--style-4 js-datepicker"
                                                                style="    padding: 5px 0;" name="Type" id="">
                                                            <option value="كهرباء" <?= $row["Type"] == "كهربية" ? "selected" : ""; ?>>
                                                                كهربية
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
                                                        <label class="label">الدور</label>
                                                        <div class="input-group-icon">
                                                            <select class="input--style-4 js-datepicker"
                                                                    type="number"
                                                                    name="Floor"
                                                                    id="room_num">
                                                                <option value="" <?= $row["Floor"] === "0" ? "selected" : "" ?>>
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
                                                <br>
                                            </div>
                                            <br>
                                            <div class="row row-space">
                                                <div class="col-4">
                                                    <div class="input-group">
                                                        <label class="label">حاله الطلب</label>
                                                        <select class="input--style-4 js-datepicker"
                                                                style="padding: 5px 0;" name="Status"
                                                                id="">
                                                            <option value="جار" <?= $row["Status"] === "جار" ? "" : "selected" ?>>
                                                                لم
                                                                يتم التنفيذ
                                                            </option>
                                                            <option value="تم" <?= $row["Status"] === "تم" ? "selected" : "" ?>>
                                                                تم
                                                                التنفيذ
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="input-group">
                                                        <label for="Building" class="label">المبنى</label>
                                                        <select class="input--style-4 js-datepicker" name="Building"
                                                                id="Building" style="padding: 5px 0" required>
                                                            <option value="المبني الرئيسي" <?= $row["Building"] === "المبني الرئيسي" ? "selected" : "" ?>>
                                                                المبني الرئيسي
                                                            </option>
                                                            <option value="المبني الفرعي" <?= $row["Building"] === "المبني الفرعي" ? "selected" : "" ?>>
                                                                المبني الفرعي
                                                            </option>
                                                        </select>
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
                                                <input class="input--style-4 js-datepicker"
                                                       value="<?= isset($row["Track"]) ? $row["Track"] : ""; ?>"
                                                       type="text" name="Track"
                                                       id="room_num" readonly style="display: none">
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
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </main>

        </div>
    </div>
    <script src="./js/request.js"></script>

<?php include_once "footer.php" ?>