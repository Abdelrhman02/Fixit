<?php include_once("header.php") ?>
<!-- Start Main Content -->
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

    <h2 class="pt-3 text-center">اضافة مستخدم</h2>
    <style>
        .hide {
            display: none;
        }
    </style>
    <?php $data = $data[0];  ?>
    <div class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="col-md-9 col-lg-5 col-10">
            <form class="needs-validation" novalidate="" style="direction: rtl"
                  action="admin/editUser?id=<?= $data["Id"] ?>" method="post">
                <div class="row g-3">
                    <div class="">
                        <label for="state" class="form-label">اختر دور المستخدم</label>
                        <select class="form-select" id="state" name="Role">
                            <option value="">اختر ....</option>
                            <option value="Admin" <?= $data["Role"] === "Admin" ? "selected" : "" ?> >مدير</option>
                            <option value="<?=$data["Role"]?>" <?= $data["Role"] !== "Admin" && $data["Role"] !== "Student"? "selected" : "" ?>> فني
                            </option>
                            <option value="Student" <?= $data["Role"] === "Student" ? "selected" : "" ?>>طالب</option>
                        </select>

                    </div>

                    <hr class="my-4">

                    <div class="col-12">
                        <label for="firstName" class="form-label">الاسم </label>
                        <input type="text" class="form-control" id="firstName" value="<?= $data["Name"]  ?>" name="Name"
                               placeholder="الاسم"
                               value="" required="">
                        <div class="invalid-feedback">
                            يرجى إدخال اسم .
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="username" class="form-label">الرقم الجامعي/الرقم القومي</label>
                        <div class="input-group has-validation">
                            <input type="number" class="form-control" value="<?= $data["Id"]?>" name="Id"
                                   id="username"
                                   placeholder="من فضلك قم بادخال الرقم الجامعي/الرقم القومي " required=""
                                   aria-rowcount="off" style="direction: rtl;">
                            <div class="invalid-feedback">
                                اسم المستخدم الخاص بالمستخدم الجديد مطلوب.
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-danger" id="password-Btn" type="button">اعاده تعين كلمه السر</button>
                    <div class="hide" id="password-hide">
                        <div class="col-12">
                            <label for="address" class="form-label">كلمة المرور</label>
                            <input dir="ltr" type="password" name="password" placeholder="قم بادخال الرقم السري هنا"
                                   class="form-control" id="password" required="" style="direction: rtl">
                            <div class="invalid-feedback">
                                يرجى إدخال كلمة المرور الخاصة بالمستخدم.
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="address2" class="form-label">اعد كتابة كلمة المرور</label>
                            <input type="password" placeholder="اعد ادخال الرقم السري هنا" class="form-control"
                                   id="confirm-password" required="">
                        </div>
                    </div>
                    <hr class="my-4">

                    <button class="w-100 btn btn-primary btn-lg" type="submit">تعديل البيانات</button>
            </form>
        </div>
    </div>
</main>
<script src="js/admin-edit.js"></script>
<!-- End Main Content -->
<?php include_once("footer.php") ?>

