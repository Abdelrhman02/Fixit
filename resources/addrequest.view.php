<!DOCTYPE html>
<html lang="ar">
<head>
    <title>اضافه طلب</title>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link rel="stylesheet" type="text/css" href="./style/addrequest.css">

</head>
<style>

    .show-modal {
        font-size: 2rem;
        font-weight: 600;
        padding: 1.75rem 3.5rem;
        margin: 5rem 2rem;
        border: none;
        background-color: #fff;
        color: #444;
        border-radius: 10rem;
        cursor: pointer;
    }

    .close-modal {
        position: absolute;
        top: 1.2rem;
        right: 2rem;
        font-size: 5rem;
        color: #333;
        cursor: pointer;
        border: none;
        background: none;
    }

    h1 {
        font-size: 2.5rem;
        margin-bottom: 2rem;
    }

    p {
        font-size: 1.8rem;
    }

    /* -------------------------- */
    /* CLASSES TO MAKE MODAL WORK */
    .hidden {
        display: none !important;
    }

    .modal {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 170%;
        background-color: white;
        padding: 6rem;
        border-radius: 5px;
        box-shadow: 0 3rem 5rem rgba(0, 0, 0, 0.3);
        z-index: 10;
    }

    .overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.6);
        backdrop-filter: blur(3px);
        z-index: 5;
    }

    .map-row > input {
    }

    .map-row {
        direction: ltr;
        flex-wrap: wrap;
        display: grid;
        grid-template-columns: 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr;
        align-items: self-end;
        overflow-x: scroll;

    }

    .map-row::-webkit-scrollbar {
        display: none;
    }

    input {
        transition: all 300ms ease-in-out;
    }

    .map-row > .inColum > input:hover {
        opacity: 0.75;
        zoom: 150%;

    }

    .map-row > input:hover {
        opacity: 0.75;
        zoom: 150%;

    }
