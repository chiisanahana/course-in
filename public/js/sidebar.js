const content = document.getElementsByTagName("html")[0];
let sidebar = document.getElementById("sidebarMenu");
let nav_link = sidebar.querySelectorAll(".nav-link");
var collapsed = false; // sidebar initial state

// function untuk minimize sidebar
function collapse() {
    nav_link.forEach(function (n) {
        n.classList.add("justify-content-center");
        n.querySelector(".menu").style.display = "none";
    });
    sidebar.classList.remove("col-md-3", "col-lg-2");
    sidebar.classList.add("col-md-1");
    mainContent.classList.remove("col-md-9", "col-lg-10");
    mainContent.classList.add("col-md-11");
    collapsed = true;
}

// function untuk maximize sidebar
function expand() {
    nav_link.forEach(function (n) {
        setTimeout(function () {
            n.querySelector(".menu").style.display = "inline";
        }, 300);
        n.classList.remove("justify-content-center");
    });
    sidebar.classList.remove("col-md-1");
    sidebar.classList.add("col-md-3", "col-lg-2");
    mainContent.classList.remove("col-md-11");
    mainContent.classList.add("col-md-9", "col-lg-10");
    collapsed = false;
}

// saat klik sidebar, expand sidebar
sidebar.addEventListener("click", function(event) {
    if (event.target != sidebar) return;
    expand();
});
// saat klik di luar sidebar, collapse sidebar
content.addEventListener("click", function(event) {
    if (event.target != sidebar) collapse();
})
