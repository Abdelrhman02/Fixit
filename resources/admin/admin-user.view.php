<?php include_once("header.php") ?>
<!-- Start Main Content -->
<!-- Start Main Content -->
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

    <h2 class="pt-3" style="margin-bottom: 1em">ادارة المستخدمين</h2>
    <hr>
    <h2 class="pt-3" style="margin-bottom: 1em">المديرين</h2>
    <div class="container" style="display: flex">
        <div class="row">

            <?php foreach ($data as $user): ?>
                <?php if ($user["Role"] === "Admin"): ?>
                    <div class="col-4">

                        <div class="card" style="width: max-content;padding: 15px;margin-left: 2em;margin-bottom: 2em;
">
                            <div class="card-body">
                                <h5 class="card-title"><?= $user["Name"] ?></h5>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">نوع المستخدم
                                    : <?= $user["Role"] === "Admin" ? "مدير" : "" ?></li>
                                <li class="list-group-item ">الرقم الجامعي/البطاقه : <?= $user["Id"] ?></li>
                            </ul>
                            <div class="card-body">
                                <a href="admin-user-edit?id=<?= $user["Id"] ?>"><button  class="card-link btn btn-dark">تعديل</button></a>
                                <a href="admin/user/delete?id=<?= $user["Id"] ?>" class="card-link btn btn-danger delete">حذف</a>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>

            <h2 class="pt-3" style="margin-bottom: 1em">الفنين</h2>
            <?php foreach ($data as $user): ?>
                <?php if ($user["Role"] !== "Admin" && $user["Role"] !== "Student"): ?>

                    <div class="col-4">

                        <div class="card" style="width: max-content;padding: 15px;margin-left: 2em;margin-bottom: 2em;">
                            <div class="card-body">
                                <h5 class="card-title"><?= $user["Name"] ?></h5>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">نوع المستخدم
                                    : <?= $user["Role"]  ?></li>
                                <li class="list-group-item ">الرقم الجامعي/البطاقه : <?= $user["Id"] ?></li>
                            </ul>
                            <div class="card-body">
                                <a href="admin-user-edit?id=<?= $user["Id"] ?>"><button  class="card-link btn btn-dark">تعديل</button></a>
                                <a href="admin/user/delete?id=<?= $user["Id"] ?>" class="card-link btn btn-danger delete">حذف</a>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>

            <h2 class="pt-3" style="margin-bottom: 1em">الطلاب</h2>
            <?php foreach ($data as $user): ?>
                <?php if ($user["Role"] === "Student"): ?>

                    <div class="col-4">

                        <div class="card" style="width: max-content;padding: 15px;margin-left: 2em;margin-bottom: 2em;
">
                            <div class="card-body">
                                <h5 class="card-title"><?= $user["Name"]?></h5>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">نوع المستخدم
                                    : <?= $user["Role"] === "Student" ? "طالب" : "" ?></li>
                                <li class="list-group-item ">الرقم الجامعي/البطاقه : <?= $user["Id"] ?></li>
                            </ul>
                            <div class="card-body">
                                <a href="admin-user-edit?id=<?= $user["Id"] ?>"><button  class="card-link btn btn-dark">تعديل</button></a>
                                <a href="admin/user/delete?id=<?= $user["Id"] ?>" class="card-link btn btn-danger delete">حذف</a>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

            <?php endforeach; ?>

        </div>
    </div>


</main>
<?php include_once("footer.php") ?>
