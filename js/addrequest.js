let rooms = ["SB-11", "SB-12", "NB30"];
// Forms
const form_1 = document.querySelector(".form_1");
const form_2 = document.querySelector(".form_2");
const form_3 = document.querySelector(".form_3");

// Buttons
const form_1_btns = document.querySelector(".form_1_btns");
const form_2_btns = document.querySelector(".form_2_btns");
const form_3_btns = document.querySelector(".form_3_btns");


const form_1_next_btn = document.querySelector(".form_1_btns .btn_next");
const form_2_back_btn = document.querySelector(".form_2_btns .btn_back");
const form_2_next_btn = document.querySelector(".form_2_btns .btn_next");
const form_3_back_btn = document.querySelector(".form_3_btns .btn_back");

const form_2_progessbar = document.querySelector(".form_2_progessbar");
const form_3_progessbar = document.querySelector(".form_3_progessbar");

const btn_done = document.querySelector(".btn_done");
const modal_wrapper = document.querySelector(".modal_wrapper");
const shadow = document.querySelector(".shadow");

// All Inputs
const request_title = document.querySelector('#request_title');
const request_description = document.querySelector('#request_description');
const request_room = document.querySelector('#request_room');
const request_floor = document.querySelector('#request_floor');

// Problem Type Seclection
const problems = document.getElementById("problemType");
const subProblem = document.querySelectorAll(".sub");


// Submit button
const submitBtn = document.getElementById("submitBtn");

//map
const model = document.querySelector('.modal');
const overLay = document.querySelector('.overlay');
const btnCloseModal = document.querySelector('.close-modal');
const btnShowModel = document.getElementById('show-modal');


problems.addEventListener("change", function () {
    if (problems.value === "another") {
        document.querySelector('#showAnother').style.display = "block";
        console.log('Clicked');
    }
});

form_1_next_btn.addEventListener("click", function () {


    form_1.style.display = "none";
    form_2.style.display = "block";

    form_1_btns.style.display = "none";
    form_2_btns.style.display = "flex";

    form_2_progessbar.classList.add("active");

});

form_2_back_btn.addEventListener("click", function () {
    form_1.style.display = "block";
    form_2.style.display = "none";

    form_1_btns.style.display = "flex";
    form_2_btns.style.display = "none";

    form_2_progessbar.classList.remove("active");
});

form_2_next_btn.addEventListener("click", function () {
    form_2.style.display = "none";
    form_3.style.display = "block";

    form_3_btns.style.display = "flex";
    form_2_btns.style.display = "none";

    form_3_progessbar.classList.add("active");

    // show table in form 2
    console.log(request_title.value);
    console.log(problems.value);
    console.log(request_room.value);
    console.log(request_description.value);

    document.getElementById('displayTitle').innerText = request_title.value;
    document.getElementById('displayType').innerText = problems.value;
    document.getElementById('displayRoom').innerText = request_room.value;
    document.getElementById('displayFloor').innerText = request_floor.value;
    document.getElementById('displayDescription').innerText = request_description.value;

});

form_3_back_btn.addEventListener("click", function () {
    form_2.style.display = "block";
    form_3.style.display = "none";

    form_3_btns.style.display = "none";
    form_2_btns.style.display = "flex";

    form_3_progessbar.classList.remove("active");
});

btn_done.addEventListener("click", function () {
    modal_wrapper.classList.add("active");
})

shadow.addEventListener("click", function () {
    modal_wrapper.classList.remove("active");
})

submitBtn.addEventListener("click", function () {
    if (document.getElementById("ismForm")) {
        setTimeout("submitForm()", 2000); // set timout
    }
})
problems.addEventListener("click", function () {
    subProblem.forEach(element => {
        const ele = element.className;
        console.log(problems.value);
        console.log(ele);
        if (problems.value === "كهرباء") {
            if (ele === "elect sub") {
                element.style.display = "block";
            } else {
                element.style.display = "none";
            }
        }
        if (problems.value === "النت") {
            if (ele === "net sub") {
                element.style.display = "block";
            } else {
                element.style.display = "none";
            }
        }
        if (problems.value === "ماكينة التصوير") {
            if (ele === "other sub") {
                element.style.display = "block";
            } else {
                element.style.display = "none";
            }
        }
        if (problems.value === "طابعة") {
            if (ele === "other sub") {
                element.style.display = "block";
            } else {
                element.style.display = "none";
            }
        }
        if (problems.value === "تكييفات") {
            if (ele === "air sub") {
                element.style.display = "block";
            } else {
                element.style.display = "none";
            }
        }
        if (problems.value === "سباكة") {
            if (ele === "water sub") {
                element.style.display = "block";
            } else {
                element.style.display = "none";
            }
        }
        if (problems.value === "حدادة") {
            if (ele === "other sub") {
                element.style.display = "block";
            } else {
                element.style.display = "none";
            }
        }
        if (problems.value === "نجارة") {
            if (ele === "carpan sub") {
                element.style.display = "block";
            } else {
                element.style.display = "none";
            }
        }
        if (problems.value === "معماري") {
            if (ele === "other sub") {
                element.style.display = "block";
            } else {
                element.style.display = "none";
            }
        }
        if (problems.value === "زجاج") {
            if (ele === "glass sub") {
                element.style.display = "block";
            } else {
                element.style.display = "none";
            }
        }
        if (problems.value === "طابعة" || problems.value === "ماكينة التصوير" ) {
            if (ele === "print sub") {
                element.style.display = "block";
            } else {
                element.style.display = "none";
            }
        }


    })
})



// map

btnShowModel.addEventListener('click', function () {
    model.classList.remove('hidden');
    overLay.classList.remove('hidden');
});

const closeModel = function () {
    model.classList.add('hidden');
    overLay.classList.add('hidden');
};

btnCloseModal.addEventListener('click', closeModel);


// how add keyboard events

document.addEventListener('keydown', function (e) {
    if (e.key === "Escape") {
        if (!model.classList.contains('hidden')) {
            closeModel();
        }
    }
});