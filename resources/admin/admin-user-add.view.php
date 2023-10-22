<?php include_once ("header.php")?>
<!-- Start Main Content -->
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

    <h2 class="pt-3 text-center">اضافة مستخدم</h2>


    <div class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="col-md-9 col-lg-5 col-10">
            <form class="needs-validation" style="direction: rtl" action="admin/addUser" method="post">
                <div class="row g-3">
                    <div class="">
                        <label for="state" class="form-label">اختر دور المستخدم</label>
                        <select class="form-select" id="state" name="Role" required>
                            <option value="">اختر ....</option>
                            <option value="Admin">مدير</option>
                            <option value="Technical"> فني</option>
                            <option value="Student">طالب</option>
                        </select>

                    </div>

                    <hr class="my-4">

                    <div class="col-12">
                        <label for="Name" class="form-label">الاسم </label>
                        <input type="text" class="form-control" id="Name" name="Name" placeholder="الاسم"
                               value="" required>
                        <div class="invalid-feedback">
                            يرجى إدخال اسم .
                        </div>
                    </div>
                    <p class="" style="color: white; background-color: #e34747;width: fit-content; padding: 10px;display: <?= isset($data["message2"]) ? "block":"none" ?>" ><?= isset($data["message2"]) ? $data["message2"]:"" ?></p>
                    <div class="col-12">
                        <label for="user_id" class="form-label">الرقم الجامعي/الرقم القومي</label>
                        <div class="input-group has-validation">
                            <input type="number" class="form-control" name="Id" id="user_id"
                                   placeholder="من فضلك قم بادخال الرقم الجامعي/الرقم القومي "
                                   aria-rowcount="off" style="direction: rtl;" required>
                            <div class="invalid-feedback">
                                اسم المستخدم الخاص بالمستخدم الجديد مطلوب.
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <p class="" style="color: white; background-color: #e34747;width: fit-content; padding: 10px;display: <?= isset($data["message"]) ? "block":"none" ?>" ><?= isset($data["message"]) ? $data["message"]:"" ?></p>
                        <label for="password" class="form-label">كلمة المرور</label>
                        <input dir="ltr"  type="password" name="Password" placeholder="قم بادخال الرقم السري هنا"
                               class="form-control" id="password"  style="direction: rtl" required/>
                        <div class="invalid-feedback">
                            يرجى إدخال كلمة المرور الخاصة بالمستخدم.
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="confirm-password" class="form-label">اعد كتابة كلمة المرور</label>
                        <input type="password" name="re-password" placeholder="اعد ادخال الرقم السري هنا" class="form-control"
                               id="confirm-password" required>
                    </div>
                    <hr class="my-4">
                    <button class="btn btn-primary btn-lg" type="submit">اضافة مستخدم جديد</button>
            </form>
        </div>
    </div>
</main>
<!-- End Main Content -->
<?php include_once ("footer.php")?>

