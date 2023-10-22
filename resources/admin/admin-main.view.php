<?php include_once "header.php" ?>


<?php
$uncompleted = 0;
$RodProblem = 0;
$uncompletedOfRod = 0;
$uncompletedOfKhalf = 0;
$total = 0;
$date = date("w");
$weekProblemSolved = array("0"=>0,"1"=>0 ,"2"=>0 ,"3"=>0 ,"4"=>0 ,"5"=>0,"6"=>0);
$weekProblemUnSolved = array("0"=>0,"1"=>0 ,"2"=>0 ,"3"=>0 ,"4"=>0 ,"5"=>0,"6"=>0);

foreach ($data as $row) {
    $total++;
    if(!isset($row["Status"])){
        continue;
    }
    if ($row["Status"] === "جار") {
        $uncompleted++;
        $WeekIndex = (int)((int) $row["Request_num"] / 1000);
        $weekProblemUnSolved[date("w", $WeekIndex)]++;
    }
    if ($row["Status"] === "تم") {
        $WeekIndex = (int)((int) $row["Request_num"] / 1000);
        $weekProblemSolved[date("w", $WeekIndex)]++;
    }
    if ($row["Branch"] === "روض الفرج") {
        $RodProblem++;
    }
    if ($row["Status"] === "جار" && $row["Branch"] === "روض الفرج") {
        $uncompletedOfRod++;
    }
}

$completed = $total - $uncompleted;
$uncompletedOfKhalf = $uncompleted - $uncompletedOfRod;
$completedOfRod = $RodProblem - $uncompletedOfRod;
$completedOfKhalf = ($total - $RodProblem) - $uncompletedOfKhalf;


?>
<script >
    weekDaysSolved = [<?= $weekProblemSolved[0] ?> , <?= $weekProblemSolved[1] ?> , <?= $weekProblemSolved[2] ?> , <?= $weekProblemSolved[3] ?> , <?= $weekProblemSolved[4] ?> , <?= $weekProblemSolved[5] ?> , <?= $weekProblemSolved[6] ?> ]
    weekDaysUnSolved = [<?= $weekProblemUnSolved[0] ?> , <?= $weekProblemUnSolved[1] ?> , <?= $weekProblemUnSolved[2] ?> , <?= $weekProblemUnSolved[3] ?> , <?= $weekProblemUnSolved[4] ?> , <?= $weekProblemUnSolved[5] ?> , <?= $weekProblemUnSolved[6] ?> ]
</script>


<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">الطلبات</h1>
    </div>

    <div class="row row-space">
        <div class="col-12 col-lg-4 mb-3 mt-3">
            <div class="card">
                <h5 class="card-header">عدد الطلبات الكلي</h5>
                <div class="card-body">
                    <p class="" style="text-align: center;font-size: 32px"
                       id="counter1"><?php echo $total?> </p></div>
            </div>
        </div>

        <div class="col-12 col-lg-4 mb-3 mt-3">
            <div class="card">
                <h5 class="card-header">عدد الطلبات المكتمله</h5>
                <div class="card-body">
                    <p class="" style="text-align: center;font-size: 32px" id="counter2"><?= $completed ?></p></div>
            </div>
        </div>
        <div class="col-12 col-lg-4 mb-3 mt-3">
            <div class="card">
                <h5 class="card-header">عدد الطلبات قيد التنفيذ</h5>
                <div class="card-body">
                    <p class="" style="text-align: center;font-size: 32px" id="counter3"><?= $uncompleted ?></p></div>
            </div>
        </div>
    </div>
</main>
<section class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <hr>
    <h1 class="h2">احصائيات</h1>
    <input value="<?= $completedOfRod ?>" id="RodCompleted" style="display: none">
    <input value="<?= $completedOfKhalf ?>" id="KhalfCompleted" style="display: none">
    <input value="<?= $uncompletedOfRod ?>" id="RodUncompleted" style="display: none">
    <input value="<?= $uncompletedOfKhalf ?>" id="KhalfUncompleted" style="display: none">


    <div class="row">

        <div class="col-12 col-lg-6">
            <div class="card">
                <h5 class="card-header"> حالة المشاكل فرع روض الفرج</h5>
                <div class="card-body">
                    <canvas id="rodRequestStatus" style="width:100%"></canvas>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6 mb-4">
            <div class="card">
                <h5 class="card-header"> حالة المشاكل فرع الخلفاوي</h5>
                <div class="card-body">
                    <canvas id="khalRequestStatus"></canvas>
                </div>

            </div>
        </div>
    </div>
    <div class="col-12 mb-4">
        <div class="card">
            <h5 class="card-header">الاحصائيات الاسبوعيه</h5>
            <div class="card-body">
                <canvas id="weekly" style="width:100%;"></canvas>   
            </div>
        </div>
    </div>


    <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>
    <style>
        #myChart{
            display: none !important;
        }
    </style>
</section>


<?php include_once "footer.php"; ?>
