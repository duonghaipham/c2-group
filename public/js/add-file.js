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
        const src = event.target.files[0].type.includes("image") ?
            URL.createObjectURL(event.target.files[0]) : "../svg/document.svg";
        imgOrnament.setAttribute("src", src);
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