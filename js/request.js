const rows = document.querySelectorAll(".data");
let count = 0;
let name_tec = "";
let name_comp = "";

const Techinal = document.getElementById("tec_name");
const req_num = document.getElementById("req_num");
const request_building = document.getElementById("request_building");
const room = document.getElementById("room_num");
const request_state = document.getElementById("Request_status")
const request_type = document.getElementById("request_type")
const searchBtn = document.getElementById("searchBtn");
const submitBtn = document.getElementById("submitBtn");
const start_date = document.getElementById("start_date");
const searchBtnAdmin = document.getElementById("searchBtnAdmin");
const end_date = document.getElementById("end_date");
const imageBtn = document.querySelectorAll(".imageBtn");
const addTecBtn = document.querySelectorAll(".addTec");
// Add event listener on keydown
let values = new Array(9);
let lastindex = 7;

rows.forEach(element => {
    console.log(element);
})

function submitValue() {
    rows.forEach(element => {
        element.style.display = "table-row";

        values.forEach(value => {
            let index = values.indexOf(value);
            console.log(element.cells[index].innerText);
            console.log(value);
            if (value !== element.cells[index].innerText) {
                element.style.display = "none";
            }
        })
    })
}


function searchInRow($index, $value) {
    rows.forEach(elment => {
        if ($value.slice(0, count).toLowerCase() !== elment.cells[$index].innerText.slice(0, count).toLowerCase()) {
            elment.style.display = "none";
        } else {
            elment.style.display = "table-row";
        }
    })

}


function selectSearch(value, index) {
    if (value === "null") {
        return null;
    } else {
        values[index] = value;
        submitValue();

    }
}

Techinal.addEventListener("click", () => {
    selectSearch(Techinal.value, 1)
})
req_num.addEventListener('keydown', (event) => {
    if (event.keyCode === 8 && count > 0) {
        count--;
        searchInRow(1, req_num.value);
    }
    if (event.keyCode === 32) {
        4
        count++;
    }

    if (event.keyCode !== 8 && event.keyCode !== 32) {  // event.keyCode > 64 && event.keyCode < 123
        let req_num_value = req_num.value + event.key;
        count++;
        searchInRow(1, req_num_value);
    }

}, false);


request_building.addEventListener("click", () => {
    selectSearch(request_building.value, 7)

})


request_state.addEventListener("click", () => {
    selectSearch(request_state.value, 8)

})

request_type.addEventListener("click", () => {
    selectSearch(request_type.value, 2)
})

rows.forEach(elment => {
    let editBtn = document.querySelector(".edit_" + elment.cells[1].innerText);
    let deleteBtn = document.querySelector(".delete_" + elment.cells[1].innerText);

    deleteBtn.addEventListener("click", () => {
        document.getElementById("delete_" + elment.cells[1].innerText).style.display = "block";
    })
    editBtn.addEventListener("click", () => {
        document.getElementById("edit_" + elment.cells[1].innerText).style.display = "block";
    })

    document.querySelectorAll(".backBtn").forEach(ele => {
        ele.addEventListener("click", () => {

            document.getElementById("delete_" + elment.cells[1].innerText).style.display = "none";
            document.getElementById("edit_" + elment.cells[1].innerText).style.display = "none";
        })
    })
})


let items = [start_date, end_date];

items.forEach(elment => {
    elment.addEventListener("click", () => {
        if (start_date.value === "") {
            return;
        }
        rows.forEach(elment => {
            let request_data = Date.parse(elment.cells[0].innerText);
            if (!end_date.value) {
                if (request_data < Date.parse(start_date.value)) {
                    elment.style.display = "none";
                }
                return
            }
            elment.style.display = "none";
            if (request_data >= Date.parse(start_date.value) && request_data <= Date.parse(end_date.value)) {
                elment.style.display = "table-row";
            }
        })
    })

})

let state = false;
console.log("state is ", state)
searchBtnAdmin.addEventListener("click", () => {
    if (state) {
        rows.forEach(element => element.style.display = "table-row")
        Techinal.value = "null";
        req_num.value = "null";
        request_building.value = "null";
        room.value = "null";
        request_state.value = "null";
        request_type.value = "null";
        start_date.value = "null";
        end_date.value = "null";
        console.log(searchBtnAdmin)
        searchBtnAdmin.innerHTML = "ابحث عن مشكله"
        state = false;
    }

})
searchBtnAdmin.addEventListener("click", () => {
    if (!state) {
        document.getElementById("searchSideBar").classList.toggle("sidebarSearch");
        searchBtnAdmin.classList.toggle("searchBtn");
        state = true;
    }
})


imageBtn.forEach(element => {
    element.addEventListener("click", () => {
        // document.getElementById("image_" + element.id).classList.toggle("hide");

    })
})


let idRequest;
let cancelAddTec;
let saveAddTec;
console.log(addTecBtn);
addTecBtn.forEach(element => {
    element.addEventListener("click", function () {
        idRequest = element.getAttribute("requestNum");
        document.getElementById("addTecField_" + idRequest).classList.remove("hide");
        cancelAddTec = document.getElementById("cancelAddTec_" + idRequest);
        saveAddTec = document.getElementById("saveAddTec_" + idRequest);
        cancelAddTec.classList.remove("hide");
        cancelAddTec.addEventListener("click", () => {
            console.log("am here");
            document.getElementById("addTecField_" + idRequest).classList.add("hide");
            document.getElementById("addTecField_" + idRequest).classList.add("dark");
            document.getElementById("cancelAddTec_" + idRequest).classList.add("hide");
        })
        saveAddTec.addEventListener("click", () => {
            console.log("am here");
            document.getElementById("addTecField_" + idRequest).classList.add("hide");
            document.getElementById("addTecField_" + idRequest).classList.add("dark");
            document.getElementById("cancelAddTec_" + idRequest).classList.add("hide");
        })
    })
})


saveAddTec