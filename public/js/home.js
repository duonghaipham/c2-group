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