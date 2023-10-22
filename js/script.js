const request = document.querySelector("#requestAccess");
const requestsSection = document.querySelector("#requests");

const main = document.querySelector("#main");

function access() {
    main.style.display = "none";
    requestsSection.style.display = "block";
    console.log("Button Clicked");
}

