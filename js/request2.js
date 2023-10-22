const rows = document.querySelectorAll(".data");

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

            document.getElementById("edit_" + elment.cells[1].innerText).style.display = "none";
        })
    })
})

