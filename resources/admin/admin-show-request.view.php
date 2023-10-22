<?php include_once("header.php") ?>
    <!-- Start Main Content -->
    <!-- Start Main Content -->
    <div class="container-fluid">
    <div class="row " style="direction: rtl;">
        <!-- Start Card 1 -->
        <section class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">بيانات الطلب </h1>
            </div>

            <div class="card my-5">
                <div class="card-header fw-bold">
                    بيانات مرسل الطلب
                </div>
                <div class="card-body">
                    <div class="row">

                        <!-- Column 1 -->
                        <ul class="list-group list-group-flush col-md-6">

                            <li class="list-group-item">
                                <span class="fw-bold">اسم المرسل :</span>
                                <?= $data["Sender"] ?>
                            </li>
                            <li class="list-group-item">
                                <span class="fw-bold">وقت تعين المرسل :</span>
                                <?= $data["Date"] ?>
                            </li>

                        </ul>

                        <!-- Column 2 -->
                        <ul class="list-group list-group-flush col-md-6 col-12">

                            <li class="list-group-item">
                                <span class="fw-bold">الرقم الجامعي :</span>
                                <?= $data["SenderIdNum"] ?>
                            </li>
                            <li class="list-group-item">

                            </li>

                        </ul>
                    </div>
                </div>
            </div>

            <!-- End Card 1 -->

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
            <!-- End Card 2 -->
            <div class="card my-5">
                <div class="card-header fw-bold">
                    الفنيين المسؤلين عن الطلب
                </div>
                <div class="card-body">

                    <div class="row">

                        <!-- Column 1 -->
                        <ul class="list-group list-group-flush col-md-6">

                            <?php if (isset($data["Technical"])):
                                foreach ($data["Technical"] as $tec) {
                                    if ($tec): ?>
                                        <li class="list-group-item">
                                            <span class="fw-bold"> اسم الفني:</span>
                                            <?= $tec; ?>

                                        </li>

                                    <?php endif;
                                }endif; ?>
                            <li class="list-group-item">

                            </li>
                        </ul>

                        <!-- Column 2 -->
                        <ul class="list-group list-group-flush col-md-6 col-12">

                            <li class="list-group-item">
                                <span class="fw-bold">وقت التعين للفني :</span>
                                <?= isset($data["submitForTechinalTime"]) ? $data["submitForTechinalTime"] : "" ?>
                            </li>
                            <li class="list-group-item">

                            </li>


                        </ul>
                    </div>

                </div>
            </div>
            <!-- Start Card 3 -->


            <div class="card my-5">
                <div class="card-header fw-bold">
                    حالة الطلب
                </div>
                <div class="card-body">

                    <div class="row">

                        <!-- Column 1 -->
                        <ul class="list-group list-group-flush col-md-6">

                            <li class="list-group-item">
                                <span class="fw-bold">حالة الطلب :</span>
                                <?= $data["Status"] ?>  <?= $data["Status"] === "تم" ? "<i class='bi bi-check2-circle'></i>" : "" ?>
                            </li>

                        </ul>

                        <!-- Column 2 -->
                        <ul class="list-group list-group-flush col-md-6 col-12">

                            <li class="list-group-item">
                                <span class="fw-bold">تاريخ الاصلاح :</span>
                                <?= $data["fixTime"] ?>
                            </li>


                        </ul>
                    </div>

                </div>
            </div>
            <!-- End Card 3 -->

            <!-- Start Image Card -->
            <?php if ($data["imgUrl"]): ?>
                <div class="card my-5">
                    <div class="card-header fw-bold">
                        المرفق
                    </div>
                    <div class="card-body">
                        <p class="text-center">
                            <button class="btn btn-secondary" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseExample" aria-expanded="false"
                                    aria-controls="collapseExample">
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
            <?php endif; ?>
            <!-- End Image Card -->
            <!-- End Card 2 -->

            <div class="card my-5">
                <div class="card-header fw-bold">
                    تعليقات الفنيين
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
                                <li class="list-group-item">
                                    <div class="boxes-container">
                                        <div class="boxes">
                                            <span class="fw-bold"> مرسل التعليق :  <?= $d["tecName"] ?></span>
                                            <p><?= $d["message"] ?></p>
                                        </div>
                                        <div class="boxes">
                                            <span class="fw-bold">تاريخ الرساله :</span>
                                            <?= $d["Time"] ?>
                                        </div>
                                        <?php if ($d["image"]): ?>
                                        <div class="boxes">
                                            <p class="text-center">
                                                <a href="<?= home() . "/uploads/" . $d["image"] ?>" ] target="_blank">
                                                    <button class="btn btn-secondary" type="button"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#collapseExample" aria-expanded="false"
                                                            aria-controls="collapseExample">
                                                        عرض المرفق
                                                    </button>
                                                </a>
                                            </p>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                </li>

                            <?php endforeach; ?>
                        </ul>
                    </div>

                </div>
            </div>
            <!-- Start Card 3 -->
            <div class="card my-5">
                <div class="card-header fw-bold">
                    اضافه تعليق
                </div>
                <div class="card-body">
                    <form action=admin/feedback?id=<?=$data["Request_num"]?> method="post" enctype="multipart/form-data">
                        <div class="input-group-icon">
                            <label for="tecFeedBack">اضف تعليق </label>
                            <input class="input--style-4 js-datepicker"
                                   value="" name="adminFeedBack" type="text" placeholder="اضف تعليقك"
                                   style="border: 1px #a9a9a9 solid; width: 100%">
                        </div>
                        <br>
                        <div class="input-group-icon">
                            <button type="submit" class="btn btn-primary">ارسل التعليق</button>
                        </div>


                    </form>
                </div>
            </div>
    </div>
<?php
include_once("footer.php") ;