</style>
<body>
<form action="request/create" method="post" id="ismForm " enctype="multipart/form-data">
    <div lang="ar" dir="rtl" class="wrapper">
        <div class="header">
            <ul>
                <li class="active form_1_progessbar">
                    <div>
                        <p>١</p>
                    </div>
                </li>
                <li class="form_2_progessbar">
                    <div>
                        <p>٢</p>
                    </div>
                </li>
                <li class="form_3_progessbar">
                    <div>
                        <p>٣</p>
                    </div>
                </li>
            </ul>
        </div>
        <div class="form_wrap">
            <div class="form_1 data_info">
                <h2>معلومات أساسية</h2>
                <form>
                    <div class="form_container">
                        <div class="input_wrap">
                            <label for="building">الفرع</label>
                            <select name="Branch" id="request_title" required>
                                <option value="روض الفرج">روض الفرج</option>
                                <option value="الخلفاوي" selected>الخلفاوي</option>
                            </select>
                            <label for="Building">المبنى</label>
                            <select name="Building" id="Building " required>
                                <option value="المبني الرئيسي">المبني الرئيسي</option>
                                <option value="المبني الفرعي" selected>المبني الفرعي</option>
                            </select>
                            <div class="input_wrap">
                                <label for="type">المشكلة</label>
                                <select id="problemType" name="Type">
                                    <option value="كهرباء" type="elect" selected>
                                        كهرباء
                                    </option>
                                    <option value="النت" type="net">
                                        النت
                                    </option>
                                    <option value="ماكينة التصوير" type="print">
                                        ماكينة التصوير
                                    </option>
                                    <option value="تكييفات" type="air">
                                        تكييفات
                                    </option>
                                    <option value="طابعة" type="printer">
                                        طابعة
                                    </option>
                                    <option value="سباكة" type="water">
                                        سباكة
                                    </option>
                                    <option value="نجارة" type="wood">
                                        نجارة
                                    </option>
                                    <option value="حدادة" type="iron">
                                        حدادة
                                    </option>
                                    <option value="معماري" type="معماري">
                                        معماري
                                    </option>
                                    <option value="زجاج" type="زجاج">
                                        زجاج
                                    </option>
                                    <option value="اخرى">
                                        -أخرى-
                                    </option>
                                </select>
                            </div>
                            <div class="input_wrap">
                                <label for="type">وصف المشكله</label>
                                <select id="subProblem" name="subType">
                                    <option class="elect sub" value="" selected>
                                        اختر تصنيف المشكله
                                    </option>
                                    <option class="elect sub" value="اعطال اضائه">
                                        اعطال اضائه
                                    </option>
                                    <option class="elect sub" value="فيش">
                                        فيش
                                    </option>
                                    <option class="elect sub" value="وصلات كهرباء">
                                        وصلات كهرباء
                                    </option>
                                    <option class="elect sub" value="احمال تكيفات">
                                        احمال تكيفات
                                    </option>
                                    <option class="elect sub" value="قاطع في لوحه">
                                        قاطع في لوحه
                                    </option>
                                    <option class="elect sub" value="عدم وجود مصدر كهرباء">
                                        عدم وجود مصدر كهرباء
                                    </option>
                                    <option class="net sub" style="display: none;" value="ضعف الانترنت">
                                        ضعف الانترنت
                                    </option>
                                    <option class="net sub" style="display: none;" value="مشكله في كبل الانترنت">
                                        مشكله في كبل الانترنت
                                    </option>
                                    <option class="air sub" style="display: none;" value="التكيفات">
                                        انقطاع التيار عن التكيف
                                    </option>
                                    <option class="air sub" style="display: none;" value="ضعف في التبريد">
                                        ضعف في التبريد
                                    </option>
                                    <option class="air sub" style="display: none;" value="التكيف لا يعمل تمام ">
                                        لا يعمل
                                    </option>
                                    <option class="water sub" style="display: none;" value="تسريب مياه">
                                        تسريب مياه
                                    </option>
                                    <option class="water sub" style="display: none;" value="كسر حنفية">
                                        كسر حنفية
                                    </option>
                                    <option class="water sub" style="display: none;" value="وصلات مياه">
                                        وصلات مياه
                                    </option>
                                    <option class="water sub" style="display: none;" value="انسداد صرف">
                                        انسداد صرف
                                    </option>
                                    <option class="carpan sub" style="display: none;" value="تركيب كالون">
                                        تركيب كالون
                                    </option>
                                    <option class="carpan sub" style="display: none;" value="تركيب قلب">
                                        تركيب قلب
                                    </option>
                                    <option class="carpan sub" style="display: none;" value="خلع  باب">
                                        خلع باب
                                    </option>
                                    <option class="carpan sub" style="display: none;" value="كسر باب">
                                        كسر باب
                                    </option>
                                    <option class="carpan sub" style="display: none;" value="تركيب رزه">
                                        تركيب رزه
                                    </option>
                                    <option class="carpan sub" style="display: none;" value="كسر بنش">
                                        كسر بنش
                                    </option>
                                    <option class="carpan sub" style="display: none;" value="مشكلة سبورة">
                                        مشكلة سبورة
                                    </option>
                                    <option value="لا تعمل مكينه التصوير " style="display: none;" class="print sub">
                                        لا تعمل مكينه التصوير
                                    </option>
                                    <option value="كسر في الزجاج" style="display: none;" class="glass sub">
                                        كسر في الزجاج

                                    </option>
                                    <option value="تركيب شبابيك الوميتال" style="display: none;" class="glass sub">
                                        تركيب شبابيك الوميتال
                                    </option>
                                    <option value="شرخ في الزجاج" style="display: none;" class="glass sub">
                                        شرخ في الزجاج
                                    </option>
                                    <option class="" style="display: none;" value="أخرى">
                                        -أخرى-
                                    </option>
                                </select>
                            </div>
                        </div>
                </form>
            </div>
        </div>

        <div class="form_2 data_info " style="display: none;">
            <h2>بيانات أكثر</h2>
            <div class="form_container">
                <div class="row-space row">
                    <div class="input_wrap">
                        <label for="request_floor">الطابق</label>
                        <select name="Floor" id="request_floor">
                            <option value="" selected>اختر الطابق</option>
                            <option value="0">الارضي</option>
                            <option value="1">الاول</option>
                            <option value="2">الثاني</option>
                            <option value="3">الثالث</option>
                            <option value="4">الرابع</option>
                            <option value="5">الخامس</option>
                            <option value="6">السادس</option>
                            <option value="7">السابع</option>
                            <option value="8">الثامن</option>
                        </select>
                        <label for="request_room">الغرفه</label>
                        <select name="Room" id="request_room">
                            <option value="" selected>اختر اسم الغرفه</option>
                            <option value="SB1-1">SB1-1</option>
                            <option value="SB1-2">SB1-2</option>
                            <option value="SB1-3">SB1-3</option>
                            <option value="SB1-4">SB1-4</option>
                            <option value="SB1-5">SB1-5</option>
                            <option value="SB1-6">SB1-6</option>
                            <option value="SB1-7">SB1-7</option>
                            <option value="SB1-8">SB1-8</option>
                            <option value="SB2-1">SB2-1</option>
                            <option value="SB2-2">SB2-2</option>
                            <option value="SB2-3">SB2-3</option>
                            <option value="SB2-4">SB2-4</option>
                            <option value="SB2-5">SB2-5</option>
                            <option value="SB2-6">SB2-6</option>
                            <option value="SB2-7">SB2-7</option>
                            <option value="SB2-8">SB2-8</option>
                            <option value="SB3-1">SB3-1</option>
                            <option value="SB3-2">SB3-2</option>
                            <option value="SB3-3">SB3-3</option>
                            <option value="SB3-4">SB3-4</option>
                            <option value="SB3-5">SB3-5</option>
                            <option value="SB3-6">SB3-6</option>
                            <option value="SB3-7">SB3-7</option>
                            <option value="SB3-8">SB3-8</option>
                            <option value="SB4-1">SB4-1</option>
                            <option value="SB4-2">SB4-2</option>
                            <option value="SB4-3">SB4-3</option>
                            <option value="SB4-4">SB4-4</option>
                            <option value="SB4-5">SB4-5</option>
                            <option value="SB4-6">SB4-6</option>
                            <option value="SB4-7">SB4-7</option>
                            <option value="SB4-8">SB4-8</option>
                        </select>
                    </div>
                </div>
                <div class="input_wrap">
                    <label for="request_description">عرض خريطه المبنى</label>
                    <button type="button" id="show-modal"
                            style="width: 100%;text-align: right;padding: 15px;background-color: #607d8b;border: none;color: white;font-size: large;cursor: pointer;  ">
                        اعرض الخريطه
                    </button>
                </div>
                <div class="modal hidden">
                    <button type="button" class="close-modal">&times;</button>
                    <div class="input_wrap">
                        <label for="request_floor">الطابق</label>
                        <select name="Floor" id="request_floor">
                            <option value="" selected>اختر الطابق</option>
                            <option value="0">الارضي</option>
                            <option value="1">الاول</option>
                            <option value="2">الثاني</option>
                            <option value="3">الثالث</option>
                            <option value="4">الرابع</option>
                            <option value="5">الخامس</option>
                            <option value="6">السادس</option>
                            <option value="7">السابع</option>
                            <option value="8">الثامن</option>
                        </select>
                    </div>
                    <div class="container" style=""></div>
                    <div class="row map-row" style="direction: ltr;flex-wrap: nowrap;">
                        <input type="image" value="SB8-01" id="image" disabled="disabled"
                               src="images/map/8_Floor/1.PNG">
                        <input type="image" value="SB8-01" id="image" disabled="disabled"
                               src="images/map/8_Floor/2.PNG">
                        <input type="image" value="SB8-01" id="image" disabled="disabled"
                               src="images/map/8_Floor/3.PNG">
                        <input type="image" value="SB8-01" id="image" disabled="disabled"
                               src="images/map/8_Floor/4.PNG">
                        <input type="image" value="SB8-01" id="image" disabled="disabled"
                               src="images/map/8_Floor/5.PNG">
                        <input type="image" value="SB8-01" id="image" disabled="disabled"
                               src="images/map/8_Floor/6.PNG">
                        <input type="image" value="SB8-01" id="image" disabled="disabled"
                               src="images/map/8_Floor/7.PNG">
                        <input type="image" value="SB8-01" id="image" disabled="disabled"
                               src="images/map/8_Floor/8.PNG">

                    </div>
                    <div class="row map-row" style="direction: ltr;flex-wrap: nowrap;">
                        <div class="inColum">
                            <input type="image" value="SB8-01" id="image" disabled="disabled"
                                   src="images/map/8_Floor/9.PNG">
                            <input type="image" value="SB8-01" id="image" disabled="disabled"
                                   src="images/map/8_Floor/10.PNG">
                        </div>
                        <div class="inColum" style="transform: translateX(-143px);">

                            <input type="image" value="SB8-01" id="image" disabled="disabled"
                                   src="images/map/8_Floor/11.PNG">
                            <input type="image" value="SB8-01" id="image" disabled="disabled"
                                   src="images/map/8_Floor/12.PNG">
                        </div>
                        <div class="inColum" style=" transform: translate(-143px, 5px);">
                            <input type="image" value="SB8-01" id="image" disabled="disabled"
                                   src="images/map/8_Floor/13.PNG">
                            <input type="image" value="SB8-01" id="image" disabled="disabled"
                                   src="images/map/8_Floor/14.PNG">
                        </div>
                        <div class="inColum" style=" transform: translate(-167px, 11px);">
                            <input type="image" value="SB8-01" id="image" disabled="disabled"
                                   src="images/map/8_Floor/15.PNG">
                            <input type="image" value="SB8-01" id="image" disabled="disabled"
                                   src="images/map/8_Floor/15_2.PNG">
                        </div>
                        <input type="image" value="SB8-01" id="image" style="transform: translate(-190px, 6px);"
                               disabled="disabled"
                               src="images/map/8_Floor/16.PNG">
                        <input type="image" value="SB8-01" id="image" style="transform: translate(-196px, 2px)"
                               disabled="disabled"
                               src="images/map/8_Floor/block_1.PNG">
                        <div class="inColum" style="transform: translate(-200px, 21px);">
                            <input type="image" value="SB8-01" id="image" disabled="disabled"
                                   src="images/map/8_Floor/17.PNG">
                            <input type="image" value="SB8-01" id="image" disabled="disabled"
                                   src="images/map/8_Floor/18.PNG">
                        </div>

                    </div>
                </div>
                <div class="overlay hidden"></div>
                <div class="input_wrap">
                    <label for="request_description">وصف المشكلة (اختياري)</label>
                    <textarea name="Details" value=" " id="request_description" cols="30" rows="1"></textarea>
                </div>
            </div>
        </div>
        <!-- Start Form 3 - تأكيد -->
        <div class="form_3 data_info" style="display: none;">
            <h2>تأكيد</h2>
            <div class="form_container">
                <div>
                    <table>
                        <tr>
                            <th>الفرع</th>
                            <td id="displayTitle"></td>

                        </tr>
                        <tr>
                            <th>نوع المشكلة</th>
                            <td id="displayType"></td>
                        </tr>
                        <tr>
                            <th>وصف المشكلة</th>
                            <td id="displayDescription"></td>
                        </tr>
                        <tr>
                            <th>الطابق</th>
                            <td id="displayFloor"></td>
                        </tr>
                        <tr>
                            <th>القاعة</th>
                            <td id="displayRoom"></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="btns_wrap">
        <div class="common_btns form_1_btns">
            <button type="button" class="btn_next">التالي <span class="icon"><ion-icon
                            name="arrow-back-sharp"></ion-icon></span></button>
        </div>
        <div class="common_btns form_2_btns" style="display: none;">
            <button type="button" class="btn_back"><span class="icon"><ion-icon
                            name="arrow-forward-sharp"></ion-icon></span>السابق
            </button>
            <button type="button" class="btn_next">التالي<span class="icon"><ion-icon
                            name="arrow-back-sharp"></ion-icon></span></button>
        </div>
        <div class="common_btns form_3_btns" style="display: none;">
            <button type="button" class="btn_back"><span class="icon"><ion-icon
                            name="arrow-forward-sharp"></ion-icon></span>السابق
            </button>
            <button type="submit" class="btn_done" id="submitBtn">تأكيد</button>
        </div>
    </div>
</form>
<div class="modal_wrapper" >
    <div class="shadow"></div>
    <div class="success_wrap" style="width: 75%;">
        <span class="modal_icon"><ion-icon name="checkmark-sharp"></ion-icon></span>
        <p>تم تسجيل طلبك بنجاح يسيتم تحويلك لصفحه الطلبات.</p>
    </div>
</div>


<script type="text/javascript" src="./js/addrequest.js"></script>

</body>
</html>