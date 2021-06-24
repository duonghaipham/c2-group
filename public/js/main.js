// Click on menu handler
const btnMenu = document.getElementById("btn-menu");
btnMenu.addEventListener("click", () => {
    const navbarContainer = document.getElementById("navbar-container");
    if (btnMenu.getAttribute("src").includes("menu")) {
        navbarContainer.classList.add("show");
        btnMenu.setAttribute("src", btnMenu.getAttribute("src").replace("menu", "close"));
    }
    else {
        navbarContainer.classList.remove("show");
        btnMenu.setAttribute("src", btnMenu.getAttribute("src").replace("close", "menu"));
    }
});