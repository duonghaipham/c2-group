const btnMenu = document.getElementById("btn-menu");
btnMenu.addEventListener("click", () => {
    const navbarContainer = document.getElementById("navbar-container");
    if (navbarContainer.style.display === "block") {
        navbarContainer.style.display = "none";
        btnMenu.setAttribute("src", btnMenu.getAttribute("src").replace("close", "menu"));
    }
    else {
        navbarContainer.style.display = "block";
        btnMenu.setAttribute("src", btnMenu.getAttribute("src").replace("menu", "close"));
    }
});