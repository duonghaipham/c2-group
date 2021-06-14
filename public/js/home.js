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

// Add file to post
const inputFile = document.getElementById("input-file");
inputFile.addEventListener("change", (event) => {
    if (event.target.files.length > 0) {
        const preview = document.createElement("div");
        preview.setAttribute("id", "preview");
        
        const removeFile = document.createElement("span");
        removeFile.setAttribute("id", "remove-file");
        removeFile.innerHTML = "&#x2715;";

        const imgOrnament = document.createElement("img");
        imgOrnament.setAttribute("src", "../public/svg/document.svg");
        imgOrnament.setAttribute("alt", "File");
        
        const fileName = document.createElement("p");
        fileName.setAttribute("id", "file-name");
        fileName.innerHTML = event.target.files[0].name;

        preview.appendChild(removeFile);
        preview.appendChild(imgOrnament);
        preview.appendChild(fileName);

        const postContent = document.querySelector('textarea[name="post"]');
        postContent.parentNode.insertBefore(preview, postContent.nextSibling);

        // Remove file
        removeFile.addEventListener("click", () => {
            document.getElementById("input-file").value = "";
            document.getElementById("preview").remove();
        });
    }
});