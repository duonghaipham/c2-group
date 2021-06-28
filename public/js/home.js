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
    listPosts[i].firstElementChild.addEventListener("click", (event) => {
        const currentDetail = event.currentTarget.nextElementSibling;
        if (currentDetail.style.display === "block")
            currentDetail.style.display = "none";
        else
            currentDetail.style.display = "block";
    });
}

// Send comment to server
const makeComment = (obj, postUrl) => {
    const request = new XMLHttpRequest();
    request.open('POST', postUrl, true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
    request.send('comment=' + obj.firstElementChild.value);
    request.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {

            // clear text comment
            obj.firstElementChild.value = "";

            // parser xml string to DOM
            const parser = new DOMParser();
            const response = parser.parseFromString(this.responseText,"text/xml");

            const singleComment = document.createElement("div");
            singleComment.classList.add("single-comment");

            // avatar link to profile
            const anchorProfile = document.createElement("a");
            anchorProfile.href = response.getElementsByTagName("creator")[0].textContent;
            const imgAvatar = document.createElement("img");
            imgAvatar.src = response.getElementsByTagName("avatar")[0].textContent;
            imgAvatar.alt = "Avatar";

            anchorProfile.appendChild(imgAvatar);

            // the body of comment
            const commentBody = document.createElement("div");
            commentBody.classList.add("cmt-body");

            // name and time of comment
            const commentHeader = document.createElement("div");
            commentHeader.classList.add("cmt-header");

            const commentName = document.createElement("p");
            commentName.classList.add("cmt-name");
            commentName.innerHTML = response.getElementsByTagName('name')[0].textContent;
            const commentTime = document.createElement("p");
            commentTime.classList.add("cmt-time");
            commentTime.innerHTML = response.getElementsByTagName('created_at')[0].textContent;

            commentHeader.appendChild(commentName);
            commentHeader.appendChild(commentTime);

            // content of comment
            const commentContent = document.createElement("p");
            commentContent.classList.add("cmt-content");
            commentContent.innerHTML = response.getElementsByTagName('content')[0].textContent;

            commentBody.appendChild(commentHeader);
            commentBody.appendChild(commentContent);

            singleComment.appendChild(anchorProfile);
            singleComment.appendChild(commentBody);

            // go up two parents
            const listComments = obj.parentElement.parentElement.getElementsByClassName("list-comment")[0];
            listComments.appendChild(singleComment);
        }
    };
};

const listPolls = document.getElementsByClassName("poll");
for (let poll of listPolls) {
    poll.addEventListener("submit", (event) => {
        const obj = event.currentTarget;
        const currentUrl = urlPoll + obj.getAttribute("id").split("-")[1];
        const request = new XMLHttpRequest();
        request.open('POST', currentUrl, true);
        request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
        request.send('option=' + obj.querySelector(':checked').value);
        request.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                const parser = new DOMParser();
                const response = parser.parseFromString(this.responseText,"text/xml");

                const listOptions = obj.getElementsByClassName("option");
                const listFrequencies = response.getElementsByTagName("frequency");
                for (let i = 0; i < listOptions.length; i++) {
                    const amount = document.createElement("span");
                    amount.innerHTML = listFrequencies[i].textContent + " lượt chọn";
                    listOptions[i].appendChild(amount);
                }

                for (let i = 0; i < listOptions.length; i++)
                    listOptions[i].firstElementChild.disabled = true;
                obj.lastElementChild.remove();
            }
        };
        event.preventDefault();
        return false;
    });
}