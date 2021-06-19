// Switch tab helper function
const switchTab = (event, tabName) => {
    const tabContents = document.getElementsByClassName("tab-content");
    for (let i = 0; i < tabContents.length; i++)
        tabContents[i].style.display = "none";

    const tabLinks = document.getElementsByClassName("tab-link");
    for (let i = 0; i < tabLinks.length; i++)
        tabLinks[i].classList.remove("active");
    
    document.getElementById(tabName).style.display = "block";
    event.currentTarget.classList.add("active");
}

// Click on stream button
const btnStream = document.getElementById("btn-stream");
btnStream.addEventListener("click", (event) => {
    switchTab(event, "stream");
});

// Click on work button
const btnWork = document.getElementById("btn-work");
btnWork.addEventListener("click", (event) => {
    switchTab(event, "work");
});

// Default tab is stream
btnStream.click();

// Show create pop-up
const btnCreateWork = document.getElementById("btn-create-work");
btnCreateWork.addEventListener("click", () => {
    const popUpCreate = document.getElementById("list-create");
    if (popUpCreate.style.display === "block") {
        popUpCreate.style.display = "none";
        btnCreateWork.style.opacity = "1";
    }
    else {
        popUpCreate.style.display = "block";
        btnCreateWork.style.opacity = "0.8";
    }
});

// Show whole post when click on title
const listPosts = document.getElementById("list-posts").children;
for (let i = 0; i < listPosts.length; i++) {
    listPosts[i].addEventListener("click", (event) => {
        const currentDetail = event.currentTarget.lastElementChild;
        if (currentDetail.style.display === "block")
            currentDetail.style.display = "none";
        else
            currentDetail.style.display = "block";
    });
}